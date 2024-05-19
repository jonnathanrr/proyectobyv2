<?php
include("../config/config.php");

$fecha_actual = date("Y-m-d");
$filename = "productos_" . $fecha_actual . ".csv";

// Encabezados para el archivo CSV
$fields = array('ID', 'Nombre', 'Marca', 'Categoría', 'Precio', 'Descripción', 'Imagen producto', 'Fecha creación');

// Consulta SQL para obtener los datos de los productos
$sql = "SELECT * FROM tbl_productos";
// Ejecutar la consulta
$result = $conexion->query($sql);

// Verificar si hay datos obtenidos de la consulta
if ($result->num_rows > 0) {
    // Abrir el archivo CSV para escritura
    $fp = fopen('php://output', 'w');

    // Agregar los encabezados al archivo CSV
    fputcsv($fp, $fields);

    // Iterar sobre los resultados y agregar cada fila al archivo CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }

    // Cerrar el archivo CSV
    fclose($fp);

    // Establecer las cabeceras para descargar el archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Detener la ejecución del script para que solo se descargue el archivo CSV
    exit();
} else {
    // Si no hay datos de productos, redireccionar o mostrar un mensaje de error
    echo "No hay productos para generar el reporte.";
}

// Cerrar la conexión a la base de datos
$conexion->close();