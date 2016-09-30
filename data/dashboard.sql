-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 06 Septembre 2016 à 18:44
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `admin_st`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(235) DEFAULT NULL,
  `date_creation` varchar(40) DEFAULT NULL,
  `code` char(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `date_creation`, `code`) VALUES
(1, 'date3', 'Merci !', '1473174503', NULL),
(2, 'test', 'Ca marche', '1473175354', NULL),
(3, 'Horaires', 'Lundi 8h-13h', '1473175407', NULL),
(15, 'Message du jour !', 'Les roses sont rouges, les violets sont bleues. C''est bizarre la vie.', '1473178646', 'WEL16'),
(16, 'Tout marche Ã  l''heure qu''il est', 'Comment c''est bien quand tout marche, signÃ© l''admin !', '1473180081', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `useradmin` varchar(11) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `useradmin`, `password`, `admin`) VALUES
(1, 'tim', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
