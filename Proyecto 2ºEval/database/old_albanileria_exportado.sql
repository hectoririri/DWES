-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2025 a las 01:57:17
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
-- Base de datos: `albanileria_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cif` varchar(9) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `cuenta_corriente` varchar(100) DEFAULT NULL,
  `moneda` varchar(50) DEFAULT NULL,
  `importe_mensual` decimal(19,4) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `fecha_actualizado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cif`, `nombre`, `telefono`, `correo`, `pais`, `cuenta_corriente`, `moneda`, `importe_mensual`, `fecha_alta`, `fecha_actualizado`) VALUES
(1, 'A12345678', 'Empresa S.A.', '900123456', 'contacto@empresa.com', 'España', 'ES7620770024003102575766', 'EUR', 1000.0000, '2023-01-01', NULL),
(2, 'B23456789', 'Compañía SL', '900234567', 'info@compania.com', 'España', 'ES9121000418450200051332', 'EUR', 2000.0000, '2023-02-01', NULL),
(3, 'C34567890', 'Negocio SL', '900345678', 'contacto@negocio.com', 'España', 'ES7620770024003102575767', 'EUR', 1500.0000, '2023-03-01', NULL),
(4, 'D45678901', 'Industria SA', '900456789', 'info@industria.com', 'España', 'ES9121000418450200051333', 'EUR', 2500.0000, '2023-04-01', NULL),
(5, 'E56789012', 'Servicios SL', '900567890', 'contacto@servicios.com', 'España', 'ES7620770024003102575768', 'EUR', 3000.0000, '2023-05-01', NULL),
(6, 'F67890123', 'Comercio SA', '900678901', 'info@comercio.com', 'España', 'ES9121000418450200051334', 'EUR', 3500.0000, '2023-06-01', NULL),
(7, 'G78901234', 'Consultoria SL', '900789012', 'contacto@consultoria.com', 'España', 'ES7620770024003102575769', 'EUR', 4000.0000, '2023-07-01', NULL),
(8, 'H89012345', 'Tecnologia SA', '900890123', 'info@tecnologia.com', 'España', 'ES9121000418450200051335', 'EUR', 4500.0000, '2023-08-01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuota`
--

CREATE TABLE `cuota` (
  `id` int(11) NOT NULL,
  `concepto` varchar(150) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `importe` decimal(19,4) DEFAULT NULL,
  `pagada` tinyint(1) DEFAULT 0,
  `fecha_pago` date DEFAULT NULL,
  `notas` varchar(150) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuota`
--

INSERT INTO `cuota` (`id`, `concepto`, `fecha_emision`, `importe`, `pagada`, `fecha_pago`, `notas`, `cliente_id`) VALUES
(1, 'Cuota Enero', '2023-01-01', 500.0000, 0, '2023-01-15', 'Pago pendiente', 1),
(2, 'Cuota Febrero', '2023-02-01', 600.0000, 1, '2023-02-15', 'Pago realizado', 2),
(3, 'Cuota Marzo', '2023-03-01', 700.0000, 0, '2023-03-15', 'Pago pendiente', 3),
(4, 'Cuota Abril', '2023-04-01', 800.0000, 1, '2023-04-15', 'Pago realizado', 4),
(5, 'Cuota Mayo', '2023-05-01', 900.0000, 0, '2023-05-15', 'Pago pendiente', 5),
(6, 'Cuota Junio', '2023-06-01', 1000.0000, 1, '2023-06-15', 'Pago realizado', 6),
(7, 'Cuota Julio', '2023-07-01', 1100.0000, 0, '2023-07-15', 'Pago pendiente', 7),
(8, 'Cuota Agosto', '2023-08-01', 1200.0000, 1, '2023-08-15', 'Pago realizado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `cod` char(2) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`cod`, `nombre`) VALUES
('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almería'),
('05', 'Avila'),
('06', 'Badajoz'),
('07', 'Balears (Illes)'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('12', 'Castellón'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('15', 'Coruña (A)'),
('16', 'Cuenca'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('20', 'Guipúzcoa'),
('21', 'Huelva'),
('22', 'Huesca'),
('23', 'Jaén'),
('24', 'León'),
('25', 'Lleida'),
('26', 'Rioja (La)'),
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('33', 'Asturias'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
('39', 'Cantabria'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia'),
('47', 'Valladolid'),
('48', 'Vizcaya'),
('49', 'Zamora'),
('50', 'Zaragoza'),
('51', 'Ceuta'),
('52', 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `cod_postal` char(5) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `estado` enum('C','P','R','B') DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_realizacion` date DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  `operario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `anotaciones_anteriores` text DEFAULT NULL,
  `anotaciones_posteriores` text DEFAULT NULL,
  `fichero` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `operario_asignado` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `descripcion`, `correo`, `direccion`, `poblacion`, `cod_postal`, `provincia`, `estado`, `fecha_creacion`, `fecha_realizacion`, `fecha_actualizacion`, `operario_id`, `cliente_id`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fichero`, `foto`, `operario_asignado`) VALUES
(41, 'Reparación de fuga en baño', 'cliente1@example.com', 'Calle Mayor 12', 'Madrid', '28001', 'Madrid', 'P', '2025-01-20', NULL, '2025-01-21', 1, 3, 'Detectada fuga bajo lavabo', 'Pendiente de aprobación', NULL, NULL, 0),
(42, 'Instalación de tuberías', 'cliente2@example.com', 'Av. Andalucía 45', 'Sevilla', '41005', 'Sevilla', 'B', '2025-01-18', NULL, NULL, 2, 1, NULL, NULL, NULL, NULL, 0),
(43, 'Pintado de fachada', 'cliente3@example.com', 'Calle Gran Vía 30', 'Barcelona', '08010', 'Barcelona', 'R', '2025-01-10', '2025-01-15', '2025-01-16', 3, 2, 'Fachada en mal estado', 'Trabajo finalizado con éxito', 'presupuesto.pdf', 'fachada_final.jpg', 0),
(44, 'Cambio de baldosas', 'cliente4@example.com', 'Calle Serrano 8', 'Madrid', '28006', 'Madrid', 'P', '2025-01-22', NULL, NULL, 4, 5, NULL, NULL, NULL, NULL, 0),
(45, 'Revisión eléctrica', 'cliente5@example.com', 'Calle Alcazaba 7', 'Málaga', '29015', 'Málaga', 'B', '2025-01-19', NULL, NULL, 1, 4, 'Algunas luces parpadean', 'Esperando aprobación del cliente', NULL, NULL, 0),
(46, 'Impermeabilización de terraza', 'cliente6@example.com', 'Av. Libertad 32', 'Valencia', '46002', 'Valencia', 'C', '2025-01-12', NULL, '2025-01-14', 2, 6, 'Filtraciones en techo inferior', 'Cliente canceló por presupuesto alto', NULL, NULL, 0),
(47, 'Colocación de pladur', 'cliente7@example.com', 'Calle Río Ebro 5', 'Zaragoza', '50002', 'Zaragoza', 'P', '2025-01-23', NULL, NULL, 3, 2, NULL, NULL, NULL, NULL, 0),
(48, 'Pavimentación de garaje', 'cliente8@example.com', 'Calle Real 20', 'Granada', '18001', 'Granada', 'R', '2025-01-05', '2025-01-08', '2025-01-09', 4, 3, 'Hormigón anterior muy deteriorado', 'Obra completada', 'factura.pdf', 'garaje_nuevo.jpg', 0),
(49, 'Sustitución de ventanas', 'cliente9@example.com', 'Av. Castilla 14', 'Valladolid', '47008', 'Valladolid', 'P', '2025-01-24', NULL, NULL, 1, 7, NULL, NULL, NULL, NULL, 0),
(50, 'Reforma integral de baño', 'cliente10@example.com', 'Calle Sol 3', 'Alicante', '03001', 'Alicante', 'B', '2025-01-17', NULL, NULL, 2, 8, 'Baño con instalaciones antiguas', 'Aprobado, en espera de materiales', 'presupuesto_baño.pdf', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dni` varchar(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `rol` enum('A','O') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `name`, `email`, `telefono`, `direccion`, `rol`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '12345678A', 'Juan Pérez', 'juan.perez@example.com', '600123456', 'Calle Mayor 12, Madrid', 'O', NULL, 'hashed_password_1', NULL, '2025-01-01 09:00:00', '2025-01-02 11:30:00', NULL),
(2, '87654321B', 'María López', 'maria.lopez@example.com', '610987654', 'Av. Andalucía 45, Sevilla', 'O', NULL, 'hashed_password_2', NULL, '2025-01-02 10:15:00', '2025-01-30 21:43:56', '2025-01-30 21:43:56'),
(3, '11223344C', 'Carlos Sánchez', 'carlos.sanchez@example.com', '620345678', 'Calle Gran Vía 30, Barcelona', 'O', NULL, 'hashed_password_3', NULL, '2025-01-03 08:45:00', '2025-01-04 14:00:00', NULL),
(4, '44332211D', 'Lucía Fernández', 'lucia.fernandez@example.com', '630456789', 'Calle Serrano 8, Madrid', 'O', NULL, 'hashed_password_4', NULL, '2025-01-04 13:20:00', '2025-01-05 16:10:00', NULL),
(5, '55667788E', 'David Martínez', 'david.martinez@example.com', '640567890', 'Calle Alcazaba 7, Málaga', 'O', NULL, 'hashed_password_5', NULL, '2025-01-05 07:30:00', '2025-01-06 18:30:00', NULL),
(6, '99887766F', 'Ana Torres', 'ana.torres@example.com', '650678901', 'Av. Libertad 32, Valencia', 'O', NULL, 'hashed_password_6', NULL, '2025-01-06 09:45:00', '2025-01-07 13:55:00', NULL),
(7, '33445566G', 'Miguel Romero', 'miguel.romero@example.com', '660789012', 'Calle Río Ebro 5, Zaragoza', 'O', NULL, 'hashed_password_7', NULL, '2025-01-07 11:10:00', '2025-01-08 17:20:00', NULL),
(8, '77665544H', 'Isabel Navarro', 'isabel.navarro@example.com', '670890123', 'Calle Real 20, Granada', 'O', NULL, 'hashed_password_8', NULL, '2025-01-08 15:25:00', '2025-01-09 19:40:00', NULL),
(9, '22334455I', 'Pablo Domínguez', 'pablo.dominguez@example.com', '680901234', 'Av. Castilla 14, Valladolid', 'O', NULL, 'hashed_password_9', NULL, '2025-01-09 08:00:00', '2025-01-10 21:15:00', NULL),
(10, '88990011J', 'Elena Ruiz', 'elena.ruiz@example.com', '690123456', 'Calle Sol 3, Alicante', 'A', NULL, 'hashed_password_10', NULL, '2025-01-10 06:55:00', '2025-01-11 22:30:00', NULL),
(11, '54794584M', 'nombre', 'hecnugar@gmail.com', '+34-123-45-67-89', 'mi casa', 'A', NULL, 'Contraseña56@', NULL, '2025-01-30 23:08:35', '2025-01-30 23:08:55', '2025-01-30 23:08:55'),
(12, '12345678Z', 'Hector', 'hnungar584@gmail.com', '+34-123-45-67-89', 'he cambiao', 'A', NULL, 'Contraseña56@', NULL, '2025-01-30 23:25:08', '2025-01-30 23:41:08', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operario_id` (`operario_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cuota`
--
ALTER TABLE `cuota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuota`
--
ALTER TABLE `cuota`
  ADD CONSTRAINT `cuota_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`operario_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
