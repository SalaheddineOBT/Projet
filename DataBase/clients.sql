-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 mai 2022 à 10:21
-- Version du serveur :  10.5.12-MariaDB
-- Version de PHP : 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id18887616_carrantal`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Adresse` varchar(500) DEFAULT NULL,
  `NationalID` varchar(100) DEFAULT NULL,
  `NumPermis` varchar(100) DEFAULT NULL,
  `Photo` longblob DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `NumPhone` varchar(20) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `IdentityPhotoFront` longblob DEFAULT NULL,
  `IdentityPhotoBack` longblob DEFAULT NULL,
  `PermisPhotoFront` longblob DEFAULT NULL,
  `PermisPhotoBack` longblob DEFAULT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `NumRents` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ID`, `Name`, `Adresse`, `NationalID`, `NumPermis`, `Photo`, `Email`, `NumPhone`, `Password`, `IdentityPhotoFront`, `IdentityPhotoBack`, `PermisPhotoFront`, `PermisPhotoBack`, `Created`, `NumRents`) VALUES
(1, 'genius', '', '', '', '', 'genius@g.g', '+212696177555', '$2y$10$w22XM6Wa6xx/Qf7yZL.pKO6wisnaUtXP5eIB/4lGrsDCEZnFPoF.i', '', '', '', '', '2022-05-04 16:58:15', 0),
(2, 'salah', NULL, NULL, NULL, NULL, 'salah@g.g', '+212643553553', '$2y$10$xqhjjv8.0Oizhpsv6LDSVuhGGNNq4kIlrPTcKAjllQPo3CQq8v/q2', NULL, NULL, NULL, NULL, '2022-05-06 09:49:52', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `NumPhone` (`NumPhone`),
  ADD UNIQUE KEY `NumPermis` (`NumPermis`),
  ADD UNIQUE KEY `Photo` (`Photo`) USING HASH;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
