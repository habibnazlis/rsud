-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jan 2025 pada 03.13
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `no_rekam_medis` varchar(50) NOT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `jenis_identitas` varchar(10) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `riwayat_penyakit` text DEFAULT NULL,
  `nama_penanggung` varchar(100) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `no_rekam_medis`, `no_identitas`, `jenis_identitas`, `nama_pasien`, `tempat_lahir`, `tgl_lahir`, `umur`, `jenis_kelamin`, `agama`, `pendidikan`, `pekerjaan`, `kewarganegaraan`, `no_telp`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `marital_status`, `nama_ayah`, `nama_ibu`, `riwayat_penyakit`, `nama_penanggung`, `no_kartu`, `berkas`) VALUES
(1, '123', '1401052312010003', 'KTP', 'Muhammad Habib Nazlis', 'Kuok', '2001-12-23', 23, 'Laki-laki', 'Islam', 'S1', 'mahasiswa', 'Indonesia', '085271153302', 'Kampung Baru Pasar Kuok', 'Riau', 'Kampar', 'Kuok', 'Kuok', 'Belum Kawin', 'Kholisman', 'Nazar Meini Sipayung', '', 'Kholisman', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `auth_key`, `created_at`, `role`) VALUES
(1, 'admin', '$2y$13$T6vWFsIYvHrmt54QSarede3hlb76cYbpztgQC74ir19FtMg28y7je', 'wp3atUFagTVDO7U0WpYO2RUGlqi4amsI', '2025-01-18 08:59:15', 'admin'),
(2, 'user', '$2y$13$kX83Pu8vZjyo/HugsNenEOKo3rFELw0BDJbvB9xUPzlGSSUZtra6.', 'WOV_lf9jCEo1EoueGCX_McM6kKCGDDL4', '2025-01-18 09:10:03', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
