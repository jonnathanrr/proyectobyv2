<?php

use PHPUnit\Framework\TestCase;

class AutenticacionTest extends TestCase
{
    public function testInicioSesionDatosValidos()
    {
        // Simulamos una solicitud POST con datos válidos
        $_POST['Usuario'] = 'usuario_valido';
        $_POST['Clave'] = 'clave_valida';

        // Ejecutamos el script que procesa el inicio de sesión
        ob_start();
        include 'IniciarSesion.php';
        $output = ob_get_clean();

        // Verificamos si el script redirige correctamente
        $this->assertStringContainsString('Location: inicio.php', xdebug_get_headers());

        // También podríamos verificar otros aspectos, como si se establece correctamente la sesión, etc.
    }

    public function testInicioSesionDatosInvalidos()
    {
        // Simulamos una solicitud POST con datos incorrectos
        $_POST['Usuario'] = 'usuario_invalido';
        $_POST['Clave'] = 'clave_invalida';

        // Ejecutamos el script que procesa el inicio de sesión
        ob_start();
        include 'IniciarSesion.php';
        $output = ob_get_clean();

        // Verificamos si el script redirige correctamente a la página de inicio de sesión con un mensaje de error
        $this->assertStringContainsString('Location: IniciarSesion.php?error=', xdebug_get_headers());

        // También podríamos verificar que se muestra el mensaje de error correcto en la página
    }
}
