-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 01:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upk_asih`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `kodeTarif` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `kodeTarif`) VALUES
(6, 'B', 'G', 'A1'),
(7, 'A', 'Cangak 1/3', 'A1'),
(8, 'Khazim FIkri A', 'Cangak City', 'A2'),
(9, 'Sri Asih', 'Cangak City', 'A2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `id_tagihan` int(11) DEFAULT NULL,
  `jumlah_tagihan` double(16,0) DEFAULT NULL,
  `biaya_admin` double(16,0) DEFAULT '2500',
  `status_pembayaran` int(11) DEFAULT '1',
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tanggal_bayar`, `id_tagihan`, `jumlah_tagihan`, `biaya_admin`, `status_pembayaran`, `id_pelanggan`) VALUES
(1, '2018-01-29', 2, 48000, 2500, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id_struk` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `kodeTarif` varchar(10) DEFAULT NULL,
  `tagihan` double(16,0) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `admin` varchar(100) DEFAULT 'Sri Asih',
  `tanggal_bayar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struk`
--

INSERT INTO `struk` (`id_struk`, `id_pelanggan`, `kodeTarif`, `tagihan`, `id_pembayaran`, `admin`, `tanggal_bayar`) VALUES
(1, 6, 'A1', 50500, 1, 'Sri Asih', '2018-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `tagihan` double(16,0) DEFAULT '0',
  `pemakaian` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `pelanggan_id` int(11) DEFAULT NULL,
  `waktu_awal` date DEFAULT NULL,
  `waktu_akhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `tagihan`, `pemakaian`, `status`, `pelanggan_id`, `waktu_awal`, `waktu_akhir`) VALUES
(5, 0, 0, 1, 7, '2018-01-30', '2018-01-30'),
(6, 0, 0, 1, 6, '2018-01-30', '2018-01-30'),
(7, 0, 0, 1, 8, '2018-01-30', '2018-01-30'),
(8, 0, 0, 1, 9, '2018-01-30', '2018-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `daya` int(11) DEFAULT NULL,
  `tarif_perKWH` double(16,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `kode`, `daya`, `tarif_perKWH`) VALUES
(1, 'A1', 100, 500),
(2, 'A2', 200, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`,`nama`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id_struk`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id_struk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
