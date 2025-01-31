--
-- Estructura de tabla para la tabla `provincias`
--
CREATE TABLE `provincias` (
  `cod` char(2) PRIMARY KEY,
  `nombre` varchar(50)
);

--
-- Estructura de tabla para la tabla `cartera_clientes`
--

CREATE TABLE `clientes`(
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `cif` varchar(9),
  `nombre` varchar(30),
  `telefono` varchar(16),
  `correo` varchar(50),
  `pais` varchar(50),
  `cuenta_corriente` varchar(100),
  `moneda` varchar(50),
  `importe_mensual` DECIMAL(19,4) DEFAULT NULL,
  `fecha_alta` DATE,
  `fecha_actualizado` DATE DEFAULT NULL
);

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cuota`(
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `concepto` varchar(150),
  `fecha_emision` DATE,
  `importe` DECIMAL(19,4),
  `pagada` boolean DEFAULT 0,
  `fecha_pago` DATE DEFAULT NULL,
  `notas` varchar(150),
  `cliente_id` int(11),
   FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
);

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `descripcion` text,
  `correo` varchar(100),
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `cod_postal` char(5),
  `provincia` varchar(100) DEFAULT NULL,
  `estado` enum('C','P','R','B') DEFAULT NULL,
  `fecha_creacion` date,
  `fecha_realizacion` date DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  `operario_id` BIGINT(20) UNSIGNED,  -- Corrección de tipo de dato
  `cliente_id` int(11) DEFAULT NULL,
  `anotaciones_anteriores` text DEFAULT NULL,
  `anotaciones_posteriores` text DEFAULT NULL,
  `fichero` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
   FOREIGN KEY (`operario_id`) REFERENCES `users`(`id`),
   FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `tareas` (`descripcion`, `correo`, `direccion`, `poblacion`, `cod_postal`, `provincia`, `estado`, `fecha_creacion`, `fecha_realizacion`, `fecha_actualizacion`, `operario_id`, `cliente_id`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fichero`, `foto`) VALUES
('Reparación de fuga en baño', 'cliente1@example.com', 'Calle Mayor 12', 'Madrid', '28001', 'Madrid', 'P', '2025-01-20', NULL, '2025-01-21', 1, 3, 'Detectada fuga bajo lavabo', 'Pendiente de aprobación', NULL, NULL),
('Instalación de tuberías', 'cliente2@example.com', 'Av. Andalucía 45', 'Sevilla', '41005', 'Sevilla', 'B', '2025-01-18', NULL, NULL, 2, 1, NULL, NULL, NULL, NULL),
('Pintado de fachada', 'cliente3@example.com', 'Calle Gran Vía 30', 'Barcelona', '08010', 'Barcelona', 'R', '2025-01-10', '2025-01-15', '2025-01-16', 3, 2, 'Fachada en mal estado', 'Trabajo finalizado con éxito', 'presupuesto.pdf', 'fachada_final.jpg'),
('Cambio de baldosas', 'cliente4@example.com', 'Calle Serrano 8', 'Madrid', '28006', 'Madrid', 'P', '2025-01-22', NULL, NULL, 4, 5, NULL, NULL, NULL, NULL),
('Revisión eléctrica', 'cliente5@example.com', 'Calle Alcazaba 7', 'Málaga', '29015', 'Málaga', 'B', '2025-01-19', NULL, NULL, 1, 4, 'Algunas luces parpadean', 'Esperando aprobación del cliente', NULL, NULL),
('Impermeabilización de terraza', 'cliente6@example.com', 'Av. Libertad 32', 'Valencia', '46002', 'Valencia', 'C', '2025-01-12', NULL, '2025-01-14', 2, 6, 'Filtraciones en techo inferior', 'Cliente canceló por presupuesto alto', NULL, NULL),
('Colocación de pladur', 'cliente7@example.com', 'Calle Río Ebro 5', 'Zaragoza', '50002', 'Zaragoza', 'P', '2025-01-23', NULL, NULL, 3, 2, NULL, NULL, NULL, NULL),
('Pavimentación de garaje', 'cliente8@example.com', 'Calle Real 20', 'Granada', '18001', 'Granada', 'R', '2025-01-05', '2025-01-08', '2025-01-09', 4, 3, 'Hormigón anterior muy deteriorado', 'Obra completada', 'factura.pdf', 'garaje_nuevo.jpg'),
('Sustitución de ventanas', 'cliente9@example.com', 'Av. Castilla 14', 'Valladolid', '47008', 'Valladolid', 'P', '2025-01-24', NULL, NULL, 1, 7, NULL, NULL, NULL, NULL),
('Reforma integral de baño', 'cliente10@example.com', 'Calle Sol 3', 'Alicante', '03001', 'Alicante', 'B', '2025-01-17', NULL, NULL, 2, 8, 'Baño con instalaciones antiguas', 'Aprobado, en espera de materiales', 'presupuesto_baño.pdf', NULL);


INSERT INTO `clientes` (`cif`, `nombre`, `telefono`, `correo`, `pais`, `cuenta_corriente`, `moneda`, `importe_mensual`, `fecha_alta`, `fecha_actualizado`) VALUES
('A12345678', 'Empresa S.A.', '900123456', 'contacto@empresa.com', 'España', 'ES7620770024003102575766', 'EUR', 1000.00, '2023-01-01', NULL),
('B23456789', 'Compañía SL', '900234567', 'info@compania.com', 'España', 'ES9121000418450200051332', 'EUR', 2000.00, '2023-02-01', NULL),
('C34567890', 'Negocio SL', '900345678', 'contacto@negocio.com', 'España', 'ES7620770024003102575767', 'EUR', 1500.00, '2023-03-01', NULL),
('D45678901', 'Industria SA', '900456789', 'info@industria.com', 'España', 'ES9121000418450200051333', 'EUR', 2500.00, '2023-04-01', NULL),
('E56789012', 'Servicios SL', '900567890', 'contacto@servicios.com', 'España', 'ES7620770024003102575768', 'EUR', 3000.00, '2023-05-01', NULL),
('F67890123', 'Comercio SA', '900678901', 'info@comercio.com', 'España', 'ES9121000418450200051334', 'EUR', 3500.00, '2023-06-01', NULL),
('G78901234', 'Consultoria SL', '900789012', 'contacto@consultoria.com', 'España', 'ES7620770024003102575769', 'EUR', 4000.00, '2023-07-01', NULL),
('H89012345', 'Tecnologia SA', '900890123', 'info@tecnologia.com', 'España', 'ES9121000418450200051335', 'EUR', 4500.00, '2023-08-01', NULL);

INSERT INTO `cuota` (`concepto`, `fecha_emision`, `importe`, `pagada`, `fecha_pago`, `notas`, `cliente_id`) VALUES
('Cuota Enero', '2023-01-01', 500.00, 0, '2023-01-15', 'Pago pendiente', 1),
('Cuota Febrero', '2023-02-01', 600.00, 1, '2023-02-15', 'Pago realizado', 2),
('Cuota Marzo', '2023-03-01', 700.00, 0, '2023-03-15', 'Pago pendiente', 3),
('Cuota Abril', '2023-04-01', 800.00, 1, '2023-04-15', 'Pago realizado', 4),
('Cuota Mayo', '2023-05-01', 900.00, 0, '2023-05-15', 'Pago pendiente', 5),
('Cuota Junio', '2023-06-01', 1000.00, 1, '2023-06-15', 'Pago realizado', 6),
('Cuota Julio', '2023-07-01', 1100.00, 0, '2023-07-15', 'Pago pendiente', 7),
('Cuota Agosto', '2023-08-01', 1200.00, 1, '2023-08-15', 'Pago realizado', 1);

-- Usuarios de prueba para users
INSERT INTO `users` (`id`, `dni`, `name`, `email`, `telefono`, `direccion`, `rol`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12345678A', 'Juan Pérez', 'juan.perez@example.com', '600123456', 'Calle Mayor 12, Madrid', 'O', NULL, 'hashed_password_1', NULL, '2025-01-01 10:00:00', '2025-01-02 12:30:00'),
(2, '87654321B', 'María López', 'maria.lopez@example.com', '610987654', 'Av. Andalucía 45, Sevilla', 'O', NULL, 'hashed_password_2', NULL, '2025-01-02 11:15:00', '2025-01-03 13:45:00'),
(3, '11223344C', 'Carlos Sánchez', 'carlos.sanchez@example.com', '620345678', 'Calle Gran Vía 30, Barcelona', 'O', NULL, 'hashed_password_3', NULL, '2025-01-03 09:45:00', '2025-01-04 15:00:00'),
(4, '44332211D', 'Lucía Fernández', 'lucia.fernandez@example.com', '630456789', 'Calle Serrano 8, Madrid', 'O', NULL, 'hashed_password_4', NULL, '2025-01-04 14:20:00', '2025-01-05 17:10:00'),
(5, '55667788E', 'David Martínez', 'david.martinez@example.com', '640567890', 'Calle Alcazaba 7, Málaga', 'O', NULL, 'hashed_password_5', NULL, '2025-01-05 08:30:00', '2025-01-06 19:30:00'),
(6, '99887766F', 'Ana Torres', 'ana.torres@example.com', '650678901', 'Av. Libertad 32, Valencia', 'O', NULL, 'hashed_password_6', NULL, '2025-01-06 10:45:00', '2025-01-07 14:55:00'),
(7, '33445566G', 'Miguel Romero', 'miguel.romero@example.com', '660789012', 'Calle Río Ebro 5, Zaragoza', 'O', NULL, 'hashed_password_7', NULL, '2025-01-07 12:10:00', '2025-01-08 18:20:00'),
(8, '77665544H', 'Isabel Navarro', 'isabel.navarro@example.com', '670890123', 'Calle Real 20, Granada', 'O', NULL, 'hashed_password_8', NULL, '2025-01-08 16:25:00', '2025-01-09 20:40:00'),
(9, '22334455I', 'Pablo Domínguez', 'pablo.dominguez@example.com', '680901234', 'Av. Castilla 14, Valladolid', 'O', NULL, 'hashed_password_9', NULL, '2025-01-09 09:00:00', '2025-01-10 22:15:00'),
(10, '88990011J', 'Elena Ruiz', 'elena.ruiz@example.com', '690123456', 'Calle Sol 3, Alicante', 'A', NULL, 'hashed_password_10', NULL, '2025-01-10 07:55:00', '2025-01-11 23:30:00');

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`cod`, `nombre`) VALUES
('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almería'),
('33', 'Asturias'),
('05', 'Avila'),
('06', 'Badajoz'),
('07', 'Balears (Illes)'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('39', 'Cantabria'),
('12', 'Castellón'),
('51', 'Ceuta'),
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
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('52', 'Melilla'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('26', 'Rioja (La)'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
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
('50', 'Zaragoza');