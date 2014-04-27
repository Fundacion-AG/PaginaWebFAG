-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2014 a las 20:19:08
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestos`
--
CREATE DATABASE IF NOT EXISTS `gestos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gestos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'adminamigosdelgesto', '$2y$10$4y3WAiwlJDOj9EW93uzj..MmJllbqpvNGkuyBOszk0Y/BC7e2tram');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `url_imagen` text NOT NULL,
  `url_video` text NOT NULL,
  `id_categoria_padre` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `url_imagen`, `url_video`, `id_categoria_padre`, `status`) VALUES
(30, 'Números', '../resources/categories/Numeros/numeros.jpg', '../resources/categories/Numeros/video1.webm', 0, 1),
(32, 'Abecedario', '../resources/categories/Abecedario/abecedario.jpg', '../resources/categories/Abecedario/CuentaNomina.webm', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplo`
--

CREATE TABLE IF NOT EXISTS `ejemplo` (
  `id_ejemplo` int(11) NOT NULL AUTO_INCREMENT,
  `id_gesto` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `url_imagen` text NOT NULL,
  PRIMARY KEY (`id_ejemplo`),
  KEY `fk_ejemplo_gesto_idx` (`id_gesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `ejemplo`
--

INSERT INTO `ejemplo` (`id_ejemplo`, `id_gesto`, `titulo`, `url_imagen`) VALUES
(1, 10, 'Uno', '../resources/gestures/1-Uno/examples/139653252718011.png'),
(2, 11, 'Dos', '../resources/gestures/2-Dos/examples/139653259072582.png'),
(3, 12, 'Tres', '../resources/gestures/3-Tres/examples/139653263743643.png'),
(4, 13, 'Cuatro', '../resources/gestures/4-Cuatro/examples/139653267381654.png'),
(5, 14, 'Cinco', '../resources/gestures/5-Cinco/examples/139653269145355.png'),
(6, 15, 'Seis', '../resources/gestures/6-Seis/examples/139653271134676.png'),
(7, 16, 'Siete', '../resources/gestures/7-Siete/examples/139653274479767.png'),
(8, 17, 'Ocho', '../resources/gestures/8-Ocho/examples/139653276564188.png'),
(9, 18, 'Nueve', '../resources/gestures/9-Nueve/examples/139653278563399.png'),
(10, 10, 'Uno', '../resources/gestures/1-Uno/examples/139653461012031.jpg'),
(11, 11, 'Dos', '../resources/gestures/2-Dos/examples/13965347626812.jpg'),
(12, 12, 'Tres', '../resources/gestures/3-Tres/examples/139653487571653.jpg'),
(13, 13, 'Cuatro', '../resources/gestures/4-Cuatro/examples/139653494358244.jpg'),
(14, 14, 'Cinco', '../resources/gestures/5-Cinco/examples/139653507991415.jpg'),
(15, 15, 'Seis', '../resources/gestures/6-Seis/examples/13965351817046.jpg'),
(16, 16, 'Siete', '../resources/gestures/7-Siete/examples/139653524974297.jpg'),
(17, 17, 'Ocho', '../resources/gestures/8-Ocho/examples/139653530612318.jpg'),
(18, 18, 'Nueve', '../resources/gestures/9-Nueve/examples/139653536594359.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gesto`
--

CREATE TABLE IF NOT EXISTS `gesto` (
  `id_gesto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `definicion` text,
  `url_video` text NOT NULL,
  `url_imagen` text NOT NULL,
  PRIMARY KEY (`id_gesto`),
  KEY `fk_gest_categoria_idx` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `gesto`
--

INSERT INTO `gesto` (`id_gesto`, `id_categoria`, `titulo`, `definicion`, `url_video`, `url_imagen`) VALUES
(10, 30, '1 - Uno', 'Uno', '../resources/gestures/1-Uno/1.mp4', '../resources/gestures/1-Uno/1.jpg'),
(11, 30, '2 - Dos', 'Dos', '../resources/gestures/2-Dos/2.mp4', '../resources/gestures/2-Dos/2.jpg'),
(12, 30, '3 - Tres', 'Tres', '../resources/gestures/3-Tres/3.mp4', '../resources/gestures/3-Tres/3.jpg'),
(13, 30, '4 - Cuatro', 'Cuatro', '../resources/gestures/4-Cuatro/4.mp4', '../resources/gestures/4-Cuatro/4.jpg'),
(14, 30, '5 - Cinco', 'Cinco', '../resources/gestures/5-Cinco/5.mp4', '../resources/gestures/5-Cinco/5.jpg'),
(15, 30, '6 - Seis', 'Seis', '../resources/gestures/6-Seis/6.mp4', '../resources/gestures/6-Seis/6.jpg'),
(16, 30, '7 - Siete', 'Siete', '../resources/gestures/7-Siete/7.mp4', '../resources/gestures/7-Siete/7.jpg'),
(17, 30, '8 - Ocho', 'Ocho', '../resources/gestures/8-Ocho/8.mp4', '../resources/gestures/8-Ocho/8.jpg'),
(18, 30, '9 - Nueve', 'Nueve', '../resources/gestures/9-Nueve/9.mp4', '../resources/gestures/9-Nueve/9.jpg'),
(20, 32, 'B', 'Segunda letra del abecedario español y del orden latino internacional, que representa un fonema consonántico labial y sonoro. Su nombre es be, be alta o be larga.', '../resources/gestures/B/B.mp4', '../resources/gestures/B/b.jpg'),
(22, 32, 'D', 'Quinta letra del abecedario español, y cuarta del orden latino internacional, que representa un fonema consonántico dental y sonoro. Su nombre es de.', '../resources/gestures/D/D.mp4', '../resources/gestures/D/d.jpg'),
(23, 32, 'C', 'Tercera letra del abecedario español y del orden latino internacional, que representa, ante las vocales e, i, un fonema consonántico fricativo, interdental, sordo, identificado con el alveolar o dental en zonas de seseo, y en los demás casos un fonema oclusivo, velar y sordo. Su nombre es ce.', '../resources/gestures/C/C.mp4', '../resources/gestures/C/c.jpg'),
(24, 32, 'E', 'Sexta letra del abecedario español, y quinta del orden latino internacional, que representa un fonema vocálico medio y palatal.', '../resources/gestures/E/E.mp4', '../resources/gestures/E/e.jpg'),
(25, 32, 'F', 'Séptima letra del abecedario español, y sexta del orden latino internacional, que representa un fonema consonántico fricativo, labiodental, sordo. Su nombre es efe.', '../resources/gestures/F/F.mp4', '../resources/gestures/F/f.jpg'),
(26, 32, 'G', 'Octava letra del abecedario español, y séptima del orden latino internacional, que representa, ante las vocales e, i, un fonema consonántico fricativo velar y sordo, y en los demás casos un fonema consonántico velar y sonoro.', '../resources/gestures/G/G.mp4', '../resources/gestures/G/g.jpg'),
(27, 32, 'H', 'Novena letra del abecedario español, y octava del orden latino internacional. Su nombre es hache. En la lengua general no representa sonido alguno. Suele aspirarse en la dicción de algunas zonas españolas y americanas y en determinadas voces de origen extranjero.', '../resources/gestures/H/H.mp4', '../resources/gestures/H/h.jpg'),
(28, 32, 'I', 'Décima letra del abecedario español, y novena del orden latino internacional, que representa un sonido vocálico cerrado y palatal.', '../resources/gestures/I/I.mp4', '../resources/gestures/I/i.jpg'),
(29, 32, 'J', 'Undécima letra del abecedario español, y décima del orden latino internacional, que representa un fonema consonántico de articulación fricativa, velar y sorda. Su nombre es jota. La mayor o menor tensión con que se articula en diferentes países y regiones produce variedades que van desde la vibrante a la simple aspiración.', '../resources/gestures/J/J.mp4', '../resources/gestures/J/j.jpg'),
(30, 32, 'K', 'Duodécima letra del abecedario español, y undécima del orden latino internacional, que representa un fonema consonántico oclusivo, velar y sordo. Su nombre es ka.', '../resources/gestures/K/K.mp4', '../resources/gestures/K/k.jpg'),
(31, 32, 'A', 'Primera letra del abecedario español y del orden latino internacional, que representa un fonema vocálico abierto y central.', '../resources/gestures/A/A.mp4', '../resources/gestures/A/a.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplo`
--
ALTER TABLE `ejemplo`
  ADD CONSTRAINT `fk_ejemplo_gesto` FOREIGN KEY (`id_gesto`) REFERENCES `gesto` (`id_gesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gesto`
--
ALTER TABLE `gesto`
  ADD CONSTRAINT `fk_gest_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
