-- Buat database (ganti 'senku_db' dengan nama database yang diinginkan)
-- CREATE DATABASE IF NOT EXISTS `senku_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Gunakan database yang baru dibuat
USE `senku_db`;

-- Pastikan tabel users ada (disesuaikan dengan struktur Laravel default)
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel layanan
CREATE TABLE IF NOT EXISTS `layanan` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_layanan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_layanan` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) UNSIGNED NOT NULL,
  `layanan_id` INT(10) UNSIGNED NOT NULL,
  `harga_layanan` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pesanan_user_id_foreign` (`user_id`),
  KEY `pesanan_layanan_id_foreign` (`layanan_id`),
  CONSTRAINT `pesanan_user_id_foreign`
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE CASCADE,
  CONSTRAINT `pesanan_layanan_id_foreign`
    FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;