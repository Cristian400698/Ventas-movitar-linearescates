-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2025 a las 23:38:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `movistar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linearescates`
--

CREATE TABLE `linearescates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombreMotorizado` varchar(191) DEFAULT NULL,
  `cedulaMotorizado` varchar(191) DEFAULT NULL,
  `transportadora` varchar(191) DEFAULT NULL,
  `lineaTitular` varchar(191) DEFAULT NULL,
  `nOrden` varchar(191) DEFAULT NULL,
  `nGuia` varchar(191) DEFAULT NULL,
  `direccionRegistrada` varchar(191) DEFAULT NULL,
  `ciudad` varchar(191) DEFAULT NULL,
  `departamento` varchar(191) DEFAULT NULL,
  `aliado` varchar(191) DEFAULT NULL,
  `otros` varchar(191) DEFAULT NULL,
  `tipoNovedad` varchar(191) DEFAULT NULL,
  `motivoFuerzaMayor` varchar(191) DEFAULT NULL,
  `tipificacion` varchar(191) DEFAULT NULL,
  `SubTipificacion` varchar(191) DEFAULT NULL,
  `valorEquipo` varchar(191) DEFAULT NULL,
  `Observacion` varchar(191) DEFAULT NULL,
  `simcard` varchar(191) DEFAULT NULL,
  `idVision` varchar(191) DEFAULT NULL,
  `reagendamientoImg` varchar(191) DEFAULT NULL,
  `agente` varchar(191) DEFAULT NULL,
  `cedulaAgente` varchar(191) DEFAULT NULL,
  `lineaContactoMorotizado` varchar(191) DEFAULT NULL,
  `HoraAtencionMotorizado` varchar(191) DEFAULT NULL,
  `direccionReagendamiento` varchar(191) DEFAULT NULL,
  `tkReagendamiento` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `linearescates`
--

INSERT INTO `linearescates` (`id`, `nombreMotorizado`, `cedulaMotorizado`, `transportadora`, `lineaTitular`, `nOrden`, `nGuia`, `direccionRegistrada`, `ciudad`, `departamento`, `aliado`, `otros`, `tipoNovedad`, `motivoFuerzaMayor`, `tipificacion`, `SubTipificacion`, `valorEquipo`, `Observacion`, `simcard`, `idVision`, `reagendamientoImg`, `agente`, `cedulaAgente`, `lineaContactoMorotizado`, `HoraAtencionMotorizado`, `direccionReagendamiento`, `tkReagendamiento`, `created_at`, `updated_at`) VALUES
(1, 'prueba', '1000034333', NULL, 'prueba', '1', '2', 'calle 1', 'Bogota', 'cundinamarca', 'ROBOT PHOENIX', NULL, 'FUERZA MAYOR', NULL, 'EXITOSA', 'ENTREGA EXITOSA', '4000', 'exitoso', 'NO', NULL, NULL, 'Administrador', '1000000000', '323232433544', '17:15', NULL, NULL, '2025-05-08 20:13:01', '2025-05-08 20:13:01'),
(2, 'prueba', '20030030', NULL, 'Cris', '3', '5', 'calle 4', 'Bogota', 'cundinamarca', 'OTROS', NULL, 'CLIENTE AUSENTE', NULL, 'REAGENDAMIENTO', NULL, '4000', 'pruebita', 'NO', NULL, NULL, 'Administrador', '1000000000', '323232433544', '16:14', 'calle prueba', 'tk prueba', '2025-05-08 20:15:18', '2025-05-08 20:15:18'),
(3, 'dandad', '2334432', NULL, 'sdada', 'dada', 'addad', 'daad', 'adadd', 'ada', 'OTROS', NULL, NULL, NULL, 'EXITOSA', 'ENTREGA EXITOSA', '5000', NULL, 'SI', NULL, NULL, 'Administrador', '1000000000', 'gdgdgd', '15:40', NULL, NULL, '2025-05-08 20:40:53', '2025-05-08 20:40:53'),
(4, 'jesus', '2334432', NULL, 'sdada', 'dada', 'addad', 'daad', 'adadd', 'ada', 'OTROS', NULL, 'DOCUMENTO ERRADO', NULL, 'REAGENDAMIENTO', NULL, '5000', 'pruebita', 'SI', NULL, NULL, 'Administrador', '1000000000', 'gdgdgd', '18:31', 'calle prueba', 'tk prueba', '2025-05-08 21:30:50', '2025-05-08 21:30:50'),
(5, 'dsd', '1222', NULL, 'sa', 'dsd', 'dsd', 'sdsd', 'dsd', 'dsds', NULL, NULL, NULL, NULL, 'EXITOSA', 'ENTREGA EXITOSA', '5000', 'pruebita', 'SI', NULL, NULL, 'Administrador', '1000000000', 'sdds', '17:33', NULL, NULL, '2025-05-08 21:33:47', '2025-05-08 21:33:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `linearescates`
--
ALTER TABLE `linearescates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `linearescates`
--
ALTER TABLE `linearescates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
