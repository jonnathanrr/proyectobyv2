<?php
// Establecer el tiempo de vida de la sesión en segundos
$inactividad = 900; // 15 minutos

// Comprobar si hay una sesión activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    echo '
        <script>
            alert("Por favor debes iniciar sesión");
            window.location = "index.php";
        </script>
    ';
    session_destroy();
    exit();
}

// Comprobar si la sesión ha expirado por inactividad
if (isset($_SESSION['tiempo']) && (time() - $_SESSION['tiempo']) > $inactividad) {
    session_unset();     // Unset all session values
    session_destroy();   // Destroy session data
    echo '
        <script>
            alert("Tu sesión ha expirado por inactividad");
            window.location = "index.php";
        </script>
    ';
    exit();
}

// Actualizar el tiempo de la sesión
$_SESSION['tiempo'] = time();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        /* Estilos CSS para el cuerpo del documento */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/proyectoByV2/img/cuerroo.jpg'); /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* Estilos CSS para el contenedor principal */
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Estilos CSS para el título */
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Estilos CSS para los botones */
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Estilos CSS para el enlace de CRUD */
        .crud-link {
            margin-top: 20px;
        }

        .crud-link a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .crud-link a:hover {
            background-color: #0056b3;
        }
        /* Estilos CSS específicos para el botón "Salir" */
        .logout-button {
            margin-top: 20px; /* Agrega un margen superior para separar el botón "Salir" del botón "Administrar tus Productos" */
        }
    </style>
</head> 
<body>
    <div class="container">
        <h1>Bienvenid@, <?php echo htmlspecialchars($_SESSION['usuario']); ?> <br> a Bella y Vale</h1>
        <div class="crud-link">
        <a href="/proyectoByV2/CRUD-Bella-y-Vale-main/index.php">Administra tus Productos</a>
    </div>
    <div class="container">
        <form action="php/cerrar_sesion.php" method="post">
            <button type="submit">Salir</button>
        </form>
    </div>
    
</body>
</html>
