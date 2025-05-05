-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 mai 2025 à 23:34
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
-- Base de données : `projet_integration`
--

-- --------------------------------------------------------

--
-- Structure de la table `evaluer`
--

DROP TABLE IF EXISTS `evaluer`;
CREATE TABLE IF NOT EXISTS `evaluer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_recette` int NOT NULL,
  `note` int NOT NULL,
  `commentaire` text NOT NULL,
  `date_evaluation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_recette` (`id_recette`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `evaluer`
--

INSERT INTO `evaluer` (`id`, `id_user`, `id_recette`, `note`, `commentaire`, `date_evaluation`) VALUES
(2, 7, 37, 4, '', '2025-05-04 13:46:52'),
(4, 7, 32, 5, '', '2025-05-04 13:47:47'),
(5, 7, 35, 1, '', '2025-05-04 13:47:52'),
(6, 7, 32, 1, '', '2025-05-04 13:48:46'),
(7, 7, 32, 1, '', '2025-05-04 13:48:50'),
(8, 7, 32, 1, '', '2025-05-04 13:48:54'),
(9, 7, 32, 2, '', '2025-05-04 13:48:57'),
(10, 7, 32, 5, '', '2025-05-04 13:49:00'),
(12, 7, 37, 5, '', '2025-05-04 13:49:15'),
(15, 7, 37, 5, '', '2025-05-04 13:50:09'),
(16, 7, 37, 2, '', '2025-05-04 13:50:13'),
(17, 7, 36, 5, '', '2025-05-04 13:54:59'),
(18, 7, 35, 1, '', '2025-05-04 14:04:20'),
(19, 7, 35, 1, '', '2025-05-04 14:04:24'),
(20, 7, 35, 1, '', '2025-05-04 14:04:28'),
(21, 3, 35, 4, '', '2025-05-04 14:47:10'),
(22, 3, 32, 2, '', '2025-05-04 23:01:49'),
(24, 7, 43, 5, '', '2025-05-04 23:32:06'),
(25, 3, 36, 4, '', '2025-05-05 11:13:23');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ingredients` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `etapes` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `temps_preparation` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `ingredients`, `etapes`, `temps_preparation`, `image`) VALUES
(32, 'kossiiiii', 'zzz', 'aaaa', 5, 'images/couscous.jpg'),
(35, 'ahmed', 'aaa', 'qqq', 6, 'images/couscous.jpg'),
(36, 'cccccccccccccccc', 'dddddd', 'zzzzzzzzzzz', 5, 'images/couscous.jpg'),
(37, 'ahmed', 'eee', 'ddd', 5, 'images/couscous.jpg'),
(43, 'TestNom', 'zzzz\r\naaaa\r\nccccc', 'aaaa\r\ncccc\r\nqqqq', 5, 'images/couscous.jpg'),
(44, 'TestNom', 'aaa', 'qqq', 5, 'images/couscous.jpg'),
(46, 'burger', 'farine', 'eee', 5, 'images/burger.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(3, 'ahmed', 'ben aissa', 'azssss@gmail.com', 'I0B0TGFD'),
(6, 'ahmed', 'ben aissa', 'zzzz@gmail.com', '$2y$10$7.SvxuTwagz.ekIwhowynuu12IL7uar6c/fbsyszdgi.cOj/WbAji'),
(7, 'Admin', 'Admin', 'admin@gmail.com', 'admin'),
(13, 'ahmed', 'amraoui', 'a@gmail.com', '000000');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD CONSTRAINT `evaluer_ibfk_1` FOREIGN KEY (`id_recette`) REFERENCES `recette` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluer_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
