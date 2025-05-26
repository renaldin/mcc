-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 08:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_mcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `calibration_schedules`
--

CREATE TABLE `calibration_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tool` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_hour` varchar(20) DEFAULT NULL,
  `end_hour` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calibration_schedules`
--

INSERT INTO `calibration_schedules` (`id`, `tool`, `date`, `status`, `created_at`, `updated_at`, `start_hour`, `end_hour`) VALUES
(2, 'Lig Thermometer', '2025-05-01', 'Belum Dilakukan', '2025-04-27 06:38:47', '2025-05-01 04:57:19', NULL, NULL),
(4, 'TDS Meter', '2025-05-01', 'Sudah Dilakukan', '2025-04-29 08:48:47', '2025-05-01 04:57:31', NULL, NULL),
(5, 'Lig Thermometer', '2025-05-27', 'Sudah Dilakukan', '2025-05-25 21:35:53', '2025-05-25 23:34:26', '12:00', '16:40'),
(6, 'TDS Meter', '2025-05-26', 'Sudah Dilakukan', '2025-05-25 23:35:49', '2025-05-25 23:36:00', '16:35', '19:35');

-- --------------------------------------------------------

--
-- Table structure for table `checksheet_checkings`
--

CREATE TABLE `checksheet_checkings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `air_pocket` varchar(255) NOT NULL,
  `gumpal` varchar(255) NOT NULL,
  `bercak` varchar(255) NOT NULL,
  `tipis` varchar(255) NOT NULL,
  `meler` varchar(255) NOT NULL,
  `tunggu_repair` varchar(255) NOT NULL,
  `total_check` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checksheet_treatments`
--

CREATE TABLE `checksheet_treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `document_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checksheet_treatments`
--

INSERT INTO `checksheet_treatments` (`id`, `date`, `document_no`, `created_at`, `updated_at`) VALUES
(10, '2025-05-22', 'C.04/01/08/QC/MCC-2024', '2025-05-22 00:37:26', '2025-05-22 00:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `checksheet_treatment_details`
--

CREATE TABLE `checksheet_treatment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checksheet_treatment_id` bigint(20) NOT NULL,
  `process` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `tools` varchar(255) NOT NULL,
  `inspection_result_1` int(11) DEFAULT NULL,
  `inspection_result_2` int(11) DEFAULT NULL,
  `judgement` varchar(255) DEFAULT NULL,
  `recommendation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `min_standard` varchar(255) NOT NULL,
  `max_standard` varchar(255) NOT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checksheet_treatment_details`
--

INSERT INTO `checksheet_treatment_details` (`id`, `checksheet_treatment_id`, `process`, `parameter`, `standard`, `tools`, `inspection_result_1`, `inspection_result_2`, `judgement`, `recommendation`, `created_at`, `updated_at`, `min_standard`, `max_standard`, `unit`) VALUES
(147, 10, 'Degreasing', 'Water Temperature', NULL, 'Temperatur meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '40', '55', '°C'),
(148, 10, 'Degreasing', 'Total Alkali', NULL, 'Elemeyer,pippet volume,phenolpthalein Ind.(PP),Solution 02', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '35', '40', 'point'),
(149, 10, 'Water Rinse', 'pH (supply)', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '7', '9', NULL),
(150, 10, 'Water Rinse', 'Contamination', NULL, 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 02', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '0', '6', 'point'),
(151, 10, 'Surfacing', 'Ph', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '8', '10', NULL),
(152, 10, 'Phosphating', 'Ph', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '8', '10', NULL),
(153, 10, 'Phosphating', 'Total Acid (TA)', NULL, 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 01', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '30', '32', 'point'),
(154, 10, 'Phosphating', 'Free Acid (FA)', NULL, 'Elemeyer,pippet volume,Bromophenol Blue Ind. (BPB),Solution 01', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '1', '3', 'point'),
(155, 10, 'Phosphating', 'Accelerator (AC)', NULL, 'Saccarometer,Titre Powder (sulfamic acid)', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '6', '8', 'point'),
(156, 10, 'Phosphating rinse 1', 'pH (supply)', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '7', '9', NULL),
(157, 10, 'Phosphating rinse 1', 'Contamination', NULL, 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 01', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '0', '6', 'point'),
(158, 10, 'Phosphating rinse 2', 'pH (supply)', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '7', '9', NULL),
(159, 10, 'Phosphating rinse 2', 'Contamination', NULL, 'Elemeyer,pippet volume,phenolpthalein Ind. (PP),Solution 01', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '0', '6', 'point'),
(160, 10, 'CED Painting', 'Water temperature (Start process)', NULL, 'Temperatur meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '27', '30', '°C'),
(161, 10, 'CED Painting', 'Ph', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '8', '10', NULL),
(162, 10, 'Anolyte', 'Aliran air', NULL, 'El.conductivity mtr', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '400', '700', 'µs/cm'),
(163, 10, 'CED Rinse 01', 'Ph', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '8', '10', NULL),
(164, 10, 'CED Rinse 02', 'Ph', NULL, 'PH Meter', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '8', '10', NULL),
(165, 10, 'Oven', 'Menit ke 15', NULL, 'Oven temperature', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '180', '200', '°C'),
(166, 10, 'Oven', 'Menit ke 45', NULL, 'Oven temperature', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '180', '200', '°C'),
(167, 10, 'Oven', 'Menit ke 60', NULL, 'Oven temperature', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '180', '200', '°C'),
(168, 10, 'Oven', 'Menit ke 90', NULL, 'Oven temperature', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '180', '200', '°C'),
(169, 10, 'Oven', 'Menit ke 120', NULL, 'Oven temperature', NULL, NULL, NULL, NULL, '2025-05-22 00:37:26', '2025-05-22 00:37:26', '180', '200', '°C');

-- --------------------------------------------------------

--
-- Table structure for table `cs_treatments`
--

CREATE TABLE `cs_treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `process` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `standard` varchar(255) NOT NULL,
  `tools` varchar(255) NOT NULL,
  `inspection_result_1` decimal(8,2) DEFAULT NULL,
  `inspection_result_2` decimal(8,2) DEFAULT NULL,
  `judgement` varchar(255) DEFAULT NULL,
  `recommendation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drain_schedules`
--

CREATE TABLE `drain_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tangki` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_hour` varchar(20) DEFAULT NULL,
  `end_hour` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drain_schedules`
--

INSERT INTO `drain_schedules` (`id`, `tangki`, `date`, `status`, `created_at`, `updated_at`, `start_hour`, `end_hour`) VALUES
(2, 'Phosphating Rinse 1', '2025-04-29', 'Belum Dilakukan', '2025-04-27 06:46:19', '2025-04-27 06:46:19', NULL, NULL),
(3, 'Phosphating Rinse 2', '2025-05-01', 'Belum Dilakukan', '2025-04-27 08:29:32', '2025-05-01 05:00:40', NULL, NULL),
(4, 'CED Rinse 01', '2025-05-01', 'Sudah Dilakukan', '2025-04-29 18:11:03', '2025-05-25 23:27:10', NULL, NULL),
(5, 'Phosphating', '2025-05-26', 'Sudah Dilakukan', '2025-05-25 21:49:46', '2025-05-25 23:26:48', '11:49', '16:49'),
(6, 'Phosphating Rinse 2', '2025-05-26', 'Sudah Dilakukan', '2025-05-25 23:37:25', '2025-05-25 23:37:33', '13:37', '18:37');

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
-- Table structure for table `jadwal_kalibrasi`
--

CREATE TABLE `jadwal_kalibrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_kalibrasi`
--

INSERT INTO `jadwal_kalibrasi` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'Judul 1', '2025-04-26', '2025-05-02', NULL, '2025-04-25 21:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kalibrasis`
--

CREATE TABLE `jadwal_kalibrasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_01_124141_create_schedules_table', 2),
(6, '2024_12_01_131051_add_role_to_users_table', 3),
(7, '2024_12_03_142015_create_jadwal_kalibrasis_table', 4),
(10, '2024_12_20_033457_create_jadwal_kalibrasi_table', 5),
(11, '2024_12_22_162243_add_phone_and_role_to_users_table', 6),
(13, '2024_12_25_143703_create_cs_treatments_table', 7),
(14, '2025_04_27_062943_create_checksheet_treatments_table', 8),
(15, '2025_04_27_092208_create_checksheet_treatment_details_table', 9),
(16, '2025_04_27_125354_create_calibration_schedules_table', 10),
(17, '2025_04_27_131328_create_drain_schedules_table', 11),
(18, '2025_04_29_162248_create_checksheet_checkings_table', 12),
(19, '2025_05_26_035801_update-calibration-schedule', 13),
(20, '2025_05_26_044818_update-drain-schedule', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tank_name` varchar(255) NOT NULL,
  `scheduled_date` date NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `status` varchar(255) DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '088221655019', '$2y$10$78lY8BQPPL4Qp/rs7q/ze.Ghn5bgE8ZUVpSOuB7LHYhOjnAazSe1a', '2024-11-27 19:59:15', '2024-11-27 19:59:15', 'Admin', 'Aktif'),
(4, 'Renaldi QC Update', 'qc@gmail.com', '089518860901', '$2y$12$KeDmW135K.lLtQ.NiII7e.zBWo5cOVftsroNeF2mVP8ovwnlulpFu', '2025-04-26 23:13:19', '2025-04-26 23:13:52', 'QC', 'Aktif'),
(5, 'Renaldi Admin', 'admin2@gmail.com', '085724089993', '$2y$12$ImyR8ZmbV/67RR5dFC5/L.X5HDWAf0bMLg8iyIAmifp784xhBUrzS', '2025-04-26 23:15:06', '2025-04-26 23:15:06', 'Admin', 'Aktif'),
(6, 'Renaldi Maintenance', 'maintenance@gmail.com', '089518860907', '$2y$12$s8laqS71Z/VQQCM1QIFRbOQdGwXbP1paVb0zScMqLe9gcFHXL.u0C', '2025-04-27 06:43:22', '2025-04-27 06:43:22', 'Maintenance', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calibration_schedules`
--
ALTER TABLE `calibration_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checksheet_checkings`
--
ALTER TABLE `checksheet_checkings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checksheet_treatments`
--
ALTER TABLE `checksheet_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checksheet_treatment_details`
--
ALTER TABLE `checksheet_treatment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cs_treatments`
--
ALTER TABLE `cs_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drain_schedules`
--
ALTER TABLE `drain_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_kalibrasi`
--
ALTER TABLE `jadwal_kalibrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kalibrasis`
--
ALTER TABLE `jadwal_kalibrasis`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
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
-- AUTO_INCREMENT for table `calibration_schedules`
--
ALTER TABLE `calibration_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checksheet_checkings`
--
ALTER TABLE `checksheet_checkings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checksheet_treatments`
--
ALTER TABLE `checksheet_treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checksheet_treatment_details`
--
ALTER TABLE `checksheet_treatment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `cs_treatments`
--
ALTER TABLE `cs_treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drain_schedules`
--
ALTER TABLE `drain_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kalibrasi`
--
ALTER TABLE `jadwal_kalibrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_kalibrasis`
--
ALTER TABLE `jadwal_kalibrasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
