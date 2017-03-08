-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Mars 2017 à 13:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mybd`
--

-- --------------------------------------------------------

--
-- Structure de la table `l31617_panier`
--

CREATE TABLE `l31617_panier` (
  `panier_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `l31617_panier`
--

INSERT INTO `l31617_panier` (`panier_id`, `produit_id`, `client_id`, `nombre`) VALUES
(1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `l31617_produits`
--

CREATE TABLE `l31617_produits` (
  `produit_id` int(11) NOT NULL,
  `libelle` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `l31617_produits`
--

INSERT INTO `l31617_produits` (`produit_id`, `libelle`, `prix`, `stock`) VALUES
(1, 'Peluche Assassine', '10.99', 2),
(2, 'Licorne Peluche', '25.99', 0);

-- --------------------------------------------------------

--
-- Structure de la table `l31617_utilisateurs`
--

CREATE TABLE `l31617_utilisateurs` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(30) NOT NULL COMMENT 'sert de login',
  `motdepasse` varchar(60) NOT NULL COMMENT 'mot de passe crypté : il faut une taille assez grande pour ne pas le tronquer',
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `anniversaire` date DEFAULT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table des utilisateurs du site';

--
-- Contenu de la table `l31617_utilisateurs`
--

INSERT INTO `l31617_utilisateurs` (`id`, `identifiant`, `motdepasse`, `nom`, `prenom`, `anniversaire`, `isadmin`, `created`, `modified`) VALUES
(1, 'admin', 'nimda', NULL, NULL, NULL, 1, '2017-02-18 19:16:50', '2017-02-18 19:16:50'),
(2, 'gilles', 'sellig', 'Subrenat', 'Gilles', '2000-01-01', 0, '2017-02-18 19:21:16', '2017-02-18 19:21:16'),
(3, 'mathias', 'saihtam', 'Mathias', 'Brousset', '2001-01-02', 0, '2017-02-18 19:21:16', '2017-02-18 19:21:16');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `l31617_panier`
--
ALTER TABLE `l31617_panier`
  ADD PRIMARY KEY (`panier_id`),
  ADD UNIQUE KEY `produit_id` (`produit_id`,`client_id`),
  ADD KEY `key_users` (`client_id`);

--
-- Index pour la table `l31617_produits`
--
ALTER TABLE `l31617_produits`
  ADD PRIMARY KEY (`produit_id`);

--
-- Index pour la table `l31617_utilisateurs`
--
ALTER TABLE `l31617_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`identifiant`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `l31617_panier`
--
ALTER TABLE `l31617_panier`
  MODIFY `panier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `l31617_produits`
--
ALTER TABLE `l31617_produits`
  MODIFY `produit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `l31617_utilisateurs`
--
ALTER TABLE `l31617_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `l31617_panier`
--
ALTER TABLE `l31617_panier`
  ADD CONSTRAINT `key_produits` FOREIGN KEY (`produit_id`) REFERENCES `l31617_produits` (`produit_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `key_users` FOREIGN KEY (`client_id`) REFERENCES `l31617_utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
