-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Octobre 2017 à 16:59
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alainlortal_cvsite`
--
CREATE DATABASE IF NOT EXISTS `alainlortal_cvsite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `alainlortal_cvsite`;

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id_competence` int(3) NOT NULL,
  `competence` varchar(30) CHARACTER SET utf8 NOT NULL,
  `c_niveau` int(3) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `c_niveau`, `utilisateur_id`) VALUES
(1, 'Photoshop', 50, 1),
(2, 'Illustrator', 35, 2),
(3, 'HTML5', 40, 3),
(5, 'CSS3', 35, 1),
(7, 'SQL', 35, 1),
(8, 'PHP', 25, 1),
(9, 'WordPress', 32, 1),
(10, 'Ajax', 16, 1),
(11, 'InDesign', 40, 1),
(12, 'Xpress', 35, 1),
(13, 'Javascript', 15, 1),
(14, 'Illustrator', 40, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE `t_experiences` (
  `id_experience` int(3) NOT NULL,
  `e_titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `e_soustitre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `e_dates` varchar(50) CHARACTER SET utf8 NOT NULL,
  `e_description` text CHARACTER SET utf8 NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `e_titre`, `e_soustitre`, `e_dates`, `e_description`, `utilisateur_id`) VALUES
(1, 'Chargé de Communication', 'Extramuros', '2014-2015', 'Création de catalogues - Community Manager - Webmaster', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE `t_formations` (
  `id_formation` int(3) NOT NULL,
  `f_titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `f_soustitre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `f_dates` varchar(50) CHARACTER SET utf8 NOT NULL,
  `f_description` text CHARACTER SET utf8 NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_formations`
--

INSERT INTO `t_formations` (`id_formation`, `f_titre`, `f_soustitre`, `f_dates`, `f_description`, `utilisateur_id`) VALUES
(1, 'Diplôme d''Études Approfondies (DEA)', 'Communication, Technologies et Pouvoir', '1995', 'Département Science Politique Paris Panthéon-Sorbonne', 1),
(2, 'Certification Intégrateur/Développeur Web', 'HTML, CSS, MySQL, PHP, Javascript, WordPress, Boot', '2017', 'Asssociation LePoles - WebForce3', 1),
(5, 'Brevet d''Aptitude aux Fonctions d''Animateur', ' (BAFA)', '1985', 'FEEUF', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `id_loisir` int(3) NOT NULL,
  `loisir` varchar(30) CHARACTER SET utf8 NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id_loisir`, `loisir`, `utilisateur_id`) VALUES
(1, 'monocycle', 1),
(2, 'cinéma chinois', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE `t_realisations` (
  `id_realisation` int(3) NOT NULL,
  `r_titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `r_soustitre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `r_dates` varchar(50) CHARACTER SET utf8 NOT NULL,
  `r_description` text CHARACTER SET utf8 NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_realisations`
--

INSERT INTO `t_realisations` (`id_realisation`, `r_titre`, `r_soustitre`, `r_dates`, `r_description`, `utilisateur_id`) VALUES
(1, 'Société Générale', 'UX du site', '20 octobre 2017 - 2 mars 2018', 'interview des utilisateurs côté front et côté back. Élaboration des préconisations de modification de l''ergonomie générale du site', 1),
(5, 'pouet', 'je teste', '31/10/2017 et suivants', 'n''importe...', 1),
(6, 'Annonceo', 'site de petites annonces', 'Octobre 2017', 'rréalisatiopn d''une base dynamique d''annonces entre particuliers', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_titre_cv`
--

CREATE TABLE `t_titre_cv` (
  `id_titre_cv` int(3) NOT NULL,
  `titre_cv` text NOT NULL,
  `accroche` text NOT NULL,
  `logo` varchar(20) NOT NULL,
  `utilisateur_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE `t_utilisateurs` (
  `id_utilisateur` int(3) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) UNSIGNED ZEROFILL NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `avatar` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` enum('H','F','','') NOT NULL,
  `etat_civil` enum('M','Mme','','') NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `site_web` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `telephone`, `mdp`, `pseudo`, `avatar`, `age`, `date_naissance`, `sexe`, `etat_civil`, `adresse`, `code_postal`, `ville`, `pays`, `site_web`) VALUES
(1, 'Alain', 'LORTAL', 'alain.lortal@lepoles.com', 0674605319, 'admin', 'alainlo', '', 51, '1965-11-14', 'H', 'M', '62 rue  Louis Castel', 92230, 'GENNEVILLIERS', 'FRANCE', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD PRIMARY KEY (`id_realisation`);

--
-- Index pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  ADD PRIMARY KEY (`id_titre_cv`);

--
-- Index pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id_formation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id_loisir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id_realisation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `t_titre_cv`
--
ALTER TABLE `t_titre_cv`
  MODIFY `id_titre_cv` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
