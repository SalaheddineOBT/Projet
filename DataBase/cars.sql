-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 mai 2022 à 16:06
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
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `PlaceNumber` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Photo` varchar(200) NOT NULL,
  `Statut` varchar(100) NOT NULL,
  `PricePerDay` decimal(10,0) NOT NULL,
  `NumbreDoors` int(11) NOT NULL,
  `IdMarque` int(11) NOT NULL,
  `IdCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`ID`, `Name`, `Description`, `PlaceNumber`, `Color`, `Photo`, `Statut`, `PricePerDay`, `NumbreDoors`, `IdMarque`, `IdCategorie`) VALUES
(20, 'Kia Niro Hybride BVA', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 4, '#544A4B', 'kiap.jpg', 'notRenting', 650, 5, 16, 5),
(21, 'Peugeot 308', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 6, '#414241', 'peugot.png', 'notRenting', 360, 4, 10, 5),
(22, 'Hyundai i10 Auto', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 4, '#C1C2C9', 'hyundai.png', 'notRenting', 546, 4, 18, 8),
(23, 'Hyundai I20 Manual\r\nmodèle 2019', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 6, '#484849', 'hyund.png', 'notRenting', 579, 4, 18, 5),
(24, 'Peugeot 208 With Edition Auto\r\nmodèle 2019', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 6, '#38383A', 'mini.jpg', 'notRenting', 389, 4, 10, 2),
(25, 'Dacia Logan Diesel', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#8995A4', 'dacia.png', 'notRenting', 250, 4, 4, 8),
(26, 'Dacia Duster', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 5, '#394959', 'daciaduster.jpg', 'notRenting', 700, 4, 4, 6),
(27, 'Volkswagen Polo', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#C3C0BB', 'volv.png', 'notRenting', 350, 4, 7, 3),
(28, 'Range Rover SPORT', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#486986', 'jeepa.png', 'notRenting', 280, 4, 19, 2),
(29, 'Volkswagen 7', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#535353', 'volve.png', 'notRenting', 870, 4, 7, 5),
(30, 'Range Rover EVOQUE', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#C1C2C9', 'jeeep.png', 'notRenting', 359, 4, 3, 8),
(31, 'Ford Fiesta', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 5, '#CCAA24', 'fiatpanda.jpg', 'notRenting', 879, 4, 20, 8),
(32, 'Toyota Prado 4×4', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#D1DAE1', 'toyotagya.jpg', 'notRenting', 340, 4, 8, 3),
(33, 'Jeep Grand Cherokee', 'In addition to the ability to adapt to different surfaces, the adventurous aspect of all 4 × 4 of this North American firm, makes any Jeep rental car the ideal companion to go on a rural getaway or to drive on demanding roads. The first Jeep 4×4s came onto the market in the mid-1940s and, after esta', 4, '#94969D', 'jeeep.png', 'notRenting', 579, 4, 17, 2),
(34, 'Peugeot 208', 'Renting a Citroën C3 offers you the opportunity to...', 4, '#0158AB', 'peugot.jpg', 'notRenting', 579, 6, 10, 7),
(35, 'Hyundai i10', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#DF0A22', '	hundai1.png', 'notRenting', 390, 4, 18, 5),
(36, 'Dacia Logan', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#000000', '	dacia.png', 'notRenting', 239, 4, 4, 1),
(37, 'Hyundai i20', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#665A5B', 'kiap.jpg', 'notRenting', 200, 6, 18, 8),
(38, 'Renault Clio', 'Renting a Citroën C3 offers you the opportunity to...', 7, '#8D1514', 'renaultclio.jpg', 'notRenting', 300, 4, 9, 6),
(39, 'Kia Picanto', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#E84B06', 'suzuki.jpg', 'notRenting', 200, 4, 16, 9);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IdMarque` (`IdMarque`),
  ADD KEY `IdCategorie` (`IdCategorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`IdMarque`) REFERENCES `marques` (`ID`),
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`IdCategorie`) REFERENCES `categories` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
