<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta preparada para obtener la contraseña del usuario
$stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->bind_result($contrasena_hash);
$stmt->fetch();
$stmt->close();

// Verificar si se encontró un usuario con el correo proporcionado
if ($contrasena_hash) {
    // Verificar si la contraseña coincide utilizando password_verify()
    if (password_verify($contrasena, $contrasena_hash)) {
        // Contraseña válida, iniciar sesión
        $_SESSION['usuario'] = $correo;
        header("location: ../bienvenida.php");
        exit;
    } else {
        // Contraseña incorrecta, mostrar mensaje de error
        echo '        
            <script>
                alert("Contraseña incorrecta, por favor verifica los datos introducidos");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
} else {
    // Usuario no encontrado, mostrar mensaje de error
    echo '        
        <script>
            alert("Usuario no existe, por favor verifica los datos introducidos");
            window.location = "../index.php";
        </script>
    ';
    exit;
}
?>
