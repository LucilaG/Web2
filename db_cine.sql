-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2018 a las 16:14:18
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cine`
--

CREATE TABLE `cine` (
  `id_cine` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` int(250) NOT NULL,
  `sala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cine`
--

INSERT INTO `cine` (`id_cine`, `nombre`, `capacidad`, `sala`) VALUES
(1, 'a', 20, 1),
(2, 'a', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `director` text COLLATE utf8_spanish_ci NOT NULL,
  `rate` double(2,2) NOT NULL,
  `horarios` time NOT NULL,
  `id_cine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `pass`) VALUES
(1, 'javito', 'javito01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cine`
--
ALTER TABLE `cine`
  ADD PRIMARY KEY (`id_cine`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_cine` (`id_cine`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cine`
--
ALTER TABLE `cine`
  MODIFY `id_cine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_cine`) REFERENCES `cine` (`id_cine`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
