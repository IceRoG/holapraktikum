-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.3:3306
-- Erstellungszeit: 12. Sep 2021 um 14:31
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
(27, 'test', 'test', 'test', 'test', 'test', '12345', 'test', '12345', 'test@test', 'test', 1, 2, 'test', '11:01:00', '11:11:00', 1, 6, 5, 4, 3, NULL, NULL, 2021, '1', 1),
(26, '', '', 'Mechatroniker', 'Heraeus', 'Heraeusstr. 12-14', '63450', 'Hanau', '', '', '', 0, 0, 'technisches Verständnis', '00:00:00', '00:00:00', 1, 1, 2, 2, 0, 1, '', 0000, '', 1),
(24, '', '', 'Grundschullehrer', 'Erich-Kästner-Schule', 'Lortzingstr. 20', '63452', 'Hanau', '', '', '', 0, 0, '', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 1, '', 0000, '', 1),
(25, '', '', 'IT Systemelektroniker', 'DograTec Gmbh      ', 'Donaustraße 19A', '63452', 'Hanau', '', '', '', 0, 2, '', '00:00:00', '00:00:00', 1, 2, 1, 1, 2, 1, '', 0000, '', 1),
(23, '', '', 'Marketing ', 'markertingworkx GmbH', 'Ulanenplatz 12', '63452', 'Hanau', '', '', '', 0, 3, 'Man sollte kreativ sein und ein Verständniss von Computerprogrammen haben', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 1, '', 0000, '', 1),
(20, '', '', 'Mechaniker, Mechatroniker', 'Vacuumschmelze', 'Grüner Weg 37', '63450', 'Hanau', '', '', '', 0, 0, '', '00:00:00', '00:00:00', 1, 3, 4, 2, 2, 1, '', 0000, '', 1),
(21, '', '', 'Grundschullehrer', 'Grundschule Langendiebach', 'Friedrich-Ebert-Straße 22', '63526', 'Erlensee', '', '', '', 0, 2, 'Mit Kindern gut arbeiten können und Spaß haben', '00:00:00', '00:00:00', 0, 2, 1, 2, 2, 2, '', 0000, '', 1),
(22, '', '', 'Klimatechniker', 'Apleona GmbH', 'Kinzigheimer Weg 104-106', '63452', 'Hanau', '', '', '', 0, 1, 'räumliches Denken', '00:00:00', '00:00:00', 1, 2, 1, 1, 1, 1, '', 0000, '', 1),
(19, '', '', 'Grundschullehrer', 'Grundschule Langendiebach', 'Friedrich-Ebert-Straße 22', '63526', 'Erlensee', '', '', '', 0, 0, 'Bewerbung, Lebenslauf, Umgang mit kleinen Kinder, Geduld', '00:00:00', '00:00:00', 1, 2, 2, 1, 1, 1, '', 0000, '', 1),
(17, '', '', 'Medizinischer Fachangestellter', 'HNO-Gemeinschaftspraxis am Klinikum Hanau', 'Leimenstraße 20', '63452', 'Hanau', '', '', '', 0, 2, '', '00:00:00', '00:00:00', 0, 0, 0, 0, 0, 1, '', 0000, '', 1),
(18, '', '', 'Erzieher', 'Evangelische Kita Klein Auheim', 'Sudetendeutsche Str. 75', '63456', 'Hanau', '', '', '', 0, 3, 'Geduld, Motivation', '00:00:00', '00:00:00', 1, 1, 2, 2, 2, 1, '', 0000, '', 1),
(15, '', '', 'Apotheker ', 'Sonnen-Apotheke', 'Hanauer Landstraße 13', '61130', 'Nidderau', '061873885', '', '', 0, 2, '', '00:00:00', '00:00:00', 1, 2, 2, 2, 2, 1, '', 0000, '', 1),
(16, '', '', 'Erzieher', 'Kindertagesstätte Zauberweide', 'Gleinitzer Straße 16a', '63486', 'Bruchköbel', '', '', '', 0, 0, '', '00:00:00', '00:00:00', 1, 2, 1, 1, 2, 1, '', 0000, '', 1),
(14, '', '', 'Tierarzt ', 'Kleintierpraxis Dr. Susanne Fleck', 'Bruchköbeler Landstraße 41a', '63452', 'Hanau', '061819828156', 'info@tierarzt-fleck-hanau.de', '', 0, 0, 'man muss Blut sehen können, gut mit Tieren und anderen Menschen umgehen können, kein Problem mit Putzen haben', '00:00:00', '00:00:00', 0, 0, 0, 0, 0, 1, '', 0000, '', 1),
(11, '', '', 'Hausarzt', 'Praxis Dr. Blaszczak', 'Mühlstraße 19', '63450', 'Hanau', '', '', '', 0, 1, '', '00:00:00', '00:00:00', 1, 1, 2, 3, 2, 1, '', 0000, '', 1),
(12, '', '', 'Bäcker', 'Phillips Backstube', 'Marktplatz 4', '61130', 'Nidderau', '06187936148', '', '', 0, 0, '', '00:00:00', '00:00:00', 1, 2, 3, 1, 2, 2, '', 0000, '', 1),
(13, '', '', 'Kaufmann Einzelhandel', 'Norma Group Holding GmbH', 'Edisonstraße 4', '63477', 'Maintal', '06181-403-5540', '', '', 0, 1, 'PC-Kenntnisse, Grundwissen über den Betrieb, Teamarbeit, Freundlichkeit, Schnelles lernen', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 2, '', 0000, '', 1),
(10, '', '', 'Kältetechniker', 'Teko Kältetechnik', 'Carl-Benz-Straße 1-7', '63674', 'Altenstadt', '', '', '', 0, 2, 'Interesse am Beruf', '00:00:00', '00:00:00', 1, 2, 1, 2, 2, 1, 'Kaufmänniche Abteilung + Produktion', 0000, '', 1),
(8, '', '', 'Veranstaltungstechniker', 'Freaksound GmbH', 'Germanienring 1', '63486', 'Bruchköbel', '06181990797', '', '', 0, 1, 'Teamfähigkeit, freundlich zu Kunden', '00:00:00', '00:00:00', 1, 1, 2, 2, 1, 2, '', 0000, '', 1),
(9, '', '', 'Grundschullehrer', 'Albert-Schweitzer-Schule', 'Johannesweg 27', '61130', 'Nidderau', '01687900893', '', '', 0, 1, 'ruhig sein, guter Umgang mit Kindern, gut erklären können ', '00:00:00', '00:00:00', 1, 1, 2, 2, 1, 1, 'gute Betreuung', 0000, '', 1),
(7, '', '', 'Grundschullehrer', 'Brüder-Grimm-Schule Hanau ', 'Stresemannstraße 10', '63451', 'Hanau', '0168128660', '', '', 0, 2, 'Bewerbung, Lebenslauf, Umgang mit Kindern und Geduld', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 1, '', 0000, '', 1),
(6, '', '', 'Zahntechniker', 'Kieferorthopäde Dr. Töpfer', 'Nordstraße 5', '63450', 'Hanau', '061811800480', '', '', 0, 3, 'Feingefühl', '00:00:00', '00:00:00', 1, 2, 2, 2, 3, 1, '', 0000, '', 1),
(4, '', '', 'Grundschullehrer', 'Erich-Kästner-Schule', 'Lortzingstraße 20', '63452', 'Hanau', '0618182677', '', '', 0, 1, 'Kinder mögen, Gedult haben und Interesse am Beruf ', '00:00:00', '00:00:00', 1, 1, 2, 1, 1, 1, '', 0000, '', 1),
(5, '', '', 'Grundschulehrer / Förderlehrer', 'Erich-Kästner-Schule', 'Lortzingstraße 20', '63452', 'Hanau', '0618182677', '', '', 0, 2, 'Geduld, Gefallen an der Arbeit mit Kindern haben ', '00:00:00', '00:00:00', 1, 2, 1, 1, 2, 1, '', 0000, '', 1),
(1, '', '', 'Erzieher', 'Kindergarten St. Elisabeth', 'Vor der Kinzigbrücke 19', '63452', 'Hanau', '061819390222', '', '', 0, 1, 'Kinderfreundlich, Teamfähig, verantwortungsbewusst', '00:00:00', '00:00:00', 1, 1, 2, 2, 1, 2, 'beinahe auschließlich Lagerarbeiten', 0000, '', 1),
(2, '', '', 'Tiermedizinischer Fachangestellter', 'Tierartztpraxis Harald Wenzel', 'Beethovenstr. 12', '63486', 'Bruchköbel', '0618197101', '', '', 0, 1, '', '00:00:00', '00:00:00', 1, 1, 1, 2, 1, 1, '', 0000, '', 1),
(3, '', '', 'Zahnartzt', 'Zahnartztpraxis für Kinder und Jugendliche Dr. Ortrunstrieber', 'Nürnbergerstr. 2a', '63452', 'Hanau', '0618150723303', '', '', 0, 1, 'Interesse am Beruf , Umgang mit Patienten ', '00:00:00', '00:00:00', 1, 1, 1, 1, 1, 1, '', 0000, '', 1);

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
(1, 0, 'test', 0, 8),
(2, 0, 'test2', 0, 41);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Teacher`
--

CREATE TABLE `Teacher` (
  `teacherID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `teacherPw` varchar(100) NOT NULL,
  `firstPwChanged` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Teacher`
--

INSERT INTO `Teacher` (`teacherID`, `userName`, `teacherPw`, `firstPwChanged`) VALUES
(1, 'admin', '$2y$10$qyqiMd0JzUdQqCTRJM68.OkfxyO.KT06uk0hA/EhrWDAVmpKC5w6K', 1),
(2, 's.prochnow', '$2y$10$y7IB31xSQI8NkynoVjz2HeN.D1WwzQLSmJ0mj3Rf1uYTTA469J/LK', 0);

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
  ADD UNIQUE KEY `teacherLastName` (`userName`) USING BTREE,
  ADD KEY `teacherPw` (`teacherPw`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Job`
--
ALTER TABLE `Job`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `Pin`
--
ALTER TABLE `Pin`
  MODIFY `pinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
