-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 14 mars 2025 à 20:29
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'ahmed', 'ben aissa', 'Abenaissa121@gmail.com', '$2y$10$3KQNhDLFQeD1BhKNvX7S2OM9Jdlq9hlDv75mV2vIs4ruXjlTTHApG'),
(2, 'ahmed', 'ben aissa', 'azerty@gmail.com', '$2y$10$dOoUBakhOt6/suKwxZrrsOvGvjDuh/roXN2ld5Fqpx5ViUhauCOfi'),
(3, 'ahmed', 'ben aissa', 'azssss@gmail.com', 'I0B0TGFD'),
(4, 'zzz', 'aaa', 'aaa@gmail.com', '$2y$10$MQ8q28kqQKPyOa/JKcnTJ.xRPmyBmLL5V8mEHwvFEPpRKZg9Lb56.'),
(5, 'ahmed', 'aaa', 'aqqqq@gmail.com', '$2y$10$NYkuRv3z5LXkLmGnhyrBEuKmnq6pe3LSE7J2FcN7vAlPzVDATkC8G'),
(6, 'ahmed', 'ben aissa', 'zzzz@gmail.com', '$2y$10$7.SvxuTwagz.ekIwhowynuu12IL7uar6c/fbsyszdgi.cOj/WbAji');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
