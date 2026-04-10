-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2024 at 07:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoringkbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `kode_mapel`, `created_at`, `updated_at`) VALUES
(1, 'pendidikan jasmani, olahraga, dan kesehatan', 'PJOK', '2024-08-11 18:41:37', '2024-08-11 18:41:37'),
(2, 'dasar dasar program keahlian', 'DDPK', '2024-08-11 18:43:34', '2024-08-11 18:43:34'),
(3, 'Bahasa Indonesia', 'BINDO', '2024-08-11 18:44:03', '2024-08-11 18:44:03'),
(4, 'Matematika', 'mtk', '2024-08-11 18:46:07', '2024-08-11 18:46:07'),
(5, 'Seni Budaya', 'senbud', '2024-08-11 18:46:35', '2024-08-11 18:46:35'),
(6, 'Bahasa Inggris', 'bing', '2024-08-11 18:46:50', '2024-08-11 18:46:50'),
(7, 'proyek ilmu pengatahuan alam dan sosial', 'proyek ipas', '2024-08-11 18:48:19', '2024-08-11 18:48:19'),
(8, 'informatika', 'infromatika', '2024-08-11 18:48:49', '2024-08-11 18:48:49'),
(9, 'Pendidikan Kewarganegaraan', 'pkn', '2024-08-11 18:49:20', '2024-08-11 18:49:20'),
(10, 'sejarah', 'keminangkabauan', '2024-08-11 18:49:33', '2024-08-11 18:49:33'),
(11, 'Pendidikan Agama islam dan Budi Pekerti', 'pai&bp', '2024-08-11 18:55:05', '2024-08-11 18:55:05'),
(12, 'dasar rpl', 'dasar rpl', '2024-08-11 18:56:02', '2024-08-11 18:56:02'),
(13, 'dasar tkjt', 'dasarTkjT', '2024-08-11 18:56:57', '2024-08-11 18:56:57'),
(14, 'kosentrasi keahlian', 'kosentrasi keahlian', '2024-08-11 18:59:21', '2024-08-11 18:59:21'),
(15, 'pembelajaran produk kreatif dan kewirausahaan', 'pkk', '2024-08-11 19:00:58', '2024-08-11 19:00:58'),
(16, 'troubleshooting', 'troubleshooting', '2024-08-11 19:01:20', '2024-08-11 19:01:20'),
(17, 'mapel pilihan', 'mapel pilihan', '2024-08-11 19:01:40', '2024-08-11 19:01:40'),
(18, 'cctv & troubleshooting pc', 'ctp', '2024-08-11 19:02:21', '2024-08-11 19:02:21'),
(19, 'pengembangan perangkat lunak', 'ppl', '2024-08-11 19:03:02', '2024-08-11 19:03:02'),
(20, 'Instalasi Tenaga Listrik', 'itl', '2024-08-11 19:04:30', '2024-08-11 19:04:30'),
(21, 'instalasi motor listrik', 'iml', '2024-08-11 19:05:25', '2024-08-11 19:05:25'),
(22, 'bahasa jepang', 'bjepang', '2024-08-11 19:05:41', '2024-08-11 19:05:41'),
(23, 'bimbingan konseling', 'bk', '2024-08-11 19:05:58', '2024-08-11 19:05:58'),
(24, 'sistem pengendali elektronik', 'spe', '2024-08-11 19:07:16', '2024-08-11 19:07:16'),
(25, 'pengendali sistem robotik', 'psr', '2024-08-11 19:08:07', '2024-08-11 19:08:07'),
(26, 'Perakitan Perbaikan Perawatan Peralatan Elektronika', 'p4e', '2024-08-11 19:08:34', '2024-08-11 19:08:34'),
(27, 'administrasi sistem jaringan', 'asj', '2024-08-11 19:09:10', '2024-08-11 19:09:10'),
(28, 'Administrasi Infrastruktur Jaringan', 'aij', '2024-08-11 19:11:31', '2024-08-11 19:11:31'),
(29, 'teknik layanan jaringan', 'tlj', '2024-08-11 19:11:54', '2024-08-11 19:11:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mapel_nama_mapel_unique` (`nama_mapel`),
  ADD UNIQUE KEY `mapel_kode_mapel_unique` (`kode_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
