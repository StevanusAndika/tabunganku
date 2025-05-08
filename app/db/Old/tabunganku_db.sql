-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2025 at 12:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabunganku_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kalkulator_target`
--

CREATE TABLE `kalkulator_target` (
  `id` int NOT NULL,
  `nama_target` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `nominal_target` decimal(15,2) NOT NULL,
  `tanggal_dimulai` date NOT NULL,
  `target_tercapai` tinyint(1) DEFAULT '0',
  `metode_menabung` enum('harian','mingguan','bulanan') NOT NULL,
  `hasil_kalkulasi` decimal(15,2) DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi`, `created_at`) VALUES
(43, 'Nikah ', 'biaya nikah freya JKT48s', '2025-04-23 15:06:04'),
(45, 'makan', 'makan123\n', '2025-04-23 17:02:32'),
(46, 'Beli Rumah', 'beli rumah', '2025-05-01 13:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `log_changes`
--

CREATE TABLE `log_changes` (
  `id` int NOT NULL,
  `action` varchar(50) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `record_id` int NOT NULL,
  `change_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_changes`
--

INSERT INTO `log_changes` (`id`, `action`, `table_name`, `record_id`, `change_time`) VALUES
(1, 'INSERT', 'mata_uang', 2, '2025-04-26 06:01:43'),
(2, 'INSERT', 'mata_uang', 3, '2025-04-26 06:02:44'),
(3, 'INSERT', 'mata_uang', 4, '2025-04-26 06:02:44'),
(4, 'INSERT', 'mata_uang', 5, '2025-04-26 06:02:44'),
(5, 'INSERT', 'mata_uang', 6, '2025-04-26 06:02:44'),
(6, 'INSERT', 'mata_uang', 7, '2025-04-26 06:02:44'),
(7, 'INSERT', 'mata_uang', 8, '2025-04-26 06:02:44'),
(8, 'INSERT', 'mata_uang', 9, '2025-04-26 06:02:44'),
(9, 'INSERT', 'mata_uang', 10, '2025-04-26 06:02:44'),
(10, 'INSERT', 'mata_uang', 11, '2025-04-26 06:02:44'),
(11, 'INSERT', 'mata_uang', 12, '2025-04-26 06:02:44'),
(12, 'INSERT', 'mata_uang', 13, '2025-04-26 06:02:44'),
(13, 'INSERT', 'mata_uang', 14, '2025-04-26 06:02:44'),
(14, 'INSERT', 'mata_uang', 15, '2025-04-26 06:02:44'),
(15, 'INSERT', 'mata_uang', 16, '2025-04-26 06:02:44'),
(16, 'INSERT', 'mata_uang', 17, '2025-04-26 06:02:44'),
(17, 'INSERT', 'mata_uang', 18, '2025-04-26 06:02:44'),
(18, 'INSERT', 'mata_uang', 19, '2025-04-26 06:02:44'),
(19, 'INSERT', 'mata_uang', 20, '2025-04-26 06:02:44'),
(20, 'INSERT', 'mata_uang', 21, '2025-04-26 06:02:44'),
(21, 'INSERT', 'mata_uang', 22, '2025-04-26 06:02:44'),
(22, 'INSERT', 'mata_uang', 23, '2025-04-26 06:02:44'),
(23, 'INSERT', 'mata_uang', 24, '2025-04-26 06:02:44'),
(24, 'INSERT', 'mata_uang', 25, '2025-04-26 06:02:44'),
(25, 'INSERT', 'mata_uang', 26, '2025-04-26 06:02:44'),
(26, 'INSERT', 'mata_uang', 27, '2025-04-26 06:02:44'),
(27, 'INSERT', 'mata_uang', 28, '2025-04-26 06:02:44'),
(28, 'INSERT', 'mata_uang', 29, '2025-04-26 06:02:44'),
(29, 'INSERT', 'mata_uang', 30, '2025-04-26 06:02:44'),
(30, 'INSERT', 'mata_uang', 31, '2025-04-26 06:02:44'),
(31, 'INSERT', 'mata_uang', 32, '2025-04-26 06:02:44'),
(32, 'INSERT', 'mata_uang', 33, '2025-04-26 06:02:44'),
(33, 'INSERT', 'mata_uang', 34, '2025-04-26 06:02:44'),
(34, 'INSERT', 'mata_uang', 35, '2025-04-26 06:02:44'),
(35, 'INSERT', 'mata_uang', 36, '2025-04-26 06:02:44'),
(36, 'INSERT', 'mata_uang', 37, '2025-04-26 06:02:44'),
(37, 'INSERT', 'mata_uang', 38, '2025-04-26 06:02:44'),
(38, 'INSERT', 'mata_uang', 39, '2025-04-26 06:02:44'),
(39, 'INSERT', 'mata_uang', 40, '2025-04-26 06:02:44'),
(40, 'INSERT', 'mata_uang', 41, '2025-04-26 06:02:44'),
(41, 'INSERT', 'mata_uang', 42, '2025-04-26 06:02:44'),
(42, 'INSERT', 'mata_uang', 43, '2025-04-26 06:02:44'),
(43, 'INSERT', 'mata_uang', 44, '2025-04-26 06:02:44'),
(44, 'INSERT', 'mata_uang', 45, '2025-04-26 06:02:44'),
(45, 'INSERT', 'mata_uang', 46, '2025-04-26 06:02:44'),
(46, 'INSERT', 'mata_uang', 47, '2025-04-26 06:02:44'),
(47, 'INSERT', 'mata_uang', 48, '2025-04-26 06:02:44'),
(48, 'INSERT', 'mata_uang', 49, '2025-04-26 06:02:44'),
(49, 'INSERT', 'mata_uang', 50, '2025-04-26 06:02:44'),
(50, 'INSERT', 'mata_uang', 51, '2025-04-26 06:02:44'),
(51, 'INSERT', 'mata_uang', 52, '2025-04-26 06:02:44'),
(52, 'INSERT', 'mata_uang', 53, '2025-04-26 06:02:44'),
(53, 'INSERT', 'mata_uang', 54, '2025-04-26 06:02:44'),
(54, 'INSERT', 'mata_uang', 55, '2025-04-26 06:02:44'),
(55, 'INSERT', 'mata_uang', 56, '2025-04-26 06:02:44'),
(56, 'INSERT', 'mata_uang', 57, '2025-04-26 06:02:44'),
(57, 'INSERT', 'mata_uang', 58, '2025-04-26 06:02:44'),
(58, 'INSERT', 'mata_uang', 59, '2025-04-26 06:02:44'),
(59, 'INSERT', 'mata_uang', 60, '2025-04-26 06:02:44'),
(60, 'INSERT', 'mata_uang', 61, '2025-04-26 06:02:44'),
(61, 'INSERT', 'mata_uang', 62, '2025-04-26 06:02:44'),
(62, 'INSERT', 'mata_uang', 63, '2025-04-26 06:02:44'),
(63, 'INSERT', 'mata_uang', 64, '2025-04-26 06:02:44'),
(64, 'INSERT', 'mata_uang', 65, '2025-04-26 06:02:44'),
(65, 'INSERT', 'mata_uang', 66, '2025-04-26 06:02:44'),
(66, 'INSERT', 'mata_uang', 67, '2025-04-26 06:02:44'),
(67, 'INSERT', 'mata_uang', 68, '2025-04-26 06:02:44'),
(68, 'INSERT', 'mata_uang', 69, '2025-04-26 06:02:44'),
(69, 'INSERT', 'mata_uang', 70, '2025-04-26 06:02:44'),
(70, 'INSERT', 'mata_uang', 71, '2025-04-26 06:02:44'),
(71, 'INSERT', 'mata_uang', 72, '2025-04-26 06:02:44'),
(72, 'INSERT', 'mata_uang', 73, '2025-04-26 06:02:44'),
(73, 'INSERT', 'mata_uang', 74, '2025-04-26 06:02:44'),
(74, 'INSERT', 'mata_uang', 75, '2025-04-26 06:02:44'),
(75, 'INSERT', 'mata_uang', 76, '2025-04-26 06:02:44'),
(76, 'INSERT', 'mata_uang', 77, '2025-04-26 06:02:44'),
(77, 'INSERT', 'mata_uang', 78, '2025-04-26 06:02:44'),
(78, 'INSERT', 'mata_uang', 79, '2025-04-26 06:02:44'),
(79, 'INSERT', 'mata_uang', 80, '2025-04-26 06:02:44'),
(80, 'INSERT', 'mata_uang', 81, '2025-04-26 06:02:44'),
(81, 'INSERT', 'mata_uang', 82, '2025-04-26 06:02:44'),
(82, 'INSERT', 'mata_uang', 83, '2025-04-26 06:02:44'),
(83, 'INSERT', 'mata_uang', 84, '2025-04-26 06:02:44'),
(84, 'INSERT', 'mata_uang', 85, '2025-04-26 06:02:44'),
(85, 'INSERT', 'mata_uang', 86, '2025-04-26 06:02:44'),
(86, 'INSERT', 'mata_uang', 87, '2025-04-26 06:02:44'),
(87, 'INSERT', 'mata_uang', 88, '2025-04-26 06:02:44'),
(88, 'INSERT', 'mata_uang', 89, '2025-04-26 06:02:44'),
(89, 'INSERT', 'mata_uang', 1, '2025-04-26 06:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `mata_uang`
--

CREATE TABLE `mata_uang` (
  `id` int NOT NULL,
  `nama_mata_uang` varchar(50) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_uang`
--

INSERT INTO `mata_uang` (`id`, `nama_mata_uang`, `keterangan`, `created_at`) VALUES
(1, 'IDR', 'Indonesian Rupiah', '2025-04-26 06:03:23'),
(2, 'USD', 'United States Dollar', '2025-04-26 06:01:43'),
(3, 'USD', 'United States Dollar', '2025-04-26 06:02:44'),
(4, 'EUR', 'Euro', '2025-04-26 06:02:44'),
(5, 'GBP', 'British Pound', '2025-04-26 06:02:44'),
(6, 'JPY', 'Japanese Yen', '2025-04-26 06:02:44'),
(7, 'AUD', 'Australian Dollar', '2025-04-26 06:02:44'),
(8, 'CAD', 'Canadian Dollar', '2025-04-26 06:02:44'),
(9, 'CHF', 'Swiss Franc', '2025-04-26 06:02:44'),
(10, 'CNY', 'Chinese Yuan', '2025-04-26 06:02:44'),
(11, 'INR', 'Indian Rupee', '2025-04-26 06:02:44'),
(12, 'MXN', 'Mexican Peso', '2025-04-26 06:02:44'),
(13, 'BRL', 'Brazilian Real', '2025-04-26 06:02:44'),
(14, 'RUB', 'Russian Ruble', '2025-04-26 06:02:44'),
(15, 'ZAR', 'South African Rand', '2025-04-26 06:02:44'),
(16, 'HKD', 'Hong Kong Dollar', '2025-04-26 06:02:44'),
(17, 'SGD', 'Singapore Dollar', '2025-04-26 06:02:44'),
(18, 'MYR', 'Malaysian Ringgit', '2025-04-26 06:02:44'),
(19, 'KRW', 'South Korean Won', '2025-04-26 06:02:44'),
(20, 'SEK', 'Swedish Krona', '2025-04-26 06:02:44'),
(21, 'NOK', 'Norwegian Krone', '2025-04-26 06:02:44'),
(22, 'DKK', 'Danish Krone', '2025-04-26 06:02:44'),
(23, 'PLN', 'Polish Zloty', '2025-04-26 06:02:44'),
(24, 'TRY', 'Turkish Lira', '2025-04-26 06:02:44'),
(25, 'ILS', 'Israeli New Shekel', '2025-04-26 06:02:44'),
(26, 'PHP', 'Philippine Peso', '2025-04-26 06:02:44'),
(27, 'THB', 'Thai Baht', '2025-04-26 06:02:44'),
(28, 'IDR', 'Indonesian Rupiah', '2025-04-26 06:02:44'),
(29, 'VND', 'Vietnamese Dong', '2025-04-26 06:02:44'),
(30, 'AED', 'United Arab Emirates Dirham', '2025-04-26 06:02:44'),
(31, 'SAR', 'Saudi Riyal', '2025-04-26 06:02:44'),
(32, 'QAR', 'Qatari Rial', '2025-04-26 06:02:44'),
(33, 'KWD', 'Kuwaiti Dinar', '2025-04-26 06:02:44'),
(34, 'BHD', 'Bahraini Dinar', '2025-04-26 06:02:44'),
(35, 'OMR', 'Omani Rial', '2025-04-26 06:02:44'),
(36, 'JOD', 'Jordanian Dinar', '2025-04-26 06:02:44'),
(37, 'EGP', 'Egyptian Pound', '2025-04-26 06:02:44'),
(38, 'KES', 'Kenyan Shilling', '2025-04-26 06:02:44'),
(39, 'NGN', 'Nigerian Naira', '2025-04-26 06:02:44'),
(40, 'COP', 'Colombian Peso', '2025-04-26 06:02:44'),
(41, 'PEN', 'Peruvian Nuevo Sol', '2025-04-26 06:02:44'),
(42, 'CLP', 'Chilean Peso', '2025-04-26 06:02:44'),
(43, 'ARS', 'Argentine Peso', '2025-04-26 06:02:44'),
(44, 'SYP', 'Syrian Pound', '2025-04-26 06:02:44'),
(45, 'LKR', 'Sri Lankan Rupee', '2025-04-26 06:02:44'),
(46, 'BDT', 'Bangladeshi Taka', '2025-04-26 06:02:44'),
(47, 'NPR', 'Nepalese Rupee', '2025-04-26 06:02:44'),
(48, 'PKR', 'Pakistani Rupee', '2025-04-26 06:02:44'),
(49, 'MNT', 'Mongolian Tugrik', '2025-04-26 06:02:44'),
(50, 'KZT', 'Kazakhstani Tenge', '2025-04-26 06:02:44'),
(51, 'AZN', 'Azerbaijani Manat', '2025-04-26 06:02:44'),
(52, 'GEL', 'Georgian Lari', '2025-04-26 06:02:44'),
(53, 'AMD', 'Armenian Dram', '2025-04-26 06:02:44'),
(54, 'UZS', 'Uzbekistani Som', '2025-04-26 06:02:44'),
(55, 'TJS', 'Tajikistani Somoni', '2025-04-26 06:02:44'),
(56, 'KGZ', 'Kyrgyzstani Som', '2025-04-26 06:02:44'),
(57, 'KPW', 'North Korean Won', '2025-04-26 06:02:44'),
(58, 'LKR', 'Sri Lankan Rupee', '2025-04-26 06:02:44'),
(59, 'KYD', 'Cayman Islands Dollar', '2025-04-26 06:02:44'),
(60, 'FJD', 'Fijian Dollar', '2025-04-26 06:02:44'),
(61, 'WST', 'Samoan Tala', '2025-04-26 06:02:44'),
(62, 'TOP', 'Tongan Paʻanga', '2025-04-26 06:02:44'),
(63, 'VUV', 'Vanuatu Vatu', '2025-04-26 06:02:44'),
(64, 'PGK', 'Papua New Guinean Kina', '2025-04-26 06:02:44'),
(65, 'TMT', 'Turkmenistan Manat', '2025-04-26 06:02:44'),
(66, 'BAM', 'Bosnia and Herzegovina Convertible Mark', '2025-04-26 06:02:44'),
(67, 'MKD', 'Macedonian Denar', '2025-04-26 06:02:44'),
(68, 'HRK', 'Croatian Kuna', '2025-04-26 06:02:44'),
(69, 'RSD', 'Serbian Dinar', '2025-04-26 06:02:44'),
(70, 'HUF', 'Hungarian Forint', '2025-04-26 06:02:44'),
(71, 'BGL', 'Bulgarian Lev', '2025-04-26 06:02:44'),
(72, 'RON', 'Romanian Leu', '2025-04-26 06:02:44'),
(73, 'LTL', 'Lithuanian Litas', '2025-04-26 06:02:44'),
(74, 'LVL', 'Latvian Lats', '2025-04-26 06:02:44'),
(75, 'EEK', 'Estonian Kroon', '2025-04-26 06:02:44'),
(76, 'ISK', 'Icelandic Króna', '2025-04-26 06:02:44'),
(77, 'BYN', 'Belarusian Ruble', '2025-04-26 06:02:44'),
(78, 'MDL', 'Moldovan Leu', '2025-04-26 06:02:44'),
(79, 'UZS', 'Uzbekistani Som', '2025-04-26 06:02:44'),
(80, 'MZN', 'Mozambican Metical', '2025-04-26 06:02:44'),
(81, 'KPW', 'North Korean Won', '2025-04-26 06:02:44'),
(82, 'SLL', 'Sierra Leonean Leone', '2025-04-26 06:02:44'),
(83, 'GNF', 'Guinean Franc', '2025-04-26 06:02:44'),
(84, 'CVE', 'Cape Verdean Escudo', '2025-04-26 06:02:44'),
(85, 'MWK', 'Malawian Kwacha', '2025-04-26 06:02:44'),
(86, 'ZMK', 'Zambian Kwacha', '2025-04-26 06:02:44'),
(87, 'MTN', 'Mauritian Rupee', '2025-04-26 06:02:44'),
(88, 'XOF', 'West African CFA franc', '2025-04-26 06:02:44'),
(89, 'CDF', 'Congolese Franc', '2025-04-26 06:02:44');

--
-- Triggers `mata_uang`
--
DELIMITER $$
CREATE TRIGGER `after_insert_mata_uang` AFTER INSERT ON `mata_uang` FOR EACH ROW BEGIN
    -- Menyimpan log perubahan
    INSERT INTO log_changes (action, table_name, record_id, change_time)
    VALUES ('INSERT', 'mata_uang', NEW.id, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_saldo`
--

CREATE TABLE `riwayat_saldo` (
  `id` int NOT NULL,
  `tabungan_id` int NOT NULL,
  `nominal_saldo` decimal(15,2) NOT NULL,
  `keterangan` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int NOT NULL,
  `nama_tabungan` varchar(100) NOT NULL,
  `jumlah_tabungan` decimal(15,2) NOT NULL,
  `rencana_pengisian` enum('harian','mingguan','bulanan') NOT NULL,
  `nominal_pengisian` decimal(15,2) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategori_id` int NOT NULL,
  `user_id` int NOT NULL,
  `persentase_tercapai` decimal(5,2) DEFAULT '0.00',
  `foto_tabungan` varchar(255) DEFAULT NULL,
  `path_foto` varchar(255) DEFAULT NULL,
  `id_mata_uang` int DEFAULT NULL,
  `perkiraan_berakhir` date DEFAULT NULL,
  `status_tabungan` enum('belum dimulai','berlangsung','berakhir') DEFAULT 'belum dimulai',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telpon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `profil_foto` varchar(255) DEFAULT NULL,
  `path_photo` varchar(255) DEFAULT NULL,
  `biodata_status` enum('lengkap','belum lengkap') DEFAULT 'belum lengkap',
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `no_telpon`, `alamat`, `profil_foto`, `path_photo`, `biodata_status`, `password`, `created_at`, `updated_at`) VALUES
(22, 'Steven', 'user@example.com', '213849010102', 'JL SEPAKAT 4 NO .5 7', '68089ae6ca59e_download.jpg', 'public/assets/uploads/68089ae6ca59e_download.jpg', 'lengkap', '$2y$10$z8xXCngMMa1XAXjD8y/lM.R5hIKvnJz.6iSRcWstxh5r7FocnX2xC', '2025-04-23 14:36:31', '2025-05-03 07:22:52'),
(23, 'stevanus', 'stevanusstudent@gmail.com', NULL, NULL, NULL, NULL, 'belum lengkap', '$2y$10$59hdiCXAtCs7XroIwvAnruQvz8RrHEuSar4/kWajYjvFSAugZRG9u', '2025-05-05 18:59:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kalkulator_target`
--
ALTER TABLE `kalkulator_target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_changes`
--
ALTER TABLE `log_changes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_uang`
--
ALTER TABLE `mata_uang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabungan_id` (`tabungan_id`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `id_mata_uang` (`id_mata_uang`),
  ADD KEY `fk_tabungan_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalkulator_target`
--
ALTER TABLE `kalkulator_target`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `log_changes`
--
ALTER TABLE `log_changes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `mata_uang`
--
ALTER TABLE `mata_uang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kalkulator_target`
--
ALTER TABLE `kalkulator_target`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kalkulator_target_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_saldo`
--
ALTER TABLE `riwayat_saldo`
  ADD CONSTRAINT `riwayat_saldo_ibfk_1` FOREIGN KEY (`tabungan_id`) REFERENCES `tabungan` (`id`);

--
-- Constraints for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD CONSTRAINT `fk_tabungan_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tabungan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tabungan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tabungan_ibfk_3` FOREIGN KEY (`id_mata_uang`) REFERENCES `mata_uang` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
