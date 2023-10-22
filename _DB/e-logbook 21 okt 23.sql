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

-- Dumping structure for table e-logbookazyra.absen
DROP TABLE IF EXISTS `absen`;
CREATE TABLE IF NOT EXISTS `absen` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `NIS` int NOT NULL,
  `keterangan` enum('Hadir','Izin','Alpha') NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table e-logbookazyra.absen: ~0 rows (approximately)
INSERT INTO `absen` (`id`, `NIS`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
	(2, 12345, 'Hadir', '2023-08-17', '2023-08-18 04:48:08', '2023-08-18 04:57:26');

-- Dumping structure for table e-logbookazyra.alat
DROP TABLE IF EXISTS `alat`;
CREATE TABLE IF NOT EXISTS `alat` (
  `id_alat` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.alat: ~6 rows (approximately)
INSERT INTO `alat` (`id_alat`, `nama_alat`, `harga`, `created_at`, `updated_at`) VALUES
	(35, 'Cup 200ml', 680, '2023-06-08 03:56:24', '2023-06-08 04:15:28'),
	(36, 'Cup 300ml', 700, '2023-06-08 03:56:24', '2023-06-08 04:15:53'),
	(37, 'Cup 400ml', 700, '2023-06-08 03:56:24', '2023-06-08 04:16:14'),
	(38, 'Cup 450ml', 740, '2023-06-08 03:56:24', '2023-06-08 04:16:35'),
	(39, 'Gelas Plastik', 250, '2023-06-08 03:56:24', '2023-06-08 04:16:59'),
	(40, 'Mika Burger', 400, '2023-06-08 03:56:24', '2023-06-08 04:17:41'),
	(41, 'Rice Box', 1280, '2023-06-08 04:07:22', '2023-06-08 04:17:22');

-- Dumping structure for table e-logbookazyra.bahan
DROP TABLE IF EXISTS `bahan`;
CREATE TABLE IF NOT EXISTS `bahan` (
  `id_bahan` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.bahan: ~13 rows (approximately)
INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `harga`, `created_at`, `updated_at`) VALUES
	(6, 'Topokki Frozen', 27000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(7, 'Saus Topoki Ori', 8000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(8, 'Ayam Fillet', 30000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(9, 'Tepung Kanji 1kg', 14000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(10, 'Telur 1kg', 30000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(11, 'Tepung Terigu 1kg', 10000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(12, 'Kecap Besar', 14000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(13, 'Bawang Merah 1/2', 40000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(14, 'Bawang Putih 1/2', 15000, '2023-01-18 22:04:51', '2023-01-18 22:04:51'),
	(15, 'Kacang Tanah 1kg', 31000, '2023-01-18 22:12:11', '2023-01-18 22:12:11'),
	(16, 'Sosis Kanzler', 8000, '2023-02-18 03:24:09', '2023-02-18 03:24:09'),
	(17, 'Garam 500gr', 10000, '2023-02-18 03:33:37', '2023-02-18 03:33:37'),
	(18, 'Royco 10 Sachet', 11000, '2023-02-18 03:33:37', '2023-02-18 03:38:27');

-- Dumping structure for table e-logbookazyra.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table e-logbookazyra.kas
DROP TABLE IF EXISTS `kas`;
CREATE TABLE IF NOT EXISTS `kas` (
  `id_kas` int unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `kas` int NOT NULL DEFAULT '0',
  `kode_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kas_update` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table e-logbookazyra.kas: ~4 rows (approximately)
INSERT INTO `kas` (`id_kas`, `id_user`, `kas`, `kode_status`, `created_at`, `updated_at`, `kas_update`) VALUES
	(2, 1, 50000, 1, '2023-10-21 14:27:50', '2023-10-21 15:52:46', 207000),
	(3, 1, 257000, 2, '2023-10-21 16:02:28', '2023-10-21 16:02:28', 0),
	(4, 33, 257000, 1, '2023-10-21 16:10:35', '2023-10-21 16:10:54', 2007000),
	(5, 33, 2264000, 2, '2023-10-21 16:12:28', '2023-10-21 16:12:28', 0);

-- Dumping structure for table e-logbookazyra.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.kategori: ~7 rows (approximately)
INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`, `keterangan_kategori`, `created_at`, `updated_at`) VALUES
	(1, 'JSF', 'Japan Street Food', 'Jajanan Tradisional Khas Jepang', '2022-08-28 09:31:33', '2022-12-21 21:24:35'),
	(2, 'KSF', 'Korean Street Food', 'Jajanan Tradisional Khas Korea', '2022-08-28 09:41:20', '2022-12-21 21:24:58'),
	(3, 'MNM', 'Minuman', 'Minuman es yang harum dan menyegarkan', '2022-08-29 20:47:19', '2022-08-29 20:50:25'),
	(4, 'CML', 'Camilan', 'Camilan dari yang diolah dengan bumbu khas AZYRA', '2022-08-30 01:24:05', '2022-08-30 01:41:45'),
	(5, 'PHA', 'Paket Hemat', 'Paket makanan yang bervariasi', '2022-08-30 01:42:38', '2022-08-30 01:42:38'),
	(6, 'ISF', 'Indonesia Street Food', 'Jajanan Tradisional Khas Indonesia', '2023-01-18 22:21:34', '2023-01-18 22:21:34'),
	(7, 'FF', 'Frozen Food', 'Frozen Food', '2023-07-15 06:24:55', '2023-07-15 06:24:55');

-- Dumping structure for table e-logbookazyra.makanan
DROP TABLE IF EXISTS `makanan`;
CREATE TABLE IF NOT EXISTS `makanan` (
  `id_makanan` int unsigned NOT NULL AUTO_INCREMENT,
  `id_alat` int unsigned DEFAULT NULL,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_makanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_makanan`),
  KEY `FK_makanan_alat` (`id_alat`),
  CONSTRAINT `FK_makanan_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.makanan: ~24 rows (approximately)
INSERT INTO `makanan` (`id_makanan`, `id_alat`, `nama_kategori`, `nama_makanan`, `harga`, `image`, `created_at`, `updated_at`) VALUES
	(89, 38, 'Indonesia Street Food', 'Seblak', 10000, 'makanan-foto/ELWVWqVYbhW6lwgDeYN1uJY4dWiB9ElUnS5qeO1Z.jpg', '2023-08-05 04:55:20', '2023-08-05 04:55:20'),
	(90, 40, 'Japan Street Food', 'Sushi', 18000, 'makanan-foto/qgQsha0A0Nfceu75D2R8GC5oMO0k69WPkpQZW7xs.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(91, 36, 'Korean Street Food', 'Toppoki Original', 18000, 'makanan-foto/PIgVmbQV5K4q1ejM7aEbK425NA6HLYjLmrtkcleZ.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(92, 35, 'Indonesia Street Food', 'Cilok', 6000, 'makanan-foto/IuGFWDlwGN5sm2SAXTaK96vZybHSX7AS58I9hfPj.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(93, 35, 'Indonesia Street Food', 'Cimol', 6000, 'makanan-foto/pcfGZ7MHsmIzkRIRNFazSIX4nHQ7Z6IYviMxKNQl.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(94, 36, 'Korean Street Food', 'Toppoki Creamy', 18000, 'makanan-foto/MVrdm7jNWjtboXaniXEVgXpvfsvpSbv93KzrSbYi.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(95, 36, 'Korean Street Food', 'Toppoki Hot&Spicy', 18000, 'makanan-foto/4UE7OySJ5R9a7S1mycWnOHjK91cCQDiVdYJbe1kx.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(96, 39, 'Minuman', 'Es Mawar', 3000, 'makanan-foto/oxK8LGGEdbJjBNGgJQ1hS8mhSjCWLtWDU63tdGh6.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(97, 41, 'Japan Street Food', 'Chicken Katsu Box', 20000, 'makanan-foto/Qrcg32LNEaRbxZ1GYVDhsLdalAg8Y3Dw2s2IMxBa.jpg', '2023-08-05 05:03:13', '2023-08-17 00:43:56'),
	(98, 37, 'Indonesia Street Food', 'Kwetiau Goreng', 10000, 'makanan-foto/ZS0iKbZipd92N01SuSi394lDdjSiwFlXHDWQUHCH.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(99, 40, 'Japan Street Food', 'Onigiri Mini', 6500, 'makanan-foto/6TCkAbjWJl4G1hxz7esLcyPc02ocE4HhZGM5zunK.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(100, 40, 'Japan Street Food', 'Onigiri Midi', 7000, 'makanan-foto/uTbA53bPIoaNrBtZFfQxCGU2lrd1KYJHdP4jqj7M.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(101, 40, 'Japan Street Food', 'Onigiri Normal', 10000, 'makanan-foto/FgFNpTH2MM6jrWN1NJlA0OTUWxNZgPzIPFiKXms9.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(102, 41, 'Indonesia Street Food', 'Rice Box', 12000, 'makanan-foto/FZtMlFuC0sanC53zXWBW9W5gTSlcAPK0mWPMnIAD.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(103, 35, 'Camilan', 'Cimol Gepeng', 6000, 'makanan-foto/kSoAJIsndE3HXWEWf8KfV2RiBPwxcxoYz1L65879.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(104, 36, 'Japan Street Food', 'Odeng', 9000, 'makanan-foto/PLvg35bzlu5pny8q9KLUXrOB9O2Gp3D5mjbZGET1.jpg', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(105, NULL, 'Frozen Food', 'Kanzler Beef Cocktail Sausage 500g', 50000, 'makanan-foto/nP9LPJqa120PX6eKP41CSyHrbJeYTONYvl6adcVV.png', '2023-08-05 05:03:13', '2023-08-05 05:03:13'),
	(106, NULL, 'Frozen Food', 'Champ Sosis Bakar Jumbo', 36000, 'makanan-foto/ySP0HOsXQCzFtXvSaKOEWgaqDDGa9EBYzWfUHV0k.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09'),
	(107, NULL, 'Frozen Food', 'Kanzler Crispy Chicken Nugget', 7000, 'makanan-foto/MgM9P2J6eZqMC6XiPDbOdx65BBrdkPlLQL9Jal2C.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09'),
	(108, NULL, 'Frozen Food', 'Kimbo Sosis Sapi Serbaguna', 70000, 'makanan-foto/MB8RZ0tuDW19S7BxrEkP6mQokvzADRcnzLAmLCvs.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09'),
	(109, NULL, 'Frozen Food', 'Champ Chickern Nugget', 30000, 'makanan-foto/GdVvJ3Q8W8ggVimO8nQugoKsCgscByOMNZD58ker.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09'),
	(110, NULL, 'Frozen Food', 'Okey Stick Nugget Ayam', 32000, 'makanan-foto/XpVHKs9cLBMwG805BcLhJoCVy7HBZRMLOukFQcOQ.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09'),
	(111, NULL, 'Frozen Food', 'So Good Chicken Nugget', 45000, 'makanan-foto/Mwh3g1pDNH3ST1fxWCmBi6weDeQmwcS1gTn5hh94.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09'),
	(112, NULL, 'Frozen Food', 'Ngetop Sosis', 29000, 'makanan-foto/dr1tte5SSzmzyesdWCqdYyODhqYy7HEyqou0StaB.jpg', '2023-08-12 04:07:09', '2023-08-12 04:07:09');

-- Dumping structure for table e-logbookazyra.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.migrations: ~26 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_08_27_014551_create_data_kategori_table', 1),
	(6, '2022_08_27_032946_create_data_makanan_table', 2),
	(7, '2022_08_28_112234_create_kategori_table', 3),
	(8, '2022_08_28_112451_create_makanan_table', 3),
	(9, '2022_08_28_115900_create_bahan_table', 4),
	(10, '2022_08_29_010658_create_alat_table', 5),
	(11, '2022_08_29_013019_create_pemesanan_table', 6),
	(12, '2022_08_31_023137_create_makanan_table', 7),
	(13, '2022_09_06_002332_create_transaksi_bahan_table', 8),
	(14, '2022_09_11_233441_create_transaksi_alat_table', 9),
	(15, '2022_09_12_001711_create_transaksi_penjualan_makanan_table', 10),
	(16, '2022_09_13_004803_create_transaksi_pemesanan_online_table', 11),
	(17, '2022_09_13_015240_create_transaksi_pemesanan_online', 12),
	(18, '2022_09_13_030819_create_transaksi_pemesanan_online', 13),
	(19, '2022_09_14_064716_create_transaksi_umum_table', 14),
	(20, '2022_09_15_115849_create_transaksi_umum_table', 15),
	(21, '2022_09_16_230942_create_pemesanan_umum_table', 16),
	(22, '2022_09_17_014037_create_pesenan_umum_table', 17),
	(23, '2022_09_17_033112_create_pemesanan_table', 18),
	(24, '2022_09_17_234542_create_transaksi_umum_table', 19),
	(25, '2022_09_19_043948_create_transaksi_umum_detail_table', 20),
	(26, '2022_09_19_065059_create_transaksi_umum_detail_table', 21);

-- Dumping structure for table e-logbookazyra.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.password_resets: ~0 rows (approximately)

-- Dumping structure for table e-logbookazyra.pemesanan
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int unsigned NOT NULL AUTO_INCREMENT,
  `keterangan_pemesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_admin` int NOT NULL,
  `ongkir` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.pemesanan: ~4 rows (approximately)
INSERT INTO `pemesanan` (`id_pemesanan`, `keterangan_pemesanan`, `biaya_admin`, `ongkir`, `created_at`, `updated_at`) VALUES
	(5, 'Go-Food', 20, 1000, '2022-12-20 20:32:25', '2022-12-20 20:32:25'),
	(6, 'Grab-Food', 20, 0, '2022-12-20 20:32:44', '2022-12-20 20:32:44'),
	(7, 'Shopee-Food', 25, 0, '2022-12-20 20:33:03', '2022-12-20 20:33:03'),
	(8, 'Manual', 0, 0, '2022-12-20 20:33:17', '2022-12-20 20:33:17');

-- Dumping structure for table e-logbookazyra.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table e-logbookazyra.pesanan
DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `total` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `catatan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.pesanan: ~7 rows (approximately)
INSERT INTO `pesanan` (`id_pesanan`, `user_id`, `tanggal`, `total`, `status`, `created_at`, `updated_at`, `catatan`) VALUES
	(12, 18, '2023-08-17 04:53:33', 38000, 4, '2023-08-17 04:53:33', '2023-08-17 04:55:41', NULL),
	(13, 10, '2023-08-17 05:14:30', 116000, 4, '2023-08-17 05:14:30', '2023-08-17 08:23:09', NULL),
	(14, 19, '2023-08-17 08:29:40', 20000, 3, '2023-08-17 08:29:40', '2023-08-17 08:33:15', 'batal'),
	(15, 19, '2023-08-17 08:34:41', 20000, 4, '2023-08-17 08:34:41', '2023-08-17 08:36:43', NULL),
	(16, 18, '2023-08-17 13:48:09', 79000, 4, '2023-08-17 13:48:09', '2023-08-17 13:49:41', NULL),
	(17, 20, '2023-08-18 03:52:12', 2007000, 2, '2023-08-18 03:52:12', '2023-10-21 16:10:54', NULL),
	(18, 32, '2023-10-21 15:46:54', 207000, 2, '2023-10-21 15:46:54', '2023-10-21 15:52:46', NULL);

-- Dumping structure for table e-logbookazyra.pesanan_detail
DROP TABLE IF EXISTS `pesanan_detail`;
CREATE TABLE IF NOT EXISTS `pesanan_detail` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_item` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pesanan_detail` (`id_pesanan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.pesanan_detail: ~13 rows (approximately)
INSERT INTO `pesanan_detail` (`id`, `id_item`, `id_pesanan`, `jumlah`, `harga_satuan`, `catatan`, `subtotal`, `created_at`, `updated_at`, `user_id`, `image`, `jenis_pembayaran`) VALUES
	(19, 89, 12, 1, 10000, 'tidak pedas', 10000, '2023-08-17 04:53:33', '2023-08-17 04:54:38', 18, NULL, 'COD'),
	(20, 92, 12, 2, 6000, 'tidak pedas', 12000, '2023-08-17 04:53:53', '2023-08-17 04:54:38', 18, NULL, 'COD'),
	(21, 96, 12, 3, 3000, NULL, 9000, '2023-08-17 04:54:11', '2023-08-17 04:54:38', 18, NULL, 'COD'),
	(22, 107, 13, 1, 7000, NULL, 7000, '2023-08-17 05:14:30', '2023-08-17 05:25:46', 10, 'makanan-foto/cNruA3pZ08wO7bpZbarqNjpLCmLtDfpNH7knhDMZ.jpg', 'Transfer'),
	(23, 108, 13, 1, 70000, NULL, 70000, '2023-08-17 05:14:53', '2023-08-17 05:25:46', 10, 'makanan-foto/cNruA3pZ08wO7bpZbarqNjpLCmLtDfpNH7knhDMZ.jpg', 'Transfer'),
	(24, 110, 13, 1, 32000, NULL, 32000, '2023-08-17 05:15:13', '2023-08-17 05:25:46', 10, 'makanan-foto/cNruA3pZ08wO7bpZbarqNjpLCmLtDfpNH7knhDMZ.jpg', 'Transfer'),
	(25, 89, 14, 1, 10000, 'tidak pedas', 10000, '2023-08-17 08:29:40', '2023-08-17 08:30:36', 19, NULL, 'COD'),
	(26, 96, 14, 1, 3000, NULL, 3000, '2023-08-17 08:30:09', '2023-08-17 08:30:36', 19, NULL, 'COD'),
	(27, 89, 15, 1, 10000, 'tidak pedas', 10000, '2023-08-17 08:34:42', '2023-08-17 08:35:44', 19, 'makanan-foto/BKq8rprA9XYN4I3qovgA1u6ogJZadgTbyLAWQDH2.jpg', 'Transfer'),
	(28, 96, 15, 1, 3000, NULL, 3000, '2023-08-17 08:35:08', '2023-08-17 08:35:44', 19, 'makanan-foto/BKq8rprA9XYN4I3qovgA1u6ogJZadgTbyLAWQDH2.jpg', 'Transfer'),
	(29, 106, 16, 2, 36000, NULL, 72000, '2023-08-17 13:48:09', '2023-08-17 13:48:42', 18, NULL, 'COD'),
	(30, 89, 17, 200, 10000, 'tidak pedas', 2000000, '2023-08-18 03:52:12', '2023-08-18 03:54:00', 20, NULL, 'COD'),
	(31, 105, 18, 4, 50000, 'TEST', 200000, '2023-10-21 15:46:54', '2023-10-21 15:46:54', 32, NULL, NULL);

-- Dumping structure for table e-logbookazyra.stok_alat
DROP TABLE IF EXISTS `stok_alat`;
CREATE TABLE IF NOT EXISTS `stok_alat` (
  `id_alat` int unsigned NOT NULL DEFAULT '0',
  `stok_masuk` int NOT NULL DEFAULT '0',
  `stok_keluar` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_alat`),
  CONSTRAINT `FK_stok_alat_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table e-logbookazyra.stok_alat: ~7 rows (approximately)
INSERT INTO `stok_alat` (`id_alat`, `stok_masuk`, `stok_keluar`, `created_at`, `updated_at`) VALUES
	(35, 225, 31, '2023-08-17 00:47:42', '2023-08-17 00:47:42'),
	(36, 225, 2, '2023-08-17 00:47:42', '2023-08-17 00:47:42'),
	(37, 225, 4, '2023-08-17 00:47:42', '2023-08-17 00:47:42'),
	(38, 225, 208, '2023-08-17 00:47:42', '2023-08-17 00:47:42'),
	(39, 225, 10, '2023-08-17 00:47:42', '2023-08-17 00:47:42'),
	(40, 225, 16, '2023-08-17 00:47:42', '2023-08-17 00:47:42'),
	(41, 225, 11, '2023-08-17 00:47:42', '2023-08-17 00:47:42');

-- Dumping structure for table e-logbookazyra.stok_frozen_food
DROP TABLE IF EXISTS `stok_frozen_food`;
CREATE TABLE IF NOT EXISTS `stok_frozen_food` (
  `id_makanan` int unsigned NOT NULL DEFAULT '0',
  `stok_masuk` int NOT NULL DEFAULT '0',
  `stok_keluar` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_makanan`),
  CONSTRAINT `FK_stok_frozen_food_makanan` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table e-logbookazyra.stok_frozen_food: ~8 rows (approximately)
INSERT INTO `stok_frozen_food` (`id_makanan`, `stok_masuk`, `stok_keluar`, `created_at`, `updated_at`) VALUES
	(105, 25, 0, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(106, 50, 2, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(107, 25, 1, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(108, 50, 2, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(109, 50, 0, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(110, 25, 3, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(111, 25, 0, '2023-08-17 00:53:31', '2023-08-17 00:53:31'),
	(112, 10, 0, '2023-08-17 00:53:31', '2023-08-17 00:53:31');

-- Dumping structure for table e-logbookazyra.transaksi_alat
DROP TABLE IF EXISTS `transaksi_alat`;
CREATE TABLE IF NOT EXISTS `transaksi_alat` (
  `id_transaksialat` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksialat`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.transaksi_alat: ~62 rows (approximately)
INSERT INTO `transaksi_alat` (`id_transaksialat`, `nama_alat`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
	(46, 'Cup 200ml', 680, 25, 17000, '2023-04-10 00:47:42', '2023-04-10 00:47:42'),
	(47, 'Cup 300ml', 700, 25, 17500, '2023-04-10 00:47:42', '2023-04-10 00:47:42'),
	(48, 'Cup 400ml', 700, 25, 17500, '2023-04-10 00:47:42', '2023-04-10 00:47:42'),
	(49, 'Cup 450ml', 740, 25, 18500, '2023-04-10 00:47:42', '2023-04-10 00:47:42'),
	(50, 'Gelas Plastik', 250, 25, 6250, '2023-04-10 00:47:42', '2023-04-10 00:47:42'),
	(51, 'Mika Burger', 400, 25, 10000, '2023-04-10 00:47:42', '2023-04-10 00:47:42'),
	(53, 'Cup 200ml', 680, 25, 17000, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(54, 'Cup 300ml', 700, 25, 17500, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(55, 'Cup 400ml', 700, 25, 17500, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(56, 'Cup 450ml', 740, 25, 18500, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(57, 'Gelas Plastik', 250, 25, 6250, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(58, 'Mika Burger', 400, 25, 10000, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(59, 'Rice Box', 1280, 25, 32000, '2023-04-24 03:35:07', '2023-04-24 03:35:07'),
	(60, 'Cup 200ml', 680, 25, 17000, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(61, 'Cup 300ml', 700, 25, 17500, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(62, 'Cup 400ml', 700, 25, 17500, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(63, 'Cup 450ml', 740, 25, 18500, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(64, 'Gelas Plastik', 250, 25, 6250, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(65, 'Mika Burger', 400, 25, 10000, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(66, 'Rice Box', 1280, 25, 32000, '2020-05-08 03:42:27', '2020-05-08 03:42:27'),
	(67, 'Cup 200ml', 680, 25, 17000, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(68, 'Cup 300ml', 700, 25, 17500, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(69, 'Cup 400ml', 700, 25, 17500, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(70, 'Cup 450ml', 740, 25, 18500, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(71, 'Gelas Plastik', 250, 25, 6250, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(72, 'Mika Burger', 400, 25, 10000, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(73, 'Rice Box', 1280, 25, 32000, '2023-05-22 03:46:16', '2023-05-22 03:46:16'),
	(74, 'Cup 200ml', 680, 25, 17000, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(75, 'Cup 300ml', 700, 25, 17500, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(76, 'Cup 400ml', 700, 25, 17500, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(77, 'Cup 450ml', 740, 25, 18500, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(78, 'Gelas Plastik', 250, 25, 6250, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(79, 'Mika Burger', 400, 25, 10000, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(80, 'Rice Box', 1280, 25, 32000, '2023-06-05 03:47:40', '2023-06-05 03:47:40'),
	(81, 'Cup 200ml', 680, 25, 17000, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(82, 'Cup 300ml', 700, 25, 17500, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(83, 'Cup 400ml', 700, 25, 17500, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(84, 'Cup 450ml', 740, 25, 18500, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(85, 'Gelas Plastik', 250, 25, 6250, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(86, 'Mika Burger', 400, 25, 10000, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(87, 'Rice Box', 1280, 25, 32000, '2023-06-19 03:48:10', '2023-06-19 03:48:10'),
	(88, 'Cup 200ml', 680, 25, 17000, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(89, 'Cup 300ml', 700, 25, 17500, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(90, 'Cup 400ml', 700, 25, 17500, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(91, 'Cup 450ml', 740, 25, 18500, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(92, 'Gelas Plastik', 250, 25, 6250, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(93, 'Mika Burger', 400, 25, 10000, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(94, 'Rice Box', 1280, 25, 32000, '2023-07-17 03:48:34', '2023-07-17 03:48:34'),
	(95, 'Cup 200ml', 680, 25, 17000, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(96, 'Cup 300ml', 700, 25, 17500, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(97, 'Cup 400ml', 700, 25, 17500, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(98, 'Cup 450ml', 740, 25, 18500, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(99, 'Gelas Plastik', 250, 25, 6250, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(100, 'Mika Burger', 400, 25, 10000, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(101, 'Rice Box', 1280, 25, 32000, '2023-07-31 03:50:37', '2023-07-31 03:50:37'),
	(102, 'Cup 200ml', 680, 25, 17000, '2023-08-14 03:51:09', '2023-08-14 03:51:09'),
	(103, 'Cup 300ml', 700, 25, 17500, '2023-08-14 03:51:09', '2023-08-14 03:51:09'),
	(104, 'Cup 400ml', 700, 25, 17500, '2023-08-14 03:51:09', '2023-08-14 03:51:09'),
	(105, 'Cup 450ml', 740, 25, 18500, '2023-08-14 03:51:09', '2023-08-14 03:51:09'),
	(106, 'Gelas Plastik', 250, 25, 6250, '2023-08-14 03:51:09', '2023-08-14 03:51:09'),
	(107, 'Mika Burger', 400, 25, 10000, '2023-08-14 03:51:09', '2023-08-14 03:51:09'),
	(108, 'Rice Box', 1280, 25, 32000, '2023-08-14 03:51:09', '2023-08-14 03:51:09');

-- Dumping structure for table e-logbookazyra.transaksi_bahan
DROP TABLE IF EXISTS `transaksi_bahan`;
CREATE TABLE IF NOT EXISTS `transaksi_bahan` (
  `id_transaksibahan` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksibahan`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.transaksi_bahan: ~35 rows (approximately)
INSERT INTO `transaksi_bahan` (`id_transaksibahan`, `nama_bahan`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
	(30, 'Topokki Frozen', 27000, 5, 135000, '2023-04-10 00:48:43', '2023-04-10 00:48:43'),
	(31, 'Saus Topoki Ori', 8000, 5, 40000, '2023-04-10 00:48:43', '2023-04-10 00:48:43'),
	(32, 'Ayam Fillet', 30000, 5, 150000, '2023-04-10 00:48:43', '2023-04-10 00:48:43'),
	(33, 'Tepung Kanji 1kg', 14000, 1, 14000, '2023-04-10 00:48:43', '2023-04-10 00:48:43'),
	(35, 'Telur 1kg', 30000, 2, 60000, '2023-04-13 03:53:02', '2023-04-13 03:53:02'),
	(36, 'Tepung Terigu 1kg', 10000, 5, 50000, '2023-04-13 03:53:02', '2023-04-13 03:53:02'),
	(37, 'Kecap Besar', 14000, 1, 14000, '2023-04-13 03:53:02', '2023-04-13 03:53:02'),
	(38, 'Bawang Merah 1/2', 40000, 1, 40000, '2023-04-13 03:53:02', '2023-04-13 03:53:02'),
	(39, 'Bawang Putih 1/2', 15000, 1, 15000, '2023-04-13 03:53:02', '2023-04-13 03:53:02'),
	(40, 'Kacang Tanah 1kg', 31000, 2, 62000, '2023-04-22 03:53:44', '2023-04-22 03:53:44'),
	(41, 'Sosis Kanzler', 8000, 2, 16000, '2023-04-22 03:53:44', '2023-04-22 03:53:44'),
	(42, 'Garam 500gr', 10000, 1, 10000, '2023-04-22 03:53:44', '2023-04-22 03:53:44'),
	(43, 'Royco 10 Sachet', 11000, 3, 33000, '2023-04-22 03:53:44', '2023-04-22 03:53:44'),
	(44, 'Topokki Frozen', 27000, 5, 135000, '2023-05-10 03:56:18', '2023-05-10 03:56:18'),
	(45, 'Saus Topoki Ori', 8000, 15, 120000, '2023-05-10 03:56:18', '2023-05-10 03:56:18'),
	(46, 'Kecap Besar', 14000, 2, 28000, '2023-05-10 03:56:18', '2023-05-10 03:56:18'),
	(47, 'Telur 1kg', 30000, 2, 60000, '2023-05-10 03:56:18', '2023-05-10 03:56:18'),
	(48, 'Bawang Putih 1/2', 15000, 1, 15000, '2023-05-19 03:57:57', '2023-05-19 03:57:57'),
	(49, 'Bawang Merah 1/2', 40000, 1, 40000, '2023-05-19 03:57:57', '2023-05-19 03:57:57'),
	(50, 'Ayam Fillet', 30000, 5, 150000, '2023-05-19 03:57:57', '2023-05-19 03:57:57'),
	(51, 'Tepung Kanji 1kg', 14000, 5, 70000, '2023-05-19 03:57:57', '2023-05-19 03:57:57'),
	(52, 'Tepung Terigu 1kg', 10000, 5, 50000, '2023-05-19 03:57:57', '2023-05-19 03:57:57'),
	(53, 'Kacang Tanah 1kg', 31000, 2, 62000, '2023-06-21 03:59:21', '2023-06-21 03:59:21'),
	(54, 'Kecap Besar', 14000, 1, 14000, '2023-06-21 03:59:21', '2023-06-21 03:59:21'),
	(55, 'Royco 10 Sachet', 11000, 3, 33000, '2023-06-21 03:59:21', '2023-06-21 03:59:21'),
	(56, 'Topokki Frozen', 27000, 5, 135000, '2023-06-21 03:59:21', '2023-06-21 03:59:21'),
	(57, 'Ayam Fillet', 30000, 5, 150000, '2023-07-11 04:00:23', '2023-07-11 04:00:23'),
	(58, 'Bawang Merah 1/2', 40000, 1, 40000, '2023-07-11 04:00:23', '2023-07-11 04:00:23'),
	(59, 'Bawang Putih 1/2', 15000, 1, 15000, '2023-07-11 04:00:23', '2023-07-11 04:00:23'),
	(60, 'Tepung Kanji 1kg', 14000, 5, 70000, '2023-07-11 04:00:23', '2023-07-11 04:00:23'),
	(61, 'Tepung Terigu 1kg', 10000, 5, 50000, '2023-07-11 04:00:23', '2023-07-11 04:00:23'),
	(62, 'Kacang Tanah 1kg', 31000, 2, 62000, '2023-08-09 04:01:18', '2023-08-09 04:01:18'),
	(63, 'Royco 10 Sachet', 11000, 3, 33000, '2023-08-09 04:01:18', '2023-08-09 04:01:18'),
	(64, 'Tepung Terigu 1kg', 10000, 5, 50000, '2023-08-09 04:01:18', '2023-08-09 04:01:18'),
	(65, 'Tepung Kanji 1kg', 14000, 5, 70000, '2023-08-09 04:01:18', '2023-08-09 04:01:18');

-- Dumping structure for table e-logbookazyra.transaksi_frozen_food
DROP TABLE IF EXISTS `transaksi_frozen_food`;
CREATE TABLE IF NOT EXISTS `transaksi_frozen_food` (
  `id_transaksi_frozen_food` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_makanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_frozen_food`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.transaksi_frozen_food: ~10 rows (approximately)
INSERT INTO `transaksi_frozen_food` (`id_transaksi_frozen_food`, `nama_makanan`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
	(43, 'Kanzler Beef Cocktail Sausage 500g', 50000, 25, 1250000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(44, 'Champ Sosis Bakar Jumbo', 36000, 25, 900000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(45, 'Kanzler Crispy Chicken Nugget', 7000, 25, 175000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(46, 'Kimbo Sosis Sapi Serbaguna', 70000, 25, 1750000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(47, 'Champ Chickern Nugget', 30000, 25, 750000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(48, 'Okey Stick Nugget Ayam', 32000, 25, 800000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(49, 'So Good Chicken Nugget', 45000, 25, 1125000, '2023-07-17 00:53:31', '2023-07-17 00:53:31'),
	(51, 'Champ Sosis Bakar Jumbo', 36000, 25, 900000, '2023-08-17 04:04:16', '2023-08-17 04:04:16'),
	(52, 'Champ Chickern Nugget', 30000, 25, 750000, '2023-08-17 04:04:16', '2023-08-17 04:04:16'),
	(53, 'Kimbo Sosis Sapi Serbaguna', 70000, 25, 1750000, '2023-08-17 04:04:16', '2023-08-17 04:04:16');

-- Dumping structure for table e-logbookazyra.transaksi_pemesanan_mitra
DROP TABLE IF EXISTS `transaksi_pemesanan_mitra`;
CREATE TABLE IF NOT EXISTS `transaksi_pemesanan_mitra` (
  `id_mitra` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pemesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `biaya_admin` int NOT NULL,
  `ongkir` int NOT NULL,
  `komisi` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mitra`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.transaksi_pemesanan_mitra: ~26 rows (approximately)
INSERT INTO `transaksi_pemesanan_mitra` (`id_mitra`, `kode_pemesanan`, `keterangan_pemesanan`, `jumlah`, `biaya_admin`, `ongkir`, `komisi`, `total`, `created_at`, `updated_at`) VALUES
	(13, '7134', 'Go-Food', 27500, 20, 1000, 6500, 21000, '2023-06-08 04:25:02', '2023-06-08 04:25:02'),
	(14, '5528', 'Go-Food', 23000, 20, 1000, 5600, 17400, '2023-06-08 04:25:23', '2023-06-08 04:25:23'),
	(15, '5321', 'Go-Food', 37500, 20, 1000, 8500, 29000, '2023-06-09 05:17:08', '2023-06-09 05:17:08'),
	(16, '1442', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-06-09 05:18:05', '2023-06-09 05:18:35'),
	(17, '3971', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-06-09 05:18:52', '2023-06-09 05:18:52'),
	(18, '8317', 'Go-Food', 58500, 20, 1000, 12700, 45800, '2023-06-12 03:44:10', '2023-06-12 03:44:10'),
	(19, 'GF-636', 'Grab-Food', 30000, 20, 0, 6000, 24000, '2023-06-12 03:44:36', '2023-06-12 03:44:36'),
	(20, '6421', 'Go-Food', 42500, 20, 1000, 9500, 33000, '2023-06-12 03:44:55', '2023-06-12 03:44:55'),
	(21, '3471', 'Go-Food', 38000, 20, 1000, 0, 38000, '2023-06-13 05:38:47', '2023-06-13 05:38:47'),
	(22, '3859', 'Go-Food', 34500, 20, 1000, 0, 34500, '2023-06-13 05:39:17', '2023-06-13 05:39:17'),
	(23, '6131', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-06-14 05:04:35', '2023-06-14 05:04:52'),
	(24, '9926', 'Go-Food', 27500, 20, 1000, 6500, 21000, '2023-06-14 05:08:09', '2023-06-14 05:08:09'),
	(25, '7439', 'Go-Food', 42500, 20, 1000, 9500, 33000, '2023-06-14 05:08:31', '2023-06-14 05:08:31'),
	(26, '6271', 'Go-Food', 250000, 20, 1000, 51000, 199000, '2023-07-22 04:56:36', '2023-07-22 04:58:47'),
	(28, '7443', 'Go-Food', 22500, 20, 1000, 5500, 17000, '2023-07-22 04:56:36', '2023-07-22 04:56:36'),
	(29, '8786', 'Go-Food', 38000, 20, 1000, 8600, 29400, '2023-07-22 04:56:36', '2023-07-22 04:56:36'),
	(30, '3918', 'Go-Food', 22500, 20, 1000, 5500, 17000, '2023-07-22 04:56:36', '2023-07-22 04:56:36'),
	(31, '8118', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-07-22 04:56:36', '2023-07-22 04:56:36'),
	(32, '7312', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-07-22 04:56:36', '2023-07-22 04:56:36'),
	(33, '5433', 'Go-Food', 46000, 20, 1000, 10200, 35800, '2023-07-23 04:08:49', '2023-07-22 04:56:36'),
	(34, '4899', 'Go-Food', 44000, 20, 1000, 9800, 34200, '2023-07-23 04:08:49', '2023-07-22 04:56:36'),
	(35, '3751', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-07-23 04:08:49', '2023-07-22 04:56:36'),
	(36, '1979', 'Go-Food', 45000, 20, 1000, 10000, 35000, '2023-08-01 04:10:44', '2023-08-01 04:10:44'),
	(37, '9718', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-08-01 04:10:44', '2023-08-01 04:10:44'),
	(38, '9926', 'Go-Food', 7500, 20, 1000, 2500, 5000, '2023-08-01 04:10:44', '2023-08-01 04:10:44'),
	(39, '8637', 'Go-Food', 34000, 20, 1000, 7800, 26200, '2023-08-01 04:10:44', '2023-08-01 04:10:44');

-- Dumping structure for table e-logbookazyra.transaksi_penjualan_makanan
DROP TABLE IF EXISTS `transaksi_penjualan_makanan`;
CREATE TABLE IF NOT EXISTS `transaksi_penjualan_makanan` (
  `id_penjualan` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_makanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.transaksi_penjualan_makanan: ~0 rows (approximately)
INSERT INTO `transaksi_penjualan_makanan` (`id_penjualan`, `nama_makanan`, `harga`, `jumlah`, `diskon`, `total`, `created_at`, `updated_at`) VALUES
	(46, 'Chicken Katsu Box', '16000', '1', '0', '16000', '2023-06-08 04:24:31', '2023-06-08 04:24:31'),
	(47, 'Cimol', '6000', '1', '0', '6000', '2023-06-08 04:24:31', '2023-06-08 04:24:31'),
	(48, 'Sushi', '18000', '1', '0', '18000', '2023-06-08 04:24:31', '2023-06-08 04:24:31'),
	(49, 'Chicken Katsu Box', '16000', '4', '0', '64000', '2023-06-08 04:24:31', '2023-06-08 04:24:31'),
	(50, 'Seblak', '10000', '1', '0', '10000', '2023-06-08 04:24:31', '2023-06-08 04:24:31'),
	(51, 'Es Mawar', '3000', '2', '0', '6000', '2023-06-08 04:24:31', '2023-08-17 00:55:26'),
	(52, 'Chicken Katsu Box', '16000', '1', '0', '16000', '2023-06-09 05:16:45', '2023-06-09 05:16:45'),
	(54, 'Seblak', '10000', '1', '0', '10000', '2023-06-09 05:16:45', '2023-06-09 05:16:45'),
	(55, 'Sushi', '18000', '1', '0', '18000', '2023-06-09 05:16:45', '2023-06-09 05:16:45'),
	(56, 'Cilok', '6000', '2', '0', '12000', '2023-06-09 05:16:45', '2023-06-09 05:16:45'),
	(57, 'Cilok', '6000', '2', '0', '12000', '2023-06-09 05:16:45', '2023-06-09 05:16:45'),
	(58, 'Sushi', '18000', '2', '0', '36000', '2023-06-12 03:43:43', '2023-06-12 03:43:43'),
	(59, 'Kwetiau Goreng', '10000', '1', '0', '10000', '2023-06-12 03:43:43', '2023-06-12 03:43:43'),
	(60, 'Cimol', '6000', '4', '0', '24000', '2023-06-12 03:43:43', '2023-06-12 03:43:43'),
	(61, 'Cimol', '6000', '2', '0', '12000', '2023-06-12 03:43:43', '2023-06-12 03:43:43'),
	(62, 'Cilok', '6000', '2', '0', '12000', '2023-06-12 03:43:43', '2023-06-12 03:43:43'),
	(63, 'Seblak', '10000', '1', '0', '10000', '2023-06-12 03:43:43', '2023-06-12 03:43:43'),
	(64, 'Sushi', '18000', '1', '0', '18000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(65, 'Cimol', '6000', '2', '0', '12000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(66, 'Sushi', '18000', '1', '0', '18000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(67, 'Onigiri Normal', '10000', '1', '0', '10000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(68, 'Rice Box', '12000', '1', '0', '12000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(69, 'Es Mawar', '3000', '1', '0', '3000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(70, 'Cilok', '6000', '1', '0', '6000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(71, 'Seblak', '10000', '2', '0', '20000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(72, 'Cimol', '6000', '1', '0', '6000', '2023-06-13 05:38:09', '2023-06-13 05:38:09'),
	(73, 'Cilok', '6000', '2', '0', '12000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(74, 'Onigiri Midi', '7000', '1', '0', '7000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(75, 'Cimol', '6000', '1', '0', '6000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(76, 'Cilok', '6000', '1', '0', '6000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(77, 'Es Mawar', '3000', '1', '0', '3000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(78, 'Cimol', '6000', '1', '0', '6000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(79, 'Cimol Gepeng', '6000', '1', '0', '6000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(80, 'Rice Box', '12000', '1', '0', '12000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(81, 'Kwetiau Goreng', '10000', '1', '0', '10000', '2023-06-14 05:04:09', '2023-06-14 05:04:09'),
	(82, 'Cilok', '6000', '2', '0', '12000', '2023-08-05 05:52:51', '2023-08-05 05:52:51'),
	(83, 'Cimol', '6000', '2', '0', '12000', '2023-08-05 05:52:51', '2023-08-05 05:52:51'),
	(84, 'Cilok', '6000', '1', '0', '6000', '2023-08-17 00:55:02', '2023-08-17 00:55:02'),
	(85, 'Cimol', '6000', '1', '0', '6000', '2023-08-17 00:55:02', '2023-08-17 00:55:02'),
	(86, 'Onigiri Midi', '7000', '1', '0', '7000', '2023-08-17 00:55:02', '2023-08-17 00:55:02'),
	(88, 'Sushi', '18000', '2', '0', '36000', '2023-08-17 00:55:02', '2023-08-17 00:55:02'),
	(89, 'Rice Box', '12000', '2', '0', '24000', '2023-08-17 13:46:39', '2023-08-17 13:46:39'),
	(90, 'Sushi', '18000', '2', '0', '36000', '2023-08-17 13:46:39', '2023-08-17 13:46:39');

-- Dumping structure for table e-logbookazyra.transaksi_umum
DROP TABLE IF EXISTS `transaksi_umum`;
CREATE TABLE IF NOT EXISTS `transaksi_umum` (
  `id_umum` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_makanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah_penjualan` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_umum`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.transaksi_umum: ~0 rows (approximately)
INSERT INTO `transaksi_umum` (`id_umum`, `nama_makanan`, `harga`, `jumlah_penjualan`, `total`, `created_at`, `updated_at`) VALUES
	(38, 'Chicken Katsu Box', 16000, 1, 16000, '2023-06-08 04:26:05', '2023-06-08 04:26:05'),
	(39, 'Cimol', 6000, 1, 6000, '2023-06-08 04:26:18', '2023-06-08 04:26:18'),
	(40, 'Sushi', 18000, 1, 18000, '2023-06-08 04:26:34', '2023-06-08 04:26:34'),
	(41, 'Chicken Katsu Box', 16000, 4, 64000, '2023-06-08 04:26:58', '2023-06-08 04:26:58'),
	(42, 'Seblak', 10000, 1, 10000, '2023-06-08 04:27:11', '2023-06-08 04:27:11'),
	(43, 'Es Mawar', 3000, 1, 3000, '2023-06-08 04:27:23', '2023-06-08 04:27:23'),
	(44, 'Chicken Katsu Box', 16000, 1, 16000, '2023-06-09 05:19:15', '2023-06-09 05:19:15'),
	(45, 'Es Mawar', 3000, 1, 3000, '2023-06-09 05:19:27', '2023-06-09 05:19:27'),
	(46, 'Seblak', 10000, 1, 10000, '2023-06-09 05:19:39', '2023-06-09 05:19:39'),
	(47, 'Sushi', 18000, 1, 18000, '2023-06-09 05:19:53', '2023-06-09 05:19:53'),
	(48, 'Cilok', 6000, 4, 24000, '2023-06-09 05:20:06', '2023-06-09 05:20:06'),
	(49, 'Sushi', 18000, 2, 36000, '2023-06-12 03:45:22', '2023-06-12 03:45:22'),
	(50, 'Kwetiau Goreng', 10000, 1, 10000, '2023-06-12 03:45:37', '2023-06-12 03:45:37'),
	(51, 'Cimol', 6000, 6, 36000, '2023-06-12 03:46:02', '2023-06-12 03:46:02'),
	(52, 'Cilok', 6000, 2, 12000, '2023-06-12 03:46:16', '2023-06-12 03:46:16'),
	(53, 'Seblak', 10000, 1, 10000, '2023-06-12 03:46:36', '2023-06-12 03:46:36'),
	(54, 'Sushi', 18000, 2, 36000, '2023-06-13 05:40:25', '2023-06-13 05:40:25'),
	(55, 'Cilok', 6000, 3, 18000, '2023-06-13 05:40:59', '2023-06-13 05:40:59'),
	(56, 'Onigiri Normal', 10000, 1, 10000, '2023-06-13 05:41:27', '2023-06-13 05:41:27'),
	(57, 'Rice Box', 12000, 1, 12000, '2023-06-13 05:41:55', '2023-06-13 05:41:55'),
	(58, 'Es Mawar', 3000, 1, 3000, '2023-06-13 05:42:16', '2023-06-13 05:42:16'),
	(59, 'Cilok', 6000, 1, 6000, '2023-06-13 05:42:50', '2023-06-13 05:42:50'),
	(60, 'Seblak', 10000, 2, 20000, '2023-06-13 05:43:21', '2023-06-13 05:43:21'),
	(61, 'Cimol', 6000, 1, 6000, '2023-06-13 05:43:40', '2023-06-13 05:43:40'),
	(62, 'Cilok', 6000, 3, 18000, '2023-06-14 05:09:08', '2023-06-14 05:09:08'),
	(63, 'Onigiri Midi', 7000, 1, 7000, '2023-06-14 05:09:31', '2023-06-14 05:09:31'),
	(64, 'Cimol', 6000, 2, 12000, '2023-06-14 05:09:58', '2023-06-14 05:09:58'),
	(65, 'Es Mawar', 3000, 1, 3000, '2023-06-14 05:10:20', '2023-06-14 05:10:20'),
	(66, 'Cimol Gepeng', 6000, 1, 6000, '2023-06-14 05:10:39', '2023-06-14 05:10:39'),
	(67, 'Rice Box', 12000, 1, 12000, '2023-06-14 05:10:58', '2023-06-14 05:10:58'),
	(68, 'Kwetiau Goreng', 10000, 1, 10000, '2023-06-14 05:11:18', '2023-06-14 05:11:18'),
	(71, 'Cimol', 6000, 15, 90000, '2023-08-17 05:22:27', '2023-08-17 05:22:27'),
	(72, 'Sushi', 18000, 4, 72000, '2023-08-17 05:22:44', '2023-08-17 05:22:44'),
	(73, 'Cilok', 6000, 10, 60000, '2023-08-17 05:23:04', '2023-08-17 05:23:04'),
	(74, 'Odeng', 9000, 1, 9000, '2023-08-17 05:23:20', '2023-08-17 05:23:20');

-- Dumping structure for table e-logbookazyra.transaksi_umum_detail
DROP TABLE IF EXISTS `transaksi_umum_detail`;
CREATE TABLE IF NOT EXISTS `transaksi_umum_detail` (
  `id_transaksi_umum_detail` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_umum` int unsigned NOT NULL,
  `keterangan_pemesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pemesanan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_umum_detail`),
  KEY `FK_transaksi_umum_detail_transaksi_umum` (`id_umum`),
  CONSTRAINT `FK_transaksi_umum_detail_transaksi_umum` FOREIGN KEY (`id_umum`) REFERENCES `transaksi_umum` (`id_umum`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

-- Dumping data for table e-logbookazyra.transaksi_umum_detail: ~0 rows (approximately)
INSERT INTO `transaksi_umum_detail` (`id_transaksi_umum_detail`, `id_umum`, `keterangan_pemesanan`, `jumlah_pemesanan`, `created_at`, `updated_at`) VALUES
	(80, 38, 'Go-Food', 1, '2023-06-08 04:26:05', '2023-06-08 04:26:05'),
	(81, 39, 'Go-Food', 1, '2023-06-08 04:26:18', '2023-06-08 04:26:18'),
	(82, 40, 'Go-Food', 1, '2023-06-08 04:26:34', '2023-06-08 04:26:34'),
	(83, 41, 'Manual', 4, '2023-06-08 04:26:59', '2023-06-08 04:26:59'),
	(84, 42, 'Go-Food', 1, '2023-06-08 04:27:11', '2023-06-08 04:27:11'),
	(85, 43, 'Go-Food', 1, '2023-06-08 04:27:23', '2023-06-08 04:27:23'),
	(86, 44, 'Go-Food', 1, '2023-06-09 05:19:15', '2023-06-09 05:19:15'),
	(87, 45, 'Go-Food', 1, '2023-06-09 05:19:27', '2023-06-09 05:19:27'),
	(88, 46, 'Go-Food', 1, '2023-06-09 05:19:39', '2023-06-09 05:19:39'),
	(89, 47, 'Go-Food', 1, '2023-06-09 05:19:53', '2023-06-09 05:19:53'),
	(90, 48, 'Go-Food', 4, '2023-06-09 05:20:06', '2023-06-09 05:20:06'),
	(91, 49, 'Go-Food', 2, '2023-06-12 03:45:22', '2023-06-12 03:45:22'),
	(92, 50, 'Go-Food', 1, '2023-06-12 03:45:37', '2023-06-12 03:45:37'),
	(93, 51, 'Grab-Food', 4, '2023-06-12 03:46:02', '2023-06-12 03:46:02'),
	(94, 51, 'Go-Food', 2, '2023-06-12 03:46:02', '2023-06-12 03:46:02'),
	(95, 52, 'Go-Food', 2, '2023-06-12 03:46:16', '2023-06-12 03:46:16'),
	(96, 53, 'Go-Food', 1, '2023-06-12 03:46:36', '2023-06-12 03:46:36'),
	(97, 54, 'Go-Food', 2, '2023-06-13 05:40:25', '2023-06-13 05:40:25'),
	(98, 55, 'Go-Food', 3, '2023-06-13 05:40:59', '2023-06-13 05:40:59'),
	(99, 56, 'Go-Food', 1, '2023-06-13 05:41:27', '2023-06-13 05:41:27'),
	(100, 57, 'Manual', 1, '2023-06-13 05:41:55', '2023-06-13 05:41:55'),
	(101, 58, 'Manual', 1, '2023-06-13 05:42:17', '2023-06-13 05:42:17'),
	(102, 59, 'Manual', 1, '2023-06-13 05:42:50', '2023-06-13 05:42:50'),
	(103, 60, 'Go-Food', 2, '2023-06-13 05:43:21', '2023-06-13 05:43:21'),
	(104, 61, 'Go-Food', 1, '2023-06-13 05:43:40', '2023-06-13 05:43:40'),
	(105, 62, 'Go-Food', 3, '2023-06-14 05:09:08', '2023-06-14 05:09:08'),
	(106, 63, 'Go-Food', 1, '2023-06-14 05:09:31', '2023-06-14 05:09:31'),
	(107, 64, 'Go-Food', 2, '2023-06-14 05:09:58', '2023-06-14 05:09:58'),
	(108, 65, 'Go-Food', 1, '2023-06-14 05:10:20', '2023-06-14 05:10:20'),
	(109, 66, 'Go-Food', 1, '2023-06-14 05:10:39', '2023-06-14 05:10:39'),
	(110, 67, 'Go-Food', 1, '2023-06-14 05:10:58', '2023-06-14 05:10:58'),
	(111, 68, 'Go-Food', 1, '2023-06-14 05:11:18', '2023-06-14 05:11:18'),
	(116, 71, 'Go-Food', 15, '2023-08-17 05:22:27', '2023-08-17 05:22:27'),
	(117, 72, 'Go-Food', 4, '2023-08-17 05:22:44', '2023-08-17 05:22:44'),
	(118, 73, 'Go-Food', 10, '2023-08-17 05:23:04', '2023-08-17 05:23:04'),
	(119, 74, 'Go-Food', 1, '2023-08-17 05:23:20', '2023-08-17 05:23:20');

-- Dumping structure for table e-logbookazyra.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user','public') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-logbookazyra.users: ~8 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `alamat`, `no_hp`, `email_verified_at`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Regina Mudawamah', 'regina@gmail.com', '$2y$10$ts0fdEdyt409O4pEsSGBbeEYcjcc1Eylphs72Fg/uuPo/7dd6cWgC', '', NULL, NULL, 'user', NULL, '2022-08-26 22:40:37', '2022-11-06 19:18:59'),
	(2, 'Administrator', 'admin@gmail.com', '$2y$10$AiVjC2yfV82S1vn.tg4ox.bTyUkMaksZYw.QyviJRjGd30nOQjQzq', '', NULL, '2022-10-09 03:06:16', 'admin', NULL, '2022-08-26 22:41:04', '2022-08-26 22:41:04'),
	(10, 'Egi', 'egi@gmail.com', '$2y$10$mBTbv/zsM6rwdwAx0dyVqOSXEUksxmi6ustu1PsxX2IRl/38/cMVG', 'Banjarbaru', '082255111410', NULL, 'public', NULL, '2023-07-03 12:43:49', '2023-08-17 01:22:06'),
	(18, 'Ega', 'ega@gmail.com', '$2y$10$0C8b9IxloRCUloOeXCNmS.XZm7Yqw9IxIBGET.NJl/S84phU1L8Ya', 'Banjarbaru', '082211223344', NULL, 'public', NULL, '2023-07-03 15:31:33', '2023-08-05 15:53:27'),
	(19, 'Enis', 'enis@gmail.com', '$2y$10$2tibUv9SKkbQ.WOu2hdez.U1UQ/JGI.4MAxgpHKBts.Gfb7g1txTy', 'Loktabat Selatan', '091122887364', NULL, 'public', NULL, '2023-08-17 08:28:09', '2023-08-17 08:29:25'),
	(20, 'Nana', 'nana@gmail.com', '$2y$10$TbmcOBKZuUolfTB7ZOZdTefWZqb8CJvjS.lMn3C5o5iqnTsEVVX1K', 'Banjarbaru', '087766554433', NULL, 'public', NULL, '2023-08-18 03:46:04', '2023-08-18 03:51:47'),
	(32, 'surya', 'surya@gmail.com', '$2y$10$f1nQqkGG7Ghx7ei8sj4S0OLX5Cj1c0WaG.TgmJxQ3yOCFPsJNZ23S', 'Jakarta', '083159885039', NULL, 'public', NULL, '2023-10-21 11:39:56', '2023-10-21 12:08:00'),
	(33, 'Regina', 'reg@gmail.com', '$2y$10$ts0fdEdyt409O4pEsSGBbeEYcjcc1Eylphs72Fg/uuPo/7dd6cWgC', '', NULL, NULL, 'user', NULL, '2022-08-26 22:40:37', '2022-11-06 19:18:59');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
