-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 28 Décembre 2024 à 19:29
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `parrainage_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `niveau` enum('L1','L2') NOT NULL,
  `filiere_id` int(11) NOT NULL,
  `parcours_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `filiere_id` (`filiere_id`),
  KEY `parcours_id` (`parcours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `niveau`, `filiere_id`, `parcours_id`) VALUES
(1, 'Alice Bio', 'L1', 1, 1),
(2, 'Bob Bio', 'L2', 1, 1),
(3, 'Charlie Bio', 'L1', 1, 1),
(4, 'Diana Bio', 'L2', 1, 1),
(5, 'Eve Bio', 'L1', 1, 1),
(6, 'Frank Bio', 'L2', 1, 1),
(7, 'Grace Bio', 'L1', 1, 1),
(8, 'Hannah Bio', 'L2', 1, 1),
(9, 'Ivan Bio', 'L1', 1, 1),
(10, 'Judy Bio', 'L2', 1, 1),
(11, 'Alice Env', 'L1', 1, 2),
(12, 'Bob Env', 'L2', 1, 2),
(13, 'Charlie Env', 'L1', 1, 2),
(14, 'Diana Env', 'L2', 1, 2),
(15, 'Eve Env', 'L1', 1, 2),
(16, 'Frank Env', 'L2', 1, 2),
(17, 'Grace Env', 'L1', 1, 2),
(18, 'Hannah Env', 'L2', 1, 2),
(19, 'Ivan Env', 'L1', 1, 2),
(20, 'Judy Env', 'L2', 1, 2),
(21, 'Alice Food', 'L1', 1, 3),
(22, 'Bob Food', 'L2', 1, 3),
(23, 'Charlie Food', 'L1', 1, 3),
(24, 'Diana Food', 'L2', 1, 3),
(25, 'Eve Food', 'L1', 1, 3),
(26, 'Frank Food', 'L2', 1, 3),
(27, 'Grace Food', 'L1', 1, 3),
(28, 'Hannah Food', 'L2', 1, 3),
(29, 'Ivan Food', 'L1', 1, 3),
(30, 'Judy Food', 'L2', 1, 3),
(31, 'Alice Net', 'L1', 2, 4),
(32, 'Bob Net', 'L2', 2, 4),
(33, 'Charlie Net', 'L1', 2, 4),
(34, 'Diana Net', 'L2', 2, 4),
(35, 'Eve Net', 'L1', 2, 4),
(36, 'Frank Net', 'L2', 2, 4),
(37, 'Grace Net', 'L1', 2, 4),
(38, 'Hannah Net', 'L2', 2, 4),
(39, 'Ivan Net', 'L1', 2, 4),
(40, 'Judy Net', 'L2', 2, 4),
(41, 'Alice Soft', 'L1', 2, 5),
(42, 'Bob Soft', 'L2', 2, 5),
(43, 'Charlie Soft', 'L1', 2, 5),
(44, 'Diana Soft', 'L2', 2, 5),
(45, 'Eve Soft', 'L1', 2, 5),
(46, 'Frank Soft', 'L2', 2, 5),
(47, 'Grace Soft', 'L1', 2, 5),
(48, 'Hannah Soft', 'L2', 2, 5),
(49, 'Ivan Soft', 'L1', 2, 5),
(50, 'Judy Soft', 'L2', 2, 5),
(51, 'Alice Elec', 'L1', 3, 6),
(52, 'Bob Elec', 'L2', 3, 6),
(53, 'Charlie Elec', 'L1', 3, 6),
(54, 'Diana Elec', 'L2', 3, 6),
(55, 'Eve Elec', 'L1', 3, 6),
(56, 'Frank Elec', 'L2', 3, 6),
(57, 'Grace Elec', 'L1', 3, 6),
(58, 'Hannah Elec', 'L2', 3, 6),
(59, 'Ivan Elec', 'L1', 3, 6),
(60, 'Judy Elec', 'L2', 3, 6),
(61, 'Alice Cos', 'L1', 7, 7),
(62, 'Bob Cos', 'L2', 7, 7),
(63, 'Charlie Cos', 'L1', 7, 7),
(64, 'Diana Cos', 'L2', 7, 7),
(65, 'Eve Cos', 'L1', 7, 7),
(66, 'Frank Cos', 'L2', 7, 7),
(67, 'Grace Cos', 'L1', 7, 7),
(68, 'Hannah Cos', 'L2', 7, 7),
(69, 'Ivan Cos', 'L1', 7, 7),
(70, 'Judy Cos', 'L2', 7, 7),
(71, 'Alice Mech', 'L1', 3, 8),
(72, 'Bob Mech', 'L2', 3, 8),
(73, 'Charlie Mech', 'L1', 3, 8),
(74, 'Diana Mech', 'L2', 3, 8),
(75, 'Eve Mech', 'L1', 3, 8),
(76, 'Frank Mech', 'L2', 3, 8),
(77, 'Grace Mech', 'L1', 3, 8),
(78, 'Hannah Mech', 'L2', 3, 8),
(79, 'Ivan Mech', 'L1', 3, 8),
(80, 'Judy Mech', 'L2', 3, 8),
(81, 'Alice Therm', 'L1', 3, 9),
(82, 'Bob Therm', 'L2', 3, 9),
(83, 'Charlie Therm', 'L1', 3, 9),
(84, 'Diana Therm', 'L2', 3, 9),
(85, 'Eve Therm', 'L1', 3, 9),
(86, 'Frank Therm', 'L2', 3, 9),
(87, 'Grace Therm', 'L1', 3, 9),
(88, 'Hannah Therm', 'L2', 3, 9),
(89, 'Ivan Therm', 'L1', 3, 9),
(90, 'Judy Therm', 'L2', 3, 9),
(91, 'Alice Maint', 'L1', 3, 10),
(92, 'Bob Maint', 'L2', 3, 10),
(93, 'Charlie Maint', 'L1', 3, 10),
(94, 'Diana Maint', 'L2', 3, 10),
(95, 'Eve Maint', 'L1', 3, 10),
(96, 'Frank Maint', 'L2', 3, 10),
(97, 'Grace Maint', 'L1', 3, 10),
(98, 'Hannah Maint', 'L2', 3, 10),
(99, 'Ivan Maint', 'L1', 3, 10),
(100, 'Judy Maint', 'L2', 3, 10),
(101, 'Alice Civil', 'L1', 4, 11),
(102, 'Bob Civil', 'L2', 4, 11),
(103, 'Charlie Civil', 'L1', 4, 11),
(104, 'Diana Civil', 'L2', 4, 11),
(105, 'Eve Civil', 'L1', 4, 11),
(106, 'Frank Civil', 'L2', 4, 11),
(107, 'Grace Civil', 'L1', 4, 11),
(108, 'Hannah Civil', 'L2', 4, 11),
(109, 'Ivan Civil', 'L1', 4, 11),
(110, 'Judy Civil', 'L2', 4, 11),
(111, 'Alice BioMed', 'L1', 5, 12),
(112, 'Bob BioMed', 'L2', 5, 12),
(113, 'Charlie BioMed', 'L1', 5, 12),
(114, 'Diana BioMed', 'L2', 5, 12),
(115, 'Eve BioMed', 'L1', 5, 12),
(116, 'Frank BioMed', 'L2', 5, 12),
(117, 'Grace BioMed', 'L1', 5, 12),
(118, 'Hannah BioMed', 'L2', 5, 12),
(119, 'Ivan BioMed', 'L1', 5, 12),
(120, 'Judy BioMed', 'L2', 5, 12),
(121, 'Alice Energy', 'L1', 6, 13),
(122, 'Bob Energy', 'L2', 6, 13),
(123, 'Charlie Energy', 'L1', 6, 13),
(124, 'Diana Energy', 'L2', 6, 13),
(125, 'Eve Energy', 'L1', 6, 13),
(126, 'Frank Energy', 'L2', 6, 13),
(127, 'Grace Energy', 'L1', 6, 13),
(128, 'Hannah Energy', 'L2', 6, 13),
(129, 'Ivan Energy', 'L1', 6, 13),
(130, 'Judy Energy', 'L2', 6, 13);

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE IF NOT EXISTS `filieres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `filieres`
--

INSERT INTO `filieres` (`id`, `nom`) VALUES
(1, 'Génie Biologique'),
(2, 'Génie Informatique'),
(3, 'Génie Industriel et Maintenance'),
(4, 'Génie Civil et Durable'),
(5, 'Maintenance des Équipements Biomédicaux'),
(6, 'Énergie Renouvelable'),
(7, 'Génie Chimique');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE IF NOT EXISTS `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `filiere_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `filiere_id` (`filiere_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`id`, `nom`, `filiere_id`) VALUES
(1, 'Analyse Biologique et Biochimique (ABB)', 1),
(2, 'Génie de l''Environnement (GEN)', 1),
(3, 'Industries Alimentaires et Biotechnologie (IAB)', 1),
(4, 'Réseau et Télécommunication (RT)', 2),
(5, 'Génie Logiciel (GLO)', 2),
(6, 'Génie Électrique (GEL)', 3),
(7, 'Génie Mécanique et Productif (GMP)', 3),
(8, 'Génie Thermique et Energétique (GTE)', 3),
(9, 'Maintenance Industrielle et Productive (MIP)', 3),
(10, 'Génie Civil et Durable (GCD)', 4),
(11, 'Maintenance des Équipements Biomédicaux (MEB)', 5),
(12, 'Génie des Énergies Renouvelables (GER)', 6),
(13, 'Cosmétique (COS)', 7);

-- --------------------------------------------------------

--
-- Structure de la table `parrains`
--

CREATE TABLE IF NOT EXISTS `parrains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Structure de la table `parrainage`
--

CREATE TABLE IF NOT EXISTS `parrainages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etudiant_id` int(11) NOT NULL,
  `parrain_id` int(11) NOT NULL,
  `date_assigned` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants`(`id`),
  FOREIGN KEY (`parrain_id`) REFERENCES `parrains`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`),
  ADD CONSTRAINT `etudiants_ibfk_2` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`);

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `parcours_ibfk_1` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`id`);

--
-- Contraintes pour la table `parrainages`
--
ALTER TABLE `parrainages`
  ADD CONSTRAINT `parrainages_ibfk_1` FOREIGN KEY (`sponsor_id`) REFERENCES `etudiants` (`id`),
  ADD CONSTRAINT `parrainages_ibfk_2` FOREIGN KEY (`sponsored_id`) REFERENCES `etudiants` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;