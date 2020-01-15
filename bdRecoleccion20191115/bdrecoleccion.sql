-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2020 a las 00:53:30
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdrecoleccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_diaria`
--

CREATE TABLE `actividad_diaria` (
  `idactividad_diaria` int(11) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `persona_idpersona` int(11) NOT NULL,
  `ruta_idruta` int(11) NOT NULL,
  `recolector_idrecolector` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `idevaluacion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `objetivo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`idevaluacion`, `fecha_inicio`, `fecha_fin`, `nombre`, `objetivo`, `estado`) VALUES
(1, '2019-12-03', '2019-12-07', 'Evaluacion de Servicios', 'Simulación', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_usuario`
--

CREATE TABLE `evaluacion_usuario` (
  `id` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idevaluacion` int(11) NOT NULL,
  `estado` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `idnotificacion` int(11) NOT NULL,
  `distancia_metros` varchar(45) DEFAULT NULL,
  `idpunto_de_referencia_ruta` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `idopiniones` int(11) NOT NULL,
  `detalle` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`idopiniones`, `detalle`, `fecha`, `estado`, `usuario_idusuario`) VALUES
(3, 'adios señores', '2019-10-27', 'no se', 1),
(4, 'hola de nuevoooo', '2019-10-29', 'no se para que esto, cristhian lo puso en la ', 1),
(5, 'qweqwqweqwe', '2019-12-05', 'E', 2),
(6, 'hola me le pegan al perro@', '2019-12-05', 'E', 2),
(7, 'me let pegan all perro', '2019-12-05', 'E', 2),
(8, 'me let pegan all perro cuan', '2019-12-05', 'E', 2),
(9, 'dd', '2019-12-05', 'E', 2),
(10, 'hjsdfhs', '2019-12-05', 'E', 2),
(11, 'MARON VE PORNO', '2019-12-13', 'E', 2),
(12, 'ugfyugyugjh', '2019-12-16', 'E', 2),
(13, ',jlkjlkjl', '2019-12-16', 'E', 2),
(14, 'rwer', '2019-12-25', 'E', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `dni`, `fecha`) VALUES
(1, 'Jeniffer Alcívar', '1313672311', NULL),
(2, 'Yandri Alcívar', '1313672329', NULL),
(3, 'Kevin Alcívar', '1313672345', NULL),
(4, 'Mauricio Alcívar', '1313672349', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `idpregunta` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`idpregunta`, `descripcion`) VALUES
(2, 'La app funciona bien '),
(3, 'Es bonita'),
(4, 'cuanto perro tienes la perra?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_evaluacion`
--

CREATE TABLE `pregunta_evaluacion` (
  `idpregunta_evaluacion` int(11) NOT NULL,
  `idevaluacion` int(11) NOT NULL,
  `idpregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta_evaluacion`
--

INSERT INTO `pregunta_evaluacion` (`idpregunta_evaluacion`, `idevaluacion`, `idpregunta`) VALUES
(5, 1, 2),
(6, 1, 4),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_de_referencia`
--

CREATE TABLE `punto_de_referencia` (
  `idpunto_de_referencia` int(11) NOT NULL,
  `longuitud` double DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `punto_de_referencia`
--

INSERT INTO `punto_de_referencia` (`idpunto_de_referencia`, `longuitud`, `latitud`, `descripcion`, `estado`, `usuario_idusuario`) VALUES
(1, -80.095898, -0.701059, 'Prueba-home', 'A', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_de_referencia_ruta`
--

CREATE TABLE `punto_de_referencia_ruta` (
  `idpunto_de_referencia_ruta` int(11) NOT NULL,
  `ruta_idruta` int(11) NOT NULL,
  `punto_de_referencia_idpunto_de_referencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_ruta`
--

CREATE TABLE `punto_ruta` (
  `idpunto_ruta` int(11) NOT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `ruta_idruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `punto_ruta`
--

INSERT INTO `punto_ruta` (`idpunto_ruta`, `latitud`, `longitud`, `ruta_idruta`) VALUES
(349, -0.701112753755547, -80.12136655945154, 35),
(350, -0.6959632951794036, -80.09390073913904, 35),
(351, -0.6902988842538972, -80.07570463318201, 35),
(352, -0.7073779207153825, -80.07132726806971, 35),
(353, -0.7098668203149474, -80.0966473211703, 35),
(354, -0.7013702265360423, -80.12110906738612, 35),
(355, -0.7023827054209083, -80.12969213623377, 37),
(356, -0.7016102872040999, -80.1259155859408, 37),
(357, -0.7010095173917479, -80.12248235840174, 37),
(358, -0.7003229232261168, -80.11801916260096, 37),
(359, -0.6997221532486939, -80.11475759643885, 37),
(360, -0.6993788560841826, -80.1131268133578, 37),
(361, -0.6987225822695955, -80.11263654470908, 37),
(362, -0.6981647242457854, -80.10995433569418, 37),
(363, -0.6979072512894052, -80.10905311346518, 37),
(364, -0.6968344471527909, -80.105598428254, 37),
(365, -0.6953968892267763, -80.10134980917441, 37),
(366, -0.6948604869033695, -80.09952590704428, 37),
(367, -0.6947317503366773, -80.09828136206137, 37),
(368, -0.6947317503366773, -80.09765908956992, 37),
(369, -0.6947672246551491, -80.0965441482006, 37),
(370, -0.6952821708969567, -80.09547126459465, 37),
(371, -0.6956254683603, -80.09469878839836, 37),
(372, -0.6959473097095009, -80.09405505823479, 37),
(373, -0.6965909923420014, -80.09268176721916, 37),
(374, -0.6969128336252883, -80.09180200266228, 37),
(375, -0.6970844823007152, -80.09173762964592, 37),
(376, -0.6967626410291453, -80.09051454233513, 37),
(377, -0.6967626410291453, -80.08989226984367, 37),
(378, -0.6968270092852277, -80.08911979364738, 37),
(379, -0.6968484653703891, -80.08802545236931, 37),
(380, -0.6971273944685954, -80.08665216135368, 37),
(381, -0.6973634113849397, -80.08482825922356, 37),
(382, -0.6976208843710897, -80.08281123804436, 37),
(383, -0.6978354451821205, -80.08090150522575, 37),
(384, -0.6979687994469612, -80.07940163686943, 37),
(385, -0.6985266574940149, -80.07706275060845, 37),
(386, -0.6982477284787575, -80.07646193578911, 37),
(387, -0.698118992004594, -80.07568945959282, 37),
(388, -0.6984193771054964, -80.07614007070732, 37),
(389, -0.698805586492708, -80.07691254690361, 37),
(390, -0.6995780051718798, -80.07796397283745, 37),
(391, -0.7003718797929611, -80.07884373739434, 37),
(392, -0.7012086664101727, -80.0797020442791, 37),
(393, -0.7024745740851772, -80.08208384588433, 37),
(394, -0.7040194101052581, -80.0851952083416, 37),
(395, -0.7047918279234412, -80.08637538030816, 37),
(396, -0.7048132839721154, -80.08663287237358, 37),
(397, -0.7054784214320715, -80.08798470571709, 37),
(398, -0.7070184424722374, -80.09069538702565, 37),
(399, -0.707855227896461, -80.09264803518849, 37),
(400, -0.7084277845823286, -80.09455219876654, 37),
(401, -0.708406328550346, -80.09736315381414, 37),
(402, -0.7079342958215898, -80.10105387341864, 37),
(403, -0.707011686258482, -80.10534540784246, 37),
(404, -0.7065721870137289, -80.10774215989987, 37),
(405, -0.7067223792949079, -80.10993084245602, 37),
(406, -0.707496219306577, -80.11572797080528, 37),
(407, -0.7080326201816738, -80.11941869040977, 37),
(408, -0.7071743787517516, -80.12338835975181, 37),
(409, -0.7056509998229689, -80.12652117988121, 37),
(410, -0.7048142140018628, -80.1276369788314, 37),
(411, -0.7035483069611499, -80.12901026984703, 37),
(412, -0.7027973449949937, -80.13019044181358, 37),
(413, -0.7024969601747181, -80.13089854499351, 37),
(414, -0.7097126193719826, -80.09542129367472, 49),
(415, -0.7085325377926921, -80.09531400531412, 49),
(416, -0.7082106973097854, -80.09308240741373, 49),
(417, -0.7093264108882393, -80.09246013492228, 49),
(418, -0.7098198995006371, -80.09514234393717, 49),
(419, -0.7063440220685746, -80.0968589577067, 49),
(420, -0.7045202581777398, -80.09522817462565, 49),
(421, -0.7043915218761023, -80.09267471164347, 49),
(422, -0.7059792693476118, -80.09076497882486, 49),
(423, -0.7029539662663458, -80.0914730820048, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recolector`
--

CREATE TABLE `recolector` (
  `idrecolector` int(11) NOT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `tipo_vehiculo` varchar(45) DEFAULT NULL,
  `id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recolector`
--

INSERT INTO `recolector` (`idrecolector`, `numero`, `placa`, `tipo_vehiculo`, `id`) VALUES
(3, 'volqueta03', 'GBN - 098', 'volquete', '862045030931291'),
(4, 'recolector01', 'MBN - 991', 'recolector', '868683023703154'),
(5, 'volqueta02', 'GBN - 900', 'volquete', '868683029339078');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `idrespuesta` int(11) NOT NULL,
  `puntaje` varchar(45) DEFAULT NULL,
  `idpregunta_evaluacion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`idrespuesta`, `puntaje`, `idpregunta_evaluacion`, `idusuario`, `estado`) VALUES
(5, '4', 5, 2, 'E'),
(6, '3', 7, 2, 'E'),
(7, '4', 6, 2, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `idruta` int(11) NOT NULL,
  `nombre_ruta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(800) NOT NULL,
  `estado_grafica` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`idruta`, `nombre_ruta`, `descripcion`, `estado_grafica`) VALUES
(35, 'Ruta 1', 'AV. SIXTO DURAN BALLEN, CALLE 7 DE AGOSTO, CALLE SUCRE MUNICIPIO DE CHONE, CALLE ALEJO LASCANO..', 'SI'),
(37, 'Ruta 2', 'CALLE BOLIVAR HASTA EL CEMENTERIO SAGRADO CORAZÓN DE JESUS, CALLE MERCEDES, CALLE SALINAS, CALLE WASHINGTON, CALLE SUCRE, CALLE COLÓN, CALLE PICHINCHA.', 'SI'),
(49, 'Ruta 3', 'CALLE VARGAS TORRES, CALLE ATAHUALPA Y CENTRO COMERCIAL (MERCADO)', 'SI'),
(50, 'Ruta 4', 'CALLE ALEJO LASCANO, CALLE PAEZ Y MALECÓN, CALLE ROCAFUERTE ', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_api`
--

CREATE TABLE `service_api` (
  `idservice_api` int(11) NOT NULL,
  `access_token` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `refresh_token` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(220) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(220) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `service_api`
--

INSERT INTO `service_api` (`idservice_api`, `access_token`, `refresh_token`, `username`, `password`) VALUES
(1, 'N0iTMYuWRqlAmo8msHidTlIMw7cOAjSOZMi9dZ3E4Z57ypQF6moM_Dt25w0g9W9xtVRkb6ROAwXAhlic1Cb_eJT2zikI6dsRDyof8IPbr9U69dWqjNivkO-mWMd90QnF3mxljwDt-owGFaaMdn14EzBITXA8GmXUk73-CtitNNkJ_Ze6MlIwfLbPOm21e-gP5fh6_1zpAG5EKBcb66y7CHB9ebNYHlkvNK-ZkufZwoEGnMHcSCWgFUKCGciAQgjL7cyresR40Kifu4eeCAwozAC6we6lYRViKt_0pYg6iblp26eFmG2cM3WIa9K0OCEmp5Rgb7cthQvzRgijSFMb-GjrAv5MYgI669b6_pXypH8CWDLWg_PUIiMcbJ21j6LPCRZluyvKpDVm323Fb6-gvAwpnfhow8Q1--BBdaolV0rcDV2Qqw3lQCjZL0LJLDWbhZBSWiUT4pRPlF0VirQAqGvJACiU142ZEBCHmMPkG4YKxFy6IS_yPyXkWZAkBk4i75fZGdJznHsDIBVNoRpV7s5miiDOUWiQLsY9fESm56HFXiJN3wBBg3IHxPTZd-q3zkL-V8-Ros93-mRqQ5DRSqLBnek6ESZkgjemq2xEwJQ0uPY8Ftd7Z62jgRXG17j43vOAwNyEAlxP1pTyzMVRj-TpPmyfPDGOCGJcTBYA_8h0h6HO3Hhx-nNttVg5LBMzIDrXTgzqg9EYA8K0bZy54KCfkrO9lH_T2UnVWaAxKWkmUWrueqxzZpzUBH_JQkUjSoEAqvtpnQWLHMMe2tIadQ', '41e18bce951d407d8aba26db88c6eaa7', 'practica', 'practica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipo_usuario`, `descripcion`) VALUES
(1, 'ciudadano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo_usuario_idtipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `nombre`, `tipo_usuario_idtipo_usuario`) VALUES
(1, '1314', 'rouss', 'Rouss', 1),
(2, '1313', '1234', 'cazz', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_diaria`
--
ALTER TABLE `actividad_diaria`
  ADD PRIMARY KEY (`idactividad_diaria`),
  ADD KEY `fk_actividad_diaria_persona2_idx` (`persona_idpersona`),
  ADD KEY `fk_actividad_diaria_ruta1_idx` (`ruta_idruta`),
  ADD KEY `fk_actividad_diaria_recolector1_idx` (`recolector_idrecolector`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`idevaluacion`);

--
-- Indices de la tabla `evaluacion_usuario`
--
ALTER TABLE `evaluacion_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`idnotificacion`),
  ADD KEY `fk_notificacion_punto_de_referencia_ruta1_idx` (`idpunto_de_referencia_ruta`),
  ADD KEY `fk_notificacion_usuario1_idx` (`idusuario`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`idopiniones`),
  ADD KEY `fk_opiniones_usuario2_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`idpregunta`);

--
-- Indices de la tabla `pregunta_evaluacion`
--
ALTER TABLE `pregunta_evaluacion`
  ADD PRIMARY KEY (`idpregunta_evaluacion`),
  ADD KEY `fk_pregunta_evaluacion_evaluacion1_idx` (`idevaluacion`),
  ADD KEY `fk_pregunta_evaluacion_pregunta1_idx` (`idpregunta`);

--
-- Indices de la tabla `punto_de_referencia`
--
ALTER TABLE `punto_de_referencia`
  ADD PRIMARY KEY (`idpunto_de_referencia`),
  ADD KEY `fk_punto_de_referencia_usuario2_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `punto_de_referencia_ruta`
--
ALTER TABLE `punto_de_referencia_ruta`
  ADD PRIMARY KEY (`idpunto_de_referencia_ruta`),
  ADD KEY `fk_punto_de_referencia_ruta_ruta1_idx` (`ruta_idruta`),
  ADD KEY `fk_punto_de_referencia_ruta_punto_de_referencia2_idx` (`punto_de_referencia_idpunto_de_referencia`);

--
-- Indices de la tabla `punto_ruta`
--
ALTER TABLE `punto_ruta`
  ADD PRIMARY KEY (`idpunto_ruta`),
  ADD KEY `fk_punto_ruta_ruta2_idx` (`ruta_idruta`);

--
-- Indices de la tabla `recolector`
--
ALTER TABLE `recolector`
  ADD PRIMARY KEY (`idrecolector`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `fk_respuesta_pregunta_evaluacion1_idx` (`idpregunta_evaluacion`),
  ADD KEY `fk_respuesta_usuario1_idx` (`idusuario`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`idruta`);

--
-- Indices de la tabla `service_api`
--
ALTER TABLE `service_api`
  ADD PRIMARY KEY (`idservice_api`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_tipo_usuario2_idx` (`tipo_usuario_idtipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_diaria`
--
ALTER TABLE `actividad_diaria`
  MODIFY `idactividad_diaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `idevaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `evaluacion_usuario`
--
ALTER TABLE `evaluacion_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `idopiniones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `idpregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pregunta_evaluacion`
--
ALTER TABLE `pregunta_evaluacion`
  MODIFY `idpregunta_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `punto_de_referencia`
--
ALTER TABLE `punto_de_referencia`
  MODIFY `idpunto_de_referencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `punto_de_referencia_ruta`
--
ALTER TABLE `punto_de_referencia_ruta`
  MODIFY `idpunto_de_referencia_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `punto_ruta`
--
ALTER TABLE `punto_ruta`
  MODIFY `idpunto_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT de la tabla `recolector`
--
ALTER TABLE `recolector`
  MODIFY `idrecolector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `idruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `service_api`
--
ALTER TABLE `service_api`
  MODIFY `idservice_api` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_diaria`
--
ALTER TABLE `actividad_diaria`
  ADD CONSTRAINT `fk_actividad_diaria_persona2` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actividad_diaria_recolector1` FOREIGN KEY (`recolector_idrecolector`) REFERENCES `recolector` (`idrecolector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actividad_diaria_ruta1` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificacion_punto_de_referencia_ruta1` FOREIGN KEY (`idpunto_de_referencia_ruta`) REFERENCES `punto_de_referencia_ruta` (`idpunto_de_referencia_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notificacion_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `fk_opiniones_usuario2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta_evaluacion`
--
ALTER TABLE `pregunta_evaluacion`
  ADD CONSTRAINT `fk_pregunta_evaluacion_evaluacion1` FOREIGN KEY (`idevaluacion`) REFERENCES `evaluacion` (`idevaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pregunta_evaluacion_pregunta1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`idpregunta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `punto_de_referencia`
--
ALTER TABLE `punto_de_referencia`
  ADD CONSTRAINT `fk_punto_de_referencia_usuario2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `punto_de_referencia_ruta`
--
ALTER TABLE `punto_de_referencia_ruta`
  ADD CONSTRAINT `fk_punto_de_referencia_ruta_punto_de_referencia2` FOREIGN KEY (`punto_de_referencia_idpunto_de_referencia`) REFERENCES `punto_de_referencia` (`idpunto_de_referencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_punto_de_referencia_ruta_ruta1` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `punto_ruta`
--
ALTER TABLE `punto_ruta`
  ADD CONSTRAINT `fk_punto_ruta_ruta2` FOREIGN KEY (`ruta_idruta`) REFERENCES `ruta` (`idruta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_respuesta_pregunta_evaluacion1` FOREIGN KEY (`idpregunta_evaluacion`) REFERENCES `pregunta_evaluacion` (`idpregunta_evaluacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_respuesta_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_usuario2` FOREIGN KEY (`tipo_usuario_idtipo_usuario`) REFERENCES `tipo_usuario` (`idtipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
