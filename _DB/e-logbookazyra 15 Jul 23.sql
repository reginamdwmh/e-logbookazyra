-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 08:47 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-logbookazyra`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(10) UNSIGNED NOT NULL,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `nama_alat`, `harga`, `created_at`, `updated_at`) VALUES
(35, 'Cup 200ml', 680, '2023-06-08 00:56:24', '2023-06-08 01:15:28'),
(36, 'Cup 300ml', 700, '2023-06-08 00:56:24', '2023-06-08 01:15:53'),
(37, 'Cup 400ml', 700, '2023-06-08 00:56:24', '2023-06-08 01:16:14'),
(38, 'Cup 450ml', 740, '2023-06-08 00:56:24', '2023-06-08 01:16:35'),
(39, 'Gelas Plastik', 250, '2023-06-08 00:56:24', '2023-06-08 01:16:59'),
(40, 'Mika Burger', 400, '2023-06-08 00:56:24', '2023-06-08 01:17:41'),
(41, 'Rice Box', 1280, '2023-06-08 01:07:22', '2023-06-08 01:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `harga`, `created_at`, `updated_at`) VALUES
(6, 'Topokki Frozen', 27000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(7, 'Saus Topoki Ori', 8000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(8, 'Ayam Fillet', 30000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(9, 'Tepung Kanji 1kg', 14000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(10, 'Telur 1kg', 30000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(11, 'Tepung Terigu 1kg', 10000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(12, 'Kecap Besar', 14000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(13, 'Bawang Merah 1/2', 40000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(14, 'Bawang Putih 1/2', 15000, '2023-01-18 19:04:51', '2023-01-18 19:04:51'),
(15, 'Kacang Tanah 1kg', 31000, '2023-01-18 19:12:11', '2023-01-18 19:12:11'),
(16, 'Sosis Kanzler', 8000, '2023-02-18 00:24:09', '2023-02-18 00:24:09'),
(17, 'Garam 500gr', 10000, '2023-02-18 00:33:37', '2023-02-18 00:33:37'),
(18, 'Royco 10 Sachet', 11000, '2023-02-18 00:33:37', '2023-02-18 00:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`, `keterangan_kategori`, `created_at`, `updated_at`) VALUES
(1, 'JSF', 'Japan Street Food', 'Jajanan Tradisional Khas Jepang', '2022-08-28 06:31:33', '2022-12-21 18:24:35'),
(2, 'KSF', 'Korean Street Food', 'Jajanan Tradisional Khas Korea', '2022-08-28 06:41:20', '2022-12-21 18:24:58'),
(3, 'MNM', 'Minuman', 'Minuman es yang harum dan menyegarkan', '2022-08-29 17:47:19', '2022-08-29 17:50:25'),
(4, 'CML', 'Camilan', 'Camilan dari yang diolah dengan bumbu khas AZYRA', '2022-08-29 22:24:05', '2022-08-29 22:41:45'),
(5, 'PHA', 'Paket Hemat', 'Paket makanan yang bervariasi', '2022-08-29 22:42:38', '2022-08-29 22:42:38'),
(6, 'ISF', 'Indonesia Street Food', 'Jajanan Tradisional Khas Indonesia', '2023-01-18 19:21:34', '2023-01-18 19:21:34'),
(7, 'FF', 'Frozen Food', 'Frozen Food', '2023-07-15 03:24:55', '2023-07-15 03:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(10) UNSIGNED NOT NULL,
  `id_alat` int(10) UNSIGNED DEFAULT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_makanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `id_alat`, `nama_kategori`, `nama_makanan`, `harga`, `image`, `created_at`, `updated_at`) VALUES
(44, 38, 'Indonesia Street Food', 'Seblak', 10000, 'makanan-foto/v3s7TgV2A9FH3DtB6KBUyslTtuocoWfMn0VlGs3v.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(45, 40, 'Japan Street Food', 'Sushi', 18000, 'makanan-foto/ux3XCx6TgPp0QDDDEBf3fQDIBQoqF1yQNjMxw9c2.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(46, 36, 'Korean Street Food', 'Topokki Original', 18000, 'makanan-foto/q3Gs7pEvbl09jiSQ5n5md1mOBoM0eaT2o81yAiw3.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(47, 35, 'Indonesia Street Food', 'Cilok', 6000, 'makanan-foto/rgNhbJ1SXGTyKX045dxCpWSEkOxPJ0fXgKks0aVT.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(48, 35, 'Indonesia Street Food', 'Cimol', 6000, 'makanan-foto/Dztl8SoVCDrSxUY7vGex68j7XHP9S6WmiqsI3zJF.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(49, 36, 'Korean Street Food', 'Topokki Creamy', 18000, 'makanan-foto/W8dqmWevKFY1XwbF3a6K8XXgx5uUNmXcNW5kabUm.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(50, 36, 'Korean Street Food', 'Topokki Hot Spicy', 18000, 'makanan-foto/DEWhU3LFl3BW1Y1xgb7AX4aaUAR8yRHQp5mX1Q8O.jpg', '2023-06-08 01:06:23', '2023-06-08 01:06:23'),
(51, 39, 'Minuman', 'Es Mawar', 3000, 'makanan-foto/1cbPpGsToLtUnBwpdbZXjt5VotNc3DSRjuXx8Ls1.jpg', '2023-06-08 01:10:47', '2023-06-08 01:10:47'),
(52, 41, 'Japan Street Food', 'Chicken Katsu Box', 16000, 'makanan-foto/8U44bdag5OCRTTeUHCJcNTBXDpU44w6O4V8BR4lR.jpg', '2023-06-08 01:10:47', '2023-06-08 01:10:47'),
(53, 37, 'Indonesia Street Food', 'Kwetiau Goreng', 10000, 'makanan-foto/ogDOSfGN5WeHMGLggc0GUky7kzNBxpdO9C3FZwL8.jpg', '2023-06-12 00:42:23', '2023-06-12 00:42:23'),
(54, 40, 'Japan Street Food', 'Onigiri Mini', 6500, 'makanan-foto/PhYerzeuRPyTexqDxF7ILzpmCJp0ul1F2BgkcHMl.jpg', '2023-06-13 02:21:41', '2023-06-13 02:21:41'),
(55, 40, 'Japan Street Food', 'Onigiri Midi', 7000, 'makanan-foto/cZNb7I8VO3mBk74kvtY32xHExUlUKVfwEaS2NJbC.jpg', '2023-06-13 02:21:41', '2023-06-13 02:21:41'),
(56, 40, 'Japan Street Food', 'Onigiri Normal', 10000, 'makanan-foto/Rcl6kHv2qOTWipWkIOzxpqmgydYqCJoOcZ8U9uIS.jpg', '2023-06-13 02:21:41', '2023-06-13 02:21:41'),
(57, 41, 'Indonesia Street Food', 'Rice Box', 12000, 'makanan-foto/iP2UxvIA95kXlOe4SpTrxcbV8n2fhR1hJNdjlkL1.jpg', '2023-06-13 02:21:41', '2023-06-13 02:21:41'),
(58, 35, 'Camilan', 'Cimol Gepeng', 6000, 'makanan-foto/PNG1BEAdWxaMUKAfNmsaAz7AUxNtsff2d6zIgcSV.jpg', '2023-06-13 02:21:41', '2023-06-13 02:21:41'),
(59, 36, 'Japan Street Food', 'Odeng', 9000, 'makanan-foto/wTif1d25vmDbjcZBvcjoofztbBcJy1kTA1kRbrqb.jpg', '2023-06-13 02:21:41', '2023-06-13 02:21:41'),
(60, 35, 'Japan Street Food', 'Ramen Mini', 10000, 'makanan-foto/rUxBNg7QlVPbi8TBO3Eb149A2UgOsbPf76zAAx8H.jpg', '2023-07-08 05:08:48', '2023-07-08 05:08:48'),
(61, NULL, 'Frozen Food', 'Champ', 25000, 'makanan-foto/Z3dk4fslDgjDyvClSzREehEJuvA6wmesDaCMljwf.png', '2023-07-15 03:36:18', '2023-07-15 03:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(10) UNSIGNED NOT NULL,
  `keterangan_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `keterangan_pemesanan`, `biaya_admin`, `ongkir`, `created_at`, `updated_at`) VALUES
(5, 'Go-Food', 20, 1000, '2022-12-20 17:32:25', '2022-12-20 17:32:25'),
(6, 'Grab-Food', 20, 0, '2022-12-20 17:32:44', '2022-12-20 17:32:44'),
(7, 'Shopee-Food', 25, 0, '2022-12-20 17:33:03', '2022-12-20 17:33:03'),
(8, 'Manual', 0, 0, '2022-12-20 17:33:17', '2022-12-20 17:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `user_id`, `tanggal`, `total`, `status`, `created_at`, `updated_at`) VALUES
(72, 18, '2023-07-08 08:04:02', 20000, 1, '2023-07-08 08:04:02', '2023-07-08 09:34:49'),
(73, 18, '2023-07-08 09:49:40', 175000, 3, '2023-07-08 09:49:40', '2023-07-15 07:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id`, `id_item`, `id_pesanan`, `jumlah`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
(72, 60, 72, 2, 10000, 20000, '2023-07-08 08:04:02', '2023-07-08 08:04:02'),
(73, 60, 73, 5, 10000, 50000, '2023-07-08 09:49:40', '2023-07-08 09:49:40'),
(74, 61, 73, 5, 25000, 125000, '2023-07-15 05:18:46', '2023-07-15 05:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `stok_alat`
--

CREATE TABLE `stok_alat` (
  `id_alat` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `stok_masuk` int(11) NOT NULL DEFAULT '0',
  `stok_keluar` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_alat`
--

INSERT INTO `stok_alat` (`id_alat`, `stok_masuk`, `stok_keluar`, `created_at`, `updated_at`) VALUES
(35, 50, 20, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(36, 25, 0, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(37, 25, 2, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(38, 25, 5, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(39, 50, 4, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(40, 25, 8, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(41, 25, 8, '2023-06-08 01:18:54', '2023-06-08 01:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `stok_frozen_food`
--

CREATE TABLE `stok_frozen_food` (
  `id_makanan` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `stok_masuk` int(11) NOT NULL DEFAULT '0',
  `stok_keluar` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_frozen_food`
--

INSERT INTO `stok_frozen_food` (`id_makanan`, `stok_masuk`, `stok_keluar`, `created_at`, `updated_at`) VALUES
(61, 50, 0, '2023-07-15 04:30:26', '2023-07-15 04:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_alat`
--

CREATE TABLE `transaksi_alat` (
  `id_transaksialat` int(10) UNSIGNED NOT NULL,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_alat`
--

INSERT INTO `transaksi_alat` (`id_transaksialat`, `nama_alat`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(31, 'Cup 200ml', 680, 25, 17000, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(32, 'Cup 300ml', 700, 25, 17500, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(33, 'Cup 400ml', 700, 25, 17500, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(34, 'Cup 450ml', 740, 25, 18500, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(35, 'Gelas Plastik', 250, 50, 12500, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(36, 'Mika Burger', 400, 25, 10000, '2023-06-08 01:18:54', '2023-06-08 01:18:54'),
(37, 'Rice Box', 1280, 25, 32000, '2023-06-08 01:18:54', '2023-06-08 01:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bahan`
--

CREATE TABLE `transaksi_bahan` (
  `id_transaksibahan` int(10) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_bahan`
--

INSERT INTO `transaksi_bahan` (`id_transaksibahan`, `nama_bahan`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(20, 'Topokki Frozen', 27000, 5, 135000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(21, 'Saus Topoki Ori', 8000, 5, 40000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(22, 'Ayam Fillet', 30000, 5, 150000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(23, 'Tepung Kanji 1kg', 14000, 5, 70000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(24, 'Telur 1kg', 30000, 2, 60000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(25, 'Tepung Terigu 1kg', 10000, 5, 50000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(26, 'Kecap Besar', 14000, 2, 28000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(27, 'Kacang Tanah 1kg', 31000, 1, 31000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(28, 'Garam 500gr', 10000, 1, 10000, '2023-06-08 01:20:27', '2023-06-08 01:20:27'),
(29, 'Royco 10 Sachet', 11000, 1, 11000, '2023-06-08 01:20:27', '2023-06-08 01:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_frozen_food`
--

CREATE TABLE `transaksi_frozen_food` (
  `id_transaksi_frozen_food` int(10) UNSIGNED NOT NULL,
  `nama_makanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_frozen_food`
--

INSERT INTO `transaksi_frozen_food` (`id_transaksi_frozen_food`, `nama_makanan`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES
(31, 'Champ', 25000, 50, 1250000, '2023-07-15 04:30:26', '2023-07-15 04:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan_online`
--

CREATE TABLE `transaksi_pemesanan_online` (
  `id_online` int(10) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `komisi` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_pemesanan_online`
--

INSERT INTO `transaksi_pemesanan_online` (`id_online`, `kode_pemesanan`, `keterangan_pemesanan`, `jumlah`, `biaya_admin`, `ongkir`, `komisi`, `total`, `created_at`, `updated_at`) VALUES
(13, '7134', 'Go-Food', 27500, 20, 1000, 6500, 21000, '2023-06-08 01:25:02', '2023-06-08 01:25:02'),
(14, '5528', 'Go-Food', 23000, 20, 1000, 5600, 17400, '2023-06-08 01:25:23', '2023-06-08 01:25:23'),
(15, '5321', 'Go-Food', 37500, 20, 1000, 8500, 29000, '2023-06-09 02:17:08', '2023-06-09 02:17:08'),
(16, '1442', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-06-09 02:18:05', '2023-06-09 02:18:35'),
(17, '3971', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-06-09 02:18:52', '2023-06-09 02:18:52'),
(18, '8317', 'Go-Food', 58500, 20, 1000, 12700, 45800, '2023-06-12 00:44:10', '2023-06-12 00:44:10'),
(19, 'GF-636', 'Grab-Food', 30000, 20, 0, 6000, 24000, '2023-06-12 00:44:36', '2023-06-12 00:44:36'),
(20, '6421', 'Go-Food', 42500, 20, 1000, 9500, 33000, '2023-06-12 00:44:55', '2023-06-12 00:44:55'),
(21, '3471', 'Go-Food', 38000, 20, 1000, 0, 38000, '2023-06-13 02:38:47', '2023-06-13 02:38:47'),
(22, '3859', 'Go-Food', 34500, 20, 1000, 0, 34500, '2023-06-13 02:39:17', '2023-06-13 02:39:17'),
(23, '6131', 'Go-Food', 15000, 20, 1000, 4000, 11000, '2023-06-14 02:04:35', '2023-06-14 02:04:52'),
(24, '9926', 'Go-Food', 27500, 20, 1000, 6500, 21000, '2023-06-14 02:08:09', '2023-06-14 02:08:09'),
(25, '7439', 'Go-Food', 42500, 20, 1000, 9500, 33000, '2023-06-14 02:08:31', '2023-06-14 02:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan_makanan`
--

CREATE TABLE `transaksi_penjualan_makanan` (
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `nama_makanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_penjualan_makanan`
--

INSERT INTO `transaksi_penjualan_makanan` (`id_penjualan`, `nama_makanan`, `harga`, `jumlah`, `diskon`, `total`, `created_at`, `updated_at`) VALUES
(46, 'Chicken Katsu Box', '16000', '1', '0', '16000', '2023-06-08 01:24:31', '2023-06-08 01:24:31'),
(47, 'Cimol', '6000', '1', '0', '6000', '2023-06-08 01:24:31', '2023-06-08 01:24:31'),
(48, 'Sushi', '18000', '1', '0', '18000', '2023-06-08 01:24:31', '2023-06-08 01:24:31'),
(49, 'Chicken Katsu Box', '16000', '4', '0', '64000', '2023-06-08 01:24:31', '2023-06-08 01:24:31'),
(50, 'Seblak', '10000', '1', '0', '10000', '2023-06-08 01:24:31', '2023-06-08 01:24:31'),
(51, 'Es Mawar', '3000', '1', '0', '3000', '2023-06-08 01:24:31', '2023-06-08 01:24:31'),
(52, 'Chicken Katsu Box', '16000', '1', '0', '16000', '2023-06-09 02:16:45', '2023-06-09 02:16:45'),
(53, 'Es Mawar', '3000', '1', '0', '3000', '2023-06-09 02:16:45', '2023-06-09 02:16:45'),
(54, 'Seblak', '10000', '1', '0', '10000', '2023-06-09 02:16:45', '2023-06-09 02:16:45'),
(55, 'Sushi', '18000', '1', '0', '18000', '2023-06-09 02:16:45', '2023-06-09 02:16:45'),
(56, 'Cilok', '6000', '2', '0', '12000', '2023-06-09 02:16:45', '2023-06-09 02:16:45'),
(57, 'Cilok', '6000', '2', '0', '12000', '2023-06-09 02:16:45', '2023-06-09 02:16:45'),
(58, 'Sushi', '18000', '2', '0', '36000', '2023-06-12 00:43:43', '2023-06-12 00:43:43'),
(59, 'Kwetiau Goreng', '10000', '1', '0', '10000', '2023-06-12 00:43:43', '2023-06-12 00:43:43'),
(60, 'Cimol', '6000', '4', '0', '24000', '2023-06-12 00:43:43', '2023-06-12 00:43:43'),
(61, 'Cimol', '6000', '2', '0', '12000', '2023-06-12 00:43:43', '2023-06-12 00:43:43'),
(62, 'Cilok', '6000', '2', '0', '12000', '2023-06-12 00:43:43', '2023-06-12 00:43:43'),
(63, 'Seblak', '10000', '1', '0', '10000', '2023-06-12 00:43:43', '2023-06-12 00:43:43'),
(64, 'Sushi', '18000', '1', '0', '18000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(65, 'Cimol', '6000', '2', '0', '12000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(66, 'Sushi', '18000', '1', '0', '18000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(67, 'Onigiri Normal', '10000', '1', '0', '10000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(68, 'Rice Box', '12000', '1', '0', '12000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(69, 'Es Mawar', '3000', '1', '0', '3000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(70, 'Cilok', '6000', '1', '0', '6000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(71, 'Seblak', '10000', '2', '0', '20000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(72, 'Cimol', '6000', '1', '0', '6000', '2023-06-13 02:38:09', '2023-06-13 02:38:09'),
(73, 'Cilok', '6000', '2', '0', '12000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(74, 'Onigiri Midi', '7000', '1', '0', '7000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(75, 'Cimol', '6000', '1', '0', '6000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(76, 'Cilok', '6000', '1', '0', '6000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(77, 'Es Mawar', '3000', '1', '0', '3000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(78, 'Cimol', '6000', '1', '0', '6000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(79, 'Cimol Gepeng', '6000', '1', '0', '6000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(80, 'Rice Box', '12000', '1', '0', '12000', '2023-06-14 02:04:09', '2023-06-14 02:04:09'),
(81, 'Kwetiau Goreng', '10000', '1', '0', '10000', '2023-06-14 02:04:09', '2023-06-14 02:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_umum`
--

CREATE TABLE `transaksi_umum` (
  `id_umum` int(10) UNSIGNED NOT NULL,
  `nama_makanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_penjualan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_umum`
--

INSERT INTO `transaksi_umum` (`id_umum`, `nama_makanan`, `harga`, `jumlah_penjualan`, `total`, `created_at`, `updated_at`) VALUES
(38, 'Chicken Katsu Box', 16000, 1, 16000, '2023-06-08 01:26:05', '2023-06-08 01:26:05'),
(39, 'Cimol', 6000, 1, 6000, '2023-06-08 01:26:18', '2023-06-08 01:26:18'),
(40, 'Sushi', 18000, 1, 18000, '2023-06-08 01:26:34', '2023-06-08 01:26:34'),
(41, 'Chicken Katsu Box', 16000, 4, 64000, '2023-06-08 01:26:58', '2023-06-08 01:26:58'),
(42, 'Seblak', 10000, 1, 10000, '2023-06-08 01:27:11', '2023-06-08 01:27:11'),
(43, 'Es Mawar', 3000, 1, 3000, '2023-06-08 01:27:23', '2023-06-08 01:27:23'),
(44, 'Chicken Katsu Box', 16000, 1, 16000, '2023-06-09 02:19:15', '2023-06-09 02:19:15'),
(45, 'Es Mawar', 3000, 1, 3000, '2023-06-09 02:19:27', '2023-06-09 02:19:27'),
(46, 'Seblak', 10000, 1, 10000, '2023-06-09 02:19:39', '2023-06-09 02:19:39'),
(47, 'Sushi', 18000, 1, 18000, '2023-06-09 02:19:53', '2023-06-09 02:19:53'),
(48, 'Cilok', 6000, 4, 24000, '2023-06-09 02:20:06', '2023-06-09 02:20:06'),
(49, 'Sushi', 18000, 2, 36000, '2023-06-12 00:45:22', '2023-06-12 00:45:22'),
(50, 'Kwetiau Goreng', 10000, 1, 10000, '2023-06-12 00:45:37', '2023-06-12 00:45:37'),
(51, 'Cimol', 6000, 6, 36000, '2023-06-12 00:46:02', '2023-06-12 00:46:02'),
(52, 'Cilok', 6000, 2, 12000, '2023-06-12 00:46:16', '2023-06-12 00:46:16'),
(53, 'Seblak', 10000, 1, 10000, '2023-06-12 00:46:36', '2023-06-12 00:46:36'),
(54, 'Sushi', 18000, 2, 36000, '2023-06-13 02:40:25', '2023-06-13 02:40:25'),
(55, 'Cilok', 6000, 3, 18000, '2023-06-13 02:40:59', '2023-06-13 02:40:59'),
(56, 'Onigiri Normal', 10000, 1, 10000, '2023-06-13 02:41:27', '2023-06-13 02:41:27'),
(57, 'Rice Box', 12000, 1, 12000, '2023-06-13 02:41:55', '2023-06-13 02:41:55'),
(58, 'Es Mawar', 3000, 1, 3000, '2023-06-13 02:42:16', '2023-06-13 02:42:16'),
(59, 'Cilok', 6000, 1, 6000, '2023-06-13 02:42:50', '2023-06-13 02:42:50'),
(60, 'Seblak', 10000, 2, 20000, '2023-06-13 02:43:21', '2023-06-13 02:43:21'),
(61, 'Cimol', 6000, 1, 6000, '2023-06-13 02:43:40', '2023-06-13 02:43:40'),
(62, 'Cilok', 6000, 3, 18000, '2023-06-14 02:09:08', '2023-06-14 02:09:08'),
(63, 'Onigiri Midi', 7000, 1, 7000, '2023-06-14 02:09:31', '2023-06-14 02:09:31'),
(64, 'Cimol', 6000, 2, 12000, '2023-06-14 02:09:58', '2023-06-14 02:09:58'),
(65, 'Es Mawar', 3000, 1, 3000, '2023-06-14 02:10:20', '2023-06-14 02:10:20'),
(66, 'Cimol Gepeng', 6000, 1, 6000, '2023-06-14 02:10:39', '2023-06-14 02:10:39'),
(67, 'Rice Box', 12000, 1, 12000, '2023-06-14 02:10:58', '2023-06-14 02:10:58'),
(68, 'Kwetiau Goreng', 10000, 1, 10000, '2023-06-14 02:11:18', '2023-06-14 02:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_umum_detail`
--

CREATE TABLE `transaksi_umum_detail` (
  `id_transaksi_umum_detail` bigint(20) UNSIGNED NOT NULL,
  `id_umum` int(10) UNSIGNED NOT NULL,
  `keterangan_pemesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pemesanan` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_umum_detail`
--

INSERT INTO `transaksi_umum_detail` (`id_transaksi_umum_detail`, `id_umum`, `keterangan_pemesanan`, `jumlah_pemesanan`, `created_at`, `updated_at`) VALUES
(80, 38, 'Go-Food', 1, '2023-06-08 01:26:05', '2023-06-08 01:26:05'),
(81, 39, 'Go-Food', 1, '2023-06-08 01:26:18', '2023-06-08 01:26:18'),
(82, 40, 'Go-Food', 1, '2023-06-08 01:26:34', '2023-06-08 01:26:34'),
(83, 41, 'Manual', 4, '2023-06-08 01:26:59', '2023-06-08 01:26:59'),
(84, 42, 'Go-Food', 1, '2023-06-08 01:27:11', '2023-06-08 01:27:11'),
(85, 43, 'Go-Food', 1, '2023-06-08 01:27:23', '2023-06-08 01:27:23'),
(86, 44, 'Go-Food', 1, '2023-06-09 02:19:15', '2023-06-09 02:19:15'),
(87, 45, 'Go-Food', 1, '2023-06-09 02:19:27', '2023-06-09 02:19:27'),
(88, 46, 'Go-Food', 1, '2023-06-09 02:19:39', '2023-06-09 02:19:39'),
(89, 47, 'Go-Food', 1, '2023-06-09 02:19:53', '2023-06-09 02:19:53'),
(90, 48, 'Go-Food', 4, '2023-06-09 02:20:06', '2023-06-09 02:20:06'),
(91, 49, 'Go-Food', 2, '2023-06-12 00:45:22', '2023-06-12 00:45:22'),
(92, 50, 'Go-Food', 1, '2023-06-12 00:45:37', '2023-06-12 00:45:37'),
(93, 51, 'Grab-Food', 4, '2023-06-12 00:46:02', '2023-06-12 00:46:02'),
(94, 51, 'Go-Food', 2, '2023-06-12 00:46:02', '2023-06-12 00:46:02'),
(95, 52, 'Go-Food', 2, '2023-06-12 00:46:16', '2023-06-12 00:46:16'),
(96, 53, 'Go-Food', 1, '2023-06-12 00:46:36', '2023-06-12 00:46:36'),
(97, 54, 'Go-Food', 2, '2023-06-13 02:40:25', '2023-06-13 02:40:25'),
(98, 55, 'Go-Food', 3, '2023-06-13 02:40:59', '2023-06-13 02:40:59'),
(99, 56, 'Go-Food', 1, '2023-06-13 02:41:27', '2023-06-13 02:41:27'),
(100, 57, 'Manual', 1, '2023-06-13 02:41:55', '2023-06-13 02:41:55'),
(101, 58, 'Manual', 1, '2023-06-13 02:42:17', '2023-06-13 02:42:17'),
(102, 59, 'Manual', 1, '2023-06-13 02:42:50', '2023-06-13 02:42:50'),
(103, 60, 'Go-Food', 2, '2023-06-13 02:43:21', '2023-06-13 02:43:21'),
(104, 61, 'Go-Food', 1, '2023-06-13 02:43:40', '2023-06-13 02:43:40'),
(105, 62, 'Go-Food', 3, '2023-06-14 02:09:08', '2023-06-14 02:09:08'),
(106, 63, 'Go-Food', 1, '2023-06-14 02:09:31', '2023-06-14 02:09:31'),
(107, 64, 'Go-Food', 2, '2023-06-14 02:09:58', '2023-06-14 02:09:58'),
(108, 65, 'Go-Food', 1, '2023-06-14 02:10:20', '2023-06-14 02:10:20'),
(109, 66, 'Go-Food', 1, '2023-06-14 02:10:39', '2023-06-14 02:10:39'),
(110, 67, 'Go-Food', 1, '2023-06-14 02:10:58', '2023-06-14 02:10:58'),
(111, 68, 'Go-Food', 1, '2023-06-14 02:11:18', '2023-06-14 02:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user','public') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `alamat`) VALUES
(1, 'Regina Mudawamah', 'regina@gmail.com', NULL, '$2y$10$ts0fdEdyt409O4pEsSGBbeEYcjcc1Eylphs72Fg/uuPo/7dd6cWgC', 'user', NULL, '2022-08-26 19:40:37', '2022-11-06 16:18:59', ''),
(2, 'Administrator', 'admin@gmail.com', '2022-10-09 00:06:16', '$2y$10$AiVjC2yfV82S1vn.tg4ox.bTyUkMaksZYw.QyviJRjGd30nOQjQzq', 'admin', NULL, '2022-08-26 19:41:04', '2022-08-26 19:41:04', ''),
(10, 'Egi', 'egi@gmail.com', NULL, '$2y$10$fIjiTsRymbO0TLuTOelofObVNV3MDC9kNgpxzZaVQsxXkfXyqWqs2', 'public', NULL, '2023-07-03 09:43:49', '2023-07-03 09:43:49', ''),
(11, 'Enis', 'enis@gmail.com', NULL, '$2y$10$/vd4No5YtVKK8KvpDAceKuBvzBIB9vMEdBjwuHVsOyKpUMK8XMJEa', 'public', NULL, '2023-07-03 12:20:11', '2023-07-03 12:20:11', ''),
(18, 'Ega', 'ega@gmail.com', NULL, '$2y$10$imLpVOtRZHdmL3Wvdn6ZPu/0ySHDRZdwYXl9.FapVdIV0z20LAfpS', 'public', NULL, '2023-07-03 12:31:33', '2023-07-08 06:48:37', 'Banjarbaru'),
(19, 'Jolly', 'jolly@gmail.com', NULL, '$2y$10$nDA43hRjVD1Tb.bQc9CS/u5pm5/GkJPAQ1ycJaGRsZC5UcFsYi3KC', 'public', NULL, '2023-07-03 12:59:27', '2023-07-03 12:59:27', ''),
(24, 'Vikry Surya Pangestu', 'surya@gmail.com', NULL, '$2y$10$j/8RAWCKzY9OuY0lewicouxI4knWZJVR4/yh83fVRNc2l7xA/Ciba', 'public', NULL, '2023-07-08 05:47:51', '2023-07-08 05:47:51', 'Jalan Peta Barat Blok H No.18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `FK_makanan_alat` (`id_alat`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pesanan_detail` (`id_pesanan`) USING BTREE;

--
-- Indexes for table `stok_alat`
--
ALTER TABLE `stok_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `stok_frozen_food`
--
ALTER TABLE `stok_frozen_food`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `transaksi_alat`
--
ALTER TABLE `transaksi_alat`
  ADD PRIMARY KEY (`id_transaksialat`);

--
-- Indexes for table `transaksi_bahan`
--
ALTER TABLE `transaksi_bahan`
  ADD PRIMARY KEY (`id_transaksibahan`);

--
-- Indexes for table `transaksi_frozen_food`
--
ALTER TABLE `transaksi_frozen_food`
  ADD PRIMARY KEY (`id_transaksi_frozen_food`);

--
-- Indexes for table `transaksi_pemesanan_online`
--
ALTER TABLE `transaksi_pemesanan_online`
  ADD PRIMARY KEY (`id_online`);

--
-- Indexes for table `transaksi_penjualan_makanan`
--
ALTER TABLE `transaksi_penjualan_makanan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `transaksi_umum`
--
ALTER TABLE `transaksi_umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indexes for table `transaksi_umum_detail`
--
ALTER TABLE `transaksi_umum_detail`
  ADD PRIMARY KEY (`id_transaksi_umum_detail`),
  ADD KEY `FK_transaksi_umum_detail_transaksi_umum` (`id_umum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `transaksi_alat`
--
ALTER TABLE `transaksi_alat`
  MODIFY `id_transaksialat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transaksi_bahan`
--
ALTER TABLE `transaksi_bahan`
  MODIFY `id_transaksibahan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaksi_frozen_food`
--
ALTER TABLE `transaksi_frozen_food`
  MODIFY `id_transaksi_frozen_food` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaksi_pemesanan_online`
--
ALTER TABLE `transaksi_pemesanan_online`
  MODIFY `id_online` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi_penjualan_makanan`
--
ALTER TABLE `transaksi_penjualan_makanan`
  MODIFY `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `transaksi_umum`
--
ALTER TABLE `transaksi_umum`
  MODIFY `id_umum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `transaksi_umum_detail`
--
ALTER TABLE `transaksi_umum_detail`
  MODIFY `id_transaksi_umum_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `FK_makanan_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`);

--
-- Constraints for table `stok_alat`
--
ALTER TABLE `stok_alat`
  ADD CONSTRAINT `FK_stok_alat_alat` FOREIGN KEY (`id_alat`) REFERENCES `alat` (`id_alat`);

--
-- Constraints for table `stok_frozen_food`
--
ALTER TABLE `stok_frozen_food`
  ADD CONSTRAINT `FK_stok_frozen_food_makanan` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`);

--
-- Constraints for table `transaksi_umum_detail`
--
ALTER TABLE `transaksi_umum_detail`
  ADD CONSTRAINT `FK_transaksi_umum_detail_transaksi_umum` FOREIGN KEY (`id_umum`) REFERENCES `transaksi_umum` (`id_umum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
