-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 08:17 AM
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
-- Table structure for table `pawns`
--

CREATE TABLE `pawns` (
  `id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `bpartner_id` char(36) NOT NULL,
  `bank_account_id` char(36) NOT NULL,
  `docdate` date NOT NULL,
  `docno` varchar(100) NOT NULL,
  `expiredate` date NOT NULL,
  `returndate` date DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'DR',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `cratedby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `totalmoney` int(6) NOT NULL,
  `rate` decimal(4,2) NOT NULL,
  `type` varchar(5) NOT NULL,
  `interrestrate` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pawns`
--

INSERT INTO `pawns` (`id`, `org_id`, `branch_id`, `bpartner_id`, `bank_account_id`, `docdate`, `docno`, `expiredate`, `returndate`, `status`, `description`, `created`, `cratedby`, `modified`, `modifiedby`, `totalmoney`, `rate`, `type`, `interrestrate`) VALUES
('02674798-b533-4533-915e-48723639db55', '458b4d94-42d5-4895-9069-0cb6c7895d75', '8905de0c-8652-4b7c-9cf9-decf9055e9f9', '79638622-a237-4b19-af30-ea108d164a3b', '0cff3359-1334-407f-be07-a78ccd1b4dbe', '0000-00-00', '8', '0000-00-00', '2018-03-31', 'DR', '', '2018-03-09 07:24:14', '935ab8e8-c2f7-4743-8950-96e1012a07a0', '2018-03-09 07:24:14', NULL, 0, '0.00', '', 0),
('410d659d-57e3-4662-a744-75829f817827', '458b4d94-42d5-4895-9069-0cb6c7895d75', '8905de0c-8652-4b7c-9cf9-decf9055e9f9', '423e57d0-932b-4858-8d4f-b03c96dd46a0', '0cff3359-1334-407f-be07-a78ccd1b4dbe', '3104-03-10', '1', '3104-03-10', '3104-03-25', 'DR', '', '2018-03-10 07:47:56', '935ab8e8-c2f7-4743-8950-96e1012a07a0', '2018-03-10 07:47:56', NULL, 25000, '1.00', '2.5%', 250),
('d5aa127b-301c-465b-8492-d3f1309f729c', '458b4d94-42d5-4895-9069-0cb6c7895d75', '8905de0c-8652-4b7c-9cf9-decf9055e9f9', '38ff2c29-3f2e-4a56-a518-0b0b6a064135', '0cff3359-1334-407f-be07-a78ccd1b4dbe', '2018-03-10', '1', '2018-03-10', '2018-03-25', 'DR', '', '2018-03-10 07:50:46', '935ab8e8-c2f7-4743-8950-96e1012a07a0', '2018-03-10 07:50:46', NULL, 25000, '1.00', '2.5%', 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pawns`
--
ALTER TABLE `pawns`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
