-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-10-2018 a las 20:42:45
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id6640076_library_store`
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
  `telefono` varchar(15) COLLATE utf8_bin NOT NULL,
  `instituto` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `identificacion`, `telefono`, `instituto`) VALUES
(55, 'kya', '**********', '', ''),
(74, 'Juana', '1067956431', '3146759228', ''),
(75, 'Juana', '1067956431', '3146759228', ''),
(76, 'Juan Carlos', '1006752902', '3146759228', ''),
(77, 'Andres', '1097562131', '3215205223', '');

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
(1, 'Family and Friends Second Edition Classbook Pack 1', '9780194808293', 115000, 0, 1),
(2, 'WorldView 2A', '2', 50000, -1, 2),
(3, 'Let\'s go', '9780194626248', 85000, 30, 2),
(4, 'Family and Friends Second Edition Classbook Pack 2', '9780194808309', 11500, 0, 2),
(5, 'Family and Friends Second Edition Classbook Pack 3', '9780194808316', 120000, 0, 2),
(6, 'Family and Friends Second Edition Classbook Pack 4', '9780194808323', 120000, 0, 2),
(7, 'Family and Friends Second Edition Classbook Pack 4', '9780194808323', 120000, 0, 2),
(8, 'Family and Friends Second Edition Classbook Pack 5', '9780194808330', 120000, 0, 2),
(9, 'Family and Friends Second Edition Workbook   1', '9780194808026', 95000, 0, 2),
(10, 'Family and Friends Second Edition Workbook   2', '9780194808040', 95000, 0, 2),
(11, 'Family and Friends Second Edition Workbook   3', '9780194808064', 95000, 0, 2),
(12, 'Family and Friends Second Edition Workbook   4', '9780194808088', 95000, 0, 2),
(13, 'Family and Friends Second Edition Workbook   5', '9780194808101', 95000, 0, 2),
(14, 'Oxford Primary Skills Book  1', '9780194674003', 60000, 0, 2),
(15, 'Oxford Primary Skills Book  2', '9780194674027', 60000, 0, 2),
(16, 'Oxford Primary Skills Book  3', '9780194674041', 60000, 0, 2),
(17, 'Oxford Primary Skills Book  4', '9780194674065', 60000, 0, 2),
(18, 'Oxford Primary Skills Book  5', '9780194674072', 60000, 0, 2),
(19, 'THE HERON AND THE HUMMING BIRD. Classic tales Level 3', '9780194239738', 28000, 0, 1),
(20, 'THE RAINFOREST BOY. Classic tales Level 2', '9780194239806', 28000, 0, 1),
(21, 'SCHOOLS Oxford Read and Discover 1', '9780194646277', 28000, 0, 1),
(22, 'CRYING WOLF AND OTHER TALES.  Dominoes Quick starter', '9780194249713', 35000, 0, 1),
(23, 'THE SELFISH GIANT.  Dominoes  Quick starter', '9780194249317', 35000, 0, 1),
(24, 'JOBS. Oxford Read and Discover 2.', '9780194646864', 30000, 0, 1),
(25, 'JOURNEY TO THE CENTRE OF THE EARTH. Dominoes Starter', '9780194247184', 33000, 0, 1),
(26, 'BLACKBEAR. Dominoes Starter', '9780194247146', 33000, 0, 1),
(27, 'FREE TIME AROUND THE WORLD. Oxford Read and Discover 3', '9780194643788', 30000, 0, 1),
(28, 'THE SWISS FAMILY ROBINSON. Dominoes', '9780194249805', 33000, 0, 1),
(29, 'THE TEACHER´S SECRET AND OTHER TALES. Dominoes', '9780194247689', 33000, 0, 1),
(30, 'WONDERS OF THE PAST. Oxford Read and Discover', '9780194644419', 30000, 0, 1),
(31, 'SHERLOCK HOLMES: THE NORWOOD MISTERY. Dominoes', '9780194248839', 36000, 0, 1),
(32, 'YOUR AMAZING BODY. Oxford Read and Discover', '9780194645584', 31000, 0, 1),
(33, 'FOOD AROUND THE WORLD. Oxford Read and Discover 6', '9780194645577', 31000, 0, 1),
(34, 'English Plus 2E 1: Student\'s Book', '9780194200592', 135000, 0, 2),
(35, 'Achieve 2nd Edition 2: Student Book, Workbook', '9780194556415', 123000, 0, 2),
(36, 'English Plus 2E 2: Student\'s Book', '9780194200615', 135000, 0, 2),
(37, 'English Plus 2E 3: Student\'s Book', '9780194201575', 135000, 0, 2),
(38, 'English Plus 2E 4: Student\'s Book', '9780194201599', 135000, 0, 2),
(39, 'Achieve 2nd Edition 1: Student Book, Workbook', '9780194556408', 123000, 0, 2),
(40, 'The Adventures of Tom Sawyer (Oxford Bookworms)', '9780194789004', 32000, 0, 1),
(41, 'Animals in Danger (Oxford Bookworms)', '9780194233798', 32000, 0, 1),
(42, 'The Wizard of Oz (Oxford Bookworms)', '9780194789264', 32000, 0, 1),
(43, 'Titanic (Oxford Bookworms', '9780194236195', 32000, 0, 1),
(44, 'Les Misérables', '9780194794404', 32000, 0, 1),
(45, 'The Monkey\'s Paw', '9780194789103', 32000, 0, 1),
(46, 'Huckleberry Finn', '9780194790635', 32000, 0, 1),
(47, 'World Wonders', '9780194237765', 32000, 0, 1),
(48, 'Chemical Secret', '9780194791120', 36000, 0, 1),
(49, 'Australia and New Zealand', '9780194233903', 32000, 0, 1),
(50, 'Frankenstein', '9780194791168', 36000, 0, 1),
(51, 'A Pair of Ghostly Hands and Other Stories', '9780194791250', 36000, 0, 1),
(52, 'The Scarlet Letter', '9780194791830', 36000, 0, 1),
(53, 'Gandhi', '9780194237802', 36000, 0, 1),
(54, 'Twenty Thousand Leagues Under The Sea', '9780194238021', 36000, 0, 1),
(55, 'Great Crimes', '9780194233941', 36000, 0, 1),
(56, 'Disaster', '9780194233958', 36000, 0, 1),
(57, 'I, Robot', '9780194792288', 36000, 0, 1),
(58, 'Pride and Prejudice', '9780194792677', 36000, 0, 1),
(59, 'American Crime Stories', '9780194792530', 36000, 0, 1),
(60, 'Cry Freedom', '9780194792561', 36000, 0, 1),
(61, 'The Enemy', '9780194792608', 36000, 0, 1),
(62, 'Oliver Twist', '9780194792660', 36000, 0, 1),
(63, 'Night Without End', '9780194792653', 36000, 0, 1),
(64, 'Show and Tell 2: Activity Book', '9780194779166', 62000, 0, 2),
(65, 'Show and Tell 3: Activity Book', '9780194779302', 62000, 0, 2),
(66, 'American Family and Friends 2E: 1 Student Book', '9780194815857', 115000, 0, 2),
(67, 'American Family and Friends 2E: 2 Student Book', '9780194816076', 115000, 0, 2),
(68, 'American Family and Friends 2E: 3 Student Book', '9780194816274', 122000, 0, 2),
(69, 'American Family and Friends 2E: 4 Student Book', '9780194816465', 122000, 0, 2),
(70, 'American Family and Friends 2E: 5 Student Book', '9780194816656', 122000, 0, 2),
(71, 'American Family and Friends 2E: 1 Workbook', '9780194815833', 95000, 0, 2),
(72, 'American Family and Friends 2E: 2 Workbook', '9780194816052', 95000, 0, 2),
(73, 'American Family and Friends 2E: 3 Workbook', '9780194816250', 95000, 0, 2),
(74, 'American Family and Friends 2E: 4 Workbook', '9780194816441', 95000, 0, 2),
(75, 'American Family and Friends 2E: 5 Workbook', '9780194816632', 95000, 0, 2),
(76, 'Reach Out 1 Student Book', '9780194853088', 120000, 0, 2),
(77, 'Reach Out 2 Student Book', '9780194853163', 120000, 0, 2),
(78, 'Reach Out 3 Student Book', '9780194853248', 120000, 0, 2),
(79, 'Reach Out 4 Student Book', '9780194853323', 120000, 0, 2),
(80, 'Reach Out 1 Workbook Pack', '9780194853118', 81000, 0, 2),
(81, 'Reach Out 2 Workbook Pack', '9780194853194', 81000, 0, 2),
(82, 'Reach Out 3 Workbook Pack', '9780194853279', 81000, 0, 2),
(83, 'Reach Out 4 Workbook Pack', '9780194853354', 81000, 0, 2),
(84, 'Achieve 2nd Edition 2: Student Book, Workbook', '9780194556415', 123000, 0, 2),
(85, 'Achieve 2nd Edition 3: Student Book, Workbook', '9780194556422', 123000, 0, 2),
(88, 'Sunny and Rainy', '9780194646802', 30000, 0, 1),
(89, 'Festivals around the world', '9780194643825', 30000, 0, 1),
(90, 'Free time around the world', '9780194643788', 30000, 0, 1),
(91, 'Incredible earth', '9780194644389', 30000, 0, 1),
(92, 'Volcano adventures', '9780194723602', 31000, 0, 1),
(93, 'Transportation Then and Now', '9780194644990', 31000, 0, 1),
(94, 'Trouble on the Easter express', '9780194737210', 31000, 0, 1),
(95, 'William tell and other stories', '9780194247030', 38000, 0, 1),
(96, 'Around the world in eight days', '9780194247016', 33000, 0, 1),
(97, 'The real Mc coy & other ghosts', '9780194247672', 35000, 0, 1),
(98, 'The teacher’s secret and other folk stories', '9780194247689', 33000, 0, 1),
(99, 'Eight great American tales', '9780194248907', 37000, 0, 1),
(100, 'New Yorkers – short stories', '9780194790673', 30000, 0, 1),
(101, 'The curious case of Benjamin Button & other stories', '9780194249270', 37000, 0, 1),
(102, 'The picture of Dorian gray ', '9780194791267', 30000, 0, 1),
(103, 'The unquiet grave – short stories', '9780194791915', 31000, 0, 1),
(104, 'Treasure Island', '9780194791908', 31000, 0, 1),
(105, 'David Copperfield', '9780194792196', 35000, 0, 1),
(106, 'Great expectations', '9780194792264', 35000, 0, 1),
(107, 'METRO STARTER: STUDENT BOOK/WORKBOOK PACK', '9780194410076', 93000, 0, 2),
(108, 'METRO LEVEL 1: STUDENT BOOK/WORKBOOK PACK', '9780194410175', 93000, 0, 2),
(109, 'METRO LEVEL 2: STUDENT BOOK/WORKBOOK PACK', '9780194410274', 93000, 0, 2),
(110, 'METRO LEVEL 3: STUDENT BOOK/WORKBOOK PACK', '9780194410373', 93000, 0, 2),
(111, 'STARLIGHT 1: STUDENT BOOK', '9780194413299', 100000, 0, 2),
(112, 'STARLIGHT 2: STUDENT BOOK', '9780194413459', 100000, 0, 2),
(113, 'STARLIGHT 3: STUDENT BOOK', '9780194413619', 100000, 0, 2),
(114, 'STARLIGHT 4: STUDENT BOOK', '9780194413756', 100000, 0, 2),
(115, 'STARLIGHT 5: STUDENT BOOK', '9780194413893', 100000, 0, 2),
(116, 'STARLIGHT 1: WORKBOOK', '9780194413329', 84000, 0, 2),
(117, 'STARLIGHT 2: WORKBOOK', '9780194413480', 84000, 0, 2),
(118, 'STARLIGHT 3: WORKBOOK', '9780194413640', 84000, 0, 2),
(119, 'STARLIGHT 4: WORKBOOK', '9780194413787', 84000, 0, 2),
(120, 'STARLIGHT 5: WORKBOOK', '9780194413923', 84000, 0, 2),
(121, 'MOUSE AND ME PLUS 1: STUDENT BOOK (EG / MX)', '9780194821407', 85000, 0, 2),
(122, 'MOUSE AND ME PLUS 2: STUDENT BOOK (EG / MX)', '9780194821414', 86000, 0, 2),
(123, 'MOUSE AND ME PLUS 3: STUDENT BOOK (EG / MX)', '9780194821421', 86000, 0, 2),
(124, 'MOUSE AND ME! PLUS 1 AB', '9780194821438', 47000, 0, 2),
(125, 'MOUSE AND ME! PLUS 2 AB', '9780194821445', 47000, 0, 2),
(126, 'MOUSE AND ME! PLUS 3 AB', '9780194821452', 47000, 0, 2),
(127, 'SMART TALK LEVEL 1 STUDENT PACK', '9780194528047', 72000, 0, 2),
(128, 'SMART TALK LEVEL 2 STUDENT PACK', '9780194528139', 72000, 0, 2),
(129, 'WHAT\'S THIS?', '9780194722421', 25000, 0, 1),
(130, 'AT THE ZOO', '9780194722384', 25000, 0, 1),
(131, 'FREE TIME AROUND THE WORLD.', '9780194643788', 25000, 0, 1),
(132, 'WONDERFUL WATER', '9780194643764', 25000, 0, 1),
(133, 'HOW TO STAY HEALTHY', '9780194644457', 25000, 0, 1),
(134, 'WHY WE RECYCLE', '9780194644440', 25000, 0, 1),
(135, 'MEDICINE THEN AND NOW', '9780194645065', 27000, 0, 1),
(136, 'DAY OF THE DINOSAURS', '9780194021180', 33000, 0, 1);

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
(61, 55, 2, 1, 50000, '2018-07-29 19:04:41'),
(62, 74, 2, 1, 50000, '2018-09-02 11:37:27'),
(63, 74, 2, 1, 50000, '2018-09-02 11:38:49'),
(64, 76, 2, 1, 50000, '2018-09-02 11:40:09'),
(68, 77, 2, 1, 50000, '2018-09-07 11:33:57');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
