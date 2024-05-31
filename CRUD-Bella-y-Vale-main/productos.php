<div class="table-responsive">
    <table class="table table-hover" id="table_productos">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoría</th>
                <th scope="col">Precio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen producto</th>
                <th scope="col">Fecha creación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) {
                // Formatear el precio
                $precio_formateado = number_format($producto['precio'], 0, ',', '.');
            ?>
                <tr id="producto_<?php echo $producto['id']; ?>">
                    <th scope='row'><?php echo $producto['id']; ?></th>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                    <td class="text-center"><?php echo $precio_formateado; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td class="text-center">
                        <?php
                        $imagenProducto = $producto['imagen_producto'];
                        if ($imagenProducto == '') {
                            $imagenProducto = 'assets/imgs/sin-foto.jpg';
                        } else {
                            $imagenProducto = "acciones/fotos_productos/" . $imagenProducto;
                        }
                        ?>
                        <img src="<?php echo $imagenProducto; ?>" alt="<?php echo $producto['nombre']; ?>" width="50" height="50">
                    </td>
                    <td class="text-center"><?php echo $producto['fecha_creacion']; ?></td>
                    <td>
                        <a title="Ver detalles del producto" href="#" onclick="verDetallesProducto(<?php echo $producto['id']; ?>)" class="btn btn-success">
                            <i class="bi bi-binoculars"></i>
                        </a>
                        <a title="Editar datos del producto" href="#" onclick="editarProducto(<?php echo $producto['id']; ?>)" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a title="Eliminar datos del producto" href="#" onclick="eliminarProducto(<?php echo $producto['id']; ?>, '<?php echo $producto['imagen_producto']; ?>')" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>