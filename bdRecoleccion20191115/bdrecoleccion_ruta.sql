CREATE DATABASE  IF NOT EXISTS `bdrecoleccion` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdrecoleccion`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdrecoleccion
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB

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
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `idruta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ruta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idruta`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (4,'Ruta 1','Cdla Keneddy 1, vía Colorado, Bellavista alta.'),(5,'Ruta 1','Cdla El vergel, Cdla Miraflores, Lotización Luis Solórzano, Capilla y Malecón del Río.'),(6,'Ruta 1','Cdla La Aurora, Dos Bocas, Egdy María.'),(8,'Ruta 1','Calle Principal de Puerto Arturo y Bellavista baja.'),(9,'Ruta 1','Barrio Puerto Arturo, Cdla. San José y calle Potrerillo.'),(10,'Ruta 1','Cdla. Julia Gonzalez, Cdla. Espejo, Cdla. Las Quemadas, Cdla. El Rosario, calle Octavio Moreira, calle Colibrí y Cla. Rosario n 2.'),(11,'Ruta 1','Sector Potrerillo'),(12,'Ruta 2','Av. Carlos Alberto Aray hasta el anillo vial Los Raidistas.'),(13,'Ruta 2','Sector Santa Rita, calle Cotopaxi, calle Chimborazo, calle Emilio Hidalgo, Malecón del Río Chone, Escuela Camilo Delgado Balda.'),(14,'Ruta 2','Cdla. Santa Fé 2000, cdla Camilo Giler, Asentamiento 9 de Octubre y Malecón.'),(15,'Ruta 2','Sector Agua Potable, calle Ramos Iduarte, calle Juan Montalvo hasta la cdla. Barberan y Malecón.'),(16,'Ruta 3','sdjsdhf');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-15  0:15:22
