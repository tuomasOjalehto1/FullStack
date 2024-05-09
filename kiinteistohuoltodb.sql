-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08.05.2024 klo 12:44
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
  `sposti` varchar(200) NOT NULL,
  `osoite` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `asiakastaulu`
--

INSERT INTO `asiakastaulu` (`id`, `etunimi`, `sukunimi`, `puhelin`, `sposti`, `osoite`) VALUES
(1, 'testi1', 'testi1', 'testi1', 'testi1', 'testi1'),
(11, 'testi2', 'testi2', 'testi2', 'testi2', 'testi2'),
(13, 'testiasiakas1', 'testiasiakas1', 'testiasiakas1', 'testiasiakas1', 'testiasiakas1');

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttaja_ja_salasana`
--

CREATE TABLE `kayttaja_ja_salasana` (
  `id` int(11) NOT NULL,
  `sposti` text NOT NULL,
  `salasana` text NOT NULL,
  `rooli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `kayttaja_ja_salasana`
--

INSERT INTO `kayttaja_ja_salasana` (`id`, `sposti`, `salasana`, `rooli`) VALUES
(1, 'testi1', 'testi1', 3),
(4, 'testiasiakas1', 'testiasiakas1', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `otayhteyttataulu`
--

CREATE TABLE `otayhteyttataulu` (
  `id` int(11) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `puhelin` varchar(20) NOT NULL,
  `yritys` varchar(100) NOT NULL,
  `sposti` varchar(100) NOT NULL,
  `viesti` text NOT NULL,
  `luontipvm` datetime DEFAULT current_timestamp(),
  `status` enum('Uusi','Käsittelyssä','Hoidettu') DEFAULT 'Uusi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `otayhteyttataulu`
--

INSERT INTO `otayhteyttataulu` (`id`, `etunimi`, `sukunimi`, `puhelin`, `yritys`, `sposti`, `viesti`, `luontipvm`, `status`) VALUES
(16, 'Maija', 'Malli', '050987654', 'Helsingin Kaupunki', 'maija.malli@helsinki.com', 'Hei,\r\nOlen kiinnostunut saamaan lisätietoa tarjoamistanne kiinteistönhuoltopalveluista. ', '2024-05-09 00:00:00', 'Käsittelyssä'),
(25, 'Mikko', 'Malli', '040123456', 'Yritys oy', 'mikko.malli@posti.com', 'Hei,\r\n\r\nOlen kiinnostunut kiinteistönhuoltopalveluistanne ja haluaisin saada tarjouksen seuraavista palveluista:\r\n\r\nSäännöllinen siivouspalvelu toimistotiloihimme, joka sisältäisi lattioiden puhdistuksen, pölyjen pyyhkimisen ja roskien poiston.\r\nTalonmiehen palvelut pienille korjaustöille ja huoltotehtäville.\r\nKiinteistömme sijaitsee Helsingin keskustassa ja käsittää noin 1200 neliömetriä toimistotilaa.\r\n\r\nOlisi hienoa, jos voisitte ottaa yhteyttä ja keskustella yksityiskohdista sekä tarjota kustannusarvion.', '2024-05-10 01:41:13', 'Uusi');

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
  `etunimi` varchar(11) NOT NULL,
  `sukunimi` varchar(11) NOT NULL,
  `puhelin` varchar(11) NOT NULL,
  `tyontekija_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `tehtavataulu`
--

INSERT INTO `tehtavataulu` (`id`, `osoite`, `huoltopyynnontyyppi`, `kuvaus`, `ilmoittajanid`, `etunimi`, `sukunimi`, `puhelin`, `tyontekija_id`) VALUES
(7, 'testi1', 1, 'testi1', 1, 'testi1', 'testi1', 'testi1', 1),
(8, 'testi2', 2, 'testi2', 11, 'testi2', 'testi2', 'testi2', 0),
(9, 'testi3', 2, 'testi3', 1, 'testi3', 'testi3', 'testi3', 1);

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
  `omatila` tinyint(1) NOT NULL,
  `sposti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vedos taulusta `tyontekijataulu`
--

INSERT INTO `tyontekijataulu` (`id`, `etunimi`, `sukunimi`, `osoite`, `puhelin`, `omatila`, `sposti`) VALUES
(1, 'testi1', 'testi1', 'testi1', 'testi1', 1, 'testi1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asiakastaulu`
--
ALTER TABLE `asiakastaulu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayttaja_ja_salasana`
--
ALTER TABLE `kayttaja_ja_salasana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otayhteyttataulu`
--
ALTER TABLE `otayhteyttataulu`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kayttaja_ja_salasana`
--
ALTER TABLE `kayttaja_ja_salasana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otayhteyttataulu`
--
ALTER TABLE `otayhteyttataulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

--
-- AUTO_INCREMENT for table `tehtavataulu`
--
ALTER TABLE `tehtavataulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tyontekijataulu`
--
ALTER TABLE `tyontekijataulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
