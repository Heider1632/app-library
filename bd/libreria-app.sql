-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2018 a las 02:14:22
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria-app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `genero` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `genero`) VALUES
(1, 'obra'),
(2, 'texto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `identificacion` varchar(15) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `identificacion`, `telefono`) VALUES
(1, 'Heider', '1067956431', '3146759228'),
(2, 'Edgar', '70890345', '3009025620'),
(3, 'Juan Carlos', '1097675243', '3006552136'),
(4, 'Carlos Peña', '1089782122', '3149852103'),
(5, 'Johana', '104560213', '3005621305'),
(6, 'Freddy', '100584762', '3205143269'),
(7, 'Carlos', '1005234612', '3165847123'),
(8, 'Oscar', '10679564123', '3225412003'),
(9, 'Juana', '1003651234', '3004561234'),
(10, 'Juana', '1003651234', '3004561234'),
(11, 'Juana', '1003651234', '3004561234'),
(12, 'Juana', '1003651234', '3004561234'),
(13, 'Manuel', '100362410', '3146759228'),
(14, 'Jose Perez', '1068521420', '3204521030'),
(15, 'anonimo', '***********', '##########'),
(16, 'Carlos Peña', '1067956431', '3146759228'),
(17, 'Angel', '1067423012', '3006552136'),
(18, 'Angelica Arteaga', '1005365412', '3149852103'),
(19, 'anonimo', '***********', '##########'),
(20, 'Juan Carlos', '60324899', '3146759228'),
(21, 'Hasb', '50623102', '3149852103'),
(22, 'anonimo', '***********', '##########'),
(23, 'Heider', '1006752902', '3149852103'),
(24, 'Juana', '1003651234', '3004561234'),
(25, 'Heider', '1067956431', '3146759228'),
(26, 'Angel', '100254789', '3149852103'),
(27, 'Heider', '1003651234', '3149852103'),
(28, 'Juan Carlos', '1069874620', '3004561234'),
(29, 'Bounce', '1004562310', '3006552136'),
(30, 'Juan andres', '1097523140', '3215024123'),
(31, 'heider', '**********', ''),
(32, 'Juan', '**********', ''),
(33, 'Alguine', '**********', ''),
(34, 'Juan', '**********', ''),
(35, 'Juan', '**********', ''),
(36, 'Juan', '**********', ''),
(37, 'Juana', '**********', ''),
(38, 'Juan andres', '**********', ''),
(39, 'Juan', '**********', ''),
(40, 'Carlos', '**********', ''),
(41, 'Juna', '**********', ''),
(42, 'Oscar', '**********', ''),
(43, 'Hector', '**********', ''),
(44, 'Juan', '**********', ''),
(45, 'Heider', '**********', ''),
(46, 'Juana', '**********', ''),
(47, 'Juana', '**********', ''),
(48, 'hola', '**********', ''),
(49, 'Hola', '**********', ''),
(50, 'heider', '**********', ''),
(51, 'heider', '**********', ''),
(52, 'kiya', '**********', ''),
(53, 'kiya', '**********', ''),
(54, 'kiya', '**********', ''),
(55, 'kya', '**********', ''),
(56, 'kya', '**********', ''),
(57, 'kya', '**********', ''),
(58, 'kya', '**********', ''),
(59, 'kya', '**********', ''),
(60, 'kya', '**********', ''),
(61, 'kya', '**********', ''),
(62, 'kya', '**********', ''),
(63, 'kya', '**********', ''),
(64, 'kya', '**********', ''),
(65, 'kya', '**********', ''),
(66, 'kya', '**********', ''),
(67, 'kya', '**********', ''),
(68, 'kya', '**********', ''),
(69, 'nyam', '**********', ''),
(70, 'nyam', '**********', ''),
(71, 'kyam', '**********', ''),
(72, 'kyam', '**********', ''),
(73, 'kya', '**********', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `codigobarra` varchar(255) COLLATE utf8_bin NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre`, `codigobarra`, `precio`, `cantidad`, `idcategoria`) VALUES
(1, 'Family and Friends Second Edition Classbook Pack 1', '9780194808293', 0, 0, 1),
(2, 'WorldView 2A', '2', 50000, 30, 2),
(3, 'Let\'s go', '9780194626248', 85000, 30, 2),
(4, 'Family and Friends Second Edition Classbook Pack 2', '9780194808309', 0, 0, 2),
(5, 'Family and Friends Second Edition Classbook Pack 3', '9780194808316', 0, 0, 2),
(6, 'Family and Friends Second Edition Classbook Pack 4', '9780194808323', 0, 0, 2),
(7, 'Family and Friends Second Edition Classbook Pack 4', '9780194808323', 0, 0, 2),
(8, 'Family and Friends Second Edition Classbook Pack 5', '9780194808330', 0, 0, 2),
(9, 'Family and Friends Second Edition Workbook   1', '9780194808026', 0, 0, 2),
(10, 'Family and Friends Second Edition Workbook   2', '9780194808040', 0, 0, 2),
(11, 'Family and Friends Second Edition Workbook   3', '9780194808064', 0, 0, 2),
(12, 'Family and Friends Second Edition Workbook   4', '9780194808088', 0, 0, 2),
(13, 'Family and Friends Second Edition Workbook   5', '9780194808101', 0, 0, 2),
(14, 'Oxford Primary Skills Book  1', '9780194674003', 0, 0, 2),
(15, 'Oxford Primary Skills Book  2', '9780194674027', 0, 0, 2),
(16, 'Oxford Primary Skills Book  3', '9780194674041', 0, 0, 2),
(17, 'Oxford Primary Skills Book  4', '9780194674065', 0, 0, 2),
(18, 'Oxford Primary Skills Book  5', '9780194674072', 0, 0, 2),
(19, 'THE HERON AND THE HUMMING BIRD. Classic tales Level 3', '9780194239738', 0, 0, 1),
(20, 'THE RAINFOREST BOY. Classic tales Level 2', '9780194239806', 0, 0, 1),
(21, 'SCHOOLS Oxford Read and Discover 1', '9780194646277', 0, 0, 1),
(22, 'CRYING WOLF AND OTHER TALES.  Dominoes Quick starter', '9780194249713', 0, 0, 1),
(23, 'THE SELFISH GIANT.  Dominoes  Quick starter', '9780194249317', 0, 0, 1),
(24, 'JOBS. Oxford Read and Discover 2.', '9780194646864', 0, 0, 1),
(25, 'JOURNEY TO THE CENTRE OF THE EARTH. Dominoes Starter', '9780194247184', 0, 0, 1),
(26, 'BLACKBEAR. Dominoes Starter', '9780194247146', 0, 0, 1),
(27, 'FREE TIME AROUND THE WORLD. Oxford Read and Discover 3', '9780194643788', 0, 0, 1),
(28, 'THE SWISS FAMILY ROBINSON. Dominoes', '9780194249805', 0, 0, 1),
(29, 'THE TEACHER´S SECRET AND OTHER TALES. Dominoes', '9780194247689', 0, 0, 1),
(30, 'WONDERS OF THE PAST. Oxford Read and Discover', '9780194644419', 0, 0, 1),
(31, 'SHERLOCK HOLMES: THE NORWOOD MISTERY. Dominoes', '9780194248839', 0, 0, 1),
(32, 'YOUR AMAZING BODY. Oxford Read and Discover', '9780194645584', 0, 0, 1),
(33, 'FOOD AROUND THE WORLD. Oxford Read and Discover 6', '9780194645577', 0, 0, 1),
(34, 'English Plus 2E 1: Student\'s Book', '9780194200592', 0, 0, 2),
(35, 'Achieve 2nd Edition 2: Student Book, Workbook', '9780194556415', 0, 0, 2),
(36, 'English Plus 2E 2: Student\'s Book', '9780194200615', 0, 0, 2),
(37, 'English Plus 2E 3: Student\'s Book', '9780194201575', 0, 0, 2),
(38, 'English Plus 2E 4: Student\'s Book', '9780194201599', 0, 0, 2),
(39, 'Achieve 2nd Edition 1: Student Book, Workbook', '9780194556408', 0, 0, 2),
(40, 'The Adventures of Tom Sawyer (Oxford Bookworms)', '9780194789004', 0, 0, 1),
(41, 'Animals in Danger (Oxford Bookworms)', '9780194233798', 0, 0, 1),
(42, 'The Wizard of Oz (Oxford Bookworms)', '9780194789264', 0, 0, 1),
(43, 'Titanic (Oxford Bookworms', '9780194236195', 0, 0, 1),
(44, 'Les Misérables', '9780194794404', 0, 0, 1),
(45, 'The Monkey\'s Paw', '9780194789103', 0, 0, 1),
(46, 'Huckleberry Finn', '9780194790635', 0, 0, 1),
(47, 'World Wonders', '9780194237765', 0, 0, 1),
(48, 'Chemical Secret', '9780194791120', 0, 0, 1),
(49, 'Australia and New Zealand', '9780194233903', 0, 0, 1),
(50, 'Frankenstein', '9780194791168', 0, 0, 1),
(51, 'A Pair of Ghostly Hands and Other Stories', '9780194791250', 0, 0, 1),
(52, 'The Scarlet Letter', '9780194791830', 0, 0, 1),
(53, 'Gandhi', '9780194237802', 0, 0, 1),
(54, 'Twenty Thousand Leagues Under The Sea', '9780194238021', 0, 0, 1),
(55, 'Great Crimes', '9780194233941', 0, 0, 1),
(56, 'Disaster', '9780194233958', 0, 0, 1),
(57, 'I, Robot', '9780194792288', 0, 0, 1),
(58, 'Pride and Prejudice', '9780194792677', 0, 0, 1),
(59, 'American Crime Stories', '9780194792530', 0, 0, 1),
(60, 'Cry Freedom', '9780194792561', 0, 0, 1),
(61, 'The Enemy', '9780194792608', 0, 0, 1),
(62, 'Oliver Twist', '9780194792660', 0, 0, 1),
(63, 'Night Without End', '9780194792653', 0, 0, 1),
(64, 'Show and Tell 2: Activity Book', '9780194779166', 0, 0, 2),
(65, 'Show and Tell 3: Activity Book', '9780194779302', 0, 0, 2),
(66, 'American Family and Friends 2E: 1 Student Book', '9780194815857', 0, 0, 2),
(67, 'American Family and Friends 2E: 2 Student Book', '9780194816076', 0, 0, 2),
(68, 'American Family and Friends 2E: 3 Student Book', '9780194816274', 0, 0, 2),
(69, 'American Family and Friends 2E: 4 Student Book', '9780194816465', 0, 0, 2),
(70, 'American Family and Friends 2E: 5 Student Book', '9780194816656', 0, 0, 2),
(71, 'American Family and Friends 2E: 1 Workbook', '9780194815833', 0, 0, 2),
(72, 'American Family and Friends 2E: 2 Workbook', '9780194816052', 0, 0, 2),
(73, 'American Family and Friends 2E: 3 Workbook', '9780194816250', 0, 0, 2),
(74, 'American Family and Friends 2E: 4 Workbook', '9780194816441', 0, 0, 2),
(75, 'American Family and Friends 2E: 5 Workbook', '9780194816632', 0, 0, 2),
(76, 'Reach Out 1 Student Book', '9780194853088', 0, 0, 2),
(77, 'Reach Out 2 Student Book', '9780194853163', 0, 0, 2),
(78, 'Reach Out 3 Student Book', '9780194853248', 0, 0, 2),
(79, 'Reach Out 4 Student Book', '9780194853323', 0, 0, 2),
(80, 'Reach Out 1 Workbook Pack', '9780194853118', 0, 0, 2),
(81, 'Reach Out 2 Workbook Pack', '9780194853194', 0, 0, 2),
(82, 'Reach Out 3 Workbook Pack', '9780194853279', 0, 0, 2),
(83, 'Reach Out 4 Workbook Pack', '9780194853354', 0, 0, 2),
(84, 'Achieve 2nd Edition 2: Student Book, Workbook', '9780194556415', 0, 0, 2),
(85, 'Achieve 2nd Edition 3: Student Book, Workbook', '9780194556422', 0, 0, 2),
(88, 'Sunny and Rainy', '9780194646802', 0, 0, 1),
(89, 'Festivals around the world', '9780194643825', 0, 0, 1),
(90, 'Free time around the world', '9780194643788', 0, 0, 1),
(91, 'Incredible earth', '9780194644389', 0, 0, 1),
(92, 'Volcano adventures', '9780194723602', 0, 0, 1),
(93, 'Transportation Then and Now', '9780194644990', 0, 0, 1),
(94, 'Trouble on the Easter express', '9780194737210', 0, 0, 1),
(95, 'William tell and other stories', '9780194247030', 0, 0, 1),
(96, 'Around the world in eight days', '9780194247016', 0, 0, 1),
(97, 'The real Mc coy & other ghosts', '9780194247672', 0, 0, 1),
(98, 'The teacher’s secret and other folk stories', '9780194247689', 0, 0, 1),
(99, 'Eight great American tales', '9780194248907', 0, 0, 1),
(100, 'New Yorkers – short stories', '9780194790673', 0, 0, 1),
(101, 'The curious case of Benjamin Button & other stories', '9780194249270', 0, 0, 1),
(102, 'The picture of Dorian gray ', '9780194791267', 0, 0, 1),
(103, 'The unquiet grave – short stories', '9780194791915', 0, 0, 1),
(104, 'Treasure Island', '9780194791908', 0, 0, 1),
(105, 'David Copperfield', '9780194792196', 0, 0, 1),
(106, 'Great expectations', '9780194792264', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cant` int(10) NOT NULL,
  `total` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id`, `id_cliente`, `id_libro`, `cant`, `total`, `fecha`) VALUES
(61, 55, 2, 1, 50000, '2018-07-29 19:04:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `clave`) VALUES
(1, 'c0784027b45aa11e848a38e890f8416c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
