-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2024 a las 19:25:55
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pilar_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `horario` varchar(15) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`id`, `nombre`, `direccion`, `horario`, `imagen`) VALUES
(4, 'Frontón Municipal', 'C. Laguna, 1, Calvarrasa de Abajo', '09:00-22:00', 'fronton.JPG'),
(5, 'Escuelas Viejas', 'Pl. Mayor, Calvarrasa de Abajo', '09:00-22:00', 'ayto.jfif'),
(6, 'Biblioteca-Aula de informática', 'Pl. Mayor, Calvarrasa de Abajo', '09:00-22:00', 'biblioteca.jpg'),
(15, 'Pista de pádel', 'C. Sur, 16, Calvarrasa de Abajo', '09:00-22:00', 'padel.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervalos`
--

CREATE TABLE `intervalos` (
  `id` int(11) NOT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `intervalos`
--

INSERT INTO `intervalos` (`id`, `horas`) VALUES
(1, '9:00-10:00'),
(2, '10:00-11:00'),
(3, '11:00-12:00'),
(4, '12:00-13:00'),
(5, '13:00-14:00'),
(6, '14:00-15:00'),
(7, '15:00-16:00'),
(8, '16:00-17:00'),
(9, '17:00-18:00'),
(10, '18:00-19:00'),
(11, '19:00-20:00'),
(12, '20:00-21:00'),
(13, '21:00-22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_instalacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_intervalo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` enum('pendiente','aceptada','rechazada') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_instalacion`, `id_usuario`, `id_intervalo`, `fecha`, `estado`) VALUES
(26, 5, 5, 1, '2024-04-26', 'rechazada'),
(32, 5, 5, 1, '2024-05-04', 'aceptada'),
(39, 15, 10, 7, '2024-05-03', 'pendiente'),
(40, 4, 10, 2, '2024-05-05', 'rechazada'),
(42, 15, 11, 6, '2024-05-16', 'pendiente'),
(43, 4, 13, 5, '2024-05-22', 'pendiente'),
(44, 15, 12, 11, '2024-05-27', 'aceptada'),
(45, 15, 14, 7, '2024-05-05', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `perfil` enum('usuario','administrador') NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `email`, `alias`, `clave`, `perfil`) VALUES
(4, '12345678Z', 'Administrador', 'administrador@calvarrasadeabajo.es', 'admin', '$2y$10$MEf/iqAz6BE2ZRt7fiJoK.EEpeNqlUHS0W4Gokop3qV358z4zkfQq', 'administrador'),
(5, '45862611O', 'Pepe Hernández Martín', 'pepe.57@gmail.com', 'pepe', '$2y$10$b2DPG1eEwWyulEo9sbWuIeUvfyjp3cv90wq.pmtzR6VTcB1i5qG4S', 'usuario'),
(10, '75632941S', 'María García González', 'mariagarcia@hotmail.com', 'maria_g', '$2y$10$oS1zCs99lPQmfdOnykusPeSx09bF6dphSGw6jXNZXU4NEY1yMoDDq', 'usuario'),
(11, '44589625M', 'Juan Pérez García', 'juan_pg@outlook.com', 'juanpg', '$2y$10$oZJDOqcqRL9OjQ8vNiNJlO0VqvTVYrtGnIVZNHruU1v4gVbnNOGp2', 'usuario'),
(12, '85744968G', 'José Sánchez Rodríguez', 'jose_sanchez@gmail.com', 'josan5', '$2y$10$0V73kWclpUvruLUiHOxy7.xCVGO87yjUYQfiQZ7Pyw4IJaA7tMwZi', 'usuario'),
(13, '70526954P', 'Sara Hernández García', 'sarah@hotmail.com', 'sara_her', '$2y$10$eZ/L8CG3z5FYfHvzsDdY2uZD7brubeb/y6lu3mYGHHR3bSRFIaqKS', 'usuario'),
(14, '77125633L', 'Ana Rodríguez González', 'ana_ro_go@gmail.com', 'ana_23', '$2y$10$7JZ3bl0HFfmzV3EzuL27heBLLpNgLxvaBbR.PcQmAn03UVYZBaeIm', 'usuario'),
(16, '45215963T', 'Francisco Sánchez López', 'fran@gmail.com', 'fran', '$2y$10$ih6KdCNskiBnu2LlDLtpr.L8m/db/iyUl4uDhCU/i7/9OSkOhkZiG', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intervalos`
--
ALTER TABLE `intervalos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_instalacion` (`id_instalacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_intervalo` (`id_intervalo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `intervalos`
--
ALTER TABLE `intervalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_instalacion`) REFERENCES `instalaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`id_intervalo`) REFERENCES `intervalos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
