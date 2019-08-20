-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 08:50 AM
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
-- Table structure for table `controllers`
--

CREATE TABLE `controllers` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `controllers`
--

INSERT INTO `controllers` (`id`, `name`, `value`, `description`, `created`, `createdby`, `modified`, `modifiedby`) VALUES
('02ccdd7a-019c-4e70-a352-1ed28e66637d', 'Controller-bpartners', 'bpartners', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('082c0e7d-0445-4d68-a5bb-452c5df76d03', 'Controller-mail', 'mail', '', '2018-05-22 07:00:25', '0', '2018-05-22 07:00:25', NULL),
('0a9f76f1-27b5-4b8d-a61f-df0f15e59646', 'Controller-home', 'home', '', '2018-02-20 06:51:17', 'uan', '2018-02-20 06:51:17', ''),
('0ca1f981-92c3-4115-9c36-00c56bb47a5f', 'Controller-income_types', 'income_types', '', '2018-05-22 06:58:48', '0', '2018-05-22 06:58:48', NULL),
('0e20fb9a-55a3-4f5f-b150-749e7ffa75e9', 'Controller-provinces', 'provinces', '', '2018-05-22 07:05:51', '0', '2018-05-22 07:05:51', NULL),
('153bb193-8557-436c-b336-f71c7a6f62e3', 'Controller-sales', 'sales', '', '2018-03-24 10:52:21', '0', '2018-05-22 06:50:44', '0'),
('1767158a-c1a1-4e6d-9025-a515fcb8a776', 'Controller-promotions', 'promotions', '', '2018-05-22 07:05:27', '0', '2018-05-22 07:05:27', NULL),
('19bf4266-69af-4c75-a542-cf05b9b311ed', 'Controller-payment_lines', 'payment_lines', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('24f90708-e61c-4184-b8aa-6a230907ba41', 'Controller-banks', 'banks', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('278455b7-5bf0-4238-b4c1-a856693585ac', 'Controller-invoice_lines', 'invoice_lines', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('37b2ae29-244b-429f-adb5-3556ea217bec', 'Controller-productsubcategories', 'product_sub_categories', '', '2018-05-22 08:21:08', '0', '2018-05-22 08:22:09', '0'),
('39f434d6-48fd-449d-9238-289e0cbf4a21', 'Controller-goods_receipts', 'goods_receipts', '', '2018-05-22 06:56:40', '0', '2018-05-22 06:56:40', NULL),
('3ac6c63c-855f-4d35-ade2-20c646fd095b', 'Controller-warehouses', 'warehouses', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', 'Controller-purchase', 'purchase', '', '2018-05-22 07:06:43', '0', '2018-05-22 07:06:43', NULL),
('3d2b1142-082b-49d5-976d-f66f1263c3c7', 'Controller-order_line', 'order_line', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('3e2c9013-941d-4848-ba1f-074bf279c18f', 'Controller-payments', 'payments', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('41bb028d-95a8-48d6-a993-d41982a044d9', 'Controller-saving_transactions', 'saving_transactions', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('44b087ef-8aa5-43b2-86a6-b41765da45ea', 'Controller-users', 'users', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('4ca290b4-dec5-4a21-8c1d-9341e4a71670', 'Controller-orders', 'orders', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('4d986218-aea3-49b2-a744-3cec4691c43d', 'Controller-login', 'login', '', '2018-02-20 06:48:15', 'uan', '2018-02-20 06:48:15', ''),
('4f8d3de2-d757-4e4e-9777-8d1b418cefd1', 'Controller-goods_movement', 'goods_movement', '', '2018-05-22 06:56:04', '0', '2018-05-22 06:56:04', NULL),
('581eecf7-ca9c-4fab-aad7-50d987c29244', 'Controller-designs', 'designs', '', '2018-05-22 06:52:52', '0', '2018-05-22 06:52:52', NULL),
('58dafc36-58d3-4a66-9cf9-67a7f78d9b15', 'Controller-glitems', 'glitems', '', '2018-05-22 06:54:15', '0', '2018-05-22 06:54:15', NULL),
('5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', 'Controller-pawn_lines', 'pawn_lines', '', '2018-05-22 07:03:22', '0', '2018-05-22 07:03:22', NULL),
('5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', 'Controller-pawns', 'pawns', '', '2018-05-22 07:03:00', '0', '2018-05-22 07:03:00', NULL),
('6321c6fa-bfbc-4d7b-8525-56dd2a1c0bed', 'Controller-weights', 'weights', '', '2018-05-22 07:11:00', '0', '2018-05-22 07:11:00', NULL),
('650da8b7-46c1-4a0b-add5-6b1675c43b11', 'Controller-actions', 'actions', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('76045876-2061-43ee-b47c-94e1c789e19a', 'Controller-role_accesses', 'role_accesses', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('771b13a6-fdb1-4837-9092-d624352a2875', 'Controller-sequent_nmbers', 'sequent_nmbers', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('79197447-c3c2-4162-a4e1-f81e9386a749', 'Controller-products', 'products', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', 'Controller-goods_transactions', 'goods_transactions', '', '2018-05-22 06:57:29', '0', '2018-05-22 06:57:29', NULL),
('8cffcbc7-3aa4-44ac-a089-504827411992', 'Controller-controllers', 'controllers', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('8e8dc480-0d1c-4f41-8426-6882c26c228e', 'Controller-saving_accounts', 'saving_accounts', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', 'Controller-serial_numbers', 'serial_numbers', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('909f4691-07c5-4cb4-89c4-6b3aa41380ca', 'Controller-sizes', 'sizes', '', '2018-05-22 07:09:01', '0', '2018-05-22 07:09:01', NULL),
('93099af2-8f41-449d-8164-73b52a04f168', 'Controller-income', 'income', '', '2018-05-22 06:58:23', '0', '2018-05-22 06:59:12', '0'),
('9af0b68e-2368-4b7d-92fd-55902ac8c922', 'Controller-scmanagements', 'scmanagements', '', '2018-05-22 07:08:27', '0', '2018-05-22 07:08:27', NULL),
('a45863cc-fcf1-4906-917b-df335ca3abeb', 'Controller-pos', 'pos', '', '2018-03-24 10:51:50', '0', '2018-05-22 06:50:32', '0'),
('a893d9cd-e6b8-4cc1-b464-dd754a7b9252', 'Controller-locations', 'locations', '', '2018-05-22 06:59:34', '0', '2018-05-22 06:59:34', NULL),
('b603aa0f-60ec-4187-b6d0-08bb78a41b22', 'Controller-images', 'images', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', 'Controller-system_usages', 'system_usages', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('b81c7fff-9c61-4760-a64a-c57bd96a7882', 'Controller-roles', 'roles', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('c5ca2880-3c03-4103-bf75-19ab049f456b', 'Controller-reports', 'reports', '', '2018-05-22 07:07:19', '0', '2018-05-22 07:07:19', NULL),
('c6397219-8b76-4aa8-8d69-cf81754e5ab3', 'Controller-product_categories', 'product_categories', '', '2018-05-22 07:04:29', '0', '2018-05-22 07:04:29', NULL),
('c6f7aa87-e575-4afe-9d67-ad2e50246247', 'Controller-branches', 'branches', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('cebfa253-0af7-4156-8802-d16c994c67e6', 'Controller-profile', 'profile', '', '2018-05-22 07:05:05', '0', '2018-05-22 07:05:05', NULL),
('dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', 'Controller-addresses', 'addresses', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('ddc2cdb3-5d62-45dd-b7fb-c6133b901303', 'Controller-invoices', 'invoices', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('e345de1b-e041-424b-a306-2f32a818e522', 'Controller-logout', 'logout', '', '2018-05-22 06:59:54', '0', '2018-05-22 06:59:54', NULL),
('e60320c8-bca9-4ca0-956a-2a731998bce2', 'Controller-goods_lines', 'goods_lines', '', '2018-05-22 06:55:01', '0', '2018-05-22 06:55:24', '0'),
('e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', 'Controller-product_images', 'product_images', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('ec96495b-458c-49cb-bec9-bfd07a0e0e59', 'Controller-storage_bins', 'storage_bins', '', '2018-05-22 07:10:04', '0', '2018-05-22 07:10:26', '0'),
('ece34c07-5ae4-4b74-b27d-1bfc67404a7a', 'Controller-orgs', 'orgs', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', 'Controller-wh_products', 'wh_products', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('f085e8d3-945c-4532-978a-be36fd0b25b6', 'Controller-smartcards', 'smartcards', '', '2018-05-22 07:09:38', '0', '2018-05-22 07:09:38', NULL),
('f4370d1a-1b27-4599-ae9a-713d368db073', 'Controller-bank_accounts', 'bank_accounts', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `controllers`
--
ALTER TABLE `controllers`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
