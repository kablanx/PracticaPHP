-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2020 a las 17:16:15
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbusuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(9) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Informática'),
(2, 'Administración'),
(3, 'Comercio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(9) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_profesor`, `id_departamento`, `mensaje`, `estado`) VALUES
(1, 1, 1, 'adf', 'Urgente'),
(2, 1, 1, 'adf\r\n', 'No urgente'),
(3, 1, 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'No urgente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(9) NOT NULL,
  `Nif` varchar(10) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `NombreUsuario` varchar(45) NOT NULL,
  `PasswordSegura` varchar(250) NOT NULL,
  `TelefonoMovil` int(9) NOT NULL,
  `TelefonoFijo` int(9) NOT NULL,
  `Departamento` varchar(45) NOT NULL,
  `Aceptado` int(1) NOT NULL,
  `Rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Email`, `NombreUsuario`, `PasswordSegura`, `TelefonoMovil`, `TelefonoFijo`, `Departamento`, `Aceptado`, `Rol`) VALUES
(1, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanx', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'InformÃ¡tica', 1, 1),
(3, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'InformÃ¡tica', 1, 0),
(4, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'InformÃ¡tica', 1, 0),
(5, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(6, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'InformÃ¡tica', 1, 0),
(7, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(8, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(9, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(10, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(11, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(12, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(13, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(14, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanxk', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'Informática', 1, 0),
(15, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'zxczxc', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, '1', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
