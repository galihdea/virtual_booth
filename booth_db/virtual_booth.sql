-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 03:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_booth`
--

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `floor_level` int(11) NOT NULL,
  `booth_slot_index` int(11) NOT NULL,
  `booth_type` varchar(60) DEFAULT NULL,
  `booth_text` varchar(200) DEFAULT NULL,
  `booth_image` varchar(200) DEFAULT NULL,
  `booth_video` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `floor_level`, `booth_slot_index`, `booth_type`, `booth_text`, `booth_image`, `booth_video`) VALUES
(41, 1, 1, NULL, NULL, NULL, NULL),
(42, 1, 2, NULL, NULL, NULL, NULL),
(43, 1, 3, NULL, NULL, NULL, NULL),
(44, 1, 4, NULL, NULL, NULL, NULL),
(45, 1, 5, NULL, NULL, NULL, NULL),
(46, 1, 6, NULL, NULL, NULL, NULL),
(47, 1, 7, NULL, NULL, NULL, NULL),
(48, 1, 8, NULL, NULL, NULL, NULL),
(49, 2, 1, NULL, NULL, NULL, NULL),
(50, 2, 2, NULL, NULL, NULL, NULL),
(51, 2, 3, NULL, NULL, NULL, NULL),
(52, 2, 4, NULL, NULL, NULL, NULL),
(53, 2, 5, NULL, NULL, NULL, NULL),
(54, 2, 6, NULL, NULL, NULL, NULL),
(55, 2, 7, NULL, NULL, NULL, NULL),
(56, 2, 8, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
