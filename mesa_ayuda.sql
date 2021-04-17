-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2021 a las 05:32:08
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.4.16

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
('20', 'GESTIÓN HUMANA', '3'),
('30', 'MANTENIMIENTO', '5'),
('40', 'CONTABILIDAD', '7'),
('50', 'VENTAS', '8'),
('60', 'Gerencia', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `IDCARGO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`IDCARGO`, `NOMBRE`) VALUES
(1, 'Administrador de redes'),
(2, 'Administrador de bases de datos'),
(5, 'Analista de sistemas'),
(6, 'Scrum Master'),
(7, 'Desarrollador de software'),
(8, 'Tester'),
(9, 'Director de recursos humanos'),
(10, 'Técnico de selección de personal'),
(11, 'Técnico de comunicación interna'),
(12, 'Técnico de formación'),
(13, 'Electricista'),
(14, 'Electromecánico'),
(15, 'Gerente de mantenimiento'),
(16, 'Mecánico'),
(17, 'Técnico en aire acondicionado'),
(18, 'Asistente de mantenimiento'),
(19, 'Analista financiero'),
(20, 'Contador'),
(21, 'Jefe de Contabilidad'),
(22, 'Jefe auditor'),
(23, 'Auxiliar contable'),
(24, 'Jefe de ventas'),
(25, 'Vendedor'),
(26, 'Cajero'),
(27, 'Gerente general');

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
('3', 'Luís', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\3.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\3.pdf', '413', 'luis@ma.com', 'Cra. 65 #98 A-75, Medellín, Antioquia', -75.5715315, 6.2938986, '6', '20'),
('4', 'Ana', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\4.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\4.pdf', '414', 'ana@ma.com', 'Cra. 51 #58-69, Medellín, Antioquia', -75.5683161, 6.2576409, '6', '10'),
('5', 'Lina', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\5.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\5.pdf', '415', 'lina@ma.com', 'Cl. 47A ##85 - 20, Medellín, Antioquia', -75.6026462, 6.2504554, '6', '30'),
('6', 'Gerardo', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\fotos\\6.jpg', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\hvs\\6.pdf', '416', 'gerardo@ma.com', 'Cl. 95 #74b-57, Medellín, Antioquia', -75.5790301121926, 6.2921190558127735, NULL, '60'),
('7', 'Gabriela', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\fotos\\7.jpg', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\hvs\\7.pdf', '417', 'gerardo@ma.com', 'Cl. 38a #80-7, Medellín, Antioquia', -75.60028196030213, 6.247450438743179, '6', '40'),
('8', 'Gonzalo', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\fotos\\8.jpg', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\hvs\\8.pdf', '418', 'gerardo@ma.com', 'Cl. 32EE #80-129, Medellín, Antioquia', -75.60063384503952, 6.237608403201256, '6', '50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `IDESTADO` varchar(1) NOT NULL,
  `NOMBRE` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`IDESTADO`, `NOMBRE`) VALUES
('1', 'Radicado'),
('2', 'Asignado'),
('3', 'Solucionado parc'),
('4', 'Solucionado Tota'),
('5', 'Cancelado');

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
  MODIFY `IDCARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
