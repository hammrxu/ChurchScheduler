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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_role_helper`
--
ALTER TABLE `ct_role_helper`
  ADD PRIMARY KEY (`role_id_fk`,`helper_id_fk`),
  ADD KEY `constrain1` (`helper_id_fk`);

--
-- Constraints for dumped tables
--

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
