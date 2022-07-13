-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: isw_base
-- ------------------------------------------------------
-- Server version	5.7.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apaterno` varchar(100) DEFAULT NULL,
  `amaterno` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `token` VARCHAR(24) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) DEFAULT NULL,
  `hora_visita` varchar(100) DEFAULT NULL,
  `dia_visita` varchar(100) DEFAULT NULL,
  `motivo_visita` varchar(100) DEFAULT NULL,
  `numero_semana` varchar(100) DEFAULT NULL,
  `fecha_operacion` date DEFAULT NULL,
  `numero_anio` int(11) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
#DROP TABLE horarios;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesiones_activas`
--

DROP TABLE IF EXISTS `sesiones_activas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sesiones_activas` (
  `id_sesion` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `hora_ini_sesion` datetime NOT NULL,
  `hora_fin_sesion` datetime NOT NULL,
  `origen` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_sesion`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesiones_activas`
--

LOCK TABLES `sesiones_activas` WRITE;
/*!40000 ALTER TABLE `sesiones_activas` DISABLE KEYS */;
INSERT INTO `sesiones_activas` VALUES (1,'admin','SU','2022-05-16 17:37:02','2022-05-16 17:37:12','WEB',0),(2,'admin','SU','2022-05-16 17:37:22','2022-05-16 17:38:17','WEB',0),(3,'admin','SU','2022-05-16 17:38:29','2022-05-16 17:43:06','WEB',0),(4,'admin','SU','2022-05-17 16:22:59','0000-00-00 00:00:00','WEB',0),(5,'admin','SU','2022-05-17 17:35:56','0000-00-00 00:00:00','WEB',0),(6,'admin','SU','2022-05-18 17:14:37','0000-00-00 00:00:00','WEB',0),(7,'admin','SU','2022-05-18 23:04:48','0000-00-00 00:00:00','WEB',0),(8,'admin','SU','2022-05-19 16:18:57','2022-05-19 16:33:58','WEB',0),(9,'admin','SU','2022-05-19 16:35:51','2022-05-19 16:50:54','WEB',0),(10,'admin','SU','2022-05-20 16:22:11','2022-05-20 17:10:24','WEB',0),(11,'admin','SU','2022-05-20 17:10:27','0000-00-00 00:00:00','WEB',0),(12,'admin','SU','2022-05-23 16:26:14','2022-05-23 16:41:18','WEB',0),(13,'admin','SU','2022-05-23 16:42:12','2022-05-23 16:57:14','WEB',0),(14,'admin','SU','2022-05-23 17:04:30','0000-00-00 00:00:00','WEB',0),(15,'admin','SU','2022-05-23 18:01:28','0000-00-00 00:00:00','WEB',0),(16,'admin','SU','2022-05-24 08:11:10','0000-00-00 00:00:00','WEB',0),(17,'admin','SU','2022-05-24 13:40:41','0000-00-00 00:00:00','WEB',0),(18,'admin','SU','2022-05-24 14:09:38','0000-00-00 00:00:00','WEB',0),(19,'admin','SU','2022-05-24 14:24:19','0000-00-00 00:00:00','WEB',0),(20,'admin','SU','2022-05-24 14:45:35','0000-00-00 00:00:00','WEB',0),(21,'admin','SU','2022-05-24 16:34:50','2022-05-24 16:49:53','WEB',0),(22,'admin','SU','2022-05-24 16:59:27','0000-00-00 00:00:00','WEB',0),(23,'admin','SU','2022-05-24 17:28:35','0000-00-00 00:00:00','WEB',0),(24,'admin','SU','2022-05-25 16:41:29','2022-05-25 17:19:29','WEB',0),(25,'admin','SU','2022-05-26 09:06:33','0000-00-00 00:00:00','WEB',0),(26,'admin','SU','2022-05-26 09:07:31','0000-00-00 00:00:00','WEB',0),(27,'admin','SU','2022-05-26 09:08:44','2022-05-26 09:44:36','WEB',0),(28,'admin','SU','2022-05-26 09:54:53','0000-00-00 00:00:00','WEB',0),(29,'admin','SU','2022-05-26 09:58:35','0000-00-00 00:00:00','WEB',0),(30,'admin','SU','2022-05-26 13:56:01','0000-00-00 00:00:00','WEB',0),(31,'admin','SU','2022-05-26 16:25:03','2022-05-26 16:50:52','WEB',0),(32,'admin','SU','2022-05-26 17:26:40','0000-00-00 00:00:00','WEB',0),(33,'admin','SU','2022-05-26 17:29:14','0000-00-00 00:00:00','WEB',0),(34,'admin','SU','2022-05-26 17:34:11','0000-00-00 00:00:00','WEB',0),(35,'admin','SU','2022-05-30 16:11:44','2022-05-30 16:33:21','WEB',0),(36,'admin','SU','2022-05-30 16:35:43','0000-00-00 00:00:00','WEB',0),(37,'admin','SU','2022-05-30 18:05:28','0000-00-00 00:00:00','WEB',0),(38,'admin','SU','2022-05-31 12:13:28','0000-00-00 00:00:00','WEB',0),(39,'admin','SU','2022-05-31 12:42:46','0000-00-00 00:00:00','WEB',0),(40,'admin','SU','2022-05-31 13:32:36','0000-00-00 00:00:00','WEB',0),(41,'admin','SU','2022-05-31 16:14:25','0000-00-00 00:00:00','WEB',0),(42,'admin','SU','2022-05-31 16:36:26','2022-05-31 16:59:15','WEB',0),(43,'admin','SU','2022-05-31 17:01:57','0000-00-00 00:00:00','WEB',0),(44,'admin','SU','2022-05-31 23:42:43','0000-00-00 00:00:00','WEB',1);
/*!40000 ALTER TABLE `sesiones_activas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apaterno` varchar(50) NOT NULL,
  `amaterno` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'Admin','Admin','Admin','4425879634','admin@admin.com','admin','1234','SU','Super Usuario',1),(21,'Erick','Villarreal','Lira','+524191396062','erickvillarreal243@gmail.com','user','1234','E','Empleado',1);
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

-- Dump completed on 2022-06-01 10:03:33

CREATE TABLE horarios(
id_horario int PRIMARY KEY AUTO_INCREMENT,
cliente varchar (50),
hora_visita varchar (50),
dia_visita varchar (50),
numero_semama varchar (50),
fecha_operacion date,
numero_anio int ,
estado int
);

USE app_muestra;
SELECT * FROM clientes;	
SELECT * FROM usuarios;
SELECT * FROM sesiones_activas;
SELECT * FROM horarios;