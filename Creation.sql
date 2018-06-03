-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2018 at 05:47 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetTest`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `idAdmin` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`idAdmin`, `idMembre`) VALUES
(1, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Equipe`
--

CREATE TABLE `Equipe` (
  `idEquipe` int(11) NOT NULL,
  `nomEquipe` varchar(50) NOT NULL,
  `qualifEquipe` tinyint(1) NOT NULL DEFAULT '1',
  `idTournoi` int(11) NOT NULL,
  `nbMatchJoue` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Equipe`
--

INSERT INTO `Equipe` (`idEquipe`, `nomEquipe`, `qualifEquipe`, `idTournoi`, `nbMatchJoue`) VALUES
(13, 'Argentine', 0, 1, 1),
(26, 'Colombie', 0, 1, 1),
(27, 'Espagne', 0, 1, 2),
(28, 'Allemagne', 1, 1, 0),
(29, 'Angleterre', 1, 1, 0),
(30, 'Pérou', 1, 1, 0),
(31, 'Tunisie', 1, 1, 0),
(40, 'France', 1, 1, 1),
(43, 'Italie', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Membre`
--

CREATE TABLE `Membre` (
  `idMembre` int(11) NOT NULL,
  `pseudoMembre` varchar(255) NOT NULL,
  `passMembre` varchar(255) NOT NULL,
  `mailMembre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Membre`
--

INSERT INTO `Membre` (`idMembre`, `pseudoMembre`, `passMembre`, `mailMembre`) VALUES
(1, 'Maxime', '$2y$10$7NBPpBeO2uofvTPU.WGqS.0yfayagd0XAcNyCGDP.7V5p1LiXy7.y', 'maxcarin@hotmail.fr'),
(2, 'Membre', '$2y$10$CWU561SSBVpVqBDcKwYUvOVfoebbpyos9IDRHR/ruP9eR/vgQzHPS', 'membre@membre.com'),
(3, 'admin', '$2y$10$2zULIT6KPf6Ly3fPskEutOq5d32tgLNtwMFGGWTtKFl3SAb29Lkm6', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `Partie`
--

CREATE TABLE `Partie` (
  `idPartie` int(11) NOT NULL,
  `idGagnantPartie` int(11) NOT NULL,
  `idTournoi` int(11) NOT NULL,
  `idEquipe1` int(11) NOT NULL,
  `idEquipe2` int(11) NOT NULL,
  `scoreEquipe1` int(11) NOT NULL,
  `scoreEquipe2` int(11) NOT NULL,
  `tourPartie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Partie`
--

INSERT INTO `Partie` (`idPartie`, `idGagnantPartie`, `idTournoi`, `idEquipe1`, `idEquipe2`, `scoreEquipe1`, `scoreEquipe2`, `tourPartie`) VALUES
(20, 40, 1, 40, 13, 2, 1, 4),
(21, 27, 1, 26, 27, 1, 2, 4),
(22, 6, 1, 6, 27, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Tournoi`
--

CREATE TABLE `Tournoi` (
  `idTournoi` int(11) NOT NULL,
  `nomTournoi` varchar(255) NOT NULL,
  `lieuTournoi` varchar(255) NOT NULL,
  `nbEquipesTournoi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tournoi`
--

INSERT INTO `Tournoi` (`idTournoi`, `nomTournoi`, `lieuTournoi`, `nbEquipesTournoi`) VALUES
(1, 'Copa del Mundo', 'Espagne', 8);

--
-- Triggers `Tournoi`
--
DELIMITER $$
CREATE TRIGGER `DeleteET` AFTER DELETE ON `Tournoi` FOR EACH ROW BEGIN
    DELETE
    FROM Equipe
    WHERE OLD.idTournoi = Equipe.idTournoi;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DeletePT` BEFORE DELETE ON `Tournoi` FOR EACH ROW BEGIN
	DELETE
    FROM Partie
    WHERE OLD.idTournoi = Partie.idTournoi;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `Equipe`
--
ALTER TABLE `Equipe`
  ADD PRIMARY KEY (`idEquipe`),
  ADD KEY `deleteTournoi` (`idTournoi`);

--
-- Indexes for table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Indexes for table `Partie`
--
ALTER TABLE `Partie`
  ADD PRIMARY KEY (`idPartie`),
  ADD KEY `deleteTournoiPartie` (`idTournoi`);

--
-- Indexes for table `Tournoi`
--
ALTER TABLE `Tournoi`
  ADD PRIMARY KEY (`idTournoi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Equipe`
--
ALTER TABLE `Equipe`
  MODIFY `idEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Partie`
--
ALTER TABLE `Partie`
  MODIFY `idPartie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `Tournoi`
--
ALTER TABLE `Tournoi`
  MODIFY `idTournoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;