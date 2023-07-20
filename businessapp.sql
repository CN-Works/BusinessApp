-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour businessapp
CREATE DATABASE IF NOT EXISTS `businessapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `businessapp`;

-- Listage de la structure de table businessapp. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table businessapp.doctrine_migration_versions : ~1 rows (environ)
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20230718073237', '2023-07-18 07:32:52', 128);

-- Listage de la structure de table businessapp. employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `society_id` int NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `datehired` datetime NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5D9F75A1E6389D24` (`society_id`),
  CONSTRAINT `FK_5D9F75A1E6389D24` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table businessapp.employee : ~7 rows (environ)
INSERT INTO `employee` (`id`, `society_id`, `firstname`, `lastname`, `dateofbirth`, `datehired`, `city`) VALUES
	(1, 3, 'Marco', 'Piqueur', '2023-07-18 14:19:43', '2023-07-18 14:19:50', 'Lisbon'),
	(2, 4, 'Laura', 'Maurenne', '2023-07-18 14:20:36', '2023-07-18 14:20:37', 'London'),
	(3, 1, 'Luigi', 'Despacito', '2023-07-18 14:20:52', '2023-07-18 14:20:52', 'San Remo'),
	(4, 2, 'Fenwyck', 'Delmand', '2023-07-18 14:21:27', '2023-07-18 14:21:28', 'Zurich'),
	(5, 1, 'Marcello', 'Divisioni', '2023-07-18 14:21:43', '2023-07-18 14:21:44', 'San Remo'),
	(6, 4, 'Lauren', 'Burch', '2023-07-18 14:21:58', '2023-07-18 14:21:58', 'Paris'),
	(7, 3, 'Tibo', 'NotInShape', '2023-07-18 14:22:12', '2023-07-18 14:22:12', 'Toulouse');

-- Listage de la structure de table businessapp. messenger_messages
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table businessapp.messenger_messages : ~0 rows (environ)

-- Listage de la structure de table businessapp. society
CREATE TABLE IF NOT EXISTS `society` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table businessapp.society : ~4 rows (environ)
INSERT INTO `society` (`id`, `label`, `creationdate`, `adress`, `postalcode`, `city`) VALUES
	(1, 'PizzaThis', '2023-07-18 11:10:30', '55 avenue de la pierre', '68000', 'Colmar'),
	(2, 'LTD', '2023-07-18 11:11:13', '21 rue de l\'art', '06160', 'Antibes'),
	(3, 'GymInLand', '2023-07-18 11:11:54', '64 route de la soie', '06000', 'Nice'),
	(4, 'Uwu Cat Coffee', '2023-07-18 11:31:57', '25 rue des chats', '75000', 'Paris');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
