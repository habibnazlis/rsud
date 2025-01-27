-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for rsud
CREATE DATABASE IF NOT EXISTS `rsud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rsud`;

-- Dumping structure for table rsud.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_rekam_medis` varchar(50) NOT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `jenis_identitas` varchar(10) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `umur` int DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pendidikan` enum('SD','SMP','SMA','S1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `riwayat_penyakit` text,
  `nama_penanggung` varchar(100) DEFAULT NULL,
  `no_kartu` varchar(50) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_rekam_medis` (`no_rekam_medis`),
  UNIQUE KEY `no_identitas` (`no_identitas`),
  UNIQUE KEY `no_telp` (`no_telp`),
  UNIQUE KEY `no_kartu` (`no_kartu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table rsud.pasien: ~0 rows (approximately)
REPLACE INTO `pasien` (`id`, `no_rekam_medis`, `no_identitas`, `jenis_identitas`, `nama_pasien`, `tempat_lahir`, `tgl_lahir`, `umur`, `jenis_kelamin`, `agama`, `pendidikan`, `pekerjaan`, `kewarganegaraan`, `no_telp`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `marital_status`, `nama_ayah`, `nama_ibu`, `riwayat_penyakit`, `nama_penanggung`, `no_kartu`, `berkas`) VALUES
	(1, '123', '1401052312010003', 'KTP', 'Muhammad Habib Nazlis', 'Kuok', '2001-12-23', 23, 'Laki-laki', 'Islam', 'S1', 'mahasiswa', 'Indonesia', '085271153302', 'Kampung Baru Pasar Kuok', 'Riau', 'Kampar', 'Kuok', 'Kuok', 'Belum Kawin', 'Kholisman', 'Nazar Meini Sipayung', '', 'Kholisman', '', ''),
	(3, '3545186', '3213568', 'KTP', 'Zidani Akbar', 'Bangkinang', '2006-02-07', 18, 'Laki-laki', 'Islam', 'SMA', 'mahasiswa', 'Indonesia', '081208120812', 'Uwai', 'Riau', 'Kampar', 'Bangkinang Kota', 'Bangkinang', 'Belum menikah', 'Muslimin', 'Siti', '', 'Muslimin', '5354685', '');

-- Dumping structure for table rsud.program
CREATE TABLE IF NOT EXISTS `program` (
  `id` int NOT NULL AUTO_INCREMENT,
  `program` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `tgl_program` date NOT NULL,
  `rawat_jalan_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_program_rawat_jalan` (`rawat_jalan_id`),
  CONSTRAINT `FK_program_rawat_jalan` FOREIGN KEY (`rawat_jalan_id`) REFERENCES `rawat_jalan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table rsud.program: ~0 rows (approximately)

-- Dumping structure for table rsud.rawat_jalan
CREATE TABLE IF NOT EXISTS `rawat_jalan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pasien_id` int NOT NULL DEFAULT '0',
  `tgl_pelayanan` date NOT NULL DEFAULT '0000-00-00',
  `anamnesis` text NOT NULL,
  `tindakan_uji_fungsi` text NOT NULL,
  `diagnosis_medis` text NOT NULL,
  `diagnosis_fungsi` text NOT NULL,
  `pemeriksaan_penunjang` text NOT NULL,
  `tata_laksana_kfr` text NOT NULL,
  `anjuran` text NOT NULL,
  `evaluasi` text NOT NULL,
  `suspek_akibat_kerja` enum('Ya','Tidak') NOT NULL,
  `permintaan_terapi` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rawat_jalan_pasien` (`pasien_id`),
  CONSTRAINT `FK_rawat_jalan_pasien` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table rsud.rawat_jalan: ~0 rows (approximately)

-- Dumping structure for table rsud.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table rsud.user: ~2 rows (approximately)
REPLACE INTO `user` (`id`, `username`, `password_hash`, `auth_key`, `created_at`, `role`) VALUES
	(1, 'admin', '$2y$13$T6vWFsIYvHrmt54QSarede3hlb76cYbpztgQC74ir19FtMg28y7je', 'wp3atUFagTVDO7U0WpYO2RUGlqi4amsI', '2025-01-18 08:59:15', 'admin'),
	(2, 'user', '$2y$13$kX83Pu8vZjyo/HugsNenEOKo3rFELw0BDJbvB9xUPzlGSSUZtra6.', 'WOV_lf9jCEo1EoueGCX_McM6kKCGDDL4', '2025-01-18 09:10:03', 'user');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
