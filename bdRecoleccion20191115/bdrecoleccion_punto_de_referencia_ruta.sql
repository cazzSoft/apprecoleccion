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
-- Table structure for table `punto_de_referencia_ruta`
--

DROP TABLE IF EXISTS `punto_de_referencia_ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `punto_de_referencia_ruta` (
  `idpunto_de_referencia_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_idruta` int(11) NOT NULL,
  `punto_de_referencia_idpunto_de_referencia` int(11) NOT NULL,
  PRIMARY KEY (`idpunto_de_referencia_ruta`),
  KEY `fk_punto_de_referencia_ruta_ruta1_idx` (`ruta_idruta`),
  KEY `fk_punto_de_referencia_ruta_punto_de_referencia2_idx` (`punto_de_referencia_idpunto_de_referencia`),
  CONSTRAINT `fk_punto_de_referencia_ruta_punto_de_referencia2` FOREIGN KEY (`punto_de_referencia_idpunto_de_referencia`) REFERENCES `punto_de_referencia` (`idpunto_de_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_punto_de_referencia_ruta_ruta1` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punto_de_referencia_ruta`
--

LOCK TABLES `punto_de_referencia_ruta` WRITE;
/*!40000 ALTER TABLE `punto_de_referencia_ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `punto_de_referencia_ruta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-15  0:15:21