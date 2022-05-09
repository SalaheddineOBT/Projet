-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 mai 2022 à 12:19
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carsrental`
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
(20, 'Kia Niro Hybride BVA', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 4, 'FFDFD', 'FFDF', 'FDDFDDF', '650', 5, 16, 5),
(21, 'Peugeot 308', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 0, '', '', '', '0', 0, 10, 5),
(22, 'Hyundai i10 Auto', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 0, '', '', '', '0', 0, 18, 8),
(23, 'Hyundai I20 Manual\r\nmodèle 2019', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 0, '', '', '', '0', 0, 18, 5),
(24, 'Peugeot 208 With Edition Auto\r\nmodèle 2019\r\n', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 0, '', '', '', '0', 0, 10, 2),
(25, 'Dacia Logan Diesel\r\n', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '', '', 'notRenting', '250', 4, 4, 8),
(26, 'Dacia Duster', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 5, '#394959', 'daciaduster.jpg', 'notRenting', '700', 4, 4, 6),
(27, 'Volkswagen Polo', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#C3C0BB', 'volv.png', 'notRenting', '350', 4, 7, 3),
(28, 'Range Rover SPORT', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#486986', 'jeepa.png', 'notRenting', '280', 4, 19, 2),
(29, 'Volkswagen 7', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#535353', 'volve.png', 'notRenting', '870', 4, 7, 5),
(30, 'Range Rover EVOQUE', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#C1C2C9', 'jeeep.png', 'notRenting', '359', 4, 3, 8),
(31, 'Ford Fiesta', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 5, '#CCAA24', 'fiatpanda.jpg', 'notRenting', '879', 0, 20, 8),
(32, 'Toyota Prado 4×4\r\n', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#D1DAE1', 'toyotagya.jpg', 'notRenting', '340', 4, 8, 3),
(33, 'Jeep Grand Cherokee', 'In addition to the ability to adapt to different surfaces, the adventurous aspect of all 4 × 4 of this North American firm, makes any Jeep rental car the ideal companion to go on a rural getaway or to drive on demanding roads. The first Jeep 4×4s came onto the market in the mid-1940s and, after esta', 0, '', '', '', '0', 0, 17, 2),
(34, 'Peugeot 208', 'Peugeot 208', 0, '', '', '', '0', 0, 10, 7),
(35, 'Hyundai i10', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#DF0A22', '	hundai1.png', 'notRenting', '390', 4, 18, 5),
(36, 'Dacia Logan', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#000000', '	dacia.png', 'notRenting', '0', 4, 4, 1),
(37, 'Hyundai i20', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#665A5B', 'kiap.jpg', 'notRenting', '200', 9, 18, 8),
(38, 'Renault Clio', 'SSS', 7, 'SS', 'SSS', 'SS', '300', 4, 9, 6),
(39, 'Kia Picanto', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#E84B06', 'suzuki.jpg', 'notRenting', '200', 3, 16, 9),
(40, 'Kia Niro Hybride BVA', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#B5B0AA', 'mini.jpg', 'notRenting', '650', 5, 16, 5),
(41, 'Peugeot 308', 'FDF', 3, 'DD', 'RRR', '4', '4', 4, 10, 5),
(42, 'Hyundai i10 Auto', 'VVV', 5, 'FF', 'FF', '4', '4', 4, 18, 8),
(43, 'Hyundai I20 Manual\r\nmodèle 2019', 'FFF', 3, 'F', 'FF', 'FF', '3', 3, 18, 5),
(44, 'Peugeot 208 With Edition Auto\r\nmodèle 2019\r\n', 'R', 4, '4', 'F', 'F', '4', 4, 10, 2),
(45, 'Dacia Logan Diesel\r\n', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#354554', 'daciadoker.jpg', 'notRenting', '290', 4, 4, 8),
(46, 'Dacia Duster', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#BB7339', 'daciaduster.jpg', 'notRenting', '458', 4, 4, 6),
(47, 'Volkswagen Polo', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#9AA0A5', 'mini.png', 'notRenting', '345', 4, 7, 3),
(48, 'Range Rover SPORT', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#9DA3A9', 'toyotarav.png', 'notRenting', '456', 4, 19, 2),
(49, 'Volkswagen 7', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#DFE4DE', 'jeep.jpg', 'notRenting', '687', 4, 7, 5),
(50, 'Range Rover EVOQUE', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#015D7C', 'hyundaigrand.jpg', 'notRenting', '400', 4, 3, 8),
(51, 'Ford Fiesta', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#D9BE39', '	fiatpanda.jpg', 'notRenting', '445', 4, 20, 8),
(52, 'Toyota Prado 4×4\r\n', 'Renting a Citroën C3 offers you the opportunity to combine the functionality of a city car with the comfort of a low-consumption five-seater both in the city and on the highway. With on-board computer, ergonomics, electric mirrors and a large boot, the Citroën C3 rental will be the perfect choice if', 4, '4', '4', '4', '4', 4, 8, 3),
(53, 'Jeep Grand Cherokee', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#ECF0F8', 'mitsub.png', 'notRenting', '300', 3, 17, 2),
(54, 'Peugeot 208', 'Peugeot 208', 4, 'DD', 'FF', 'FFD', '4', 4, 10, 7),
(55, 'Hyundai i10', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 4, '#38383A', 'hyund.png', 'notRenting', '507', 0, 18, 5),
(56, 'Dacia Logan', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 5, '#BB7339', 'peugot.jpg', 'notRenting', '500', 5, 4, 1),
(57, 'Hyundai i20', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#941D19', 'renaultclio.jpg', 'notRenting', '200', 9, 18, 8),
(58, 'Renault Clio', 'SSS', 7, 'SS', 'SSS', 'SS', '300', 4, 9, 6),
(59, 'Kia Picanto', 'VW Polo is a great little car. A compact model specially designed for urban environments.', 6, '#414241', 'peugot.png', 'notRenting', '200', 3, 16, 9);

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
