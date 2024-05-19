<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include("../config/config.php");

    // Realizar la consulta para obtener los detalles del producto con el ID proporcionado
    $sql = "SELECT * FROM tbl_productos ORDER BY id DESC LIMIT 1";
    $resultado = $conexion->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if (!$resultado) {
        echo json_encode(["error" => "Error al obtener los detalles del producto: " . $conexion->error]);
        exit();
    }

    // Obtener los detalles del ultimo producto registrado, como un array asociativo
    $producto = $resultado->fetch_assoc();

    // Devolver los detalles del producto como un objeto JSON
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($producto);
    exit;
}
