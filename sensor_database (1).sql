-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 10:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensor_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resident_count` int(11) NOT NULL DEFAULT 0,
  `tree_count` int(11) NOT NULL DEFAULT 0,
  `admin_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `resident_count`, `tree_count`, `admin_count`, `created_at`, `updated_at`) VALUES
(1, 249, 3001, 14, '2024-11-15 08:36:34', '2024-11-15 08:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_11_06_033323_create_gauge', 1),
(6, '2024_11_11_162826_create_data_table', 1),
(7, '2024_11_12_041012_create_cameras_table', 1),
(8, '2024_11_18_083305_create_camera_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `id` int(11) NOT NULL,
  `humidity` float DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `soil_moisture` float DEFAULT NULL,
  `rain_status` tinyint(4) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensor_data`
--

INSERT INTO `sensor_data` (`id`, `humidity`, `temperature`, `soil_moisture`, `rain_status`, `timestamp`) VALUES
(1, 67, 30.2, 0, 1, '2024-11-15 08:53:35'),
(2, 67, 30.2, 0, 1, '2024-11-15 08:53:45'),
(3, 67, 30.2, 0, 1, '2024-11-15 08:53:55'),
(4, 67, 30.2, 0, 1, '2024-11-15 08:54:05'),
(5, 67, 30.2, 0, 1, '2024-11-15 08:54:15'),
(6, 67, 30.2, 0, 1, '2024-11-15 08:54:25'),
(7, 67, 30.1, 0, 1, '2024-11-15 08:54:35'),
(8, 67, 30, 0, 1, '2024-11-15 08:54:45'),
(9, 67, 30, 0, 1, '2024-11-15 08:54:55'),
(10, 68, 30.1, 0, 1, '2024-11-15 08:55:05'),
(11, 68, 30.2, 0, 1, '2024-11-15 08:55:15'),
(12, 68, 30.2, 0, 1, '2024-11-15 08:55:25'),
(13, 68, 30.2, 0, 1, '2024-11-15 08:55:35'),
(14, 68, 30.2, 0, 1, '2024-11-15 08:55:45'),
(15, 68, 30.2, 0, 1, '2024-11-15 08:55:55'),
(16, 67, 30.2, 0, 1, '2024-11-15 08:56:05'),
(17, 67, 30.2, 0, 1, '2024-11-15 08:56:15'),
(18, 67, 30.2, 0, 1, '2024-11-15 08:56:25'),
(19, 67, 30.2, 0, 1, '2024-11-15 08:56:35'),
(20, 67, 30.2, 0, 1, '2024-11-15 08:56:45'),
(21, 67, 30.2, 0, 1, '2024-11-15 08:56:55'),
(22, 67, 30.2, 0, 1, '2024-11-15 08:57:05'),
(23, 68, 29.9, 0, 1, '2024-11-15 08:57:15'),
(24, 68, 29.8, 0, 1, '2024-11-15 08:57:25'),
(25, 68, 29.8, 0, 1, '2024-11-15 08:57:35'),
(26, 68, 29.8, 0, 1, '2024-11-15 08:57:45'),
(27, 68, 29.8, 0, 1, '2024-11-15 08:57:56'),
(28, 68, 29.8, 0, 1, '2024-11-15 08:58:05'),
(29, 68, 29.8, 0, 1, '2024-11-15 08:58:15'),
(30, 68, 29.8, 0, 1, '2024-11-15 08:58:26'),
(31, 68, 29.8, 0, 1, '2024-11-15 08:58:36'),
(32, 69, 29.8, 0, 1, '2024-11-15 08:58:46'),
(33, 69, 29.8, 0, 1, '2024-11-15 08:58:56'),
(34, 68, 29.8, 0, 1, '2024-11-15 08:59:06'),
(35, 68, 29.8, 0, 1, '2024-11-15 08:59:16'),
(36, 69, 29.8, 0, 1, '2024-11-15 08:59:26'),
(37, 68, 29.8, 0, 1, '2024-11-15 08:59:36'),
(38, 68, 29.8, 0, 1, '2024-11-15 08:59:46'),
(39, 69, 29.8, 0, 1, '2024-11-15 08:59:56'),
(40, 68, 29.8, 0, 1, '2024-11-15 09:00:06'),
(41, 68, 29.8, 0, 1, '2024-11-15 09:00:16'),
(42, 68, 29.8, 0, 1, '2024-11-15 09:00:26'),
(43, 68, 29.8, 0, 1, '2024-11-15 09:00:36'),
(44, 68, 29.8, 0, 1, '2024-11-15 09:00:46'),
(45, 68, 29.8, 0, 1, '2024-11-15 09:00:56'),
(46, 68, 29.8, 0, 1, '2024-11-15 09:01:06'),
(47, 68, 29.8, 0, 1, '2024-11-15 09:01:16'),
(48, 68, 29.8, 0, 1, '2024-11-15 09:01:26'),
(49, 68, 29.8, 0, 1, '2024-11-15 09:01:36'),
(50, 68, 29.8, 0, 1, '2024-11-15 09:01:46'),
(51, 68, 29.8, 0, 1, '2024-11-15 09:01:56'),
(52, 68, 29.8, 0, 1, '2024-11-15 09:02:06'),
(53, 68, 29.8, 0, 1, '2024-11-15 09:02:16'),
(54, 68, 29.8, 0, 1, '2024-11-15 09:02:26'),
(55, 68, 29.8, 0, 1, '2024-11-15 09:02:36'),
(56, 68, 29.8, 0, 1, '2024-11-15 09:02:46'),
(57, 68, 29.8, 0, 1, '2024-11-15 09:02:56'),
(58, 68, 29.8, 0, 1, '2024-11-15 09:03:06'),
(59, 68, 29.8, 0, 1, '2024-11-15 09:03:16'),
(60, 68, 29.8, 0, 1, '2024-11-15 09:03:26'),
(61, 68, 29.8, 0, 1, '2024-11-15 09:03:36'),
(62, 68, 29.8, 0, 1, '2024-11-15 09:03:46'),
(63, 68, 29.8, 0, 1, '2024-11-15 09:03:56'),
(64, 68, 29.8, 0, 1, '2024-11-15 09:04:06'),
(65, 68, 29.8, 0, 1, '2024-11-15 09:04:16'),
(66, 68, 29.8, 0, 1, '2024-11-15 09:04:26'),
(67, 68, 29.8, 0, 1, '2024-11-15 09:04:37'),
(68, 68, 29.8, 0, 1, '2024-11-15 09:04:46'),
(69, 68, 29.8, 0, 1, '2024-11-15 09:04:57'),
(70, 68, 29.8, 0, 1, '2024-11-15 09:05:07'),
(71, 68, 29.8, 0, 1, '2024-11-15 09:05:17'),
(72, 68, 29.8, 0, 1, '2024-11-15 09:05:27'),
(73, 68, 29.8, 0, 1, '2024-11-15 09:05:37'),
(74, 68, 29.8, 0, 1, '2024-11-15 09:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Maulid Rifky', 'suwung246@gmail.com', '$2y$10$LL08hDYEObYDiIKsmB/nvO2aDMkzKi/TpVO6i4XAp8pT/UAPyFiZy', 62888123445, 'Student', NULL, '2024-11-15 08:11:06', '2024-11-18 02:40:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `camera`
--
ALTER TABLE `camera`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensor_data`
--
ALTER TABLE `sensor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
