-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-06-2023 a las 22:56:40
-- Versión del servidor: 10.6.7-MariaDB-2ubuntu1.1
-- Versión de PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proxecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_categoria`
--

CREATE TABLE `aux_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_categoria`
--

INSERT INTO `aux_categoria` (`id_categoria`, `nombre_categoria`) VALUES
(0, 'ninguna'),
(1, 'tela'),
(2, 'lana'),
(3, 'lazos'),
(5, 'hilo'),
(6, 'ganchillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_estado_pedido`
--

CREATE TABLE `aux_estado_pedido` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_estado_pedido`
--

INSERT INTO `aux_estado_pedido` (`id_estado`, `nombre_estado`) VALUES
(1, 'entregado'),
(2, 'devuelto'),
(3, 'enviado'),
(4, 'aceptado'),
(5, 'denegado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_estado_usuario`
--

CREATE TABLE `aux_estado_usuario` (
  `id_estado` int(10) NOT NULL,
  `nombre_estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_estado_usuario`
--

INSERT INTO `aux_estado_usuario` (`id_estado`, `nombre_estado`) VALUES
(1, 'activo'),
(2, 'baneado'),
(3, 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_marca`
--

CREATE TABLE `aux_marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_marca`
--

INSERT INTO `aux_marca` (`id_marca`, `nombre_marca`) VALUES
(0, 'ninguna'),
(1, 'katia'),
(2, 'hooked');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_precio`
--

CREATE TABLE `aux_precio` (
  `id` int(10) NOT NULL,
  `formato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_precio`
--

INSERT INTO `aux_precio` (`id`, `formato`) VALUES
(1, 'unidad'),
(2, 'metro'),
(3, 'kilogramo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aux_rol`
--

CREATE TABLE `aux_rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aux_rol`
--

INSERT INTO `aux_rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Reponedor'),
(3, 'Auditor'),
(4, 'Soporte'),
(5, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pedido`
--

CREATE TABLE `historial_pedido` (
  `id_pedido` int(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_ventas`
--

CREATE TABLE `historial_ventas` (
  `id` int(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_pedido` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL DEFAULT '',
  `precio` decimal(10,2) NOT NULL,
  `descuento` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_marca` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL DEFAULT 0,
  `id_tipo_precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `stock`, `id_marca`, `id_categoria`, `id_tipo_precio`) VALUES
(1, 'HOOOKED RIBBON XL', 'Hoooked Ribbon XL es un trapillo muy ligero de gran calidad, compuesto por fibras recicladas de algodón. Es perfecto para trabajar bonitas labores a la vez que cuidas el medio ambiente. Realiza proyectos como accesorios para decorar el hogar y más.', '9.95', 0, 0, 2, 2, 1),
(2, 'KATIA MENFIS COLOR\r\n', 'Menfis Color es un hilo multicolor, muy suave y cómodo, perfecto para tejer prendas de la temporada primavera/verano. Su diseño jaspeado le dará un toque especial a todas tus prendas. Está compuesto por fibras 100% algodón y es ideal para tejer jerséis finos, vestidos de tirantes, rebecas coloridas, tops de ganchillo, etc.', '7.10', 0, 33, 1, 2, 1),
(3, 'TELA DE ALGODÓN MEZFABRICS - BLOSSOM NIGHT', 'La tela MezFabrics - Blossom Night ha sido diseñada por Dee Hardwicke. Se compone de 100% algodón, por lo que es de tipo hipoalergénica. Realiza prendas y accesorios para toda la familia, incluidos los más pequeños. ¡Da rienda suelta a tu imaginación!', '16.95', 0, 22, 0, 1, 2),
(9, 'KATIA CANADA', 'Katia Canada es una lana gruesa perfecta para tejer con agujas de 7 - 8 mm, de la gama de las lanas básicas de Katia que te ofrece una multitud de colores entre los que elegir.', '3.30', 0, 44, 1, 2, 1),
(10, 'GANCHILLOS DE COLORES KATIA 12 mm', 'Ganchillos de colores Katia, son unas agujas de ganchillo en aluminio con mango siliconado, fabricadas por KnitPro para lanas Katia. Desde 7 mm hasta 12 mm.', '5.70', 0, 333, 1, 6, 1),
(11, 'KIT DE GANCHILLO AMIGURUMI PINGÜINO COCO - HOOOKED', 'El kit de ganchillo Pingüino Coco de Hoooked contiene todo lo que necesitas para tejer a ganchillo un adorable amigurumi con forma de pingüino. Dentro de la cajita encontrarás el hilo, el ganchillo y las instrucciones en varios idiomas. ¡Te resultará muy fácil de realizar!&#13;&#10;&#13;&#10;Instrucciones disponibles en español y otros idiomas.', '9.99', 0, 12, 2, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `ultima_sesion` datetime NOT NULL DEFAULT current_timestamp(),
  `id_estado` int(11) DEFAULT NULL,
  `creacion` datetime DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `email`, `pass`, `nombre`, `apellido`, `ultima_sesion`, `id_estado`, `creacion`, `telefono`, `direccion`) VALUES
(1, 1, 'admin@calceta.es', '$2y$10$UhguCd5lROW4Pyj07NQ3OOCCLhAssvJMCaOX/Oec.YXvOjT27ueEO', 'administrador', '', '2023-06-13 14:10:01', 1, '2023-05-13 12:58:04', '', ''),
(2, 2, 'productos@calceta.es', '$2y$10$UhguCd5lROW4Pyj07NQ3OOCCLhAssvJMCaOX/Oec.YXvOjT27ueEO', 'productos', '', '2023-02-27 12:26:02', 1, '2023-02-27 12:26:02', NULL, NULL),
(3, 3, 'auditor@calceta.es', '$2y$10$nsYSRkz9E4AHpsg5Ixk5f.vkbG1OOSmsawUoF.aZXXbIMz0HVgCr6', 'auditor', '', '2023-06-10 19:12:16', 1, '2023-02-27 12:26:34', '', ''),
(4, 5, 'silvionovasmartinez@gmail.com', '$2y$10$UhguCd5lROW4Pyj07NQ3OOCCLhAssvJMCaOX/Oec.YXvOjT27ueEO', 'Silvio', 'Novas Martínez', '2023-06-13 12:56:05', 1, '2023-03-01 12:26:34', NULL, NULL),
(5, 1, 'soporte@calceta.es', '$2y$10$UhguCd5lROW4Pyj07NQ3OOCCLhAssvJMCaOX/Oec.YXvOjT27ueEO', 'soporte', '', '2023-02-27 12:26:34', 1, '2023-02-27 12:26:34', '', ''),
(6, 1, 'baneado@calceta.es', '$2y$10$BVDiPnL0C72xiYnv2b7PeOi/zWfCJ2KYZLsrGGawLQ1aYyUOJ/EmC', 'baneado', 'baneado', '2023-05-19 18:09:10', 2, '2023-05-19 18:09:10', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_producto`
--

CREATE TABLE `valoracion_producto` (
  `id_valoracion` int(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aux_categoria`
--
ALTER TABLE `aux_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `aux_estado_pedido`
--
ALTER TABLE `aux_estado_pedido`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `aux_estado_usuario`
--
ALTER TABLE `aux_estado_usuario`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `aux_marca`
--
ALTER TABLE `aux_marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `aux_precio`
--
ALTER TABLE `aux_precio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aux_rol`
--
ALTER TABLE `aux_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `historial_pedido`
--
ALTER TABLE `historial_pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `FK_historial_usuario` (`id_usuario`),
  ADD KEY `FK_estado_pedido` (`id_estado`);

--
-- Indices de la tabla `historial_ventas`
--
ALTER TABLE `historial_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_historial_producto` (`id_producto`),
  ADD KEY `FK_historial_pedido` (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_categoria` (`id_categoria`),
  ADD KEY `FK_tipo_precio` (`id_tipo_precio`),
  ADD KEY `FK_marca` (`id_marca`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_soporte_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_usuario_rol` (`id_rol`),
  ADD KEY `FK_estado_usuario` (`id_estado`);

--
-- Indices de la tabla `valoracion_producto`
--
ALTER TABLE `valoracion_producto`
  ADD PRIMARY KEY (`id_valoracion`),
  ADD KEY `FK_valoracion_usuario` (`id_usuario`),
  ADD KEY `FK_valoracion_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aux_categoria`
--
ALTER TABLE `aux_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `aux_estado_pedido`
--
ALTER TABLE `aux_estado_pedido`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `aux_estado_usuario`
--
ALTER TABLE `aux_estado_usuario`
  MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aux_marca`
--
ALTER TABLE `aux_marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aux_precio`
--
ALTER TABLE `aux_precio`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `aux_rol`
--
ALTER TABLE `aux_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historial_pedido`
--
ALTER TABLE `historial_pedido`
  MODIFY `id_pedido` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_ventas`
--
ALTER TABLE `historial_ventas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `valoracion_producto`
--
ALTER TABLE `valoracion_producto`
  MODIFY `id_valoracion` int(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_pedido`
--
ALTER TABLE `historial_pedido`
  ADD CONSTRAINT `historial_pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_pedido_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `aux_estado_pedido` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_ventas`
--
ALTER TABLE `historial_ventas`
  ADD CONSTRAINT `FK_historial_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `historial_ventas_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `historial_pedido` (`id_pedido`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `aux_categoria` (`id_categoria`),
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_tipo_precio`) REFERENCES `aux_precio` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `aux_marca` (`id_marca`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `FK_soporte_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `aux_rol` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `aux_estado_usuario` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoracion_producto`
--
ALTER TABLE `valoracion_producto`
  ADD CONSTRAINT `FK_valoracion_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_valoracion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
