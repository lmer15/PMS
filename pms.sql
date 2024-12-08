-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2024 at 07:19 AM
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
(12, 'Elmer', 'Rapon', 'raponelmer15@gmail.com', '$2y$10$Tv1v81.iYfj6Qfyv2OqqYeVGhN0E8daSR8kVksEAz7tQ7V7k6f10q'),
(13, 'Jamaica Anuba', 'maica', 'anubajamaica@gmail.com', '$2y$10$lscIeZiPEkQi8yjM6bXwKOuHGXs1HahfXBoPKPbLcJFsIDbXnSlYS');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `owner` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `access_code` varchar(7) NOT NULL,
  `color` varchar(7) NOT NULL,
  `days_left` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `owner`, `name`, `category`, `start_date`, `finish_date`, `access_code`, `color`, `days_left`, `status`) VALUES
(7, 12, 'IT3A | TYPING CONTEST', 'Typing contest for all the IT3A sections.', '2024-12-07', '2024-12-08', '36DFD5', '#b6c1ff', 1, 'archived'),
(8, 12, 'TYPING', 'cskjdfhkergilfbj', '2024-12-07', '2024-12-16', 'B27F25', '#b7e6c9', 9, 'Ongoing'),
(9, 12, 'kefhekbgf', 'etfheritil5ynh', '2024-12-07', '2024-12-07', '2FFB92', '#b7e6c9', 0, 'Ongoing'),
(10, 12, 'nashsdvfkhrjlghtgn', 'frhrsjry', '2024-12-13', '2024-12-18', '330CFA', '#b6c1ff', 11, 'Ongoing'),
(11, 13, 'sssssssss', 'vvvvvv', '2024-12-19', '2024-12-25', 'F474B6', '#e6b7e0', 18, 'archived'),
(12, 12, 'KJHFERLDKGGRTRTMUTJ', 'RHDRYJSYKRDKTUK', '2024-12-07', '2024-12-10', 'A154F7', '#b7e6c9', 3, 'Ongoing'),
(13, 12, 'SDGSEK6', 'RJSRTRJ', '2024-12-25', '2024-12-26', 'E25C17', '#b7e6c9', 19, 'Ongoing'),
(14, 12, 'THJFBKJGKBKNKM,', 'DJGRLKGNLRGLKM,G', '2024-12-14', '2024-12-22', '083A05', '#b6c1ff', 15, 'Ongoing'),
(15, 12, 'GDRJTRYF', 'RJRXTSRT', '2024-12-07', '2024-12-12', '66C237', '#b6c1ff', 5, 'Ongoing'),
(16, 12, 'GDRJTRYF', 'RJRXTSRT', '2024-12-07', '2024-12-12', 'C8F083', '#b6c1ff', 5, 'Ongoing'),
(17, 12, 'sefgsrt', 'erhs', '2024-12-14', '2024-12-26', '10A951', '#b6c1ff', 19, 'Ongoing'),
(18, 12, 'a,jfgwekugfbjgrfd', 'edf.jkwejhgfirwgwiglrrg', '2024-12-14', '2024-12-16', '493A62', '#b6c1ff', 9, 'Ongoing'),
(19, 13, 'RUHGERKBGJTH', 'RGERJGHBRLJGMR', '2024-12-19', '2025-01-02', 'DC2432', '#b6c1ff', 26, 'archived'),
(20, 13, 'ANDFKGNKLER .,HN', 'EFWKEHFWELGNKREG', '2024-12-13', '2024-12-25', 'AA800F', '#b7e6c9', 18, 'archived'),
(21, 13, 'ANDFKGNKLER .,HN', 'EFWKEHFWELGNKREG', '2024-12-13', '2024-12-25', '6DF6CE', '#b7e6c9', 18, 'Ongoing'),
(22, 13, 'jdbcksdjvbdkfjgmfb', 'wdjhgdjesfdkbfbjk', '2024-12-08', '2024-12-10', 'DE9572', '#b6c1ff', 3, 'Ongoing'),
(23, 13, 'jkedfskdjfd', 'keshfoilrsglnket', '2024-12-13', '2024-12-13', '4B0282', '#b6c1ff', 6, 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `membersID` int(20) NOT NULL,
  `project_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`membersID`, `project_id`, `user_id`, `status`) VALUES
(4, 7, 13, 'Active');

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
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`membersID`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_members_ibfk_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsdetails`
--
ALTER TABLE `accountsdetails`
  MODIFY `ad_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `membersID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `accountsdetails` (`ad_ID`);

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `project_members_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `accountsdetails` (`ad_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
