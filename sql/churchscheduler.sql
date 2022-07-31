-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2022 at 08:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchscheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_group_helper`
--

CREATE TABLE `ct_group_helper` (
  `group_id_fk` int(11) NOT NULL,
  `helper_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_group_helper`
--

INSERT INTO `ct_group_helper` (`group_id_fk`, `helper_id_fk`) VALUES
(1, 26),
(1, 29),
(2, 4),
(2, 33),
(3, 27),
(3, 42),
(6, 25),
(6, 28);

-- --------------------------------------------------------

--
-- Table structure for table `ct_role_group`
--

CREATE TABLE `ct_role_group` (
  `role_id_fk` int(7) NOT NULL,
  `group_id_fk` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_role_group`
--

INSERT INTO `ct_role_group` (`role_id_fk`, `group_id_fk`) VALUES
(2, 1),
(5, 1),
(9, 1),
(2, 2),
(9, 2),
(1, 3),
(2, 3),
(7, 3),
(2, 6),
(8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ct_role_helper`
--

CREATE TABLE `ct_role_helper` (
  `role_id_fk` int(7) NOT NULL,
  `helper_id_fk` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ct_role_helper`
--

INSERT INTO `ct_role_helper` (`role_id_fk`, `helper_id_fk`) VALUES
(1, 4),
(9, 4),
(1, 17),
(1, 18),
(1, 19),
(7, 19),
(1, 22),
(5, 28),
(8, 30),
(8, 31),
(8, 32),
(8, 36);

-- --------------------------------------------------------

--
-- Table structure for table `service_group`
--

CREATE TABLE `service_group` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_group`
--

INSERT INTO `service_group` (`id`, `tname`) VALUES
(1, 'Berry & Jessie'),
(2, 'Angela\' Team'),
(3, 'Cassie & Fiona'),
(6, 'Hammer & Jessie');

-- --------------------------------------------------------

--
-- Table structure for table `service_helper`
--

CREATE TABLE `service_helper` (
  `id` int(255) NOT NULL,
  `tname` varchar(50) DEFAULT NULL,
  `tname_p` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notify` int(1) NOT NULL,
  `last_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_helper`
--

INSERT INTO `service_helper` (`id`, `tname`, `tname_p`, `email`, `notify`, `last_edit`) VALUES
(4, 'Ling Jiang', NULL, '', 1, '2022-07-30 14:57:22'),
(17, 'Tian Fei', NULL, '', 1, '2022-07-30 17:45:20'),
(18, 'Yan Liu', NULL, '', 1, '2022-07-30 17:45:31'),
(19, 'Tom Wu', NULL, '', 1, '2022-07-30 17:46:41'),
(20, 'Shi Chen', NULL, '', 1, '2022-07-30 17:46:46'),
(21, 'Jacky Zhang', NULL, '', 1, '2022-07-30 17:46:51'),
(22, 'Paul Liu', NULL, '', 1, '2022-07-30 17:47:01'),
(23, 'ZhongXing Yang', NULL, '', 1, '2022-07-30 17:47:22'),
(24, 'Xiaodong Li', NULL, '', 1, '2022-07-30 17:47:29'),
(25, 'Hammer', NULL, '', 1, '2022-07-30 17:47:35'),
(26, 'hongliang wang', NULL, '', 1, '2022-07-30 17:47:47'),
(27, 'Fiona Xu', NULL, '', 1, '2022-07-30 17:47:54'),
(28, 'Jessie Yang', NULL, '', 1, '2022-07-30 17:48:05'),
(29, 'Irene Cao', NULL, '', 1, '2022-07-30 17:48:16'),
(30, 'Chen Liang', NULL, '', 1, '2022-07-30 17:48:24'),
(31, 'Tina Sun', NULL, '', 1, '2022-07-30 17:48:41'),
(32, 'Kitty', NULL, '', 1, '2022-07-30 17:48:53'),
(33, 'Grace Guo', NULL, '', 1, '2022-07-30 17:48:58'),
(34, 'Vivian Xu', NULL, '', 1, '2022-07-30 17:49:04'),
(35, 'Yi Sheng', NULL, '', 1, '2022-07-30 17:49:15'),
(36, 'Xianzhang Wen', NULL, '', 1, '2022-07-30 17:49:25'),
(37, 'Kit Au', NULL, '', 1, '2022-07-30 17:49:34'),
(38, 'Berry', NULL, '', 1, '2022-07-30 17:49:39'),
(39, 'Phyllis Lai', NULL, '', 1, '2022-07-30 17:49:48'),
(40, 'Sophie Li', NULL, '', 1, '2022-07-30 17:49:57'),
(41, 'Alice Zhang', NULL, '', 1, '2022-07-30 17:50:02'),
(42, 'Cen Zhu', NULL, '', 1, '2022-07-30 17:50:14'),
(43, 'TianMei Wang', NULL, '', 1, '2022-07-30 17:51:35'),
(44, 'Zheng Gong', NULL, '', 1, '2022-07-30 18:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `service_plan`
--

CREATE TABLE `service_plan` (
  `id` int(11) NOT NULL,
  `seq` bigint(20) DEFAULT NULL,
  `seq_inweek` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_plan`
--

INSERT INTO `service_plan` (`id`, `seq`, `seq_inweek`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `service_role`
--

CREATE TABLE `service_role` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='worship,schooling,av';

--
-- Dumping data for table `service_role`
--

INSERT INTO `service_role` (`id`, `tname`) VALUES
(1, 'MC'),
(2, 'Worship Team'),
(5, 'Audio Team'),
(7, 'Holy Communion'),
(8, 'Ushers'),
(9, 'Children Sunday School');

-- --------------------------------------------------------

--
-- Table structure for table `sundays`
--

CREATE TABLE `sundays` (
  `year` int(7) NOT NULL DEFAULT '2022',
  `id` int(255) NOT NULL,
  `sunday` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sundays`
--

INSERT INTO `sundays` (`year`, `id`, `sunday`) VALUES
(2022, 1, '2022-01-02'),
(2022, 2, '2022-01-09'),
(2022, 3, '2022-01-16'),
(2022, 4, '2022-01-23'),
(2022, 5, '2022-01-30'),
(2022, 6, '2022-02-06'),
(2022, 7, '2022-02-13'),
(2022, 8, '2022-02-20'),
(2022, 9, '2022-02-27'),
(2022, 10, '2022-03-06'),
(2022, 11, '2022-03-13'),
(2022, 12, '2022-03-20'),
(2022, 13, '2022-03-27'),
(2022, 14, '2022-04-03'),
(2022, 15, '2022-04-10'),
(2022, 16, '2022-04-17'),
(2022, 17, '2022-04-24'),
(2022, 18, '2022-05-01'),
(2022, 19, '2022-05-08'),
(2022, 20, '2022-05-15'),
(2022, 21, '2022-05-22'),
(2022, 22, '2022-05-29'),
(2022, 23, '2022-06-05'),
(2022, 24, '2022-06-12'),
(2022, 25, '2022-06-19'),
(2022, 26, '2022-06-26'),
(2022, 27, '2022-07-03'),
(2022, 28, '2022-07-10'),
(2022, 29, '2022-07-17'),
(2022, 30, '2022-07-24'),
(2022, 31, '2022-07-31'),
(2022, 32, '2022-08-07'),
(2022, 33, '2022-08-14'),
(2022, 34, '2022-08-21'),
(2022, 35, '2022-08-28'),
(2022, 36, '2022-09-04'),
(2022, 37, '2022-09-11'),
(2022, 38, '2022-09-18'),
(2022, 39, '2022-09-25'),
(2022, 40, '2022-10-02'),
(2022, 41, '2022-10-09'),
(2022, 42, '2022-10-16'),
(2022, 43, '2022-10-23'),
(2022, 44, '2022-10-30'),
(2022, 45, '2022-11-06'),
(2022, 46, '2022-11-13'),
(2022, 47, '2022-11-20'),
(2022, 48, '2022-11-27'),
(2022, 49, '2022-12-04'),
(2022, 50, '2022-12-11'),
(2022, 51, '2022-12-18'),
(2022, 52, '2022-12-25'),
(2023, 53, '2023-01-01'),
(2023, 54, '2023-01-08'),
(2023, 55, '2023-01-15'),
(2023, 56, '2023-01-22'),
(2023, 57, '2023-01-29'),
(2023, 58, '2023-02-05'),
(2023, 59, '2023-02-12'),
(2023, 60, '2023-02-19'),
(2023, 61, '2023-02-26'),
(2023, 62, '2023-03-05'),
(2023, 63, '2023-03-12'),
(2023, 64, '2023-03-19'),
(2023, 65, '2023-03-26'),
(2023, 66, '2023-04-02'),
(2023, 67, '2023-04-09'),
(2023, 68, '2023-04-16'),
(2023, 69, '2023-04-23'),
(2023, 70, '2023-04-30'),
(2023, 71, '2023-05-07'),
(2023, 72, '2023-05-14'),
(2023, 73, '2023-05-21'),
(2023, 74, '2023-05-28'),
(2023, 75, '2023-06-04'),
(2023, 76, '2023-06-11'),
(2023, 77, '2023-06-18'),
(2023, 78, '2023-06-25'),
(2023, 79, '2023-07-02'),
(2023, 80, '2023-07-09'),
(2023, 81, '2023-07-16'),
(2023, 82, '2023-07-23'),
(2023, 83, '2023-07-30'),
(2023, 84, '2023-08-06'),
(2023, 85, '2023-08-13'),
(2023, 86, '2023-08-20'),
(2023, 87, '2023-08-27'),
(2023, 88, '2023-09-03'),
(2023, 89, '2023-09-10'),
(2023, 90, '2023-09-17'),
(2023, 91, '2023-09-24'),
(2023, 92, '2023-10-01'),
(2023, 93, '2023-10-08'),
(2023, 94, '2023-10-15'),
(2023, 95, '2023-10-22'),
(2023, 96, '2023-10-29'),
(2023, 97, '2023-11-05'),
(2023, 98, '2023-11-12'),
(2023, 99, '2023-11-19'),
(2023, 100, '2023-11-26'),
(2023, 101, '2023-12-03'),
(2023, 102, '2023-12-10'),
(2023, 103, '2023-12-17'),
(2023, 104, '2023-12-24'),
(2023, 105, '2023-12-31'),
(2024, 106, '2024-01-07'),
(2024, 107, '2024-01-14'),
(2024, 108, '2024-01-21'),
(2024, 109, '2024-01-28'),
(2024, 110, '2024-02-04'),
(2024, 111, '2024-02-11'),
(2024, 112, '2024-02-18'),
(2024, 113, '2024-02-25'),
(2024, 114, '2024-03-03'),
(2024, 115, '2024-03-10'),
(2024, 116, '2024-03-17'),
(2024, 117, '2024-03-24'),
(2024, 118, '2024-03-31'),
(2024, 119, '2024-04-07'),
(2024, 120, '2024-04-14'),
(2024, 121, '2024-04-21'),
(2024, 122, '2024-04-28'),
(2024, 123, '2024-05-05'),
(2024, 124, '2024-05-12'),
(2024, 125, '2024-05-19'),
(2024, 126, '2024-05-26'),
(2024, 127, '2024-06-02'),
(2024, 128, '2024-06-09'),
(2024, 129, '2024-06-16'),
(2024, 130, '2024-06-23'),
(2024, 131, '2024-06-30'),
(2024, 132, '2024-07-07'),
(2024, 133, '2024-07-14'),
(2024, 134, '2024-07-21'),
(2024, 135, '2024-07-28'),
(2024, 136, '2024-08-04'),
(2024, 137, '2024-08-11'),
(2024, 138, '2024-08-18'),
(2024, 139, '2024-08-25'),
(2024, 140, '2024-09-01'),
(2024, 141, '2024-09-08'),
(2024, 142, '2024-09-15'),
(2024, 143, '2024-09-22'),
(2024, 144, '2024-09-29'),
(2024, 145, '2024-10-06'),
(2024, 146, '2024-10-13'),
(2024, 147, '2024-10-20'),
(2024, 148, '2024-10-27'),
(2024, 149, '2024-11-03'),
(2024, 150, '2024-11-10'),
(2024, 151, '2024-11-17'),
(2024, 152, '2024-11-24'),
(2024, 153, '2024-12-01'),
(2024, 154, '2024-12-08'),
(2024, 155, '2024-12-15'),
(2024, 156, '2024-12-22'),
(2024, 157, '2024-12-29'),
(2025, 158, '2025-01-05'),
(2025, 159, '2025-01-12'),
(2025, 160, '2025-01-19'),
(2025, 161, '2025-01-26'),
(2025, 162, '2025-02-02'),
(2025, 163, '2025-02-09'),
(2025, 164, '2025-02-16'),
(2025, 165, '2025-02-23'),
(2025, 166, '2025-03-02'),
(2025, 167, '2025-03-09'),
(2025, 168, '2025-03-16'),
(2025, 169, '2025-03-23'),
(2025, 170, '2025-03-30'),
(2025, 171, '2025-04-06'),
(2025, 172, '2025-04-13'),
(2025, 173, '2025-04-20'),
(2025, 174, '2025-04-27'),
(2025, 175, '2025-05-04'),
(2025, 176, '2025-05-11'),
(2025, 177, '2025-05-18'),
(2025, 178, '2025-05-25'),
(2025, 179, '2025-06-01'),
(2025, 180, '2025-06-08'),
(2025, 181, '2025-06-15'),
(2025, 182, '2025-06-22'),
(2025, 183, '2025-06-29'),
(2025, 184, '2025-07-06'),
(2025, 185, '2025-07-13'),
(2025, 186, '2025-07-20'),
(2025, 187, '2025-07-27'),
(2025, 188, '2025-08-03'),
(2025, 189, '2025-08-10'),
(2025, 190, '2025-08-17'),
(2025, 191, '2025-08-24'),
(2025, 192, '2025-08-31'),
(2025, 193, '2025-09-07'),
(2025, 194, '2025-09-14'),
(2025, 195, '2025-09-21'),
(2025, 196, '2025-09-28'),
(2025, 197, '2025-10-05'),
(2025, 198, '2025-10-12'),
(2025, 199, '2025-10-19'),
(2025, 200, '2025-10-26'),
(2025, 201, '2025-11-02'),
(2025, 202, '2025-11-09'),
(2025, 203, '2025-11-16'),
(2025, 204, '2025-11-23'),
(2025, 205, '2025-11-30'),
(2025, 206, '2025-12-07'),
(2025, 207, '2025-12-14'),
(2025, 208, '2025-12-21'),
(2025, 209, '2025-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_group_helper`
--
ALTER TABLE `ct_group_helper`
  ADD PRIMARY KEY (`group_id_fk`,`helper_id_fk`),
  ADD KEY `group_id_fk` (`group_id_fk`),
  ADD KEY `helper_id_fk` (`helper_id_fk`);

--
-- Indexes for table `ct_role_group`
--
ALTER TABLE `ct_role_group`
  ADD PRIMARY KEY (`role_id_fk`,`group_id_fk`),
  ADD KEY `ct_role_group_ibfk_2` (`group_id_fk`);

--
-- Indexes for table `ct_role_helper`
--
ALTER TABLE `ct_role_helper`
  ADD PRIMARY KEY (`role_id_fk`,`helper_id_fk`),
  ADD KEY `constrain1` (`helper_id_fk`);

--
-- Indexes for table `service_group`
--
ALTER TABLE `service_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_helper`
--
ALTER TABLE `service_helper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_plan`
--
ALTER TABLE `service_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_role`
--
ALTER TABLE `service_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sundays`
--
ALTER TABLE `sundays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_group`
--
ALTER TABLE `service_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_helper`
--
ALTER TABLE `service_helper`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `service_plan`
--
ALTER TABLE `service_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_role`
--
ALTER TABLE `service_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sundays`
--
ALTER TABLE `sundays`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_group_helper`
--
ALTER TABLE `ct_group_helper`
  ADD CONSTRAINT `ct_group_helper_ibfk_1` FOREIGN KEY (`group_id_fk`) REFERENCES `service_group` (`id`),
  ADD CONSTRAINT `ct_group_helper_ibfk_2` FOREIGN KEY (`helper_id_fk`) REFERENCES `service_helper` (`id`);

--
-- Constraints for table `ct_role_group`
--
ALTER TABLE `ct_role_group`
  ADD CONSTRAINT `ct_role_group_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `service_role` (`id`),
  ADD CONSTRAINT `ct_role_group_ibfk_2` FOREIGN KEY (`group_id_fk`) REFERENCES `service_group` (`id`);

--
-- Constraints for table `ct_role_helper`
--
ALTER TABLE `ct_role_helper`
  ADD CONSTRAINT `constrain1` FOREIGN KEY (`helper_id_fk`) REFERENCES `service_helper` (`id`),
  ADD CONSTRAINT `ct_role_helper_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `service_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
