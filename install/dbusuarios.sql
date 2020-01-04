-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2019 a las 14:13:40
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
  `Foto` varchar(200) NOT NULL,
  `Departamento` varchar(45) NOT NULL,
  `Aceptado` int(1) NOT NULL,
  `Rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nif`, `Nombre`, `Apellido1`, `Apellido2`, `Email`, `NombreUsuario`, `PasswordSegura`, `TelefonoMovil`, `TelefonoFijo`, `Foto`, `Departamento`, `Aceptado`, `Rol`) VALUES
(1, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'kablanx', '9d6d4a31bc7e26ec4b826d8e6a2afdbacd95341a', 653085952, 953085952, 'No hay foto todavÃ­a', 'InformÃ¡tica', 0, 0),
(5, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'adsf', '42e5933658b0594628271edbb39edf6ec32fc0e5', 653085952, 953085952, 'No hay foto todavia', 'InformÃ¡tica', 0, 0),
(9, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'jesus', '65e02fe52bfb72743449d697542181d9a98fc9c5', 653085952, 953085952, 'No hay foto todavia', 'InformÃ¡tica', 0, 0),
(10, '49118433r', 'Kablanx', 'K', 'K', 'sebastianperezreal@gmail.com', 'sebita', '1234ASD+', 653085952, 953085952, 'No hay foto todavia', 'InformÃ¡tica', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
