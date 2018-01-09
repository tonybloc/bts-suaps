-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 jan. 2018 à 08:30
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `suaps`
--

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `ID_DROIT` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE_DROIT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_DROIT`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`ID_DROIT`, `LIBELLE_DROIT`) VALUES
(1, 'Réserver un place'),
(2, 'Supprimer une réservation'),
(3, 'Edition de statistique'),
(4, 'Saisie des adhérants'),
(5, 'MAJ des membre'),
(6, 'Ajouter des tickets'),
(7, 'Acheter des tickets');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `ID_PLACE` int(11) NOT NULL,
  `LIBELLE_PLACE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_PLACE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `ID_ROLE` int(11) NOT NULL,
  `ID_DROIT` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROLE`,`ID_DROIT`),
  KEY `POSSEDE2_FK` (`ID_ROLE`),
  KEY `POSSEDE_FK` (`ID_DROIT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`ID_ROLE`, `ID_DROIT`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `ID_UTIL` int(11) NOT NULL,
  `ID_PLACE` int(11) NOT NULL,
  `DATE_RESERVATION` date DEFAULT NULL,
  `ETAT` tinyint(4) NOT NULL COMMENT 'Annulé/Réservé/Invitée',
  PRIMARY KEY (`ID_UTIL`,`ID_PLACE`),
  KEY `RESERVER2_FK` (`ID_UTIL`),
  KEY `RESERVER_FK` (`ID_PLACE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE_ROLE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_ROLE`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`ID_ROLE`, `LIBELLE_ROLE`) VALUES
(1, 'Administrateur'),
(2, 'Membre'),
(3, 'Invité'),
(4, 'Adhérant');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTIL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ROLE` int(11) NOT NULL,
  `LASTNAME_UTIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIRSTNAME_UTIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PASSWORD_UTIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NB_TICKETS_SEMAINE` int(11) DEFAULT NULL,
  `NB_TICKETS_WEEKEND` int(11) DEFAULT NULL,
  `NB_TICKETS_TOTAL_UTIL` int(11) NOT NULL,
  PRIMARY KEY (`ID_UTIL`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  KEY `OCCUPE_FK` (`ID_ROLE`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTIL`, `ID_ROLE`, `LASTNAME_UTIL`, `FIRSTNAME_UTIL`, `PASSWORD_UTIL`, `EMAIL`, `NB_TICKETS_SEMAINE`, `NB_TICKETS_WEEKEND`, `NB_TICKETS_TOTAL_UTIL`) VALUES
(1, 1, 'DUPONT', 'Jean', 'azerty', 'dupontjean@gmail.com', NULL, NULL, 0),
(2, 2, 'DURANT', 'Marc', '1234', 'durantmarc@gmail.com', 5, 5, 0),
(3, 2, 'HAWKINS', 'JIM', '1234', 'hawjim@gmail.com', 5, 5, 0),
(4, 2, 'OBRA', 'Jemal', '1234', 'jaimalobra@gmail.com', 5, 5, 0),
(5, 2, 'ALJAMB', 'Jemal', 'A1Z2', 'jemalaljamb@gmail.com', 5, 5, 0),
(6, 2, 'PARMENTIER', 'Achille', '23Az', 'achilleparmentier@gmail.com', 5, 5, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
