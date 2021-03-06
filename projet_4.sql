-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 28 juin 2019 à 09:15
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_4`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `billet_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `title`, `content`, `billet_date`) VALUES
(1, 'Chapitre 1 : Émeraude', 'Lorem&nbsp; Loremipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mattis, augue a tincidunt ultrices, urna elit semper nulla, eu commodo urna urna ac purus. Sed posuere dolor quis nunc tempor, eu tempus tellus vulputate. Ut scelerisque hendrerit magna ut laoreet. Aenean imperdiet mauris massa, ac consequat ligula scelerisque porta. Praesent vel ipsum molestie, hendrerit nibh vel, placerat diam. Vivamus pellentesque ac nisl ut maximus. In pulvinar tellus sem, finibus facilisis felis hendrerit at. Quisque sagittis venenatis arcu vel porttitor. Pellentesque id risus sit amet mauris venenatis molestie et id dui. Nulla pharetra sed mauris ut euismod. Nullam vestibulum mi ut metus pharetra facilisis. Aliquam tempor erat at ipsum ultricies, in ultrices tortor vestibulum. Morbi in venenatis dui. Ut sed interdum ipsum, id accumsan nunc. Aenean eu vulputate ex.</p>\r\n<p>Sed eros ipsum, feugiat in lobortis sit amet, ornare id turpis. Nunc sapien risus, pulvinar vitae nunc id, dignissim feugiat urna. Phasellus hendrerit velit dapibus, tincidunt enim sit amet, pulvinar purus. Sed id orci eget urna ultrices auctor vestibulum nec nunc. Vestibulum venenatis bibendum sem non viverra. Morbi placerat augue sit amet leo accumsan, in ultrices eros bibendum. Aliquam placerat tellus eget convallis luctus.<br />Quisque orci metus, blandit id commodo vitae, venenatis vel massa. Ut ultricies ultricies magna, non ornare ante ullamcorper non. Donec pharetra elit et arcu aliquam lacinia. Quisque et consectetur velit. Cras sollicitudin, nisi rutrum lacinia molestie, ante risus fringilla orci, in dignissim purus urna at libero. Fusce accumsan iaculis risus eu fringilla. Praesent maximus felis non orci aliquam eleifend. Fusce vehicula, purus vitae varius rutrum, ante quam consectetur ex, et efficitur tellus justo ac tortor. In fringilla ipsum quis arcu dapibus, id posuere felis sodales. Aenean vel sem eu ligula tempus ultrices. Pellentesque tincidunt quis erat pharetra pulvinar. Morbi ornare tincidunt mauris a feugiat.<br />Nunc consequat, neque ut ultricies malesuada, purus orci dapibus nunc, non commodo ligula tortor ut nunc. Sed mollis quam eget felis euismod, et vehicula diam vestibulum. Nullam in nisi cursus, bibendum augue vel, auctor lectus. Praesent luctus augue quis fringilla pharetra. In malesuada lorem nulla, nec convallis erat rutrum ut. Phasellus ac porta ipsum. Phasellus id hendrerit nulla, non congue sem. Nulla at pretium eros, in aliquet tortor. Vivamus sed est ut nibh interdum tincidunt.<br />Praesent faucibus tincidunt neque quis placerat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras urna nulla, dapibus a nisi euismod, interdum congue purus. Etiam et felis pretium, ullamcorper nisl a, porta nunc. Phasellus eu arcu at urna vestibulum tincidunt. Donec tincidunt, velit eleifend faucibus tristique, elit purus suscipit erat, ac fermentum risus ipsum sagittis erat. Quisque pulvinar in nulla ac sodales. Curabitur gravida pharetra elementum. Sed dignissim, eros non consequat pretium, nunc ex malesuada dui, eget dignissim dolor ligula sit amet tortor. Mauris eget orci metus. Fusce id ligula sed sem lacinia lobortis et semper mauris. Mauris pharetra odio ac mollis ultrices. Cras cursus velit sed nulla vehicula, sit amet egestas nibh molestie. Donec augue lorem, mollis ac arcu et, aliquet accumsan metus. Suspendisse ornare sodales neque, eu euismod ipsum ultricies quis.', '2019-03-01'),
(2, 'Chapitre 2 : Jade', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac semper neque. Pellentesque aliquam, risus vitae dictum convallis, enim felis lacinia lorem, sed porttitor enim risus quis erat. Duis nec tortor at massa cursus interdum. Cras ac purus mollis, sollicitudin nunc in, tincidunt odio. Proin accumsan elit vel tincidunt feugiat. Ut blandit auctor blandit. Vivamus malesuada nisl lectus, non sollicitudin dolor lacinia at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum lacus ante, sed cursus ligula eleifend et. Curabitur bibendum viverra convallis. Aliquam ultrices, est finibus varius ornare, magna justo lobortis nisi, et finibus diam lorem id enim. Phasellus diam eros, placerat in erat ut, vehicula vehicula ligula. Maecenas ut enim posuere, dictum elit sed, auctor mi. Quisque vitae maximus tellus. Vestibulum ac varius purus, nec tempor ligula. Curabitur a hendrerit purus. Duis laoreet luctus felis. Duis pellentesque, nisl vel sagittis scelerisque, leo velit feugiat dui, ac porttitor diam quam non sapien. Ut ex erat, feugiat non quam tempus, congue fringilla eros. Cras tempus ante sed lectus ultrices, sed lobortis turpis bibendum. Sed porttitor justo sed leo consectetur, sed aliquet purus sollicitudin. Donec arcu lectus, elementum sit amet interdum in, placerat id velit. Etiam eleifend lacus in sodales ultricies. Praesent id ipsum feugiat, ultrices leo quis, posuere odio. Suspendisse tempor euismod libero, sed rhoncus mauris fringilla eu. Ut at viverra risus, id luctus nulla. Proin blandit accumsan velit ut condimentum. Sed quis pellentesque lectus. Donec bibendum nulla vel diam condimentum pharetra. Vestibulum rutrum nec mi et auctor. Praesent facilisis laoreet neque nec vulputate. Etiam scelerisque magna vitae consectetur pharetra. Nam in tincidunt sapien, eu sollicitudin tortor. Duis mattis turpis et orci accumsan consectetur. Sed finibus auctor ipsum, eu feugiat lacus laoreet tempus. Integer bibendum turpis velit, eu tincidunt nisi tincidunt ut. Phasellus scelerisque mollis neque, eget tincidunt tellus dignissim at. Praesent euismod at ipsum non viverra. Phasellus id ex volutpat sem volutpat convallis ut nec odio. Aenean in erat mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ac tellus a magna pellentesque sagittis. Praesent ultricies imperdiet nunc ac fermentum. Fusce gravida, dolor at porta dapibus, neque velit venenatis lorem, nec tempor neque magna non justo. Mauris quis pulvinar mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti.', '2019-04-03'),
(4, 'Chapitre 3 : Saphir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac semper neque. Pellentesque aliquam, risus vitae dictum convallis, enim felis lacinia lorem, sed porttitor enim risus quis erat. Duis nec tortor at massa cursus interdum. Cras ac purus mollis, sollicitudin nunc in, tincidunt odio. Proin accumsan elit vel tincidunt feugiat. Ut blandit auctor blandit. Vivamus malesuada nisl lectus, non sollicitudin dolor lacinia at. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum lacus ante, sed cursus ligula eleifend et. Curabitur bibendum viverra convallis. Aliquam ultrices, est finibus varius ornare, magna justo lobortis nisi, et finibus diam lorem id enim. Phasellus diam eros, placerat in erat ut, vehicula vehicula ligula. Maecenas ut enim posuere, dictum elit sed, auctor mi. Quisque vitae maximus tellus. Vestibulum ac varius purus, nec tempor ligula. Curabitur a hendrerit purus. Duis laoreet luctus felis. Duis pellentesque, nisl vel sagittis scelerisque, leo velit feugiat dui, ac porttitor diam quam non sapien. Ut ex erat, feugiat non quam tempus, congue fringilla eros. Cras tempus ante sed lectus ultrices, sed lobortis turpis bibendum. Sed porttitor justo sed leo consectetur, sed aliquet purus sollicitudin. Donec arcu lectus, elementum sit amet interdum in, placerat id velit. Etiam eleifend lacus in sodales ultricies. Praesent id ipsum feugiat, ultrices leo quis, posuere odio. Suspendisse tempor euismod libero, sed rhoncus mauris fringilla eu. Ut at viverra risus, id luctus nulla. Proin blandit accumsan velit ut condimentum. Sed quis pellentesque lectus. Donec bibendum nulla vel diam condimentum pharetra. Vestibulum rutrum nec mi et auctor. Praesent facilisis laoreet neque nec vulputate. Etiam scelerisque magna vitae consectetur pharetra. Nam in tincidunt sapien, eu sollicitudin tortor. Duis mattis turpis et orci accumsan consectetur. Sed finibus auctor ipsum, eu feugiat lacus laoreet tempus. Integer bibendum turpis velit, eu tincidunt nisi tincidunt ut. Phasellus scelerisque mollis neque, eget tincidunt tellus dignissim at. Praesent euismod at ipsum non viverra. Phasellus id ex volutpat sem volutpat convallis ut nec odio. Aenean in erat mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec ac tellus a magna pellentesque sagittis. Praesent ultricies imperdiet nunc ac fermentum. Fusce gravida, dolor at porta dapibus, neque velit venenatis lorem, nec tempor neque magna non justo. Mauris quis pulvinar mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse potenti.', '2019-04-05'),
(5, 'Chapitre 4 : Nacre', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mattis, augue a tincidunt ultrices, urna elit semper nulla, eu commodo urna urna ac purus. Sed posuere dolor quis nunc tempor, eu tempus tellus vulputate. Ut scelerisque hendrerit magna ut laoreet. Aenean imperdiet mauris massa, ac consequat ligula scelerisque porta. Praesent vel ipsum molestie, hendrerit nibh vel, placerat diam. Vivamus pellentesque ac nisl ut maximus. In pulvinar tellus sem, finibus facilisis felis hendrerit at. Quisque sagittis venenatis arcu vel porttitor. Pellentesque id risus sit amet mauris venenatis molestie et id dui. Nulla pharetra sed mauris ut euismod. Nullam vestibulum mi ut metus pharetra facilisis. Aliquam tempor erat at ipsum ultricies, in ultrices tortor vestibulum. Morbi in venenatis dui. Ut sed interdum ipsum, id accumsan nunc. Aenean eu vulputate ex. Sed eros ipsum, feugiat in lobortis sit amet, ornare id turpis. Nunc sapien risus, pulvinar vitae nunc id, dignissim feugiat urna. Phasellus hendrerit velit dapibus, tincidunt enim sit amet, pulvinar purus. Sed id orci eget urna ultrices auctor vestibulum nec nunc. Vestibulum venenatis bibendum sem non viverra. Morbi placerat augue sit amet leo accumsan, in ultrices eros bibendum. Aliquam placerat tellus eget convallis luctus. Quisque orci metus, blandit id commodo vitae, venenatis vel massa. Ut ultricies ultricies magna, non ornare ante ullamcorper non. Donec pharetra elit et arcu aliquam lacinia. Quisque et consectetur velit. Cras sollicitudin, nisi rutrum lacinia molestie, ante risus fringilla orci, in dignissim purus urna at libero. Fusce accumsan iaculis risus eu fringilla. Praesent maximus felis non orci aliquam eleifend. Fusce vehicula, purus vitae varius rutrum, ante quam consectetur ex, et efficitur tellus justo ac tortor. In fringilla ipsum quis arcu dapibus, id posuere felis sodales. Aenean vel sem eu ligula tempus ultrices. Pellentesque tincidunt quis erat pharetra pulvinar. Morbi ornare tincidunt mauris a feugiat. Nunc consequat, neque ut ultricies malesuada, purus orci dapibus nunc, non commodo ligula tortor ut nunc. Sed mollis quam eget felis euismod, et vehicula diam vestibulum. Nullam in nisi cursus, bibendum augue vel, auctor lectus. Praesent luctus augue quis fringilla pharetra. In malesuada lorem nulla, nec convallis erat rutrum ut. Phasellus ac porta ipsum. Phasellus id hendrerit nulla, non congue sem. Nulla at pretium eros, in aliquet tortor. Vivamus sed est ut nibh interdum tincidunt. Praesent faucibus tincidunt neque quis placerat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras urna nulla, dapibus a nisi euismod, interdum congue purus. Etiam et felis pretium, ullamcorper nisl a, porta nunc. Phasellus eu arcu at urna vestibulum tincidunt. Donec tincidunt, velit eleifend faucibus tristique, elit purus suscipit erat, ac fermentum risus ipsum sagittis erat. Quisque pulvinar in nulla ac sodales. Curabitur gravida pharetra elementum. Sed dignissim, eros non consequat pretium, nunc ex malesuada dui, eget dignissim dolor ligula sit amet tortor. Mauris eget orci metus. Fusce id ligula sed sem lacinia lobortis et semper mauris. Mauris pharetra odio ac mollis ultrices. Cras cursus velit sed nulla vehicula, sit amet egestas nibh molestie. Donec augue lorem, mollis ac arcu et, aliquet accumsan metus. Suspendisse ornare sodales neque, eu euismod ipsum ultricies quis.</p>', '2019-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `billet_id` int(11) NOT NULL,
  `is_signaled` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `billet_id` (`billet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `comment_date`, `billet_id`, `is_signaled`) VALUES
(3, 'Pierre HT', 'Un peu deçu.. j ai trouvé ca long !', '2019-03-03 10:05:00', 1, 0),
(5, 'dydy', 'Tres bien je recommande', '2019-03-14 07:28:25', 1, 1),
(8, 'Nelly T', 'au top vivement le prochain', '2019-04-01 02:08:11', 4, 0),
(9, 'Mickael', 'etrange comme fin non ? ', '2019-04-01 00:00:00', 4, 0),
(10, 'Jean V', 'comme dhab', '2019-04-03 09:00:00', 4, 0),
(11, 'Julie', 'qd est prevu le prochain ? ', '2019-04-04 15:16:00', 4, 0),
(17, 'anais', 'top ', '2019-04-04 14:34:02', 1, 0),
(19, 'sandy', 'genial', '2019-04-04 14:35:35', 1, 0),
(31, 'anael', 'nous devons patienter', '2019-04-04 15:07:16', 2, 1),
(39, 'Pierre ', 'haluucinant', '2019-04-10 13:28:34', 4, 0),
(40, 'Pierre ', 'haluucinant', '2019-04-10 13:36:43', 4, 0),
(41, 'Pierre ', 'haluucinant', '2019-04-10 13:36:45', 4, 0),
(42, 'Pierre ', 'haluucinant', '2019-04-10 13:39:32', 4, 0),
(54, 'sandy', 'testets', '2019-04-16 18:52:02', 4, 0),
(55, 'sandy', 's', '2019-04-22 19:32:16', 4, 1),
(56, 'r', 'rr', '2019-04-22 19:52:26', 4, 0),
(57, 'emilie', 'ee', '2019-04-22 22:31:36', 4, 0),
(62, 'jForteroche', 'zzzzz', '2019-06-18 13:28:00', 1, 0),
(69, 'jForteroche', 'super', '2019-06-20 09:52:11', 5, 1),
(71, 'lola', 'j ai adoré !', '2019-06-20 21:31:30', 4, 0),
(72, 'lola', 'est il mort ?', '2019-06-20 21:32:24', 5, 0),
(74, 'jForteroche', 'Suspense !!! la suite au prochain chapitre ;-)', '2019-06-24 15:30:23', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'jForteroche', '7c123a11f9597a2f850493963dae278a', 1),
(2, 'dydy', 'ab4f63f9ac65152575886860dde480a1', 0),
(4, 'lemaire', '4124bc0a9335c27f086f24ba207a4912', 0),
(6, 'sophie', '4124bc0a9335c27f086f24ba207a4912', 0),
(7, 'sgandon', '4124bc0a9335c27f086f24ba207a4912', 0),
(10, 'robert', '4124bc0a9335c27f086f24ba207a4912', 0),
(11, 'lola', 'fceeb9b9d469401fe558062c4bd25954', 0),
(12, 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68', 0),
(13, 'julieP', '6dd125185e7edfc8dfe5d2a18595b384', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`billet_id`) REFERENCES `billets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
