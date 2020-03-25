-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-03-2020 a las 00:43:42
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicadental_sql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diente`
--

DROP TABLE IF EXISTS `diente`;
CREATE TABLE IF NOT EXISTS `diente` (
  `id_diente` bigint(20) NOT NULL,
  `nombre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_diente`)
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

DROP TABLE IF EXISTS `estado_reserva`;
CREATE TABLE IF NOT EXISTS `estado_reserva` (
  `cod_est` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_est` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_est`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `ficha_clinica`;
CREATE TABLE IF NOT EXISTS `ficha_clinica` (
  `cod_fic` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_fic` date DEFAULT NULL,
  `observacion_fic` varchar(50) DEFAULT NULL,
  `radiografias_fic` varchar(50) DEFAULT NULL,
  `cod_die` bigint(20) NOT NULL,
  `rut_pro` varchar(12) NOT NULL,
  `rut_pac` varchar(12) NOT NULL,
  PRIMARY KEY (`cod_fic`),
  KEY `cod_die` (`cod_die`),
  KEY `rut_pro` (`rut_pro`),
  KEY `rut_pac` (`rut_pac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

DROP TABLE IF EXISTS `insumo`;
CREATE TABLE IF NOT EXISTS `insumo` (
  `cod_ins` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre_ins` varchar(20) DEFAULT NULL,
  `fecha_ingreso_ins` date DEFAULT NULL,
  `cantidad_ins` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_ins`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupa`
--

DROP TABLE IF EXISTS `ocupa`;
CREATE TABLE IF NOT EXISTS `ocupa` (
  `cod_pedido` bigint(20) NOT NULL,
  `cod_ins` bigint(20) NOT NULL,
  `rut_pro` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`cod_pedido`),
  KEY `cod_ins` (`cod_ins`),
  KEY `rut_pro` (`rut_pro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `rut_pac` varchar(12) NOT NULL,
  `nombres_pac` varchar(30) DEFAULT NULL,
  `apellidos_pac` varchar(30) DEFAULT NULL,
  `correo_pac` varchar(50) DEFAULT NULL,
  `telefono_pac` int(11) DEFAULT NULL,
  PRIMARY KEY (`rut_pac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestaciones`
--

DROP TABLE IF EXISTS `prestaciones`;
CREATE TABLE IF NOT EXISTS `prestaciones` (
  `id_prestaciones` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_prestaciones`)
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

DROP TABLE IF EXISTS `presupuesto`;
CREATE TABLE IF NOT EXISTS `presupuesto` (
  `id_presupuesto` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_diente` bigint(20) NOT NULL,
  `id_prestaciones` int(11) NOT NULL,
  PRIMARY KEY (`id_presupuesto`),
  KEY `id_diente_idx` (`id_diente`),
  KEY `id_prestaciones_idx` (`id_prestaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional`
--

DROP TABLE IF EXISTS `profesional`;
CREATE TABLE IF NOT EXISTS `profesional` (
  `rut_pro` varchar(12) NOT NULL,
  `nombres_pro` varchar(30) DEFAULT NULL,
  `apellidos_pro` varchar(30) DEFAULT NULL,
  `especialidad_pro` varchar(20) DEFAULT NULL,
  `correo_pro` varchar(50) DEFAULT NULL,
  `telefono_pro` int(11) DEFAULT NULL,
  `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rut_pro`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=851 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `cod_res` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_reservada_res` date DEFAULT NULL,
  `fecha_res` date DEFAULT NULL,
  `prestacion_res` varchar(30) DEFAULT NULL,
  `cod_est` bigint(20) NOT NULL,
  `rut_pro` varchar(12) NOT NULL,
  `rut_pac` varchar(12) NOT NULL,
  PRIMARY KEY (`cod_res`),
  KEY `cod_est` (`cod_est`),
  KEY `rut_pro` (`rut_pro`),
  KEY `rut_pac` (`rut_pac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

DROP TABLE IF EXISTS `secretaria`;
CREATE TABLE IF NOT EXISTS `secretaria` (
  `rut_sec` varchar(12) NOT NULL,
  `nombres_sec` varchar(30) DEFAULT NULL,
  `apellidos_sec` varchar(30) DEFAULT NULL,
  `correo_sec` varchar(50) DEFAULT NULL,
  `telefono_sec` int(11) DEFAULT NULL,
  `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rut_sec`),
  KEY `cod_usuario` (`cod_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `pass_usuario` varchar(20) DEFAULT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=182908510 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `pass_usuario`, `tipo_usuario`) VALUES
(839, '1829', 'master'),
(850, '1829', 'profesional');

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
