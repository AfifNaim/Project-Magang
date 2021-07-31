-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2021 pada 20.24
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_v3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Tidak berkategori', '2021-07-28 15:15:49', '2021-07-28 15:15:49'),
(47, 'Gaji Karyawan', '2021-07-15 14:59:13', '2021-07-15 14:59:13'),
(48, 'Beli Bahan Baku', '2021-07-15 14:59:26', '2021-07-15 14:59:26'),
(49, 'Pemasukan Penjualan', '2021-07-15 14:59:37', '2021-07-15 14:59:37'),
(50, 'Bandungan Skuy', '2021-07-27 12:38:31', '2021-07-27 12:38:31'),
(52, 'Tuku Udud', '2021-07-27 12:38:51', '2021-07-27 12:38:51'),
(54, 'Utang Helmy', '2021-07-28 14:54:03', '2021-07-28 14:54:03'),
(56, 'Pemasukan Wajib', '2021-07-29 03:33:54', '2021-07-29 03:33:54'),
(57, 'Gaji karyawan', '2021-07-29 03:34:05', '2021-07-29 03:34:05');

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
(4, '2020_04_17_053928_create_kategoris_table', 1),
(5, '2020_04_17_053941_create_transaksis_table', 1);

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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('Pemasukan','Pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `jenis`, `kategori_id`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(55, '2021-07-07', 'Pengeluaran', 50, 600000, 'Dijak helmy geden', '2021-07-27 12:39:54', '2021-07-27 12:39:54'),
(56, '2021-07-27', 'Pengeluaran', 57, 10000000, 'Gor guyon', '2021-07-27 12:40:40', '2021-07-29 03:36:13'),
(58, '2021-07-28', 'Pemasukan', 1, 100000, 'ngepet', '2021-07-28 15:16:58', '2021-07-28 15:16:58'),
(59, '2021-07-28', 'Pengeluaran', 1, 10000, NULL, '2021-07-28 15:17:39', '2021-07-28 15:18:10'),
(60, '2021-06-24', 'Pemasukan', 56, 10000000, 'Dapet bonus gan', '2021-07-29 03:34:57', '2021-07-29 03:34:57'),
(61, '2021-07-29', 'Pengeluaran', 48, 500000, 'Beli bahan kain', '2021-07-29 03:35:27', '2021-07-29 03:35:27'),
(62, '2021-01-01', 'Pemasukan', 50, 50, NULL, '2021-07-31 17:33:45', '2021-07-31 17:33:45'),
(63, '2021-01-01', 'Pemasukan', 50, 10000, NULL, '2021-07-31 17:54:00', '2021-07-31 17:54:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','bendahara') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Apip', 'admin@admin.com', NULL, '$2y$10$GOsnIYShDpcYuIvUFNurv.5yODSZC/9fXGSqPwzKMrkoPHP8BzTDq', 'admin', '1627389798_laptop-user-1-1179329.png', NULL, '2020-04-16 22:42:15', '2021-07-27 12:43:18'),
(7, 'Bendahara Afif', 'afifnaim24@gmail.com', NULL, '$2y$10$EIf/CUCzkup9o8YTtz6kxuaIpOXzdlNwIuatmeAvEIt.iGZ2XEsve', 'bendahara', '', NULL, '2021-07-17 18:35:31', '2021-07-17 18:35:31'),
(8, 'SekertarisKu', 'afifnaim10@gmail.com', NULL, '$2y$10$ugzw5Dpxp9iweIZ0C6Z46.H64wjdVDjqoSrwy8JebXsoQcRvDHWQq', 'bendahara', '', NULL, '2021-07-27 12:42:13', '2021-07-27 12:42:13'),
(9, 'bambang', 'bambang@gmail.com', NULL, '$2y$10$T3Z9HAc.EwKq.eUw7TfAuubVFNICehhIFqpVB.q9kH9HSidkPcoGC', 'bendahara', '1627529917_BUAT PERSENTASI PROJECT.jfif', NULL, '2021-07-29 03:38:37', '2021-07-29 03:39:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
