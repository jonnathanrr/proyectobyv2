<?php

use PHPUnit\Framework\TestCase;

class MiPruebaTest extends TestCase
{
    public function testSuma()
    {
        // Arrange
        $a = 2;
        $b = 3;

        // Act
        $resultado = $a + $b;

        // Assert
        $this->assertEquals(5, $resultado);
    }

    public function testResta()
    {
        // Arrange
        $a = 5;
        $b = 2;

        // Act
        $resultado = $a - $b;

        // Assert
        $this->assertEquals(3, $resultado);
    }
}
