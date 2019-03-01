-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2019 at 05:34 PM
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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banque`
--

INSERT INTO `banque` (`ID`, `NOM`) VALUES
(73811, 'SalamÃ¨che'),
(98226, 'SalamÃ¨che'),
(16515, 'SalamÃ¨che'),
(32784, 'SalamÃ¨che'),
(48597, 'SalamÃ¨che'),
(31019, 'SalamÃ¨che'),
(1, 'SalamÃ¨che'),
(3, 'SalamÃ¨che'),
(2, 'SalamÃ¨che');

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `NOM` varchar(35) NOT NULL,
  `MDP` varchar(35) NOT NULL,
  `IDPOKEMON` int(11) NOT NULL,
  PRIMARY KEY (`NOM`),
  KEY `IDPOKEMON` (`IDPOKEMON`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`NOM`, `MDP`, `IDPOKEMON`) VALUES
('ghj', 'gh', 73811),
('ketto', 'shizu', 98226),
('test', 'test2', 16515),
('uio', 'ui', 32784),
('fgh', 'fg', 48597),
('cvb', 'cv', 31019),
('klm', 'kl', 1),
('pm', 'p', 3),
('htr', 'tr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pokedex`
--

DROP TABLE IF EXISTS `pokedex`;
CREATE TABLE IF NOT EXISTS `pokedex` (
  `NUMERO` int(11) NOT NULL,
  `NOM` varchar(35) NOT NULL,
  PRIMARY KEY (`NOM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokedex`
--

INSERT INTO `pokedex` (`NUMERO`, `NOM`) VALUES
(1, 'Salamèche'),
(2, 'Bulbizarre'),
(3, 'Carapuce');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
