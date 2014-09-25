CREATE DATABASE  IF NOT EXISTS `sys_activofijo` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sys_activofijo`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: sys_activofijo
-- ------------------------------------------------------
-- Server version	5.6.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cat_activo_fijo`
--

DROP TABLE IF EXISTS `cat_activo_fijo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_activo_fijo` (
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `id_cuentacontable` int(10) NOT NULL,
  `id_area` int(6) DEFAULT NULL,
  `id_sucursal` int(10) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_proveedor` int(10) NOT NULL,
  `nombre_activo_fijo` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `descripcion` text COLLATE latin1_general_ci NOT NULL,
  `valor_original` float NOT NULL,
  `tipo_valor` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_inicio_uso` date DEFAULT NULL,
  `importe_depreciable` float NOT NULL,
  `parte1` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `vida_util` int(2) NOT NULL,
  `valor_residual` float NOT NULL,
  `cuota_anual` float NOT NULL,
  `cuota_mensual` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `activado` int(11) NOT NULL,
  PRIMARY KEY (`id_activofijo`),
  KEY `id_cuentacontable_idx` (`id_cuentacontable`),
  KEY `id_area_idx` (`id_area`),
  KEY `id_sucursal_idx` (`id_sucursal`),
  KEY `id_empleado_idx` (`id_empleado`),
  KEY `id_proveedor_idx` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_activo_fijo`
--

LOCK TABLES `cat_activo_fijo` WRITE;
/*!40000 ALTER TABLE `cat_activo_fijo` DISABLE KEYS */;
INSERT INTO `cat_activo_fijo` VALUES ('001',1,NULL,6,0,5,'hermoso','nn',500,NULL,'2014-09-21','2014-09-27 06:00:00',NULL,510,'460',10,50,46,'3.8333333333333335',0),('0955208',3,NULL,9,0,4,'Galleta','sdfsdf',500,NULL,'2014-09-21','2014-09-21 06:00:00',NULL,510,'460',10,50,46,'3.8333333333333335',0),('0955208888',3,NULL,7,0,5,'Galleta','-kjhkj',500,NULL,'2014-09-21','2014-09-21 06:00:00',NULL,510,'410',10,100,41,'3.4166666666666665',0),('bonito01',1,9,10,4,5,'hermoso','asdhasjdhkajds',100,'real','2014-06-29','2014-06-30 01:10:42','2014-06-29',150,'145',10,5,14.5,'1.20833333',1),('cccc',1,9,9,3,5,'ccc','ccc',200,'real','2014-06-04','2014-06-30 01:17:15','2014-06-29',300,'290',10,10,29,'2.41666666',1),('maf001',1,9,9,7,2,'Cortadora_de_plasma','Cortadora de plasma, marca Miller, Serie: LGY434AD',2000,'real','2014-01-02','2014-06-26 00:10:24','2014-06-25',2050,'0',10,100,195,'16.25',1),('maf002',1,5,6,3,1,'Tanque_combustible','Tanque para combustible de 3,500 galones con bomba.',4000,'real','2014-04-07','2014-06-30 00:49:42','2014-06-29',4075,'0',10,300,377.5,'31.4583',1),('maf003',1,5,2,4,1,'Tractor','tractor d6b',25000,'real','2014-06-17','2014-06-30 00:49:50','2014-06-29',26200,'0',10,2500,2370,'197.5',1),('maq01',1,9,4,7,1,'maquinariadeprueba','maquinaria nueva',200,'real','2014-06-25','2014-06-26 02:26:52','2014-06-25',300,'250',10,50,25,'2.08333',1),('maquina11',1,9,9,3,2,'maquina de cortar cesped','maquina de cortar cesped',300,'real','2014-06-29','2014-06-30 00:57:06','2014-06-29',400,'380',10,20,38,'3.16666666',1),('meaf',3,7,5,1,4,'Regrigerador','refrigerador automático mabe 10 pies blanco\r\nrf10vw1sip',550,'real','2014-01-16','2014-06-30 00:49:56','2014-06-29',577,'0',10,79,49.8,'4.15',1),('meaf001',3,5,2,2,3,'Reproductord_CD_DVD','Reproductor de CD/DVD con pantalla táctil de 6.1 pulgadas, entrada auxiliar y USB, MIXTRAX y 3 salidas de previo RCA (2-DIN)',90,'real','2014-07-02','2014-06-30 00:50:03','2014-06-29',92,'0',10,15,7.7,'0.641667',1),('meaf003',3,5,9,4,1,'Camara_Sony','Dsc-h200 Sony Camara Semi Profesional ¡20.1mpx! ¡26x Zoom!',2700,'real','2014-01-07','2014-06-30 01:05:46','2014-06-29',2730,'0',10,280,245,'20.4167',1),('meaf004',3,5,5,4,4,'Refrigerador','refrigerador automático mabe 10 pies blanco\r\nrf10vw1sip',550,'real','2014-01-08','2014-06-30 01:07:43','2014-06-29',584,'0',10,89,49.5,'4.125',1),('meaf005',3,5,7,4,4,'Cocina','cocina de gas 20\" bisque / inox\r\nemg5115lis1',445,'real','2014-01-03','2014-06-30 01:08:55','2014-06-29',450,'0',10,50,40,'3.33333',1),('meaf006',3,9,9,3,4,'Lavadora','lavadora aqua saver 19 kg grafito\r\nlmh19589zkgg1',700,'real','2014-01-02','2014-07-25 19:17:30','2014-07-25',737,'0',10,100,63.7,'5.30833',1),('meaf007',3,10,10,8,4,'Secadora','secadora a gas blanca serie: sme1520pmbb',685,'real','2014-01-20','2014-01-24 12:00:00',NULL,697,'0',10,95,60.2,'5.01667',0),('meaf008',3,11,7,9,4,'Horno_Microonda','horno microondas mabe 0,7´ blanco hmm700wk',150,'real','2014-01-13','2014-01-20 12:00:00',NULL,158,'0',10,20,13.8,'1.15',0),('meaf009',3,9,5,3,3,'Lapto','DELL E 6400 ,X200 LENOVO   - EN BLACK FUSION',2900,'real','2014-01-14','2014-07-25 19:17:48','2014-07-25',2935,'0',10,200,273.5,'22.7917',1),('meaf010',3,12,9,10,4,'Ventilador','Ventilador, de potencia corta.',75,'real','2014-01-22','2014-01-24 12:00:00',NULL,80,'0',10,10,7,'0.583333',0),('MYE123',3,9,3,7,3,'Computadoratoshiba','Marca Toshiba, Ram 2gb, disco Duro 160gbHz, Color Azul.',560,'real','2014-06-16','2014-06-26 03:28:34','2014-06-25',600,'520',10,80,52,'4.33333333',1),('taf001',5,13,8,11,1,'YamahaVStar650','Yamaha V Star 650 Custom  Año: 2006 Marca: Yamaha',4500,'real','2014-02-04','2014-02-20 12:00:00',NULL,4800,'0',5,700,820,'68.3333',0),('taf002',5,14,9,12,2,'Bmw325xi','Bmw 325xi Año: 2006 Marca: BMW Modelo: 325 ms',19000,'real','2014-02-26','2014-02-28 12:00:00',NULL,19800,'0',5,3000,3360,'280',0),('taf003',5,15,3,13,1,'Nissan_frontier','Nissan frontier D/Cab 4x2 alto turbo diesel con intercooler año 2007',14000,'real','2014-05-13','2014-05-15 12:00:00',NULL,14490,'0',5,1500,2598,'216.5',0),('taf004',5,16,2,14,5,'Panel_e5','panel 2 toneladas diesel color blanco',9800,'real','2014-07-04','2014-07-31 12:00:00',NULL,10470,'0',5,1000,1894,'157.833',0),('taf005',5,17,9,15,5,'Mazda_2','Mazda 2 2012 Motor 1.5L Automatico, Full extras!',7009,'real','2014-06-02','2014-06-06 12:00:00',NULL,7065,'0',5,900,1233,'102.75',0),('te002',4,18,7,16,5,'Bodega','Bodega grande, ubicada en Usulutan',400000,'real','2014-03-04','2014-03-21 12:00:00',NULL,400700,'0',20,50000,17535,'1461.25',0),('teaf001',4,19,9,17,5,'Casa_san_salvador','Casa en San Salvador dirección: Col Flor Blanca (San Salvador) San Salvador, área 1,020.37 mts 1,182.23v2',80000,'real','2014-01-02','2014-01-23 12:00:00',NULL,81200,'0',20,5000,3810,'317.5',0),('teaf002',4,20,4,18,5,'Casa','Casa en La Libertad, san antonio las palmeras, 350 m2, 6 recámaras, 4 baños',119000,'real','2014-02-05','2014-02-27 12:00:00',NULL,119450,'0',20,20000,4972.5,'414.375',0),('USIS005309',1,NULL,7,0,4,'MonitorSansum','aaaaaaaaaaaaaaaa',500,NULL,'2014-09-21','2014-09-19 06:00:00',NULL,510,'410',10,100,41,'3.4166666666666665',0);
/*!40000 ALTER TABLE `cat_activo_fijo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_area`
--

DROP TABLE IF EXISTS `cat_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_area` (
  `id_area` int(6) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(10) NOT NULL,
  `nombre_area` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_area`),
  KEY `id_sucursal_idx` (`id_sucursal`),
  CONSTRAINT `id_area` FOREIGN KEY (`id_area`) REFERENCES `cat_activo_fijo` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_area`
--

LOCK TABLES `cat_area` WRITE;
/*!40000 ALTER TABLE `cat_area` DISABLE KEYS */;
INSERT INTO `cat_area` VALUES (5,5,'Recursos Humanos'),(7,7,'Ventas'),(9,0,'Produccion');
/*!40000 ALTER TABLE `cat_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_baja`
--

DROP TABLE IF EXISTS `cat_baja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_baja` (
  `id_baja` int(10) NOT NULL AUTO_INCREMENT,
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `fecha_baja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `motivo_baja` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_baja`),
  KEY `id_activofijo_idx` (`id_activofijo`),
  CONSTRAINT `id_activofijo` FOREIGN KEY (`id_activofijo`) REFERENCES `cat_activo_fijo` (`id_activofijo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_baja`
--

LOCK TABLES `cat_baja` WRITE;
/*!40000 ALTER TABLE `cat_baja` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_baja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_cuentas_contables`
--

DROP TABLE IF EXISTS `cat_cuentas_contables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_cuentas_contables` (
  `id_cuentacontable` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_cuenta` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `vida_util` int(2) NOT NULL,
  PRIMARY KEY (`id_cuentacontable`),
  CONSTRAINT `id_cuentacontable` FOREIGN KEY (`id_cuentacontable`) REFERENCES `cat_activo_fijo` (`id_cuentacontable`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_cuentas_contables`
--

LOCK TABLES `cat_cuentas_contables` WRITE;
/*!40000 ALTER TABLE `cat_cuentas_contables` DISABLE KEYS */;
INSERT INTO `cat_cuentas_contables` VALUES (1,'Maquinaria',10),(3,'Mobiliario y Equipo',10),(4,'Terrenos Y Edificios',20),(5,'Transporte',5);
/*!40000 ALTER TABLE `cat_cuentas_contables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_depreciacion_activo`
--

DROP TABLE IF EXISTS `cat_depreciacion_activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_depreciacion_activo` (
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_depreciacion_activo`
--

LOCK TABLES `cat_depreciacion_activo` WRITE;
/*!40000 ALTER TABLE `cat_depreciacion_activo` DISABLE KEYS */;
INSERT INTO `cat_depreciacion_activo` VALUES (2,'meaf008',1,'2014-06-26',6.32,500.15,146.4,353.75),(3,'meaf007',2,'2014-06-26',7.32,400.16,134.44,265.72),(4,'meaf006',1,'2014-06-26',10,200,200,10),(26,'maf002',1,'2014-06-29',31.4583,0,NULL,NULL),(27,'maf003',1,'2014-06-29',197.5,0,NULL,NULL),(28,'meaf',3,'2014-06-29',4.15,0,NULL,NULL),(29,'meaf001',3,'2014-06-29',0.641667,0,NULL,NULL),(30,'maquina11',1,'2014-06-29',3.16667,380,NULL,NULL),(31,'meaf003',3,'2014-06-29',20.4167,0,NULL,NULL),(32,'meaf004',3,'2014-06-29',4.125,0,NULL,NULL),(33,'meaf005',3,'2014-06-29',3.33333,0,23.3333,-23.3333),(34,'bonito01',1,'2014-06-29',1.20833,145,18.125,126.875),(35,'cccc',1,'2014-06-29',2.41667,290,24.3334,265.667),(36,'meaf006',3,'2014-07-25',5.30833,0,0,0),(37,'meaf009',3,'2014-07-25',22.7917,0,0,0);
/*!40000 ALTER TABLE `cat_depreciacion_activo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_empleado`
--

DROP TABLE IF EXISTS `cat_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_empleado` (
  `id_empleado` int(8) NOT NULL,
  `codigo_empleado` varchar(10) NOT NULL,
  `nombre_empleado` varchar(45) NOT NULL,
  `direccion_empleado` varchar(45) NOT NULL,
  `telefono_empleado` varchar(9) NOT NULL,
  `email_empleado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_empleado`
--

LOCK TABLES `cat_empleado` WRITE;
/*!40000 ALTER TABLE `cat_empleado` DISABLE KEYS */;
INSERT INTO `cat_empleado` VALUES (1,'E32','Jose Roberto','11° Calle Oriente','12345678','Jos@serrano.com'),(2,'E33','Jose','11° Calle','12345678','Jose@serrano.com'),(4,'e75','Jorge Alberto Villegas','venezuela','26451823|','jorge@ugb.edu.sv'),(5,'e90lu','Luis Humberto Mejia','colinia masferrer','26624563','luisito@gmail.com');
/*!40000 ALTER TABLE `cat_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_mov_interno`
--

DROP TABLE IF EXISTS `cat_mov_interno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_mov_interno` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_mov_interno`
--

LOCK TABLES `cat_mov_interno` WRITE;
/*!40000 ALTER TABLE `cat_mov_interno` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_mov_interno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_proveedor`
--

DROP TABLE IF EXISTS `cat_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_proveedor` (
  `id_proveedor` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_provee` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `direccion_provee` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `telefono_provee` varchar(9) COLLATE latin1_general_ci NOT NULL,
  `email_provee` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nrc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `nit` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  CONSTRAINT `id_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `cat_activo_fijo` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_proveedor`
--

LOCK TABLES `cat_proveedor` WRITE;
/*!40000 ALTER TABLE `cat_proveedor` DISABLE KEYS */;
INSERT INTO `cat_proveedor` VALUES (1,'Proveedora Cesariño','usulutan colonia soriano','2712-5695','cesar@gmail.com','','21813918332'),(2,'Los Cedros','sexta calle poniente colonia san pedro Usulut','266-1221','loscedros.sa.dcv@hotmail.com','34355','1232-123242-123-4'),(3,'Panasonic','san salvador','2662-2323','panasonic.cor@hotmail.com','45646','1232-233221-342-1'),(4,'Industrias Mabe','san salvador','2662-4544','industriasmabe@gmail.com','2323','1233-121331-122-1'),(5,'Atlas','san salvador','2662-4433','provatlas@hotmail.com','2323','1233-342233-442-2');
/*!40000 ALTER TABLE `cat_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_sucursal`
--

DROP TABLE IF EXISTS `cat_sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_sucursal` (
  `id_sucursal` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_sucursal` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `telefono_sucursal` varchar(9) COLLATE latin1_general_ci NOT NULL,
  `direccion_sucursal` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `departamento` varchar(25) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_sucursal`
--

LOCK TABLES `cat_sucursal` WRITE;
/*!40000 ALTER TABLE `cat_sucursal` DISABLE KEYS */;
INSERT INTO `cat_sucursal` VALUES (1,'Comercial Perez','2662-3064','sexta calle oriente col.santa rosa Usulutan','Usulutan'),(2,'Comercial Rony','2662-5530','octava avenida norte al sur de tienda galo ','San Miguel'),(3,'Tienda Diaz','2662-7845','Quinta avenida norte frente a peluquería el C','Usulutan'),(4,'comercial Ivette','2662-8875','colonia los Naranjos ','San miguel'),(5,'Comercial Hernandez','2662-9984','Colonia Esperanza ','La Paz'),(6,'Tienda Funes','2662-9087','sexta calle poniente frente a farmacia la Fe','La Union'),(7,'comercial Gonzalez','2662-2232','frente a Radio YSJY','Usulutan'),(8,'Tienda Robert','2624-3423','Camino al Centro de Gobierno ','Usulutan'),(9,'Comercial Camila ','2624-0099','contiguo al Centro Comercial Puerta de Orient','Usulutan'),(10,'Comercial Dany','2624-0876','Frente A Joyería Evelyn ','San Miguel');
/*!40000 ALTER TABLE `cat_sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_trasladoaf`
--

DROP TABLE IF EXISTS `cat_trasladoaf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_trasladoaf` (
  `id_traslado_activo` int(10) NOT NULL AUTO_INCREMENT,
  `id_activofijo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `codigo_traslado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `motivo_traslado` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `fecha_traslado` date NOT NULL,
  `id_sucursal` int(10) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_traslado_activo`),
  KEY `id_activofijo_idx` (`id_activofijo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_trasladoaf`
--

LOCK TABLES `cat_trasladoaf` WRITE;
/*!40000 ALTER TABLE `cat_trasladoaf` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_trasladoaf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gu_menu`
--

DROP TABLE IF EXISTS `gu_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gu_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gu_menu`
--

LOCK TABLES `gu_menu` WRITE;
/*!40000 ALTER TABLE `gu_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `gu_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gu_opcion`
--

DROP TABLE IF EXISTS `gu_opcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gu_opcion` (
  `id_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `opcion` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  PRIMARY KEY (`id_opcion`),
  KEY `jd_menu_idx` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gu_opcion`
--

LOCK TABLES `gu_opcion` WRITE;
/*!40000 ALTER TABLE `gu_opcion` DISABLE KEYS */;
INSERT INTO `gu_opcion` VALUES (1,1,'Activo Fijo','crud_activo',0),(2,0,'Activos Sin Activar','crud_activo/activar',0),(3,0,'Baja De Activos','crud_Baja',0),(4,2,'Empleados','crud_empleado',0),(5,0,'Traslado','crud_traslado',0),(6,0,'Proveedores','crud_proveedor',0),(7,0,'Depreciacion','crud_depreciacion',0),(8,0,'Depreciar Activos','crud_activo/advertencia',0),(9,0,'Ver saldos','crud_depreciacion/versaldo',0),(10,0,'Area','crud_area',0),(11,0,'Cuentas','crud_cuenta',0),(12,0,'Sucursales','crud',0),(13,0,'Usuarios','usuarios',0);
/*!40000 ALTER TABLE `gu_opcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gu_rol`
--

DROP TABLE IF EXISTS `gu_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gu_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gu_rol`
--

LOCK TABLES `gu_rol` WRITE;
/*!40000 ALTER TABLE `gu_rol` DISABLE KEYS */;
INSERT INTO `gu_rol` VALUES (1,'Administrador'),(2,'Contador'),(3,'mario'),(4,'Secretaria'),(7,'agente'),(8,'Reportero');
/*!40000 ALTER TABLE `gu_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gu_rol_menu`
--

DROP TABLE IF EXISTS `gu_rol_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gu_rol_menu` (
  `id_go_rol_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_opcion` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_go_rol_menu`),
  KEY `fk_gu_rol_menu_gu_opcion1` (`id_opcion`),
  KEY `fk_gu_rol_menu_gu_rol1` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gu_rol_menu`
--

LOCK TABLES `gu_rol_menu` WRITE;
/*!40000 ALTER TABLE `gu_rol_menu` DISABLE KEYS */;
INSERT INTO `gu_rol_menu` VALUES (1,'1','1'),(2,'1','2'),(3,'1','3'),(4,'1','4'),(5,'1','5'),(6,'1','6'),(7,'1','7'),(8,'1','8'),(9,'2','1'),(10,'2','2'),(11,'2','3'),(12,'3','5'),(13,'3','6'),(14,'1','9'),(15,'1','10'),(16,'1','11'),(17,'1','12'),(18,'1','13'),(19,'2','4'),(20,'2','8'),(21,'3','2'),(22,'3','7'),(23,'3','13'),(41,'8','Reportero'),(42,'8','11'),(43,'8','1'),(44,'7','6');
/*!40000 ALTER TABLE `gu_rol_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id_settings` int(10) NOT NULL,
  `descripcion` text COLLATE latin1_general_ci,
  `valor` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `simbolo` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `comentario` text COLLATE latin1_general_ci NOT NULL,
  `activo` varchar(1) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_settings`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `nombre_usuario` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `clave` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `nombre_completo` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol_idx` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'@marioabmi','e10adc3949ba59abbe56e057f20f883e','Mario Nelson Rivas'),(3,2,'@rony','e10adc3949ba59abbe56e057f20f883e','Rony'),(5,3,'@David','e10adc3949ba59abbe56e057f20f883e','David'),(6,3,'@israel','e10adc3949ba59abbe56e057f20f883e','Israel');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sys_activofijo'
--
/*!50003 DROP PROCEDURE IF EXISTS `depreciacion1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
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
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `primero` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `primero`(cuota_mensual float, depreciacion_acumulada float)
BEGIN

select cat_depreciacion_activo.depreciacion_acumulada as DepreciacionAcumulada,
		cat_depreciacion_activo.saldo_restante as SaldoRestante
from cat_depreciacion_activo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `procedimiento1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `procedimiento1`()
BEGIN

update cat_depreciacion_activo

set depreciacion_acumulada = cuota_mensual+depreciacion_acumulada
where saldo_restante>"0" and depreciacion_acumulada!=parte1;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `procedimiento2` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `procedimiento2`()
BEGIN
update cat_depreciacion_activo
set saldo_restante=parte1-depreciacion_acumulada

where saldo_restante>"0" and depreciacion_acumulada!=parte1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `prueba` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba`()
BEGIN

update cat_depreciacion_activo
set depreciacion_acumulada = cuota_mensual+depreciacion_acumulada;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `prueba1` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba1`()
BEGIN
update cat_depreciacion_activo
set saldo_restante=parte1-depreciacion_acumulada

where saldo_restante>"0" and depreciacion_acumulada!=parte1;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-24 19:39:39
