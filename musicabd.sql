-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2021 a las 02:43:37
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `musicabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`ID`, `nombre`, `email`, `imagen`, `web`) VALUES
(0, 'Ariana Grande', 'arianagrande@grande.com.ar', 'https://th.bing.com/th/id/OIP.u1V4xVogndDMekTEHIiYmQHaE8?pid=ImgDet&rs=1', 'https://www.arianagrande.com/'),
(1, 'Soledad Pastorutti', 'lasole@hotmail.com', 'https://cdn.cienradios.com/wp-content/uploads/sites/3/2016/01/soledad-ecosdemitierra.jpg', 'https://www.lasole.net/'),
(2, 'Ricardo Arjona', 'ricardoarjona@gmail.com', 'https://th.bing.com/th/id/OIP.bi6D6bv82fB4omo_V60lZwHaHa?pid=ImgDet&rs=1', 'https://blancoricardoarjona.com/'),
(3, 'Luis Miguel', 'luismi@hotmail.com', 'https://th.bing.com/th/id/OIP.UVL0LF0BaDidxaYIox8OEQAAAA?pid=ImgDet&w=370&h=260&rs=1', 'http://www.luismigueloficial.com/'),
(4, 'Maluma', 'malumabaibi@hotmail.com', 'https://th.bing.com/th/id/OIP.SuJ9FtSYM4INmKI_XG-ciAHaE8?pid=ImgDet&rs=1', 'https://maluma.online/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `duracion` int(5) NOT NULL,
  `popularidad` int(2) NOT NULL,
  `explicidad` varchar(2) NOT NULL,
  `idArtista` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`ID`, `nombre`, `duracion`, `popularidad`, `explicidad`, `idArtista`) VALUES
(0, 'Abuelita', 300, 50, 'Si', 'Ariana Grande'),
(1, 'libertad', 150, 60, 'Si', 'Soledad Pastorutti'),
(2, 'calma', 450, 30, 'No', 'Ricardo Arjona'),
(3, 'buscandote', 190, 80, 'No', 'Ricardo Arjona'),
(4, 'capacidad', 500, 60, 'No', 'Luis Miguel'),
(5, 'explicar', 100, 12, 'No', 'Maluma'),
(6, 'enojo', 600, 67, 'Si', 'Luis Miguel'),
(7, 'aqui estoy', 375, 33, 'No', 'Maluma'),
(8, 'Hello', 600, 28, 'No', 'Ariana Grande'),
(9, 'buscando una experiencia', 123, 50, 'No', 'Soledad Pastorutti');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
