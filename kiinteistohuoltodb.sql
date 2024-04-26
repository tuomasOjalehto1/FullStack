-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26.04.2024 klo 20:49
-- Palvelimen versio: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiinteistohuoltodb`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `asiakastaulu`
--

CREATE TABLE `asiakastaulu` (
  `id` int(11) NOT NULL,
  `etunimi` varchar(200) NOT NULL,
  `sukunimi` varchar(200) NOT NULL,
  `puhelin` varchar(200) NOT NULL,
  `osoite` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `tehtavataulu`
--

CREATE TABLE `tehtavataulu` (
  `id` int(11) NOT NULL,
  `osoite` varchar(200) NOT NULL,
  `huoltopyynnontyyppi` int(11) NOT NULL,
  `kuvaus` varchar(1000) NOT NULL,
  `ilmoittajanid` int(11) NOT NULL,
  `etunimi` int(11) NOT NULL,
  `sukunimi` int(11) NOT NULL,
  `puhelin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Rakenne taululle `tyontekijataulu`
--

CREATE TABLE `tyontekijataulu` (
  `id` int(11) NOT NULL,
  `etunimi` varchar(200) NOT NULL,
  `sukunimi` varchar(200) NOT NULL,
  `osoite` varchar(200) NOT NULL,
  `puhelin` varchar(200) NOT NULL,
  `omatila` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakastaulu`
--
ALTER TABLE `asiakastaulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tehtavataulu`
--
ALTER TABLE `tehtavataulu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ilmoittajanid` (`ilmoittajanid`);

--
-- Indexes for table `tyontekijataulu`
--
ALTER TABLE `tyontekijataulu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asiakastaulu`
--
ALTER TABLE `asiakastaulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tehtavataulu`
--
ALTER TABLE `tehtavataulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyontekijataulu`
--
ALTER TABLE `tyontekijataulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `tehtavataulu`
--
ALTER TABLE `tehtavataulu`
  ADD CONSTRAINT `tehtavataulu_ibfk_1` FOREIGN KEY (`ilmoittajanid`) REFERENCES `asiakastaulu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
