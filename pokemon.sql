-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2019 at 02:32 PM
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
-- Table structure for table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(35) DEFAULT NULL,
  `CAP1` varchar(35) DEFAULT NULL,
  `CAP2` varchar(35) DEFAULT NULL,
  `CAP3` varchar(35) DEFAULT NULL,
  `CAP4` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banque`
--

INSERT INTO `banque` (`ID`, `NOM`, `CAP1`, `CAP2`, `CAP3`, `CAP4`) VALUES
(93294, NULL, NULL, NULL, NULL, NULL),
(11769, NULL, NULL, NULL, NULL, NULL),
(78859, 'Bulbizarre', 'Charge', 'Rugissement', NULL, NULL),
(55437, 'Salamèche', 'Griffe', 'Rugissement', NULL, NULL),
(56973, NULL, NULL, NULL, NULL, NULL),
(81854, NULL, NULL, NULL, NULL, NULL),
(10781, 'Bulbizarre', 'Charge', 'Rugissement', NULL, NULL),
(47294, 'Carapuce', 'Charge', 'Mimi-Queue', NULL, NULL),
(84637, 'Carapuce', 'Charge', 'Mimi-Queue', NULL, NULL),
(2735, 'Carapuce', 'Charge', 'Mimi-Queue', NULL, NULL),
(37343, 'Bulbizarre', 'Charge', 'Rugissement', NULL, NULL),
(87583, 'Carapuce', 'Charge', 'Mimi-Queue', NULL, NULL),
(3694, 'Bulbizarre', 'Charge', 'Rugissement', NULL, NULL),
(56828, 'Bulbizarre', 'Charge', 'Rugissement', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `NOM` varchar(35) NOT NULL,
  `MDP` varchar(35) NOT NULL,
  `Pokedollar` int(11) DEFAULT 0,
  PRIMARY KEY (`NOM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`NOM`, `MDP`, `Pokedollar`) VALUES
('shizu', 'lo', 0),
('ketto', 'shizu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `NOM` varchar(35) NOT NULL,
  `SLOT1` int(11) DEFAULT NULL,
  `SLOT2` int(11) DEFAULT NULL,
  `SLOT3` int(11) DEFAULT NULL,
  `SLOT4` int(11) DEFAULT NULL,
  `SLOT5` int(11) DEFAULT NULL,
  `SLOT6` int(11) DEFAULT NULL,
  PRIMARY KEY (`NOM`),
  KEY `SLOT1` (`SLOT1`),
  KEY `SLOT2` (`SLOT2`),
  KEY `SLOT3` (`SLOT3`),
  KEY `SLOT4` (`SLOT4`),
  KEY `SLOT5` (`SLOT5`),
  KEY `SLOT6` (`SLOT6`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`NOM`, `SLOT1`, `SLOT2`, `SLOT3`, `SLOT4`, `SLOT5`, `SLOT6`) VALUES
('shizu', 78859, NULL, NULL, NULL, NULL, NULL),
('ketto', 55437, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pokedex`
--

DROP TABLE IF EXISTS `pokedex`;
CREATE TABLE IF NOT EXISTS `pokedex` (
  `NUMERO` int(11) NOT NULL,
  `NOM` varchar(35) NOT NULL,
  `CAP1` varchar(35) DEFAULT NULL,
  `CAP2` varchar(35) DEFAULT NULL,
  `CAP3` varchar(35) DEFAULT NULL,
  `CAP4` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`NOM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokedex`
--

INSERT INTO `pokedex` (`NUMERO`, `NOM`, `CAP1`, `CAP2`, `CAP3`, `CAP4`) VALUES
(1, 'Salamèche', 'Griffe', 'Rugissement', NULL, NULL),
(2, 'Bulbizarre', 'Charge', 'Rugissement', NULL, NULL),
(3, 'Carapuce', 'Charge', 'Mimi-Queue', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
