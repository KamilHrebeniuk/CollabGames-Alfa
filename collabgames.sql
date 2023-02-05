-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Sty 2019, 18:06
-- Wersja serwera: 10.1.37-MariaDB-2.cba
-- Wersja PHP: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `collabgames`
--

DELIMITER $$
--
-- Procedury
--
CREATE DEFINER=`CollabGames`@`%` PROCEDURE `insert_into_people` (IN `url` VARCHAR(30), IN `name` VARCHAR(50), IN `email` TEXT, IN `password` VARCHAR(40))  NO SQL
BEGIN
	INSERT INTO globalID (URL, Type) VALUES (url, "person");
	INSERT INTO people (Name, URL, Email, StartDate, Password) VALUES (name, url, email, CURRENT_DATE(), password);
END$$

CREATE DEFINER=`CollabGames`@`%` PROCEDURE `insert_into_projects` (IN `pname` VARCHAR(40), IN `type` ENUM('Game','Mod','Tool','Other'), IN `shortdesc` TEXT, IN `longdesc` TEXT, IN `precision2` ENUM('Year','Quarter','Day'), IN `enddate` DATE, IN `author` INT)  NO SQL
BEGIN
	INSERT INTO projects (Name, Category, StartDate, EndDate, Precision2, ShortDesc, LongDesc) VALUES (pname, type, CURRENT_DATE(), enddate, precision2, shortdesc, longdesc);
    INSERT INTO projectworkers (ProjectID, WorkerID, Type) VALUES((SELECT ID FROM projects WHERE Name = pname), author, 'Person');
END$$

CREATE DEFINER=`CollabGames`@`%` PROCEDURE `insert_into_projects_workers` (IN `projectID` INT, IN `workerID` INT, IN `type` ENUM('Person','Team','',''))  NO SQL
BEGIN
	INSERT INTO projectworkers (ProjectID, WorkerID, Type) VALUES (projectID, workerID, type);
END$$

CREATE DEFINER=`CollabGames`@`%` PROCEDURE `insert_into_teams` (IN `tname` VARCHAR(40), IN `author` INT)  NO SQL
BEGIN
	INSERT INTO teams (Name, StartDate) VALUES(tname, CURRENT_DATE());
    INSERT INTO teammembers (TeamID, MemberID, Type, Role) VALUES((SELECT ID FROM teams WHERE Name = tname), author, 'Person', 'Admin');
END$$

CREATE DEFINER=`CollabGames`@`%` PROCEDURE `insert_into_team_members` (IN `projectID` INT, IN `workerID` INT, IN `type` ENUM('Person','Team','',''), IN `role` ENUM('Admin','Member','',''))  NO SQL
BEGIN
	INSERT INTO teammembers (TeamID, MemberID, Type, Role) VALUES (projectID, workerID, type, role);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `globalID`
--

CREATE TABLE `globalID` (
  `URL` varchar(30) NOT NULL,
  `Type` enum('project','team','person','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `globalID`
--

INSERT INTO `globalID` (`URL`, `Type`) VALUES
('SymulatorKosiarki', 'project'),
('TeamOdKosiarki', 'team'),
('960000000', 'person'),
('50', 'person'),
('8776', 'person'),
('8150', 'person'),
('1', 'person'),
('0', 'person'),
('26', 'person'),
('7751', 'person'),
('19eba518d5c1cb8e8e2e9842e0210b', 'person'),
('FirstPerson', 'person'),
('a969a6d50593fde94562c4cab4d61a', 'person'),
('28367fe2095cfd07ccb1b12207f448', 'person'),
('c34563829238f540e8f54657667434', 'person'),
('021fa4cd5d316db87fff83b1d2d4f4', 'person');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offerts`
--

CREATE TABLE `offerts` (
  `ID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `AuthorType` enum('Person','Team','','') NOT NULL,
  `Payment` enum('Value','ValueTime','After','NOPayment') NOT NULL DEFAULT 'NOPayment',
  `Value` int(11) NOT NULL DEFAULT '0',
  `TargetID` int(11) NOT NULL,
  `TargetType` enum('Project','Team','','') NOT NULL,
  `Desc` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `offerts`
--

INSERT INTO `offerts` (`ID`, `AuthorID`, `AuthorType`, `Payment`, `Value`, `TargetID`, `TargetType`, `Desc`) VALUES
(1, 20, 'Person', 'NOPayment', 0, 21, 'Project', 'aeohf3wgb9[3whrf8gtgtf'),
(2, 21, 'Person', 'After', 100, 22, 'Project', 'ruihg4epr9pgvberp89gh3r'),
(3, 0, 'Person', 'After', 100, 22, 'Project', NULL),
(4, 6, 'Person', 'After', 100, 22, 'Project', 'o;aiehpguei9ahgp9ea8uhg'),
(5, 0, 'Person', 'After', 100, 0, 'Project', 'AAAawwggfq4er'),
(6, 0, 'Person', 'After', 100, 0, 'Project', 'Taki super opis'),
(7, 0, 'Person', 'After', 100, 0, 'Project', 'Taki super opis 54t w5gh w5ghw56hy45q g45qtrg'),
(8, 0, 'Person', 'After', 100, 0, 'Project', 'Innny cooool opppis');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offertsauthors`
--

CREATE TABLE `offertsauthors` (
  `OffertID` int(11) NOT NULL,
  `AuthorID` int(11) NOT NULL,
  `AuthorType` enum('Person','Team','','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `offertsauthors`
--

INSERT INTO `offertsauthors` (`OffertID`, `AuthorID`, `AuthorType`) VALUES
(1, 20, 'Person'),
(2, 21, 'Person'),
(3, 20, 'Person'),
(4, 22, 'Person');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offertsspecjalizations`
--

CREATE TABLE `offertsspecjalizations` (
  `OffertID` int(11) NOT NULL,
  `SpecjalizationID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offertstargets`
--

CREATE TABLE `offertstargets` (
  `OffertID` int(11) NOT NULL,
  `TargetID` int(11) NOT NULL,
  `TargetType` enum('Project','Team','','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `offertstargets`
--

INSERT INTO `offertstargets` (`OffertID`, `TargetID`, `TargetType`) VALUES
(1, 21, 'Project'),
(2, 21, 'Project'),
(3, 21, 'Project');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `people`
--

CREATE TABLE `people` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `URL` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `Status` enum('Active','Suspended','Terminated','Released') NOT NULL DEFAULT 'Active',
  `Distinguishions` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `WWW` text,
  `StartDate` date NOT NULL,
  `ShortDesc` text,
  `LongDesc` text,
  `Like` text,
  `Password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `people`
--

INSERT INTO `people` (`ID`, `Name`, `URL`, `Email`, `Status`, `Distinguishions`, `WWW`, `StartDate`, `ShortDesc`, `LongDesc`, `Like`, `Password`) VALUES
(143, 'FirstPerson', 'a969a6d50593fde94562c4cab4d61a', 'qwe@sad.pl', 'Active', 0, NULL, '2018-10-03', NULL, 'Super gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :D', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(144, 'Dodek123', '28367fe2095cfd07ccb1b12207f448', 'dodo.to@dodo.org', 'Active', 0, NULL, '2018-10-22', NULL, NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(145, 'Test1234', 'c34563829238f540e8f54657667434', '123', 'Active', 0, NULL, '2018-10-23', NULL, NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(146, '1234', '021fa4cd5d316db87fff83b1d2d4f4', '123', 'Active', 0, NULL, '2018-11-10', NULL, NULL, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personbookmarks`
--

CREATE TABLE `personbookmarks` (
  `PersonID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Type` enum('Project','Team','Person','Offert') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personhistory`
--

CREATE TABLE `personhistory` (
  `PersonID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Type` enum('Project','Team','Person','Offert') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personspecjalizations`
--

CREATE TABLE `personspecjalizations` (
  `MemberID` int(11) NOT NULL,
  `SpecjalizationID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projectchangelog`
--

CREATE TABLE `projectchangelog` (
  `ProjectID` int(11) NOT NULL,
  `ReleaseDate` date NOT NULL,
  `Desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projectgraphics`
--

CREATE TABLE `projectgraphics` (
  `ProjectID` int(11) NOT NULL,
  `FileName` varchar(40) NOT NULL,
  `Miniature` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `ShowInDesc` int(11) NOT NULL,
  `ShowInChange` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `projectgraphics`
--

INSERT INTO `projectgraphics` (`ProjectID`, `FileName`, `Miniature`, `ShowInDesc`, `ShowInChange`) VALUES
(1, 'aaa', 'NO', 1, 1),
(1, '', 'NO', 0, 0),
(1, 'c26773e7f0059823501cae0cc240df49c559c681', 'NO', 0, 0),
(1, '0b23f6800a2f4d9c59517bcdc4ad32e17a04fde1', 'NO', 0, 0),
(1, 'cd67bb3b68aec45a2aa7122096df19f4afc8115f', 'NO', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE `projects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `URL` varchar(30) NOT NULL,
  `Status` enum('Active','Suspended','Terminated','Released') NOT NULL DEFAULT 'Active',
  `Distinguishions` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `Category` enum('Game','Mod','Tool','Other') NOT NULL DEFAULT 'Game',
  `WWW` text,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Precision2` enum('Year','Quarter','Day') NOT NULL DEFAULT 'Year',
  `FinishedPart` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ShortDesc` text NOT NULL,
  `LongDesc` text,
  `Like` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`ID`, `Name`, `URL`, `Status`, `Distinguishions`, `Category`, `WWW`, `StartDate`, `EndDate`, `Precision2`, `FinishedPart`, `ShortDesc`, `LongDesc`, `Like`) VALUES
(1, 'Symulator kosiarki spalinowej', 'SymulatorKosiarki', 'Active', 100, 'Game', NULL, '2018-09-12', '2018-09-28', 'Quarter', 20, 'Super gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :D', 'Super gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :DSuper gra o symulowaniu bycia sobie kosiarką spalinową. Ma dużo zabawnych ficzerów i gliczy :D', NULL),
(2, 'Symulator kosiarki parowej', 'ParowaKosa', 'Active', 100, 'Game', NULL, '2018-09-12', '2018-09-28', 'Quarter', 20, 'Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!', 'Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!Cudowna gra o prowadzeniu kosiarki parowej. HA Tego się nie spodziewaliście lamusy!!!', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projecttags`
--

CREATE TABLE `projecttags` (
  `ProjectID` int(11) NOT NULL,
  `Tag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `projecttags`
--

INSERT INTO `projecttags` (`ProjectID`, `Tag`) VALUES
(1, 4),
(14, 4),
(30, 3),
(18, 1),
(18, 2),
(18, 2),
(18, 3),
(5, 4),
(5, 5),
(5, 4),
(5, 5),
(5, 3),
(5, 4),
(43, 3),
(43, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projectworkers`
--

CREATE TABLE `projectworkers` (
  `ProjectID` int(11) NOT NULL,
  `WorkerID` int(11) NOT NULL,
  `Type` enum('Person','Team') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `projectworkers`
--

INSERT INTO `projectworkers` (`ProjectID`, `WorkerID`, `Type`) VALUES
(1, 2, 'Person'),
(2, 2, 'Person'),
(16, 2, 'Person'),
(16, 2, 'Person'),
(16, 2, 'Person'),
(16, 12, 'Person'),
(31, 5, 'Person'),
(32, 10, 'Person'),
(33, 6, 'Person'),
(34, 6, 'Person'),
(35, 6, 'Person'),
(36, 6, 'Person'),
(37, 6, 'Person'),
(38, 6, 'Person'),
(43, 6, 'Person'),
(55, 10, 'Person'),
(56, 6, 'Person'),
(57, 6, 'Person'),
(58, 6, 'Person'),
(12, 6, 'Person'),
(12, 6, 'Person'),
(12, 18, 'Person'),
(1, 18, 'Person'),
(1, 18, 'Person'),
(59, 6, 'Person'),
(60, 6, 'Person'),
(61, 6, 'Person'),
(62, 6, 'Person'),
(63, 6, 'Person'),
(64, 6, 'Person'),
(65, 6, 'Person'),
(66, 6, 'Person'),
(67, 6, 'Person'),
(68, 6, 'Person'),
(0, 22, 'Person'),
(29, 0, ''),
(0, 22, 'Person'),
(29, 0, 'Person'),
(1, 14, 'Person'),
(1, 29, 'Person'),
(1, 14, 'Person'),
(1, 29, 'Person');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specjalizations`
--

CREATE TABLE `specjalizations` (
  `ID` int(11) NOT NULL,
  `Specjalization` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tags`
--

CREATE TABLE `tags` (
  `ID` int(11) NOT NULL,
  `Tag` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `tags`
--

INSERT INTO `tags` (`ID`, `Tag`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'RPG'),
(4, 'Strategy'),
(5, 'Simulation');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teammembers`
--

CREATE TABLE `teammembers` (
  `TeamID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `Type` enum('Person','Team') NOT NULL,
  `Role` enum('Admin','Member') NOT NULL DEFAULT 'Member'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `teammembers`
--

INSERT INTO `teammembers` (`TeamID`, `MemberID`, `Type`, `Role`) VALUES
(1, 18, 'Person', 'Admin'),
(4, 18, 'Person', 'Admin'),
(9, 6, 'Person', 'Admin'),
(10, 6, 'Person', 'Admin'),
(11, 6, 'Person', 'Admin'),
(12, 6, 'Person', 'Admin'),
(13, 6, 'Person', 'Admin'),
(14, 6, 'Person', 'Admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `URL` varchar(30) NOT NULL,
  `Status` enum('Active','Suspended','Terminated','Released') NOT NULL DEFAULT 'Active',
  `Distinguishions` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `WWW` text,
  `StartDate` date NOT NULL,
  `ShortDesc` text NOT NULL,
  `LongDesc` text,
  `Like` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`ID`, `Name`, `URL`, `Status`, `Distinguishions`, `WWW`, `StartDate`, `ShortDesc`, `LongDesc`, `Like`) VALUES
(1, 'Ten Team Od Kosiarki', 'TeamOdKosiarki', 'Active', 10, 'q;eiufgue;irfbiu;e4r', '2018-09-15', 'Super tim od kosiarki. Taki tam co lubi kodować w Unity.', 'Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. ', ''),
(2, 'Zawsze Drugi Tim', 'TrocheGorszy', 'Active', 10, 'q;eiufgue;irfbiu;e4r', '2018-09-15', 'Super tim od kosiarki. Taki tam co lubi kodować w Unity.', 'Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. Super tim od kosiarki. Taki tam co lubi kodować w Unity. ', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teamspecjalizations`
--

CREATE TABLE `teamspecjalizations` (
  `TeamID` int(11) NOT NULL,
  `Specjalization` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `globalID`
--
ALTER TABLE `globalID`
  ADD UNIQUE KEY `URL` (`URL`);

--
-- Indexes for table `offerts`
--
ALTER TABLE `offerts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Payment` (`Payment`);

--
-- Indexes for table `offertsauthors`
--
ALTER TABLE `offertsauthors`
  ADD UNIQUE KEY `OffertID` (`OffertID`);

--
-- Indexes for table `offertsspecjalizations`
--
ALTER TABLE `offertsspecjalizations`
  ADD KEY `OffertID` (`OffertID`),
  ADD KEY `FK_offertsspecjalizations_specjalizations` (`SpecjalizationID`);

--
-- Indexes for table `offertstargets`
--
ALTER TABLE `offertstargets`
  ADD UNIQUE KEY `OffertID` (`OffertID`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `URL` (`URL`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `personbookmarks`
--
ALTER TABLE `personbookmarks`
  ADD KEY `PersonID` (`PersonID`);

--
-- Indexes for table `personhistory`
--
ALTER TABLE `personhistory`
  ADD KEY `PersonID` (`PersonID`);

--
-- Indexes for table `personspecjalizations`
--
ALTER TABLE `personspecjalizations`
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `FK_personspecjalizations_specjalizations` (`SpecjalizationID`);

--
-- Indexes for table `projectchangelog`
--
ALTER TABLE `projectchangelog`
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `projectgraphics`
--
ALTER TABLE `projectgraphics`
  ADD UNIQUE KEY `FileName` (`FileName`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `URL` (`URL`),
  ADD KEY `Distinguishions` (`Distinguishions`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `projecttags`
--
ALTER TABLE `projecttags`
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD UNIQUE KEY `URL` (`URL`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `people`
--
ALTER TABLE `people`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
