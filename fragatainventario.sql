-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: fragatainventario
-- ------------------------------------------------------
-- Server version	8.0.44-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Arroz','2023-05-03 22:35:21'),(2,'Azucar','2023-05-17 21:01:54'),(3,'Aceite','2023-05-17 21:06:47'),(4,'Envases','2023-05-17 21:14:38'),(5,'Fideos','2023-05-17 21:15:35'),(6,'Sal','2023-05-17 21:16:28');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `documento` int NOT NULL,
  `email` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `ordenes` int NOT NULL,
  `ultima_orden` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Ramiro Perez',48512563,'rperez@gmail.com','954215365','Jr. La Libertad 1234',10,'2023-05-17 15:53:36','2023-05-17 20:53:36'),(2,'Juana Lopez',45125635,'juanal@gmail.com','985124525','Jr. Los Cipreses 123',6,'2023-05-17 19:25:03','2023-05-18 00:25:03');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordenes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` int NOT NULL,
  `id_empleado` int NOT NULL,
  `id_usuario` int NOT NULL,
  `productos` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `total` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordenes`
--

LOCK TABLES `ordenes` WRITE;
/*!40000 ALTER TABLE `ordenes` DISABLE KEYS */;
INSERT INTO `ordenes` VALUES (1,10001,1,1,'[{\"id\":\"2\",\"descripcion\":\"Arroz Casserita Amarillo 49 Kg\",\"cantidad\":\"2\",\"stock\":\"19\",\"precio\":\"144\",\"total\":\"288\"}]',288,'2023-02-09 17:11:57'),(2,10002,1,1,'[{\"id\":\"3\",\"descripcion\":\"Arroz Olímpico 50 Kg\",\"cantidad\":\"1\",\"stock\":\"11\",\"precio\":\"177\",\"total\":\"177\"},{\"id\":\"4\",\"descripcion\":\"Arroz Don Mario Extra Nir 49 Kg\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"170\",\"total\":\"170\"}]',347,'2023-03-09 16:48:58'),(3,10003,1,1,'[{\"id\":\"2\",\"descripcion\":\"Arroz Casserita Amarillo 49 Kg\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"144\",\"total\":\"144\"},{\"id\":\"4\",\"descripcion\":\"Arroz Don Mario Extra Nir 49 Kg\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"170\",\"total\":\"170\"}]',314,'2023-04-09 17:14:48'),(4,10004,1,1,'[{\"id\":\"2\",\"descripcion\":\"Arroz Casserita Amarillo 49 Kg\",\"cantidad\":\"4\",\"stock\":\"14\",\"precio\":\"144\",\"total\":\"576\"}]',576,'2023-05-17 16:34:28'),(5,10005,2,7,'[{\"id\":\"2\",\"descripcion\":\"Arroz Casserita Amarillo 49 Kg\",\"cantidad\":\"1\",\"stock\":\"13\",\"precio\":\"144\",\"total\":\"144\"}]',144,'2023-05-17 20:53:04'),(6,10006,1,7,'[{\"id\":\"3\",\"descripcion\":\"Arroz Olímpico 50 Kg\",\"cantidad\":\"3\",\"stock\":\"8\",\"precio\":\"177\",\"total\":\"531\"}]',531,'2023-05-17 20:53:36'),(7,10007,2,7,'[{\"id\":\"6\",\"descripcion\":\"Aceite cil balde 20 Litros\",\"cantidad\":\"1\",\"stock\":\"29\",\"precio\":\"209\",\"total\":\"209\"},{\"id\":\"5\",\"descripcion\":\"Azucar Rubia Cartavio 50Kg\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"193\",\"total\":\"193\"},{\"id\":\"3\",\"descripcion\":\"Arroz Olímpico 50 Kg\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"177\",\"total\":\"177\"},{\"id\":\"10\",\"descripcion\":\"Fideos Don Maximo Tirabuzon 5 Kg\",\"cantidad\":\"1\",\"stock\":\"13\",\"precio\":\"22.5\",\"total\":\"22.5\"}]',601.5,'2023-05-17 21:17:24'),(8,10008,2,9,'[{\"id\":\"10\",\"descripcion\":\"Fideos Don Maximo Tirabuzon 5 Kg\",\"cantidad\":\"1\",\"stock\":\"12\",\"precio\":\"22.5\",\"total\":\"22.5\"}]',22.5,'2023-05-18 00:25:03');
/*!40000 ALTER TABLE `ordenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `codigo` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb3_spanish_ci,
  `stock` int NOT NULL,
  `precio_compra` float NOT NULL,
  `ordenes` int NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (2,1,'101','Arroz Casserita Amarillo 49 Kg','vistas/img/productos/101/710.jpg',13,144,17,'2023-05-17 20:53:03'),(3,1,'102','Arroz Olímpico 50 Kg','vistas/img/productos/102/883.png',7,177,5,'2023-05-17 21:17:23'),(4,1,'103','Arroz Don Mario Extra Nir 49 Kg','vistas/img/productos/103/199.jpg',6,170,2,'2023-05-09 17:14:48'),(5,2,'201','Azucar Rubia Cartavio 50Kg','vistas/img/productos//558.jpg',19,193,1,'2023-05-17 21:17:23'),(6,3,'301','Aceite cil balde 20 Litros','vistas/img/productos/301/989.jpg',29,209,1,'2023-05-17 21:17:23'),(7,3,'302','Aceite Vegetal Vicentina Balde 20 Litros','vistas/img/productos/302/638.jpg',10,175,0,'2023-05-17 21:09:06'),(8,2,'202','Azúcar Rubia San Jacinto x 50 Kg','vistas/img/productos/202/613.jpg',15,186,0,'2023-05-17 21:14:15'),(9,4,'401','Envases Cajas Térmicas 50 Unid','vistas/img/productos/401/823.jpg',20,25,0,'2023-05-17 21:15:13'),(10,5,'501','Fideos Don Maximo Tirabuzon 5 Kg','vistas/img/productos/501/988.jpg',12,22.5,2,'2023-05-18 00:25:03'),(11,6,'601','Sal de Mesa Marina EMSAL X 25 UNID','vistas/img/productos/601/782.jpg',30,30,0,'2023-05-17 21:16:51');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `password` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `foto` text COLLATE utf8mb3_spanish_ci NOT NULL,
  `estado` int NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador','admin','$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2','Administrador','vistas/img/usuarios/admin/114.png',1,'2025-12-26 15:55:42','2025-12-26 20:55:42'),(7,'Pepe Perez','pepe','$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2','Administrador','vistas/img/usuarios/pepe/272.png',1,'2023-05-17 20:04:17','2025-12-26 19:42:51'),(9,'Jimena Sanchez','jimena','$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2','Administrador','vistas/img/usuarios/jimena/393.png',1,'2023-05-17 19:47:39','2025-12-26 19:42:57');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-26 15:58:56
