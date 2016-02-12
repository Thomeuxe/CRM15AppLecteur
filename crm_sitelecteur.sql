-- phpMyAdmin SQL Dump
-- version 4.4.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Février 2016 à 23:28
-- Version du serveur :  5.6.24
-- Version de PHP :  5.5.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `crm_sitelecteur`
--

-- --------------------------------------------------------

--
-- Structure de la table `Booking`
--

CREATE TABLE IF NOT EXISTS `Booking` (
  `id` bigint(20) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `review_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Booking`
--

INSERT INTO `Booking` (`id`, `startDate`, `endDate`, `valid`, `review_id`) VALUES
(1, '2016-01-06', '2016-01-09', 1, 1),
(2, '2016-01-29', '2016-01-31', 1, 3),
(3, '2016-03-03', '2016-03-10', 1, 4),
(4, '2016-02-01', '2016-02-05', 1, 5),
(5, '2016-09-09', '2016-09-17', 0, 3),
(6, '2017-05-10', '2017-05-13', 0, 5),
(7, '2016-03-10', '2016-04-14', 0, 2),
(8, '2016-03-10', '2016-04-14', 0, 2),
(9, '2016-03-10', '2016-04-14', 0, 2),
(10, '2016-02-12', '2016-04-22', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Critic`
--

CREATE TABLE IF NOT EXISTS `Critic` (
  `id` bigint(20) NOT NULL,
  `score` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `review_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Critic`
--

INSERT INTO `Critic` (`id`, `score`, `content`, `review_id`, `user_id`) VALUES
(5, 4, 'Phasellus tempus. Aenean massa. Curabitur at lacus ac velit ornare lobortis. Curabitur suscipit suscipit tellus. Sed cursus turpis vitae tortor.\r\n\r\nDonec vitae orci sed dolor rutrum auctor. Curabitur at lacus ac velit ornare lobortis. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam vel sem. Vivamus consectetuer hendrerit lacus.\r\n\r\nPellentesque ut neque. Nullam vel sem. Phasellus dolor. Cras dapibus. Cras varius.', 1, 1),
(6, 2, 'Phasellus dolor. Etiam ut purus mattis mauris sodales aliquam. Quisque malesuada placerat nisl. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Cras sagittis.', 1, 1),
(7, 1, 'Un tiens vaut mieux que deux tuloras', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Review`
--

CREATE TABLE IF NOT EXISTS `Review` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Review`
--

INSERT INTO `Review` (`id`, `user_id`, `title`, `synopsis`, `updated_at`, `image_name`) VALUES
(1, 2, 'Ma première fiche', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut semper metus. Maecenas cursus nisi vitae bibendum tincidunt. Quisque et odio ornare nisl vestibulum tristique. Aenean consequat tempus maximus. Phasellus pharetra massa eget cursus posuere. Phasellus sit amet hendrerit mi, id sagittis ex. Etiam sagittis urna velit. Mauris posuere urna eros, et varius justo rhoncus scelerisque. Mauris rutrum congue metus, ut semper dolor egestas vitae. Sed sagittis lacus eu sem facilisis dignissim. Praesent ultricies dapibus sapien, quis feugiat tortor pellentesque sed. Suspendisse quis sem id odio fringilla finibus et at nisi.\r\n\r\nAenean eu pulvinar dolor, at ullamcorper augue. Suspendisse a iaculis nunc, quis dapibus sem. Vivamus id feugiat ante, eget aliquam nibh. Mauris fermentum ornare massa, ac commodo dolor. Aenean fringilla, orci eget ullamcorper laoreet, diam massa luctus justo, ut rutrum libero nisl ac neque. Maecenas at lorem justo. Donec dui massa, tincidunt vitae diam nec, semper faucibus risus. Aliquam pulvinar cursus ipsum, et laoreet urna varius non. Proin libero massa, consequat eget quam quis, volutpat suscipit lorem. Quisque mi urna, laoreet sit amet consectetur eget, blandit a diam. Mauris iaculis tellus eu sem vehicula vestibulum. Pellentesque urna magna, blandit et nisl quis, ullamcorper dapibus augue. Suspendisse potenti. Morbi nec mauris ac leo malesuada eleifend. Nunc rutrum viverra pulvinar.\r\n\r\nDonec semper sed ligula id mattis. Maecenas eget consectetur mauris. Etiam nec convallis augue. Aenean lectus augue, maximus vel venenatis at, aliquet at turpis. Morbi malesuada lorem sit amet tincidunt lobortis. Donec eget nulla non ligula vestibulum faucibus. Pellentesque accumsan massa nec aliquam ultricies. Aenean blandit sollicitudin nibh. Donec pharetra eros felis, id elementum tellus consectetur et. Aenean sagittis mattis fringilla. Cras urna neque, dictum ac nulla in, dapibus ornare metus. Etiam accumsan gravida eleifend.\r\n\r\nAliquam ultricies magna nec suscipit venenatis. In sagittis finibus massa, in consequat dui imperdiet sed. Fusce blandit leo id elit tincidunt, a malesuada lorem ultrices. Cras venenatis scelerisque velit, ut aliquet nunc consectetur at. Curabitur tempus tincidunt enim, et interdum nisl maximus eu. In dictum lacus tempus tortor rhoncus, eu pharetra leo vulputate. Phasellus et diam mi. Nullam vel elit eget ligula sagittis mollis. Nulla sodales lobortis tellus ac fermentum. Cras egestas suscipit enim, nec maximus mi facilisis non.\r\n\r\nMorbi nunc ex, tincidunt interdum massa id, cursus ornare felis. In varius id metus sit amet dignissim. Suspendisse quis augue id turpis mollis congue. Phasellus pharetra sed dolor ac auctor. Praesent accumsan fermentum laoreet. Nulla facilisi. Donec dictum dapibus ornare. Nullam vitae tellus semper, luctus ex ut, scelerisque nunc. Vestibulum sit amet feugiat neque, at iaculis erat. Donec eu ipsum vel nulla ullamcorper tincidunt. Sed eu sodales ipsum.', '2016-02-09 00:00:00', ''),
(2, 1, 'Ma 2ème fiche', 'Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. In hac habitasse platea dictumst. Aliquam lobortis. Praesent egestas neque eu enim. Donec id justo.\r\n\r\nSuspendisse non nisl sit amet velit hendrerit rutrum. Sed mollis, eros et ultrices tempus, mauris ipsum aliquam libero, non adipiscing dolor urna a orci. Sed cursus turpis vitae tortor. Maecenas egestas arcu quis ligula mattis placerat. Suspendisse non nisl sit amet velit hendrerit rutrum.\r\n\r\nInteger ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Fusce fermentum odio nec arcu. Curabitur at lacus ac velit ornare lobortis. Nulla consequat massa quis enim. Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula, eget egestas libero turpis vel mi.', '2016-02-26 00:00:00', ''),
(3, 1, 'Après Lecture de "Tabouret, LA solution ?"', 'In ac felis quis tortor malesuada pretium. Suspendisse potenti. Pellentesque posuere. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. Vestibulum fringilla pede sit amet augue.\r\n\r\nCras varius. Morbi ac felis. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Quisque malesuada placerat nisl. Sed augue ipsum, egestas nec, vestibulum et, malesuada adipiscing, dui.\r\n\r\nPraesent nec nisl a purus blandit viverra. Fusce fermentum. Morbi nec metus. Fusce pharetra convallis urna. Praesent nec nisl a purus blandit viverra.\r\n\r\nUt a nisl id ante tempus hendrerit. Aenean commodo ligula eget dolor. Morbi nec metus. Praesent ac sem eget est egestas volutpat. Vivamus laoreet.\r\n\r\nPhasellus nec sem in justo pellentesque facilisis. Etiam sit amet orci eget eros faucibus tincidunt. Cras ultricies mi eu turpis hendrerit fringilla. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi.', '2016-02-19 00:00:00', ''),
(4, 1, 'Mes impressions après "La belle vue du belvédère"', 'Aliquam eu nunc. Praesent nec nisl a purus blandit viverra. Suspendisse eu ligula. Nullam accumsan lorem in dui.\r\n\r\nUt leo. Proin faucibus arcu quis ante. Aenean viverra rhoncus pede. Donec venenatis vulputate lorem. Praesent nec nisl a purus blandit viverra. Vivamus in erat ut urna cursus vestibulum. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Vestibulum ullamcorper mauris at ligula.\r\n\r\nNunc sed turpis. Pellentesque dapibus hendrerit tortor. Nullam vel sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras id dui. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Aliquam eu nunc. Vestibulum dapibus nunc ac augue. Morbi vestibulum volutpat enim. Quisque malesuada placerat nisl.', '2016-02-22 00:00:00', ''),
(5, 1, 'Bonjour test', 'In hac habitasse platea dictumst. Fusce pharetra convallis urna. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Praesent ut ligula non mi varius sagittis. Nulla facilisi.\r\n\r\nCurabitur nisi. Proin faucibus arcu quis ante. Pellentesque dapibus hendrerit tortor. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Ut a nisl id ante tempus hendrerit.\r\n\r\nProin faucibus arcu quis ante. Nulla consequat massa quis enim. Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi. Maecenas nec odio et ante tincidunt tempus. Fusce a quam.\r\n\r\nIn enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Etiam ut purus mattis mauris sodales aliquam. Curabitur turpis. Etiam sollicitudin, ipsum eu pulvinar rutrum, tellus ipsum laoreet sapien, quis venenatis ante odio sit amet eros.', '2016-02-20 00:00:00', ''),
(6, 1, 'Le mega test', 'Nullam quis ante. Nam commodo suscipit quam. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Fusce vulputate eleifend sapien. Integer tincidunt.\r\n\r\nAenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Mauris sollicitudin fermentum libero. Fusce a quam. Ut varius tincidunt libero. Praesent ut ligula non mi varius sagittis.\r\n\r\nPhasellus volutpat, metus eget egestas mollis, lacus lacus blandit dui, id egestas quam mauris ut lacus. Morbi ac felis. Aliquam eu nunc. Vivamus elementum semper nisi. Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi.\r\n\r\nVestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Vivamus consectetuer hendrerit lacus. Mauris sollicitudin fermentum libero. Nullam dictum felis eu pede mollis pretium. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nSed hendrerit. Nullam cursus lacinia erat. Praesent congue erat at massa. Praesent egestas tristique nibh. Aenean vulputate eleifend tellus.', '2016-02-12 00:06:55', 'cepakon-3-cache-photo-distributeur-livres.png'),
(7, 2, 'Le japon, le JA-PONT', 'Etiam sollicitudin, ipsum eu pulvinar rutrum, tellus ipsum laoreet sapien, quis venenatis ante odio sit amet eros. Fusce egestas elit eget lorem. Vivamus in erat ut urna cursus vestibulum. Ut varius tincidunt libero. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor.\r\n\r\nDonec mollis hendrerit risus. Etiam ultricies nisi vel augue. Aenean massa. Praesent venenatis metus at tortor pulvinar varius. Donec vitae orci sed dolor rutrum auctor.\r\n\r\nPhasellus ullamcorper ipsum rutrum nunc. Aenean vulputate eleifend tellus. Donec posuere vulputate arcu. Suspendisse non nisl sit amet velit hendrerit rutrum. Sed fringilla mauris sit amet nibh.\r\n\r\nEtiam feugiat lorem non metus. Morbi vestibulum volutpat enim. Proin pretium, leo ac pellentesque mollis, felis nunc ultrices eros, sed gravida augue augue mollis justo. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam accumsan lorem in dui.\r\n\r\nDonec posuere vulputate arcu. Donec vitae sapien ut libero venenatis faucibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis vel nibh at velit scelerisque suscipit. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc.', '2016-02-12 17:26:34', 'ecologie.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'thomeuxe', 'thomeuxe', 'thomeuxe@gmail.com', 'thomeuxe@gmail.com', 1, 'nyvu383a6iskcskgocw0sc88wsosg4o', '$2y$13$.3LZlrVPvSU1TVeHqclfQezQFOjd2E416GjxRokiaCXxFMpN6vDYy', '2016-02-11 21:37:37', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_EDITOR";}', 0, NULL),
(2, 'admin', 'admin', 'admin@applecteur.com', 'admin@applecteur.com', 1, '5xqaef6oukg0g4g40cw8cwksgooossg', '$2y$13$uC4AaRlfXaXGDUKQfy3P0erfB/1ZqQjgDlgAuYCN1IQdXdeS.aXMq', '2016-02-12 19:03:51', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL),
(3, 'Didier', 'didier', 'didier_74@hotmail.fr', 'didier_74@hotmail.fr', 1, 'g7j6xblrgu80ssog8wwckgwg8wcs40c', 'azerty', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_EDITOR";}', 0, NULL),
(4, 'editor', 'editor', 'editor@applecteur.com', 'editor@applecteur.com', 1, 'hcegspeky3kg4g04skk4sgg44swo4c', '$2y$13$NqqubWoo/Cmcpo/v4rhpzOE7vtAdTQh.ekYwrPVC8M3bj.tYRFKzO', '2016-02-12 19:00:41', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_EDITOR";}', 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2FB1D4423E2E969B` (`review_id`);

--
-- Index pour la table `Critic`
--
ALTER TABLE `Critic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CE4EF2C73E2E969B` (`review_id`),
  ADD KEY `IDX_CE4EF2C7A76ED395` (`user_id`);

--
-- Index pour la table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7EEF84F0A76ED395` (`user_id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `Critic`
--
ALTER TABLE `Critic`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Review`
--
ALTER TABLE `Review`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `FK_2FB1D4423E2E969B` FOREIGN KEY (`review_id`) REFERENCES `Review` (`id`);

--
-- Contraintes pour la table `Critic`
--
ALTER TABLE `Critic`
  ADD CONSTRAINT `FK_CE4EF2C73E2E969B` FOREIGN KEY (`review_id`) REFERENCES `Review` (`id`),
  ADD CONSTRAINT `FK_CE4EF2C7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `FK_7EEF84F0A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
