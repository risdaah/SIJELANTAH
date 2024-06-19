-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2024 pada 11.19
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sijelantah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_13_124258_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hufk5xQ1ZR6lmSWTvaXEW2etALvKYolOsR5aEBsq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUJkbUtkandCRDRuMnNMQkJySktSeXNuRUZVajl0em5hSmRvWngzcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9DdXN0b21lclBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718333876),
('pm2DU3E5HEATZ1rkBIScrQi9if9rv3B0VITcJdfW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblVTT1FtajlCMlhpZWV0c1R6NFhvUm1zR2lXcjZ0eHVPblFybTFhRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9HYWJ1bmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718419557),
('sJqDN3N4V4HTPYyhjZ5aLJmRgWh1bIpxGwabYbSW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3ZXTER1djNCWWtWdnQySTVCaHdlOThtR0hDSzJRVGRmQ3lpN2dlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9FZGl0RGF0YUN1c3RvbWVyLzMvZWRpdF9jdXN0b21lciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718287579),
('xh9BC0BUU1S78Jylwj4gsPgfEEVLH9YsFQOxtbCV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicnM5N3lBbGlpbktYSGJKcW9ydGdyZnRic044VWkyVVk5ZEQ5VVpISSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BZG1pblBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718282641);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_insentif`
--

CREATE TABLE `tbl_insentif` (
  `ID_INSENTIF` bigint(11) NOT NULL,
  `ID_PERMINTAAN` bigint(20) NOT NULL,
  `ID_PENGGUNA` bigint(20) DEFAULT NULL,
  `JUMLAH_INSENTIF` decimal(10,0) NOT NULL,
  `STATUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_insentif`
--

INSERT INTO `tbl_insentif` (`ID_INSENTIF`, `ID_PERMINTAAN`, `ID_PENGGUNA`, `JUMLAH_INSENTIF`, `STATUS`) VALUES
(1, 2, 1, 28000, 'Belum Terbayar'),
(2, 1, 1, 21000, 'Terbayar'),
(4, 9, 3, 35000, 'Terbayar'),
(5, 10, 3, 35000, 'Terbayar'),
(6, 11, 3, 35000, 'Terbayar'),
(7, 12, 1, 70000, 'Terbayar'),
(8, 13, 1, 70000, 'Terbayar'),
(9, 14, 1, 70000, 'Terbayar'),
(10, 15, 1, 70000, 'Terbayar'),
(11, 18, 12, 28000, 'Terbayar'),
(12, 19, 12, 21000, 'Terbayar'),
(13, 20, 12, 35000, 'Terbayar'),
(14, 21, 12, 28000, 'Terbayar'),
(15, 22, 1, 35000, 'Terbayar'),
(16, 23, 13, 56000, 'Terbayar'),
(17, 24, 13, 56000, 'Terbayar'),
(18, 25, 14, 28000, 'Terbayar'),
(19, 26, 14, 63000, 'Terbayar'),
(20, 27, 14, 49000, 'Terbayar'),
(22, 28, 14, 21000, 'Terbayar'),
(24, 29, 14, 28000, 'Terbayar'),
(26, 32, 12, 21000, 'Terbayar'),
(27, 33, 12, 35000, 'Terbayar'),
(28, 34, 1, 28000, 'Belum Terbayar'),
(31, 37, 12, 35000, 'Belum Terbayar'),
(33, 39, 16, 49000, 'Terbayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL,
  `NAMA` varchar(150) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `NO_TELP` varchar(255) NOT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `ROLE` varchar(20) NOT NULL,
  `TGL_DAFTAR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`ID_PENGGUNA`, `NAMA`, `EMAIL`, `USERNAME`, `PASSWORD`, `NO_TELP`, `ALAMAT`, `ROLE`, `TGL_DAFTAR`) VALUES
(1, 'Risda Rahmawati Harsono', 'risda@gmail.com', 'risdarh', 'risda123', '0895326442194', 'Bengkel Ani Jaya, Kalitengah, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272', 'pengumpul', '2024-06-10'),
(2, 'Talia Aprianti', 'talia@sijelantah.com', 'admin_talia', 'talia123', '123456789', 'Taman Puspa Kab. Sidoarjo', 'admin', '2024-06-05'),
(3, 'Nanda Kharisma Safitri', 'ndakharis@gmail.com', 'ndkharis', 'nda123', '123456789', 'Perum Bhayangkara, Kec. Sidoarjo, Kab. Sidoarjo', 'pengumpul', '2024-06-14'),
(12, 'Arya Widyatama', 'arya@gmail.com', 'aryak', 'aryaarya', '62895326442199', 'Taman, Kab. Sidoarjo', 'pengumpul', '2024-06-16'),
(13, 'Sadhara Dhaneswari', 'dara@gmail.com', 'sadhara', '123dara', '123456789', 'Jl. Raya Tanggulangin No.25, Kedunganten, Kalitengah, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272', 'pengumpul', '2024-06-16'),
(14, 'Ratih Dewita', 'ratih.dewita@gmail.com', 'dratih', '123ratih', '123456789', 'Taman, Kab. Sidoarjo', 'pengumpul', '2024-06-17'),
(15, 'Nurul Izzah', 'izzah@gmail.com', 'izzah', '123izzah', '6289522654820', NULL, 'pengumpul', '2024-06-18'),
(16, 'yulistiawati sari', 'yuli@gmail.com', 'yuli', 'yuli123', '1234567', 'Sukodono Kec.Sidoarjo', 'pengumpul', '2024-06-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumpulan`
--

CREATE TABLE `tbl_pengumpulan` (
  `ID_KUMPUL` bigint(11) NOT NULL,
  `ID_PERMINTAAN` bigint(20) DEFAULT NULL,
  `TGL_KUMPUL` date NOT NULL,
  `JUMLAH_KIRIM` bigint(20) NOT NULL,
  `STATUS_PERMINTAAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengumpulan`
--

INSERT INTO `tbl_pengumpulan` (`ID_KUMPUL`, `ID_PERMINTAAN`, `TGL_KUMPUL`, `JUMLAH_KIRIM`, `STATUS_PERMINTAAN`) VALUES
(2, 1, '2023-05-07', 3, 'Ditolak'),
(3, 2, '2023-05-07', 4, 'Disetujui'),
(7, 9, '2024-05-15', 5, 'Disetujui'),
(8, 10, '2024-05-15', 5, 'Disetujui'),
(9, 11, '2024-05-15', 5, 'Disetujui'),
(10, 12, '2024-06-15', 10, 'Disetujui'),
(11, 13, '2024-06-15', 10, 'Disetujui'),
(12, 14, '2024-06-15', 10, 'Disetujui'),
(13, 15, '2024-06-15', 10, 'Disetujui'),
(16, 18, '2024-06-16', 4, 'Disetujui'),
(17, 19, '2024-06-16', 3, 'Disetujui'),
(18, 20, '2024-07-16', 5, 'Disetujui'),
(19, 21, '2024-07-16', 4, 'Disetujui'),
(20, 22, '2024-07-16', 5, 'Disetujui'),
(21, 23, '2024-06-16', 8, 'Disetujui'),
(22, 24, '2024-08-17', 8, 'Disetujui'),
(23, 25, '2024-08-17', 4, 'Disetujui'),
(24, 26, '2024-08-17', 9, 'Disetujui'),
(25, 27, '2024-08-17', 7, 'Disetujui'),
(27, 28, '2024-08-17', 3, 'Disetujui'),
(29, 29, '2024-08-17', 4, 'Disetujui'),
(32, 32, '2024-06-18', 3, 'Disetujui'),
(33, 33, '2024-06-18', 5, 'Disetujui'),
(34, 34, '2024-06-18', 4, 'Ditolak'),
(37, 37, '2024-06-19', 5, 'Ditolak'),
(39, 39, '2024-06-19', 7, 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `ID_PERMINTAAN` bigint(11) NOT NULL,
  `ID_PENGGUNA` bigint(20) NOT NULL,
  `ID_KUMPUL` bigint(20) DEFAULT NULL,
  `ID_INSENTIF` bigint(20) DEFAULT NULL,
  `KATEGORI` varchar(50) DEFAULT NULL,
  `TGL_MINTA` date NOT NULL,
  `TGL_KUMPUL` date NOT NULL,
  `ALAMAT_PERMINTAAN` varchar(255) NOT NULL,
  `JUMLAH_KIRIM` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`ID_PERMINTAAN`, `ID_PENGGUNA`, `ID_KUMPUL`, `ID_INSENTIF`, `KATEGORI`, `TGL_MINTA`, `TGL_KUMPUL`, `ALAMAT_PERMINTAAN`, `JUMLAH_KIRIM`) VALUES
(1, 1, 2, 1, 'Pribadi', '2023-05-07', '2023-05-07', 'Bengkel Ani Jaya, Kalitengah, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272', 3),
(2, 1, 3, 2, 'Pribadi', '2023-05-07', '2023-05-07', 'Bengkel Ani Jaya, Kalitengah, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272', 4),
(9, 3, 7, 4, 'Pribadi', '2024-05-15', '2024-05-15', 'Kahuripan, Kab. Sidoarjo', 5),
(10, 3, 8, 5, 'Pribadi', '2024-05-15', '2024-05-15', 'Kahuripan, Kab. Sidoarjo', 5),
(11, 3, 9, 6, 'Pribadi', '2024-05-15', '2024-05-15', 'Buduran, Kab. Sidoarjo', 5),
(12, 1, 10, 7, 'Pribadi', '2024-06-15', '2024-06-15', 'Candi, Kab. Sidoarjo', 10),
(13, 1, 11, 8, 'Pribadi', '2024-06-15', '2024-06-15', 'Candi, Kab. Sidoarjo', 10),
(14, 1, 12, 9, 'Pribadi', '2024-06-15', '2024-06-15', 'Candi, Kab. Sidoarjo', 10),
(15, 1, 13, 10, 'Pribadi', '2024-06-15', '2024-06-15', 'Candi, Kab. Sidoarjo', 10),
(18, 12, 16, 11, 'Pribadi', '2024-07-16', '2024-07-16', 'Jl. Raya Sawunggaling No.4, Jemundo, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257', 4),
(19, 12, 17, 12, 'Pribadi', '2024-07-16', '2024-07-16', 'Jl. Jenggolo No.2 A, Bedrek, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61219', 3),
(20, 12, 18, 13, 'Pribadi', '2024-07-16', '2024-07-16', 'Jl. Raya Sawunggaling No.4, Jemundo, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257', 5),
(21, 12, 19, 14, 'Pribadi', '2024-07-16', '2024-07-16', 'Candi, Kab. Sidoarjo', 4),
(22, 1, 20, 15, 'Pribadi', '2024-07-16', '2024-07-16', 'Desa Kalitengah RT 04/RW 03, Kec. Tanggulangin, Kab. Sidoarjo', 5),
(23, 13, 21, 16, 'Restoran', '2024-08-16', '2024-06-16', 'Jl. Raya Tanggulangin No.25, Kedunganten, Kalitengah, Kec. Tanggulangin', 8),
(24, 13, 22, 17, 'Restoran', '2024-08-17', '2024-08-17', 'Jl. Raya Tanggulangin No.25, Kedunganten, Kalitengah, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272', 8),
(25, 14, 23, 18, 'Pribadi', '2024-08-17', '2024-08-17', 'Kahuripan, Kab. Sidoarjo', 4),
(26, 14, 24, 19, 'Restoran', '2024-08-17', '2024-08-17', 'Jl. Raya Sawunggaling No.4, Jemundo, Kec. Taman, Kabupaten Sidoarjo, Jawa Timur 61257', 9),
(27, 14, 25, 20, 'Restoran', '2024-08-17', '2024-08-17', 'Jl. Jenggolo No.2 A, Bedrek, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61219', 7),
(28, 14, 27, 22, 'Pribadi', '2024-08-17', '2024-08-17', 'Jl. Raya Tanggulangin No.25, Kedunganten, Kalitengah, Kec. Tanggulangin', 3),
(29, 14, 29, 24, 'Pribadi', '2024-08-17', '2024-08-17', 'Buduran, Kab. Sidoarjo', 4),
(32, 12, 32, 26, 'Pribadi', '2024-06-18', '2024-06-18', 'Jl. Jenggolo No.2 A, Bedrek, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61219', 3),
(33, 12, 33, 27, 'Restoran', '2024-06-18', '2024-06-18', 'Jl. Jenggolo No.2 A, Bedrek, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61219', 5),
(34, 1, 34, 28, 'Pribadi', '2024-06-18', '2024-06-18', 'Jl. Raya Tanggulangin No.25, Kedunganten, Kalitengah, Kec. Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272', 4),
(37, 12, 37, 31, 'Pribadi', '2024-06-19', '2024-06-19', 'Kahuripan, Sidoarjo', 5),
(39, 16, 39, 33, 'Pribadi', '2024-06-19', '2024-06-19', 'sukodono', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tbl_insentif`
--
ALTER TABLE `tbl_insentif`
  ADD PRIMARY KEY (`ID_INSENTIF`),
  ADD KEY `FK_MEMILIKI` (`ID_PENGGUNA`),
  ADD KEY `FK_MENGHASILKAN2` (`ID_PERMINTAAN`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indeks untuk tabel `tbl_pengumpulan`
--
ALTER TABLE `tbl_pengumpulan`
  ADD PRIMARY KEY (`ID_KUMPUL`),
  ADD KEY `FK_MENERIMA_PENGUMPULAN` (`ID_PERMINTAAN`);

--
-- Indeks untuk tabel `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD PRIMARY KEY (`ID_PERMINTAAN`),
  ADD KEY `FK_MEMINTA` (`ID_PENGGUNA`),
  ADD KEY `FK_MENERIMA_PENGUMPULAN2` (`ID_KUMPUL`),
  ADD KEY `FK_MENGHASILKAN` (`ID_INSENTIF`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_insentif`
--
ALTER TABLE `tbl_insentif`
  MODIFY `ID_INSENTIF` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `ID_PENGGUNA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumpulan`
--
ALTER TABLE `tbl_pengumpulan`
  MODIFY `ID_KUMPUL` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  MODIFY `ID_PERMINTAAN` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
