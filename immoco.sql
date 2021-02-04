-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 19 déc. 2020 à 15:22
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immoco`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointements`
--

DROP TABLE IF EXISTS `appointements`;
CREATE TABLE IF NOT EXISTS `appointements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_clients` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_appointements_types` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `appointements_clients_FK` (`id_clients`),
  KEY `appointements_users0_FK` (`id_users`),
  KEY `appointements_appointements_types1_FK` (`id_appointements_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `appointements_types`
--

DROP TABLE IF EXISTS `appointements_types`;
CREATE TABLE IF NOT EXISTS `appointements_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appointement_types`
--

INSERT INTO `appointements_types` (`id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Premier contact achat', now(), now(), NULL),
(2, 'Premier contact vente', now(), now(), NULL),
(3, 'Visite achat', now(), now(), NULL),
(4, 'Visite vente', now(), now(), NULL),
(5, 'Modification souhait achat', now(), now(), NULL),
(6, 'Modification souhait vente', now(), now(), NULL),
(7, 'Achat', now(), now(), NULL),
(8, 'Vente', now(), now(), NULL),
(9, 'Autres', now(), now(), NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `cellphone` varchar(15) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `maxBudget` int(11) NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_clients_types` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_users_FK` (`id_users`),
  KEY `clients_clients_types0_FK` (`id_clients_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients_types`
--

DROP TABLE IF EXISTS `clients_types`;
CREATE TABLE IF NOT EXISTS `clients_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clientstypes`
--

INSERT INTO `clients_types` (`id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Acheteur', now(), now(), NULL),
(2, 'Vendeur', now(), now(), NULL),
(3, 'Acheteur Vendeur', now(), now(), NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clientswishes`
--

DROP TABLE IF EXISTS `clients_wishes`;
CREATE TABLE IF NOT EXISTS `clients_wishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `livingArea` float DEFAULT NULL,
  `area` int(6) DEFAULT NULL,
  `gardenArea` int(6) DEFAULT NULL,
  `floorNumber` int(3) DEFAULT NULL,
  `piecesNumber` int(3) DEFAULT NULL,
  `bedroomNumber` int(3) DEFAULT NULL,
  `bathroomNumber` int(3) DEFAULT NULL,
  `wcNumber` int(3) DEFAULT NULL,
  `buildingNumber` varchar(25) DEFAULT NULL,
  `bearing` int(3) DEFAULT NULL,
  `doorNumber` varchar(25) DEFAULT NULL,
  `garden` tinyint(1) NOT NULL,
  `garage` tinyint(1) NOT NULL,
  `cellar` tinyint(1) NOT NULL,
  `atic` tinyint(1) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `opticalFiber` tinyint(1) NOT NULL,
  `swimmingPool` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updtaed_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_properties_types` int(11) DEFAULT NULL,
  `id_clients` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientsWishes_clients_AK` (`id_clients`),
  KEY `clientsWishes_properties_types_FK` (`id_properties_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `heater_types`
--

DROP TABLE IF EXISTS `heater_types`;
CREATE TABLE IF NOT EXISTS `heater_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `heatertypes`
--

INSERT INTO `heater_types` (`id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cheminée feu de bois', now(), now(), NULL),
(2, 'Insert feu de bois', now(), now(), NULL),
(3, 'Poêle à bois', now(), now(), NULL),
(4, 'Poêle à granulés', now(), now(), NULL),
(5, 'Chaudière bois', now(), now(), NULL),
(6, 'Pompe à chaleur air/air', now(), now(), NULL),
(7, 'Pompe à chaleur air/eau', now(), now(), NULL),
(8, 'Pompe à chaleur géothermique', now(), now(), NULL),
(9, 'Pompe à chaleur hydrothermique', now(), now(), NULL),
(10, 'Chaudière fioul standard', now(), now(), NULL),
(11, 'Chaudière fioul à condensation', now(), now(), NULL),
(12, 'Chaudière fioul basse température', now(), now(), NULL),
(13, 'Chaudière fioul à ventouse', now(), now(), NULL),
(14, 'Chaudière fioul micro cogénération', now(), now(), NULL),
(15, 'Chaudière mixte', now(), now(), NULL),
(16, 'Chaudière au gaz standard', now(), now(), NULL),
(17, 'Chaudière au gaz à condensation', now(), now(), NULL),
(18, 'Chaudière gaz basse température', now(), now(), NULL),
(19, 'Chauffage au sol', now(), now(), NULL),
(20, 'Chauffage électrique', now(), now(), NULL),
(21, 'Autres', now(), now(), NULL);

-- --------------------------------------------------------

--
-- Structure de la table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `descriptive` text DEFAULT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `livingArea` int(11) NOT NULL,
  `area` int(6) DEFAULT NULL,
  `gardenArea` int(6) DEFAULT NULL,
  `floorNumber` int(3) DEFAULT NULL,
  `piecesNumber` int(3) DEFAULT NULL,
  `bedroomNumber` int(3) DEFAULT NULL,
  `bathroomNumber` int(3) DEFAULT NULL,
  `wcNumber` int(3) DEFAULT NULL,
  `buildingNumber` varchar(25) DEFAULT NULL,
  `bearing` int(3) DEFAULT NULL,
  `doorNumber` varchar(25) DEFAULT NULL,
  `garden` tinyint(1) NOT NULL,
  `garage` tinyint(1) NOT NULL,
  `cellar` tinyint(1) NOT NULL,
  `atic` tinyint(1) NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `opticalFiber` tinyint(1) NOT NULL,
  `swimmingPool` tinyint(1) NOT NULL,
  `balcony` tinyint(1) NOT NULL,
  `interstedClientId` text DEFAULT NULL,
  `archive` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updtaed_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_clients` int(11) NOT NULL,
  `id_properties_types` int(11) NOT NULL,
  `id_shutters_types` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_clients_FK` (`id_clients`),
  KEY `properties_properties_types0_FK` (`id_properties_types`),
  KEY `properties_shutters_types1_FK` (`id_shutters_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `propertiestypes`
--

DROP TABLE IF EXISTS `properties_types`;
CREATE TABLE IF NOT EXISTS `properties_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `isAppartement` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `propertiestypes`
--

INSERT INTO `properties_types` (`id`, `value`, `isAppartement`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'T1', 1, now(), now(), NULL),
(2, 'T2', 1, now(), now(), NULL),
(3, 'T3', 1, now(), now(), NULL),
(4, 'T4', 1, now(), now(), NULL),
(5, 'T5', 1, now(), now(), NULL),
(6, 'Loft', 1, now(), now(), NULL),
(7, 'Duplex', 1, now(), now(), NULL),
(8, 'Triplex', 1, now(), now(), NULL),
(9, 'Souplex', 1, now(), now(), NULL),
(10, 'Autre type d\'appartement', 1, now(), now(), NULL),
(11, 'Maison à étages', 0, now(), now(), NULL),
(12, 'Maison à toit plat', 0, now(), now(), NULL),
(13, 'Maison bioclimatique', 0, now(), now(), NULL),
(14, 'Maison duplex', 0, now(), now(), NULL),
(15, 'Maison en bois', 0, now(), now(), NULL),
(16, 'Maison en lotissement', 0, now(), now(), NULL),
(17, 'Maison en pierres apparentes', 0, now(), now(), NULL),
(18, 'Maison en VEFA', 0, now(), now(), NULL),
(19, 'Maison évolutive', 0, now(), now(), NULL),
(20, 'Maison individuelle classique', 0, now(), now(), NULL),
(21, 'Maison coloniale', 0, now(), now(), NULL),
(22, 'Maison jumelées', 0, now(), now(), NULL),
(23, 'Maison de type loft', 0, now(), now(), NULL),
(24, 'Maison longères', 0, now(), now(), NULL),
(25, 'Maison meulières', 0, now(), now(), NULL),
(26, 'Maison phénix', 0, now(), now(), NULL),
(27, 'Maison prête à finir', 0, now(), now(), NULL),
(28, 'Maison plain-pied', 0, now(), now(), NULL),
(29, 'Mas de provence', 0, now(), now(), NULL),
(30, 'Maison en briques traditionnelle', 0, now(), now(), NULL),
(31, 'Maison Victorienne', 0, now(), now(), NULL),
(32, 'Maison insolite', 0, now(), now(), NULL),
(33, 'Autres type de maison', 0, now(), now(), NULL),
(34, 'Villa', 0, now(), now(), NULL),
(35, 'Chateau', 0, now(), now(), NULL),
(36, 'Maison insolite', 0, now(), now(), NULL),
(37, 'Terrain constructible', 0, now(), now(), NULL),
(38, 'Autres', 0, now(), now(), NULL),
(39, 'Autres', 1, now(), now(), NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shutterstypes`
--

DROP TABLE IF EXISTS `shutters_types`;
CREATE TABLE IF NOT EXISTS `shutters_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shutterstypes`
--

INSERT INTO `shutters_types` (`id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Volets battants', now(), now(), NULL),
(2, 'Volets pliants', now(), now(), NULL),
(3, 'Volets roulants', now(), now(), NULL),
(4, 'Volets coulissants', now(), now(), NULL),
(5, 'Pas de volets', now(), now(), NULL),
(6, 'Autres', now(), now(), NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typesoftheheaters`
--

DROP TABLE IF EXISTS `types_of_the_heaters`;
CREATE TABLE IF NOT EXISTS `types_of_the_heaters` (
  `id` int(11) NOT NULL,
  `id_properties` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_properties`),
  KEY `types_of_the_heaters_properties0_FK` (`id_properties`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typesoftheheatersforthewishedproperties`
--

DROP TABLE IF EXISTS `types_of_the_heaters_for_the_wished_properties`;
CREATE TABLE IF NOT EXISTS `types_of_the_heaters_for_the_wished_properties` (
  `id` int(11) NOT NULL,
  `id_heater_types` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_heater_types`),
  KEY `types_of_the_heaters_for_the_wished_properties_heater_types0_FK` (`id_heater_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` char(60) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_user_types` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_user_types_FK` (`id_user_types`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `usertypes`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usertypes`
--

INSERT INTO `user_types` (`id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', now(), now(), NULL),
(2, 'Chef d\'un groupe d\'agences', now(), now(), NULL),
(3, 'Manager', now(), now(), NULL),
(4, 'Secrétaire', now(), now(), NULL),
(5, 'Vendeur', now(), now(), NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointements`
--
ALTER TABLE `appointements`
  ADD CONSTRAINT `appointements_appointements_types1_FK` FOREIGN KEY (`id_appointements_types`) REFERENCES `appointements_types` (`id`),
  ADD CONSTRAINT `appointements_clients_FK` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `appointements_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_clients_types0_FK` FOREIGN KEY (`id_clients_types`) REFERENCES `clients_types` (`id`),
  ADD CONSTRAINT `clients_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `clientswishes`
--
ALTER TABLE `clients_wishes`
  ADD CONSTRAINT `clients_wishes_clients0_FK` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `clients_wishes_properties_types_FK` FOREIGN KEY (`id_properties_types`) REFERENCES `properties_types` (`id`);

--
-- Contraintes pour la table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_clients_FK` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `properties_properties_types0_FK` FOREIGN KEY (`id_properties_types`) REFERENCES `properties_types` (`id`),
  ADD CONSTRAINT `properties_shutters_types1_FK` FOREIGN KEY (`id_shutters_types`) REFERENCES `shutters_types` (`id`);

--
-- Contraintes pour la table `typesoftheheaters`
--
ALTER TABLE `types_of_the_heaters`
  ADD CONSTRAINT `types_of_the_heaters_heater_types_FK` FOREIGN KEY (`id`) REFERENCES `heater_types` (`id`),
  ADD CONSTRAINT `types_of_the_heaters_properties0_FK` FOREIGN KEY (`id_properties`) REFERENCES `properties` (`id`);

--
-- Contraintes pour la table `typesoftheheatersforthewishedproperties`
--
ALTER TABLE `types_of_the_heaters_for_the_wished_properties`
  ADD CONSTRAINT `types_of_the_heaters_for_the_wished_properties_clients_wishes_FK` FOREIGN KEY (`id`) REFERENCES `clients_wishes` (`id`),
  ADD CONSTRAINT `types_of_the_heaters_for_the_wished_properties_heater_types0_FK` FOREIGN KEY (`id_heater_types`) REFERENCES `heater_types` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_types_FK` FOREIGN KEY (`id_user_types`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;