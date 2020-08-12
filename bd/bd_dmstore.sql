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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bd_dmstore.productos: ~0 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idproducto`, `descripcion`, `idcategoria`, `preciocompra`, `Stock`, `idundmedida`, `precioventa`) VALUES
	(1, 'LECHE GLORIA', 3, 2.80, 24, 1, 3.30);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla bd_dmstore.servicios
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
