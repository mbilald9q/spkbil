-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 04:32 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE IF NOT EXISTS `tbl_alternatif` (
  `kode_alternatif` varchar(5) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`kode_alternatif`, `nama_alternatif`) VALUES
('KR001', 'Ujann Rintik-rintik'),
('KR002', 'ujin'),
('KR003', 'Tambah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aspek`
--

CREATE TABLE IF NOT EXISTS `tbl_aspek` (
  `kode_aspek` varchar(2) NOT NULL,
  `nama_aspek` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `bobot_core` float NOT NULL,
  `bobot_secondary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aspek`
--

INSERT INTO `tbl_aspek` (`kode_aspek`, `nama_aspek`, `bobot`, `bobot_core`, `bobot_secondary`) VALUES
('AK', 'Aspek Kecerdasan', 30, 60, 40),
('AP', 'Aspek Prilaku', 50, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot`
--

CREATE TABLE IF NOT EXISTS `tbl_bobot` (
  `selisih` tinyint(3) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bobot`
--

INSERT INTO `tbl_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(-4, 1, 'Kompetensi individu kekurangan 4 tingkat'),
(-3, 2, 'Kompetensi individu  kekurangan 3 tingkat'),
(-2, 3, 'Kompetensi individu kekurangan 2 tingkat'),
(-1, 4, 'Kompetensi individu kekurangan 1 tingkat'),
(0, 5, 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan'),
(1, 4.5, 'Kompetensi individu kelebihan 1 tingkat'),
(2, 3.5, 'Kompetensi individu kelebihan 2 tingkat'),
(3, 2.5, 'Kompetensi individu  kelebihan 3 tingkat'),
(4, 1.5, 'Kompetensi individu kelebihan 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE IF NOT EXISTS `tbl_kriteria` (
  `kode_kriteria` varchar(2) NOT NULL,
  `kode_aspek` varchar(2) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `nilai_kriteria` int(11) NOT NULL,
  `factor_kriteria` enum('1','2') DEFAULT NULL COMMENT '1=Core;2=Secondary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kode_kriteria`, `kode_aspek`, `nama_kriteria`, `nilai_kriteria`, `factor_kriteria`) VALUES
('A1', 'AK', 'Wawasan Ilmu Pengetahuan', 5, '1'),
('A3', 'AK', 'Kecepatan Berpikir', 4, '1'),
('A4', 'AK', 'tes', 4, '1'),
('A9', 'AK', 'Kejahatan', 3, '2'),
('AD', 'AK', 'Kebaikan', 3, '2'),
('P1', 'AP', 'P1', 4, '1'),
('P2', 'AP', '3', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_profile` (
`id_profile` int(10) NOT NULL,
  `kode_alternatif` varchar(5) NOT NULL,
  `kode_kriteria` varchar(2) NOT NULL,
  `nilai_profile` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id_profile`, `kode_alternatif`, `kode_kriteria`, `nilai_profile`) VALUES
(167, 'KR002', 'A9', 3),
(174, 'KR001', 'A1', 4),
(175, 'KR002', 'A1', 3),
(176, 'KR001', 'A3', 5),
(177, 'KR002', 'A3', 3),
(178, 'KR001', 'A4', 3),
(179, 'KR002', 'A4', 3),
(180, 'KR001', 'A9', 3),
(181, 'KR003', 'A9', 3),
(182, 'KR001', 'AD', 2),
(183, 'KR002', 'AD', 3),
(184, 'KR003', 'AD', 3),
(185, 'KR003', 'A1', 3),
(186, 'KR003', 'A3', 3),
(187, 'KR003', 'A4', 3),
(188, 'KR001', 'P1', 2),
(189, 'KR002', 'P1', 3),
(190, 'KR003', 'P1', 3),
(191, 'KR001', 'P2', 2),
(192, 'KR002', 'P2', 3),
(193, 'KR003', 'P2', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
 ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tbl_aspek`
--
ALTER TABLE `tbl_aspek`
 ADD PRIMARY KEY (`kode_aspek`);

--
-- Indexes for table `tbl_bobot`
--
ALTER TABLE `tbl_bobot`
 ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
 ADD PRIMARY KEY (`kode_kriteria`), ADD KEY `id_aspek` (`kode_aspek`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
 ADD PRIMARY KEY (`id_profile`), ADD KEY `kode_alternatif` (`kode_alternatif`), ADD KEY `kode_kriteria` (`kode_kriteria`), ADD KEY `kode_alternatif_2` (`kode_alternatif`), ADD KEY `kode_kriteria_2` (`kode_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
MODIFY `id_profile` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=194;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
ADD CONSTRAINT `tbl_kriteria_ibfk_1` FOREIGN KEY (`kode_aspek`) REFERENCES `tbl_aspek` (`kode_aspek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
ADD CONSTRAINT `tbl_profile_ibfk_1` FOREIGN KEY (`kode_alternatif`) REFERENCES `tbl_alternatif` (`kode_alternatif`),
ADD CONSTRAINT `tbl_profile_ibfk_2` FOREIGN KEY (`kode_kriteria`) REFERENCES `tbl_kriteria` (`kode_kriteria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
