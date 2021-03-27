-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2021 a las 04:44:22
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

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
DELETE FROM tarea;
DELETE FROM asistencia_personal;	
DELETE FROM materialesantes;	 	
DELETE FROM materialesbodega;	 	
DELETE FROM ingreso;
DELETE FROM gastos;	
DELETE FROM tipogasto WHERE nombretipogasto NOT IN ('Almuerzo','Peaje','Estacionamiento','Agua','Desayuno','Cena','Desayuno','Bencina','Petroleo','Alojamiento');
DELETE FROM detalletrabajodiario;
DELETE FROM factura_trabajo;
DELETE from personal_trabajo;
DELETE FROM trabajodiario;
DELETE FROM planillaestado;
DELETE FROM codigoservicio;
delete from ingresocaja;
delete from egresocaja;
delete from cajachica;

	 		 	
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
  `fecha_asistencia` date NOT NULL,
  `horallegadam` varchar(20) DEFAULT NULL,
  `horasalidam` varchar(20) NOT NULL,
  `horallegadat` varchar(20) NOT NULL,
  `horasalidat` varchar(20) DEFAULT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `horastrabajadas` varchar(20) DEFAULT NULL,
  `horasextras` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajachica`
--

CREATE TABLE `cajachica` (
  `id_cajachica` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `estado` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `conductor` varchar(100) NOT NULL,
  `estacion` varchar(100) NOT NULL,
  `litros` float NOT NULL,
  `valor` float NOT NULL,
  `doc_adj` varchar(200) NOT NULL
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
(4, '2021-02-28', 25000, 'detalle', 1, 1),
(5, '2021-02-28', 15000, '', 2, 0),
(6, '2021-03-31', 8000, '', 1, 1),
(7, '2020-02-29', 30000, '', 1, 0),
(8, '2021-09-30', 5000, '', 1, 0);

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
(20, '2021-02-18', 6546, 'Ingresos_caja_chica_CDH_INGENIERIA13.pdf', 3);

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
(5, 20, 6, 2100, 12495, 5),
(6, 20, 6, 2100, 4998, 2);

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
(33, 6, 'cañas bambu', 2000, 12000, 40),
(34, 1, 'Buso de seguridad', 13000, 13000, 38),
(35, 1, 'Pala', 3500, 3500, 39),
(36, 1, 'item1', 10000, 10000, 42),
(37, 2, 'item2 ', 10000, 20000, 42),
(38, 1, 'item3', 10000, 10000, 43),
(39, 3, 'item 4 ', 30000, 90000, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinatario`
--

CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL,
  `nombredestinatario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destinatario`
--

INSERT INTO `destinatario` (`id_destinatario`, `nombredestinatario`) VALUES
(2, 'Correo chile'),
(3, 'Chilexpress'),
(4, 'koko'),
(5, 'koko'),
(6, 'Chile'),
(7, 'Nose'),
(8, 'tutu'),
(9, 'koko'),
(10, 'popo');

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

--
-- Volcado de datos para la tabla `detalleentrada`
--

INSERT INTO `detalleentrada` (`id_detalleentrada`, `id_entrada`, `id_material`, `fechaentrada`) VALUES
(4, 4, 4, '2021-02-22'),
(5, 5, 4, '2021-02-22'),
(6, 6, 5, '2021-03-13');

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

--
-- Volcado de datos para la tabla `detallesalida`
--

INSERT INTO `detallesalida` (`id_detallesalida`, `id_salida`, `id_material`, `fechasalida`) VALUES
(3, 3, 4, '2021-02-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletrabajodiario`
--

CREATE TABLE `detalletrabajodiario` (
  `id_detalletrabajo` int(11) NOT NULL,
  `id_trabajodiario` int(11) DEFAULT NULL,
  `imagen` varchar(40) NOT NULL
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
(11, 4, 'Instalacion'),
(12, 4, 'Supervision'),
(13, 5, 'Supervision'),
(14, 2, 'Instalacion'),
(15, 3, 'Supervision'),
(16, 1, 'Instalacion'),
(17, 2, 'Instalacion'),
(18, 3, 'Supervision');

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

--
-- Volcado de datos para la tabla `detalle_vehiculo`
--

INSERT INTO `detalle_vehiculo` (`id_detalle_vehiculo`, `tipo`, `modelo`, `marca`, `color`, `tipomotor`) VALUES
(7, 'Camion', 'chanta', 'DANIEL', 'ORO', 'Eléctrico');

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
  `tipo` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentacion_empresa`
--

INSERT INTO `documentacion_empresa` (`id_documentos`, `nombre`, `fecha`, `ubicacion`, `fechalimite`, `tipo`, `estado`) VALUES
(32, 'documento_evidencia_2', '15/03/2021', 'ejemplo_evidencia_2.jpeg', 'No aplica', '0', 0),
(33, 'evidencia_2_documentotest', '16/03/2021', 'documento_actualizable_evidencia_2.jpeg', '2021-03-13', '1', 0);

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
-- Estructura de tabla para la tabla `documento_pago`
--

CREATE TABLE `documento_pago` (
  `id_documentopago` int(11) NOT NULL,
  `nrodocumento` int(11) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  `ubicaciondocumento` varchar(80) DEFAULT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documento_pago`
--

INSERT INTO `documento_pago` (`id_documentopago`, `nrodocumento`, `fecha`, `detalle`, `ubicaciondocumento`, `id_factura`) VALUES
(2, 546, '2021-02-28', '', 'Orden_de_Compra_CDH_INGENIERIA1.pdf', 12);

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
  `detalle` varchar(1000) NOT NULL,
  `estado` int(11) NOT NULL,
  `estadoreg` int(11) NOT NULL
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
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_proyecto`, `cantidadingresada`) VALUES
(4, 35, 2),
(5, 35, 4),
(6, 38, 54);

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
(38, 'ponerse proteccion ', 1, 31),
(39, 'abrir espacio ', 1, 31),
(40, 'armar estructura', 1, 30),
(41, 'comprobar estructura', 0, 30),
(42, 'etapa partida 1', 1, 32),
(43, 'etapa 2 partida 1', 1, 32),
(44, 'etapa 1 partida 2', 0, 33),
(45, 'etapa 1 partida 2', 0, 33),
(46, 'okokokokok', 0, 35),
(47, 'asdasdasdasd', 0, 35);

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
(24, 1, 'Pala', 3500, 3500, 11, 30),
(25, 2, 'Chuzo', 26000, 52000, 11, 30),
(26, 1, 'lupa', 2000, 2000, 12, 30),
(27, 1, 'cascos', 1400, 1400, 12, 30),
(28, 2, 'cuaderno', 2300, 4600, 13, 31),
(29, 1, 'item6', 10000, 10000, 14, 32),
(30, 1, 'jose', 100000, 100000, 15, 32),
(31, 1, 'item', 2000, 2000, 16, 33),
(32, 3, 'jose', 229999, 689997, 17, 33),
(33, 3, 'jose', 100000, 300000, 18, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_facturas` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `nrofactura` int(11) NOT NULL,
  `montototal` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `ubicaciondocumento` varchar(100) NOT NULL,
  `id_orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_facturas`, `fecha`, `nrofactura`, `montototal`, `detalle`, `ubicaciondocumento`, `id_orden`) VALUES
(12, '2021-02-18', 6576, 50000, '', 'Orden_de_Compra_CDH_INGENIERIA.pdf', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_trabajo`
--

CREATE TABLE `factura_trabajo` (
  `id_facturatrabajo` int(11) NOT NULL,
  `ubicaciondocumento` varchar(30) NOT NULL,
  `montototal` int(11) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_trabajodiario` int(11) NOT NULL
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
(24, 12500, 40),
(25, 15000, 38),
(26, 6000, 39),
(27, 10000, 42),
(28, 2000, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flete_traslado`
--

CREATE TABLE `flete_traslado` (
  `id_flete_traslado` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_partidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flete_traslado`
--

INSERT INTO `flete_traslado` (`id_flete_traslado`, `valor`, `id_partidas`) VALUES
(5, 16000, 30),
(6, 30000, 31),
(7, 10000, 32),
(8, 20000, 33);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresocaja`
--

CREATE TABLE `ingresocaja` (
  `id_ingresocaja` int(11) NOT NULL,
  `fechaingreso` varchar(50) NOT NULL,
  `montoingreso` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
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
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `id_tipobodega`, `id_tipomaterial`, `nombrematerial`, `stock`, `detalle`) VALUES
(4, 2, 4, 'Botitas', -2, 'botass'),
(5, 1, 5, 'Tubo', 54, 'efdgfdgfd');

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
(27, 567, '19', 4998, '23/02/2021', 2, 1, 35);

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
(14, 27, 20, '23/02/2021');

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
(31, 27, 6, 2100, 5, 12495),
(32, 27, 6, 2100, 2, 4998);

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
(30, 'armar andamios', 338334, 35),
(31, 'instalar bomba', 90500, 35),
(32, 'partida1', 1010020, 37),
(33, 'partida2', 3044790, 37),
(34, 'ghjghjgj', 0, 38),
(35, 'pppp', 0, 40);

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
(4, 'se quebro la pata', '01/02/2021 ', ' 28/02/2021', 'Orden_de_Compra_CDH_INGENIERIA2.pdf', 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `rut` varchar(13) DEFAULT NULL,
  `nombrecompleto` varchar(120) DEFAULT NULL,
  `cargo` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `rut`, `nombrecompleto`, `cargo`, `telefono`, `correo`) VALUES
(35, '1-2', 'daniel', 'ingeniero', '213123', 'danie@gmail.com'),
(36, '1-5', 'Paulo', '', '', ''),
(39, '1-3', 'camilo', 'trabajador', '1231231', 'camilo.proyecto@blackcode.cl');

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

--
-- Volcado de datos para la tabla `porcentaje`
--

INSERT INTO `porcentaje` (`id_porcentaje`, `imprevisto`, `gasto_generales`, `comisiones`, `ingenieria`, `utilidades`, `id_partidas`) VALUES
(14, 0.08, 0.01, 0.04, 0.03, 0.15, 30),
(15, 0.1, 0.2, 0.3, 0.4, 0.2, 32),
(16, 0.2, 0.1, 0.3, 0.4, 0.1, 33);

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
  `diascredito` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `rut`, `nombre`, `direccion`, `telefono`, `correo`, `descripcion`, `diascredito`, `estado`) VALUES
(3, '2-4', 'SODIMAC', 'direccion', '59483', 'sodimac@gmail.com', 'NOLOSE', 10, 1),
(4, '4-4', 'EASY', 'algundireccion', '504392', 'easy@gmail.com', 'NOLOSE', 5, 0),
(7, '2-6', 'Construmart', 'constru', '50493945', 'construmart@gmail.com', '', 4, 0);

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
(35, 'Quilimari', 5000000, '2021-01-20', '2021-12-10'),
(36, 'tic', 5000, '2021-01-01', '2021-02-28'),
(37, 'proyecto1', 200000, '2021-03-02', '2021-03-27'),
(38, 'ProyectoPaulo', 890890, '2021-03-01', '2021-03-31'),
(39, 'ProyectoPaulo', 70000, '2021-03-09', '2021-03-28'),
(40, 'ProyectoPaulo55', 70000, '2021-03-01', '2021-03-27'),
(41, 'ProyectoPaulina', 6000, '2021-03-22', '2021-03-23');

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
(0, 0, 37, 39),
(0, 0, 37, 40),
(0, 0, 37, 41);

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
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id_salida`, `cantidadsalida`, `id_proyecto`) VALUES
(3, 8, 35);

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
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(80) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
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
(28, 'Almuerzo'),
(29, 'Agua'),
(30, 'Estacionamiento'),
(31, 'Peaje'),
(32, 'Desayuno'),
(33, 'Cena'),
(34, 'Alojamiento'),
(35, 'Petroleo'),
(36, 'Bencina');

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
(4, 'Seguridad'),
(5, 'BOTAS');

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
  `contrasena` longtext DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `id_tipousuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_completo`, `rut`, `telefono`, `correo`, `contrasena`, `estado`, `id_tipousuario`) VALUES
(30, 'Rober Astorga Berna', '2-2', '932629641', 'rober.trabajador@blackcode.cl', '$2y$12$uF2oYG7Z.ES3DDOFEhx1De.I4IXt8UYqDhutwNUp0sOgN6p32ElgK', 0, 2),
(37, 'Rober Astorga', '2-2', '932629641', 'rober.proyecto@blackcode.cl', '$2y$12$zs9BP8wZHZeNJFL56vWowughhRJKtWmwtbFfo0.AxZ5Hxqjr3UutK', 0, 5),
(38, 'Rober Astorga', '2-2', '932629641', 'rober.personal@blackcode.cl', '$2y$12$4ubUiS3pvcZLFuibX4N05OBgAANOrW6fwrs95lwWCg5R7gyVAPdL6', 0, 4),
(39, 'Rober Astorga', '2-2', '932629641', 'rober.bodeguero@blackcode.cl', '$2y$12$h64EiyhrHHY.YLEoD96tE.wS6wvlvzatoru1ky.kXIAn.5FCgXTKC', 0, 3),
(40, 'Rober Astorga', '2-2', '932629641', 'rober.admin@blackcode.cl', '$2y$12$FLKa03kjmP/JxYfDd4dpLOFfGzEwtYMEPni3bh/KjScj.3rmWx3Xe', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id_vacaciones` int(11) NOT NULL,
  `diasacumulados` int(11) NOT NULL,
  `diasprogresivos` int(11) NOT NULL,
  `diasausar` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechatermino` date NOT NULL,
  `id_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacaciones`
--

INSERT INTO `vacaciones` (`id_vacaciones`, `diasacumulados`, `diasprogresivos`, `diasausar`, `fechainicio`, `fechatermino`, `id_personal`) VALUES
(22, 45, 0, 15, '2021-12-10', '2021-12-31', 35);

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
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `patente`, `ano`, `id_detalle_vehiculo`, `gps`) VALUES
(7, 'HHHD45', 2020, 7, '');

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
  ADD PRIMARY KEY (`id_combustible`),
  ADD KEY `id_vehiculo` (`id_vehiculo`);

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
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

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
-- Indices de la tabla `documento_pago`
--
ALTER TABLE `documento_pago`
  ADD PRIMARY KEY (`id_documentopago`),
  ADD KEY `id_factura` (`id_factura`);

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
-- Indices de la tabla `factura_trabajo`
--
ALTER TABLE `factura_trabajo`
  ADD PRIMARY KEY (`id_facturatrabajo`),
  ADD KEY `id_trabajodiario` (`id_trabajodiario`);

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
-- Indices de la tabla `proyecto_usuario`
--
ALTER TABLE `proyecto_usuario`
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `cajachica`
--
ALTER TABLE `cajachica`
  MODIFY `id_cajachica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `codigoservicio`
--
ALTER TABLE `codigoservicio`
  MODIFY `id_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `id_combustible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `costosfijos`
--
ALTER TABLE `costosfijos`
  MODIFY `id_costofijos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cotizacion_materiales`
--
ALTER TABLE `cotizacion_materiales`
  MODIFY `id_cotizacionmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `despiece`
--
ALTER TABLE `despiece`
  MODIFY `id_despiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalleentrada`
--
ALTER TABLE `detalleentrada`
  MODIFY `id_detalleentrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detallesalida`
--
ALTER TABLE `detallesalida`
  MODIFY `id_detallesalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalletrabajodiario`
--
ALTER TABLE `detalletrabajodiario`
  MODIFY `id_detalletrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_evaluacion`
--
ALTER TABLE `detalle_evaluacion`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `detalle_vehiculo`
--
ALTER TABLE `detalle_vehiculo`
  MODIFY `id_detalle_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `documentacion_empresa`
--
ALTER TABLE `documentacion_empresa`
  MODIFY `id_documentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT de la tabla `documento_pago`
--
ALTER TABLE `documento_pago`
  MODIFY `id_documentopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `egresocaja`
--
ALTER TABLE `egresocaja`
  MODIFY `id_egresocaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `factura_trabajo`
--
ALTER TABLE `factura_trabajo`
  MODIFY `id_facturatrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `fletes`
--
ALTER TABLE `fletes`
  MODIFY `id_fletes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `flete_traslado`
--
ALTER TABLE `flete_traslado`
  MODIFY `id_flete_traslado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `ingresocaja`
--
ALTER TABLE `ingresocaja`
  MODIFY `id_ingresocaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mantencion`
--
ALTER TABLE `mantencion`
  MODIFY `id_mantencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materialesantes`
--
ALTER TABLE `materialesantes`
  MODIFY `id_materialesantes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materialesbodega`
--
ALTER TABLE `materialesbodega`
  MODIFY `id_materialesbodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `ordenes_cotizaciones`
--
ALTER TABLE `ordenes_cotizaciones`
  MODIFY `id_ordenescotizaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ordenes_materiales`
--
ALTER TABLE `ordenes_materiales`
  MODIFY `id_ordenmateriales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id_partidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `personal_trabajo`
--
ALTER TABLE `personal_trabajo`
  MODIFY `id_personaltrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `planillaestado`
--
ALTER TABLE `planillaestado`
  MODIFY `id_planilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `porcentaje`
--
ALTER TABLE `porcentaje`
  MODIFY `id_porcentaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id_salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT de la tabla `tipogasto`
--
ALTER TABLE `tipogasto`
  MODIFY `id_tipogasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tipomaterial`
--
ALTER TABLE `tipomaterial`
  MODIFY `id_tipomaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_trabajodiario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id_vacaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Filtros para la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD CONSTRAINT `combustible_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

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
  ADD CONSTRAINT `detalletrabajodiario_ibfk_1` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

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
-- Filtros para la tabla `documento_pago`
--
ALTER TABLE `documento_pago`
  ADD CONSTRAINT `documento_pago_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_facturas`);

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
-- Filtros para la tabla `factura_trabajo`
--
ALTER TABLE `factura_trabajo`
  ADD CONSTRAINT `factura_trabajo_ibfk_1` FOREIGN KEY (`id_trabajodiario`) REFERENCES `trabajodiario` (`id_trabajodiario`);

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
-- Filtros para la tabla `proyecto_usuario`
--
ALTER TABLE `proyecto_usuario`
  ADD CONSTRAINT `proyecto_usuario_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `proyecto_usuario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

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
