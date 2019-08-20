-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 11:37 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gold`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobileno` char(10) NOT NULL,
  `cardno` char(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'N',
  `role_id` char(36) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `firstname`, `lastname`, `mobileno`, `cardno`, `email`, `birthday`, `startdate`, `password`, `username`, `isactive`, `role_id`, `position`, `created`, `createdby`, `modified`, `modifiedby`, `description`, `org_id`, `branch_id`) VALUES
('0', '-', 'System', 'FDTech', '0911489090', '-', 'contact@fdtech.co.th', '2018-02-18', '2018-02-18', '$2y$10$iR2XKzWIjtDFMh/k4yRYu.jrpHQ9VsEkj/eD.gMWcF45rMSM2CFJC', 'FDTech', 'Y', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'System', '2018-02-18 15:52:10', '0', '2018-02-18 15:52:17', '0', NULL, '0', '0'),
('935ab8e8-c2f7-4743-8950-96e1012a07a0', 'นาย', 'กานต์', 'ทองยิ้ม', '0123456789', '7894561323215', 'admin@gold.com', '2018-02-13', '2018-02-21', '$2y$10$Nk/lsduysVfp0zH5O0YBAuosXFCoxBQ5PBprPxWAl7CCNBchmosT2', 'admin', 'Y', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'ทดสอบ', '2018-02-19 09:53:18', 'uan', '2018-02-19 09:53:18', NULL, NULL, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
