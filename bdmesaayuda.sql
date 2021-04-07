-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2021 a las 22:01:00
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mesa_ayuda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `IDAREA` varchar(10) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `FKEMPLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`IDAREA`, `NOMBRE`, `FKEMPLE`) VALUES
('10', 'INFORMÁTICA', '4'),
('20', 'GESTIÓN HUMANA', NULL),
('30', 'MANTENIMIENTO', NULL),
('40', 'CONTABILIDAD', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `IDCARGO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_por_empleado`
--

CREATE TABLE `cargo_por_empleado` (
  `FKCARGO` int(11) NOT NULL,
  `FKEMPLE` varchar(20) NOT NULL,
  `FECHAINI` date NOT NULL,
  `FECHAFIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereq`
--

CREATE TABLE `detallereq` (
  `IDDETALLE` int(11) NOT NULL,
  `FECHA` datetime NOT NULL,
  `OBSERVACION` varchar(4000) NOT NULL,
  `FKREQ` int(11) NOT NULL,
  `FKESTADO` varchar(1) NOT NULL,
  `FKEMPLE` varchar(20) NOT NULL,
  `FKEMPLEASIGNADO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `IDEMPLEADO` varchar(20) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `FOTO` varchar(200) DEFAULT NULL,
  `HOJAVIDA` varchar(200) DEFAULT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `X` double DEFAULT NULL,
  `Y` double DEFAULT NULL,
  `fkEMPLE_JEFE` varchar(20) DEFAULT NULL,
  `fkAREA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IDEMPLEADO`, `NOMBRE`, `FOTO`, `HOJAVIDA`, `TELEFONO`, `EMAIL`, `DIRECCION`, `X`, `Y`, `fkEMPLE_JEFE`, `fkAREA`) VALUES
('1', 'Hugo', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\1.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\1.pdf', '411', 'hugo@ma.com', 'Cl. 54a #30-01, Medellín, Antioquia', -75.5532407, 6.2453253, '4', '10'),
('2', 'Paco', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\2.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\2.pdf', '412', 'paco@ma.com', 'Cra. 74d #732, Medellín, Antioquia', -75.5910024, 6.2736935, '4', '10'),
('3', 'Luís', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\3.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\3.pdf', '413', 'luis@ma.com', 'Cra. 65 #98 A-75, Medellín, Antioquia', -75.5715315, 6.2938986, NULL, '20'),
('4', 'Ana', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\4.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\4.pdf', '414', 'ana@ma.com', 'Cra. 51 #58-69, Medellín, Antioquia', -75.5683161, 6.2576409, NULL, '10'),
('5', 'Lina', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\5.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\5.pdf', '415', 'lina@ma.com', 'Cl. 47A ##85 - 20, Medellín, Antioquia', -75.6026462, 6.2504554, NULL, '30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IDESTADO` varchar(1) NOT NULL,
  `NOMBRE` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento`
--

CREATE TABLE `requerimiento` (
  `IDREQ` int(11) NOT NULL,
  `FKAREA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`IDAREA`),
  ADD KEY `CONS_FKEMPLE` (`FKEMPLE`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`IDCARGO`);

--
-- Indices de la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  ADD PRIMARY KEY (`FKCARGO`,`FKEMPLE`),
  ADD KEY `CONS_FKEMPLE3` (`FKEMPLE`);

--
-- Indices de la tabla `detallereq`
--
ALTER TABLE `detallereq`
  ADD PRIMARY KEY (`IDDETALLE`),
  ADD KEY `CONS_FKEMPLE2` (`FKEMPLE`),
  ADD KEY `CONS_FKREQ` (`FKREQ`),
  ADD KEY `CONS_ESTADO` (`FKESTADO`),
  ADD KEY `CONS_FKEMPLEASIG` (`FKEMPLEASIGNADO`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`IDEMPLEADO`),
  ADD KEY `CONS_FKAREA` (`fkAREA`),
  ADD KEY `CONS_FKEMPLE1` (`fkEMPLE_JEFE`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`IDESTADO`);

--
-- Indices de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD PRIMARY KEY (`IDREQ`),
  ADD KEY `CONS_FKAREA1` (`FKAREA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `IDCARGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  MODIFY `FKCARGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallereq`
--
ALTER TABLE `detallereq`
  MODIFY `IDDETALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  MODIFY `IDREQ` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `CONS_FKEMPLE` FOREIGN KEY (`FKEMPLE`) REFERENCES `empleado` (`IDEMPLEADO`);

--
-- Filtros para la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  ADD CONSTRAINT `CONS_FKCARGO` FOREIGN KEY (`FKCARGO`) REFERENCES `cargo` (`IDCARGO`),
  ADD CONSTRAINT `CONS_FKEMPLE3` FOREIGN KEY (`FKEMPLE`) REFERENCES `empleado` (`IDEMPLEADO`);

--
-- Filtros para la tabla `detallereq`
--
ALTER TABLE `detallereq`
  ADD CONSTRAINT `CONS_ESTADO` FOREIGN KEY (`FKESTADO`) REFERENCES `estado` (`IDESTADO`),
  ADD CONSTRAINT `CONS_FKEMPLE2` FOREIGN KEY (`FKEMPLE`) REFERENCES `empleado` (`IDEMPLEADO`),
  ADD CONSTRAINT `CONS_FKEMPLEASIG` FOREIGN KEY (`FKEMPLEASIGNADO`) REFERENCES `empleado` (`IDEMPLEADO`),
  ADD CONSTRAINT `CONS_FKREQ` FOREIGN KEY (`FKREQ`) REFERENCES `requerimiento` (`IDREQ`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `CONS_FKAREA` FOREIGN KEY (`fkAREA`) REFERENCES `area` (`IDAREA`),
  ADD CONSTRAINT `CONS_FKEMPLE1` FOREIGN KEY (`fkEMPLE_JEFE`) REFERENCES `empleado` (`IDEMPLEADO`);

--
-- Filtros para la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  ADD CONSTRAINT `CONS_FKAREA1` FOREIGN KEY (`FKAREA`) REFERENCES `area` (`IDAREA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
