-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 10, 2016 at 01:15 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `BAP_poste`
--

-- --------------------------------------------------------

--
-- Table structure for table `link_projet_user`
--

CREATE TABLE `link_projet_user` (
  `id` int(100) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_projet` int(10) NOT NULL,
  `role` int(2) NOT NULL COMMENT '1=cdp,2=techos',
  `metier` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_projet_user`
--

INSERT INTO `link_projet_user` (`id`, `id_user`, `id_projet`, `role`, `metier`) VALUES
(1, 11, 12, 1, ''),
(2, 16, 13, 1, ''),
(3, 7, 12, 2, ''),
(4, 15, 12, 2, ''),
(5, 19, 12, 2, 'Responsable UX');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(235) DEFAULT NULL,
  `date_creation` varchar(40) DEFAULT NULL,
  `code` char(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `date_creation`, `code`) VALUES
(19, 'D&eacute;couverte de l''&eacute;quipe', 'ok', '1475225911', NULL),
(20, 'ho', 'qsd', '1475245541', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projet_bap`
--

CREATE TABLE `projet_bap` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_team` int(50) NOT NULL,
  `brief` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projet_bap`
--

INSERT INTO `projet_bap` (`id`, `name`, `id_team`, `brief`) VALUES
(2, 'La Poste', 0, 'Ub&eacute;risation de la distribution de courrier.'),
(3, 'Montres', 0, 'Vente de montres en ligne'),
(4, 'Marine Nationale', 0, 'Prototype de simulation navale pour le CESCM'),
(9, 'Restaurant Corse', 0, 'Cr&eacute;ation d''un site web pour un restaurateur Corse'),
(11, 'Canal Job', 0, 'Site de recherche d''emplois'),
(12, 'Pour ma banque', 0, 'petit site laravel'),
(13, 'Resaf', 0, 'Site internet d&eacute;di&eacute; aux professionnels de l''assurance');

-- --------------------------------------------------------

--
-- Table structure for table `users_bap`
--

CREATE TABLE `users_bap` (
  `id` int(11) unsigned NOT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `prenom` varchar(50) NOT NULL,
  `id_projet` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_bap`
--

INSERT INTO `users_bap` (`id`, `mail`, `nom`, `role`, `password`, `admin`, `prenom`, `id_projet`) VALUES
(7, 'hinfraytheo@gmail.com', 'Hinfray', '', '098f6bcd4621d373cade4e832627b4f6', 1, 'Th&eacute;o', 4),
(8, 'ayme', 'Jacquet', 'Graphiste', NULL, 3, 'Aym&eacute;', 0),
(9, 'matthieu', 'Lalbat', 'Responsable UX', NULL, 3, 'Matthieu', 0),
(11, 'damien', 'Duvernois', '', '098f6bcd4621d373cade4e832627b4f6', 3, 'Damien', 2),
(12, 'Cyrielle', 'Comes', 'Technicien CD', '098f6bcd4621d373cade4e832627b4f6', 3, 'Cyrielle', 0),
(13, 'arthur', '', '', '2b1d236229aa8601e877788055c123c9', 3, '', 0),
(14, 'maude@gmail.com', 'Grimberg', '', 'test', 3, 'Maude', 9),
(15, 'nicolas@gmail.com', '', '', '098f6bcd4621d373cade4e832627b4f6', 3, '', 11),
(16, 'gauthierflichy@gmail.com', 'Flichy', '', 'test', 1, 'Gauthier', 13),
(19, 'cyrielle@gmail.com', 'Comes', '3', NULL, NULL, 'Cyrielle', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `link_projet_user`
--
ALTER TABLE `link_projet_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projet_bap`
--
ALTER TABLE `projet_bap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_bap`
--
ALTER TABLE `users_bap`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `link_projet_user`
--
ALTER TABLE `link_projet_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `projet_bap`
--
ALTER TABLE `projet_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users_bap`
--
ALTER TABLE `users_bap`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;