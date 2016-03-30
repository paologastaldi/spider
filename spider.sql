-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2016 alle 11:04
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spider`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `indirizzi`
--

CREATE TABLE IF NOT EXISTS `indirizzi` (
`idUrl` int(11) NOT NULL,
  `URL` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE IF NOT EXISTS `professori` (
`idProf` int(11) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `contatore` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`idProf`, `cognome`, `contatore`) VALUES
(1, 'Rosso', 0),
(2, 'aaa', 6),
(3, 'bbb', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indirizzi`
--
ALTER TABLE `indirizzi`
 ADD PRIMARY KEY (`idUrl`);

--
-- Indexes for table `professori`
--
ALTER TABLE `professori`
 ADD PRIMARY KEY (`idProf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indirizzi`
--
ALTER TABLE `indirizzi`
MODIFY `idUrl` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professori`
--
ALTER TABLE `professori`
MODIFY `idProf` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
