-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 mai 2019 à 15:20
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kayak`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `sexe` varchar(50) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) NOT NULL,
  `naissance` date NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id`, `sexe`, `pseudo`, `nom`, `prenom`, `mdp`, `email`, `ville`, `cp`, `naissance`, `telephone`, `niveau`) VALUES
(1, 'M', 'La_gapaz', 'Gapasin', 'Marc', 'DK25', 'la_gapaz@gmail.com', 'Saint-Denis', 93200, '2000-12-25', '0640472870', 'vert'),
(2, 'M', 'Gros minet', 'minet', 'minet', '25', 'minet@minet.com', 'Paris', 75018, '1999-05-20', '0145781245', 'jaune'),
(3, 'M', 'admin', 'admin', 'admin', 'admin', 'admin@admin.com', 'admin', 75018, '2000-12-25', '0101010101', 'bleu'),
(4, 'M', 'ad', 'GAPASIN', 'Marilyn', 'azertyuiop', 'gapasinmarc@yahoo.co', 'Saint-Denis', 93200, '2001-05-23', '681442094', 'bleu');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `horaire` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `date`, `niveau`, `horaire`) VALUES
(1, '2019-05-15', 'vert', 14),
(2, '2019-04-17', 'jaune', 9),
(3, '2019-05-18', 'vert', 14),
(4, '2019-05-22', 'vert', 14),
(5, '2019-05-25', 'vert', 14),
(6, '2019-05-29', 'vert', 14),
(7, '2019-06-01', 'vert', 14),
(8, '2019-05-24', 'bleu', 14),
(9, '2019-05-25', 'bleu', 16),
(10, '2019-05-26', 'blanc', 12);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idAdherent` int(3) NOT NULL,
  `idVoyage` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAdherent` (`idAdherent`),
  KEY `idVoyage` (`idVoyage`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `idAdherent`, `idVoyage`) VALUES
(1, 1, 3),
(2, 1, 3),
(3, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idadherent` int(3) NOT NULL,
  `idcours` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcours` (`idcours`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`id`, `idadherent`, `idcours`) VALUES
(5, 1, 3),
(7, 4, 8),
(8, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

DROP TABLE IF EXISTS `voyage`;
CREATE TABLE IF NOT EXISTS `voyage` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nomVoyage` varchar(255) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `datedebutVoyage` date NOT NULL,
  `datefinVoyage` date NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id`, `nomVoyage`, `pays`, `datedebutVoyage`, `datefinVoyage`, `prix`) VALUES
(2, 'Gorges du Verdon, Le Var', 'France', '2019-06-09', '2019-06-16', '750'),
(3, 'Lake Powell, Colorado', 'Etats-Unis', '2019-06-16', '2019-06-23', '850'),
(4, 'Lac Saint-Pierre, Mauricie', 'Quebec', '2019-06-03', '2019-06-15', '650'),
(5, 'Rivière Sagueney, Fjord-du-Sagueney', 'Quebec', '2019-09-01', '2019-09-08', '550'),
(6, 'Baie de la Somme, Picardie', 'France', '2019-08-05', '2019-08-11', '750');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idVoyage`) REFERENCES `voyage` (`id`);

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`idcours`) REFERENCES `cours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
