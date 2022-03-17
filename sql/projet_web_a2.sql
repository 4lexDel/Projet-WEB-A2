-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 mars 2022 à 11:36
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
-- Base de données : `projet_web_a2`
--

-- --------------------------------------------------------

--
-- Structure de la table `applyfor`
--

CREATE TABLE `applyfor` (
  `idUser` int(11) NOT NULL,
  `idInternship` int(11) NOT NULL,
  `cv` text NOT NULL,
  `coverLetter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `belong`
--

CREATE TABLE `belong` (
  `idUser` int(11) NOT NULL,
  `idSchoolYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `idUser` int(11) NOT NULL
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
(15, 'Dassault', 8, 'Dassault@mail.com', 'Dassault', 63);

-- --------------------------------------------------------

--
-- Structure de la table `correspond`
--

CREATE TABLE `correspond` (
  `idCompany` int(11) NOT NULL,
  `idSector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `evaluate`
--

CREATE TABLE `evaluate` (
  `idUser` int(11) NOT NULL,
  `idCompany` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Structure de la table `need`
--

CREATE TABLE `need` (
  `idSkill` int(11) NOT NULL,
  `idInternship` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Structure de la table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `idSchoolYear` int(11) NOT NULL,
  `schoolYear` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idLocality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `userSecondName`, `userFirstName`, `login`, `password`, `idRole`) VALUES
(1, 'LAPORTE ', 'Xavier', 'xanax', 'azerty1234', 1),
(2, 'LECLERCQ ', 'Josselin', 'janax', 'jojo26-04', 2),
(3, 'PARENT ', 'Agrippin', 'agragra', 'dancer1', 3),
(4, 'LE BRUN ', 'Elise', 'lili', 'element', 2),
(5, 'THERY ', 'Venceslas', 'ventery', 'derrick', 2),
(6, 'JOLIVET ', 'Angeline', 'angolivet', 'coffee', 2),
(7, 'LECLERE ', 'Marcel', 'marcelet', 'grandma', 2),
(8, 'COLLIN ', 'Lorraine', 'lolote', 'always', 2),
(9, 'BONNEAU ', 'Japhet', 'jaket', 'ashleigh', 2),
(10, 'BAUDOUIN ', 'Acace', 'acaabi', '181818', 2),
(11, 'ARNOUX ', 'Fabrice', 'faaaaab', 'marshall', 2),
(12, 'DUPONT ', 'Thierry', 'titi', 'jason1', 2),
(13, 'GERMAIN ', 'Aubin', 'aubinbi', 'helena', 1),
(14, 'LEGROS ', 'Aglaé', 'aglagla', 'tanner', 2),
(15, 'DELARUE ', 'Lambert', 'lambo', 'theresa', 2),
(16, 'BLANCHARD ', 'Clémentine', 'clecle', 'sweet1', 2),
(17, 'PINEL ', 'Arcade', 'arcadinel', 'chinita', 2),
(18, 'SIMONNET ', 'Aymardine', 'aysimsim', 'alexandru', 2),
(19, 'GUIRAUD ', 'Jocelyne', 'jojo', 'mihaela', 2),
(20, 'COCHET ', 'Chrystèle', 'chrichri', 'trisha', 2),
(21, 'JAMES ', 'Timothée', 'timtim', 'mitchell', 2),
(22, 'LEBLOND ', 'Suzon', 'susu', 'love4ever', 2),
(23, 'JUNG ', 'Elisée', 'elis', '1234', 2),
(24, 'VIGIER ', 'Coralie', 'coco', 'shane', 2),
(25, 'BINET ', 'Diane', 'diaabinet', 'bulldog', 2),
(26, 'MAUGER ', 'Félix', 'femauger', 'brownie', 2),
(27, 'LE BRETON ', 'Priscille', 'pripri', 'thuglife', 3),
(28, 'BAPTISTE ', 'Pécine', 'pepe', 'amormio', 2),
(29, 'LATOUR ', 'Angélique', 'angelatour', 'margaret', 2),
(30, 'MARIN ', 'Amarynthe', 'amarin', 'calvin', 2),
(31, 'REBOUL ', 'Pollyanna', 'pollya', 'aquarius', 2),
(32, 'DUMAS ', 'Françoise', 'fanfan', 'phillip', 1),
(33, 'ROLLAND ', 'Apolline', 'apolland', 'kitty1', 2),
(34, 'RIGAL ', 'Dominique', 'domdom', 'morena', 2),
(35, 'BOUQUET ', 'Ameliane', 'amelia', 'heart', 2),
(36, 'MENAGER ', 'Sixte', 'sixmen', 'rosario', 2),
(37, 'CONTE ', 'Aquiline', 'aqonte', 'thumper', 2),
(38, 'DEVILLE ', 'Gaston', 'gasgas', 'marius', 2),
(39, 'CHARDON ', 'Théophraste', 'therdon', 'sammy1', 2),
(40, 'PETIT ', 'Roland', 'roletit', 'aaaaa', 2),
(41, 'PICARD ', 'Camillien', 'picam', 'yvonne', 1),
(42, 'TORRES ', 'Claudien', 'clauclo', 'panda', 2),
(43, 'BONNEFOY ', 'Achaire', 'achonne', 'lorraine', 2),
(44, 'BERTON ', 'Pacôme', 'pacerton', 'babycakes', 2),
(45, 'BOREL ', 'Bénigne', 'benorle', 'kaitlyn', 2),
(46, 'MARION ', 'Cyprien', 'cipcip', 'hayley', 2),
(47, 'AMIOT ', 'Arnaud', 'ameno', 'bigboy', 2),
(48, 'PIERRON ', 'Anastase', 'anierre', 'esther', 4),
(49, 'DENIS ', 'Grégoire', 'greg', 'gerrard', 3),
(50, 'BAILLY ', 'Olympe', 'ollailly', 'frances', 2),
(51, 'JACQUET ', 'Arnaud', 'anard', 'sexy123', 2),
(52, 'CHARBONNIER ', 'Aloys', 'aloyis', 'catarina', 2),
(53, 'DELCOURT ', 'Ulrich', 'delquoutre', 'archie', 2),
(54, 'COUDERT ', 'Martine', 'couverture', 'tweety1', 2),
(55, 'SAUVAGE ', 'Loup', 'chienne', 'danger', 3),
(56, 'BARTHE ', 'Brice', 'denice', 'rockme', 2),
(57, 'DURAND ', 'Léonne', 'lion', 'pickles', 2),
(58, 'AUBERT ', 'Anne', 'laure', 'marco', 2),
(59, 'MARTINEAU ', 'Guilhemine', 'gimelar', 'arnold', 2),
(60, 'RIBEIRO ', 'Eliane', 'patate', 'gregory', 2),
(61, 'GILLET ', 'Salomon', 'poisson', 'taylor1', 2),
(62, 'CONSTANT ', 'Abdonie', 'ukraine', 'brittney', 2),
(63, 'BRIAND ', 'Camille', 'camcam', 'superman1', 3),
(64, 'MONNET ', 'Eusèbe', 'meuh', 'babies', 2),
(65, 'REBOUL ', 'Orlane', 'orler', 'lorenzo', 2),
(66, 'MAGNIN ', 'Amandine', 'amagnin', 'hamster', 2),
(67, 'RAYMOND ', 'Dorothée', 'dodo', 'sofia', 2),
(68, 'GODIN ', 'Falba', 'fagodin', 'rocku', 2),
(69, 'MARCHAL ', 'Léonne', 'loulou', 'dominique', 2),
(70, 'BUISSON ', 'Arian', 'ariabi', 'jenjen', 2),
(71, 'THIBAULT ', 'Adonis', 'adibault', 'donkey', 2),
(72, 'MAUGER ', 'Athanase', 'athena', '11223344', 2),
(73, 'GONCALVES ', 'Lilou', 'lilgon', 'yasmin', 2),
(74, 'JANVIER ', 'Pascal', 'panvier', 'trevor', 4),
(75, 'HUET ', 'René', 'ruet', 'roxanne', 2),
(76, 'VIDAL ', 'Théodore', 'thete', 'audrey', 2),
(77, 'CHARTIER ', 'Arian', 'chartian', 'happiness', 1),
(78, 'LE CORRE ', 'William', 'willi', 'creative', 2),
(79, 'FOUCAULT ', 'Loïc', 'loilo', 'virginia', 2),
(80, 'FERRARI ', 'Ludivine', 'ludi', 'castillo', 2),
(81, 'BOUSQUET ', 'Joachim', 'jojolasticot', 'godisgood', 2),
(82, 'CADET ', 'Théophile', 'cadillac', 'chrissy', 2),
(83, 'DUPOUY ', 'Alcime', 'dupoulain', 'police', 2),
(84, 'HAMELIN ', 'Sylvain', 'hamelet', 'joyjoy', 2),
(85, 'HUARD ', 'Jocelyne', 'jhuard', 'giggles', 3),
(86, 'BAUDOIN ', 'Marina', 'badina', 'shorty1', 2),
(87, 'FAVIER ', 'Alcyone', 'sylicone', 'speedy', 2),
(88, 'SIMONIN ', 'Arsènie', 'arsenic', 'parker', 2),
(89, 'BLANCHET ', 'Méline', 'meticuleux', 'sports', 2),
(90, 'CHERON ', 'Yvette', 'yveline', 'italia', 2),
(91, 'PAYEN ', 'Pélagie', 'pepeg', 'cuddles', 2),
(92, 'BASTIEN ', 'Martine', 'mama', 'nadine', 4),
(93, 'LACOUR ', 'Audebert', 'aaaabc', 'tyler1', 2),
(94, 'BARRET ', 'Bruno', 'bibi', '1q2w3e4r', 2),
(95, 'VASSEUR ', 'Landry', 'lanlan', 'pelusa', 2),
(96, 'LACOSTE ', 'Anastasie', 'anastesique', 'beautiful1', 1),
(97, 'COSTE ', 'Méline', 'melia', 'boston', 4),
(98, 'HILAIRE ', 'Aymardine', 'hilare', 'summer1', 2),
(99, 'FAYOLLE ', 'Adéodat', 'fayot', '753951', 4),
(100, 'ARNOUX ', 'Pascal', 'pasca', 'black', 2),
(101, 'admin ', 'admin', 'admin', 'admin', 1);
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applyfor`
--
ALTER TABLE `applyfor`
  ADD PRIMARY KEY (`idUser`,`idInternship`),
  ADD KEY `applyFor_intership0_FK` (`idInternship`);

--
-- Index pour la table `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`idUser`,`idSchoolYear`),
  ADD KEY `belong_schoolYear0_FK` (`idSchoolYear`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idCompany`),
  ADD KEY `company_users_FK` (`idUser`);

--
-- Index pour la table `correspond`
--
ALTER TABLE `correspond`
  ADD PRIMARY KEY (`idCompany`,`idSector`),
  ADD KEY `correspond_sector0_FK` (`idSector`);

--
-- Index pour la table `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`idUser`,`idCompany`),
  ADD KEY `evaluate_company0_FK` (`idCompany`);

--
-- Index pour la table `intership`
--
ALTER TABLE `intership`
  ADD PRIMARY KEY (`idInternship`),
  ADD KEY `intership_company_FK` (`idCompany`),
  ADD KEY `intership_locality0_FK` (`idLocality`);

--
-- Index pour la table `locality`
--
ALTER TABLE `locality`
  ADD PRIMARY KEY (`idLocality`);

--
-- Index pour la table `locate`
--
ALTER TABLE `locate`
  ADD PRIMARY KEY (`idLocality`,`idCompany`),
  ADD KEY `locate_company0_FK` (`idCompany`);

--
-- Index pour la table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`idSkill`,`idInternship`),
  ADD KEY `need_intership0_FK` (`idInternship`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`idUser`,`idInternship`),
  ADD KEY `save_intership0_FK` (`idInternship`);

--
-- Index pour la table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`idSchoolYear`),
  ADD KEY `schoolYear_users_FK` (`idUser`),
  ADD KEY `schoolYear_locality0_FK` (`idLocality`);

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
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `users_role_FK` (`idRole`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `idCompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `intership`
--
ALTER TABLE `intership`
  MODIFY `idInternship` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idSchoolYear` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sector`
--
ALTER TABLE `sector`
  MODIFY `idSector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `idSkill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `applyfor`
--
ALTER TABLE `applyfor`
  ADD CONSTRAINT `applyFor_intership0_FK` FOREIGN KEY (`idInternship`) REFERENCES `intership` (`idInternship`),
  ADD CONSTRAINT `applyFor_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `belong_schoolYear0_FK` FOREIGN KEY (`idSchoolYear`) REFERENCES `schoolyear` (`idSchoolYear`),
  ADD CONSTRAINT `belong_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `correspond`
--
ALTER TABLE `correspond`
  ADD CONSTRAINT `correspond_company_FK` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idCompany`),
  ADD CONSTRAINT `correspond_sector0_FK` FOREIGN KEY (`idSector`) REFERENCES `sector` (`idSector`);

--
-- Contraintes pour la table `evaluate`
--
ALTER TABLE `evaluate`
  ADD CONSTRAINT `evaluate_company0_FK` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idCompany`),
  ADD CONSTRAINT `evaluate_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `intership`
--
ALTER TABLE `intership`
  ADD CONSTRAINT `intership_company_FK` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idCompany`),
  ADD CONSTRAINT `intership_locality0_FK` FOREIGN KEY (`idLocality`) REFERENCES `locality` (`idLocality`);

--
-- Contraintes pour la table `locate`
--
ALTER TABLE `locate`
  ADD CONSTRAINT `locate_company0_FK` FOREIGN KEY (`idCompany`) REFERENCES `company` (`idCompany`),
  ADD CONSTRAINT `locate_locality_FK` FOREIGN KEY (`idLocality`) REFERENCES `locality` (`idLocality`);

--
-- Contraintes pour la table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `need_intership0_FK` FOREIGN KEY (`idInternship`) REFERENCES `intership` (`idInternship`),
  ADD CONSTRAINT `need_skill_FK` FOREIGN KEY (`idSkill`) REFERENCES `skill` (`idSkill`);

--
-- Contraintes pour la table `save`
--
ALTER TABLE `save`
  ADD CONSTRAINT `save_intership0_FK` FOREIGN KEY (`idInternship`) REFERENCES `intership` (`idInternship`),
  ADD CONSTRAINT `save_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD CONSTRAINT `schoolYear_locality0_FK` FOREIGN KEY (`idLocality`) REFERENCES `locality` (`idLocality`),
  ADD CONSTRAINT `schoolYear_users_FK` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_FK` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
