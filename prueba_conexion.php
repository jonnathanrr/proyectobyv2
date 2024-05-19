<?php
$host = "localhost"; // Host de la base de datos
$usuario = "root"; // Usuario de la base de datos
$contraseña = ""; // Contraseña de la base de datos
$base_de_datos = "iniciosesiondb"; // Nombre de la base de datos

// Intentar establecer la conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa a la base de datos!";
}

// Cerrar la conexión
$conexion->close();
?>
