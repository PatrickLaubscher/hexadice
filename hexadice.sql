-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 14 avr. 2024 à 18:56
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hexadice`
--

-- --------------------------------------------------------

--
-- Structure de la table `age_mini`
--

DROP TABLE IF EXISTS `age_mini`;
CREATE TABLE IF NOT EXISTS `age_mini` (
  `age_mini_id` int NOT NULL AUTO_INCREMENT,
  `age_mini_name` varchar(5) NOT NULL,
  PRIMARY KEY (`age_mini_id`),
  UNIQUE KEY `age_mini_name` (`age_mini_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `age_mini`
--

INSERT INTO `age_mini` (`age_mini_id`, `age_mini_name`) VALUES
(3, '10'),
(1, '12'),
(5, '13'),
(4, '16');

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  PRIMARY KEY (`author_id`),
  UNIQUE KEY `author_name` (`author_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(10, 'Ben & JB'),
(7, 'Eric Hong'),
(4, 'Ignacy Trzewiczek'),
(5, 'Jakub Łapot'),
(9, 'James A. Wilson'),
(6, 'Przemysław Rymer'),
(8, 'R. Eric Reuss'),
(2, 'Thomas Lehmann'),
(3, 'Thomas Sing'),
(1, 'Uwe Rosenberg');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Expert'),
(4, 'Jeu coopératif'),
(3, 'Jeu d\'ambiance'),
(5, 'Jeu d\'enquête'),
(8, 'Jeu de bluff'),
(6, 'Jeu de gestion de main'),
(7, 'Jeu familial'),
(1, 'Stratégie');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_firstname` varchar(250) NOT NULL,
  `contact_lastname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_email` varchar(250) NOT NULL,
  `contact_object` tinyint NOT NULL,
  `contact_message` text NOT NULL,
  `contact_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_firstname`, `contact_lastname`, `contact_email`, `contact_object`, `contact_message`, `contact_date`) VALUES
(1, 'Bob', 'L\'éponge', 'bobleponge@gmail.com', 1, 'Test', '2024-04-08 14:24:52'),
(2, 'Indianna', 'Jones', 'indi@gmail.com', 2, 'Lost the holy grail ', '2024-04-14 17:01:03'),
(3, 'James', 'Holden', 'jh@rocinante.com', 1, 'Need counsel for best board games to bring in a spaceship - \r\nNemesis? ', '2024-04-14 17:04:52'),
(4, 'Luke', 'Skywalker', 'lk@betheforce.com', 3, 'Despite Disney BS \r\nI\'m not dead ', '2024-04-14 17:06:12');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_firstname` varchar(100) NOT NULL,
  `customer_lastname` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pwd` varchar(250) NOT NULL,
  `customer_creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_pwd`, `customer_creation_date`) VALUES
(4, 'test', 'test', 'test@test.com', '$2y$10$/fRTkdx8X04yHx5zbl9OfeWoo9lr.U86VoRtDQKSQ.ud.hUdz1CLq', '2024-04-03 16:15:16');

-- --------------------------------------------------------

--
-- Structure de la table `duration`
--

DROP TABLE IF EXISTS `duration`;
CREATE TABLE IF NOT EXISTS `duration` (
  `duration_id` int NOT NULL AUTO_INCREMENT,
  `duration_name` varchar(40) NOT NULL,
  PRIMARY KEY (`duration_id`),
  UNIQUE KEY `duration_name` (`duration_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `duration`
--

INSERT INTO `duration` (`duration_id`, `duration_name`) VALUES
(4, '1 à 2h'),
(3, '20 min'),
(5, '2h à 3h'),
(2, '30 min à 1h'),
(1, '90 min');

-- --------------------------------------------------------

--
-- Structure de la table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `editor_id` int NOT NULL AUTO_INCREMENT,
  `editor_name` varchar(250) NOT NULL,
  PRIMARY KEY (`editor_id`),
  UNIQUE KEY `editor_name` (`editor_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `editor`
--

INSERT INTO `editor` (`editor_id`, `editor_name`) VALUES
(7, 'ATM Gaming'),
(1, 'Funforge'),
(3, 'Iello'),
(5, 'Intrafin'),
(4, 'Mandoo Games'),
(6, 'Matagot'),
(2, 'Sand Castle Games');

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `employee_pwd` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `employee_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_pwd`, `employee_email`) VALUES
(1, 'Admin', '$2y$10$C358SB8poSsQ5utmRNfeLuLpm1WmmkmiCTttfls30QC17X9/pN5wC', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int NOT NULL AUTO_INCREMENT,
  `game_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_short` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_price` float NOT NULL,
  `game_notation` float NOT NULL,
  `game_quantity` smallint NOT NULL,
  `game_sticker` varchar(250) NOT NULL,
  `game_picture1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_picture2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_picture3` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_picture4` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `game_picture5` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_age_mini` int NOT NULL,
  `id_player_nb` int NOT NULL,
  `id_languages` int NOT NULL,
  `id_duration` int NOT NULL,
  `id_editor` int NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `id_age_mini` (`id_age_mini`),
  KEY `id_player_nb` (`id_player_nb`),
  KEY `id_languages` (`id_languages`),
  KEY `id_duration` (`id_duration`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`game_id`, `game_name`, `game_description`, `game_short`, `game_price`, `game_notation`, `game_quantity`, `game_sticker`, `game_picture1`, `game_picture2`, `game_picture3`, `game_picture4`, `game_picture5`, `id_age_mini`, `id_player_nb`, `id_languages`, `id_duration`, `id_editor`) VALUES
(17, 'Agricola', '<h2>Agricola, le jeu de d&eacute;veloppement agricole !&nbsp;&nbsp;</h2>\r\n<p style=\"text-align: justify;\">Les joueurs commencent avec deux fermiers, habitant dans une maison en bois compos&eacute;e de deux pi&egrave;ces. Lors d&rsquo;un tour, chaque fermier effectue une action. En r&eacute;coltant du bois et des roseaux, ils peuvent agrandir leur maison, puis leur famille. Agrandir sa famille permet d&rsquo;effectuer plus d&rsquo;actions &agrave; chaque tour, mais n&eacute;cessite &eacute;galement de produire plus de repas. Pour obtenir des repas, les joueurs peuvent labourer des champs et semer des graines. Les c&eacute;r&eacute;ales et les l&eacute;gumes plant&eacute;s sont r&eacute;colt&eacute;s au bout de plusieurs tours.</p>\r\n<p style=\"text-align: justify;\">Les joueurs peuvent &eacute;galement construire des p&acirc;turages cl&ocirc;tur&eacute;s pour &eacute;lever des moutons, des sangliers et des b&oelig;ufs. Les savoir-faire et les am&eacute;nagements permettent d&rsquo;assurer l&rsquo;entretien de la famille en offrant certains avantages. Les joueurs peuvent r&eacute;nover leur maison de bois en maison d&rsquo;argile, et ensuite en maison de pierre pour gagner plus de points.</p>\r\n<p style=\"text-align: justify;\">Chaque partie d&rsquo;Agricola est unique, notamment gr&acirc;ce aux cartes, prises au hasard parmi les 48 cartes Savoir-Faire et les 48 cartes Am&eacute;nagements mineurs.&nbsp;</p>', 'Faîtes prospérer votre petite ferme...', 49.9, 4.7, 10, 'agricola_WNZNwFySwPwpWxCARgj2BLJoRFbkMj.jpg', 'agricola-1_OVhWvxuKWflK5iRxjqAQ7C3agC5DlF.jpg', 'agricola-2_KCLw0QcKLDNC660Bw5RUkoyuRGAhQb.jpg', 'agricola-3_KSqAr85V5EqXYUtlxXA0trDagfFyS3.jpg', '', '', 1, 2, 1, 1, 1),
(18, 'Res Arcana', '<h2>Devenez le Roi des Arcanes !</h2>\r\n<div>Dans&nbsp;Res Arcana, des mages s\'affrontent pour d&eacute;crocher le titre de Roi des Arcanes. Pour y parvenir, il faudra poss&eacute;der des lieux de puissance et d\'antiques monuments.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Commencez la partie avec une essence de chaque type, 3 artefacts en main et un objet magique. Puis au cours d&rsquo;une manche de jeu, collectez des essences et effectuez une action par tour jusqu\'&agrave; ce que tout le monde ait jou&eacute;. Le joueur avec le plus grand nombre de points de victoire, remporte la partie.</div>\r\n<div>&nbsp;</div>\r\n<div>Res Arcana est un jeu simple et &eacute;l&eacute;gant, bas&eacute; sur l&rsquo;optimisation du paquet de cartes Artefact et l&rsquo;utilisation judicieuse des essences magiques. Il propose un gameplay novateur et passionnant qui offre une multitude de strat&eacute;gies et une forte rejouabilit&eacute;.</div>\r\n<h2>Bienvenue &agrave; Res Arcana !&nbsp;</h2>\r\n<div>Une partie de d&eacute;roule en plusieurs manches (g&eacute;n&eacute;ralement en 4 et 6 manches) qui se compose chacune de plusieurs &eacute;tapes :</div>\r\n<div>\r\n<ol>\r\n<li>Collecter des essences&nbsp;: Les joueurs collectent simultan&eacute;ment des essences en fonction des capacit&eacute;s de collecte dont disposent leurs &eacute;l&eacute;ments de jeu.</li>\r\n<li>Effectuer des actions&nbsp;: Chaque joueur doit effectuer 1 action. Le tour de jeu continue jusqu\'&agrave; ce que tous les joueurs aient pass&eacute;. Un joueur qui passe ne peut plus effectuer d&rsquo;action lors de cette manche.</li>\r\n<li>Effectuer un contr&ocirc;le de victoire&nbsp;: Quand tous les joueurs ont pass&eacute;, un contr&ocirc;le de victoire est effectu&eacute; pour voir si au moins un joueur a atteint ou d&eacute;pass&eacute; 10 points en cumulant les points pr&eacute;sents sur ses artefacts, monuments, lieux de puissance et la tuile Premier joueur. Si un joueur y parvient, la partie s\'ach&egrave;ve. Le joueur avec le plus de points est d&eacute;clar&eacute; vainqueur et devient le Roi des Arcanes.</li>\r\n</ol>\r\n<h2>Les variantes du jeu</h2>\r\n</div>\r\n<div>Pour plus de jouabilit&eacute;, Res Arcana int&egrave;gre deux modes de jeu suppl&eacute;mentaires :</div>\r\n<div>\r\n<ul>\r\n<li>Draft&nbsp;(2 &agrave; 4 joueurs) : modifie la mise en place du jeu avec les r&egrave;gles de base</li>\r\n<li>Mini tournoi&nbsp;(2 joueurs) : ajoute une phase de draft durant un tournoi en 2 ou 3 parties</li>\r\n</ul>\r\n</div>\r\n<div>&nbsp;</div>', 'Combat de mages pour le titre de Roi des Arcanes..!', 34.95, 4.8, 12, 'res-arcana_7GayC0DV76WKIpFlF9thw61HglPeFQ.jpg', 'res-arcana-1_Pj8hN6X3Wl0GeH6vu1TiJKzugchrIS.jpg', 'res-arcana-2_Jq0oCCUsaKLdfuBvh9nq9NPCu6AI8y.jpg', 'res-arcana-3_LCTu80wyZxWhtUX3XnuPfXW3HFnaK1.jpg', 'res-arcana-4_GoqmW958Xc30yZxtoVGCBocAznFKfC.jpg', 'res-arcana-5_fPDaI2KAtsYHIicdq5th04cvEZhBwZ.jpg', 1, 1, 1, 2, 2),
(19, 'The Crew : Mission Sous-Marine', '<div>\r\n<h2>Plongez dans les profondeurs de l\'oc&eacute;an gr&acirc;ce &agrave; ce jeu coop&eacute;ratif !</h2>\r\n</div>\r\n<div>Dans&nbsp;The Crew : Mission Sous-Marine, vous et les autres joueurs travaillez ensemble pour rechercher le continent perdu de Mu.&nbsp;</div>\r\n<div>Cette nouvelle aventure emm&egrave;ne votre &eacute;quipage au plus profond des abysses &agrave; la recherche de la l&eacute;gendaire terre engloutie. La distance &agrave; parcourir d&eacute;pend enti&egrave;rement de la qualit&eacute; de votre travail d\'&eacute;quipe.&nbsp;</div>\r\n<div>Carte par carte, tour par tour, votre &eacute;quipe de recherche d&eacute;couvrira les d&eacute;fis qui vous attendent et tracera un chemin jusqu\'&agrave; Mu.</div>\r\n<h2>Un jeu de communication... limit&eacute;e</h2>\r\n<p>Si la communication entre les membres de votre &eacute;quipage est fortement limit&eacute;e par votre &eacute;tat de submersion, elle est &eacute;galement essentielle &agrave; votre r&eacute;ussite. Trouver la terre cach&eacute;e dans les profondeurs obscures ne d&eacute;pend pas seulement de la r&eacute;ussite des tours, mais aussi d\'une n&eacute;gociation minutieuse de l\'ordre dans lequel ils sont gagn&eacute;s. Si les choses ne se passent pas comme pr&eacute;vu, vous pourrez peut-&ecirc;tre sauver l\'op&eacute;ration, mais il faudra un d&eacute;roulement presque sans faille et peut-&ecirc;tre un peu de chance pour atteindre enfin Mu.</p>\r\n<div>&nbsp;</div>\r\n<div>Le jeu propose une variante pour 2 joueurs.</div>', 'Oserez-vous plonger dans les abysses..?', 14.95, 4.7, 25, 'the-crew-ss-marine_Fr7NZiCoGY75N9E0XJTSeiuZm5cLWW.jpg', 'the-crew-ss-marine-1_DNyMfRqQs3drsBaTMr6ui5eNLVr694.jpg', 'the-crew-ss-marine-2_7eSiTc1MU2o1fSPUpAEqwjPucT4k21.jpg', 'the-crew-ss-marine-3_L3uzmmZZTYfh9pizPBF7qxfleemath.jpg', '', '', 3, 3, 1, 3, 3),
(21, 'Détective', '<h2>D&eacute;tective, un jeu d&rsquo;enqu&ecirc;te moderne</h2>\r\n<div>D&eacute;tective est un&nbsp;<strong>jeu coop&eacute;ratif de d&eacute;duction</strong>. Les joueurs incarnent ensemble un enqu&ecirc;teur de l&rsquo;Agence Antares avec une capacit&eacute; et des comp&eacute;tences qui lui sont propres. Au cours d&rsquo;une partie, vous devrez agir comme un vrai d&eacute;tective &agrave; savoir rassembler des informations et collecter des indices afin de r&eacute;soudre une affaire.&nbsp;</div>\r\n<div>Le jeu s&rsquo;accompagne d&rsquo;un site web interactif, une base de donn&eacute;es, consultable sur ANTARESDATABASE.COM, o&ugrave; vous trouverez par exemple des rapports de t&eacute;moins, des interrogatoires ou encore des donn&eacute;es personnelles des personnages.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h2>D&eacute;tective, un jeu d&rsquo;enqu&ecirc;te coop&eacute;ratif</h2>\r\n<div>D&eacute;tective est un jeu coop&eacute;ratif o&ugrave; les joueurs &oelig;uvrent en &eacute;quipe &agrave; la r&eacute;solution d&rsquo;une enqu&ecirc;te. Les jetons Comp&eacute;tence, Stress ou encore Autorit&eacute; sont partag&eacute;s par tous les joueurs et sont regroup&eacute;s en une r&eacute;serve de jetons commune. Les participants jouent, gagnent et perdent ensemble.</div>\r\n<div>&nbsp;</div>\r\n<h2>D&eacute;tective, un jeu divis&eacute; en campagne</h2>\r\n<div>D&eacute;tective se joue en diff&eacute;rentes campagnes. Le jeu compte au total 5 affaires distinctes, mais qui sont connect&eacute;es entre elles par une intrigue narrative plus vaste. Certains indices r&eacute;colt&eacute;s dans une enqu&ecirc;te pourront vous &ecirc;tre utiles dans une autre affaire. Soyez attentifs &agrave; chaque indice.&nbsp;</div>\r\n<div>Chaque enqu&ecirc;te est repr&eacute;sent&eacute;e sous la forme d&rsquo;un paquet de 36 cartes : 1 carte de couverture et 35 cartes Piste. Lors d&rsquo;une affaire, vous ne devez ni consulter ni m&eacute;langer ce paquet. Laissez-vous simplement guider par le jeu.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h2>D&eacute;tective, un jeu o&ugrave; le temps compte</h2>\r\n<div>D&eacute;tective souhaite retranscrire toutes les sensations d&rsquo;une enqu&ecirc;te en se rapprochant le plus possible de la r&eacute;alit&eacute;, avec ses avantages et ses contraintes.&nbsp;</div>\r\n<div>Pour r&eacute;soudre votre enqu&ecirc;te, vous disposerez donc d&rsquo;un nombre de jours limit&eacute;, pour collecter un maximum d&rsquo;indices.&nbsp;</div>\r\n<div>Chaque journ&eacute;e se divise en 8 heures de travail que vous d&eacute;penserez en effectuant vos actions.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h2>D&eacute;tective, le d&eacute;roulement d&rsquo;une journ&eacute;e</h2>\r\n<div>Dans D&eacute;tective, il n&rsquo;y a aucun tour sp&eacute;cifique &agrave; un joueur. Vous devrez vous concerter constamment pour savoir quelles actions seront collectivement r&eacute;alis&eacute;es. Au cours d&rsquo;une journ&eacute;e, vous serez amen&eacute;s &agrave; :</div>\r\n<div>\r\n<ul>\r\n<li>Suivre une Piste</li>\r\n<li>Approfondir</li>\r\n<li>Parcourir la base de donn&eacute;es d&rsquo;Antares</li>\r\n<li>Chercher sur Internet</li>\r\n<li>&Eacute;crire un rapport</li>\r\n<li>Utiliser une capacit&eacute; d&rsquo;un enqu&ecirc;teur</li>\r\n<li>Payer des jetons Autorit&eacute; pour r&eacute;aliser les actions indiqu&eacute;es sur une carte</li>\r\n<li>R&eacute;aliser une autre action, d&eacute;finie par l&rsquo;introduction de l&rsquo;affaire ou par une carte sp&eacute;cifique</li>\r\n</ul>\r\n</div>\r\n<h2>D&eacute;tective, le d&eacute;compte des points</h2>\r\n<div>&Agrave; la fin de la partie, lorsque le nombre de jours est &eacute;puis&eacute;, vous devrez r&eacute;pondre &agrave; une s&eacute;rie de questions du rapport final pour gagner des points de victoire. Des points obtenus d&eacute;pendent votre victoire ou votre d&eacute;faite.</div>\r\n<div>&nbsp;</div>\r\n<h2>D&eacute;tective, un jeu prim&eacute; &agrave; Cannes</h2>\r\n<div>Le jeu D&eacute;tective a obtenu l&rsquo;As d&rsquo;Or 2019 du Jeu de l&rsquo;Ann&eacute;e Expert, un prix qui r&eacute;compense les jeux destin&eacute;s &agrave; un public averti.&nbsp;&nbsp;</div>\r\n<div>&nbsp;</div>', 'Vous ne jouez pas à l’enquêteur, vous êtes un enquêteur !', 45, 4.2, 10, 'detective_wgNUA8ZNMAi4sdq36CgtMGAd6pCzDF.jpg', 'detective-1_0UF031gKd42FagCgb4ILI82U5qtWmZ.jpg', 'detective-2_bJ69gqlt4V5QcyjW81q6NzicvauyY2.jpg', 'detective-3_duCRxr15RbGtv0ERWzlYu40PCp5hjS.jpg', '', '', 4, 4, 1, 4, 3),
(25, 'The Vale of Eternity', '<div>\r\n<h2>Chassez et apprivoisez des cr&eacute;atures mythiques !</h2>\r\n</div>\r\n<div>Dans&nbsp;<strong>The Vale of Eternity</strong>, les joueurs sont des dompteurs qui chassent divers monstres et esprits pour les apprivoiser et en faire des serviteurs. Dans ce monde fantastique, de nombreuses cr&eacute;atures vivent en harmonie. Parmi elles, les dragons sont les plus pr&eacute;cieux et les plus nobles, et tous les dompteurs r&ecirc;vent de les apprivoiser. Le joueur qui r&eacute;ussit &agrave; apprivoiser le plus grand nombre de serviteurs gagne.</div>\r\n<p><br>Lors de chaque tour, le joueur dispose de trois phases :</p>\r\n<ul>\r\n<li>&nbsp;&nbsp;&nbsp; Phase de chasse : Il pioche deux cartes sur le plateau de jeu.</li>\r\n<li>&nbsp;&nbsp;&nbsp; Phase d\'action : Effectuer diverses actions, notamment vendre des cartes, apprivoiser ou invoquer des cartes.</li>\r\n<li>&nbsp;&nbsp;&nbsp; Phase de r&eacute;solution : Les joueurs utilisent les effets actifs des cartes qu\'ils ont invoqu&eacute;es.</li>\r\n</ul>\r\n<p>Les tours se succ&egrave;dent jusqu\'&agrave; ce que la fin du jeu soit d&eacute;clench&eacute;e. Le jeu comprend les cartes de soixante-dix cr&eacute;atures issues des mythes du monde entier.</p>', 'Devenez le plus grand dresseur de divinités !', 27, 4.6, 12, 'the-vale-of-eternity_2wXTegGif3PJgvJbF0ngyqulBfo3FD.jpg', 'the-vale-of-eternity-1_MecRsr96vPHBJFSApvjF7WSR5IorcN.jpg', 'the-vale-of-eternity-2_eg6JvUkTMgAvKJQ7r6u62MJsoBS36K.jpg', 'the-vale-of-eternity-3_NRKiSKbtuJpSONnLNpFrTcTHUIrky6.jpg', 'the-vale-of-eternity-4_MeeKCCUGyQN0CtmdJJrMgdCDJFTbqc.png', '', 3, 1, 1, 2, 4),
(26, 'Spirit Island', '<h2>Incarnez un esprit de la nature</h2>\r\n<div>Dans les contr&eacute;es &eacute;loign&eacute;es de notre monde, la magie existe toujours, incarn&eacute;e dans les esprits de la terre, du ciel et de la nature.</div>\r\n<div>&nbsp;</div>\r\n<p>Spirit Island&nbsp;est un jeu coop&eacute;ratif pour 1 &agrave; 4 joueurs dans lequel chaque joueur incarne un Esprit de la nature, d&eacute;fendant son &icirc;le contre des Envahisseurs qui n&rsquo;ont aucun &eacute;gard pour le bien &ecirc;tre de cette terre ou de ses habitants, les Dahans.</p>\r\n<div>&nbsp;</div>\r\n<h2>D&eacute;roulement d\'une partie</h2>\r\n<div>&Agrave; chaque tour, tous les Esprits jouent simultan&eacute;ment, utilisant leurs Pouvoirs pour repousser les Envahisseurs, d&eacute;fendre l&rsquo;&icirc;le, et venir en aide aux Dahans.&nbsp;</div>\r\n<div>Mais, des si&egrave;cles de qui&eacute;tude ont affaibli les Esprits qui commencent la lutte fragiles et limit&eacute;s. Ils devront vite regagner leurs pouvoirs afin de contenir ces Envahisseurs (g&eacute;r&eacute;s automatiquement par le jeu) qui progressent tr&egrave;s rapidement sur l&rsquo;&icirc;le et y &eacute;tablissent de nombreux campements, propageant toujours plus la Ruine dans leur sillage.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<h2>Fin de la partie</h2>\r\n<div>Pour l&rsquo;emporter, les Esprits, avec l&rsquo;aide des Dahans, devront d&eacute;truire ces Envahisseurs et chasser les &eacute;ventuels survivants.&nbsp;</div>\r\n<div>Cependant, si l&rsquo;&icirc;le succombe &agrave; la Ruine, si l&rsquo;un des Esprits est totalement d&eacute;truit ou si les Envahisseurs parviennent &agrave; b&acirc;tir des retranchements, l&rsquo;&icirc;le sera perdue, tout comme la partie.</div>', 'Coopérez pour chasser les envahisseurs..!', 78.9, 4.9, 12, 'spirit-island_7nHttayLC6zf7g3slvjOcSWgu15d65.jpg', 'spirit-island-1_IT2B5osTuzDXjRquJ6R4qVRuMlqv9F.jpg', 'spirit-island-2_f7hgbk78Kx8XqjRA1AKf30zZepyePx.jpg', 'spirit-island-3_Jp27bn5nElRgiFz4guZgdlCEBOM4xM.jpg', '', '', 5, 2, 1, 4, 5),
(27, 'Everdell', '<h2>Plongez au c&oelig;ur du royaume forestier d\'Everdell</h2>\r\n<div>Au fin fond du royaume d\'Everdell, se trouve une petite ville habit&eacute;e par des animaux forestiers qui se d&eacute;veloppe et prosp&egrave;re &agrave; travers les &acirc;ges.&nbsp;</div>\r\n<div>Malgr&eacute; un cadre idyllique, la vie n\'y est pas facile. Les hivers sont rudes et tous les habitants d\'Everdell luttent chaque ann&eacute;e pour construire le n&eacute;cessaire pour tenir jusqu\'au retour du printemps.</div>\r\n<div>&nbsp;</div>\r\n<div>Dans ce jeu de placement d\'ouvriers et de construction de tableaux, vous aurez des b&acirc;timents &agrave; construire, des personnages passionnants &agrave; rencontrer et des &eacute;v&eacute;nements &agrave; g&eacute;rer. Vous l\'aurez compris, vous ne vous ennuierez pas &agrave; Everdell.&nbsp;</div>\r\n<h2>D&eacute;veloppez le village avant l\'arriv&eacute;e de l\'hiver !</h2>\r\n<div>En tant que leader du village, vous aurez la lourde t&acirc;che de faire tout le n&eacute;cessaire pour que la vie des habitants soit assur&eacute;e pendant la saison hivernale.</div>\r\n<div>&nbsp;</div>\r\n<div>Au cours de la partie, les joueurs joueront &agrave; tour de r&ocirc;le. &Agrave; leur tour, les joueurs devront effectuer une action parmi les trois suivantes :</div>\r\n<div>\r\n<ul>\r\n<li>Placer un ouvrier&nbsp;: Vos travailleurs sont n&eacute;cessaires pour l\'expansion et le succ&egrave;s de votre ville. Vous les d&eacute;ploierez dans divers endroits &agrave; Everdell afin de rassembler des ressources, tirer plus de cartes, accueillir des &eacute;v&eacute;nements ou peut-&ecirc;tre pour vous lancer dans un voyage.</li>\r\n<li>Jouer une carte&nbsp;: Il existe deux types de cartes dans le jeu : Crit&egrave;res et Constructions. Vous jouerez ces cartes pour d&eacute;velopper votre ville.</li>\r\n<li>Action Saison&nbsp;: Cette action ne peut &ecirc;tre ex&eacute;cut&eacute;e qu\'une fois le placement de tous vos travailleurs effectu&eacute;. Quand tous vos ouvriers sont plac&eacute;s, vous pouvez choisir de continuer &agrave; jouer une carte ou effectuer l\'Action Saison, si vous pensez que vous &ecirc;tes pr&ecirc;t pour la saison prochaine.</li>\r\n</ul>\r\n<div>Everdell est un jeu de placement d\'ouvriers facile &agrave; apprendre et offrant une grande une profondeur strat&eacute;gique et une rejouabilit&eacute; sans fin.</div>\r\n</div>', 'Incarnez le leader d\'un village d\'animaux de la forêt...', 69.9, 4.9, 12, 'everdell_YXvzdxxkIqhtUkpW297OO933zMrjKL.jpg', 'everdell-1_ifvqWqpH0Caxpe88LYAulBh05bafLV.jpg', 'everdell-2_cjywA45KB6fwJNJVDKhEJtP9hn71Ht.jpg', 'everdell-3_1MznR8LPgyAhQNF8tHTVI06yS9SBKZ.jpg', '', '', 3, 2, 1, 2, 6),
(28, 'Little secret', '<h2>Et si vous &eacute;tiez l\'intrus... Depuis le d&eacute;but?</h2>\r\n<p>Le Grand Ma&icirc;tre organise une r&eacute;union : il souhaite v&eacute;rifier l\'appartenance des Disciples &agrave; son organisation secr&egrave;te. Il confie &agrave; tous les membres un mot de passe que seuls les Disciples peuvent comprendre, et ainsi d&eacute;masquer les Infiltr&eacute;s et Journaliste.</p>\r\n<div>&nbsp;</div>\r\n<p>Dans une partie de&nbsp;Little Secret, chaque joueur dispose d&rsquo;une carte mission comportant plusieurs mots de passe. Le Grand Ma&icirc;tre choisit le num&eacute;ro associ&eacute; &agrave; un mot avec lequel se d&eacute;roulera la partie.</p>\r\n<div>&nbsp;</div>\r\n<div>Un par un, chaque joueur donne un mot/adjectif qualifiant le mot de passe choisi, et votent ensuite pour la personne qu&rsquo;ils estiment avoir un mot diff&eacute;rent. Les joueurs ne savent pas dans quel camp ils appartiennent mais doivent bien s&ucirc;r essayer de le deviner en cours de partie. Pour les parties de 5 joueurs et plus, un &laquo; Journaliste &raquo; est aussi pr&eacute;sent dans le jeu. Ce dernier n&rsquo;a aucun mot de passe et doit deviner le mot majoritaire, celui des Disciples. Les Infiltr&eacute;s, eux, poss&egrave;dent un mot l&eacute;g&egrave;rement diff&eacute;rent de celui des Disciples.</div>\r\n<div>&nbsp;</div>\r\n<div>Des cartes pouvoirs changeront compl&egrave;tement le cours de la partie en attribuant &agrave; chaque joueur une caract&eacute;ristique.</div>', 'Et si vous étiez l\'intrus... depuis le début !', 20.9, 4.5, 25, 'little-secret_LCk4TqGDiB7enTwqXZk0UdVWjhbROq.jpg', 'little-secret-1_hlmWDZVjdgwpE6XPVyMjVNzFkPDU5i.jpg', 'little-secret-2_85fAY4eafyknHALJP6TwjZaL3ThLDx.jpg', 'little-secret-3_7rqN19I13eDsc8gC9aKKhIIyrNEfLc.jpg', '', '', 1, 5, 1, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `game_author_list`
--

DROP TABLE IF EXISTS `game_author_list`;
CREATE TABLE IF NOT EXISTS `game_author_list` (
  `game_author_list_id` int NOT NULL AUTO_INCREMENT,
  `id_game` int NOT NULL,
  `id_author` int NOT NULL,
  PRIMARY KEY (`game_author_list_id`),
  KEY `id_author` (`id_author`),
  KEY `id_product` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `game_author_list`
--

INSERT INTO `game_author_list` (`game_author_list_id`, `id_game`, `id_author`) VALUES
(1, 17, 1),
(2, 18, 2),
(3, 19, 3),
(4, 21, 6),
(7, 25, 7),
(8, 26, 8),
(9, 27, 9),
(10, 28, 10);

-- --------------------------------------------------------

--
-- Structure de la table `game_category_list`
--

DROP TABLE IF EXISTS `game_category_list`;
CREATE TABLE IF NOT EXISTS `game_category_list` (
  `product_category_list_id` int NOT NULL AUTO_INCREMENT,
  `id_game` int NOT NULL,
  `id_category` int NOT NULL,
  PRIMARY KEY (`product_category_list_id`),
  KEY `id_category` (`id_category`),
  KEY `id_product` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `game_category_list`
--

INSERT INTO `game_category_list` (`product_category_list_id`, `id_game`, `id_category`) VALUES
(3, 17, 1),
(4, 17, 2),
(5, 18, 1),
(6, 18, 2),
(7, 19, 3),
(8, 19, 4),
(9, 21, 4),
(12, 25, 1),
(13, 25, 6),
(14, 21, 5),
(15, 26, 2),
(16, 26, 1),
(17, 27, 1),
(18, 27, 7),
(19, 28, 8),
(20, 28, 7);

-- --------------------------------------------------------

--
-- Structure de la table `game_illustrator_list`
--

DROP TABLE IF EXISTS `game_illustrator_list`;
CREATE TABLE IF NOT EXISTS `game_illustrator_list` (
  `product_illustrator_list_id` int NOT NULL AUTO_INCREMENT,
  `id_illustrator` int NOT NULL,
  `id_game` int NOT NULL,
  PRIMARY KEY (`product_illustrator_list_id`),
  KEY `id_illustrator` (`id_illustrator`),
  KEY `id_product` (`id_game`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `game_illustrator_list`
--

INSERT INTO `game_illustrator_list` (`product_illustrator_list_id`, `id_illustrator`, `id_game`) VALUES
(1, 1, 17),
(2, 2, 18),
(3, 3, 19),
(4, 5, 21),
(7, 6, 25),
(8, 7, 25),
(9, 8, 26),
(10, 9, 27),
(11, 10, 27),
(12, 11, 28);

-- --------------------------------------------------------

--
-- Structure de la table `illustrator`
--

DROP TABLE IF EXISTS `illustrator`;
CREATE TABLE IF NOT EXISTS `illustrator` (
  `illustrator_id` int NOT NULL AUTO_INCREMENT,
  `illustrator_name` varchar(250) NOT NULL,
  PRIMARY KEY (`illustrator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `illustrator`
--

INSERT INTO `illustrator` (`illustrator_id`, `illustrator_name`) VALUES
(1, 'Klemens Franz'),
(2, 'Julien Delval'),
(3, 'Marco Armbruster'),
(4, 'Aga Jakimiec'),
(5, 'Rafał Szyma'),
(6, 'Stefano Martinuz'),
(7, 'Jiahui Eva Gao'),
(8, 'Cari Corene'),
(9, 'Andrew Bosley'),
(10, 'Dann May'),
(11, 'Joao');

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `languages_id` int NOT NULL AUTO_INCREMENT,
  `languages_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`languages_id`),
  UNIQUE KEY `language_name` (`languages_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`languages_id`, `languages_name`) VALUES
(1, 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter_list`
--

DROP TABLE IF EXISTS `newsletter_list`;
CREATE TABLE IF NOT EXISTS `newsletter_list` (
  `newsletter_list_id` int NOT NULL AUTO_INCREMENT,
  `newsletter_list_email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`newsletter_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `newsletter_list`
--

INSERT INTO `newsletter_list` (`newsletter_list_id`, `newsletter_list_email`) VALUES
(6, 'jean@jean.com'),
(7, 'henry@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `player_nb`
--

DROP TABLE IF EXISTS `player_nb`;
CREATE TABLE IF NOT EXISTS `player_nb` (
  `player_nb_id` int NOT NULL AUTO_INCREMENT,
  `player_nb_name` varchar(10) NOT NULL,
  PRIMARY KEY (`player_nb_id`),
  UNIQUE KEY `player_nb_name` (`player_nb_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `player_nb`
--

INSERT INTO `player_nb` (`player_nb_id`, `player_nb_name`) VALUES
(2, '1 à 4'),
(4, '1 à 5'),
(1, '2 à 4'),
(3, '3 à 5'),
(5, '4 et +');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_age_mini`) REFERENCES `age_mini` (`age_mini_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`id_player_nb`) REFERENCES `player_nb` (`player_nb_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`id_languages`) REFERENCES `languages` (`languages_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `game_ibfk_4` FOREIGN KEY (`id_duration`) REFERENCES `duration` (`duration_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `game_author_list`
--
ALTER TABLE `game_author_list`
  ADD CONSTRAINT `game_author_list_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`author_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `game_author_list_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `game` (`game_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `game_category_list`
--
ALTER TABLE `game_category_list`
  ADD CONSTRAINT `game_category_list_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `game_category_list_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `game` (`game_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `game_illustrator_list`
--
ALTER TABLE `game_illustrator_list`
  ADD CONSTRAINT `game_illustrator_list_ibfk_1` FOREIGN KEY (`id_illustrator`) REFERENCES `illustrator` (`illustrator_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `game_illustrator_list_ibfk_2` FOREIGN KEY (`id_game`) REFERENCES `game` (`game_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
