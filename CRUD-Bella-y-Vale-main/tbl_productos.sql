-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2024 a las 03:37:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_sena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen_producto` varchar(255) DEFAULT NULL,
  `fecha_creacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id`, `nombre`, `marca`, `categoria`, `precio`, `descripcion`, `imagen_producto`, `fecha_creacion`) VALUES
(1, 'Italia', 'ByV', 'Maletín', 55000.00, 'Nueva colección REF Italia importado.', '08bd5482ac.jpeg', '2024-04-28'),
(2, 'Julieta', 'ByV', 'Bolso', 65000.00, 'Nueva colección REF Julieta importado.', 'd2ad70cdfa.jpeg', '2024-04-28'),
(3, 'Roma', 'ByV', 'Cartera', 70000.00, 'Nueva colección REF Roma importado.', '065949096c.jpeg', '2024-04-28'),
(8, 'Roma', 'ByV', 'Bolso', 80000.00, 'Nueva colección REF Roma importado.', '4ebfb03edc.jpeg', '2024-04-28'),
(9, 'París', 'ByV', 'Correa', 25000.00, 'Colección correas 2024', '0d93a19d49.jpeg', '2024-04-28'),
(10, 'Billetera Dama', 'ByV', 'Billetera', 200000.00, 'Billetera Dama nueva colección', 'bbd3e89821.jpeg', '2024-04-28'),
(11, 'Billetera Man', 'ByV', 'Billetera', 100000.00, 'Billetera masculina 2024', 'a1062c41f5.jpeg', '2024-04-28'),
(30, 'Llavero Lila', 'ByV', 'Llaveros', 20000.00, 'Nuevo llavero Lila para niñas', '15d0deb3ee.jpeg', '2024-05-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
