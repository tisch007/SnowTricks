-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Octobre 2017 à 16:42
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'jump'),
(2, 'rotation');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateAjout` datetime NOT NULL,
  `tricks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `author`, `content`, `dateAjout`, `tricks_id`) VALUES
(1, 'toto', '1er commentaire', '2017-10-07 11:10:55', 1),
(2, 'titi', '2eme commentaire', '2017-10-07 11:10:55', 1),
(4, 'fhfth', 'fthfth', '2017-10-16 15:56:54', 5),
(5, 'hhhhhhh', 'hhhhhhhhhhh', '2017-10-16 15:56:59', 5),
(6, 'htfhfh', 'fthfth', '2017-10-17 16:42:21', 6),
(17, 'tisch', '3 eme commentaire', '2017-10-24 15:03:55', 1),
(18, 'tisch', '4 eme commentaire', '2017-10-24 15:04:10', 1),
(24, 'tisch', 'sdfsdfdsf', '2017-10-30 12:33:57', 6),
(25, 'tisch', 'drgdrgdrg', '2017-10-30 12:34:26', 6);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'tisch', 'tisch', 'cyrille.tischenbach@gmail.com', 'cyrille.tischenbach@gmail.com', 1, NULL, '$2y$13$ES.ZVnCLv.M6Mrg8MpZyqO0iRNe.MH3sVHKjvam/I537m9Am.Mx.G', '2017-10-30 12:49:24', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(2, 'bob', 'bob', 'bob@gmail.com', 'bob@gmail.com', 1, NULL, '$2y$13$RUqqmDy0oz3deAp/7TZkauEWWLA8rRuDctk2/Sf2U5tbgAa4pfYL.', NULL, NULL, NULL, 'a:0:{}'),
(3, 'toto', 'toto', 'toto@gmail.com', 'toto@gmail.com', 1, NULL, '$2y$13$6ssDYX0/L5zDrhUGHPcdQeoFt1sfzuY1gsj2ra7kHGf85pvetx4cm', '2017-10-19 15:44:18', NULL, NULL, 'a:0:{}'),
(4, 'lol', 'lol', 'lolo@gmail.com', 'lolo@gmail.com', 1, NULL, '$2y$13$nylw0FL9CYOB4zP8qZq9g.qzKDTqxYj56rrI.fS3bLAE/LtReH0DW', '2017-10-19 15:47:56', NULL, NULL, 'a:0:{}'),
(5, 'llii', 'llii', 'lllii@gmail.com', 'lllii@gmail.com', 1, NULL, '$2y$13$j5m5Pu870fQRoNjCenQGLefCd/PpMHTmtm.IHH2CFbMdi6E/wACZy', '2017-10-19 16:56:00', NULL, NULL, 'a:0:{}'),
(6, 'juju', 'juju', 'julie@gmail.com', 'julie@gmail.com', 1, NULL, '$2y$13$eWJEzQDf2EOxFbmdb6syyuG4NxbWpgbBW30TaaNwOv24I/Cgev/xe', '2017-10-21 14:58:11', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `tricks_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `tricks_id`, `image_name`, `updated_at`) VALUES
(10, 1, '59f8a2b93d771.jpg', '2017-10-31 16:20:09'),
(11, 1, '59f8a2b93e49a.jpg', '2017-10-31 16:20:09'),
(12, 2, '59f8a331f19a7.jpg', '2017-10-31 16:22:09'),
(13, 2, '59f8a331f270d.jpg', '2017-10-31 16:22:09'),
(14, 3, '59f8a38d39f50.jpg', '2017-10-31 16:23:41'),
(15, 3, '59f8a38d3ac85.jpg', '2017-10-31 16:23:41'),
(16, 5, '59f8a3ef555f6.jpg', '2017-10-31 16:25:19'),
(17, 5, '59f8a3ef56256.jpg', '2017-10-31 16:25:19'),
(18, 6, '59f8a432b40e3.jpg', '2017-10-31 16:26:26'),
(19, 6, '59f8a432b4fdc.jpg', '2017-10-31 16:26:26');

-- --------------------------------------------------------

--
-- Structure de la table `tricks`
--

CREATE TABLE `tricks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateAjout` datetime NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tricks`
--

INSERT INTO `tricks` (`id`, `title`, `content`, `author`, `dateAjout`, `category_id`) VALUES
(1, 'Backside Triple Cork 1440', 'En langage snowboard, un cork est une rotation horizontale plus ou moins désaxée, selon un mouvement d\'épaules effectué juste au moment du saut. Le tout premier Triple Cork a été plaqué par Mark McMorris en 2011, lequel a récidivé lors des Winter X Games 2012... avant de se faire voler la vedette par Torstein Horgmo, lors de ce même championnat. Le Norvégien réalisa son propre Backside Triple Cork 1440 et obtint la note parfaite de 50/50.', 'tisch', '2017-10-31 16:20:09', 1),
(2, 'Method Air', 'Cette figure – qui consiste à attraper sa planche d\'une main et le tourner perpendiculairement au sol – est un classique "old school". Il n\'empêche qu\'il est indémodable, avec de vrais ambassadeurs comme Jamie Lynn ou la star Terje Haakonsen. En 2007, ce dernier a même battu le record du monde du "air" le plus haut en s\'élevant à 9,8 mètres au-dessus du kick (sommet d\'un mur d\'une rampe ou autre structure de saut).', 'toto', '2017-10-31 16:22:09', 2),
(3, 'Double Backflip One Foot', 'Comme on peut le deviner, les "one foot" sont des figures réalisées avec un pied décroché de la fixation. Pendant le saut, le snowboarder doit tendre la jambe du côté dudit pied. L\'esthète Scotty Vine – une sorte de Danny MacAskill du snowboard – en a réalisé un bel exemple avec son Double Backflip One Foot.', 'bob', '2017-10-31 16:23:41', 2),
(5, 'Double Mc Twist 1260', 'Le Mc Twist est un flip (rotation verticale) agrémenté d\'une vrille. Un saut très périlleux réservé aux professionnels. Le champion précoce Shaun White s\'est illustré par un Double Mc Twist 1260 lors de sa session de Half-Pipe aux Jeux Olympiques de Vancouver en 2010. Nul doute que c\'est cette figure qui lui a valu de remporter la médaille d\'or.', 'bob', '2017-10-31 16:25:19', 1),
(6, 'Double Backside Rodeo 1080', 'À l\'instar du cork, le rodeo est une rotation désaxée, qui se reconnaît par son aspect vrillé. Un des plus beaux de l\'histoire est sans aucun doute le Double Backside Rodeo 1080 effectué pour la première fois en compétition par le jeune prodige Travis Rice, lors du Icer Air 2007. La pirouette est tellement culte qu\'elle a fini dans un jeu vidéo où Travis Rice est l\'un des personnages.', 'tisch', '2017-10-31 16:26:26', 1),
(50, 'dgdrgdgr', 'drgdrgrgfxfg', 'drgdrgdgr', '2017-10-30 15:16:03', 2),
(51, 'bvcfr', 'bcfbcfb', 'bcfbcf', '2017-10-30 17:47:21', 1),
(52, 'fesef', 'sefseff', 'sefserf', '2017-10-30 15:24:18', 1),
(54, 'fefesfs', 'sefsef', 'sefesf', '2017-10-30 15:38:38', 1),
(60, 'rgdg', 'drgdrg', 'drgdrgdrg', '2017-10-30 23:53:21', 1),
(61, 'grdg', 'drgdrgdrgngfn', 'drgdrg', '2017-10-30 23:55:59', 1),
(68, 'vcdxv', 'xdvdxv', 'xdvxdv', '2017-10-31 00:09:49', 1);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `tricks_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `tricks_id`, `link`, `name`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=Br6ZJM01I6s', 'Backside Triple Cork 1440'),
(3, 2, 'https://www.youtube.com/watch?v=2Ul5P-KucE8', 'Method Air'),
(4, 3, 'https://www.youtube.com/watch?v=HkBecIvzIAU', 'Double Backflip One Foot'),
(5, 5, 'https://www.youtube.com/watch?v=XATkSnCFsRU', 'Double Mc Twist 1260'),
(6, 6, 'https://www.youtube.com/watch?v=vquZvxGMJT0', 'Double Backside Rodeo 1080'),
(7, 1, 'https://www.youtube.com/watch?v=URFnYGzu9lU', 'Backside Triple Cork 1440'),
(8, 1, 'https://www.youtube.com/watch?v=Lh5-Gjh-y-M', 'Backside Triple Cork 1440'),
(34, 50, 'https://www.youtube.com/watch?v=iSHzE2CKSfM', 'dgdrgdgr'),
(37, 54, 'http://localhost/SnowTricks/web/app_dev.php/tricks/add', 'fefesfs'),
(50, 68, 'https://www.youtube.com/watch?v=hH0lezY7lZ4', 'vcdxv');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C3B153154` (`tricks_id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045F3B153154` (`tricks_id`);

--
-- Index pour la table `tricks`
--
ALTER TABLE `tricks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E1D902C12B36786B` (`title`),
  ADD KEY `IDX_E1D902C112469DE2` (`category_id`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2C3B153154` (`tricks_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `tricks`
--
ALTER TABLE `tricks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C3B153154` FOREIGN KEY (`tricks_id`) REFERENCES `tricks` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F3B153154` FOREIGN KEY (`tricks_id`) REFERENCES `tricks` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tricks`
--
ALTER TABLE `tricks`
  ADD CONSTRAINT `FK_E1D902C112469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2C3B153154` FOREIGN KEY (`tricks_id`) REFERENCES `tricks` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
