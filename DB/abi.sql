-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 déc. 2024 à 13:12
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `abi`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `raisonSociale` varchar(50) DEFAULT NULL,
  `adresseClient` varchar(50) DEFAULT NULL,
  `codePostal` varchar(50) DEFAULT NULL,
  `villeClient` varchar(50) DEFAULT NULL,
  `CA` int DEFAULT NULL,
  `effectifClient` int DEFAULT NULL,
  `telephoneClient` varchar(50) DEFAULT NULL,
  `typeClient` varchar(50) DEFAULT NULL,
  `natureClient` varchar(50) DEFAULT NULL,
  `commentaireClient` varchar(50) DEFAULT NULL,
  `idSect` int NOT NULL,
  PRIMARY KEY (`idClient`),
  KEY `idSect` (`idSect`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

DROP TABLE IF EXISTS `commander`;
CREATE TABLE IF NOT EXISTS `commander` (
  `codeProjet` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  PRIMARY KEY (`codeProjet`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `idContact` int NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(50) DEFAULT NULL,
  `prenomContact` varchar(50) DEFAULT NULL,
  `telContact` varchar(50) DEFAULT NULL,
  `emailContact` varchar(50) DEFAULT NULL,
  `duree` int DEFAULT NULL,
  `idFonc` int NOT NULL,
  `idClient` int DEFAULT NULL,
  PRIMARY KEY (`idContact`),
  KEY `idFonc` (`idFonc`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `idDoc` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) DEFAULT NULL,
  `dateEdition` date DEFAULT NULL,
  `resume` varchar(50) DEFAULT NULL,
  `titreDoc` varchar(50) DEFAULT NULL,
  `codeProjet` int NOT NULL,
  `idContact` int DEFAULT NULL,
  PRIMARY KEY (`idDoc`),
  KEY `codeProjet` (`codeProjet`),
  KEY `idContact` (`idContact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `idFonc` int NOT NULL AUTO_INCREMENT,
  `fonction` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idFonc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `codeProjet` int NOT NULL AUTO_INCREMENT,
  `abrege` varchar(50) DEFAULT NULL,
  `nomProjet` varchar(50) DEFAULT NULL,
  `typeProjet` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codeProjet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int NOT NULL AUTO_INCREMENT,
  `typeRole` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `secteursActivité`
--

DROP TABLE IF EXISTS `secteursActivite`;
CREATE TABLE IF NOT EXISTS `secteursActivité` (
  `idSect` int NOT NULL,
  `activite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idSect`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `loginUser` varchar(50) DEFAULT NULL,
  `passUser` varchar(50) DEFAULT NULL,
  `idRole` int NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`idSect`) REFERENCES `secteursActivite` (`idSect`);

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`codeProjet`) REFERENCES `projets` (`codeProjet`),
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`);

--
-- Contraintes pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`idFonc`) REFERENCES `fonctions` (`idFonc`),
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `clients` (`idClient`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`codeProjet`) REFERENCES `projets` (`codeProjet`),
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`idContact`) REFERENCES `contacts` (`idContact`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
