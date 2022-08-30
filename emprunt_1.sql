-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 août 2022 à 07:47
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emprunt`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `nom_category` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `nom_category`) VALUES
(1, 'accessoires'),
(2, 'lumieres'),
(3, 'photos_appareils'),
(4, 'photos_camescope');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

DROP TABLE IF EXISTS `emprunts`;
CREATE TABLE IF NOT EXISTS `emprunts` (
  `id_emprunt` int NOT NULL AUTO_INCREMENT,
  `id_emprunteur` int NOT NULL,
  `id_objet` int NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_restitution` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_emprunt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `id_objet` int NOT NULL AUTO_INCREMENT,
  `marque_objet` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model_objet` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo_objet` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_objet` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_category_objet` int NOT NULL,
  `id_subcategory` int NOT NULL,
  PRIMARY KEY (`id_objet`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `objets`
--

INSERT INTO `objets` (`id_objet`, `marque_objet`, `model_objet`, `photo_objet`, `description_objet`, `id_category_objet`, `id_subcategory`) VALUES
(1, 'NIKON', 'objectif nikon zoom 50mm', 'nikon_zoom_50mm', '', 1, 1),
(2, 'NIKON', 'objectif zoom 70-220mm', 'nikon_zoom_70-220mm', '', 1, 1),
(3, 'NIKON', 'zoom_80-220mm', 'nikon_zoom_80-220mm', '', 1, 1),
(4, 'LOGIC', 'sacoche', 'case_logic_sacoche_noire', '', 1, 2),
(5, 'HIKING', 'sacoche', 'hiking_sacoche_kaki', '', 1, 2),
(6, 'PULUZ', 'sacoche', 'puluz_sacoche04', '', 1, 2),
(7, 'GENERIC', 'sacoche', 'sacoche', '', 1, 2),
(8, 'GENERIC', 'sacoche 2 ', 'sacoche02', '', 1, 2),
(9, 'GENERIC', 'sacoche 3', 'solid_sacoche03', '', 1, 2),
(10, 'hama_star_61', 'hama_star_61', 'hama_star_61', '', 1, 3),
(11, 'hama_star61', 'hama_star61', 'hama_star61', '', 1, 3),
(12, 'ianiro_alu_ministand_art_300', 'ianiro_alu_ministand_art_300', 'ianiro_alu_ministand_art_300', '', 1, 3),
(13, 'mafrotto_122B', 'mafrotto_122B', 'mafrotto_122B', '', 1, 3),
(14, 'mafrotto_190', 'mafrotto_190', 'mafrotto_190', '', 1, 3),
(15, 'mafrotto_auto_dolly', 'mafrotto_auto_dolly', 'mafrotto_auto_dolly', '', 1, 3),
(16, 'mafrotto_imagine_more', 'mafrotto_imagine_more', 'mafrotto_imagine_more', '', 1, 3),
(17, 'mandarine_pied', 'mandarine_pied', 'mandarine_pied', '', 1, 3),
(18, 'mandarine_trepiet_122b', 'mandarine_trepiet_122b', 'mandarine_trepiet_122b', '', 1, 3),
(19, 'manfrotto_004_1', 'manfrotto_004_1', 'manfrotto_004_1', '', 1, 3),
(20, 'manfrotto_004_2', 'manfrotto_004_2', 'manfrotto_004_2', '', 1, 3),
(21, 'manfrotto_058b', 'manfrotto_058b', 'manfrotto_058b', '', 1, 3),
(22, 'manfrotto_190pro', 'manfrotto_190pro', 'manfrotto_190pro', '', 1, 3),
(23, 'manfrotto_imagine_more', 'manfrotto_imagine_more', 'manfrotto_imagine_more', '', 1, 3),
(24, 'manfrotto_imagine_more+sacoche', 'manfrotto_imagine_more+sacoche', 'manfrotto_imagine_more+sacoche', '', 1, 3),
(25, 'trepied_dolly_057', 'trepied_dolly_057', 'trepied_dolly_057', '', 1, 3),
(26, 'trepied_telescopique', 'trepied_telescopique', 'trepied_telescopique', '', 1, 3),
(27, 'trepied01', 'trepied01', 'trepied01', '', 1, 3),
(28, 'trepied02', 'trepied02', 'trepied02', '', 1, 3),
(29, 'nikon_flash_SB_24', 'nikon_flash_SB_24', 'nikon_flash_SB_24', '', 2, 4),
(30, 'nikon_sb_5000', 'nikon_sb_5000', 'nikon_sb_5000', '', 2, 4),
(31, 'mandarine01', 'mandarine01', 'mandarine01', '', 2, 5),
(32, 'mandarine02', 'mandarine02', 'mandarine02', '', 2, 5),
(33, 'mandarine03', 'mandarine03', 'mandarine03', '', 2, 5),
(34, 'mandarine04', 'mandarine04', 'mandarine04', '', 2, 5),
(35, 'ansmann-parapluie02', 'ansmann-parapluie02', 'ansmann-parapluie02', '', 2, 6),
(36, 'konig-parapluie03', 'konig-parapluie03', 'konig-parapluie03', '', 2, 6),
(37, 'parapluie01', 'parapluie01', 'parapluie01', '', 2, 6),
(38, 'solid-cache', 'solid-cache', 'solid-cache', '', 2, 6),
(39, 'solid-parapluie', 'solid-parapluie', 'solid-parapluie', '', 2, 6),
(40, 'nikon_coolpix_P7000', 'nikon_coolpix_P7000', 'nikon_coolpix_P7000', '', 3, 7),
(41, 'nikon_coolpix_P7800', 'nikon_coolpix_P7800', 'nikon_coolpix_P7800', '', 3, 7),
(42, 'nikon_p1000', 'nikon_p1000', 'nikon_p1000', '', 3, 8),
(48, 'panasonic_HC-X1500', 'panasonic_HC-X1500', 'panasonic_HC-X1500', '', 4, 10),
(44, 'nikon_D1', 'nikon_D1', 'nikon_D1', '', 3, 9),
(45, 'nikon_D7000', 'nikon_D7000', 'nikon_D7000', '', 3, 9),
(46, 'nikon_F4', 'nikon_F4', 'nikon_F4', '', 3, 9),
(47, 'telecompressor_F90X', 'telecompressor_F90X', 'telecompressor_F90X', '', 3, 9),
(49, 'panasonic_HDC-HS900', 'panasonic_HDC-HS900', 'panasonic_HDC-HS900', '', 4, 10),
(50, 'sony_HDR-CX410VE', 'sony_HDR-CX410VE', 'sony_HDR-CX410VE', '', 4, 11),
(51, 'sony_nex_vg10', 'sony_nex_vg10', 'sony_nex_vg10', '', 4, 11),
(52, 'sony_nex_vg30', 'sony_nex_vg30', 'sony_nex_vg30', '', 4, 11);

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id_subcategory` int NOT NULL AUTO_INCREMENT,
  `nom_subcategory` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int NOT NULL,
  PRIMARY KEY (`id_subcategory`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sub_category`
--

INSERT INTO `sub_category` (`id_subcategory`, `nom_subcategory`, `id_category`) VALUES
(1, 'objectifs', 1),
(2, 'saccoches_appareils', 1),
(3, 'trepieds', 1),
(4, 'flashs', 2),
(5, 'mandarines', 2),
(6, 'parapluies', 2),
(7, 'apn', 3),
(8, 'bridge', 3),
(9, 'reflex', 3),
(10, 'panasonic', 4),
(11, 'sony', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom_user` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse_user` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_user` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_user` int NOT NULL,
  `type_user` int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `adresse_user`, `mail_user`, `pass_user`, `auth_user`, `type_user`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'pass', 1, 1),
(2, 'eleve', 'eleve', 'eleve', 'eleve', 'eleve', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
