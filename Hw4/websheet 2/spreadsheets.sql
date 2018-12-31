-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 23 Avril 2017 à 13:44
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `spreadsheets`
--

-- --------------------------------------------------------

--
-- Structure de la table `sheet`
--

CREATE TABLE IF NOT EXISTS `sheet` (
  `sheet_id` int(11) NOT NULL AUTO_INCREMENT,
  `sheet_name` varchar(255) NOT NULL,
  `sheet_data` text NOT NULL,
  PRIMARY KEY (`sheet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `sheet`
--

INSERT INTO `sheet` (`sheet_id`, `sheet_name`, `sheet_data`) VALUES
(8, 'test1', '[["Tom","10","12"],["Sally","11","34"],["TEST","44","35"],["dsfsd","456","46"],["TOTLA","21.67","234"]]');

-- --------------------------------------------------------

--
-- Structure de la table `sheet_codes`
--

CREATE TABLE IF NOT EXISTS `sheet_codes` (
  `sheet_id` int(11) NOT NULL,
  `hash_code` varchar(30) NOT NULL,
  `code_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sheet_codes`
--

INSERT INTO `sheet_codes` (`sheet_id`, `hash_code`, `code_type`) VALUES
(8, 'Ehf6pVIr', 0),
(8, '2lFfxBeU', 1),
(8, 'Ff2X iF1', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
