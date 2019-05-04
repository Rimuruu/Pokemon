-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2019 at 01:28 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `attaque`
--

DROP TABLE IF EXISTS `attaque`;
CREATE TABLE IF NOT EXISTS `attaque` (
  `IDAtt` int(11) NOT NULL,
  `NomA` varchar(25) NOT NULL,
  `TypeA` enum('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL,
  `ClasseA` enum('Physique','Speciale','Autre') NOT NULL,
  `Puissance` int(11) DEFAULT NULL,
  `Precis` int(11) DEFAULT NULL,
  `PP` int(11) NOT NULL,
  `Effets` enum('Bru','Para','Som','Poi','Gel','Conf','Peur') DEFAULT NULL,
  `AjoutPV` enum('1/2 l','1/2 d') DEFAULT NULL,
  `RetirePV` int(11) DEFAULT NULL,
  `NbAttaque` enum('1','2','1-2','2-5') DEFAULT NULL,
  `StatMBoost` enum('Attaque','Defense','AttSpe','DefSpe','Vitesse') DEFAULT NULL,
  `StatANerf` enum('Attaque','Defense','AttSpe','DefSpe','Vitesse') DEFAULT NULL,
  PRIMARY KEY (`IDAtt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attaque`
--

INSERT INTO `attaque` (`IDAtt`, `NomA`, `TypeA`, `ClasseA`, `Puissance`, `Precis`, `PP`, `Effets`, `AjoutPV`, `RetirePV`, `NbAttaque`, `StatMBoost`, `StatANerf`) VALUES
(1, 'Double Pied', 'Combat', 'Physique', 30, 100, 30, NULL, NULL, NULL, '2', NULL, NULL),
(2, 'Balyage', 'Combat', 'Physique', 50, 100, 20, 'Peur', NULL, NULL, '1', NULL, NULL),
(3, 'Mawashi Geri', 'Combat', 'Physique', 60, 85, 15, 'Peur', NULL, NULL, '1', NULL, NULL),
(4, 'Pied Saute', 'Combat', 'Physique', 70, 95, 25, NULL, NULL, 1, '1', NULL, NULL),
(5, 'Pied Voltige', 'Combat', 'Physique', 85, 90, 20, NULL, NULL, 1, '1', NULL, NULL),
(6, 'Repli', 'Eau', 'Autre', NULL, 100, 40, NULL, NULL, NULL, '1', 'Defense', NULL),
(7, 'Ecume', 'Eau', 'Speciale', 20, 100, 30, NULL, NULL, NULL, '1', NULL, NULL),
(8, 'Pistolet à O', 'Eau', 'Speciale', 40, 100, 25, NULL, NULL, NULL, '1', NULL, NULL),
(9, 'Bulle d O', 'Eau', 'Speciale', 65, 100, 20, NULL, NULL, NULL, '1', NULL, NULL),
(10, 'Cascade', 'Eau', 'Speciale', 80, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(11, 'Pince-Masse', 'Eau', 'Speciale', 90, 85, 10, NULL, NULL, NULL, '1', NULL, NULL),
(12, 'Surf', 'Eau', 'Speciale', 95, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(13, 'Hydrocanon', 'Eau', 'Speciale', 120, 80, 5, NULL, NULL, NULL, '1', NULL, NULL),
(14, 'Cage-eclair', 'Electrik', 'Autre', NULL, 100, 20, 'Para', NULL, NULL, '1', NULL, NULL),
(15, 'Eclair', 'Electrik', 'Speciale', 40, 100, 30, 'Para', NULL, NULL, '1', NULL, NULL),
(16, 'Poing-Eclair', 'Electrik', 'Speciale', 75, 100, 15, 'Para', NULL, NULL, '1', NULL, NULL),
(17, 'Tonnerre', 'Electrik', 'Speciale', 95, 100, 15, 'Para', NULL, NULL, '1', NULL, NULL),
(18, 'Fatal-Foudre', 'Electrik', 'Speciale', 120, 70, 5, 'Para', NULL, NULL, '1', NULL, NULL),
(19, 'Flammèche', 'Feu', 'Speciale', 40, 100, 25, 'Bru', NULL, NULL, '1', NULL, NULL),
(20, 'Poing de Feu', 'Feu', 'Speciale', 75, 100, 15, 'Bru', NULL, NULL, '1', NULL, NULL),
(21, 'Lance-Flamme', 'Feu', 'Speciale', 95, 100, 15, 'Bru', NULL, NULL, '1', NULL, NULL),
(22, 'Deflagaration', 'Feu', 'Speciale', 120, 85, 5, 'Bru', NULL, NULL, '1', NULL, NULL),
(23, 'Onde Boreale', 'Glace', 'Speciale', 65, 100, 20, 'Gel', NULL, NULL, '1', NULL, NULL),
(24, 'Poing-glace', 'Glace', 'Speciale', 75, 100, 15, 'Gel', NULL, NULL, '1', NULL, NULL),
(25, 'Laser-Glace', 'Glace', 'Speciale', 95, 100, 10, 'Gel', NULL, NULL, '1', NULL, NULL),
(26, 'Blizzard', 'Glace', 'Speciale', 120, 90, 5, 'Gel', NULL, NULL, '1', NULL, NULL),
(27, 'Secretion', 'Insecte', 'Autre', NULL, 95, 40, NULL, NULL, NULL, '1', NULL, 'Vitesse'),
(28, 'Dard-nuee', 'Insecte', 'Physique', 14, 85, 20, NULL, NULL, NULL, '2-5', NULL, NULL),
(29, 'Vampirisme', 'Insecte', 'Physique', 20, 100, 15, NULL, '1/2 d', NULL, '1', NULL, NULL),
(30, 'Double-Dard', 'Insecte', 'Physique', 25, 100, 20, 'Poi', NULL, NULL, '2', NULL, NULL),
(31, 'Affûtage', 'Normal', 'Autre', NULL, NULL, 30, NULL, NULL, NULL, '1', 'Attaque', NULL),
(32, 'Armure', 'Normal', 'Autre', NULL, NULL, 30, NULL, NULL, NULL, '1', 'Defense', NULL),
(33, 'Berceuse', 'Normal', 'Autre', NULL, 55, 15, 'Som', NULL, NULL, '1', NULL, NULL),
(34, 'Boul Armure', 'Normal', 'Autre', NULL, NULL, 40, NULL, NULL, NULL, '1', 'Defense', NULL),
(35, 'Brouillard', 'Normal', 'Autre', NULL, 100, 20, NULL, NULL, NULL, '1', NULL, NULL),
(36, 'E-Coque', 'Normal', 'Autre', NULL, NULL, 10, NULL, '1/2 l', NULL, '1', NULL, NULL),
(37, 'Flash', 'Normal', 'Autre', NULL, 70, 20, NULL, NULL, NULL, '1', NULL, NULL),
(38, 'Grobisou', 'Normal', 'Autre', NULL, 75, 10, 'Som', NULL, NULL, '1', NULL, NULL),
(39, 'Groz Yeux', 'Normal', 'Autre', NULL, 100, 30, NULL, NULL, NULL, '1', NULL, 'Defense'),
(40, 'Intimidation', 'Normal', 'Autre', NULL, 75, 20, 'Para', NULL, NULL, '1', NULL, NULL),
(41, 'Jet de Sable', 'Normal', 'Autre', NULL, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(42, 'Mimi-Queue', 'Normal', 'Autre', NULL, 100, 30, NULL, NULL, NULL, '1', NULL, 'Defense'),
(43, 'Rugissement', 'Normal', 'Autre', NULL, NULL, 40, NULL, NULL, NULL, '1', NULL, 'Attaque'),
(44, 'Soin', 'Normal', 'Autre', NULL, NULL, 20, NULL, '1/2 l', NULL, '1', NULL, NULL),
(45, 'Trempette', 'Normal', 'Autre', NULL, NULL, 40, NULL, NULL, NULL, '1', NULL, NULL),
(46, 'Ultrason', 'Normal', 'Autre', NULL, 55, 20, 'Conf', NULL, NULL, '1', NULL, NULL),
(47, 'Furie', 'Normal', 'Physique', 15, 85, 20, NULL, NULL, NULL, '2-5', NULL, NULL),
(48, 'Pilonnage', 'Normal', 'Physique', 15, 85, 20, NULL, NULL, NULL, '2-5', NULL, NULL),
(49, 'Torgnoles', 'Normal', 'Physique', 15, 85, 10, NULL, NULL, NULL, '2-5', NULL, NULL),
(50, 'Combo-Griffe', 'Normal', 'Physique', 18, 80, 15, NULL, NULL, NULL, '2-5', NULL, NULL),
(51, 'Poing Comète', 'Normal', 'Physique', 18, 85, 15, NULL, NULL, NULL, '2-5', NULL, NULL),
(52, 'Picanon', 'Normal', 'Physique', 20, 100, 15, NULL, NULL, NULL, '2-5', NULL, NULL),
(53, 'Charge', 'Normal', 'Physique', 35, 95, 35, NULL, NULL, NULL, '1', NULL, NULL),
(54, 'Tornade', 'Normal', 'Physique', 35, 100, 40, NULL, NULL, NULL, '1', NULL, NULL),
(55, 'Ecras Face', 'Normal', 'Physique', 40, 100, 35, NULL, NULL, NULL, '1', NULL, NULL),
(56, 'Griffe', 'Normal', 'Physique', 40, 100, 35, NULL, NULL, NULL, '1', NULL, NULL),
(57, 'Coupe', 'Normal', 'Physique', 50, 95, 30, NULL, NULL, NULL, '1', NULL, NULL),
(58, 'Lutte', 'Normal', 'Physique', 50, 100, 100, NULL, NULL, 25, '1', NULL, NULL),
(59, 'Force Poigne', 'Normal', 'Physique', 55, 100, 30, NULL, NULL, NULL, '1', NULL, NULL),
(60, 'Morsure', 'Normal', 'Physique', 60, 100, 25, 'Peur', NULL, NULL, '1', NULL, NULL),
(61, 'Ecrasement', 'Normal', 'Physique', 65, 100, 20, 'Peur', NULL, NULL, '1', NULL, NULL),
(62, 'Koud Korne', 'Normal', 'Physique', 65, 100, 25, NULL, NULL, NULL, '1', NULL, NULL),
(63, 'Coud Boule', 'Normal', 'Physique', 70, 100, 15, 'Peur', NULL, NULL, '1', NULL, NULL),
(64, 'Upercut', 'Normal', 'Physique', 70, 100, 10, NULL, NULL, NULL, '1', NULL, NULL),
(65, 'Croc de Mort', 'Normal', 'Physique', 80, 90, 15, 'Peur', NULL, NULL, '1', NULL, NULL),
(66, 'Force', 'Normal', 'Physique', 80, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(67, 'Souplesse', 'Normal', 'Physique', 80, 75, 20, NULL, NULL, NULL, '1', NULL, NULL),
(68, 'Triplattaque', 'Normal', 'Physique', 80, 100, 10, NULL, NULL, NULL, '1', NULL, NULL),
(69, 'Ultimapoing', 'Normal', 'Physique', 80, 85, 20, NULL, NULL, NULL, '1', NULL, NULL),
(70, 'Plaquage', 'Normal', 'Physique', 85, 100, 15, 'Para', NULL, NULL, '1', NULL, NULL),
(71, 'Belier', 'Normal', 'Physique', 90, 85, 20, NULL, NULL, 45, '1', NULL, NULL),
(72, 'Bomb Oeuf', 'Normal', 'Physique', 100, 75, 15, NULL, NULL, NULL, '1', NULL, NULL),
(73, 'Damoclès', 'Normal', 'Physique', 100, 100, 15, NULL, NULL, 50, '1', NULL, NULL),
(74, 'Ultimawashi', 'Normal', 'Physique', 120, 75, 5, NULL, NULL, NULL, '1', NULL, NULL),
(75, 'Destruction', 'Normal', 'Physique', 260, 100, 5, NULL, NULL, 999999, '1', NULL, NULL),
(76, 'Explosion', 'Normal', 'Physique', 340, 100, 5, NULL, NULL, 999999, '1', NULL, NULL),
(77, 'Para-Spore', 'Plante', 'Autre', NULL, 75, 30, 'Para', NULL, NULL, '1', NULL, NULL),
(78, 'Poudre Dodo', 'Plante', 'Autre', NULL, 75, 15, 'Som', NULL, NULL, '1', NULL, NULL),
(79, 'Spore', 'Plante', 'Autre', NULL, 100, 15, 'Som', NULL, NULL, '1', NULL, NULL),
(80, 'Vol-Vie', 'Plante', 'Speciale', 20, 100, 20, NULL, '1/2 d', NULL, '1', NULL, NULL),
(81, 'Fouet Lianes', 'Plante', 'Speciale', 35, 100, 10, NULL, NULL, NULL, '1', NULL, NULL),
(82, 'Mega-Sangsue', 'Plante', 'Speciale', 40, 100, 10, NULL, '1/2 d', NULL, '1', NULL, NULL),
(83, 'Tranch Herbe', 'Plante', 'Speciale', 55, 95, 25, NULL, NULL, NULL, '1', NULL, NULL),
(84, 'Lame-Feuille', 'Plante', 'Physique', 90, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(85, 'Gaz Toxik', 'Poison', 'Autre', NULL, 55, 40, 'Poi', NULL, NULL, '1', NULL, NULL),
(86, 'Poudre Toxik', 'Poison', 'Autre', NULL, 75, 35, 'Poi', NULL, NULL, '1', NULL, NULL),
(87, 'Dard-Venin', 'Poison', 'Physique', 15, 100, 35, 'Poi', NULL, NULL, '1', NULL, NULL),
(88, 'Puredpois', 'Poison', 'Physique', 20, 70, 20, 'Poi', NULL, NULL, '1', NULL, NULL),
(89, 'Acide', 'Poison', 'Physique', 40, 100, 30, NULL, NULL, NULL, '1', NULL, 'Defense'),
(90, 'Detritus', 'Poison', 'Physique', 65, 100, 20, 'Poi', NULL, NULL, '1', NULL, NULL),
(91, 'Amnesie', 'Psy', 'Autre', NULL, NULL, 20, NULL, NULL, NULL, '1', 'AttSpe', NULL),
(92, 'Bouclier', 'Psy', 'Autre', NULL, NULL, 20, NULL, NULL, NULL, '1', 'DefSpe', NULL),
(93, 'Hâte', 'Psy', 'Autre', NULL, NULL, 20, NULL, NULL, NULL, '1', 'Vitesse', NULL),
(94, 'Hypnose', 'Psy', 'Autre', NULL, 60, 20, 'Som', NULL, NULL, '1', NULL, NULL),
(95, 'Telekinesie', 'Psy', 'Autre', NULL, 80, 15, NULL, NULL, NULL, '1', NULL, NULL),
(96, 'Yoga', 'Psy', 'Autre', NULL, NULL, 40, NULL, NULL, NULL, '1', 'Attaque', NULL),
(97, 'Vague Psy', 'Psy', 'Speciale', 40, 80, 15, NULL, NULL, NULL, '1', NULL, NULL),
(98, 'Choc Mental', 'Psy', 'Speciale', 50, 100, 25, 'Conf', NULL, NULL, '1', NULL, NULL),
(99, 'Rafale Psy', 'Psy', 'Speciale', 65, 100, 20, 'Conf', NULL, NULL, '1', NULL, NULL),
(100, 'Psyko', 'Psy', 'Speciale', 90, 100, 10, NULL, NULL, NULL, '1', NULL, NULL),
(101, 'Extrasenseur', 'Psy', 'Speciale', 80, 100, 20, 'Peur', NULL, NULL, '1', NULL, NULL),
(102, 'Jet-Pierres', 'Roche', 'Physique', 50, 65, 15, NULL, NULL, NULL, '1', NULL, NULL),
(103, 'Eboulement', 'Roche', 'Physique', 75, 90, 10, 'Peur', NULL, NULL, '1', NULL, NULL),
(104, 'Osmerang', 'Sol', 'Physique', 50, 90, 10, NULL, NULL, NULL, '2', NULL, NULL),
(105, 'Massd Os', 'Sol', 'Physique', 65, 85, 10, 'Peur', NULL, NULL, '1', NULL, NULL),
(106, 'Seisme', 'Sol', 'Physique', 100, 100, 10, NULL, NULL, NULL, '1', NULL, NULL),
(107, 'Mini Tunel', 'Sol', 'Physique', 80, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(108, 'Onde Folie', 'Spectre', 'Autre', NULL, 100, 10, 'Conf', NULL, NULL, '1', NULL, NULL),
(109, 'Poing Ombre', 'Spectre', 'Physique', 60, 100, 20, NULL, NULL, NULL, '1', NULL, NULL),
(110, 'Lechouille', 'Spectre', 'Physique', 20, 100, 30, 'Para', NULL, NULL, '1', NULL, NULL),
(111, 'Cru d Aile', 'Vol', 'Physique', 35, 100, 35, NULL, NULL, NULL, '1', NULL, NULL),
(112, 'Picpic', 'Vol', 'Physique', 35, 100, 35, NULL, NULL, NULL, '1', NULL, NULL),
(113, 'Premier Vol', 'Vol', 'Physique', 70, 100, 15, NULL, NULL, NULL, '1', NULL, NULL),
(114, 'Bec Vrille', 'Vol', 'Physique', 80, 100, 20, NULL, NULL, NULL, '1', NULL, NULL),
(115, 'Faible Pique', 'Vol', 'Physique', 100, 90, 10, NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `ID` int(11) NOT NULL,
  `NumP` int(11) NOT NULL,
  `NomP` varchar(25) NOT NULL,
  `TypeU` enum('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL,
  `TypeD` enum('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') DEFAULT NULL,
  `Courbe` enum('Rapide','Moyen+','Moyen-','Lent') NOT NULL,
  `XP` int(11) NOT NULL,
  `XPVaincu` int(11) NOT NULL,
  `Niv` int(11) NOT NULL DEFAULT 1,
  `IVPV` int(11) NOT NULL,
  `IVAttaque` int(11) NOT NULL,
  `IVDefense` int(11) NOT NULL,
  `IVAttSpe` int(11) NOT NULL,
  `IVDefSpe` int(11) NOT NULL,
  `IVVitesse` int(11) NOT NULL,
  `PVmax` int(11) NOT NULL,
  `Vitesse` int(11) NOT NULL,
  `Attaque` int(11) NOT NULL,
  `Defense` int(11) NOT NULL,
  `AttSpe` int(11) NOT NULL,
  `DefSPe` int(11) NOT NULL,
  `CAP1` int(11) NOT NULL,
  `CAP2` int(11) DEFAULT NULL,
  `CAP3` int(11) DEFAULT NULL,
  `CAP4` int(11) DEFAULT NULL,
  `Dresseur` varchar(35) DEFAULT NULL,
  `PVact` int(11) NOT NULL,
  `Statut` enum('Bru','Para','Som','Poi','Gel','Conf','Peur') DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `NumP` (`NumP`,`NomP`,`TypeU`,`TypeD`,`Courbe`,`XPVaincu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `Nom` varchar(35) NOT NULL,
  `MDP` varchar(35) NOT NULL,
  `Pokedollar` int(11) DEFAULT 1000,
  `DateCo` date,
  PRIMARY KEY (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `IDEq` int(11) NOT NULL,
  `Dresseur` varchar(35) NOT NULL,
  `SLOT1` int(11) NOT NULL,
  `SLOT2` int(11) DEFAULT NULL,
  `SLOT3` int(11) DEFAULT NULL,
  `SLOT4` int(11) DEFAULT NULL,
  `SLOT5` int(11) DEFAULT NULL,
  `SLOT6` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDEq`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`IDEq`, `Dresseur`, `SLOT1`, `SLOT2`, `SLOT3`, `SLOT4`, `SLOT5`, `SLOT6`) VALUES
(98484, 'ketto', 90488, 71876, 0, 0, 0, 0),
(54489, 'ke', 22889, NULL, NULL, NULL, NULL, NULL),
(40919, 'kett', 88033, 59891, 12332, NULL, NULL, NULL),
(99396, 'ketto', 21007, 71876, NULL, NULL, NULL, NULL),
(24309, 'ketto', 21144, 71876, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listeinventaire`
--

DROP TABLE IF EXISTS `listeinventaire`;
CREATE TABLE IF NOT EXISTS `listeinventaire` (
  `Objet` varchar(25) NOT NULL,
  `TypeO` enum('Pokeball','Soin','Statut','Rappel','PP') NOT NULL,
  `Prix` double NOT NULL,
  `TauxCaptureBall` double DEFAULT NULL,
  `PVSoin` int(11) DEFAULT NULL,
  `StatSoin` enum('Bru','Para','Som','Poi','Gel') DEFAULT NULL,
  `PPrajoute` int(11) DEFAULT NULL,
  `PPcible` enum('Une','Toutes') DEFAULT NULL,
  `Rappel` enum('Partiel','Total') DEFAULT NULL,
  PRIMARY KEY (`Objet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listeinventaire`
--

INSERT INTO `listeinventaire` (`Objet`, `TypeO`, `Prix`, `TauxCaptureBall`, `PVSoin`, `StatSoin`, `PPrajoute`, `PPcible`, `Rappel`) VALUES
('PokeBall', 'Pokeball', 200, 1, NULL, NULL, NULL, NULL, NULL),
('SuperBall', 'Pokeball', 600, 1.5, NULL, NULL, NULL, NULL, NULL),
('HyperBall', 'Pokeball', 1200, 2, NULL, NULL, NULL, NULL, NULL),
('Potion', 'Soin', 300, NULL, 20, NULL, NULL, NULL, NULL),
('SuperPotion', 'Soin', 700, NULL, 50, NULL, NULL, NULL, NULL),
('HyperPotion', 'Soin', 1200, NULL, 200, NULL, NULL, NULL, NULL),
('PotionMax', 'Soin', 2500, NULL, 999, NULL, NULL, NULL, NULL),
('Antidote', 'Statut', 100, NULL, NULL, 'Poi', NULL, NULL, NULL),
('AntiPara', 'Statut', 200, NULL, NULL, 'Para', NULL, NULL, NULL),
('AntiBrule', 'Statut', 250, NULL, NULL, 'Bru', NULL, NULL, NULL),
('AntiGel', 'Statut', 250, NULL, NULL, 'Gel', NULL, NULL, NULL),
('Reveil', 'Statut', 200, NULL, NULL, 'Som', NULL, NULL, NULL),
('Rappel', 'Rappel', 1500, NULL, NULL, NULL, NULL, NULL, 'Partiel'),
('RappelMax', 'Rappel', 10000, NULL, NULL, NULL, NULL, NULL, 'Total'),
('Elexir', 'PP', 7500, NULL, NULL, NULL, 10, 'Toutes', NULL),
('MaxElexir', 'PP', 10000, NULL, NULL, NULL, 40, 'Toutes', NULL),
('Huile', 'PP', 2500, NULL, NULL, NULL, 10, 'Une', NULL),
('HuileMax', 'PP', 5000, NULL, NULL, NULL, 40, 'Une', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pokedex`
--

DROP TABLE IF EXISTS `pokedex`;
CREATE TABLE IF NOT EXISTS `pokedex` (
  `NumP` int(11) NOT NULL,
  `NomP` varchar(25) NOT NULL,
  `PV` int(11) NOT NULL,
  `Attaque` int(11) NOT NULL,
  `Defense` int(11) NOT NULL,
  `AttSpe` int(11) NOT NULL,
  `DefSPe` int(11) NOT NULL,
  `Vitesse` int(11) NOT NULL,
  `TypeU` enum('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL,
  `TypeD` enum('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') DEFAULT NULL,
  `TauxCapture` int(11) NOT NULL,
  `Evolution` int(11) DEFAULT NULL,
  `NiveauEvolution` int(11) DEFAULT NULL,
  `Courbe` enum('Rapide','Moyen+','Moyen-','Lent') NOT NULL,
  `XPVaincu` int(11) NOT NULL,
  PRIMARY KEY (`NumP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokedex`
--

INSERT INTO `pokedex` (`NumP`, `NomP`, `PV`, `Attaque`, `Defense`, `AttSpe`, `DefSPe`, `Vitesse`, `TypeU`, `TypeD`, `TauxCapture`, `Evolution`, `NiveauEvolution`, `Courbe`, `XPVaincu`) VALUES
(152, 'Mew', 100, 100, 100, 100, 100, 100, 'Psy', NULL, 45, NULL, NULL, 'Moyen-', 64),
(151, 'Mewtwo', 106, 110, 90, 154, 90, 130, 'Psy', NULL, 3, NULL, NULL, 'Lent', 220),
(150, 'Dracolosse', 91, 134, 95, 100, 100, 80, 'Dragon', 'Vol', 45, NULL, NULL, 'Lent', 218),
(149, 'Draco', 61, 84, 65, 70, 70, 70, 'Dragon', NULL, 45, 149, 55, 'Lent', 144),
(148, 'Mini Draco', 41, 64, 45, 50, 50, 50, 'Dragon', NULL, 45, 148, 30, 'Lent', 67),
(147, 'Sulfura', 90, 100, 90, 125, 85, 90, 'Feu', 'Vol', 3, NULL, NULL, 'Lent', 217),
(146, 'Electhor', 90, 90, 85, 125, 90, 100, 'Electrik', 'Vol', 3, NULL, NULL, 'Lent', 216),
(145, 'Artikodin', 90, 85, 100, 95, 125, 85, 'Glace', 'Vol', 3, NULL, NULL, 'Lent', 215),
(144, 'Ronflex', 160, 110, 65, 65, 110, 30, 'Normal', NULL, 25, NULL, NULL, 'Lent', 154),
(143, 'Ptera', 80, 105, 65, 60, 75, 130, 'Roche', 'Vol', 45, NULL, NULL, 'Lent', 202),
(142, 'Kabutops', 60, 115, 105, 65, 70, 80, 'Roche', 'Eau', 45, NULL, NULL, 'Moyen+', 199),
(141, 'Kabuto', 30, 80, 90, 55, 45, 55, 'Roche', 'Eau', 45, 142, 40, 'Moyen+', 99),
(140, 'Amonistar', 70, 60, 125, 115, 70, 55, 'Roche', 'Eau', 45, NULL, NULL, 'Moyen+', 199),
(139, 'Amonita', 35, 40, 100, 90, 55, 35, 'Roche', 'Eau', 45, 140, 40, 'Moyen+', 99),
(138, 'Porygon', 65, 60, 70, 85, 75, 40, 'Normal', NULL, 45, NULL, NULL, 'Moyen+', 130),
(137, 'Pyroli', 65, 130, 60, 95, 110, 65, 'Feu', NULL, 45, NULL, NULL, 'Moyen+', 198),
(136, 'Voltali', 65, 65, 60, 110, 95, 130, 'Electrik', NULL, 45, NULL, NULL, 'Moyen+', 197),
(135, 'Aquali', 130, 65, 60, 110, 95, 65, 'Eau', NULL, 45, NULL, NULL, 'Moyen+', 196),
(134, 'Evoli', 55, 55, 50, 45, 65, 55, 'Normal', NULL, 45, 137, 30, 'Moyen+', 92),
(133, 'Evoli', 55, 55, 50, 45, 65, 55, 'Normal', NULL, 45, 136, 30, 'Moyen+', 92),
(132, 'Evoli', 55, 55, 50, 45, 65, 55, 'Normal', NULL, 45, 135, 30, 'Moyen+', 92),
(131, 'Lokhlass', 130, 85, 80, 85, 95, 60, 'Eau', 'Glace', 45, NULL, NULL, 'Lent', 219),
(130, 'Leviator', 95, 125, 79, 60, 100, 81, 'Eau', 'Vol', 45, NULL, NULL, 'Lent', 214),
(129, 'Magicarpe', 20, 10, 55, 15, 20, 80, 'Eau', NULL, 255, 130, 20, 'Lent', 20),
(128, 'Tauros', 75, 100, 95, 40, 70, 110, 'Normal', NULL, 45, NULL, NULL, 'Lent', 211),
(127, 'Scarabrute', 65, 125, 100, 55, 70, 85, 'Insecte', NULL, 45, NULL, NULL, 'Lent', 200),
(126, 'Magmar', 65, 95, 57, 100, 85, 93, 'Feu', NULL, 45, NULL, NULL, 'Moyen+', 127),
(125, 'Elektek', 65, 83, 57, 95, 85, 105, 'Electrik', NULL, 45, NULL, NULL, 'Moyen+', 156),
(124, 'Lippoutou', 65, 50, 35, 115, 95, 95, 'Glace', 'Psy', 45, NULL, NULL, 'Moyen+', 137),
(123, 'Insecateur', 70, 110, 80, 55, 80, 105, 'Insecte', 'Vol', 45, NULL, NULL, 'Moyen+', 187),
(122, 'M.Mime', 40, 45, 65, 100, 120, 90, 'Psy', NULL, 45, NULL, NULL, 'Moyen+', 136),
(121, 'Staross', 60, 75, 85, 100, 85, 115, 'Eau', 'Psy', 60, NULL, NULL, 'Lent', 207),
(120, 'Stari', 30, 45, 55, 70, 55, 85, 'Eau', NULL, 225, 121, 40, 'Lent', 106),
(119, 'Poissoroy', 80, 92, 65, 65, 80, 68, 'Eau', NULL, 60, NULL, NULL, 'Moyen+', 170),
(118, 'Poissirène', 45, 67, 60, 35, 50, 63, 'Eau', NULL, 225, 119, 33, 'Moyen+', 111),
(117, 'Hypocean', 55, 55, 65, 95, 45, 85, 'Eau', NULL, 75, NULL, NULL, 'Moyen+', 155),
(116, 'Hypotrempe', 30, 40, 70, 70, 25, 60, 'Eau', NULL, 225, 117, 32, 'Moyen+', 83),
(115, 'Kangourex', 105, 95, 80, 40, 80, 90, 'Normal', NULL, 45, NULL, NULL, 'Moyen+', 175),
(114, 'Saquedeneu', 65, 55, 115, 100, 40, 60, 'Plante', NULL, 45, NULL, NULL, 'Moyen+', 166),
(113, 'Leveinard', 250, 5, 5, 35, 105, 50, 'Normal', NULL, 30, NULL, NULL, 'Rapide', 395),
(112, 'Rhinoferos', 105, 130, 120, 45, 45, 40, 'Sol', 'Roche', 60, NULL, NULL, 'Lent', 204),
(111, 'Rhinocorne', 80, 85, 95, 30, 30, 25, 'Sol', 'Roche', 120, 112, 42, 'Lent', 135),
(110, 'Smogogo', 65, 90, 120, 85, 70, 60, 'Poison', NULL, 60, NULL, NULL, 'Moyen+', 173),
(109, 'Smogo', 40, 65, 95, 60, 45, 35, 'Poison', NULL, 190, 110, 35, 'Moyen+', 114),
(108, 'Excelangue', 90, 55, 75, 60, 75, 30, 'Normal', NULL, 45, NULL, NULL, 'Moyen+', 127),
(107, 'Tygnon', 50, 105, 79, 35, 110, 76, 'Combat', NULL, 45, NULL, NULL, 'Moyen+', 140),
(106, 'Kicklee', 50, 120, 53, 35, 110, 87, 'Combat', NULL, 45, NULL, NULL, 'Moyen+', 139),
(105, 'Ossatueur', 60, 80, 110, 50, 80, 45, 'Sol', NULL, 75, NULL, NULL, 'Moyen+', 124),
(104, 'Osselait', 50, 50, 95, 40, 50, 35, 'Sol', NULL, 190, 105, 28, 'Moyen+', 87),
(103, 'Noadkoko', 95, 95, 85, 125, 75, 65, 'Plante', 'Psy', 45, NULL, NULL, 'Lent', 212),
(102, 'Noeunoeuf', 60, 40, 80, 60, 45, 40, 'Plante', 'Psy', 90, 103, 40, 'Lent', 98),
(101, 'Electrode', 60, 50, 70, 80, 80, 150, 'Electrik', NULL, 60, NULL, NULL, 'Moyen+', 150),
(100, 'Voltorbe', 40, 30, 50, 55, 55, 100, 'Electrik', NULL, 190, 101, 30, 'Moyen+', 103),
(99, 'Krabboss', 55, 130, 115, 50, 50, 75, 'Eau', NULL, 60, NULL, NULL, 'Moyen+', 206),
(98, 'Krabby', 30, 105, 90, 25, 25, 50, 'Eau', NULL, 225, 99, 28, 'Moyen+', 115),
(97, 'Hypnomade', 85, 73, 70, 73, 115, 67, 'Psy', NULL, 75, NULL, NULL, 'Moyen+', 165),
(96, 'Soprifik', 60, 48, 45, 43, 90, 42, 'Psy', NULL, 190, 97, 26, 'Moyen+', 102),
(95, 'Onix', 35, 45, 160, 30, 45, 70, 'Roche', 'Sol', 45, NULL, NULL, 'Moyen+', 108),
(94, 'Ectoplasma', 60, 65, 600, 130, 75, 110, 'Spectre', 'Poison', 45, NULL, NULL, 'Moyen-', 190),
(93, 'Spectrum', 45, 50, 45, 115, 55, 95, 'Spectre', 'Poison', 90, 94, 50, 'Moyen-', 126),
(92, 'Fantominus', 30, 35, 30, 100, 35, 80, 'Spectre', 'Poison', 190, 93, 25, 'Moyen-', 95),
(91, 'Crustarbi', 50, 95, 180, 85, 45, 70, 'Eau', 'Glace', 60, NULL, NULL, 'Lent', 203),
(90, 'Kokiyas', 30, 65, 100, 45, 25, 40, 'Eau', NULL, 190, 91, 40, 'Lent', 97),
(89, 'Grotadmorv', 105, 105, 75, 65, 100, 50, 'Poison', NULL, 75, NULL, NULL, 'Moyen+', 157),
(88, 'Tadmorv', 80, 80, 50, 40, 50, 25, 'Poison', NULL, 190, 89, 38, 'Moyen+', 90),
(87, 'Lamantine', 90, 70, 80, 70, 95, 70, 'Eau', 'Glace', 75, NULL, NULL, 'Moyen+', 176),
(86, 'Otaria', 65, 45, 55, 45, 70, 45, 'Eau', NULL, 190, 87, 35, 'Moyen+', 100),
(85, 'Dodrio', 60, 110, 70, 60, 60, 110, 'Normal', 'Vol', 45, NULL, NULL, 'Moyen+', 158),
(84, 'Doduo', 35, 85, 45, 35, 35, 75, 'Normal', 'Vol', 190, 85, 31, 'Moyen+', 96),
(83, 'Canarticho', 52, 90, 55, 58, 62, 60, 'Normal', 'Vol', 45, NULL, NULL, 'Moyen+', 94),
(82, 'Magneton', 50, 60, 95, 120, 70, 70, 'Electrik', NULL, 60, NULL, NULL, 'Moyen+', 161),
(81, 'Magneti', 25, 35, 70, 95, 55, 45, 'Electrik', NULL, 190, 82, 30, 'Moyen+', 89),
(80, 'Flagadoss', 95, 75, 110, 100, 80, 30, 'Eau', 'Psy', 75, NULL, NULL, 'Moyen+', 164),
(79, 'Ramoloss', 90, 65, 65, 40, 40, 15, 'Eau', 'Psy', 190, 80, 37, 'Moyen+', 99),
(78, 'Galopa', 65, 100, 70, 80, 80, 105, 'Feu', NULL, 60, NULL, NULL, 'Moyen+', 192),
(77, 'Ponyta', 50, 85, 55, 65, 65, 90, 'Feu', NULL, 190, 78, 40, 'Moyen+', 152),
(76, 'Grolem', 80, 120, 130, 55, 65, 45, 'Roche', 'Sol', 45, NULL, NULL, 'Moyen-', 177),
(75, 'Gravalanch', 55, 95, 115, 45, 45, 35, 'Roche', 'Sol', 120, 76, 50, 'Moyen-', 134),
(74, 'Racaillou', 40, 80, 100, 30, 30, 20, 'Roche', 'Sol', 255, 75, 25, 'Moyen-', 73),
(73, 'Tentacruel', 80, 70, 65, 80, 120, 100, 'Eau', 'Poison', 60, NULL, NULL, 'Lent', 205),
(72, 'Tentacool', 40, 40, 35, 50, 100, 70, 'Eau', 'Poison', 190, 73, 30, 'Lent', 105),
(71, 'Empiflor', 80, 105, 65, 100, 70, 70, 'Plante', 'Poison', 45, NULL, NULL, 'Moyen-', 191),
(70, 'Boustiflor', 65, 90, 50, 85, 45, 55, 'Plante', 'Poison', 120, 71, 42, 'Moyen-', 151),
(69, 'Chetiflor', 50, 75, 35, 70, 30, 40, 'Plante', 'Poison', 255, 70, 21, 'Moyen-', 84),
(68, 'Mackogneur', 90, 130, 80, 65, 85, 55, 'Combat', NULL, 45, NULL, NULL, 'Moyen-', 193),
(67, 'Machopeur', 80, 100, 70, 50, 60, 45, 'Combat', NULL, 90, 68, 56, 'Moyen-', 146),
(66, 'Machoc', 70, 80, 50, 35, 35, 35, 'Combat', NULL, 180, 67, 28, 'Moyen-', 75),
(65, 'Alakazam', 55, 50, 45, 135, 95, 120, 'Psy', NULL, 50, NULL, NULL, 'Moyen-', 186),
(64, 'Kadabra', 40, 35, 30, 120, 70, 105, 'Psy', NULL, 100, 65, 40, 'Moyen-', 145),
(63, 'Abra', 25, 20, 15, 105, 55, 90, 'Psy', NULL, 200, 64, 16, 'Moyen-', 75),
(62, 'Tartard', 90, 95, 95, 70, 90, 70, 'Eau', 'Combat', 45, NULL, NULL, 'Moyen-', 185),
(61, 'Têtarte', 65, 65, 65, 50, 50, 90, 'Eau', NULL, 120, 62, 50, 'Moyen-', 131),
(60, 'Ptitard', 40, 50, 40, 40, 40, 90, 'Eau', NULL, 255, 61, 25, 'Moyen-', 77),
(59, 'Arcanin', 90, 110, 80, 100, 80, 95, 'Feu', NULL, 75, NULL, NULL, 'Lent', 213),
(58, 'Caninos', 55, 70, 45, 70, 50, 60, 'Feu', NULL, 190, 59, 40, 'Lent', 91),
(57, 'Colossinge', 65, 105, 60, 60, 70, 95, 'Combat', NULL, 75, NULL, NULL, 'Moyen+', 149),
(56, 'Ferosinge', 40, 80, 35, 35, 45, 70, 'Combat', NULL, 190, 57, 28, 'Moyen+', 74),
(55, 'Akwakwak', 80, 82, 78, 95, 80, 85, 'Eau', NULL, 75, NULL, NULL, 'Moyen+', 174),
(54, 'Psykokwak', 50, 52, 48, 65, 50, 55, 'Eau', NULL, 190, 55, 33, 'Moyen+', 80),
(53, 'Persian', 65, 70, 60, 65, 65, 115, 'Normal', NULL, 90, NULL, NULL, 'Moyen+', 148),
(52, 'Miaouss', 40, 45, 35, 40, 40, 90, 'Normal', NULL, 225, 53, 28, 'Moyen+', 69),
(51, 'Triopikeur', 35, 100, 50, 50, 70, 120, 'Sol', NULL, 50, NULL, NULL, 'Moyen+', 153),
(50, 'Taupiqueur', 10, 55, 25, 35, 45, 95, 'Sol', NULL, 255, 51, 26, 'Moyen+', 81),
(49, 'Aeromite', 70, 65, 60, 90, 75, 90, 'Insecte', 'Poison', 75, NULL, NULL, 'Moyen+', 138),
(48, 'Mimitoss', 60, 55, 50, 40, 55, 45, 'Insecte', 'Poison', 190, 49, 31, 'Moyen+', 75),
(47, 'Parasect', 60, 95, 80, 60, 80, 30, 'Insecte', 'Plante', 75, NULL, NULL, 'Moyen+', 128),
(46, 'Paras', 35, 70, 55, 45, 55, 25, 'Insecte', 'Poison', 190, 47, 24, 'Moyen+', 70),
(45, 'Rafflesia', 75, 80, 85, 110, 90, 50, 'Plante', 'Poison', 45, NULL, NULL, 'Moyen-', 184),
(44, 'Ortide', 60, 65, 70, 85, 75, 40, 'Plante', 'Poison', 120, 45, 42, 'Moyen-', 132),
(43, 'Mystherbe', 45, 50, 55, 75, 65, 30, 'Plante', 'Poison', 255, 44, 21, 'Moyen-', 78),
(42, 'Nosferalto', 75, 80, 70, 65, 75, 90, 'Poison', 'Vol', 90, NULL, NULL, 'Moyen+', 171),
(41, 'Nosferapti', 40, 45, 35, 30, 40, 55, 'Poison', 'Vol', 255, 42, 22, 'Moyen+', 54),
(40, 'Grodoudou', 140, 70, 45, 85, 50, 45, 'Normal', NULL, 50, NULL, NULL, 'Rapide', 109),
(39, 'Rondoudou', 115, 45, 20, 45, 25, 20, 'Normal', NULL, 170, 40, 45, 'Rapide', 76),
(38, 'Feunard', 73, 76, 75, 81, 100, 100, 'Feu', NULL, 75, NULL, NULL, 'Moyen+', 178),
(37, 'Goupix', 38, 41, 40, 50, 65, 65, 'Feu', NULL, 190, 38, 35, 'Moyen+', 63),
(36, 'Melodelfe', 95, 70, 73, 95, 90, 60, 'Normal', NULL, 25, NULL, NULL, 'Rapide', 129),
(35, 'Melofee', 70, 45, 48, 60, 65, 35, 'Normal', NULL, 150, 36, 40, 'Rapide', 68),
(34, 'Nidoking', 81, 102, 77, 85, 75, 85, 'Poison', 'Sol', 45, NULL, NULL, 'Moyen-', 195),
(33, 'Nidorino', 61, 72, 57, 55, 55, 65, 'Poison', NULL, 120, 34, 32, 'Moyen-', 118),
(32, 'Nidoran m', 46, 57, 40, 40, 40, 50, 'Poison', NULL, 235, 33, 16, 'Moyen-', 60),
(31, 'Nidoqueen', 90, 92, 87, 75, 85, 76, 'Poison', 'Sol', 45, NULL, NULL, 'Moyen-', 194),
(30, 'Nidorina', 70, 62, 67, 55, 55, 56, 'Poison', NULL, 120, 31, 32, 'Moyen-', 117),
(29, 'Nidoran f', 55, 47, 52, 40, 40, 41, 'Poison', NULL, 235, 30, 16, 'Moyen-', 59),
(28, 'Sablaireau', 75, 100, 110, 45, 55, 65, 'Sol', NULL, 90, NULL, NULL, 'Moyen+', 163),
(27, 'Sabelette', 50, 75, 85, 20, 30, 40, 'Sol', NULL, 255, 28, 22, 'Moyen+', 93),
(26, 'Raichu', 60, 90, 55, 90, 80, 110, 'Electrik', NULL, 75, NULL, NULL, 'Moyen+', 122),
(25, 'Pikachu', 35, 55, 40, 50, 50, 90, 'Electrik', NULL, 190, 26, 30, 'Moyen+', 82),
(24, 'Arbok', 60, 95, 69, 65, 79, 80, 'Poison', NULL, 90, NULL, NULL, 'Moyen+', 147),
(23, 'Abo', 35, 60, 44, 40, 54, 55, 'Poison', NULL, 255, 24, 22, 'Moyen+', 62),
(22, 'Rapasdepic', 65, 90, 65, 61, 61, 100, 'Normal', 'Vol', 90, NULL, NULL, 'Moyen+', 162),
(21, 'Piafabec', 40, 60, 30, 31, 31, 70, 'Normal', 'Vol', 255, 22, 20, 'Moyen+', 58),
(20, 'Rattatac', 55, 81, 60, 50, 70, 97, 'Normal', NULL, 127, NULL, NULL, 'Moyen+', 116),
(19, 'Rattata', 30, 56, 35, 25, 35, 72, 'Normal', NULL, 255, 20, 20, 'Moyen+', 57),
(18, 'Roucarnage', 83, 80, 75, 70, 70, 101, 'Normal', 'Vol', 45, NULL, NULL, 'Moyen-', 172),
(17, 'Roucoups', 63, 60, 55, 50, 50, 71, 'Normal', 'Vol', 120, 18, 36, 'Moyen-', 113),
(16, 'Roucool', 40, 45, 40, 35, 35, 56, 'Normal', 'Vol', 255, 17, 18, 'Moyen-', 55),
(15, 'Dardagnan', 65, 90, 40, 45, 80, 75, 'Insecte', 'Poison', 45, NULL, NULL, 'Moyen+', 159),
(14, 'Coconfort', 45, 25, 50, 25, 25, 25, 'Insecte', 'Poison', 120, 15, 10, 'Moyen+', 71),
(13, 'Aspicot', 40, 35, 30, 20, 20, 50, 'Insecte', 'Poison', 255, 14, 7, 'Moyen+', 52),
(12, 'Papilusion', 60, 45, 50, 90, 80, 70, 'Insecte', 'Vol', 45, NULL, NULL, 'Moyen+', 160),
(11, 'Chrysacier', 50, 20, 55, 25, 25, 30, 'Insecte', NULL, 120, 12, 10, 'Moyen+', 72),
(10, 'Chenipan', 45, 30, 35, 20, 20, 45, 'Insecte', NULL, 255, 11, 7, 'Moyen+', 53),
(9, 'Tortank', 79, 83, 100, 85, 105, 78, 'Eau', NULL, 45, NULL, NULL, 'Moyen-', 210),
(8, 'Carabaffe', 59, 63, 80, 65, 80, 58, 'Eau', NULL, 45, 9, 36, 'Moyen-', 143),
(7, 'Carapuce', 44, 48, 65, 50, 64, 43, 'Eau', NULL, 45, 8, 16, 'Moyen-', 66),
(6, 'Dracaufeu', 78, 84, 78, 109, 85, 100, 'Feu', 'Vol', 45, NULL, NULL, 'Moyen-', 209),
(5, 'Reptincel', 58, 64, 58, 80, 65, 80, 'Feu', NULL, 45, 6, 32, 'Moyen-', 142),
(4, 'Salamèche', 39, 52, 43, 60, 50, 65, 'Feu', NULL, 45, 5, 16, 'Moyen-', 65),
(3, 'Florizarre', 80, 82, 83, 100, 100, 80, 'Plante', 'Poison', 45, NULL, NULL, 'Moyen-', 236),
(2, 'Herbizarre', 60, 62, 63, 80, 80, 60, 'Plante', 'Poison', 45, 3, 32, 'Moyen-', 141),
(1, 'Bulbizarre', 45, 49, 49, 65, 65, 45, 'Plante', 'Poison', 45, 2, 16, 'Moyen-', 64);

-- --------------------------------------------------------

--
-- Table structure for table `sac`
--

DROP TABLE IF EXISTS `sac`;
CREATE TABLE IF NOT EXISTS `sac` (
  `IDSac` int(11) NOT NULL,
  `Dresseur` varchar(35) NOT NULL,
  `nbPokeBall` int(11) NOT NULL DEFAULT 5,
  `nbSuperBall` int(11) NOT NULL,
  `nbHyperBall` int(11) NOT NULL,
  `nbPotion` int(11) NOT NULL DEFAULT 10,
  `nbSuperPotion` int(11) NOT NULL,
  `nbHyperPotion` int(11) NOT NULL,
  `nbPotionMax` int(11) NOT NULL,
  `nbAntidote` int(11) NOT NULL,
  `nbAntiPara` int(11) NOT NULL,
  `nbAntiBrule` int(11) NOT NULL,
  `nbAntiGel` int(11) NOT NULL,
  `nbReveil` int(11) NOT NULL,
  `nbRappel` int(11) NOT NULL,
  `nbRappelMax` int(11) NOT NULL,
  `nbElexir` int(11) NOT NULL,
  `nbMaxElexir` int(11) NOT NULL,
  `nbHuile` int(11) NOT NULL,
  `nbHuileMax` int(11) NOT NULL,
  PRIMARY KEY (`IDSac`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabletype`
--

DROP TABLE IF EXISTS `tabletype`;
CREATE TABLE IF NOT EXISTS `tabletype` (
  `TypeP` enum('Normal','Feu','Eau','Plante','Poison','Vol','Insecte','Electrik','Sol','Combat','Psy','Roche','Glace','Dragon','Spectre') NOT NULL,
  `AttaqueNormal` double NOT NULL,
  `AttaqueFeu` double NOT NULL,
  `AttaqueEau` double NOT NULL,
  `AttaquePlante` double NOT NULL,
  `AttaqueElectrik` double NOT NULL,
  `AttaqueGlace` double NOT NULL,
  `AttaqueCombat` double NOT NULL,
  `AttaquePoison` double NOT NULL,
  `AttaqueSol` double NOT NULL,
  `AttaqueVol` double NOT NULL,
  `AttaquePsy` double NOT NULL,
  `AttaqueInsecte` double NOT NULL,
  `AttaqueRoche` double NOT NULL,
  `AttaqueSpectre` double NOT NULL,
  `AttaqueDragon` double NOT NULL,
  `DefenseNormal` double NOT NULL,
  `DefenseFeu` double NOT NULL,
  `DefenseEau` double NOT NULL,
  `DefensePlante` double NOT NULL,
  `DefenseElectrik` double NOT NULL,
  `DefenseGlace` double NOT NULL,
  `DefenseCombat` double NOT NULL,
  `DefensePoison` double NOT NULL,
  `DefenseSol` double NOT NULL,
  `DefenseVol` double NOT NULL,
  `DefensePsy` double NOT NULL,
  `DefenseInsecte` double NOT NULL,
  `DefenseRoche` double NOT NULL,
  `DefenseSpectre` double NOT NULL,
  `DefenseDragon` double NOT NULL,
  PRIMARY KEY (`TypeP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabletype`
--

INSERT INTO `tabletype` (`TypeP`, `AttaqueNormal`, `AttaqueFeu`, `AttaqueEau`, `AttaquePlante`, `AttaqueElectrik`, `AttaqueGlace`, `AttaqueCombat`, `AttaquePoison`, `AttaqueSol`, `AttaqueVol`, `AttaquePsy`, `AttaqueInsecte`, `AttaqueRoche`, `AttaqueSpectre`, `AttaqueDragon`, `DefenseNormal`, `DefenseFeu`, `DefenseEau`, `DefensePlante`, `DefenseElectrik`, `DefenseGlace`, `DefenseCombat`, `DefensePoison`, `DefenseSol`, `DefenseVol`, `DefensePsy`, `DefenseInsecte`, `DefenseRoche`, `DefenseSpectre`, `DefenseDragon`) VALUES
('Normal', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 0, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 0, 1),
('Feu', 1, 0.5, 0.5, 2, 1, 2, 1, 1, 1, 1, 1, 2, 0.5, 1, 0.5, 1, 0.5, 2, 0.5, 1, 1, 1, 1, 2, 1, 1, 0.5, 2, 1, 1),
('Eau', 1, 2, 0.5, 0.5, 1, 1, 1, 1, 2, 1, 1, 1, 2, 1, 0.5, 1, 0.5, 0.5, 2, 2, 0.5, 1, 1, 1, 1, 1, 1, 1, 1, 1),
('Plante', 1, 0.5, 2, 0.5, 1, 1, 1, 0.5, 2, 0.5, 1, 0.5, 2, 1, 0.5, 1, 2, 0.5, 0.5, 0.5, 2, 1, 2, 0.5, 2, 1, 2, 1, 1, 1),
('Electrik', 1, 1, 2, 0.5, 0.5, 1, 1, 1, 0, 2, 1, 1, 1, 1, 0.5, 1, 1, 1, 1, 0.5, 1, 1, 1, 2, 0.5, 1, 1, 1, 1, 1),
('Glace', 1, 1, 0.5, 2, 1, 0.5, 1, 1, 2, 2, 1, 1, 1, 1, 2, 1, 2, 1, 1, 1, 0.5, 2, 1, 1, 1, 1, 1, 2, 1, 1),
('Combat', 2, 1, 1, 1, 1, 2, 1, 0.5, 1, 0.5, 0.5, 0.5, 2, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 0.5, 0.5, 1, 1),
('Poison', 1, 1, 1, 2, 1, 1, 1, 0.5, 0.5, 1, 1, 2, 0.5, 0.5, 1, 1, 1, 1, 0.5, 1, 1, 0.5, 0.5, 2, 1, 2, 2, 1, 1, 1),
('Sol', 1, 2, 1, 0.5, 2, 1, 1, 2, 1, 0, 1, 0.5, 2, 1, 1, 1, 1, 2, 2, 0, 2, 1, 0.5, 1, 1, 1, 1, 0.5, 1, 1),
('Vol', 1, 1, 1, 2, 0.5, 1, 2, 1, 1, 1, 1, 2, 0.5, 1, 1, 1, 1, 1, 0.5, 2, 2, 0.5, 1, 0, 1, 1, 0.5, 2, 1, 1),
('Psy', 1, 1, 1, 1, 1, 1, 2, 2, 1, 1, 0.5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 1, 1, 1, 0.5, 2, 1, 0, 1),
('Insecte', 1, 0.5, 1, 2, 1, 1, 0.5, 2, 1, 0.5, 2, 1, 1, 0.5, 1, 1, 2, 1, 0.5, 1, 1, 0.5, 2, 0.5, 2, 1, 1, 2, 1, 1),
('Roche', 1, 2, 1, 1, 1, 2, 0.5, 1, 0.5, 2, 1, 2, 1, 1, 1, 0.5, 0.5, 2, 2, 1, 1, 2, 0.5, 2, 0.5, 1, 1, 1, 1, 1),
('Spectre', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 2, 1, 0, 1, 1, 1, 1, 1, 0, 0.5, 1, 1, 1, 0.5, 1, 2, 1),
('Dragon', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 0.5, 0.5, 0.5, 0.5, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
