<?php
// Incluir el archivo de configuración y las funciones del CRUD
include("../config/config.php");
include("../CRUD-Bella-y-Vale-main/acciones/acciones.php");

// Obtener los productos de la base de datos
$productos = obtenerProductos($conexion);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../productos/assets/css/style.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">
            <a href="../index.html">
                <img class="logo" src="../img/Logo ByVcarlos.png" width="100" height="100" alt="Logo">
            </a> Lista de Productos Bella y Vale
        </h2>
        <div class="table-responsive table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Imagen producto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Iterar sobre los productos y mostrar cada uno en una fila de la tabla
                    while ($producto = $productos->fetch_assoc()) {
                        echo "<tr>";
                        // echo "<th scope='row'>" . $producto['id'] . "</th>";
                        // Enlace al nombre del producto que dirige a la página de compra
                        //echo "<td><a href='../carritocompra.php?id=" . $producto['id'] . "'>" . $producto['nombre'] . "</a></td>";
                        echo "<td>" . $producto['nombre'] . "</td>";
                        echo "<td>" . $producto['marca'] . "</td>";
                        echo "<td>" . $producto['categoria'] . "</td>";
                        echo "<td>$" . number_format($producto['precio'], 0, ',', '.') . "</td>";
                        echo "<td>" . $producto['descripcion'] . "</td>";
                        // Mostrar la imagen del producto
                        echo "<td><img src='/proyectoByV2/CRUD-Bella-y-Vale-main/acciones/fotos_productos/" . $producto['imagen_producto'] . "' alt='Imagen Producto' class='imagen-producto' width='50' height='50'></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para mostrar la imagen en grande -->
    <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagenModalLabel">Bella y Vale</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="imagenGrande" src="" alt="Imagen Grande" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <a id="compraEnlace" href="../carritocompra.php" class="btn btn-primary">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener todas las imágenes de los productos
            const imagenesProductos = document.querySelectorAll('.imagen-producto');

            // Agregar evento de clic a cada imagen
            imagenesProductos.forEach((imagen) => {
                imagen.addEventListener('click', () => {
                    // Obtener la URL de la imagen clickeada
                    const urlImagen = imagen.getAttribute('src');
                    // Mostrar la imagen en el modal
                    document.getElementById('imagenGrande').src = urlImagen;
                    // Mostrar el modal
                    $('#imagenModal').modal('show');
                });
            });
        });
    </script>

</body>

</html>
