-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2018 a las 01:47:52
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scrumcontrolbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `ID` int(11) NOT NULL,
  `Num_Tarea` int(11) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `Descripcion_Tarea` varchar(200) NOT NULL,
  `Horas` int(11) NOT NULL,
  `Dificultad` varchar(1) NOT NULL,
  `Num_Sprint` int(11) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `ID_Dev_Asignado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `ID` int(11) NOT NULL,
  `Nombre_Grupo` varchar(50) NOT NULL,
  `ID_Proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`ID`, `Nombre_Grupo`, `ID_Proyecto`) VALUES
(1, 'JoNi', 1),
(2, 'JoJo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `ID` int(11) NOT NULL,
  `Nombre_Proyecto` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Numero_Sprint` int(11) DEFAULT NULL,
  `ID_Scrum_Master` int(11) NOT NULL,
  `ID_Product_Owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`ID`, `Nombre_Proyecto`, `Descripcion`, `Numero_Sprint`, `ID_Scrum_Master`, `ID_Product_Owner`) VALUES
(1, 'Scrum Administrator', 'Aplicacion para gestionar proyectos en scrum', 1, 3, 4),
(2, 'Git', 'Pruebas', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprint`
--

CREATE TABLE `sprint` (
  `ID` int(11) NOT NULL,
  `ID_Proyecto` int(11) NOT NULL,
  `Numero_Sprint` int(11) NOT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_entrega` date NOT NULL,
  `Horas_Maximas` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sprint`
--

INSERT INTO `sprint` (`ID`, `ID_Proyecto`, `Numero_Sprint`, `Fecha_Inicio`, `Fecha_entrega`, `Horas_Maximas`, `Estado`) VALUES
(1, 1, 1, '2018-12-03', '2018-12-11', 20, 'Actual'),
(2, 1, 2, '2018-12-12', '2018-12-18', 20, 'Proximamante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Pasword` varchar(512) NOT NULL,
  `Permisos` int(11) NOT NULL,
  `ID_Grupo` int(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nom`, `Pasword`, `Permisos`, `ID_Grupo`, `Email`) VALUES
(1, 'Jose', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 0, 1, 'joselomero0@gmail.com'),
(2, 'Nil', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 0, 1, 'nil@developer.mail'),
(3, 'Leandro', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 2, NULL, 'leandro@scrum.master'),
(4, 'Enric', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1, NULL, 'enric@product.owner'),
(5, 'Pop', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 0, 2, 'pepsort7@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Dev_ID` (`ID_Dev_Asignado`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Proyecto_ID` (`ID_Proyecto`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Scrum_Master_ID` (`ID_Scrum_Master`),
  ADD KEY `FK_Product_Owner_ID` (`ID_Product_Owner`),
  ADD KEY `FK_Numero_Sprint_ID` (`Numero_Sprint`);

--
-- Indices de la tabla `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Nom` (`Nom`),
  ADD KEY `FK_Grupo_ID` (`ID_Grupo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD CONSTRAINT `FK_Dev_ID` FOREIGN KEY (`ID_Dev_Asignado`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `FK_Proyecto_ID` FOREIGN KEY (`ID_Proyecto`) REFERENCES `proyectos` (`ID`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `FK_Numero_Sprint_ID` FOREIGN KEY (`Numero_Sprint`) REFERENCES `sprint` (`ID`),
  ADD CONSTRAINT `FK_Product_Owner_ID` FOREIGN KEY (`ID_Product_Owner`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `FK_Scrum_Master_ID` FOREIGN KEY (`ID_Scrum_Master`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_Grupo_ID` FOREIGN KEY (`ID_Grupo`) REFERENCES `grupos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
