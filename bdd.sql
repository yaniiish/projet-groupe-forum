-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 déc. 2022 à 14:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum_dev`
--
CREATE DATABASE IF NOT EXISTS `forum_dev` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum_dev`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(4096) DEFAULT NULL,
  `pseudo` varchar(256) DEFAULT NULL,
  `id_sujet` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(32) DEFAULT NULL,
  `titre` varchar(64) DEFAULT NULL,
  `contenu` varchar(4096) DEFAULT NULL,
  `pseudo` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(256) DEFAULT NULL,
  `mail` varchar(256) DEFAULT NULL,
  `mdp` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `mail`, `mdp`) VALUES
(18, 'sam1', 'ljl@kllk.net', '$2y$10$5lQY18L9IPPHWlWHVAp0/e12HptAuGcSsUqIAY7bW2h/bZip542/e'),
(17, 'baya', 'lklk@klj.net', '$2y$10$CV1Xqf2XeLfxfKLUBbuQgOMk2g.Ci3q5sjDZuDL/3Yrc98Z/2imiu'),
(16, 'sam', 'sam@l.net', '$2y$10$gkTNR1ZBqrQWqiSiSQgs/.miY1/u/Ix3Dw60dwpGvx7T/piCcx0hi'),
(15, 'yanis3', 'mlum@lm.n', '$2y$10$Jljwp7LYlkTLKNY/fTVBzeKCYrc9HMfdOlM9clP7PE1xl7LEqG/vW'),
(14, 'yanis3', 'mlum@lm.n', '$2y$10$x1Hos6KeQ.GanH1YG7EPL.ohR01PHSBAmX/CDbR2FDRpQbu/vMNZO'),
(13, 'yanis3', 'mlum@lm.n', '$2y$10$PwxJWnOxng8FgaXPaWX2UuxI1QX5OU.JNJ0THS8uT3IwU5D2FLfOW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
