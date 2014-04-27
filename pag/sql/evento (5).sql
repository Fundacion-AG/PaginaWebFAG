-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2014 a las 15:37:29
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `evento`
--
CREATE DATABASE IF NOT EXISTS `evento` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `evento`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idarea` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idponente` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idarea`),
  UNIQUE KEY `idarea` (`idarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `idponente`, `descripcion`) VALUES
(9, 3, 'nadador'),
(10, 3, 'inventor'),
(11, 1, 'algo'),
(12, 4, 'Ciencia Y Tegnologia'),
(13, 4, 'Matematicas'),
(14, 5, 'Fisica'),
(15, 6, 'Fisica'),
(16, 6, 'Matematicas'),
(17, 8, 'Ciencia Y Tegnologia'),
(18, 8, 'Ciencias Ambientales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistente`
--

CREATE TABLE IF NOT EXISTS `asistente` (
  `Identificacion` varchar(50) NOT NULL DEFAULT '',
  `Nombre` varchar(100) NOT NULL,
  `Profesion` varchar(100) NOT NULL,
  `TelefonoM` varchar(100) NOT NULL,
  `TelefonoF` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Residencia` varchar(100) NOT NULL,
  PRIMARY KEY (`Identificacion`),
  UNIQUE KEY `Nro.cedula_UNIQUE` (`Identificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asistente`
--

INSERT INTO `asistente` (`Identificacion`, `Nombre`, `Profesion`, `TelefonoM`, `TelefonoF`, `Email`, `Residencia`) VALUES
('11111', 'Luis Tundisi N.', 'kjbjsd', '0424-9704853', '3056297701', 'luistundisi@hotmail.com', '1232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `idbanco` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cuenta` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `titular` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cedula` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idbanco`),
  UNIQUE KEY `idbanco` (`idbanco`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`idbanco`, `nombre`, `cuenta`, `tipo`, `titular`, `cedula`) VALUES
(17, 'Bicentenario', 'Anttonieta Galarraga', 'Corriente', 'Anttonieta', '20806995'),
(19, 'caroni', '234421', 'corriente', 'daniel', '322134'),
(20, 'venezuela', '123442212', 'corriente', 'daniel', '2311234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_inscripcion`
--

CREATE TABLE IF NOT EXISTS `det_inscripcion` (
  `FechaMin` date NOT NULL DEFAULT '0000-00-00',
  `FechaMax` date NOT NULL DEFAULT '0000-00-00',
  `CuposMax` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `det_inscripcion`
--

INSERT INTO `det_inscripcion` (`FechaMin`, `FechaMax`, `CuposMax`) VALUES
('2014-01-15', '2014-04-27', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigido`
--

CREATE TABLE IF NOT EXISTS `dirigido` (
  `iddirigido` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iddirigido`),
  UNIQUE KEY `iddirigido` (`iddirigido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `dirigido`
--

INSERT INTO `dirigido` (`iddirigido`, `descripcion`) VALUES
(5, 'Cualquier Publico En General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`nombre`, `lugar`, `ciudad`, `estado`, `pais`, `precio`) VALUES
('Evento nuevo', 'SALA DE USOS MULTIPLES. UNEG-ATLANTICO, MODULO INFORMATICA', 'GUAYANA', 'BOLIVAR', 'VENEZUELA', '800 BS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventospasados`
--

CREATE TABLE IF NOT EXISTS `eventospasados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `eventospasados`
--

INSERT INTO `eventospasados` (`id`, `nombre`, `lugar`, `ciudad`, `estado`, `pais`) VALUES
(1, 'GRAN EVENTO DE ADMINISTRACION 3', 'SALA DE USOS MULTIPLES. UNEG-ATLANTICO, MODULO INFORMATICA', 'GUAYANA', 'BOLIVAR', 'VENEZUELA'),
(8, 'hhhhh', 'hhhhh', 'hhhhh', 'hhhhh', 'hhhhh'),
(9, 'ccccc', 'ccccc', 'cccccc', 'ccccc', 'ccccc'),
(10, 'fffff', 'ffffff', 'ffffff', 'fffff', 'fffff'),
(11, 'wwwwwww', 'wwwwwwww', 'wwwwwwwww', 'wwwwwwwwww', 'wwwwwwwwwww'),
(12, 'ffffffff', 'ffffffff', 'ffffffff', 'fffffffff', 'ffffffff'),
(13, 'xxxxx', 'xxxxxxx', 'xxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx'),
(14, 'vvvvvvvvvvvvv', 'vvvvvvvvvvv', 'vvvvvvvvvv', 'vvvvvvvvvv', 'vvvvvvvvvv'),
(15, 'zzzzzz', 'zzzzzzzz', 'zzzzzzzz', 'zzzzzzzzzz', 'zzzzzzzzzzz'),
(16, 'qqqqqqq', 'qqqqqqqqqqqqq', 'qqqqqqq', 'qqqqqqqqqq', 'qqqqqqqqqqq'),
(17, 'ppppp', 'pppppp', 'ppppppppp', 'pppppppppp', 'ppppppppppp'),
(18, 'EEEEEEEE', 'EEEEEEEEE', 'EEEEEEEE', 'EEEEEEE', 'EEEEEEEEEE'),
(19, 'JJJJJJJ', 'JJJJJJJJ', 'JJJJJJJJJJ', 'JJJJJJJJJJJJJ', 'JJJJJJJJJJJJJ'),
(20, 'kkkkkk', 'kkkkkkk', 'kkkkkkkkkk', 'kkkkkkkkkk', 'kkkkkkkk'),
(21, 'rrrrrrrr', 'rrrrrrr', 'rrrrrrrr', 'rrrrrrrrrr', 'rrrrrrrrrrrr'),
(22, 'ssssssss', 'ssssssss', 'sssssssss', 'ssssssss', 'ssssssss'),
(23, 'xxxxxxx', 'xxxxxxxxx', 'xxxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxx'),
(24, 'ddd', 'dddd', 'ddddddd', 'ddddddd', 'dddddddd'),
(25, 'ddd', 'dddd', 'ddddddd', 'ddddddd', 'dddddddd'),
(26, 'ddd', 'dddd', 'ddddddd', 'ddddddd', 'dddddddd'),
(27, 'ddd', 'dddd', 'ddddddd', 'ddddddd', 'dddddddd'),
(28, 'ddd', 'dddd', 'ddddddd', 'ddddddd', 'dddddddd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE IF NOT EXISTS `fecha` (
  `idfecha` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idfecha`),
  UNIQUE KEY `idfecha` (`idfecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`idfecha`, `fecha`) VALUES
(1, '2014-02-13'),
(3, '2014-02-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `idhistorial` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idevento` int(11) NOT NULL,
  `nombreevento` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `profesion` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `telefonom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefonof` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `residencia` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idhistorial`),
  UNIQUE KEY `idhistorial` (`idhistorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idhistorial`, `idevento`, `nombreevento`, `cedula`, `nombre`, `profesion`, `telefonom`, `telefonof`, `correo`, `residencia`) VALUES
(5, 0, 'ffffffff', '11111', 'juan', 'profesor', '11112', '', 'spidervalderrama_18@hotmail.com', 'puerto ordaz'),
(6, 0, 'ffffffff', '21.138.194', 'pedro', 'estudiante', '1234', '', 'pedrodisk_182_xp@hotmail.com', 'san carlos cojedes'),
(7, 0, 'ffffffff', '2222', 'juan jesus', '66666', '0424-97232', '0286-9941514', 'spidervalderrama_18@hotmail.com', 'san carlos'),
(8, 0, 'ffffffff', 'cedula1123123', 'jose', 'estudiante', '2124', '', 'josevalderrama18@gmail.com', 'san carlos'),
(9, 1, 'xxxxx', '11111', 'juan', 'profesor', '11112', '', 'spidervalderrama_18@hotmail.com', 'puerto ordaz'),
(10, 1, 'xxxxx', '21.138.194', 'pedro', 'estudiante', '1234', '', 'pedrodisk_182_xp@hotmail.com', 'san carlos cojedes'),
(11, 1, 'xxxxx', '2222', 'juan jesus', '66666', '0424-97232', '0286-9941514', 'spidervalderrama_18@hotmail.com', 'san carlos'),
(12, 1, 'xxxxx', 'cedula1123123', 'jose', 'estudiante', '2124', '', 'josevalderrama18@gmail.com', 'san carlos'),
(13, 1, 'vvvvvvvvvvvvv', '11111', 'juan', 'profesor', '11112', '', 'spidervalderrama_18@hotmail.com', 'puerto ordaz'),
(14, 1, 'vvvvvvvvvvvvv', '21.138.194', 'pedro', 'estudiante', '1234', '', 'pedrodisk_182_xp@hotmail.com', 'san carlos cojedes'),
(15, 1, 'vvvvvvvvvvvvv', '2222', 'juan jesus', '66666', '0424-97232', '0286-9941514', 'spidervalderrama_18@hotmail.com', 'san carlos'),
(16, 1, 'vvvvvvvvvvvvv', 'cedula1123123', 'jose', 'estudiante', '2124', '', 'josevalderrama18@gmail.com', 'san carlos'),
(17, 1, 'zzzzzz', '11111', 'juan', 'profesor', '11112', '', 'spidervalderrama_18@hotmail.com', 'puerto ordaz'),
(18, 1, 'zzzzzz', '21.138.194', 'pedro', 'estudiante', '1234', '', 'pedrodisk_182_xp@hotmail.com', 'san carlos cojedes'),
(19, 1, 'zzzzzz', '2222', 'juan jesus', '66666', '0424-97232', '0286-9941514', 'spidervalderrama_18@hotmail.com', 'san carlos'),
(20, 1, 'zzzzzz', 'cedula1123123', 'jose', 'estudiante', '2124', '', 'josevalderrama18@gmail.com', 'san carlos'),
(35, 1, 'JJJJJJJ', '2222', 'juan jesus', '66666', '0424-97232', '0286-9941514', 'spidervalderrama_18@hotmail.com', 'san carlos'),
(36, 1, 'JJJJJJJ', 'cedula1123123', 'jose', 'estudiante', '2124', '', 'josevalderrama18@gmail.com', 'san carlos'),
(37, 1, 'kkkkkk', '11111', 'juan', 'profesor', '11112', '', 'spidervalderrama_18@hotmail.com', 'puerto ordaz'),
(38, 1, 'kkkkkk', '21.138.194', 'pedro', 'estudiante', '1234', '', 'pedrodisk_182_xp@hotmail.com', 'san carlos cojedes'),
(39, 1, 'kkkkkk', '2222', 'juan jesus', '66666', '0424-97232', '0286-9941514', 'spidervalderrama_18@hotmail.com', 'san carlos'),
(40, 1, 'kkkkkk', 'cedula1123123', 'jose', 'estudiante', '2124', '', 'josevalderrama18@gmail.com', 'san carlos'),
(41, 1, 'rrrrrrrr', '22222222', '2222222', '222222222', '222222222', '22222222', '222222222', '2222222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `idAsistente` varchar(50) NOT NULL DEFAULT '',
  `Nro.Deposito` varchar(50) DEFAULT NULL,
  `FechaInscripcion` date DEFAULT NULL,
  `Aprobado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAsistente`),
  KEY `Asistente_idx` (`idAsistente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idAsistente`, `Nro.Deposito`, `FechaInscripcion`, `Aprobado`) VALUES
('11111', '12345', '2014-04-20', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ponente`
--

CREATE TABLE IF NOT EXISTS `ponente` (
  `idponente` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idponente`),
  UNIQUE KEY `idponente` (`idponente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `ponente`
--

INSERT INTO `ponente` (`idponente`, `nombre`, `descripcion`) VALUES
(6, 'daniel', 'palabras para ocupar bastante espacio de modo que pueda apreciar como se ve en la tabla cuando el texto es muy largo y comprobar que no se desconfigura'),
(7, 'luis', 'otra cosa pero mas cortica'),
(8, 'Yulibel Monagas', 'Ing. Informatica graduada en la uneg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `idslide` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `patrocinante` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idslide`),
  UNIQUE KEY `idslide` (`idslide`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`idslide`, `patrocinante`, `imagen`) VALUES
(1, 'slide1', '86abe8_slide.jpg'),
(2, 'slide2', 'b8fba7_slide.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `idtema` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(140) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtema`),
  UNIQUE KEY `itema` (`idtema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`idtema`, `descripcion`) VALUES
(3, 'Notas De Administracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `login` varchar(15) NOT NULL DEFAULT '',
  `pass` varchar(15) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `login`, `pass`, `email`) VALUES
('admin', 'admin', 'admin', '12345', 'luis_t43@hotmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `ci_Asistente` FOREIGN KEY (`idAsistente`) REFERENCES `asistente` (`Identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
