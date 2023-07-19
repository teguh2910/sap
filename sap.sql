-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 03:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sap`
--

-- --------------------------------------------------------

--
-- Table structure for table `additives`
--

CREATE TABLE `additives` (
  `id_additive` int(10) UNSIGNED NOT NULL,
  `kode_additive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_additive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_additive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `additives`
--

INSERT INTO `additives` (`id_additive`, `kode_additive`, `nama_additive`, `price_additive`, `created_at`, `updated_at`) VALUES
(1, 'AD01', 'SILICON', 10000, '2023-07-18 19:03:10', '2023-07-18 19:03:49'),
(2, 'AD02', 'TEMBAGA', 10000, '2023-07-18 19:03:21', '2023-07-18 19:03:21'),
(3, 'AD03', 'MAGNESIUM', 10000, '2023-07-18 19:03:29', '2023-07-18 19:03:29'),
(4, 'AD04', 'AL TAB MN', 1000, '2023-07-18 19:03:37', '2023-07-18 19:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id_bank` int(10) UNSIGNED NOT NULL,
  `kode_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_rek_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id_bank`, `kode_bank`, `nama_bank`, `no_rek_bank`, `currency_bank`, `created_at`, `updated_at`) VALUES
(1, 'B01', 'BNI', '4999955591', 'IDR', '2023-07-18 09:38:16', '2023-07-18 09:40:02'),
(2, 'B02', 'BCA', '7571999688', 'IDR', '2023-07-18 09:38:29', '2023-07-18 09:38:29'),
(3, 'B03', 'MANDIRI', '1560056775788', 'IDR', '2023-07-18 09:38:40', '2023-07-18 09:38:40'),
(4, 'B04', 'BRI', '031901000223306', 'IDR', '2023-07-18 09:38:54', '2023-07-18 09:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `basemetals`
--

CREATE TABLE `basemetals` (
  `id_base_metal` int(10) UNSIGNED NOT NULL,
  `kode_base_metal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_base_metal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_base_metal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `basemetals`
--

INSERT INTO `basemetals` (`id_base_metal`, `kode_base_metal`, `nama_base_metal`, `price_base_metal`, `created_at`, `updated_at`) VALUES
(1, 'BM1', 'BM  AC  L J A', 10000, '2023-07-18 18:56:15', '2023-07-18 18:59:30'),
(2, 'BM2', 'BM PLAT MN L J A', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(3, 'BM3', 'BM DC L J A', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(4, 'BM4', 'BM AC LEMBEK AIN', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(5, 'BM5', 'BM DC AIN', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(6, 'BM6', 'BM ADC IRFAN', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(7, 'BM7', 'BM LBK HASAN', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(8, 'BM8', 'BM ADC HASAN', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(9, 'BM9', 'BM AC2C', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(10, 'BM10', 'BM PRESS AC2C', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(11, 'BM11', 'BM PRESS ADC', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(12, 'BM12', 'BM ADC NG', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15'),
(13, 'BM13', 'INGOT AC2C NG ', 10000, '2023-07-18 18:56:15', '2023-07-18 18:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `kode_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `kode_customer`, `nama_customer`, `alamat_customer`, `created_at`, `updated_at`) VALUES
(1, 'C01', 'PT. AISIN INDONESIA ', 'KARAWANG', '2023-07-18 09:33:18', '2023-07-18 09:34:39'),
(2, 'C02', 'PT. TMMIN', 'KARAWANG', '2023-07-18 09:33:27', '2023-07-18 09:33:27'),
(3, 'C03', 'PT. TACI', 'BEKASI', '2023-07-18 09:33:38', '2023-07-18 09:33:38'),
(4, 'C04', 'PT. NAKAKIN', 'CIKARANG', '2023-07-18 09:33:47', '2023-07-18 09:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pos`
--

CREATE TABLE `detail_pos` (
  `id_detail_po` int(10) UNSIGNED NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_po` int(11) NOT NULL,
  `qty_po` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id_material` int(10) UNSIGNED NOT NULL,
  `kode_material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id_material`, `kode_material`, `nama_material`, `price_material`, `created_at`, `updated_at`) VALUES
(1, 'M01', 'GRAM MACHINING TACI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:49:47'),
(2, 'M02', 'GRAM PISTON TACI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(3, 'M03', 'GRAM SWASH TACI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(4, 'M04', 'HOMEL DROSS TACI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(5, 'M05', 'PART NG PISTON TACI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(6, 'M06', 'DROSS ENKEI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(7, 'M07', 'AL TUBE DENSO', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(8, 'M08', 'AL. PLATE DENSO', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(9, 'M09', 'AL.RDTR POTRAD DENSO', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(10, 'M10', 'KIRIKO AISIN', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(11, 'M11', 'DROSS AISIN', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(12, 'M12', 'ADVICS KIRIKO', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(13, 'M13', 'TEBAL BERSIH', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(14, 'M14', 'TEBAL KOTOR', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(15, 'M15', 'TEBAL BARU', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(16, 'M16', 'TEBAL BIASA', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(17, 'M17', 'PLAT BIASA', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(18, 'M18', 'PLAT BARU', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(19, 'M19', 'ALKOTEK', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(20, 'M20', 'PLAT PANEL', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(21, 'M21', 'PANCI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(22, 'M22', 'SIKU A', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(23, 'M23', 'SIKU CAMPUR', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(24, 'M24', 'KALENG PRESS', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(25, 'M25', 'KRIPIK NKI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(26, 'M26', 'GRAM NKI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(27, 'M27', 'DROSS NKI', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(28, 'M28', 'VELG MOTOR', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(29, 'M29', 'VELG MOBIL', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(30, 'M30', 'KAWAT', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10'),
(31, 'M31', 'OFSET', '1000', '2023-07-18 18:46:10', '2023-07-18 18:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_07_15_134941_CreateTableVendor', 1),
(4, '2023_07_15_135300_CreateTableCustomer', 1),
(5, '2023_07_15_135806_CreateTableBank', 1),
(6, '2023_07_15_140115_CreateTableTruk', 1),
(7, '2023_07_15_140616_CreateTablePo', 1),
(8, '2023_07_15_141029_CreateTableTop', 1),
(9, '2023_07_16_051922_CreateTableDetailPO', 1),
(10, '2023_07_16_052029_CreateTableNotePO', 1),
(11, '2023_07_16_223612_CreateTableStok', 1),
(12, '2023_07_17_133545_create_prods_table', 1),
(13, '2023_07_17_140611_create_sjs_table', 1),
(14, '2023_07_18_134043_create_produks_table', 1),
(15, '2023_07_18_134504_create_materials_table', 1),
(16, '2023_07_18_134621_create_basemetals_table', 1),
(17, '2023_07_18_134802_create_additives_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `note_pos`
--

CREATE TABLE `note_pos` (
  `id_note_po` int(10) UNSIGNED NOT NULL,
  `id_po` int(11) NOT NULL,
  `note_po` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id_po` int(10) UNSIGNED NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `id_detail_po` int(11) NOT NULL,
  `id_top` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `qty_po` int(11) NOT NULL,
  `delivery_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL,
  `quote_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vat` int(11) NOT NULL,
  `id_note_po` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prods`
--

CREATE TABLE `prods` (
  `id_prod` int(10) UNSIGNED NOT NULL,
  `id_stok` int(11) NOT NULL,
  `qty_prod` int(11) NOT NULL,
  `tgl_prod` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lot` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prods`
--

INSERT INTO `prods` (`id_prod`, `id_stok`, `qty_prod`, `tgl_prod`, `created_at`, `updated_at`, `lot`) VALUES
(1, 7, 50, '2023-07-19', '2023-07-18 20:07:47', '2023-07-18 20:07:47', '1A'),
(2, 12, 60, '2023-07-22', '2023-07-18 20:08:16', '2023-07-18 20:08:16', '1A');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `kode_produk`, `type`, `price`, `created_at`, `updated_at`) VALUES
(2, 'P01', 'ADC12', 20000, '2023-07-18 07:49:33', '2023-07-18 07:49:33'),
(3, 'P02', 'ADT4', 300000, '2023-07-18 07:49:45', '2023-07-18 07:49:45'),
(4, 'P03', 'AC2C', 20000, '2023-07-18 07:50:18', '2023-07-18 07:50:18'),
(5, 'P04', 'AC2B', 30000, '2023-07-18 07:50:31', '2023-07-18 07:50:31'),
(6, 'P05', 'AC4B', 20000, '2023-07-18 07:50:41', '2023-07-18 07:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `sjs`
--

CREATE TABLE `sjs` (
  `id_sj` int(10) UNSIGNED NOT NULL,
  `id_stok` int(11) NOT NULL,
  `qty_sj` int(11) NOT NULL,
  `tgl_sj` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_truk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sjs`
--

INSERT INTO `sjs` (`id_sj`, `id_stok`, `qty_sj`, `tgl_sj`, `created_at`, `updated_at`, `id_truk`) VALUES
(1, 7, 100, '2023-07-20', '2023-07-18 20:17:03', '2023-07-18 20:17:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stoks`
--

CREATE TABLE `stoks` (
  `id_stok` int(10) UNSIGNED NOT NULL,
  `part_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `part_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_part` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beginning_balance` int(11) NOT NULL,
  `incoming_balance` int(11) DEFAULT NULL,
  `usage_balance` int(11) DEFAULT NULL,
  `ending_balance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stoks`
--

INSERT INTO `stoks` (`id_stok`, `part_no`, `part_name`, `category_part`, `beginning_balance`, `incoming_balance`, `usage_balance`, `ending_balance`, `created_at`, `updated_at`) VALUES
(7, 'P01', 'ADC12', 'FG', 100, 50, 100, 50, '2023-07-18 19:39:08', '2023-07-18 20:17:03'),
(8, 'P02', 'ADT4', 'FG', 100, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(9, 'P03', 'AC2C', 'FG', 100, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(10, 'P04', 'AC2B', 'FG', 500, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(11, 'P05', 'AC4B', 'FG', 500, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(12, 'M01', 'GRAM MACHINING TACI', 'RM', 755, 60, NULL, 815, '2023-07-18 19:39:08', '2023-07-18 20:08:16'),
(13, 'M02', 'GRAM PISTON TACI', 'RM', 770, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(14, 'M03', 'GRAM SWASH TACI', 'RM', 892, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(15, 'M04', 'HOMEL DROSS TACI', 'RM', 163, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(16, 'M05', 'PART NG PISTON TACI', 'RM', 932, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(17, 'M06', 'DROSS ENKEI', 'RM', 989, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(18, 'M07', 'AL TUBE DENSO', 'RM', 781, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(19, 'M08', 'AL. PLATE DENSO', 'RM', 225, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(20, 'M09', 'AL.RDTR POTRAD DENSO', 'RM', 369, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(21, 'M10', 'KIRIKO AISIN', 'RM', 252, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(22, 'M11', 'DROSS AISIN', 'RM', 391, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(23, 'M12', 'ADVICS KIRIKO', 'RM', 205, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(24, 'M13', 'TEBAL BERSIH', 'RM', 385, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(25, 'M14', 'TEBAL KOTOR', 'RM', 467, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(26, 'M15', 'TEBAL BARU', 'RM', 527, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(27, 'M16', 'TEBAL BIASA', 'RM', 312, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(28, 'M17', 'PLAT BIASA', 'RM', 567, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(29, 'M18', 'PLAT BARU', 'RM', 748, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(30, 'M19', 'ALKOTEK', 'RM', 429, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(31, 'M20', 'PLAT PANEL', 'RM', 303, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(32, 'M21', 'PANCI', 'RM', 301, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(33, 'M22', 'SIKU A', 'RM', 923, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(34, 'M23', 'SIKU CAMPUR', 'RM', 930, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(35, 'M24', 'KALENG PRESS', 'RM', 545, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(36, 'M25', 'KRIPIK NKI', 'RM', 624, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(37, 'M26', 'GRAM NKI', 'RM', 260, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(38, 'M27', 'DROSS NKI', 'RM', 546, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(39, 'M28', 'VELG MOTOR', 'RM', 751, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(40, 'M29', 'VELG MOBIL', 'RM', 483, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(41, 'M30', 'KAWAT', 'RM', 191, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(42, 'M31', 'OFSET', 'RM', 908, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(43, 'BM1', 'BM  AC  L J A', 'RM', 217, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(44, 'BM2', 'BM PLAT MN L J A', 'RM', 422, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(45, 'BM3', 'BM DC L J A', 'RM', 111, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(46, 'BM4', 'BM AC LEMBEK AIN', 'RM', 413, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(47, 'BM5', 'BM DC AIN', 'RM', 679, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(48, 'BM6', 'BM ADC IRFAN', 'RM', 785, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(49, 'BM7', 'BM LBK HASAN', 'RM', 115, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(50, 'BM8', 'BM ADC HASAN', 'RM', 105, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(51, 'BM9', 'BM AC2C', 'RM', 892, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(52, 'BM10', 'BM PRESS AC2C', 'RM', 350, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(53, 'BM11', 'BM PRESS ADC', 'RM', 153, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(54, 'BM12', 'BM ADC NG', 'RM', 554, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(55, 'BM13', 'INGOT AC2C NG ', 'RM', 866, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(56, 'AD01', 'SILICON', 'RM', 362, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(57, 'AD02', 'TEMBAGA', 'RM', 818, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(58, 'AD03', 'MAGNESIUM', 'RM', 444, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08'),
(59, 'AD04', 'AL TAB MN', 'RM', 832, NULL, NULL, NULL, '2023-07-18 19:39:08', '2023-07-18 19:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `tops`
--

CREATE TABLE `tops` (
  `id_top` int(10) UNSIGNED NOT NULL,
  `name_top` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `truks`
--

CREATE TABLE `truks` (
  `id_truk` int(10) UNSIGNED NOT NULL,
  `kode_truk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plat_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `driver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `truks`
--

INSERT INTO `truks` (`id_truk`, `kode_truk`, `plat_no`, `driver`, `created_at`, `updated_at`) VALUES
(1, 'T01', 'T 8956 EH', 'WARINTO', '2023-07-18 08:25:03', '2023-07-18 08:25:03'),
(2, 'T02', 'B 9947 FQA', 'SANTANI', '2023-07-18 08:25:17', '2023-07-18 08:25:17'),
(3, 'T03', 'B 9420 FQA', 'TRISNO', '2023-07-18 08:25:29', '2023-07-18 08:25:29'),
(4, 'T04', 'B 9421 FQA', 'ASIRUDIN', '2023-07-18 08:25:39', '2023-07-18 08:25:39'),
(5, 'T05', 'B 9028 DX', 'SAMINGIN', '2023-07-18 08:25:52', '2023-07-18 08:25:52'),
(6, 'T06', 'T 8661 EB', 'SUROSO', '2023-07-18 08:26:02', '2023-07-18 08:26:02'),
(7, 'T07', 'T 8662 EB', 'ANDI', '2023-07-18 08:26:13', '2023-07-18 08:26:13'),
(8, 'T08', 'T 8523 HJ', 'SAMINGIN', '2023-07-18 08:26:22', '2023-07-18 08:26:22'),
(9, 'T09', 'B 9851 SY', 'RANTO', '2023-07-18 08:26:32', '2023-07-18 08:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$aFTiSS/YCc6Nnq1IThuLeebM7gv7T/4Uc1aK4aSJbOomSJJX//9gu', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id_vendor` int(10) UNSIGNED NOT NULL,
  `kode_vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id_vendor`, `kode_vendor`, `nama_vendor`, `alamat_vendor`, `created_at`, `updated_at`) VALUES
(1, 'S01', 'PT. MITRA PRIMA AGUNG', 'JAKARTA', '2023-07-18 08:30:01', '2023-07-18 09:31:03'),
(2, 'S02', 'PT. MAKMUR META GRAHA', 'JAKARTA', '2023-07-18 08:30:14', '2023-07-18 08:30:14'),
(3, 'S03', 'PT. METALURGI MITRA ABADI', 'JAKARTA', '2023-07-18 08:30:29', '2023-07-18 08:30:29'),
(4, 'S04', 'PT. SENTOSA METALURGI', 'JAKARTA', '2023-07-18 08:30:39', '2023-07-18 08:30:39'),
(5, 'S05', 'PT. WILISINDOMAS INDAH MAKMUR', 'JAKARTA', '2023-07-18 08:30:50', '2023-07-18 08:30:50'),
(6, 'S06', 'PT. SAMATOR GAS INDUSTRI', 'JAKARTA', '2023-07-18 08:31:01', '2023-07-18 08:31:01'),
(7, 'S07', 'PT. GAS NUSANTARA', 'JAKARTA', '2023-07-18 08:31:12', '2023-07-18 08:31:12'),
(8, 'S08', 'PT. ALLOY INDAH NUSANTARA', 'BANDUNG', '2023-07-18 08:31:24', '2023-07-18 08:31:24'),
(9, 'S09', 'PT. LOGAM JAYA ABADI', 'BEKASI', '2023-07-18 08:31:33', '2023-07-18 08:31:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additives`
--
ALTER TABLE `additives`
  ADD PRIMARY KEY (`id_additive`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `basemetals`
--
ALTER TABLE `basemetals`
  ADD PRIMARY KEY (`id_base_metal`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pos`
--
ALTER TABLE `detail_pos`
  ADD PRIMARY KEY (`id_detail_po`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_pos`
--
ALTER TABLE `note_pos`
  ADD PRIMARY KEY (`id_note_po`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `prods`
--
ALTER TABLE `prods`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sjs`
--
ALTER TABLE `sjs`
  ADD PRIMARY KEY (`id_sj`);

--
-- Indexes for table `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tops`
--
ALTER TABLE `tops`
  ADD PRIMARY KEY (`id_top`);

--
-- Indexes for table `truks`
--
ALTER TABLE `truks`
  ADD PRIMARY KEY (`id_truk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additives`
--
ALTER TABLE `additives`
  MODIFY `id_additive` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id_bank` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `basemetals`
--
ALTER TABLE `basemetals`
  MODIFY `id_base_metal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_pos`
--
ALTER TABLE `detail_pos`
  MODIFY `id_detail_po` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `note_pos`
--
ALTER TABLE `note_pos`
  MODIFY `id_note_po` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id_po` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prods`
--
ALTER TABLE `prods`
  MODIFY `id_prod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sjs`
--
ALTER TABLE `sjs`
  MODIFY `id_sj` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id_stok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tops`
--
ALTER TABLE `tops`
  MODIFY `id_top` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truks`
--
ALTER TABLE `truks`
  MODIFY `id_truk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id_vendor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
