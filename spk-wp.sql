-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 12:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(20) NOT NULL,
  `alternatif` varchar(20) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `k5` varchar(20) NOT NULL,
  `k6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`) VALUES
('101572', 'BG 8125 UR', '1', '3', '1', '1', '1', '4'),
('101652', 'BG 9707 MT', '1', '2', '2', '1', '3', '2'),
('11254', 'BG 2187 YS', '1', '1', '4', '2', '4', '4'),
('368846', 'bg 888 yy', '3', '3', '3', '3', '3', '3'),
('37889', 'bg 999 yy', '4', '4', '4', '4', '4', '4'),
('398689', 'BG 4287 LA', '2', '2', '2', '1', '2', '2'),
('518514', 'BG 8790 JE', '2', '2', '3', '1', '3', '3'),
('532428', 'BG 8723 MC', '1', '2', '1', '1', '1', '1'),
('583831', 'BG 3373 NI', '2', '2', '3', '3', '4', '2'),
('605277', 'BG 8317 HA', '1', '3', '1', '2', '2', '2'),
('605380', 'BG 1210 OE', '1', '3', '1', '2', '2', '3'),
('667431', 'BG 8693 LN', '1', '2', '1', '1', '1', '1'),
('733858', 'bg 777 yy', '2', '2', '2', '2', '2', '2'),
('828711', 'BG 3730 JB', '4', '4', '3', '2', '4', '1'),
('871281', 'BG 8861 LN', '3', '3', '2', '2', '2', '1'),
('958477', 'bg 666 yy', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `alternatif` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `hasil` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `alternatif`, `hasil`) VALUES
(1, 'BG 2091 UT', '0.280032'),
(2, 'BG 9302 ZZ', '0.310715'),
(3, 'BG 8790 JE', '0.186941'),
(4, 'BG 1349 ZU', '0.222312');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `alternatif` varchar(10) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`alternatif`, `merk`, `tahun`, `jenis`) VALUES
('BG 1210 OE', 'Mistubishi Canter', 2016, 'engkel'),
('BG 2187 YS', 'Mitsubishi Colt', 2013, 'engkel'),
('BG 3373 NI', 'Mitsubishi Tronton 6x4', 2013, 'tronton'),
('BG 3730 JB', 'Mistubishi Fuso', 2018, 'engkel'),
('BG 4287 LA', 'Mitsubishi Tronton 6x4', 2014, 'tronton'),
('bg 666 yy', 'Mistubishi Fuso', 2011, 'engkel'),
('bg 777 yy', 'Isuzu Traga', 2011, 'tronton'),
('BG 8125 UR', 'Mistubishi Fuso', 2017, 'tronton'),
('BG 8317 HA', 'Mistubishi Canter', 2018, 'engkel'),
('BG 8693 LN', 'Isuzu Traga', 2017, 'engkel'),
('BG 8723 MC', 'Isuzu Traga', 2019, 'engkel'),
('BG 8790 JE', 'Mistubishi Canter', 2019, 'engkel'),
('BG 8861 LN', 'Mistubishi Fuso', 2016, 'tronton'),
('bg 888 yy', 'Isuzu Traga', 2017, 'tronton'),
('BG 9707 MT', 'Mistubishi Fuso', 2017, 'tronton'),
('bg 999 yy', 'Isuzu Traga', 2014, 'tronton');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(20) NOT NULL,
  `bobot` varchar(20) NOT NULL,
  `cost_benefit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`, `cost_benefit`) VALUES
('1', 'k1 Usia Kendaraan', '10', 'benefit'),
('2', 'k2 Mesin', '20', 'cost'),
('3', 'k3 Sistem Kemudi', '20', 'cost'),
('4', 'k4 Sistem Pengereman', '20', 'cost'),
('5', 'k5 Sistem Penerangan', '15', 'cost'),
('6', 'k6 Ban dan Kaki-kaki', '15', 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `email`, `level`) VALUES
(1, 'rani5677700', 'admin', 'admin', 'rani666@gmail.com', 'admin'),
(11, 'mario ananda', 'mario', 'mario', 'marioananda@gmail.com', 'mekanik'),
(12, 'Rio HB', 'riohb', 'riohb', 'rionovianto@gmail.com', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD UNIQUE KEY `alternatif` (`alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatif` (`alternatif`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
