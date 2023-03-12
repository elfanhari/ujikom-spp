-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 01:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elfan_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `buktipembayarans`
--

CREATE TABLE `buktipembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran_id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buktipembayarans`
--

INSERT INTO `buktipembayarans` (`id`, `identifier`, `pembayaran_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'iCYZo1678025609u5Gvo', 32, 'buktipembayaran1678025609.jpg', '2023-03-05 14:13:29', '2023-03-12 00:25:48'),
(2, 'ilcyb1678028312CyJk8', 33, 'buktipembayaran1678028312.png', '2023-03-05 14:58:32', '2023-03-12 00:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `bulanbayars`
--

CREATE TABLE `bulanbayars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulanbayars`
--

INSERT INTO `bulanbayars` (`id`, `identifier`, `name`, `created_at`, `updated_at`) VALUES
(1, 'iwHtg1678580748vnupd', 'Januari', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(2, 'iMtm21678580748TFRGa', 'Februari', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(3, 'ikYpa16785807482Q0Bx', 'Maret', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(4, 'iZdLX167858074863O34', 'April', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(5, 'ivvdg1678580748s6VXy', 'Mei', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(6, 'iM7OT1678580748QytJp', 'Juni', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(7, 'iTytv1678580748LLCmA', 'Juli', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(8, 'i9nTz1678580748L0sxL', 'Agustus', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(9, 'iPamW1678580748MK6sS', 'September', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(10, 'icjl01678580748VAKPt', 'Oktober', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(11, 'iv6lA1678580748g59Bv', 'November', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(12, 'iqIhu1678580748fHP3G', 'Desember', '2023-03-12 00:25:48', '2023-03-12 00:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensikeahlian_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `identifier`, `kompetensikeahlian_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'igI5m1678580747lfxwq', 1, 'XII RPL 1', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(2, 'iNMBF1678580747zRkr3', 1, 'XII RPL 2', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(3, 'i9N2E1678580747nWJhi', 2, 'XII AKL 2', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(4, 'iBCYy1678580747GKKCc', 3, 'XII TBSM 1', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(5, 'iv3pe1678580747sH8WJ', 4, 'XII TKRO 1', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(6, 'iyTjQ1678580747e0ZqD', 5, 'XII APHP 1', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(7, 'i7F9f1678580747Co3zG', 6, 'XII APAT', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(8, 'ifwOo16785807474CU7C', 2, 'XI AKL 1', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(9, 'imO601678580747pLP7p', 1, 'X RPL 1', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kompetensikeahlians`
--

CREATE TABLE `kompetensikeahlians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetensikeahlians`
--

INSERT INTO `kompetensikeahlians` (`id`, `identifier`, `name`, `singkatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ijoXb167858074720IkC', 'Rekayasa Perangkat Lunak', 'RPL', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(2, 'ibnNI1678580747ODW0p', 'Akuntansi dan Keuangan Lembaga', 'AKL', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(3, 'iKFU91678580747iilGb', 'Teknik Bisnis Sepeda Motor', 'TBSM', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(4, 'isg1p1678580747F6fzX', 'Teknik Kendaraan Ringan Otomotif', 'TKRO', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(5, 'i27g9167858074745QZ5', 'Agribisnis Pengolahan Hasil Pertanian', 'APHP', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(6, 'iEI621678580747yrM80', 'Agribisnis Pengolahan Air Tawar', 'APAT', '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logaktivitas`
--

CREATE TABLE `logaktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `aktivitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayarans`
--

CREATE TABLE `metodepembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atasnama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metodepembayarans`
--

INSERT INTO `metodepembayarans` (`id`, `identifier`, `payment`, `number`, `atasnama`, `created_at`, `updated_at`) VALUES
(1, 'ixJLJ1678580748V4lmV', 'Transfer Bank - BCA', '912785603', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(2, 'iMroC1678580748B0VAH', 'Transfer Bank - MANDIRI', '912785603', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(3, 'if7mW16785807487liGl', 'Transfer Bank - BRI', '912785603', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(4, 'i8oBN16785807481ATBV', 'Transfer Bank - BJB', '912785603', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(5, 'ict6A1678580748KYkI0', 'GOPAY', '085315755352', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(6, 'iUuum1678580748NOMRz', 'DANA', '085315755352', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(7, 'iEWUQ16785807485tc3Z', 'SHOPEEPAY', '085315755352', 'SMK REKAYASA', '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(8, 'iLXDZ1678580748elM2d', 'CASH', NULL, NULL, '2023-03-12 00:25:48', '2023-03-12 00:25:48'),
(9, 'iT8dP1678580748PRVCL', 'Lainnya', NULL, NULL, '2023-03-12 00:25:48', '2023-03-12 00:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_01_29_142142_create_kompetensikeahlians_table', 1),
(6, '2023_01_29_142311_create_kelas_table', 1),
(7, '2023_01_29_142509_create_spps_table', 1),
(8, '2023_01_29_142533_create_pembayarans_table', 1),
(9, '2023_02_06_135950_create_userphotos_table', 1),
(10, '2023_02_08_134336_create_bulanbayars_table', 1),
(11, '2023_02_13_215925_create_buktipembayarans_table', 1),
(12, '2023_02_13_221902_create_metodepembayarans_table', 1),
(13, '2023_02_14_231420_create_notifikasis_table', 1),
(14, '2023_03_04_235417_create_jobs_table', 1),
(15, '2023_03_09_190812_create_logaktivitas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim_id` bigint(20) UNSIGNED NOT NULL,
  `penerima_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` enum('info','sukses','peringatan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasis`
--

INSERT INTO `notifikasis` (`id`, `identifier`, `pengirim_id`, `penerima_id`, `pesan`, `tipe`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 'iPrrr1678027953KUkvW', 1, 7, 'Halo, Elfan Hari Saputra! Anda belum melakukan pembayaran untuk Januari - 2022. Segera lakukan pembayaran ya!', 'peringatan', 1, '2023-03-05 13:13:29', '2023-03-12 00:25:48'),
(2, 'i5ib01678025609L2AT4', 1, 7, 'Transaksi anda dengan kode I0LWQ1678025608MRU4H sedang diproses! Tunggu konfirmasi selanjutnya dari petugas!', 'info', 0, '2023-03-05 14:13:29', '2023-03-12 00:25:48'),
(3, 'i4Wbq1678025609FEyLY', 7, NULL, 'Elfan Hari Saputra - XII RPL 1 melakukan pembayaran mandiri untuk Januari 2022 dengan kode transaksi I0LWQ1678025608MRU4H pada tanggal 05-03-2023 pukul 21:13:29 WIB.', 'info', 0, '2023-03-05 14:13:29', '2023-03-12 00:25:48'),
(4, 'iXLVT1678028312b1Jml', 8, NULL, 'Alfitka Haerul Kurniawan - XII AKL 2 melakukan pembayaran mandiri untuk September 2020 dengan kode transaksi IWVCM16780283129PUE3 pada tanggal 05-03-2023 pukul 21:58:32 WIB.', 'info', 1, '2023-03-05 14:58:32', '2023-03-12 00:25:48'),
(5, 'iWJ0I1678028364OGUDP', 4, 8, 'Transaksi anda dengan kode IWVCM16780283129PUE3 gagal diproses! Silahkan lakukan pembayaran ulang dengan melampirkan bukti transfer yang valid atau melakukan pembayaran melalui petugas di Ruang Tata Usaha. Terima kasih', 'peringatan', 1, '2023-03-05 14:59:24', '2023-03-12 00:25:48');

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
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `bulanbayar_id` bigint(20) UNSIGNED NOT NULL,
  `metodepembayaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggalbayar` date NOT NULL,
  `tahunbayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahbayar` bigint(20) NOT NULL,
  `jenistransaksi` enum('mandiri','petugas') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('diproses','sukses','gagal') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `identifier`, `petugas_id`, `siswa_id`, `bulanbayar_id`, `metodepembayaran_id`, `tanggalbayar`, `tahunbayar`, `jumlahbayar`, `jenistransaksi`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'itesV16785807471ujRe', 6, 8, 7, 8, '2023-02-01', '2020', 100000, 'petugas', 'sukses', '2023-02-01 03:43:23', '2023-03-12 00:25:47', NULL),
(2, 'iJeZm1678580747rQAoy', 3, 8, 8, 8, '2023-02-01', '2020', 100000, 'petugas', 'sukses', '2023-02-01 04:43:23', '2023-03-12 00:25:47', NULL),
(3, 'ivzVf1678580747DKYL0', 3, 9, 7, 8, '2023-02-02', '2020', 100000, 'petugas', 'sukses', '2023-02-02 03:43:23', '2023-03-12 00:25:47', NULL),
(4, 'iPzpp1678580747KQpH3', 6, 10, 7, 8, '2023-02-03', '2022', 120000, 'petugas', 'sukses', '2023-02-03 03:43:23', '2023-03-12 00:25:47', NULL),
(5, 'id24i1678580747ZDgGq', 1, 12, 7, 8, '2023-02-04', '2020', 100000, 'petugas', 'sukses', '2023-02-04 03:43:23', '2023-03-12 00:25:47', NULL),
(6, 'i0FbM1678580747lca1E', 1, 12, 8, 8, '2023-02-06', '2020', 100000, 'petugas', 'sukses', '2023-02-06 03:43:23', '2023-03-12 00:25:47', NULL),
(7, 'iza3H1678580747VkpWA', 6, 12, 9, 8, '2023-02-10', '2020', 100000, 'petugas', 'sukses', '2023-02-10 03:43:23', '2023-03-12 00:25:47', NULL),
(8, 'ivQM316785807471vEGp', 1, 13, 7, 8, '2023-02-13', '2021', 110000, 'petugas', 'sukses', '2023-02-13 03:43:23', '2023-03-12 00:25:47', NULL),
(9, 'iTzlE16785807477BjqO', 2, 13, 8, 8, '2023-02-13', '2021', 110000, 'petugas', 'sukses', '2023-02-13 03:53:23', '2023-03-12 00:25:47', NULL),
(10, 'iYyiJ1678580747hkgeC', 3, 14, 7, 8, '2023-02-14', '2022', 120000, 'petugas', 'sukses', '2023-02-14 03:43:23', '2023-03-12 00:25:47', NULL),
(11, 'i3Cwg1678580747LOjdE', 4, 14, 8, 8, '2023-02-14', '2022', 120000, 'petugas', 'sukses', '2023-02-14 03:44:23', '2023-03-12 00:25:47', NULL),
(12, 'iDu7I1678580747XnqEV', 5, 16, 7, 8, '2023-02-24', '2020', 100000, 'petugas', 'sukses', '2023-02-24 03:43:23', '2023-03-12 00:25:47', NULL),
(13, 'iYuJj1678580747PDurH', 6, 11, 7, 8, '2023-02-25', '2020', 100000, 'petugas', 'sukses', '2023-02-25 03:43:23', '2023-03-12 00:25:47', NULL),
(14, 'iOSZF1678580747Nqb1Q', 4, 7, 7, 8, '2023-02-02', '2020', 100000, 'petugas', 'sukses', '2023-02-02 03:43:23', '2023-03-12 00:25:47', NULL),
(15, 'iPTLq1678580747s4xYI', 1, 7, 8, 8, '2023-02-03', '2020', 100000, 'petugas', 'sukses', '2023-02-03 03:43:23', '2023-03-12 00:25:47', NULL),
(16, 'iywkJ1678580747yEsa8', 2, 7, 9, 8, '2023-02-09', '2020', 100000, 'petugas', 'sukses', '2023-02-09 03:43:23', '2023-03-12 00:25:47', NULL),
(17, 'iDPSM1678580747D1fW0', 2, 7, 10, 8, '2023-02-13', '2020', 100000, 'petugas', 'sukses', '2023-02-14 03:43:23', '2023-03-12 00:25:47', NULL),
(18, 'ikRmF1678580747W3HT2', 6, 7, 11, 8, '2023-02-14', '2020', 100000, 'petugas', 'sukses', '2023-02-14 03:43:23', '2023-03-12 00:25:47', NULL),
(19, 'ikHou1678580747BzYXK', 6, 7, 12, 8, '2023-02-15', '2020', 100000, 'petugas', 'sukses', '2023-02-14 03:43:24', '2023-03-12 00:25:47', NULL),
(20, 'i0ZSk1678580747qVvqo', 3, 7, 1, 8, '2023-02-16', '2021', 100000, 'petugas', 'sukses', '2023-02-16 03:43:28', '2023-03-12 00:25:47', NULL),
(21, 'izUlr1678580747znFUO', 1, 7, 2, 8, '2023-02-17', '2021', 100000, 'petugas', 'sukses', '2023-02-17 03:43:20', '2023-03-12 00:25:47', NULL),
(22, 'iqjZy1678580747Kh9DQ', 6, 7, 3, 8, '2023-02-18', '2021', 100000, 'petugas', 'sukses', '2023-02-18 03:43:27', '2023-03-12 00:25:47', NULL),
(23, 'iL5Zv1678580747phJpV', 6, 7, 4, 8, '2023-02-19', '2021', 100000, 'petugas', 'sukses', '2023-02-19 03:43:29', '2023-03-12 00:25:47', NULL),
(24, 'i7GOt16785807477JIss', 1, 7, 5, 8, '2023-02-20', '2021', 100000, 'petugas', 'sukses', '2023-02-20 03:43:27', '2023-03-12 00:25:47', NULL),
(25, 'iG8rY1678580747VxiLb', 3, 7, 6, 8, '2023-02-21', '2021', 100000, 'petugas', 'sukses', '2023-02-21 03:43:21', '2023-03-12 00:25:47', NULL),
(26, 'iKrcJ1678580747RWIQK', 6, 7, 7, 8, '2023-02-22', '2021', 100000, 'petugas', 'sukses', '2023-02-22 03:43:25', '2023-03-12 00:25:47', NULL),
(27, 'iDMq11678580747kUi5J', 4, 7, 8, 8, '2023-02-23', '2021', 100000, 'petugas', 'sukses', '2023-02-23 03:43:20', '2023-03-12 00:25:47', NULL),
(28, 'iWnXz16785807476T1sA', 4, 7, 9, 8, '2023-02-24', '2021', 100000, 'petugas', 'sukses', '2023-02-24 03:43:20', '2023-03-12 00:25:47', NULL),
(29, 'iHEfs1678580747Ja5mq', 1, 7, 10, 8, '2023-02-25', '2021', 100000, 'petugas', 'sukses', '2023-02-25 03:43:28', '2023-03-12 00:25:47', NULL),
(30, 'i9pQJ1678580747nCl7B', 1, 7, 11, 8, '2023-02-26', '2021', 100000, 'petugas', 'sukses', '2023-02-26 03:43:28', '2023-03-12 00:25:47', NULL),
(31, 'iOFVL1678580747XPkXl', 1, 7, 12, 8, '2023-02-27', '2021', 100000, 'petugas', 'sukses', '2023-02-27 03:43:24', '2023-03-12 00:25:47', NULL),
(32, 'i0lwQ1678025608mRu4H', NULL, 7, 1, 3, '2023-03-05', '2022', 100000, 'mandiri', 'diproses', '2023-03-05 14:13:29', '2023-03-12 00:25:47', NULL),
(33, 'iWvcm16780283129PuE3', 4, 8, 9, 4, '2023-03-05', '2020', 100000, 'mandiri', 'gagal', '2023-03-05 14:58:32', '2023-03-12 00:25:47', NULL);

--
-- Triggers `pembayarans`
--
DELIMITER $$
CREATE TRIGGER `add_pembayaran_mandiri` AFTER INSERT ON `pembayarans` FOR EACH ROW BEGIN
                IF NEW.petugas_id IS NULL THEN
                INSERT INTO logaktivitas (created_at, user_id, aktivitas, tabel, created_at) VALUES (now(), NEW.siswa_id, CONCAT('Melakukan transaksi secara mandiri. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_pembayaran_petugas` AFTER INSERT ON `pembayarans` FOR EACH ROW BEGIN
                IF NEW.petugas_id IS NOT NULL THEN
                INSERT INTO logaktivitas (user_id, aktivitas, tabel, created_at) VALUES (NEW.petugas_id, CONCAT('Menambah transaksi pembayaran. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pembayaran_gagal` AFTER UPDATE ON `pembayarans` FOR EACH ROW BEGIN
                IF NEW.status = 'gagal' THEN
                INSERT INTO logaktivitas (user_id, aktivitas, tabel, created_at) VALUES (NEW.petugas_id, CONCAT('Mengubah status pembayaran dari DIPROSES menjadi GAGAL. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pembayaran_sukses` AFTER UPDATE ON `pembayarans` FOR EACH ROW BEGIN
                IF NEW.status = 'sukses' THEN
                INSERT INTO logaktivitas (user_id, aktivitas, tabel, created_at) VALUES (NEW.petugas_id, CONCAT('Mengubah status pembayaran dari DIPROSES menjadi SUKSES. Kode transaksi: ',  UPPER(NEW.identifier)), 'pembayarans', now());
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `spps`
--

CREATE TABLE `spps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spps`
--

INSERT INTO `spps` (`id`, `identifier`, `tahun`, `nominal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iQRyL1678580747VoGKE', '2020', 100000, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(2, 'iwD9116785807470N7NM', '2021', 110000, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(3, 'ivuJF1678580747PtQUY', '2022', 120000, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(4, 'iNNjA1678580747hoCo2', '2023', 130000, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userphotos`
--

CREATE TABLE `userphotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userphotos`
--

INSERT INTO `userphotos` (`id`, `user_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 7, 'gallery1678026555.jpg', '2023-03-05 14:29:15', '2023-03-12 00:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas','siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jk` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `spp_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `identifier`, `name`, `level`, `kelas_id`, `jk`, `spp_id`, `nisn`, `nis`, `telepon`, `alamat`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ivJhf1678580745fCG0n', 'Yasrifan S.Kom', 'petugas', NULL, 'laki-laki', NULL, NULL, NULL, '0837427647263', NULL, 'yasrifanpetugas@example.com', 'yasrifanpetugas', NULL, '$2y$10$ND2jBU8nYkHenkqoHnLut.xoQiUSFkXhgB5Hgo7RJi1JpacyblECu', NULL, '2023-03-12 00:25:45', '2023-03-12 00:25:45', NULL),
(2, 'ir6fn1678580745saNLy', 'Dian Nugraha, S.T', 'petugas', NULL, 'laki-laki', NULL, NULL, NULL, '085878434176', NULL, 'diansrpl1@gmail.com', 'dianpetugas', NULL, '$2y$10$4XMj03In.GrVCEI9xJJJCOcxageE1xjduWuQY.fR0ZX31zTSxtiLK', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(3, 'iX2u516785807454U3hD', 'Rini, S.Kom', 'petugas', NULL, 'laki-laki', NULL, NULL, NULL, '087623481434', NULL, 'rinipetugas@example.com', 'rinipetugas', NULL, '$2y$10$fpU.7k0rGuov9WGFrzD.OeygufDnbmMSMlihTm5/Y5JXOgUb8kquC', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(4, 'iWiJS1678580745P8xq7', 'Maman Suparman, S.T', 'admin', NULL, 'laki-laki', NULL, NULL, NULL, '087623481434', NULL, 'mamanrpl1@gmail.com', 'mamanadmin', NULL, '$2y$10$yAiINORbI0xrgofR91Tf5.s8ISmX.lG4yaMVDjww.b65YjivLTqFq', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(5, 'i8DKC1678580745Badnh', 'Wahyu Suryaman, S.T', 'admin', NULL, 'laki-laki', NULL, NULL, NULL, '086273647241', NULL, 'wahyuadmin@example.com', 'wahyuadmin', NULL, '$2y$10$09ezdCheCEdQ4eLAHrhpWuY4XwsIHfqUB4TaG1QCc1QT9vvmdMKN.', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(6, 'ixFYn1678580745OEBAj', 'Deni, S.Kom', 'admin', NULL, 'laki-laki', NULL, NULL, NULL, '087623481434', NULL, 'deniadmin@example.com', 'deniadmin', NULL, '$2y$10$ui.RTe3aWyLqwRaGg21Amu/ZAS4XVRpNqJR.tv6b5Zh6UdOK.U3/O', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(7, 'iz9sB1678580745kSxag', 'Elfan Hari Saputra', 'siswa', 1, 'laki-laki', 1, '3071526318', '10.2021.334', '6285315755352', 'Jl. Raya Lakbok', 'elfanhari88@gmail.com', 'elfansiswa', NULL, '$2y$10$D9X81UWfUkwM4PGw6DjfL.JajMOiSqOjlUwUZsPzh7/FyXa2yrnN6', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(8, 'itZUC1678580745jkjGL', 'Alfitka Haerul Kurniawan', 'siswa', 3, 'laki-laki', 1, '3071526387', '10.2021.323', '081234567878', 'Jl. Raya Langensari', 'alfitkasiswa@example.com', 'alfitkasiswa', NULL, '$2y$10$nAk07HAz/63vfeEJV8mol.iT1xOq9AiKfGnim7J5OmpNC1BhqIgQy', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(9, 'ifbq81678580745UqEdf', 'Khikmal Kurniawan', 'siswa', 3, 'laki-laki', 1, '3071526312', '10.2021.001', '081234567432', 'Jl. Raya Padaringan', 'khikmalsiswa@example.com', 'khikmalsiswa', NULL, '$2y$10$zomJN5xqxZ7EWgfK0sV31OpDXG0Q/j3WRoKXlkeCbLXaFv141bYmy', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(10, 'iXhr81678580745xfDdG', 'Maya', 'siswa', 9, 'perempuan', 3, '3071576343', '10.2021.002', '081290567523', 'Jl. Raya Padaringan', 'mayasiswa@example.com', 'mayasiswa', NULL, '$2y$10$BHk5YphzJ8zS5MsK96RbwehBqMmSjYVZbIw3MTcchffj2T1BhVpc.', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(11, 'iAUbO1678580745ZG9lp', 'Bunga', 'siswa', 3, 'perempuan', 1, '3781576387', '10.2021.003', '081234567523', 'Jl. Raya Pondokunyur', 'bungasiswa@example.com', 'bungasiswa', NULL, '$2y$10$IxZbAYuMJUV2HzyS83sLeedNDnp9251l6umXyZhNU7o8D6p9eSTV2', NULL, '2023-03-12 00:25:46', '2023-03-12 00:25:46', NULL),
(12, 'i5KYU1678580745np1XA', 'Cantika', 'siswa', 1, 'perempuan', 1, '3071587387', '10.2021.004', '081231267523', 'Jl. Raya Kiarapayung', 'cantikasiswa@example.com', 'cantikasiswa', NULL, '$2y$10$dnX.uZ/FT9hIiiU5JP7xNudIT0/HQs3VndIQBQFeWkjBg3UqqGVHq', NULL, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(13, 'iZes816785807456EdfJ', 'Yesi', 'siswa', 8, 'perempuan', 2, '3079076387', '10.2021.005', '081212567523', 'Jl. Raya Majenang', 'yesisiswa@example.com', 'yesisiswa', NULL, '$2y$10$Si59ozKEmOo5EKxwd6lLg.1TryJFNRvwdgHdLwUzGzIiobOp8F.RC', NULL, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(14, 'itIbW1678580745HIdsa', 'Fera', 'siswa', 9, 'perempuan', 3, '3082576387', '10.2021.006', '081230967523', 'Jl. Raya Banjar', 'ferasiswa@example.com', 'ferasiswa', NULL, '$2y$10$lyD15ywDMWNrpMINCiyppOTRs3PvLkDaCz5FjaxSjhfW7Y5MwnFFi', NULL, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(15, 'iBZFK1678580745TMhkl', 'Andre Daniswara Putra', 'siswa', 1, 'laki-laki', 1, '3071626387', '10.2021.007', '081231267523', 'Jl. Raya Kalapasawit', 'andresiswa@example.com', 'andresiswa', NULL, '$2y$10$sqDHrClIICSORK.DZH2/.eSxfwzn8sjZfCN3CWktCG8ZqkyojnyyO', NULL, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL),
(16, 'iOL9T1678580745KS88e', 'Teguh Afriansyah', 'siswa', 1, 'laki-laki', 1, '3071626237', '10.2021.008', '081232367523', 'Jl. Raya Pondokunyur', 'teguhsiswa@example.com', 'teguhsiswa', NULL, '$2y$10$zRvp2Vo1IdqBLa.n4hFfU.20th0kH7SyCm069Lps/91cvvmPONj1q', NULL, '2023-03-12 00:25:47', '2023-03-12 00:25:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buktipembayarans`
--
ALTER TABLE `buktipembayarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buktipembayarans_identifier_unique` (`identifier`);

--
-- Indexes for table `bulanbayars`
--
ALTER TABLE `bulanbayars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bulanbayars_identifier_unique` (`identifier`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_identifier_unique` (`identifier`);

--
-- Indexes for table `kompetensikeahlians`
--
ALTER TABLE `kompetensikeahlians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kompetensikeahlians_identifier_unique` (`identifier`);

--
-- Indexes for table `logaktivitas`
--
ALTER TABLE `logaktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metodepembayarans`
--
ALTER TABLE `metodepembayarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metodepembayarans_identifier_unique` (`identifier`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notifikasis_identifier_unique` (`identifier`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayarans_identifier_unique` (`identifier`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `spps_identifier_unique` (`identifier`);

--
-- Indexes for table `userphotos`
--
ALTER TABLE `userphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_identifier_unique` (`identifier`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buktipembayarans`
--
ALTER TABLE `buktipembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bulanbayars`
--
ALTER TABLE `bulanbayars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kompetensikeahlians`
--
ALTER TABLE `kompetensikeahlians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logaktivitas`
--
ALTER TABLE `logaktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metodepembayarans`
--
ALTER TABLE `metodepembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spps`
--
ALTER TABLE `spps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userphotos`
--
ALTER TABLE `userphotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
