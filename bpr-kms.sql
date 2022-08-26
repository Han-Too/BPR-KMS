-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 10.46
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpr-kms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departemens`
--

INSERT INTO `departemens` (`id`, `kode_departemen`, `departemen`, `deskripsi`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'DP003', 'Keuangan', 'Keuangan', NULL, '2022-06-08 20:06:39', '2022-06-08 20:06:39'),
(4, 'DP002', 'Sosial', 'Sosial Media', NULL, '2022-06-08 20:19:53', '2022-06-08 20:19:53'),
(5, 'DP001', 'Keanggotaan', 'Keanggotaan utama', NULL, '2022-06-08 21:05:43', '2022-06-08 21:05:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `kode_jabatan`, `jabatan`, `deskripsi`, `kode_departemen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JB202', 'Ketua', 'KETUA', 'DP003', NULL, '2022-06-09 00:21:45', '2022-06-09 00:24:33'),
(2, 'JB201', 'Staff', 'Staff', 'DP001', NULL, '2022-06-09 00:24:24', '2022-06-09 00:24:24'),
(3, 'JB203', 'Driver', 'Departemen Baru', 'DP002', NULL, '2022-06-23 00:00:11', '2022-06-23 00:00:11'),
(4, 'JB204', 'Ketua Divisi', 'baru', 'DP002', NULL, '2022-06-23 00:01:10', '2022-06-23 00:01:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) NOT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `kode_kegiatan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(2048) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `kode_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `tanggal`, `kode_kegiatan`, `file`, `deskripsi`, `kode_jabatan`, `created_at`, `updated_at`) VALUES
(18, '2022-06-23', 'K01', 'post-file/y2mate.com - Creative short film Wonderful little world_480p (3) (1).mp4', 'kegiatan 1', 'JB201', '2022-06-23 01:44:10', '2022-06-23 01:44:10'),
(19, '2022-06-25', 'K02', 'post-file/y2mate.com - Creative short film Wonderful little world_480p (3) (1).mp4', 'Kegiatan 2', 'JB201', '2022-06-23 01:44:26', '2022-06-23 01:44:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_22_081127_create_peraturans_table', 2),
(6, '2021_09_22_081127_create_sops_table', 3),
(7, '2014_10_12_000000_create_departemen_table', 4),
(8, '2014_10_12_000000_create_jabatan_table', 5),
(9, '2021_09_22_081127_create_pengetahuans_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuans`
--

CREATE TABLE `pengetahuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_pengetahuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengetahuans`
--

INSERT INTO `pengetahuans` (`id`, `tanggal`, `kode_pengetahuan`, `file`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '2022-07-12', 'P01', 'C:\\xampp\\tmp\\phpC6B8.tmp', 'Tata Cara Buka Rekening', '2022-07-07 01:08:32', '2022-07-07 01:08:32'),
(2, '2022-07-01', 'P02', 'C:\\xampp\\tmp\\php9C11.tmp', 'Nyoba Nyoba', '2022-07-07 01:11:38', '2022-07-07 01:11:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturans`
--

CREATE TABLE `peraturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_peraturan` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_peraturan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institusi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peraturans`
--

INSERT INTO `peraturans` (`id`, `tanggal`, `kode_peraturan`, `nomor_peraturan`, `institusi`, `file`, `created_at`, `updated_at`) VALUES
(11, '2022-07', 'P01', '111000111', 'UNPAM', 'post-file/MIS014 - DSS (1).pdf', '2022-06-23 01:43:27', '2022-06-23 01:43:27'),
(12, '2022-05', 'P02', '111000222', 'BPR', 'post-file/MIS014 - DSS (1).pdf', '2022-06-23 01:43:48', '2022-06-23 01:43:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peraturan_teknis`
--

CREATE TABLE `peraturan_teknis` (
  `kode_kegiatan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_peraturan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sops`
--

CREATE TABLE `sops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_sop` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_dokumen` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revisi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sops`
--

INSERT INTO `sops` (`id`, `tanggal`, `kode_sop`, `nomor_dokumen`, `file`, `deskripsi`, `revisi`, `kode_jabatan`, `created_at`, `updated_at`) VALUES
(11, '2022-06-21', '101', '110021', 'post-file/Muhamad FarhanNurananda-Tugas14.pdf', 'SOP Pertama', 'Pertama', 'JB201', '2022-06-21 21:51:47', '2022-06-21 21:51:47'),
(12, '2022-06-20', '903', '110023', 'post-file/MIS014 - DSS (1).pdf', 'SOP 1', 'Pertama', 'JB201', '2022-06-22 23:58:52', '2022-06-22 23:58:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_karyawan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_karyawan`, `profile_photo_path`, `name`, `tgl_masuk`, `tempat`, `tgl_lahir`, `agama`, `status_karyawan`, `alamat`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '181011', NULL, 'Wahyu Santoso', '2020-11-02', 'Semarang', '1998-11-02', 'Islam', 'Aktif', 'Jl.Jati3', '$2a$12$peCYe7kFU/TCQfJui1lwYeONAd2agwa89QZob0hatFUEh4Xg/ukH.', 'Administrator', NULL, '2021-11-22 05:03:25', '2022-06-02 00:11:45'),
(7, '181012', 'post-image-profile/sample.jpg', 'Muhammad Rizky', '2021-11-23', 'Jakarta', '2000-11-23', 'Islam', 'Aktif', 'Jl.Cileduk', '$2a$12$q.MpoZe2NF8EpCSP26wf9ugUKuONlGL6yKX6hVrlXcMmiub3WxeB.', 'Administrator', NULL, '2021-11-22 20:13:50', '2022-06-08 06:27:49'),
(13, '181014', NULL, 'Han', '2022-05-17', 'Tangsel', '2022-05-11', 'Islam', 'Aktif', 'Tangsel', '$2y$10$84XZ0E6oCdvWPlAQwUXDqONtScVlL3GdRwFbQurawKLdFOiB52CPq', 'Administrator', NULL, '2022-05-18 19:36:22', '2022-06-02 00:12:25'),
(14, '181015', NULL, 'Udin S', '2022-05-10', 'Tangsel', '2022-05-17', 'Islam', 'Aktif', 'Tangsel', '$2y$10$oTbwiCh0fEHDrGW1jXHa7.65TyWKk3ggFToxnd9MPcATEpEG6f1sC', 'Operator', NULL, '2022-05-18 20:17:05', '2022-06-09 01:10:36'),
(15, '181017', 'post-image-profile/wpp.jpg', 'Farhan', '2022-06-02', 'Depok', '2022-06-02', 'Islam', 'Aktif', 'Depok', '$2y$10$zUA2M8IKSfgnhw80GGqdvOgurs5iH.H3NhVwv7uMTF4Blkh5za3Z6', 'Operator', NULL, '2022-06-01 23:32:42', '2022-06-09 01:11:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_departemen` (`kode_departemen`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jabatan` (`kode_jabatan`),
  ADD KEY `kode_departemen` (`kode_departemen`);

--
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kegiatan` (`kode_kegiatan`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengetahuans`
--
ALTER TABLE `pengetahuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peraturans`
--
ALTER TABLE `peraturans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_peraturan` (`kode_peraturan`);

--
-- Indeks untuk tabel `peraturan_teknis`
--
ALTER TABLE `peraturan_teknis`
  ADD UNIQUE KEY `kode_kegiatan` (`kode_kegiatan`),
  ADD UNIQUE KEY `kode_peraturan` (`kode_peraturan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sops`
--
ALTER TABLE `sops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengetahuans`
--
ALTER TABLE `pengetahuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peraturans`
--
ALTER TABLE `peraturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sops`
--
ALTER TABLE `sops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD CONSTRAINT `jabatans_ibfk_1` FOREIGN KEY (`kode_departemen`) REFERENCES `departemens` (`kode_departemen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatans` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peraturan_teknis`
--
ALTER TABLE `peraturan_teknis`
  ADD CONSTRAINT `peraturan_teknis_ibfk_1` FOREIGN KEY (`kode_kegiatan`) REFERENCES `kegiatans` (`kode_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peraturan_teknis_ibfk_2` FOREIGN KEY (`kode_peraturan`) REFERENCES `peraturans` (`kode_peraturan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sops`
--
ALTER TABLE `sops`
  ADD CONSTRAINT `sops_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatans` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
