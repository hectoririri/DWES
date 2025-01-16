--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT ''
) 

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
  `estado` enum('C','P','R','B') DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `operario` varchar(50) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `anotaciones_anteriores` text DEFAULT NULL,
  `anotaciones_posteriores` text DEFAULT NULL,
  `fichero` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  FOREIGN KEY (`operario`) REFERENCES `empleados`(`dni`)
)

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_alta` DATE NOT NULL,
  `tipo` enum('O','A') NOT NULL
)

--
-- Estructura de tabla para la tabla `cartera_clientes`
--

CREATE TABLE `cartera_clientes`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cif` varchar(9) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `cuenta_corriente` varchar(100) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `importe_mensual` DECIMAL(19,4)
)

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `concepto` varchar(150),
  `fecha_emision` DATE NOT NULL,
  `importe` DECIMAL(19,4) NOT NULL,
  `pagada` boolean DEFAULT 0,
  `fecha_pago` DATE NOT NULL,
  `notas` varchar(150)
)


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

-- --------------------------------------------------------



--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nombre`, `apellidos`, `nif_cif`, `telefono`, `descripcion`, `correo`, `direccion`, `poblacion`, `cod_postal`, `provincia`, `estado`, `fecha_creacion`, `operario`, `fecha_realizacion`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fich_resumen`, `foto`) VALUES
(1, 'Juan', 'Pérez', '12345678Z', '+34 600123456', 'Reparación de tuberías', 'juan.perez@example.com', 'Calle Falsa 123', 'Madrid', '28080', 'Madrid', 'B', '2023-10-01', 'operario12', '2023-10-28', 'Anotación anterior 1', 'Anotación posterior 1', 'resumen1.pdf', 'foto1.jpg'),
(2, 'Ana', 'García', '12345678Z', '+34 123 45 67 89', 'Instalación eléctrica', 'ana.garcia@example.com', 'Avenida Siempre Viva 742', 'Barcelona', '08080', 'Barcelona', 'C', '2023-10-02', 'operario2', '2023-10-06', 'Anotación anterior 2', 'Anotación posterior 2', 'resumen2.pdf', 'foto2.jpg'),
(3, 'Luis', 'Martínez', '54794584M', '+34 600112233', 'Mantenimiento de jardín', 'luis.martinez@example.com', 'Plaza Mayor 1', 'Valencia', '46001', 'Valencia', 'R', '2023-10-03', 'operario2', '2023-11-30', 'Anotación anterior 3', 'Anotación posterior 3', 'resumen3.pdf', 'foto3.jpg'),
(4, 'Carlos', 'López', '54794584M', '+34 123-45-67-89', 'Pintura de fachada', 'carlos.lopez@example.com', 'Calle Nueva 45', 'Sevilla', '41001', 'Sevilla', 'B', '2023-10-04', 'operariocomun', '2024-02-10', 'Anotación anterior 4', 'Anotación posterior 4', 'resumen4.pdf', 'foto4.jpg'),
(5, 'María', 'Fernández', '12345678Z', '+34 123456789', 'Reparación de tejado', 'maria.fernandez@example.com', 'Calle Vieja 67', 'Granada', '18001', 'Granada', 'C', '2023-10-05', 'operariocomun', '2023-10-09', 'Anotación anterior 5', 'Anotación posterior 5', 'resumen5.pdf', 'foto5.jpg'),
(6, 'Pedro', 'Gómez', '12345678Z', '+34 123-45-67-89', 'Limpieza de piscina', 'pedro.gomez@example.com', 'Avenida Central 89', 'Málaga', '29001', 'Málaga', 'P', '2023-10-06', 'operario2', '2023-11-03', 'Anotación anterior 6', 'Anotación posterior 6', 'resumen6.pdf', 'foto6.jpg'),
(7, 'Hector', 'Nunez', '54794584M', '+34 123-45-67-89', 'Podando sqls', 'hecnugar@gmail.com', 'Huelva', 'Aljaraque', '21006', 'Córdoba', 'P', '2024-12-10', 'operario2', '2024-12-19', 'anterior', 'posterior', NULL, NULL),
(8, 'Juan', 'Pérez', '12345678Z', '+34 123-45-67-89', 'Reparación de equipo', 'juan.perez@gmail.com', 'Andorra', '', '28001', 'Madrid', 'B', '2023-01-01', 'operariocomun', '2023-01-10', 'Reparar todos los equipos', '', NULL, NULL),
(9, 'María', 'García', '87654321X', '+34 987 65 43 21', 'Instalación de software', 'maria.garcia@hotmail.com', '', '', '08002', 'Barcelona', 'R', '2023-02-01', 'operario2', '2023-02-15', '', '', NULL, NULL),
(10, 'Carlos', 'López', '12345678Z', '+34 654 32 10 98', 'Mantenimiento de red', 'carlos.lopez@yahoo.com', 'Aljaraque', '', '46003', 'Valencia', 'P', '2023-03-01', 'operariocomun', '2023-03-30', 'Anotacion anterior sin importancia', 'Terminar de mantener la red', NULL, NULL),
(11, 'Hector', 'Núñez', '54794584M', '+34 644733825', 'Descripción de tarea de prueba', 'mundo123@hotmail.com', 'Avenida Central 89', 'Huelva', '64876', 'Córdoba', 'P', '2024-12-11', 'operario2', '2024-12-26', 'Anotación anterior', 'Anotación posterior', NULL, NULL);
