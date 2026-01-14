-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2025 at 09:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekmypc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'zyxeus', 'zyxeus@gmail.com', '$2y$12$3o.cJlKnW6lHKJanIDlZ7unP9SloKbq9jbBqupTBdSS/eqMZzwLny', '2025-08-10 09:03:26', '2025-08-10 09:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_fuzzy` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`, `bobot_fuzzy`, `created_at`, `updated_at`) VALUES
('G01', 'Komputer tidak menyala', 1, NULL, NULL),
('G02', 'Monitor tidak menampilkan gambar', 0.8, NULL, NULL),
('G03', 'Komputer sering restart sendiri', 0.7, NULL, NULL),
('G04', 'Suara beep berulang saat booting', 0.6, NULL, NULL),
('G05', 'Komputer berjalan sangat lambat', 0.6, NULL, NULL),
('G06', 'Mouse tidak terdeteksi', 0.5, NULL, NULL),
('G07', 'Keyboard tidak merespon', 0.5, NULL, NULL),
('G08', 'Komputer cepat panas', 0.7, NULL, NULL),
('G09', 'Aplikasi sering crash', 0.6, NULL, NULL),
('G10', 'Hardisk berbunyi tidak normal', 0.9, NULL, NULL),
('G11', 'test', 0.6, '2025-11-19 05:53:49', '2025-11-19 05:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `kode_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`kode_kerusakan`, `nama_kerusakan`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
('K01', 'Power Supply Rusak', 'PSU tidak dapat mengirim daya stabil', '20251215_155740_693fcd8403223.jpg', NULL, '2025-12-15 08:57:40'),
('K02', 'RAM Bermasalah', 'Memori tidak dapat terbaca atau corrupt', '20251215_155707_693fcd6312fe7.png', NULL, '2025-12-15 08:57:07'),
('K03', 'VGA / GPU Bermasalah', 'Masalah tampilan tidak muncul', '20251215_155754_693fcd924c574.jpg', NULL, '2025-12-15 08:57:54'),
('K04', 'Harddisk Rusak', 'Kerusakan mekanik / bad sector', NULL, NULL, NULL),
('K05', 'CPU Overheat', 'Prosesor terlalu panas menyebabkan restart', NULL, NULL, NULL),
('k06', 'test', 'dfdf', '20251215_144014.jpg', '2025-11-19 05:54:16', '2025-12-15 07:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_08_10_150615_create_users_table', 1),
(2, '2025_08_10_150746_create_cache_table', 1),
(3, '2025_08_10_150828_create_jobs_table', 1),
(4, '2025_08_10_150949_create_admins_table', 1),
(5, '2025_08_10_151140_create_gejala_table', 1),
(6, '2025_08_10_152636_create_kerusakan_table', 1),
(7, '2025_08_10_153417_create_solusi_table', 1),
(8, '2025_08_10_154548_create_proses_table', 1),
(9, '2025_08_10_154712_create_riwayat_table', 1),
(10, '2025_08_10_154750_create_testimoni_table', 1),
(11, '2025_08_12_113430_add_bobot_fuzzy_to_gejala_table', 2),
(13, '2025_08_12_120012_add_deskripsi_to_kerusakan_table', 3),
(14, '2025_08_12_122123_create_solusi_table', 4),
(16, '2025_08_12_145107_create_fuzzy_skala_table', 5),
(17, '2025_08_12_145125_create_fuzzy_parameter_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_gejala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_cf` decimal(3,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`id`, `kode_gejala`, `kode_kerusakan`, `nilai_cf`, `created_at`, `updated_at`) VALUES
(5, 'G01', 'K01', '0.90', NULL, NULL),
(6, 'G03', 'K01', '0.70', NULL, NULL),
(7, 'G08', 'K01', '0.40', NULL, NULL),
(8, 'G03', 'K02', '0.60', NULL, NULL),
(9, 'G04', 'K02', '0.80', NULL, NULL),
(10, 'G09', 'K02', '0.70', NULL, NULL),
(11, 'G05', 'K02', '0.50', NULL, NULL),
(12, 'G02', 'K03', '0.90', NULL, NULL),
(13, 'G03', 'K03', '0.50', NULL, NULL),
(14, 'G08', 'K03', '0.40', NULL, NULL),
(21, 'G10', 'K04', '0.90', NULL, NULL),
(22, 'G05', 'K04', '0.60', NULL, NULL),
(23, 'G09', 'K04', '0.80', NULL, NULL),
(24, 'G08', 'K05', '0.90', NULL, NULL),
(25, 'G05', 'K05', '0.50', NULL, NULL),
(26, 'G03', 'K05', '0.70', NULL, NULL),
(27, 'G02', 'k06', '0.20', '2025-12-11 01:23:54', '2025-12-11 01:23:54'),
(29, 'G04', 'k06', '0.10', '2025-12-11 01:24:43', '2025-12-11 01:24:43'),
(30, 'G11', 'K02', '0.50', '2025-12-11 01:30:40', '2025-12-11 01:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `hasil_diagnosa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solusi_diagnosa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_solusi` int NOT NULL,
  `tanggal_diagnosa` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `user_id`, `hasil_diagnosa`, `solusi_diagnosa`, `jumlah_solusi`, `tanggal_diagnosa`, `created_at`, `updated_at`) VALUES
(1, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":45},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":40},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":0},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-11-19 13:49:56', '2025-11-19 06:49:56', '2025-11-19 06:49:56'),
(2, 1, '[{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":73.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":70},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":65},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":61.25},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":15},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S18\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Bersihkan kipas dan heatsink dari debu.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S19\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti pasta thermal CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S20\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Pastikan airflow casing baik.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S21\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Cek RPM kipas CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S22\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti cooler jika tetap overheat.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 08:21:51', '2025-12-11 01:21:51', '2025-12-11 01:21:51'),
(3, 1, '[{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":67.5},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":60},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":45.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":30},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":12.13},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0}]', '[{\"kode_solusi\":\"S18\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Bersihkan kipas dan heatsink dari debu.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S19\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti pasta thermal CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S20\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Pastikan airflow casing baik.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S21\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Cek RPM kipas CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S22\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti cooler jika tetap overheat.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 08:38:11', '2025-12-11 01:38:11', '2025-12-11 01:38:11'),
(4, 1, '[{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":89},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":81.25},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":37.5},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":0},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S14\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Jalankan CHKDSK untuk memperbaiki bad sector ringan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S15\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Segera backup data penting.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S16\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Gunakan CrystalDiskInfo untuk cek kesehatan HDD.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S17\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Ganti harddisk jika muncul bunyi tidak normal.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-11 10:10:20', '2025-12-11 03:10:20', '2025-12-11 03:10:20'),
(5, 1, '[{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":77.5},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":70},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":70},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":50},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":30},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S18\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Bersihkan kipas dan heatsink dari debu.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S19\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti pasta thermal CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S20\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Pastikan airflow casing baik.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S21\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Cek RPM kipas CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S22\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti cooler jika tetap overheat.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 10:11:27', '2025-12-11 03:11:27', '2025-12-11 03:11:27'),
(6, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":93.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":52.5},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":52.5},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":45},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":20},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 10:12:36', '2025-12-11 03:12:36', '2025-12-11 03:12:36'),
(7, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":93.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":52.5},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":52.5},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":45},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":20},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 10:12:36', '2025-12-11 03:12:36', '2025-12-11 03:12:36'),
(8, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":80},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":10},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":0},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":0}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-11 10:44:03', '2025-12-11 03:44:03', '2025-12-11 03:44:03'),
(9, 1, '[{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":52.5},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":52.5},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":45},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":37.5},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S01\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Periksa kabel power dan pastikan terhubung dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S02\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Gunakan PSU tester untuk mengecek kestabilan voltase.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S03\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Bersihkan debu pada PSU dan port kabel.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S04\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Ganti PSU jika tegangan drop atau tidak stabil.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-11 10:46:07', '2025-12-11 03:46:07', '2025-12-11 03:46:07'),
(10, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":58.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":35},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":35},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":30},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":10},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 10:46:57', '2025-12-11 03:46:57', '2025-12-11 03:46:57'),
(11, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":55},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":45},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":30},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":25},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":14.5},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-11 11:04:30', '2025-12-11 04:04:30', '2025-12-11 04:04:30'),
(12, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":67.5},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":20},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":17.13},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 11:06:25', '2025-12-11 04:06:25', '2025-12-11 04:06:25'),
(13, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":75.63},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":58},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":35},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":35},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":19.25},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 11:06:53', '2025-12-11 04:06:53', '2025-12-11 04:06:53'),
(14, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":74},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":45},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":20},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":15},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":0},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-11 12:16:05', '2025-12-11 05:16:05', '2025-12-11 05:16:05'),
(15, 1, '[{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":64.25},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":51.25},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":47.5},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":30},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":25},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S01\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Periksa kabel power dan pastikan terhubung dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S02\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Gunakan PSU tester untuk mengecek kestabilan voltase.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S03\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Bersihkan debu pada PSU dan port kabel.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S04\",\"kode_kerusakan\":\"K01\",\"deskripsi_solusi\":\"Ganti PSU jika tegangan drop atau tidak stabil.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-11 12:19:23', '2025-12-11 05:19:23', '2025-12-11 05:19:23'),
(16, 1, '[{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":61.5},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":51.25},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":47.5},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":35},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":25},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S14\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Jalankan CHKDSK untuk memperbaiki bad sector ringan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S15\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Segera backup data penting.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S16\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Gunakan CrystalDiskInfo untuk cek kesehatan HDD.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S17\",\"kode_kerusakan\":\"K04\",\"deskripsi_solusi\":\"Ganti harddisk jika muncul bunyi tidak normal.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-11 12:20:06', '2025-12-11 05:20:06', '2025-12-11 05:20:06'),
(17, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":64.25},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":63.19},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":57.25},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":43.75},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":40},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-15 10:27:29', '2025-12-15 03:27:29', '2025-12-15 03:27:29'),
(18, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":89.8},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":80},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":17.5},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":17.5},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":12.5},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":7.5}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-15 10:33:34', '2025-12-15 03:33:34', '2025-12-15 03:33:34'),
(19, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":88},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":80},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":22.5},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":7.5},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":0},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":0}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-15 10:44:20', '2025-12-15 03:44:20', '2025-12-15 03:44:20'),
(20, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":88},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":80},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":22.5},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":7.5},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":0},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":0}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-15 10:44:30', '2025-12-15 03:44:30', '2025-12-15 03:44:30'),
(21, 1, '[{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":64.38},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":58.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":52.5},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":37.5},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":30},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S18\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Bersihkan kipas dan heatsink dari debu.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S19\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti pasta thermal CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S20\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Pastikan airflow casing baik.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S21\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Cek RPM kipas CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S22\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti cooler jika tetap overheat.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-15 10:45:56', '2025-12-15 03:45:56', '2025-12-15 03:45:56'),
(22, 1, '[{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":64.38},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":58.75},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":52.5},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":37.5},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":30},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":0}]', '[{\"kode_solusi\":\"S18\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Bersihkan kipas dan heatsink dari debu.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S19\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti pasta thermal CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S20\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Pastikan airflow casing baik.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S21\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Cek RPM kipas CPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S22\",\"kode_kerusakan\":\"K05\",\"deskripsi_solusi\":\"Ganti cooler jika tetap overheat.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-15 10:45:56', '2025-12-15 03:45:56', '2025-12-15 03:45:56'),
(23, 1, '[{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":55},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":30},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":25},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":5},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0},{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":0}]', '[{\"kode_solusi\":\"S05\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Lepas RAM lalu bersihkan pin menggunakan penghapus karet.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S06\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Pindahkan RAM ke slot lain untuk pengecekan.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S07\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Jalankan MemTest86 untuk mendeteksi error RAM.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S08\",\"kode_kerusakan\":\"K02\",\"deskripsi_solusi\":\"Ganti modul RAM jika tetap error.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 4, '2025-12-15 10:47:06', '2025-12-15 03:47:06', '2025-12-15 03:47:06'),
(24, 1, '[{\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"kode\":\"K03\",\"nilai\":45},{\"kerusakan\":\"test\",\"kode\":\"k06\",\"nilai\":10},{\"kerusakan\":\"Power Supply Rusak\",\"kode\":\"K01\",\"nilai\":0},{\"kerusakan\":\"RAM Bermasalah\",\"kode\":\"K02\",\"nilai\":0},{\"kerusakan\":\"Harddisk Rusak\",\"kode\":\"K04\",\"nilai\":0},{\"kerusakan\":\"CPU Overheat\",\"kode\":\"K05\",\"nilai\":0}]', '[{\"kode_solusi\":\"S09\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Pastikan kabel HDMI\\/DP terpasang dengan benar.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S10\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Bersihkan slot PCIe dan konektor GPU.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S11\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Update driver GPU ke versi terbaru.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S12\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Test GPU pada komputer lain.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"},{\"kode_solusi\":\"S13\",\"kode_kerusakan\":\"K03\",\"deskripsi_solusi\":\"Ganti GPU jika tidak terdeteksi.\",\"created_at\":\"2025-11-19T06:14:12.000000Z\",\"updated_at\":\"2025-11-19T06:14:12.000000Z\"}]', 5, '2025-12-15 10:48:11', '2025-12-15 03:48:11', '2025-12-15 03:48:11'),
(25, 1, '[{\"kode\":\"K02\",\"kerusakan\":\"RAM Bermasalah\",\"nilai\":58},{\"kode\":\"K01\",\"kerusakan\":\"Power Supply Rusak\",\"nilai\":35},{\"kode\":\"K05\",\"kerusakan\":\"CPU Overheat\",\"nilai\":35},{\"kode\":\"K03\",\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"nilai\":25},{\"kode\":\"k06\",\"kerusakan\":\"test\",\"nilai\":5},{\"kode\":\"K04\",\"kerusakan\":\"Harddisk Rusak\",\"nilai\":0}]', '[]', 0, '2025-12-15 10:52:10', '2025-12-15 03:52:10', '2025-12-15 03:52:10'),
(26, 1, '[{\"kode\":\"K05\",\"kerusakan\":\"CPU Overheat\",\"nilai\":51.25},{\"kode\":\"K02\",\"kerusakan\":\"RAM Bermasalah\",\"nilai\":47.5},{\"kode\":\"K01\",\"kerusakan\":\"Power Supply Rusak\",\"nilai\":35},{\"kode\":\"K04\",\"kerusakan\":\"Harddisk Rusak\",\"nilai\":30},{\"kode\":\"K03\",\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"nilai\":25},{\"kode\":\"k06\",\"kerusakan\":\"test\",\"nilai\":0}]', '[]', 0, '2025-12-15 11:36:46', '2025-12-15 04:36:46', '2025-12-15 04:36:46'),
(27, 1, '[{\"kode\":\"K02\",\"kerusakan\":\"RAM Bermasalah\",\"nilai\":25},{\"kode\":\"K01\",\"kerusakan\":\"Power Supply Rusak\",\"nilai\":0},{\"kode\":\"K03\",\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"nilai\":0},{\"kode\":\"K04\",\"kerusakan\":\"Harddisk Rusak\",\"nilai\":0},{\"kode\":\"K05\",\"kerusakan\":\"CPU Overheat\",\"nilai\":0},{\"kode\":\"k06\",\"kerusakan\":\"test\",\"nilai\":0}]', '[]', 0, '2025-12-15 14:40:37', '2025-12-15 07:40:37', '2025-12-15 07:40:37'),
(28, 1, '[{\"kode\":\"K02\",\"kerusakan\":\"RAM Bermasalah\",\"nilai\":50},{\"kode\":\"K01\",\"kerusakan\":\"Power Supply Rusak\",\"nilai\":0},{\"kode\":\"K03\",\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"nilai\":0},{\"kode\":\"K04\",\"kerusakan\":\"Harddisk Rusak\",\"nilai\":0},{\"kode\":\"K05\",\"kerusakan\":\"CPU Overheat\",\"nilai\":0},{\"kode\":\"k06\",\"kerusakan\":\"test\",\"nilai\":0}]', '[]', 0, '2025-12-15 14:40:56', '2025-12-15 07:40:56', '2025-12-15 07:40:56'),
(29, 1, '[{\"kode\":\"K03\",\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"nilai\":45},{\"kode\":\"K02\",\"kerusakan\":\"RAM Bermasalah\",\"nilai\":40},{\"kode\":\"k06\",\"kerusakan\":\"test\",\"nilai\":14.5},{\"kode\":\"K01\",\"kerusakan\":\"Power Supply Rusak\",\"nilai\":0},{\"kode\":\"K04\",\"kerusakan\":\"Harddisk Rusak\",\"nilai\":0},{\"kode\":\"K05\",\"kerusakan\":\"CPU Overheat\",\"nilai\":0}]', '[]', 0, '2025-12-15 14:42:32', '2025-12-15 07:42:32', '2025-12-15 07:42:32'),
(30, 1, '[{\"kode\":\"K03\",\"kerusakan\":\"VGA \\/ GPU Bermasalah\",\"nilai\":90},{\"kode\":\"K02\",\"kerusakan\":\"RAM Bermasalah\",\"nilai\":80},{\"kode\":\"k06\",\"kerusakan\":\"test\",\"nilai\":28},{\"kode\":\"K01\",\"kerusakan\":\"Power Supply Rusak\",\"nilai\":0},{\"kode\":\"K04\",\"kerusakan\":\"Harddisk Rusak\",\"nilai\":0},{\"kode\":\"K05\",\"kerusakan\":\"CPU Overheat\",\"nilai\":0}]', '[]', 0, '2025-12-15 14:42:45', '2025-12-15 07:42:45', '2025-12-15 07:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cLLON6MHrgnPdOnycwIlRKrijeQOExrIa6kloY5y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1docVhvd0FScExqN3gzU3NiYWkzS1BoUFVHNGpRY1NKbXd2Z1V0QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1765783798),
('gPPk30VOIjONr1YaGC4igiAqKgx95ExMmO1HrRXS', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiclVINEk3TEh0UE5uR29WMXZHR1hPaDVkSXlVNjVaMUZHRXlhSU1RdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kaWFnbm9zaXMvcmVzdWx0LzMwL3BkZiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1765789306);

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE `solusi` (
  `kode_solusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_solusi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`kode_solusi`, `kode_kerusakan`, `deskripsi_solusi`, `created_at`, `updated_at`) VALUES
('S01', 'K01', 'Periksa kabel power dan pastikan terhubung dengan benar.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S02', 'K01', 'Gunakan PSU tester untuk mengecek kestabilan voltase.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S03', 'K01', 'Bersihkan debu pada PSU dan port kabel.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S04', 'K01', 'Ganti PSU jika tegangan drop atau tidak stabil.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S05', 'K02', 'Lepas RAM lalu bersihkan pin menggunakan penghapus karet.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S06', 'K02', 'Pindahkan RAM ke slot lain untuk pengecekan.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S07', 'K02', 'Jalankan MemTest86 untuk mendeteksi error RAM.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S08', 'K02', 'Ganti modul RAM jika tetap error.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S09', 'K03', 'Pastikan kabel HDMI/DP terpasang dengan benar.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S10', 'K03', 'Bersihkan slot PCIe dan konektor GPU.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S11', 'K03', 'Update driver GPU ke versi terbaru.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S12', 'K03', 'Test GPU pada komputer lain.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S13', 'K03', 'Ganti GPU jika tidak terdeteksi.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S14', 'K04', 'Jalankan CHKDSK untuk memperbaiki bad sector ringan.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S15', 'K04', 'Segera backup data penting.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S16', 'K04', 'Gunakan CrystalDiskInfo untuk cek kesehatan HDD.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S17', 'K04', 'Ganti harddisk jika muncul bunyi tidak normal.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S18', 'K05', 'Bersihkan kipas dan heatsink dari debu.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S19', 'K05', 'Ganti pasta thermal CPU.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S20', 'K05', 'Pastikan airflow casing baik.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S21', 'K05', 'Cek RPM kipas CPU.', '2025-11-19 06:14:12', '2025-11-19 06:14:12'),
('S22', 'K05', 'Ganti cooler jika tetap overheat.', '2025-11-19 06:14:12', '2025-11-19 06:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `isi_testimoni` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('tampil','arsip') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'arsip',
  `tanggal_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `user_id`, `isi_testimoni`, `status`, `tanggal_input`, `created_at`, `updated_at`) VALUES
(1, 1, 'lorem ipsum tsuyaa biatta apa ajaa', 'tampil', '2025-11-18 19:20:34', '2025-08-10 09:49:18', '2025-11-18 12:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status_aktif` tinyint(1) NOT NULL DEFAULT '1',
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status_aktif`, `pekerjaan`, `foto_profil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ghozi Agam', 'ghozi@gmail.com', NULL, '$2y$12$3o.cJlKnW6lHKJanIDlZ7unP9SloKbq9jbBqupTBdSS/eqMZzwLny', 'user', 1, 'Mahasiswa', 'user-profile/1754819259_foto.jpeg', NULL, '2025-08-10 09:46:47', '2025-11-18 12:22:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`kode_kerusakan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proses_kode_gejala_kode_kerusakan_unique` (`kode_gejala`,`kode_kerusakan`),
  ADD KEY `proses_kode_kerusakan_foreign` (`kode_kerusakan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
  ADD PRIMARY KEY (`kode_solusi`),
  ADD KEY `solusi_kode_kerusakan_foreign` (`kode_kerusakan`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimoni_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_kode_gejala_foreign` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`) ON DELETE CASCADE,
  ADD CONSTRAINT `proses_kode_kerusakan_foreign` FOREIGN KEY (`kode_kerusakan`) REFERENCES `kerusakan` (`kode_kerusakan`) ON DELETE CASCADE;

--
-- Constraints for table `solusi`
--
ALTER TABLE `solusi`
  ADD CONSTRAINT `solusi_kode_kerusakan_foreign` FOREIGN KEY (`kode_kerusakan`) REFERENCES `kerusakan` (`kode_kerusakan`) ON DELETE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
