-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 09 Avril 2013 à 18:02
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

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
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_admin` varchar(30) NOT NULL,
  `mdp_admin` varchar(10) NOT NULL,
  `mail_admin` varchar(20) NOT NULL,
  `droit_admin` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `pseudo_admin`, `mdp_admin`, `mail_admin`, `droit_admin`) VALUES
(1, 'adminCi', 'admin', '', 'client'),
(2, 'adminCo', 'admin', '', 'commande');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(50) NOT NULL,
  `prenom_client` varchar(30) NOT NULL,
  `tel_client` varchar(10) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `pseudo_client` varchar(15) NOT NULL,
  `mdp_client` varchar(15) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `tel_client`, `email_client`, `pseudo_client`, `mdp_client`) VALUES
(1, 'Lerolier', 'Michel', '0122334455', 'lerolier@wawa.fr', 'Lerolier', '0000'),
(2, 'Carpotier', 'Boby', '0122334466', 'Carpotier@bibi.com', 'Carpotier', '0000'),
(3, 'Baboche', 'Antoine', '0145778899', 'Babo@hotmoul.fr', 'Babo', '0000'),
(4, 'Vovi', 'Alice', '0177889966', 'alice@gbob.com', 'vovi', '0000');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `description_commande` varchar(50) NOT NULL,
  `adresse_livraison` varchar(30) NOT NULL,
  `ville_livraison` varchar(30) NOT NULL,
  `cp_livraison` varchar(5) NOT NULL,
  `nom_livraison` varchar(255) NOT NULL,
  `prenom_livraison` varchar(50) NOT NULL,
  `id_client` int(50) NOT NULL,
  `id_mode_paiement` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  PRIMARY KEY (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `description_commande`, `adresse_livraison`, `ville_livraison`, `cp_livraison`, `nom_livraison`, `prenom_livraison`, `id_client`, `id_mode_paiement`, `id_facture`) VALUES
(1, '5 paquet de doliprane', '1 rue du temple', 'Paris', '75000', 'Michelle', 'Boby', 3, 1, 1),
(2, '6 boite de Tolyphoque', '5 rue de la vilette', 'Champigny', '94500', 'Alexandre', 'Mobylo', 4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE IF NOT EXISTS `commander` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`,`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_facture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id_facture`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiement`
--

CREATE TABLE IF NOT EXISTS `mode_paiement` (
  `id_mode_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `type_mode_paiement` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mode_paiement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `mode_paiement`
--

INSERT INTO `mode_paiement` (`id_mode_paiement`, `type_mode_paiement`) VALUES
(1, 'Carte Bleue'),
(2, 'Cheque');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_panier` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE IF NOT EXISTS `posseder` (
  `id_statut_commande` int(50) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `date_statut_commande` date NOT NULL,
  PRIMARY KEY (`id_statut_commande`,`id_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `posseder`
--

INSERT INTO `posseder` (`id_statut_commande`, `id_commande`, `date_statut_commande`) VALUES
(1, 2, '2012-10-10'),
(2, 1, '2012-10-26');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) NOT NULL,
  `description_produit` varchar(255) NOT NULL,
  `quantite_produit` int(11) NOT NULL,
  `prix_produit` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description_produit`, `quantite_produit`, `prix_produit`) VALUES
(5, 'Tolyphoque', 'aucune', 87, '25'),
(6, 'oupurat', 'mal de dos', 96, '60'),
(10, 'Boblityne', 'aucune', 600, '2');

-- --------------------------------------------------------

--
-- Structure de la table `statut_commande`
--

CREATE TABLE IF NOT EXISTS `statut_commande` (
  `id_statut_commande` int(11) NOT NULL AUTO_INCREMENT,
  `nom_statut_commande` varchar(50) NOT NULL,
  `description_statut_commande` varchar(255) NOT NULL,
  PRIMARY KEY (`id_statut_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `statut_commande`
--

INSERT INTO `statut_commande` (`id_statut_commande`, `nom_statut_commande`, `description_statut_commande`) VALUES
(1, 'En en attente', 'La commande est en attente de paiement'),
(2, 'Expedier', 'La commande est en cours de livraison');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
