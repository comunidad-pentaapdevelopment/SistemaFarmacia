-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2017 a las 00:27:12
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `farmaciasbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacias`
--

CREATE TABLE IF NOT EXISTS `farmacias` (
`id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `latitud` decimal(20,14) NOT NULL,
  `longitud` decimal(20,14) NOT NULL,
  `estaPago` tinyint(1) NOT NULL,
  `localidad` varchar(500) NOT NULL,
  `turno` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `farmacias`
--

INSERT INTO `farmacias` (`id`, `nombre`, `direccion`, `telefono`, `latitud`, `longitud`, `estaPago`, `localidad`, `turno`) VALUES
(1, 'Farmacia San Agustín', 'Mendoza 208', '03814212357', '-26.82925200000000', '-65.19972300000000', 0, 'San Miguel de Tucuman', 0),
(2, 'Farmacia Plazoleta', 'Av. República del Líbano 989 Local 1', '03814323175', '-26.81470700000000', '-65.21499300000000', 0, 'San Miguel de Tucuman', 0),
(3, 'Farmacia Auxiliadora', 'Corrientes 64', '03814217607', '-26.82422300000000', '-65.19608400000000', 0, 'San Miguel de Tucuman', 0),
(4, 'Farmacia El León', 'Junín 291', '03814222854', '-26.82621900000000', '-65.20830200000000', 0, 'San Miguel de Tucuman', 0),
(5, 'Farmacias Del Pueblo', '25 de Mayo 313', '03814216600', '-26.82687600000000', '-65.20347400000000', 0, 'San Miguel de Tucuman', 0),
(6, 'Farmacias Del Pueblo', 'Maipú 27', '03814220439', '-26.83015300000000', '-65.20767900000000', 0, 'San Miguel de Tucuman', 0),
(7, 'Farmacia la Unión', 'San Martín 623', '03814219296', '-26.82922500000000', '-65.20628500000000', 0, 'San Miguel de Tucuman', 0),
(8, 'Farmacia del Jardin', 'Av. Salta 1305', '03814005634', '-26.81764500000000', '-65.20747300000000', 0, 'San Miguel de Tucuman', 0),
(9, 'Farmacia Hidalgo SRL', 'Av. Alem 37', ' 03814244022', '-26.82869800000000', '-65.21886000000000', 0, 'San Miguel de Tucuman', 0),
(10, 'Farmacia Ayacucho', 'Calle Batalla de Ayacucho 210', '03814307566', '-26.83285800000000', '-65.21008200000000', 0, 'San Miguel de Tucuman', 0),
(11, 'Farmacia Primavera', 'Corrientes 202', '03814216540', '-26.82364800000000', '-65.19839100000000', 0, 'San Miguel de Tucuman', 0),
(12, 'Farmacias Del Pueblo', 'Laprida 3', '03814227513', '-26.83104900000000', '-65.20320000000000', 0, 'San Miguel de Tucuman', 0),
(13, 'Farmacias Del Pueblo', 'Av. Alem 199', '03814244504', '-26.83091800000000', '-65.21942000000000', 0, 'San Miguel de Tucuman', 0),
(14, 'Farmacia San Pablo', 'San Martín 174', '03814212393', '-26.83070800000000', '-65.19960200000000', 0, 'San Miguel de Tucuman', 0),
(15, 'Farmacia San Judas Tadeo', 'Santiago del Estero 943', ' 03814309284', '-26.82262400000000', '-65.20981700000000', 0, 'San Miguel de Tucuman', 0),
(16, 'Farmacia Roca', 'Av. Gral. Roca 250', '03814202496', '-26.84387300000000', '-65.20369900000000', 0, 'San Miguel de Tucuman', 0),
(17, 'Farmacia Argentina', 'Av. Gral. Roca 663', '03814247491', '-26.84256300000000', '-65.21036100000000', 0, 'San Miguel de Tucuman', 0),
(18, 'Farmacias Del Pueblo', 'Av. Gral. Roca 830', ' 03814200472', '-26.84233300000000', '-65.21276300000000', 0, 'San Miguel de Tucuman', 0),
(19, 'San Juan farmacia', 'Santiago del Estero 1022', '03814224684', '-26.82261500000000', '-65.21112600000000', 0, 'San Miguel de Tucuman', 0),
(20, 'Farmacia San Martín', 'Calle Batalla de Ayacucho 597', '03814242074', '-26.83787900000000', '-65.21136700000000', 0, 'San Miguel de Tucuman', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidades`
--

CREATE TABLE IF NOT EXISTS `publicidades` (
`id` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `farmaciaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `farmacias`
--
ALTER TABLE `farmacias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicidades`
--
ALTER TABLE `publicidades`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `farmacias`
--
ALTER TABLE `farmacias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `publicidades`
--
ALTER TABLE `publicidades`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
