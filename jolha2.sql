-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 07:02:53
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jolha2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cenotes`
--

CREATE TABLE `cenotes` (
  `idCenote` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `nombreCenote` varchar(45) NOT NULL,
  `latitud` varchar(45) NOT NULL,
  `longitud` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  `concentracion` varchar(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombreHidro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cenotes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomhidro`
--

CREATE TABLE `nomhidro` (
  `idNomHidro` int(11) NOT NULL,
  `nombreHidro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nomhidro`
--

INSERT INTO `nomhidro` (`idNomHidro`, `nombreHidro`) VALUES
(1, 'opcion1'),
(2, 'opcion2'),
(3, 'opcion3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocenote`
--

CREATE TABLE `tipocenote` (
  `idTipo` int(11) NOT NULL,
  `tipoNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipocenote`
--

INSERT INTO `tipocenote` (`idTipo`, `tipoNombre`) VALUES
(1, 'Hidrocarburo'),
(2, 'Coliformes F'),
(3, 'Coliformes T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `correo`, `pass`) VALUES
(1, 'bryan@gmail.com', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cenotes`
--
ALTER TABLE `cenotes`
  ADD PRIMARY KEY (`idCenote`),
  ADD KEY `fk_usuario_idx` (`user`),
  ADD KEY `fk_tipoCenote_idx` (`tipo`),
  ADD KEY `fk_nombreHidro_idx` (`nombreHidro`);

--
-- Indices de la tabla `nomhidro`
--
ALTER TABLE `nomhidro`
  ADD PRIMARY KEY (`idNomHidro`);

--
-- Indices de la tabla `tipocenote`
--
ALTER TABLE `tipocenote`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cenotes`
--
ALTER TABLE `cenotes`
  MODIFY `idCenote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `nomhidro`
--
ALTER TABLE `nomhidro`
  MODIFY `idNomHidro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipocenote`
--
ALTER TABLE `tipocenote`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cenotes`
--
ALTER TABLE `cenotes`
  ADD CONSTRAINT `fk_nombreHidro` FOREIGN KEY (`nombreHidro`) REFERENCES `nomhidro` (`idNomHidro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipoCenote` FOREIGN KEY (`tipo`) REFERENCES `tipocenote` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`user`) REFERENCES `users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
