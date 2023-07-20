-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 12:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `botony`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `contact`, `role`, `status`) VALUES
(7, 'bakhtmuner06@gmail.com', '$2y$10$u9V4Dq2raH3WawD.pFpHm./GS2A2pfmmNACYuZ8UIMkFybBQI/jB.', '03329611333', 'superAdmin', 1),
(8, 'sarzamin@gmail.com', '$2y$10$VzTeq42woU.r4zjXtpAed.SQBvN43hIDEbrnSV05xWZPDsJss6F1.', '123', 'subAdmin', 0),
(9, 'rahman@gmail.com', '$2y$10$daesP1ugLHBUiP4fJkHPvO2vrMVOIUEOJ6PBqLVrC6ionvnQUPkBi', '112233', 'user', 0),
(10, 'rahmanbunerwal91@gmail.com', '$2y$10$5AYELZkDtg1X6Dqn955Y7O.67RShZE/xbrUdtuOetm3GFzdSkBJoe', '223311', 'user', 0),
(11, 'admin@gmail.com', '$2y$10$twJmP2K4Lz/fS7FSTx.I9O45lmy1E1.tdCy36H7sroD.wxf/GNfnG', '033212345678', 'superAdmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `algue`
--

CREATE TABLE `algue` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `algue`
--

INSERT INTO `algue` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'xyz', 'sysnonyams', 'algae', 'A', 'pakistan', 'kpk', 'abc', '1234', '2022', '2023-03-22', '$test data', 'Rahman.jpeg'),
(2, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(3, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(4, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(5, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(6, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(7, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(8, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(9, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', ''),
(10, '', 'sysnonyams', '', '', '', '', '', '', '', '0000-00-00', '$', '');

-- --------------------------------------------------------

--
-- Table structure for table `angiosperms`
--

CREATE TABLE `angiosperms` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `sysnonyms` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angiosperms`
--

INSERT INTO `angiosperms` (`id`, `botanical`, `sysnonyms`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(78, 'grey', 'gree', 'gty', 'yu', 'sd', 'yu', '89', '78', '67', '0000-00-00', 'ghsss', '10.png');

-- --------------------------------------------------------

--
-- Table structure for table `bryophytes`
--

CREATE TABLE `bryophytes` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `sysnonyms` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fungi`
--

CREATE TABLE `fungi` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `sysnonyam` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fungi`
--

INSERT INTO `fungi` (`id`, `botanical`, `sysnonyam`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, 'sarzamin ', 'khan', 'jumati-e-islami', 'kp', 'pakistan', 'kpk', 'Imran khan', '', '', '0000-00-00', 'i am khan', 'p1.png');

-- --------------------------------------------------------

--
-- Table structure for table `gymnosperms`
--

CREATE TABLE `gymnosperms` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `synonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gymnosperms`
--

INSERT INTO `gymnosperms` (`id`, `botanical`, `synonyams`, `family`, `group`, `country`, `province`, `collector`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lichens`
--

CREATE TABLE `lichens` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `sysnonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collector` varchar(50) NOT NULL,
  `collection number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichens`
--

INSERT INTO `lichens` (`id`, `botanical`, `sysnonyams`, `family`, `group`, `country`, `province`, `collector`, `collection number`, `year`, `upload_date`, `description`, `picture`) VALUES
(12, 'tree', 'plants', 'plants', 'marks', 'pakistan', 'kpk', 'muhammad', '1223', '2023', '2023-02-15', 'this is a plants.', 'p1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pteridophytes`
--

CREATE TABLE `pteridophytes` (
  `id` int(11) NOT NULL,
  `botanical` varchar(255) NOT NULL,
  `sysnonyams` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `group` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `collecter` varchar(50) NOT NULL,
  `collection_number` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pteridophytes`
--

INSERT INTO `pteridophytes` (`id`, `botanical`, `sysnonyams`, `family`, `group`, `country`, `province`, `collecter`, `collection_number`, `year`, `upload_date`, `description`, `picture`) VALUES
(1234, 'hhhhh', 'shhh', 'xdjdjc', 'u', 'u', 'u', 'u', 'r', '2022', '2023-02-08', '', ''),
(1235, '', '', '', '', '', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_otp`
--

CREATE TABLE `user_otp` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `algue`
--
ALTER TABLE `algue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angiosperms`
--
ALTER TABLE `angiosperms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bryophytes`
--
ALTER TABLE `bryophytes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fungi`
--
ALTER TABLE `fungi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gymnosperms`
--
ALTER TABLE `gymnosperms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lichens`
--
ALTER TABLE `lichens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pteridophytes`
--
ALTER TABLE `pteridophytes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otp`
--
ALTER TABLE `user_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `algue`
--
ALTER TABLE `algue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bryophytes`
--
ALTER TABLE `bryophytes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fungi`
--
ALTER TABLE `fungi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gymnosperms`
--
ALTER TABLE `gymnosperms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pteridophytes`
--
ALTER TABLE `pteridophytes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- AUTO_INCREMENT for table `user_otp`
--
ALTER TABLE `user_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
