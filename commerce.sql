-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 03 oct. 2024 à 14:51
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `pu` double NOT NULL,
  `qte` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `createur` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `libelle`, `pu`, `qte`, `image`, `description`, `categorie`, `createur`, `date_creation`, `date_modification`) VALUES
(58, 'mac', 2500, 25, 'MacBook.jpg', 'pc portable', 'pc', 'Med Taha', '2024-10-03', '2024-10-03'),
(59, 'iphone', 4000, 3, 'iphone 14.jpg', 'smartphone', 'telephone', 'Med Taha', '2024-10-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `nom`, `email`, `tel`, `contenu`) VALUES
(2, 'med taha ben attaia', 'medtahabenattaia@gmail.com', 93708320, 'fffff');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`, `createur`, `date_creation`, `date_modification`) VALUES
(13, 'pc', 'pc portables', 1, '2024-10-03', '2024-10-03'),
(14, 'telephone', 'smartphone', 1, '2024-10-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `ps`, `adresse`, `telephone`, `date_creation`, `date_modification`, `etat`) VALUES
(47, 'ben attaia', 'med taha', 'medtahabenattaia@gmail.com', 'e1589bc715772bc888f8a4e6feca11d4795333a4', '43 rue d\'andalous', '93708320', '2024-10-02', '2024-10-03', 1),
(48, 'ben attaia', 'med taha', 'medtahabenattaia@gmail.com', 'e1589bc715772bc888f8a4e6feca11d4795333a4', '43 rue d\'andalous', '93708320', '2024-10-03', '2024-10-03', 1),
(49, 'ben attaia', 'med taha', 'medtahabenattaia@gmail.com', 'e1589bc715772bc888f8a4e6feca11d4795333a4', '43 rue d\'andalous', '93708320', '2024-10-03', '2024-10-03', 1),
(50, 'ben attaia', 'med taha', 'medtahabenattaia@gmail.com', 'e1589bc715772bc888f8a4e6feca11d4795333a4', '43 rue d\'andalous', '93708320', '2024-10-03', '2024-10-03', 1),
(51, 'wahid', 'mensia', 'medtaha_benattaia@gmail.com', 'f1dc6f6543716ada0fa3276d2de71cbd2f202864', '43 rue d\'andalous', '93708320', '2024-10-03', '2024-10-03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `article` varchar(255) NOT NULL,
  `qte` int(11) NOT NULL,
  `panier` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_modification` date NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `article`, `qte`, `panier`, `total`, `date_modification`, `date_creation`) VALUES
(31, 'mac', 2, 18, 5000, '2024-10-03', '2024-10-03'),
(32, 'mac', 1, 19, 2500, '2024-10-03', '2024-10-03'),
(33, 'mac', 3, 20, 7500, '2024-10-03', '2024-10-03'),
(34, 'iphone', 2, 21, 8000, '2024-10-03', '2024-10-03'),
(35, 'iphone', 2, 22, 8000, '2024-10-03', '2024-10-03');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `client` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `date_creation` date NOT NULL,
  `etat` varchar(100) NOT NULL DEFAULT 'attente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `client`, `total`, `date_creation`, `etat`) VALUES
(18, '47', 5000, '2024-10-03', 'en livraison'),
(19, '47', 2500, '2024-10-03', 'livraison terminée'),
(20, '47', 7500, '2024-10-03', 'attente'),
(21, '47', 8000, '2024-10-03', 'attente'),
(22, '47', 8000, '2024-10-03', 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `ps`) VALUES
(1, 'Med Taha', 'Ben Attaia', 'medtahabenattaia@gmail.com', 'e1589bc715772bc888f8a4e6feca11d4795333a4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
