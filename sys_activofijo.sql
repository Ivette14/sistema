-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2014 a las 08:26:26
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `depreciacion1`()
BEGIN

declare depre  FLOAT;
select depre =cat_depreciacion_activo.cuota_mensual+cat_depreciacion_activo.depreciacion_acumulada
from cat_depreciacion_activo;
select 


        cuota_mensual as CuotaM,
        parte1 AS Totaldepreciar,
		(cuota_mensual+depreciacion_acumulada) AS Depreciacionacumulada
	
		
    from
        cat_depreciacion_activo;
UPDATE `sys_activofijo`.`cat_depreciacion_activo` SET `depreciacion_acumulada`= (`cuota_mensual`+`depreciacion_acumulada`);
		
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `primero`(cuota_mensual float, depreciacion_acumulada float)
BEGIN

select cat_depreciacion_activo.depreciacion_acumulada as DepreciacionAcumulada,
		cat_depreciacion_activo.saldo_restante as SaldoRestante
from cat_depreciacion_activo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procedimiento1`()
BEGIN

update cat_depreciacion_activo

set depreciacion_acumulada = cuota_mensual+depreciacion_acumulada
where saldo_restante>"0" and depreciacion_acumulada!=parte1;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procedimiento2`()
BEGIN
update cat_depreciacion_activo
set saldo_restante=parte1-depreciacion_acumulada

where saldo_restante>"0" and depreciacion_acumulada!=parte1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba`()
BEGIN

update cat_depreciacion_activo
set depreciacion_acumulada = cuota_mensual+depreciacion_acumulada;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba1`()
BEGIN
update cat_depreciacion_activo
set saldo_restante=parte1-depreciacion_acumulada

where saldo_restante>"0" and depreciacion_acumulada!=parte1;



END$$

DELIMITER ;

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
  `parte1` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `vida_util` int(2) NOT NULL,
  `valor_residual` float NOT NULL,
  `cuota_anual` float NOT NULL,
  `cuota_mensual` varchar(10) COLLATE latin1_general_ci NOT NULL,
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

INSERT INTO `cat_activo_fijo` (`id_activofijo`, `id_cuentacontable`, `id_area`, `id_sucursal`, `id_empleado`, `id_proveedor`, `nombre_activo_fijo`, `descripcion`, `valor_original`, `tipo_valor`, `fecha_compra`, `fecha_ingreso`, `fecha_inicio_uso`, `importe_depreciable`, `parte1`, `vida_util`, `valor_residual`, `cuota_anual`, `cuota_mensual`, `activado`) VALUES
('maf001', 1, 9, 9, '1', 5, 'Tanque_de_combustible', 'Tanque para almacenar combustibe', 2500, 'real', '2014-06-03', '2014-06-30 06:04:06', '2014-06-30', 2700, '2400', 10, 300, 240, '20', 1),
('maf002', 1, 9, 5, '5', 2, 'Tractor', 'tractor agricola', 65000, 'real', '2014-06-01', '2014-06-30 06:17:29', '2014-06-30', 66200, '63200', 10, 3000, 6320, '526.666666', 1),
('mbaf001', 3, NULL, 1, '0', 4, 'Refrigerador', 'refrigeradora color blanco', 700, 'real', '2014-06-05', '2014-06-12 06:00:00', NULL, 735, '635', 10, 100, 63.5, '5.29166666', 0),
('meaf002', 3, 5, 6, '4', 3, 'Camara_sony', 'camara de video', 1500, 'real', '2014-06-06', '2014-06-30 06:04:19', '2014-06-30', 1560, '1437', 10, 123, 143.7, '11.975', 1),
('meaf003', 3, NULL, 4, '0', 5, 'Horno_Microonda', 'Horno microonda color negro', 1200, 'real', '2014-06-18', '2014-06-24 06:00:00', NULL, 1400, '1100', 10, 300, 110, '9.16666666', 0),
('meaf004', 3, NULL, 5, '0', 5, 'Secadora', 'Secadora industrial', 750, 'real', '2014-06-03', '2014-06-04 06:00:00', NULL, 770, '650', 10, 120, 65, '5.41666666', 0),
('t001', 5, NULL, 7, '0', 1, 'Microbus', 'Microbus toyota', 34000, 'real', '2014-06-11', '2014-06-18 06:00:00', NULL, 35400, '33400', 5, 2000, 6680, '556.666666', 0);

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
(9, 0, 'Produccion'),
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
  `cuota_mensual` float NOT NULL,
  `parte1` float NOT NULL,
  `depreciacion_acumulada` float DEFAULT NULL,
  `saldo_restante` float DEFAULT NULL,
  PRIMARY KEY (`id_depreciacion_activo`),
  KEY `id_activofijo_idx` (`id_activofijo`),
  KEY `id_cuentacontable_idx` (`id_cuentacontable`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `cat_depreciacion_activo`
--

INSERT INTO `cat_depreciacion_activo` (`id_depreciacion_activo`, `id_activofijo`, `id_cuentacontable`, `año_mes`, `cuota_mensual`, `parte1`, `depreciacion_acumulada`, `saldo_restante`) VALUES
(39, 'maf002', 1, '2014-06-30', 526.667, 63200, 1053.33, 62146.7),
(37, 'maf001', 1, '2014-06-30', 20, 2400, 80, 2320),
(38, 'meaf002', 3, '2014-06-30', 11.975, 1437, 47.9, 1389.1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_empleado`
--

CREATE TABLE IF NOT EXISTS `cat_empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_empleado` varchar(10) NOT NULL,
  `nombre_empleado` varchar(45) NOT NULL,
  `direccion_empleado` varchar(45) NOT NULL,
  `telefono_empleado` varchar(9) NOT NULL,
  `email_empleado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cat_empleado`
--

INSERT INTO `cat_empleado` (`id_empleado`, `codigo_empleado`, `nombre_empleado`, `direccion_empleado`, `telefono_empleado`, `email_empleado`) VALUES
(1, 'E32', 'Jose Roberto', '11° Calle Oriente', '12345678', 'Jos@serrano.com'),
(2, 'E33', 'Jose', '11° Calle', '12345678', 'Jose@serrano.com'),
(3, 'E01', 'Ivette', '12° Calle Oriente', '12345678', 'Ivette@serrano.com'),
(4, 'e75', 'Jorge Alberto Villegas', 'venezuela', '26451823|', 'jorge@ugb.edu.sv'),
(5, 'e90lu', 'Luis Humberto Mejia', 'colinia masferrer', '26624563', 'luisito@gmail.com');

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
(1, 'Proveedora Cesariño', 'usulutan colonia soriano', '2712-5695', 'cesar@gmail.com', '', '21813918332'),
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
