-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 02 Avril 2018 à 20:44
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Projets_mvc_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `body`, `created`, `modified`) VALUES
(6, 3, 'modified?', 'ewfwf', '2018-03-28 07:41:07', NULL),
(7, 3, 'wqdqwd', 'wqdqwdewfwfewf', '2018-03-28 09:45:08', '2018-03-28 09:45:35'),
(8, 3, 'wqdq', 'qwdqwdq', '2018-03-28 12:06:36', '2018-03-28 12:06:36'),
(9, 3, 'quel heure est il?', 'Europe/Paris', '2018-03-29 12:38:27', '2018-03-29 12:38:27'),
(10, 3, 'test', '<p><strong>ewffwewef</strong></p>', '2018-03-30 14:11:50', '2018-03-30 14:11:50'),
(11, 3, 'est', '<p>&lt;?php echo ttest ?&gt;</p>', '2018-03-30 14:17:38', '2018-03-30 14:17:38'),
(12, 3, 'ceci est un test', '<p>&lt;script&gt;alert(\'cobra\');&lt;/script&gt;</p>', '2018-03-30 14:20:10', '2018-03-30 14:20:10'),
(13, 3, 'oiseau', '<p style="text-align: center;"><strong>ewefwef</strong></p>', '2018-03-30 14:21:28', '2018-03-30 14:21:28'),
(14, 3, 'wefwfewf', '<p>wefewfwf</p>', '2018-03-30 15:42:57', '2018-03-30 15:42:57'),
(15, 3, 'wefwf', '', '2018-03-30 16:04:18', '2018-03-30 16:04:18'),
(16, 3, 'Test', '<p>odejwefjwfojwofowej</p>', '2018-03-30 17:48:36', '2018-03-30 17:48:36'),
(17, 3, 'second article', '', '2018-03-30 18:10:24', '2018-03-30 18:10:24'),
(18, 3, 'panda', '', '2018-03-30 18:20:45', '2018-03-30 18:20:45'),
(19, 3, 'test du truncate', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww truncated', '2018-04-01 04:11:03', '2018-04-01 04:11:03'),
(20, 5, 'Test d\'injection html', '<p><strong>&lt;?php echo "youpi ca marche"; ?&gt;</strong></p>', '2018-04-02 18:47:07', '2018-04-02 18:56:11');

-- --------------------------------------------------------

--
-- Structure de la table `articles_tags`
--

CREATE TABLE `articles_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles_tags`
--

INSERT INTO `articles_tags` (`article_id`, `tag_id`) VALUES
(8, 2),
(8, 3),
(10, 3),
(12, 3),
(13, 3),
(16, 4),
(17, 4),
(20, 4),
(18, 5);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `user_id`, `article_id`, `body`, `published`, `created`, `modified`) VALUES
(1, 2, 7, 'ewfwefwef', 0, '2018-03-28 11:13:07', '2018-03-28 11:13:07'),
(2, 3, 6, 'test', 0, '2018-03-28 11:41:23', '2018-03-28 11:41:23'),
(3, 3, 6, 'efwewf', 0, '2018-03-28 14:11:12', '2018-03-28 14:11:12'),
(4, 3, 6, 'ewefwfe', 0, '2018-03-28 14:12:33', '2018-03-28 14:12:33'),
(5, 3, 6, 'efwef', 0, '2018-03-28 14:14:35', '2018-03-28 14:14:35'),
(6, 3, 7, 'test', 0, '2018-03-28 14:27:17', '2018-03-28 14:27:17'),
(7, 3, 7, 'testodon', 0, '2018-03-28 14:52:41', '2018-03-28 14:52:41'),
(8, 3, 8, 'est', 0, '2018-03-28 15:56:41', '2018-03-28 15:56:41'),
(9, 3, 7, 'test', 0, '2018-03-29 10:32:39', '2018-03-29 10:32:39'),
(10, 3, 7, 'test', 0, '2018-03-29 12:50:14', '2018-03-29 12:50:14'),
(11, 3, 7, 're', 0, '2018-03-29 12:50:40', '2018-03-29 12:50:40'),
(12, 3, 7, 'efwf', 0, '2018-03-29 12:50:49', '2018-03-29 12:50:49'),
(13, 3, 7, 'test', 0, '2018-03-30 16:10:14', '2018-03-30 16:10:14'),
(14, 3, 7, '<p>wdqwdqw</p>', 0, '2018-03-30 16:10:34', '2018-03-30 16:10:34'),
(15, 3, 7, '<p>est ce que ca marche?</p>', 0, '2018-03-30 16:10:46', '2018-03-30 16:10:46'),
(16, 3, 7, '<p>fwefwf</p>', 0, '2018-03-30 16:11:07', '2018-03-30 16:11:07'),
(17, 3, 7, 'ca marche', 0, '2018-03-30 16:11:51', '2018-03-30 16:11:51'),
(18, 3, 7, 'test', 0, '2018-04-02 20:32:20', '2018-04-02 20:32:20'),
(19, 6, 6, 'puis je?', 0, '2018-04-02 20:36:45', '2018-04-02 20:36:45');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(2, 'wefwefwf', '2018-03-28 07:04:34', '2018-03-28 07:04:34'),
(3, 'test', '2018-03-28 07:04:37', '2018-03-28 07:04:37'),
(4, 'nicolas', '2018-03-30 17:48:05', '2018-03-30 17:48:05'),
(5, 'ewf', '2018-03-30 18:20:31', '2018-03-30 18:20:31');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'Commentateur',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `birthdate`, `password`, `name`, `lastname`, `role`, `created`, `modified`) VALUES
(2, 'oiseau', 'oiseau@oiseau.com', '2018-03-28', '$2y$10$NhuKEx3ZTPaKRgt5HuiV7.wV5WcsHmII4Oedmw4zeEExtm3e5y1na', 'oiseau', 'oiseau', 'Banned', '2018-03-28 07:02:50', '2018-03-30 11:52:03'),
(3, 'test', 'test@test.com', '2018-03-28', '$2y$10$nQeLtItwEmWbuSICOdgG9eJysLOqTP5yCbqoRYQxoz9bla2X9GJg2', 'test', 'test', 'Admin', '2018-03-28 07:03:47', '2018-03-28 07:03:47'),
(4, 'oiseautron', 'oiseautron@google.com', '2018-03-28', '$2y$10$tBE/ECemW3YdiquwA1ZAcesBduO2GHMK0g2cYzCIiUJNcVS9m0Une', 'oiseautron', 'oiseautron', 'Visiteur', '2018-03-28 10:28:44', '2018-03-28 10:28:44'),
(5, 'blogueur', 'blogueur@blog.com', '2018-03-30', '$2y$10$3W9TSsRbvcgRumVTb1BF3eV9xhaGhCC6nRC7N.0AHEHCnmeq4mmj6', 'blogueur', 'blogueur', 'Blogueur', '2018-03-30 11:12:12', '2018-03-30 11:12:12'),
(6, 'Commentateure', 'Commentateur@tateur.com', '2018-04-02', '$2y$10$DeNSHyxwFqveyNRD7DGfsO00cIoth219PJ5eFBTcwbgdumMxw.b6K', 'commentateur', 'commentateur', 'Commentateur', '2018-04-02 20:35:04', '2018-04-02 20:44:22');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_key` (`user_id`);

--
-- Index pour la table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `articles_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `articles_tags_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
