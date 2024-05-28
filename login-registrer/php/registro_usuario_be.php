    <?php
    session_start();
    include 'conexion_be.php';

    // Verificar si se enviaron los datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar que los campos obligatorios no estén vacíos
        if (!empty($_POST['nombre_completo']) && !empty($_POST['correo']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
            // Obtener los datos del formulario
            $nombre_completo = $_POST['nombre_completo'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

            // Usar sentencias preparadas para prevenir inyecciones SQL
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nombre_completo, $correo, $usuario, $hashed_password);

            // Ejecutar la consulta preparada
            if ($stmt->execute()) {
                
                echo '
                    <script>
                        alert("Registro exitoso");
                        window.location = "../index.php";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Error al registrarse, intente nuevamente");
                        window.location = "../index.php";
                    </script>
                ';
            }

            // Cerrar la consulta preparada y la conexión a la base de datos
            $stmt->close();
            $conexion->close();
        } else {
            // Redirigir de vuelta al formulario de registro si hay campos vacíos
            echo '
                <script>
                    alert("Por favor, llene todos los campos obligatorios");
                    window.location = "../index.php";
                </script>
            ';
        }
    } else {
        // Redirigir de vuelta al formulario de registro si no se envió el formulario
        header("location: ../index.php");
        exit();
    }
    ?>
