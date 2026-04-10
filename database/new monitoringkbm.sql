-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2024 at 01:12 AM
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
-- Table structure for table `event_jadwal_mengajar`
--

CREATE TABLE `event_jadwal_mengajar` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_jadwal_mengajar`
--

INSERT INTO `event_jadwal_mengajar` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`) VALUES
(55, 'Matematika', '2024-07-12 08:00:00', '2024-07-12 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(56, 'Matematika', '2024-07-19 08:00:00', '2024-07-19 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(57, 'Matematika', '2024-07-26 08:00:00', '2024-07-26 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(58, 'Matematika', '2024-08-02 08:00:00', '2024-08-02 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(59, 'Matematika', '2024-08-09 08:00:00', '2024-08-09 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(60, 'Matematika', '2024-08-16 08:00:00', '2024-08-16 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(61, 'Matematika', '2024-08-23 08:00:00', '2024-08-23 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(62, 'Matematika', '2024-08-30 08:00:00', '2024-08-30 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(63, 'Matematika', '2024-09-06 08:00:00', '2024-09-06 10:00:00', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(64, 'Matematika', '2024-07-12 10:30:00', '2024-07-12 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(65, 'Matematika', '2024-07-19 10:30:00', '2024-07-19 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(66, 'Matematika', '2024-07-26 10:30:00', '2024-07-26 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(67, 'Matematika', '2024-08-02 10:30:00', '2024-08-02 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(68, 'Matematika', '2024-08-09 10:30:00', '2024-08-09 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(69, 'Matematika', '2024-08-16 10:30:00', '2024-08-16 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(70, 'Matematika', '2024-08-23 10:30:00', '2024-08-23 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(71, 'Matematika', '2024-08-30 10:30:00', '2024-08-30 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(72, 'Matematika', '2024-09-06 10:30:00', '2024-09-06 12:00:00', '2024-07-12 00:17:05', '2024-07-12 00:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `event_jadwal_piket_guru`
--

CREATE TABLE `event_jadwal_piket_guru` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_jadwal_piket_guru`
--

INSERT INTO `event_jadwal_piket_guru` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`) VALUES
(8, 'guru 1', '2024-07-07 00:00:00', '2024-07-07 00:00:00', '2024-07-07 16:36:59', '2024-07-07 16:36:59'),
(9, 'guru 1', '2024-07-14 00:00:00', '2024-07-14 00:00:00', '2024-07-07 16:36:59', '2024-07-07 16:36:59'),
(10, 'guru 1', '2024-07-21 00:00:00', '2024-07-21 00:00:00', '2024-07-07 16:36:59', '2024-07-07 16:36:59'),
(11, 'guru 1', '2024-07-28 00:00:00', '2024-07-28 00:00:00', '2024-07-07 16:36:59', '2024-07-07 16:36:59'),
(12, 'guru 1', '2024-08-04 00:00:00', '2024-08-04 00:00:00', '2024-07-07 16:36:59', '2024-07-07 16:36:59'),
(13, 'guru 1', '2024-06-30 00:00:00', '2024-06-30 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(14, 'guru 1', '2024-07-07 00:00:00', '2024-07-07 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(15, 'guru 1', '2024-07-14 00:00:00', '2024-07-14 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(16, 'guru 1', '2024-07-21 00:00:00', '2024-07-21 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(17, 'guru 1', '2024-07-28 00:00:00', '2024-07-28 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(18, 'guru 1', '2024-08-04 00:00:00', '2024-08-04 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(19, 'guru 1', '2024-08-11 00:00:00', '2024-08-11 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(20, 'guru 1', '2024-08-18 00:00:00', '2024-08-18 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(21, 'guru 1', '2024-08-25 00:00:00', '2024-08-25 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(22, 'guru 1', '2024-09-01 00:00:00', '2024-09-01 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(23, 'guru 1', '2024-09-08 00:00:00', '2024-09-08 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(24, 'guru 1', '2024-09-15 00:00:00', '2024-09-15 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:13'),
(25, 'guru 1', '2024-09-22 00:00:00', '2024-09-22 00:00:00', '2024-07-07 16:38:13', '2024-07-07 16:38:14'),
(26, 'guru 1', '2024-09-29 00:00:00', '2024-09-29 00:00:00', '2024-07-07 16:38:14', '2024-07-07 16:38:14'),
(27, 'guru 1', '2024-10-06 00:00:00', '2024-10-06 00:00:00', '2024-07-07 16:38:14', '2024-07-07 16:38:14'),
(28, 'guru 1', '2024-10-13 00:00:00', '2024-10-13 00:00:00', '2024-07-07 16:38:14', '2024-07-07 16:38:14'),
(29, 'guru 1', '2024-10-20 00:00:00', '2024-10-20 00:00:00', '2024-07-07 16:38:14', '2024-07-07 16:38:14'),
(30, 'guru 1', '2024-10-27 00:00:00', '2024-10-27 00:00:00', '2024-07-07 16:38:14', '2024-07-07 16:38:14'),
(31, 'guru 1', '2024-07-08 00:00:00', '2024-07-08 00:00:00', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(32, 'guru 1', '2024-07-15 00:00:00', '2024-07-15 00:00:00', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(33, 'guru 1', '2024-07-22 00:00:00', '2024-07-22 00:00:00', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(34, 'guru 1', '2024-07-29 00:00:00', '2024-07-29 00:00:00', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(35, 'guru 1', '2024-08-05 00:00:00', '2024-08-05 00:00:00', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(36, 'guru 2', '2024-07-09 00:00:00', '2024-07-09 00:00:00', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(37, 'guru 2', '2024-07-16 00:00:00', '2024-07-16 00:00:00', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(38, 'guru 2', '2024-07-23 00:00:00', '2024-07-23 00:00:00', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(39, 'guru 2', '2024-07-30 00:00:00', '2024-07-30 00:00:00', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(40, 'guru 2', '2024-08-06 00:00:00', '2024-08-06 00:00:00', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(41, 'guru 3', '2024-07-08 00:00:00', '2024-07-08 00:00:00', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(42, 'guru 3', '2024-07-15 00:00:00', '2024-07-15 00:00:00', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(43, 'guru 3', '2024-07-22 00:00:00', '2024-07-22 00:00:00', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(44, 'guru 3', '2024-07-29 00:00:00', '2024-07-29 00:00:00', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(45, 'guru 3', '2024-08-05 00:00:00', '2024-08-05 00:00:00', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(46, 'guru 4', '2024-07-09 00:00:00', '2024-07-09 00:00:00', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(47, 'guru 4', '2024-07-16 00:00:00', '2024-07-16 00:00:00', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(48, 'guru 4', '2024-07-23 00:00:00', '2024-07-23 00:00:00', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(49, 'guru 4', '2024-07-30 00:00:00', '2024-07-30 00:00:00', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(50, 'guru 4', '2024-08-06 00:00:00', '2024-08-06 00:00:00', '2024-07-07 16:39:59', '2024-07-07 16:39:59');

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
-- Table structure for table `guru_mapel`
--

CREATE TABLE `guru_mapel` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_mapel`
--

INSERT INTO `guru_mapel` (`id`, `users_id`, `mapel_id`, `kelas_id`, `semester`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, NULL, NULL, '2024-04-15 07:49:16', '2024-04-15 07:49:16'),
(2, 3, 1, 2, NULL, NULL, '2024-04-15 07:49:23', '2024-04-15 07:49:23'),
(3, 4, 2, 1, NULL, NULL, '2024-04-15 07:49:31', '2024-04-15 07:49:31'),
(4, 4, 2, 2, NULL, NULL, '2024-04-15 07:49:38', '2024-04-15 07:49:38'),
(5, 5, 3, 1, NULL, NULL, '2024-04-15 07:49:45', '2024-04-15 07:49:45'),
(6, 5, 3, 2, NULL, NULL, '2024-04-15 07:49:53', '2024-04-15 07:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mengajar`
--

CREATE TABLE `jadwal_mengajar` (
  `id` bigint UNSIGNED NOT NULL,
  `guru_mapel_id` bigint UNSIGNED NOT NULL,
  `event_jadwal_mengajar_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_mengajar`
--

INSERT INTO `jadwal_mengajar` (`id`, `guru_mapel_id`, `event_jadwal_mengajar_id`, `kelas_id`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(55, 5, 55, 1, '2024-07-12', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(56, 5, 56, 1, '2024-07-19', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(57, 5, 57, 1, '2024-07-26', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(58, 5, 58, 1, '2024-08-02', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(59, 5, 59, 1, '2024-08-09', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(60, 5, 60, 1, '2024-08-16', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(61, 5, 61, 1, '2024-08-23', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(62, 5, 62, 1, '2024-08-30', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(63, 5, 63, 1, '2024-09-06', '2024-09-07', '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(64, 6, 64, 2, '2024-07-12', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(65, 6, 65, 2, '2024-07-19', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(66, 6, 66, 2, '2024-07-26', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(67, 6, 67, 2, '2024-08-02', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(68, 6, 68, 2, '2024-08-09', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(69, 6, 69, 2, '2024-08-16', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(70, 6, 70, 2, '2024-08-23', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(71, 6, 71, 2, '2024-08-30', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(72, 6, 72, 2, '2024-09-06', '2024-09-07', '2024-07-12 00:17:05', '2024-07-12 00:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_piket_guru`
--

CREATE TABLE `jadwal_piket_guru` (
  `id` bigint UNSIGNED NOT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `event_jadwal_piket_guru_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_piket_guru`
--

INSERT INTO `jadwal_piket_guru` (`id`, `users_id`, `event_jadwal_piket_guru_id`, `tanggal_mulai`, `tanggal_selesai`, `created_at`, `updated_at`) VALUES
(31, 3, 31, '2024-07-08', '2024-08-10', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(32, 3, 32, '2024-07-08', '2024-08-10', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(33, 3, 33, '2024-07-08', '2024-08-10', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(34, 3, 34, '2024-07-08', '2024-08-10', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(35, 3, 35, '2024-07-08', '2024-08-10', '2024-07-07 16:39:03', '2024-07-07 16:39:03'),
(36, 4, 36, '2024-07-09', '2024-08-10', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(37, 4, 37, '2024-07-09', '2024-08-10', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(38, 4, 38, '2024-07-09', '2024-08-10', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(39, 4, 39, '2024-07-09', '2024-08-10', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(40, 4, 40, '2024-07-09', '2024-08-10', '2024-07-07 16:39:15', '2024-07-07 16:39:15'),
(41, 5, 41, '2024-07-08', '2024-08-10', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(42, 5, 42, '2024-07-08', '2024-08-10', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(43, 5, 43, '2024-07-08', '2024-08-10', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(44, 5, 44, '2024-07-08', '2024-08-10', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(45, 5, 45, '2024-07-08', '2024-08-10', '2024-07-07 16:39:31', '2024-07-07 16:39:31'),
(46, 6, 46, '2024-07-09', '2024-08-10', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(47, 6, 47, '2024-07-09', '2024-08-10', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(48, 6, 48, '2024-07-09', '2024-08-10', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(49, 6, 49, '2024-07-09', '2024-08-10', '2024-07-07 16:39:59', '2024-07-07 16:39:59'),
(50, 6, 50, '2024-07-09', '2024-08-10', '2024-07-07 16:39:59', '2024-07-07 16:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `kode_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'teknik komputer jaringan', 'TKJ', '2024-04-15 07:46:20', '2024-04-15 07:46:20'),
(2, 'rekayasa perangkat lunak', 'RPL', '2024-04-15 07:46:27', '2024-04-15 07:46:27'),
(3, 'teknik kendaraan ringan', 'TKR', '2024-04-15 07:46:35', '2024-04-15 07:46:35');

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
(1, 1, 10, 'X TKJ 1', '111', '2024-04-15 07:46:49', '2024-04-15 07:46:49'),
(2, 1, 10, 'X TKJ 2', '112', '2024-04-15 07:47:11', '2024-04-15 07:47:11'),
(3, 2, 10, 'X RPL 1', '211', '2024-05-19 18:44:51', '2024-05-19 18:44:51'),
(4, 2, 11, 'XI RPL 1', '321', '2024-05-19 18:45:46', '2024-05-19 18:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `lapor_proses_kbm`
--

CREATE TABLE `lapor_proses_kbm` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal_mengajar_id` bigint UNSIGNED NOT NULL,
  `pembukaan` tinyint(1) NOT NULL DEFAULT '0',
  `isi` tinyint(1) NOT NULL DEFAULT '0',
  `penutup` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lapor_proses_kbm`
--

INSERT INTO `lapor_proses_kbm` (`id`, `jadwal_mengajar_id`, `pembukaan`, `isi`, `penutup`, `created_at`, `updated_at`) VALUES
(1, 55, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(2, 56, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(3, 57, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(4, 58, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(5, 59, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(6, 60, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(7, 61, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(8, 62, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(9, 63, 0, 0, 0, '2024-07-12 00:14:11', '2024-07-12 00:14:11'),
(10, 64, 1, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(11, 65, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(12, 66, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(13, 67, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(14, 68, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(15, 69, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(16, 70, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(17, 71, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05'),
(18, 72, 0, 0, 0, '2024-07-12 00:17:05', '2024-07-12 00:17:05');

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
(1, 'Bahasa Indonesia', 'Bindo', '2024-04-15 07:46:00', '2024-04-15 07:46:00'),
(2, 'Ilmu Pengetahuan Alam', 'IPA', '2024-04-15 07:46:06', '2024-04-15 07:46:06'),
(3, 'Matematika', 'MTK', '2024-04-15 07:46:11', '2024-04-15 07:46:11');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_09_133845_create_mapels_table', 1),
(6, '2024_01_09_144422_create_jurusans_table', 1),
(7, '2024_01_09_145027_create_kelas_table', 1),
(8, '2024_01_18_172049_create_guru_mapels_table', 1),
(9, '2024_01_23_051940_create_jadwal_mengajars_table', 1),
(10, '2024_02_04_043648_create_event_jadwal_mengajars_table', 1),
(11, '2024_02_08_085230_create_event_jadwal_piket_gurus_table', 1),
(12, '2024_02_08_085253_create_jadwal_piket_gurus_table', 1),
(14, '2024_02_13_225037_create_rpps_table', 2),
(15, '2024_05_28_034650_create_rpp_items_table', 3),
(16, '2024_05_28_035553_create_siswa_table', 4),
(17, '2024_05_28_040252_create_rombongan_belajar_table', 5),
(18, '2024_05_28_040419_create_pembagian_rombongan_belajar_table', 6),
(20, '2024_07_10_063712_create_lapor_proses_kbms_table', 7);

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
-- Table structure for table `pembagian_rombongan_belajar`
--

CREATE TABLE `pembagian_rombongan_belajar` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `rombongan_belajar_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rombongan_belajar`
--

CREATE TABLE `rombongan_belajar` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_group_rombongan_belajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rpp`
--

CREATE TABLE `rpp` (
  `id` bigint UNSIGNED NOT NULL,
  `guru_mapel_id` bigint UNSIGNED NOT NULL,
  `jumlah_pertemuan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rpp`
--

INSERT INTO `rpp` (`id`, `guru_mapel_id`, `jumlah_pertemuan`, `created_at`, `updated_at`) VALUES
(11, 1, 1, '2024-07-09 21:57:11', '2024-07-09 21:57:11'),
(12, 5, 1, '2024-07-11 08:12:03', '2024-07-11 08:12:03'),
(13, 3, 1, '2024-07-11 20:23:46', '2024-07-11 20:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `rpp_items`
--

CREATE TABLE `rpp_items` (
  `id` bigint UNSIGNED NOT NULL,
  `rpp_id` bigint UNSIGNED NOT NULL,
  `pertemuan` int NOT NULL,
  `kompetensi_dasar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_pembelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `langkah_pembelajaran_isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assesmen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rpp_items`
--

INSERT INTO `rpp_items` (`id`, `rpp_id`, `pertemuan`, `kompetensi_dasar`, `tujuan_pembelajaran`, `langkah_pembelajaran_isi`, `assesmen`, `created_at`, `updated_at`) VALUES
(17, 11, 1, '1', '1', '1', '1', '2024-07-09 21:57:11', '2024-07-09 21:57:11'),
(18, 11, 1, '2', '3', '2', '2', '2024-07-09 23:04:51', '2024-07-09 23:04:51'),
(19, 12, 1, 'a', 'a', 'a', 'a', '2024-07-11 08:12:03', '2024-07-11 08:12:03'),
(20, 12, 1, 'b', 'b', 'b', 'b', '2024-07-11 08:12:14', '2024-07-11 08:12:14'),
(21, 12, 1, 'c', 'c', 'c', 'c', '2024-07-11 08:12:21', '2024-07-11 08:12:21'),
(22, 13, 1, '3.10 abc\r\n4.10 abc', '1. a\r\n2. b\r\n3. c', 'qwer', 'qwer', '2024-07-11 20:23:46', '2024-07-11 20:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','wakil kurikulum','guru mapel','guru piket','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nomor_induk`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test admin', '001', 'admin@example.com', '$2y$12$7mwhu6e8Dv0uatGVuWVEfOKnt8nPYjruKjLf8BA6VBCS9Vd2VkRI2', 'admin', NULL, '2024-03-30 20:41:19', '2024-03-30 20:41:19'),
(2, 'Test wakur', '002', 'wakur@example.com', '$2y$12$BYGJq8Yz9thetNu2P5UqpOc4Cb82AUm9P5NK8pCOIE5YeJhiTkFIK', 'wakil kurikulum', NULL, '2024-03-30 20:41:20', '2024-03-30 20:41:20'),
(3, 'guru 1', '101', 'guru1@guru.com', '$2y$12$ZgkLippIswWz636rLdMR6.48DdXAG.BdH3DFVFzN5GbF81.fPNZPu', 'guru mapel', NULL, '2024-04-15 07:47:43', '2024-04-15 07:47:43'),
(4, 'guru 2', '102', 'guru2@guru.com', '$2y$12$/N/9Jl7uIcm5atRXTdwWOejkL9IFsDDX1s3IvNPZ2uSmqXRHXkOQq', 'guru mapel', NULL, '2024-04-15 07:48:04', '2024-04-15 07:48:04'),
(5, 'guru 3', '103', 'guru3@gmail.com', '$2y$12$Ub15..1z9yLXKD.0hvHNwuCIk2OzfxrWyG0hGXD2vJ1aLUGR25wNm', 'guru mapel', NULL, '2024-04-15 07:48:32', '2024-04-15 07:48:32'),
(6, 'guru 4', '104', 'guru4@guru.com', '$2y$12$K9bhFCYWrJyf/633Yn1eWODJmR0Yz.zgN7bvT4lEpLD1qUPeanPii', 'guru mapel', NULL, '2024-04-15 07:48:57', '2024-04-15 07:48:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_jadwal_mengajar`
--
ALTER TABLE `event_jadwal_mengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_jadwal_piket_guru`
--
ALTER TABLE `event_jadwal_piket_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_mapel_users_id_foreign` (`users_id`),
  ADD KEY `guru_mapel_mapel_id_foreign` (`mapel_id`),
  ADD KEY `guru_mapel_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_piket_guru`
--
ALTER TABLE `jadwal_piket_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_piket_guru_users_id_foreign` (`users_id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jurusan_kode_jurusan_unique` (`kode_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapor_proses_kbm`
--
ALTER TABLE `lapor_proses_kbm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lapor_proses_kbm_jadwal_mengajar_id_foreign` (`jadwal_mengajar_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mapel_nama_mapel_unique` (`nama_mapel`),
  ADD UNIQUE KEY `mapel_kode_mapel_unique` (`kode_mapel`);

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
-- Indexes for table `pembagian_rombongan_belajar`
--
ALTER TABLE `pembagian_rombongan_belajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembagian_rombongan_belajar_siswa_id_foreign` (`siswa_id`),
  ADD KEY `pembagian_rombongan_belajar_rombongan_belajar_id_foreign` (`rombongan_belajar_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rombongan_belajar`
--
ALTER TABLE `rombongan_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpp`
--
ALTER TABLE `rpp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rpp_guru_mapel_id_foreign` (`guru_mapel_id`);

--
-- Indexes for table `rpp_items`
--
ALTER TABLE `rpp_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rpp_items_rpp_id_foreign` (`rpp_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nomor_induk_unique` (`nomor_induk`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_jadwal_mengajar`
--
ALTER TABLE `event_jadwal_mengajar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `event_jadwal_piket_guru`
--
ALTER TABLE `event_jadwal_piket_guru`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_mengajar`
--
ALTER TABLE `jadwal_mengajar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `jadwal_piket_guru`
--
ALTER TABLE `jadwal_piket_guru`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lapor_proses_kbm`
--
ALTER TABLE `lapor_proses_kbm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembagian_rombongan_belajar`
--
ALTER TABLE `pembagian_rombongan_belajar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rombongan_belajar`
--
ALTER TABLE `rombongan_belajar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rpp`
--
ALTER TABLE `rpp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rpp_items`
--
ALTER TABLE `rpp_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru_mapel`
--
ALTER TABLE `guru_mapel`
  ADD CONSTRAINT `guru_mapel_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_mapel_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_mapel_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_piket_guru`
--
ALTER TABLE `jadwal_piket_guru`
  ADD CONSTRAINT `jadwal_piket_guru_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lapor_proses_kbm`
--
ALTER TABLE `lapor_proses_kbm`
  ADD CONSTRAINT `lapor_proses_kbm_jadwal_mengajar_id_foreign` FOREIGN KEY (`jadwal_mengajar_id`) REFERENCES `jadwal_mengajar` (`id`);

--
-- Constraints for table `pembagian_rombongan_belajar`
--
ALTER TABLE `pembagian_rombongan_belajar`
  ADD CONSTRAINT `pembagian_rombongan_belajar_rombongan_belajar_id_foreign` FOREIGN KEY (`rombongan_belajar_id`) REFERENCES `rombongan_belajar` (`id`),
  ADD CONSTRAINT `pembagian_rombongan_belajar_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);

--
-- Constraints for table `rpp`
--
ALTER TABLE `rpp`
  ADD CONSTRAINT `rpp_guru_mapel_id_foreign` FOREIGN KEY (`guru_mapel_id`) REFERENCES `guru_mapel` (`id`);

--
-- Constraints for table `rpp_items`
--
ALTER TABLE `rpp_items`
  ADD CONSTRAINT `rpp_items_rpp_id_foreign` FOREIGN KEY (`rpp_id`) REFERENCES `rpp` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
