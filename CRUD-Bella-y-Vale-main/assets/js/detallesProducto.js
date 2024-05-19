/**
 * Función para mostrar la modal de detalles del producto
 */
async function verDetallesProducto(idProducto) {
	try {
		// Ocultar la modal si está abierta
		const existingModal = document.getElementById("detalleProductoModal");
		if (existingModal) {
			const modal = bootstrap.Modal.getInstance(existingModal);
			if (modal) {
				modal.hide();
			}
			existingModal.remove(); // Eliminar la modal existente
		}

		// Buscar la Modal de Detalles
		const response = await fetch("modales/modalDetalles.php");
		if (!response.ok) {
			throw new Error(
				"Error al cargar la modal de detalles del producto"
			);
		}
		// response.text() es un método en programación que se utiliza para obtener el contenido de texto de una respuesta HTTP
		const modalHTML = await response.text();

		// Crear un elemento div para almacenar el contenido de la modal
		const modalContainer = document.createElement("div");
		modalContainer.innerHTML = modalHTML;

		// Agregar la modal al documento actual
		document.body.appendChild(modalContainer);

		// Mostrar la modal
		const myModal = new bootstrap.Modal(
			modalContainer.querySelector("#detalleProductoModal")
		);
		myModal.show();

		await cargarDetalleProducto(idProducto);
	} catch (error) {
		console.error(error);
	}
}

/**
 * Función para cargar y mostrar los detalles del producto en la modal
 */
async function cargarDetalleProducto(idProducto) {
	try {
		const response = await axios.get(
			`acciones/detallesProducto.php?id=${idProducto}`
		);
		if (response.status === 200) {
			console.log(response.data);
			const {
				nombre,
				marca,
				categoria,
				precio,
				descripcion,
				imagen_producto,
				fecha_creacion,
			} = response.data;
			const imagen_productoURL = imagen_producto
				? `acciones/fotos_productos/${imagen_producto}`
				: null;
			const imagen_productoExistente = imagen_productoURL
				? await verificarExistenciaImagen(imagen_productoURL)
				: false;
			const imagen_productoHTML = imagen_productoExistente
				? `<img src="${imagen_productoURL}" alt="Imagen producto" style="width: 100px; height: 100px; display:block;">`
				: "No disponible";

			// Limpiar el contenido existente de la lista ul

			const ulDetalleProducto = document.querySelector(
				"#detalleProductoContenido ul"
			);

			ulDetalleProducto.innerHTML = ` 
        <li class="list-group-item"><b>Nombre:</b> 
          ${nombre ? nombre : "No disponible"}
        </li>
        <li class="list-group-item"><b>Marca:</b> 
          ${marca ? marca : "No disponible"}
        </li>
        <li class="list-group-item"><b>Categoría:</b> 
          ${categoria ? categoria : "No disponible"}
          </li>
        <li class="list-group-item"><b>Precio:</b>
         ${precio ? precio : "No disponible"}
        </li>
        <li class="list-group-item"><b>Descripción:</b>
        ${descripcion ? descripcion : "No disponible"}
          </li>
         <li class="list-group-item"><b>Imagen producto:</b><br> <br> ${imagen_productoHTML}</li>
         <li class="list-group-item"><b>Cargo:</b> 
          ${fecha_creacion ? fecha_creacion : "No disponible"}
        </li>
      `;
		} else {
			alert(
				`Error al cargar los detalles del producto con ID ${idProducto}`
			);
		}
	} catch (error) {
		console.error(error);
		alert("Hubo un problema al cargar los detalles del producto");
	}
}

// Función para verificar la existencia de una imagen
async function verificarExistenciaImagen(url) {
	try {
		const response = await fetch(url, { method: "HEAD" });
		return response.ok;
	} catch (error) {
		console.error("Error al verificar la existencia de la imagen:", error);
		return false;
	}
}
