-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-06-2023 a las 23:03:26
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
(0, 'sin categoria'),
(1, 'Telas'),
(2, 'Lanas'),
(3, 'Lazos'),
(12, 'Ganchillo y Tricot'),
(13, 'Costura y labores'),
(14, 'Libros y Revistas'),
(15, 'Manualidades'),
(16, 'Bordados'),
(17, 'Patchwork'),
(18, 'Algodones');

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
(2, 'hooked'),
(5, 'GÜTERMANN'),
(6, 'Clover'),
(7, 'Cose'),
(8, 'DMC'),
(9, 'Valeria di Roma'),
(10, 'Lanas Rubí'),
(11, 'Drac'),
(12, 'Casasol'),
(13, 'Knitpro'),
(14, 'Pony');

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

--
-- Volcado de datos para la tabla `historial_pedido`
--

INSERT INTO `historial_pedido` (`id_pedido`, `id_usuario`, `id_estado`, `fecha`, `direccion`) VALUES
(1, 4, 4, '2023-06-13 23:50:13', 'A serra nº 70, Arcos, Ponteareas'),
(2, 4, 4, '2023-06-14 00:16:21', 'lugar dos devas'),
(3, 4, 4, '2023-06-14 00:20:03', ' '),
(4, 23, 4, '2023-06-14 11:30:26', ' asdasd'),
(5, 23, 4, '2023-06-14 11:31:39', ' '),
(6, 23, 4, '2023-06-14 11:32:57', ' asdads'),
(7, 23, 4, '2023-06-14 11:33:27', ' asdasddas'),
(8, 23, 4, '2023-06-14 11:52:06', ' '),
(9, 23, 4, '2023-06-14 11:57:37', 'Lugar dos devas'),
(10, 24, 4, '2023-06-14 14:45:08', 'Maceió, Alagoas, Brasil'),
(11, 25, 4, '2023-06-14 14:56:47', 'Dundrum, dublin'),
(12, 26, 4, '2023-06-14 15:41:49', 'Azorin 1, 1º C, Ponteareas');

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

--
-- Volcado de datos para la tabla `historial_ventas`
--

INSERT INTO `historial_ventas` (`id`, `id_producto`, `precio`, `cantidad`, `id_pedido`) VALUES
(1, 2, '33.00', 12, 1),
(2, 10, '5.70', 4, 2),
(3, 3, '16.95', 3, 2),
(4, 3, '16.95', 1, 3),
(5, 2, '7.10', 1, 3),
(6, 1, '9.95', 1, 4),
(7, 1, '9.95', 5, 5),
(8, 1, '9.95', 3, 6),
(9, 1, '9.95', 4, 7),
(10, 2, '7.10', 4, 8),
(11, 9, '3.30', 4, 10),
(12, 10, '5.70', 4, 11),
(13, 2, '7.10', 2, 12);

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
(1, 'HOOOKED RIBBON XL', 'Hoooked Ribbon XL es un trapillo muy ligero de gran calidad, compuesto por fibras recicladas de algodón. Es perfecto para trabajar bonitas labores a la vez que cuidas el medio ambiente. Realiza proyectos como accesorios para decorar el hogar y más.', '9.95', 0, 0, 2, 18, 1),
(2, 'KATIA MENFIS COLOR\r\n', 'Menfis Color es un hilo multicolor, muy suave y cómodo, perfecto para tejer prendas de la temporada primavera/verano. Su diseño jaspeado le dará un toque especial a todas tus prendas. Está compuesto por fibras 100% algodón y es ideal para tejer jerséis finos, vestidos de tirantes, rebecas coloridas, tops de ganchillo, etc.', '7.10', 0, 27, 1, 2, 1),
(3, 'TELA DE ALGODÓN MEZFABRICS - BLOSSOM NIGHT', 'La tela MezFabrics - Blossom Night ha sido diseñada por Dee Hardwicke. Se compone de 100% algodón, por lo que es de tipo hipoalergénica. Realiza prendas y accesorios para toda la familia, incluidos los más pequeños. ¡Da rienda suelta a tu imaginación!', '16.95', 0, 22, 0, 1, 2),
(9, 'KATIA CANADA', 'Katia Canada es una lana gruesa perfecta para tejer con agujas de 7 - 8 mm, de la gama de las lanas básicas de Katia que te ofrece una multitud de colores entre los que elegir.', '3.30', 0, 40, 1, 2, 1),
(10, 'GANCHILLOS DE COLORES KATIA 12 mm', 'Ganchillos de colores Katia, son unas agujas de ganchillo en aluminio con mango siliconado, fabricadas por KnitPro para lanas Katia. Desde 7 mm hasta 12 mm.', '5.70', 0, 329, 1, 12, 1),
(11, 'KIT DE GANCHILLO AMIGURUMI PINGÜINO COCO - HOOOKED', 'El kit de ganchillo Pingüino Coco de Hoooked contiene todo lo que necesitas para tejer a ganchillo un adorable amigurumi con forma de pingüino. Dentro de la cajita encontrarás el hilo, el ganchillo y las instrucciones en varios idiomas. ¡Te resultará muy fácil de realizar!&#13;&#10;&#13;&#10;Instrucciones disponibles en español y otros idiomas.', '9.99', 0, 12, 2, 12, 1),
(22, 'HILO DE COSER COSELOTODO - GÜTERMANN', 'El hilo de coser Coselotodo de Gütermann es una bobina de 100 metros, disponible en diferentes colores, que podrás utilizar para coser todo tipo de puntadas en tus proyectos. Consigue este hilo caracterizado por su calidad.', '2.45', 0, 33, 5, 13, 1),
(24, 'PEGAMENTO TEXTIL GÜTERMANN HT2', 'Pegamento Textil Gütermann HT2 para un pegado muy resistente de telas, goma eva, fieltro, etc. Perfecto para ahorrar tiempo en tus manualidades, con un secado rápido.', '7.30', 0, 32, 5, 13, 1),
(25, 'REGLAS CURVAS FRANCESAS', 'Set de 3 reglas curvas francesas, pensadas para trazar curvas en nuestros patrones para corte y confección, con el fin de marcar sisas, cuellos, mangas, cadera, cintura y dobladillos.&#13;&#10;&#13;&#10;1&#13;&#10;', '15.95', 0, 10, 0, 13, 1),
(26, 'HILO GÜTERMANN MARA 120', 'Mara 120 de Gütermann es un hilo para coser fabricado en 100% poliéster con la tecnología MCT®. Es apto tanto para coser a mano, coser a máquina o para bordar. Tiene un acabado con un brillo particular y sedoso. Tus costuras serán resistentes, duraderas y tendrán un tacto suave. Se presenta en bobinas de 1000 metros de hilo.', '4.50', 0, 25, 5, 13, 1),
(27, 'PUNZÓN PUNCH NEEDLE DE MADERA + AGUJA DE LANA - DMC', 'El Punzón Punch needle de Madera + Aguja de Lana de DMC está diseñada para labores de bordado ruso, aguja mágica o Punch Needle. El punzón de acero es de tamaño 10, es decir, de 6 mm de diámetro y el mango es largo hecho de madera pulida para un agarre óptimo. ¡Un bordado universal!', '17.95', 0, 5, 0, 13, 1),
(28, 'HERRAMIENTA DE BORDADO - CLOVER', 'La herramienta para bordado de Clover es un accesorio de costura que te permitirá hacer bordados sea cual sea tu nivel o estilo (punto atrás, en círculo, punto de satén…), de una manera muy fácil y en tejidos tanto gruesos como finos.', '12.95', 0, 5, 0, 13, 1),
(29, 'AGUJA BORDADO RUSO CON ENHEBRADOR', 'Práctica Aguja de Bordado Ruso con Enhebrador de la marca COSE, muy últil para tus manualidades. ', '2.95', 0, 20, 0, 13, 1),
(30, 'AGUJA PARA PUNCH NEEDLE FINA CON ENHEBRADOR - DMC', 'Aguja para Punch Needle Fina con Enhebrador de DMC se presenta en un pack que incluye un punzón de Punch Needle, 3 agujas intercambiables de grosores finos diferentes: 1,3 mm, 1,6 mm y 2,2 mm, y 2 enhebradores de aguja. Resulta perfecta para trabajar bordados en relieve con texturas originales. ¡Fácil y divertida de usar!&#13;&#10;&#13;&#10;&#13;&#10;', '15.95', 0, 5, 8, 13, 1),
(31, 'VALERIA DI ROMA MIBEBE', 'El modelo Mibebe de Valeria di Roma es una lana fina, suave y dulce, perfecta para tejer prendas, complementos o accesorios para los más pequeños. Está disponible en multitud de colores y está compuesta por fibras acrílicas 100%. Además, cuenta con el tratamiento dralon® que le aporta mayor calidad a la lana.', '3.00', 0, 80, 0, 2, 1),
(32, 'Valeria di Roma Lupo', 'Lupo de Valeria di Roma es un ovillo de textura suave y esponjosa, compuesto por fibras de lana y acrílico. Esta combinación consigue una calidad perfecta para el invierno por sus propiedades térmicas, que mantendrán la temperatura de tu cuerpo en los días más fríos. Presenta un suave degradado de color a lo largo de su hebra, que le dará un toque muy original a tus prendas y accesorios.&#13;&#10;&#13;&#10;', '7.50', 0, 50, 9, 2, 1),
(33, 'VALERIA DI ROMA BRITANIA', 'Britania es una lana de Valeria di Roma, que se compone de fibras naturales de lana, procedentes de Inglaterra. Este ovillo, perfecto para todo tipo de prendas y accesorios, conseguirá un resultado muy cálido y que te protegerá del viento y del frío en los días más duros del invierno. ', '6.95', 0, 20, 9, 2, 1),
(34, 'BISUTERÍA TEJIDA CON TRICOTÍN', 'Bisutería tejida con tricotín es un libro muy completo con el que podrás aprender a realizar originales accesorios. Tan solo necesitarás hilo y un tricotín para crear collares, lazos, pulseras y otros accesorios fácilmente. ¡Diviértete y sácale el máximo partido a tu tricotín!', '6.95', 0, 2, 11, 14, 1),
(35, 'CINTA PARA DOBLADILLOS GÜTERMANN HT3', 'Cinta para dobladillo HT3 de Güterman,para el pegado de las prendas sin necesidad de saber coser. ', '3.50', 0, 15, 5, 13, 1),
(36, 'VALERIA DI ROMA MOHAIR DUO', 'Mohair Duo de Valeria Lanas es una lana de alta gama de Edición Limitada, solo disponible hasta fin de existencias. Está desarrollada en dos colores neutros, sencillos y elegantes perfectos para trabajar chaquetas o jerséis con los que protegerte del frío. Gracias a un 30% de mohair en su composición se consigue suavidad y calidez.&#13;&#10;&#13;&#10;', '5.30', 0, 15, 9, 2, 1),
(37, 'VALERIA DI ROMA ECO LUNA', 'Valeria di Roma Eco Luna es un hilo con excelente acabado, compuesto por algodón y acrílico, ideal para tejer labores tanto para niños como para adultos, amigurumis y muchos otros.', '3.50', 0, 12, 9, 18, 1),
(38, 'Valeria di Roma Nerja', 'Valeria di Roma Nerja es un hilo acrílico con tratamiento dralon®. Esto le proporciona una textura perfectamente pulida con un suave brillo y un tacto muy agradable que recuerda a la dulce fibra del algodón. Ideal para adultos, niños y b', '4.70', 0, 25, 9, 18, 1),
(39, 'Valeria di Roma texas', 'Valeria di Roma Texas es una lana que combina lana y acrílico dralon®, lo que ofrece tejidos de una calidad superior, mucho más resistentes y cómodos. Su textura esponjosa y cálida es muy agradable para tus prendas de otoño e invierno.&#13;&#10;&#13;&#10;', '6.10', 0, 13, 9, 2, 1),
(40, 'VALERIA DI ROMA BABY &#38; FAMILY', 'Valeria di Roma Baby &#38; Family es una lana de tacto extrasuave, muy agradable para toda la familia, bebés, niños y adultos. Su textura y composición la hace idónea para las pieles más sensibles, proporcionando tejidos cálidos, finos y ligeros.', '3.50', 0, 15, 9, 2, 1),
(41, 'VALERIA DI ROMA IRLANDA MERINO', 'Valeria di Roma Irlanda Merino es una lana de la gama de los básicos de esta marca, compuesta por acrílico dralon® y merino superwash, dos fibras que le aportan calidad, suavidad y una textura agradable a esta lana disponible en tonos lisos.', '4.55', 0, 12, 9, 2, 1),
(42, 'VALERIA DI ROMA MERINO EXTRA', 'Valeria di Roma Merino Extra es una lana compuesta por lana merino superwash y acrílico dralon, lo que ofrece unas de las mejores calidades con una limpieza fácil, que conserva todas sus cualidades. Perfecta para niños y adultos.', '5.40', 0, 25, 9, 2, 1),
(43, 'VALERIA DI ROMA MERINO 390', 'Valeria di Roma Merino 390 es una lana básica compuesta por dos excelentes fibras: acrílico dralon® y lana merino superwash. Es una lana de calidad, perfecta para todos los usos. Utilízala para tejer todo tipo de labores para niños, bebés y adultos.', '4.55', 0, 12, 9, 2, 1),
(44, 'VALERIA DI ROMA MEGAMERINO', 'Valeria di Roma Megamerino es una lana muy gruesa, suave y dulce al tacto, con tratamiento dralon® y Superwash, lo que la hace hipoalergénica y lavable a máquina, perfecta tanto para niños como para adultos.', '5.40', 0, 12, 9, 2, 1),
(45, 'VALERIA DI ROMA ALGODON TOP ORGÁNICO', 'Valeria di Roma Algodón Top Orgánico es un hilo compuesto completamente de fibras de algodón frescas y transpirables, ideal para tejer prendas de verano y accesorios de todo tipo. Disponible en una amplia gama de tonalidades, este tejido será muy agradable al tacto y no producirá irritaciones en la piel.', '5.70', 0, 30, 9, 2, 1),
(46, 'VALERIA DI ROMA MISS MERINO', 'Valeria di Roma Miss Merino es una lana básica de alto grosor ideal para todo tipo de proyectos para niños y mayores en los que desees tejidos gruesos y cálidos de tacto agradable y dulce, con una textura ligera y esponjosa.', '4.50', 0, 25, 9, 2, 1),
(47, 'VALERIA DI ROMA MALLORCA', 'Valeria di Roma Mallorca es un hilo de algodón con un toque brillante perfecto para tejer prendas de fiesta elegantes. Este hilo está compuesto por algodón y viscosa, lo que le aporta brillo y suavidad a todas tus prendas.', '3.50', 0, 12, 9, 18, 1),
(48, 'VALERIA MADEIRA', 'Valeria Madeira es un hilo lleno de color, perfecto para tejer prendas veraniegas en mezcla de colores jaspeados. Está compuesto por 100% algodón y se presenta en ovillos de 100 gramos, lo que te permite tejer una blusa fresquita en talla L con 2-3 ovillos. ¡Ideal para tejer todo tipo de ideas para bebés, niños y mayores!', '6.40', 0, 15, 9, 18, 1),
(49, 'VALERIA SALAMANCA STAMPE', 'Valeria Salamanca está compuesta por lana merino, una fibra de alta calidad que aporta suavidad y un alto abrigo. Está disponible en una carta de colores matizados, donde encontrarás mezclas de color llamativas, perfectas para dar alegría al invierno. Ideal para prendas o complementos con los que protegerse del frío.&#13;&#10;&#13;&#10;', '8.75', 0, 9, 9, 2, 1),
(50, 'CASASOL BAMBÚ M', 'Casasol Bambú M es un hilo de bambú sostenible, reconocido por su suavidad y tacto sedoso. Su composición de fibra de bambú le ofrece propiedades antibacterianas e hipoalergénicas, lo que lo convierte en una excelente opción para personas con piel sensible o alergias. Ideal para tejer prendas elegantes y frescas, ya que el bambú es un material fresco y transpirable. Su caída espectacular y un ligero brillo le otorgan un aspecto elegante y delicado.', '4.60', 0, 14, 12, 18, 1),
(51, 'DMC MAGNUM', 'DMC Magnum son ovillos de lana extragrandes, que ofrecen 400 gramos y 840 metros. Esta gran cantidad es perfecta para tejer labores de gran tamaño tan solo utilizando un ovillo, como mantas, ponchos, colchas y más...&#13;&#10;&#13;&#10;COLOR', '14.75', 0, 25, 8, 2, 1),
(52, 'DMC MAGNUM TWEED', 'DMC Magnum Tweed son maxi ovillos de 400 gramos, pensados especialmente para tejer grandes labores como mantas, ponchos, colchas y otras creaciones utilizando solo 1 ovillo.&#13;&#10;&#13;&#10;', '15.25', 0, 25, 8, 2, 1),
(53, 'DMC REVELATION', 'DMC Revelation son ovillos de lana de 150 gramos y 520 metros, disponibles en preciosas mezclas de colores, que forman una alegre combinación a lo largo de tu labor. Es ideal para tejer bufandas, pañuelos, foulares y otras labores usando solo 1 ovillo.', '8.50', 0, 19, 8, 2, 1),
(54, 'DMC PIROUETTE', 'DMC Pirouette es una lana multicolor perfecta para cualquier miembro de la familia. Se presenta en ovillos de 200 gramos y 500 metros, un gran metraje para trabajar tus labores. Utilízala para tejer prendas y complementos de gran abrigo para niños y mayores.', '10.85', 0, 23, 8, 2, 1),
(55, 'DMC Ángel', 'DMC Angel es un tipo de hilo muy suave y resistente, hecho de bambú y lana que te proporcionarán gran calidez y te protegerán del frío. Disponible en 10 tonos diferentes, podrás combinarlos para crear todo tipo de prendas, manualidades y complementos personalizados a tu gusto. ¡Pruébala!', '3.90', 0, 14, 8, 2, 1),
(56, 'DMC Samara', 'Samara de DMC es una lana de pelo que te enamorará con tan solo tocarla, ya que su acabado aterciopelado y dulce es súper agradable al contacto con la piel. Es perfecta para tejer prendas invernales y calentitas como chalecos, gorros, bufandas o incluso bolsos para la temporada de otoño – invierno. Está compuesta por fibras 100% de poliéster.', '8.15', 0, 25, 8, 2, 1),
(57, 'DMC Quick knit', 'DMC Quick Knit es una lana muy gruesa recomendada para tejer con agujas de 20 mm. Es especial para tejer suaves y cálidas mantas o colchas, dulces alfombras y otros complementos y accesorios para el hogar confortables.', '7.50', 0, 15, 8, 2, 1),
(58, 'DMC WOOLLY CHIC', 'DMC Woolly Chic es una lana merino combinada con una delgada hebra metalizada, lo que ofrece un acabado con un suave toque de brillo de purpurina. Es ideal para realizar prendas cálidas y cómodas para cualquier miembro de la familia.', '5.99', 0, 23, 8, 2, 1),
(59, 'DMC MELLOW', 'DMC Mellow es una lana de fantasía de la gama Fur. Ofrece un suave pelito largo ideal para realizar complementos elegantes como chales, foulares o bufandas y accesorios para el hogar como mantas, cojines, peluches, muñecos y mucho más...', '4.25', 0, 25, 8, 2, 1),
(60, 'DMC NOVA VITA', 'DMC Nova Vita es perfecto para crear accesorios del hogar respetando el medio ambiente. Está compuesto por tejidos de algodón que se reciclan para obtener nuevas fibras de alta calidad. ¡Te encantará su resultado! Perfecto para trabajar crochet o macramé.', '7.50', 0, 5, 8, 18, 1),
(61, 'DMC SHINE', 'DMC Shine es una lana que combina gran variedad de colorido a lo largo de su hebra compuesta de un solo cabo. Ideal para tejer prendas cálidas y abrigadas de otoño e invierno en las que desees una mezcla de color muy original.&#13;&#10;&#13;&#10;', '6.15', 0, 6, 8, 2, 1),
(62, 'Rubí macramé', 'Rubí Macramé es un hilado tubular de polipropileno del número 1,5. La composición y la forma de su hilatura confieren a las labores un elegante brillo y resalta la  definición del punto empleado.&#13;&#10;&#13;&#10;Está pensado para tejer accesorios como bolsos, cinturones, bisutería, sandalias, chanclas, bolsos wayuu……o complementos de hogar: atrapa sueños, cestas, tapices…….. Se puede tejer tanto con agujas de tricotar o crochet como con técnicas de macramé, tapestry u otras.', '3.50', 0, 18, 10, 18, 1),
(63, 'RUBI ECO 50g. (', 'Composición: 45% algodón 55% acrílico&#13;&#10;&#13;&#10;peso/longitud: 50 g., aprox. 150 m.&#13;&#10;Agujas: tricotar 3,5-4,5 , crochet 4 mm&#13;&#10;Labor: 10 x 10 cm = 20 puntos x 35 vueltas&#13;&#10;Tratamiento:lavado a máquina, máx 30°C/ no planchar', '2.50', 0, 50, 10, 18, 1),
(64, 'RUBI NATURAL 50 g', 'Composición: 100% algodón egipcio,doble peinado y gaseado.&#13;&#10;Peso/longitud: 50 g, aprox 155 m&#13;&#10;Agujas: tricotar 2,5 - 3,5 , crochet 3 mm&#13;&#10;Labor: 10x10 cm=24puntos x 44 vueltas&#13;&#10;Tratamiento:lavado a máquina,máx 30°C/ no planchar', '3.50', 0, 100, 10, 18, 1),
(65, 'RUBI CAMPIÑA 100g.', 'Composición: 100% Acrílico&#13;&#10;Peso/longitud: 100 g., aprox. 220 m.&#13;&#10;Agujas: tricotar 3,5,4 , crochet 3&#13;&#10;Labor: &#13;&#10;Tratamiento:lavado a máquina, máx 30°C/ no planchar', '3.95', 0, 65, 10, 18, 1),
(66, 'RUBI CHISPAS 100g.', 'composición: 100% Acrílico Premium&#13;&#10;peso/longitud:100 g., 195 m.. Nm. 2&#13;&#10;agujas:Tricotar 4-5 mm, Corchet 2-3 mm&#13;&#10;labor:10 x 10 cm = 19 puntos x 24 vueltas&#13;&#10;tratamiento:lavado a lavado', '5.50', 0, 12, 10, 2, 1),
(67, 'RUBI BAMBINO 100g.', 'composición: 100% Acrílico&#13;&#10;peso/longitud:100 g., aprox. 200 m.&#13;&#10;agujas:tricotar 4-5 , crochet 4 mm&#13;&#10;labor: 10 x 10 cm = 20 puntos x 25 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C tratado suave/ no planchar', '3.80', 0, 16, 10, 2, 1),
(68, 'RUBI BEBE 50g.', 'composición: 100% Acrílico&#13;&#10;peso/longitud:50 g., aprox. 350 m.&#13;&#10;agujas:tricotar 2-2,5 , crochet 2 mm&#13;&#10;labor: 10 x 10 cm = 36 puntos x 45 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C/ no planchar', '1.75', 0, 25, 10, 2, 1),
(69, 'RUBI NOGAL COLORS 100g. ', 'composición: 30% merino 70% acrílico&#13;&#10;peso/longitud:100 g, aprox 133 m&#13;&#10;agujas:tricotar 6-7, crochet 6 mm&#13;&#10;labor: 10 x 10 cm = 14 puntos x 17 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C tratado suave/ no planchar', '4.50', 0, 13, 10, 2, 1),
(70, 'RUBI NOGAL 100g. ', 'composición: 30% merino 70% acrílico&#13;&#10;peso/longitud:100 g, aprox 133 m&#13;&#10;agujas:tricotar 7, crochet 5 mm&#13;&#10;labor: 10 x 10 cm = 14 puntos x 17 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C tratado suave/ no planchar', '4.95', 0, 26, 10, 2, 1),
(71, 'RUBI HAYA 100g.', 'composición: 30% merino 70% acrílico&#13;&#10;peso/longitud:100 g., aprox. 300 m.&#13;&#10;agujas:tricotar 4-4,5 y crochet 4&#13;&#10;labor: 10 x 10 cm = 18 puntos x 27 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C tratado suave/ no planchar', '4.95', 0, 52, 10, 2, 1),
(72, 'RUBI NAIF 100g.', 'composición: 100% Acrílico&#13;&#10;peso/longitud:100 g., aprox. 300 m.&#13;&#10;agujas:tricotar 4-5, crochet 4 mm&#13;&#10;labor: 10 x 10 cm = 18 puntos x 27 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C/ no planchar', '3.50', 0, 11, 10, 2, 1),
(73, 'RUBI INDIE 100g.', 'Composición:3% Viscosa, 20% Lana 77% Acrílico&#13;&#10;Peso/longitud:100 g., 57 m.&#13;&#10;Agujas:Tricotar 9-12 mm y Corchet 9-10 mm&#13;&#10;Labor:10 x 10 cm = 9 puntos x 12 vueltas&#13;&#10;Tratamiento:lavado a máquina, máx 30°C tratado suave, no planchar', '5.70', 0, 16, 10, 2, 1),
(74, 'RUBI CLASICA 100gr', 'composición: 100% Acrílico&#13;&#10;peso/longitud:100 g., aprox. 300 m.&#13;&#10;agujas:tricotar 4 y crochet 4&#13;&#10;labor:10 x 10 cm = 18 puntos x 27 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C/ no planchar&#13;&#10;&#13;&#10;MPN Lana Acrílica 100g.', '2.50', 0, 108, 10, 2, 1),
(75, 'RUBI GARABATOS 100g. ', '100% Acrílico Premium&#13;&#10;peso/longitud:100 g., 370 m. , Nº 3,7&#13;&#10;agujas:Tricotar 3-3,5, crochet 2,5&#13;&#10;labor:10 x 10 cm = 23 puntos x 33 vueltas&#13;&#10;tratamiento:lavado a máquina, máx 30°C tratado suave/ no planchar', '3.90', 0, 8, 10, 2, 1),
(76, ' Brío DMC', 'Es una lana perfecta para hacer prendas para toda la familia.&#13;&#10;&#13;&#10;Muestra&#13;&#10;10cm x 10cm&#13;&#10;28 vueltas y 22 puntos&#13;&#10;&#13;&#10;Ganchillo&#13;&#10;4mm&#13;&#10;&#13;&#10;Agujas de tricot&#13;&#10;4mm', '5.40', 0, 21, 8, 2, 1),
(77, 'Juliette DMC', 'Juliette multicolor es una lana compuesta de 80% acrílico, 10% lana y 10% alpaca. Esta lana es ideal para otoño e invierno.&#13;&#10;muestra 10cm x 10cm&#13;&#10;32 vueltas y 25 puntos&#13;&#10;&#13;&#10;Ganchillo&#13;&#10;4mm&#13;&#10;&#13;&#10;Agujas de tricot&#13;&#10;4mm&#13;&#10;100g / 450m&#13;&#10;&#13;&#10;80% acrílico, 10% lana, 10% alpaca', '5.95', 0, 16, 8, 2, 1),
(78, 'Floca', '', '6.95', 0, 5, 0, 13, 1),
(79, 'Hilo Mouliné DMC', 'Madeja de hilo compuesto por 6 hebras que se pueden separar fácilmente y conseguir diferentes efectos.&#13;&#10;&#13;&#10;Es un hilo de algodón mercerizado que tiene gran resistencia a la luz y a los lavados, manteniendo los colores originales.&#13;&#10;&#13;&#10;Ideal para realizar labores de punto de cruz.', '1.65', 0, 0, 8, 16, 1),
(80, 'Revista Patrones Infantiles', 'Revistas de patrones infantiles . En la que se muestran un amplio surtido de patrones de todas las temporadas, dependiendo del número de revista.&#13;&#10;&#13;&#10;La revista lleva una tabla de medidas, es importante adaptarte lo más próximo a ella, te saldrán unos modelos espectaculares.&#13;&#10;&#13;&#10;Video tutorial ( youtube ) con el paso a paso de cada modelo. Una gran ayuda .&#13;&#10;&#13;&#10;Puede ver una breve descripción de cada revista al final de esta página.', '9.95', 0, 15, 0, 14, 1),
(81, 'Set de crochet Knitpro', 'Set de crochet de 9 piezas presentado en un novedoso estuche, de la marca KnitPro. El estuche está compuesto por los siguientes ganchillos: 2.0mm, 2.5mm, 3.0mm, 3.5mm, 4.0mm, 4.5mm, 5.0mm, 5.5mm, 6.0 mm. Cada ganchillo tiene diferente color, todos ellos muy actuales.El estuche a su vez tiene apertura y cierre en el frontal con cremallera, dejándolo abierto en formato libro, para que su uso sea más práctico.&#13;&#10;', '49.90', 0, 2, 13, 12, 1),
(82, 'Aguja ganchillo knitpro', 'Las agujas de ganchillo Waves de KnitPro son ganchillos con puntas en aluminio y mango de silicona. Las puntas contienen una capa deslizante que permite que tus hilos y lanas se deslicen con mucha suavidad.El mango es muy suave y resistente. Por lo que ofrece mayor comodidad que otros tipos de mangos. Los mangos de estas agujas de crochet son ideales para tejer todo tipo de creaciones. Ofrecen una excelente calidad y te permitirán tejer fácilmente tus labores, sin necesidad de esforzar tu mano y muñeca. Además, sus preciosos colores hacen de esta gama una colección única. Cada ganchillo se presenta con el mango en un color distinto, dependiendo del tamaño. De esta manera será muy fácil identificar el grosor de ganchillo que necesita. Se venden por unidades. La aguja del Nº 3,5 tiene una medida de 3,50 mm y mide 16 cm de largo', '3.50', 0, 29, 13, 12, 1),
(83, 'Aguja de zinc knitpro 40cm', 'Las agujas Zing KnitPro son de excelente calidad, muy ligeras, con una superficie suave y perfectamente pulida. Sus puntas metálicas de color plata son afiladas y suavemente redondeadas, para darle una forma cónica, permitiéndote coger los puntos rápidamente sin estropear tus tejidos. Están fabricadas en aluminio, tienen una superficie muy suave que permiten que los puntos de la labor se desplacen suavemente sobre la aguja, ofreciendo un trabajo rápido y cómodo. El peso ligero que ofrecen estas agujas de punto asegura el confort para tu mano, sin fatiga. Se vende por unidades. La aguja del Nº 5 tiene una medida de 5,00 mm y mide 40 cm de largo.', '3.50', 0, 23, 13, 12, 1),
(84, 'CABLE 10634 KNITPRO 80 CM', 'Cable flexible Knitpro para puntas de agujas intercambiables knitpro. La unión roscada larga asegura que los cables y las agujas permanezcan conectados.La longitud total del cable se alcanza con las puntas montadas.Lleva incluido una llave especial para facilitar el apretado de las mismas sin ninguna dificultad.Las tapas de los extremos se ajustan fácilmente a los cables y mantienen el tejido seguro.El cable mide 56 cm. Con las puntas de aguja consigues 80 cm.Y el pack lleva incluido: juego de 1 cable, 2 tapas de extremo y 1 llave de cable.&#13;&#10;&#13;&#10;', '4.95', 0, 0, 13, 12, 1),
(85, 'CABLE 10635 KNITPRO 100 CM', 'Cable flexible Knitpro para puntas de agujas intercambiables knitpro. La unión roscada larga asegura que los cables y las agujas permanezcan conectados.La longitud total del cable se alcanza con las puntas montadas.Lleva incluido una llave especial para facilitar el apretado de las mismas sin ninguna dificultad.Las tapas de los extremos se ajustan fácilmente a los cables y mantienen el tejido seguro.El cable mide 100 cm.Y el pack lleva incluido: juego de 1 cable, 2 tapas de extremo y 1 llave de cable.', '4.95', 0, 6, 13, 12, 1),
(86, 'CABLE 10633 KNITPRO 60 CM', 'Cable flexible Knitpro para puntas de agujas intercambiables knitpro. La unión roscada larga asegura que los cables y las agujas permanezcan conectados.La longitud total del cable se alcanza con las puntas montadas.Lleva incluido una llave especial para facilitar el apretado de las mismas sin ninguna dificultad.Las tapas de los extremos se ajustan fácilmente a los cables y mantienen el tejido seguro.El cable mide 35 cm. Con las puntas de aguja consigues 60 cm.Y el pack lleva incluido: juego de 1 cable, 2 tapas de extremo y 1 llave de cable.', '4.95', 0, 3, 13, 12, 1),
(87, 'AGUJAS ZING INTERCAMBIABLES 47501 KNITPRO 3.5MM', 'Las agujas circulares intercambiables de Zing están fabricadas en aluminio ligero de grado superior que proporciona un deslizamiento suave para todos los hilos. Las puntas están perfectamente afiladas y son ideales para todos los hilos y todos los proyectos. Se recomienda ser utilizada con los cables Knitpro, también disponibles en nuestra web. Las agujas tienen un conector enroscable donde conectar el cable intercambiable. Estos cables quedarán perfectamente unidos a estas puntas de aguja, evitando enganches. Cada punto realizado se deslizará sin dificultad por el largo de la aguja y el cable.Esta aguja es de una medida de 3,5 milímetros. Y su color es de oro metalizado.', '5.95', 0, 2, 13, 12, 1),
(88, 'PORTAMINAS+MINAS SIGNET PATCHWORK', 'Estuche portaminas + signet color. Set de minas para patchwork, costuras, sastrería, trabajos manuales o bricolaje.&#13;&#10;&#13;&#10;Viene en un estuche colgante que contiene un portaminas automático, 17 minas de diferentes colores junto con un sacapuntas. Sirve para marcar las señales sobre las telas de todos los colores, papel, tejidos, madera o plástico y se elimina con un paño húmedo.', '13.95', 0, 3, 0, 17, 1),
(89, 'Kit Iniciación Patchwork', 'Kit de iniciación al Patchwork.&#13;&#10;&#13;&#10;Es un kit ideal para las personas que quieran iniciarse en el patchwork. Con los útiles básicos y necesarios que posteriormente el cliente se irá complementando con otras herramientas.&#13;&#10;&#13;&#10;Este kit contiene:&#13;&#10;- Base para cortar de doble cara de 450 x 300 mm (18 x 12’’)&#13;&#10;- Regla universal de 30 cm x 16 cm.&#13;&#10;- 1 Cutter circular de 45 mm con hoja de repuesto e instrucciones.&#13;&#10;- Cartera de 20 agujas cortas para patchwork del 5/10, marca Pony.&#13;&#10;- 60 Alfileres de acero con cabeza de flor plana, de 54 mm x 0,65 mm.&#13;&#10;- Rotulador no permanente azul.&#13;&#10;- Plantilla de regalo.', '50.00', 0, 3, 0, 17, 1),
(90, 'ALFILERES PATCHWORK FORMAS 4385 CAJA 100 UDS', 'Alfileres de formas, pensados para patchwork, o para manualidades de todo tipo, que requieran de ayuda de un alfiler.&#13;&#10;&#13;&#10;Vienen en tres surtidos diferentes de colores suaves.&#13;&#10;&#13;&#10;MODELO 1 : Lazos&#13;&#10;&#13;&#10;MODELO 2 : Flores&#13;&#10;&#13;&#10;MODELO 3 : botones&#13;&#10;&#13;&#10;Cada cajita trae unas 100 unidades del mismo modelo, pero en surtido de colores.', '3.50', 0, 26, 0, 17, 1),
(91, 'Aguja Maquina 705 Pony 97742 Quilting Pack 25', 'Agujas de máquina artículo 705-97742.&#13;&#10;&#13;&#10;Utilizadas para trabajos de pespunteado como el Patchwork o Quilting.&#13;&#10;&#13;&#10;Envase de 5 blísters con 5 agujas de los números 80 y 90.&#13;&#10;&#13;&#10;Si tiene alguna duda sobre el producto&#13;&#10;  ', '3.90', 0, 9, 14, 17, 1),
(92, 'Tela de piqué waffle verde jade ', 'Tela de piqué waffle verde jade en aldodón 100%. Tejido suave con tamaño de nido 8 milímetros. La tela waffle o tela gofre permite confeccionar todo tipo de prendas infantiles y de bebés. Con este piqué waffle se pueden coser arrullos, sacos, cubrepañales, ranitas, petos, cambiadores, toallas, colchas, cucos, bolsos y fundas de carrito.', '11.95', 0, 9, 0, 1, 2),
(93, 'Tela algodón flores', 'Tela algodón flores burdeos', '8.95', 0, 9, 0, 1, 2),
(94, 'Tela algodón flores azul', 'Ancho : 160 cm&#13;&#10;Propiedades : Certifié, Origine Espagne&#13;&#10;Densidad : Ligero&#13;&#10;Uso : Deco, Cortina, Accesorios&#13;&#10;Referencia&#13;&#10;240198&#13;&#10;Color&#13;&#10;Azul real&#13;&#10;Cuidado&#13;&#10;Lavar a máquina a máximo 30°&#13;&#10;No secar en secadora&#13;&#10;Planchar a baja temperatura y sin vapor&#13;&#10;No utilizar soluciones blanqueantes (lejía)&#13;&#10;Lavar en seco&#13;&#10;Peso&#13;&#10;140 g/m2', '8.95', 0, 9, 0, 1, 2),
(95, 'Cinta de lazo de 2,5 cm - 25 m - Color Amarillo', 'Cinta satinada de lazo ideal para decorar tarros para mesas dulces o para crear bonitos lazos para los envoltorios de los regalos.&#13;&#10;&#13;&#10;Características:&#13;&#10;&#13;&#10;Material: 100% poliéster&#13;&#10;', '0.75', 0, 25, 0, 3, 2),
(96, 'Cinta de lazo de 1,2 cm - 25 m', 'Cinta de lazo de 1,2 cm - 25 m&#13;&#10;', '0.65', 0, 0, 0, 3, 1),
(97, 'Colesterol lazo flor', 'Coletero de flores en forma de lazo para el pelo. ', '3.90', 0, 8, 0, 3, 1);

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
  `creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `email`, `pass`, `nombre`, `apellido`, `ultima_sesion`, `id_estado`, `creacion`, `telefono`, `direccion`) VALUES
(1, 1, 'admin@calceta.es', '$2y$10$o/CCUSPMHv65G0IuNdKd2eQuaBmCqrhb/No.MeXh8Wh/B5FybTRfu', 'administrador', '', '2023-06-14 22:44:25', 1, '2023-05-13 12:58:04', '', ''),
(2, 2, 'productos@calceta.es', '$2y$10$rCzcb5jMocCYZTxXOS7syuqVd16Bnia1avXxHS.eXh5uViSANzrl2', 'productos', '', '2023-06-14 17:28:34', 1, '2023-02-27 12:26:02', '', ''),
(3, 3, 'auditor@calceta.es', '$2y$10$SX8pn.MO.3/lTLPJwDLZeOaSz4duzqqOBE039HHtwOkECgUqamMGq', 'auditor', '', '2023-06-10 19:12:16', 1, '2023-02-27 12:26:34', '', ''),
(4, 5, 'silvionovasmartinez@gmail.com', '$2y$10$WZkLOcSMhRktCUUQE85aAuy8L66eNbKVnFeAS54pZafEdP/RzkW9m', 'Silvio', 'Novas Martínez', '2023-06-14 00:20:01', 1, '2023-03-01 12:26:34', '', 'A serra'),
(5, 1, 'soporte@calceta.es', '$2y$10$dqRSX1NmgyaS8AggV1yhR.7f0cAoD6uIFqRhO90G9pBFcCLlIxa/e', 'soporte', '', '2023-02-27 12:26:34', 1, '2023-02-27 12:26:34', '', ''),
(6, 1, 'baneado@calceta.es', '$2y$10$BVDiPnL0C72xiYnv2b7PeOi/zWfCJ2KYZLsrGGawLQ1aYyUOJ/EmC', 'baneado', 'baneado', '2023-05-19 18:09:10', 2, '2023-05-19 18:09:10', '', ''),
(23, 5, 'gusha@gmail.com', '$2y$10$b2Vmsyq9yhXjR/oU.2RJqe4m1G6yYeqeyhRVwA5N79N10b9AauC0u', 'Gonçalo Rafael', 'Rodrigues Bento', '2023-06-14 16:46:26', 1, '2023-06-14 11:55:10', '123123123', 'Lugar dos devas'),
(24, 5, 'pepe@gmail.com', '$2y$10$J3B34AXRP3KBSyBpZfPvWeCNVYW9BbL2bueR7nRbp2wZl49SDMCE.', 'Pepe', 'Lima Ferreira', '2023-06-14 14:44:53', 1, '2023-06-14 14:44:53', '666777888', 'Maceió, Alagoas, Brasil'),
(25, 5, 'rosalia@gmail.com', '$2y$10$UU0XXtNXj1qvteWTC2XZMOHT9v3UIiCUGVXP9p3TnwxN8wvbqpeu6', 'Rosalia', 'Novas', '2023-06-14 14:56:19', 1, '2023-06-14 14:56:19', '111222333', 'Dundrum, dublin'),
(26, 5, 'sonia@gmail.com', '$2y$10$g6FFQ8hsxa4Ax52hUzCUS.gkpSM9HYL1juQyaE.Eljd4KoFOFD8xm', 'Sonia', '', '2023-06-14 20:59:57', 1, '2023-06-14 15:40:46', '', 'Azorin 1, 1º C, Ponteareas');

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id_pedido` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historial_ventas`
--
ALTER TABLE `historial_ventas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
