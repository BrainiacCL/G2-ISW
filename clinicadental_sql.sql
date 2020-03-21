-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2020 a las 04:09:17
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicadental.sql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diente`
--

CREATE TABLE `diente` (
  `cod_die` bigint(20) NOT NULL,
  `numero_die` int(11) DEFAULT NULL,
  `tipo_die` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_reserva`
--

CREATE TABLE `estado_reserva` (
  `cod_est` bigint(20) NOT NULL,
  `tipo_est` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_reserva`
--

INSERT INTO `estado_reserva` (`cod_est`, `tipo_est`) VALUES
(1, 'activa'),
(2, 'confirmada'),
(3, 'cancelada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_clinica`
--

CREATE TABLE `ficha_clinica` (
  `cod_fic` bigint(20) NOT NULL,
  `fecha_fic` date DEFAULT NULL,
  `observacion_fic` varchar(50) DEFAULT NULL,
  `radiografias_fic` varchar(50) DEFAULT NULL,
  `cod_die` bigint(20) NOT NULL,
  `rut_pro` varchar(12) NOT NULL,
  `rut_pac` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `cod_ins` bigint(20) NOT NULL,
  `nombre_ins` varchar(20) DEFAULT NULL,
  `fecha_ingreso_ins` date DEFAULT NULL,
  `cantidad_ins` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupa`
--

CREATE TABLE `ocupa` (
  `cod_pedido` bigint(20) NOT NULL,
  `cod_ins` bigint(20) NOT NULL,
  `rut_pro` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `rut_pac` varchar(12) NOT NULL,
  `nombres_pac` varchar(30) DEFAULT NULL,
  `apellidos_pac` varchar(30) DEFAULT NULL,
  `correo_pac` varchar(50) DEFAULT NULL,
  `telefono_pac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `cod_pre` bigint(20) NOT NULL,
  `tipo_pre` varchar(15) DEFAULT NULL,
  `prestacion_pre` varchar(30) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `descuento_pre` varchar(10) DEFAULT NULL,
  `total_pre` int(11) DEFAULT NULL,
  `rut_pac` varchar(12) NOT NULL,
  `rut_pro` varchar(12) NOT NULL,
  `cod_die` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

CREATE TABLE `profesional` (
  `rut_pro` varchar(12) NOT NULL,
  `nombres_pro` varchar(30) DEFAULT NULL,
  `apellidos_pro` varchar(30) DEFAULT NULL,
  `especialidad_pro` varchar(20) DEFAULT NULL,
  `correo_pro` varchar(50) DEFAULT NULL,
  `telefono_pro` int(11) DEFAULT NULL,
  `cod_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `cod_res` bigint(20) NOT NULL,
  `fecha_reservada_res` date DEFAULT NULL,
  `fecha_res` date DEFAULT NULL,
  `prestacion_res` varchar(30) DEFAULT NULL,
  `cod_est` bigint(20) NOT NULL,
  `rut_pro` varchar(12) NOT NULL,
  `rut_pac` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE `secretaria` (
  `rut_sec` varchar(12) NOT NULL,
  `nombres_sec` varchar(30) DEFAULT NULL,
  `apellidos_sec` varchar(30) DEFAULT NULL,
  `correo_sec` varchar(50) DEFAULT NULL,
  `telefono_sec` int(11) DEFAULT NULL,
  `cod_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` bigint(20) NOT NULL,
  `pass_usuario` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `pass_usuario`, `tipo_usuario`) VALUES
(839, '1829', 'master'),
(850, '1829', 'profesional');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diente`
--
ALTER TABLE `diente`
  ADD PRIMARY KEY (`cod_die`);

--
-- Indices de la tabla `estado_reserva`
--
ALTER TABLE `estado_reserva`
  ADD PRIMARY KEY (`cod_est`);

--
-- Indices de la tabla `ficha_clinica`
--
ALTER TABLE `ficha_clinica`
  ADD PRIMARY KEY (`cod_fic`),
  ADD KEY `cod_die` (`cod_die`),
  ADD KEY `rut_pro` (`rut_pro`),
  ADD KEY `rut_pac` (`rut_pac`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`cod_ins`);

--
-- Indices de la tabla `ocupa`
--
ALTER TABLE `ocupa`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cod_ins` (`cod_ins`),
  ADD KEY `rut_pro` (`rut_pro`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`rut_pac`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`cod_pre`),
  ADD KEY `rut_pac` (`rut_pac`),
  ADD KEY `rut_pro` (`rut_pro`),
  ADD KEY `cod_die` (`cod_die`);

--
-- Indices de la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`rut_pro`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`cod_res`),
  ADD KEY `cod_est` (`cod_est`),
  ADD KEY `rut_pro` (`rut_pro`),
  ADD KEY `rut_pac` (`rut_pac`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD PRIMARY KEY (`rut_sec`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_reserva`
--
ALTER TABLE `estado_reserva`
  MODIFY `cod_est` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ficha_clinica`
--
ALTER TABLE `ficha_clinica`
  MODIFY `cod_fic` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `cod_ins` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  MODIFY `cod_pre` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesional`
--
ALTER TABLE `profesional`
  MODIFY `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=851;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `cod_res` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
  MODIFY `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182908510;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha_clinica`
--
ALTER TABLE `ficha_clinica`
  ADD CONSTRAINT `ficha_clinica_ibfk_1` FOREIGN KEY (`cod_die`) REFERENCES `diente` (`cod_die`),
  ADD CONSTRAINT `ficha_clinica_ibfk_2` FOREIGN KEY (`rut_pro`) REFERENCES `profesional` (`rut_pro`),
  ADD CONSTRAINT `ficha_clinica_ibfk_3` FOREIGN KEY (`rut_pac`) REFERENCES `paciente` (`rut_pac`);

--
-- Filtros para la tabla `ocupa`
--
ALTER TABLE `ocupa`
  ADD CONSTRAINT `ocupa_ibfk_1` FOREIGN KEY (`cod_ins`) REFERENCES `insumo` (`cod_ins`),
  ADD CONSTRAINT `ocupa_ibfk_2` FOREIGN KEY (`rut_pro`) REFERENCES `profesional` (`rut_pro`);

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`rut_pac`) REFERENCES `paciente` (`rut_pac`),
  ADD CONSTRAINT `presupuesto_ibfk_2` FOREIGN KEY (`rut_pro`) REFERENCES `profesional` (`rut_pro`),
  ADD CONSTRAINT `presupuesto_ibfk_3` FOREIGN KEY (`cod_die`) REFERENCES `diente` (`cod_die`);

--
-- Filtros para la tabla `profesional`
--
ALTER TABLE `profesional`
  ADD CONSTRAINT `profesional_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_est`) REFERENCES `estado_reserva` (`cod_est`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`rut_pro`) REFERENCES `profesional` (`rut_pro`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`rut_pac`) REFERENCES `paciente` (`rut_pac`);

--
-- Filtros para la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `secretaria_ibfk_1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
