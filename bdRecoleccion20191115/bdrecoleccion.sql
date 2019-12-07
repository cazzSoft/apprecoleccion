-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2019 a las 07:39:31
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

--
-- Volcado de datos para la tabla `actividad_diaria`
--

INSERT INTO `actividad_diaria` (`idactividad_diaria`, `dia`, `persona_idpersona`, `ruta_idruta`, `recolector_idrecolector`, `hora_inicio`, `hora_fin`) VALUES
(1, 'Lunes', 2, 4, 3, '09:00:00', '10:00:00'),
(3, 'Domingo', 3, 15, 4, '11:00:00', '12:00:00');

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
(1, '2019-12-03', '2019-12-07', 'Evaluacion de Servicios', 'Conocer la acogida', 'E');

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
(10, 'hjsdfhs', '2019-12-05', 'E', 2);

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
(2, '¿Que tal te parecio lainterfaz??'),
(3, '¿QUe tanto de loca es Jeniffer?'),
(4, '¿de Toxica?');

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
  `longuitud` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  `ruta_idruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'volqueta03', 'GBN - 098', 'volquete', NULL),
(4, 'recolector01', 'MBN - 991', 'recolector', NULL),
(5, 'volqueta02', 'GBN - 900', 'volquete', NULL);

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
(5, '2', 5, 2, 'E'),
(6, '2', 7, 2, 'E'),
(7, '1', 6, 2, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `idruta` int(11) NOT NULL,
  `nombre_ruta` varchar(45) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`idruta`, `nombre_ruta`, `descripcion`) VALUES
(4, 'Ruta 1', 'Cdla Keneddy 1, vía Colorado, Bellavista alta.'),
(5, 'Ruta 1', 'Cdla El vergel, Cdla Miraflores, Lotización Luis Solórzano, Capilla y Malecón del Río.'),
(6, 'Ruta 1', 'Cdla La Aurora, Dos Bocas, Egdy María.'),
(8, 'Ruta 1', 'Calle Principal de Puerto Arturo y Bellavista baja.'),
(9, 'Ruta 1', 'Barrio Puerto Arturo, Cdla. San José y calle Potrerillo.'),
(10, 'Ruta 1', 'Cdla. Julia Gonzalez, Cdla. Espejo, Cdla. Las Quemadas, Cdla. El Rosario, calle Octavio Moreira, calle Colibrí y Cla. Rosario n 2.'),
(11, 'Ruta 1', 'Sector Potrerillo'),
(12, 'Ruta 2', 'Av. Carlos Alberto Aray hasta el anillo vial Los Raidistas.'),
(13, 'Ruta 2', 'Sector Santa Rita, calle Cotopaxi, calle Chimborazo, calle Emilio Hidalgo, Malecón del Río Chone, Escuela Camilo Delgado Balda.'),
(14, 'Ruta 2', 'Cdla. Santa Fé 2000, cdla Camilo Giler, Asentamiento 9 de Octubre y Malecón.'),
(15, 'Ruta 2', 'Sector Agua Potable, calle Ramos Iduarte, calle Juan Montalvo hasta la cdla. Barberan y Malecón.'),
(16, 'Ruta 3', 'sdjsdhf');

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
(1, 'bjlYoU0SePhdXkDb0TWp1fiC_Tet9ZxYJRHgvVgim8aUQACaFgweTeC7d_RERrXLUOjbSREcDbEWE_7u0e82HvSlq0lPaoQcVAeFuw8w6dPlrXPwI7klNL3s6XEBL9mzXi-FN9iDRgaTi_9FrnHQbdWIV3_dUv3VLGW9gXCLz2dokhKmwQ04O_gEKOyjKkH8cpvNQD1urmz7TgK3QLpKNmRn3tnrGFG_eJMub6xxZ7WLrC3bEcdfJDfptR6pBMIM9XELKima7exnO4jXShhphSbjDRbr31NOFeZqkkP7qdbVVQqByKrfn3rnZnT-RPG3bFWb2FxFlFrxF1Y8_EcEw2EIWD3XRpgmxZ6n2XXEyRs3l89ouQJpHCrxTfuY4uzCWHjX7UrJvm69D78-qAwh5BSv7-x5ccYbD--3jpIfjq1dvcH2ZTQDGNUOmL8V_RLu0t2425BwPbWvNw7h9pmdcVz-7UYw8JDTyEOqhAgDfxCLTOZe6kwOW5f_4I9K1HqqkP4c6wSoYh2oyVb9b5KIjtG9JnRFNI5eVS_6CZ1WogQiujaJG9fkBjxrATHiaUoKbF7azWTX_MHsFYPkMmsW50Gq3cHo4doSnbpoTcv2feAiHK-NGour6Ap3Z6dNWFoqtaiVqtXydwbQg50sEVlJqNBipFvPB_oHypBFn4Lc9maeaeXogE3xIMbaHVcOFVLDjGLQMcxImVYjZkXfIfFbSbhyftYFcRm4PKBncmSG2Nl2tAktLCy8GtJ_KLZD8UX_U_vecSrIYDaQzSFqI7K-og', 'f0e2084e792c4b48b79d03e5856087cd', 'practica', 'practica');

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
(1, '1212', '1234', 'Jeniffer', 1),
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
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `idnotificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `idopiniones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `idpunto_de_referencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `punto_de_referencia_ruta`
--
ALTER TABLE `punto_de_referencia_ruta`
  MODIFY `idpunto_de_referencia_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `punto_ruta`
--
ALTER TABLE `punto_ruta`
  MODIFY `idpunto_ruta` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
