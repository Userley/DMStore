-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
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
DROP TABLE IF EXISTS `categoria`;
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
DROP TABLE IF EXISTS `clientes`;
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
DROP TABLE IF EXISTS `detalleventas`;
CREATE TABLE IF NOT EXISTS `detalleventas` (
  `iddetalleventas` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT 0,
  `idproducto` int(11) DEFAULT 0,
  `preciocompra` decimal(10,2) DEFAULT NULL,
  `precioventa` decimal(10,2) DEFAULT NULL,
  `fechaventa` int(11) DEFAULT 0,
  `idservicio` int(11) DEFAULT 0,
  PRIMARY KEY (`iddetalleventas`),
  KEY `FK_Servicio_DetalleVentas` (`idservicio`),
  CONSTRAINT `FK_Servicio_DetalleVentas` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.detalleventas: ~0 rows (aproximadamente)
DELETE FROM `detalleventas`;
/*!40000 ALTER TABLE `detalleventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventas` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.productos
DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `preciocompra` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `idundmedida` int(11) DEFAULT NULL,
  `precioventa` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `FK_Categoria_UndMedida` (`idundmedida`),
  KEY `FK_Categoria_Productos` (`idcategoria`) USING BTREE,
  CONSTRAINT `FK_Categoria_Productos` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  CONSTRAINT `FK_Categoria_UndMedida` FOREIGN KEY (`idundmedida`) REFERENCES `unidadmedida` (`idundmedida`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.productos: ~39 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idproducto`, `descripcion`, `idcategoria`, `preciocompra`, `Stock`, `idundmedida`, `precioventa`) VALUES
	(1, 'LECHE IDEAL CREMOSITA', 3, 2.88, 24, 1, 3.20),
	(2, 'ARROZ CATALÁN ', 1, 2.86, 49, 2, 3.20),
	(3, 'DETERGENTE SAPOLIO', 16, 4.58, 14, 2, 6.00),
	(4, 'AZUCAR MANUELITA', 1, 2.00, 50, 2, 2.80),
	(5, 'ACEITE PRIMOR CLASICO', 1, 6.66, 6, 3, 7.30),
	(6, 'ACEITE PRIMOR  PREMIUN', 1, 44.00, 6, 3, 7.50),
	(7, 'FIDEO SPAGUETTI DON VITTORIO', 1, 2.60, 20, 1, 2.80),
	(8, 'LECHE GLORIA AZUL', 3, 2.80, 25, 1, 3.50),
	(9, 'FILETE DE CABALLA GISELLA', 2, 3.08, 48, 1, 3.50),
	(10, 'LENTEJA SERRANITA MARRÓN', 1, 4.00, 5, 2, 6.00),
	(11, 'LENTEJA VERDE ', 1, 4.00, 5, 2, 6.00),
	(12, 'AVENA GRANO DE ORO ', 1, 1.00, 12, 1, 1.20),
	(13, 'GELATINA NEGRITA DE FRESA', 1, 2.80, 12, 1, 3.50),
	(14, 'COCOA WINTERS', 1, 1.80, 12, 1, 2.00),
	(15, 'MILO EN SOBRE', 1, 1.75, 12, 1, 2.00),
	(16, 'NESCAFE EN SOBRE', 1, 1.45, 12, 1, 1.50),
	(17, 'SILLAO CHICO', 1, 0.90, 12, 1, 1.00),
	(18, 'FIDEO CANUTO Y TORNILLO DON VITTORIO', 1, 1.30, 40, 1, 1.50),
	(19, 'FRASCOS DE 50 ML ALCOHOL', 13, 2.79, 24, 1, 5.00),
	(20, 'MASCARILLAS KN95 ADULTO', 1, 5.00, 13, 1, 8.00),
	(21, 'FRASCOS ANIMADOS DE ALCOHOL EN GEL ', 1, 2.45, 20, 1, 5.50),
	(22, 'MASCARILLAS PARA NIÑOS KN95 ', 1, 8.00, 6, 1, 12.00),
	(23, 'CHIPS DE CLARO', 1, 2.00, 50, 1, 5.00),
	(24, 'KOLYNOS SUPER BLANCO', 13, 2.64, 14, 1, 3.50),
	(25, 'COLGATE HERBAL 90 GR', 13, 2.10, 12, 1, 2.50),
	(26, 'COLGATE TRIPLE ACCION 75ML', 13, 4.39, 12, 1, 4.50),
	(27, 'COLGATE DE NIÑOS 50 GR', 13, 2.27, 12, 1, 2.50),
	(28, 'CEPILLO COLGATE  PREMIER CLEAN ADULTO', 1, 1.76, 14, 1, 2.00),
	(29, 'CEPILLO COLGATE KIDS ', 13, 2.27, 12, 1, 2.60),
	(30, 'DESODORANTE  LADY SS CON TAPA 9 GR Y HOMBRE ', 1, 0.77, 40, 1, 1.70),
	(31, 'SOPA AHINOMEN GALLINA ', 1, 0.94, 12, 1, 1.10),
	(32, 'AJINOMOTO 8 GR ', 1, 0.15, 60, 1, 0.20),
	(33, 'AJINOMOTO DE 24 GR', 1, 0.40, 40, 1, 0.50),
	(34, 'AJINOMOTO  52 GR', 1, 0.83, 20, 1, 1.00),
	(35, 'AJINOMIX CHIFA 12GR ', 1, 0.37, 10, 1, 0.50),
	(36, 'PAPEL P.H. D. HOJA ELITE', 13, 1.60, 32, 1, 2.00),
	(37, 'PAPEL TOALLA NOVA MEGA ROLLO X UNID. 19 MT', 1, 3.48, 3, 1, 4.00),
	(38, 'SERVILLETAS NOBLE CORTADA 180 HOJAS', 1, 0.80, 15, 1, 1.00),
	(39, 'PAPEL HIGIENICO X 4 UNID, ELITE', 1, 2.56, 27, 1, 3.50);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.servicios
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.servicios: ~0 rows (aproximadamente)
DELETE FROM `servicios`;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.unidadmedida
DROP TABLE IF EXISTS `unidadmedida`;
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
