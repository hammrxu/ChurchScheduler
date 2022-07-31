-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2022 at 08:30 PM
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
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_group_helper`
--
ALTER TABLE `ct_group_helper`
  ADD CONSTRAINT `ct_group_helper_ibfk_1` FOREIGN KEY (`group_id_fk`) REFERENCES `service_group` (`id`),
  ADD CONSTRAINT `ct_group_helper_ibfk_2` FOREIGN KEY (`helper_id_fk`) REFERENCES `service_helper` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
