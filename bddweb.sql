-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 mars 2022 à 23:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `applyfor`
--

CREATE TABLE `applyfor` (
  `idUser` int(11) NOT NULL,
  `idInternship` int(11) NOT NULL,
  `cv` text NOT NULL,
  `coverLetter` text NOT NULL,
  `step` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `applyfor`
--

INSERT INTO `applyfor` (`idUser`, `idInternship`, `cv`, `coverLetter`, `step`) VALUES
(101, 7, 'Le cv', 'La. Lettre', 1);

-- --------------------------------------------------------

--
-- Structure de la table `belong`
--

CREATE TABLE `belong` (
  `idUser` int(11) NOT NULL,
  `idSchoolYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `belong`
--

INSERT INTO `belong` (`idUser`, `idSchoolYear`) VALUES
(2, 3),
(3, 4),
(4, 5),
(5, 1),
(6, 2),
(7, 3),
(8, 4),
(9, 5),
(10, 1),
(11, 2),
(13, 4),
(14, 5),
(15, 1),
(16, 2),
(17, 3),
(18, 4),
(19, 5),
(20, 1),
(21, 2),
(22, 3),
(23, 4),
(24, 5),
(25, 1),
(26, 2),
(27, 3),
(28, 4),
(29, 5),
(30, 1),
(31, 2),
(32, 3),
(33, 4),
(34, 5),
(35, 1),
(36, 2),
(37, 3),
(38, 4),
(39, 5),
(40, 1),
(41, 2),
(42, 3),
(43, 4),
(44, 5),
(45, 1),
(46, 2),
(47, 3),
(48, 4),
(49, 5),
(50, 1),
(51, 2),
(52, 3),
(53, 4),
(54, 5),
(55, 1),
(56, 2),
(57, 3),
(58, 4),
(59, 5),
(60, 1),
(61, 2),
(62, 3),
(63, 4),
(64, 5),
(65, 1),
(66, 2),
(67, 3),
(68, 4),
(69, 5),
(70, 1),
(71, 2),
(72, 3),
(73, 4),
(74, 5),
(75, 1),
(76, 2),
(77, 3),
(78, 4),
(79, 5),
(80, 1),
(81, 2),
(82, 3),
(83, 4),
(84, 5),
(85, 1),
(86, 2),
(87, 3),
(88, 4),
(89, 5),
(90, 1),
(91, 2),
(92, 3),
(93, 4),
(94, 5),
(95, 1),
(96, 2),
(97, 3),
(98, 4),
(99, 5),
(100, 1);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `idCompany` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `nbCESIStudent` int(11) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `descCompany` text NOT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`idCompany`, `company`, `nbCESIStudent`, `eMail`, `descCompany`, `idUser`) VALUES
(1, 'DGA', 10, 'DGA@mail.com', 'DGA', 27),
(2, 'Airbus', 12, 'Airbus@mail.com', 'Airbus', 49),
(3, 'Sopra', 4, 'Sopra@mail.com', 'Sopra', 55),
(4, 'Accenture', 3, 'Accenture@mail.com', 'Accenture', 63),
(5, 'RTE', 12, 'RTE@mail.com', 'RTE', 85),
(6, 'IKEA', 7, 'IKEA@mail.com', 'IKEA', 27),
(7, 'Naval', 11, 'Naval@mail.com', 'Naval', 49),
(8, 'Altran', 14, 'Altran@mail.com', 'Altran', 55),
(9, 'Renault', 23, 'Renault@mail.com', 'Renault', 63),
(10, 'NordVPN', 3, 'NordVPN@mail.com', 'NordVPN', 85),
(11, 'Capgemini', 14, 'Capgemini@mail.com', 'Capgemini', 27),
(12, 'EVEA', 12, 'EVEA@mail.com', 'EVEA', 49),
(13, 'Steam', 10, 'Steam@mail.com', 'Steam', 55),
(14, 'Yirah', 5, 'Yirah@mail.com', 'Yirah', 55),
(15, 'Dassault', 8, 'Dassault@mail.com', 'Dassault', 63),
(26, 'Airbus', 0, 'airbus@gmail.com', '', 123),
(36, 'test', 0, 'ddd@d', 'sd', 23),
(44, 'STX', 0, 'stx@yo.com', 'Les chantiers de St nazaire ', 101);

-- --------------------------------------------------------

--
-- Structure de la table `correspond`
--

CREATE TABLE `correspond` (
  `idCompany` int(11) NOT NULL,
  `idSector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `correspond`
--

INSERT INTO `correspond` (`idCompany`, `idSector`) VALUES
(1, 9),
(2, 10),
(3, 1),
(4, 6),
(5, 3),
(6, 10),
(7, 6),
(8, 2),
(9, 4),
(10, 1),
(11, 1),
(12, 3),
(13, 9),
(14, 8),
(15, 2),
(36, 1),
(44, 1),
(44, 6);

-- --------------------------------------------------------

--
-- Structure de la table `evaluate`
--

CREATE TABLE `evaluate` (
  `idUser` int(11) NOT NULL,
  `idCompany` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evaluate`
--

INSERT INTO `evaluate` (`idUser`, `idCompany`, `grade`) VALUES
(23, 1, 5),
(23, 2, 5),
(23, 5, 5),
(23, 6, 1),
(23, 7, 3),
(23, 9, 1),
(23, 10, 4),
(23, 11, 5),
(23, 12, 5),
(23, 15, 2),
(23, 36, 4),
(101, 2, 5),
(101, 6, 5),
(101, 7, 5),
(101, 8, 5),
(101, 9, 3),
(101, 10, 4),
(101, 11, 1),
(101, 14, 4),
(101, 36, 2),
(133, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `intership`
--

CREATE TABLE `intership` (
  `idInternship` int(11) NOT NULL,
  `intership` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `WageMonth` float NOT NULL,
  `releaseDate` date NOT NULL,
  `nbPlace` int(11) NOT NULL,
  `descInternship` text NOT NULL,
  `idCompany` int(11) NOT NULL,
  `idLocality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `intership`
--

INSERT INTO `intership` (`idInternship`, `intership`, `startDate`, `endDate`, `WageMonth`, `releaseDate`, `nbPlace`, `descInternship`, `idCompany`, `idLocality`) VALUES
(1, 'NOM', '2022-04-04', '2022-07-04', 600, '2022-02-02', 3, 'Cannabis (les cannabis) est un genre botanique qui rassemble des plantes annuelles de la famille des Cannabaceae. Ce sont toutes des plantes originaires d\'Asie centrale ou d\'Asie du Sud. La classification dans ce genre est encore discutée. Selon la majorité des auteurs il contiendrait une seule espèce, le Chanvre cultivé (Cannabis sativa L.), parfois subdivisée en plusieurs sous-espèces1, généralement sativa, indica et ruderalis (syn. spontanea), tandis que d\'autres considèrent que ce sont de simples variétés. Les plantes riches en fibres et pauvres en Tétrahydrocannabinol (THC) donnent le « chanvre agricole » qui pousse dans les zones tempérées, exploité pour ses sous-produits (fibres, graines...) aux usages industriels variés, tandis que le « chanvre indien », qui pousse en climat équatorial, est au contraire très riche en résine et exploité pour ses propriétés médicales et psychotropes.', 6, 12),
(2, 'NOM', '2022-04-29', '2022-09-29', 700, '2022-02-02', 1, 'A remplir', 15, 20),
(4, 'NOM', '2022-05-24', '2022-11-24', 800, '2022-02-02', 3, 'A remplir', 8, 20),
(5, 'NOM', '2022-05-01', '2022-08-01', 1000, '2022-02-02', 3, 'A remplir', 1, 1),
(6, 'NOM', '2022-06-14', '2022-11-29', 800, '2022-02-02', 3, 'A remplir', 3, 28),
(7, 'NOM', '2022-08-04', '2022-09-14', 1, '2022-02-02', 2, 'A remplir', 11, 8),
(8, 'NOM', '2022-04-27', '2022-07-27', 777, '2022-02-02', 2, 'A remplir', 2, 3),
(9, 'NOM', '2022-05-14', '2022-11-11', 666, '2022-02-02', 3, 'A remplir', 7, 11),
(10, 'NOM', '2022-05-01', '2022-06-01', 25, '2022-02-02', 1, 'A remplir', 10, 7),
(21, 'qsvegreh', '2022-03-01', '2022-03-05', 3, '2022-03-28', 1, 'i', 36, 1),
(22, 'qsvegreh', '0001-11-11', '0000-00-00', 2222, '2022-03-28', 2, '2', 36, 1),
(23, 'qsvegreh', '0001-11-11', '0002-02-22', 2, '2022-03-28', 2, '2', 36, 1),
(24, 'qsvegreh', '0001-11-11', '0002-02-22', 2, '2022-03-28', 2, '2', 36, 1),
(25, 'qsvegreh', '0001-11-11', '0002-02-22', 2, '2022-03-28', 2, '2', 36, 1),
(35, 'Dev Java', '2022-03-11', '2022-03-30', 66, '2022-03-30', 1, 'Dev', 44, 1);

-- --------------------------------------------------------

--
-- Structure de la table `locality`
--

CREATE TABLE `locality` (
  `idLocality` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `locality`
--

INSERT INTO `locality` (`idLocality`, `city`) VALUES
(1, 'Nantes'),
(2, 'Paris'),
(3, 'Lyon'),
(4, 'Rouen'),
(5, 'St-Nazaire'),
(6, 'Marseille'),
(7, 'Toulouse'),
(8, 'Metz'),
(9, 'Calais'),
(10, 'St-Herblain'),
(11, 'Brest'),
(12, 'Angers'),
(13, 'Reims'),
(14, 'Limoge'),
(15, 'Sautron'),
(16, 'St-Etienne'),
(17, 'Montpellier'),
(18, 'Strasbourg'),
(19, 'Nice'),
(20, 'Nîmes'),
(21, 'Grenoble'),
(22, 'Le Havre'),
(23, 'Toulon'),
(24, 'Rennes'),
(25, 'Lille'),
(26, 'Bordeaux'),
(27, 'Dijon'),
(28, 'Tours'),
(29, 'Orléans'),
(30, 'Caen');

-- --------------------------------------------------------

--
-- Structure de la table `locate`
--

CREATE TABLE `locate` (
  `idLocality` int(11) NOT NULL,
  `idCompany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `locate`
--

INSERT INTO `locate` (`idLocality`, `idCompany`) VALUES
(1, 1),
(2, 9),
(2, 36),
(3, 2),
(5, 44),
(7, 10),
(8, 11),
(11, 7),
(12, 6),
(13, 4),
(17, 12),
(20, 8),
(20, 15),
(21, 5),
(25, 13),
(27, 14),
(28, 3);

-- --------------------------------------------------------

--
-- Structure de la table `need`
--

CREATE TABLE `need` (
  `idSkill` int(11) NOT NULL,
  `idInternship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `need`
--

INSERT INTO `need` (`idSkill`, `idInternship`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 6),
(1, 7),
(1, 9),
(1, 35),
(3, 1),
(3, 4),
(3, 6),
(3, 8),
(3, 9),
(4, 35),
(5, 1),
(5, 5),
(5, 6),
(5, 8),
(5, 10),
(5, 33),
(6, 35),
(7, 2),
(7, 5),
(7, 7),
(7, 8),
(7, 10),
(7, 35),
(9, 2),
(9, 4),
(9, 5),
(9, 7),
(9, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `role`) VALUES
(1, 'Administrateur'),
(2, 'Etudiant'),
(3, 'Pilote'),
(4, 'Délégué');

-- --------------------------------------------------------

--
-- Structure de la table `save`
--

CREATE TABLE `save` (
  `idUser` int(11) NOT NULL,
  `idInternship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `save`
--

INSERT INTO `save` (`idUser`, `idInternship`) VALUES
(101, 6);

-- --------------------------------------------------------

--
-- Structure de la table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `idSchoolYear` int(11) NOT NULL,
  `schoolYear` varchar(50) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idLocality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `schoolyear`
--

INSERT INTO `schoolyear` (`idSchoolYear`, `schoolYear`, `idUser`, `idLocality`) VALUES
(1, 'CPI A2 INFO', 1, 5),
(2, 'CPIA2 GENE', 12, 5),
(3, 'CPI A1', 45, 5),
(4, 'CPI A3 FISE GENE', 66, 5),
(5, 'CPI A3 FISA INFO', 72, 5);

-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

CREATE TABLE `sector` (
  `idSector` int(11) NOT NULL,
  `sector` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sector`
--

INSERT INTO `sector` (`idSector`, `sector`) VALUES
(1, 'Informatique'),
(2, 'Aviation'),
(3, 'Conseil'),
(4, 'Automobile'),
(5, 'Armée'),
(6, 'Marine'),
(7, 'Energie'),
(8, 'Commerce'),
(9, 'Gaming'),
(10, 'Spatial');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `idSkill` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`idSkill`, `skill`) VALUES
(1, 'autonome'),
(2, 'php'),
(3, 'structure des matériaux'),
(4, 'C++'),
(5, 'MySql'),
(6, 'Word'),
(7, 'Excel'),
(8, 'Réseau'),
(9, 'GitHub'),
(10, 'html');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `userSecondName` varchar(50) NOT NULL,
  `userFirstName` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `idRole` int(11) NOT NULL,
  `rank` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `userSecondName`, `userFirstName`, `login`, `password`, `idRole`, `rank`) VALUES
(2, 'LECLERCQ ', 'Josselin', 'janax', 'jojo26-04', 2, 1),
(3, 'PARENT ', 'Agrippin', 'agragra', 'dancer1', 3, 1),
(4, 'LE BRUN ', 'Elise', 'lili', 'element', 2, 1),
(5, 'THERY ', 'Venceslas', 'ventery', 'derrick', 2, 1),
(6, 'JOLIVET ', 'Angeline', 'angolivet', 'coffee', 2, 1),
(7, 'LECLERE ', 'Marcel', 'marcelet', 'grandma', 2, 1),
(8, 'COLLIN ', 'Lorraine', 'lolote', 'always', 2, 1),
(9, 'BONNEAU ', 'Japhet', 'jaket', 'ashleigh', 2, 1),
(10, 'BAUDOUIN ', 'Acace', 'acaabi', '181818', 2, 1),
(11, 'ARNOUX ', 'Fabrice', 'faaaaab', 'marshall', 2, 1),
(12, 'DUPONT ', 'Thierry', 'titi', 'jason1', 2, 1),
(13, 'GERMAIN ', 'Aubin', 'aubinbi', 'helena', 1, 1),
(14, 'LEGROS ', 'Aglaé', 'aglagla', 'tanner', 2, 1),
(15, 'DELARUE ', 'Lambert', 'lambo', 'theresa', 2, 1),
(16, 'BLANCHARD ', 'Clémentine', 'clecle', 'sweet1', 2, 1),
(17, 'PINEL ', 'Arcade', 'arcadinel', 'chinita', 2, 1),
(18, 'SIMONNET ', 'Aymardine', 'aysimsim', 'alexandru', 2, 1),
(19, 'GUIRAUD ', 'Jocelyne', 'jojo', 'mihaela', 2, 1),
(20, 'COCHET ', 'Chrystèle', 'chrichri', 'trisha', 2, 1),
(21, 'JAMES ', 'Timothée', 'timtim', 'mitchell', 2, 1),
(22, 'LEBLOND ', 'Suzon', 'susu', 'love4ever', 2, 1),
(23, 'JUNG ', 'Elisée', 'elis', '1234', 2, 1),
(24, 'VIGIER ', 'Coralie', 'coco', 'shane', 2, 1),
(25, 'BINET ', 'Diane', 'diaabinet', 'bulldog', 2, 1),
(26, 'MAUGER ', 'Félix', 'femauger', 'brownie', 2, 1),
(27, 'LE BRETON ', 'Priscille', 'pripri', 'thuglife', 3, 1),
(28, 'BAPTISTE ', 'Pécine', 'pepe', 'amormio', 2, 1),
(29, 'LATOUR ', 'Angélique', 'angelatour', 'margaret', 2, 1),
(30, 'MARIN ', 'Amarynthe', 'amarin', 'calvin', 2, 1),
(31, 'REBOUL ', 'Pollyanna', 'pollya', 'aquarius', 2, 1),
(32, 'DUMAS ', 'Françoise', 'fanfan', 'phillip', 1, 1),
(33, 'ROLLAND ', 'Apolline', 'apolland', 'kitty1', 2, 1),
(34, 'RIGAL ', 'Dominique', 'domdom', 'morena', 2, 1),
(35, 'BOUQUET ', 'Ameliane', 'amelia', 'heart', 2, 1),
(36, 'MENAGER ', 'Sixte', 'sixmen', 'rosario', 2, 1),
(37, 'CONTE ', 'Aquiline', 'aqonte', 'thumper', 2, 1),
(38, 'DEVILLE ', 'Gaston', 'gasgas', 'marius', 2, 1),
(39, 'CHARDON ', 'Théophraste', 'therdon', 'sammy1', 2, 1),
(40, 'PETIT ', 'Roland', 'roletit', 'aaaaa', 2, 1),
(41, 'PICARD ', 'Camillien', 'picam', 'yvonne', 1, 1),
(42, 'TORRES ', 'Claudien', 'clauclo', 'panda', 2, 1),
(43, 'BONNEFOY ', 'Achaire', 'achonne', 'lorraine', 2, 1),
(44, 'BERTON ', 'Pacôme', 'pacerton', 'babycakes', 2, 1),
(45, 'BOREL ', 'Bénigne', 'benorle', 'kaitlyn', 2, 1),
(46, 'MARION ', 'Cyprien', 'cipcip', 'hayley', 2, 1),
(47, 'AMIOT ', 'Arnaud', 'ameno', 'bigboy', 2, 1),
(48, 'PIERRON ', 'Anastase', 'anierre', 'esther', 4, 3),
(49, 'DENIS ', 'Grégoire', 'greg', 'gerrard', 3, 1),
(50, 'BAILLY ', 'Olympe', 'ollailly', 'frances', 2, 1),
(51, 'JACQUET ', 'Arnaud', 'anard', 'sexy123', 2, 1),
(52, 'CHARBONNIER ', 'Aloys', 'aloyis', 'catarina', 2, 1),
(53, 'DELCOURT ', 'Ulrich', 'delquoutre', 'archie', 2, 1),
(54, 'COUDERT ', 'Martine', 'couverture', 'tweety1', 2, 1),
(55, 'SAUVAGE ', 'Loup', 'chienne', 'danger', 3, 1),
(56, 'BARTHE ', 'Brice', 'denice', 'rockme', 2, 1),
(57, 'DURAND ', 'Léonne', 'lion', 'pickles', 2, 1),
(58, 'AUBERT ', 'Anne', 'laure', 'marco', 2, 1),
(59, 'MARTINEAU ', 'Guilhemine', 'gimelar', 'arnold', 2, 1),
(60, 'RIBEIRO ', 'Eliane', 'patate', 'gregory', 2, 1),
(61, 'GILLET ', 'Salomon', 'poisson', 'taylor1', 2, 1),
(62, 'CONSTANT ', 'Abdonie', 'ukraine', 'brittney', 2, 1),
(63, 'BRIAND ', 'Camille', 'camcam', 'superman1', 3, 1),
(64, 'MONNET ', 'Eusèbe', 'meuh', 'babies', 2, 1),
(65, 'REBOUL ', 'Orlane', 'orler', 'lorenzo', 2, 1),
(66, 'MAGNIN ', 'Amandine', 'amagnin', 'hamster', 2, 1),
(67, 'RAYMOND ', 'Dorothée', 'dodo', 'sofia', 2, 1),
(68, 'GODIN ', 'Falba', 'fagodin', 'rocku', 2, 1),
(69, 'MARCHAL ', 'Léonne', 'loulou', 'dominique', 2, 1),
(70, 'BUISSON ', 'Arian', 'ariabi', 'jenjen', 2, 1),
(71, 'THIBAULT ', 'Adonis', 'adibault', 'donkey', 2, 1),
(72, 'MAUGER ', 'Athanase', 'athena', '11223344', 2, 1),
(73, 'GONCALVES ', 'Lilou', 'lilgon', 'yasmin', 2, 1),
(74, 'JANVIER ', 'Pascal', 'panvier', 'trevor', 4, 1),
(75, 'HUET ', 'René', 'ruet', 'roxanne', 2, 1),
(76, 'VIDAL ', 'Théodore', 'thete', 'audrey', 2, 1),
(77, 'CHARTIER ', 'Arian', 'chartian', 'happiness', 1, 1),
(78, 'LE CORRE ', 'William', 'willi', 'creative', 2, 1),
(79, 'FOUCAULT ', 'Loïc', 'loilo', 'virginia', 2, 1),
(80, 'FERRARI ', 'Ludivine', 'ludi', 'castillo', 2, 1),
(81, 'BOUSQUET ', 'Joachim', 'jojolasticot', 'godisgood', 2, 1),
(82, 'CADET ', 'Théophile', 'cadillac', 'chrissy', 2, 1),
(83, 'DUPOUY ', 'Alcime', 'dupoulain', 'police', 2, 1),
(84, 'HAMELIN ', 'Sylvain', 'hamelet', 'joyjoy', 2, 1),
(85, 'HUARD ', 'Jocelyne', 'jhuard', 'giggles', 3, 1),
(86, 'BAUDOIN ', 'Marina', 'badina', 'shorty1', 2, 1),
(87, 'FAVIER ', 'Alcyone', 'sylicone', 'speedy', 2, 1),
(88, 'SIMONIN ', 'Arsènie', 'arsenic', 'parker', 2, 1),
(89, 'BLANCHET ', 'Méline', 'meticuleux', 'sports', 2, 1),
(90, 'CHERON ', 'Yvette', 'yveline', 'italia', 2, 1),
(91, 'PAYEN ', 'Pélagie', 'pepeg', 'cuddles', 2, 1),
(92, 'BASTIEN ', 'Martine', 'mama', 'nadine', 4, 1),
(93, 'LACOUR ', 'Audebert', 'aaaabc', 'tyler1', 2, 1),
(94, 'BARRET ', 'Bruno', 'bibi', '1q2w3e4r', 2, 1),
(95, 'VASSEUR ', 'Landry', 'lanlan', 'pelusa', 2, 1),
(96, 'LACOSTE ', 'Anastasie', 'anastesique', 'beautiful1', 1, 1),
(97, 'COSTE ', 'Méline', 'melia', 'boston', 4, 1),
(98, 'HILAIRE ', 'Aymardine', 'hilare', 'summer1', 2, 1),
(99, 'FAYOLLE ', 'Adéodat', 'fayot', '753951', 4, 1),
(100, 'ARNOUX ', 'Pascal', 'pasca', 'black', 2, 1),
(101, 'admin ', 'admin', 'admin', 'admin', 1, 1),
(133, 'oui', 'non', 'modo', 'modo', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applyfor`
--
ALTER TABLE `applyfor`
  ADD PRIMARY KEY (`idUser`,`idInternship`);

--
-- Index pour la table `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`idUser`,`idSchoolYear`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idCompany`);

--
-- Index pour la table `correspond`
--
ALTER TABLE `correspond`
  ADD PRIMARY KEY (`idCompany`,`idSector`);

--
-- Index pour la table `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`idUser`,`idCompany`);

--
-- Index pour la table `intership`
--
ALTER TABLE `intership`
  ADD PRIMARY KEY (`idInternship`);

--
-- Index pour la table `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`idLocality`);

--
-- Index pour la table `locate`
--
ALTER TABLE `locate`
  ADD PRIMARY KEY (`idLocality`,`idCompany`);

--
-- Index pour la table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`idSkill`,`idInternship`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`idUser`,`idInternship`);

--
-- Index pour la table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`idSchoolYear`);

--
-- Index pour la table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`idSector`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`idSkill`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `idCompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `intership`
--
ALTER TABLE `intership`
  MODIFY `idInternship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `locality`
--
ALTER TABLE `locality`
  MODIFY `idLocality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `idSchoolYear` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sector`
--
ALTER TABLE `sector`
  MODIFY `idSector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `idSkill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Contraintes pour les tables déchargées
--


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
