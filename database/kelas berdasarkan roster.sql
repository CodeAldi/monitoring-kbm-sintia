-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2024 at 07:29 PM
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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `tingkat_kelas` int NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `jurusan_id`, `tingkat_kelas`, `nama_kelas`, `kode_kelas`, `created_at`, `updated_at`) VALUES
(1, 5, 10, 'X TMK A', '100101', '2024-08-11 19:19:18', '2024-08-11 19:19:18'),
(2, 5, 10, 'X TMK B', '100102', '2024-08-11 19:19:40', '2024-08-11 19:19:40'),
(3, 4, 10, 'X TEI', '100201', '2024-08-11 19:20:21', '2024-08-11 19:20:21'),
(4, 2, 10, 'X RPL', '100301', '2024-08-11 19:21:43', '2024-08-11 19:21:43'),
(5, 1, 10, 'X TKJ A', '100401', '2024-08-11 19:22:06', '2024-08-11 19:22:06'),
(6, 1, 10, 'X TKJ B', '100402', '2024-08-11 19:22:25', '2024-08-11 19:22:25'),
(7, 3, 11, 'XI TITL', '110101', '2024-08-11 19:23:21', '2024-08-11 19:23:21'),
(8, 4, 11, 'XI TEI', '110201', '2024-08-11 19:24:29', '2024-08-11 19:24:43'),
(9, 1, 11, 'XI TKJ', '110301', '2024-08-11 19:25:30', '2024-08-11 19:25:30'),
(10, 3, 12, 'XII TITL A', '120101', '2024-08-11 19:26:00', '2024-08-11 19:26:53'),
(11, 3, 12, 'XII TITL B', '120102', '2024-08-11 19:26:19', '2024-08-11 19:27:11'),
(12, 4, 12, 'XII TEI', '120201', '2024-08-11 19:28:07', '2024-08-11 19:28:07'),
(13, 1, 12, 'XII TKJ A', '120301', '2024-08-11 19:28:27', '2024-08-11 19:28:27'),
(14, 1, 12, 'XII TKJ B', '120302', '2024-08-11 19:28:52', '2024-08-11 19:28:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
