-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2018 at 09:51 AM
-- Server version: 10.2.11-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ywrshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` char(36) NOT NULL,
  `name` varchar(45) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `createdby` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `product_category_id` char(36) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `isactive`, `description`, `createdby`, `created`, `modified`, `modifiedby`, `product_category_id`, `value`) VALUES
('0b9ed4cb-5c27-44ff-8d82-358c310fe887', '60.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:31', '2018-05-27 09:43:31', NULL, NULL, '60.78'),
('0fec1065-6198-4a62-81c5-e7a70b13f71f', '2.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:05', '2018-05-27 09:43:05', NULL, NULL, '2.78'),
('2792c4ad-471a-41ea-8cff-60b102e07203', '45.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:22', '2018-05-27 09:43:22', NULL, NULL, '45.58'),
('45d6f56c-e25f-4d57-bf10-9cc840d036f2', '0.60g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:40:39', '2018-05-27 09:40:39', NULL, NULL, '0.60'),
('4d761f82-9857-47a6-a1cc-6ecb7803dd6e', '75.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:40', '2018-05-27 09:43:40', NULL, NULL, '75.58'),
('5010c746-e7f7-4cb4-83f7-c3ed283e75a4', '11.38g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:25', '2018-05-27 09:42:25', NULL, NULL, '11.38'),
('7d9b9e3f-0e58-47d9-8fd5-1c8a467cba78', '30.38g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:14', '2018-05-27 09:43:14', NULL, NULL, '30.38'),
('871ce44e-1f55-4330-920f-037d0a9ed8d3', '1.00g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:40:53', '2018-05-27 09:40:53', NULL, NULL, '1.00'),
('8748888c-b43e-4f2a-8553-29107d29767b', '11.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:37', '2018-05-27 09:42:37', NULL, NULL, '11.58'),
('8c3f7caf-9e81-46dd-a025-0c7e563bc875', '3.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:40', '2018-05-27 09:41:40', NULL, NULL, '3.78'),
('aedd6d9f-87e5-422f-9eaf-29899811740b', '1.90g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:27', '2018-05-27 09:41:27', NULL, NULL, '1.90'),
('cc181398-690f-49ed-9834-6824ba2300ae', '7.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:12', '2018-05-27 09:42:12', NULL, NULL, '7.58'),
('d1aaaa90-e6e1-41e2-985b-2a5147f36d82', '15.16g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:50', '2018-05-27 09:42:50', NULL, NULL, '15.16'),
('dbe1bb51-179c-43b8-b0a5-36e9d56f6e8f', '3.79g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:51', '2018-05-27 09:41:51', NULL, NULL, '3.79'),
('eb9634e3-bb93-4044-9407-30a53b1c6a9f', '1.13g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:04', '2018-05-27 09:41:04', NULL, NULL, '1.13'),
('f82ceb79-534a-4837-96b3-32953d8484c8', '1.89g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:15', '2018-05-27 09:41:15', NULL, NULL, '1.89');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
