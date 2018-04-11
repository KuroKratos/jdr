-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 11 Avril 2018 à 15:31
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jd20r`
--
CREATE DATABASE IF NOT EXISTS `jd20r` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jd20r`;

-- --------------------------------------------------------

--
-- Structure de la table `bestiary`
--

DROP TABLE IF EXISTS `bestiary`;
CREATE TABLE `bestiary` (
  `id` int(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `hp` int(11) NOT NULL,
  `attack` varchar(16) NOT NULL,
  `defense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `bestiary`
--

TRUNCATE TABLE `bestiary`;
--
-- Contenu de la table `bestiary`
--

INSERT INTO `bestiary` (`id`, `name`, `hp`, `attack`, `defense`) VALUES
(0, 'Aucun ennemi', 0, '---', 0),
(1, 'Dinde sauvage', 10, '1d4', 0),
(2, 'Zombie décérébré', 20, '1d6', 0),
(3, 'Ghoule déshéritée', 30, '1d8', 0),
(4, 'Âme égarée', 50, '1d10', 1),
(5, 'Jeune charognard', 25, '1d6', 0),
(6, 'Charognard pouilleux', 40, '1d8', 0),
(7, 'Chef de meute charognard', 65, '1d10', 1),
(8, 'Jeune tisse-nuit', 30, '1d6', 0),
(9, 'Araignée tisse-nuit', 50, '1d8', 0),
(10, 'Matriarche tisse-nuit', 100, '1d10+2', 2),
(11, 'Gregor Agamand', 100, '1d10+2', 2),
(12, 'Nissa Agamand', 100, '1d10+2', 2),
(13, 'Thurman Agamand', 100, '1d10+2', 2),
(14, 'Devlin Agamand', 120, '1d10+2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `character`
--

DROP TABLE IF EXISTS `character`;
CREATE TABLE `character` (
  `char_id` smallint(6) NOT NULL,
  `name` varchar(128) NOT NULL,
  `class` varchar(128) NOT NULL,
  `race` varchar(64) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `traits` text NOT NULL,
  `strength` tinyint(4) NOT NULL DEFAULT '50',
  `dexterity` tinyint(4) NOT NULL DEFAULT '50',
  `luck` tinyint(4) NOT NULL DEFAULT '50',
  `constitution` tinyint(4) NOT NULL DEFAULT '50',
  `charisma` tinyint(4) NOT NULL DEFAULT '50',
  `perception` tinyint(4) NOT NULL DEFAULT '50',
  `education` tinyint(4) NOT NULL DEFAULT '50',
  `intelligence` tinyint(4) NOT NULL DEFAULT '50',
  `alignement` tinyint(4) NOT NULL DEFAULT '50',
  `defense` tinyint(4) NOT NULL DEFAULT '0',
  `hp_cur` mediumint(9) NOT NULL DEFAULT '210',
  `hp_max` mediumint(9) NOT NULL DEFAULT '210',
  `pp_cur` mediumint(9) NOT NULL DEFAULT '210',
  `pp_max` mediumint(9) NOT NULL DEFAULT '210',
  `gold` mediumint(9) NOT NULL DEFAULT '0',
  `story` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `character`
--

TRUNCATE TABLE `character`;
--
-- Contenu de la table `character`
--

INSERT INTO `character` (`char_id`, `name`, `class`, `race`, `level`, `traits`, `strength`, `dexterity`, `luck`, `constitution`, `charisma`, `perception`, `education`, `intelligence`, `alignement`, `defense`, `hp_cur`, `hp_max`, `pp_cur`, `pp_max`, `gold`, `story`) VALUES
(1, 'Ecktor', 'Prêtre', 'Mort-vivant', 1, 'Dévoué, passionné, grande gueule, ne dort jamais', 50, 50, 50, 50, 50, 50, 50, 50, 50, 1, 200, 200, 200, 200, 0, 'Absolument dévoué à la cause des Réprouvés, et fervent admirateur de Sylvanas, Ecktor a pour idéal de prouver au monde que son espèce, bien que contre nature, est digne de confiance et de respect.'),
(2, 'GetBrain', 'Mage', 'Elfe de sang', 1, 'Ahmed', 10, 40, 50, 30, 50, 70, 70, 80, 50, 0, 130, 130, 330, 330, 0, ''),
(3, 'Wipoo', 'Druide', 'Tauren', 1, '', 50, 50, 50, 50, 50, 50, 50, 50, 50, 0, 210, 210, 210, 210, 0, ''),
(4, 'Falzahr', 'Guerrier', 'Orc', 1, '', 50, 50, 50, 50, 50, 50, 50, 50, 50, 0, 210, 210, 210, 210, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `char_inventory`
--

DROP TABLE IF EXISTS `char_inventory`;
CREATE TABLE `char_inventory` (
  `item_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `char_inventory`
--

TRUNCATE TABLE `char_inventory`;
-- --------------------------------------------------------

--
-- Structure de la table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name_m` varchar(32) NOT NULL,
  `name_f` varchar(32) NOT NULL,
  `color` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `class`
--

TRUNCATE TABLE `class`;
--
-- Contenu de la table `class`
--

INSERT INTO `class` (`id`, `name_m`, `name_f`, `color`) VALUES
(1, 'Chevalier de la mort', 'Chevalier de la mort', 'rgb(196 ,31 ,59)'),
(2, 'Chasseur de démons', 'Chasseuse de démons', 'rgb(163 ,48 ,201)'),
(3, 'Druide', 'Druide', 'rgb(255 ,125 ,10)'),
(4, 'Chasseur', 'Chasseuse', 'rgb(171 ,212 ,115)'),
(5, 'Mage', 'Mage', 'rgb(105 ,204 ,240)'),
(6, 'Moine', 'Moniale', 'rgb(0 ,255 ,150)'),
(7, 'Paladin', 'Paladin', 'rgb(245,140,186)'),
(8, 'Prêtre', 'Prêtresse', 'rgb(255 ,255 ,255)'),
(9, 'Voleur', 'Voleuse', 'rgb(255 ,245 ,105)'),
(10, 'Chaman', 'Chamane', 'rgb(0 ,112 ,222)'),
(11, 'Démoniste', 'Démoniste', 'rgb(148 ,130 ,201)'),
(12, 'Guerrier', 'Guerrière', 'rgb(199 ,156 ,110)');

-- --------------------------------------------------------

--
-- Structure de la table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `inventory`
--

TRUNCATE TABLE `inventory`;
--
-- Contenu de la table `inventory`
--

INSERT INTO `inventory` (`item_id`, `char_id`, `name`, `description`, `quantity`, `deleted`) VALUES
(1, 1, 'Robe de voyage', '+1 DEF', 1, 0),
(2, 1, 'Bâton bon marché', 'Lumière à 5m', 1, 0),
(3, 2, 'Robe de voyage', 'DEF +1', 1, 0),
(4, 2, 'Baguette fissurée', 'Projectile magique 1d4', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `bonus_value` tinyint(4) NOT NULL,
  `bonus_stat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `item`
--

TRUNCATE TABLE `item`;
--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `category`, `name`, `description`, `bonus_value`, `bonus_stat`) VALUES
(16, 1, 'Caillou', 'Peut être jeté, utilisé pour ne pas se perdre, etc.', 0, ''),
(17, 2, 'Pain rassis', 'Il commence à se dessécher...', 0, ''),
(18, 3, 'Fourrure de charognard', 'Assez abîmée et sent plutôt fort', 0, ''),
(19, 4, 'Marteau', 'Si Cloclo en avait un...', 0, ''),
(20, 5, 'Tête de méchant', 'Assez commun', 0, ''),
(21, 6, 'Épée courte', '<code>[1d6]</code> Peut être un peu trop d\'ailleurs...', 1, 'str'),
(22, 7, 'Robe de soie', 'Les hommes mages en raffolent', 1, 'int'),
(23, 1, 'Branche', 'On peut en faire un tas de choses...', 0, ''),
(24, 2, 'Pain frais', 'Il n\'a pas plus de deux jours', 0, ''),
(25, 3, 'Cuirasse d\'araignée', 'Plus dur que du cuir mais moins que du métal', 0, ''),
(26, 4, 'Pioche', 'Notch ?', 0, ''),
(27, 4, 'Lanterne', 'Avec allumage automatique et autonomie infinie ! - <i>Ça va être tout noir !</i>', 0, ''),
(28, 4, 'Corde', 'Quelques mètres, à une vache près.', 0, ''),
(29, 4, 'Enclume portative', 'Ils sont forts ces mages quand même !', 0, ''),
(30, 6, 'Baguette fissurée', '<code>[1d6]</code> Elle a appartenu à un élève roux', 1, 'int'),
(31, 6, 'Bâton d\'apprenti', '<code>[1d6]</code> Une grande branche sertie d\'une pierre "précieuse"', 1, 'luk'),
(32, 6, 'Dagues improvisées', '<code>[1d4*2]</code> Des couteaux déguisés en dagues de voleur', 1, 'dex'),
(33, 6, 'Bouclier en bois', 'Ou plutôt un couvercle de tonneau...', 1, 'con');

-- --------------------------------------------------------

--
-- Structure de la table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `item_category`
--

TRUNCATE TABLE `item_category`;
--
-- Contenu de la table `item_category`
--

INSERT INTO `item_category` (`id`, `name`) VALUES
(1, 'Divers'),
(2, 'Consommables'),
(3, 'Artisanat'),
(4, 'Outils'),
(5, 'Quête'),
(6, 'Armes'),
(7, 'Armures');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `music` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `region`
--

TRUNCATE TABLE `region`;
--
-- Contenu de la table `region`
--

INSERT INTO `region` (`id`, `name`, `music`) VALUES
(1, 'Clairières de Tirisfal', 'https://www.youtube.com/watch?v=NoIIlbUpYtE'),
(2, 'Fossoyeuse', 'https://www.youtube.com/watch?v=VRND4YhN-lU');

-- --------------------------------------------------------

--
-- Structure de la table `region_bestiary`
--

DROP TABLE IF EXISTS `region_bestiary`;
CREATE TABLE `region_bestiary` (
  `region_id` int(11) NOT NULL,
  `bestiary_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `region_bestiary`
--

TRUNCATE TABLE `region_bestiary`;
--
-- Contenu de la table `region_bestiary`
--

INSERT INTO `region_bestiary` (`region_id`, `bestiary_id`, `weight`) VALUES
(1, 1, 50),
(1, 2, 100),
(1, 3, 50),
(1, 4, 30),
(1, 5, 100),
(1, 6, 50),
(1, 7, 30),
(1, 8, 100),
(1, 9, 50),
(1, 10, 0),
(1, 11, 0),
(1, 12, 0),
(1, 13, 0),
(1, 14, 0),
(1, 0, 500);

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `char_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `effect` varchar(256) NOT NULL,
  `worth` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vider la table avant d'insérer `skill`
--

TRUNCATE TABLE `skill`;
--
-- Contenu de la table `skill`
--

INSERT INTO `skill` (`skill_id`, `char_id`, `name`, `effect`, `worth`) VALUES
(1, 1, 'Soins légers', 'Soigne 2x le nombre de PM consommés', 'X PM'),
(2, 2, 'Intelligence des arcanes', 'Augmente les dégâts magique de 2 pour la durée du combat', '30 PM'),
(3, 2, 'Eclair de givre', 'Inflige 1D8+2 de dégàts de givre à la cible (15 si CRITIQUE)', '20 PM'),
(4, 1, 'Châtiment', 'Inflige 1D8+2 dégâts sacrés à la cible', '20 PM');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bestiary`
--
ALTER TABLE `bestiary`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`char_id`),
  ADD KEY `char_id` (`char_id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `item_category`
--
ALTER TABLE `item_category`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bestiary`
--
ALTER TABLE `bestiary`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `character`
--
ALTER TABLE `character`
  MODIFY `char_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
