-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-01-2018 a las 18:03:40
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(50, 'Antonio'),
(51, 'Antonio2'),
(1, 'Author 1'),
(2, 'Author 2'),
(49, 'Miguel de Cervantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `isbn` int(13) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `year` smallint(4) NOT NULL,
  `edition` int(11) NOT NULL,
  `edition_year` smallint(4) NOT NULL,
  `editorial` int(13) UNSIGNED NOT NULL,
  `country` int(13) UNSIGNED NOT NULL,
  `language` int(13) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`isbn`, `title`, `year`, `edition`, `edition_year`, `editorial`, `country`, `language`) VALUES
(4, 'Lord Of the  Rings', 23, 2, 3232, 32, 68, 58),
(555, 'A test', 2018, 1, 2018, 4, 68, 58),
(341234, 'A book with no stock', 2018, 1, 2018, 32, 68, 58),
(4294967295, 'Don Quixote de la Mancha', 1850, 45, 2015, 4, 36, 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_author`
--

CREATE TABLE `book_author` (
  `book` int(13) UNSIGNED NOT NULL,
  `author` int(13) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book_author`
--

INSERT INTO `book_author` (`book`, `author`) VALUES
(4, 50),
(555, 50),
(555, 51),
(341234, 50),
(4294967295, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_copy`
--

CREATE TABLE `book_copy` (
  `id` int(13) UNSIGNED NOT NULL,
  `book` int(13) UNSIGNED NOT NULL,
  `state` int(13) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book_copy`
--

INSERT INTO `book_copy` (`id`, `book`, `state`) VALUES
(21, 341234, 2),
(23, 341234, 1),
(24, 555, 1),
(26, 4294967295, 1),
(27, 4294967295, 1),
(28, 4294967295, 1),
(29, 4294967295, 1),
(30, 4294967295, 1),
(31, 4294967295, 1),
(32, 4294967295, 1),
(33, 4294967295, 1),
(40, 4, 3),
(41, 4, 1),
(44, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_genre`
--

CREATE TABLE `book_genre` (
  `book` int(13) UNSIGNED NOT NULL,
  `genre` int(13) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book_genre`
--

INSERT INTO `book_genre` (`book`, `genre`) VALUES
(4, 93),
(555, 93),
(555, 99),
(341234, 93),
(4294967295, 51),
(4294967295, 106);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(68, 'France'),
(36, 'Spain');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `name`) VALUES
(32, 'dadfasdf'),
(4, 'Sample Editorial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genre`
--

CREATE TABLE `genre` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(93, 'Adventure novel'),
(105, 'Apocalyptic'),
(81, 'Biography'),
(109, 'Bizarro'),
(95, 'Brit lit'),
(96, 'Children'),
(61, 'Classic'),
(51, 'Comedy'),
(62, 'Crime'),
(106, 'Cyberpunk'),
(63, 'Detective'),
(52, 'Drama'),
(107, 'Dystopian'),
(110, 'Ecchi'),
(97, 'Education fiction'),
(94, 'Epic'),
(98, 'Erotic'),
(99, 'Erotic fiction'),
(82, 'Essay'),
(100, 'Experimental'),
(101, 'Experimental fiction'),
(64, 'Fable'),
(65, 'Fairy tale'),
(66, 'Fan fiction'),
(59, 'Fantasy'),
(67, 'Folklore'),
(40, 'Gore'),
(41, 'Hentai'),
(68, 'Historical fiction'),
(53, 'Horror fiction'),
(69, 'Humor'),
(84, 'Journalism'),
(37, 'Kids'),
(85, 'Lab report'),
(70, 'Legend'),
(115, 'Leitmotif'),
(55, 'Literary realism'),
(38, 'Love'),
(71, 'Magical realism'),
(48, 'Manga'),
(83, 'Manual'),
(47, 'Meme'),
(86, 'Memoir'),
(72, 'Meta fiction'),
(108, 'Military'),
(50, 'Movie'),
(35, 'Mystery'),
(60, 'Mythology'),
(73, 'Mythopoeia'),
(87, 'Narrative nonfiction'),
(44, 'Novel'),
(42, 'NSFW'),
(43, 'NSFWL'),
(45, 'Paranormal'),
(88, 'Personal narrative'),
(74, 'Picture book'),
(114, 'Poetic'),
(103, 'Post-apocalyptic'),
(113, 'Prose'),
(102, 'Pulp fiction'),
(89, 'Reference book'),
(54, 'Romance'),
(39, 'Sad'),
(56, 'Satire'),
(46, 'Sci-fi'),
(75, 'Science fiction'),
(90, 'Self-help book'),
(76, 'Short story'),
(91, 'Speech'),
(77, 'Suspense'),
(79, 'Tall tale'),
(36, 'Terror'),
(92, 'Textbook'),
(78, 'Thriller'),
(57, 'Tragedy'),
(58, 'Tragicomedy'),
(49, 'Videogame'),
(80, 'Western'),
(111, 'Yaoi'),
(112, 'Yuri'),
(104, 'Zombie');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(58, 'A Tong'),
(90, 'A-Pucikwar'),
(59, 'Aari'),
(60, 'Abanyom'),
(61, 'Abaza'),
(62, 'Abkhazian'),
(63, 'Abujmaria'),
(64, 'Acehnese'),
(65, 'Adamorobe Sign Language'),
(66, 'Adele'),
(67, 'Adyghe'),
(68, 'Afar'),
(69, 'Afrikaans'),
(70, 'Afro-Seminole Creole'),
(71, 'Aimaq'),
(72, 'Aini'),
(73, 'Ainu'),
(74, 'Akan'),
(75, 'Akawaio'),
(77, 'Aklanon'),
(76, 'Albanian'),
(78, 'Aleut'),
(79, 'Algonquin'),
(80, 'Alsatian'),
(81, 'Altay'),
(82, 'Alutor'),
(86, 'Amdang'),
(83, 'American Sign Language'),
(84, 'Amharic'),
(85, 'Anda'),
(87, 'Angika'),
(88, 'Anyin'),
(89, 'Ao'),
(91, 'Arabic'),
(92, 'Aragonese'),
(93, 'Aramaic'),
(94, 'Are'),
(56, 'Areare'),
(95, 'Argobba'),
(97, 'Armenian'),
(96, 'Aromanian'),
(98, 'Arvanitic'),
(99, 'Ashkun'),
(103, 'Asi'),
(100, 'Assamese'),
(101, 'Assyrian Neo-Aramaic'),
(104, 'Asturian'),
(102, 'Ateso'),
(57, 'Auhelawa'),
(105, 'Auslan'),
(106, 'Austro-Bavarian'),
(107, 'Avar'),
(108, 'Avestan'),
(109, 'Awadhi'),
(110, 'Aymara'),
(111, 'Azerbaijani');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id` int(13) UNSIGNED NOT NULL,
  `from_time` datetime NOT NULL,
  `to_time` datetime NOT NULL,
  `take_time` datetime DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `book_copy` int(13) UNSIGNED NOT NULL,
  `user` int(13) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `from_time`, `to_time`, `take_time`, `return_time`, `book_copy`, `user`) VALUES
(59, '2018-01-31 00:00:00', '2018-02-15 00:00:00', '2018-01-28 10:01:25', '2018-01-30 05:01:23', 40, 28),
(60, '2018-01-31 00:00:00', '2018-02-15 00:00:00', '2018-01-30 05:01:26', '0000-00-00 00:00:00', 44, 28),
(61, '2018-01-31 00:00:00', '2018-02-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 41, 28),
(62, '2018-02-16 00:00:00', '2018-03-03 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(4, 'BAD'),
(6, 'GOOD'),
(8, 'NEW'),
(5, 'REGULAR'),
(1, 'RESERVED'),
(2, 'TAKEN'),
(3, 'VERY BAD'),
(7, 'VERY GOOD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(13) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(41) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone_number` int(9) UNSIGNED NOT NULL,
  `real_name` varchar(30) NOT NULL,
  `surnames` varchar(60) NOT NULL,
  `is_defaulting` tinyint(1) NOT NULL,
  `type` int(13) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `dni`, `email`, `telephone_number`, `real_name`, `surnames`, `is_defaulting`, `type`) VALUES
(1, 'antonio', '*E31BAC86033F438E42D17F5DF3815C36C657D253', '44444444P', 'totti619@me.comm', 0, 'Antonio', 'Ortiz', 0, 1),
(2, 'sam', '*B5007B8831AA7CC0E2C2F5EA35A97C126011E8B9', '44444444P', 'sam@library.com', 666666666, 'Sam', 'Barnsby', 0, 2),
(23, 'esme', '*87E8743420324E3DB5B78170B4D8B90BF90F239C', '44444444P', 'esme@library.com', 666666666, 'esme', 'esme', 0, 3),
(24, 'joan', '*4B5DE35218F5EB4EB635B4A6A910D912553801D1', '44444444P', 'jcardona@library.com', 666666666, 'joan', 'cardon', 0, 1),
(25, 'anuser', '*A875F3315657753C7C5569E5999AE33829D68D4D', '44444444P', 'anuser@library.com', 666666666, 'anuser', 'anuser', 0, 3),
(27, 'x', '*B69027D44F6E5EDC07F1AEAD1477967B16F28227', '3', 'x@library.com', 343, 'X', 'X', 0, 3),
(28, 'librarian', '*B28637E35B4B983406E9A4B27B463C32F6B845A6', '2323', 'librarian@library.com', 2323, 'librarian', 'an', 0, 2),
(29, 'y', '*7446F64EFCFB1294A6DE20CAE7E49C2377A9AA25', 'y', 'y@library.com', 4, 'y', 'y', 0, 3),
(30, 'z', '*F24059C44AE7FCD38A595267C522FB133E9F06F1', 'z', 'z@library.com', 4, 'z', 'z', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_type`
--

CREATE TABLE `user_type` (
  `id` int(13) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'ADMINISTRATOR'),
(2, 'LIBRARIAN'),
(3, 'USER'),
(4, 'ANONYMOUS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `fk_book_editorial` (`editorial`),
  ADD KEY `fk_book_country` (`country`),
  ADD KEY `fk_book_language` (`language`);

--
-- Indices de la tabla `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book`,`author`),
  ADD KEY `fk_book_author_author` (`author`);

--
-- Indices de la tabla `book_copy`
--
ALTER TABLE `book_copy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_copy_book` (`book`),
  ADD KEY `fk_book_copy_state` (`state`);

--
-- Indices de la tabla `book_genre`
--
ALTER TABLE `book_genre`
  ADD PRIMARY KEY (`book`,`genre`),
  ADD KEY `fk_book_genre_genre` (`genre`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservation_book_copy` (`book_copy`),
  ADD KEY `fk_reservation_user` (`user`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_user_type` (`type`);

--
-- Indices de la tabla `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `book_copy`
--
ALTER TABLE `book_copy`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `country`
--
ALTER TABLE `country`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `state`
--
ALTER TABLE `state`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_country` FOREIGN KEY (`country`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `fk_book_editorial` FOREIGN KEY (`editorial`) REFERENCES `editorial` (`id`),
  ADD CONSTRAINT `fk_book_language` FOREIGN KEY (`language`) REFERENCES `language` (`id`);

--
-- Filtros para la tabla `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `fk_book_author_author` FOREIGN KEY (`author`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `fk_book_author_book` FOREIGN KEY (`book`) REFERENCES `book` (`isbn`);

--
-- Filtros para la tabla `book_copy`
--
ALTER TABLE `book_copy`
  ADD CONSTRAINT `fk_book_copy_book` FOREIGN KEY (`book`) REFERENCES `book` (`isbn`),
  ADD CONSTRAINT `fk_book_copy_state` FOREIGN KEY (`state`) REFERENCES `state` (`id`);

--
-- Filtros para la tabla `book_genre`
--
ALTER TABLE `book_genre`
  ADD CONSTRAINT `fk_book_genre_book` FOREIGN KEY (`book`) REFERENCES `book` (`isbn`),
  ADD CONSTRAINT `fk_book_genre_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`);

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_book_copy` FOREIGN KEY (`book_copy`) REFERENCES `book_copy` (`id`),
  ADD CONSTRAINT `fk_reservation_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_type` FOREIGN KEY (`type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
