-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 01:57:27
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
-- Base de datos: `elecciones2023`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron`
--

CREATE TABLE `padron` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `voto` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `padron`
--

INSERT INTO `padron` (`id`, `nombre`, `apellido`, `dni`, `voto`) VALUES
(1, 'Mauro Agustín', 'Lucero', '40319143', 0),
(3, 'Nerio Fernando', 'Lucero', '18206248', 0),
(84, 'Juan', 'Perez', '12345678', 0),
(85, 'María', 'González', '23456789', 0),
(86, 'Carlos', 'López', '34567890', 0),
(87, 'Laura', 'Martínez', '45678901', 0),
(88, 'Federico', 'Rodríguez', '56789012', 0),
(89, 'Ana', 'Fernández', '67890123', 0),
(90, 'Martín', 'Gómez', '78901234', 0),
(91, 'Luisa', 'Díaz', '89012345', 0),
(92, 'Diego', 'Hernández', '90123456', 0),
(93, 'Valentina', 'Suárez', '11223344', 1),
(94, 'Sebastián', 'Ramírez', '22334455', 1),
(95, 'Camila', 'Torres', '33445566', 0),
(96, 'Facundo', 'Cabrera', '44556677', 1),
(97, 'Agustina', 'Sánchez', '55667788', 0),
(98, 'Ezequiel', 'Moreno', '66778899', 0),
(99, 'Catalina', 'Luna', '77889900', 0),
(100, 'Ignacio', 'Giménez', '88990011', 0),
(101, 'Paula', 'Vargas', '99001122', 0),
(102, 'Alejandro', 'Ortiz', '11122233', 1),
(103, 'Lucía', 'Castro', '22233344', 0),
(104, 'Mariano', 'Ríos', '33344455', 0),
(105, 'Sol', 'Peralta', '44455566', 0),
(106, 'Gabriel', 'Molina', '55566677', 0),
(107, 'Julia', 'Ocampo', '66677788', 0),
(108, 'Lucas', 'Ferreyra', '77788899', 0),
(109, 'Victoria', 'Aguirre', '88899900', 0),
(110, 'Tomás', 'Silva', '99900011', 0),
(111, 'Juana', 'Benítez', '1111222', 0),
(112, 'Matías', 'Vega', '22223333', 0),
(113, 'Rocío', 'Navarro', '33334444', 0),
(114, 'Joaquín', 'Romero', '44445555', 0),
(115, 'Celeste', 'Gutiérrez', '55556666', 0),
(116, 'Bruno', 'Mendez', '66667777', 0),
(117, 'Silvina', 'López', '77778888', 0),
(118, 'Luciano', 'Cruz', '88889999', 0),
(119, 'Bianca', 'Maldonado', '99990000', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urna`
--

CREATE TABLE `urna` (
  `id` int(11) NOT NULL,
  `bregman` int(8) DEFAULT NULL,
  `bullrich` int(8) DEFAULT NULL,
  `massa` int(8) DEFAULT NULL,
  `milei` int(8) DEFAULT NULL,
  `schiaretti` int(8) DEFAULT NULL,
  `blanco` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `urna`
--

INSERT INTO `urna` (`id`, `bregman`, `bullrich`, `massa`, `milei`, `schiaretti`, `blanco`) VALUES
(14, NULL, NULL, NULL, NULL, 1, NULL),
(15, NULL, NULL, NULL, NULL, 1, NULL),
(16, NULL, 1, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `padron`
--
ALTER TABLE `padron`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `urna`
--
ALTER TABLE `urna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `padron`
--
ALTER TABLE `padron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `urna`
--
ALTER TABLE `urna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
