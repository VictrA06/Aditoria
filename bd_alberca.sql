-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 28-12-2022 a las 02:18:15
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_alberca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actv` int(8) NOT NULL,
  `nombre_actv` varchar(30) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ID` int(11) NOT NULL,
  `nocuenta` varchar(250) NOT NULL,
  `entrada` varchar(250) NOT NULL,
  `salida` varchar(250) NOT NULL,
  `fecha` varchar(250) NOT NULL,
  `STATUS` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(8) NOT NULL,
  `nocuenta` int(8) NOT NULL,
  `date` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `ID` int(11) NOT NULL,
  `entrada` varchar(250) NOT NULL,
  `salida` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_venta`
--

CREATE TABLE `tbl_detalle_venta` (
  `detalle_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `detalle_precio` decimal(9,4) NOT NULL,
  `detalle_cantidad` decimal(9,4) NOT NULL,
  `detalle_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entidad`
--

CREATE TABLE `tbl_entidad` (
  `entidad_id` varchar(11) NOT NULL,
  `entidad_razon_social` varchar(50) NOT NULL,
  `entidad_direccion` varchar(100) NOT NULL,
  `entidad_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `producto_id` int(11) NOT NULL,
  `producto_descripcion` text NOT NULL,
  `producto_precio` decimal(9,4) NOT NULL,
  `producto_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_venta`
--

CREATE TABLE `tbl_venta` (
  `venta_id` int(11) NOT NULL,
  `venta_fecha_hora` datetime NOT NULL,
  `venta_serie` varchar(4) NOT NULL,
  `venta_numero` varchar(8) NOT NULL,
  `entidad_id` int(11) NOT NULL,
  `venta_total` decimal(9,4) NOT NULL,
  `venta_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nocuenta` int(8) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `tipousu` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_pat` varchar(30) NOT NULL,
  `apellido_mat` varchar(30) NOT NULL,
  `horario` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actv`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_detalle_venta`
--
ALTER TABLE `tbl_detalle_venta`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `tbl_entidad`
--
ALTER TABLE `tbl_entidad`
  ADD PRIMARY KEY (`entidad_id`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `entidad_id` (`entidad_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nocuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_venta`
--
ALTER TABLE `tbl_detalle_venta`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `nocuenta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
