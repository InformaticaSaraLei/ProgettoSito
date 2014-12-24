-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2014 at 12:03 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `alla_scoperta_dell_informatica`
--

-- --------------------------------------------------------

--
-- Table structure for table `GiocoContenuti`
--

CREATE TABLE `GiocoContenuti` (
  `ID` int(11) NOT NULL,
  `FK_TIPO_CONTENUTO` varchar(100) NOT NULL,
  `FK_NAZIONE` varchar(100) NOT NULL,
  `TESTO` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GiocoSchemi`
--

CREATE TABLE `GiocoSchemi` (
  `ID` int(11) NOT NULL,
  `LIVELLO` int(11) NOT NULL,
  `SOTTOLIVELLO` int(11) NOT NULL,
  `SCHEMA` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GiocoTipiContenuti`
--

CREATE TABLE `GiocoTipiContenuti` (
`ID` int(11) NOT NULL,
  `CONTENUTO` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Nazioni`
--

CREATE TABLE `Nazioni` (
  `ID` char(2) NOT NULL,
  `DESCRIZIONE` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GiocoContenuti`
--
ALTER TABLE `GiocoContenuti`
 ADD UNIQUE KEY `FK_NAZIONE` (`FK_NAZIONE`), ADD UNIQUE KEY `FK_TIPO_CONTENUTO` (`FK_TIPO_CONTENUTO`);

--
-- Indexes for table `GiocoTipiContenuti`
--
ALTER TABLE `GiocoTipiContenuti`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GiocoTipiContenuti`
--
ALTER TABLE `GiocoTipiContenuti`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;