-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2019 a las 01:20:47
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_coches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `id_agencia` int(11) NOT NULL,
  `nombre_agencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`id_agencia`, `nombre_agencia`) VALUES
(0, 'massceratti'),
(1, 'mercedez'),
(2, 'mazda'),
(3, 'toyota'),
(4, 'toyota'),
(5, 'zusuki'),
(6, 'mazda'),
(7, 'suzuki'),
(8, 'audi'),
(9, 'ferrari'),
(10, 'chevrolet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `RFC` varchar(100) NOT NULL,
  `Nombre_Cliente` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Avala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `RFC`, `Nombre_Cliente`, `Direccion`, `Avala`) VALUES
(0, '', '', '', 0),
(909, 'MXME120998PPPO09', 'MANUEL JESUS', 'CALLE 90 #400 COL.MANIGUA', 909),
(1111, 'MXMED2345890KDHFN', 'ALEX', 'CALLE UNACAR #15 COL.AVIACION', 1111),
(1234, 'OIHDFIOHKNF909', 'KAYU HERNANDEZ', 'RESIDENCIA UNIVERSITARIA', 1234),
(12345, 'kjwjs', 'efrain', 'calle 45', 12345),
(75849, 'LILL032598HCSCBS0', 'JORGE LOPEZ', 'VILLA UNIVERSITARIA', 75849),
(129089, 'HELB190697HCCYYF02', 'LUIS BENTANCUR', 'CALLE 35 #S/N COL.FATIMA', 129089),
(912567, 'HGJX8909034POF', 'ELIOENAI MAY', 'CALLE 29 #234 COL.SANTA ROSALIA', 912567),
(1200956, 'MEGT231298HCCYYF03', 'FELIPE COCON', 'CALLE 45 #10 COL.SANTA ROSALIA', 1200956),
(1234598, 'MXME980809HCCYYF03', 'EFRAIN MAY', 'CALLE 19 #1500 COL.BENITO JUAREZ', 1234598),
(12345000, 'MXME4567OJKGL', 'EFRAIN MAY', 'CALLE 34 #56 COL.SANTA ROSALIA', 12345000),
(111145677, 'MSHSHJUIAKAK2390', 'JORGE MANUEL', 'CALLE WAYMAS #23 COL.23 DE JULIO', 111145677);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `id_matricula` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `GARAGE_id_garage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`id_matricula`, `marca`, `modelo`, `GARAGE_id_garage`) VALUES
('111111', 'ferrari', '2019', 3),
('111112', 'crevrolet', '2010', 5),
('111113', 'crevrolet', '2017', 5),
('111114', 'mercedes', '2015', 4),
('222221', 'toyota', '1998', 3),
('222222', 'audi', '2010', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage`
--

CREATE TABLE `garage` (
  `id_garage` int(11) NOT NULL,
  `nombre_garage` varchar(100) NOT NULL,
  `coche_matricula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `garage`
--

INSERT INTO `garage` (`id_garage`, `nombre_garage`, `coche_matricula`) VALUES
(1, 'GARAGE NORTE', 'FX-12-34'),
(2, 'GARAGE SUR', 'ER-90-GH'),
(3, 'GARAGE FAMILIAR', 'DD-FG-P0'),
(4, 'GARAGE SUR', 'HH-FX-O9'),
(5, 'GARAGE MEINL', 'DF-90-87');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `involucra`
--

CREATE TABLE `involucra` (
  `id_reserva` int(11) NOT NULL,
  `id_matricula` varchar(100) NOT NULL,
  `PrecioAlquiler` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `involucra`
--

INSERT INTO `involucra` (`id_reserva`, `id_matricula`, `PrecioAlquiler`) VALUES
(9876, '111112', '9000.00'),
(12300, '111111', '900.00'),
(111111, '111113', '900.00'),
(120011, '111113', '5000.00'),
(120013, '222221', '8900.00'),
(120014, '222222', '2500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `litros` int(11) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cliente_id_cliente` int(11) NOT NULL,
  `agencia_id_agencia1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_inicio`, `fecha_final`, `litros`, `precio`, `cliente_id_cliente`, `agencia_id_agencia1`) VALUES
(9876, '2019-10-02', '2019-10-29', 90, '9999.99', 912567, 4),
(12300, '2019-10-10', '2019-10-12', 88, '4589.00', 75849, 5),
(12354, '2019-12-12', '2019-12-14', 33, '900.00', 75849, 8),
(111111, '2019-12-03', '2019-12-05', 33, '4500.00', 912567, 10),
(120011, '2019-08-09', '2019-08-11', 20, '6500.00', 75849, 4),
(120012, '2019-10-28', '2019-10-30', 34, '1300.00', 912567, 10),
(120013, '2019-10-24', '2019-10-25', 57, '9999.99', 909, 10),
(120014, '2019-11-15', '2019-12-12', 456, '3045.00', 1234, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) DEFAULT NULL,
  `pass` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`) VALUES
(2, 'Efrain159', 'admin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id_agencia`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_cliente`);

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `fk_COCHE_GARAGE1_idx` (`GARAGE_id_garage`);

--
-- Indices de la tabla `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id_garage`);

--
-- Indices de la tabla `involucra`
--
ALTER TABLE `involucra`
  ADD PRIMARY KEY (`id_reserva`,`id_matricula`),
  ADD KEY `fk_Reserva_has_Coche_Coche1_idx` (`id_matricula`),
  ADD KEY `fk_Reserva_has_Coche_Reserva1_idx` (`id_reserva`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_Reserva_Cliente1_idx` (`cliente_id_cliente`),
  ADD KEY `fk_Reserva_Agencia2_idx` (`agencia_id_agencia1`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coche`
--
ALTER TABLE `coche`
  ADD CONSTRAINT `fk_COCHE_GARAGE1` FOREIGN KEY (`GARAGE_id_garage`) REFERENCES `garage` (`id_garage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `involucra`
--
ALTER TABLE `involucra`
  ADD CONSTRAINT `fk_Reserva_has_Coche_Coche1` FOREIGN KEY (`id_matricula`) REFERENCES `coche` (`id_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserva_has_Coche_Reserva1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
