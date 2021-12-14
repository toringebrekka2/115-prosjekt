-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09. Des, 2021 23:57 PM
-- Tjener-versjon: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medlemdatabase`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medlem`
--

CREATE TABLE `medlem` (
  `id` int(11) NOT NULL,
  `fornavn` varchar(50) NOT NULL,
  `etternavn` varchar(50) NOT NULL,
  `brukernavn` varchar(20) NOT NULL,
  `passord` longtext NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `postnr` int(11) NOT NULL,
  `mobilnr` int(11) NOT NULL,
  `epost` varchar(40) DEFAULT NULL,
  `fødselsdato` date NOT NULL,
  `kjønn` varchar(10) NOT NULL,
  `interesser` varchar(100) DEFAULT NULL,
  `medlemsiden` date NOT NULL,
  `kontigentstatus` varchar(50) NOT NULL,
  `Utmeldingsdato` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `medlem`
--

INSERT INTO `medlem` (`id`, `fornavn`, `etternavn`, `brukernavn`, `passord`, `adresse`, `postnr`, `mobilnr`, `epost`, `fødselsdato`, `kjønn`, `interesser`, `medlemsiden`, `kontigentstatus`, `Utmeldingsdato`) VALUES
(154, 'Jens', 'Jensen', '', '', 'mcgee', 1999, 41304526, 'John@goodman.net', '2001-02-10', 'No', 'Yes', '2001-01-01', 'Nei', '2021-12-09'),
(155, 'Jonas', 'Mcstain', '', '', 'Fuck Facegate 10', 2, 2, 'Epost@epost', '2005-02-01', 'Fluid', 'Yes', '2009-02-22', 'Ja', '2021-12-09'),
(156, 'Stian', 'Johan', '', '', 'Gate', 69, 12345, 'Piece@of.shit', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Nei', NULL),
(157, 'Testmann', 'Johannesen', '', '', 'Testboygate', 1234, 12345, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Nei', NULL),
(158, 'Boboby', 'Jensen', '', '', 'Gate 2', 1, 2, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL),
(159, 'Bendix', 'Bitchboi', '', '', 'Testboygate', 1234, 12345, 'saurischia1@gmail.com', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL),
(160, 'Testboy', 'Testboysen', '', '', 'Testboygate', 1234, 422343, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL),
(161, 'Test', 'Testboysen', '', '', 'Testboygate', 1234, 12345, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL),
(162, 'Testboyfashufi', 'Testboysen', '', '', 'Testboygate', 1234, 12345, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL),
(163, 'Testboyfashufi', 'Testboysen', '', '', 'Testboygate', 1234, 12345, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL),
(164, 'Testboyfashufi', 'Testboysen', '', '', 'Testboygate', 1234, 12345, 'test@boy.net', '1997-02-02', 'Yes', 'No', '2000-02-02', 'Ja', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medlem`
--
ALTER TABLE `medlem`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `FK_Medlem_Poststed` (`postnr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medlem`
--
ALTER TABLE `medlem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
