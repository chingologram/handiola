-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-08-2019 a las 16:50:00
-- Versión del servidor: 10.2.23-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u765359488_handi`
--
CREATE DATABASE IF NOT EXISTS `u765359488_handi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u765359488_handi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolars`
--

DROP TABLE IF EXISTS `dolars`;
CREATE TABLE IF NOT EXISTS `dolars` (
  `id` int(11) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `activo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `dolars`
--

TRUNCATE TABLE `dolars`;
--
-- Volcado de datos para la tabla `dolars`
--

INSERT INTO `dolars` (`id`, `valor`, `activo`, `created_at`, `updated_at`) VALUES
(1, 40.00, 1, NULL, '2019-07-28 21:28:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_29_082023_create_reservas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_reserva` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mp_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad_habitaciones` int(11) NOT NULL,
  `cantidad_banos` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_desde` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_hasta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_dias` int(11) NOT NULL,
  `costo_total` decimal(8,2) NOT NULL,
  `direccion_alojamiento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_llave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_llave` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_llave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `reservas`
--

TRUNCATE TABLE `reservas`;
--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `no_reserva`, `user_id`, `mp_id`, `mp_link`, `mp_status`, `cantidad_habitaciones`, `cantidad_banos`, `fecha_reserva`, `fecha_desde`, `fecha_hasta`, `numero_dias`, `costo_total`, `direccion_alojamiento`, `reservante`, `hora_llave`, `fecha_llave`, `direccion_llave`, `estado`, `created_at`, `updated_at`) VALUES
(1, 111, 1, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-c0024e5b-5812-4e26-a62b-043d77822098', NULL, 1, 2, '2019-05-01', '2019-04-18', '2019-04-20', 2, '100.00', 'av corrientes 4325', 'TEST', 'null', '2019-05-01', NULL, 'Pendiente', NULL, '2019-05-01 13:08:36'),
(51, 112, 85, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-94194fd9-fb4d-4876-b462-35f43527a68e', NULL, 1, 1, '2019-04-17', '2019-04-21', '2019-04-24', 3, '600.00', 'Avenida Gaona, Buenos Aires, Argentina', 'Isaias diaz', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-04-17 12:41:02', '2019-04-17 12:41:02'),
(52, 113, 85, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-b818347a-a8b7-4220-a24e-da04ccbd917a', NULL, 1, 1, '2019-04-17', '2019-04-22', '2019-04-23', 1, '600.00', 'Avenida Gaona, Buenos Aires, Argentina', 'Isaias', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-04-17 12:42:01', '2019-04-17 12:42:01'),
(53, 114, 87, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-11e6b35b-6827-468f-9023-3ec694289049', NULL, 2, 1, '2019-04-17', '2019-04-21', '2019-04-22', 1, '936.69', 'Av. Las Heras 2163, Buenos Aires, Argentina', 'Prueba', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-04-17 20:20:33', '2019-04-17 20:20:33'),
(54, 115, 89, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-14feacf8-b651-49b7-9c4a-2adca5a1d208', NULL, 1, 1, '2019-05-01', '2019-05-10', '2019-05-11', 1, '885.80', 'Av. Corrientes 4325, Buenos Aires, Argentina', 'carlos', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-05-01 13:19:45', '2019-05-01 13:19:45'),
(55, 116, 91, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-4ced4fae-e656-4dbf-b6ea-1261bf4aaa7d', NULL, 2, 3, '2019-05-03', '2019-05-23', '2019-05-31', 8, '1778.76', 'Buenos Aires, CABA, Argentina', 'presto', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-05-03 19:40:39', '2019-05-03 19:40:39'),
(56, 117, 91, '321582894', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-79884303-879e-4c6d-a12c-ada6c2cd662a', NULL, 2, 3, '2019-05-03', '2019-05-23', '2019-05-31', 8, '1778.76', 'Buenos Aires, CABA, Argentina', 'presto', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-05-03 19:40:43', '2019-05-03 19:40:43'),
(57, 118, 92, '321582894-f3ead610-8f3c-45a7-ae00-e7c0906b37d0', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-f3ead610-8f3c-45a7-ae00-e7c0906b37d0', NULL, 1, 1, '2019-05-15', '2019-05-18', '2019-05-22', 4, '10.00', 'Buenos Aires, CABA, Argentina', 'Isaias Diaz', '16:00 y 18:00', NULL, NULL, 'Pago Confirmado', '2019-05-15 18:09:34', '2019-05-16 13:41:55'),
(58, 119, 92, '321582894-360fb252-1749-42b7-a0f0-6c60f2f4a0e0', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-360fb252-1749-42b7-a0f0-6c60f2f4a0e0', NULL, 2, 3, '2019-05-16', '2019-05-25', '2019-05-29', 4, '10.00', 'Buenos Aires, CABA, Argentina', 'stefania', '16:00 y 18:00', NULL, NULL, 'Pago Confirmado', '2019-05-16 14:56:08', '2019-05-16 15:03:10'),
(59, 120, 1, '321582894-8a749a75-7a9a-4cdc-9ed7-0e67fae49d4a', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-8a749a75-7a9a-4cdc-9ed7-0e67fae49d4a', NULL, 2, 2, '2019-06-12', '2019-06-15', '2019-06-16', 1, '5.00', 'Av. Corrientes 4325, Buenos Aires, Argentina', 'Juan pablo', '17:00 y 19:00', '2019-06-14', 'Av. Corrientes 4325, Buenos Aires, Argentina', 'Check In', '2019-06-12 18:24:27', '2019-06-13 17:15:04'),
(60, 121, 1, '321582894-554d458d-9384-4651-a44c-e55bec2f0414', 'https://www.mercadopago.com/mla/checkout/start?pref_id=321582894-554d458d-9384-4651-a44c-e55bec2f0414', NULL, 1, 1, '2019-07-02', '2019-07-13', '2019-07-14', 1, '843.50', 'Pringles 123, Lanús Oeste, Buenos Aires, Argentina', 'carlos', '16:00 y 18:00', '2019-07-11', 'av corrientes 2323', 'Pendiente', '2019-07-02 19:02:27', '2019-07-02 19:02:27'),
(61, 122, 99, '321582894-f99716f7-05cb-4482-b64f-d2e8c15131be', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-f99716f7-05cb-4482-b64f-d2e8c15131be', NULL, 1, 1, '2019-07-04', '2019-07-19', '2019-07-24', 5, '835.00', 'Buenos Aires, Argentina', 'Pedro Perez', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-04 20:06:55', '2019-07-04 20:06:55'),
(62, 123, 100, '321582894-8b8c3f3c-4b85-4a03-afa5-cfb5c13bad25', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-8b8c3f3c-4b85-4a03-afa5-cfb5c13bad25', NULL, 1, 1, '2019-07-04', '2019-07-18', '2019-07-20', 2, '835.00', 'Palermo, CABA, Argentina', 'No se', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-04 20:16:03', '2019-07-04 20:16:03'),
(63, 124, 100, '321582894-15ce8762-2881-4d11-a644-0b953df56d18', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-15ce8762-2881-4d11-a644-0b953df56d18', NULL, 1, 1, '2019-07-10', '2019-07-18', '2019-07-20', 2, '700.00', 'Palermo, CABA, Argentina', 'No se', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-04 20:16:07', '2019-07-10 14:07:03'),
(64, 125, 89, '321582894-a70f247f-4b13-4bd7-821d-bff6f5b87078', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-a70f247f-4b13-4bd7-821d-bff6f5b87078', NULL, 1, 1, '2019-07-10', '2019-07-14', '2019-07-15', 1, '600.00', 'Av. Corrientes 4325, Buenos Aires, Argentina', 'carlos', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-10 14:12:43', '2019-07-10 14:12:43'),
(65, 126, 1, '321582894-c62d2e9e-89cb-4b70-9c2c-b2f9be4efde2', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-c62d2e9e-89cb-4b70-9c2c-b2f9be4efde2', NULL, 1, 1, '2019-07-21', '2019-07-24', '2019-07-30', 6, '840.00', 'Av. Corrientes 4325, Buenos Aires, Argentina', 'susuna', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-21 20:33:14', '2019-07-21 20:33:14'),
(66, 127, 1, '321582894-571a055d-0be2-4d64-b58d-a3f0ce50ebaf', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-571a055d-0be2-4d64-b58d-a3f0ce50ebaf', NULL, 1, 1, '2019-07-21', '2019-07-24', '2019-07-30', 6, '840.00', 'Av. Corrientes 4325, Buenos Aires, Argentina', 'susuna', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-21 20:33:22', '2019-07-21 20:33:22'),
(67, 128, 1, '321582894-6bdb979c-cb81-4464-91c9-4b3e8f8d1015', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-6bdb979c-cb81-4464-91c9-4b3e8f8d1015', NULL, 1, 1, '2019-07-21', '2019-07-28', '2019-07-29', 1, '600.00', 'av corrientes 4325', 'susuana', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-21 20:34:28', '2019-07-21 20:34:28'),
(68, 129, 1, '321582894-c85ecd76-87a3-4a2c-9cef-60fcbca68dfe', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-c85ecd76-87a3-4a2c-9cef-60fcbca68dfe', NULL, 1, 1, '2019-07-22', '2019-07-28', '2019-07-29', 1, '600.00', 'Pringles 123, Buenos Aires, Argentina', 'pedro', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-22 14:17:57', '2019-07-22 14:17:57'),
(69, 130, 104, '321582894-8c402425-6dc8-4c3e-8082-fdd698941327', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-8c402425-6dc8-4c3e-8082-fdd698941327', NULL, 1, 1, '2019-07-22', '2019-07-24', '2019-07-30', 6, '300.00', 'Av. Corrientes 4300, Buenos Aires, Argentina', 'paula gomez angela marks', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-22 14:21:40', '2019-07-22 14:23:09'),
(70, 131, 97, '321582894-b7a553bd-4cf5-418e-baca-78c0ac693cf0', 'https://www.mercadopago.com.ar/checkout/v1/redirect?preference-id=321582894-b7a553bd-4cf5-418e-baca-78c0ac693cf0', NULL, 1, 1, '2019-07-28', '2019-08-09', '2019-08-10', 1, '800.00', 'Pringles 324, Buenos Aires, Argentina', 'carlos', '16:00 y 18:00', NULL, NULL, 'Pendiente', '2019-07-28 21:29:44', '2019-07-28 21:29:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_movil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrador` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncar tablas antes de insertar `users`
--

TRUNCATE TABLE `users`;
--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellido`, `email`, `password`, `dni`, `telefono_movil`, `domicilio`, `direccion`, `descripcion`, `administrador`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan pablo', 'Herrera', 'Handiolainfo@gmail.com', '$2y$10$pQY.F.k4jbAq1ooSghxs/.FAX9HB.RkQyQspRHnyZC0EFEvJeZwu.', NULL, '1161860830', NULL, NULL, 'Hola', 1, 'u429aoi1tLwkCi8ypVyRcDNst9g2cOgwPg8bF5aj54L540Hf1ZMEjcWvZ8xj', '2019-04-16 21:56:35', '2019-04-16 21:56:35'),
(83, 'Carlos', 'Martin', 'carloseduardomartin@yahoo.com', '$2y$10$HeRDxeH9vOuLV1m.jt9QLub1kY1deEJlAyH/6VSbnyb/Hls8DA9Cq', NULL, '34610007027', NULL, NULL, 'Test user', NULL, NULL, '2019-04-17 09:48:46', '2019-04-17 09:48:46'),
(84, 'Hola', 'Hola', 'Hola', '$2y$10$5KS3wXtNBN/tCDhvXPIGDOEJnAEgpWN7OtoSObYpdHYw76v2mAiIi', NULL, 'Hola', NULL, NULL, 'Hola', NULL, NULL, '2019-04-17 12:01:48', '2019-04-17 12:01:48'),
(85, 'Stefy de Santos', NULL, 'stefyflow89@gmail.com', NULL, NULL, '2944 392698', NULL, NULL, NULL, NULL, 'tgROdtj0zkuXmbU1fJXiGuzdsewGJ0zr1NScxfOtPAgx2hbSdR8fKq9hJba8', '2019-04-17 12:02:47', '2019-07-04 17:38:33'),
(86, 'Elis Moran de Lerena', NULL, 'elis.moran@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-17 12:35:46', '2019-04-17 12:35:46'),
(87, 'Juan Pablo Herrera', NULL, 'juanpablo.herrera@wyndhamhoteles.com', NULL, NULL, '1161860830', NULL, NULL, NULL, NULL, '2dzpeTSLrBltI4iSiT8zVo2YsiGrNopc9c74m0gHgQCWk7JiiLUZvXtMgIFR', '2019-04-17 20:17:49', '2019-06-13 17:35:34'),
(88, 'hola', 'hola', 'hola@gmail.com', '$2y$10$Vmkw6nEW5yL7YJkaBTGa3uXZ47e23q/pO3tyv91j4O/eiIEnGmIPu', NULL, 'hola', NULL, NULL, 'hola', 1, NULL, '2019-04-17 20:26:14', '2019-04-17 20:26:14'),
(89, 'Juan pablo', 'Herrera', 'Juanphs1@gmail.com', '$2y$10$fjRizIOGVT6H1OGI4ZyoaOgb1bttV4fwW0Tj4Zwd6Yu8Nvlhdw5WC', NULL, '1161860830', NULL, NULL, NULL, NULL, 'ut79sFAVdeLLcmyc2kNPuXYirsATahfCTmxMcFfW9vWV25bvfArsRB9unwe5', '2019-04-18 18:53:08', '2019-04-18 18:53:08'),
(90, 'Guillermo Palavecino', NULL, 'guille777@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'y6GqZAIJJtkRxRZNf7ljSmLwsiB14TXVKrEI2ADLrZOSNJAtZkXiSY5YlnU2', '2019-05-02 15:21:08', '2019-05-02 15:21:08'),
(91, 'wer', 'wer', 'presto@presto.com', '$2y$10$5JYMbjdEecvzmUP7yHT7UeKexsa6fHwFBx5RQY7yLrLG3DLQadimK', NULL, 'wer', NULL, NULL, 'wer', NULL, 'gzWv854234QP1q5hWIlxoTlKd9ekInnbLwdSZJzQS4KSUKfDsD6dvxowUgwF', '2019-05-03 19:37:41', '2019-05-03 19:37:41'),
(92, 'Isaias', 'Diaz', 'isaarg2312@gmail.com', '$2y$10$y7mYL3yPE5HuOsfbFArz0OPT8cescN3cTSzoLLYNGdq70l5uII6Xa', NULL, '2944 793432', NULL, NULL, 'TEST', NULL, 'POSG9A39Dn7MM1R1YZ8zyVA5uuMJhzFr2Q6mkh12QFHZtOAjmCk8Vp6gNZ4Z', '2019-05-15 18:08:26', '2019-05-16 17:17:53'),
(93, 'Jefe de Front Dazzler Recoleta', NULL, 'jefedefront@dazzlerrecoleta.com', NULL, NULL, '1531994138', NULL, NULL, NULL, NULL, 'oaiI70OYm1ASOGSS3i20q3jKlrL1mgnOpUu5RwFc198n2kubGaK8i6kAF2Ge', '2019-06-13 17:26:39', '2019-06-13 17:27:29'),
(94, 'Silvana Toscano', NULL, 's_romano_01@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-24 11:10:36', '2019-06-24 11:10:36'),
(95, 'mariela', 'ruiz', 'mariela.ruiz@localiza.com', '$2y$10$rPaGZ7P/Njsjs3ljatZquOh0tI6CXy/ye653f9RFcpQFfwm8RM7MS', NULL, '1161860830', NULL, NULL, NULL, NULL, NULL, '2019-07-02 17:19:00', '2019-07-02 17:19:00'),
(96, 'oscar', 'ovalles', 'oscarovallesgr@gmail.com', '$2y$10$uQQk.HXMwFfhRuSfnL361.QjJwLZ.Y8n7fi7nFKPQ.MivY7POJLOK', NULL, '584142404925', NULL, NULL, NULL, NULL, NULL, '2019-07-02 22:39:02', '2019-07-02 22:39:02'),
(97, 'MJ Ovalles', NULL, 'mj@ovalles.com.ve', NULL, NULL, '1161860830', NULL, NULL, NULL, NULL, 'jRQzO9lUJypNqh08CGORZta5vncQ43rWQdM96xM2XyDBdCfClbXe9nPq3PEq', '2019-07-04 17:40:27', '2019-07-04 17:40:40'),
(98, 'Andres Eduardo Herrera', NULL, 'a_herrerasilva@hotmail.com', NULL, NULL, '584241080872', NULL, NULL, NULL, NULL, 'wrd8JBa4RbYtLUkGG141BMiLnZnoPQat9ZEaXkFVistIUUCbmd94bGbvMf0Y', '2019-07-04 19:58:00', '2019-07-04 19:58:08'),
(99, 'Andres Herrera', NULL, 'aeherrerasilva@gmail.com', NULL, NULL, '584241080872', NULL, NULL, NULL, NULL, 'BbSUYrU6aX1VETMT3x4yTXUdm1FCjHsX3qhgvXJ8aIDfmuuSu5G03zspaEhV', '2019-07-04 20:01:25', '2019-07-04 20:01:32'),
(100, 'Andrea Revilla', NULL, 'andrearevilla@gmail.com', NULL, NULL, '005491127149028', NULL, NULL, NULL, NULL, 'j3g9sEoorASTDuofZXwgVNEuKesFQxb9PABdlLxUd3f8LauGARqmlPPBrces', '2019-07-04 20:13:47', '2019-07-04 20:14:05'),
(101, 'juan pablo', 'herrera', 'juan.herrera@handiola.com', '$2y$10$zIBKkXcP.VX1ituF5X7tvuRVBjq6Dc8mgmDHZsyVH3jjIa.5sMCAW', NULL, '1161860830', NULL, NULL, NULL, NULL, 'jWp2lQEwLkaKoY6FU1S3DcTzwS3y5QdS5QoVFNeSJai6IkPpVVOKYnrAlutv', '2019-07-05 11:59:28', '2019-07-05 11:59:28'),
(102, 'Maria Laura', 'Padin', 'mlpadin@hileret.com.ar', '$2y$10$3h3x2rwvzMVH4QvpA3d0RuKlz2p5xT8N2wcDtDB4ROQnW6K2TduAq', NULL, '5411 2206-2703', NULL, NULL, NULL, NULL, NULL, '2019-07-10 18:09:49', '2019-07-10 18:09:49'),
(103, 'Mariano Saez', NULL, 'saezma04@gmail.com', NULL, NULL, '2996583748', NULL, NULL, NULL, NULL, 'aLNsQrBDLJ4RvlulkekzcjH9FMAJbwuTHY5PWKfXSjC5wgSRbck0VYZ2ZZoh', '2019-07-17 16:24:27', '2019-07-17 16:24:45'),
(104, 'federico', 'detomasi', 'fede.detomasi@gmail.com', '$2y$10$.NGD3DEYzSHNKEwNJnWyoO5T2IKv1kN3zOIOOgT/eb237w.DadRPm', NULL, '11 2155 4050', NULL, NULL, NULL, NULL, 'Umj4YyaWYK8sQZeO8a28IoWKS4tZxfocmRZXPjR4oB6CJ3ufK7Ea9yOfpqgb', '2019-07-22 14:19:41', '2019-07-22 14:19:41'),
(105, 'Daniel Armando Figueroa Agostini', NULL, 'daniel.panda@gmail.com', NULL, NULL, '1166383151', NULL, NULL, NULL, NULL, '3WIBFyG6pnfheD8ztySNdTbuxXF0pxoLIirWyhpVgedInufgJztdeQLAyl3z', '2019-07-24 14:18:05', '2019-07-24 14:18:14'),
(106, 'Mariano', 'Bravo', 'Marbravo_6_12_84_93@hotmail.com', '$2y$10$K8gg1lfwfB6svmEn8xAgKeq6Y/lcYCCaCIr7tGNIylnUb5tvYgg82', NULL, '1132985226', NULL, NULL, NULL, NULL, NULL, '2019-07-26 03:32:41', '2019-07-26 03:32:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
