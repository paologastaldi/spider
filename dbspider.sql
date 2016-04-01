-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Apr 02, 2016 alle 00:32
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
(5, 'corriere.it', 'http://www.corriere.it/'),
(6, 'studenti.it', 'http://www.studenti.it/'),
(7, 'abctribe.com', 'http://it-it.abctribe.com/'),
(8, 'wikipedia.org', 'https://it.wikipedia.org'),
(9, 'tomshw.it', 'http://www.tomshw.it/'),
(10, 'paginebianche.it', 'http://www.paginebianche.it'),
(11, 'vallauri.edu', 'http://www.vallauri.edu'),
(12, 'facebook.com', 'https://www.facebook.com'),
(13, 'linkedin.com', 'https://it.linkedin.com'),
(14, 'twitter.com', 'https://twitter.com'),
(15, 'youtube.com', 'https://www.youtube.com'),
(16, 'github.com', 'https://github.com/'),
(17, 'polito.it', 'http://www.polito.it/'),
(18, 'unito.it', 'http://www.unito.it/'),
(19, 'paginegialle.it', 'http://www.paginegialle.it/'),
(20, 'amazon.it', 'http://www.amazon.it/');

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
(4, 'Rosso Maurizio', 0, 1),
(5, 'Diego Nova', 0, 1),
(6, 'Giraudo Giuseppe', 0, 1),
(7, 'Tosello Giovanni', 0, 1),
(8, 'Pasquale Alessandra', 0, 1),
(9, 'Tonello Sabrina', 0, 1),
(10, 'Basiletti Emanuela', 0, 1),
(11, 'Puppo Marco', 0, 1),
(12, 'Rosa Guido', 0, 1),
(13, 'Mina Guido', 0, 1),
(14, 'Girardi Stefano', 0, 1),
(15, 'Sperotto Sergio', 0, 1),
(16, 'Ricerca', 0, 1),
(17, 'ITIS', 0, 1),
(18, 'Delpozzo', 0, 1);

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
  MODIFY `idUrl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT per la tabella `professori`
--
ALTER TABLE `professori`
  MODIFY `idProf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
