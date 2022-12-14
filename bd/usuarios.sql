-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 05:39:42
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `externos`
--

CREATE TABLE `externos` (
  `nocuenta` int(8) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_pat` varchar(30) NOT NULL,
  `apellido_mat` int(30) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `externos`
--

INSERT INTO `externos` (`nocuenta`, `tipo`, `nombre`, `apellido_pat`, `apellido_mat`, `horario`, `pass`, `archivo`) VALUES
(111111, 'Adulto', 'Pablo', 'Selva', 0, 'Martes, Jueves, Sábado', '1111', 'archivos/10-27-22-05-35-39-Screenshot_2016-11-06-15-31-55_2.png'),
(12223345, 'Niño', 'Pablo', 'Lopez', 0, 'Martes, Jueves, Sábado', '1111', 'archivos/10-27-22-05-36-50-logo1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internos`
--

CREATE TABLE `internos` (
  `nocuenta` int(7) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_pat` varchar(30) NOT NULL,
  `apellido_mat` varchar(30) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `externos`
--
ALTER TABLE `externos`
  ADD PRIMARY KEY (`nocuenta`);

--
-- Indices de la tabla `internos`
--
ALTER TABLE `internos`
  ADD PRIMARY KEY (`nocuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `externos`
--
ALTER TABLE `externos`
  MODIFY `nocuenta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12223346;

--
-- AUTO_INCREMENT de la tabla `internos`
--
ALTER TABLE `internos`
  MODIFY `nocuenta` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12123457;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
