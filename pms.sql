-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 06:11 AM
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
  `ad_password` varchar(200) NOT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountsdetails`
--

INSERT INTO `accountsdetails` (`ad_ID`, `ad_name`, `ad_username`, `ad_email`, `ad_password`, `plan_id`) VALUES
(22, 'Elmer Rapon', 'lmer15', 'raponelmer15@gmail.com', '$2y$10$3Sh6sVCMhu6weIRn1fMG..9Hs6eNQHcyrSrzpsktDmk2cVdc5a2Oy', 1),
(23, 'Jamaica Anuba', 'maica', 'jamaica@gmail.com', '$2y$10$GZYEo/Blb9p3a7zy1IZvDOKaF4F7tyYP8Er/vn8Rti5.rKgRa/HHG', 4),
(24, 'Bungi Ngi', 'ngi', 'ngi@gmail.com', '$2y$10$p5u3voFAVyDaB0D4klhhm.VCi1Q1gSEzFZE.BaidrQavsvkNc/84G', 4),
(25, 'Aries Cabral', 'aries', 'cabralaries@gmail.com', '$2y$10$LrCytmSJx8sTFCrhFxS8XOC6fXDMFDERTAZF9Ty2KJzykpMX.AXwG', 4),
(26, 'Lemon Juice', 'lemon', 'lemonjuice@gmail.com', '$2y$10$KPKQ7cejIHPO./HxwMYnLOGRoOdDDd5Sglcdp01aKJ4QQQL2Bqt02', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `sub_id`, `pay_date`, `pay_status`) VALUES
(20, 20, '2024-12-08', 'Completed');

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
(34, 22, 'BSIT3A_FINAL_WORKS', 'Coding Collaboration', '2024-12-10', '2024-12-11', '93C03F', '#b6c1ff', 2, 'Ongoing'),
(35, 22, 'GROUP2_MOVIE SCRIPT', 'Send Script Each Scene', '2024-12-11', '2024-12-12', '58C2C2', '#b7e6c9', 3, 'Ongoing'),
(36, 22, 'TEAM GAIA | FINAL ', 'System Collaboration', '2024-12-13', '2024-12-18', '669BD9', '#e6b7e0', 9, 'Ongoing'),
(37, 22, 'MAMATAY NAKO ANI HAPIT', 'Tabang mga langit. Mygaddd', '2024-12-16', '2024-12-17', '1E38FF', '#ffffff', 8, 'Ongoing'),
(38, 22, 'MAMA MIA | IT HURTS', 'Nganong siya paman?', '2024-12-25', '2024-12-25', '7D2509', '#e6b7e0', 16, 'Ongoing'),
(39, 22, 'Marris Racal Issue', 'Tsismis is life, yeah yeah', '2024-12-10', '2024-12-18', '625559', '#b6c1ff', 9, 'Ongoing'),
(40, 22, 'SADBOI SPOTTED', 'Kung ako nalang jd diay?', '2024-12-13', '2024-12-22', 'CF8BBD', '#b7e6c9', 13, 'Ongoing'),
(41, 22, 'Manifesting Research Defended', 'Sir malooy ka papasara me.', '2024-12-19', '2024-12-22', 'FF13E6', '#b6c1ff', 13, 'Ongoing');

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
(6, 34, 23, 'active'),
(7, 34, 24, 'active'),
(8, 34, 25, 'active'),
(9, 34, 26, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sub_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `sub_status` varchar(50) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `user_id`, `plan_id`, `sub_status`, `start_date`) VALUES
(20, 22, 1, 'Active', '2024-12-08 22:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`plan_id`, `plan_name`, `price`) VALUES
(1, 'Basic', 19.00),
(2, 'Standard', 39.00),
(3, 'Professional', 59.00),
(4, 'default', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsdetails`
--
ALTER TABLE `accountsdetails`
  ADD PRIMARY KEY (`ad_ID`),
  ADD KEY `accountsdetails_ibfk_1` (`plan_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `sub_id` (`sub_id`);

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
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsdetails`
--
ALTER TABLE `accountsdetails`
  MODIFY `ad_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `membersID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountsdetails`
--
ALTER TABLE `accountsdetails`
  ADD CONSTRAINT `accountsdetails_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plan` (`plan_id`) ON DELETE SET NULL;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subscription` (`sub_id`) ON DELETE CASCADE;

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

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accountsdetails` (`ad_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plan` (`plan_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
