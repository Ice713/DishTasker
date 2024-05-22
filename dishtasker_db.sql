-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 10:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dishtasker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `familymember`
--

CREATE TABLE `familymember` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familymember`
--

INSERT INTO `familymember` (`id`, `username`, `name`, `nickname`, `time_stamp`) VALUES
(20, 'Roger', 'Marie Juana', 'MJ', '2023-04-17 12:48:58'),
(21, 'Ruth', 'Romeo Juliet', 'RJ', '2023-04-17 12:56:31'),
(22, 'Roger', 'Jude Lumibao', 'Jude', '2023-04-17 14:16:04'),
(24, 'Roger', 'Rene Rivera', 'Rene', '2023-04-17 14:27:30'),
(25, 'Roger', 'Myline Reyes', 'Lin', '2023-04-17 15:02:25'),
(26, 'Roger', 'Jayson Reyes', 'Jay', '2023-04-17 15:06:57'),
(27, 'Roger', 'Ramon Reyes', 'Ram', '2023-04-17 15:07:06'),
(29, 'Roger', 'Regie Rivera', 'Regs', '2023-04-17 15:08:45'),
(31, 'Ruth', 'India Charlie', 'IC', '2023-04-17 16:39:12'),
(32, 'ice_123', 'Irish Jewel', 'IJ', '2023-04-18 06:59:19'),
(33, 'ice_123', 'IC Ramzil', 'IC', '2023-04-18 06:59:27'),
(34, 'ice_123', 'Chloe', 'Ate', '2023-04-18 07:00:04'),
(35, 'ice_123', 'Joshua', 'Josh', '2023-04-18 07:00:23'),
(36, 'maine_66', 'Jaani Shem', 'Jani', '2023-04-18 08:05:26'),
(37, 'maine_66', 'Maine Reyes', 'Meyn', '2023-04-18 08:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `members` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `time_stamp`) VALUES
(5, 'Mike', '$2y$10$Isih02p1aFR1izL2aN9r2.wzIrl7Ard9P550HSEglBsjQM/2UXFlS', '2023-04-16 16:28:52'),
(6, 'Roger', '$2y$10$jANPlSeFrdAbu8AO4au.Setm3hk/F9A9l7pG9Wmzx8hcALTShkLfu', '2023-04-17 09:18:37'),
(7, 'Jane', '$2y$10$yIlq88fUX42J7Xki0Dadc.w3iYqq9lzrtMpKe0NvQ1U00223bcfZ2', '2023-04-17 12:53:40'),
(8, 'Ruth', '$2y$10$7cFdmF5wpUQuu4cFQSw9Ium2UY8dScYR6AS0xb/bNZ6f5ruIlHLtC', '2023-04-17 12:54:46'),
(9, 'ice_123', '$2y$10$HTjEbHWpjLWt8ooGvtGjGeTMZTcrZlsmf0ihpSDDzw.oS9eiu5DX2', '2023-04-18 06:56:06'),
(10, 'irishganda', '$2y$10$.l7c/.NB3lrewpL7.pA8D.2mC/dyR1RV75hXTO/5oHcvPKDPCK6XO', '2023-04-18 07:07:44'),
(11, 'maine_66', '$2y$10$NNayt48m18BXT88FwQ8GcOK9TtWTlERIi3OKOCSTp2kb4N106w6IK', '2023-04-18 08:04:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familymember`
--
ALTER TABLE `familymember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familymember`
--
ALTER TABLE `familymember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
