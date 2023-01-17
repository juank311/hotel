-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2023 a las 06:07:25
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `room_type_id`, `startdate`, `enddate`, `admin_id`) VALUES
(10, 1, '2017-04-29', '2017-05-01', 1),
(11, 2, '2017-04-29', '2017-05-01', 1),
(12, 3, '2017-04-29', '2017-05-01', 2),
(13, 2, '2017-05-02', '2017-05-05', 2),
(14, 1, '2017-05-06', '2017-05-10', 1),
(15, 3, '2017-05-26', '2017-05-29', 2),
(16, 2, '2017-05-26', '2017-05-29', 2),
(17, 2, '2017-05-06', '2017-05-10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation_user`
--

CREATE TABLE `reservation_user` (
  `user_id` int(10) NOT NULL,
  `reservation_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservation_user`
--

INSERT INTO `reservation_user` (`user_id`, `reservation_id`) VALUES
(1, 10),
(2, 11),
(3, 12),
(4, 13),
(1, 14),
(2, 15),
(3, 16),
(4, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms_type`
--

CREATE TABLE `rooms_type` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rooms_type`
--

INSERT INTO `rooms_type` (`id`, `name`, `nof`) VALUES
(1, 'Single', 2),
(2, 'Double', 1),
(3, 'Shared', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `phonenumber`, `birthdate`, `email`) VALUES
(1, 'Jhon', 'Doe', '1-451-395-1600', '1980-09-28', 'jdone@gmail.com'),
(2, 'Jane', 'Jackson', '1-709-896-0629', '1985-05-01', 'jjackson@yahoo.com\r\n'),
(3, 'Alex', 'Smith', '1-742-823-9990', '1990-05-28', 'jasmith@oul.com\r\n'),
(4, 'Johana', 'Roll', '1-806-460-9612', '1981-10-31', 'jkrolling@uk.com\r\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indices de la tabla `reservation_user`
--
ALTER TABLE `reservation_user`
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `rooms_type`
--
ALTER TABLE `rooms_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `rooms_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservation_user`
--
ALTER TABLE `reservation_user`
  ADD CONSTRAINT `reservation_user_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
