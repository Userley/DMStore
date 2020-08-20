-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bd_dmstore
DROP DATABASE IF EXISTS `bd_dmstore`;
CREATE DATABASE IF NOT EXISTS `bd_dmstore` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bd_dmstore`;

-- Volcando estructura para tabla bd_dmstore.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.categoria: ~17 rows (aproximadamente)
DELETE FROM `categoria`;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`idcategoria`, `descripcion`) VALUES
	(1, 'ABARROTES'),
	(2, 'ENLATADOS'),
	(3, 'LACTEOS'),
	(4, 'SNACKS'),
	(5, 'CONFITERIA'),
	(6, 'HARINAS'),
	(7, 'FRUTAS Y VERDURAS'),
	(8, 'BEBIDAS'),
	(9, 'BEBIDAS ALCOHOLICAS'),
	(10, 'ALIMENTOS PREPARADOS'),
	(11, 'CARNES'),
	(12, 'AUTOMEDICACION'),
	(13, 'HIGIENE PERSONAL'),
	(14, 'USO DOMESTICO'),
	(15, 'HELADOS'),
	(16, 'PRODUCTOS DE LIMPIEZA'),
	(17, 'OTROS');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.clientes: ~0 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.detalleventas
CREATE TABLE IF NOT EXISTS `detalleventas` (
  `iddetalleventas` int(11) NOT NULL AUTO_INCREMENT,
  `idventas` int(11) DEFAULT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `preciocompra` decimal(10,2) DEFAULT NULL,
  `precioventa` decimal(10,2) DEFAULT NULL,
  `cantidad` decimal(10,1) DEFAULT NULL,
  `fechaventa` datetime DEFAULT NULL,
  `idservicio` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalleventas`),
  KEY `FK_Servicio_DetalleVentas` (`idservicio`),
  KEY `FK_Ventas_DetalleVentas` (`idventas`),
  CONSTRAINT `FK_Servicio_DetalleVentas` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`),
  CONSTRAINT `FK_Ventas_DetalleVentas` FOREIGN KEY (`idventas`) REFERENCES `ventas` (`idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.detalleventas: ~0 rows (aproximadamente)
DELETE FROM `detalleventas`;
/*!40000 ALTER TABLE `detalleventas` DISABLE KEYS */;
INSERT INTO `detalleventas` (`iddetalleventas`, `idventas`, `idcliente`, `idproducto`, `preciocompra`, `precioventa`, `cantidad`, `fechaventa`, `idservicio`) VALUES
	(1, 1, NULL, 1, 2.88, 3.20, 4.0, '2020-08-19 13:54:26', 1);
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `preciocompra` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `idundmedida` int(11) DEFAULT NULL,
  `precioventa` decimal(10,2) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `FK_Categoria_UndMedida` (`idundmedida`),
  KEY `FK_Categoria_Productos` (`idcategoria`) USING BTREE,
  CONSTRAINT `FK_Categoria_Productos` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `FK_Categoria_UndMedida` FOREIGN KEY (`idundmedida`) REFERENCES `unidadmedida` (`idundmedida`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.productos: ~87 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idproducto`, `descripcion`, `idcategoria`, `preciocompra`, `Stock`, `idundmedida`, `precioventa`, `fecharegistro`) VALUES
	(1, 'LECHE IDEAL CREMOSITA', 3, 2.88, 20, 1, 3.20, NULL),
	(2, 'ARROZ CATALÁN ', 1, 2.86, 49, 2, 3.20, NULL),
	(3, 'DETERGENTE SAPOLIO', 16, 4.58, 14, 2, 6.00, NULL),
	(4, 'AZUCAR MANUELITA', 1, 2.00, 50, 2, 2.80, NULL),
	(5, 'ACEITE PRIMOR CLASICO', 1, 6.66, 6, 3, 7.30, NULL),
	(6, 'ACEITE PRIMOR  PREMIUN', 1, 44.00, 6, 3, 7.50, NULL),
	(7, 'FIDEO SPAGUETTI DON VITTORIO', 1, 2.60, 20, 1, 2.80, NULL),
	(8, 'LECHE GLORIA AZUL', 3, 2.80, 25, 1, 3.50, NULL),
	(9, 'FILETE DE CABALLA GISELLA', 2, 3.08, 48, 1, 3.50, NULL),
	(10, 'LENTEJA SERRANITA MARRÓN', 1, 4.00, 5, 2, 6.00, NULL),
	(11, 'LENTEJA VERDE ', 1, 4.00, 5, 2, 6.00, NULL),
	(12, 'AVENA GRANO DE ORO ', 1, 1.00, 12, 1, 1.20, NULL),
	(13, 'GELATINA NEGRITA DE FRESA', 1, 2.80, 12, 1, 3.50, NULL),
	(14, 'COCOA WINTERS', 1, 1.80, 12, 1, 2.00, NULL),
	(15, 'MILO EN SOBRE', 1, 1.75, 12, 1, 2.00, NULL),
	(16, 'NESCAFE EN SOBRE', 1, 1.45, 12, 1, 1.50, NULL),
	(17, 'SILLAO CHICO', 1, 0.90, 12, 1, 1.00, NULL),
	(18, 'FIDEO CANUTO Y TORNILLO DON VITTORIO', 1, 1.30, 40, 1, 1.50, NULL),
	(19, 'FRASCOS DE 50 ML ALCOHOL', 13, 2.79, 24, 1, 5.00, NULL),
	(20, 'MASCARILLAS KN95 ADULTO', 1, 5.00, 13, 1, 8.00, NULL),
	(21, 'FRASCOS ANIMADOS DE ALCOHOL EN GEL ', 1, 2.45, 20, 1, 5.50, NULL),
	(22, 'MASCARILLAS PARA NIÑOS KN95 ', 1, 8.00, 6, 1, 12.00, NULL),
	(23, 'CHIPS DE CLARO', 1, 2.00, 50, 1, 5.00, NULL),
	(24, 'KOLYNOS SUPER BLANCO', 13, 2.64, 14, 1, 3.50, NULL),
	(25, 'COLGATE HERBAL 90 GR', 13, 2.10, 12, 1, 2.50, NULL),
	(26, 'COLGATE TRIPLE ACCION 75ML', 13, 4.39, 12, 1, 4.50, NULL),
	(27, 'COLGATE DE NIÑOS 50 GR', 13, 2.27, 12, 1, 2.50, NULL),
	(28, 'CEPILLO COLGATE  PREMIER CLEAN ADULTO', 1, 1.76, 14, 1, 2.00, NULL),
	(29, 'CEPILLO COLGATE KIDS ', 13, 2.27, 12, 1, 2.60, NULL),
	(30, 'DESODORANTE  LADY SS CON TAPA 9 GR Y HOMBRE ', 1, 0.77, 40, 1, 1.70, NULL),
	(31, 'SOPA AHINOMEN GALLINA ', 1, 0.94, 12, 1, 1.10, NULL),
	(32, 'AJINOMOTO 8 GR ', 1, 0.15, 60, 1, 0.20, NULL),
	(33, 'AJINOMOTO DE 24 GR', 1, 0.40, 40, 1, 0.50, NULL),
	(34, 'AJINOMOTO  52 GR', 1, 0.83, 20, 1, 1.00, NULL),
	(35, 'AJINOMIX CHIFA 12GR ', 1, 0.37, 10, 1, 0.50, NULL),
	(36, 'PAPEL P.H. D. HOJA ELITE', 13, 1.60, 32, 1, 2.00, NULL),
	(37, 'PAPEL TOALLA NOVA MEGA ROLLO X UNID. 19 MT', 1, 3.48, 3, 1, 4.00, NULL),
	(38, 'SERVILLETAS NOBLE CORTADA 180 HOJAS', 1, 0.80, 15, 1, 1.00, NULL),
	(39, 'PAPEL HIGIENICO X 4 UNID, ELITE', 1, 2.56, 27, 1, 3.50, NULL),
	(40, 'PAPEL HIGIENICO PH. ELITE X 24 UNID. ', 13, 16.88, 1, 1, 17.50, NULL),
	(41, 'TOALLA HIEGIENICA LADY SOFT NOCTURNA DOBLE ALA X 10 UNID', 1, 4.77, 4, 1, 5.50, NULL),
	(42, 'T.H. NOSOTRAS NATURAL ALAS TELA GEL X10 UNID.', 13, 3.31, 12, 1, 3.80, NULL),
	(43, 'T.H. NOSOTRAS NATURAL ALAS TELA GEL X42UNID.', 1, 12.74, 1, 1, 14.70, NULL),
	(44, 'T.H. NOSOTRAS INVISIBLE RAPIGEL X 10 UNID. ', 13, 3.12, 28, 1, 3.80, NULL),
	(45, 'PROTECTORES DIARIOSNOSOTRAS DESODORANTE X 15 UNID.', 13, 2.55, 12, 1, 2.90, NULL),
	(46, 'TIRA PROTECTORES DIARIOS NOSOTRAS DESODORANTE  X 6 UNID ', 1, 0.98, 10, 1, 1.20, NULL),
	(47, 'ESPONJA SCOTCH BRITE 2 EN 1 X 7 UNID. ', 14, 2.72, 7, 1, 3.20, NULL),
	(48, 'ESPONJA ESCOTCH BRITE VERDE X18 UNID', 14, 1.09, 18, 1, 1.30, NULL),
	(49, 'ESPONJA ESCOTCH BRITE LA MAQUINA X 13 UNID.', 14, 1.28, 13, 1, 1.50, NULL),
	(50, 'DETERGENTE DE PATITO LIMON X 140GR.', 1, 0.78, 60, 1, 1.20, NULL),
	(51, 'TIRA DE SUAVITEL FRESCA PRIMAVERA  80 ML', 14, 0.88, 12, 1, 1.00, NULL),
	(52, 'TIRA DE SUAVITEL LAVANDA  X 12 UNID. 80 ML', 14, 0.88, 12, 1, 1.00, NULL),
	(53, 'DPK SUAVITEL FRESCA PRIAMVERA X 200ML', 14, 1.60, 16, 1, 2.50, NULL),
	(54, 'DPK SUAVITEL LAVANDA X 180ML', 14, 2.10, 12, 1, 2.50, NULL),
	(55, 'PACK TALLARIN INST. AJINOMEN ROJO ', 1, 1.10, 12, 1, 1.30, NULL),
	(56, 'JABON PROTEX AVENA ', 13, 2.55, 4, 1, 2.90, NULL),
	(57, 'JABON PROTEX LIMPIEZA PROFUNDA ', 13, 2.55, 4, 1, 2.90, NULL),
	(58, 'JABON  PROTEX FRESH ', 13, 2.55, 4, 1, 2.90, NULL),
	(59, 'JABON PALMOLIVE ALOE Y OLIVA ', 13, 2.44, 4, 1, 2.80, NULL),
	(60, 'JABON PALMOLIVE GRANADA ', 13, 2.44, 4, 1, 2.80, NULL),
	(61, 'JABON PALMOLIVE AVENA Y AZUCAR ', 13, 2.44, 4, 1, 2.80, NULL),
	(62, 'TRATAMIENTO NUTRIBELLA REPARACION 27 GR', 13, 1.20, 12, 1, 1.50, NULL),
	(63, 'MEZCLA AJINOMIX APANADO 96 GR', 1, 1.35, 15, 1, 1.60, NULL),
	(64, 'MEZCLA AJINOMIX CROCANTE ', 1, 1.40, 15, 1, 1.60, NULL),
	(65, 'MEZCLA AJINOMIX PICANTE 80 GR', 1, 1.40, 15, 1, 1.60, NULL),
	(66, 'DOÑA GUSTA COSTILLA DE RES ', 1, 0.15, 40, 1, 0.20, NULL),
	(67, 'DOÑA GUSTA DE PESCADOS Y MARISCOS', 1, 0.15, 40, 1, 0.20, NULL),
	(68, 'DOÑA GUSTA DE CARNE ', 1, 0.15, 40, 1, 0.20, NULL),
	(69, 'LAVAVAJILLA ENPOTE  1K', 14, 5.00, 6, 1, 5.50, NULL),
	(70, 'AYUDIN LIQUIDO 300ML CON ESPONJA', 14, 4.30, 12, 1, 5.00, NULL),
	(71, 'PRESTOBARBA TRIPLE HOJA GILLETE', 13, 2.90, 10, 1, 3.50, NULL),
	(72, 'JABON BOLIVAR ', 1, 1.80, 12, 1, 2.50, NULL),
	(73, 'JABON TROME ', 14, 0.90, 12, 1, 1.20, NULL),
	(74, 'LEJIA SAPOLIO 670ML', 1, 1.80, 12, 1, 2.20, NULL),
	(75, 'AYUDIN DE 1 LITRO', 14, 10.30, 3, 1, 13.50, NULL),
	(76, 'JABON MARSELLA ', 14, 1.54, 12, 1, 2.50, NULL),
	(77, 'TIRA DE PANTENE', 13, 0.80, 12, 1, 1.20, NULL),
	(78, 'PAQUETE DE ACITE CIL DE CUARTO 200 ML', 1, 1.30, 12, 1, 1.50, NULL),
	(79, 'TIRA DE H Y S 18 ML', 13, 0.90, 10, 1, 1.50, NULL),
	(80, 'TIRA DE SEDAL', 1, 1.20, 10, 1, 1.50, NULL),
	(81, '1 DOC DE DOWNI ', 14, 0.80, 12, 1, 1.20, NULL),
	(82, 'POMAROLA SALSA DE TOMATE 160GR', 1, 6.25, 12, 1, 6.50, NULL),
	(83, 'MERMELADA FANNY FRESA DELI ', 1, 0.90, 12, 1, 1.20, NULL),
	(84, 'MERMELADA FANNY100GR', 1, 1.20, 12, 1, 1.50, NULL),
	(85, 'CAFE ALTOMAYO 16 GR', 1, 1.94, 9, 1, 2.00, NULL),
	(86, 'AVENA 3 OSITOS CANELA Y CLAVO ', 1, 0.90, 24, 1, 1.20, NULL),
	(87, 'CAFE ALTOMAYO 8 GR ', 1, 0.99, 18, 1, 1.50, NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.servicios: ~0 rows (aproximadamente)
DELETE FROM `servicios`;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`idservicio`, `descripcion`) VALUES
	(1, 'Bodega');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.unidadmedida
CREATE TABLE IF NOT EXISTS `unidadmedida` (
  `idundmedida` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idundmedida`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.unidadmedida: ~4 rows (aproximadamente)
DELETE FROM `unidadmedida`;
/*!40000 ALTER TABLE `unidadmedida` DISABLE KEYS */;
INSERT INTO `unidadmedida` (`idundmedida`, `descripcion`) VALUES
	(1, 'UND'),
	(2, 'KG'),
	(3, 'L'),
	(4, 'M');
/*!40000 ALTER TABLE `unidadmedida` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `totalventa` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.ventas: ~0 rows (aproximadamente)
DELETE FROM `ventas`;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`idventa`, `fecha`, `totalventa`) VALUES
	(1, '2020-08-19 13:54:26', 12.80);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
