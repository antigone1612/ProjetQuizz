-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 14 fév. 2021 à 09:18
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`IdQuestion`, `IdQuiz`, `Question`, `IdBonneReponse`) VALUES
(1, 1, 'Qui est la mascotte ?', 2),
(2, 1, 'Comment affiche t-on le contenu d\'une variable ?', 6),
(3, 1, 'Les fichiers php ont l\'extension ... ', 11),
(4, 1, 'Un script doit commencer par ...?', 16),
(5, 2, 'Où peut-on trouver le panda ?', 17),
(6, 2, 'Les chauves-souris dorment ----.', 22),
(7, 2, 'Les souris mangent ----.', 26),
(8, 2, 'Le zèbre a des -----.', 29);

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
  `IdUser` int(10) NOT NULL,
  PRIMARY KEY (`IdQuiz`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quizs`
--

INSERT INTO `quizs` (`IdQuiz`, `Titre`, `IdCategorie`, `Description`, `IdUser`) VALUES
(1, 'PHP', 2, 'Le connaissez vous vraiment ?', 3),
(2, 'Généralités des animaux', 1, 'Un quizz compet pour les passionés', 3);

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
(1, 1, 'Une souris '),
(2, 1, 'Un éléphant'),
(3, 1, 'Un chien'),
(4, 1, 'Une giraffe'),
(5, 2, 'echo'),
(6, 2, 'var_dump'),
(7, 2, 'systemOutPrint'),
(8, 2, 'afficher()'),
(9, 3, '.txt'),
(10, 3, '.html'),
(11, 3, '.php'),
(12, 3, '.py'),
(13, 4, '<php'),
(14, 4, '<?'),
(15, 4, 'php'),
(16, 4, '<?php'),
(17, 5, 'En Chine'),
(18, 5, 'En Afrique'),
(19, 5, 'En France'),
(20, 5, 'En Amerique'),
(21, 6, 'La nuit'),
(22, 6, 'Le jour'),
(23, 6, 'Jamais'),
(24, 6, '1 jour sur 2'),
(25, 7, 'Des fraises'),
(26, 7, 'Du fromage'),
(27, 7, 'Des haricots'),
(28, 7, 'Des pattates'),
(29, 8, 'rayures'),
(30, 8, 'points'),
(31, 8, 'taches'),
(32, 8, 'traits');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`IdUser`, `Nom`, `Prenom`, `Mail`, `MotDePasse`, `QuizsGagnes`, `QuizsJoues`) VALUES
(3, 'Wastiau', 'Vinz', 'v.w@gmail.com', '$2y$10$O/In1luLO4Czmg7QeYwnG.wNTtDX4RN1ZbMPJy80hSTqWNSaSStby', 3, 7),
(8, 'Pakloglou', 'Antigone', 'antigone.pakloglou@estiam.com', '$2y$10$XczDUWyvxgjmkOGgrgTjqe.P9EHPXVeRmUIkOTaAqNNq2gO05akDO', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
