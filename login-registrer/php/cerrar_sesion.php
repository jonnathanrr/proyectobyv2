<?php
session_start();

echo "Inicio de sesión: <br>";

// Destruir todas las variables de sesión.
$_SESSION = array();
echo "Variables de sesión destruidas: <br>";

// Eliminar la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    echo "Cookie de sesión eliminada: <br>";
    var_dump($_COOKIE); // Imprime el contenido de $_COOKIE para depurar
}

// Finalmente, destruir la sesión.
session_destroy();
echo "Sesión destruida: <br>";

// Redirigir al usuario a la página de inicio.
header("location: ../index.php");
exit();
?>
