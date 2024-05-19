<?php
require_once("../config/config.php");
$id = $_GET['id'];

// Consultar la base de datos para obtener los detalles del producto
$sql = "SELECT * FROM tbl_productos WHERE id = $id LIMIT 1";
$query = $conexion->query($sql);
$producto = $query->fetch_assoc();

// Devolver los detalles del producto como un objeto JSON
header('Content-type: application/json; charset=utf-8');
echo json_encode($producto);
exit;
