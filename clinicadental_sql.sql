-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2020 a las 02:39:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicadental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diente`
--

CREATE TABLE `diente` (
  `id_diente` bigint(20) NOT NULL,
  `nombre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diente`
--

INSERT INTO `diente` (`id_diente`, `nombre`) VALUES
(1, 11),
(2, 12),
(3, 13),
(4, 14),
(5, 15),
(6, 16),
(7, 17),
(8, 18),
(9, 21),
(10, 22),
(11, 23),
(12, 24),
(13, 25),
(14, 26),
(15, 27),
(16, 28),
(17, 31),
(18, 32),
(19, 33),
(20, 34),
(21, 35),
(22, 36),
(23, 37),
(24, 38),
(25, 41),
(26, 42),
(27, 43),
(28, 44),
(29, 45),
(30, 46),
(31, 47),
(32, 48);

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
-- Estructura de tabla para la tabla `prestaciones`
--

CREATE TABLE `prestaciones` (
  `id_prestaciones` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestaciones`
--

INSERT INTO `prestaciones` (`id_prestaciones`, `nombre`) VALUES
(1, 'Cirugía Dental'),
(2, 'Endodoncia'),
(3, 'Imagenología'),
(4, 'Odontopediatra'),
(5, 'Ortodoncia'),
(6, 'Periodoncia'),
(7, 'Rehabilitacion ora'),
(8, 'Coronas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `id_presupuesto` bigint(20) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_diente` bigint(20) NOT NULL,
  `id_prestaciones` int(11) NOT NULL
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
  `pass_pro` varchar(200) NOT NULL,
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
  `hora` varchar(10) NOT NULL,
  `id_prestaciones` bigint(20) NOT NULL,
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
  `nombres_sec` varchar(30) NOT NULL,
  `apellidos_sec` varchar(30) NOT NULL,
  `correo_sec` varchar(50) NOT NULL,
  `telefono_sec` int(11) NOT NULL,
  `pass_sec` varchar(200) NOT NULL,
  `cod_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` bigint(20) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `pass_usuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `tipo_usuario`, `pass_usuario`) VALUES
(839, 'master', 'admin'),
(842, 'secretaria', ''),
(850, 'profesional', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diente`
--
ALTER TABLE `diente`
  ADD PRIMARY KEY (`id_diente`);

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
-- Indices de la tabla `prestaciones`
--
ALTER TABLE `prestaciones`
  ADD PRIMARY KEY (`id_prestaciones`);

--
-- Indices de la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD PRIMARY KEY (`id_presupuesto`),
  ADD KEY `id_diente_idx` (`id_diente`),
  ADD KEY `id_prestaciones_idx` (`id_prestaciones`);

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
  ADD KEY `rut_pac` (`rut_pac`),
  ADD KEY `id_prestaciones` (`id_prestaciones`);

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
  MODIFY `id_presupuesto` bigint(20) NOT NULL AUTO_INCREMENT;

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
  MODIFY `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=843;

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
  ADD CONSTRAINT `ficha_clinica_ibfk_1` FOREIGN KEY (`cod_die`) REFERENCES `diente` (`id_diente`),
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
  ADD CONSTRAINT `id_diente` FOREIGN KEY (`id_diente`) REFERENCES `diente` (`id_diente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
