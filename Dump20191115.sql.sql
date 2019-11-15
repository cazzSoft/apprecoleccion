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
-- Table structure for table `actividad_diaria`
--

DROP TABLE IF EXISTS `actividad_diaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad_diaria` (
  `idactividad_diaria` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(50) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `ruta_idruta` int(11) NOT NULL,
  `recolector_idrecolector` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  PRIMARY KEY (`idactividad_diaria`),
  KEY `fk_actividad_diaria_persona2_idx` (`persona_idpersona`),
  KEY `fk_actividad_diaria_ruta1_idx` (`ruta_idruta`),
  KEY `fk_actividad_diaria_recolector1_idx` (`recolector_idrecolector`),
  CONSTRAINT `fk_actividad_diaria_persona2` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_actividad_diaria_recolector1` FOREIGN KEY (`recolector_idrecolector`) REFERENCES `recolector` (`idrecolector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_actividad_diaria_ruta1` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_diaria`
--

LOCK TABLES `actividad_diaria` WRITE;
/*!40000 ALTER TABLE `actividad_diaria` DISABLE KEYS */;
INSERT INTO `actividad_diaria` VALUES (1,'Lunes',2,4,3,'09:00:00','10:00:00'),(3,'Domingo',3,15,4,'11:00:00','12:00:00');
/*!40000 ALTER TABLE `actividad_diaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `idevaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `objetivo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idevaluacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (1,'2019-11-03','2019-11-07','hola','saludar',NULL),(2,'2019-11-04','2019-11-05','hola otra vez','saludar',NULL),(3,'2019-11-06','2019-11-08','hola otra vez 2','saludarrrr',NULL);
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `idnotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `distancia_metros` varchar(45) DEFAULT NULL,
  `idpunto_de_referencia_ruta` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idnotificacion`),
  KEY `fk_notificacion_punto_de_referencia_ruta1_idx` (`idpunto_de_referencia_ruta`),
  KEY `fk_notificacion_usuario1_idx` (`idusuario`),
  CONSTRAINT `fk_notificacion_punto_de_referencia_ruta1` FOREIGN KEY (`idpunto_de_referencia_ruta`) REFERENCES `punto_de_referencia_ruta` (`idpunto_de_referencia_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificacion_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opiniones`
--

DROP TABLE IF EXISTS `opiniones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opiniones` (
  `idopiniones` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idopiniones`),
  KEY `fk_opiniones_usuario2_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_opiniones_usuario2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opiniones`
--

LOCK TABLES `opiniones` WRITE;
/*!40000 ALTER TABLE `opiniones` DISABLE KEYS */;
INSERT INTO `opiniones` VALUES (3,'adios señores','2019-10-27','no se',1),(4,'hola de nuevoooo','2019-10-29','no se para que esto, cristhian lo puso en la ',1);
/*!40000 ALTER TABLE `opiniones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Jeniffer Alcívar','1313672311',NULL),(2,'Yandri Alcívar','1313672329',NULL),(3,'Kevin Alcívar','1313672345',NULL),(4,'Mauricio Alcívar','1313672349',NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (2,'¿hola??'),(3,'¿Qué debería preguntar?'),(4,'¿hola?'),(5,'kjkjk');
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta_evaluacion`
--

DROP TABLE IF EXISTS `pregunta_evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta_evaluacion` (
  `idpregunta_evaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `idevaluacion` int(11) NOT NULL,
  `idpregunta` int(11) NOT NULL,
  PRIMARY KEY (`idpregunta_evaluacion`),
  KEY `fk_pregunta_evaluacion_evaluacion1_idx` (`idevaluacion`),
  KEY `fk_pregunta_evaluacion_pregunta1_idx` (`idpregunta`),
  CONSTRAINT `fk_pregunta_evaluacion_evaluacion1` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pregunta_evaluacion_pregunta1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_evaluacion`
--

LOCK TABLES `pregunta_evaluacion` WRITE;
/*!40000 ALTER TABLE `pregunta_evaluacion` DISABLE KEYS */;
INSERT INTO `pregunta_evaluacion` VALUES (1,2,2),(3,3,3),(4,2,4);
/*!40000 ALTER TABLE `pregunta_evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `punto_de_referencia`
--

DROP TABLE IF EXISTS `punto_de_referencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `punto_de_referencia` (
  `idpunto_de_referencia` int(11) NOT NULL AUTO_INCREMENT,
  `longuitud` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idpunto_de_referencia`),
  KEY `fk_punto_de_referencia_usuario2_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_punto_de_referencia_usuario2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punto_de_referencia`
--

LOCK TABLES `punto_de_referencia` WRITE;
/*!40000 ALTER TABLE `punto_de_referencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `punto_de_referencia` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `punto_ruta`
--

DROP TABLE IF EXISTS `punto_ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `punto_ruta` (
  `idpunto_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  `ruta_idruta` int(11) NOT NULL,
  PRIMARY KEY (`idpunto_ruta`),
  KEY `fk_punto_ruta_ruta2_idx` (`ruta_idruta`),
  CONSTRAINT `fk_punto_ruta_ruta2` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punto_ruta`
--

LOCK TABLES `punto_ruta` WRITE;
/*!40000 ALTER TABLE `punto_ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `punto_ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recolector`
--

DROP TABLE IF EXISTS `recolector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recolector` (
  `idrecolector` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `tipo_vehiculo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrecolector`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recolector`
--

LOCK TABLES `recolector` WRITE;
/*!40000 ALTER TABLE `recolector` DISABLE KEYS */;
INSERT INTO `recolector` VALUES (3,'volqueta03','GBN - 098','volquete'),(4,'recolector01','MBN - 991','recolector'),(5,'volqueta02','GBN - 900','volquete');
/*!40000 ALTER TABLE `recolector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `puntaje` varchar(45) DEFAULT NULL,
  `idpregunta_evaluacion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrespuesta`),
  KEY `fk_respuesta_pregunta_evaluacion1_idx` (`idpregunta_evaluacion`),
  KEY `fk_respuesta_usuario1_idx` (`idusuario`),
  CONSTRAINT `fk_respuesta_pregunta_evaluacion1` FOREIGN KEY (`idpregunta_evaluacion`) REFERENCES `pregunta_evaluacion` (`idpregunta_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_respuesta_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `service_api`
--

DROP TABLE IF EXISTS `service_api`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_api` (
  `idservice_api` int(11) NOT NULL AUTO_INCREMENT,
  `access_token` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `refresh_token` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idservice_api`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_api`
--

LOCK TABLES `service_api` WRITE;
/*!40000 ALTER TABLE `service_api` DISABLE KEYS */;
INSERT INTO `service_api` VALUES (1,'0FEV4Ob-B6UPE-gGVeKPEXJsLcD2DJA2eBugQEGBvq9CF0sllDOTsSfqUHhosqEmFLF7VMPsjrTmPjYLASJ93f30ASnKtB1_a7KxEyCeV-oDb06is0sSrV62oEt_F36tPmJfUgHWf3X6X7nzXKzo7l7gV3GKONWhXTvyukld0850G-JPTeF8y6qX2fuzmveSaJwmyl3mhDv1RxwF3Q5KbUurhCZnmSr7kkntdUfI9_FC9lrW93CpjPccpOXtOs1ZcBlBJOWzfcDwR7uj1sHZC_fbuf4PSPFkf0DPE8RFaXjw3di-7OHU3uotFZyDeGMtmX588alFb_kUwnHi7TFoBPPXhyeJ3oUeAkWAmwiaUCAgLjA40oSOxWitmSKhsXzu4wI1urqC8ubQgMnkG_6O3vTaX8g27CviemimvKFduMBuZ-r0_uGQbVmkU0ikKlT0CgDvWkQdrhrk4QMWDl4foi01GtlW18ZwjlKTwLQR-LIsWqU8b8bpI4fBT3OgwEQTL8090_T4UalktPdCGRIGP9AMnRCdsunDn6mhL4p_z5VguUZckl3euGcmOuw8dYl7piKoNUypdgMO6-UAhuc4VWR5bWFJJXKauY5fBDnfjibqb2UOHpLlZfBFpc6Gg5eI5_ERmODFSZL6oH-c6WyoLyy1B4frubU_2Mo0gQxnh5_k5XNUNeOzkZ3l-6EKsT2PkFkBmiFzj8UME2RgztP_aEMc-Seacj_Mo1S5QnG3YDNhPd6sLNWSwEVdk2Q3UmI8Z6X14hEJdTEGdglQewB9cA','8aeb199f514d4ab8a6382037158cc398');
/*!40000 ALTER TABLE `service_api` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `idtipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'ciudadano');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo_usuario_idtipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_tipo_usuario2_idx` (`tipo_usuario_idtipo_usuario`),
  CONSTRAINT `fk_usuario_tipo_usuario2` FOREIGN KEY (`tipo_usuario_idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'jeni','skdjsd','Jeniffer',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-15  0:19:33
