-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2022 a las 23:45:19
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id_coche` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `tipo` text NOT NULL,
  `anio` year(4) NOT NULL,
  `motor` int(11) NOT NULL,
  `anuncio` text NOT NULL,
  `titulo_anuncoche` varchar(30) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id_coche`, `marca`, `tipo`, `anio`, `motor`, `anuncio`, `titulo_anuncoche`, `autor`, `fk_id_usuario`, `imagen`, `precio`, `km`) VALUES
(1, 'kia', 'turismo', 2000, 210, 'coche en perfecto estado con muy pocos km, está practicamente nuevo, mejor ver', 'vendo coche', 'sarafernandeztorralbo@gmail.com', 1, 'coche1.jpg', 0, 0),
(2, 'seat', 'berlina', 1990, 95, 'buen estado mejor preguntar', 'vendo citroen', 'sarafernandeztorralbo@gmail.com', 1, 'coche2.jpg', 0, 0),
(3, 'kia', 'monovolumen', 2000, 75, 'bonito coche con poco uso', 'coche fantastico', 'sarafernandeztorralbo@gmail.com', 1, 'coche3.jpg', 0, 0),
(4, 'ford', 'deportivo', 2005, 200, 'ford focus con poco uso', 'se vende ford', 'sarafernandeztorralbo@gmail.com', 1, 'coche4.jpg', 0, 0),
(5, 'lexus', 'berlina', 2015, 200, 'coche seminuevo con buenas prestaciones', 'vendo lexus', 'sarafernandeztorralbo@gmail.com', 1, 'coche5.jpg', 0, 0),
(6, 'citroen', 'coupe', 2014, 115, 'se vendo coche con itv recien pasada', 'coche seminuevo', 'sarafernandeztorralbo@gmail.com', 1, 'coche6.jpg', 0, 0),
(7, 'fiat', 'berlina', 2018, 110, 'coche casi nuevo', 'vendo coche con poco uso', 'sarafernandeztorralbo@gmail.com', 1, 'coche7.jpg', 0, 0),
(12, 'mercedes', 'deportivo', 1990, 200, 'coche practicamente nuevo con muy pocos kilometros', 'vendo coche nuevo', 'sftorralbo@gmail.com', 2, 'car-ge12eebff3_640.jpg', 0, 0),
(17, 'Merc', '', 0000, 0, 'Mercedes en perfecto estado, practicamente nuevo', 'vendo coche seminuevo', 'mariagodoy@hotmail.com', 6, 'coche16.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `destinatario` varchar(100) NOT NULL,
  `titulo` text NOT NULL,
  `cuerpo` text NOT NULL,
  `id_mensaje` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `remitente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`destinatario`, `titulo`, `cuerpo`, `id_mensaje`, `fk_id`, `remitente`) VALUES
('sarafernandeztorralbo@gmail.com', 'coche', 'interesado en coche', 1, 1, ''),
('sarafernandeztorralbo@gmail.com', 'coche', 'interes', 2, 1, ''),
('sarafernandeztorralbo@gmail.com', 'me interesa el coche', 'mi numero es 60000000', 3, 1, ''),
('sarafernandeztorralbo@gmail.com', 'coche', 'interesada', 4, 1, ''),
('sarafernandeztorralbo@gmail.com', 'hola', 'interes en coche', 5, 1, 'sarafernandez@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'hola', 'estoy interesado en el coche', 6, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'hola', 'estoy interesado en el coche', 7, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'hola', 'estoy interesado en el coche', 8, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'hola', 'estoy interesada en el anuncio', 9, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'coche', 'estoy interesado en el coche', 10, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'interes en coche', 'buenas tardes', 11, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'coche seat', 'estoy interesado en el coche', 12, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'coche venta', 'hola, me interesa el coche', 13, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'compra coche', 'buenas tardes, me gustarria ver el coche', 14, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'me interesa', 'me interesa el coche del anuncio. te dejo mi contacto. whatsaap:66666666', 15, 1, 'sftorralbo@gmail.com'),
('sarafernandeztorralbo@gmail.com', 'hola', 'interesado en coche', 16, 1, 'carruchera@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_pieza` int(11) NOT NULL,
  `fk_id_autor` int(11) NOT NULL,
  `anio_repuesto` year(4) NOT NULL,
  `estado_repuesto` varchar(50) NOT NULL,
  `marca_repuesto` varchar(30) NOT NULL,
  `descrip_repuesto` varchar(100) NOT NULL,
  `titulo_anunpieza` varchar(30) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_pieza`, `fk_id_autor`, `anio_repuesto`, `estado_repuesto`, `marca_repuesto`, `descrip_repuesto`, `titulo_anunpieza`, `autor`, `imagen`, `precio`) VALUES
(1, 1, 1996, 'bueno', 'opel', 'vendo llanta de coche antiguo, se puede ver sin compromiso', 'pieza nueva', 'sarafernandeztorralbo@gmail.com', 'pieza1.jpg', 60),
(2, 1, 2000, 'regular', 'opel', 'vendo motor de coche de opel vectra, se puede ver sin compromiso', 'se vende pieza nueva', 'sarafernandeztorralbo@gmail.com', 'pieza2.jpg', 900),
(3, 1, 2020, 'bueno', 'bmw', 'se vende volante practicamente nuevo, mejor ver. Atiendo whatsapp 666666666', 'volante casi nuevo', 'sarafernandeztorralbo@gmail.com', 'pieza3.jpg', 500),
(4, 1, 2010, 'regular', 'kia', 'Se vende tuvo de escape de coche Kia. Se puede ver sin compromiso', 'tubo escape', 'sarafernandeztorralbo@gmail.com', 'pieza4.jpg', 1200),
(5, 1, 2010, 'regular', 'fiat', 'motor de fiat 500, funciona correctamente, solo tiene algún rasguño por fuera', 'se vende motor', 'sarafernandeztorralbo@gmail.com', 'pieza5.jpg', 2000),
(6, 1, 2021, 'bueno', 'citroen', 'se vende kit de pedales (embrague, freno y acelerador) para coche, están nuevos', 'kit pedales coche', 'sarafernandeztorralbo@gmail.com', 'pieza6.jpg', 3000),
(7, 1, 2016, 'bueno', 'peugeot', 'sew vende caja de cambios en perfecto estado, es de un peugeot', 'caja de cambios', 'sarafernandeztorralbo@gmail.com', 'pieza7.jpg', 1500),
(12, 1, 2020, 'bueno', 'michelin', 'se venden ruedas seminuevas en perfecto estado', 'vendo ruedas', 'sarafernandeztorralbo@gmail.com		', 'pieza12.jpg', 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `contrasena`, `apellido`, `email`, `nombre`, `telefono`, `tipo_usuario`) VALUES
(1, '1234', 'fernandez', 'sarafernandeztorralbo@gmail.com', 'sara', 602410115, 'vendedor'),
(2, '1234', 'lopez', 'sftorralbo@gmail.com', 'javi', 602410115, 'vendedor'),
(3, '1234', 'perez', 'sft@gmail.com', 'ursula', 602415114, 'ambos'),
(4, '1234', 'caballero', 'caballero@gmail.com', 'jose', 658585658, 'comprador'),
(5, '1234', 'Garcia', 'juangarcia@gmail.com', 'Juan', 666888555, 'comprador'),
(6, '1234', 'Godoy', 'mariagodoy@hotmail.com', 'Maria', 777666555, 'ambos'),
(7, '1234', 'Lopez', 'carruchera@gmail.com', 'Juan', 666555444, 'comprador'),
(8, '1234', 'Alferez', 'juanaalferez@gmail.com', 'Juana', 666999333, 'comprador'),
(9, '1234', 'martinez', 'antoniomartinez@gmail.com', 'antonio', 666999888, 'ambos'),
(10, '1234', 'fernandez', 'jose.fernandez@gmail.com', 'jose', 666888777, 'comprador'),
(11, '1234', 'torralbo', 'josefa.torralbo@gmail.com', 'josefa', 666999888, 'vendedor'),
(12, '1234', 'hernandez', 'maria.hernandez@gmail.com', 'maria', 777888999, 'comprador'),
(13, '1234', 'Gutierrez', 'paola@gmail.com', 'Paola', 666333222, 'comprador'),
(14, '1234', 'bosco', 'bosco@gmail.com', 'julian', 666777555, 'ambos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id_coche`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `fk_id` (`fk_id`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_pieza`),
  ADD KEY `fk_id_autor` (`fk_id_autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id_coche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id_pieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`fk_id`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`fk_id_autor`) REFERENCES `usuarios` (`id_usuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
