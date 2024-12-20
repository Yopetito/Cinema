-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.40 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for cinema_yofer
CREATE DATABASE IF NOT EXISTS `cinema_yofer` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_yofer`;

-- Dumping structure for table cinema_yofer.acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `acteur_ibfk_1` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.acteur: ~12 rows (approximately)
REPLACE INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(15, 1),
	(1, 4),
	(2, 5),
	(3, 6),
	(4, 7),
	(5, 8),
	(6, 9),
	(7, 10),
	(8, 11),
	(9, 12),
	(10, 13),
	(14, 20);

-- Dumping structure for table cinema_yofer.casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_personnage` int NOT NULL,
  `id_acteur` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_personnage`,`id_acteur`),
  KEY `casting_ibfk_2` (`id_personnage`),
  KEY `casting_ibfk_3` (`id_acteur`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_personnage`) REFERENCES `personnages` (`id_personnage`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.casting: ~11 rows (approximately)
REPLACE INTO `casting` (`id_film`, `id_personnage`, `id_acteur`) VALUES
	(1, 1, 1),
	(2, 2, 3),
	(3, 3, 2),
	(4, 4, 5),
	(5, 5, 6),
	(6, 6, 1),
	(7, 7, 4),
	(8, 8, 1),
	(9, 9, 5),
	(10, 10, 14),
	(1, 15, 2);

-- Dumping structure for table cinema_yofer.film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(50) NOT NULL,
  `dateDeSortie_film` date NOT NULL,
  `duree_film` int NOT NULL,
  `synopsis_film` text,
  `note_film` decimal(15,1) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  `affiche_film` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `film_ibfk_1` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.film: ~10 rows (approximately)
REPLACE INTO `film` (`id_film`, `titre_film`, `dateDeSortie_film`, `duree_film`, `synopsis_film`, `note_film`, `id_realisateur`, `affiche_film`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Un thriller sur les rêves partagés.', 9.0, 1, NULL),
	(2, 'Interstellar', '2014-11-07', 169, 'Un voyage spatial pour sauver l\'humanité.', 8.6, 1, NULL),
	(3, 'Dune', '2021-10-22', 155, 'Une épopée dans le désert.', 8.3, 2, NULL),
	(4, 'Blade Runner 2049', '2022-10-06', 164, 'Suite du classique cyberpunk.', 8.0, 2, NULL),
	(5, 'The Dark Knight', '2008-07-18', 152, 'Le combat de Batman contre le Joker.', 9.0, 1, NULL),
	(6, 'Shutter Island', '2010-02-19', 138, 'Un thriller psychologique.', 8.1, 1, NULL),
	(7, 'The Martian', '2015-10-02', 144, 'Un astronaute lutte pour sa survie sur Mars.', 8.0, 3, NULL),
	(8, 'Catch Me If You Can', '2002-12-25', 141, 'L\'histoire d\'un escroc recherché par le FBI.', 8.1, 3, NULL),
	(9, 'Saving Private Ryan', '1998-07-24', 169, 'Pendant la Seconde Guerre mondiale, un groupe de soldats part sauver un homme.', 8.6, 3, NULL),
	(10, 'Memento', '2000-10-11', 113, 'Un homme cherche à venger la mort de sa femme en utilisant la mémoire à court terme.', 8.4, 1, NULL);

-- Dumping structure for table cinema_yofer.film_genre
CREATE TABLE IF NOT EXISTS `film_genre` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `film_genre_ibfk_2` (`id_genre`),
  CONSTRAINT `film_genre_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `film_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.film_genre: ~10 rows (approximately)
REPLACE INTO `film_genre` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(7, 1),
	(5, 2),
	(6, 3),
	(8, 3),
	(10, 3),
	(9, 4);

-- Dumping structure for table cinema_yofer.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  `affiche_genre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.genre: ~5 rows (approximately)
REPLACE INTO `genre` (`id_genre`, `nom_genre`, `affiche_genre`) VALUES
	(1, 'Science-fiction', NULL),
	(2, 'Action', NULL),
	(3, 'Thriller', NULL),
	(4, 'Drame', NULL),
	(5, 'Aventure', NULL);

-- Dumping structure for table cinema_yofer.personnage
CREATE TABLE IF NOT EXISTS `personnage` (
  `id_personnage` int NOT NULL AUTO_INCREMENT,
  `nom_personnage` varchar(50) NOT NULL,
  `affiche_personnage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.personnage: ~12 rows (approximately)
REPLACE INTO `personnage` (`id_personnage`, `nom_personnage`, `affiche_personnage`) VALUES
	(1, 'Cobb', NULL),
	(2, 'Cooper', NULL),
	(3, 'Paul Atreides', NULL),
	(4, 'K', NULL),
	(5, 'Bruce Wayne', NULL),
	(6, 'Teddy Daniels', NULL),
	(7, 'Mark Watney', NULL),
	(8, 'Frank Abagnale Jr.', NULL),
	(9, 'Captain Miller', NULL),
	(10, 'Leonard Shelby', NULL),
	(15, 'Eames', NULL),
	(16, 'Tinkiwinki', NULL);

-- Dumping structure for table cinema_yofer.personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `affiche_personne` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.personne: ~14 rows (approximately)
REPLACE INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `dateNaissance`, `affiche_personne`) VALUES
	(1, 'Nolan', 'Christopher', 'Homme', '1970-07-30', NULL),
	(2, 'Villeneuve', 'Denis', 'Homme', '1967-10-03', NULL),
	(3, 'Spielberg', 'Steven', 'Homme', '1946-12-18', NULL),
	(4, 'DiCaprio', 'Leonardo', 'Homme', '1974-11-11', NULL),
	(5, 'Hardy', 'Tom', 'Homme', '1977-09-15', NULL),
	(6, 'McConaughey', 'Matthew', 'Homme', '1969-11-04', NULL),
	(7, 'Hathaway', 'Anne', 'Femme', '1982-11-12', NULL),
	(8, 'Ford', 'Harrison', 'Homme', '1942-07-13', NULL),
	(9, 'Bale', 'Christian', 'Homme', '1974-01-30', NULL),
	(10, 'Pattinson', 'Robert', 'Homme', '1986-05-13', NULL),
	(11, 'Gadot', 'Gal', 'Femme', '1985-04-30', NULL),
	(12, 'Ledger', 'Heath', 'Homme', '1979-04-04', NULL),
	(13, 'Theron', 'Charlize', 'Femme', '1975-08-07', NULL),
	(20, 'Pearce', 'Guy', 'Homme', '1967-10-05', NULL);

-- Dumping structure for table cinema_yofer.realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `realisateur_ibfk_1` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema_yofer.realisateur: ~3 rows (approximately)
REPLACE INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
