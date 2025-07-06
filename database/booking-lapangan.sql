-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2025 at 04:14 AM
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
-- Database: `booking-lapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `field_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_time` datetime NOT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga booking dalam rupiah',
  `status` enum('pending','confirmed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `field_id`, `name`, `address`, `whatsapp_number`, `booking_time`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ardiansyah', 'jhj', '09876543214', '2025-07-25 02:23:00', 1000000.00, 'cancelled', '2025-07-05 07:19:19', '2025-07-05 07:39:32'),
(2, 1, 'Ardiansyah', 'cfff', '08117788666', '2025-07-31 23:33:00', 1000000.00, 'confirmed', '2025-07-05 07:33:16', '2025-07-05 07:33:35'),
(3, 4, 'zahid', 'kongok', '087859881004', '2025-07-07 10:57:00', 2000000.00, 'confirmed', '2025-07-05 09:57:59', '2025-07-05 09:58:40'),
(4, 4, 'Habib', 'Pemenang', '087859881004', '2025-07-09 23:11:00', 2000000.00, 'confirmed', '2025-07-05 10:06:32', '2025-07-05 10:33:29'),
(5, 3, 'Cameron Larsen', 'Esse adipisicing nu', '987654345678', '2025-08-08 22:00:00', 500000.00, 'pending', '2025-07-05 10:16:25', '2025-07-05 10:16:25'),
(6, 3, 'Jerry Duncan', 'Amet molestiae quis', '3456789456789', '2025-10-14 00:49:00', 500000.00, 'cancelled', '2025-07-05 10:18:19', '2025-07-05 10:33:43'),
(7, 3, 'Shay Gregory', 'Quas voluptatem Sae', '617666666666', '2025-09-28 16:10:00', 500000.00, 'pending', '2025-07-05 10:21:25', '2025-07-05 10:21:25'),
(8, 3, 'Imani Kim', 'Delectus voluptas o', '72842874248', '2025-07-08 06:51:00', 500000.00, 'pending', '2025-07-05 10:30:08', '2025-07-05 10:30:08'),
(9, 2, 'Hillary Zamora', 'Est impedit suscip', '087777777777', '2025-07-07 04:57:00', 1200000.00, 'pending', '2025-07-05 10:31:51', '2025-07-05 10:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sepak Bola', NULL, '2025-07-05 07:15:18', '2025-07-05 07:15:18'),
(2, 'Badminton', '-', '2025-07-05 09:40:10', '2025-07-05 09:40:10'),
(3, 'Futsal', '-', '2025-07-05 09:40:30', '2025-07-05 09:40:30'),
(4, 'Tenis', '-', '2025-07-05 09:40:46', '2025-07-05 09:40:46');

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
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_hour` decimal(10,2) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `category_id`, `name`, `description`, `price_per_hour`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'Old Trafford', 'Manchester United', 1000000.00, 'Manchester', '2025-07-05 07:16:12', '2025-07-05 07:16:12'),
(2, 1, 'San Siro', 'Ac Milan Stadion', 1200000.00, 'Italy', '2025-07-05 09:38:51', '2025-07-05 09:38:51'),
(3, 4, 'Tennis and Squash 25 Kemang ', 'Kemang', 500000.00, 'Jakarta', '2025-07-05 09:42:38', '2025-07-05 09:42:38'),
(4, 3, 'Camp Nou', 'Barcelona', 2000000.00, 'Spain', '2025-07-05 09:52:56', '2025-07-05 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `field_images`
--

CREATE TABLE `field_images` (
  `id` bigint UNSIGNED NOT NULL,
  `field_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field_images`
--

INSERT INTO `field_images` (`id`, `field_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'field-images/01JZDJHJCW400T54GWG2E7JFHR.jpg', '2025-07-05 07:16:12', '2025-07-05 07:16:12'),
(2, 1, 'field-images/01JZDJHJD3J4PJGX9QC03BXSD9.jpg', '2025-07-05 07:16:12', '2025-07-05 07:16:12'),
(3, 2, 'field-images/01JZDTPRGM7M58V1CEMZVCRGEA.jpg', '2025-07-05 09:38:51', '2025-07-05 09:38:51'),
(4, 2, 'field-images/01JZDTPRGSB8NXZ8W3EGFP3X1D.jpg', '2025-07-05 09:38:51', '2025-07-05 09:38:51'),
(5, 2, 'field-images/01JZDTPRGTR4A9BPRF7KJ9RNN3.jpg', '2025-07-05 09:38:51', '2025-07-05 09:38:51'),
(6, 3, 'field-images/01JZDTXPMNE26JRH4THA6HBGX2.jpg', '2025-07-05 09:42:39', '2025-07-05 09:42:39'),
(8, 4, 'field-images/01JZDVPRMGB1F5YZGGKQ7JEJTB.jpg', '2025-07-05 09:56:20', '2025-07-05 09:56:20'),
(9, 4, 'field-images/01JZDVPRMKD4KFE6J467GWN6ZW.jpg', '2025-07-05 09:56:20', '2025-07-05 09:56:20');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2025_07_05_111613_create_tables', 1),
(12, '2025_07_05_144615_add_price_to_bookings_table', 2);

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$bRDRVnIXgd1wsCGM0FMeeewTH.gk4qN3g/5emxD.woW5aPwikqtHG', NULL, '2025-07-05 07:09:21', '2025-07-05 07:09:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_field_id_foreign` (`field_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fields_category_id_foreign` (`category_id`);

--
-- Indexes for table `field_images`
--
ALTER TABLE `field_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_images_field_id_foreign` (`field_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `field_images`
--
ALTER TABLE `field_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `field_images`
--
ALTER TABLE `field_images`
  ADD CONSTRAINT `field_images_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
