-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Mar 2024, 23:39:14
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `chatgpt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `name`, `code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 'Merhaba bot :)343424324', '6609f32129d3a', 0, '2024-03-31 20:34:57', '2024-03-31 20:35:08'),
(2, 2, 'Merhaba bot ggggg:)', '6609f32ce35ab', 1, '2024-03-31 20:35:08', '2024-03-31 20:35:08'),
(3, 4, 'Merhaba bot ggg) b2323', '6609f34a13f62', 0, '2024-03-31 20:35:38', '2024-03-31 20:36:48'),
(4, 4, 'Merhaba bot ggg) b2323', '6609f39074ad7', 1, '2024-03-31 20:36:48', '2024-03-31 20:36:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `bot_reply` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `user_message`, `bot_reply`, `created_at`, `updated_at`) VALUES
(1, 1, 'Merhaba bot :)343424324', 'Let me know if you have any questions.', '2024-03-31 20:34:57', '2024-03-31 20:34:57'),
(2, 1, 'Merhaba bot 23123 :)', 'Let me know if you have any questions.', '2024-03-31 20:35:03', '2024-03-31 20:35:03'),
(3, 2, 'Merhaba bot ggggg:)', 'I\'m here to assist you.', '2024-03-31 20:35:08', '2024-03-31 20:35:08'),
(4, 2, 'Merhaba bot 323232113123:)', 'Feel free to ask me anything!', '2024-03-31 20:35:21', '2024-03-31 20:35:21'),
(5, 2, 'Merhaba bot ggg) bbb', 'I\'m here to assist you.', '2024-03-31 20:35:25', '2024-03-31 20:35:25'),
(6, 3, 'Merhaba bot ggg) b2323', 'This is a sample response from the bot.', '2024-03-31 20:35:38', '2024-03-31 20:35:38'),
(7, 4, 'Merhaba bot ggg) b2323', 'Let me know if you have any questions.', '2024-03-31 20:36:48', '2024-03-31 20:36:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_20_134911_create_subscription_products_table', 1),
(6, '2024_03_30_135042_create_user_subscriptions_table', 1),
(7, '2024_03_31_115552_create_chats_table', 1),
(8, '2024_03_31_120342_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
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

--
-- Tablo döküm verisi `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'client_token', '2a57ed93603e4f287a95d035e49c4c4a12e02291f9d753b2e3ab3f73133914ea', '[\"*\"]', '2024-03-31 20:37:00', NULL, '2024-03-31 20:33:21', '2024-03-31 20:37:00'),
(2, 'App\\Models\\User', 3, 'client_token', 'fa700f907e5396e1d8a148a1676fcaec354f15cc22db5cfccfa92e0222194435', '[\"*\"]', '2024-03-31 20:34:01', NULL, '2024-03-31 20:33:53', '2024-03-31 20:34:01'),
(3, 'App\\Models\\User', 4, 'client_token', 'ae80d4b4b1f6ba548cbcf7ed233ef77c4d7c62543fe217bd23d1c3d474257b4c', '[\"*\"]', '2024-03-31 20:36:48', NULL, '2024-03-31 20:34:10', '2024-03-31 20:36:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscription_products`
--

CREATE TABLE `subscription_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `chat_limit` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subscription_products`
--

INSERT INTO `subscription_products` (`id`, `name`, `chat_limit`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 20, 29.99, '2024-03-31 20:33:12', '2024-03-31 20:33:12'),
(2, 'Pro', 50, 59.99, '2024-03-31 20:33:12', '2024-03-31 20:33:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_uuid` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `subscription_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `device_uuid`, `device_name`, `subscription_status`, `is_admin`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'c2da6027-17f4-42a0-becb-04922404bd71', 'Web Browser', 0, 1, 'Admin', 'admin@admin.com', '$2y$12$PhLFZAlFQL43W/tZCMef3uLmP7gH8T3Q5hzIj9BBm07cMGENr6VTy', '2024-03-31 20:33:11', '2024-03-31 20:33:11'),
(2, '123434342', 'Example-device-name33', 1, 0, NULL, NULL, NULL, '2024-03-31 20:33:21', '2024-03-31 20:33:34'),
(3, '1234343', 'Example-device-name33', 1, 0, NULL, NULL, NULL, '2024-03-31 20:33:53', '2024-03-31 20:34:01'),
(4, '123434', 'Example-device-name33', 1, 0, NULL, NULL, NULL, '2024-03-31 20:34:10', '2024-03-31 20:34:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `chat_credit` int(11) NOT NULL DEFAULT 0,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user_subscriptions`
--

INSERT INTO `user_subscriptions` (`id`, `user_id`, `product_id`, `chat_credit`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 17, '2024-03-31 20:33:34', '2024-03-31 20:33:34', 1, '2024-03-31 20:33:34', '2024-03-31 20:35:08'),
(2, 3, 1, 20, '2024-03-31 20:34:01', '2024-03-31 20:34:01', 1, '2024-03-31 20:34:01', '2024-03-31 20:34:01'),
(3, 4, 2, 46, '2024-03-31 20:34:26', '2024-03-31 20:34:26', 1, '2024-03-31 20:34:26', '2024-03-31 20:36:48');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chats_code_unique` (`code`),
  ADD KEY `chats_user_id_foreign` (`user_id`),
  ADD KEY `chats_code_index` (`code`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_chat_id_foreign` (`chat_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `subscription_products`
--
ALTER TABLE `subscription_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_device_uuid_unique` (`device_uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_device_uuid_index` (`device_uuid`);

--
-- Tablo için indeksler `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `user_subscriptions_product_id_foreign` (`product_id`),
  ADD KEY `user_subscriptions_chat_credit_index` (`chat_credit`),
  ADD KEY `user_subscriptions_status_index` (`status`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `subscription_products`
--
ALTER TABLE `subscription_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD CONSTRAINT `user_subscriptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `subscription_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
