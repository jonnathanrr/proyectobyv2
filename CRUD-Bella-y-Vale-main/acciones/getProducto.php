<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include("../config/config.php");

    // Obtener el ID de producto de la solicitud GET y asegurarse de que sea un entero
    $IdProducto = (int)$_GET['id'];

    // Realizar la consulta para obtener los detalles del producto con el ID proporcionado
    $sql = "SELECT * FROM tbl_productos WHERE id = $IdProducto LIMIT 1";
    $resultado = $conexion->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$resultado) {
        // Manejar el error aquí si la consulta no se ejecuta correctamente
        echo json_encode(["error" => "Error al obtener los detalles del producto: " . $conexion->error]);
        exit();
    }

    // Obtener los detalles del producto como un array asociativo
    $producto = $resultado->fetch_assoc();

    // Devolver los detalles del producto como un objeto JSON
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($producto);
    exit;
}
