/**
 * Modal para confirmar la eliminación de un producto
 */
async function cargarModalConfirmacion() {
	try {
		const existingModal = document.getElementById("editarProductoModal");
		if (existingModal) {
			const modal = bootstrap.Modal.getInstance(existingModal);
			if (modal) {
				modal.hide();
			}
			existingModal.remove(); // Eliminar la modal existente
		}

		// Realizar una solicitud GET usando Fetch para obtener el contenido de la modal
		const response = await fetch("modales/modalDelete.php");

		if (!response.ok) {
			throw new Error("Error al cargar la modal de confirmación");
		}

		// Obtener el contenido de la modal
		const modalHTML = await response.text();

		// Crear un elemento div para almacenar el contenido de la modal
		const modalContainer = document.createElement("div");
		modalContainer.innerHTML = modalHTML;

		// Agregar la modal al documento actual
		document.body.appendChild(modalContainer);

		// Mostrar la modal
		const myModal = new bootstrap.Modal(
			modalContainer.querySelector(".modal")
		);
		myModal.show();
	} catch (error) {
		console.error(error);
	}
}

/**
 * Función para eliminar un producto desde la modal
 */
async function eliminarProducto(idProducto, imagen_productoProducto) {
	try {
		// Llamar a la función para cargar y mostrar la modal de confirmación
		await cargarModalConfirmacion();

		// Establecer el ID y la ruta de la imagen del producto en el botón de confirmación
		document
			.getElementById("confirmDeleteBtn")
			.setAttribute("data-id", idProducto);
		document
			.getElementById("confirmDeleteBtn")
			.setAttribute("data-imagen_producto", imagen_productoProducto);

		// Agregar un event listener al botón "Eliminar producto"
		document
			.getElementById("confirmDeleteBtn")
			.addEventListener("click", async function () {
				// Obtener el ID y la ruta de la imagen del producto a eliminar
				var idProducto = this.getAttribute("data-id");
				var imagen_productoProducto = this.getAttribute(
					"data-imagen_producto"
				);

				try {
					const response = await axios.post("acciones/delete.php", {
						id: idProducto,
						imagen_producto: imagen_productoProducto,
					});

					if (response.status === 200) {
						// Eliminar la fila correspondiente a este producto de la tabla
						document
							.querySelector(`#producto_${idProducto}`)
							.remove();
						//Llamar a la función para mostrar un mensaje de éxito
						if (window.toastrOptions) {
							toastr.options = window.toastrOptions;
							toastr.error(
								"¡El producto se elimino correctamente!."
							);
						}
					} else {
						alert(
							`Error al eliminar el producto con ID ${idProducto}`
						);
					}
				} catch (error) {
					console.error(error);
					alert("Hubo un problema al eliminar al producto");
				} finally {
					// Cerrar la modal de confirmación
					var confirmModal = bootstrap.Modal.getInstance(
						document.getElementById("confirmModal")
					);
					confirmModal.hide();
				}
			});
	} catch (error) {
		console.error(error);
		alert("Hubo un problema al cargar la modal de confirmación");
	}
}
