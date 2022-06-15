-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 09:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_aset` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `no_aset` varchar(16) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `merk_aset` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `owner_aset` varchar(16) NOT NULL,
  `lokasi_aset` varchar(50) NOT NULL,
  `subclass_aset` varchar(50) NOT NULL,
  `used_by` varchar(16) NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `id_user`, `id_jenis_aset`, `id_bidang`, `no_aset`, `nama_aset`, `merk_aset`, `qty`, `owner_aset`, `lokasi_aset`, `subclass_aset`, `used_by`, `created_on`) VALUES
(5, 1, 1, 3, 'AS0001', 'Handphone', 'Samsung', 5, 'Persandian', 'Kantor Gubernur ', 'Perangkat Jaring', 'Persandian', 1653329584),
(6, 1, 2, 3, 'AS0002', 'Microsoft Office', 'Microsofy', 1, 'Persandian', 'Kantor Gubernur', 'Aplikasi', 'Persandian', 1653329604),
(7, 1, 1, 2, 'AS0003', 'Switch', 'MikroTik', 2, 'Persandian', 'Kantor Bidang Persandian', 'Perangkat Jaringan', 'Persandian', 1654620310),
(12, 1, 1, 1, 'AS0005', 'meja rapat', 'Aptika', 4, 'persandian', 'kantor persandian', 'Perangkat Jaringan', 'persandian', 1655111222);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `lokasi`) VALUES
(1, 'Persandian', 'Jalan Diponegoro'),
(2, 'Aptika', 'Jalan Gajah Mada'),
(3, 'Statistika', 'Jalan Gajah Mada');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `tambah` int(11) NOT NULL DEFAULT 1,
  `edit` int(11) NOT NULL DEFAULT 1,
  `hapus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `id_user`, `id_menu`, `tambah`, `edit`, `hapus`) VALUES
(2, 1, 2, 1, 1, 1),
(3, 1, 3, 1, 1, 1),
(4, 1, 4, 1, 1, 1),
(5, 1, 5, 1, 1, 1),
(6, 1, 6, 1, 1, 1),
(7, 1, 7, 1, 1, 1),
(8, 1, 8, 1, 1, 1),
(9, 1, 9, 1, 1, 1),
(12, 5, 2, 1, 1, 1),
(13, 5, 3, 1, 1, 1),
(15, 5, 5, 1, 1, 1),
(16, 5, 6, 1, 1, 1),
(17, 5, 7, 1, 1, 1),
(18, 5, 8, 1, 1, 1),
(19, 5, 9, 1, 1, 1),
(20, 2, 2, 1, 1, 1),
(21, 2, 3, 1, 1, 1),
(22, 2, 5, 1, 1, 1),
(108, 44, 2, 1, 1, 1),
(109, 44, 3, 1, 1, 1),
(110, 44, 5, 1, 1, 1),
(111, 44, 6, 1, 1, 1),
(112, 44, 7, 1, 1, 1),
(113, 44, 8, 1, 1, 1),
(115, 44, 9, 1, 1, 1),
(116, 2, 6, 0, 0, 0),
(117, 2, 7, 0, 0, 0),
(118, 2, 8, 0, 0, 0),
(119, 2, 9, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_aset`
--

CREATE TABLE `jenis_aset` (
  `id_jenis_aset` int(11) NOT NULL,
  `nama_jenis_aset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_aset`
--

INSERT INTO `jenis_aset` (`id_jenis_aset`, `nama_jenis_aset`) VALUES
(1, 'Physical'),
(2, 'Software'),
(3, 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
(2, 'Data Aset'),
(3, 'Data Jenis Aset'),
(4, 'Data User'),
(5, 'Data Bidang'),
(6, 'Identifikasi Risiko'),
(7, 'Daftar Risiko'),
(8, 'Rencana Penanganan'),
(9, 'Realisasi Penanganan');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_rtp`
--

CREATE TABLE `monitor_rtp` (
  `id_risiko` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `plan_mulai` date NOT NULL,
  `plan_selesai` date NOT NULL,
  `indikator_output` text NOT NULL,
  `pic` varchar(50) NOT NULL,
  `anggaran` double NOT NULL,
  `real_mulai` int(11) NOT NULL,
  `real_selesai` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `hambatan` varchar(512) NOT NULL,
  `keterangan` text NOT NULL,
  `berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitor_rtp`
--

INSERT INTO `monitor_rtp` (`id_risiko`, `deskripsi`, `plan_mulai`, `plan_selesai`, `indikator_output`, `pic`, `anggaran`, `real_mulai`, `real_selesai`, `status`, `hambatan`, `keterangan`, `berkas`) VALUES
(2, 'Coba', '2022-06-02', '2022-06-14', 'Coba', 'Persandian', 100000, 2022, 2022, 'Close', 'Coba', 'Coba', 'file_admin1.zip');

-- --------------------------------------------------------

--
-- Table structure for table `risiko`
--

CREATE TABLE `risiko` (
  `id_risiko` int(11) NOT NULL,
  `nama_risiko` text NOT NULL,
  `penyebab` text NOT NULL,
  `dampak` text NOT NULL,
  `skala_dampak` int(11) NOT NULL,
  `skala_kemungkinan` int(11) NOT NULL,
  `tingkat_risiko` int(11) NOT NULL,
  `kategori_penyebab` varchar(100) NOT NULL,
  `pengendalian` text NOT NULL,
  `keputusan` text NOT NULL,
  `id_aset` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `risiko`
--

INSERT INTO `risiko` (`id_risiko`, `nama_risiko`, `penyebab`, `dampak`, `skala_dampak`, `skala_kemungkinan`, `tingkat_risiko`, `kategori_penyebab`, `pengendalian`, `keputusan`, `id_aset`, `id_user`) VALUES
(2, 'Penonaktifan smartphone yang tidak tepat', 'Penonaktifan smartphone yang tidak tepat', 'Data rahasia tersebar luas di masyarakat', 5, 5, 25, '', 'Menghapus data di folder sampah (recycle bin)', 'Risiko ditransfer ke pihak lain', 5, 1),
(3, 'Smartphone hilang/dicuri', 'Coba Edit', 'Coba Edit', 3, 1, 3, '', 'Coba Edit', 'Coba Edit', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `status`, `id_bidang`) VALUES
(1, 'admin', '$2y$10$3Bb1Vo37c1BfRAD/CNXBu.cCamOoM4p2bdZMFTm0jEwP2A4Jj3Bq6', 'Admin', 'Active', 1),
(2, 'reza', 'reza', 'User', 'Active', 1),
(5, 'hadi', '$2y$10$TTsVT.nPwrFFZ71FtitzWewF.wosmvvR.utTgSXIP8f6baxYXfahW', 'User', 'Active', 1),
(44, 'dimas', '$2y$10$LQXirbVah2hKv3rTxAEpfeV5hvIN1N73vmeCKTQKBwRxziAp3yGPy', 'User', 'Inactive', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenis_aset` (`id_jenis_aset`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
  ADD PRIMARY KEY (`id_jenis_aset`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `monitor_rtp`
--
ALTER TABLE `monitor_rtp`
  ADD KEY `id_sop` (`id_risiko`);

--
-- Indexes for table `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`id_risiko`),
  ADD KEY `id_aset` (`id_aset`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `jenis_aset`
--
ALTER TABLE `jenis_aset`
  MODIFY `id_jenis_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `risiko`
--
ALTER TABLE `risiko`
  MODIFY `id_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`id_jenis_aset`) REFERENCES `jenis_aset` (`id_jenis_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD CONSTRAINT `hak_akses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hak_akses_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitor_rtp`
--
ALTER TABLE `monitor_rtp`
  ADD CONSTRAINT `monitor_rtp_ibfk_1` FOREIGN KEY (`id_risiko`) REFERENCES `risiko` (`id_risiko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `risiko`
--
ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `risiko_ibfk_3` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
