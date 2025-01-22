--
-- Estructura de tabla para la tabla `provincias`
--
CREATE TABLE `provincias` (
  `cod` char(2) NOT NULL PRIMARY KEY,
  `nombre` varchar(50) NOT NULL
);

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `rol` enum('O','A') NOT NULL,
  `fecha_alta` DATE NOT NULL,
  `fecha_actualizado` DATE DEFAULT NULL
);

--
-- Estructura de tabla para la tabla `cartera_clientes`
--

CREATE TABLE `clientes`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cif` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cuenta_corriente` varchar(100) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `importe_mensual` DECIMAL(19,4) DEFAULT NULL,
  `fecha_alta` DATE NOT NULL,
  `fecha_actualizado` DATE DEFAULT NULL
);

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cuota`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `concepto` varchar(150),
  `fecha_emision` DATE NOT NULL,
  `importe` DECIMAL(19,4) NOT NULL,
  `pagada` boolean DEFAULT 0,
  `fecha_pago` DATE DEFAULT NULL,
  `notas` varchar(150),
  `cliente_id` int(11) NOT NULL,
   FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
);

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `nif_cif` varchar(9) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `descripcion` text NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `cod_postal` char(5) NOT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `estado` enum('C','P','R','B','A') DEFAULT NULL,
  -- B=Esperando ser aprobada, P=Pendiente, R=Realizada, C=Cancelada, A=Esperando ser asignada por administrador
  `fecha_creacion` date NOT NULL,
  `operario` int(11),
  `fecha_realizacion` date NOT NULL,
  `anotaciones_anteriores` text DEFAULT NULL,
  `anotaciones_posteriores` text DEFAULT NULL,
  `fichero` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
   FOREIGN KEY (`operario`) REFERENCES `usuarios`(`id`),
   FOREIGN KEY (`cliente_id`) REFERENCES `clientes`(`id`)
);

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `correo`, `telefono`, `direccion`, `rol`, `fecha_alta`, `fecha_actualizado`) VALUES
('12345678A', 'Juan Perez', 'juan.perez@example.com', '600123456', 'Calle Falsa 123', 'O', '2023-01-01', NULL),
('23456789B', 'Ana Gomez', 'ana.gomez@example.com', '600234567', 'Avenida Siempre Viva 456', 'A', '2023-02-01', NULL),
('34567890C', 'Luis Martinez', 'luis.martinez@example.com', '600345678', 'Calle Sol 789', 'O', '2023-03-01', NULL),
('45678901D', 'Laura Sanchez', 'laura.sanchez@example.com', '600456789', 'Avenida Luna 101', 'A', '2023-04-01', NULL),
('56789012E', 'Pedro Fernandez', 'pedro.fernandez@example.com', '600567890', 'Calle Estrella 202', 'O', '2023-05-01', NULL),
('67890123F', 'Marta Lopez', 'marta.lopez@example.com', '600678901', 'Avenida Mar 303', 'A', '2023-06-01', NULL),
('78901234G', 'Jose Garcia', 'jose.garcia@example.com', '600789012', 'Calle Rio 404', 'O', '2023-07-01', NULL),
('89012345H', 'Sara Ruiz', 'sara.ruiz@example.com', '600890123', 'Avenida Montaña 505', 'A', '2023-08-01', NULL),
('90123456I', 'Carlos Ortega', 'carlos.ortega@example.com', '600901234', 'Calle Verde 606', 'O', '2023-09-01', NULL),
('01234567J', 'Lucia Torres', 'lucia.torres@example.com', '600012345', 'Avenida Azul 707', 'A', '2023-10-01', NULL),
('11234567K', 'Alberto Nunez', 'alberto.nunez@example.com', '600112345', 'Calle Blanca 808', 'O', '2023-11-01', NULL),
('22345678L', 'Beatriz Suarez', 'beatriz.suarez@example.com', '600223456', 'Avenida Roja 909', 'A', '2023-12-01', NULL),
('33456789M', 'Carmen Diaz', 'carmen.diaz@example.com', '600334567', 'Calle Verde 1010', 'O', '2024-01-01', NULL),
('44567890N', 'Daniel Perez', 'daniel.perez@example.com', '600445678', 'Avenida Azul 1111', 'A', '2024-02-01', NULL),
('55678901O', 'Elena Garcia', 'elena.garcia@example.com', '600556789', 'Calle Amarilla 1212', 'O', '2024-03-01', NULL),
('66789012P', 'Fernando Lopez', 'fernando.lopez@example.com', '600667890', 'Avenida Negra 1313', 'A', '2024-04-01', NULL),
('77890123Q', 'Gloria Martinez', 'gloria.martinez@example.com', '600778901', 'Calle Rosa 1414', 'O', '2024-05-01', NULL),
('88901234R', 'Hector Sanchez', 'hector.sanchez@example.com', '600889012', 'Avenida Naranja 1515', 'A', '2024-06-01', NULL),
('99012345S', 'Irene Fernandez', 'irene.fernandez@example.com', '600990123', 'Calle Morada 1616', 'O', '2024-07-01', NULL),
('10123456T', 'Javier Ruiz', 'javier.ruiz@example.com', '600101234', 'Avenida Celeste 1717', 'A', '2024-08-01', NULL);

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
('Cuota Agosto', '2023-08-01', 1200.00, 1, '2023-08-15', 'Pago realizado', 8);

INSERT INTO `tareas` (`nombre`, `apellidos`, `nif_cif`, `telefono`, `descripcion`, `correo`, `direccion`, `poblacion`, `cod_postal`, `provincia`, `estado`, `fecha_creacion`, `operario`, `fecha_realizacion`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fichero`, `foto`, `cliente_id`) VALUES
('Carlos', 'Lopez', '12345678C', '600345678', 'Reparación de tejado', 'carlos.lopez@example.com', 'Calle Luna 789', 'Madrid', '28001', 'Madrid', 'C', '2023-01-01', 1, '2023-01-10', 'Ninguna', 'Reparación completada', NULL, NULL, 1),
('Maria', 'Martinez', '23456789D', '600456789', 'Instalación de ventanas', 'maria.martinez@example.com', 'Avenida Sol 101', 'Barcelona', '08001', 'Barcelona', 'P', '2023-02-01', 2, '2023-02-10', 'Ninguna', 'Instalación en proceso', NULL, NULL, 2),
('Javier', 'Hernandez', '34567890E', '600789123', 'Pintura de fachada', 'javier.hernandez@example.com', 'Calle Mar 606', 'Valencia', '46001', 'Valencia', 'C', '2023-03-01', 3, '2023-03-10', 'Ninguna', 'Pintura completada', NULL, NULL, 3),
('Elena', 'Diaz', '45678901F', '600890234', 'Reforma de baño', 'elena.diaz@example.com', 'Avenida Sol 707', 'Sevilla', '41001', 'Sevilla', 'P', '2023-04-01', 4, '2023-04-10', 'Ninguna', 'Reforma en proceso', NULL, NULL, 4),
('Raul', 'Gonzalez', '56789012G', '600901345', 'Instalación de aire acondicionado', 'raul.gonzalez@example.com', 'Calle Luna 808', 'Bilbao', '48001', 'Vizcaya', 'R', '2023-05-01', 5, '2023-05-10', 'Ninguna', 'Instalación completada', NULL, NULL, 5),
('Isabel', 'Moreno', '67890123H', '600012456', 'Reparación de tuberías', 'isabel.moreno@example.com', 'Avenida Estrella 909', 'Zaragoza', '50001', 'Zaragoza', 'B', '2023-06-01', 6, '2023-06-10', 'Ninguna', 'Reparación completada', NULL, NULL, 6),
('David', 'Ramirez', '78901234I', '600123567', 'Cambio de ventanas', 'david.ramirez@example.com', 'Calle Rio 1010', 'Granada', '18001', 'Granada', 'C', '2023-07-01', 7, '2023-07-10', 'Ninguna', 'Cambio completado', NULL, NULL, 7),
('Patricia', 'Santos', '89012345J', '600234678', 'Reforma de cocina', 'patricia.santos@example.com', 'Avenida Montaña 1111', 'Murcia', '30001', 'Murcia', 'P', '2023-08-01', 8, '2023-08-10', 'Ninguna', 'Reforma en proceso', NULL, NULL, 8);

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`cod`, `nombre`) VALUES
('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almera'),
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
('20', 'Guipzcoa'),
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