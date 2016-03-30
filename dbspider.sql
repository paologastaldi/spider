-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Mar 19, 2016 alle 00:39
-- Versione del server: 10.1.10-MariaDB
-- Versione PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbspider`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzi`
--

CREATE TABLE `indirizzi` (
  `idUrl` int(11) NOT NULL,
  `dominio` varchar(255) NOT NULL,
  `urlPartenza` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `indirizzi`
--

INSERT INTO `indirizzi` (`idUrl`, `dominio`, `urlPartenza`) VALUES
(1, 'itiscuneo.gov.it', 'http://www.itiscuneo.gov.it/'),
(2, 'istruzione.it', 'http://www.istruzione.it/'),
(3, 'lastampa.it', 'http://www.lastampa.it/'),
(4, 'repubblica.it', 'http://www.repubblica.it/'),
(5, 'www.corriere.it', 'http://www.corriere.it/'),
(6, 'studenti.it', 'http://www.studenti.it/'),
(7, 'abctribe.com', 'http://it-it.abctribe.com/');

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `idProf` int(11) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `contatore` int(11) NOT NULL,
  `selezionato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`idProf`, `cognome`, `contatore`, `selezionato`) VALUES
(4, 'Rosso Maurizio', 0, 0),
(5, 'Diego Nova', 0, 0),
(6, 'Giraudo Giuseppe', 0, 0),
(7, 'Tosello Giovanni', 0, 0),
(8, 'Pasquale Alessandra', 0, 1),
(9, 'Tonello Sabrina', 0, 0),
(10, 'Basiletti Emanuela', 0, 0),
(11, 'Puppo Marco', 0, 1),
(12, 'Rosa Guido', 0, 0),
(13, 'Mina Guido', 0, 1),
(14, 'Girardi Stefano', 0, 0),
(15, 'Sperotto Sergio', 0, 0),
(16, 'Ricerca', 0, 0),
(17, 'ITIS', 0, 1),
(18, 'Delpozzo', 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `indirizzi`
--
ALTER TABLE `indirizzi`
  ADD PRIMARY KEY (`idUrl`);

--
-- Indici per le tabelle `professori`
--
ALTER TABLE `professori`
  ADD PRIMARY KEY (`idProf`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `indirizzi`
--
ALTER TABLE `indirizzi`
  MODIFY `idUrl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la tabella `professori`
--
ALTER TABLE `professori`
  MODIFY `idProf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
