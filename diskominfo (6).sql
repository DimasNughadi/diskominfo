-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 08.30
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
-- Struktur dari tabel `aset`
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
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id_aset`, `id_user`, `id_jenis_aset`, `id_bidang`, `no_aset`, `nama_aset`, `merk_aset`, `qty`, `owner_aset`, `lokasi_aset`, `subclass_aset`, `used_by`, `created_on`) VALUES
(5, 1, 1, 3, 'AS0001', 'Handphone', 'Samsung', 5, 'Persandian', 'Kantor Gubernur ', 'Perangkat Jaring', 'Persandian', 1653329584),
(6, 1, 2, 3, 'AS0002', 'Microsoft Office', 'Microsofy', 1, 'Persandian', 'Kantor Gubernur', 'Aplikasi', 'Persandian', 1653329604),
(7, 1, 1, 1, 'AS0003', 'Switch', 'MikroTik', 2, 'Persandian', 'Kantor Bidang Persandian', 'Perangkat Jaringan', 'Persandian', 1653125044);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `lokasi`) VALUES
(1, 'Persandian', 'Jalan Diponegoro'),
(2, 'Aptika', 'Jalan Gajah Mada'),
(3, 'Statistika', 'Jalan Gajah Mada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_aset`
--

CREATE TABLE `jenis_aset` (
  `id_jenis_aset` int(11) NOT NULL,
  `nama_jenis_aset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_aset`
--

INSERT INTO `jenis_aset` (`id_jenis_aset`, `nama_jenis_aset`) VALUES
(1, 'Physical'),
(2, 'Software');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitor_rtp`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `risiko`
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
-- Dumping data untuk tabel `risiko`
--

INSERT INTO `risiko` (`id_risiko`, `nama_risiko`, `penyebab`, `dampak`, `skala_dampak`, `skala_kemungkinan`, `tingkat_risiko`, `kategori_penyebab`, `pengendalian`, `keputusan`, `id_aset`, `id_user`) VALUES
(2, 'Penonaktifan smartphone yang tidak tepat', 'Penonaktifan smartphone yang tidak tepat', 'Data rahasia tersebar luas di masyarakat', 3, 1, 3, '', 'Menghapus data di folder sampah (recycle bin)', 'Risiko ditransfer ke pihak lain', 5, 1),
(3, 'Smartphone hilang/dicuri', 'Coba Edit', 'Coba Edit', 3, 1, 3, '', 'Coba Edit', 'Coba Edit', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(16) NOT NULL,
  `departemen` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `departemen`, `status`) VALUES
(1, 'admin', '$2y$10$3Bb1Vo37c1BfRAD/CNXBu.cCamOoM4p2bdZMFTm0jEwP2A4Jj3Bq6', 'Admin', 'Persandian', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenis_aset` (`id_jenis_aset`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `jenis_aset`
--
ALTER TABLE `jenis_aset`
  ADD PRIMARY KEY (`id_jenis_aset`);

--
-- Indeks untuk tabel `monitor_rtp`
--
ALTER TABLE `monitor_rtp`
  ADD KEY `id_sop` (`id_risiko`);

--
-- Indeks untuk tabel `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`id_risiko`),
  ADD KEY `id_aset` (`id_aset`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_aset`
--
ALTER TABLE `jenis_aset`
  MODIFY `id_jenis_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `risiko`
--
ALTER TABLE `risiko`
  MODIFY `id_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD CONSTRAINT `aset_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `aset_ibfk_2` FOREIGN KEY (`id_jenis_aset`) REFERENCES `jenis_aset` (`id_jenis_aset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aset_ibfk_3` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `monitor_rtp`
--
ALTER TABLE `monitor_rtp`
  ADD CONSTRAINT `monitor_rtp_ibfk_1` FOREIGN KEY (`id_risiko`) REFERENCES `risiko` (`id_risiko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `risiko`
--
ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `risiko_ibfk_3` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
