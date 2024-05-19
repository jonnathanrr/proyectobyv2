<?php

use PHPUnit\Framework\TestCase;

// Incluye el archivo que contiene la lógica de autenticación
require_once 'C:\xampp\htdocs\proyectoByV\AutenticacionTest2.php';

class AutenticacionTest2 extends TestCase
{
    public function testValidacionUsuarioClaveVacios()
    {
        // Simular una solicitud POST con datos vacíos
        $_POST['Usuario'] = '';
        $_POST['Clave'] = '';

        // Ejecutar la función de autenticación
        autenticarUsuario();

        // Verificar si la redirección se realiza correctamente
        $this->assertContains('?error=El Usuario Es Requerido', $_SESSION['redireccion']);
    }

    public function testAutenticacionUsuarioClaveCorrectos()
    {
        // Simular una solicitud POST con datos válidos
        $_POST['Usuario'] = 'nombredeusuario';
        $_POST['Clave'] = 'contraseña';

        // Ejecutar la función de autenticación
        autenticarUsuario();

        // Verificar si la sesión se inicia correctamente
        $this->assertEquals('nombredeusuario', $_SESSION['Usuario']);
        // Agrega más aserciones según sea necesario
    }

    // Puedes agregar más pruebas para casos adicionales, como usuario incorrecto, clave incorrecta, etc.
}
