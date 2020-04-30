-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-04-2020 a las 11:11:32
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baloncesto_arahal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_jugador_up`
--

DROP TABLE IF EXISTS `estadisticas_jugador_up`;
CREATE TABLE IF NOT EXISTS `estadisticas_jugador_up` (
  `ID_JUGADOR` int(5) NOT NULL,
  `PUNTOS_ULTIMO_PARTIDO` int(3) DEFAULT NULL,
  `MINUTOS_ULTIMO_PARTIDO` int(2) DEFAULT NULL,
  `FALTAS_ULTIMO_PARTIDO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_JUGADOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

DROP TABLE IF EXISTS `jugador`;
CREATE TABLE IF NOT EXISTS `jugador` (
  `ID_JUGADOR` int(5) NOT NULL,
  `NOMBRE` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_NAC` int(4) DEFAULT NULL,
  `NACIONALIDAD` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CODIGO_POSICION` int(3) DEFAULT NULL,
  PRIMARY KEY (`ID_JUGADOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador_posicion`
--

DROP TABLE IF EXISTS `jugador_posicion`;
CREATE TABLE IF NOT EXISTS `jugador_posicion` (
  `ID_JUGADOR` int(5) NOT NULL,
  `CODIGO_POSICION` int(3) NOT NULL,
  PRIMARY KEY (`ID_JUGADOR`,`CODIGO_POSICION`),
  KEY `FK_JUGADOR_POSICION_POSICION` (`CODIGO_POSICION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

DROP TABLE IF EXISTS `posicion`;
CREATE TABLE IF NOT EXISTS `posicion` (
  `CODIGO_POSICION` int(3) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`CODIGO_POSICION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`CODIGO_POSICION`, `NOMBRE`) VALUES
(120, 'BASE'),
(121, 'ESCOLTA'),
(122, 'ALA-PIVOT'),
(123, 'PIVOT'),
(124, 'ALERO');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas_jugador_up`
--
ALTER TABLE `estadisticas_jugador_up`
  ADD CONSTRAINT `FK_ESTADISTICAS_JUGADOR_UP_JUGADOR` FOREIGN KEY (`ID_JUGADOR`) REFERENCES `jugador` (`ID_JUGADOR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugador_posicion`
--
ALTER TABLE `jugador_posicion`
  ADD CONSTRAINT `FK_JUGADOR_POSICION_JUGADOR` FOREIGN KEY (`ID_JUGADOR`) REFERENCES `jugador` (`ID_JUGADOR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_JUGADOR_POSICION_POSICION` FOREIGN KEY (`CODIGO_POSICION`) REFERENCES `posicion` (`CODIGO_POSICION`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
