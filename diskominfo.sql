-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2022 pada 11.28
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
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id_aset`, `id_user`, `id_jenis_aset`, `id_bidang`, `no_aset`, `nama_aset`, `merk_aset`, `qty`, `owner_aset`, `lokasi_aset`, `subclass_aset`, `used_by`, `created_on`) VALUES
(5, 1, 1, 1, 'AS0001', 'Router', 'Cisco', 5, 'Persandian', 'Kantor Gubernur ', 'Perangkat Jaring', 'Persandian', '0000-00-00 00:00:00');

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
-- Struktur dari tabel `keputusan`
--

CREATE TABLE `keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `id_risiko` int(11) NOT NULL,
  `keputusan_risiko` varchar(32) NOT NULL,
  `keterangan_keputusan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `risiko`
--

CREATE TABLE `risiko` (
  `id_risiko` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `nama_risiko` varchar(32) NOT NULL,
  `tingkat_risiko` varchar(32) NOT NULL,
  `dampak_risiko` varchar(32) NOT NULL,
  `kemungkinan_risiko` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`),
  ADD KEY `id_risiko` (`id_risiko`);

--
-- Indeks untuk tabel `risiko`
--
ALTER TABLE `risiko`
  ADD PRIMARY KEY (`id_risiko`),
  ADD KEY `id_aset` (`id_aset`);

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
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `risiko`
--
ALTER TABLE `risiko`
  MODIFY `id_risiko` int(11) NOT NULL AUTO_INCREMENT;

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
-- Ketidakleluasaan untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_ibfk_1` FOREIGN KEY (`id_risiko`) REFERENCES `risiko` (`id_risiko`);

--
-- Ketidakleluasaan untuk tabel `risiko`
--
ALTER TABLE `risiko`
  ADD CONSTRAINT `risiko_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
