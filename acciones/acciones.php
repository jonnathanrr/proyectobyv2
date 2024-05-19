<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/config.php");
    $tbl_productos = "tbl_productos";


    $nombre = trim($_POST['nombre']);
    $marca = trim($_POST['marca']);
    $categoria = trim($_POST['categoria']);
    $precio = trim($_POST['precio']);
    $descripcion = trim($_POST['descripcion']);
    $fecha_creacion = trim($_POST['fecha_creacion']);

    $dirLocal = "fotos_productos";

    if (isset($_FILES['imagen_producto'])) {
        $archivoTemporal = $_FILES['imagen_producto']['tmp_name'];
        $nombreArchivo = $_FILES['imagen_producto']['name'];

        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        // Generar un nombre único y seguro para el archivo
        $nombreArchivo = substr(md5(uniqid(rand())), 0, 10) . "." . $extension;
        $rutaDestino = $dirLocal . '/' . $nombreArchivo;

        // Mover el archivo a la ubicación deseada
        if (move_uploaded_file($archivoTemporal, $rutaDestino)) {

            $sql = "INSERT INTO $tbl_productos (nombre, marca, categoria, precio, descripcion, imagen_producto, fecha_creacion) 
            VALUES ('$nombre', '$marca', '$categoria', '$precio', '$descripcion', '$nombreArchivo', '$fecha_creacion')";

            if ($conexion->query($sql) === TRUE) {
                header("location:../");
            } else {
                echo "Error al crear el registro: " . $conexion->error;
            }
        } else {
            echo json_encode(array('error' => 'Error al mover el archivo'));
        }
    } else {
        echo json_encode(array('error' => 'No se ha enviado ningún archivo o ha ocurrido un error al cargar el archivo'));
    }
}

/**
 * Función para obtener todos los productos
 */

function obtenerProductos($conexion)
{
    $sql = "SELECT * FROM tbl_productos ORDER BY id ASC";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        return false;
    }
    return $resultado;
}
