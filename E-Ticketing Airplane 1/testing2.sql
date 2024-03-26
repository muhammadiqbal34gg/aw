-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2024 pada 11.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_penerbangan`
--

CREATE TABLE `jadwal_penerbangan` (
  `id_jadwal` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_tiba` time NOT NULL,
  `harga` int(11) NOT NULL,
  `kapasitas_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_penerbangan`
--

INSERT INTO `jadwal_penerbangan` (`id_jadwal`, `id_rute`, `waktu_berangkat`, `waktu_tiba`, `harga`, `kapasitas_kursi`) VALUES
(13, 1, '12:03:00', '12:03:00', 123, 1),
(14, 1, '03:23:00', '12:23:00', 3123132, 8),
(15, 1, '12:03:00', '13:02:00', 1231, 123),
(16, 1, '21:21:00', '04:44:00', 90000, 11),
(17, 11, '04:44:00', '06:59:00', 999, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Jakartaaa'),
(2, 'Bali'),
(3, 'Surabaya'),
(4, 'Yogyakarta'),
(5, 'Bengkulu'),
(6, 'Lombok'),
(7, 'Aceh'),
(8, 'Banten'),
(10, 'Medan'),
(11, 'Padangg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maskapai`
--

CREATE TABLE `maskapai` (
  `id_maskapai` int(11) NOT NULL,
  `logo_maskapai` text DEFAULT NULL,
  `nama_maskapai` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `maskapai`
--

INSERT INTO `maskapai` (`id_maskapai`, `logo_maskapai`, `nama_maskapai`, `kapasitas`) VALUES
(1, 'garuda.jpg', 'Garuda Indonesia', 24),
(2, 'air-asia.png', 'Air Asia', 200),
(3, 'singa aer.jpg', 'Lion Air', 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penerbangan` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_user`, `id_penerbangan`, `id_order`, `jumlah_tiket`, `total_harga`) VALUES
(27, 3, 14, '6601b21de4abd', 1, 3123132),
(28, 3, 13, '6602602e07b73', 1, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_tiket`
--

CREATE TABLE `order_tiket` (
  `id_order` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `struk` varchar(100) NOT NULL,
  `status` enum('Proses','Berhasil','Gagal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_tiket`
--

INSERT INTO `order_tiket` (`id_order`, `tanggal_transaksi`, `struk`, `status`) VALUES
('6601b21de4abd', '2024-03-25', 'ae09033eecc624f3f004', 'Berhasil'),
('6602602e07b73', '2024-03-26', '7aa4fd3cbf7c3b36ddc0', 'Proses'),
('660297836c23b', '2024-03-26', '29600aafa421d227a886', 'Proses'),
('660297ee5981e', '2024-03-26', '048c460e18ce0053e3f9', 'Proses'),
('660298c3b2f66', '2024-03-26', '9abe2a358c6bed7aa200', 'Proses'),
('660298eedf3b5', '2024-03-26', '9127e12deff1adedfa48', 'Proses'),
('6602991e5fd31', '2024-03-26', 'cfd956a17739be67f13c', 'Proses'),
('66029c09029c6', '2024-03-26', '834f5abe04a8d2f5a3ce', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `id_maskapai` int(11) NOT NULL,
  `rute_asal` varchar(100) NOT NULL,
  `rute_tujuan` varchar(100) NOT NULL,
  `tanggal_pergi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`id_rute`, `id_maskapai`, `rute_asal`, `rute_tujuan`, `tanggal_pergi`) VALUES
(1, 1, 'Jakarta', 'Bali', '2024-02-24'),
(3, 3, 'Bali', 'Yogyakarta', '2024-02-24'),
(7, 3, 'Jakarta', 'Bali', '2024-02-24'),
(10, 1, 'Bali', 'Yogyakarta', '0000-00-00'),
(11, 3, 'Banten', 'Bengkulu', '2024-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('Admin','Maskapai','Penumpang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `roles`) VALUES
(1, 'admin', 'Rendi Admin', '123', 'Admin'),
(2, 'petugas VVIP', 'Rendi Petugas', 'rendipetugas', 'Maskapai'),
(3, 'user', 'Rendi User', '123', 'Penumpang'),
(6, 'tes', 'teshhh', '123', 'Maskapai'),
(8, 'opopopop', 'adit geming', '123', 'Maskapai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_penerbangan`
--
ALTER TABLE `jadwal_penerbangan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `maskapai`
--
ALTER TABLE `maskapai`
  ADD PRIMARY KEY (`id_maskapai`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_penerbangan` (`id_penerbangan`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `order_tiket`
--
ALTER TABLE `order_tiket`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`),
  ADD KEY `id_maskapai` (`id_maskapai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_penerbangan`
--
ALTER TABLE `jadwal_penerbangan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `maskapai`
--
ALTER TABLE `maskapai`
  MODIFY `id_maskapai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `rute`
--
ALTER TABLE `rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_penerbangan`
--
ALTER TABLE `jadwal_penerbangan`
  ADD CONSTRAINT `jadwal_penerbangan_ibfk_1` FOREIGN KEY (`id_rute`) REFERENCES `rute` (`id_rute`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_penerbangan`) REFERENCES `jadwal_penerbangan` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `order_tiket` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rute`
--
ALTER TABLE `rute`
  ADD CONSTRAINT `rute_ibfk_1` FOREIGN KEY (`id_maskapai`) REFERENCES `maskapai` (`id_maskapai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
