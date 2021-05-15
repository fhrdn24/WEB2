-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 07:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_plat` varchar(12) NOT NULL,
  `id_tipe` varchar(30) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `tarif` double(20,0) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT '',
  `alamat` varchar(50) DEFAULT '',
  `telepon` varchar(25) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` varchar(25) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `sim` varchar(25) DEFAULT NULL,
  `tarif` double(20,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id_tipe` varchar(30) NOT NULL,
  `varchar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(30) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_plat` varchar(12) NOT NULL,
  `id_supir` varchar(25) NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali_rencana` date DEFAULT NULL,
  `tanggal_kembali_realisasi` date DEFAULT NULL,
  `denda` double(20,0) DEFAULT 0,
  `km_pinjam` double(20,0) DEFAULT 0,
  `km_kembali` double(20,0) DEFAULT 0,
  `bbm_pinjam` double(20,0) DEFAULT 0,
  `bbm_kembali` double(20,0) DEFAULT 0,
  `kondisi_mobil_pinjam` varchar(50) DEFAULT '',
  `kondisi_mobil_kembali` varchar(50) DEFAULT '',
  `kerusakan` varchar(50) DEFAULT '',
  `biaya_kerusakan` double(20,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_plat`),
  ADD KEY `fk_tipe_kendaraan` (`id_tipe`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `fk_no_ktp` (`no_ktp`),
  ADD KEY `fk_id_supir` (`id_supir`),
  ADD KEY `fk_no_plat` (`no_plat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `fk_tipe_kendaraan` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_kendaraan` (`id_tipe`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id_supir` FOREIGN KEY (`id_supir`) REFERENCES `sopir` (`id_sopir`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_no_ktp` FOREIGN KEY (`no_ktp`) REFERENCES `pelanggan` (`no_ktp`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_no_plat` FOREIGN KEY (`no_plat`) REFERENCES `kendaraan` (`no_plat`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
