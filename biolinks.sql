-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2025 at 09:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biolinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `sosial_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sosial_links`)),
  `other_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`other_links`)),
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `image`, `name`, `bio`, `sosial_links`, `other_links`, `user_id`, `created_at`, `deleted_at`) VALUES
(1, '../assets/upload/ibudiana.png', 'jauh pd', 'aku akan pergi jauh dari kamu', '{\"twitter\":\"https:\\/\\/twitter.com\",\"instagram\":\"https:\\/\\/instagram.com\",\"facebook\":\"https:\\/\\/facebook.com\",\"tiktok\":\"https:\\/\\/tiktok.com\",\"youtube\":\"https:\\/\\/youtube.com\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 1, '2025-01-05 23:37:55', NULL),
(2, NULL, 'Budi Santoso', 'Lorem ipsum dolor sit amet consectetur adipiscing elit', '{\"twitter\":\"https://twitter.com/budi\", \"instagram\":\"https://instagram.com/budi\", \"facebook\":\"https://facebook.com/budi\", \"tiktok\":\"https://tiktok.com/budi\", \"youtube\":\"https://youtube.com/budi\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 2, '2025-01-08 15:46:59', NULL),
(3, NULL, 'Susi Wulandari', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem', '{\"twitter\":\"https://twitter.com/susi\", \"instagram\":\"https://instagram.com/susi\", \"facebook\":\"https://facebook.com/susi\", \"tiktok\":\"https://tiktok.com/susi\", \"youtube\":\"https://youtube.com/susi\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 3, '2025-01-08 15:46:59', NULL),
(4, NULL, 'Dedi Pratama', 'At vero eos et accusamus et iusto odio dignissimos ducimus', '{\"twitter\":\"https://twitter.com/dedi\", \"instagram\":\"https://instagram.com/dedi\", \"facebook\":\"https://facebook.com/dedi\", \"tiktok\":\"https://tiktok.com/dedi\", \"youtube\":\"https://youtube.com/dedi\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 4, '2025-01-08 15:46:59', NULL),
(5, NULL, 'Joko Setiawan', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur', '{\"twitter\":\"https://twitter.com/joko\", \"instagram\":\"https://instagram.com/joko\", \"facebook\":\"https://facebook.com/joko\", \"tiktok\":\"https://tiktok.com/joko\", \"youtube\":\"https://youtube.com/joko\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 5, '2025-01-08 15:46:59', NULL),
(6, NULL, 'Mira Suryani', 'Ut enim ad minima veniam quis nostrum exercitationem ullam', '{\"twitter\":\"https://twitter.com/mira\", \"instagram\":\"https://instagram.com/mira\", \"facebook\":\"https://facebook.com/mira\", \"tiktok\":\"https://tiktok.com/mira\", \"youtube\":\"https://youtube.com/mira\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 6, '2025-01-08 15:46:59', NULL),
(7, NULL, 'Rudi Hartono', 'Excepteur sint occaecat cupidatat non proident sunt in culpa', '{\"twitter\":\"https://twitter.com/rudi\", \"instagram\":\"https://instagram.com/rudi\", \"facebook\":\"https://facebook.com/rudi\", \"tiktok\":\"https://tiktok.com/rudi\", \"youtube\":\"https://youtube.com/rudi\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 7, '2025-01-08 15:46:59', NULL),
(8, NULL, 'Tina Setyawati', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', '{\"twitter\":\"https://twitter.com/tina\", \"instagram\":\"https://instagram.com/tina\", \"facebook\":\"https://facebook.com/tina\", \"tiktok\":\"https://tiktok.com/tina\", \"youtube\":\"https://youtube.com/tina\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 8, '2025-01-08 15:46:59', NULL),
(9, NULL, 'Eko Prasetyo', 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus', '{\"twitter\":\"https://twitter.com/eko\", \"instagram\":\"https://instagram.com/eko\", \"facebook\":\"https://facebook.com/eko\", \"tiktok\":\"https://tiktok.com/eko\", \"youtube\":\"https://youtube.com/eko\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 9, '2025-01-08 15:46:59', NULL),
(10, NULL, 'Nina Kusuma', 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse', '{\"twitter\":\"https://twitter.com/nina\", \"instagram\":\"https://instagram.com/nina\", \"facebook\":\"https://facebook.com/nina\", \"tiktok\":\"https://tiktok.com/nina\", \"youtube\":\"https://youtube.com/nina\"}', '[{\"name\":\"Link Custom Pertama\",\"url\":\"#\"},{\"name\":\"Link Custom Kedua\",\"url\":\"#\"},{\"name\":\"Link Custom Ketiga\",\"url\":\"#\"},{\"name\":\"Link Custom Keempat\",\"url\":\"#\"},{\"name\":\"Link Custom Kelima\",\"url\":\"#\"},{\"name\":\"Link Custom Keenam\",\"url\":\"#\"}]', 10, '2025-01-08 15:46:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('pending','active','suspend') NOT NULL DEFAULT 'pending',
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`, `role`, `created_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@biolinks.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'admin', '2025-01-05 23:37:49', NULL),
(2, 'budi', 'budi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(3, 'susi', 'susi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(4, 'dedi', 'dedi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(5, 'joko', 'joko@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(6, 'mira', 'mira@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(7, 'rudi', 'rudi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(8, 'tina', 'tina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(9, 'eko', 'eko@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(10, 'nina', 'nina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'user', '2025-01-08 15:46:29', NULL),
(11, 'bimo', 'bimo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(12, 'dian', 'dian@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(13, 'sandra', 'sandra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(14, 'fran', 'fran@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(15, 'arif', 'arif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(16, 'desi', 'desi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(17, 'gilang', 'gilang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(18, 'lina', 'lina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(19, 'yani', 'yani@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(20, 'leo', 'leo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(21, 'santi', 'santi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(22, 'benni', 'benni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(23, 'erik', 'erik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(24, 'cinta', 'cinta@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(25, 'ria', 'ria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:46:29', NULL),
(28, 'root', 'root@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'pending', 'user', '2025-01-08 15:55:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
