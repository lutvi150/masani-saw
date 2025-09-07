-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table masani_saw.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.cache: ~0 rows (approximately)

-- Dumping structure for table masani_saw.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.cache_locks: ~0 rows (approximately)

-- Dumping structure for table masani_saw.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table masani_saw.hasil_hitungs
CREATE TABLE IF NOT EXISTS `hasil_hitungs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.hasil_hitungs: ~0 rows (approximately)

-- Dumping structure for table masani_saw.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.jobs: ~0 rows (approximately)

-- Dumping structure for table masani_saw.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.job_batches: ~0 rows (approximately)

-- Dumping structure for table masani_saw.kriterias
CREATE TABLE IF NOT EXISTS `kriterias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.kriterias: ~5 rows (approximately)
REPLACE INTO `kriterias` (`id`, `nama`, `sifat`, `bobot`, `deskripsi`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'Jumlah individu hama per m2', 'benefit', '0.3', 'Hasil pengamatan langsung di lahan, semakin tinggi jumlahnya semakin berisiko', '1', NULL, NULL),
	(2, 'Luas Area terdampak dalam m2', 'cost', '0.2', 'Semakin luas, semakin serius', '2', NULL, NULL),
	(3, 'Tingkat kerusakan dalam persentase', 'benefit', '0.2', 'Semakin tinggi, semakin parah', '3', NULL, NULL),
	(4, 'Jarak dari sumber air dalam meter', 'benefit', '0.15', 'Jarak dari sumber air membuat terjadi kerusakan', '4', NULL, NULL),
	(5, 'Musim tanam', 'benefit', '0.15', 'Musim tanam membuat terjadi kerusakan', '5', NULL, NULL);

-- Dumping structure for table masani_saw.lokasis
CREATE TABLE IF NOT EXISTS `lokasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyuluh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.lokasis: ~18 rows (approximately)
REPLACE INTO `lokasis` (`id`, `nama_lokasi`, `nama_penyuluh`, `no_hp`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'Bamil Nosar', 'SUKURDI MINOSRA', '082310747271', '1', NULL, NULL),
	(2, 'Mude Nosar', 'KASIM MAHMUD', '081376065421', '2', NULL, NULL),
	(3, 'Bale Nosar', 'KASIM MAHMUD', '081376065421', '3', NULL, NULL),
	(4, 'Kejurun Syiah Utama', 'WINAKU SETIADI', '085276382220', '4', NULL, NULL),
	(5, 'Mengaya', 'WINAKU SETIADI', '085276382220', '5', NULL, NULL),
	(6, 'Bewang', 'AGUSTINA LUBIS', '085260227027', '6', NULL, NULL),
	(7, 'Kala Bintang', 'SATRIANA', '082363294939', '7', NULL, NULL),
	(8, 'Linung Bulen I', 'ALBAR', '082361173837', '8', NULL, NULL),
	(9, 'Wihlah Setie', 'ALBAR', '082361173837', '9', NULL, NULL),
	(10, 'Linung Bulen II', 'MUHAMMAD TAUFIQ', '085358899490', '10', NULL, NULL),
	(11, 'Serule', 'SELAMAT PERWIRA', '085277341748', '11', NULL, NULL),
	(12, 'Atu Payung', 'SELAMAT PERWIRA', '085277341748', '12', NULL, NULL),
	(13, 'Dedamar', 'MUHAMMAD TAUFIQ', '085358899490', '13', NULL, NULL),
	(14, 'Kuala I', 'ASRI codeRIS', '08529755123', '14', NULL, NULL),
	(15, 'Wakil Jalil', 'MAULANA', '085362223606', '15', NULL, NULL),
	(16, 'Kuala II', 'HASANAH BAKAR RAMSY', '085213366660', '16', NULL, NULL),
	(17, 'Genuren', 'WINAKU SETIADI', '085276382220', '17', NULL, NULL),
	(18, 'Merodot', 'HASANAH BAKAR RAMSY', '085213366660', '18', NULL, NULL);

-- Dumping structure for table masani_saw.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.migrations: ~7 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_09_02_103725_create_kriterias_table', 1),
	(5, '2025_09_02_103855_create_lokasis_table', 1),
	(6, '2025_09_02_103903_create_nilais_table', 1),
	(7, '2025_09_02_103912_create_hasil_hitungs_table', 1);

-- Dumping structure for table masani_saw.nilais
CREATE TABLE IF NOT EXISTS `nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lokasi_id` bigint(20) unsigned NOT NULL,
  `kriteria_id` bigint(20) unsigned NOT NULL,
  `nilai` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nilais_lokasi_id_foreign` (`lokasi_id`),
  KEY `nilais_kriteria_id_foreign` (`kriteria_id`),
  CONSTRAINT `nilais_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `nilais_lokasi_id_foreign` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.nilais: ~1 rows (approximately)
REPLACE INTO `nilais` (`id`, `lokasi_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 80, '2025-09-06 17:53:08', '2025-09-06 17:54:57');

-- Dumping structure for table masani_saw.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table masani_saw.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table masani_saw.sessions: ~0 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('hrRl95ft3fKGwM0I4nY7UrNc2JrLobDPq098uTMH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkdUSkFHVlhoQW5iMEQ0M0VzMjA5VTRmWm40b2xtcVVvYjBJWnhVSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9uaWxhaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1757206902);

-- Dumping structure for table masani_saw.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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

-- Dumping data for table masani_saw.users: ~1 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
