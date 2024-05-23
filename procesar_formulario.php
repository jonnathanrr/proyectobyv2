<?php
// Datos de configuración de la base de datos
$servername = "localhost"; // Cambia esto si tu base de datos está en otro servidor
$username = "root"; // Reemplaza con tu nombre de usuario
$password = ""; // Reemplaza con tu contraseña
$dbname = "crud_registrobyv"; // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $fecha_nac = $_POST['fecha_nac'];
    $correo = $_POST['correo'];

    // Evitar inyección SQL
    $nombre = $conn->real_escape_string($nombre);
    $apellido = $conn->real_escape_string($apellido);
    $cedula = $conn->real_escape_string($cedula);
    $fecha_nac = $conn->real_escape_string($fecha_nac);
    $correo = $conn->real_escape_string($correo);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO registro (nombre, apellido, cedula, fecha_nac, correo)
            VALUES ('$nombre', '$apellido', '$cedula', '$fecha_nac', '$correo')";

    if ($conn->query($sql) === TRUE) {
        // Redireccionar al formulario de registro con el mensaje de registro exitoso
        header("Location: CrearCuenta.php?registro=exitoso");
        exit(); // Asegurarse de que el script se detenga aquí
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
