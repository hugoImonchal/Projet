-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2022 at 10:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `aimer`
--

CREATE TABLE `aimer` (
  `pseudo` varchar(20) NOT NULL,
  `Nom_genre` varchar(20) NOT NULL,
  `indice_appreciation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commenter`
--

CREATE TABLE `commenter` (
  `pseudo` varchar(20) NOT NULL,
  `IdFilm` int(11) NOT NULL,
  `Commentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etre`
--

CREATE TABLE `etre` (
  `IdFilm` int(11) NOT NULL,
  `Nom_genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etre_disponible`
--

CREATE TABLE `etre_disponible` (
  `IdFilm` int(11) NOT NULL,
  `Nom_plat` varchar(20) NOT NULL,
  `DateD` date DEFAULT NULL,
  `DateF` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etre_inscrit`
--

CREATE TABLE `etre_inscrit` (
  `pseudo` varchar(20) NOT NULL,
  `Nom_plat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `IdFilm` int(11) NOT NULL,
  `Titre` varchar(20) DEFAULT NULL,
  `Realisateur` varchar(20) DEFAULT NULL,
  `Annee` int(11) DEFAULT NULL,
  `Note_IMBD` int(11) DEFAULT NULL,
  `Note_utilisateur` int(11) DEFAULT NULL,
  `Affiche` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Nom_genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noter`
--

CREATE TABLE `noter` (
  `IdFilm` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `Note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plateforme`
--

CREATE TABLE `plateforme` (
  `Nom_plat` varchar(20) NOT NULL,
  `Prix` float DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `Est_moderateur` tinyint(1) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Mdp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `aimer`
--
ALTER TABLE `aimer`
  ADD PRIMARY KEY (`Nom_genre`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`pseudo`,`IdFilm`),
  ADD KEY `IdFilm` (`IdFilm`);

--
-- Indexes for table `etre`
--
ALTER TABLE `etre`
  ADD PRIMARY KEY (`IdFilm`,`Nom_genre`),
  ADD KEY `Nom_genre` (`Nom_genre`);

--
-- Indexes for table `etre_disponible`
--
ALTER TABLE `etre_disponible`
  ADD PRIMARY KEY (`IdFilm`,`Nom_plat`),
  ADD KEY `Nom_plat` (`Nom_plat`);

--
-- Indexes for table `etre_inscrit`
--
ALTER TABLE `etre_inscrit`
  ADD PRIMARY KEY (`pseudo`,`Nom_plat`),
  ADD KEY `Nom_plat` (`Nom_plat`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IdFilm`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Nom_genre`);

--
-- Indexes for table `noter`
--
ALTER TABLE `noter`
  ADD PRIMARY KEY (`IdFilm`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `plateforme`
--
ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`Nom_plat`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aimer`
--
ALTER TABLE `aimer`
  ADD CONSTRAINT `aimer_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`),
  ADD CONSTRAINT `aimer_ibfk_2` FOREIGN KEY (`Nom_genre`) REFERENCES `genre` (`Nom_genre`);

--
-- Constraints for table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`),
  ADD CONSTRAINT `commenter_ibfk_2` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`);

--
-- Constraints for table `etre`
--
ALTER TABLE `etre`
  ADD CONSTRAINT `etre_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`),
  ADD CONSTRAINT `etre_ibfk_2` FOREIGN KEY (`Nom_genre`) REFERENCES `genre` (`Nom_genre`);

--
-- Constraints for table `etre_disponible`
--
ALTER TABLE `etre_disponible`
  ADD CONSTRAINT `etre_disponible_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`),
  ADD CONSTRAINT `etre_disponible_ibfk_2` FOREIGN KEY (`Nom_plat`) REFERENCES `plateforme` (`Nom_plat`);

--
-- Constraints for table `etre_inscrit`
--
ALTER TABLE `etre_inscrit`
  ADD CONSTRAINT `etre_inscrit_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`),
  ADD CONSTRAINT `etre_inscrit_ibfk_2` FOREIGN KEY (`Nom_plat`) REFERENCES `plateforme` (`Nom_plat`);

--
-- Constraints for table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `noter_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`),
  ADD CONSTRAINT `noter_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
