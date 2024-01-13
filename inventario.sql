/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `inces_inventario` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `inces_inventario`;

CREATE TABLE IF NOT EXISTS `herramientas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` varchar(50) NOT NULL,
  `tipo_unidad` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `habitacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

INSERT INTO `herramientas` (`id`, `articulo`, `tipo_unidad`, `cantidad`, `fecha`, `habitacion`) VALUES
	(61, 'Cautin', 'Unidad', 2, '2023-12-07 14:39:27', 1),
	(62, 'Pala', 'Unidad', 1, '2023-12-07 14:40:40', 1);

CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `articulo` varchar(50) NOT NULL,
  `id_articulo` int(11) NOT NULL DEFAULT 0,
  `accion` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_movimientos_herramientas` (`id_articulo`),
  CONSTRAINT `FK_movimientos_herramientas` FOREIGN KEY (`id_articulo`) REFERENCES `herramientas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO `movimientos` (`id`, `nombre`, `apellido`, `articulo`, `id_articulo`, `accion`, `lugar`, `fecha`) VALUES
	(15, 'gdfg', 'dfgdf', 'Cautin', 61, 'fsdfs', 'fdsfsd', '2024-01-13 18:51:44'),
	(16, 'Jose', 'Quero', 'Pala', 62, 'Mover', 'Oficina', '2024-01-13 18:56:29'),
	(17, 'Jose', 'Quero', 'Cautin', 61, 'Mover', 'Jacinto', '2024-01-13 20:17:12'),
	(18, 'Luis', 'Quero', 'Cautin', 61, 'Mover', 'Oficina', '2024-01-13 20:25:43'),
	(19, 'Freddy', 'Vega', 'Pala', 62, 'Mover', 'Jacinto', '2024-01-13 20:26:11'),
	(20, 'Jose', 'Quero', 'Cautin', 61, 'Nose ', 'Coro', '2024-01-13 20:28:33');

CREATE TABLE IF NOT EXISTS `registro_logeo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL DEFAULT '0',
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO `registro_logeo` (`id`, `rol`, `fecha`) VALUES
	(10, 'Administrador', '2023-12-06 17:25:14'),
	(11, 'Usuario', '2023-12-06 17:25:38'),
	(12, 'Administrador', '2023-12-06 17:25:52'),
	(13, 'Administrador', '2023-12-07 12:58:34'),
	(14, 'Administrador', '2023-12-07 13:11:40'),
	(15, 'Administrador', '2023-12-07 13:52:20'),
	(16, 'Administrador', '2023-12-07 14:17:13'),
	(17, 'Administrador', '2023-12-11 13:33:40'),
	(18, 'Administrador', '2023-12-11 13:33:49'),
	(19, 'Administrador', '2023-12-11 15:49:56'),
	(20, 'Administrador', '2023-12-14 05:37:16'),
	(21, 'Administrador', '2024-01-13 17:21:37'),
	(22, 'Administrador', '2024-01-13 17:24:37'),
	(23, 'Administrador', '2024-01-13 18:20:14'),
	(24, 'Administrador', '2024-01-13 19:53:01'),
	(25, 'Administrador', '2024-01-13 20:16:57');

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `respuesta1` varchar(50) NOT NULL DEFAULT '',
  `respuesta2` varchar(50) NOT NULL DEFAULT '',
  `respuesta3` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`username`) USING BTREE,
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `rol_id` FOREIGN KEY (`rol_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol_id`, `respuesta1`, `respuesta2`, `respuesta3`) VALUES
	(1, 'Admin', '123', 1, 'INCES', 'PERRO', 'GATO'),
	(2, 'Usuario', '1234', 2, 'INCES', 'PERRO', 'GATO');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
