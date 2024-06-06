-- -------------------------------------------------------------
-- TablePlus 6.0.4(556)
--
-- https://tableplus.com/
--
-- Database: castle_data
-- Generation Time: 2024-06-05 00:40:30.8140
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint unsigned NOT NULL,
  `id_actividad` bigint unsigned NOT NULL,
  `prioridad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_company_id_foreign` (`company_id`),
  KEY `activities_id_actividad_foreign` (`id_actividad`),
  CONSTRAINT `activities_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `activities_id_actividad_foreign` FOREIGN KEY (`id_actividad`) REFERENCES `fiscals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `fiscals`;
CREATE TABLE `fiscals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fiscal_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `activities` (`id`, `company_id`, `id_actividad`, `prioridad`, `date`, `created_at`, `updated_at`) VALUES
(12, 12, 9, '1', '11/2013', '2024-06-04 17:05:40', '2024-06-04 17:05:40'),
(13, 13, 10, '', '', '2024-06-04 17:06:07', '2024-06-04 17:06:07'),
(14, 14, 11, '3', '09/2014', '2024-06-04 17:06:11', '2024-06-04 17:06:11'),
(15, 15, 12, '3', '11/2013', '2024-06-04 17:06:15', '2024-06-04 17:06:15'),
(16, 16, 12, '1', '11/2013', '2024-06-04 17:06:18', '2024-06-04 17:06:18'),
(17, 17, 13, '1', '04/2017', '2024-06-04 17:06:21', '2024-06-04 17:06:21'),
(18, 18, 14, '1', '04/2021', '2024-06-04 17:06:25', '2024-06-04 17:06:25'),
(19, 19, 15, '1', '11/2013', '2024-06-04 17:06:27', '2024-06-04 17:06:27'),
(20, 20, 11, '2', '11/2013', '2024-06-04 17:06:31', '2024-06-04 17:06:31'),
(21, 21, 11, '3', '11/2013', '2024-06-04 17:06:36', '2024-06-04 17:06:36'),
(22, 22, 16, '2', '06/2015', '2024-06-04 17:06:41', '2024-06-04 17:06:41');

INSERT INTO `companies` (`id`, `cuit`, `razon_social`, `direccion`, `provincia`, `localidad`, `created_at`, `updated_at`) VALUES
(12, '30500000127', 'SEGUROS SURA S.A', 'GRIERSON,CECILIA BOULEVARD 255', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:05:40', '2024-06-04 17:05:40'),
(13, '30500001115', 'BOSTON COMPAÑIA ARGENTINA DE SEGUROS S A', 'SUIPACHA 268', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:07', '2024-06-04 17:06:07'),
(14, '30500001735', 'BANCO DE GALICIA Y BUENOS AIRES S A U', 'PERON JUAN TTE.GRAL. 430', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:11', '2024-06-04 17:06:11'),
(15, '30500003193', 'BANCO BBVA ARGENTINA S.A.', 'CORDOBA AV. 111', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:15', '2024-06-04 17:06:15'),
(16, '30500004874', 'SCOTIA QUILMES S A (EN LIQUIDACION)', 'PERON JUAN TTE.GRAL. 564', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:18', '2024-06-04 17:06:18'),
(17, '30500005625', 'CITIBANK N A', 'BARTOLOME MITRE 502', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:21', '2024-06-04 17:06:21'),
(18, '30500005862', 'BANK OF AMERICA N.A. OFICINA DE REPRESENTACION', 'DELLA PAOLERA CARLOS 261', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:25', '2024-06-04 17:06:25'),
(19, '30500006613', 'BANCO PATAGONIA SOCIEDAD ANONIMA', 'DE MAYO AV. 701', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:27', '2024-06-04 17:06:27'),
(20, '30500007539', 'MAPFRE ARGENTINA SEGUROS SOCIEDAD ANONIMA', 'ALFEREZ HIPOLITO BOUCHARD 4191', 'BUENOS AIRES', 'MUNRO', '2024-06-04 17:06:31', '2024-06-04 17:06:31'),
(21, '30500008454', 'BANCO SANTANDER ARGENTINA SOCIEDAD ANONIMA', 'GARAY JUAN DE AV. 151', 'CIUDAD AUTONOMA BUENOS AIRES', 'CAPITAL FEDERAL', '2024-06-04 17:06:36', '2024-06-04 17:06:36'),
(22, '30500009442', 'BANCO DE SAN JUAN S. A.', 'AV IG DE LA ROZA OESTE 85', 'SAN JUAN', 'SAN JUAN', '2024-06-04 17:06:41', '2024-06-04 17:06:41');

INSERT INTO `fiscals` (`id`, `fiscal_id`, `description`, `created_at`, `updated_at`) VALUES
(9, '651220', 'SERVICIOS DE SEGUROS PATRIMONIALES EXCEPTO LOS DE LAS ASEGURADORAS DE RIESGO DE TRABAJO (ART) (ART) » SERVICIOS DE SEGUROS » INTERMEDIACIÓN FINANCIERA Y SERVICIOS DE SEGUROS      ', '2024-06-04 17:05:40', '2024-06-04 17:05:40'),
(10, '', '', '2024-06-04 17:06:07', '2024-06-04 17:06:07'),
(11, '681098', 'SERVICIOS INMOBILIARIOS REALIZADOS POR CUENTA PROPIA, CON BIENES URBANOS PROPIOS O ARRENDADOS N.C.P. » SERVICIOS INMOBILIARIOS REALIZADOS POR CUENTA PROPIA, CON BIENES PROPIOS O ARRENDADOS » SERVICIOS INMOBILIARIOS      ', '2024-06-04 17:06:11', '2024-06-04 17:06:11'),
(12, '649999', 'SERVICIOS DE FINANCIACIÓN Y ACTIVIDADES FINANCIERAS N.C.P. (INCLUYE ACTIVIDADES DE INVERSIÓN EN ACCIONES, TÍTULOS, LA ACTIVIDAD DE CORREDORES DE BOLSA, SECURITIZACIÓN, MUTUALES FINANCIERAS, ETC.) (NO INCLUYE ACTIVIDADES FINANCIERAS RELACIONADAS CON EL OTORGAMIENTO DE CRÉDITOS) » SERVICIOS FINANCIEROS EXCEPTO LOS DE LA BANCA CENTRAL Y LAS ENTIDADES FINANCIERAS » INTERMEDIACIÓN FINANCIERA Y SERVICIOS DE SEGUROS      ', '2024-06-04 17:06:15', '2024-06-04 17:06:15'),
(13, '641910', 'SERVICIOS DE LA BANCA MAYORISTA » INTERMEDIACIÓN MONETARIA » INTERMEDIACIÓN FINANCIERA Y SERVICIOS DE SEGUROS      ', '2024-06-04 17:06:21', '2024-06-04 17:06:21'),
(14, '829900', 'SERVICIOS EMPRESARIALES N.C.P. » SERVICIOS EMPRESARIALES N.C.P. » ACTIVIDADES ADMINISTRATIVAS Y SERVICIOS DE APOYO      ', '2024-06-04 17:06:25', '2024-06-04 17:06:25'),
(15, '641930', 'SERVICIOS DE LA BANCA MINORISTA » INTERMEDIACIÓN MONETARIA » INTERMEDIACIÓN FINANCIERA Y SERVICIOS DE SEGUROS      ', '2024-06-04 17:06:27', '2024-06-04 17:06:27'),
(16, '620900', 'SERVICIOS DE INFORMÁTICA N.C.P. » SERVICIOS DE PROGRAMACIÓN Y CONSULTORÍA INFORMÁTICA Y ACTIVIDADES CONEXAS » INFORMACIÓN Y COMUNICACIONES      ', '2024-06-04 17:06:41', '2024-06-04 17:06:41');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_06_04_103408_create_companies_table', 1),
(7, '2024_06_04_103515_create_fiscals_table', 1),
(8, '2024_06_04_103516_create_activities_table', 1);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'admin@tyrostudio.com', NULL, '$2y$10$VM4wwJhnJ0vALscp6Lv2que4iCi0RdmVRfeKGl1PbI6P8KZJG3AQO', 'admin', NULL, '2024-06-04 16:51:41', '2024-06-04 16:51:41'),
(2, 'Mr Bean', 'bean@tyrostudio.com', NULL, '$2y$10$n1VP2/gUcR68j39mIZck4eehpKLzhvcpoeP6dJ1ip1uZG831fLk22', 'user', NULL, '2024-06-04 16:51:41', '2024-06-04 16:51:41'),
(3, 'Homosapiens', 'sapeins@tyrostudio.com', NULL, '$2y$10$W35bJTXCZmJ7TlgZEfCn6.3YPgwSI8ecd0HkoiegGLBCl0naETUY6', 'user', NULL, '2024-06-04 16:51:41', '2024-06-04 16:51:41');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;