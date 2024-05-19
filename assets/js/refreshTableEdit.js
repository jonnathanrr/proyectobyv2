// Define la función globalmente adjuntándola al objeto window
window.updateProductoEdit = async function (iDproducto) {
	try {
		const response = await axios.get(
			`acciones/getProducto.php?id=${iDproducto}`
		);
		if (response.status === 200) {
			const infoProducto = response.data; // Obtener los datos del producto desde la respuesta

			let tr = document.querySelector(`#producto_${iDproducto}`);
			let tablaHTML = "";
			tablaHTML += `
          <tr id="producto_${infoProducto.id}">
            <th class="dt-type-numeric sorting_1" scope="row">${
				infoProducto.id
			}</th>
            <td>${infoProducto.nombre}</td>
            <td>${infoProducto.marca}</td>
            <td>${infoProducto.categoria}</td>
            <td class="text-center">${infoProducto.precio}</td>
            <td>${infoProducto.descripcion}</td>
            <td class="text-center">
              <img src="acciones/fotos_productos/${
					infoProducto.imagen_producto || "sin-foto.jpg"
				}" alt="${infoProducto.nombre}" width="50" height="50">
            </td>
            <td class="text-center">${infoProducto.fecha_creacion}</td>
            <td>
              <a title="Ver detalles del producto" href="#" onclick="verDetallesProducto(${
					infoProducto.id
				})" class="btn btn-success"><i class="bi bi-binoculars"></i></a>
              <a title="Editar datos del producto" href="#" onclick="editarProducto(${
					infoProducto.id
				})" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
              <a title="Eliminar datos del producto" href="#" onclick="eliminarProducto(${
					infoProducto.id
				}, '${
				infoProducto.imagen_producto || ""
			}')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
          </tr>
        `;

			// Actualizar el contenido HTML de la tabla
			tr.innerHTML = tablaHTML;
		}
	} catch (error) {
		console.error("Error al obtener la información del producto", error);
	}
};
