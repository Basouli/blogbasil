-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 22 juin 2022 à 16:57
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_categorie` int NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_categorie` (`id_categorie`),
  KEY `fk_id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateur`, `id_categorie`, `date`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis urna diam, commodo ac erat vel, pretium lobortis elit. In arcu lectus, congue et sapien a, pretium bibendum tortor. Aliquam erat volutpat. Suspendisse et pretium mi, eget iaculis libero. Sed sagittis augue vitae sapien pulvinar tincidunt. Nam ut metus id odio vehicula elementum. Nunc vestibulum mi a tortor rhoncus auctor. Nullam pharetra lobortis neque in dignissim. In varius malesuada metus, a ultricies diam malesuada vel. Nulla facilisis nulla a faucibus venenatis. Sed pulvinar auctor libero eu consectetur. Cras efficitur augue et est lobortis mollis non ut enim.', 1, 1, '2022-06-21 16:24:04'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis urna diam, commodo ac erat vel, pretium lobortis elit. In arcu lectus, congue et sapien a, pretium bibendum tortor. Aliquam erat volutpat. Suspendisse et pretium mi, eget iaculis libero. Sed sagittis augue vitae sapien pulvinar tincidunt. Nam ut metus id odio vehicula elementum. Nunc vestibulum mi a tortor rhoncus auctor. Nullam pharetra lobortis neque in dignissim. In varius malesuada metus, a ultricies diam malesuada vel. Nulla facilisis nulla a faucibus venenatis. Sed pulvinar auctor libero eu consectetur. Cras efficitur augue et est lobortis mollis non ut enim.\n\nPellentesque non auctor neque, in aliquet justo. Maecenas neque turpis, gravida eu lorem id, luctus aliquam mi. Aliquam erat volutpat. Sed est neque, rhoncus a libero sed, rutrum efficitur odio. Nullam viverra nibh quis tellus luctus, ut venenatis turpis porta. Nam eu facilisis urna. Nam a urna nec felis tincidunt porttitor ac at elit. Vivamus egestas vehicula quam, id feugiat neque fringilla dapibus. Mauris vel quam posuere, condimentum nunc sit amet, fringilla lorem. Nulla cursus mi lacinia commodo ultrices. Ut pulvinar, massa scelerisque laoreet bibendum, libero purus lobortis diam, non efficitur enim dui a justo. Sed commodo nisl sed ligula varius eleifend. Nam sapien est, aliquet eu gravida a, varius sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nPraesent tempus euismod velit et viverra. Vestibulum sit amet ante vitae elit finibus rutrum ac ac neque. Phasellus eu posuere quam. Vivamus vel pulvinar leo. In et velit id felis dictum lobortis. Pellentesque vitae ligula ut urna efficitur facilisis. Vestibulum sit amet pellentesque enim. Integer dictum viverra lacus, sed varius massa consequat a.\n\nMorbi vestibulum neque a ullamcorper condimentum. Integer at urna nulla. Ut fermentum metus quis nunc venenatis, at posuere erat pretium. Integer sollicitudin enim vitae metus posuere, at suscipit nisl tempor. Maecenas erat nisi, ullamcorper fermentum porta quis, vehicula eget lectus. Cras tellus sem, aliquam eget dignissim at, fermentum vel sapien. Ut vulputate est at magna suscipit ultricies. Nunc euismod luctus cursus. In suscipit eros ut tortor bibendum aliquam. Praesent ac ultricies dui. Phasellus congue lobortis lectus. Aliquam hendrerit cursus lectus sed ullamcorper.\n\nCras tortor diam, euismod ac neque et, fermentum pharetra lectus. Maecenas non nibh finibus, tincidunt arcu id, gravida ipsum. Sed maximus ultricies ligula a porta. Sed in dolor laoreet magna pharetra fermentum rhoncus quis nisl. Aenean cursus nulla vitae nisl malesuada blandit. Maecenas accumsan justo non porttitor gravida. Donec lacinia urna vitae faucibus elementum. Pellentesque vel metus quis risus ultricies imperdiet ut eget urna. Mauris laoreet eleifend sagittis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu convallis magna, at condimentum odio. Aliquam in posuere ante. Duis luctus at felis eget semper. Praesent justo neque, gravida quis fringilla ac, pretium quis mauris. Mauris sagittis varius diam, tincidunt facilisis augue dignissim eu. Proin eget enim sit amet massa molestie pretium.', 1, 1, '2022-06-21 17:28:41'),
(4, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat a libero eu blandit. Etiam nisl tortor, tincidunt at aliquet ac, pretium sit amet leo. Cras malesuada rhoncus est, id lacinia mauris efficitur mollis. Pellentesque bibendum nunc a ultricies imperdiet. Fusce egestas ac lacus vitae luctus. Fusce ut leo vulputate, fringilla nibh ut, scelerisque leo. Ut sed dui eget ex ultricies imperdiet. Sed quis ornare odio. Aliquam sollicitudin nunc augue, ac pulvinar nunc fermentum ac. Nunc fringilla ipsum mauris, nec posuere enim porta vitae. Ut mauris tortor, laoreet et neque quis, sodales viverra risus.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec semper fringilla leo, a porta lorem dictum vehicula. Nam eget lacus quam. Fusce ac nisi et turpis blandit pellentesque vel a lorem.\r\n\r\nDuis luctus maximus leo, vitae luctus tellus porttitor at. Mauris varius lectus erat, ac ultricies mi elementum id. Curabitur nibh enim, lacinia non ligula at, consectetur viverra leo. Quisque faucibus vulputate elementum. Nullam a lorem venenatis quam facilisis mattis quis finibus arcu. Quisque quis elit sit amet sapien volutpat feugiat. Nullam fermentum ornare nulla sed varius. Integer semper eleifend sem at eleifend. Fusce vel purus ex. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus placerat tempus iaculis. ', 1, 2, '2022-06-21 18:22:13'),
(5, 'Maecenas vel ante tempus, volutpat augue et, congue libero. Nulla mollis nulla sit amet elit congue, vel faucibus sapien efficitur. Duis sodales condimentum neque eget pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat id metus rhoncus mollis. Aenean congue fermentum orci, vel placerat neque finibus et. Integer eu vehicula ligula. Nam ut semper turpis. Aliquam vel lectus elementum elit cursus gravida a eu magna.\r\n\r\nMaecenas vel ligula lacus. Vivamus rutrum nulla non nisl consectetur, a condimentum nibh aliquam. Aenean semper dolor tortor, eu venenatis mauris vehicula sed. Curabitur lacus sapien, ornare accumsan gravida sit amet, sollicitudin eu lacus. Donec non lacus laoreet, rutrum ipsum sit amet, ornare quam. Curabitur quis vulputate risus. Vestibulum tristique sodales venenatis.', 1, 3, '2022-06-21 19:38:29'),
(6, 'Quisque sollicitudin, orci in scelerisque maximus, nunc diam rhoncus diam, eu luctus metus sem vitae diam. Sed tincidunt viverra massa, eget dignissim est varius ut. Phasellus euismod finibus fringilla. In varius lorem in urna interdum ornare. Integer non ex ac velit sagittis volutpat egestas a lectus. Fusce eu sem et mi commodo aliquam eget in ligula. Nullam lobortis accumsan diam sed finibus. Quisque at dolor nec quam dapibus pulvinar. Pellentesque mattis quis nulla eget suscipit.\r\n\r\nSuspendisse non dapibus elit, at condimentum risus. Phasellus et placerat mi. Fusce id posuere ipsum. Curabitur aliquam laoreet ultrices. Pellentesque vulputate eros eget ante laoreet, non congue quam vehicula. Sed sit amet luctus magna. Nam porttitor vehicula augue ut accumsan.', 1, 3, '2022-06-22 07:46:02'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae dolor nisl. Aliquam cursus arcu fringilla justo mattis, at lobortis orci porta. Proin sit amet bibendum metus. Quisque rhoncus venenatis diam, aliquam faucibus metus auctor sed. Vestibulum erat nisi, elementum id lacus posuere, feugiat dignissim dolor. Sed euismod, ante scelerisque efficitur sollicitudin, lorem massa imperdiet tellus, eu fringilla dui arcu eget diam. Etiam nulla metus, ultricies nec venenatis et, maximus semper nunc. Morbi egestas fringilla tristique. Praesent faucibus est dui, ac sagittis odio lobortis varius. Pellentesque congue nisi lectus, vel imperdiet justo viverra vel. Proin gravida quam nec turpis commodo accumsan. Sed dolor turpis, accumsan non semper suscipit, laoreet eu nunc. Nunc condimentum quis justo quis vulputate.\r\n\r\nProin dolor sem, iaculis eu dui at, porttitor elementum lacus. Donec congue, orci nec faucibus interdum, mauris nisl rutrum risus, eget scelerisque neque justo et lacus. In hac habitasse platea dictumst. Nam et augue lobortis, lobortis nisi sit amet, iaculis est. Proin eget quam tellus. Nunc quis ligula lacus. Mauris mattis egestas ornare.\r\n\r\nPhasellus tincidunt, justo sed fermentum sodales, est nisl euismod massa, quis mollis sem lorem sed orci. Donec pretium venenatis ultricies. Vestibulum tristique massa ut turpis aliquam laoreet. Maecenas libero lorem, egestas id elementum eget, vulputate quis erat. Proin elementum sem ac nisi suscipit ullamcorper. Donec euismod pulvinar arcu, in dictum lorem varius sed. Suspendisse potenti. Nunc ultrices erat orci, et consectetur leo rutrum id. In in ex rutrum, egestas augue nec, malesuada velit.\r\n\r\nQuisque sollicitudin, orci in scelerisque maximus, nunc diam rhoncus diam, eu luctus metus sem vitae diam. Sed tincidunt viverra massa, eget dignissim est varius ut. Phasellus euismod finibus fringilla. In varius lorem in urna interdum ornare. Integer non ex ac velit sagittis volutpat egestas a lectus. Fusce eu sem et mi commodo aliquam eget in ligula. Nullam lobortis accumsan diam sed finibus. Quisque at dolor nec quam dapibus pulvinar. Pellentesque mattis quis nulla eget suscipit.\r\n\r\nSuspendisse non dapibus elit, at condimentum risus. Phasellus et placerat mi. Fusce id posuere ipsum. Curabitur aliquam laoreet ultrices. Pellentesque vulputate eros eget ante laoreet, non congue quam vehicula. Sed sit amet luctus magna. Nam porttitor vehicula augue ut accumsan.', 1, 4, '2022-06-22 07:46:18'),
(8, 'Proin dolor sem, iaculis eu dui at, porttitor elementum lacus. Donec congue, orci nec faucibus interdum, mauris nisl rutrum risus, eget scelerisque neque justo et lacus. In hac habitasse platea dictumst. Nam et augue lobortis, lobortis nisi sit amet, iaculis est. Proin eget quam tellus. Nunc quis ligula lacus. Mauris mattis egestas ornare.', 1, 1, '2022-06-22 08:43:29'),
(9, 'Phasellus tincidunt, justo sed fermentum sodales, est nisl euismod massa, quis mollis sem lorem sed orci. Donec pretium venenatis ultricies. Vestibulum tristique massa ut turpis aliquam laoreet. Maecenas libero lorem, egestas id elementum eget, vulputate quis erat. Proin elementum sem ac nisi suscipit ullamcorper. Donec euismod pulvinar arcu, in dictum lorem varius sed. Suspendisse potenti. Nunc ultrices erat orci, et consectetur leo rutrum id. In in ex rutrum, egestas augue nec, malesuada velit.\r\n\r\nQuisque sollicitudin, orci in scelerisque maximus, nunc diam rhoncus diam, eu luctus metus sem vitae diam. Sed tincidunt viverra massa, eget dignissim est varius ut. Phasellus euismod finibus fringilla. In varius lorem in urna interdum ornare. Integer non ex ac velit sagittis volutpat egestas a lectus. Fusce eu sem et mi commodo aliquam eget in ligula. Nullam lobortis accumsan diam sed finibus. Quisque at dolor nec quam dapibus pulvinar. Pellentesque mattis quis nulla eget suscipit.', 1, 1, '2022-06-22 08:43:46'),
(10, 'Phasellus tincidunt, justo sed fermentum sodales, est nisl euismod massa, quis mollis sem lorem sed orci. Donec pretium venenatis ultricies. Vestibulum tristique massa ut turpis aliquam laoreet. Maecenas libero lorem, egestas id elementum eget, vulputate quis erat. Proin elementum sem ac nisi suscipit ullamcorper. Donec euismod pulvinar arcu, in dictum lorem varius sed. Suspendisse potenti. Nunc ultrices erat orci, et consectetur leo rutrum id. In in ex rutrum, egestas augue nec, malesuada velit.\r\n\r\nQuisque sollicitudin, orci in scelerisque maximus, nunc diam rhoncus diam, eu luctus metus sem vitae diam. Sed tincidunt viverra massa, eget dignissim est varius ut. Phasellus euismod finibus fringilla. In varius lorem in urna interdum ornare. Integer non ex ac velit sagittis volutpat egestas a lectus. Fusce eu sem et mi commodo aliquam eget in ligula. Nullam lobortis accumsan diam sed finibus. Quisque at dolor nec quam dapibus pulvinar. Pellentesque mattis quis nulla eget suscipit.\r\n\r\nSuspendisse non dapibus elit, at condimentum risus. Phasellus et placerat mi. Fusce id posuere ipsum. Curabitur aliquam laoreet ultrices. Pellentesque vulputate eros eget ante laoreet, non congue quam vehicula. Sed sit amet luctus magna. Nam porttitor vehicula augue ut accumsan.', 1, 1, '2022-06-22 08:43:58'),
(11, 'Ut sem lorem, fringilla vel tortor nec, sagittis efficitur neque. Phasellus ut augue euismod, pretium arcu et, placerat tortor. Maecenas justo nibh, consectetur ac condimentum vitae, lobortis vel ante. Etiam volutpat ullamcorper tellus, sit amet tincidunt enim mollis ut. Pellentesque feugiat purus ac lobortis tincidunt. Nullam massa magna, condimentum vitae orci nec, maximus euismod tellus. Proin vel nisl in lectus euismod sagittis. Ut feugiat elementum pharetra. Pellentesque hendrerit eros a nunc dignissim congue. Proin hendrerit finibus diam, eget vestibulum elit dapibus iaculis. Phasellus sollicitudin lacus ipsum, et tincidunt arcu sagittis sed. Ut aliquam eget dolor vel auctor.\r\n\r\nSuspendisse vestibulum fermentum luctus. Pellentesque ornare, magna et aliquam mattis, ligula eros laoreet ante, eget gravida purus nunc a enim. Nullam eu pharetra tortor, eu sodales leo. Vivamus et turpis ut nisl facilisis interdum. Aenean in interdum nunc, eget elementum orci. Nunc eget pretium dui. Morbi eu risus varius, rutrum dui vel, dignissim mi. Maecenas at justo eu nisi iaculis gravida. Phasellus a fermentum orci. Proin a porttitor nibh. Nunc ultrices nulla a arcu aliquet, nec gravida neque scelerisque. Sed posuere dignissim lorem, nec consectetur lectus dictum eleifend. Quisque tempus lectus a felis lobortis, eget mollis velit mollis. Donec id purus eu tortor aliquam euismod. Praesent vehicula mauris dui, vel feugiat mauris auctor vitae. In congue malesuada diam, eget pretium orci malesuada et.', 1, 1, '2022-06-22 08:48:39'),
(12, 'Suspendisse vestibulum fermentum luctus. Pellentesque ornare, magna et aliquam mattis, ligula eros laoreet ante, eget gravida purus nunc a enim. Nullam eu pharetra tortor, eu sodales leo. Vivamus et turpis ut nisl facilisis interdum. Aenean in interdum nunc, eget elementum orci. Nunc eget pretium dui. Morbi eu risus varius, rutrum dui vel, dignissim mi. Maecenas at justo eu nisi iaculis gravida. Phasellus a fermentum orci. Proin a porttitor nibh. Nunc ultrices nulla a arcu aliquet, nec gravida neque scelerisque. Sed posuere dignissim lorem, nec consectetur lectus dictum eleifend. Quisque tempus lectus a felis lobortis, eget mollis velit mollis. Donec id purus eu tortor aliquam euismod. Praesent vehicula mauris dui, vel feugiat mauris auctor vitae. In congue malesuada diam, eget pretium orci malesuada et.', 1, 3, '2022-06-22 09:04:38');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'informatique'),
(2, 'actualité'),
(3, 'premium'),
(4, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_article` (`id_article`),
  KEY `fk_id_u` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'Super article !', 2, 1, '2022-06-21 19:52:40'),
(2, 'Nam posuere ex magna, a maximus odio venenatis in. Nam condimentum, sapien id commodo finibus, tortor tortor tincidunt elit, vel malesuada leo velit a dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi ut accumsan tortor. Sed hendrerit pellentesque erat non placerat.', 2, 2, '2022-06-22 11:18:09'),
(3, 'premier commentaire', 3, 1, '2022-06-22 11:59:12');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'moderateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

DROP TABLE IF EXISTS `lang`;
CREATE TABLE IF NOT EXISTS `lang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `libelleShort` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `lang`
--

INSERT INTO `lang` (`id`, `libelle`, `libelleShort`) VALUES
(1, 'Français', 'Fr');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_droit` (`id_droits`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(1, 'admin', '$2y$10$7yy2LCp2OpJ80/3ikmUIU.SdoPSY7HlwygdEL8mTYgnSbCzBl4l06', 'basil.collette@outlook.fr', 1337),
(2, 'moderateur13', '$2y$10$SRdP4bqJRVKYTDziPLbuK.ebtDy13L7PEjjdZmIjC8i1Lnlm7FVkK', 'basil.collette@outlook.fr', 42),
(3, 'utilisateur1', '$2y$10$CkVIgNW2b2hoh6M9w0koM.vRBPyvi6rpR/JJzOSsKNVcdwAiBQMry', 'basil.collette@outlook.fr', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_id_article` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_u` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_id_droit` FOREIGN KEY (`id_droits`) REFERENCES `droits` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
