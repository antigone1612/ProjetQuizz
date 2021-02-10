-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 fév. 2021 à 11:23
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
-- Base de données :  `thequizzz`
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
  `IdQuestion` int(10) NOT NULL,
  `IdQuiz` int(10) DEFAULT NULL,
  `Question` varchar(200) DEFAULT NULL,
  `Reponse1` varchar(50) DEFAULT NULL,
  `Reponse2` varchar(50) DEFAULT NULL,
  `Reponse3` varchar(50) DEFAULT NULL,
  `Reponse4` varchar(50) DEFAULT NULL,
  `BonneReponse` int(1) DEFAULT NULL,
  PRIMARY KEY (`IdQuestion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`IdQuestion`, `IdQuiz`, `Question`, `Reponse1`, `Reponse2`, `Reponse3`, `Reponse4`, `BonneReponse`) VALUES
(1, 1, 'Combien y a-t-il d\'especes de crocodiles ?', '20', '23', '17', '10', 2),
(2, 1, 'Ce crocodile tue environ 1000 personnes par an. Lequel ?', 'Crocodile des marais', 'Le crocodile du Nil', 'Crocodile marin', 'Crocodile de Cuba', 3),
(3, 1, 'En une fraction de seconde le crocodile du Nil peut faire un bond de ...', '3 mètres', '1,5 mètres', '2 mètres', '2,5 mètres', 4),
(4, 2, 'Parmi ces personnages, lequel n\'a jamais fait une apparition (en étant jouable) dans un jeu avec Mario ?', 'Sacha (Pokémon)', 'Sonic', 'Samus Aran', 'Solid Snake', 1),
(5, 2, 'Dans quel jeu retrouve-t-on un personnage appelé \'Le Lion Rouge\' ?', 'Mario 64', 'The Legend Of Zelda : The Wind Waker', 'Metroïd Prime', 'Donkey Kong Country', 2),
(6, 2, 'Quelle est la ville natale de Sacha, dans Pokémon ?', 'Jadielle', 'PokéLand', 'Bourg Palette', 'Royaume Pokémon', 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quizs`
--

INSERT INTO `quizs` (`IdQuiz`, `Titre`, `IdCategorie`, `Description`) VALUES
(1, 'QuizzzTest', 2, 'Le premier quizz que j\'arrive à enregistrer en bdd');

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
