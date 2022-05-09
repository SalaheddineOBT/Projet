-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 mai 2022 à 16:08
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
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `ID` int(11) NOT NULL,
  `Libellé` varchar(200) NOT NULL,
  `Photo` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`ID`, `Libellé`, `Photo`) VALUES
(1, 'AUDI', 'audi.png'),
(2, 'BMW', 'bmw.png'),
(3, 'CETROËN', 'certoen.png'),
(4, 'DACIA', 'dacia.png'),
(5, 'FERRARI', 'ferrari.jpg.png'),
(6, 'VOLVO', 'volvo.png'),
(7, 'VOLKSWAGEN', 'Volkswagen_.png'),
(8, 'TOTOTA', 'toyota.png'),
(9, 'RENAULT', 'Renault.png'),
(10, 'PEUGEOT', 'peugit.png'),
(11, 'OPEL', 'opel.png'),
(12, 'NISSAN', 'nissan.png'),
(13, 'MITSUBISHI', 'mitsu.png'),
(14, 'MINI', 'mini.png'),
(15, 'MERCEDES', 'mercedes.png'),
(16, 'KIA', 'kia.png'),
(17, 'JEEP', 'jeep.png'),
(18, 'HYUNDAI', 'hyundai.png'),
(19, 'HONDA', 'honda.png'),
(20, 'FORD', 'ford.png'),
(21, 'FIAT', 'Fiat-Logo.jpg.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
