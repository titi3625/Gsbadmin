-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 08 Octobre 2012 à 12:23
-- Version du serveur: 5.5.24
-- Version de PHP: 5.3.10-1ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gsbadmin`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADMIN`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_admin` varchar(30) NOT NULL,
  `mdp_admin` varchar(10) NOT NULL,
  `mail_admin` varchar(20) NOT NULL,
  `droit_admin` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ADMIN`
--

INSERT INTO `ADMIN` (`id_admin`, `pseudo_admin`, `mdp_admin`, `mail_admin`, `droit_admin`) VALUES
(1, 'adminCl', 'admin', '', 'client'),
(2, 'adminCo', 'admin', '', 'commande');

-- --------------------------------------------------------

--
-- Structure de la table `CLIENT`
--

CREATE TABLE IF NOT EXISTS `CLIENT` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(30) NOT NULL,
  `tel_client` varchar(10) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `pseudo_client` varchar(15) NOT NULL,
  `mdp_client` varchar(15) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `CLIENT`
--

INSERT INTO `CLIENT` (`id_client`, `nom_client`, `prenom_client`, `tel_client`, `email_client`, `pseudo_client`, `mdp_client`) VALUES
(1, 'Arnaque', 'Bob', '0145789652', 'bob@bidon.fr', 'bob', '0123'),
(2, 'Auchon', 'Paul', '0123698751', 'paul@bidon.fr', 'paul', '7894'),
(3, 'Nemard', 'Jean', '012456789', 'jean@bidon.fr', 'jean', '456');

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE IF NOT EXISTS `COMMANDE` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `description_commande` varchar(50) NOT NULL,
  `adresse_livraison` varchar(30) NOT NULL,
  `ville_livraison` varchar(30) NOT NULL,
  `cp_livraison` varchar(5) NOT NULL,
  `nom_livraison` varchar(10) NOT NULL,
  `prenom_livraison` varchar(50) NOT NULL,
  `id_client` int(50) NOT NULL,
  `id_mode_paiement` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDER`
--

CREATE TABLE IF NOT EXISTS `COMMANDER` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `FACTURE`
--

CREATE TABLE IF NOT EXISTS `FACTURE` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `MODE_PAIEMENT`
--

CREATE TABLE IF NOT EXISTS `MODE_PAIEMENT` (
  `id_mode_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `type_mode_paiement` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mode_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `PANIER`
--

CREATE TABLE IF NOT EXISTS `PANIER` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_panier` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `POSSEDER`
--

CREATE TABLE IF NOT EXISTS `POSSEDER` (
  `id_statut_commande` int(50) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `date_statut_commande` date NOT NULL,
  PRIMARY KEY (`id_statut_commande`,`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `PRODUIT`
--

CREATE TABLE IF NOT EXISTS `PRODUIT` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(30) NOT NULL,
  `description_produit` varchar(10) NOT NULL,
  `prix_produit` varchar(20) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `STATUT_COMMANDE`
--

CREATE TABLE IF NOT EXISTS `STATUT_COMMANDE` (
  `id_statut_commande` int(11) NOT NULL AUTO_INCREMENT,
  `nom_statut_commande` varchar(50) NOT NULL,
  `description_statut_commande` varchar(30) NOT NULL,
  PRIMARY KEY (`id_statut_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
