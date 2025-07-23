-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2025 a las 04:54:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `organizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `Id_Donacion` int(12) NOT NULL,
  `Monto` int(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Proyecto` varchar(12) NOT NULL,
  `Id_Donante` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`Id_Donacion`, `Monto`, `Fecha`, `Id_Proyecto`, `Id_Donante`) VALUES
(10, 150000, '2025-07-14', 'P004', 1111),
(11, 850000, '2025-07-14', 'P002', 2222),
(12, 1000000, '2025-07-14', 'P004', 3333),
(13, 150000, '2025-07-14', 'P003', 1111),
(14, 250000, '2025-07-14', 'P001	', 4444),
(15, 100000, '2025-07-15', 'P003', 2222),
(16, 1000000, '2025-07-15', 'P001	', 4444),
(17, 150000, '2025-07-15', 'P003', 1111),
(18, 700000, '2025-07-15', 'P004', 3333),
(19, 700000, '2025-07-15', 'P001	', 3333),
(20, 300000, '2025-07-15', 'P002', 4444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE `donante` (
  `Id_Donante` int(12) NOT NULL,
  `Nombre` text NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`Id_Donante`, `Nombre`, `Correo`, `Direccion`, `Telefono`) VALUES
(1111, 'Eduardo', 'ep@sss.cl', 'Miami', 1111111),
(2222, 'Juan', 'jm@ggg.cl', 'NY', 2222222),
(3333, 'Samuel', 'sm@fff.cl', 'Por Ahi 123', 55556633),
(4444, 'Luis', 'lp@ggg.cl', 'Co', 11445588);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `Id_Proyecto` varchar(12) NOT NULL,
  `Nombre` text NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Presupuesto` int(15) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Termino` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`Id_Proyecto`, `Nombre`, `Descripcion`, `Presupuesto`, `Fecha_Inicio`, `Fecha_Termino`) VALUES
('P001	', 'Fundacion AA', 'Fundacion destinada a ayudar gente con problema de bebidas', 1500000, '2024-12-15', '2027-12-15'),
('P002', 'Fundacion una mano', 'Fundacion destinada a ayudar con gente en situacion de calle	', 2250000, '2025-01-20', '2026-01-20'),
('P003', 'Pepito ayuda', 'Institucion destinada a ayudar a los pepitos', 1050000, '2024-05-12', '2025-09-12'),
('P004', 'Hogar de mascota', 'Institucion destinada a colaborar con animales maltratados', 4500000, '2025-01-30', '2026-01-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`Id_Donacion`),
  ADD KEY `Id_Donante` (`Id_Donante`),
  ADD KEY `donacion_ibfk_2` (`Id_Proyecto`);

--
-- Indices de la tabla `donante`
--
ALTER TABLE `donante`
  ADD PRIMARY KEY (`Id_Donante`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Id_Proyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `Id_Donacion` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD CONSTRAINT `donacion_ibfk_1` FOREIGN KEY (`Id_Donante`) REFERENCES `donante` (`Id_Donante`),
  ADD CONSTRAINT `donacion_ibfk_2` FOREIGN KEY (`Id_Proyecto`) REFERENCES `proyecto` (`Id_proyecto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
