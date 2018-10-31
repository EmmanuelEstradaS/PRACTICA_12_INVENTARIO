-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-10-2018 a las 13:56:02
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `i2_practica_12`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registrada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `fecha_registrada`) VALUES
(3, 'Lalas', 'Todo de lala', '2018-10-28'),
(4, 'Coca-cola', 'todo lo de la empresa coca-cola', '2018-10-24'),
(5, 'pepsi', 'todo de la linea pepsi', '2018-10-25'),
(7, 'Pollos', 'carne de pollo', '2018-10-25'),
(8, 'juguitos', 'lkasng', '2018-10-30'),
(9, 'Galletas', 'Todas las galletas posibles', '2018-10-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `usuario`, `referencia`, `nota`, `fecha`, `tipo`) VALUES
(2, 4, 'osiel', '4234', 'aumento desconocido', '2018-10-25', 'AUMENTO'),
(3, 2, 'osiel', '09876', 'wlklkm', '2018-10-25', 'AUMENTO'),
(4, 5, 'osiel', '9087', 'disminucion de calis', '2018-10-25', 'DISMINUCION'),
(5, 5, 'osiel', '98765', 'sisii disminuir', '2018-10-25', 'DISMINUCION'),
(6, 5, 'osiel', '9876', 'jk,l', '2018-10-25', 'DISMINUCION'),
(7, 5, 'osiel', '09090', 'aumenar', '2018-10-25', 'AUMENTO'),
(8, 2, 'osiel', '9876', 'hgjkm', '2018-10-30', 'AUMENTO'),
(9, 2, 'osiel', '876', 'lkn', '2018-10-30', 'AUMENTO'),
(10, 2, 'osiel', '2', 'jk', '2018-10-30', 'AUMENTO'),
(11, 2, 'osiel', '8765', 'kjhg', '2018-10-30', 'AUMENTO'),
(12, 2, 'osiel', '234', 'wer', '2018-10-30', 'DISMINUCION'),
(13, 17, 'osiel', '90978', 'namas', '2018-10-30', 'AUMENTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `categoria`, `precio`, `stock`, `foto`) VALUES
(17, '097', 'bonaf', 4, 8, 33, 'views/modules/imgs/bonafont2.jpg'),
(18, '9876', 'coca 500ml', 4, 10, 25, 'views/modules/imgs/coca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `username`, `email`, `password`, `fecha_registro`) VALUES
(1, 'osiel', 'gomez', 'osiel', 'osiel@osiel.com', 'osiel', '2018-10-28'),
(4, 'abel', 'gomez salazar', 'abel', 'abel@abel.com', 'Abel', '2018-10-04'),
(5, 'elizabeth', 'aquino Aquino', 'elizabeth', 'elizabeth@elizabeth.com', 'elizabeth', '2018-10-24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
