-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2015 a las 14:00:16
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `javier`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE IF NOT EXISTS `coche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`id`, `marca`, `modelo`, `color`) VALUES
(3, 'peugeot', '407', 'blanco'),
(5, 'ford', 'focus', 'gris'),
(7, 'seat', 'ibiza', 'rojo'),
(10, 'opel', 'insignia', 'azul'),
(11, 'fiat', 'panda', 'verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapa`
--

CREATE TABLE IF NOT EXISTS `mapa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_x` double NOT NULL,
  `pos_y` double NOT NULL,
  `infowindow` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `mapa`
--

INSERT INTO `mapa` (`id`, `pos_x`, `pos_y`, `infowindow`) VALUES
(1, -3.7305078506469727, 40.355308532714844, 'Primer marker con infowindow con la librería de googlemaps para codeigniter.'),
(2, -1.7305078506469727, 42.355308532714844, 'Segundo marker con infowindow con la librería de googlemaps para codeigniter.'),
(3, -1.7305078506469727, 38.355308532714844, 'Tercer marker con infowindow con la librería de googlemaps para codeigniter.'),
(4, -6.630507946014404, 42.2053108215332, 'Cuarto marker con infowindow con la librería de googlemaps para codeigniter.'),
(5, -3.970507860183716, 41.355308532714844, 'Quinto marker con infowindow con la librería de googlemaps para codeigniter.'),
(6, -6.850507736206055, 38.52531051635742, 'Sexto marker con infowindow con la librería de googlemaps para codeigniter.'),
(7, -2.8505077362060547, 36.86531066894531, 'Séptimo marker con infowindow con la librería de googlemaps para codeigniter.'),
(8, -0.9405078291893005, 40.405311584472656, 'Octavo marker con infowindow con la librería de googlemaps para codeigniter.'),
(9, -0.9405078291893005, 41.58530807495117, 'Noveno marker con infowindow con la librería de googlemaps para codeigniter.'),
(10, 1.9505077600479126, 41.76530838012695, 'Décimo marker con infowindow con la librería de googlemaps para codeigniter.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `nombre` varchar(255) DEFAULT NULL COMMENT 'nombre',
  `continente` varchar(255) DEFAULT NULL COMMENT 'continente',
  `id_coche` int(11) NOT NULL COMMENT 'id coche',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `continente`, `id_coche`) VALUES
(1, 'españa', 'europa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE IF NOT EXISTS `sesion` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0dbf38e3f2b6e57eeb44182092871ae1', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.94 Safari/537.36', 1423137919, 'a:3:{s:9:"user_data";s:0:"";s:7:"usuario";s:3:"jas";s:4:"pass";s:3:"jas";}'),
('31994d2a7f04bee140aae893c2b48fa3', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; ASJB; rv:11.0) like Gecko', 1423126388, 'a:3:{s:9:"user_data";s:0:"";s:7:"usuario";s:3:"jas";s:4:"pass";s:3:"jas";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descripción',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre de usuario',
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Contraseña',
  `ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ciudad',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email',
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre',
  `apellido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` enum('0','1','2') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '0=Inactivo, 1=activo, 2=bloqueado',
  `nivel` enum('registrado','administrador') COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Avatar',
  `fecha_creacion` datetime DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL COMMENT 'codigo verificacion',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `password`, `ciudad`, `email`, `nombre`, `apellido`, `estado`, `nivel`, `foto`, `fecha_creacion`, `codigo`) VALUES
(1, 'pepe', 'pepe', 'Valencia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'juan', 'juan', 'Madrid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'maria', 'maria', 'Barcelona', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'antonia', 'antonia', 'Sevilla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'edu', 'edu', 'Zaragoza', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'jose', 'jose', 'Teruel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'raquel', 'raquel', 'Castellón', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'rafael', 'rafael', 'A Coruña', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'elena', 'elena', 'Bilbao', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'luis', 'luis', 'Lugo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ambrosio', 'ambrosio', 'Guadalajara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'luisa', 'luisa', 'Huelva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'rosa', 'rosa', 'Cádiz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'konami', 'konami', 'Tokio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'orange', 'orange', 'París', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'samsung', 'samsung', 'Cuenca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'gigabyte', 'gigabyte', 'Oviedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'microsoft', 'microsoft', 'Albacete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '0', '9CIvemLBZR.2dde5f606341bcbde31102ec28d0610e', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL),
(32, '0', 'agjGqmsOTj.a281286c0d3641f015976c69e1f69020', NULL, '0', '0', '0', NULL, NULL, NULL, NULL, NULL),
(64, 'sfdagf', 'adf', NULL, 'adf', 'Jashhh', 'asdf', NULL, NULL, NULL, NULL, NULL),
(65, 'dsfg', 'sdfgsdg', NULL, 'dsf', 'ahdf', 'dafas', NULL, NULL, NULL, NULL, NULL),
(66, 'cesareo', 'cesareo', NULL, 'jasda', 'cesar', 'almazero', NULL, NULL, NULL, NULL, NULL),
(67, 'asfgaf', 'afsdga', NULL, 'afgaf', 'asfgasfg', 'sfdagfsd', '', 'registrado', 'asfgasfgsfdagfsd.jpg', '2015-01-04 00:39:00', 32828),
(68, 'jas', 'jas', NULL, 'jalonso.are@gmail.com', 'jas', 'jas', '1', 'registrado', 'jasjas.jpg', '2015-01-04 12:49:03', 35333),
(88, 'jasmann', 'jasmann', NULL, 'jalonso.are@gmail.com', 'jasmann', 'jasmann', '1', 'registrado', '00-35-58-taza.jpg', '2015-01-09 20:24:50', 65893),
(89, 'Jennytal', 'jennytal', NULL, 'jas@jas.com', 'jenny', 'Moreno', '', 'registrado', 'anonimo.jpg', '2015-01-10 12:17:32', 6927),
(90, 'lol', 'lol', NULL, 'jas@jas.com', 'lol', 'loliente', '', 'registrado', '4687-Yottaa4.png', '2015-01-22 13:46:51', 83975);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
