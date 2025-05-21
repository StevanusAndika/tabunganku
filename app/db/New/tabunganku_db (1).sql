-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2025 at 07:50 PM
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
  `durasi` varchar(255) DEFAULT NULL,
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
(89, 'INSERT', 'mata_uang', 1, '2025-04-26 06:03:23'),
(90, 'INSERT', 'mata_uang', 1, '2025-05-08 18:36:54'),
(91, 'INSERT', 'mata_uang', 2, '2025-05-08 18:36:54'),
(92, 'INSERT', 'mata_uang', 90, '2025-05-08 18:49:45'),
(93, 'INSERT', 'mata_uang', 91, '2025-05-08 18:49:45'),
(94, 'INSERT', 'mata_uang', 92, '2025-05-08 18:49:45'),
(95, 'INSERT', 'mata_uang', 93, '2025-05-08 18:49:45'),
(96, 'INSERT', 'mata_uang', 94, '2025-05-08 18:49:45'),
(97, 'INSERT', 'mata_uang', 95, '2025-05-08 18:55:18'),
(98, 'INSERT', 'mata_uang', 96, '2025-05-08 18:55:18'),
(99, 'INSERT', 'mata_uang', 97, '2025-05-08 18:55:18'),
(100, 'INSERT', 'mata_uang', 98, '2025-05-08 18:55:18'),
(101, 'INSERT', 'mata_uang', 99, '2025-05-08 18:55:18'),
(102, 'INSERT', 'mata_uang', 100, '2025-05-08 18:55:18'),
(103, 'INSERT', 'mata_uang', 101, '2025-05-08 18:55:18'),
(104, 'INSERT', 'mata_uang', 102, '2025-05-08 18:55:18'),
(105, 'INSERT', 'mata_uang', 103, '2025-05-08 18:55:18'),
(106, 'INSERT', 'mata_uang', 104, '2025-05-08 18:55:18'),
(107, 'INSERT', 'mata_uang', 105, '2025-05-08 18:55:52'),
(108, 'INSERT', 'mata_uang', 106, '2025-05-08 18:55:52'),
(109, 'INSERT', 'mata_uang', 107, '2025-05-08 18:55:52'),
(110, 'INSERT', 'mata_uang', 108, '2025-05-08 18:55:52'),
(111, 'INSERT', 'mata_uang', 109, '2025-05-08 18:55:52'),
(112, 'INSERT', 'mata_uang', 110, '2025-05-08 18:55:52'),
(113, 'INSERT', 'mata_uang', 111, '2025-05-08 18:55:52'),
(114, 'INSERT', 'mata_uang', 112, '2025-05-08 18:55:52'),
(115, 'INSERT', 'mata_uang', 113, '2025-05-08 18:55:52'),
(116, 'INSERT', 'mata_uang', 114, '2025-05-08 18:55:52');

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
(105, 'Dollar Amerika Serikat', 'Simbol: USD ($)', '2025-05-08 18:55:52'),
(106, 'Euro', 'Simbol: EUR (€)', '2025-05-08 18:55:52'),
(107, 'Yen Jepang', 'Simbol: JPY (¥)', '2025-05-08 18:55:52'),
(108, 'Pound Sterling', 'Simbol: GBP (£)', '2025-05-08 18:55:52'),
(109, 'Rupiah Indonesia', 'Simbol: IDR (Rp)', '2025-05-08 18:55:52'),
(110, 'Franc Swiss', 'Simbol: CHF (Fr)', '2025-05-08 18:55:52'),
(111, 'Dollar Kanada', 'Simbol: CAD ($)', '2025-05-08 18:55:52'),
(112, 'Dollar Australia', 'Simbol: AUD ($)', '2025-05-08 18:55:52'),
(113, 'Yuan Tiongkok', 'Simbol: CNY (¥)', '2025-05-08 18:55:52'),
(114, 'Rupee India', 'Simbol: INR (₹)', '2025-05-08 18:55:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(29, 'stevanus', 'user@example.com', '09829293', 'JL SEPAKAT 4 NO.57', '681b6754380a3_779848 (1).jpg', 'public/assets/uploads/681b6754380a3_779848 (1).jpg', 'lengkap', '$2y$10$KWzMy8lHVIpmoyFLOD51nuo0xeHRY4xh1tPhWIp6G/CJxXsgRIF8K', '2025-05-07 20:59:19', '2025-05-09 02:42:14');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `log_changes`
--
ALTER TABLE `log_changes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `mata_uang`
--
ALTER TABLE `mata_uang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
