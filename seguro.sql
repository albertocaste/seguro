-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 23-06-2017 a las 21:19:07
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `seguro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `NOMBRE` text COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDOS` text COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_NACIMIENTO` text COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` text COLLATE utf8_spanish_ci NOT NULL,
  `EMAIL` text COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_CARNE` text COLLATE utf8_spanish_ci NOT NULL,
  `OBSERVACIONES` text COLLATE utf8_spanish_ci NOT NULL,
  `SEXO` text COLLATE utf8_spanish_ci NOT NULL,
  `EDAD` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extras`
--

CREATE TABLE `extras` (
  `ID` int(11) NOT NULL,
  `TIPO` text COLLATE utf8_spanish_ci NOT NULL,
  `PRECIO` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_TIPOSEGURO` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `extras`
--

INSERT INTO `extras` (`ID`, `TIPO`, `PRECIO`, `ID_TIPOSEGURO`) VALUES
(1, 'Elevalunas', '10', '1'),
(2, 'Alarma', '5', '1'),
(3, 'ABS', '15', '1'),
(4, 'Pintura metalizada', '12', '1'),
(5, 'Lunas', '7', '1'),
(6, 'Llantas de aleación', '8', '1'),
(7, 'Robo', '10', '1'),
(8, 'Incendio', '10', '1'),
(9, 'GPS', '4', '1'),
(10, 'Asientos eléctricos', '13', '1'),
(11, 'Neumáticos Runflat', '6', '1'),
(12, 'Lunas', '17', '2'),
(13, 'Robo', '35', '2'),
(14, 'Incendio', '20', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizas`
--

CREATE TABLE `polizas` (
  `ID` int(11) NOT NULL,
  `FECHA_INSC` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_CLIENTE` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_TIPOSEGURO` text COLLATE utf8_spanish_ci NOT NULL,
  `ID_EXTRAS` text COLLATE utf8_spanish_ci NOT NULL,
  `PRECIO` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposeguro`
--

CREATE TABLE `tiposeguro` (
  `ID` int(11) NOT NULL,
  `TIPO` text COLLATE utf8_spanish_ci NOT NULL,
  `PRECIO` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiposeguro`
--

INSERT INTO `tiposeguro` (`ID`, `TIPO`, `PRECIO`) VALUES
(1, 'Todo riesgo', '400'),
(2, 'Terceros', '200');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `polizas`
--
ALTER TABLE `polizas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tiposeguro`
--
ALTER TABLE `tiposeguro`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `extras`
--
ALTER TABLE `extras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `polizas`
--
ALTER TABLE `polizas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tiposeguro`
--
ALTER TABLE `tiposeguro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;