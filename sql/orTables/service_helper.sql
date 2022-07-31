-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2022 at 08:31 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_helper`
--
ALTER TABLE `service_helper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_helper`
--
ALTER TABLE `service_helper`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
