-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2022 pada 23.40
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
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_on` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id_aset`, `id_user`, `id_jenis_aset`, `id_bidang`, `no_aset`, `nama_aset`, `merk_aset`, `qty`, `owner_aset`, `lokasi_aset`, `subclass_aset`, `used_by`, `added_by`, `updated_by`, `created_on`) VALUES
(5, 2, 1, 3, 'AS0001', 'Handphone', 'Samsung', 6, 'Persandian', 'Kantor Gubernur ', 'Perangkat Jaring', 'Persandian', 1, 2, 1658868717),
(6, 1, 2, 3, 'AS0002', 'Microsoft Office', 'Microsofy', 1, 'Persandian', 'Kantor Gubernur', 'Aplikasi', 'Persandian', 1, 0, 1653329604),
(7, 1, 1, 2, 'AS0003', 'Switch', 'MikroTik', 2, 'Persandian', 'Kantor Bidang Persandian', 'Perangkat Jaringan', 'Persandian', 1, 0, 1654620310),
(15, 1, 2, 1, 'A00004', 'Alienvault', 'alienvault', 1, 'Persandian', 'Data Center', 'Software', 'Persandian', 1, 0, 1656904902),
(16, 1, 1, 2, 'AS0089', 'Handphone', 'Samsung', 15, 'Aptika', 'Kantor Aptika', 'Alat Komunikasi', 'Pegawai', 1, 0, 1658866002);

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
(3, 'Infrastruktur', 'Jalan Gajah Mada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
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
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `id_user`, `id_menu`, `tambah`, `edit`, `hapus`) VALUES
(2, 1, 2, 1, 1, 1),
(3, 1, 3, 1, 1, 2),
(4, 1, 4, 1, 1, 1),
(5, 1, 5, 1, 1, 1),
(6, 1, 6, 1, 1, 1),
(8, 1, 8, 1, 1, 2),
(9, 1, 9, 2, 1, 1),
(12, 5, 2, 1, 1, 1),
(13, 5, 3, 0, 0, 2),
(15, 5, 5, 0, 0, 0),
(16, 5, 6, 1, 1, 1),
(18, 5, 8, 1, 1, 2),
(19, 5, 9, 2, 1, 2),
(20, 2, 2, 1, 1, 1),
(21, 2, 3, 0, 0, 2),
(22, 2, 5, 0, 0, 0),
(108, 44, 2, 0, 0, 0),
(109, 44, 3, 0, 0, 2),
(110, 44, 5, 0, 0, 0),
(111, 44, 6, 0, 0, 0),
(113, 44, 8, 0, 0, 2),
(115, 44, 9, 2, 0, 2),
(116, 2, 6, 1, 1, 1),
(118, 2, 8, 1, 1, 2),
(119, 2, 9, 2, 1, 2);

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
(2, 'Software'),
(4, 'Lisensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
(2, 'Data Aset'),
(3, 'Data Jenis Aset'),
(4, 'Data User'),
(5, 'Data Bidang'),
(6, 'Identifikasi Risiko'),
(8, 'Rencana Penanganan'),
(9, 'Realisasi Penanganan');

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
  `real_mulai` date NOT NULL,
  `real_selesai` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `hambatan` varchar(512) NOT NULL,
  `keterangan` text NOT NULL,
  `berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitor_rtp`
--

INSERT INTO `monitor_rtp` (`id_risiko`, `deskripsi`, `plan_mulai`, `plan_selesai`, `indikator_output`, `pic`, `anggaran`, `real_mulai`, `real_selesai`, `status`, `hambatan`, `keterangan`, `berkas`) VALUES
(2, 'Tes', '2022-07-02', '2022-07-04', 'Tes', 'Persandian', 0, '2022-07-19', '2022-07-21', 'Close', 'Tidak Ada Hambatan', 'Risiko Terkendali', '');

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
  `id_user` int(11) NOT NULL,
  `tahun` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `risiko`
--

INSERT INTO `risiko` (`id_risiko`, `nama_risiko`, `penyebab`, `dampak`, `skala_dampak`, `skala_kemungkinan`, `tingkat_risiko`, `kategori_penyebab`, `pengendalian`, `keputusan`, `id_aset`, `id_user`, `tahun`) VALUES
(2, 'Penonaktifan smartphone yang tidak tepat', 'Lalai menghapus data dengan aman', 'Data rahasia tersebar luas di masyarakat', 4, 5, 20, '', 'Menghapus data di folder sampah (recycle bin)', 'Risiko ditransfer ke pihak lain', 5, 1, 2022),
(3, 'Smartphone hilang/dicuri', 'Kecopetan di kereta', 'Tidak bisa menghubungi teman untuk agenda pertemuan', 3, 1, 3, '', 'Melakukan backup data dan kontak di harddisk eksternal', 'Risiko dikurangi (mitigasi)', 5, 1, 2022),
(18, 'Tes Office', 'Tes Office', 'Tes Office', 1, 1, 1, '', 'Tes Office', 'Tes Office', 6, 1, 2020),
(19, 'Risiko Handphone Aptika', 'Risiko Handphone Aptika', 'Risiko Handphone Aptika', 1, 5, 5, '', 'Risiko Handphone Aptika', 'Risiko Handphone Aptika', 16, 1, 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `status`, `id_bidang`) VALUES
(1, 'admin', '$2y$10$pDWXZaIhuhVRUcZfgqXe3edpqWoer3z8HvADyOJSj9OChcixfMR9S', 'Admin', 'Active', 1),
(2, 'infra', '$2y$10$pDWXZaIhuhVRUcZfgqXe3edpqWoer3z8HvADyOJSj9OChcixfMR9S', 'Insfrastruktur', 'Active', 3),
(5, 'aptika', '$2y$10$pDWXZaIhuhVRUcZfgqXe3edpqWoer3z8HvADyOJSj9OChcixfMR9S', 'Aptika', 'Active', 2),
(44, 'eksekutif', '$2y$10$pDWXZaIhuhVRUcZfgqXe3edpqWoer3z8HvADyOJSj9OChcixfMR9S', 'Eksekutif', 'Active', 1);

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
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `jenis_aset`
--
ALTER TABLE `jenis_aset`
  ADD PRIMARY KEY (`id_jenis_aset`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT untuk tabel `jenis_aset`
--
ALTER TABLE `jenis_aset`
  MODIFY `id_jenis_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `risiko`
--
ALTER TABLE `risiko`
  MODIFY `id_risiko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
-- Ketidakleluasaan untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD CONSTRAINT `hak_akses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hak_akses_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
