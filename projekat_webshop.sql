-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 09:56 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `analogni`
--

CREATE TABLE `analogni` (
  `id` int(11) NOT NULL,
  `analogni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analogni`
--

INSERT INTO `analogni` (`id`, `analogni`) VALUES
(3, 10),
(4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `digitalni`
--

CREATE TABLE `digitalni` (
  `id` int(11) NOT NULL,
  `digitalni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `digitalni`
--

INSERT INTO `digitalni` (`id`, `digitalni`) VALUES
(1, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `id` int(11) NOT NULL,
  `datum_vreme` datetime NOT NULL,
  `ukupno` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`id`, `datum_vreme`, `ukupno`) VALUES
(14, '2021-01-18 19:34:12', '126000.00'),
(15, '2021-01-18 19:36:08', '126000.00'),
(16, '2021-01-18 19:43:26', '90000.00'),
(17, '2021-01-20 00:01:08', '296000.00'),
(18, '2021-01-20 00:01:39', '191000.00'),
(19, '2021-01-20 00:03:30', '191000.00'),
(20, '2021-01-20 12:27:14', '50000.00');

-- --------------------------------------------------------

--
-- Table structure for table `satovi`
--

CREATE TABLE `satovi` (
  `id` int(11) NOT NULL,
  `proizvodjac` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` decimal(11,2) NOT NULL,
  `grupa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satovi`
--

INSERT INTO `satovi` (`id`, `proizvodjac`, `model`, `opis`, `slika`, `cena`, `grupa`) VALUES
(10, 'Fossil', 'LATITUDE FS5754', '50mm Fossil Latitude muški hronograf od nerđajućeg čelika sa crnim brojčanikom i koronom sa prikazom datuma. Narukvica je crna od nerđajućeg čelika.', 'fossil.jpeg', '21000.00', 'analogni'),
(11, 'Festina', 'PRESTIGE F20492/4', '48mm Festina prestige muški hronograf sa crnim brojčanikom sa prikazom datuma i linearnim indeksima. Kućište i narukvica su od nerđajućeg čelika u boji zlata. Staklo je safirno. Vodootrponost do 10atm.', 'festina.jpg', '45000.00', 'analogni'),
(12, 'Diesel', 'CRUSHER DZ1901', '46mm Diesel Chrusher digitalni muški sat sa crnim brojčanikom, zlatnom koronom i crnom silikonskom narukvicom.', 'diesel.jpeg', '25000.00', 'digitalni'),
(13, 'Lotus', 'SMARTIME 50014/1', '42 mm sportski pametni sat sa mrežastom metalnom narukvicom i dodatnom bledo sivom silikonskom narukvicom. Neke od funkcionalnosti: 8 Sportski mod - merač pulsa - merač pritiska - brojač koraka - praćenje sna - podsetnik odsustva Aktivnosti - Predsjednik Ekran osetljiv na dodir- notifikacije ', 'lotus.jpg', '15000.00', 'digitalni'),
(15, 'G-SHOCK', 'CASIO GA-2100SU-1A', 'Nova zaštitna struktura karbonskog jezgra štiti modul zatvarajući ga u karbonsko kućište. Kućište je izrađeno od fine smole ugrađene u karbonska vlakna za izvanrednu čvrstoću, otpornost na pukotine i trajnost.', 'g_shock.jpg', '13990.00', 'digitalni'),
(16, 'Casio', 'CASIO PRT-B50-1', 'dimenzije kućišta: 57,50mm (visina od 12-6) / 50,80mm (širina  od 9-3),težina: 65g,\r\nmaterijal kućišta: gumeno kućište.', 'casio.jpg', '28000.00', 'digitalni'),
(17, 'SECTOR', ' R3273613002', 'Indikator napunjenosti baterije,\r\nMineralno staklo, \r\nKućište nerđajući čelik\r\nNarukvica: nerđajući čelik,\r\n24 časovni prikaz vremena', 'sector.jpg', '21990.00', 'analogni');

-- --------------------------------------------------------

--
-- Table structure for table `stavke_korpe`
--

CREATE TABLE `stavke_korpe` (
  `id` int(11) NOT NULL,
  `korpa_id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `cena` decimal(11,2) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stavke_korpe`
--

INSERT INTO `stavke_korpe` (`id`, `korpa_id`, `proizvod_id`, `cena`, `kolicina`) VALUES
(1, 14, 10, '21000.00', 6),
(2, 15, 10, '21000.00', 6),
(3, 15, 11, '45000.00', 2),
(4, 15, 13, '15000.00', 2),
(5, 15, 12, '25000.00', 4),
(6, 16, 11, '45000.00', 2),
(7, 16, 13, '15000.00', 2),
(8, 16, 12, '25000.00', 4),
(9, 17, 11, '45000.00', 3),
(10, 17, 10, '21000.00', 5),
(11, 17, 16, '28000.00', 2),
(12, 18, 11, '45000.00', 3),
(13, 18, 16, '28000.00', 2),
(14, 19, 11, '45000.00', 3),
(15, 19, 16, '28000.00', 2),
(16, 20, 12, '25000.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'a', 'a'),
(2, 'b', 'b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analogni`
--
ALTER TABLE `analogni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analogni` (`analogni`);

--
-- Indexes for table `digitalni`
--
ALTER TABLE `digitalni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `digitalni` (`digitalni`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satovi`
--
ALTER TABLE `satovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stavke_korpe`
--
ALTER TABLE `stavke_korpe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korpa_id` (`korpa_id`),
  ADD KEY `proizvod_id` (`proizvod_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analogni`
--
ALTER TABLE `analogni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `digitalni`
--
ALTER TABLE `digitalni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `satovi`
--
ALTER TABLE `satovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stavke_korpe`
--
ALTER TABLE `stavke_korpe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analogni`
--
ALTER TABLE `analogni`
  ADD CONSTRAINT `analogni_ibfk_1` FOREIGN KEY (`analogni`) REFERENCES `satovi` (`id`);

--
-- Constraints for table `digitalni`
--
ALTER TABLE `digitalni`
  ADD CONSTRAINT `digitalni_ibfk_1` FOREIGN KEY (`digitalni`) REFERENCES `satovi` (`id`);

--
-- Constraints for table `stavke_korpe`
--
ALTER TABLE `stavke_korpe`
  ADD CONSTRAINT `stavke_korpe_ibfk_2` FOREIGN KEY (`korpa_id`) REFERENCES `korpa` (`id`),
  ADD CONSTRAINT `stavke_korpe_ibfk_3` FOREIGN KEY (`proizvod_id`) REFERENCES `satovi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
