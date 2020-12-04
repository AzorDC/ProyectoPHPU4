-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2020 a las 01:24:58
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tododb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `com_id` int(9) NOT NULL,
  `fk_prod_id` int(9) DEFAULT NULL,
  `fk_us_id` int(9) DEFAULT NULL,
  `com_fecha` date NOT NULL,
  `com_tipopago` varchar(30) NOT NULL,
  `com_cantidad` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`com_id`, `fk_prod_id`, `fk_us_id`, `com_fecha`, `com_tipopago`, `com_cantidad`) VALUES
(1, 1, 22, '2020-12-02', 'tarjeta', 2),
(2, 2, 22, '2020-12-02', 'tarjeta', 2),
(3, 3, 22, '2020-12-02', 'tarjeta', 2),
(4, 4, 22, '2020-12-02', 'tarjeta', 2),
(5, 4, 22, '2020-12-02', 'paypal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` int(9) NOT NULL,
  `prod_nombre` varchar(255) NOT NULL,
  `prod_precio` mediumint(9) NOT NULL,
  `prod_stock` tinyint(3) NOT NULL,
  `prod_tiempo` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_nombre`, `prod_precio`, `prod_stock`, `prod_tiempo`) VALUES
(1, 'Edicion en HD', 200, 9, 10),
(2, 'Imagen Animada', 500, 1, 10),
(3, 'Imagen con Filtro o Editada', 350, 0, 10),
(4, 'Imgen Comica Sin Sentido', 300, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `us_id` int(9) NOT NULL,
  `us_nombre` varchar(255) DEFAULT NULL,
  `us_pass` varchar(255) NOT NULL,
  `us_correo` varchar(255) NOT NULL,
  `us_tarjeta` varchar(255) DEFAULT NULL,
  `us_tipous` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_nombre`, `us_pass`, `us_correo`, `us_tarjeta`, `us_tipous`) VALUES
(10, 'adal', 'ramones', 'adal', 'QWE123', b'1'),
(11, 'yukki', 'terumi', 'zoneo', 'feo', b'0'),
(12, 'lic', 'pugberto', 'qqqq', 'ssdada', b'1'),
(15, 'w', 'w', 'w', 'w', b'1'),
(21, 'ee', 'ee', 'ee', 'ee', b'0'),
(22, 'qqw', 'qqw', 'qqw', 'qqw', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_prod_id` (`fk_prod_id`),
  ADD KEY `fk_us_id` (`fk_us_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `com_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `us_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`fk_prod_id`) REFERENCES `productos` (`prod_id`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`fk_us_id`) REFERENCES `usuario` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
