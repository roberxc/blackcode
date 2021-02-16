-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2021 a las 17:19:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blackcode`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Eliminar Administración` ()  NO SQL
BEGIN
DELETE FROM costosfijos;
DELETE FROM tipocostosfijos;
DELETE FROM egresocaja;	
DELETE FROM ingresocaja;
DELETE FROM cajachica;
DELETE FROM destinatario;
DELETE FROM asistencia_personal;
DELETE FROM documentacion_personal;
DELETE FROM personal;
 		 	
			 		 	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Eliminar Operación` ()  NO SQL
BEGIN
 		 	
DELETE FROM asistencia_trabajo;	
DELETE FROM materialesantes;	 	
DELETE FROM materialesbodega;	 	
DELETE FROM materialesdurante;
DELETE FROM ingreso;
DELETE FROM gastos;	
DELETE FROM tipogasto;
DELETE FROM detalletrabajodiario;	
DELETE FROM tipodocumento;
DELETE FROM trabajodiario;
DELETE FROM codigoservicio;

	 		 	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Eliminar Vehículo` ()  NO SQL
BEGIN
 DELETE FROM mantencion;
 DELETE FROM vehiculo;
 DELETE FROM detalle_vehiculo;
 DELETE FROM taller;
 DELETE FROM mecanico;
 DELETE FROM combustible;	
			 		 	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarProyecto` ()  NO SQL
BEGIN
DELETE FROM despiece;
DELETE FROM fletes;	
DELETE FROM etapas;	
DELETE FROM porcentaje;	
DELETE FROM flete_traslado;	
DELETE FROM evaluacion;
DELETE FROM detalle_evaluacion;
DELETE FROM partidas;
 		 		 	
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_personal`
--

CREATE TABLE `asistencia_personal` (
  `id_asistencia` int(11) NOT NULL,
  `fecha_asistencia` varchar(20) NOT NULL,
  `horallegadam` varchar(20) DEFAULT NULL,
  `horasalidam` varchar(20) NOT NULL,
  `horallegadat` varchar(20) NOT NULL,
  `horasalidat` varchar(20) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `horastrabajadas` varchar(20) DEFAULT NULL,
  `horasextras` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia_personal`
--

INSERT INTO `asistencia_personal` (`id_asistencia`, `fecha_asistencia`, `horallegadam`, `horasalidam`, `horallegadat`, `horasalidat`, `id_personal`, `horastrabajadas`, `horasextras`, `estado`) VALUES
(115, '2021-02-20', '08:30', '14:00', '15:00', '18:30', 16, '9', '0', 1),
(116, '2021-02-17', '08:30', '14:00', '15:00', '18:30', 17, '9', '0', 1),
(117, '2021-02-27', '08:30', '14:00', '15:00', '19:30', 18, '10', '01', 1),
(118, '2021-03-18', '08:30', '14:00', '15:00', '19:30', 19, '10', '01', 1),
(119, '2021-03-20', '08:30', '14:00', '15:00', '19:00', 20, '09', '0.5', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajachica`
--

CREATE TABLE `cajachica` (
  `id_cajachica` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigoservicio`
--

CREATE TABLE `codigoservicio` (
  `id_codigo` int(11) NOT NULL,
  `codigoservicio` varchar(20) NOT NULL,
  `id_tipotrabajo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigoservicio`
--

INSERT INTO `codigoservicio` (`id_codigo`, `codigoservicio`, `id_tipotrabajo`) VALUES
(12, 'MN001', 5),
(13, 'CP001', 4),
(14, 'MN002', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `patente` varchar(8) NOT NULL,
  `conductor` varchar(100) NOT NULL,
  `estacion` varchar(100) NOT NULL,
  `litros` float NOT NULL,
  `valor` float NOT NULL,
  `doc_ad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costosfijos`
--

CREATE TABLE `costosfijos` (
  `id_costofijos` int(11) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `valor` int(11) NOT NULL,
  `detalle` varchar(120) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `costosfijos`
--

INSERT INTO `costosfijos` (`id_costofijos`, `fecha`, `valor`, `detalle`, `id_tipo`, `estado`) VALUES
(1, '2021-02-19', 15000, 'fsdfsfdsdfsdsf', 1, 1),
(2, '2021-03-12', 6000, 'ghghhgj', 1, 0),
(3, '2021-02-28', 3445345, 'fefsdfsd', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id_cotizacion` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `nrocotizacion` int(11) NOT NULL,
  `ubicaciondocumento` varchar(100) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_cotizacion`, `fecha`, `nrocotizacion`, `ubicaciondocumento`, `id_proveedor`) VALUES
(17, '2021-02-18', 887, 'cipdf_150221020726.pdf', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_materiales`
--

CREATE TABLE `cotizacion_materiales` (
  `id_cotizacionmaterial` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `preciounitario` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizacion_materiales`
--

INSERT INTO `cotizacion_materiales` (`id_cotizacionmaterial`, `id_cotizacion`, `id_material`, `preciounitario`, `importe`, `cantidad`) VALUES
(1, 17, 6, 2100, 14994, 6),
(2, 17, 7, 24000, 228480, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despiece`
--

CREATE TABLE `despiece` (
  `id_despiece` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_etapas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `despiece`
--

INSERT INTO `despiece` (`id_despiece`, `cantidad`, `item`, `precio_unitario`, `total`, `id_etapas`) VALUES
(28, 10, 'nose', 10000, 100000, 35),
(29, 20, 'nose1', 20000, 400000, 35),
(30, 30, 'nose22', 30000, 900000, 36),
(31, 50, 'nose44', 400000, 20000000, 36),
(32, 30, 'noseque hacer', 201020, 6030600, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinatario`
--

CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL,
  `nombredestinatario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleentrada`
--

CREATE TABLE `detalleentrada` (
  `id_detalleentrada` int(11) NOT NULL,
  `id_entrada` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `fechaentrada` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesalida`
--

CREATE TABLE `detallesalida` (
  `id_detallesalida` int(11) NOT NULL,
  `id_salida` int(11) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `fechasalida` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletrabajodiario`
--

CREATE TABLE `detalletrabajodiario` (
  `id_detalletrabajo` int(11) NOT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL,
  `id_tipodocumento` int(11) DEFAULT NULL,
  `imagen` varchar(40) NOT NULL,
  `ubicacion` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_evaluacion`
--

CREATE TABLE `detalle_evaluacion` (
  `id_detalle` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_evaluacion`
--

INSERT INTO `detalle_evaluacion` (`id_detalle`, `dias`, `tipo`) VALUES
(10, 4, 'Instalacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vehiculo`
--

CREATE TABLE `detalle_vehiculo` (
  `id_detalle_vehiculo` int(11) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `color` varchar(200) NOT NULL,
  `tipomotor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion_empresa`
--

CREATE TABLE `documentacion_empresa` (
  `id_documentos` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` varchar(120) DEFAULT NULL,
  `ubicacion` varchar(120) DEFAULT NULL,
  `fechalimite` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentacion_empresa`
--

INSERT INTO `documentacion_empresa` (`id_documentos`, `nombre`, `fecha`, `ubicacion`, `fechalimite`, `tipo`) VALUES
(24, 'asfdadfdsaf', '04/02/2021', 'permisos_legales_totales.pdf', '2021-02-08', '1'),
(25, 'hggggggggggggggggggg', '04/02/2021', 'Factura45.pdf', '2021-02-21', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion_personal`
--

CREATE TABLE `documentacion_personal` (
  `id_documentos` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` varchar(120) DEFAULT NULL,
  `ubicacion` varchar(120) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion_proyecto`
--

CREATE TABLE `documentacion_proyecto` (
  `id_documentos` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` varchar(120) DEFAULT NULL,
  `ubicacion` varchar(120) DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresocaja`
--

CREATE TABLE `egresocaja` (
  `id_egresocaja` int(11) NOT NULL,
  `fechaegreso` varchar(50) NOT NULL,
  `montoegreso` int(11) DEFAULT NULL,
  `id_destinatario` int(11) DEFAULT NULL,
  `vuelto` int(11) DEFAULT NULL,
  `id_cajachica` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `detalle` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `cantidadingresada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `entrada`
--
DELIMITER $$
CREATE TRIGGER `actualizardetalleentrada` AFTER INSERT ON `entrada` FOR EACH ROW UPDATE detalleentrada SET detalleentrada.id_entrada = NEW.id_entrada, detalleentrada.fechaentrada = (CURDATE()) WHERE detalleentrada.id_detalleentrada = (select detalleentrada.id_detalleentrada from detalleentrada order by detalleentrada.id_detalleentrada desc LIMIT 1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `id_etapas` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_partidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id_etapas`, `nombre`, `estado`, `id_partidas`) VALUES
(35, 'etapa1', 1, 26),
(36, 'etapa2', 1, 26),
(37, 'etapa3', 1, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id_evaluacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `id_partidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id_evaluacion`, `cantidad`, `item`, `precio_unitario`, `total`, `id_detalle`, `id_partidas`) VALUES
(22, 2, 'insta', 30000, 60000, 10, 26),
(23, 4, 'insta', 500000, 2000000, 10, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_facturas` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `nrofactura` int(11) NOT NULL,
  `ubicaciondocumento` varchar(100) NOT NULL,
  `id_orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fletes`
--

CREATE TABLE `fletes` (
  `id_fletes` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_etapas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fletes`
--

INSERT INTO `fletes` (`id_fletes`, `valor`, `id_etapas`) VALUES
(21, 10000, 35),
(22, 200000, 36),
(23, 300000, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flete_traslado`
--

CREATE TABLE `flete_traslado` (
  `id_flete_traslado` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_partidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_tipogasto` int(11) DEFAULT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `valor`, `cantidad`, `id_tipogasto`, `id_trabajodiario`) VALUES
(6, 0, 0, 10, 14),
(7, 7655, 0, 11, 14),
(8, 6788, 0, 12, 14),
(9, 0, 0, 13, 14),
(10, 4223, 0, 14, 14),
(11, 7000, 0, 15, 14),
(12, 6000, 0, NULL, 14),
(13, 3000, 0, NULL, 14),
(14, 6000, 0, NULL, 14),
(15, 3000, 0, NULL, 14),
(16, 6000, 0, NULL, 14),
(17, 3000, 0, NULL, 14),
(18, 6000, 0, 17, 14),
(19, 3000, 0, 18, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `fechaasignacion` varchar(30) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `fechaasignacion`, `id_usuario`, `id_trabajodiario`) VALUES
(13, '2021-02-21', 1, 13),
(14, '2021-02-18', 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresocaja`
--

CREATE TABLE `ingresocaja` (
  `id_ingresocaja` int(11) NOT NULL,
  `fechaingreso` varchar(50) NOT NULL,
  `montoingreso` int(11) DEFAULT NULL,
  `id_cajachica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion`
--

CREATE TABLE `mantencion` (
  `id_mantencion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `kilometraje` int(11) DEFAULT NULL,
  `servicio` varchar(100) NOT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `mecanico` varchar(100) DEFAULT NULL,
  `taller` varchar(100) DEFAULT NULL,
  `detalle` varchar(200) NOT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `doc_adj` varchar(100) NOT NULL,
  `total_m` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `id_tipobodega` int(11) DEFAULT NULL,
  `id_tipomaterial` int(11) DEFAULT NULL,
  `nombrematerial` varchar(200) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `detalle` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `material`
--
DELIMITER $$
CREATE TRIGGER `rellenardetalleentrada` AFTER INSERT ON `material` FOR EACH ROW INSERT INTO detalleentrada(detalleentrada.id_material, detalleentrada.fechaentrada) VALUES (NEW.id_material, CURDATE())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialesantes`
--

CREATE TABLE `materialesantes` (
  `id_materialesantes` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialesbodega`
--

CREATE TABLE `materialesbodega` (
  `id_materialesbodega` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialesdurante`
--

CREATE TABLE `materialesdurante` (
  `id_materialesdurante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_comprados`
--

CREATE TABLE `materiales_comprados` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiales_comprados`
--

INSERT INTO `materiales_comprados` (`id_material`, `nombre`, `valor`) VALUES
(6, 'Martillo', 2100),
(7, 'Taladro', 24000),
(8, 'Tubo 2x2', 5435);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `id_mecanico` int(11) NOT NULL,
  `rut` varchar(30) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(11) NOT NULL,
  `nroorden` int(11) NOT NULL,
  `iva` varchar(5) NOT NULL,
  `total` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_tipobodega` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `nroorden`, `iva`, `total`, `fecha`, `estado`, `id_tipobodega`, `id_proyecto`) VALUES
(23, 87667, '19', 28560, '15/02/2021', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_cotizaciones`
--

CREATE TABLE `ordenes_cotizaciones` (
  `id_ordenescotizaciones` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `Fecha` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes_cotizaciones`
--

INSERT INTO `ordenes_cotizaciones` (`id_ordenescotizaciones`, `id_orden`, `id_cotizacion`, `Fecha`) VALUES
(10, 23, 17, '15/02/2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_materiales`
--

CREATE TABLE `ordenes_materiales` (
  `id_ordenmateriales` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `preciounitario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenes_materiales`
--

INSERT INTO `ordenes_materiales` (`id_ordenmateriales`, `id_orden`, `id_material`, `preciounitario`, `cantidad`, `importe`) VALUES
(24, 23, 7, 24000, 8, 228480);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `id_partidas` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_sugerido` float NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id_partidas`, `nombre`, `precio_sugerido`, `id_proyecto`) VALUES
(26, 'jose1', 0, 18),
(27, 'jose2', 0, 18),
(28, 'jose3', 0, 18),
(29, 'jose', 0, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `detalle` varchar(80) NOT NULL,
  `fecha_inicio` varchar(30) NOT NULL,
  `fecha_termino` varchar(80) DEFAULT NULL,
  `ubicaciondocumento` varchar(60) DEFAULT NULL,
  `id_personal` int(11) NOT NULL,
  `id_tipopermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `detalle`, `fecha_inicio`, `fecha_termino`, `ubicaciondocumento`, `id_personal`, `id_tipopermiso`) VALUES
(1, 'Se fue de vacas falsas', '01/02/2021 ', ' 24/03/2021', 'cipdf_1502210140471.pdf', 16, 1),
(2, 'fdfsfsdfdsf', '01/02/2021 ', ' 20/02/2021', 'cipdf_150221020726.pdf', 17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `rut` varchar(13) DEFAULT NULL,
  `nombrecompleto` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `rut`, `nombrecompleto`) VALUES
(16, '3-3', 'Paulo'),
(17, '5-5', 'Daniel'),
(18, '5-5', 'Daniel'),
(19, '5-5', 'Daniel'),
(20, '5-5', 'Daniel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_trabajo`
--

CREATE TABLE `personal_trabajo` (
  `id_personaltrabajo` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_trabajodiario` int(11) NOT NULL,
  `fecha` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planillaestado`
--

CREATE TABLE `planillaestado` (
  `id_planilla` int(11) NOT NULL,
  `asistencia` int(11) NOT NULL,
  `materialesdurante` int(11) NOT NULL,
  `materialesantes` int(11) NOT NULL,
  `materialesbodega` int(11) NOT NULL,
  `combustible` int(11) NOT NULL,
  `gastosvarios` int(11) NOT NULL,
  `gastosviaticos` int(11) NOT NULL,
  `subirarchivos` int(11) NOT NULL,
  `id_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planillaestado`
--

INSERT INTO `planillaestado` (`id_planilla`, `asistencia`, `materialesdurante`, `materialesantes`, `materialesbodega`, `combustible`, `gastosvarios`, `gastosviaticos`, `subirarchivos`, `id_codigo`) VALUES
(13, 1, 0, 0, 0, 0, 0, 0, 0, 13),
(14, 1, 0, 0, 0, 1, 1, 1, 0, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `porcentaje`
--

CREATE TABLE `porcentaje` (
  `id_porcentaje` int(11) NOT NULL,
  `imprevisto` float NOT NULL,
  `gasto_generales` float NOT NULL,
  `comisiones` float NOT NULL,
  `ingenieria` float NOT NULL,
  `utilidades` float NOT NULL,
  `id_partidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `diascredito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `rut`, `nombre`, `direccion`, `telefono`, `correo`, `descripcion`, `diascredito`) VALUES
(3, '2-4', 'SODIMAC', 'direccion', '59483', 'sodimac@gmail.com', 'NOLOSE', 10),
(4, '4-4', 'EASY', 'algundireccion', '504392', 'easy@gmail.com', 'NOLOSE', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nombreproyecto` varchar(200) NOT NULL,
  `montototal` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_termino` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombreproyecto`, `montototal`, `fecha_inicio`, `fecha_termino`) VALUES
(1, 'COPEC', 100, '100', 'funcional'),
(2, 'sdfsdfsdf', NULL, NULL, NULL),
(3, 'NOLOSE', NULL, NULL, NULL),
(18, 'proyecto1', 10000000, '0101-01-01', '0101-10-10'),
(19, 'qweqweq', NULL, NULL, NULL),
(20, 'qweqweq', NULL, NULL, NULL),
(21, 'sdfsdfsdf', NULL, NULL, NULL),
(22, 'qweqweq', NULL, NULL, NULL),
(23, 'NOLOSE', NULL, NULL, NULL),
(24, 'TIC', NULL, NULL, NULL),
(25, 'proyecto1', 123123123, '2021-02-17', '2021-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_usuario`
--

CREATE TABLE `proyecto_usuario` (
  `id_proyecto_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto_usuario`
--

INSERT INTO `proyecto_usuario` (`id_proyecto_usuario`, `estado`, `id_usuario`, `id_proyecto`) VALUES
(0, 0, 17, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL,
  `cantidadsalida` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `salida`
--
DELIMITER $$
CREATE TRIGGER `actualizardetallesalida` AFTER INSERT ON `salida` FOR EACH ROW UPDATE detallesalida SET detallesalida.id_salida = NEW.id_salida, detallesalida.fechasalida = (CURDATE()) WHERE detallesalida.id_detallesalida = (select detallesalida.id_detallesalida from detallesalida order by detallesalida.id_detallesalida desc LIMIT 1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipobodega`
--

CREATE TABLE `tipobodega` (
  `id_tipobodega` int(11) NOT NULL,
  `nombretipobodega` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipobodega`
--

INSERT INTO `tipobodega` (`id_tipobodega`, `nombretipobodega`) VALUES
(1, 'Bodega 1'),
(2, 'Bodega 2'),
(3, 'Bodega oficina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocostosfijos`
--

CREATE TABLE `tipocostosfijos` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocostosfijos`
--

INSERT INTO `tipocostosfijos` (`id_tipo`, `nombre`) VALUES
(1, 'Agua'),
(2, 'Luz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `id_tipodocumento` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `monto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogasto`
--

CREATE TABLE `tipogasto` (
  `id_tipogasto` int(11) NOT NULL,
  `nombretipogasto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipogasto`
--

INSERT INTO `tipogasto` (`id_tipogasto`, `nombretipogasto`) VALUES
(10, 'Almuerzo'),
(11, 'Cena'),
(12, 'Agua'),
(13, 'Alojamiento'),
(14, 'Desayuno'),
(15, 'Petroleo'),
(16, 'Bencina'),
(17, 'Peaje'),
(18, 'Estacionamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomaterial`
--

CREATE TABLE `tipomaterial` (
  `id_tipomaterial` int(11) NOT NULL,
  `nombretipomaterial` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipomaterial`
--

INSERT INTO `tipomaterial` (`id_tipomaterial`, `nombretipomaterial`) VALUES
(3, 'HOLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotrabajo`
--

CREATE TABLE `tipotrabajo` (
  `id_tipotrabajo` int(11) NOT NULL,
  `nombretipotrabajo` varchar(100) NOT NULL,
  `abreviacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipotrabajo`
--

INSERT INTO `tipotrabajo` (`id_tipotrabajo`, `nombretipotrabajo`, `abreviacion`) VALUES
(4, 'copec', 'CP'),
(5, 'Municipalidad', 'MN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `rol` varchar(200) NOT NULL,
  `permisos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `rol`, `permisos`) VALUES
(1, 'Admin', 3),
(2, 'Trabajador', 2),
(3, 'Bodeguero', 3),
(4, 'personal', 4),
(5, 'proyecto', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_permiso`
--

CREATE TABLE `tipo_permiso` (
  `id_tipopermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_permiso`
--

INSERT INTO `tipo_permiso` (`id_tipopermiso`, `nombre`) VALUES
(1, 'Licencia medica'),
(2, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajodiario`
--

CREATE TABLE `trabajodiario` (
  `id_trabajodiario` int(11) NOT NULL,
  `personalcargo` varchar(100) DEFAULT NULL,
  `detalle` varchar(500) DEFAULT NULL,
  `valorasignado` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajodiario`
--

INSERT INTO `trabajodiario` (`id_trabajodiario`, `personalcargo`, `detalle`, `valorasignado`, `id_proyecto`, `id_codigo`) VALUES
(13, 'Rober Astorga', 'dgfgfddfssfd', 32432, 23, 13),
(14, 'werwer', 'lallalalalallallala', 32432, 24, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(70) DEFAULT NULL,
  `rut` varchar(70) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `contrasena` varchar(70) DEFAULT NULL,
  `id_tipousuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_completo`, `rut`, `telefono`, `correo`, `contrasena`, `id_tipousuario`) VALUES
(1, 'Rober Astorga', '19-5', '2343294293', 'rober.trabajador@blackcode.cl', '123', 2),
(2, 'Camilo Contreras', '1-2', '45434535', 'camilo.trabajador@blackcode.cl', '123', 2),
(3, 'Daniel Ossandon', '1-1', '13234234', 'daniel.trabajador@blackcode.cl', '123', 2),
(4, 'Paulo Mancilla', '1-4', '321421342', 'paulo.trabajador@blackcode.cl', '123', 2),
(5, 'Daniel Ossandon', '1-1', '3424324234', 'daniel.bodeguero@blackcode.cl', '123', 3),
(6, 'Camilo Contreras', '1-1', '432422343', 'camilo.bodeguero@blackcode.cl', '123', 3),
(7, 'Paulo Mancilla', '1-1', '234432', 'paulo.bodeguero@blackcode.cl', '123', 3),
(8, 'Camilo Contreras', '1-1', '143245534', 'camilo.admin@blackcode.cl', '123', 1),
(9, 'Daniel Ossandon', '1-1', '234234234', 'daniel.admin@blackcode.cl', '123', 1),
(10, 'Paulo Mancilla', '1-1', '23423234', 'paulo.admin@blackcode.cl', '123', 1),
(11, 'Rober Astorga', '1-1', '344534', 'rober.admin@blackcode.cl', '123', 1),
(12, 'Rober Astorga', '1-1', '1423432', 'rober.trabajador@blackcode.cl', '123', 2),
(13, 'Rober Astorga', '1-1', '432234432', 'rober.bodeguero@blackcode.cl', '123', 3),
(14, 'Daniel osandin', '1-2', '4034053', 'dani.dani@dani.com', '123', 1),
(15, 'Rober', '121423', '4334534', 'rober.personal@blackcode.cl', '123', 4),
(16, 'Rober', '123123', '534453', 'rober.proyecto@blackcode.cl', '123', 5),
(17, 'Daniel', '123213', '45344', 'paulo.proyecto@blackcode.cl', '123', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id_vacaciones` int(11) NOT NULL,
  `diasacumulados` int(11) NOT NULL,
  `diasausar` int(11) NOT NULL,
  `fechainicio` varchar(20) NOT NULL,
  `fechatermino` varchar(20) NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`id_vacaciones`, `diasacumulados`, `diasausar`, `fechainicio`, `fechatermino`, `id_personal`) VALUES
(4, 15, 12, '27-11-2021', '14-12-2021', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` int(11) NOT NULL,
  `patente` varchar(30) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `id_detalle_vehiculo` int(11) DEFAULT NULL,
  `gps` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia_personal`
--
ALTER TABLE `asistencia_personal`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `cajachica`
--
ALTER TABLE `cajachica`
  ADD PRIMARY KEY (`id_cajachica`);

--
-- Indices de la tabla `codigoservicio`
--
ALTER TABLE `codigoservicio`
  ADD PRIMARY KEY (`id_codigo`),
  ADD KEY `id_tipotrabajo` (`id_tipotrabajo`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`id_combustible`);

--
-- Indices de la tabla `costosfijos`
--
ALTER TABLE `costosfijos`
  ADD PRIMARY KEY (`id_costofijos`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `cotizacion_materiales`
--
ALTER TABLE `cotizacion_materiales`
  ADD PRIMARY KEY (`id_cotizacionmaterial`),
  ADD KEY `id_cotizacion` (`id_cotizacion`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `despiece`
--
ALTER TABLE `despiece`
  ADD PRIMARY KEY (`id_despiece`),
  ADD KEY `id_etapas` (`id_etapas`);

--
-- Indices de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  ADD PRIMARY KEY (`id_destinatario`);

--
-- Indices de la tabla `detalleentrada`
--
ALTER TABLE `detalleentrada`
  ADD PRIMARY KEY (`id_detalleentrada`),
  ADD KEY `id_entrada` (`id_entrada`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  ADD PRIMARY KEY (`id_detallesalida`),
  ADD KEY `id_salida` (`id_salida`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `detalletrabajodiario`
--
ALTER TABLE `detalletrabajodiario`
  ADD PRIMARY KEY (`id_detalletrabajo`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`),
  ADD KEY `id_tipodocumento` (`id_tipodocumento`);

--
-- Indices de la tabla `detalle_evaluacion`
--
ALTER TABLE `detalle_evaluacion`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `detalle_vehiculo`
--
ALTER TABLE `detalle_vehiculo`
  ADD PRIMARY KEY (`id_detalle_vehiculo`);

--
-- Indices de la tabla `documentacion_empresa`
--
ALTER TABLE `documentacion_empresa`
  ADD PRIMARY KEY (`id_documentos`);

--
-- Indices de la tabla `documentacion_personal`
--
ALTER TABLE `documentacion_personal`
  ADD PRIMARY KEY (`id_documentos`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `documentacion_proyecto`
--
ALTER TABLE `documentacion_proyecto`
  ADD PRIMARY KEY (`id_documentos`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `egresocaja`
--
ALTER TABLE `egresocaja`
  ADD PRIMARY KEY (`id_egresocaja`),
  ADD KEY `id_cajachica` (`id_cajachica`),
  ADD KEY `id_destinatario` (`id_destinatario`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id_etapas`),
  ADD KEY `id_partidas` (`id_partidas`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id_evaluacion`),
  ADD KEY `id_detalle` (`id_detalle`),
  ADD KEY `id_partidas` (`id_partidas`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_facturas`),
  ADD KEY `id_orden` (`id_orden`);

--
-- Indices de la tabla `fletes`
--
ALTER TABLE `fletes`
  ADD PRIMARY KEY (`id_fletes`),
  ADD KEY `id_etapas` (`id_etapas`);

--
-- Indices de la tabla `flete_traslado`
--
ALTER TABLE `flete_traslado`
  ADD PRIMARY KEY (`id_flete_traslado`),
  ADD KEY `id_partidas` (`id_partidas`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `id_tipogasto` (`id_tipogasto`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

--
-- Indices de la tabla `ingresocaja`
--
ALTER TABLE `ingresocaja`
  ADD PRIMARY KEY (`id_ingresocaja`),
  ADD KEY `id_cajachica` (`id_cajachica`);

--
-- Indices de la tabla `mantencion`
--
ALTER TABLE `mantencion`
  ADD PRIMARY KEY (`id_mantencion`),
  ADD KEY `id_vehiculo` (`id_vehiculo`),
  ADD KEY `id_servicio` (`servicio`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_tipomaterial` (`id_tipomaterial`),
  ADD KEY `id_tipobodega` (`id_tipobodega`);

--
-- Indices de la tabla `materialesantes`
--
ALTER TABLE `materialesantes`
  ADD PRIMARY KEY (`id_materialesantes`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

--
-- Indices de la tabla `materialesbodega`
--
ALTER TABLE `materialesbodega`
  ADD PRIMARY KEY (`id_materialesbodega`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

--
-- Indices de la tabla `materialesdurante`
--
ALTER TABLE `materialesdurante`
  ADD PRIMARY KEY (`id_materialesdurante`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

--
-- Indices de la tabla `materiales_comprados`
--
ALTER TABLE `materiales_comprados`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`id_mecanico`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `id_tipobodega` (`id_tipobodega`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `ordenes_cotizaciones`
--
ALTER TABLE `ordenes_cotizaciones`
  ADD PRIMARY KEY (`id_ordenescotizaciones`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_cotizacion` (`id_cotizacion`);

--
-- Indices de la tabla `ordenes_materiales`
--
ALTER TABLE `ordenes_materiales`
  ADD PRIMARY KEY (`id_ordenmateriales`),
  ADD KEY `id_orden` (`id_orden`),
  ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id_partidas`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_tipopermiso` (`id_tipopermiso`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `personal_trabajo`
--
ALTER TABLE `personal_trabajo`
  ADD PRIMARY KEY (`id_personaltrabajo`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

--
-- Indices de la tabla `planillaestado`
--
ALTER TABLE `planillaestado`
  ADD PRIMARY KEY (`id_planilla`),
  ADD KEY `id_codigo` (`id_codigo`);

--
-- Indices de la tabla `porcentaje`
--
ALTER TABLE `porcentaje`
  ADD PRIMARY KEY (`id_porcentaje`),
  ADD KEY `id_partidas` (`id_partidas`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id_salida`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`);

--
-- Indices de la tabla `tipobodega`
--
ALTER TABLE `tipobodega`
  ADD PRIMARY KEY (`id_tipobodega`);

--
-- Indices de la tabla `tipocostosfijos`
--
ALTER TABLE `tipocostosfijos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_tipodocumento`);

--
-- Indices de la tabla `tipogasto`
--
ALTER TABLE `tipogasto`
  ADD PRIMARY KEY (`id_tipogasto`);

--
-- Indices de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  ADD PRIMARY KEY (`id_tipomaterial`);

--
-- Indices de la tabla `tipotrabajo`
--
ALTER TABLE `tipotrabajo`
  ADD PRIMARY KEY (`id_tipotrabajo`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  ADD PRIMARY KEY (`id_tipopermiso`);

--
-- Indices de la tabla `trabajodiario`
--
ALTER TABLE `trabajodiario`
  ADD PRIMARY KEY (`id_trabajodiario`),
  ADD KEY `id_codigo` (`id_codigo`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipousuario` (`id_tipousuario`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id_vacaciones`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `id_detalle_vehiculo` (`id_detalle_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia_personal`
--
ALTER TABLE `asistencia_personal`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `cajachica`
--
ALTER TABLE `cajachica`
  MODIFY `id_cajachica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `codigoservicio`
--
ALTER TABLE `codigoservicio`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `id_combustible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `costosfijos`
--
ALTER TABLE `costosfijos`
  MODIFY `id_costofijos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cotizacion_materiales`
--
ALTER TABLE `cotizacion_materiales`
  MODIFY `id_cotizacionmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `despiece`
--
ALTER TABLE `despiece`
  MODIFY `id_despiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalleentrada`
--
ALTER TABLE `detalleentrada`
  MODIFY `id_detalleentrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  MODIFY `id_detallesalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalletrabajodiario`
--
ALTER TABLE `detalletrabajodiario`
  MODIFY `id_detalletrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_evaluacion`
--
ALTER TABLE `detalle_evaluacion`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_vehiculo`
--
ALTER TABLE `detalle_vehiculo`
  MODIFY `id_detalle_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `documentacion_empresa`
--
ALTER TABLE `documentacion_empresa`
  MODIFY `id_documentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `documentacion_personal`
--
ALTER TABLE `documentacion_personal`
  MODIFY `id_documentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentacion_proyecto`
--
ALTER TABLE `documentacion_proyecto`
  MODIFY `id_documentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresocaja`
--
ALTER TABLE `egresocaja`
  MODIFY `id_egresocaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `fletes`
--
ALTER TABLE `fletes`
  MODIFY `id_fletes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `flete_traslado`
--
ALTER TABLE `flete_traslado`
  MODIFY `id_flete_traslado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ingresocaja`
--
ALTER TABLE `ingresocaja`
  MODIFY `id_ingresocaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mantencion`
--
ALTER TABLE `mantencion`
  MODIFY `id_mantencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materialesantes`
--
ALTER TABLE `materialesantes`
  MODIFY `id_materialesantes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materialesbodega`
--
ALTER TABLE `materialesbodega`
  MODIFY `id_materialesbodega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materialesdurante`
--
ALTER TABLE `materialesdurante`
  MODIFY `id_materialesdurante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales_comprados`
--
ALTER TABLE `materiales_comprados`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `id_mecanico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ordenes_cotizaciones`
--
ALTER TABLE `ordenes_cotizaciones`
  MODIFY `id_ordenescotizaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ordenes_materiales`
--
ALTER TABLE `ordenes_materiales`
  MODIFY `id_ordenmateriales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id_partidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal_trabajo`
--
ALTER TABLE `personal_trabajo`
  MODIFY `id_personaltrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `planillaestado`
--
ALTER TABLE `planillaestado`
  MODIFY `id_planilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `porcentaje`
--
ALTER TABLE `porcentaje`
  MODIFY `id_porcentaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipobodega`
--
ALTER TABLE `tipobodega`
  MODIFY `id_tipobodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipocostosfijos`
--
ALTER TABLE `tipocostosfijos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_tipodocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipogasto`
--
ALTER TABLE `tipogasto`
  MODIFY `id_tipogasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  MODIFY `id_tipomaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipotrabajo`
--
ALTER TABLE `tipotrabajo`
  MODIFY `id_tipotrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  MODIFY `id_tipopermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trabajodiario`
--
ALTER TABLE `trabajodiario`
  MODIFY `id_trabajodiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id_vacaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia_personal`
--
ALTER TABLE `asistencia_personal`
  ADD CONSTRAINT `asistencia_personal_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`);

--
-- Filtros para la tabla `codigoservicio`
--
ALTER TABLE `codigoservicio`
  ADD CONSTRAINT `codigoservicio_ibfk_1` FOREIGN KEY (`id_tipotrabajo`) REFERENCES `tipotrabajo` (`id_tipotrabajo`);

--
-- Filtros para la tabla `costosfijos`
--
ALTER TABLE `costosfijos`
  ADD CONSTRAINT `costosfijos_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipocostosfijos` (`id_tipo`);

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `cotizaciones_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `cotizacion_materiales`
--
ALTER TABLE `cotizacion_materiales`
  ADD CONSTRAINT `cotizacion_materiales_ibfk_1` FOREIGN KEY (`id_cotizacion`) REFERENCES `cotizaciones` (`id_cotizacion`),
  ADD CONSTRAINT `cotizacion_materiales_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `materiales_comprados` (`id_material`);

--
-- Filtros para la tabla `despiece`
--
ALTER TABLE `despiece`
  ADD CONSTRAINT `despiece_ibfk_1` FOREIGN KEY (`id_etapas`) REFERENCES `etapas` (`id_etapas`);

--
-- Filtros para la tabla `detalleentrada`
--
ALTER TABLE `detalleentrada`
  ADD CONSTRAINT `detalleentrada_ibfk_1` FOREIGN KEY (`id_entrada`) REFERENCES `entrada` (`id_entrada`),
  ADD CONSTRAINT `detalleentrada_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`);

--
-- Filtros para la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  ADD CONSTRAINT `detallesalida_ibfk_1` FOREIGN KEY (`id_salida`) REFERENCES `salida` (`id_salida`),
  ADD CONSTRAINT `detallesalida_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`);

--
-- Filtros para la tabla `detalletrabajodiario`
--
ALTER TABLE `detalletrabajodiario`
  ADD CONSTRAINT `detalletrabajodiario_ibfk_1` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`),
  ADD CONSTRAINT `detalletrabajodiario_ibfk_2` FOREIGN KEY (`id_tipodocumento`) REFERENCES `tipodocumento` (`id_tipodocumento`);

--
-- Filtros para la tabla `documentacion_personal`
--
ALTER TABLE `documentacion_personal`
  ADD CONSTRAINT `documentacion_personal_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`);

--
-- Filtros para la tabla `documentacion_proyecto`
--
ALTER TABLE `documentacion_proyecto`
  ADD CONSTRAINT `documentacion_proyecto_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `egresocaja`
--
ALTER TABLE `egresocaja`
  ADD CONSTRAINT `egresocaja_ibfk_1` FOREIGN KEY (`id_cajachica`) REFERENCES `cajachica` (`id_cajachica`),
  ADD CONSTRAINT `egresocaja_ibfk_2` FOREIGN KEY (`id_destinatario`) REFERENCES `destinatario` (`id_destinatario`);

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD CONSTRAINT `etapas_ibfk_1` FOREIGN KEY (`id_partidas`) REFERENCES `partidas` (`id_partidas`);

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_ibfk_2` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_evaluacion` (`id_detalle`),
  ADD CONSTRAINT `evaluacion_ibfk_3` FOREIGN KEY (`id_partidas`) REFERENCES `partidas` (`id_partidas`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id_orden`);

--
-- Filtros para la tabla `fletes`
--
ALTER TABLE `fletes`
  ADD CONSTRAINT `fletes_ibfk_1` FOREIGN KEY (`id_etapas`) REFERENCES `etapas` (`id_etapas`);

--
-- Filtros para la tabla `flete_traslado`
--
ALTER TABLE `flete_traslado`
  ADD CONSTRAINT `flete_traslado_ibfk_1` FOREIGN KEY (`id_partidas`) REFERENCES `partidas` (`id_partidas`);

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_tipogasto`) REFERENCES `tipogasto` (`id_tipogasto`),
  ADD CONSTRAINT `gastos_ibfk_2` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

--
-- Filtros para la tabla `ingresocaja`
--
ALTER TABLE `ingresocaja`
  ADD CONSTRAINT `ingresocaja_ibfk_1` FOREIGN KEY (`id_cajachica`) REFERENCES `cajachica` (`id_cajachica`);

--
-- Filtros para la tabla `mantencion`
--
ALTER TABLE `mantencion`
  ADD CONSTRAINT `mantencion_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `mantencion_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_tipomaterial`) REFERENCES `tipomaterial` (`id_tipomaterial`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`id_tipobodega`) REFERENCES `tipobodega` (`id_tipobodega`);

--
-- Filtros para la tabla `materialesantes`
--
ALTER TABLE `materialesantes`
  ADD CONSTRAINT `materialesantes_ibfk_1` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

--
-- Filtros para la tabla `materialesbodega`
--
ALTER TABLE `materialesbodega`
  ADD CONSTRAINT `materialesbodega_ibfk_1` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

--
-- Filtros para la tabla `materialesdurante`
--
ALTER TABLE `materialesdurante`
  ADD CONSTRAINT `materialesdurante_ibfk_1` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_2` FOREIGN KEY (`id_tipobodega`) REFERENCES `tipobodega` (`id_tipobodega`),
  ADD CONSTRAINT `ordenes_ibfk_3` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `ordenes_cotizaciones`
--
ALTER TABLE `ordenes_cotizaciones`
  ADD CONSTRAINT `ordenes_cotizaciones_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id_orden`),
  ADD CONSTRAINT `ordenes_cotizaciones_ibfk_2` FOREIGN KEY (`id_cotizacion`) REFERENCES `cotizaciones` (`id_cotizacion`);

--
-- Filtros para la tabla `ordenes_materiales`
--
ALTER TABLE `ordenes_materiales`
  ADD CONSTRAINT `ordenes_materiales_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id_orden`),
  ADD CONSTRAINT `ordenes_materiales_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `materiales_comprados` (`id_material`);

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`id_tipopermiso`) REFERENCES `tipo_permiso` (`id_tipopermiso`);

--
-- Filtros para la tabla `personal_trabajo`
--
ALTER TABLE `personal_trabajo`
  ADD CONSTRAINT `personal_trabajo_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `personal_trabajo_ibfk_2` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

--
-- Filtros para la tabla `planillaestado`
--
ALTER TABLE `planillaestado`
  ADD CONSTRAINT `planillaestado_ibfk_1` FOREIGN KEY (`id_codigo`) REFERENCES `codigoservicio` (`id_codigo`);

--
-- Filtros para la tabla `porcentaje`
--
ALTER TABLE `porcentaje`
  ADD CONSTRAINT `porcentaje_ibfk_1` FOREIGN KEY (`id_partidas`) REFERENCES `partidas` (`id_partidas`);

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `trabajodiario`
--
ALTER TABLE `trabajodiario`
  ADD CONSTRAINT `trabajodiario_ibfk_1` FOREIGN KEY (`id_codigo`) REFERENCES `codigoservicio` (`id_codigo`),
  ADD CONSTRAINT `trabajodiario_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipousuario` (`id_tipousuario`);

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `vacaciones_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_detalle_vehiculo`) REFERENCES `detalle_vehiculo` (`id_detalle_vehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
