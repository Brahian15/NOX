-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2017 a las 08:58:10
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_acceso`
--

CREATE TABLE `nox_acceso` (
  `acc_token` varchar(250) NOT NULL,
  `usu_codigo` varchar(250) NOT NULL,
  `acc_clave` varchar(250) NOT NULL,
  `acc_intentos` int(11) NOT NULL,
  `acc_estado` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_acceso`
--

INSERT INTO `nox_acceso` (`acc_token`, `usu_codigo`, `acc_clave`, `acc_intentos`, `acc_estado`) VALUES
('6dm7HV?%?IBUOqql?inpn&Qw%UwCgtW7w2L7brq&tNPRXL9ZBB', 'USU-2017/06/19-11:06:41', '$2y$10$FUoIrWkz7B4QvAvORjQxkufmE.uRtPKBqoh9fmEDNo1uVxqrfoifm', 32, 'Activo'),
('Cx1U8Bcs40Wf3rzLa8WX0OojFHLMJvqQjsctZfq7Q7XMvN8T2t', 'USU-2017/06/26-09:06:07', '$2y$10$I8oeB1SVoT7/1pzaly.Cx.r.6.bO7JVj9s8dYiykk2C/f4ISOWpqq', 1, 'Activo'),
('H47HE1WQ94CrGjmlclUUcftWCDLPXA0naHVXI4Iozi82dsmKBa', 'USU-2017/06/27-08:06:58', '$2y$10$aRso31UCYMadgq7WMjZBQu8FbMSeND4rKsOMFXwWYxWH1x4v/E.vG', 0, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_acceso_establecimiento`
--

CREATE TABLE `nox_acceso_establecimiento` (
  `acc_token_est` varchar(250) NOT NULL,
  `acc_clave_est` varchar(250) NOT NULL,
  `acc_intentos_est` int(11) NOT NULL,
  `acc_estado_est` tinytext NOT NULL,
  `est_codigo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_acceso_establecimiento`
--

INSERT INTO `nox_acceso_establecimiento` (`acc_token_est`, `acc_clave_est`, `acc_intentos_est`, `acc_estado_est`, `est_codigo`) VALUES
('ChiJl2gh8fpdBD5YOp7ynhRpou9wrJllCfhQvKiverfim3sF0O', '$2y$10$QBpJ0TJ77iCsWRXMULOPgO.ZFEfSLdFd4snV0UkqadzfGVvtJiW2i', 0, '0', 'EST-2017/06/21-11:06:01'),
('gzZh8EIhkrSUqEODwvmpeISJDubxjzEjoa61qZS8xgQCjHjXQx', '$2y$10$CbVQbAsjaA0yUE7T51JCO.CHSn4Buzwhs4nNlXIMCmOoS1oXngx4C', 0, '0', 'EST-2017/06/21-11:06:39'),
('jTvOe8G8tetEug4efQede39qouyddeErETbrbzl3MPRDTNX0w2', '$2y$10$xB2nfESC224syk7HSmPCJe2kiJa9o.Ju0zBpvIsQag5UP2QMGxYoS', 10, '0', 'EST-2017/06/28-03:06:39'),
('lSY4VjbalWjo9uIctbfzUJdYwmvnVMqfddQyYn6Liv1QNhYgxX', '$2y$10$DSapz5d4A4UYwcD5qWQm4eveSlHlBjbMRFV8hn8GL4tzilxYcn3Mq', 0, '0', 'EST-2017/06/21-11:06:11'),
('wrlEz7WbORQHQppHKYr78gks5vSFcqsdzdT4NDxIXRf6FElHZb', '$2y$10$ud9TMmAb99eQ1QFYGKAn/.SY3whlEBScIoEnGdbkzI11EbfEdv2ra', 0, '0', 'EST-2017/06/21-11:06:15'),
('y5QxtrGCjCzrHkRtJOnIYMuAxr250wlGufglzk9wlZQdpWFRQp', '$2y$10$KsvxGEZCL/LQB7yV0qbEw.xAOVhgWFoEzdge3OXDdMt3xtMNuF2sy', 0, '0', 'EST-2017/06/21-11:06:36'),
('YBOFyZvWHbGv9wPr7QVmkuplYkgZNGYoZpu9jQhlXPkzDH5WAk', '$2y$10$R6yY0vACe7qLYqX2WOmve.chs6pABKnPThbEssXVQVK/5j7lHiHeC', 0, '0', 'EST-2017/06/27-08:06:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_artista`
--

CREATE TABLE `nox_artista` (
  `art_codigo` varchar(250) NOT NULL,
  `art_nombre` tinytext NOT NULL,
  `art_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_cancion`
--

CREATE TABLE `nox_cancion` (
  `can_codigo` varchar(250) NOT NULL,
  `art_codigo` varchar(250) NOT NULL,
  `gen_codigo` varchar(250) NOT NULL,
  `can_nombre` varchar(50) NOT NULL,
  `can_duracion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_establecimiento`
--

CREATE TABLE `nox_establecimiento` (
  `est_codigo` varchar(250) NOT NULL,
  `est_foto` varchar(250) DEFAULT NULL,
  `est_nombre_usuario` tinytext,
  `est_correo` tinytext,
  `est_nombre` tinytext,
  `est_nit` int(11) DEFAULT NULL,
  `est_direccion` tinytext,
  `est_telefono` int(11) DEFAULT NULL,
  `est_celular` int(11) DEFAULT NULL,
  `est_genero` tinytext,
  `est_latitud` tinytext,
  `est_longitud` tinytext,
  `est_estado` tinytext,
  `est_key` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_establecimiento`
--

INSERT INTO `nox_establecimiento` (`est_codigo`, `est_foto`, `est_nombre_usuario`, `est_correo`, `est_nombre`, `est_nit`, `est_direccion`, `est_telefono`, `est_celular`, `est_genero`, `est_latitud`, `est_longitud`, `est_estado`, `est_key`) VALUES
('EST-2017/06/21-11:06:01', 'intranet/uploads/NCJqAzF7FxnBpYZ5EQ3kICHvsgvmdf201706211101.jpg', 'New York', 'carlosjagudelop@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Inactivo', NULL),
('EST-2017/06/21-11:06:11', 'intranet/uploads/N08fOwFmTMK0mgsq5VoknfDW6bNXBd201706211111.jpg', 'Quince Minutos', 'carlosjagudelop@gmail.com', NULL, NULL, 'Autopista sur', NULL, NULL, NULL, NULL, NULL, 'Inactivo', NULL),
('EST-2017/06/21-11:06:15', 'intranet/uploads/GuydBWqWX0d55a0SOnp1v8uK0nRKEA201706211115.jpg', 'Mangos', 'carlosjagudelop@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Inactivo', NULL),
('EST-2017/06/21-11:06:36', 'intranet/uploads/urg6ErKfZNTzQ0Nh4135ZjKetRtqR7201706211136.jpg', 'LicoDeluxe', 'carlosjagudelop@gmail.com', 'LicoDeluxe', 123456789, 'cra 53 a #84 a 13', 2553563, 30468319, 'Rock', '12', '12', 'Inactivo', NULL),
('EST-2017/06/21-11:06:39', 'intranet/uploads/a5ItIv2KPbo3QzSDAD5bpR7WaczCc9201706211139.jpg', 'Palmahia', 'carlosjagudelop@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Inactivo', NULL),
('EST-2017/06/27-08:06:34', 'intranet/uploads/x1w18VEFRfIza4UA20X3W74QQ10gdO201706270834.jpg', 'Sixttina', 'capdim0817@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Activo', NULL),
('EST-2017/06/28-03:06:39', 'intranet/uploads/lw6Ff2DhnSyWYURhIr0nRmXO7YbHH9201706280339.jpg', 'nox', 'noxmedellin@gmail.com', 'prueba', 1232, '43243', 23423423, 2147483647, 'Masculino', NULL, NULL, 'Activo', 'f34f29d53c7301915ee50ffa4b98a6ba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_evento`
--

CREATE TABLE `nox_evento` (
  `eve_codigo` varchar(250) NOT NULL,
  `est_codigo` varchar(250) NOT NULL,
  `eve_nombre` tinytext NOT NULL,
  `eve_foto` varchar(100) NOT NULL,
  `eve_fecha` date NOT NULL,
  `eve_hora` tinytext NOT NULL,
  `eve_descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_genero`
--

CREATE TABLE `nox_genero` (
  `gen_codigo` varchar(250) NOT NULL,
  `gen_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_historial`
--

CREATE TABLE `nox_historial` (
  `his_codigo` varchar(250) NOT NULL,
  `usu_codigo` varchar(250) NOT NULL,
  `his_fecha` date NOT NULL,
  `his_descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_permiso`
--

CREATE TABLE `nox_permiso` (
  `per_codigo` varchar(250) NOT NULL,
  `per_nombre` tinytext NOT NULL,
  `per_estado` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_permiso_rol`
--

CREATE TABLE `nox_permiso_rol` (
  `per_rol_codigo` varchar(250) NOT NULL,
  `per_codigo` varchar(250) NOT NULL,
  `rol_codigo` varchar(250) NOT NULL,
  `per_rol_descripcion` tinytext,
  `per_rol_estado` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_promocion`
--

CREATE TABLE `nox_promocion` (
  `prom_codigo` varchar(250) NOT NULL,
  `est_codigo` varchar(250) NOT NULL,
  `prom_nombre` tinytext NOT NULL,
  `prom_foto` varchar(100) NOT NULL,
  `prom_fecha` date NOT NULL,
  `prom_descripcion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_promocion`
--

INSERT INTO `nox_promocion` (`prom_codigo`, `est_codigo`, `prom_nombre`, `prom_foto`, `prom_fecha`, `prom_descripcion`) VALUES
('PROM-2017/06/29-08:06:21', 'EST-2017/06/28-03:06:39', 'Cocteles DOSxUNO', 'intranet/promos/rPNibRZYbN3X1kkIOGEe8AnX6glShp201706290821.jpg', '2017-06-29', 'Coctels 2x1 toda la noche a partir de las 7pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_reserva`
--

CREATE TABLE `nox_reserva` (
  `res_codigo` varchar(250) NOT NULL,
  `est_codigo` varchar(250) NOT NULL,
  `usu_codigo` varchar(250) NOT NULL,
  `res_estado` varchar(20) NOT NULL,
  `res_numero_personas` int(11) NOT NULL,
  `res_fecha` tinytext NOT NULL,
  `res_acontecimiento` tinytext NOT NULL,
  `res_descripcion` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_reserva`
--

INSERT INTO `nox_reserva` (`res_codigo`, `est_codigo`, `usu_codigo`, `res_estado`, `res_numero_personas`, `res_fecha`, `res_acontecimiento`, `res_descripcion`) VALUES
('RES-2017/06/26-11:06:01', 'EST-2017/06/21-11:06:15', 'USU-2017/06/19-11:06:41', 'Activo', 21, '2017-06-30', 'Reunion', NULL),
('RES-2017/06/26-11:06:12', 'EST-2017/06/21-11:06:15', 'USU-2017/06/19-11:06:41', 'Activo', 2, '2017-06-01', 'Reunion', NULL),
('RES-2017/06/27-04:06:30', 'EST-2017/06/21-11:06:36', 'USU-2017/06/19-11:06:41', 'Activo', 12, '2017-06-20', 'Reunion', NULL),
('RES-2017/06/27-06:06:07', 'EST-2017/06/21-11:06:36', 'USU-2017/06/26-09:06:07', 'Activo', 5, '2017-08-17', 'Cumpleaños', NULL),
('RES-2017/06/28-04:06:49', 'EST-2017/06/21-11:06:15', 'USU-2017/06/19-11:06:41', 'Activo', 23, '2017-06-08', 'Aniversario', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_rol`
--

CREATE TABLE `nox_rol` (
  `rol_codigo` varchar(250) NOT NULL,
  `rol_nombre` tinytext NOT NULL,
  `rol_estado` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_rol`
--

INSERT INTO `nox_rol` (`rol_codigo`, `rol_nombre`, `rol_estado`) VALUES
('1', 'admin', 'activo'),
('2', 'usuario', 'activo'),
('3', 'establecimiento', 'activo'),
('4', 'dj', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_solicitud`
--

CREATE TABLE `nox_solicitud` (
  `sol_codigo` varchar(250) NOT NULL,
  `sol_cancion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_solicitud_cancion`
--

CREATE TABLE `nox_solicitud_cancion` (
  `can_codigo` varchar(250) NOT NULL,
  `sol_codigo` varchar(250) NOT NULL,
  `sol_can_nombre` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_usuario`
--

CREATE TABLE `nox_usuario` (
  `usu_codigo` varchar(250) NOT NULL,
  `rol_codigo` varchar(30) DEFAULT NULL,
  `usu_foto` varchar(250) DEFAULT NULL,
  `usu_nom_usuario` text,
  `usu_nombre` tinytext,
  `usu_apellido` tinytext,
  `usu_email` tinytext,
  `usu_genero` tinytext,
  `usu_fecha_nacimiento` date DEFAULT NULL,
  `usu_estado` text,
  `usu_fecha_registro` varchar(250) DEFAULT NULL,
  `usu_key` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nox_usuario`
--

INSERT INTO `nox_usuario` (`usu_codigo`, `rol_codigo`, `usu_foto`, `usu_nom_usuario`, `usu_nombre`, `usu_apellido`, `usu_email`, `usu_genero`, `usu_fecha_nacimiento`, `usu_estado`, `usu_fecha_registro`, `usu_key`) VALUES
('USU-2017/06/19-11:06:41', '2', '', 'carlos', 'Carlos', 'Agudelo', 'cjagudelo55@misena.edu.co', 'Masculino', '2017-06-17', 'Activo', '2017/06/19', '5ddfa892e902880d438ae391ec92501b'),
('USU-2017/06/26-09:06:07', '2', '', 'prueba', 'Carlos', 'Agudelo', 'carlosjagudelop@gmail.com', 'Masculino', '2017-06-14', 'Activo', '2017/06/26', NULL),
('USU-2017/06/27-08:06:58', '2', '', 'correoNoexiste', NULL, NULL, 'noexiste@elcorreo.eliminar', NULL, NULL, 'Activo', '2017/06/27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nox_usuario_solicitud`
--

CREATE TABLE `nox_usuario_solicitud` (
  `usu_codigo` varchar(250) NOT NULL,
  `sol_codigo` varchar(250) NOT NULL,
  `usu_sol_cancion_solicitada` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `nox_acceso`
--
ALTER TABLE `nox_acceso`
  ADD PRIMARY KEY (`acc_token`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `nox_acceso_establecimiento`
--
ALTER TABLE `nox_acceso_establecimiento`
  ADD PRIMARY KEY (`acc_token_est`),
  ADD KEY `est_codigo` (`est_codigo`);

--
-- Indices de la tabla `nox_artista`
--
ALTER TABLE `nox_artista`
  ADD PRIMARY KEY (`art_codigo`);

--
-- Indices de la tabla `nox_cancion`
--
ALTER TABLE `nox_cancion`
  ADD PRIMARY KEY (`can_codigo`),
  ADD KEY `art_codigo` (`art_codigo`),
  ADD KEY `gen_codigo` (`gen_codigo`);

--
-- Indices de la tabla `nox_establecimiento`
--
ALTER TABLE `nox_establecimiento`
  ADD PRIMARY KEY (`est_codigo`);

--
-- Indices de la tabla `nox_evento`
--
ALTER TABLE `nox_evento`
  ADD PRIMARY KEY (`eve_codigo`),
  ADD KEY `est_codigo` (`est_codigo`);

--
-- Indices de la tabla `nox_genero`
--
ALTER TABLE `nox_genero`
  ADD PRIMARY KEY (`gen_codigo`);

--
-- Indices de la tabla `nox_historial`
--
ALTER TABLE `nox_historial`
  ADD PRIMARY KEY (`his_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `nox_permiso`
--
ALTER TABLE `nox_permiso`
  ADD PRIMARY KEY (`per_codigo`);

--
-- Indices de la tabla `nox_permiso_rol`
--
ALTER TABLE `nox_permiso_rol`
  ADD PRIMARY KEY (`per_rol_codigo`),
  ADD KEY `per_codigo` (`per_codigo`),
  ADD KEY `rol_codigo` (`rol_codigo`);

--
-- Indices de la tabla `nox_promocion`
--
ALTER TABLE `nox_promocion`
  ADD PRIMARY KEY (`prom_codigo`),
  ADD KEY `est_codigo` (`est_codigo`);

--
-- Indices de la tabla `nox_reserva`
--
ALTER TABLE `nox_reserva`
  ADD PRIMARY KEY (`res_codigo`),
  ADD KEY `est_codigo` (`est_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `nox_rol`
--
ALTER TABLE `nox_rol`
  ADD PRIMARY KEY (`rol_codigo`);

--
-- Indices de la tabla `nox_solicitud`
--
ALTER TABLE `nox_solicitud`
  ADD PRIMARY KEY (`sol_codigo`);

--
-- Indices de la tabla `nox_solicitud_cancion`
--
ALTER TABLE `nox_solicitud_cancion`
  ADD PRIMARY KEY (`can_codigo`,`sol_codigo`),
  ADD KEY `sol_codigo` (`sol_codigo`);

--
-- Indices de la tabla `nox_usuario`
--
ALTER TABLE `nox_usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD KEY `rol_codigo` (`rol_codigo`);

--
-- Indices de la tabla `nox_usuario_solicitud`
--
ALTER TABLE `nox_usuario_solicitud`
  ADD PRIMARY KEY (`usu_codigo`,`sol_codigo`),
  ADD KEY `sol_codigo` (`sol_codigo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nox_acceso`
--
ALTER TABLE `nox_acceso`
  ADD CONSTRAINT `nox_acceso_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `nox_usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_acceso_establecimiento`
--
ALTER TABLE `nox_acceso_establecimiento`
  ADD CONSTRAINT `nox_acceso_establecimiento_ibfk_1` FOREIGN KEY (`est_codigo`) REFERENCES `nox_establecimiento` (`est_codigo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_cancion`
--
ALTER TABLE `nox_cancion`
  ADD CONSTRAINT `nox_cancion_ibfk_1` FOREIGN KEY (`art_codigo`) REFERENCES `nox_artista` (`art_codigo`),
  ADD CONSTRAINT `nox_cancion_ibfk_2` FOREIGN KEY (`gen_codigo`) REFERENCES `nox_genero` (`gen_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_evento`
--
ALTER TABLE `nox_evento`
  ADD CONSTRAINT `nox_evento_ibfk_1` FOREIGN KEY (`est_codigo`) REFERENCES `nox_establecimiento` (`est_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_historial`
--
ALTER TABLE `nox_historial`
  ADD CONSTRAINT `nox_historial_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `nox_usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_permiso_rol`
--
ALTER TABLE `nox_permiso_rol`
  ADD CONSTRAINT `nox_permiso_rol_ibfk_1` FOREIGN KEY (`per_codigo`) REFERENCES `nox_permiso` (`per_codigo`),
  ADD CONSTRAINT `nox_permiso_rol_ibfk_2` FOREIGN KEY (`rol_codigo`) REFERENCES `nox_rol` (`rol_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_promocion`
--
ALTER TABLE `nox_promocion`
  ADD CONSTRAINT `nox_promocion_ibfk_1` FOREIGN KEY (`est_codigo`) REFERENCES `nox_establecimiento` (`est_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_reserva`
--
ALTER TABLE `nox_reserva`
  ADD CONSTRAINT `nox_reserva_ibfk_1` FOREIGN KEY (`est_codigo`) REFERENCES `nox_establecimiento` (`est_codigo`),
  ADD CONSTRAINT `nox_reserva_ibfk_2` FOREIGN KEY (`usu_codigo`) REFERENCES `nox_usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_solicitud_cancion`
--
ALTER TABLE `nox_solicitud_cancion`
  ADD CONSTRAINT `nox_solicitud_cancion_ibfk_1` FOREIGN KEY (`can_codigo`) REFERENCES `nox_cancion` (`can_codigo`),
  ADD CONSTRAINT `nox_solicitud_cancion_ibfk_2` FOREIGN KEY (`sol_codigo`) REFERENCES `nox_solicitud` (`sol_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_usuario`
--
ALTER TABLE `nox_usuario`
  ADD CONSTRAINT `nox_usuario_ibfk_1` FOREIGN KEY (`rol_codigo`) REFERENCES `nox_rol` (`rol_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `nox_usuario_solicitud`
--
ALTER TABLE `nox_usuario_solicitud`
  ADD CONSTRAINT `nox_usuario_solicitud_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `nox_usuario` (`usu_codigo`),
  ADD CONSTRAINT `nox_usuario_solicitud_ibfk_2` FOREIGN KEY (`sol_codigo`) REFERENCES `nox_solicitud` (`sol_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
