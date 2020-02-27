-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-02-2020 a las 00:11:38
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id12722771_mercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `idUsuario` int(11) NOT NULL,
  `idPuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`idUsuario`, `idPuesto`) VALUES
(3, 20),
(3, 25),
(3, 26),
(6, 21),
(6, 23),
(7, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idPuesto` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `telefono` int(9) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `infoPuesto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `nombre`, `telefono`, `foto`, `idUsuario`, `infoPuesto`) VALUES
(20, 'Frutería Frambuesa', 661121633, 'fruteria2.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(21, 'Pescadería Navas', 661121633, 'pescaderia.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(22, 'Carnicería Pedrol', 615422789, 'carniceria.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(23, 'Frutería Corona', 661121633, 'fruteria3.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(24, 'Carnicería Luz', 661121633, 'carniceria2.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(25, 'Pescadería win', 654789123, 'panaderia3.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(26, 'Iluminación', 661121633, 'iluminacion.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(27, 'Cash', 456123789, 'cash.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(34) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `apiKey` varchar(32) DEFAULT NULL,
  `solicitaVendedor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `email`, `password`, `idTipo`, `telefono`, `foto`, `apiKey`, `solicitaVendedor`) VALUES
(3, 'Cyntia', 'García', 'cyntigr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 661121633, 'tio.jpg', 'buenasPuedeProbarLaApi', 0),
(4, 'Alexander', 'Quesada López', 'alexql91@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 610040371, 'tio.jpg', 'ComoEstasHoyKey', 0),
(6, 'vera', 'quesada garcia', 'vera@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 661121633, 'tio.jpg', 'beirWtGgASjJdY2mT3q9nHV4Ol7PQLyU', 0),
(7, 'noah', 'quesada', 'noah@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 661121633, 'tio.jpg', 'lsraYAX7fE3WDeqcZLS0uVIzby9N6xBH', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idUsuario`,`idPuesto`),
  ADD KEY `favorito_ibfk_2` (`idPuesto`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuesto`),
  ADD KEY `usuarioPuesto` (`idUsuario`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipo_user` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idPuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `usuarioPuesto` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_puesto` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `tipo_user` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_usuario` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
