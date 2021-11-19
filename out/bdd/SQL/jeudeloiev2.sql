-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 19 nov. 2021 à 20:17
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeudeloiev2`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reponse_possible`
--

CREATE TABLE `reponse_possible` (
  `id_question` int(11) NOT NULL,
  `id_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `roles` varchar(50) DEFAULT NULL,
  `createAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `firstName`, `lastName`, `mail`, `roles`, `createAt`) VALUES
(2, 'admin', 'admin', 'Alex', 'Sch', 'admin57@test.Fr', 'ROLES_ADMIN', '2021-11-19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- Index pour la table `reponse_possible`
--
ALTER TABLE `reponse_possible`
  ADD PRIMARY KEY (`id_question`,`id_answer`),
  ADD KEY `id_answer` (`id_answer`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reponse_possible`
--
ALTER TABLE `reponse_possible`
  ADD CONSTRAINT `reponse_possible_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`),
  ADD CONSTRAINT `reponse_possible_ibfk_2` FOREIGN KEY (`id_answer`) REFERENCES `answer` (`id_answer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
