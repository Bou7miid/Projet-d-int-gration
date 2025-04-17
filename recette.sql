-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 18 avr. 2025 à 00:33
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_integration`
--

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `ingredients` text NOT NULL,
  `etapes` text NOT NULL,
  `temps_preparation` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `nom`, `ingredients`, `etapes`, `temps_preparation`, `image`) VALUES
(1, 'Ben aissa', 'qsfdgfh', 'ezgrehtfh,g', 5, NULL),
(2, 'Coscous ', 'azddaa', 'addaeeffaeaf', 5, NULL),
(3, 'Coscous ', 'jyutyghvfut', 'gcctftf', 6, NULL),
(4, 'Coscous ', 'jyutyghvfut', 'gcctftf', 6, NULL),
(5, 'Coscous ', 'jyutyghvfut', 'gcctftf', 6, NULL),
(6, 'Ben aissa', 'dadafaef', 'aefcwcvsv5', 4, NULL),
(7, 'Coscous ', 'zzzze', 'eeeee', 5, NULL),
(8, 'Coscous ', 'aaaaa', 'zzzz', 5, NULL),
(9, 'Coscous ', 'kkkk', 'jjjj', 5, NULL),
(10, 'eeezz', 'zzzza', 'aaaaa', 5, NULL),
(11, 'Coscous ', 'llll', 'mmmmm', 5, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
