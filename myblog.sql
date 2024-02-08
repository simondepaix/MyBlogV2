-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 08 fév. 2024 à 10:35
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'faune et flore'),
(2, 'nature'),
(3, 'rivière');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL,
  `img` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `date`, `content`, `img`, `user_id`) VALUES
(37, 'Les meilleurs endroits à visiter en été', '2023-07-29', 'L\'été est la saison parfaite pour explorer de nouvelles destinations. Découvrez les meilleurs endroits à visiter pour des vacances inoubliables.', 'about-bg.jpg', 1),
(38, 'Recette délicieuse de tarte aux pommes', '2023-07-28', 'Dégustez notre recette de tarte aux pommes maison, avec une croûte croustillante et une garniture aux pommes fraîches.', 'about-bg.jpg', 1),
(39, 'Conseils pour rester en forme et en bonne santé', '2023-07-27', 'Découvrez nos astuces pour maintenir un mode de vie actif et sain, que ce soit à la maison ou au bureau.', 'about-bg.jpg', 1),
(40, 'Les tendances de la mode pour cet automne', '2023-07-26', 'Préparez votre garde-robe pour la saison automnale avec les dernières tendances de la mode et les couleurs à la mode.', 'about-bg.jpg', 1),
(41, 'Critique de film : \"Voyage interstellaire\"', '2023-07-25', 'Plongez dans l\'univers captivant de \"Voyage interstellaire\", le dernier film de science-fiction qui captive les cinéphiles du monde entier.', 'about-bg.jpg', 1),
(42, 'Guide d\'achat des smartphones 2023', '2023-07-24', 'Nous avons passé en revue les derniers smartphones du marché pour vous aider à choisir le modèle qui correspond le mieux à vos besoins.', 'about-bg.jpg', 1),
(43, 'Les bienfaits du yoga sur la santé mentale', '2023-07-23', 'Découvrez comment la pratique régulière du yoga peut améliorer votre bien-être mental et réduire le stress.', 'about-bg.jpg', 1),
(44, 'Interview exclusive avec une star du cinéma', '2023-07-22', 'Plongez dans les coulisses du dernier film à succès avec notre interview exclusive de l\'acteur principal.', 'about-bg.jpg', 1),
(45, 'Comment créer un jardin biologique chez vous', '2023-07-21', 'Suivez nos conseils pratiques pour démarrer votre propre jardin biologique et cultiver des légumes sains.', 'about-bg.jpg', 1),
(46, 'Découverte archéologique fascinante', '2023-07-20', 'Des archéologues ont récemment mis au jour une ancienne cité perdue qui pourrait réécrire l\'histoire de notre civilisation.', 'about-bg.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `post_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts_categories`
--

INSERT INTO `posts_categories` (`post_id`, `categorie_id`) VALUES
(1, 3),
(1, 2),
(3, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', 'zofjzoiejgoié\"irjçtàfj\"àeç', 1),
(75, 'jean', 'jean@gmail.com', '$2y$10$Mbt2kntbTk5Bu7eqFJTPHOrimeBkOCUDMMwM9tqcfyOSZIjiDOdnK', 3),
(76, 'test', 'test@gmail.com', '$2y$10$gHNbKrmB..R4/4vbHWYsFu63N34M2PlGDYG7lEjocixXzNM4vzyqq', 1),
(77, 'pierre', 'pierre@gmail.com', '$2y$10$Gp/QFF2BkTC/AYrAlBoLFOeHNbWKiPIl/PwHdT3tLqpzNeOo6pQs.', 3),
(78, 'Jane', 'jane@mail.com', '$2y$10$/wT578tGCP7PqTG5jeLB4ejPBPLW5EedxLWwGyieedIspv0lvsiRe', 3),
(79, 'fpozofkopz', 'pzeokfpzeokf@gmail.com', '$2y$10$rFPu4sOteRbWqrALbMDQV.pyEdkpwYcDEKOYNrsjzplSOkGMK23j6', 3),
(80, 'test3', 'test3@mail.com', '$2y$10$jRh5tSD/EGGdmIHcbLUam.fkg0LjNk3r1JoP99ENGAd3FDTzr4zqO', 3),
(81, 'test12345', 'test1242352@gmail.com', '$2y$10$RwZ5tpz0t8Oy3tBd1i349.sZzlOuR0Dkzv89SlQ.xPgBDfAHTadCa', 1),
(82, 'test123456', 'test123456@mail.com', '$2y$10$O7giP4XS3RdO/kzfsWKA5eyxN.mGMhN2ZfygV0NOuazVXuKmcALoi', 1),
(83, 'test', 'test123456@gmail.com', '$2y$10$E9wEuO7WziCR/FQhU41lo.0H0XgCWiA8LcAEjN7UXUKzY6ZGcNQGO', 1),
(84, 'zefpoez', 'zepogk@gmail.com', '$2y$10$sgxDJOHEjZ4OKYDu9xftduXIOUn.rP8zBM/jxTbLeQUk4qA8yjjw6', 3),
(85, 'test', 'test12345678@mail.com', '$2y$10$kQ3bAAS2khf9SJq1nYe5Suy4yGTG5Ub5gw3t/s0K9qO6NX6W.Z11a', 3),
(86, 'test123456889@mail.com', 'test123456889@mail.com', '$2y$10$7oS0R1G7dX15bDpbKYiPYOaeSpdZzIxUOYRKC9vZorkYEb5UwIwp6', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD KEY `categories_id` (`categorie_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD CONSTRAINT `categories_id` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
