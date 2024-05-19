// Define la función globalmente adjuntándola al objeto window
window.insertProductoTable = async function () {
	try {
		const response = await axios.get(`acciones/getUltimoProducto.php`);
		if (response.status === 200) {
			const infoProducto = response.data; // Obtener los datos del producto desde la respuesta
			let tableBody = document.querySelector("#table_productos tbody");

			let tr = document.createElement("tr");
			tr.id = `producto_${infoProducto.id}`;
			tr.innerHTML = `
        <th class="dt-type-numeric sorting_1" scope="row">${
			infoProducto.id
		}</th>
        <td>${infoProducto.nombre}</td>
        <td>${infoProducto.marca}</td>
        <td>${infoProducto.categoria}</td>
        <td>${infoProducto.precio}</td>
        <td>${infoProducto.descripcion}</td>
        <td>
          <img class="rounded-circle" src="acciones/fotos_productos/${
				infoProducto.imagen_producto || "sin-foto.jpg"
			}" alt="${infoProducto.nombre}" width="50" height="50">
        </td>
        <td>${infoProducto.fecha_creacion}</td>
        <td>
          <a title="Ver detalles del productos" href="#" onclick="verDetallesProducto(${
				infoProducto.id
			})" class="btn btn-success"><i class="bi bi-binoculars"></i></a>
          <a title="Editar datos del " href="#"producto onclick="editarProducto(${
				infoProducto.id
			})" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
          <a title="Eliminar datos del producto" href="#" onclick="eliminarProducto(${
				infoProducto.id
			}, '${
				infoProducto.imagen_producto || ""
			}')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
        </td>
      `;

			// Insertar el nuevo elemento al final de la tabla
			tableBody.appendChild(tr);
		}
	} catch (error) {
		console.error("Error al obtener la información del producto", error);
	}
};
