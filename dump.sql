-- --------------------------------------------------------
-- Hoszt:                        127.0.0.1
-- Szerver verzió:               5.7.17 - MySQL Community Server (GPL)
-- Szerver OS:                   Win32
-- HeidiSQL Verzió:              12.6.0.6793
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Adatbázis struktúra mentése a develery.
DROP DATABASE IF EXISTS `develery`;
CREATE DATABASE IF NOT EXISTS `develery` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `develery`;

-- Struktúra mentése tábla develery. admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Tábla adatainak mentése develery.admin: 1 rows
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
	(1, 'admin', '["ROLE_ADMIN"]', '$2y$13$ewfstijaB1e5iVMrHVjVNu2PrCpD2dU1TotxoC175BB.kblM01BdO');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Struktúra mentése tábla develery. doctrine_migration_versions
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_bin NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Tábla adatainak mentése develery.doctrine_migration_versions: 2 rows
DELETE FROM `doctrine_migration_versions`;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20240211213814', '2024-02-11 23:19:01', 22),
	('DoctrineMigrations\\Version20240212165636', '2024-02-12 23:19:32', 13);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Struktúra mentése tábla develery. message
DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Tábla adatainak mentése develery.message: 3 rows
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id`, `email`, `name`, `message`) VALUES
	(1, 'teszt@elek.hu', 'Teszt Elek', 'A "contact" helyett a "message"-t használtam, remélem nem gond'),
	(2, 'gipsz@jakab.hu', 'Gipsz Jakab', 'Ismét egy üzenet.'),
	(3, 'hack@elek.hu', 'Hack Elek', 'Speciális<br>karaktereksdf"sdf"\\sdf\\s"dg"dfg\'g\'g\'g\'\\\\\\\'gG\'g\'g""g"G""G"dfg!');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Struktúra mentése tábla develery. messenger_messages
DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Tábla adatainak mentése develery.messenger_messages: 0 rows
DELETE FROM `messenger_messages`;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
