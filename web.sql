-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 déc. 2022 à 16:35
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_destinataire`, `id_auteur`, `message`) VALUES
(1, 1, 2, 'Salut Mark comment ca va ?'),
(2, 1, 3, 'Salut ! tout le monde'),
(3, 1, 3, 'Le Monde part en vrille'),
(4, 1, 4, 'hey'),
(5, 2, 3, 'Salutt'),
(6, 2, 3, 'c\'est comment'),
(7, 3, 2, 'Ca va et toi?'),
(8, 3, 2, 'Ca va et toi?'),
(9, 3, 2, 'Wep cool'),
(10, 2, 5, 'Salut Raoul'),
(11, 5, 2, 'C\'est comment');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`) VALUES
(1, 'Mark Zongo', 'Markzongo@gmail.com', '$2y$10$DbWfg.DcyG1zw9GYl33NNuUNdefM.IPvZ.BMT6Pe35EeJwvB8bpdC'),
(2, 'COMPAORE Raoul', 'raoul2compaore@gmail.com', '$2y$10$ZqX3FmEHL7jlpskzxj7sZ.wBdewDEXtYVqtUj4Lm7uTsORQH97sbS'),
(3, 'COMPAORE eddy', 'eddycompaore@gmail.com', '$2y$10$wa1H5NsfrHgO1KVPvhirye/4B63cGWPrVfMUbIQYR7yVWwqdDABrK'),
(4, 'zombie gambi', 'zombiegambi@gmail.com', '$2y$10$dpkxT/wAuPB39GHCalcgd.WmLZww8ZmqVUtH8lHKvV5jaAb/HSkkC'),
(5, 'Yago loroy', 'yagoloroy@gmail.com', '$2y$10$nuTwoiFIm1sjtehxpPR3uu6gYaYCtQKqfkYcPcIC/Lnp4qo.ZoUDK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
