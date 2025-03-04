-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2025 a las 07:22:57
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
  `pais` smallint(3) UNSIGNED ZEROFILL NOT NULL DEFAULT 000,
  `cuenta_corriente` varchar(100) DEFAULT NULL,
  `moneda` varchar(50) DEFAULT NULL,
  `importe_mensual` decimal(19,2) DEFAULT NULL,
  `fecha_alta` timestamp NULL DEFAULT NULL,
  `fecha_actualizado` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cif`, `nombre`, `telefono`, `correo`, `pais`, `cuenta_corriente`, `moneda`, `importe_mensual`, `fecha_alta`, `fecha_actualizado`, `deleted_at`) VALUES
(1, '54794584M', 'Empresa S.A.', '+34 123-45-67-89', 'contacto@empresa.com', 008, 'ES7620770024003102575766', 'EUR', 1000.00, '2022-12-31 23:00:00', '2025-02-12 16:06:30', '2025-02-12 16:06:30'),
(2, '12345678Z', 'Compañía SL', '+34-123-45-67-89', 'hecnugar@gmail.com', 040, 'ES9121000418450200051332', 'AUD', 2000.00, '2023-01-31 23:00:00', '2025-03-04 01:38:39', NULL),
(3, 'C34567890', 'Negocio SL', '900345678', 'contacto@negocio.com', 010, 'ES7620770024003102575767', 'EUR', 1500.00, '2023-02-28 23:00:00', NULL, NULL),
(4, 'D45678901', 'Industria SA', '900456789', 'info@industria.com', 016, 'ES9121000418450200051333', 'EUR', 2500.00, '2023-03-31 22:00:00', NULL, NULL),
(5, 'E56789012', 'Servicios SL', '900567890', 'contacto@servicios.com', 012, 'ES7620770024003102575768', 'EUR', 3000.00, '2023-04-30 22:00:00', NULL, NULL),
(6, 'F67890123', 'Comercio SA', '900678901', 'info@comercio.com', 020, 'ES9121000418450200051334', 'EUR', 3500.00, '2023-05-31 22:00:00', NULL, NULL),
(7, 'G78901234', 'Consultoria SL', '900789012', 'contacto@consultoria.com', 032, 'ES7620770024003102575769', 'EUR', 4000.00, '2023-06-30 22:00:00', NULL, NULL),
(8, 'H89012345', 'Tecnologia SA', '900890123', 'info@tecnologia.com', 036, 'ES9121000418450200051335', 'EUR', 4500.00, '2023-07-31 22:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id` int(11) NOT NULL,
  `concepto` varchar(150) DEFAULT NULL,
  `fecha_emision` timestamp NULL DEFAULT NULL,
  `importe` decimal(19,2) DEFAULT NULL,
  `fecha_pago` timestamp NULL DEFAULT NULL,
  `notas` varchar(150) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id`, `concepto`, `fecha_emision`, `importe`, `fecha_pago`, `notas`, `cliente_id`, `created_at`, `updated_at`) VALUES
(2, 'Cuota Febrero', '2023-01-31 23:00:00', 600.00, NULL, 'Pago realizado', 2, NULL, NULL),
(3, 'Cuota Marzo', '2023-02-28 23:00:00', 500.00, '2025-03-20 09:43:00', 'Pago realizado', 3, NULL, '2025-03-03 23:03:36'),
(4, 'Cuota Abril', '2023-03-31 22:00:00', 800.00, '2023-04-14 22:00:00', 'Pago realizado', 4, NULL, NULL),
(5, 'Cuota Mayo', '2023-04-30 22:00:00', 900.00, NULL, 'Pago pendiente', 5, NULL, NULL),
(6, 'Cuota Junio', '2023-05-31 22:00:00', 1000.00, '2023-06-14 22:00:00', 'Pago realizado', 6, NULL, NULL),
(7, 'Cuota Julio', '2023-06-30 22:00:00', 1100.00, '2023-07-14 22:00:00', 'Pago pendiente', 7, NULL, NULL),
(8, 'Cuota Agosto', '2023-07-31 22:00:00', 1200.00, '2023-08-14 22:00:00', 'Pago realizado', 1, NULL, NULL),
(10, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 2000.00, NULL, NULL, 2, '2025-03-04 00:30:27', '2025-03-04 00:30:27'),
(11, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 1500.00, NULL, NULL, 3, '2025-03-04 00:30:27', '2025-03-04 00:30:27'),
(12, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 2500.00, NULL, NULL, 4, '2025-03-04 00:30:27', '2025-03-04 00:30:27'),
(13, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 3000.00, NULL, NULL, 5, '2025-03-04 00:30:27', '2025-03-04 00:30:27'),
(14, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 3500.00, NULL, NULL, 6, '2025-03-04 00:30:27', '2025-03-04 00:30:27'),
(15, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 4000.00, NULL, NULL, 7, '2025-03-04 00:30:27', '2025-03-04 00:30:27'),
(16, 'Remesa pa to el mundo', '2025-03-07 08:00:00', 4500.00, NULL, NULL, 8, '2025-03-04 00:30:27', '2025-03-04 00:30:27');

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
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` smallint(3) UNSIGNED ZEROFILL NOT NULL,
  `iso2` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `iso3` char(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prefijo` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `continente` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subcontinente` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_moneda` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_moneda` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `iso2`, `iso3`, `prefijo`, `nombre`, `continente`, `subcontinente`, `iso_moneda`, `nombre_moneda`) VALUES
(004, 'AF', 'AFG', 93, 'Afganistán', 'Asia', NULL, 'AFN', 'Afgani afgano'),
(008, 'AL', 'ALB', 355, 'Albania', 'Europa', NULL, 'ALL', 'Lek albanés'),
(010, 'AQ', 'ATA', 672, 'Antártida', 'Antártida', NULL, NULL, NULL),
(012, 'DZ', 'DZA', 213, 'Argelia', 'África', NULL, 'DZD', 'Dinar algerino'),
(016, 'AS', 'ASM', 1684, 'Samoa Americana', 'Oceanía', NULL, NULL, NULL),
(020, 'AD', 'AND', 376, 'Andorra', 'Europa', NULL, 'EUR', 'Euro'),
(024, 'AO', 'AGO', 244, 'Angola', 'África', NULL, 'AOA', 'Kwanza angoleño'),
(028, 'AG', 'ATG', 1268, 'Antigua y Barbuda', 'América', 'El Caribe', NULL, NULL),
(031, 'AZ', 'AZE', 994, 'Azerbaiyán', 'Asia', NULL, 'AZM', 'Manat azerbaiyano'),
(032, 'AR', 'ARG', 54, 'Argentina', 'América', 'América del Sur', 'ARS', 'Peso argentino'),
(036, 'AU', 'AUS', 61, 'Australia', 'Oceanía', NULL, 'AUD', 'Dólar australiano'),
(040, 'AT', 'AUT', 43, 'Austria', 'Europa', NULL, 'EUR', 'Euro'),
(044, 'BS', 'BHS', 1242, 'Bahamas', 'América', 'El Caribe', 'BSD', 'Dólar bahameño'),
(048, 'BH', 'BHR', 973, 'Bahréin', 'Asia', NULL, 'BHD', 'Dinar bahreiní'),
(050, 'BD', 'BGD', 880, 'Bangladesh', 'Asia', NULL, 'BDT', 'Taka de Bangladesh'),
(051, 'AM', 'ARM', 374, 'Armenia', 'Asia', NULL, 'AMD', 'Dram armenio'),
(052, 'BB', 'BRB', 1246, 'Barbados', 'América', 'El Caribe', 'BBD', 'Dólar de Barbados'),
(056, 'BE', 'BEL', 32, 'Bélgica', 'Europa', NULL, 'EUR', 'Euro'),
(060, 'BM', 'BMU', 1441, 'Bermudas', 'América', 'El Caribe', 'BMD', 'Dólar de Bermuda'),
(064, 'BT', 'BTN', 975, 'Bhután', 'Asia', NULL, 'BTN', 'Ngultrum de Bután'),
(068, 'BO', 'BOL', 591, 'Bolivia', 'América', 'América del Sur', 'BOB', 'Boliviano'),
(070, 'BA', 'BIH', 387, 'Bosnia y Herzegovina', 'Europa', NULL, 'BAM', 'Marco convertible de Bosnia-Herzegovina'),
(072, 'BW', 'BWA', 267, 'Botsuana', 'África', NULL, 'BWP', 'Pula de Botsuana'),
(074, 'BV', 'BVT', 0, 'Isla Bouvet', NULL, NULL, NULL, NULL),
(076, 'BR', 'BRA', 55, 'Brasil', 'América', 'América del Sur', 'BRL', 'Real brasileño'),
(084, 'BZ', 'BLZ', 501, 'Belice', 'América', 'América Central', 'BZD', 'Dólar de Belice'),
(086, 'IO', 'IOT', 0, 'Territorio Británico del Océano Índico', NULL, NULL, NULL, NULL),
(090, 'SB', 'SLB', 677, 'Islas Salomón', 'Oceanía', NULL, 'SBD', 'Dólar de las Islas Salomón'),
(092, 'VG', 'VGB', 1284, 'Islas Vírgenes Británicas', 'América', 'El Caribe', NULL, NULL),
(096, 'BN', 'BRN', 673, 'Brunéi', 'Asia', NULL, 'BND', 'Dólar de Brunéi'),
(100, 'BG', 'BGR', 359, 'Bulgaria', 'Europa', NULL, 'BGN', 'Lev búlgaro'),
(104, 'MM', 'MMR', 95, 'Myanmar', 'Asia', NULL, 'MMK', 'Kyat birmano'),
(108, 'BI', 'BDI', 257, 'Burundi', 'África', NULL, 'BIF', 'Franco burundés'),
(112, 'BY', 'BLR', 375, 'Bielorrusia', 'Europa', NULL, 'BYR', 'Rublo bielorruso'),
(116, 'KH', 'KHM', 855, 'Camboya', 'Asia', NULL, 'KHR', 'Riel camboyano'),
(120, 'CM', 'CMR', 237, 'Camerún', 'África', NULL, NULL, NULL),
(124, 'CA', 'CAN', 1, 'Canadá', 'América', 'América del Norte', 'CAD', 'Dólar canadiense'),
(132, 'CV', 'CPV', 238, 'Cabo Verde', 'África', NULL, 'CVE', 'Escudo caboverdiano'),
(136, 'KY', 'CYM', 1345, 'Islas Caimán', 'América', 'El Caribe', 'KYD', 'Dólar caimano (de Islas Caimán)'),
(140, 'CF', 'CAF', 236, 'República Centroafricana', 'África', NULL, NULL, NULL),
(144, 'LK', 'LKA', 94, 'Sri Lanka', 'Asia', NULL, 'LKR', 'Rupia de Sri Lanka'),
(148, 'TD', 'TCD', 235, 'Chad', 'África', NULL, NULL, NULL),
(152, 'CL', 'CHL', 56, 'Chile', 'América', 'América del Sur', 'CLP', 'Peso chileno'),
(156, 'CN', 'CHN', 86, 'China', 'Asia', NULL, 'CNY', 'Yuan Renminbi de China'),
(158, 'TW', 'TWN', 886, 'Taiwán', 'Asia', NULL, 'TWD', 'Dólar taiwanés'),
(162, 'CX', 'CXR', 61, 'Isla de Navidad', 'Oceanía', NULL, NULL, NULL),
(166, 'CC', 'CCK', 61, 'Islas Cocos', 'Óceanía', NULL, NULL, NULL),
(170, 'CO', 'COL', 57, 'Colombia', 'América', 'América del Sur', 'COP', 'Peso colombiano'),
(174, 'KM', 'COM', 269, 'Comoras', 'África', NULL, 'KMF', 'Franco comoriano (de Comoras)'),
(175, 'YT', 'MYT', 262, 'Mayotte', 'África', NULL, NULL, NULL),
(178, 'CG', 'COG', 242, 'Congo', 'África', NULL, NULL, NULL),
(180, 'CD', 'COD', 243, 'República Democrática del Congo', 'África', NULL, 'CDF', 'Franco congoleño'),
(184, 'CK', 'COK', 682, 'Islas Cook', 'Oceanía', NULL, NULL, NULL),
(188, 'CR', 'CRI', 506, 'Costa Rica', 'América', 'América Central', 'CRC', 'Colón costarricense'),
(191, 'HR', 'HRV', 385, 'Croacia', 'Europa', NULL, 'HRK', 'Kuna croata'),
(192, 'CU', 'CUB', 53, 'Cuba', 'América', 'El Caribe', 'CUP', 'Peso cubano'),
(196, 'CY', 'CYP', 357, 'Chipre', 'Europa', NULL, 'CYP', 'Libra chipriota'),
(203, 'CZ', 'CZE', 420, 'República Checa', 'Europa', NULL, 'CZK', 'Koruna checa'),
(204, 'BJ', 'BEN', 229, 'Benín', 'África', NULL, NULL, NULL),
(208, 'DK', 'DNK', 45, 'Dinamarca', 'Europa', NULL, 'DKK', 'Corona danesa'),
(212, 'DM', 'DMA', 1767, 'Dominica', 'América', 'El Caribe', NULL, NULL),
(214, 'DO', 'DOM', 1809, 'República Dominicana', 'América', 'El Caribe', 'DOP', 'Peso dominicano'),
(218, 'EC', 'ECU', 593, 'Ecuador', 'América', 'América del Sur', NULL, NULL),
(222, 'SV', 'SLV', 503, 'El Salvador', 'América', 'América Central', 'SVC', 'Colón salvadoreño'),
(226, 'GQ', 'GNQ', 240, 'Guinea Ecuatorial', 'África', NULL, NULL, NULL),
(231, 'ET', 'ETH', 251, 'Etiopía', 'África', NULL, 'ETB', 'Birr etíope'),
(232, 'ER', 'ERI', 291, 'Eritrea', 'África', NULL, 'ERN', 'Nakfa eritreo'),
(233, 'EE', 'EST', 372, 'Estonia', 'Europa', NULL, 'EEK', 'Corona estonia'),
(234, 'FO', 'FRO', 298, 'Islas Feroe', 'Europa', NULL, NULL, NULL),
(238, 'FK', 'FLK', 500, 'Islas Malvinas', 'América', 'América del Sur', 'FKP', 'Libra malvinense'),
(239, 'GS', 'SGS', 0, 'Islas Georgias del Sur y Sandwich del Sur', 'América', 'América del Sur', NULL, NULL),
(242, 'FJ', 'FJI', 679, 'Fiyi', 'Oceanía', NULL, 'FJD', 'Dólar fijiano'),
(246, 'FI', 'FIN', 358, 'Finlandia', 'Europa', NULL, 'EUR', 'Euro'),
(248, 'AX', 'ALA', 0, 'Islas Gland', 'Europa', NULL, NULL, NULL),
(250, 'FR', 'FRA', 33, 'Francia', 'Europa', NULL, 'EUR', 'Euro'),
(254, 'GF', 'GUF', 0, 'Guayana Francesa', 'América', 'América del Sur', NULL, NULL),
(258, 'PF', 'PYF', 689, 'Polinesia Francesa', 'Oceanía', NULL, NULL, NULL),
(260, 'TF', 'ATF', 0, 'Territorios Australes Franceses', NULL, NULL, NULL, NULL),
(262, 'DJ', 'DJI', 253, 'Yibuti', 'África', NULL, 'DJF', 'Franco yibutiano'),
(266, 'GA', 'GAB', 241, 'Gabón', 'África', NULL, NULL, NULL),
(268, 'GE', 'GEO', 995, 'Georgia', 'Europa', NULL, 'GEL', 'Lari georgiano'),
(270, 'GM', 'GMB', 220, 'Gambia', 'África', NULL, 'GMD', 'Dalasi gambiano'),
(275, 'PS', 'PSE', 0, 'Palestina', 'Asia', NULL, NULL, NULL),
(276, 'DE', 'DEU', 49, 'Alemania', 'Europa', NULL, 'EUR', 'Euro'),
(288, 'GH', 'GHA', 233, 'Ghana', 'África', NULL, 'GHC', 'Cedi ghanés'),
(292, 'GI', 'GIB', 350, 'Gibraltar', 'Europa', NULL, 'GIP', 'Libra de Gibraltar'),
(296, 'KI', 'KIR', 686, 'Kiribati', 'Oceanía', NULL, NULL, NULL),
(300, 'GR', 'GRC', 30, 'Grecia', 'Europa', NULL, 'EUR', 'Euro'),
(304, 'GL', 'GRL', 299, 'Groenlandia', 'América', 'América del Norte', NULL, NULL),
(308, 'GD', 'GRD', 1473, 'Granada', 'América', 'El Caribe', NULL, NULL),
(312, 'GP', 'GLP', 0, 'Guadalupe', 'América', 'El Caribe', NULL, NULL),
(316, 'GU', 'GUM', 1671, 'Guam', 'Oceanía', NULL, NULL, NULL),
(320, 'GT', 'GTM', 502, 'Guatemala', 'América', 'América Central', 'GTQ', 'Quetzal guatemalteco'),
(324, 'GN', 'GIN', 224, 'Guinea', 'África', NULL, 'GNF', 'Franco guineano'),
(328, 'GY', 'GUY', 592, 'Guyana', 'América', 'América del Sur', 'GYD', 'Dólar guyanés'),
(332, 'HT', 'HTI', 509, 'Haití', 'América', 'El Caribe', 'HTG', 'Gourde haitiano'),
(334, 'HM', 'HMD', 0, 'Islas Heard y McDonald', 'Oceanía', NULL, NULL, NULL),
(336, 'VA', 'VAT', 39, 'Ciudad del Vaticano', 'Europa', NULL, NULL, NULL),
(340, 'HN', 'HND', 504, 'Honduras', 'América', 'América Central', 'HNL', 'Lempira hondureño'),
(344, 'HK', 'HKG', 852, 'Hong Kong', 'Asia', NULL, 'HKD', 'Dólar de Hong Kong'),
(348, 'HU', 'HUN', 36, 'Hungría', 'Europa', NULL, 'HUF', 'Forint húngaro'),
(352, 'IS', 'ISL', 354, 'Islandia', 'Europa', NULL, 'ISK', 'Króna islandesa'),
(356, 'IN', 'IND', 91, 'India', 'Asia', NULL, 'INR', 'Rupia india'),
(360, 'ID', 'IDN', 62, 'Indonesia', 'Asia', NULL, 'IDR', 'Rupiah indonesia'),
(364, 'IR', 'IRN', 98, 'Irán', 'Asia', NULL, 'IRR', 'Rial iraní'),
(368, 'IQ', 'IRQ', 964, 'Iraq', 'Asia', NULL, 'IQD', 'Dinar iraquí'),
(372, 'IE', 'IRL', 353, 'Irlanda', 'Europa', NULL, 'EUR', 'Euro'),
(376, 'IL', 'ISR', 972, 'Israel', 'Asia', NULL, 'ILS', 'Nuevo shéquel israelí'),
(380, 'IT', 'ITA', 39, 'Italia', 'Europa', NULL, 'EUR', 'Euro'),
(384, 'CI', 'CIV', 225, 'Costa de Marfil', 'África', NULL, NULL, NULL),
(388, 'JM', 'JAM', 1876, 'Jamaica', 'América', 'El Caribe', 'JMD', 'Dólar jamaicano'),
(392, 'JP', 'JPN', 81, 'Japón', 'Asia', NULL, 'JPY', 'Yen japonés'),
(398, 'KZ', 'KAZ', 7, 'Kazajstán', 'Asia', NULL, 'KZT', 'Tenge kazajo'),
(400, 'JO', 'JOR', 962, 'Jordania', 'Asia', NULL, 'JOD', 'Dinar jordano'),
(404, 'KE', 'KEN', 254, 'Kenia', 'África', NULL, 'KES', 'Chelín keniata'),
(408, 'KP', 'PRK', 850, 'Corea del Norte', 'Asia', NULL, 'KPW', 'Won norcoreano'),
(410, 'KR', 'KOR', 82, 'Corea del Sur', 'Asia', NULL, 'KRW', 'Won surcoreano'),
(414, 'KW', 'KWT', 965, 'Kuwait', 'Asia', NULL, 'KWD', 'Dinar kuwaití'),
(417, 'KG', 'KGZ', 996, 'Kirguistán', 'Asia', NULL, 'KGS', 'Som kirguís (de Kirguistán)'),
(418, 'LA', 'LAO', 856, 'Laos', 'Asia', NULL, 'LAK', 'Kip lao'),
(422, 'LB', 'LBN', 961, 'Líbano', 'Asia', NULL, 'LBP', 'Libra libanesa'),
(426, 'LS', 'LSO', 266, 'Lesotho', 'África', NULL, 'LSL', 'Loti lesotense'),
(428, 'LV', 'LVA', 371, 'Letonia', 'Europa', NULL, 'LVL', 'Lat letón'),
(430, 'LR', 'LBR', 231, 'Liberia', 'África', NULL, 'LRD', 'Dólar liberiano'),
(434, 'LY', 'LBY', 218, 'Libia', 'África', NULL, 'LYD', 'Dinar libio'),
(438, 'LI', 'LIE', 423, 'Liechtenstein', 'Europa', NULL, NULL, NULL),
(440, 'LT', 'LTU', 370, 'Lituania', 'Europa', NULL, 'LTL', 'Litas lituano'),
(442, 'LU', 'LUX', 352, 'Luxemburgo', 'Europa', NULL, 'EUR', 'Euro'),
(446, 'MO', 'MAC', 853, 'Macao', 'Asia', NULL, 'MOP', 'Pataca de Macao'),
(450, 'MG', 'MDG', 261, 'Madagascar', 'África', NULL, 'MGA', 'Ariary malgache'),
(454, 'MW', 'MWI', 265, 'Malaui', 'África', NULL, 'MWK', 'Kwacha malauiano'),
(458, 'MY', 'MYS', 60, 'Malasia', 'Asia', NULL, 'MYR', 'Ringgit malayo'),
(462, 'MV', 'MDV', 960, 'Maldivas', 'Asia', NULL, 'MVR', 'Rufiyaa maldiva'),
(466, 'ML', 'MLI', 223, 'Malí', 'África', NULL, NULL, NULL),
(470, 'MT', 'MLT', 356, 'Malta', 'Europa', NULL, 'MTL', 'Lira maltesa'),
(474, 'MQ', 'MTQ', 0, 'Martinica', 'América', 'El Caribe', NULL, NULL),
(478, 'MR', 'MRT', 222, 'Mauritania', 'África', NULL, 'MRO', 'Ouguiya mauritana'),
(480, 'MU', 'MUS', 230, 'Mauricio', 'África', NULL, 'MUR', 'Rupia mauricia'),
(484, 'MX', 'MEX', 52, 'México', 'América', 'América del Norte', 'MXN', 'Peso mexicano'),
(492, 'MC', 'MCO', 377, 'Mónaco', 'Europa', NULL, NULL, NULL),
(496, 'MN', 'MNG', 976, 'Mongolia', 'Asia', NULL, 'MNT', 'Tughrik mongol'),
(498, 'MD', 'MDA', 373, 'Moldavia', 'Europa', NULL, 'MDL', 'Leu moldavo'),
(499, 'ME', 'MNE', 382, 'Montenegro', 'Europa', NULL, NULL, NULL),
(500, 'MS', 'MSR', 1664, 'Montserrat', 'América', 'El Caribe', NULL, NULL),
(504, 'MA', 'MAR', 212, 'Marruecos', 'África', NULL, 'MAD', 'Dirham marroquí'),
(508, 'MZ', 'MOZ', 258, 'Mozambique', 'África', NULL, 'MZM', 'Metical mozambiqueño'),
(512, 'OM', 'OMN', 968, 'Omán', 'Asia', NULL, 'OMR', 'Rial omaní'),
(516, 'NA', 'NAM', 264, 'Namibia', 'África', NULL, 'NAD', 'Dólar namibio'),
(520, 'NR', 'NRU', 674, 'Nauru', 'Oceanía', NULL, NULL, NULL),
(524, 'NP', 'NPL', 977, 'Nepal', 'Asia', NULL, 'NPR', 'Rupia nepalesa'),
(528, 'NL', 'NLD', 31, 'Países Bajos', 'Europa', NULL, 'EUR', 'Euro'),
(530, 'AN', 'ANT', 599, 'Antillas Holandesas', 'América', 'El Caribe', 'ANG', 'Florín antillano neerlandés'),
(533, 'AW', 'ABW', 297, 'Aruba', 'América', 'El Caribe', 'AWG', 'Florín arubeño'),
(540, 'NC', 'NCL', 687, 'Nueva Caledonia', 'Oceanía', NULL, NULL, NULL),
(548, 'VU', 'VUT', 678, 'Vanuatu', 'Oceanía', NULL, 'VUV', 'Vatu vanuatense'),
(554, 'NZ', 'NZL', 64, 'Nueva Zelanda', 'Oceanía', NULL, 'NZD', 'Dólar neozelandés'),
(558, 'NI', 'NIC', 505, 'Nicaragua', 'América', 'América Central', 'NIO', 'Córdoba nicaragüense'),
(562, 'NE', 'NER', 227, 'Níger', 'África', NULL, NULL, NULL),
(566, 'NG', 'NGA', 234, 'Nigeria', 'África', NULL, 'NGN', 'Naira nigeriana'),
(570, 'NU', 'NIU', 683, 'Niue', 'Oceanía', NULL, NULL, NULL),
(574, 'NF', 'NFK', 0, 'Isla Norfolk', 'Oceanía', NULL, NULL, NULL),
(578, 'NO', 'NOR', 47, 'Noruega', 'Europa', NULL, 'NOK', 'Corona noruega'),
(580, 'MP', 'MNP', 1670, 'Islas Marianas del Norte', 'Oceanía', NULL, NULL, NULL),
(581, 'UM', 'UMI', 0, 'Islas Ultramarinas de Estados Unidos', NULL, NULL, NULL, NULL),
(583, 'FM', 'FSM', 691, 'Micronesia', 'Oceanía', NULL, NULL, NULL),
(584, 'MH', 'MHL', 692, 'Islas Marshall', 'Oceanía', NULL, NULL, NULL),
(585, 'PW', 'PLW', 680, 'Palaos', 'Oceanía', NULL, NULL, NULL),
(586, 'PK', 'PAK', 92, 'Pakistán', 'Asia', NULL, 'PKR', 'Rupia pakistaní'),
(591, 'PA', 'PAN', 507, 'Panamá', 'América', 'América Central', 'PAB', 'Balboa panameña'),
(598, 'PG', 'PNG', 675, 'Papúa Nueva Guinea', 'Oceanía', NULL, 'PGK', 'Kina de Papúa Nueva Guinea'),
(600, 'PY', 'PRY', 595, 'Paraguay', 'América', 'América del Sur', 'PYG', 'Guaraní paraguayo'),
(604, 'PE', 'PER', 51, 'Perú', 'América', 'América del Sur', 'PEN', 'Nuevo sol peruano'),
(608, 'PH', 'PHL', 63, 'Filipinas', 'Asia', NULL, 'PHP', 'Peso filipino'),
(612, 'PN', 'PCN', 870, 'Islas Pitcairn', 'Oceanía', NULL, NULL, NULL),
(616, 'PL', 'POL', 48, 'Polonia', 'Europa', NULL, 'PLN', 'zloty polaco'),
(620, 'PT', 'PRT', 351, 'Portugal', 'Europa', NULL, 'EUR', 'Euro'),
(624, 'GW', 'GNB', 245, 'Guinea-Bissau', 'África', NULL, NULL, NULL),
(626, 'TL', 'TLS', 670, 'Timor Oriental', 'Asia', NULL, NULL, NULL),
(630, 'PR', 'PRI', 1, 'Puerto Rico', 'América', 'El Caribe', NULL, NULL),
(634, 'QA', 'QAT', 974, 'Qatar', 'Asia', NULL, 'QAR', 'Rial qatarí'),
(638, 'RE', 'REU', 262, 'Reunión', 'África', NULL, NULL, NULL),
(642, 'RO', 'ROU', 40, 'Rumania', 'Europa', NULL, 'RON', 'Leu rumano'),
(643, 'RU', 'RUS', 7, 'Rusia', 'Asia', NULL, 'RUB', 'Rublo ruso'),
(646, 'RW', 'RWA', 250, 'Ruanda', 'África', NULL, 'RWF', 'Franco ruandés'),
(654, 'SH', 'SHN', 290, 'Santa Helena', 'África', NULL, 'SHP', 'Libra de Santa Helena'),
(659, 'KN', 'KNA', 1869, 'San Cristóbal y Nieves', 'América', 'El Caribe', NULL, NULL),
(660, 'AI', 'AIA', 1264, 'Anguila', 'América', 'El Caribe', NULL, NULL),
(662, 'LC', 'LCA', 1758, 'Santa Lucía', 'América', 'El Caribe', NULL, NULL),
(666, 'PM', 'SPM', 508, 'San Pedro y Miquelón', 'América', 'América del Norte', NULL, NULL),
(670, 'VC', 'VCT', 1784, 'San Vicente y las Granadinas', 'América', 'El Caribe', NULL, NULL),
(674, 'SM', 'SMR', 378, 'San Marino', 'Europa', NULL, NULL, NULL),
(678, 'ST', 'STP', 239, 'Santo Tomé y Príncipe', 'África', NULL, 'STD', 'Dobra de Santo Tomé y Príncipe'),
(682, 'SA', 'SAU', 966, 'Arabia Saudí', 'Asia', NULL, 'SAR', 'Riyal saudí'),
(686, 'SN', 'SEN', 221, 'Senegal', 'África', NULL, NULL, NULL),
(688, 'RS', 'SRB', 381, 'Serbia', 'Europa', NULL, NULL, NULL),
(690, 'SC', 'SYC', 248, 'Seychelles', 'África', NULL, 'SCR', 'Rupia de Seychelles'),
(694, 'SL', 'SLE', 232, 'Sierra Leona', 'África', NULL, 'SLL', 'Leone de Sierra Leona'),
(702, 'SG', 'SGP', 65, 'Singapur', 'Asia', NULL, 'SGD', 'Dólar de Singapur'),
(703, 'SK', 'SVK', 421, 'Eslovaquia', 'Europa', NULL, 'SKK', 'Corona eslovaca'),
(704, 'VN', 'VNM', 84, 'Vietnam', 'Asia', NULL, 'VND', 'Dong vietnamita'),
(705, 'SI', 'SVN', 386, 'Eslovenia', 'Europa', NULL, NULL, NULL),
(706, 'SO', 'SOM', 252, 'Somalia', 'África', NULL, 'SOS', 'Chelín somalí'),
(710, 'ZA', 'ZAF', 27, 'Sudáfrica', 'África', NULL, 'ZAR', 'Rand sudafricano'),
(716, 'ZW', 'ZWE', 263, 'Zimbabue', 'África', NULL, 'ZWL', 'Dólar zimbabuense'),
(724, 'ES', 'ESP', 34, 'España', 'Europa', NULL, 'EUR', 'Euro'),
(732, 'EH', 'ESH', 0, 'Sahara Occidental', 'África', NULL, NULL, NULL),
(736, 'SD', 'SDN', 249, 'Sudán', 'África', NULL, 'SDD', 'Dinar sudanés'),
(740, 'SR', 'SUR', 597, 'Surinam', 'América', 'América del Sur', 'SRD', 'Dólar surinamés'),
(744, 'SJ', 'SJM', 0, 'Svalbard y Jan Mayen', 'Europa', NULL, NULL, NULL),
(748, 'SZ', 'SWZ', 268, 'Suazilandia', 'África', NULL, 'SZL', 'Lilangeni suazi'),
(752, 'SE', 'SWE', 46, 'Suecia', 'Europa', NULL, 'SEK', 'Corona sueca'),
(756, 'CH', 'CHE', 41, 'Suiza', 'Europa', NULL, 'CHF', 'Franco suizo'),
(760, 'SY', 'SYR', 963, 'Siria', 'Asia', NULL, 'SYP', 'Libra siria'),
(762, 'TJ', 'TJK', 992, 'Tayikistán', 'Asia', NULL, 'TJS', 'Somoni tayik (de Tayikistán)'),
(764, 'TH', 'THA', 66, 'Tailandia', 'Asia', NULL, 'THB', 'Baht tailandés'),
(768, 'TG', 'TGO', 228, 'Togo', 'África', NULL, NULL, NULL),
(772, 'TK', 'TKL', 690, 'Tokelau', 'Oceanía', NULL, NULL, NULL),
(776, 'TO', 'TON', 676, 'Tonga', 'Oceanía', NULL, 'TOP', 'Pa\'anga tongano'),
(780, 'TT', 'TTO', 1868, 'Trinidad y Tobago', 'América', 'El Caribe', 'TTD', 'Dólar de Trinidad y Tobago'),
(784, 'AE', 'ARE', 971, 'Emiratos Árabes Unidos', 'Asia', NULL, 'AED', 'Dirham de los Emiratos Árabes Unidos'),
(788, 'TN', 'TUN', 216, 'Túnez', 'África', NULL, 'TND', 'Dinar tunecino'),
(792, 'TR', 'TUR', 90, 'Turquía', 'Asia', NULL, 'TRY', 'Lira turca'),
(795, 'TM', 'TKM', 993, 'Turkmenistán', 'Asia', NULL, 'TMM', 'Manat turcomano'),
(796, 'TC', 'TCA', 1649, 'Islas Turcas y Caicos', 'América', 'El Caribe', NULL, NULL),
(798, 'TV', 'TUV', 688, 'Tuvalu', 'Oceanía', NULL, NULL, NULL),
(800, 'UG', 'UGA', 256, 'Uganda', 'África', NULL, 'UGX', 'Chelín ugandés'),
(804, 'UA', 'UKR', 380, 'Ucrania', 'Europa', NULL, 'UAH', 'Grivna ucraniana'),
(807, 'MK', 'MKD', 389, 'Macedonia', 'Europa', NULL, 'MKD', 'Denar macedonio'),
(818, 'EG', 'EGY', 20, 'Egipto', 'África', NULL, 'EGP', 'Libra egipcia'),
(826, 'GB', 'GBR', 44, 'Reino Unido', 'Europa', NULL, 'GBP', 'Libra esterlina (libra de Gran Bretaña)'),
(834, 'TZ', 'TZA', 255, 'Tanzania', 'África', NULL, 'TZS', 'Chelín tanzano'),
(840, 'US', 'USA', 1, 'Estados Unidos', 'América', 'América del Norte', 'USD', 'Dólar estadounidense'),
(850, 'VI', 'VIR', 1340, 'Islas Vírgenes de los Estados Unidos', 'América', 'El Caribe', NULL, NULL),
(854, 'BF', 'BFA', 226, 'Burkina Faso', 'África', NULL, NULL, NULL),
(858, 'UY', 'URY', 598, 'Uruguay', 'América', 'América del Sur', 'UYU', 'Peso uruguayo'),
(860, 'UZ', 'UZB', 998, 'Uzbekistán', 'Asia', NULL, 'UZS', 'Som uzbeko'),
(862, 'VE', 'VEN', 58, 'Venezuela', 'América', 'América del Sur', 'VEB', 'Bolívar venezolano'),
(876, 'WF', 'WLF', 681, 'Wallis y Futuna', 'Oceanía', NULL, NULL, NULL),
(882, 'WS', 'WSM', 685, 'Samoa', 'Oceanía', NULL, 'WST', 'Tala samoana'),
(887, 'YE', 'YEM', 967, 'Yemen', 'Asia', NULL, 'YER', 'Rial yemení (de Yemen)'),
(894, 'ZM', 'ZMB', 260, 'Zambia', 'África', NULL, 'ZMK', 'Kwacha zambiano');

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
  `cod` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
-- Estructura de tabla para la tabla `remesas`
--

CREATE TABLE `remesas` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `motivo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Mes y año en el que se mandan los pagos a todos los clientes';

--
-- Volcado de datos para la tabla `remesas`
--

INSERT INTO `remesas` (`id`, `fecha`, `motivo`) VALUES
(1, '2025-03-05 11:32:00', 'prueba de remesa'),
(2, '2025-03-07 08:00:00', 'Remesa pa to el mundo');

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
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `cod_postal` char(5) DEFAULT NULL,
  `provincia` char(2) DEFAULT NULL,
  `estado` enum('C','P','R','B') DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `fecha_realizacion` timestamp NULL DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `operario_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `anotaciones_anteriores` text DEFAULT NULL,
  `anotaciones_posteriores` text DEFAULT NULL,
  `fichero` varchar(500) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `descripcion`, `direccion`, `poblacion`, `cod_postal`, `provincia`, `estado`, `fecha_creacion`, `fecha_realizacion`, `fecha_actualizacion`, `operario_id`, `cliente_id`, `anotaciones_anteriores`, `anotaciones_posteriores`, `fichero`, `foto`) VALUES
(42, 'Instalación de tuberías', 'Av. Andalucía 45', 'Sevilla', '41005', '01', 'B', '2025-01-18 00:00:00', NULL, NULL, 2, 1, NULL, NULL, NULL, NULL),
(43, 'Pintado de fachada', 'Calle Gran Vía 30', 'Barcelona', '08010', '01', 'R', '2025-01-10 00:00:00', '2025-01-15 00:00:00', '2025-01-16 00:00:00', 3, 2, 'Fachada en mal estado', 'Trabajo finalizado con éxito', 'presupuesto.pdf', 'fachada_final.jpg'),
(44, 'Cambio de baldosas', 'Calle Serrano 8', 'Madrid', '28006', '01', 'P', '2025-01-22 00:00:00', NULL, NULL, 4, 5, NULL, NULL, NULL, NULL),
(45, 'Revisión eléctrica', 'Calle Alcazaba 7', 'Málaga', '29015', '44', 'B', '2025-01-19 00:00:00', NULL, NULL, 1, 4, 'Algunas luces parpadean', 'Esperando aprobación del cliente', NULL, NULL),
(46, 'Impermeabilización de terraza', 'Av. Libertad 32', 'Valencia', '46002', '01', 'C', '2025-01-12 00:00:00', NULL, '2025-01-14 00:00:00', 2, 6, 'Filtraciones en techo inferior', 'Cliente canceló por presupuesto alto', NULL, NULL),
(47, 'Colocación de pladur', 'Calle Río Ebro 5', 'Zaragoza', '50002', '01', 'P', '2025-01-23 00:00:00', NULL, NULL, 3, 2, NULL, NULL, NULL, NULL),
(48, 'Pavimentación de garaje', 'Calle Real 20', 'Granada', '18001', '33', 'R', '2025-01-05 00:00:00', '2025-01-08 00:00:00', '2025-01-09 00:00:00', 4, 3, 'Hormigón anterior muy deteriorado', 'Obra completada', 'factura.pdf', 'garaje_nuevo.jpg'),
(49, 'Sustitución de ventanas', 'Av. Castilla 14', 'Valladolid', '47008', '01', 'P', '2025-01-24 00:00:00', NULL, NULL, 1, 7, NULL, NULL, NULL, NULL),
(50, 'Reforma integral de baño', 'Calle Sol 3', 'Alicante', '03001', '01', 'B', '2025-01-17 00:00:00', NULL, NULL, 2, 8, 'Baño con instalaciones antiguas', 'Aprobado, en espera de materiales', 'presupuesto_baño.pdf', NULL),
(51, 'tareita', 'direccion', 'poblacion', '21006', '20', 'P', '2025-02-06 00:00:00', '2025-02-06 00:00:00', '2025-02-06 00:00:00', 7, 0, 'anterior', 'posterior', NULL, NULL),
(52, 'Tarea como administrador', 'mi casa', 'huelvaloen', '21006', '04', 'P', '2025-02-06 00:00:00', '2025-02-21 00:00:00', '2025-02-06 00:00:00', 3, 0, 'anterior', 'posterior', NULL, NULL),
(56, 'nueva tarea con fechas', 'Avenida Siempre Viva 456', 'Barcelona', '52002', '01', 'R', '2025-02-06 09:01:00', '2025-02-28 10:01:00', '2025-02-06 09:02:30', 14, 7, 'anterior', 'posterior', NULL, NULL),
(57, 'Tarea sin operario', 'Avenida Siempre Viva 456', 'Huelva', '52002', '01', 'R', '2025-02-11 08:22:00', '2025-02-28 09:22:00', '2025-02-11 08:22:41', NULL, 1, 'anotacion anterior', NULL, NULL, NULL),
(58, 'tarea ficheros', 'algun sitio', 'alguna', '21092', '13', 'B', '2025-02-13 00:29:00', '2026-12-31 11:02:00', '2025-02-13 00:49:13', 5, 5, 'anterior', 'psoterior', 'CRVEdNriwBM9BsnVCkKGKXTQHAoF9cqjsTJk3TWW.pdf', 'LKydQ9z2QPSjQYdeqaevE7ar0qbJco5V8p9cOicM.png'),
(59, 'tarea', 'asdasdaa', 'asda', '21323', '15', 'B', '2025-03-03 22:41:00', '2026-03-12 02:02:00', '2025-03-03 22:42:19', 6, 6, 'a', 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `rol` enum('A','O') DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `name`, `email`, `telefono`, `direccion`, `rol`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '12345678A', 'Juan Pérez', 'juan.perez@example.com', '600123456', 'Calle Mayor 12, Madrid', 'O', NULL, 'hashed_password_1', NULL, '2025-01-01 09:00:00', '2025-01-31 07:24:39', '2025-01-31 07:24:39'),
(2, '87654321B', 'María López', 'maria.lopez@example.com', '610987654', 'Av. Andalucía 45, Sevilla', 'O', NULL, 'hashed_password_2', NULL, '2025-01-02 10:15:00', '2025-01-30 21:43:56', '2025-01-30 21:43:56'),
(3, '11223344C', 'Carlos Sánchez', 'carlos.sanchez@example.com', '620345678', 'Calle Gran Vía 30, Barcelona', 'O', NULL, 'hashed_password_3', NULL, '2025-01-03 08:45:00', '2025-01-04 14:00:00', NULL),
(4, '44332211D', 'Lucía Fernández', 'lucia.fernandez@example.com', '630456789', 'Calle Serrano 8, Madrid', 'O', NULL, 'hashed_password_4', NULL, '2025-01-04 13:20:00', '2025-01-05 16:10:00', NULL),
(5, '55667788E', 'David Martínez', 'david.martinez@example.com', '640567890', 'Calle Alcazaba 7, Málaga', 'O', NULL, 'hashed_password_5', NULL, '2025-01-05 07:30:00', '2025-01-06 18:30:00', NULL),
(6, '99887766F', 'Ana Torres', 'ana.torres@example.com', '650678901', 'Av. Libertad 32, Valencia', 'O', NULL, 'hashed_password_6', NULL, '2025-01-06 09:45:00', '2025-01-07 13:55:00', NULL),
(7, '33445566G', 'Miguel Romero', 'miguel.romero@example.com', '660789012', 'Calle Río Ebro 5, Zaragoza', 'O', NULL, 'hashed_password_7', NULL, '2025-01-07 11:10:00', '2025-01-08 17:20:00', NULL),
(8, '77665544H', 'Isabel Navarro', 'isabel.navarro@example.com', '670890123', 'Calle Real 20, Granada', 'O', NULL, 'hashed_password_8', NULL, '2025-01-08 15:25:00', '2025-01-09 19:40:00', NULL),
(9, '22334455I', 'Pablo Domínguez', 'pablo.dominguez@example.com', '680901234', 'Av. Castilla 14, Valladolid', 'O', NULL, 'hashed_password_9', NULL, '2025-01-09 08:00:00', '2025-01-10 21:15:00', NULL),
(10, '88990011J', 'Elena Ruiz', 'elena.ruiz@example.com', '690123456', 'Calle Sol 3, Alicante', 'A', NULL, 'hashed_password_10', NULL, '2025-01-10 06:55:00', '2025-01-11 22:30:00', NULL),
(14, '54794584M', 'Hector', 'hecnugar@gmail.com', '+34 123-45-67-89', 'Calle Falsa 123', 'A', NULL, '$2y$12$4XdjiLUMcTNJeW6eAEjhBui0/Qw/l7EvHYqRGX/VCWxGdESbmQQK2', NULL, '2025-02-06 07:15:12', '2025-02-06 07:15:12', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_pais_foreign` (`pais`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iso2` (`iso2`),
  ADD UNIQUE KEY `iso3` (`iso3`);

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
-- Indices de la tabla `remesas`
--
ALTER TABLE `remesas`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `tareas_provincia_foreign` (`provincia`);

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
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `remesas`
--
ALTER TABLE `remesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_pais_foreign` FOREIGN KEY (`pais`) REFERENCES `paises` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `cuotas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`operario_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `tareas_provincia_foreign` FOREIGN KEY (`provincia`) REFERENCES `provincias` (`cod`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
