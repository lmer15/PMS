-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 01:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountsdetails`
--

CREATE TABLE `accountsdetails` (
  `ad_ID` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_username` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountsdetails`
--

INSERT INTO `accountsdetails` (`ad_ID`, `ad_name`, `ad_username`, `ad_email`, `ad_password`) VALUES
(10, 'Elmer Rapon', 'lmer16', 'raponelmer15@gmail.com', '$2y$10$/psYBpms7tTIB8Q8Es6g2Od2KGrBaXm/HDaErPf1/VdFaytcVgQbq'),
(11, 'SANDRIA CADUSALE', 'sandriacadusale@gmail.com', 'sandriacadusale@gmail.com', '$2y$10$HiyIpNjd.Sb9Q4nEEfCLQ.B55sxHUSY2Wo3iqHuEDivGdBx23aiN6');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `owner` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `access_code` varchar(7) NOT NULL,
  `color` varchar(7) NOT NULL,
  `days_left` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsdetails`
--
ALTER TABLE `accountsdetails`
  ADD PRIMARY KEY (`ad_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsdetails`
--
ALTER TABLE `accountsdetails`
  MODIFY `ad_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `accountsdetails` (`ad_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
