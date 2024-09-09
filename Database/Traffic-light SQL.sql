-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `trafficsignal`
--

-- --------------------------------------------------------

--
-- Table structure for table `sequence`
--

CREATE TABLE `sequence` (
  `id` int(11) NOT NULL,
  `sequence` varchar(255) NOT NULL,
  `green_interval` int(11) NOT NULL,
  `yellow_interval` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `Stopped_AT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`id`, `sequence`, `green_interval`, `yellow_interval`, `created_at`, `Stopped_AT`) VALUES
(1, 'A, B, C, D', 230, 430, '2024-09-09 14:18:45', '2024-09-09 10:48:56'),
(2, 'D,C,A,B', 560, 650, '2024-09-09 14:19:18', '2024-09-09 10:49:37'),
(3, 'A, B, C, D', 670, 650, '2024-09-09 15:31:55', '2024-09-09 12:02:46'),
(4, 'A, B, C, D', 560, 440, '2024-09-09 15:38:23', '2024-09-09 12:08:34'),
(5, 'A, B, C, D', 450, 540, '2024-09-09 15:39:08', '2024-09-09 12:09:14');


-- Indexes for table `sequence`
--
ALTER TABLE `sequence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sequence`
--
ALTER TABLE `sequence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;


