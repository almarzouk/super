-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2022 at 12:36 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emprunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `nom_category` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emprunts`
--

DROP TABLE IF EXISTS `emprunts`;
CREATE TABLE IF NOT EXISTS `emprunts` (
  `id_emprunt` int(3) NOT NULL AUTO_INCREMENT,
  `id_emprunteur` int(3) NOT NULL,
  `id_objet` int(3) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_restitution` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_emprunt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `id_objet` int(3) NOT NULL AUTO_INCREMENT,
  `marque_objet` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `model_objet` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `photo_objet` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `description_objet` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `id_category_objet` int(3) NOT NULL,
  PRIMARY KEY (`id_objet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_user` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_user` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `mail_user` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `auth_user` int(1) NOT NULL,
  `type_user` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `adresse_user`, `mail_user`, `pass_user`, `auth_user`, `type_user`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'pass', 1, 1),
(2, 'eleve', 'eleve', 'eleve', 'eleve', 'eleve', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
