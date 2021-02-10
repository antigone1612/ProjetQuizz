-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 fév. 2021 à 16:37
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thequizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `IdCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`IdCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`IdCategorie`, `nom`) VALUES
(1, 'Animaux'),
(2, 'Informatique'),
(3, 'Mode');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `IdQuestion` int(10) NOT NULL AUTO_INCREMENT,
  `IdQuiz` int(10) DEFAULT NULL,
  `Question` varchar(200) DEFAULT NULL,
  `IdBonneReponse` int(10) DEFAULT NULL,
  PRIMARY KEY (`IdQuestion`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`IdQuestion`, `IdQuiz`, `Question`, `IdBonneReponse`) VALUES
(12, 7, 'Sa viande préférée', 26),
(13, 7, 'Sa place préférée dans son terrarium', 29),
(11, 7, 'Le fruit à ne pas donner', 21),
(10, 7, 'Sa salade préférée ?', 20);

-- --------------------------------------------------------

--
-- Structure de la table `quizs`
--

DROP TABLE IF EXISTS `quizs`;
CREATE TABLE IF NOT EXISTS `quizs` (
  `IdQuiz` int(10) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(30) DEFAULT NULL,
  `IdCategorie` int(10) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdQuiz`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quizs`
--

INSERT INTO `quizs` (`IdQuiz`, `Titre`, `IdCategorie`, `Description`) VALUES
(7, 'Peston à la plage', 1, 'Apprendre la vie de grenouille');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `IdReponse` int(10) NOT NULL AUTO_INCREMENT,
  `IdQuestion` int(10) NOT NULL,
  `Reponse` varchar(200) NOT NULL,
  PRIMARY KEY (`IdReponse`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponses`
--

INSERT INTO `reponses` (`IdReponse`, `IdQuestion`, `Reponse`) VALUES
(22, 11, 'Figue'),
(21, 11, 'Fruit Rouge'),
(20, 10, 'Basilique'),
(19, 10, 'Cresson'),
(18, 10, 'Frisée'),
(17, 10, 'Laitue'),
(23, 11, 'Pomme'),
(24, 11, 'Papaye'),
(25, 12, 'Grillons'),
(26, 12, 'Vers de farine'),
(27, 12, 'Souris'),
(28, 12, 'Thomas'),
(29, 13, 'Sous la lampe'),
(30, 13, 'Dans l\'eau'),
(31, 13, 'Cabane'),
(32, 13, 'Vitre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `IdUser` int(10) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) DEFAULT NULL,
  `Prenom` varchar(30) DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  `MotDePasse` varchar(60) DEFAULT NULL,
  `QuizsGagnes` int(3) DEFAULT NULL,
  `QuizsJoues` int(3) DEFAULT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`IdUser`, `Nom`, `Prenom`, `Mail`, `MotDePasse`, `QuizsGagnes`, `QuizsJoues`) VALUES
(5, 'Pakloglou', 'Antigone', 'anti@gmail.com', '$2y$10$.TLwkJ8GlbNZ548MNDxEQOh.BlVxdYwY9vyW6Zu8uRCQucI6vnPpu', 0, 0),
(3, 'Wastiau', 'Vinz', 'v.w@gmail.com', '$2y$10$O/In1luLO4Czmg7QeYwnG.wNTtDX4RN1ZbMPJy80hSTqWNSaSStby', 0, 0),
(6, 'thomas', 'Fredo', 'fred@gmail.com', '$2y$10$4wluHx/7GXvIB9IqTWoqO.N9LvrwgtWTZfTGlaS4Qg.Ux8alLOfwu', 0, 0),
(7, 'PAKL', 'Gren', 'gre@gmail.com', '$2y$10$6A5k4.5XKLdVE6EztxDv9ORnSJP36UK4NcDKneBmnju.Y5pV.iiZK', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
