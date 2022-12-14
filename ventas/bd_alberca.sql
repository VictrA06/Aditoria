-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2019 a las 23:33:37
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Volcado de datos para la tabla `tbl_detalle_venta`
--

INSERT INTO `tbl_detalle_venta` (`detalle_id`, `venta_id`, `producto_id`, `detalle_precio`, `detalle_cantidad`, `detalle_estado`) VALUES
(1, 1, 2, '65.0000', '10.0000', 0),
(2, 1, 1, '60.0000', '5.0000', 0),
(3, 1, 1, '60.0000', '150.0000', 0),
(4, 2, 3, '90.0000', '12.0000', 1),
(5, 2, 2, '65.0000', '20.0000', 0),
(6, 1, 2, '65.0000', '20.0000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_entidad`
--

CREATE TABLE `tbl_entidad` (
  `entidad_id` int(11) NOT NULL,
  `entidad_ruc_dni` varchar(11) NOT NULL,
  `entidad_razon_social` varchar(50) NOT NULL,
  `entidad_direccion` varchar(100) NOT NULL,
  `entidad_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_entidad`
--

INSERT INTO `tbl_entidad` (`entidad_id`, `entidad_ruc_dni`, `entidad_razon_social`, `entidad_direccion`, `entidad_estado`) VALUES
(1, '12345678', 'Rodrigo Avalos', 'Ilo abc', 1),
(2, '20533011854', 'JyK Avalos Servicios Generales S.R.L.', 'Enace 1-14 Ilo - Moquegua - Peru', 1),
(3, '12345678', 'Rodrigo Avalos', 'Mi casa frente al mar', 1),
(4, '71579779', 'Kevin Rodrigo Avalos Cama', 'Enace 1-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `producto_id` int(11) NOT NULL,
  `producto_descripcion` text NOT NULL,
  `producto_unidad` varchar(10) NOT NULL,
  `producto_precio` decimal(9,4) NOT NULL,
  `producto_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`producto_id`, `producto_descripcion`, `producto_unidad`, `producto_precio`, `producto_estado`) VALUES
(1, 'Teclado de escritorio marca xxx', 'Und', '60.0000', 1),
(2, 'Mouse optico marca xxx', 'Und', '65.0000', 1),
(3, 'Estabilizador de energia 220v', 'Und', '90.0000', 1),
(4, '', '', '0.0000', 1),
(5, '', '', '0.0000', 1),
(6, '', '', '0.0000', 1);

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

--
-- Volcado de datos para la tabla `tbl_venta`
--

INSERT INTO `tbl_venta` (`venta_id`, `venta_fecha_hora`, `venta_serie`, `venta_numero`, `entidad_id`, `venta_total`, `venta_estado`) VALUES
(1, '2019-05-25 01:02:12', 'F001', '00000001', 2, '1300.0000', 1),
(2, '2019-05-25 01:06:32', 'F001', '00000002', 4, '1080.0000', 1);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_venta`
--
ALTER TABLE `tbl_detalle_venta`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_entidad`
--
ALTER TABLE `tbl_entidad`
  MODIFY `entidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
