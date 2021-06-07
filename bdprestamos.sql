-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2021 a las 01:03:54
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdprestamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclientes`
--

CREATE TABLE `tblclientes` (
  `idclientes` int(11) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `fecha_registro` date NOT NULL,
  `monto` int(11) NOT NULL,
  `plazos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblclientes`
--

INSERT INTO `tblclientes` (`idclientes`, `nombres`, `fecha_registro`, `monto`, `plazos`) VALUES
(46, 'Usuario1', '2021-06-06', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmontos`
--

CREATE TABLE `tblmontos` (
  `idmonto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmontos`
--

INSERT INTO `tblmontos` (`idmonto`, `cantidad`) VALUES
(1, 100),
(2, 200),
(3, 300),
(4, 400),
(5, 500),
(6, 1000),
(7, 2000),
(8, 3000),
(9, 4000),
(10, 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblplazos`
--

CREATE TABLE `tblplazos` (
  `idplazos` int(11) NOT NULL,
  `num_plazos` int(2) NOT NULL,
  `interes` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblplazos`
--

INSERT INTO `tblplazos` (`idplazos`, `num_plazos`, `interes`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprestamos`
--

CREATE TABLE `tblprestamos` (
  `idprestamo` int(11) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `monto_prestamo` int(11) NOT NULL,
  `plazos` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`idclientes`);

--
-- Indices de la tabla `tblmontos`
--
ALTER TABLE `tblmontos`
  ADD PRIMARY KEY (`idmonto`);

--
-- Indices de la tabla `tblplazos`
--
ALTER TABLE `tblplazos`
  ADD PRIMARY KEY (`idplazos`);

--
-- Indices de la tabla `tblprestamos`
--
ALTER TABLE `tblprestamos`
  ADD PRIMARY KEY (`idprestamo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tblmontos`
--
ALTER TABLE `tblmontos`
  MODIFY `idmonto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblplazos`
--
ALTER TABLE `tblplazos`
  MODIFY `idplazos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblprestamos`
--
ALTER TABLE `tblprestamos`
  MODIFY `idprestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
