-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 01 nov. 2022 à 16:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rentroom`
--

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `room_id`, `comment`, `score`, `created_at`) VALUES
(1, 5, 2, 'Proin vel nisl. Quisque fringilla euismod enim. Etiam', 7, '2015-09-23 17:17:50'),
(2, 2, 7, 'iaculis quis,  pede. Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes,  nascetur', 7, '2015-10-29 06:42:42'),
(3, 5, 2, 'bibendum fermentum metus. Aenean sed pede nec ante blandit viverra. Donec tempus,  lorem fringilla ornare placerat,  orci', 6, '2015-05-06 22:30:44'),
(5, 3, 1, 'ut,  pharetra sed,  hendrerit a,  arcu. Sed et libero. Proin', 5, '2015-05-05 10:39:54'),
(7, 3, 7, 'mauris ipsum porta elit,  a feugiat tellus lorem eu metus. In lorem. Donec', 8, '2015-04-10 02:44:25'),
(8, 2, 1, 'eu erat semper rutrum. Fusce dolor quam,  elementum at,  egestas a,  scelerisque sed,  sapien. Nunc pulvinar arcu et pede. Nunc', 4, '2015-07-20 07:33:59'),
(9, 6, 7, 'tincidunt,  neque vitae semper egestas, ', 8, '2015-03-11 23:10:02'),
(10, 6, 6, 'purus ac tellus. Suspendisse sed dolor. Fusce mi lorem,  vehicula', 8, '2015-09-30 01:49:55'),
(12, 5, 6, 'tincidunt dui augue eu tellus. Phasellus elit pede,  malesuada', 2, '2015-07-20 07:04:23'),
(13, 4, 5, 'eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec', 9, '2015-10-27 21:00:27'),
(14, 4, 5, 'facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio.', 5, '2015-12-03 02:08:12'),
(15, 6, 9, 'tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra', 8, '2015-05-02 15:03:42'),
(16, 2, 3, 'ipsum dolor sit amet,  consectetuer adipiscing elit. Aliquam auctor,  velit eget laoreet', 7, '2015-08-23 16:15:54'),
(17, 2, 1, 'Cras convallis convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper', 10, '2015-11-07 22:33:24'),
(21, 5, 10, 'Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra,  per inceptos hymenaeos.', 2, '2015-08-28 20:32:11'),
(22, 6, 1, 'est,  congue a,  aliquet vel,  vulputate eu,  odio. Phasellus at augue id ante', 9, '2015-12-03 01:23:07'),
(23, 2, 1, 'sit amet,  faucibus ut,  nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor', 8, '2015-11-15 06:45:04'),
(24, 3, 6, 'placerat velit. Quisque varius. Nam porttitor scelerisque', 7, '2015-04-30 08:51:09'),
(25, 6, 4, 'semper pretium neque. Morbi quis urna. Nunc', 2, '2016-02-12 14:07:06'),
(26, 5, 8, 'pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui,  semper et,  lacinia', 4, '2016-01-19 19:44:50'),
(27, 2, 5, 'nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem,  vehicula et,  rutrum eu,  ultrices sit amet, ', 3, '2015-07-29 23:04:42'),
(31, 6, 1, 'primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue.', 6, '2015-04-06 02:08:11'),
(32, 6, 10, 'felis. Donec tempor,  est ac mattis semper,  dui', 5, '2015-07-24 07:48:47'),
(39, 2, 10, 'arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui,  semper', 5, '2015-08-30 03:37:54'),
(40, 4, 8, 'Donec consectetuer mauris id sapien. Cras', 4, '2015-06-02 01:30:23'),
(41, 3, 5, 'Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam', 9, '2016-01-28 11:29:20'),
(42, 6, 8, 'Aliquam nec enim. Nunc ut erat. Sed nunc est,  mollis non,  cursus non,  egestas a,  dui. Cras pellentesque.', 10, '2015-07-12 20:46:42'),
(43, 6, 4, 'eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis.', 7, '2015-08-08 16:31:32'),
(45, 5, 6, 'tristique pellentesque,  tellus sem mollis dui,  in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis.', 2, '2015-04-02 00:07:45'),
(46, 4, 7, 'pretium et,  rutrum non,  hendrerit', 4, '2015-07-29 02:37:38'),
(48, 4, 7, 'Vivamus euismod urna. Nullam lobortis quam', 1, '2015-07-21 05:46:43'),
(49, 6, 4, 'ac mattis semper,  dui lectus rutrum', 6, '2015-03-13 04:33:07'),
(51, 5, 2, 'cursus. Nunc mauris elit,  dictum eu,  eleifend nec,  malesuada ut,  sem.', 5, '2015-07-15 00:38:02'),
(52, 4, 8, 'eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat.', 1, '2015-10-12 14:00:44'),
(56, 5, 2, 'consectetuer,  cursus et,  magna. Praesent interdum ligula eu enim. Etiam imperdiet', 8, '2015-09-14 00:14:37'),
(58, 4, 7, 'erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue,  elit', 10, '2015-07-23 07:08:20'),
(63, 2, 4, 'mattis. Integer eu lacus. Quisque imperdiet,  erat nonummy', 5, '2015-05-10 20:55:28'),
(64, 4, 3, 'accumsan neque et nunc. Quisque ornare tortor at risus. Nunc', 8, '2015-09-07 02:20:17'),
(66, 6, 7, 'vitae,  sodales at,  velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem', 7, '2015-12-23 12:19:59'),
(68, 6, 4, 'eget nisi dictum augue malesuada malesuada. Integer id magna et', 3, '2016-01-06 16:55:07'),
(71, 5, 8, 'scelerisque neque sed sem egestas blandit. Nam nulla magna, ', 8, '2015-09-07 04:54:52'),
(72, 5, 7, 'arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien,  gravida non,  sollicitudin a,  malesuada id,  erat. Etiam vestibulum massa rutrum', 4, '2015-07-17 13:41:40'),
(73, 2, 1, 'vitae purus gravida sagittis. Duis gravida.', 10, '2015-10-21 13:23:14'),
(74, 6, 6, 'in faucibus orci luctus et', 1, '2015-10-17 07:29:00'),
(77, 6, 10, 'vitae erat vel pede blandit congue. In scelerisque scelerisque dui.', 2, '2015-08-30 20:05:00'),
(80, 3, 1, 'tincidunt tempus risus. Donec egestas. Duis ac arcu. Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing. Mauris molestie pharetra', 10, '2015-08-27 12:50:10'),
(83, 6, 8, 'elit,  dictum eu,  eleifend nec,  malesuada ut,  sem. Nulla interdum. Curabitur dictum.', 7, '2015-08-25 06:26:21'),
(84, 3, 10, 'mi pede,  nonummy ut,  molestie in,  tempus eu,  ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed', 8, '2015-05-04 11:16:29'),
(85, 3, 7, 'lectus,  a sollicitudin orci sem eget massa. Suspendisse', 7, '2016-01-13 23:56:55'),
(86, 3, 7, 'mi pede,  nonummy ut,  molestie in,  tempus eu, ', 8, '2015-12-01 14:11:02'),
(88, 3, 1, 'enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, ', 10, '2015-06-15 09:25:37'),
(89, 6, 8, 'libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada', 9, '2016-02-21 09:47:12'),
(93, 2, 3, 'Praesent eu dui. Cum sociis natoque penatibus et magnis dis parturient montes,  nascetur ridiculus mus.', 1, '2015-07-28 06:11:02'),
(97, 6, 6, 'nulla ante,  iaculis nec,  eleifend non,  dapibus rutrum,  justo.', 9, '2015-08-26 07:55:57'),
(99, 3, 9, 'nisl sem,  consequat nec,  mollis vitae,  posuere at,  velit. Cras lorem lorem,  luctus ut,  pellentesque eget,  dictum', 6, '2015-04-07 23:55:40'),
(100, 4, 9, 'Duis elementum,  dui quis accumsan convallis,  ante lectus convallis est, ', 3, '2015-11-11 18:15:03'),
(148, 37, 9, 'I love this room', 8, '2022-10-30 21:04:41'),
(146, 36, 8, 'j&#039;adore cette salle!', 10, '2022-10-30 14:25:33'),
(147, 37, 9, 'c&#039;est trop bien ', 10, '2022-10-30 20:59:35'),
(144, 36, 1, 'J&#039;adore le burreau rolland', 10, '2022-10-28 23:32:40'),
(143, 36, 9, 'trop bien ', 10, '2022-10-28 18:21:37'),
(142, 36, 9, 'j&#039;adore cette room', 8, '2022-10-28 18:20:51'),
(149, 39, 9, 'cool', 7, '2022-10-31 13:53:40'),
(150, 37, 8, 'j&#039;adore trop bien', 9, '2022-10-31 21:37:55'),
(151, 36, 9, 'test', 8, '2022-11-01 16:33:12'),
(152, 37, 5, 'trop bien', 8, '2022-11-01 16:40:56');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `slot_id` (`slot_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `slot_id`, `created_at`) VALUES
(12, 37, 36, '2022-10-30 23:17:18'),
(13, 37, 21, '2022-10-30 23:17:25'),
(20, 37, 58, '2022-11-01 16:56:34');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip_code` varchar(15) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `category` enum('reunion','bureau','formation','coworking') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id`, `name`, `description`, `picture_url`, `country`, `city`, `address`, `zip_code`, `capacity`, `category`) VALUES
(1, 'Bureau Rolland', 'Gotham\'s been good to our family, but the city\'s been suffering. People less fortunate than us have been enduring very hard times. So we built a new, cheap, public transportation system to unite the city. And at the center, Wayne tower.', 'assets/001_salle_rolland.jpg', 'France', 'Paris', '100 Avenue des Champs Elysées', '75008', 50, 'reunion'),
(2, 'Salle Lefebvre', 'Death does not wait for you to be ready! Death is not considerate of fair! And make no mistake, here you face death. Tiger. Jujitsu. Panther. You\'re skilled. But this is not a dance. And you are afraid. But not of me. Tell us Mr. Wayne, what do you fear?', 'assets/002_salle_lefebvre.jpg', 'France', 'Paris', '30 Boulevard de Sébastopol', '75001', 20, 'bureau'),
(3, 'Salle Bouvier', 'I had a vision of a world without Batman. The Mob ground out a little profit and the police tried to shut them down one block at a time.', 'assets/003_salle_bouvier.jpg', 'France', 'Paris', '25 Avenue Foch', '75116', 100, 'formation'),
(4, 'Bureau Renault', 'And it was so boring. I\'ve had a change of heart. I don\'t want Mr Reese spoiling everything but why should I have all the fun?', 'assets/004_salle_renault.jpg', 'France', 'Lyon', '165 rue Garibaldi', '69003', 40, 'reunion'),
(5, 'Bureau Blanc', 'We have purged your fear. You are ready to Iead these men. You are ready to become a member of the League of Shadows. But first, you must demonstrate your commitment to justice.', 'assets/005_salle_blanc.jpg', 'France', 'Marseille', '146 Boulevard de Paris', '13003', 30, 'reunion'),
(6, 'Bureau Dupuis', 'The first time I stole so that I wouldn\'t starve, yes. I lost many assumptions about the simple nature of right and wrong. And when I traveled I learned the fear before a crime and the thrill of success. But I never became one of them.', 'assets/006_salle_dupuis.jpg', 'France', 'Marseille', '341 rue de Lyon', '13015', 70, 'formation'),
(7, 'Salle Leroux', 'It means you\'re hatred, and it also means losing someone, who I\'ve cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important.', 'assets/007_salle_leroux.jpg', 'France', 'Paris', '128 rue des Pyrénées', '75015', 40, 'bureau'),
(8, 'Salle Marchal', 'You want order in Gotham. Batman must take off his mask and turn himself in. Oh, and every day he doesn\'t, people will die. Starting tonight. I\'m a man of my word.', 'assets/008_salle_marchal.jpg', 'France', 'Lyon', '190 Avenue Barthélémy Buyer', '69009', 80, 'formation'),
(9, 'Salle Cousin', 'This town deserves a better class of criminal and I\'m gonna give it to them. Tell your men they work for me now. This is my city.', 'assets/009_salle_cousin.jpg', 'France', 'Paris', '88 Boulevard Auguste Blanqui', '75013', 20, 'reunion'),
(10, 'Bureau Adam', 'Bane was a member of the League of Shadows. And then he was excommunicated. And any man who is too extreme for Ra\'s Al Ghul, is not to be trifled with.', 'assets/010_salle_adam.jpg', 'France', 'Lyon', '149 Avenue Lacassagne', '69003', 30, 'bureau');

-- --------------------------------------------------------

--
-- Structure de la table `slot`
--

DROP TABLE IF EXISTS `slot`;
CREATE TABLE IF NOT EXISTS `slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `arrival_date` datetime NOT NULL,
  `departure_date` datetime NOT NULL,
  `price` float DEFAULT NULL,
  `status` enum('libre','reserve') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slot`
--

INSERT INTO `slot` (`id`, `room_id`, `arrival_date`, `departure_date`, `price`, `status`) VALUES
(1, 10, '2018-10-12 00:00:00', '2018-10-18 00:00:00', 499, 'reserve'),
(2, 8, '2018-11-03 00:00:00', '2018-11-07 00:00:00', 750, 'reserve'),
(3, 3, '2018-12-22 00:00:00', '2018-12-24 00:00:00', 500, 'reserve'),
(4, 2, '2018-01-14 00:00:00', '2018-01-16 00:00:00', 429, 'reserve'),
(5, 9, '2018-01-19 00:00:00', '2018-01-23 00:00:00', 639, 'reserve'),
(6, 7, '2018-02-08 00:00:00', '2018-02-11 00:00:00', 589, 'reserve'),
(7, 1, '2018-03-01 00:00:00', '2018-03-04 00:00:00', 600, 'reserve'),
(8, 4, '2018-03-02 00:00:00', '2018-03-05 00:00:00', 460, 'reserve'),
(9, 5, '2018-03-10 00:00:00', '2018-03-15 00:00:00', 899, 'reserve'),
(10, 6, '2018-03-14 00:00:00', '2018-03-19 00:00:00', 899, 'reserve'),
(11, 7, '2018-03-28 00:00:00', '2018-04-06 00:00:00', 390, 'reserve'),
(12, 9, '2018-03-29 00:00:00', '2018-04-02 00:00:00', 290, 'reserve'),
(13, 2, '2018-04-01 00:00:00', '2018-04-04 00:00:00', 560, 'reserve'),
(14, 6, '2018-04-05 00:00:00', '2018-04-09 00:00:00', 710, 'reserve'),
(15, 3, '2018-05-12 00:00:00', '2018-05-19 00:00:00', 660, 'reserve'),
(16, 1, '2018-05-12 00:00:00', '2018-05-15 00:00:00', 660, 'reserve'),
(17, 9, '2018-03-18 00:00:00', '2018-03-20 00:00:00', 450, 'libre'),
(18, 8, '2018-03-30 00:00:00', '2018-03-31 00:00:00', 319, 'libre'),
(19, 9, '2018-03-23 00:00:00', '2018-03-25 00:00:00', 299, 'libre'),
(20, 5, '2018-03-30 00:00:00', '2018-03-31 00:00:00', 349, 'libre'),
(21, 7, '2018-04-11 00:00:00', '2018-04-15 00:00:00', 999, 'reserve'),
(27, 6, '2018-04-06 00:00:00', '2018-04-08 00:00:00', 369, 'libre'),
(28, 8, '2018-04-04 00:00:00', '2018-04-08 00:00:00', 799, 'libre'),
(29, 4, '2018-04-28 00:00:00', '2018-04-30 00:00:00', 499, 'libre'),
(30, 1, '2018-05-09 00:00:00', '2018-05-10 00:00:00', 259, 'libre'),
(31, 2, '2018-05-10 00:00:00', '2018-05-11 00:00:00', 309, 'libre'),
(32, 3, '2018-05-12 00:00:00', '2018-05-13 00:00:00', 699, 'libre'),
(34, 2, '2018-06-01 00:00:00', '2018-06-04 00:00:00', 499, 'libre'),
(35, 4, '2018-06-04 00:00:00', '2018-06-08 00:00:00', 589, 'libre'),
(36, 6, '2016-06-09 00:00:00', '2016-06-12 00:00:00', 419, 'reserve'),
(37, 8, '2016-06-14 00:00:00', '2016-06-16 00:00:00', 489, 'libre'),
(38, 10, '2016-06-19 00:00:00', '2016-06-21 00:00:00', 769, 'libre'),
(39, 5, '2016-06-23 00:00:00', '2016-06-27 00:00:00', 999, 'libre'),
(40, 6, '2017-04-20 00:00:00', '2017-04-26 00:00:00', 600, 'libre'),
(41, 8, '2017-04-20 00:00:00', '2017-04-26 00:00:00', 1200, 'libre'),
(42, 5, '2023-01-06 16:37:29', '2023-03-08 16:37:29', 900, 'libre'),
(43, 1, '2022-11-30 16:46:24', '2022-12-22 16:46:24', 543, 'libre'),
(44, 2, '2022-12-01 16:47:07', '2022-12-31 16:47:07', 340, 'libre'),
(45, 3, '2023-01-01 16:47:07', '2023-01-11 16:47:07', 460, 'libre'),
(46, 4, '2022-12-09 16:48:18', '2022-12-21 16:48:18', 499, 'libre'),
(47, 5, '2023-02-09 16:48:18', '2023-02-24 16:48:18', 740, 'libre'),
(48, 6, '2022-12-10 16:49:37', '2023-01-19 16:49:37', 389, 'libre'),
(49, 7, '2022-11-13 16:49:37', '2022-12-12 16:49:37', 999, 'libre'),
(50, 8, '2022-11-09 16:50:37', '2022-12-15 16:50:37', 846, 'libre'),
(51, 9, '2022-11-09 16:51:11', '2022-12-09 16:51:11', 643, 'libre'),
(52, 10, '2022-11-07 16:51:11', '2022-12-31 16:51:11', 600, 'libre'),
(53, 1, '2022-11-06 16:51:11', '2022-11-25 16:51:11', 460, 'libre'),
(54, 2, '2022-12-17 16:51:11', '2023-01-20 16:51:11', 430, 'libre'),
(55, 3, '2022-12-16 16:51:11', '2022-12-31 16:51:11', 399, 'libre'),
(56, 4, '2022-11-28 16:51:11', '2022-12-15 16:51:11', 830, 'libre'),
(57, 6, '2022-12-10 16:49:37', '2023-01-19 16:49:37', 389, 'libre'),
(58, 7, '2022-11-13 16:49:37', '2022-12-12 16:49:37', 999, 'reserve');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `roles` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `password`, `title`, `email`, `roles`, `created_at`) VALUES
(1, 'schneider', 'name', 'Nguyen', '098f6bcd4621d373cade4e832627b4f6', 'f', 'odio.phasellus@velvenfsenatis.com', 0, '2013-11-12 00:00:00'),
(2, 'A.Thibaudet', 'Bobby', 'Thibaudet', '098f6bcd4621d373cade4e832627b4f6', 'm', 'arnaud@athib.com', 1, '2014-06-17 00:00:00'),
(3, 'mdupont', 'Martin', 'Dupont', '098f6bcd4621d373cade4e832627b4f6', 'f', 'martin@dupont.fr', 0, '2013-01-10 00:00:00'),
(4, 'jcode', 'Jean', 'Code', '098f6bcd4621d373cade4e832627b4f6', 'm', 'jean@code.com', 0, '2013-03-14 00:00:00'),
(5, 'pseudo', 'Prénom', 'Nom', '098f6bcd4621d373cade4e832627b4f6', 'm', 'pseudo@exemple.fr', 0, '2012-06-05 00:00:00'),
(6, 'schneider', 'name', 'Nguyen', '098f6bcd4621d373cade4e832627b4f6', 'f', 'odio.phasellus@velvenenatis.com', 0, '2013-11-12 00:00:00'),
(7, 'dufour', 'name', 'Rodriguez', '098f6bcd4621d373cade4e832627b4f6', 'm', 'dapibus@sagittis.com', 0, '2015-12-09 00:00:00'),
(8, 'richard', 'name', 'Benoit', '098f6bcd4621d373cade4e832627b4f6', 'f', 'ultricies.ligula.Nullam@orciDonec.ca', 0, '2013-04-15 00:00:00'),
(9, 'richard', 'name', 'Benoit', '098f6bcd4621d373cade4e832627b4f6', 'f', 'ultricies.ligula.Nulfdelam@orciDonec.ca', 0, '2013-04-15 00:00:00'),
(10, 'blanchard', 'name', 'Vidal', '098f6bcd4621d373cade4e832627b4f6', 'f', 'sem.elit.pharetra@molestietellusAenean.co.uk', 0, '2014-06-10 00:00:00'),
(36, 'testUsername', 'testFirstname', 'testLastname', '9bc34549d565d9505b287de0cd20ac77be1d3f2c', NULL, 'test@gmail.com', 0, '2022-10-27 13:08:28'),
(37, 'admin', 'admin', 'admin', 'b74f3eda2f08e35f5c19cb096e2b653f5e577262', NULL, 'admin@gmail.com', 0, '2022-10-29 00:19:29'),
(38, 'david', 'david', 'david', '4afa2a522b2d24f5e525c072e1eef447938f6d93', NULL, 'david@gmail.com', 0, '2022-10-29 13:33:07'),
(39, 'test1', 'test1', 'test1', 'a743f6004188c384dbf566c0811ca0c978e07a9b', NULL, 'test1@gmail.com', 0, '2022-10-31 13:53:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
