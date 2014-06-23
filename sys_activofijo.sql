-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2014 a las 18:36:13
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sys_activofijo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_activo_fijo`
--

CREATE TABLE IF NOT EXISTS `cat_activo_fijo` (
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_cuentacontable` int(10) NOT NULL,
  `id_area` int(6) DEFAULT NULL,
  `id_sucursal` int(10) NOT NULL,
  `id_empleado` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `id_proveedor` int(10) NOT NULL,
  `nombre_activo_fijo` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `descripcion` text COLLATE latin1_general_ci NOT NULL,
  `valor_original` float NOT NULL,
  `tipo_valor` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_inicio_uso` date DEFAULT NULL,
  `importe_depreciable` float NOT NULL,
  `vida_util` int(2) NOT NULL,
  `valor_residual` float NOT NULL,
  `cuota_anual` float NOT NULL,
  `cuota_mensual` float NOT NULL,
  `activado` int(11) NOT NULL,
  PRIMARY KEY (`id_activofijo`),
  KEY `id_cuentacontable_idx` (`id_cuentacontable`),
  KEY `id_area_idx` (`id_area`),
  KEY `id_sucursal_idx` (`id_sucursal`),
  KEY `id_empleado_idx` (`id_empleado`),
  KEY `id_proveedor_idx` (`id_proveedor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `cat_activo_fijo`
--

INSERT INTO `cat_activo_fijo` (`id_activofijo`, `id_cuentacontable`, `id_area`, `id_sucursal`, `id_empleado`, `id_proveedor`, `nombre_activo_fijo`, `descripcion`, `valor_original`, `tipo_valor`, `fecha_compra`, `fecha_ingreso`, `fecha_inicio_uso`, `importe_depreciable`, `vida_util`, `valor_residual`, `cuota_anual`, `cuota_mensual`, `activado`) VALUES
('ME01', 3, 2, 2, 'E01', 2, 'Computadora', 'computadora de escritorio Dell', 300, 'estimado', '2010-05-12', '2014-05-17 00:26:34', '2010-06-01', 500, 2, 100, 200, 16.667, 1),
('M01', 1, 2, 6, 'E02', 2, 'computadora', 'computadora portátil\r\n', 500, 'real', '0000-00-00', '0000-00-00 00:00:00', '2012-08-06', 700, 5, 200, 100, 8.33, 1),
('TR01', 4, 7, 7, 'E04', 4, 'camion de carga', 'trasporte para traslado de activos\r\n', 30000, 'real', '2011-06-12', '2014-05-17 03:45:48', '2011-07-12', 50000, 5, 1000, 9800, 816.66, 1),
('TE01', 4, 1, 6, 'E08', 1, 'Edificio', 'edificación de la empresa', 50000, 'real', '2014-05-15', '2014-05-17 03:52:08', '2014-05-29', 70000, 10, 20000, 5000, 41.66, 1),
('ME02', 3, 6, 5, 'E03', 5, 'Escritorio', 'escritorio para la oficina', 150, 'estimado', '2014-05-14', '2014-05-17 03:55:07', '2014-05-21', 250, 2, 100, 75, 6.25, 1),
('ME3', 3, 7, 7, 'E16', 4, 'silla', 'silla giratoria para la oficina\r\n', 75, 'estimado', '2014-04-17', '2014-05-17 03:56:40', '2014-05-22', 100, 5, 50, 10, 0.83, 1),
('ME04', 3, 5, 5, 'E18', 2, 'aireacondicionado', 'aireacondicionado para la oficina\r\n', 600, 'estimado', '2014-05-15', '2014-05-17 05:23:36', '2014-05-22', 800, 3, 200, 66.66, 5.55, 1),
('ME5', 3, 4, 3, 'E19', 4, 'modulares', 'muebles de oficina\r\n', 1500, 'estimado', '2014-05-15', '2014-05-17 05:38:18', '2014-05-22', 20000, 4, 18500, 2642.85, 220.24, 1),
('TE02', 4, 2, 2, 'E06', 4, 'Edificio', 'edificaciones de la empresa\r\n', 100000, 'estimado', '2014-05-08', '2014-05-23 05:52:29', '2014-05-29', 100500, 5, 500, 100, 8.33, 1),
('TE03', 4, 3, 3, 'E07', 5, 'Edificio', 'edificaciones de la empresa', 60000, 'real', '2014-05-23', '2014-05-25 05:59:52', '2014-05-23', 80000, 6, 20000, 3333.33, 277.78, 1),
('TE04', 4, 3, 4, 'E11', 4, 'Edificio', 'edificaciones de la empresa', 75000, 'real', '2014-05-23', '2014-05-23 06:06:53', '2014-05-31', 90000, 6, 15000, 2500, 208.33, 1),
('TE05', 4, 5, 5, 'E13', 1, 'Edificio', 'edificaciones de la empresa', 40000, 'estimado', '2014-05-30', '2014-06-10 06:13:46', '2014-06-18', 60000, 5, 20000, 4000, 333.33, 1),
('ivettesabe', 20, 2, 9, 'E18', 5, 'Monitor', 'para ver', 300, 'real', '2014-06-01', '2014-06-10 03:17:09', '2014-06-02', 500, 20, 100, 20, 1.66667, 0),
('edifi001', 1, 5, 6, '7', 1, 'Edificio Monumental', 'gvy8tftfty8', 300, 'real', '2014-06-13', '2014-06-15 06:41:01', '2014-06-06', 500, 10, 100, 40, 3.33333, 1),
('mercedes1', 5, 4, 9, 'E22', 5, 'mercedes', 'asdasdasd', 300, 'real', '2014-06-05', '2014-06-10 01:39:59', '2014-06-05', 500, 5, 100, 80, 6.66667, 1),
('ferrary02', 5, 2, 9, 'E18', 5, 'ferrary', 'qwdsadasdasd', 300, 'real', '2014-06-01', '2014-06-10 09:02:39', '2014-06-10', 500, 5, 100, 80, 6.66667, 1),
('lg001', 3, 5, 8, '1', 1, 'Lg', 'ASDASDASD', 300, 'real', '2014-06-02', '2014-06-15 06:33:16', '2014-06-15', 500, 10, 100, 40, 3.33333, 1),
('Af01', 0, NULL, 4, '0', 1, 'computadoranueva', 'nueva computadora de escritorio', 400, 'real', '2014-06-07', '2014-06-09 06:00:00', NULL, 500, 10, 100, 40, 3.33333, 0),
('robert01', 4, NULL, 7, '0', 4, 'inothec', 'añsdasd', 200, 'real', '2014-06-15', '2014-06-15 06:00:00', NULL, 600, 20, 100, 25, 2.08333, 0),
('car1', 5, 7, 9, '1', 5, 'carro de caarga', 'carro de carga', 1500, 'real', '2014-06-15', '2014-06-15 17:09:43', '2014-06-15', 2000, 5, 100, 380, 31.6667, 1),
('T23', 5, NULL, 2, '0', 1, 'Vehiculo repartidor', 'microbus para Hyunday', 7000, 'real', '2014-06-20', '2014-06-28 06:00:00', NULL, 8000, 5, 200, 1560, 130, 0),
('T25', 5, NULL, 6, '0', 1, 'Pick-up Toyota', 'vehiculo pick-up con doble transmision', 23000, 'real', '2014-06-02', '2014-06-24 06:00:00', NULL, 24000, 5, 2000, 4400, 366.667, 0),
('a002', 3, 5, 10, '1', 4, 'ventilador', 'para darse viento', 300, 'real', '2014-06-15', '2014-06-15 17:31:21', '2014-06-15', 350, 10, 250, 7, 0.583333, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_area`
--

CREATE TABLE IF NOT EXISTS `cat_area` (
  `id_area` int(6) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(10) NOT NULL,
  `nombre_area` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_area`),
  KEY `id_sucursal_idx` (`id_sucursal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `cat_area`
--

INSERT INTO `cat_area` (`id_area`, `id_sucursal`, `nombre_area`) VALUES
(9, 0, 'Direccion'),
(5, 5, 'Recursos Humanos'),
(7, 7, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_baja`
--

CREATE TABLE IF NOT EXISTS `cat_baja` (
  `id_baja` int(10) NOT NULL AUTO_INCREMENT,
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `fecha_baja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `motivo_baja` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_baja`),
  KEY `id_activofijo_idx` (`id_activofijo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_cuentas_contables`
--

CREATE TABLE IF NOT EXISTS `cat_cuentas_contables` (
  `id_cuentacontable` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_cuenta` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `vida_util` int(2) NOT NULL,
  PRIMARY KEY (`id_cuentacontable`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cat_cuentas_contables`
--

INSERT INTO `cat_cuentas_contables` (`id_cuentacontable`, `nombre_cuenta`, `vida_util`) VALUES
(1, 'Maquinaria', 10),
(3, 'Mobiliario y Equipo', 10),
(4, 'Terrenos Y Edificios', 20),
(5, 'Transporte', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_depreciacion_activo`
--

CREATE TABLE IF NOT EXISTS `cat_depreciacion_activo` (
  `id_depreciacion_activo` int(10) NOT NULL AUTO_INCREMENT,
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_cuentacontable` int(10) NOT NULL,
  `año_mes` date DEFAULT NULL,
  `depreciacion_acumulada` float DEFAULT NULL,
  `saldo_restante` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_depreciacion_activo`),
  KEY `id_activofijo_idx` (`id_activofijo`),
  KEY `id_cuentacontable_idx` (`id_cuentacontable`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cat_depreciacion_activo`
--

INSERT INTO `cat_depreciacion_activo` (`id_depreciacion_activo`, `id_activofijo`, `id_cuentacontable`, `año_mes`, `depreciacion_acumulada`, `saldo_restante`) VALUES
(1, 'ferrary02', 5, '2014-06-10', NULL, NULL),
(4, 'lg001', 3, '2014-06-14', NULL, NULL),
(5, 'lg001', 3, '2014-06-15', NULL, NULL),
(6, 'car1', 5, '2014-06-15', NULL, NULL),
(7, 'a002', 3, '2014-06-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_empleado`
--

CREATE TABLE IF NOT EXISTS `cat_empleado` (
  `id_empleado` int(11) NOT NULL,
  `codigo_empleado` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_sucursal` int(10) NOT NULL,
  `nombre_empleado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `direccion_empleado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `telefono_empleado` varchar(9) COLLATE latin1_general_ci NOT NULL,
  `email_empleado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `cat_empleado`
--

INSERT INTO `cat_empleado` (`id_empleado`, `codigo_empleado`, `id_sucursal`, `nombre_empleado`, `direccion_empleado`, `telefono_empleado`, `email_empleado`) VALUES
(1, 'E01', 7, 'Jorge', 'Usulutan', '77655645', 'jeraromeroa@hotmail.com'),
(2, 'E02', 9, 'jose roberto', 'San Miguel', '77985599', 'joseroberto@hotmail.com'),
(3, 'E03', 10, 'Tony', 'Usulutan', '77655645', 'jeraromeroa@hotmail.com'),
(4, 'E04', 7, 'Jorge Ernesto Romer', 'Usulutan', '77655645', 'jeraromeroa@hotmail.com'),
(5, 'E05', 9, 'mario nelson', 'Usulutan', '61548796', 'marionelson@hotmail.com'),
(6, 'E06', 9, 'maria  jose', 'Usulutan', '76354789', 'mariajose@hotmail.com'),
(7, 'E07', 10, 'daniel rodriguez', 'Usulutan', '61589977', 'josedaniel@hotmail.com'),
(8, 'E08', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(9, 'E10', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(10, 'E11', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(11, 'E13', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(12, 'E14', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(13, 'E15', 9, 'maria del carmen', 'Usulutan', '77655645', 'mariadelcarmen@hotmail.com'),
(14, 'E16', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(15, 'E17', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(16, 'E18', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(17, 'E19', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(18, 'E20', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(19, 'E21', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(20, 'E22', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(21, 'E23', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(22, 'E24', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(23, 'E25', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(24, 'E26', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(25, 'E29', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(26, 'E31', 8, 'Jose Roberto', 'Usulutan', '77655645', 'jeraromeroa@hotmail.com'),
(27, 'E27', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(28, 'E28', 9, 'Jorge Ernesto Romer', 'Usulutan', '7765-5645', 'jeraromeroa@hotmail.com'),
(0, 'E30', 8, 'Jose C', '123 CALLE', '56324187', 'jose12@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_mov_interno`
--

CREATE TABLE IF NOT EXISTS `cat_mov_interno` (
  `id_mov_interno` int(10) NOT NULL AUTO_INCREMENT,
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_empleado` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `fecha_mov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `motivo_mov` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `area_receptor` int(6) NOT NULL,
  `area_emisor` int(6) NOT NULL,
  PRIMARY KEY (`id_mov_interno`),
  KEY `id_activofijo_idx` (`id_activofijo`),
  KEY `id_empleado_idx` (`id_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_proveedor`
--

CREATE TABLE IF NOT EXISTS `cat_proveedor` (
  `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_provee` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `direccion_provee` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `telefono_provee` varchar(9) COLLATE latin1_general_ci NOT NULL,
  `email_provee` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nrc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `nit` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cat_proveedor`
--

INSERT INTO `cat_proveedor` (`id_proveedor`, `nombre_provee`, `direccion_provee`, `telefono_provee`, `email_provee`, `nrc`, `nit`) VALUES
(1, 'cesar', 'usulutan colonia soriano', '4524121', 'cesar@gmail.com', 'asdfsaf', ''),
(2, 'Los Cedros', 'sexta calle poniente colonia san pedro Usulut', '266-1221', 'loscedros.sa.dcv@hotmail.com', '34355', '1232-123242-123-4'),
(3, 'Panasonic', 'san salvador', '2662-2323', 'panasonic.cor@hotmail.com', '45646', '1232-233221-342-1'),
(4, 'Industrias Mabe', 'san salvador', '2662-4544', 'industriasmabe@gmail.com', '2323', '1233-121331-122-1'),
(5, 'Atlas', 'san salvador', '2662-4433', 'provatlas@hotmail.com', '2323', '1233-342233-442-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_sucursal`
--

CREATE TABLE IF NOT EXISTS `cat_sucursal` (
  `id_sucursal` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_sucursal` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `telefono_sucursal` varchar(9) COLLATE latin1_general_ci NOT NULL,
  `direccion_sucursal` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `departamento` varchar(25) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `cat_sucursal`
--

INSERT INTO `cat_sucursal` (`id_sucursal`, `nombre_sucursal`, `telefono_sucursal`, `direccion_sucursal`, `departamento`) VALUES
(1, 'Comercial Perez', '2662-3064', 'sexta calle oriente col.santa rosa Usulutan', 'Usulutan'),
(2, 'Comercial Rony', '2662-5530', 'octava avenida norte al sur de tienda galo ', 'San Miguel'),
(3, 'Tienda Diaz', '2662-7845', 'Quinta avenida norte frente a peluquería el C', 'Usulutan'),
(4, 'comercial Ivette', '2662-8875', 'colonia los Naranjos ', 'San miguel'),
(5, 'Comercial Hernandez', '2662-9984', 'Colonia Esperanza ', 'La Paz'),
(6, 'Tienda Funes', '2662-9087', 'sexta calle poniente frente a farmacia la Fe', 'La Union'),
(7, 'comercial Gonzalez', '2662-2232', 'frente a Radio YSJY', 'Usulutan'),
(8, 'Tienda Robert', '2624-3423', 'Camino al Centro de Gobierno ', 'Usulutan'),
(9, 'Comercial Camila ', '2624-0099', 'contiguo al Centro Comercial Puerta de Orient', 'Usulutan'),
(10, 'Comercial Dany', '2624-0876', 'Frente A Joyería Evelyn ', 'San Miguel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_trasladoaf`
--

CREATE TABLE IF NOT EXISTS `cat_trasladoaf` (
  `id_traslado_activo` int(10) NOT NULL AUTO_INCREMENT,
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `codigo_traslado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `motivo_traslado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `fecha_traslado` date NOT NULL,
  `id_sucursal` int(10) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_traslado_activo`),
  KEY `id_activofijo_idx` (`id_activofijo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cat_trasladoaf`
--

INSERT INTO `cat_trasladoaf` (`id_traslado_activo`, `id_activofijo`, `codigo_traslado`, `motivo_traslado`, `fecha_traslado`, `id_sucursal`, `id_empleado`) VALUES
(1, 'dsfsfsdf', '12312312', 'dsfsdff', '2014-05-19', 5, 8),
(2, 'M01', '12312312', 'dsfsdff', '2014-06-18', 9, 0),
(3, 'ME02', 'trasla01', 'dsfsdff', '2014-06-17', 3, 0),
(4, 'ME02', 'trasla02', 'dsfsdff', '2014-06-17', 5, 1),
(5, 'M01', 'trasla03', 'dsfsdffcvb', '2014-06-11', 9, 1),
(6, 'M01', 'trasla03', 'dsfsdffcvb', '2014-06-11', 9, 1),
(7, 'edifi001', 'traslado02', 'masdfas', '2014-06-23', 1, 0),
(8, 'edifi001', 'traslado03', 'estassssfdas', '2014-06-24', 6, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gu_menu`
--

CREATE TABLE IF NOT EXISTS `gu_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `icono` varchar(350) COLLATE latin1_general_ci DEFAULT NULL,
  `movil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gu_opcion`
--

CREATE TABLE IF NOT EXISTS `gu_opcion` (
  `id_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `opcion` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(300) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_opcion`),
  KEY `jd_menu_idx` (`id_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gu_rol`
--

CREATE TABLE IF NOT EXISTS `gu_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gu_rol_menu`
--

CREATE TABLE IF NOT EXISTS `gu_rol_menu` (
  `id_rol` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_opcion`),
  UNIQUE KEY `id_rol` (`id_rol`),
  KEY `fk_gu_rol_menu_gu_opcion1` (`id_opcion`),
  KEY `fk_gu_rol_menu_gu_rol1` (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id_settings` int(10) NOT NULL,
  `descripcion` text COLLATE latin1_general_ci,
  `valor` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `simbolo` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `comentario` text COLLATE latin1_general_ci NOT NULL,
  `activo` varchar(1) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_settings`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre_usuario` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `clave` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `nombre_completo` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `fecha_creacion` time NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_idx` (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `nombre_usuario`, `clave`, `nombre_completo`, `fecha_creacion`) VALUES
(1, 2, '@marioabmi', 'eb5a790b34e06e2ce3346fa2ca5d6abb', 'Mario Nelsonm Rivas Gonzalez', '00:00:00'),
(2, 2, '@praticia', 'e10adc3949ba59abbe56e057f20f883e', 'Patricia', '00:00:00'),
(3, 2, '@rony', 'e10adc3949ba59abbe56e057f20f883e', 'Rony', '00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
