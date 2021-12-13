-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.3:3306
-- Erstellungszeit: 06. Sep 2021 um 18:25
-- Server-Version: 5.6.19-67.0-log
-- PHP-Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db450157_21`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Job`
--

CREATE TABLE `Job` (
  `jobID` int(11) NOT NULL,
  `studentName` varchar(50) DEFAULT NULL,
  `studentLastName` varchar(50) DEFAULT NULL,
  `jobName` varchar(50) DEFAULT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `companyAddress` varchar(100) DEFAULT NULL,
  `companyPLZ` varchar(5) DEFAULT NULL,
  `companyCity` varchar(25) DEFAULT NULL,
  `companyTel` varchar(50) DEFAULT NULL,
  `companyEmail` varchar(100) DEFAULT NULL,
  `companyHomepage` varchar(100) DEFAULT NULL,
  `applicationType` int(11) DEFAULT NULL,
  `applicationTime` int(11) DEFAULT NULL,
  `applicationReq` varchar(1000) DEFAULT NULL,
  `workingHoursStart` time DEFAULT NULL,
  `workingHoursEnd` time DEFAULT NULL,
  `responsibility` tinyint(4) DEFAULT NULL,
  `careRating` int(11) DEFAULT NULL,
  `companyExperienceRating` int(11) DEFAULT NULL,
  `jobExperienceRating` int(11) DEFAULT NULL,
  `personalRating` int(11) DEFAULT NULL,
  `teacherRating` int(1) DEFAULT NULL,
  `teacherComment` varchar(1000) DEFAULT NULL,
  `created` year(4) DEFAULT NULL,
  `pinID` varchar(10) DEFAULT NULL,
  `approval` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Job`
--

INSERT INTO `Job` (`jobID`, `studentName`, `studentLastName`, `jobName`, `companyName`, `companyAddress`, `companyPLZ`, `companyCity`, `companyTel`, `companyEmail`, `companyHomepage`, `applicationType`, `applicationTime`, `applicationReq`, `workingHoursStart`, `workingHoursEnd`, `responsibility`, `careRating`, `companyExperienceRating`, `jobExperienceRating`, `personalRating`, `teacherRating`, `teacherComment`, `created`, `pinID`, `approval`) VALUES
(38, 'Marc', 'Pfeiffer', 'Fachinformatiker', 'Heraeus', 'Heraeusstraße 12-14', '63450', 'Hanau', '06181 350', 'info@heraeus.de', 'heraeus.de', 3, 0, 'Interesse an Informatik', '08:00:00', '15:00:00', 1, 3, 1, 2, 2, 2, '', 2021, NULL, 1),
(2, 'Hans', 'Müller', 'Rechtsanwalt', 'Wollweber & Bansch', 'Büdesheimer Ring 2', '63452', 'Hanau', '06181 12345678', '', '', NULL, 2, 'Interesse an Jura', '07:45:00', '14:00:00', 0, 2, 3, 2, 2, 2, '', NULL, NULL, 1),
(39, 'Max', 'Mustermann', 'Finanzwirt', 'Finanzamt Hanau', 'Am Freiheitsplatz 2', '63450', 'Hanau', '06181 1015001', 'poststelle@fa-han.hessen.de', 'finanzamt.hessen.de/fa/uebersicht/finanzamt-hanau', 2, 1, '', '08:00:00', '14:00:00', 0, 3, 2, 1, 3, 2, '', 2021, NULL, 1),
(40, 'Peter', 'Maier', 'Heilpraktiker/in', 'Sport- und Naturheilpraxis Beate Bechmann', 'Hauptstraße 47-49', '63486', 'Bruchköbel', '06181304092', 'info@akupunktur-tuina.de', '', 0, 2, '', '00:00:00', '00:00:00', 0, 1, 2, 1, 1, 2, '', 2021, NULL, 1),
(41, 'Thaddäus', 'Tentakel', 'Heimleiter', 'Benevit Haus Rosengarten', 'Am Erlenpark 1', '63526', 'Erlensee', '06183000130', '', '', 2, 1, 'Teamarbeit, Konzentrationsfähigkeit, Flexibilität', '00:00:00', '00:00:00', 1, 2, 2, 2, 1, 2, 'Organisation des Praktikums war nicht sehr gut.', 2021, NULL, 1),
(42, 'Florian', 'Schmidt', 'Heilerziehungspfleger', 'Behindertenwohnheim/Behindertenwerk Main-Kinzig e.V.', 'Feuerbachstraße 15-17', '63452', 'Hanau', '', '', '', 2, 1, 'Geduld, Pflichtgefühl, man sollte fürsorglich sein', '00:00:00', '00:00:00', 1, 1, 2, 1, 2, 2, '', 2021, NULL, 1),
(45, 'test', 'test', 'test', 'test', 'test', '12345', 'test', '1234', 'test@test.de', 'test', 1, 1, 'asfag', '12:12:00', '12:12:00', 1, 2, 1, 1, 1, NULL, NULL, 2021, NULL, 0),
(44, 'test', 'test', 'test', 'test', 'test', '12345', 'test', '1234', 'test@test.de', 'test', 1, 1, 'asfag', '12:12:00', '12:12:00', 1, 2, 1, 1, 1, NULL, NULL, 2021, NULL, 0),
(46, 'test', 'test', 'test', 'test', 'test', '12345', 'test', '1234', 'test@test.de', 'test', 1, 1, 'asfag', '12:12:00', '12:12:00', 1, 2, 1, 1, 1, NULL, NULL, 2021, NULL, 0),
(47, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(48, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(49, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(50, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(51, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(52, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(53, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0),
(54, 'test', 'test', 'test', 'test', 'test', '21312', 'aqfa', '', '', '', 1, 1, '', '12:23:00', '23:12:00', 1, 1, 2, 2, 2, NULL, NULL, 2021, NULL, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Pin`
--

CREATE TABLE `Pin` (
  `pinID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL,
  `uses` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Pin`
--

INSERT INTO `Pin` (`pinID`, `teacherID`, `pin`, `grade`, `uses`) VALUES
(1, 0, 'test', 0, 0),
(2, 0, 'test2', 0, 41),
(3, 0, 'test3', 0, 29);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Teacher`
--

CREATE TABLE `Teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherLastName` varchar(50) NOT NULL,
  `teacherPw` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Teacher`
--

INSERT INTO `Teacher` (`teacherID`, `teacherLastName`, `teacherPw`) VALUES
(1, 'test', '$2y$10$n/K.NYKJco2IeppkBSOz1OpgJCDSnbtPM0ML.zPo40SuoNTnSUBYC');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `studentName` (`studentName`),
  ADD KEY `studentLastName` (`studentLastName`),
  ADD KEY `jobName` (`jobName`),
  ADD KEY `companyName` (`companyName`),
  ADD KEY `companyAddress` (`companyAddress`),
  ADD KEY `companyPLZ` (`companyPLZ`),
  ADD KEY `companyTel` (`companyTel`),
  ADD KEY `companyEmail` (`companyEmail`),
  ADD KEY `companyHomepage` (`companyHomepage`),
  ADD KEY `applicationType` (`applicationType`),
  ADD KEY `applicationTime` (`applicationTime`),
  ADD KEY `applicationReq` (`applicationReq`(333)),
  ADD KEY `workingHoursStart` (`workingHoursStart`),
  ADD KEY `workingHoursEnd` (`workingHoursEnd`),
  ADD KEY `responsibility` (`responsibility`),
  ADD KEY `careRating` (`careRating`),
  ADD KEY `companyExperienceRating` (`companyExperienceRating`),
  ADD KEY `jobExperienceRating` (`jobExperienceRating`),
  ADD KEY `personalRating` (`personalRating`),
  ADD KEY `teacherRating` (`teacherRating`),
  ADD KEY `applicationReq_2` (`applicationReq`(333)),
  ADD KEY `created` (`created`),
  ADD KEY `approval` (`approval`),
  ADD KEY `companyCity` (`companyCity`),
  ADD KEY `pinID` (`pinID`) USING BTREE,
  ADD KEY `teacherComment` (`teacherComment`(333));

--
-- Indizes für die Tabelle `Pin`
--
ALTER TABLE `Pin`
  ADD PRIMARY KEY (`pinID`),
  ADD UNIQUE KEY `pin` (`pin`),
  ADD KEY `teacherID` (`teacherID`),
  ADD KEY `validTo` (`uses`),
  ADD KEY `grade` (`grade`);

--
-- Indizes für die Tabelle `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD UNIQUE KEY `teacherLastName` (`teacherLastName`) USING BTREE,
  ADD KEY `teacherPw` (`teacherPw`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Job`
--
ALTER TABLE `Job`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT für Tabelle `Pin`
--
ALTER TABLE `Pin`
  MODIFY `pinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
