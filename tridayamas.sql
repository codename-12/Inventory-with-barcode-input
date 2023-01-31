-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2022 at 09:21 AM
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
-- Database: `tridayamas`
--

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
-- Table structure for table `master_benang`
--

CREATE TABLE `master_benang` (
  `id` bigint UNSIGNED NOT NULL,
  `id_supplier` bigint UNSIGNED NOT NULL,
  `tipe_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LOT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BOX_KRG` double(15,2) NOT NULL,
  `KG` double(15,2) NOT NULL,
  `BALE` double(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_benang`
--

INSERT INTO `master_benang` (`id`, `id_supplier`, `tipe_benang`, `jenis_benang`, `LOT`, `BOX_KRG`, `KG`, `BALE`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'COTTON', 'CD 20', '7822', 124.20, 3764.22, 20.74, 'n', '2022-12-08 02:06:23', '2022-12-08 02:06:23');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_15_130146_create_permission_tables', 1),
(6, '2022_12_06_062504_create_supplier_benang_table', 1),
(7, '2022_12_06_062655_create_rajut_table', 1),
(8, '2022_12_06_062746_create_bpb_benang_table', 1),
(9, '2022_12_06_062823_create_invoice_benang_table', 1),
(10, '2022_12_06_062857_create_master_benang_table', 1),
(11, '2022_12_06_062939_create_penerimaan_benang_table', 1),
(12, '2022_12_06_063031_create_pengiriman_benang_table', 1),
(13, '2022_12_08_065338_create_stokbenang_trigger', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

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
-- Table structure for table `penerimaan_benang`
--

CREATE TABLE `penerimaan_benang` (
  `id` bigint UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supplier` bigint UNSIGNED NOT NULL,
  `BPB` bigint UNSIGNED NOT NULL,
  `SJ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LOT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BOX_KRG` double(15,2) NOT NULL,
  `KG` double(15,2) NOT NULL,
  `BALE` double(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaan_benang`
--

INSERT INTO `penerimaan_benang` (`id`, `tanggal`, `id_supplier`, `BPB`, `SJ`, `jenis_benang`, `tipe_benang`, `LOT`, `BOX_KRG`, `KG`, `BALE`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, '2022-12-08', 1, 1, '1232123', 'CD 20', 'COTTON', '7822', 62.10, 1882.11, 10.37, '1', '2022-12-08 02:09:18', '2022-12-08 02:09:18');

--
-- Triggers `penerimaan_benang`
--
DELIMITER $$
CREATE TRIGGER `penerimaan` AFTER INSERT ON `penerimaan_benang` FOR EACH ROW BEGIN
            UPDATE master_benang 
            SET BOX_KRG= BOX_KRG + NEW.BOX_KRG,
             KG= KG + NEW.KG,
             BALE= BALE + NEW.BALE
             WHERE jenis_benang = NEW.jenis_benang && LOT = NEW.LOT;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_benang`
--

CREATE TABLE `pengiriman_benang` (
  `id` bigint UNSIGNED NOT NULL,
  `id_rajut` bigint UNSIGNED NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SJ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supplier` bigint UNSIGNED NOT NULL,
  `jenis_benang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LOT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BOX_KRG` double(15,2) NOT NULL,
  `KG` double(15,2) NOT NULL,
  `BALE` double(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `pengiriman_benang`
--
DELIMITER $$
CREATE TRIGGER `pengiriman` AFTER INSERT ON `pengiriman_benang` FOR EACH ROW BEGIN
	        UPDATE master_benang 
	        SET BOX_KRG= BOX_KRG - NEW.BOX_KRG,
 	        KG= KG - NEW.KG,
	        BALE= BALE - NEW.BALE
 	        WHERE jenis_benang = NEW.jenis_benang && LOT = NEW.LOT && id_supplier = id_supplier;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'supbenang-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(2, 'supbenang-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(3, 'supbenang-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(4, 'supbenang-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(5, 'BPBbenang-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(6, 'BPBbenang-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(7, 'BPBbenang-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(8, 'BPBbenang-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(9, 'gudangjadi-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(10, 'gudangjadi-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(11, 'gudangjadi-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(12, 'gudangjadi-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(13, 'benang-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(14, 'benang-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(15, 'benang-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(16, 'benang-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(17, 'obenang-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(18, 'obenang-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(19, 'obenang-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(20, 'obenang-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(21, 'masterbenang-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(22, 'masterbenang-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(23, 'masterbenang-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(24, 'masterbenang-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(25, 'user-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(26, 'user-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(27, 'user-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(28, 'user-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(29, 'role-list', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(30, 'role-create', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(31, 'role-edit', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49'),
(32, 'role-delete', 'web', '2022-12-08 02:04:49', '2022-12-08 02:04:49');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-12-08 02:04:52', '2022-12-08 02:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ryan Hidayat', 'admin@gmail.com', NULL, '$2y$10$bMVWRxus9kv/aB2SU0zaZ.1EJCaiz/nNs/ZHjk95k7Q0WJlecljFO', NULL, '2022-12-08 02:04:52', '2022-12-08 02:04:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `master_benang`
--
ALTER TABLE `master_benang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_benang_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penerimaan_benang`
--
ALTER TABLE `penerimaan_benang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerimaan_benang_id_supplier_foreign` (`id_supplier`),
  ADD KEY `penerimaan_benang_bpb_foreign` (`BPB`);

--
-- Indexes for table `pengiriman_benang`
--
ALTER TABLE `pengiriman_benang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_benang_id_rajut_foreign` (`id_rajut`),
  ADD KEY `pengiriman_benang_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_benang`
--
ALTER TABLE `master_benang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penerimaan_benang`
--
ALTER TABLE `penerimaan_benang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengiriman_benang`
--
ALTER TABLE `pengiriman_benang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
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
-- Constraints for table `master_benang`
--
ALTER TABLE `master_benang`
  ADD CONSTRAINT `master_benang_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier_benang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penerimaan_benang`
--
ALTER TABLE `penerimaan_benang`
  ADD CONSTRAINT `penerimaan_benang_bpb_foreign` FOREIGN KEY (`BPB`) REFERENCES `bpb_benang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerimaan_benang_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier_benang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman_benang`
--
ALTER TABLE `pengiriman_benang`
  ADD CONSTRAINT `pengiriman_benang_id_rajut_foreign` FOREIGN KEY (`id_rajut`) REFERENCES `rajut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_benang_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier_benang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
