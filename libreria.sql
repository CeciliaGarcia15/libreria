-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2020 a las 13:39:29
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
  `author_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `nationality` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `surname`, `nationality`) VALUES
(1, 'Juan', 'Rulfo', 'MEX'),
(2, 'Gabriel', ' García Marquéz', 'COL'),
(3, 'Juan Gabriel', 'Vazques', 'COL'),
(4, 'Julio ', 'Cortazar', 'ARG'),
(5, 'Isabel ', 'Allende', 'CHI'),
(6, 'Octavio', 'Paz', 'MEX'),
(7, 'Juan Carlos ', 'Onetti', 'URY'),
(8, '  S.E', 'Smith', 'USA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `genre_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `year` int(10) UNSIGNED NOT NULL DEFAULT 1900,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `copies` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`book_id`, `author_id`, `genre_id`, `title`, `year`, `lang_id`, `copies`, `description`) VALUES
(4, 8, 3, 'capturando a cara', 2014, 1, 1, 'libro 2 de la saga dragon lord of valdier'),
(28, 8, 3, 'abduciendo a abby', 2013, 1, 1, 'libro 1 de la saga dragon lord of valdier'),
(29, 8, 3, 'Rastreando a Trisha', 2015, 1, 1, 'libro 3 de la saga dragon lord of valdier'),
(45, 8, 3, 'emboscando a ariel', 2016, 1, 1, 'libro 4 de la saga dragon lord of valdier '),
(46, 8, 3, 'Acorralando a carmen', 2017, 1, 2, 'libro 5 de la saga dragon lord of valdier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `cname` varchar(50) NOT NULL,
  `csurname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('M','F','ND') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`client_id`, `cname`, `csurname`, `email`, `birthdate`, `gender`, `active`, `created_at`, `updated_at`) VALUES
(27123456, 'Juan pablo', 'Zarate ', 'j_zarate@gmail.com ', '1981-01-26', 'M', 1, '2020-09-04 04:14:02', '2020-09-04 04:35:52'),
(35159163, 'Juan', 'Perez', 'juan_perez@gmail.com', '1994-03-21', 'M', 1, '2020-08-30 17:11:49', '2020-08-30 17:11:49'),
(42100221, 'Gimena', 'Diaz Martinez ', 'gimena_martinez@gmail.com ', '2000-07-10', 'F', 1, '2020-08-30 17:11:49', '2020-09-08 00:51:33'),
(45530197, 'Marta', 'Ordonez', 'marta_ordonez@gmail.com', '1983-09-30', 'F', 1, '2020-08-30 17:11:49', '2020-08-30 17:11:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(10) UNSIGNED NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`) VALUES
(3, 'Fantasias'),
(8, 'Suspensos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `lang_id` int(10) UNSIGNED NOT NULL,
  `lang_name` varchar(3) NOT NULL COMMENT 'iso 639-1 language'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`lang_id`, `lang_name`) VALUES
(1, 'es'),
(2, 'en');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `type` enum('prestado','devuelto') DEFAULT NULL,
  `book_quantity` int(10) DEFAULT NULL COMMENT 'cuantos libros se van a prestar',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `finished` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `book_id`, `client_id`, `type`, `book_quantity`, `created_at`, `updated_at`, `finished`) VALUES
(1, 29, 42100221, 'prestado', 1, '2020-09-04 23:30:49', '2020-09-04 23:35:58', 0),
(2, 45, 45530197, 'prestado', 1, '2020-09-04 23:38:03', '2020-09-08 01:40:36', 0),
(3, 46, 35159163, 'prestado', 1, '2020-09-07 23:01:46', '2020-09-07 23:01:46', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `language` (`lang_id`),
  ADD KEY `author_id` (`author_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `client_id` (`client_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45530198;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`lang_id`);

--
-- Filtros para la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
