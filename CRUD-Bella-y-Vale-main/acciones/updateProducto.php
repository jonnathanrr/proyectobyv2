<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/config.php");

    $id = trim($_POST['id']); // ID del producto que se actualizará
    $nombre = trim($_POST['nombre']);
    $marca = trim($_POST['marca']);
    $categoria = trim($_POST['categoria']);
    $precio = trim($_POST['precio']);
    $descripcion = trim($_POST['descripcion']);
    $fecha_creacion = trim($_POST['fecha_creacion']);

    $imagen_producto = null;

    // Verifica si se ha subido un nuevo archivo de imagen
    if (isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['size'] > 0) {
        $archivoTemporal = $_FILES['imagen_producto']['tmp_name'];
        $nombreArchivo = $_FILES['imagen_producto']['name'];

        // Verifica la extensión del archivo
        $extensionesValidas = array("jpg", "jpeg", "png");
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        if (in_array($extension, $extensionesValidas)) {
            // Genera un nombre único y seguro para el archivo
            $dirLocal = "fotos_productos";
            $nombreArchivo = substr(md5(uniqid(rand())), 0, 10) . "." . $extension;
            $rutaDestino = $dirLocal . '/' . $nombreArchivo;

            if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
                $imagen_producto = $nombreArchivo;
            }
        } else {
            echo "Error: El formato de archivo no es válido.";
            exit;
        }
    }

    // Actualiza los datos en la base de datos
    $sql = "UPDATE tbl_productos
            SET nombre='$nombre', marca='$marca', categoria='$categoria', precio='$precio', descripcion='$descripcion', fecha_creacion='$fecha_creacion'";

    // Si hay una nueva imagen, actualiza su valor
    if ($imagen_producto !== null) {
        $sql .= ", imagen_producto='$imagen_producto'";
    }

    $sql .= " WHERE id='$id'";

    if ($conexion->query($sql) === TRUE) {
        header("location:../");
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
}
?>