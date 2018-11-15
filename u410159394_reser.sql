-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-11-2018 a las 22:16:22
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u410159394_reser`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `codigo` int(2) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`codigo`, `nombre`) VALUES
(9, 'Admin'),
(20, 'Jefe'),
(30, 'Operario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(10) NOT NULL,
  `codigo_color` varchar(10) NOT NULL,
  `nombre_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `codigo_color`, `nombre_color`) VALUES
(1, '#FFD700', 'Amarillo'),
(2, '#0071c5', 'Azul Turquesa'),
(3, '#FF4500', 'Naranja'),
(4, '#8B4513', 'Marron'),
(5, '#1C1C1C', 'Negro'),
(6, '#436EEE', 'Azul Real'),
(7, '#A020F0', 'Purpura'),
(8, '#40E0D0', 'Turquesa'),
(9, '#228B22', 'Verde'),
(10, '#8B0000', 'Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_dp` int(11) NOT NULL,
  `domicilio` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `telefono1` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `telefono2` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `telegram` varchar(45) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_dp`, `domicilio`, `telefono1`, `telefono2`, `email`, `telegram`) VALUES
(4, 'aca nomas', '4545345', '767576575', 'ja@gmail.cm', NULL),
(5, 'lejos', '4535345', '76555554', 'fvfdg@ggg', NULL),
(6, 'aca', '5756546', '', 'marce@motius.net', ''),
(7, 'Aca nomas', '6668761287', '234234234', 'funesomar@gmail.com', 'No tiene '),
(8, 'No tan cerca', '123331223', '234234234', 'fede@gmailo', 'vaya usted a saber'),
(9, 'cerca de aca', '99955588', '123456', 'prueba@email', ''),
(10, 'cerca de aca155', '66955588', '923458', 'prueba1@email', ''),
(11, 'lejos de aca', '9995959588', '15656456', 'prueba2@email', ''),
(12, 'dfsdf', 'dsfsd', 'dsfsd', 'dsfsdf', ''),
(13, 'aca', '674654546748', '234234', 'funesomar@gmail.com', 'vaya usted a saber'),
(15, '', '', '', '', ''),
(16, 'Sarmiento 78', '', '', 'mmmm@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales_2`
--

CREATE TABLE `datos_personales_2` (
  `id_dp2` int(11) NOT NULL,
  `foto` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `empresa` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `contacto` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cv` varchar(300) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `datos_personales_2`
--

INSERT INTO `datos_personales_2` (`id_dp2`, `foto`, `empresa`, `contacto`, `cv`) VALUES
(1, '', '', '', ''),
(2, 'no registrada', 'Wayne.inc', 'Bruno Diaz', 'Desconocido'),
(3, 'no registrada', 'Umbrella', 'Nemesis', 'Resistente al virus T'),
(4, 'ninguna', 'motiusdotnet', 'dios', 'no es necesario'),
(5, 'sdfsdf', '', '', ''),
(6, 'no registrada', 'Wayne.inc', 'Bruno Diaz', 'Heroe enmascarado'),
(8, '', '', '', ''),
(9, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_l` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_eventos`
--

CREATE TABLE `mis_eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `tipo_uso` varchar(50) NOT NULL,
  `quien` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mis_eventos`
--

INSERT INTO `mis_eventos` (`id`, `titulo`, `color`, `inicio`, `fin`, `tipo_uso`, `quien`) VALUES
(1, 'Reunion Colegio', '#0071c5', '2018-04-23 09:00:00', '2018-04-23 11:00:00', '', ''),
(2, 'Gimnasio Gym', '#40e0d0', '2018-04-13 14:00:00', '2018-04-13 17:00:00', '', ''),
(3, 'Reunion accionistas', '#FFD700', '2018-04-23 08:00:00', '2018-04-23 09:00:00', '', ''),
(4, 'Reunion acreedores', '#40e0d0', '2018-04-23 10:00:00', '2018-04-23 11:00:00', '', ''),
(5, 'Reunion con el Banco', '#0071c5', '2018-04-23 11:00:00', '2018-04-13 12:00:00', '', ''),
(6, 'Reunion con amigos', '#FFD700', '2018-04-23 13:00:00', '2018-04-23 14:00:00', '', ''),
(7, 'Reunion de trabajo', '#0071c5', '2018-04-23 14:00:00', '2018-04-23 15:00:00', '', ''),
(8, 'Reunion semanal', '#FFD700', '2018-04-23 16:00:00', '2018-04-23 17:00:00', '', ''),
(9, 'Pago de telefono', '#228B22', '2018-04-24 18:00:00', '2018-04-24 20:00:00', '', ''),
(22, 'ghjs hd hdfh dsfh dfh', '#FF4500', '2018-11-08 07:00:00', '2018-11-08 10:00:00', '', ''),
(12, 'ppp3', '#FF4500', '2018-11-03 09:00:00', '2018-11-03 12:00:00', '', ''),
(13, 'dgsgsg', '#A020F0', '2018-11-08 14:00:00', '2018-11-08 20:30:00', '', ''),
(14, 'ghjs hd hdfh dsfh dfh', '#228B22', '2018-11-07 14:00:00', '2018-11-07 17:30:00', '', ''),
(15, 'prueba20', '#FFD700', '2018-11-02 06:30:00', '2018-11-02 09:30:00', '', ''),
(16, 'prueba de encime', '#8B4513', '2018-11-02 12:30:00', '2018-11-02 15:30:00', '', ''),
(17, 'asdasdas', '#1C1C1C', '2018-11-02 15:30:00', '2018-11-02 18:30:00', '', ''),
(18, 'prueba21', '#8B0000', '2018-11-03 06:30:00', '2018-11-03 08:00:00', '', ''),
(19, 'ssgfds', '#40E0D0', '2018-11-04 06:30:00', '2018-11-04 14:30:00', '', ''),
(20, 'xc', '#FFD700', '2018-11-04 15:00:00', '2018-11-04 18:30:00', '', ''),
(23, 'pp1', '#FFD700', '2018-11-08 11:00:00', '2018-11-08 13:00:00', '', ''),
(24, 'prueba30', '#A020F0', '2018-11-09 06:30:00', '2018-11-09 10:00:00', '', ''),
(25, 'prueba21', '#FF4500', '2018-11-09 12:00:00', '2018-11-09 14:45:00', '', ''),
(27, 'Videconferencia Niza', '#FFD700', '2018-11-12 06:30:00', '2018-11-12 11:00:00', 'Reuniones', 'fajardo'),
(28, 'Videconferencia grande Niza', '#228B22', '2018-11-12 10:00:00', '2018-11-12 12:00:00', 'Capacitaciones', 'jon snow'),
(29, 'Videconferencia Niza', '#FFD700', '2018-11-14 09:00:00', '2018-11-14 12:00:00', 'Videoconferencia', 'fajardo'),
(30, 'Videconferencia Niza', '#FFD700', '2018-11-15 09:00:00', '2018-11-15 14:00:00', 'Videoconferencia', 'fajardo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_notas` int(11) NOT NULL,
  `contenido` varchar(450) CHARACTER SET latin1 NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_notas`, `contenido`, `fecha`, `id_usuario`) VALUES
(4, 'Pedir perfumes importados', '2016-11-12', 1),
(6, 'Grabar a la Susana el domingo que viene ', '2016-11-20', 1),
(8, 'La Superluna se super no vio', '2016-12-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(45) CHARACTER SET latin1 NOT NULL,
  `tipo_dni_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`dni`, `nombre`, `apellido`, `tipo_dni_codigo`) VALUES
(26564566, 'pepe', 'argento', 1),
(31806721, 'Emmanuel', 'Funes', 1),
(124546543, 'Rupertaa', 'diaz', 2),
(159872126, 'Brat', 'Semsomp', 1),
(223434232, 'Franquito', 'Ferrada', 1),
(234234234, 'Alam', 'Brado', 2),
(234234456, 'Matias', 'Lohizo', 1),
(234235426, 'Jose', 'Perez', 1),
(234554545, 'Leonel', 'Rolon', 1),
(234564343, 'Anahi', 'Britos', 1),
(318999898, 'Norma', 'Idelfonso', 1),
(334534533, 'Carolina', 'Delmonte', 1),
(343457634, 'Empedocles', 'Gutierrez', 1),
(345345232, 'Gladis', 'Velazquez', 1),
(345345333, 'Violeta', 'Rojo', 1),
(345345345, 'Ada', 'Fernandez', 1),
(345345455, 'Nicolas', 'Barrios', 1),
(345356345, 'Emmanuel', 'Funes', 1),
(345456544, 'Marcelo', 'Fajardo', 1),
(349345345, 'Elmos', 'Quito', 2),
(349945345, 'Adriana', 'Canabiri', 2),
(365545456, 'Alejandro', 'Magno', 1),
(435345345, 'Daniel', 'Lewis', 1),
(456456444, 'Elver', 'Gachica', 1),
(456456456, 'Rosa', 'Meltrozo', 1),
(456564564, 'Debora', 'Meltrozo', 1),
(534534534, 'Gabriela', 'Quiroga', 1),
(545454534, 'Elver', 'Galarga', 2),
(654544544, 'Soledad', 'Solaro', 1),
(655645454, 'Danilo', 'Rossi', 1),
(687654433, 'Federico', 'Perassi', 1),
(765675644, 'Elvi', 'Olado', 1),
(2147483647, 'Patricia', 'Sousa', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `cod_pr` int(11) NOT NULL,
  `tipo` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`cod_pr`, `tipo`) VALUES
(9, 'Urgente'),
(20, 'Prioritaria'),
(30, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_dp`
--

CREATE TABLE `p_dp` (
  `p_dp_id` int(11) NOT NULL,
  `datos_personales_id_dp` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  `personas_dni` int(11) NOT NULL,
  `datos_personales_id_dp2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `p_dp`
--

INSERT INTO `p_dp` (`p_dp_id`, `datos_personales_id_dp`, `usuario_id_usuario`, `personas_dni`, `datos_personales_id_dp2`) VALUES
(1, 4, 1, 343457634, NULL),
(2, 5, 5, 435345345, NULL),
(7, 5, 1, 234564343, 1),
(9, 10, 1, 345345455, 1),
(10, 9, 1, 345456544, 1),
(15, 9, 1, 534534534, 1),
(18, 8, 5, 223434232, 1),
(21, 6, 5, 345345232, 1),
(30, 10, 6, 349345345, 1),
(35, 6, 6, 687654433, 1),
(8, 6, 1, 334534533, 2),
(12, 4, 1, 365545456, 2),
(13, 8, 1, 456456456, 2),
(19, 6, 5, 234234234, 2),
(22, 7, 5, 345356345, 2),
(25, 10, 6, 234234456, 2),
(28, 9, 6, 345345333, 2),
(29, 5, 6, 345345345, 2),
(31, 6, 6, 456456444, 2),
(33, 5, 6, 654544544, 2),
(34, 9, 6, 655645454, 2),
(23, 10, 5, 435345345, 3),
(26, 6, 6, 234235426, 3),
(27, 10, 6, 343457634, 3),
(32, 7, 6, 545454534, 3),
(11, 5, 1, 349945345, 4),
(14, 5, 1, 456564564, 4),
(20, 6, 5, 318999898, 4),
(36, 12, 1, 26564566, 5),
(37, 13, 1, 31806721, 6),
(39, 15, 15, 31806721, 8),
(40, 16, 15, 456456456, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(10) NOT NULL,
  `nombre_sala` varchar(50) NOT NULL,
  `cant_max_pers` int(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_zona` int(8) NOT NULL DEFAULT '1',
  `creacion` timestamp NOT NULL DEFAULT '2018-11-10 20:23:54',
  `id_color` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `nombre_sala`, `cant_max_pers`, `hora_inicio`, `hora_fin`, `id_zona`, `creacion`, `id_color`) VALUES
(1, 'Videconferencia Niza', 50, '08:00:00', '17:00:00', 1, '2018-11-10 20:23:54', 1),
(2, 'Videconferencia grande Niza', 30, '08:00:00', '17:00:00', 1, '2018-11-10 20:23:54', 9),
(3, 'Reuniones Niza', 15, '08:00:00', '18:00:00', 1, '2018-11-10 20:23:54', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dni`
--

CREATE TABLE `tipo_dni` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_dni`
--

INSERT INTO `tipo_dni` (`codigo`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'Cedula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 NOT NULL,
  `email` varchar(145) CHARACTER SET latin1 NOT NULL,
  `clave` varchar(45) CHARACTER SET latin1 NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_codigo` int(2) NOT NULL,
  `estado` int(8) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `clave`, `create_time`, `category_codigo`, `estado`) VALUES
(1, 'admin', 'motiusdotnet@gmail.com', '5E006F4A47CFFF2ECD68A5E2C144503C', '2016-10-22 00:00:00', 9, 1),
(5, 'marcelo', 'mfajardo.unvime@gmail.com', '102DDAF691E1615D5DACD4C86299BFA4', '2016-10-23 22:45:42', 20, 1),
(6, 'Emmanuel', 'omarfunes@gmail.com', '102DDAF691E1615D5DACD4C86299BFA4', '2016-10-23 23:10:22', 9, 1),
(10, 'Leonel', 'Leonel@ar.com', '102DDAF691E1615D5DACD4C86299BFA4', '2016-11-14 14:03:07', 30, 1),
(13, 'Jon Snow', 'nosabesnadajon@elmuro.com', '102DDAF691E1615D5DACD4C86299BFA4', '2016-11-14 14:07:32', 20, 1),
(14, 'Lucia', 'mibb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-11-14 14:09:06', 30, 1),
(15, 'prueba', 'prueba@gmail.com', '102ddaf691e1615d5dacd4c86299bfa4', '2018-10-18 13:04:14', 30, 1),
(16, 'pepe@gmail.com', 'pepe@gmail.com', '102ddaf691e1615d5dacd4c86299bfa4', '2018-11-13 18:17:58', 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` int(10) NOT NULL,
  `nombre_zona` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `nombre_zona`, `descripcion`) VALUES
(1, 'Niza', 'Niza'),
(3, 'kjasdkladflkas', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indices de la tabla `datos_personales_2`
--
ALTER TABLE `datos_personales_2`
  ADD PRIMARY KEY (`id_dp2`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_l`),
  ADD KEY `fk_login_usuario1_idx` (`usuario_id_usuario`);

--
-- Indices de la tabla `mis_eventos`
--
ALTER TABLE `mis_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_notas`),
  ADD KEY `fk_notas_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_personas_tipo_dni1_idx` (`tipo_dni_codigo`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`cod_pr`);

--
-- Indices de la tabla `p_dp`
--
ALTER TABLE `p_dp`
  ADD PRIMARY KEY (`p_dp_id`,`datos_personales_id_dp`,`usuario_id_usuario`,`personas_dni`),
  ADD KEY `fk_p_dp_datos_personales1_idx` (`datos_personales_id_dp`),
  ADD KEY `fk_p_dp_usuario1_idx` (`usuario_id_usuario`),
  ADD KEY `fk_p_dp_personas1_idx` (`personas_dni`),
  ADD KEY `fk_p_dp_2_idx` (`datos_personales_id_dp2`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`),
  ADD UNIQUE KEY `nombre_sala` (`nombre_sala`);

--
-- Indices de la tabla `tipo_dni`
--
ALTER TABLE `tipo_dni`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuario_category1_idx` (`category_codigo`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zona`),
  ADD UNIQUE KEY `nombre` (`nombre_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `datos_personales_2`
--
ALTER TABLE `datos_personales_2`
  MODIFY `id_dp2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_l` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mis_eventos`
--
ALTER TABLE `mis_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `p_dp`
--
ALTER TABLE `p_dp`
  MODIFY `p_dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_usurio` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_notas_usuaio` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_personas_tipodni` FOREIGN KEY (`tipo_dni_codigo`) REFERENCES `tipo_dni` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `p_dp`
--
ALTER TABLE `p_dp`
  ADD CONSTRAINT `fk_p_dp_1` FOREIGN KEY (`datos_personales_id_dp`) REFERENCES `datos_personales` (`id_dp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_p_dp_2` FOREIGN KEY (`datos_personales_id_dp2`) REFERENCES `datos_personales_2` (`id_dp2`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_p_dp_personas` FOREIGN KEY (`personas_dni`) REFERENCES `personas` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_p_dp_usuario` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_category` FOREIGN KEY (`category_codigo`) REFERENCES `category` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
