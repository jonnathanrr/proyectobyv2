/**
 * Función para mostrar la modal de editar el producto
 */
async function editarProducto(idProducto) {
	try {
		// Ocultar la modal si está abierta
		const existingModal = document.getElementById("editarProductoModal");
		if (existingModal) {
			const modal = bootstrap.Modal.getInstance(existingModal);
			if (modal) {
				modal.hide();
			}
			existingModal.remove(); // Eliminar la modal existente
		}

		const response = await fetch("modales/modalEditar.php");
		if (!response.ok) {
			throw new Error("Error al cargar la modal de editar el producto");
		}
		const modalHTML = await response.text();

		// Crear un elemento div para almacenar el contenido de la modal
		const modalContainer = document.createElement("div");
		modalContainer.innerHTML = modalHTML;

		// Agregar la modal al documento actual
		document.body.appendChild(modalContainer);

		// Mostrar la modal
		const myModal = new bootstrap.Modal(
			modalContainer.querySelector("#editarProductoModal")
		);
		myModal.show();

		await cargarDatosProductoEditar(idProducto);
	} catch (error) {
		console.error(error);
	}
}

/**
 * Función buscar información del producto seleccionado y cargarla en la modal
 */
async function cargarDatosProductoEditar(idProducto) {
	try {
		const response = await axios.get(
			`acciones/detallesProducto.php?id=${idProducto}`
		);
		if (response.status === 200) {
			const {
				id,
				nombre,
				marca,
				categoria,
				precio,
				descripcion,
				imagen_producto,
				fecha_creacion,
			} = response.data;

			console.log(
				id,
				nombre,
				marca,
				categoria,
				precio,
				descripcion,
				imagen_producto,
				fecha_creacion
			);
			document.querySelector("#idproducto").value = id;
			document.querySelector("#nombre").value = nombre;
			document.querySelector("#marca").value = marca;
			document.querySelector("#categoria").value = categoria;
			document.querySelector("#precio").value = precio;
			document.querySelector("#descripcion").value = descripcion;
			document.querySelector("#fecha_creacion").value = fecha_creacion;

			document.querySelector("#imagen_producto").value = imagen_producto;
			let elementImagen_producto =
				document.querySelector("#imagen_producto");
			if (imagen_producto) {
				elementImagen_producto.src = `acciones/fotos_productos/${imagen_producto}`;
			} else {
				elementImagen_producto.src = "assets/imgs/sin-foto.jpg";
			}
		} else {
			console.log("Error al cargar el producto a editar");
		}
	} catch (error) {
		console.error(error);
		alert("Hubo un problema al cargar los detalles del producto");
	}
}

async function actualizarProducto(event) {
	try {
		event.preventDefault();

		const formulario = document.querySelector("#formularioProductoEdit");
		// Crear un objeto FormData para enviar los datos del formulario
		const formData = new FormData(formulario);
		const idproducto = formData.get("id");

		// Enviar los datos del formulario al backend usando Axios
		const response = await axios.post(
			"acciones/updateProducto.php",
			formData
		);

		// Verificar la respuesta del backend
		if (response.status === 200) {
			console.log("Producto actualizado exitosamente");

			// Llamar a la función para actualizar la tabla de producto
			window.updateProductoEdit(idproducto);

			//Llamar a la función para mostrar un mensaje de éxito
			if (window.toastrOptions) {
				toastr.options = window.toastrOptions;
				toastr.success("¡El producto se actualizo correctamente!.");
			}

			setTimeout(() => {
				$("#editarProductoModal").css("opacity", "");
				$("#editarProductoModal").modal("hide");
			}, 600);
		} else {
			console.error("Error al actualizar el producto");
		}
	} catch (error) {
		console.error("Error al enviar el formulario", error);
	}
}
