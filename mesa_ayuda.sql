-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2021 a las 22:34:35
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spInformeDos` ()  SELECT empleado.NOMBRE,
	CASE WHEN empleado.fkEMPLE_JEFE = 1 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 1)
	WHEN empleado.fkEMPLE_JEFE = 2 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 2)
	WHEN empleado.fkEMPLE_JEFE = 3 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 3)
	WHEN empleado.fkEMPLE_JEFE = 4 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 4)
	WHEN empleado.fkEMPLE_JEFE = 5 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 5)
	WHEN empleado.fkEMPLE_JEFE = 6 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 6)
	WHEN empleado.fkEMPLE_JEFE = 7 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 7)
	WHEN empleado.fkEMPLE_JEFE = 8 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 8)
	WHEN empleado.fkEMPLE_JEFE = 9 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 9)
	WHEN empleado.fkEMPLE_JEFE = 10 THEN (SELECT empleado.NOMBRE FROM empleado WHERE empleado.IDEMPLEADO = 10)
	ELSE 'NO TIENE JEFE DE AREA ASIGNADO'
	END NOMBREJEFE,
	area.NOMBRE AS NOMBREAREA
	FROM empleado 
	LEFT JOIN area 
	on empleado.fkAREA = area.IDAREA 
	INNER JOIN cargo_por_empleado 
	ON empleado.IDEMPLEADO = cargo_por_empleado.FKEMPLE 
	INNER JOIN cargo 
	ON cargo_por_empleado.FKCARGO = cargo.IDCARGO 
	WHERE empleado.EmpleActivo = '1'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInformeUno` ()  SELECT area.NOMBRE AS NOMBRE,
CASE WHEN area.NOMBRE = 'INFORMÁTICA' THEN 'Ana'
    WHEN area.NOMBRE = 'GESTIÓN HUMANA' THEN 'Luís'
    WHEN area.NOMBRE = 'MANTENIMIENTO' THEN 'Lina'
    WHEN area.NOMBRE = 'CONTABILIDAD' THEN 'Gabriela'
    WHEN area.NOMBRE = 'VENTAS' THEN 'Gonzalo'
    WHEN area.NOMBRE = 'Gerencia' THEN 'Gerardo'
    ELSE 'NO TIENE JEFE DE AREA ASIGNADO'
    END NOMBREJEFE,
CASE WHEN area.IDAREA = 10 THEN (SELECT COUNT(*) AS CANTIDAD 
                                 FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 10 AND empleado.EmpleActivo = '1')
    WHEN area.IDAREA = 20 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 20 AND empleado.EmpleActivo = '1')
    WHEN area.IDAREA = 30 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 30 AND empleado.EmpleActivo = '1')
    WHEN area.IDAREA = 40 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 40 AND empleado.EmpleActivo = '1')
    WHEN area.IDAREA = 50 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 50 AND empleado.EmpleActivo = '1')
    WHEN area.IDAREA = 60 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 60 AND empleado.EmpleActivo = '1')
    WHEN area.IDAREA = 70 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 70 AND empleado.EmpleActivo = '1')                               WHEN area.IDAREA = 80 THEN (SELECT COUNT(*) AS CANTIDAD 
                                FROM empleado INNER JOIN area on empleado.fkAREA = area.IDAREA WHERE area.IDAREA = 80 AND empleado.EmpleActivo = '1')
    ELSE 0
    END NROEMPLEADOS
FROM area$$

DELIMITER ;

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
(27, 'Gerente general'),
(28, 'Jefe de Sistemas');

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

--
-- Volcado de datos para la tabla `cargo_por_empleado`
--

INSERT INTO `cargo_por_empleado` (`FKCARGO`, `FKEMPLE`, `FECHAINI`, `FECHAFIN`) VALUES
(7, '1', '2021-04-24', NULL),
(8, '2', '2021-04-24', NULL),
(9, '3', '2021-04-24', NULL),
(13, '10', '2021-04-24', NULL),
(15, '5', '2021-04-24', NULL),
(16, '11', '2021-04-24', '2021-04-24'),
(21, '7', '2021-04-24', NULL),
(24, '8', '2021-04-24', NULL),
(27, '6', '2021-04-24', NULL),
(28, '4', '2021-04-24', NULL);

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
  `FKEMPLEASIGNADO` varchar(20) DEFAULT NULL,
  `RequeActivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallereq`
--

INSERT INTO `detallereq` (`IDDETALLE`, `FECHA`, `OBSERVACION`, `FKREQ`, `FKESTADO`, `FKEMPLE`, `FKEMPLEASIGNADO`, `RequeActivo`) VALUES
(1, '2021-04-24 21:25:50', 'Prueba con estado ', 1, '1', '1', NULL, 0),
(2, '2021-04-24 21:37:13', 'Prueba con estado \r\nAsignado a gabriela ', 1, '2', '1', '7', 0),
(3, '2021-04-24 21:45:47', 'Prueba con estado \r\nAsignado a gabriela\r\nSe deja impresora de respaldo mientras tinto', 1, '3', '1', '1', 1);

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
  `fkAREA` varchar(10) NOT NULL,
  `EmpleActivo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IDEMPLEADO`, `NOMBRE`, `FOTO`, `HOJAVIDA`, `TELEFONO`, `EMAIL`, `DIRECCION`, `X`, `Y`, `fkEMPLE_JEFE`, `fkAREA`, `EmpleActivo`) VALUES
('1', 'Hugo', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\1.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\1.pdf', '411', 'hugo@ma.com', 'Cl. 54a #30-01, Medellín, Antioquia', -75.5532407, 6.2453253, '4', '10', 1),
('10', 'Juan perez', 'foto.jpg', 'foto.jpg', '555555', 'Prueba@mail.com', 'Cra 89 ', 999999999, 888888888, NULL, '60', 0),
('11', 'PEPE Perez prueba', 'delete.txt', 'delete.txt', '7777777777', 'ggg22222g@ana.com', 'Cra 99 #6666', 88888888888, 99999999999, '5', '40', 0),
('2', 'Paco Prueba UPDATE', '', '', '412', 'paco@ma.com', 'Cra. 74d #732, Medellín, Antioquia', -75.5910024, 6.2736935, '4', '10', 1),
('3', 'Luís', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\3.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\3.pdf', '413', 'luis@ma.com', 'Cra. 65 #98 A-75, Medellín, Antioquia', -75.5715315, 6.2938986, '6', '20', 1),
('4', 'Ana', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\4.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\4.pdf', '414', 'ana@ma.com', 'Cra. 51 #58-69, Medellín, Antioquia', -75.5683161, 6.2576409, '6', '10', 1),
('5', 'Lina', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\fotos\\5.jpg', 'C:\\xampp\\htdocs\\proyectoMesaAyuda\\vista\\hvs\\5.pdf', '415', 'lina@ma.com', 'Cl. 47A ##85 - 20, Medellín, Antioquia', -75.6026462, 6.2504554, '6', '30', 1),
('6', 'Gerardo', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\fotos\\6.jpg', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\hvs\\6.pdf', '416', 'gerardo@ma.com', 'Cl. 95 #74b-57, Medellín, Antioquia', -75.5790301121926, 6.2921190558127735, '6', '60', 1),
('7', 'Gabriela', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\fotos\\7.jpg', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\hvs\\7.pdf', '417', 'gerardo@ma.com', 'Cl. 38a #80-7, Medellín, Antioquia', -75.60028196030213, 6.247450438743179, '6', '40', 1),
('8', 'Gonzalo', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\fotos\\8.jpg', 'C:\\xampp\\htdocs\\MesaAyuda_MateoArroyave_NiltonHenao_DiegoZapata\\vista\\hvs\\8.pdf', '418', 'gerardo@ma.com', 'Cl. 32EE #80-129, Medellín, Antioquia', -75.60063384503952, 6.237608403201256, '6', '50', 1);

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
-- Volcado de datos para la tabla `requerimiento`
--

INSERT INTO `requerimiento` (`IDREQ`, `FKAREA`) VALUES
(1, '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombre`) VALUES
(1, 'administrador del sistema'),
(2, 'cliente'),
(3, 'empleado'),
(4, 'proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `idRol` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `idRol`, `estatus`) VALUES
(1, 'Gerardo', '1234', 1, 1),
(2, 'Ana', '4567', 3, 1);

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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `IDCARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cargo_por_empleado`
--
ALTER TABLE `cargo_por_empleado`
  MODIFY `FKCARGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `detallereq`
--
ALTER TABLE `detallereq`
  MODIFY `IDDETALLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
  MODIFY `IDREQ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
