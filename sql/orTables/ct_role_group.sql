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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_role_group`
--
ALTER TABLE `ct_role_group`
  ADD PRIMARY KEY (`role_id_fk`,`group_id_fk`),
  ADD KEY `ct_role_group_ibfk_2` (`group_id_fk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_role_group`
--
ALTER TABLE `ct_role_group`
  ADD CONSTRAINT `ct_role_group_ibfk_1` FOREIGN KEY (`role_id_fk`) REFERENCES `service_role` (`id`),
  ADD CONSTRAINT `ct_role_group_ibfk_2` FOREIGN KEY (`group_id_fk`) REFERENCES `service_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
