CREATE DATABASE  IF NOT EXISTS `bdrecoleccecion2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdrecoleccecion2`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdrecoleccecion2
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_diaria`
--

LOCK TABLES `actividad_diaria` WRITE;
/*!40000 ALTER TABLE `actividad_diaria` DISABLE KEYS */;
INSERT INTO `actividad_diaria` VALUES (5,'Lunes, Martes, Miércoles, Jueves, viernes',5,35,4,'16:00:00','22:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (29,'2020-03-08','2020-03-31','Evaluación 1','Evaluar app recolección','E');
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion_usuario`
--

DROP TABLE IF EXISTS `evaluacion_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idevaluacion` int(11) NOT NULL,
  `estado` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion_usuario`
--

LOCK TABLES `evaluacion_usuario` WRITE;
/*!40000 ALTER TABLE `evaluacion_usuario` DISABLE KEYS */;
INSERT INTO `evaluacion_usuario` VALUES (47,5,29,'E'),(48,6,29,'E'),(49,7,29,'E');
/*!40000 ALTER TABLE `evaluacion_usuario` ENABLE KEYS */;
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
  `estado` tinyint(4) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idnotificacion`),
  KEY `fk_notificacion_punto_de_referencia_ruta1_idx` (`idpunto_de_referencia_ruta`),
  KEY `fk_notificacion_usuario1_idx` (`idusuario`),
  CONSTRAINT `fk_notificacion_punto_de_referencia_ruta1` FOREIGN KEY (`idpunto_de_referencia_ruta`) REFERENCES `punto_de_referencia_ruta` (`idpunto_de_referencia_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notificacion_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
INSERT INTO `notificacion` VALUES (12,'300',26,7,0,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opiniones`
--

LOCK TABLES `opiniones` WRITE;
/*!40000 ALTER TABLE `opiniones` DISABLE KEYS */;
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
  `celular` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (5,'chofer 1','1313131313',NULL),(6,'chofer 2','1313134545',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (2,'La app funciona bien '),(3,'Interfaz amigable ?'),(6,'pregunta 3'),(7,'pregunta 4'),(8,'pregunta 5');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta_evaluacion`
--

LOCK TABLES `pregunta_evaluacion` WRITE;
/*!40000 ALTER TABLE `pregunta_evaluacion` DISABLE KEYS */;
INSERT INTO `pregunta_evaluacion` VALUES (28,29,3),(29,29,2);
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
  `longuitud` double DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` tinyint(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idpunto_de_referencia`),
  KEY `fk_punto_de_referencia_usuario2_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_punto_de_referencia_usuario2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punto_de_referencia`
--

LOCK TABLES `punto_de_referencia` WRITE;
/*!40000 ALTER TABLE `punto_de_referencia` DISABLE KEYS */;
INSERT INTO `punto_de_referencia` VALUES (21,-0.7051949248338769,-80.10372510713005,'casa de mi tia',1,7);
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
  `idpunto_de_referencia` int(11) NOT NULL,
  PRIMARY KEY (`idpunto_de_referencia_ruta`),
  KEY `fk_punto_de_referencia_ruta_ruta1_idx` (`ruta_idruta`),
  KEY `fk_punto_de_referencia_ruta_punto_de_referencia2_idx` (`idpunto_de_referencia`),
  CONSTRAINT `fk_punto_de_referencia_ruta_punto_de_referencia2` FOREIGN KEY (`idpunto_de_referencia`) REFERENCES `punto_de_referencia` (`idpunto_de_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_punto_de_referencia_ruta_ruta1` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punto_de_referencia_ruta`
--

LOCK TABLES `punto_de_referencia_ruta` WRITE;
/*!40000 ALTER TABLE `punto_de_referencia_ruta` DISABLE KEYS */;
INSERT INTO `punto_de_referencia_ruta` VALUES (26,35,21);
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
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `ruta_idruta` int(11) NOT NULL,
  PRIMARY KEY (`idpunto_ruta`),
  KEY `fk_punto_ruta_ruta2_idx` (`ruta_idruta`),
  CONSTRAINT `fk_punto_ruta_ruta2` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=695 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `punto_ruta`
--

LOCK TABLES `punto_ruta` WRITE;
/*!40000 ALTER TABLE `punto_ruta` DISABLE KEYS */;
INSERT INTO `punto_ruta` VALUES (590,-0.7071334187842008,-80.10345425999786,35),(591,-0.7065326496835423,-80.10358300603058,35),(592,-0.7058996964398624,-80.10370102322723,35),(593,-0.7051916469465634,-80.10386195576812,35),(594,-0.7049375042636242,-80.10389271418076,35),(595,-0.7049482322876433,-80.10315778891068,35),(596,-0.7049857803715063,-80.10242822805863,35),(597,-0.7049965083954108,-80.10207417646866,35),(598,-0.7050286924669716,-80.10153237024765,35),(599,-0.7050286924669716,-80.10121050516587,35),(600,-0.7049696883356049,-80.10095837751847,35),(601,-0.7049106842034877,-80.10072770754319,35),(602,-0.7047765839004383,-80.100153714814,35),(603,-0.7045747827406539,-80.09948030492636,35),(604,-0.704360222238455,-80.09870246431204,35),(605,-0.7037916368598526,-80.09722188493582,35),(606,-0.7037219046860069,-80.09710386773916,35),(607,-0.7032016069455226,-80.09607391879487,35),(608,-0.7028529460217923,-80.09544628188539,35),(609,-0.7024989210572111,-80.09473817870546,35),(610,-0.7022521763690786,-80.09415345714021,35),(611,-0.701632589824894,-80.09379858899561,35),(612,-0.7001776967636508,-80.09325141835657,35),(613,-0.6997390588246318,-80.09415350538681,35),(614,-0.6994708579179708,-80.09479723555039,35),(615,-0.6987097237382754,-80.09442184995943,35),(616,-0.6989725606695543,-80.09379957746798,35),(617,-0.6981840498315844,-80.0934079749518,35),(618,-0.6985971122112609,-80.07744256907567,49),(619,-0.7022017317854897,-80.08147661143407,49),(620,-0.7047764583519353,-80.08654062205419,49),(621,-0.7068362385805714,-80.09031717234716,49),(622,-0.7086385455313244,-80.09606782847509,49),(623,-0.7081236007597347,-80.09993020945653,49),(624,-0.7078799833886708,-80.10022732806033,49),(625,-0.7066784453028209,-80.10033461642092,49),(626,-0.705970395928093,-80.1007637698633,49),(627,-0.7059489398847494,-80.10110709261721,49),(628,-0.7050263299274309,-80.10127875399417,49),(629,-0.7043397363521489,-80.09872529101199,49),(630,-0.7037282316754988,-80.09704443044393,49),(631,-0.7021833955590598,-80.096336327264,49),(632,-0.7012637958490677,-80.09595708027719,49),(633,-0.7017143731910741,-80.09486273899911,49),(634,-0.6998262392776132,-80.09411172047494,49),(635,-0.6990967327891962,-80.09368256703256,49),(636,-0.6997404149907442,-80.09310320988534,49),(637,-0.7006415699245068,-80.09194449559091,49),(638,-0.7013710761725248,-80.09130076542733,49),(639,-0.7002982728273087,-80.09042100087045,49),(640,-0.6996545907022976,-80.08986310139535,49),(641,-0.6969048372660631,-80.09180797004724,37),(642,-0.6965400838093871,-80.09262336158777,37),(643,-0.6956990272228999,-80.09223574669656,37),(644,-0.6951733529802023,-80.0920640853196,37),(645,-0.694712046963919,-80.09190315277871,37),(646,-0.6945833103931811,-80.09216064484414,37),(647,-0.6946047664885459,-80.09234303505716,37),(648,-0.6947013189164783,-80.09245032341775,37),(649,-0.694712046963919,-80.0925683406144,37),(650,-0.6945725823454734,-80.09298676522073,37),(651,-0.6952377212579633,-80.09340518982705,37),(652,-0.6956453869967397,-80.09359830887612,37),(653,-0.6960315966115136,-80.0937914279252,37),(654,-0.696750375532563,-80.0940811064988,37),(655,-0.6969327522562956,-80.0937914279252,37),(656,-0.6973571257692099,-80.09418368339539,37),(657,-0.6972224093912176,-80.09319061310586,37),(658,-0.6973404178484864,-80.09301895172891,37),(659,-0.697748083405386,-80.09207481415567,37),(660,-0.6993251050952947,-80.09287947686013,37),(661,-0.7002155320740054,-80.09327644379434,37),(662,-0.70063392541525,-80.09349102051553,37),(663,-0.7010952308507514,-80.093576851204,37),(664,-0.7006124693473781,-80.09454244644937,37),(665,-0.7003549965252429,-80.09511107476052,37),(666,-0.7000116994070532,-80.09587282212075,37),(667,-0.6998078667312463,-80.0963127043992,37),(668,-0.6997864106595831,-80.09655946762857,37),(669,-0.7000224274423823,-80.09674185784158,37),(670,-0.7005481011431769,-80.09701007874307,37),(671,-0.7007304777194716,-80.09706372292337,37),(672,-0.7010952308507514,-80.09624833138284,37),(673,-0.701223967243251,-80.09598011048135,37),(674,-0.7016954508255144,-80.09617322953042,37),(675,-0.7021245720650062,-80.09635561974343,37),(676,-0.7025107811468718,-80.09653800995645,37),(677,-0.7024851267572016,-80.09651184082031,37),(678,-0.700998128727388,-80.09552949936685,37),(679,-0.7046447332883179,-80.07886686331416,50),(680,-0.701726709656747,-80.08019723898555,50),(681,-0.7005251699848435,-80.07697858816768,50),(682,-0.6983112761783978,-80.07624407133059,50),(683,-0.7020875444648461,-80.07504244169192,50),(684,-0.7031174352870538,-80.07323999723391,50),(685,-0.6950499511255122,-80.07487078031497,50),(686,-0.7042331500880622,-80.08705873807864,50),(687,-0.6944491804750839,-80.09074945768313,50),(688,-0.6871541022181052,-80.07152338346438,50),(689,-0.6991695192377309,-80.06748934110598,50),(690,-0.706807875532001,-80.08036394437747,50),(691,-0.7002852349803106,-80.0974442513843,50),(692,-0.6910162038670081,-80.10061998685794,50),(693,-0.6856092606833115,-80.08568544706301,50),(694,-0.6967664382768407,-80.06216783842044,50);
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
  `id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idrecolector`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recolector`
--

LOCK TABLES `recolector` WRITE;
/*!40000 ALTER TABLE `recolector` DISABLE KEYS */;
INSERT INTO `recolector` VALUES (4,'recolector01','MBN - 991','recolector','868683023703154');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
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
  `descripcion` varchar(800) NOT NULL,
  `estado_grafica` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idruta`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (35,'Ruta 1','AV. SIXTO DURAN BALLEN, CALLE 7 DE AGOSTO, CALLE SUCRE MUNICIPIO DE CHONE, CALLE ALEJO LASCANO..','SI'),(37,'Ruta 2','CALLE BOLIVAR HASTA EL CEMENTERIO SAGRADO CORAZÓN DE JESUS, CALLE MERCEDES, CALLE SALINAS, CALLE WASHINGTON, CALLE SUCRE, CALLE COLÓN, CALLE PICHINCHA.','SI'),(49,'Ruta 3','CALLE VARGAS TORRES, CALLE ATAHUALPA Y CENTRO COMERCIAL (MERCADO)','SI'),(50,'Ruta 4','CALLE ALEJO LASCANO, CALLE PAEZ Y MALECÓN, CALLE ROCAFUERTE ','SI');
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
  `username` varchar(220) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(220) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idservice_api`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_api`
--

LOCK TABLES `service_api` WRITE;
/*!40000 ALTER TABLE `service_api` DISABLE KEYS */;
INSERT INTO `service_api` VALUES (1,'dgYWCEk82k8E31HIw68GNQjTRvSHXU6fUpfhmI53T-hXRb1vaQJ-bgs2iooVhmWBtZ0yJuCx8GrrLjVo5oAHYojXDbGzytxq0eMDCQgpy0xehEWgjTOpI_V6SUKxietSkIJybZlDUacigHYoutUg0q1x4vjrrMO716j7kA5Dmc_FmuV-5HOvwUBOxBf_fV8Z6tjTyTGZsWpOUNu1Ghs43pjzfwM5wipcuX2i23quYIG0Fn8-s2ceGwF24F-ZPEAN9wq6jeaK2dlwZMdxJFWwtrdJgM7J3K4CwenKFXORbBbaTGhoNTXcFp2EzpHCxcpcn7fnNHn1plGZ6XUyPVqcGSo8ajtdBgFlMiT3OJygv3PAcnuKRhtrNwQC7Bldn--mzh5J07OrHKHVNkEo8j_BeItKosONqhzGDYeuXPagQ1rU8bj1tZNv-NfRerBOjfkuVw41WaA9DjdB_SeFu8712HZ5edloj3iAx1An1l5CDmls2b-q7rXM0tZXtDv0gM6SWFCXTfQ10ANpDINx0eKVz9iXl1793j9tFdXklClZcFjtE1GhctCI_Ig61R_zKvs2JjfYNc-6v0IMw_XxTvHpmM1dg7fEhrc9l9mjUpkAS7s0ZC5U2zgDtemRtYHK_TLxgho_CWjPCW6Sj5fum4-bdM5noMCZ-vSYHlcHDWiUgG_e0aKXUHc9IOtQVK0a4lSds8gAXUui-G_Of6PdciOIaX1G4lJhVLjnxMS9SD-xovoVLdldxRSkGv6iq0xoVEiMx9V3LT_UEXvGZSGNrK-b-A','b8c704e69f554c2fb0030cba6d17ea28','practica','practica');
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
  `cedula` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo_usuario_idtipo_usuario` int(11) NOT NULL,
  `estado_configuracion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_tipo_usuario2_idx` (`tipo_usuario_idtipo_usuario`),
  CONSTRAINT `fk_usuario_tipo_usuario2` FOREIGN KEY (`tipo_usuario_idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (5,'1716448137','SABANDO VALENCIA JOSE LEONARDO',1,0),(6,'1312499625','ALCIVAR SANTANDER ADRIAN HERACLITO',1,0),(7,'1309639365','CRISTHIAN ZAMBRANO ZAMBRANO',1,1);
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

-- Dump completed on 2020-03-09 15:34:57
