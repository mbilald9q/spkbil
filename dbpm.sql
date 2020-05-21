-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 06:12 PM
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
('KR001', 'Ujang');

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
  `kode_aspek` varchar(2) NOT NULL,
  `kode_kriteria` varchar(2) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `nilai_kriteria` int(11) NOT NULL,
  `factor_kriteria` enum('1','2') DEFAULT NULL COMMENT '1=Core;2=Secondary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kode_aspek`, `kode_kriteria`, `nama_kriteria`, `nilai_kriteria`, `factor_kriteria`) VALUES
('AK', 'A1', 'Wawasan Ilmu Pengetahuan', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_profile` (
`id_profile` int(10) NOT NULL,
  `kode_alternatif` varchar(2) NOT NULL,
  `kode_kriteria` varchar(2) NOT NULL,
  `nilai_profile` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`id_profile`), ADD KEY `kode_alternatif` (`kode_alternatif`), ADD KEY `kode_kriteria` (`kode_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
MODIFY `id_profile` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
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
ADD CONSTRAINT `tbl_profile_ibfk_1` FOREIGN KEY (`kode_alternatif`) REFERENCES `tbl_alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_profile_ibfk_2` FOREIGN KEY (`kode_kriteria`) REFERENCES `tbl_kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
