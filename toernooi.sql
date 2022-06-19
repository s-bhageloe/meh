-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 jan 2022 om 02:35
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toernooi`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanmelding`
--

CREATE TABLE `aanmelding` (
  `aanmeldingsID` int(11) NOT NULL,
  `spelerID` int(11) DEFAULT NULL,
  `toernooiID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aanmelding`
--

INSERT INTO `aanmelding` (`aanmeldingsID`, `spelerID`, `toernooiID`) VALUES
(1, 3, 4),
(2, 9, 1),
(4, 8, 3),
(5, 10, 3),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `scholen`
--

CREATE TABLE `scholen` (
  `schoolID` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `scholen`
--

INSERT INTO `scholen` (`schoolID`, `naam`) VALUES
(1, 'ROC de Leijgraaf'),
(2, 'ROC van Amsterdam'),
(3, 'Drenthe College'),
(13, 'Berlage College Noord'),
(14, 'ROC Noordoost'),
(15, 'ROC Rai'),
(16, 'Overijsel College'),
(17, 'Groningse TOP'),
(18, 'ROC TOP'),
(19, 'ROC Inholland'),
(20, 'openingsWedstrijd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spelers`
--

CREATE TABLE `spelers` (
  `spelerID` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) NOT NULL,
  `schoolID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `spelers`
--

INSERT INTO `spelers` (`spelerID`, `voornaam`, `tussenvoegsel`, `achternaam`, `schoolID`) VALUES
(1, 'Chakir', '-', 'Mejdoubi', 2),
(2, 'Sameer', NULL, 'Bhageloe', 2),
(3, 'tessa', 'Da', 'Vinci', 1),
(7, 'lisa', 'van', 'berg', 15),
(8, 'thomas', '-', 'manks', 14),
(9, 'richard', '-', 'waers', 1),
(10, 'qucee', 'van de', 'maker', 1),
(11, 'nassim', 'el', 'hauoie', 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toernooien`
--

CREATE TABLE `toernooien` (
  `toernooiID` int(11) NOT NULL,
  `omschrijving` varchar(255) DEFAULT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `toernooien`
--

INSERT INTO `toernooien` (`toernooiID`, `omschrijving`, `datum`) VALUES
(1, 'openingsWedstrijden', '2022-01-27'),
(3, '1ste wedstrijd van de maand', '2022-01-29'),
(4, 'vriendschappelijk', '2022-02-02');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wedstrijd`
--

CREATE TABLE `wedstrijd` (
  `wedstrijdsID` int(11) NOT NULL,
  `toernooiID` int(11) DEFAULT NULL,
  `ronde` int(11) NOT NULL,
  `speler1ID` int(11) DEFAULT NULL,
  `speler2ID` int(11) DEFAULT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `winnaarsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  ADD PRIMARY KEY (`aanmeldingsID`),
  ADD KEY `spelerID` (`spelerID`),
  ADD KEY `toernooiID` (`toernooiID`);

--
-- Indexen voor tabel `scholen`
--
ALTER TABLE `scholen`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexen voor tabel `spelers`
--
ALTER TABLE `spelers`
  ADD PRIMARY KEY (`spelerID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexen voor tabel `toernooien`
--
ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`toernooiID`);

--
-- Indexen voor tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  ADD PRIMARY KEY (`wedstrijdsID`),
  ADD KEY `toernooiID` (`toernooiID`),
  ADD KEY `speler1ID` (`speler1ID`),
  ADD KEY `speler2ID` (`speler2ID`),
  ADD KEY `winnaarsID` (`winnaarsID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  MODIFY `aanmeldingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `scholen`
--
ALTER TABLE `scholen`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `spelers`
--
ALTER TABLE `spelers`
  MODIFY `spelerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `toernooien`
--
ALTER TABLE `toernooien`
  MODIFY `toernooiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  MODIFY `wedstrijdsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  ADD CONSTRAINT `aanmelding_ibfk_1` FOREIGN KEY (`spelerID`) REFERENCES `spelers` (`spelerID`),
  ADD CONSTRAINT `aanmelding_ibfk_2` FOREIGN KEY (`toernooiID`) REFERENCES `toernooien` (`toernooiID`);

--
-- Beperkingen voor tabel `spelers`
--
ALTER TABLE `spelers`
  ADD CONSTRAINT `spelers_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `scholen` (`schoolID`);

--
-- Beperkingen voor tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  ADD CONSTRAINT `wedstrijd_ibfk_1` FOREIGN KEY (`toernooiID`) REFERENCES `toernooien` (`toernooiID`),
  ADD CONSTRAINT `wedstrijd_ibfk_2` FOREIGN KEY (`speler1ID`) REFERENCES `spelers` (`spelerID`),
  ADD CONSTRAINT `wedstrijd_ibfk_3` FOREIGN KEY (`speler2ID`) REFERENCES `spelers` (`spelerID`),
  ADD CONSTRAINT `wedstrijd_ibfk_4` FOREIGN KEY (`winnaarsID`) REFERENCES `spelers` (`spelerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
