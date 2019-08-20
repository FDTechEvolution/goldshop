-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 08:50 AM
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
-- Table structure for table `bpartners`
--

CREATE TABLE `bpartners` (
  `id` char(36) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `iscustomer` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `taxid` char(13) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `midified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `description` text,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bpartners`
--

INSERT INTO `bpartners` (`id`, `code`, `name`, `title`, `firstname`, `lastname`, `iscustomer`, `isactive`, `taxid`, `birthday`, `religion`, `created`, `createdby`, `midified`, `modifiedby`, `description`, `org_id`, `branch_id`, `phone`, `mobile`, `email`, `address_id`) VALUES
('882f576f-7330-4e92-82d2-72ca31b928df', NULL, 'นายs s', 'นาย', 's', 's', 'Y', 'Y', 's', NULL, 's', '2018-02-27 11:30:45', '935ab8e8-c2f7-4743-8950-96e1012a07a0', NULL, '935ab8e8-c2f7-4743-8950-96e1012a07a0', '', '458b4d94-42d5-4895-9069-0cb6c7895d75', '8905de0c-8652-4b7c-9cf9-decf9055e9f9', 'ss', 'ss', 'ss@dd.hj', ''),
('fa91acf6-e0af-4445-a3d6-e08707418419', NULL, 'นายสาคร แสงแก้ว', 'นาย', 'สาคร', 'แสงแก้ว', 'Y', 'Y', '1234567890123', NULL, 'พุทธ', '2018-02-27 11:18:52', '935ab8e8-c2f7-4743-8950-96e1012a07a0', NULL, NULL, '', '0', '0', '035123456', '0321654789', 'sa@sa.sa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bpartners`
--
ALTER TABLE `bpartners`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
