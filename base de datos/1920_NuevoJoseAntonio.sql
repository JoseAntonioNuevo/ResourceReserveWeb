-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2019 a las 16:52:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `1920_nuevojoseantonio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_user`
--

CREATE TABLE `estado_user` (
  `id_estado` int(2) NOT NULL,
  `estados` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_user`
--

INSERT INTO `estado_user` (`id_estado`, `estados`) VALUES
(0, 'ok'),
(1, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_Incidencia` int(10) NOT NULL,
  `fecha_inicio_Incidencia` date NOT NULL,
  `fecha_fin_Incidencia` date DEFAULT NULL,
  `hora_inicio_Incidencia` varchar(5) NOT NULL,
  `hora_fin_Incidencia` varchar(5) DEFAULT NULL,
  `descripcion_Incidencia` text NOT NULL,
  `objeto_Incidencia` int(2) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_Incidencia`, `fecha_inicio_Incidencia`, `fecha_fin_Incidencia`, `hora_inicio_Incidencia`, `hora_fin_Incidencia`, `descripcion_Incidencia`, `objeto_Incidencia`, `estado`) VALUES
(1, '2019-12-05', '2019-12-05', '22:31', '22:49', 'no va la luz', 1, 0),
(2, '2019-12-05', NULL, '22:49', NULL, 'se han roto 3 butacas', 10, 1),
(3, '2019-12-09', NULL, '20:44', NULL, 'No funciona el fogÃ³n.', 7, 1),
(4, '2019-12-10', NULL, '16:36', NULL, 'j', 1, 1),
(5, '2019-12-10', NULL, '17:57', NULL, 'se ve mal', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_Inventario` int(2) NOT NULL,
  `nombre_Inventario` varchar(35) NOT NULL,
  `tipo_Inventario` varchar(20) NOT NULL,
  `descripcion_Inventario` varchar(50) NOT NULL,
  `estado_Inventario` int(1) NOT NULL,
  `reservado_Inventario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_Inventario`, `nombre_Inventario`, `tipo_Inventario`, `descripcion_Inventario`, `estado_Inventario`, `reservado_Inventario`) VALUES
(1, 'SalaMultidisciplinar1', 'Sala', 'Sala multidisciplinar planta 0', 3, 1),
(2, 'SalaMultidisciplinar2', 'Sala', 'Sala multidisciplinar planta 1', 2, 2),
(3, 'SalaMultidisciplinar3', 'Sala', 'Sala multidisciplinar planta 2', 1, 2),
(4, 'SalaMultidisciplinar4', 'Sala', 'Sala multidisciplinar planta 3', 1, 2),
(5, 'SalaInformatica1', 'Sala', 'Sala informatica planta 1', 1, 1),
(6, 'SalaInformatica2', 'Sala', 'Sala informatica planta 2', 2, 2),
(7, 'TallerCocina', 'Sala', 'Taller de cocina', 3, 1),
(8, 'DespachoEntrevistas1', 'Sala', 'Despacho entrevistas planta 1', 1, 2),
(9, 'DespachoEntrevistas2', 'Sala', 'Despacho entrevistas planta 2', 1, 2),
(10, 'SalonDeActos', 'Sala', 'Salon de actos', 3, 2),
(11, 'SalaDeReuniones', 'Sala', 'Sala de reuniones', 1, 1),
(12, 'Proyector1', 'Proyector', 'Proyector blanco', 3, 2),
(13, 'Proyector2', 'Proyector', 'Proyector negro', 1, 2),
(14, 'Portatil1', 'Portatil', 'Portatil HP', 2, 2),
(15, 'Portatil2', 'Portatil', 'Portatil Asus', 1, 2),
(16, 'Portatil3', 'Portatil', 'Portatil Lenovo', 1, 2),
(17, 'Movil1', 'Movil', 'Movil IOS', 2, 2),
(18, 'Movil2', 'Movil', 'Movil Android', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_Pedidos` int(10) NOT NULL,
  `nombre_Pedidos` varchar(25) NOT NULL,
  `fecha_inicio_Pedidos` date NOT NULL,
  `hora_inicio_Pedidos` varchar(5) NOT NULL,
  `fecha_final_Pedidos` date DEFAULT NULL,
  `hora_final_Pedidos` varchar(5) DEFAULT NULL,
  `inventario_Pedidos` int(2) DEFAULT NULL,
  `personal_Pedidos` int(1) DEFAULT NULL,
  `finalizado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_Pedidos`, `nombre_Pedidos`, `fecha_inicio_Pedidos`, `hora_inicio_Pedidos`, `fecha_final_Pedidos`, `hora_final_Pedidos`, `inventario_Pedidos`, `personal_Pedidos`, `finalizado`) VALUES
(1, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 2, 1),
(2, 'SalaInformatica1', '2019-12-20', '19:00', '2019-12-20', '20:00', 5, 3, 1),
(3, 'Movil1', '2019-12-22', '20:00', '2019-12-22', '21:00', 17, 2, 1),
(4, 'Movil2', '2019-12-10', '15:00', '2019-12-10', '16:00', 18, 5, 1),
(5, 'Portatil1', '2019-12-23', '08:00', '2019-12-23', '09:00', 14, 3, 1),
(6, 'Portatil3', '2019-12-10', '17:00', '2019-12-10', '16:00', 16, 1, 1),
(7, 'Proyector1', '2019-12-26', '09:00', '2019-12-26', '10:00', 12, 5, 1),
(8, 'SalaInformatica1', '2019-12-10', '18:00', '2019-12-10', '16:01', 5, 1, 1),
(9, 'SalaMultidisciplinar1', '2019-12-17', '15:53', '2019-12-17', '15:53', 1, 1, 1),
(10, 'SalaMultidisciplinar1', '2019-12-17', '15:53', '2019-12-17', '15:53', 1, 1, 1),
(11, 'SalaMultidisciplinar1', '2019-12-17', '15:53', '2019-12-17', '15:53', 1, 1, 1),
(12, 'SalaInformatica1', '2019-12-10', '16:00', '2019-12-10', '17:00', 5, 1, 1),
(13, 'Movil1', '2019-12-10', '16:00', '2019-12-10', '17:00', 17, 1, 1),
(14, 'Portatil2', '2019-12-10', '16:00', '2019-12-10', '17:00', 15, 1, 1),
(15, 'Proyector1', '2019-12-10', '16:00', '2019-12-10', '17:00', 12, 1, 1),
(16, 'Movil2', '2019-12-10', '16:00', '2019-12-10', '17:00', 18, 1, 1),
(17, 'Movil1', '2019-12-28', '16:00', '2019-12-28', '17:00', 17, 1, 1),
(18, 'Movil2', '2019-12-23', '16:00', '2019-12-23', '17:00', 18, 1, 1),
(19, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 1, 1),
(20, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 1, 1),
(21, 'SalaMultidisciplinar3', '2019-12-10', '17:23', '2019-12-10', '17:23', 3, 1, 1),
(22, 'SalaDeReuniones', '2019-12-10', '17:00', '2019-12-10', '18:00', 11, 5, 1),
(23, 'Portatil3', '2019-12-10', '17:00', '2019-12-10', '18:00', 16, 5, 1),
(24, 'SalaMultidisciplinar4', '2019-12-17', '15:53', '2019-12-17', '15:53', 4, 5, 1),
(25, 'SalaInformatica1', '2019-12-10', '17:00', '2019-12-10', '18:00', 5, 5, 1),
(28, 'SalaMultidisciplinar4', '2019-12-17', '15:53', '2019-12-17', '15:53', 4, 5, 1),
(29, 'SalaMultidisciplinar4', '2019-12-17', '15:53', '2019-12-17', '15:53', 4, 5, 1),
(30, 'Movil1', '2019-12-10', '17:00', '2019-12-10', '18:00', 17, 1, 1),
(31, 'Proyector1', '2019-12-10', '17:32', '2019-12-10', '17:32', 12, 1, 1),
(32, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 1, 1),
(33, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 1, 1),
(34, 'SalaMultidisciplinar3', '2019-12-10', '17:33', '2019-12-10', '17:33', 3, 1, 1),
(35, 'SalaMultidisciplinar3', '2019-12-10', '17:33', '2019-12-10', '17:33', 3, 1, 1),
(36, 'SalaMultidisciplinar3', '2019-12-10', '17:00', '2019-12-10', '18:00', 3, 1, 1),
(37, 'SalaMultidisciplinar3', '2019-12-10', '21:00', '2019-12-10', '22:00', 3, 1, 1),
(38, 'SalaMultidisciplinar3', '2020-01-15', '17:00', '2020-01-15', '18:00', 3, 1, 1),
(39, 'Movil1', '2019-12-10', '19:00', '2019-12-10', '20:00', 17, 1, 1),
(40, 'Movil2', '2019-12-10', '21:00', '2019-12-10', '22:00', 18, 1, 1),
(45, 'Proyector2', '2019-12-17', '15:53', '2019-12-17', '15:53', 13, 5, 1),
(46, 'SalaMultidisciplinar3', '2019-12-10', '18:00', '2019-12-10', '19:00', 3, 2, 1),
(47, 'SalaMultidisciplinar4', '2019-12-17', '15:53', '2019-12-17', '15:53', 4, 2, 1),
(48, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 1, 1),
(49, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 1, 1),
(50, 'SalaMultidisciplinar2', '2019-12-13', '18:22', '2019-12-13', '18:22', 2, 5, 1),
(53, 'SalaMultidisciplinar1', '2019-12-17', '15:53', '2019-12-17', '15:53', 1, 1, 1),
(54, 'Proyector2', '2019-12-17', '15:53', '2019-12-17', '15:53', 13, 4, 1),
(55, 'SalaMultidisciplinar1', '2019-12-19', '15:00', '2019-12-19', '16:00', 1, 1, 0),
(56, 'SalaDeReuniones', '2020-01-17', '19:00', '2020-01-17', '20:00', 11, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_Personal` int(1) NOT NULL,
  `usuario_Personal` varchar(20) NOT NULL,
  `contrasena_Personal` varchar(250) NOT NULL,
  `nombre_Personal` varchar(25) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `tipo_user` int(1) DEFAULT NULL,
  `logo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_Personal`, `usuario_Personal`, `contrasena_Personal`, `nombre_Personal`, `estado`, `tipo_user`, `logo`) VALUES
(1, 'superusuario', '2e6862d634f970e7970460d7bbd10529', 'Servicios Informaticos', 0, 0, 'admin.png'),
(2, 'juanma', '6b45be7910410293e64def2272ff6cd7', 'Juan Manuel', 0, 1, 'juanma.PNG'),
(3, 'carlos', '9ad48828b0955513f7cf0f7f6510c8f8', 'Carlos Munoz', 0, 1, 'carlos.png'),
(4, 'dani', '8fc828b696ba1cd92eab8d0a6ffb17d6', 'Daniel Sanchez', 1, 1, 'dani.png'),
(5, 'jose', '90e528618534d005b1a7e7b7a367813f', 'Jose Antonio', 0, 1, 'jose.png'),
(6, 'test', '202cb962ac59075b964b07152d234b70', 'testDanny', 1, 1, 'none.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_recursos`
--

CREATE TABLE `tipo_recursos` (
  `id_Recursos` int(2) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_recursos`
--

INSERT INTO `tipo_recursos` (`id_Recursos`, `tipo`) VALUES
(1, 'Sala'),
(2, 'Proyector'),
(3, 'Moviles'),
(4, 'Portatiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_tipo` int(2) NOT NULL,
  `nombre_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id_tipo`, `nombre_tipo`) VALUES
(0, 'Admin'),
(1, 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado_user`
--
ALTER TABLE `estado_user`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_Incidencia`),
  ADD KEY `objeto_Incidencia` (`objeto_Incidencia`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_Inventario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_Pedidos`),
  ADD KEY `pedidos_iebfk_1` (`inventario_Pedidos`),
  ADD KEY `pedidos_ibefk_2` (`personal_Pedidos`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_Personal`),
  ADD KEY `personal_iebfk_1` (`estado`),
  ADD KEY `personal_ibefk_2` (`tipo_user`);

--
-- Indices de la tabla `tipo_recursos`
--
ALTER TABLE `tipo_recursos`
  ADD PRIMARY KEY (`id_Recursos`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_user`
--
ALTER TABLE `estado_user`
  MODIFY `id_estado` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_Incidencia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_Inventario` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_Pedidos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_Personal` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_recursos`
--
ALTER TABLE `tipo_recursos`
  MODIFY `id_Recursos` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `id_tipo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`objeto_Incidencia`) REFERENCES `inventario` (`id_Inventario`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibefk_2` FOREIGN KEY (`personal_Pedidos`) REFERENCES `personal` (`id_Personal`),
  ADD CONSTRAINT `pedidos_iebfk_1` FOREIGN KEY (`inventario_Pedidos`) REFERENCES `inventario` (`id_Inventario`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibefk_2` FOREIGN KEY (`tipo_user`) REFERENCES `tipo_user` (`id_tipo`),
  ADD CONSTRAINT `personal_iebfk_1` FOREIGN KEY (`estado`) REFERENCES `estado_user` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
