-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2018 at 06:18 PM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 5.6.36

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
-- Table structure for table `account_settings`
--

CREATE TABLE `account_settings` (
  `id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `fee_saving_account` char(36) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `createdby` char(36) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_settings`
--

INSERT INTO `account_settings` (`id`, `org_id`, `fee_saving_account`, `created`, `modified`, `modifiedby`, `createdby`) VALUES
('f9c2abbd-11b2-4939-98f6-33bdc86a7bf7', '371a39b9-f692-49dd-9d78-41f388e319cc', '3c16e9b8-3268-4f3a-a3b8-2da624903883', '2018-05-26 07:39:37', '2018-05-26 07:39:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `controller_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `value`, `controller_id`, `description`, `created`, `createdby`, `modified`, `modifiedby`) VALUES
('0060f68a-8aaf-4ac4-8851-1f29ad0834d3', 'branches-index', 'index', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('089bfd10-3706-40fd-95a9-f94d6986babd', 'users-delete', 'delete', '44b087ef-8aa5-43b2-86a6-b41765da45ea', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('0a623bf2-9517-47ba-a3f1-536665e1c334', 'sequent_nmbers-view', 'view', '771b13a6-fdb1-4837-9092-d624352a2875', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('0a978e43-4c15-47de-b1b2-380ede4a3a49', 'sequent_nmbers-edit', 'edit', '771b13a6-fdb1-4837-9092-d624352a2875', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('0bae60f9-f3a5-4203-ad7e-e77632327f9f', 'good_transactions-getwhjson', 'getwhjson', '8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', '', '2018-05-22 07:38:03', '', '2018-05-22 07:38:03', ''),
('0c31bda6-a544-499b-989f-a8ef1e17e381', 'wh_products-view', 'view', 'ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('0c5aa7f3-0395-4ef4-935f-7fe7957fa451', 'income-index', 'index', '93099af2-8f41-449d-8164-73b52a04f168', '', '2018-05-22 07:44:54', '', '2018-05-22 07:44:54', ''),
('0cd213df-3d00-4c0a-b746-bf5a62e771c0', 'home-index', 'index', '0a9f76f1-27b5-4b8d-a61f-df0f15e59646', '', '2018-02-20 06:51:35', '', '2018-02-20 06:51:35', ''),
('0e0e06da-117e-40aa-8332-504f988200a5', 'smartcard-edit', 'edit', 'f085e8d3-945c-4532-978a-be36fd0b25b6', '', '2018-05-22 08:16:10', '', '2018-05-22 08:16:10', ''),
('0e6c4588-a43b-40c1-beca-87a2675fffac', 'weight-index', 'index', '6321c6fa-bfbc-4d7b-8525-56dd2a1c0bed', '', '2018-05-22 08:18:45', '', '2018-05-22 08:18:45', ''),
('0eb176f0-7571-49a8-adcc-83d4a51bd9df', 'pos-index', 'index', 'a45863cc-fcf1-4906-917b-df335ca3abeb', '', '2018-03-24 10:53:00', '', '2018-05-22 07:42:30', ''),
('0f7601f8-df50-4503-bf1d-cdbc512e14dd', 'size-edit', 'edit', '909f4691-07c5-4cb4-89c4-6b3aa41380ca', '', '2018-05-22 08:14:45', '', '2018-05-22 08:14:45', ''),
('124e1dc1-412e-43e0-877f-e506193406aa', 'designs-edit', 'edit', '581eecf7-ca9c-4fab-aad7-50d987c29244', '', '2018-05-22 07:17:46', '', '2018-05-22 07:17:46', ''),
('132d83ae-7476-49e3-a086-6c7def73f62c', 'income-get_bank_account_list', 'get_bank_account_list', '93099af2-8f41-449d-8164-73b52a04f168', '', '2018-05-22 07:47:14', '', '2018-05-22 07:47:14', ''),
('13b92d9f-27d7-4023-8d9a-b8e176e8585a', 'bank_accounts-edit', 'edit', 'f4370d1a-1b27-4599-ae9a-713d368db073', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('164a80a0-4a8e-4ecf-a04c-24433e60ca7b', 'good_movement-delete', 'delete', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-05-22 07:34:08', '', '2018-05-22 07:34:08', ''),
('165fd8d9-3e5c-4301-9608-40a4c3e5da0b', 'order_line-add', 'add', '3d2b1142-082b-49d5-976d-f66f1263c3c7', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('188f5f96-3668-4694-bcf8-0922a2727e27', 'sale-view', 'view', '153bb193-8557-436c-b336-f71c7a6f62e3', '', '2018-05-22 08:10:46', '', '2018-05-22 08:10:46', ''),
('18959738-8b40-44ed-9fc7-289ba2b406c9', 'invoices-view', 'view', 'ddc2cdb3-5d62-45dd-b7fb-c6133b901303', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('190606b3-84af-4dd8-89af-ac28668255ba', 'good_lines-delete', 'delete', 'e60320c8-bca9-4ca0-956a-2a731998bce2', '', '2018-05-22 07:33:51', '', '2018-05-22 07:33:51', ''),
('19147938-1594-4207-aef5-29b0d0d63b66', 'system_usages-add', 'add', 'b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('1a9ea34b-da8e-44c5-ad15-70b0daa244ac', 'actions-index', 'index', '650da8b7-46c1-4a0b-add5-6b1675c43b11', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1aaeecda-7082-4554-9ac8-f590f93f8b95', 'images-index', 'index', 'b603aa0f-60ec-4187-b6d0-08bb78a41b22', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1acd38be-8dcb-45f8-ad82-0903631900f1', 'actions-add', 'add', '650da8b7-46c1-4a0b-add5-6b1675c43b11', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('1b6d8024-5712-4078-97cb-b86c7e523a59', 'invoice_lines-index', 'index', '278455b7-5bf0-4238-b4c1-a856693585ac', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1c26d965-42f7-4c9d-af5b-307c4d3a00bd', 'pawn-view', 'view', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:58:25', '', '2018-05-22 07:58:25', ''),
('1dad9db2-1a9e-4520-b874-79c78ea58308', 'saving_transactions-index', 'index', '41bb028d-95a8-48d6-a993-d41982a044d9', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1e3a1292-9d95-474a-9ca7-8deb08a89390', 'productsubcategories-view', 'view', '37b2ae29-244b-429f-adb5-3556ea217bec', '', '2018-05-22 08:23:31', '', '2018-05-22 08:23:31', ''),
('1e69121c-47b2-4567-97f9-b2c1b31e9e70', 'orgs-index', 'index', 'ece34c07-5ae4-4b74-b27d-1bfc67404a7a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1e99211d-265e-4822-8006-b034c36ec02e', 'saving_accounts-delete', 'delete', '8e8dc480-0d1c-4f41-8426-6882c26c228e', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1eaf84c2-2d82-428c-ab0c-cd118cdc9579', 'payments-edit', 'edit', '3e2c9013-941d-4848-ba1f-074bf279c18f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('1ee38ccf-44ac-42cc-ae45-3beef54268a7', 'users-view', 'view', '44b087ef-8aa5-43b2-86a6-b41765da45ea', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('20dd5d9b-767f-4451-a857-88f142608223', 'approve list', 'approvelist', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-06-05 06:18:16', '', '2018-06-05 06:18:16', ''),
('20f4bebf-5c04-44b5-9e27-f15a7e344311', 'product_images-add', 'add', 'e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('210c813b-c607-4242-83a0-b2be186ebd7f', 'roles-view', 'view', 'b81c7fff-9c61-4760-a64a-c57bd96a7882', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('22253677-dbf0-4db4-a4e8-9f01ee49cb25', 'product_images-view', 'view', 'e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('235e6639-683c-47d7-8dd8-48fd3463a67b', 'pawnline-delete', 'delete', '5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', '', '2018-05-22 08:01:09', '', '2018-05-22 08:01:09', ''),
('263250e3-e046-4580-9299-9ac9b3e69aaf', 'warehouses-edit', 'edit', '3ac6c63c-855f-4d35-ade2-20c646fd095b', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('268e8b71-d97e-49b8-a762-39b06368a14e', 'images-edit', 'edit', 'b603aa0f-60ec-4187-b6d0-08bb78a41b22', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('272f8adc-b092-46a1-8100-20fb74a97219', 'orgs-delete', 'delete', 'ece34c07-5ae4-4b74-b27d-1bfc67404a7a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('28014084-f200-4b24-86a2-de6f1a87f38b', 'bpartners-view', 'view', '02ccdd7a-019c-4e70-a352-1ed28e66637d', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('28cd6cd8-06c6-47de-894e-c47dfeb23b48', 'system_usages-edit', 'edit', 'b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('29d45c81-49da-4a56-b337-6f3ced342652', 'good_receipts-index', 'index', '39f434d6-48fd-449d-9238-289e0cbf4a21', '', '2018-05-22 07:30:55', '', '2018-05-22 07:30:55', ''),
('2a4f379f-1471-43af-be2b-f9ef6dd9f713', 'pawnline-index', 'index', '5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', '', '2018-05-22 08:00:11', '', '2018-05-22 08:00:11', ''),
('2b079a79-c09b-4880-b746-cb1eec444645', 'listsavingtransaction', 'listsavingtransaction', '41bb028d-95a8-48d6-a993-d41982a044d9', '', '2018-06-30 10:52:04', '', '2018-06-30 10:52:04', ''),
('2b3a1b88-97f0-49ac-a050-f121876869c8', 'login-index', 'index', '4d986218-aea3-49b2-a744-3cec4691c43d', '', '2018-02-20 06:49:12', '', '2018-02-20 06:49:12', ''),
('2c10fa21-c1fd-430b-bd5a-38f0881b4614', 'bank_accounts-add', 'add', 'f4370d1a-1b27-4599-ae9a-713d368db073', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('2ecaf777-6418-4268-9a85-58a863b61a53', 'incometype-edit', 'edit', '0ca1f981-92c3-4115-9c36-00c56bb47a5f', '', '2018-05-22 07:49:03', '', '2018-05-22 07:49:03', ''),
('2ee0428c-85ed-4908-9411-2fbe89d9884c', 'productsubcategories-delete', 'delete', '37b2ae29-244b-429f-adb5-3556ea217bec', '', '2018-05-22 08:23:13', '', '2018-05-22 08:23:13', ''),
('2fa30fee-61ea-4ae1-bd06-b603730a6885', 'system_usages-delete', 'delete', 'b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('310c6dbb-6c62-4531-bb1a-41e639f60448', 'users-edit', 'edit', '44b087ef-8aa5-43b2-86a6-b41765da45ea', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('31199fea-51ff-4093-9034-e1b491ee36f8', 'warehouses-view', 'view', '3ac6c63c-855f-4d35-ade2-20c646fd095b', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('318017c3-f873-42ab-80da-8c788a4ec931', 'size-index', 'index', '909f4691-07c5-4cb4-89c4-6b3aa41380ca', '', '2018-05-22 08:14:19', '', '2018-05-22 08:14:19', ''),
('31a66b5a-69cb-4d98-8b8b-c005826dc299', 'pawn-index', 'index', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:57:22', '', '2018-05-22 07:57:22', ''),
('3324bc8d-a99f-4fb6-b73e-151473198595', 'serial_numbers-delete', 'delete', '9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('34450fd0-c16f-497f-8826-a30e30d47665', 'logout-index', 'index', 'e345de1b-e041-424b-a306-2f32a818e522', '', '2018-05-22 07:50:23', '', '2018-05-22 07:50:23', ''),
('365dab62-1d78-44e9-8386-25625f28cd61', 'weight-delete', 'delete', '6321c6fa-bfbc-4d7b-8525-56dd2a1c0bed', '', '2018-05-22 08:19:17', '', '2018-05-22 08:19:17', ''),
('368e0db2-66a5-4f14-959d-9537504ca79d', 'product_images-delete', 'delete', 'e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('37cb30a3-b57e-43b6-8a3b-e88502b9c840', 'bpartners-edit', 'edit', '02ccdd7a-019c-4e70-a352-1ed28e66637d', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('3827a831-5488-4597-8536-e75104c2396d', 'serial_numbers-view', 'view', '9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('383622c8-d6ac-4934-8b9b-d0a012be179c', 'banks-delete', 'delete', '24f90708-e61c-4184-b8aa-6a230907ba41', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('388f1093-a144-4618-acb2-74d66e320b82', 'view', 'view', '3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', '', '2018-06-24 11:55:13', '', '2018-06-24 11:55:13', ''),
('395db1e2-2a6b-47fe-9888-79d052f2f78f', 'bank_accounts-view', 'view', 'f4370d1a-1b27-4599-ae9a-713d368db073', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('3b822935-6262-4569-ae18-363a6d75b96f', 'income-edit', 'edit', '93099af2-8f41-449d-8164-73b52a04f168', '', '2018-05-22 07:46:22', '', '2018-05-22 07:46:22', ''),
('3bfc749a-0b34-4a92-acec-b8331f0e210a', 'sequent_nmbers-index', 'index', '771b13a6-fdb1-4837-9092-d624352a2875', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('3c6bf439-cddf-42bd-9bac-39d76bf3afc0', 'pawn-returnpawn', 'returnpawn', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:59:27', '', '2018-05-22 07:59:27', ''),
('3d0624ae-6912-4381-b761-004987aed866', 'purchase-add', 'add', '3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', '', '2018-05-22 08:07:21', '', '2018-05-22 08:07:21', ''),
('3d727751-1498-4a99-bd59-5c0973238f3c', 'income-view', 'view', '93099af2-8f41-449d-8164-73b52a04f168', '', '2018-05-22 07:46:04', '', '2018-05-22 07:46:04', ''),
('3dd2dcbe-8c5f-476e-a1cd-7cdba1ec4ead', 'wh_products-delete', 'delete', 'ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('3e59c022-cad5-498b-b3d6-1441d4ec44a1', 'good_receipts-void', 'void', '39f434d6-48fd-449d-9238-289e0cbf4a21', '', '2018-05-22 07:36:30', '', '2018-05-22 07:36:30', ''),
('3f118aba-5a1d-4020-b461-6d580e263513', 'productcategories-add', 'add', 'c6397219-8b76-4aa8-8d69-cf81754e5ab3', '', '2018-05-22 08:03:25', '', '2018-05-22 08:03:25', ''),
('40ff26ff-4eba-4448-b7eb-73bebbde2aba', 'smartcard-view', 'view', 'f085e8d3-945c-4532-978a-be36fd0b25b6', '', '2018-05-22 08:16:25', '', '2018-05-22 08:16:25', ''),
('41b9bd12-d501-48d5-a17d-12ed249ffe16', 'promotion-index', 'index', '1767158a-c1a1-4e6d-9025-a515fcb8a776', '', '2018-05-22 08:06:04', '', '2018-05-22 08:06:04', ''),
('41da6bba-8076-4b03-957f-588832c2d8c6', 'promotion-add', 'add', '1767158a-c1a1-4e6d-9025-a515fcb8a776', '', '2018-05-22 08:05:27', '', '2018-05-22 08:05:27', ''),
('42285ff7-9922-48d6-bec1-ce4467416ea6', 'roles-delete', 'delete', 'b81c7fff-9c61-4760-a64a-c57bd96a7882', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('4229bec5-f7ab-4f33-9b07-3cfce62a46cb', 'controllers-view', 'view', '8cffcbc7-3aa4-44ac-a089-504827411992', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('42b1123a-f0c0-4351-a35b-cdd0fd9764b8', 'products-edit', 'edit', '79197447-c3c2-4162-a4e1-f81e9386a749', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('436cb1b1-ad4d-4c94-855c-20c43b9f4f81', 'sale-showall', 'showall', '153bb193-8557-436c-b336-f71c7a6f62e3', '', '2018-05-22 08:10:28', '', '2018-05-22 08:10:28', ''),
('47a6efb9-00dc-46ef-a293-ea209998cebf', 'role_accesses-edit', 'edit', '76045876-2061-43ee-b47c-94e1c789e19a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('48e57212-9886-4cc0-998b-84fd1a6a0e22', 'orders-add', 'add', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('499117f1-388a-4986-977e-240e84ddfa3f', 'images-view', 'view', 'b603aa0f-60ec-4187-b6d0-08bb78a41b22', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('49fcaede-e452-450d-8781-cdbe2eb13836', 'warehouses-add', 'add', '3ac6c63c-855f-4d35-ade2-20c646fd095b', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', 'invoices-add', 'add', 'ddc2cdb3-5d62-45dd-b7fb-c6133b901303', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('4cdb0517-c109-4634-acc7-39f4c33d6fec', 'productsubcategories-index', 'index', '37b2ae29-244b-429f-adb5-3556ea217bec', '', '2018-05-22 08:24:01', '', '2018-05-22 08:24:01', ''),
('4d7f7ee4-3311-4e3e-8653-243d278151cd', 'serial_numbers-edit', 'edit', '9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('4df45f80-5951-4308-88a6-ba64fb6b16c9', 'showall', 'showall', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', '', '2018-06-23 07:51:48', '', '2018-06-23 07:51:48', ''),
('4eb4e924-a85c-4ecc-a639-304d1b26e65d', 'users-add', 'add', '44b087ef-8aa5-43b2-86a6-b41765da45ea', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', 'location-index', 'index', 'a893d9cd-e6b8-4cc1-b464-dd754a7b9252', '', '2018-05-22 07:49:49', '', '2018-05-22 07:49:49', ''),
('4f590627-b763-4696-a6ea-adfd236585fa', 'payment_lines-view', 'view', '19bf4266-69af-4c75-a542-cf05b9b311ed', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('50ddf455-ed13-4efc-a740-96bb25cff7c4', 'storagebis-view', 'view', 'ec96495b-458c-49cb-bec9-bfd07a0e0e59', '', '2018-05-22 08:17:45', '', '2018-05-22 08:17:45', ''),
('518e91db-35da-4118-bd27-4670f886bf46', 'wh_products-index', 'index', 'ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('55712a15-826f-4d08-af31-94de946a0451', 'roles-index', 'index', 'b81c7fff-9c61-4760-a64a-c57bd96a7882', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('56369e22-c9e7-46b7-baa7-a23338dc6551', 'controllers-edit', 'edit', '8cffcbc7-3aa4-44ac-a089-504827411992', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('571432a8-0fbb-4bcf-b8ba-7f4d4998c864', 'payment_lines-edit', 'edit', '19bf4266-69af-4c75-a542-cf05b9b311ed', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('576a63e6-4f9c-46d7-abc7-97f0dfb1634d', 'payments-add', 'add', '3e2c9013-941d-4848-ba1f-074bf279c18f', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('57904998-e34a-4f8e-8bc8-fab31cc0ea88', 'View', 'view', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-06-05 06:18:04', '', '2018-06-05 06:18:04', ''),
('592b10fe-2110-4cb8-bca7-d0e1f1bf0149', 'products-add', 'add', '79197447-c3c2-4162-a4e1-f81e9386a749', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('59e8ff71-6b0d-4b5d-b257-d8fbd88a0d54', 'banks-index', 'index', '24f90708-e61c-4184-b8aa-6a230907ba41', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('59ecf800-2be5-4294-93f8-4e82c623fcf8', 'sales', 'sales', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-06-29 04:40:44', '', '2018-06-29 04:40:44', ''),
('5a49a41b-be0d-4084-a097-58b8b4c74f3c', 'purchase-index', 'index', '3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', '', '2018-05-22 08:07:03', '', '2018-05-22 08:07:03', ''),
('5a950057-6c85-4b99-a6b4-3ed76d48f2b4', 'saving_transactions-edit', 'edit', '41bb028d-95a8-48d6-a993-d41982a044d9', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('5e4ae09f-beca-4229-bd56-f053e2a9bc70', 'users-index', 'index', '44b087ef-8aa5-43b2-86a6-b41765da45ea', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('5f099f25-69b6-41a9-ad14-0812860a47f7', 'actions-delete', 'delete', '650da8b7-46c1-4a0b-add5-6b1675c43b11', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', 'good_receipts-edit', 'edit', '39f434d6-48fd-449d-9238-289e0cbf4a21', '', '2018-05-22 07:30:21', '', '2018-05-22 07:30:21', ''),
('605442d9-2134-4ff9-b901-28b9ae581053', 'banks-edit', 'edit', '24f90708-e61c-4184-b8aa-6a230907ba41', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('6086a957-3ee3-4720-a0c9-38287c6075c5', 'bpartners-delete', 'delete', '02ccdd7a-019c-4e70-a352-1ed28e66637d', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('65edd09e-c611-4f6e-8750-3ad23eaf688a', 'bank_accounts-index', 'index', 'f4370d1a-1b27-4599-ae9a-713d368db073', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('665c0580-3f54-42fa-ad55-7da779b0107a', 'order_line-index', 'index', '3d2b1142-082b-49d5-976d-f66f1263c3c7', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', 'promotion-view', 'view', '1767158a-c1a1-4e6d-9025-a515fcb8a776', '', '2018-05-22 08:06:19', '', '2018-05-22 08:06:19', ''),
('6817f3b3-aecb-4b46-8bc4-ae6f4b185608', 'index', 'index', 'c6397219-8b76-4aa8-8d69-cf81754e5ab3', '', '2018-06-05 06:18:38', '', '2018-06-05 06:18:38', ''),
('689ca1da-ebea-494b-98a1-1a819903fde9', 'products-view', 'view', '79197447-c3c2-4162-a4e1-f81e9386a749', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('691d2bcd-378d-46fc-9cce-649e44b37acf', 'saving_accounts-view', 'view', '8e8dc480-0d1c-4f41-8426-6882c26c228e', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('6a8fcfb2-4665-4e61-92de-3f9de6e40ca2', 'promotion-edit', 'edit', '1767158a-c1a1-4e6d-9025-a515fcb8a776', '', '2018-05-22 08:05:39', '', '2018-05-22 08:05:39', ''),
('6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', 'products-index', 'index', '79197447-c3c2-4162-a4e1-f81e9386a749', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('6f82d8d1-5046-4bfb-8bae-853fb8487bbc', 'actions-edit', 'edit', '650da8b7-46c1-4a0b-add5-6b1675c43b11', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('72d5a13e-12a2-4642-96b0-d5742ab2fef1', 'good_transactions-add', 'add', '8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', '', '2018-05-22 07:31:29', '', '2018-05-22 07:31:29', ''),
('72db9bfa-fb12-4340-84ba-0d83d6df131b', 'promotion-delete', 'delete', '1767158a-c1a1-4e6d-9025-a515fcb8a776', '', '2018-05-22 08:05:51', '', '2018-05-22 08:05:51', ''),
('73aca571-f8d7-4502-a945-fa53ff13676b', 'good_transactions-receipt', 'receipt', '8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', '', '2018-05-22 07:32:23', '', '2018-05-22 07:32:23', ''),
('74b0584d-4276-45d8-829c-70776ab33a4f', 'saving_accounts-add', 'add', '8e8dc480-0d1c-4f41-8426-6882c26c228e', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('74c9da25-d26a-4bdc-a4ad-f529428946cb', 'good_movement-edit', 'edit', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-05-22 07:29:02', '', '2018-05-22 07:29:02', ''),
('74f94222-3537-4320-a347-857c1feb24d4', 'payments-index', 'index', '3e2c9013-941d-4848-ba1f-074bf279c18f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('7537a7af-57ab-46ae-8439-04018015127b', 'good_transactions-edit', 'edit', '8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', '', '2018-05-22 07:31:49', '', '2018-05-22 07:31:49', ''),
('7594a6af-b67a-4b39-b102-4edbc3031ab9', 'productcategories-delete', 'delete', 'c6397219-8b76-4aa8-8d69-cf81754e5ab3', '', '2018-05-22 08:03:52', '', '2018-05-22 08:03:52', ''),
('7663bc12-ff3b-4cb3-bc21-90edae293940', 'search', 'search', '153bb193-8557-436c-b336-f71c7a6f62e3', '', '2018-03-24 10:54:03', '', '2018-03-24 10:54:03', ''),
('7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', 'good_receipts-completed', 'completed', '39f434d6-48fd-449d-9238-289e0cbf4a21', '', '2018-05-22 07:35:42', '', '2018-05-22 07:35:42', ''),
('7acdd8f8-3587-4060-8c11-159e271162bd', 'pawnline-view', 'view', '5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', '', '2018-05-22 08:01:31', '', '2018-05-22 08:01:31', ''),
('7ce1e438-d14f-4934-9738-4e44e894cf15', 'smartcard-delete', 'delete', 'f085e8d3-945c-4532-978a-be36fd0b25b6', '', '2018-05-22 08:16:48', '', '2018-05-22 08:16:48', ''),
('7cecc67d-6458-4415-9668-bb11bbba94e8', 'storagebis-index', 'index', 'ec96495b-458c-49cb-bec9-bfd07a0e0e59', '', '2018-05-22 08:18:08', '', '2018-05-22 08:18:08', ''),
('7d9ead39-5c5c-4633-93b3-544172f751f9', 'addresses-edit', 'edit', 'dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('7eaff946-7b78-4faf-864b-4f50efde10c0', 'order_line-view', 'view', '3d2b1142-082b-49d5-976d-f66f1263c3c7', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('804e5330-b692-4f13-b132-1881bdc3ba64', 'products-delete', 'delete', '79197447-c3c2-4162-a4e1-f81e9386a749', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('83b1b151-7f24-4b3a-b683-7b8cc72c5b1f', 'incometype-delete', 'delete', '0ca1f981-92c3-4115-9c36-00c56bb47a5f', '', '2018-05-22 07:49:29', '', '2018-05-22 07:49:29', ''),
('8437e1f4-63dc-440c-b856-4d1e9f3c2435', 'saving_transactions-delete', 'delete', '41bb028d-95a8-48d6-a993-d41982a044d9', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', 'saving_accounts-index', 'index', '8e8dc480-0d1c-4f41-8426-6882c26c228e', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('85348380-adda-4288-ab05-899daaae908b', 'images-add', 'add', 'b603aa0f-60ec-4187-b6d0-08bb78a41b22', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('89d52853-e508-4c1e-a8fc-d6fef9f2ef37', 'pawnline-add', 'add', '5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', '', '2018-05-22 08:00:44', '', '2018-05-22 08:00:44', ''),
('8a643eb0-e44e-4000-b78f-d7f47bc3255c', 'weight-edit', 'edit', '6321c6fa-bfbc-4d7b-8525-56dd2a1c0bed', '', '2018-05-22 08:19:03', '', '2018-05-22 08:19:03', ''),
('8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', 'payment_lines-index', 'index', '19bf4266-69af-4c75-a542-cf05b9b311ed', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('8c53b550-e6e4-4cda-a935-b7ea63f9651f', 'smartcard-index', 'index', 'f085e8d3-945c-4532-978a-be36fd0b25b6', '', '2018-05-22 08:15:41', '', '2018-05-22 08:15:41', ''),
('8ea2488f-1a22-448f-8edc-fe7ebd763db7', 'good_lines-index', 'index', 'e60320c8-bca9-4ca0-956a-2a731998bce2', '', '2018-05-22 07:20:04', '', '2018-05-22 07:20:04', ''),
('8ea840e7-9452-4688-af4a-60e7540460a4', 'pawn-edit', 'edit', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:58:04', '', '2018-05-22 07:58:04', ''),
('9352fa28-88c6-40fb-905a-58939086e257', 'invoices-index', 'index', 'ddc2cdb3-5d62-45dd-b7fb-c6133b901303', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('945605ca-19f9-45d1-a0c8-735243a44d38', 'product_images-edit', 'edit', 'e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('948e2bf3-ff49-4d06-bb23-92bcea3cb5da', 'role_accesses-index', 'index', '76045876-2061-43ee-b47c-94e1c789e19a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', 'orgs-view', 'view', 'ece34c07-5ae4-4b74-b27d-1bfc67404a7a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('960a0402-07f4-4c43-811d-e7af9284ddfa', 'saving_transactions-add', 'add', '41bb028d-95a8-48d6-a993-d41982a044d9', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('9742de93-52c5-4af6-8d8f-f82b43d89ba6', 'orders-edit', 'edit', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('99314cf1-2019-477b-b6fb-40b5d69c54db', 'good_receipts-view', 'view', '39f434d6-48fd-449d-9238-289e0cbf4a21', '', '2018-05-22 07:30:38', '', '2018-05-22 07:41:56', ''),
('9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', 'wh_products-edit', 'edit', 'ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', 'bpartners-add', 'add', '02ccdd7a-019c-4e70-a352-1ed28e66637d', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', 'invoice_lines-edit', 'edit', '278455b7-5bf0-4238-b4c1-a856693585ac', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('9cfa5966-b544-4d91-bff3-4d4f8d63cb30', 'orgs-edit', 'edit', 'ece34c07-5ae4-4b74-b27d-1bfc67404a7a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('9d334504-0ff0-4191-a552-feaace318f28', 'saving_accounts-edit', 'edit', '8e8dc480-0d1c-4f41-8426-6882c26c228e', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('a0aba001-f604-4ff7-9147-70812752b77a', 'sequent_nmbers-add', 'add', '771b13a6-fdb1-4837-9092-d624352a2875', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('a131d7d1-daf1-48e1-a7f8-fe977c87a862', 'weight-add', 'add', '6321c6fa-bfbc-4d7b-8525-56dd2a1c0bed', '', '2018-05-22 08:18:54', '', '2018-05-22 08:18:54', ''),
('a1a9f201-e19d-42f3-91c3-36772c24bc68', 'smartcard-add', 'add', 'f085e8d3-945c-4532-978a-be36fd0b25b6', '', '2018-05-22 08:15:57', '', '2018-05-22 08:15:57', ''),
('a22ceea6-88b3-41f3-ba6c-2b514d20e217', 'payment_lines-add', 'add', '19bf4266-69af-4c75-a542-cf05b9b311ed', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('a23a4600-3508-48bf-ac65-29cc502cb07a', 'size-add', 'add', '909f4691-07c5-4cb4-89c4-6b3aa41380ca', '', '2018-05-22 08:14:30', '', '2018-05-22 08:14:30', ''),
('a362e708-187f-4b7e-b0e6-ba09cf557164', 'purchase-showall', 'showall', '3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', '', '2018-05-22 08:07:56', '', '2018-05-22 08:07:56', ''),
('a46bf3be-a18e-4e6c-bb27-cba4cabc81f2', 'banks-view', 'view', '24f90708-e61c-4184-b8aa-6a230907ba41', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('a522eb09-4bf4-471e-8532-2b9276491749', 'home-add', 'add', '0a9f76f1-27b5-4b8d-a61f-df0f15e59646', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('a5b942d2-7ec3-46db-b75c-e18ffd9a515d', 'good_movement-index', 'index', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-05-22 07:21:33', '', '2018-05-22 07:21:33', ''),
('a5f307e4-1996-4e6e-b474-86b379e54a13', 'bpartners-index', 'index', '02ccdd7a-019c-4e70-a352-1ed28e66637d', NULL, '2018-02-19 07:52:17', 'system', '2018-02-19 07:52:17', NULL),
('a6298301-d66f-42d1-8a6f-ca355f5740a7', 'report-pawnreport', 'pawnreport', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-05-22 08:08:58', '', '2018-05-22 08:08:58', ''),
('a6f6307e-7019-4e29-b693-42aa7778f4e0', 'addresses-delete', 'delete', 'dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('a7b873d6-2e93-47f7-b084-5b245972a61f', 'good_lines-view', 'view', 'e60320c8-bca9-4ca0-956a-2a731998bce2', '', '2018-05-22 07:20:40', '', '2018-05-22 07:20:40', ''),
('a8b6468d-3b79-47bd-8f2b-4ec63a0489d7', 'bank_accounts-delete', 'delete', 'f4370d1a-1b27-4599-ae9a-713d368db073', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('a988a6fd-2786-4c25-b721-8b84380314bc', 'role_accesses-add', 'add', '76045876-2061-43ee-b47c-94e1c789e19a', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('ab1bc3b7-1848-4367-be76-da14860955c9', 'sale-index', 'index', '153bb193-8557-436c-b336-f71c7a6f62e3', '', '2018-03-24 10:53:49', '', '2018-05-22 07:42:53', ''),
('ac28025f-2c56-480c-816d-3c31004dd016', 'warehouses-index', 'index', '3ac6c63c-855f-4d35-ade2-20c646fd095b', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('ad0de284-9c1f-4afb-af14-f9c5a8e866c7', 'controllers-add', 'add', '8cffcbc7-3aa4-44ac-a089-504827411992', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('ae142032-4b2b-4c3b-9d07-cc5891262dee', 'product_images-index', 'index', 'e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', 'mail-index', 'index', '082c0e7d-0445-4d68-a5bb-452c5df76d03', '', '2018-05-22 07:51:11', '', '2018-05-22 07:51:11', ''),
('b347f3c3-20c3-4f18-90c1-7cc34e1f4ade', 'branches-delete', 'delete', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('b568a18f-8385-430b-b532-8315e8e7bb4f', 'order_line-edit', 'edit', '3d2b1142-082b-49d5-976d-f66f1263c3c7', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', 'payments-view', 'view', '3e2c9013-941d-4848-ba1f-074bf279c18f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('b65a1d21-89a7-411e-97b0-484ea81a749a', 'orders-view', 'view', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', 'system_usages-view', 'view', 'b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('b72a22bc-e177-4b07-afca-0c84644d81ba', 'warehouses-delete', 'delete', '3ac6c63c-855f-4d35-ade2-20c646fd095b', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('b8e4cfc7-6629-492a-944b-949c3b947831', 'purchase-edit', 'edit', '3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', '', '2018-05-22 08:07:38', '', '2018-05-22 08:07:38', ''),
('bc7321ca-57d4-4188-81ef-25ec61161257', 'controllers-index', 'index', '8cffcbc7-3aa4-44ac-a089-504827411992', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('bee64d11-a34c-44e2-a542-d3eee78f6db7', 'images-delete', 'delete', 'b603aa0f-60ec-4187-b6d0-08bb78a41b22', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('beeefa8c-44a9-4238-97b4-ee5750422fb0', 'saving_account-getbank', 'getbank', '8e8dc480-0d1c-4f41-8426-6882c26c228e', '', '2018-05-22 08:12:37', '', '2018-05-22 08:12:37', ''),
('bf1fa564-9527-499e-880d-7b5fa14ccdf0', 'sequent_nmbers-delete', 'delete', '771b13a6-fdb1-4837-9092-d624352a2875', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c245f3fe-1a27-4b9f-aca0-733f169901ab', 'income', 'income', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-06-29 04:40:28', '', '2018-06-29 04:40:28', ''),
('c2643c7c-cd16-4355-b122-441181f5851b', 'branches-view', 'view', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c31061c0-daf6-473d-b061-029e829396f6', 'actions-view', 'view', '650da8b7-46c1-4a0b-add5-6b1675c43b11', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', 'incometype-view', 'view', '0ca1f981-92c3-4115-9c36-00c56bb47a5f', '', '2018-05-22 07:49:14', '', '2018-05-22 07:49:14', ''),
('c4cd3b72-94fd-4b72-9f21-6eff49bbc384', 'branches-add', 'add', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('c582501b-6069-4462-a188-be9ecf07342c', 'addresses-add', 'add', 'dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('c634c46f-2ca8-4616-99e9-dc09ca390491', 'orders-delete', 'delete', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c6e3a90b-4052-4d13-8055-a4f18e866638', 'changeLocalBranch', 'changelocalbranch', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', '', '2018-06-23 07:51:29', '', '2018-06-23 07:51:29', ''),
('c8197eab-d634-4caf-a289-19e770dd7975', 'report-index', 'index', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-05-22 08:08:37', '', '2018-05-22 08:08:37', ''),
('c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', 'scmanagement-savecard', 'savecard', '9af0b68e-2368-4b7d-92fd-55902ac8c922', '', '2018-05-22 08:13:23', '', '2018-05-22 08:13:23', ''),
('c96e99fb-4f55-40d8-bed8-4ce250a180a5', 'warehouse', 'warehouse', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-06-29 04:41:07', '', '2018-06-29 04:41:07', ''),
('cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', 'system_usages-index', 'index', 'b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('cae07239-bdcf-4e60-ab95-941d483c3028', 'pawn-getinterrestrate', 'getinterrestrate', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:57:04', '', '2018-05-22 07:57:04', ''),
('cb30e0b4-6a76-4f20-b435-4a0bb5dc0345', 'seller', 'seller', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-06-29 04:40:56', '', '2018-06-29 04:40:56', ''),
('cd1b4962-c3ae-4033-babc-a7b750d8dd63', 'saving_transactions-view', 'view', '41bb028d-95a8-48d6-a993-d41982a044d9', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('cd725882-004c-4dd2-b780-a501bb6463bf', 'storagebis-edit', 'edit', 'ec96495b-458c-49cb-bec9-bfd07a0e0e59', '', '2018-05-22 08:17:34', '', '2018-05-22 08:17:34', ''),
('ce0fc131-de71-4b8d-8dd7-cc42111c84d8', 'good_movement-add', 'add', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-05-22 07:28:43', '', '2018-05-22 07:28:43', ''),
('ce0ffb95-1e39-4bd4-9268-3f5dea1990db', 'role_accesses-delete', 'delete', '76045876-2061-43ee-b47c-94e1c789e19a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('cecea47a-ce7f-4025-8bbb-3f651a9b3fbc', 'payments-delete', 'delete', '3e2c9013-941d-4848-ba1f-074bf279c18f', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('d0ddc7d8-8c74-4667-b496-2f0ad3c19e53', 'saving_account-getsaveaccount', 'getsaveaccount', '8e8dc480-0d1c-4f41-8426-6882c26c228e', '', '2018-05-22 08:12:15', '', '2018-05-22 08:12:15', ''),
('d1184ebf-bce8-48bb-b685-5e17fe447915', 'incometype-add', 'add', '0ca1f981-92c3-4115-9c36-00c56bb47a5f', '', '2018-05-22 07:48:48', '', '2018-05-22 07:48:48', ''),
('d13c37bd-e808-408f-b3fa-27e75474c348', 'pawn-add', 'add', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:57:52', '', '2018-05-22 07:57:52', ''),
('d3e22c6f-15b7-4e29-8512-c6775b6343e8', 'addresses-view', 'view', 'dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('d42bcf5d-348e-4c97-85c2-467a913e343c', 'approve', 'approve', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-06-05 06:18:24', '', '2018-06-05 06:18:24', ''),
('d51a994d-7649-4ef1-9bdb-1980a4eb4b60', 'income-manage_income_type', 'manage_income_type', '93099af2-8f41-449d-8164-73b52a04f168', '', '2018-05-22 07:45:42', '', '2018-05-22 07:45:42', ''),
('d73d0cc7-13a9-4187-90ad-ba377fee0bdb', 'orders-index', 'index', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('d7801bfc-a77c-43f3-aa5f-f4fe685f1da2', 'invoice_lines-add', 'add', '278455b7-5bf0-4238-b4c1-a856693585ac', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('d7bc572c-4ec5-4450-af5b-39ecfe1d726f', 'orgs-add', 'add', 'ece34c07-5ae4-4b74-b27d-1bfc67404a7a', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('d7fd1441-a721-4efe-b2fd-8724b9501400', 'void', 'void', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-06-07 14:24:17', '', '2018-06-07 14:24:17', ''),
('d91333c0-3dd0-415f-bb18-06482c0c1094', 'branches-edit', 'edit', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('d9faff4b-65d2-44e8-9da2-8625927fb870', 'controllers-delete', 'delete', '8cffcbc7-3aa4-44ac-a089-504827411992', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('dc629d6f-4399-4cd5-93ac-85e9d72660ec', 'incometype-index', 'index', '0ca1f981-92c3-4115-9c36-00c56bb47a5f', '', '2018-05-22 07:48:19', '', '2018-05-22 07:48:19', ''),
('ddb9e810-dadf-4541-a569-845c1ff4a3ac', 'invoice_lines-view', 'view', '278455b7-5bf0-4238-b4c1-a856693585ac', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('de366403-b454-4b0b-b96b-ff0aaa351251', 'banks-add', 'add', '24f90708-e61c-4184-b8aa-6a230907ba41', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('e020bfea-4460-445b-979d-676d60a1460a', 'good_transactions-view', 'view', '8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', '', '2018-05-22 07:32:39', '', '2018-05-22 07:32:39', ''),
('e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', 'role_accesses-view', 'view', '76045876-2061-43ee-b47c-94e1c789e19a', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('e1903505-1a36-402a-8560-463a86f0f0d0', 'payment_lines-delete', 'delete', '19bf4266-69af-4c75-a542-cf05b9b311ed', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('e26e5f95-19f2-411d-b4b6-b5d7cbcdf1c1', 'invoices-delete', 'delete', 'ddc2cdb3-5d62-45dd-b7fb-c6133b901303', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('e2ac4453-58e7-452a-a53f-a314a6431222', 'storagebis-add', 'add', 'ec96495b-458c-49cb-bec9-bfd07a0e0e59', '', '2018-05-22 08:17:22', '', '2018-05-22 08:17:22', ''),
('e30ef40e-200c-4564-bf0a-182e77f5f381', 'pawn-listpawn', 'listpawn', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:59:04', '', '2018-05-22 07:59:04', ''),
('e36765e2-1642-4793-ba7e-83fd96d0d1c7', 'invoices-edit', 'edit', 'ddc2cdb3-5d62-45dd-b7fb-c6133b901303', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('e65cefee-c655-42b4-8429-16f9c8d91c2f', 'wh_products-add', 'add', 'ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('e67e3bee-325d-40e4-944b-e3adbaad7276', 'profile-index', 'index', 'cebfa253-0af7-4156-8802-d16c994c67e6', '', '2018-05-22 08:04:30', '', '2018-05-22 08:04:30', ''),
('e806ad6d-b5cf-474c-a657-74a5f848bdcf', 'size-delete', 'delete', '909f4691-07c5-4cb4-89c4-6b3aa41380ca', '', '2018-05-22 08:14:58', '', '2018-05-22 08:14:58', ''),
('e904f3bb-ae98-4d1e-82b9-740c33988b3b', 'good_receipts-add', 'add', '39f434d6-48fd-449d-9238-289e0cbf4a21', '', '2018-05-22 07:29:50', '', '2018-05-22 07:29:50', ''),
('e9d46832-82b5-4ead-867b-36d6f7ff0cee', 'storagebis-delete', 'delete', 'ec96495b-458c-49cb-bec9-bfd07a0e0e59', '', '2018-05-22 08:17:56', '', '2018-05-22 08:17:56', ''),
('ea409acc-3b37-4ec6-84c4-63f90f460d93', 'serial_numbers-index', 'index', '9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('ea463ce5-b72a-4710-9d08-b1d27e73093f', 'productsubcategories-add', 'add', '37b2ae29-244b-429f-adb5-3556ea217bec', '', '2018-05-22 08:22:43', '', '2018-05-22 08:22:43', ''),
('ead6c4a6-5e03-4710-9000-c3b2dcc93bee', 'report-savingreport', 'savingreport', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-05-22 08:09:13', '', '2018-05-22 08:09:13', ''),
('eb308a9b-f509-40de-89a7-37da2bbf6c6c', 'logout-endsession', 'endsession', 'e345de1b-e041-424b-a306-2f32a818e522', '', '2018-05-22 07:50:42', '', '2018-05-22 07:50:42', ''),
('ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', 'login-add', 'add', '4d986218-aea3-49b2-a744-3cec4691c43d', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('edc23445-d3be-4e6b-a5ff-7689dd603ea6', 'productcategories-edit', 'edit', 'c6397219-8b76-4aa8-8d69-cf81754e5ab3', '', '2018-05-22 08:03:39', '', '2018-05-22 08:03:39', ''),
('ee116499-c03f-43cb-a125-b625d1eca065', 'pawn-delete', 'delete', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:58:47', '', '2018-05-22 07:58:47', ''),
('ee13301d-c0dd-404a-b625-061838662d30', 'report-salereport', 'salereport', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-05-22 08:09:29', '', '2018-05-22 08:09:29', ''),
('eedf5420-ecb7-42b0-966f-76916b24af6d', 'good_movement-completed', 'completed', '4f8d3de2-d757-4e4e-9777-8d1b418cefd1', '', '2018-05-22 07:35:25', '', '2018-05-22 07:35:25', ''),
('ef766a2f-def7-4b4b-b73b-38ce3a300cdf', 'designs-add', 'add', '581eecf7-ca9c-4fab-aad7-50d987c29244', '', '2018-05-22 07:17:26', '', '2018-05-22 07:17:26', ''),
('f1a8f89f-6332-4a1c-a5dc-a37605359cdd', 'pawnline-edit', 'edit', '5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', '', '2018-05-22 08:00:53', '', '2018-05-22 08:00:53', ''),
('f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', 'addresses-index', 'index', 'dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('f5013152-aa4e-40f2-9d22-8872b7818bae', 'invoice_lines-delete', 'delete', '278455b7-5bf0-4238-b4c1-a856693585ac', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('f50f9b7d-b688-477f-952a-5119e72c6455', 'productsubcategories-edit', 'edit', '37b2ae29-244b-429f-adb5-3556ea217bec', '', '2018-05-22 08:22:57', '', '2018-05-22 08:22:57', ''),
('f6523a74-f023-46fa-8f82-0f0008012a65', 'designs-index', 'index', '581eecf7-ca9c-4fab-aad7-50d987c29244', '', '2018-05-22 07:18:04', '', '2018-05-22 07:18:04', ''),
('f78a01df-dc87-4943-9c3b-f059ff78f1e7', 'serial_numbers-add', 'add', '9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('f7b28d1a-6056-4077-873b-afa244b643d7', 'roles-add', 'add', 'b81c7fff-9c61-4760-a64a-c57bd96a7882', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('f9ec2a1d-92ee-4c8c-9e0c-f27eb2e301d2', 'order_line-delete', 'delete', '3d2b1142-082b-49d5-976d-f66f1263c3c7', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('fa02c8c8-1782-4379-a573-0e1dd3fde6b4', 'income-get_income_type_list', 'get_income_type_list', '93099af2-8f41-449d-8164-73b52a04f168', '', '2018-05-22 07:47:46', '', '2018-05-22 07:47:46', ''),
('fc31c746-75a3-4eaf-9999-f8b44fb4217e', 'scmanagement-getcard', 'getcard', '9af0b68e-2368-4b7d-92fd-55902ac8c922', '', '2018-05-22 08:13:41', '', '2018-05-22 08:13:41', ''),
('fc701433-0289-4ec0-9d14-c75b383d8b25', 'roles-edit', 'edit', 'b81c7fff-9c61-4760-a64a-c57bd96a7882', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', 'good_lines-edit', 'edit', 'e60320c8-bca9-4ca0-956a-2a731998bce2', '', '2018-05-22 07:21:03', '', '2018-05-22 07:21:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` char(36) NOT NULL,
  `address_line` varchar(255) DEFAULT NULL,
  `houseno` varchar(10) DEFAULT NULL,
  `villageno` varchar(10) DEFAULT NULL,
  `villagename` varchar(255) DEFAULT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province_id` char(36) NOT NULL,
  `postalcode` char(5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address_line`, `houseno`, `villageno`, `villagename`, `subdistrict`, `district`, `province_id`, `postalcode`, `description`, `created`, `createdby`, `modified`, `modifiedby`) VALUES
('0599e40d-6a17-4e3e-ac2b-aa93d9f6ba44', 'Moo.3 Ban kwanwiang', '2', '83', NULL, 'ป่าไผ่', '2', '38', NULL, NULL, '2018-05-03 10:33:03', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-03 10:33:03', NULL),
('0b81a8b1-41b6-4110-a10c-0aa252cca811', 'Moo.3 Ban kwanwiang', '2', '83', NULL, 'ป่าไผ่', '2', '38', NULL, NULL, '2018-05-03 10:22:07', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-03 10:22:07', NULL),
('0d092bb9-e8a5-4b31-886a-313d31352e61', ' 202 หมู่ที่1', NULL, NULL, NULL, 'แม่อาย', 'แม่อาย', '38', NULL, NULL, '2018-05-07 12:02:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 12:02:44', NULL),
('0d37587d-d378-4334-aded-c087a8afadfc', '4', '202', '1', NULL, 'กระสัง', 'กระสัง', '38', NULL, NULL, '2018-04-23 08:46:23', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-23 08:46:23', NULL),
('1c4a2487-e257-4d4e-be43-412bada64af7', '202', NULL, NULL, NULL, 'สากเหล็ก', 'สากเหล็ก', '53', '66160', NULL, '2018-05-07 08:31:58', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-07 08:33:34', NULL),
('24113bf2-0ffb-4c5d-942a-4f904fa50161', '-', NULL, NULL, NULL, 'ป่ากลาง', 'ปัว', '43', '55120', NULL, '2018-06-01 09:24:01', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-01 09:24:01', NULL),
('27f43266-78b5-4487-aee1-8cdcfa77a5aa', '1', '1', '1', NULL, '1', '1', '38', NULL, NULL, '2018-04-25 11:27:06', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-25 11:27:06', NULL),
('389ea2b7-06c6-4b86-b381-d163412934e6', '4', NULL, NULL, NULL, 'มะลิกา', 'แม่อาย', '38', '50280', NULL, '2018-05-01 07:47:36', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-04 11:08:45', NULL),
('38af9e5f-e8bc-4f50-a23c-161315bc23fa', '224/5  Moo.3 Ban kwanwiang', '4', '4', NULL, '4', '4', '45', NULL, NULL, '2018-04-24 14:25:32', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-24 14:25:32', NULL),
('3b44a169-0ef4-48c1-83e2-76a26462347b', '3', '1', '2', NULL, 'บ้านแซว', 'เชียงแสน', '45', NULL, NULL, '2018-04-25 11:47:02', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-25 11:47:02', NULL),
('62db88d4-507e-4468-af28-bbdb65cf6f51', 'Moo.3 Ban kwanwiang', '2', '83', NULL, 'ป่าไผ่', '2', '38', NULL, NULL, '2018-05-03 10:24:59', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-03 10:24:59', NULL),
('8574efa7-972f-4917-aecb-6175cc2863ea', '4', NULL, NULL, NULL, '5', '5', '11', NULL, NULL, '2018-05-07 11:01:53', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 11:01:53', NULL),
('8f7d144b-5e2c-4cb1-80e2-39a72c0f140a', 'Moo.3 Ban kwanwiang', '2', '83', NULL, 'ป่าไผ่', '2', '38', NULL, NULL, '2018-05-03 10:22:42', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-03 10:22:42', NULL),
('9af84195-7122-4a6e-a46f-ad7a5605c667', '1', NULL, NULL, NULL, 'บงเหนือ', 'สว่างแดนดิน', '35', NULL, NULL, '2018-05-06 06:34:14', '34d512fa-3b93-4b09-b342-64696d9da155', '2018-05-06 06:34:14', NULL),
('a67afd42-53ac-4b8f-a983-f83e50eb4a72', 'Moo.3 Ban kwanwiang', '2', '83', NULL, 'ป่าไผ่', '2', '38', NULL, NULL, '2018-05-03 10:22:37', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-03 10:22:37', NULL),
('b1803138-1d0f-4db3-93ef-850be1f18671', '-', NULL, NULL, NULL, 'กระสัง', 'เมืองบุรีรัมย์', '20', '31000', NULL, '2018-04-21 07:56:13', NULL, '2018-04-21 07:56:38', NULL),
('bb57324c-55eb-4bd5-8427-a4b50aad1ac5', ' 63/1 หมู่ที่4', NULL, NULL, NULL, 'หนองหาร', 'สันทราย', '38', '', NULL, '2018-05-06 06:51:06', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-06 06:51:06', NULL),
('bdde3ddf-9f5b-40ac-9493-efeb5a8354d3', '202', NULL, NULL, NULL, 'สากเหล็ก', 'สากเหล็ก', '53', '66160', NULL, '2018-05-07 08:31:39', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-07 08:31:39', NULL),
('c1e663fd-9536-4c1c-bd26-7fa7f56b0d25', '4', NULL, NULL, NULL, 'พระสิงห์', 'เมืองเชียงใหม่', '38', '50200', NULL, '2018-05-07 10:20:15', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-07 10:20:15', NULL),
('d1c47bce-2c21-4d0c-b3a5-d5a0d51fb91e', '124/2-3 หมู่ที่ 6', NULL, NULL, NULL, 'ประโคนชัย', 'ประโคนชัย', '20', '31140', NULL, '2018-04-21 07:55:31', NULL, '2018-04-21 07:55:31', NULL),
('d31e9079-04f3-4e3c-bc9c-c4ef46b20e18', '1', '1', '1', NULL, 'บงตัน', 'ดอยเต่า', '38', NULL, NULL, '2018-05-05 10:49:22', '34d512fa-3b93-4b09-b342-64696d9da155', '2018-05-05 10:49:22', NULL),
('dc3ead45-e647-4f3a-8389-124a8ef0e29e', '224/5  Moo.3 Ban kwanwiang', NULL, NULL, NULL, 'สันทราย', 'ฝาง', '38', '50110', NULL, '2018-04-23 07:33:36', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-23 07:33:36', NULL),
('eac48ea8-39c1-45a9-a501-745c1676babb', 'ช้างทอง', '12', '2', NULL, 'สุไหงปาดี', 'สุไหงปาดี', '76', NULL, NULL, '2018-04-25 17:17:20', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-04-25 17:17:20', NULL),
('edbab1de-b751-482c-bda6-3b0c4f4c8ae6', '4', '215', '1', NULL, 'ก', 'ข', '38', NULL, NULL, '2018-04-24 14:23:34', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-24 14:23:34', NULL),
('f7903332-9391-4354-9ec7-9d2a30b97af0', '4', '202', '1', NULL, 'มา', 'ยน', '38', NULL, NULL, '2018-04-23 08:52:38', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-04-23 08:52:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` char(36) NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_id` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `iscash` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `code`, `name`, `image_id`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `iscash`) VALUES
('16424b78-288b-4d71-a62a-43505734b961', 'KBANK', 'ธนาคารกสิกรไทย', NULL, NULL, '2018-02-19 11:48:27', '0', '2018-04-17 14:20:10', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'N'),
('3e2b623e-3ac5-4c3d-8dc6-8867f9d47968', 'KTB', 'ธนาคารกรุงไทย', NULL, NULL, '2018-03-24 07:39:03', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:39:03', NULL, 'N'),
('944f4a5e-2d93-4859-95be-afd52119cb3d', 'SCB', 'ธนาคารไทยพาณิชย์', NULL, NULL, '2018-03-24 07:39:25', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:39:25', NULL, 'N'),
('c95ad284-cd06-4abb-bb18-9541a6804065', 'BBL', 'ธนาคารกรุงเทพ', NULL, NULL, '2018-03-24 07:38:43', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:38:43', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` char(36) NOT NULL,
  `total_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `account_name` varchar(100) NOT NULL,
  `bank_id` char(36) DEFAULT NULL,
  `account_type` varchar(100) DEFAULT NULL,
  `accountno` char(10) DEFAULT NULL,
  `bank_office` varchar(100) DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'BACC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `total_balance`, `account_name`, `bank_id`, `account_type`, `accountno`, `bank_office`, `org_id`, `branch_id`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `type`) VALUES
('0554e683-a6e0-47c8-87e6-9b4db01bfd01', '0.00', 'ห้างทองเยาวราชกรุงเทพ โดยนายธานินทร์', '16424b78-288b-4d71-a62a-43505734b961', 'เงินฝากออมทรัพย์', '3842386062', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-18 13:13:13', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 14:15:57', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'BACC'),
('09952747-b3cb-4a35-8e56-559d75b24a28', '0.00', 'เงินสดหน้าร้าน', NULL, NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', 'auto generate by system', '2018-04-24 13:44:10', '0', '2018-04-24 13:45:04', NULL, 'CASH'),
('43bbf410-6198-4205-aa96-4b462ebea7b4', '-48280.00', 'เงินสดหน้าร้านกระสัง', NULL, NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '', '2018-05-07 12:56:31', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-28 18:01:49', NULL, 'CASH'),
('4fc9c7a4-ea71-49ec-a663-15ec406174c1', '0.00', 'นายธานินทร์ ทัศไนยเธียรกุล', '3e2b623e-3ac5-4c3d-8dc6-8867f9d47968', 'เงินฝากออมทรัพย์', '3160595730', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-21 08:19:50', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 14:14:15', NULL, 'BACC'),
('55961f1c-3f74-4bd5-a572-5a49cbe71622', '0.00', 'เงินสด', NULL, NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a2af2592-0447-4138-bfcd-83ad3fb317b1', '', '2018-04-18 13:12:38', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-18 13:12:38', NULL, 'CASH'),
('55de3512-22e9-4695-95d9-99a38b983c02', '0.00', 'โสมสอางค์ บางวิเศษ', '944f4a5e-2d93-4859-95be-afd52119cb3d', 'เงินฝากออมทรัพย์', '4070073095', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-21 08:20:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 10:46:08', NULL, 'BACC'),
('ad373317-d139-472e-b8e2-72ca4d8a3322', '0.00', 'นายธานินทร์ ทัศไนยเธียรกุล', 'c95ad284-cd06-4abb-bb18-9541a6804065', 'เงินฝากออมทรัพย์', '6403001727', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-21 08:19:25', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 14:12:59', NULL, 'BACC'),
('b63e01dd-a3d0-4071-8dc6-d33e97236a91', '0.00', 'เงินสดหน้าร้าน', NULL, NULL, NULL, NULL, '0', '0', 'auto generate by system', '2018-04-24 13:45:47', '0', '2018-05-01 08:01:23', NULL, 'CASH');

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
  `description` text DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bpartners`
--

INSERT INTO `bpartners` (`id`, `code`, `name`, `title`, `firstname`, `lastname`, `iscustomer`, `isactive`, `taxid`, `birthday`, `religion`, `created`, `createdby`, `midified`, `modifiedby`, `description`, `org_id`, `branch_id`, `phone`, `mobile`, `email`, `address_id`) VALUES
('0', '0', 'ลูกค้าหน้าร้าน', '-', '', '', 'Y', 'Y', NULL, NULL, NULL, '2018-06-27 16:54:44', '0', NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `isheadquarters` enum('Y','N') DEFAULT 'N',
  `org_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `address_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `code`, `isheadquarters`, `org_id`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `address_id`) VALUES
('0', '*', '-', 'Y', '0', NULL, '2018-02-18 15:53:39', '0', NULL, NULL, NULL),
('9e55ef50-def4-4775-8583-ec2218c66baf', 'กระสัง', '02', 'N', '371a39b9-f692-49dd-9d78-41f388e319cc', '', '2018-04-21 07:56:13', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 07:56:38', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'b1803138-1d0f-4db3-93ef-850be1f18671'),
('a83e80d3-a1aa-435b-b786-afde2a246874', 'ประโคนชัย', '01', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'ใส่ที่อยู่ตามบัตรปปชพี่ตือ', '2018-04-21 07:55:31', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 07:55:31', NULL, 'd1c47bce-2c21-4d0c-b3a5-d5a0d51fb91e');

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
('0ca1f981-92c3-4115-9c36-00c56bb47a5f', 'Controller-income_types', 'incometypes', '', '2018-05-22 06:58:48', '0', '2018-05-22 06:58:48', NULL),
('0e20fb9a-55a3-4f5f-b150-749e7ffa75e9', 'Controller-provinces', 'provinces', '', '2018-05-22 07:05:51', '0', '2018-05-22 07:05:51', NULL),
('153bb193-8557-436c-b336-f71c7a6f62e3', 'Controller-sales', 'sales', '', '2018-03-24 10:52:21', '0', '2018-05-22 06:50:44', '0'),
('1767158a-c1a1-4e6d-9025-a515fcb8a776', 'Controller-promotions', 'promotions', '', '2018-05-22 07:05:27', '0', '2018-05-22 07:05:27', NULL),
('19bf4266-69af-4c75-a542-cf05b9b311ed', 'Controller-payment_lines', 'paymentlines', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('24f90708-e61c-4184-b8aa-6a230907ba41', 'Controller-banks', 'banks', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('278455b7-5bf0-4238-b4c1-a856693585ac', 'Controller-invoice_lines', 'invoicelines', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('37b2ae29-244b-429f-adb5-3556ea217bec', 'Controller-productsubcategories', 'productsubcategories', '', '2018-05-22 08:21:08', '0', '2018-05-22 08:22:09', '0'),
('39f434d6-48fd-449d-9238-289e0cbf4a21', 'Controller-goods_receipts', 'goodsreceipts', '', '2018-05-22 06:56:40', '0', '2018-05-22 06:56:40', NULL),
('3ac6c63c-855f-4d35-ade2-20c646fd095b', 'Controller-warehouses', 'warehouses', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('3ba46bd1-cb8a-4b98-8138-093d39ca9b8f', 'Controller-purchase', 'purchase', '', '2018-05-22 07:06:43', '0', '2018-05-22 07:06:43', NULL),
('3d2b1142-082b-49d5-976d-f66f1263c3c7', 'Controller-order_line', 'orderline', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('3e2c9013-941d-4848-ba1f-074bf279c18f', 'Controller-payments', 'payments', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('41bb028d-95a8-48d6-a993-d41982a044d9', 'Controller-saving_transactions', 'savingtransactions', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('44b087ef-8aa5-43b2-86a6-b41765da45ea', 'Controller-users', 'users', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('4ca290b4-dec5-4a21-8c1d-9341e4a71670', 'Controller-orders', 'orders', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('4d986218-aea3-49b2-a744-3cec4691c43d', 'Controller-login', 'login', '', '2018-02-20 06:48:15', 'uan', '2018-02-20 06:48:15', ''),
('4f8d3de2-d757-4e4e-9777-8d1b418cefd1', 'Controller-goods_movement', 'goodsmovement', '', '2018-05-22 06:56:04', '0', '2018-05-22 06:56:04', NULL),
('581eecf7-ca9c-4fab-aad7-50d987c29244', 'Controller-designs', 'designs', '', '2018-05-22 06:52:52', '0', '2018-05-22 06:52:52', NULL),
('58dafc36-58d3-4a66-9cf9-67a7f78d9b15', 'Controller-glitems', 'glitems', '', '2018-05-22 06:54:15', '0', '2018-05-22 06:54:15', NULL),
('5aa7d043-4cc2-4e13-b3a6-9228787d9bfd', 'Controller-pawn_lines', 'pawnlines', '', '2018-05-22 07:03:22', '0', '2018-05-22 07:03:22', NULL),
('5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', 'Controller-pawns', 'pawns', '', '2018-05-22 07:03:00', '0', '2018-05-22 07:03:00', NULL),
('6321c6fa-bfbc-4d7b-8525-56dd2a1c0bed', 'Controller-weights', 'weights', '', '2018-05-22 07:11:00', '0', '2018-05-22 07:11:00', NULL),
('650da8b7-46c1-4a0b-add5-6b1675c43b11', 'Controller-actions', 'actions', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('76045876-2061-43ee-b47c-94e1c789e19a', 'Controller-role_accesses', 'roleaccesses', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('771b13a6-fdb1-4837-9092-d624352a2875', 'Controller-sequent_nmbers', 'sequentnmbers', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('79197447-c3c2-4162-a4e1-f81e9386a749', 'Controller-products', 'products', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('8c3c7bf9-cfaf-4dce-a6b8-ea8c8ed90c2a', 'Controller-goods_transactions', 'goodstransactions', '', '2018-05-22 06:57:29', '0', '2018-05-22 06:57:29', NULL),
('8cffcbc7-3aa4-44ac-a089-504827411992', 'Controller-controllers', 'controllers', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('8e8dc480-0d1c-4f41-8426-6882c26c228e', 'Controller-saving_accounts', 'savingaccounts', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1', 'Controller-serial_numbers', 'serialnumbers', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('909f4691-07c5-4cb4-89c4-6b3aa41380ca', 'Controller-sizes', 'sizes', '', '2018-05-22 07:09:01', '0', '2018-05-22 07:09:01', NULL),
('93099af2-8f41-449d-8164-73b52a04f168', 'Controller-income', 'income', '', '2018-05-22 06:58:23', '0', '2018-05-22 06:59:12', '0'),
('9af0b68e-2368-4b7d-92fd-55902ac8c922', 'Controller-scmanagements', 'scmanagements', '', '2018-05-22 07:08:27', '0', '2018-05-22 07:08:27', NULL),
('a45863cc-fcf1-4906-917b-df335ca3abeb', 'Controller-pos', 'pos', '', '2018-03-24 10:51:50', '0', '2018-05-22 06:50:32', '0'),
('a893d9cd-e6b8-4cc1-b464-dd754a7b9252', 'Controller-locations', 'locations', '', '2018-05-22 06:59:34', '0', '2018-05-22 06:59:34', NULL),
('b603aa0f-60ec-4187-b6d0-08bb78a41b22', 'Controller-images', 'images', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', 'Controller-system_usages', 'systemusages', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('b81c7fff-9c61-4760-a64a-c57bd96a7882', 'Controller-roles', 'roles', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('c5ca2880-3c03-4103-bf75-19ab049f456b', 'Controller-reports', 'reports', '', '2018-05-22 07:07:19', '0', '2018-05-22 07:07:19', NULL),
('c6397219-8b76-4aa8-8d69-cf81754e5ab3', 'Controller-product_categories', 'productcategories', '', '2018-05-22 07:04:29', '0', '2018-05-22 07:04:29', NULL),
('c6f7aa87-e575-4afe-9d67-ad2e50246247', 'Controller-branches', 'branches', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('cebfa253-0af7-4156-8802-d16c994c67e6', 'Controller-profile', 'profile', '', '2018-05-22 07:05:05', '0', '2018-05-22 07:05:05', NULL),
('dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', 'Controller-addresses', 'addresses', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('ddc2cdb3-5d62-45dd-b7fb-c6133b901303', 'Controller-invoices', 'invoices', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('e345de1b-e041-424b-a306-2f32a818e522', 'Controller-logout', 'logout', '', '2018-05-22 06:59:54', '0', '2018-05-22 06:59:54', NULL),
('e60320c8-bca9-4ca0-956a-2a731998bce2', 'Controller-goods_lines', 'goodslines', '', '2018-05-22 06:55:01', '0', '2018-05-22 06:55:24', '0'),
('e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f', 'Controller-product_images', 'productimages', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('ec96495b-458c-49cb-bec9-bfd07a0e0e59', 'Controller-storage_bins', 'storagebins', '', '2018-05-22 07:10:04', '0', '2018-05-22 07:10:26', '0'),
('ece34c07-5ae4-4b74-b27d-1bfc67404a7a', 'Controller-orgs', 'orgs', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('ed5dae88-44aa-42bd-bb4e-b10ad8b94b46', 'Controller-wh_products', 'whproducts', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL),
('f085e8d3-945c-4532-978a-be36fd0b25b6', 'Controller-smartcards', 'smartcards', '', '2018-05-22 07:09:38', '0', '2018-05-22 07:09:38', NULL),
('f4370d1a-1b27-4599-ae9a-713d368db073', 'Controller-bank_accounts', 'bankaccounts', NULL, '2018-02-19 07:42:38', 'System', '2018-02-19 07:42:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` char(36) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `branch_id`, `created`, `createdby`, `modified`, `description`, `startdate`, `enddate`) VALUES
('0ad4da64-7282-4704-9ced-b409121b64ef', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:02:18', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:02:35', NULL, '2018-06-28', '2018-06-28'),
('1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 16:37:49', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:40:11', NULL, '2018-07-01', '2018-07-01'),
('2557dfc9-568d-4f74-879c-07ba64d5a2e7', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:34:51', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:35:28', NULL, '2018-06-28', '2018-06-28'),
('33b11294-521e-487f-88ba-83ff2391bdd8', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 16:18:02', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:18:55', NULL, '2018-07-01', '2018-07-01'),
('388cb015-12fb-4141-a3f8-d6c7887864da', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:35:28', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:18:01', NULL, '2018-06-28', '2018-07-01'),
('538ce9b2-8cea-4497-8c67-2a8864673b82', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:05:26', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:12:11', NULL, '2018-06-28', '2018-06-28'),
('5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 16:18:55', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:19:10', NULL, '2018-07-01', '2018-07-01'),
('5e833c95-25e9-4986-80f4-fa2d69aa9fae', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-22 12:46:59', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-27 16:44:51', NULL, '2018-06-22', '2018-06-27'),
('651eaef2-a566-4ee8-9ba4-fed69b624955', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-27 16:44:51', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-27 16:49:49', NULL, '2018-06-27', '2018-06-27'),
('710e2222-fb7f-4938-a1d0-f8034e38c5d9', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:12:11', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:29:04', NULL, '2018-06-28', '2018-06-28'),
('71e44a73-3f06-456c-849e-b42e63f1c0ff', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-27 16:51:01', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 15:48:03', NULL, '2018-06-27', '2018-06-28'),
('774fb17a-1294-4822-93b0-72e08e1f5cf8', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:33:22', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:34:03', NULL, '2018-06-28', '2018-06-28'),
('7b165764-64ef-4777-ace3-4162dc9c7871', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:30:06', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:30:58', NULL, '2018-06-28', '2018-06-28'),
('7d530fa7-cc6a-4824-95bd-6a2dce46616e', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:32:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:33:17', NULL, '2018-06-28', '2018-06-28'),
('7f166500-889e-45dd-a491-952101a7f8ba', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 16:40:11', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-07-01 16:40:11', NULL, '2018-07-01', NULL),
('89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 16:19:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:37:49', NULL, '2018-07-01', '2018-07-01'),
('a8b09477-fbec-49e9-9599-58a6200eac4c', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-21 21:25:18', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-22 12:46:59', NULL, '2018-06-21', '2018-06-22'),
('b923644b-f587-4500-b437-9c32dd5f7bd8', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:02:35', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:03:45', NULL, '2018-06-28', '2018-06-28'),
('bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:04:57', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:05:26', NULL, '2018-06-28', '2018-06-28'),
('c17d4923-ee8f-4986-89c2-1482ee059d8a', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 15:48:03', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:02:18', NULL, '2018-06-28', '2018-06-28'),
('c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-27 16:49:49', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-27 16:51:01', NULL, '2018-06-27', '2018-06-27'),
('dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:29:06', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:30:06', NULL, '2018-06-28', '2018-06-28'),
('de1a71c8-d327-412b-afde-78ddb746090f', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:30:58', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:32:31', NULL, '2018-06-28', '2018-06-28'),
('e677f806-86d1-4997-90f1-4e4b185a3a2a', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:34:03', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:34:51', NULL, '2018-06-28', '2018-06-28'),
('f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 16:19:10', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:19:52', NULL, '2018-07-01', '2018-07-01'),
('fd5bc82e-2092-4eac-bc35-56736598b4ae', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:03:45', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:04:57', NULL, '2018-06-28', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `cost_lines`
--

CREATE TABLE `cost_lines` (
  `id` char(36) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amount2` decimal(10,2) NOT NULL,
  `cost_id` char(36) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sd_weight_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cost_lines`
--

INSERT INTO `cost_lines` (`id`, `amount`, `amount2`, `cost_id`, `created`, `modified`, `sd_weight_id`) VALUES
('006f2604-195d-4f3d-844e-b251a1bcf101', '900.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('012d326e-a650-4014-ab70-d272c4a4c7cc', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('0149e5e7-ec1c-4196-bef9-28bd66a25e92', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('01a875d5-ca4d-4110-821e-5d8987bdc9f2', '1000.00', '450.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', '28787316-48cb-4130-9731-a08acb46d434'),
('01dfba28-db64-452a-a8e5-a725c5ab070a', '600.00', '400.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('024ccc71-6e0e-444e-b0c7-116e3a69a6bc', '400.00', '100.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:03', '2018-07-01 16:18:03', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('033a948a-035b-4997-97b4-94e4525b8f49', '600.00', '0.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('04707605-0024-40e3-8018-3389866b70bb', '400.00', '100.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('053c06b5-cba0-41a8-8293-995c82b35f87', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('05721cfe-7477-4c2e-b4c3-7c0c4f59e215', '300.00', '80.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('07e39699-e25a-46cb-a33d-a13dd2d4590e', '1500.00', '800.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('0899dfa1-6aed-43b0-ad3b-de396504861a', '1000.00', '450.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', '28787316-48cb-4130-9731-a08acb46d434'),
('08b2e1aa-68c6-4a87-8071-2fb007ac3b1e', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('09556849-d2df-4f23-bebc-59216128676c', '400.00', '100.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('0acf6edf-b1ae-4a86-a5d8-c907c3df7353', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('0ae93205-2233-462e-89fe-7130e3f5dd71', '300.00', '0.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('0ba4401b-01a6-47fa-ae49-5c6d2e328617', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('0c73d38e-bae7-458a-a2c4-ad381c0d87d2', '1500.00', '800.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('0d2150c6-b76b-4e7b-a30b-bf1044d5e642', '500.00', '150.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('0ddfca0f-24c9-43c4-8195-86f0359e5e31', '600.00', '200.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('0e696fc3-af7f-4c20-bce9-14f178ac0ea8', '0.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('0ec744d7-625f-4646-bf70-918d12ce9734', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('0fb0c568-1638-4033-8540-5659fcbf43e7', '1100.00', '500.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('0fe34de7-18cd-4300-a015-31a38ffd0771', '1000.00', '450.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', '28787316-48cb-4130-9731-a08acb46d434'),
('109eaa6c-828e-4ed4-8ed5-2f076d0b45d8', '900.00', '300.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('1286e166-03b4-4fc7-ad50-d58c28d76574', '900.00', '300.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('1295ccbf-8a85-45eb-9167-4d3a48cd03a6', '600.00', '200.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('12a99a48-a6f2-49bf-b75d-5ba332c2f420', '500.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('12b2462b-39da-4a68-a1fa-0e3ddfe73821', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('1360ef23-7c91-462a-96d5-f22b40d7f398', '500.00', '0.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('14ee3e8e-d96c-4f8c-bb51-1c5aee03c597', '600.00', '200.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('159025d2-6560-4e95-9539-892ca2d5d996', '1500.00', '800.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('15ab4f66-5054-4f52-b7cf-a59c14332792', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('176e9ce8-7190-4015-90b1-9e4114eece05', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('182a13d6-c5ca-4c2b-bbb8-6ea09aa852a5', '900.00', '300.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('1adb6860-8acf-45b5-ae9f-755a37498207', '1000.00', '0.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', '28787316-48cb-4130-9731-a08acb46d434'),
('1b007d0c-a677-4689-83ae-8abddc140d29', '1500.00', '800.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('1b297c62-2242-469e-87fa-7274666b8a56', '1100.00', '500.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('1becb346-67a9-4d94-9742-1fa912e08ca6', '400.00', '100.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('1dbd3c46-96be-4b76-843e-62ddab09a5cf', '900.00', '300.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('1e74c78a-9010-445a-8474-96b3c561e981', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('20326b0e-caa0-4016-b282-8ad522de1765', '500.00', '150.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('206210a0-e857-4d94-bf06-3be3b5193167', '0.00', '0.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', '28787316-48cb-4130-9731-a08acb46d434'),
('2224d985-731a-4b14-8fc5-fdc6119dd7b5', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('22bb75a6-bcff-43fa-8698-32d5dc15eeee', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('26214d6d-0b27-4364-bfe5-c0f6ba0b706a', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('26b3287d-d2f7-4821-bff5-e22131d60590', '1000.00', '450.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '28787316-48cb-4130-9731-a08acb46d434'),
('279b3727-61c9-4616-8a17-652f96a2fc3c', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('27b337f2-d673-42a7-b5c6-0c512c1d8ed7', '1500.00', '800.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('29359cec-971e-489a-8079-2212344a5cbf', '1000.00', '0.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', '28787316-48cb-4130-9731-a08acb46d434'),
('29abc6d7-0266-484e-968f-dba89672b099', '400.00', '100.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('2be4002e-a231-4411-8053-d146a205b0c3', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('2d408de1-668d-4d0b-9e03-5bc5e0f913cc', '900.00', '300.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('2ddd2346-9fc2-451d-a9ab-d52853387f0e', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('2e9d92e9-0e6e-4e7d-9b21-65d21ba576fc', '1500.00', '800.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('2ea824a4-a7ad-45ab-b124-0fafa6c4e44d', '600.00', '0.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('2eb3b7af-826c-4da4-ae57-9e32825cdfde', '1100.00', '1350.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('2f4aa99c-1eb4-4e35-aecc-8a3ab277a5c1', '900.00', '300.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('2facc46c-7b0d-469c-9875-ab1721521e97', '900.00', '300.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('308fddc0-d1cf-4dca-b606-eb200049b950', '300.00', '0.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('309a55fd-15c5-4377-9016-03d7fb1934ff', '400.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('31efe0b3-ada9-49d1-8543-f4d01a362345', '1500.00', '800.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('328623e4-7d93-49d2-adc1-e06862bdb1eb', '900.00', '700.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('35200ff7-ee43-4462-b5ae-2f5781580275', '1100.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('36a88ac2-371d-41fa-8bea-31e6794d375c', '400.00', '100.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('379d8f52-f23b-4888-99a1-fe4d8fde0413', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '28787316-48cb-4130-9731-a08acb46d434'),
('38264fdb-349e-49af-8776-01493b8c97e8', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('39083613-26c1-4062-9a6b-4bdd35e0678f', '600.00', '200.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('396e8df1-8d15-4a0a-8d60-bc8a2ba0e72e', '1500.00', '800.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('39846c97-a8c1-4469-8864-cc1169f34e31', '600.00', '200.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('3986a450-f0d5-4c35-ac7f-baa72f28746a', '1100.00', '1500.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('3b93bec2-48bc-4c0a-873d-1459e24145c5', '600.00', '400.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('3d4d5e9b-7f42-4840-be27-f4e0cea3a58f', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('3da0e2c3-5a99-46ab-bf2e-57fd7781b20b', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('3dbc8c9a-9931-4e5b-88f1-004d179934dc', '600.00', '200.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:09', '2018-06-28 16:29:09', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('3e27ce87-4b79-4d56-9a0c-3fddbcef5d53', '300.00', '80.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('3e5097f4-9cf7-410b-aeb7-888eb41fc003', '2200.00', '1000.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('3e5c3bd4-6f46-43f5-af86-179689935cf3', '1100.00', '1350.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('400c6734-ec82-421a-b928-6e88d5506816', '500.00', '150.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('409060ea-23b4-4f50-86dd-15e7398b9e09', '300.00', '80.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('435fb21c-eba2-48b9-ad90-3df68ff0d279', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('43bc8360-7008-47a6-aa23-ccb30eb50ffa', '900.00', '0.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:04', '2018-06-28 15:48:04', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('44f82269-8670-47b7-a51b-295816c3fde6', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('451a241f-bc1c-4856-9b25-35827105cd7f', '1000.00', '450.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', '28787316-48cb-4130-9731-a08acb46d434'),
('454564af-1935-4ecf-8546-1e2f783a6033', '1100.00', '1350.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('4662dabf-b8a0-400d-919a-8869a3023f30', '1100.00', '1500.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('4695605d-07df-44b8-8ccf-0a2dcfc2352c', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('48534cc3-bdf9-41c0-a9a5-4709d64b22f5', '400.00', '0.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('496cc680-1942-46ce-b4f1-b65de0e1c99a', '500.00', '0.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('4a6c73c8-ce9e-4c82-b716-151f9aef00d3', '1500.00', '800.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('4c597845-7d8f-4add-8036-1e979f043567', '400.00', '100.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('4da3b62d-c79e-45eb-86d4-ae3fb1e71ab4', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('4fa191d4-70b1-4020-b039-98eba74ad7cd', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('4fc8477c-c11f-40d5-bd31-746ad5673700', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('5027d9b1-bc7a-4f1f-956c-05c3bbf12717', '300.00', '80.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('514dd2ca-1299-43cb-b9a6-31874af109df', '400.00', '100.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:09', '2018-06-28 16:29:09', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('52b067e3-d59a-4d46-b8b8-4886ca6c7d2f', '1000.00', '450.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', '28787316-48cb-4130-9731-a08acb46d434'),
('53191634-f31c-4ac0-96e2-5b75742012ca', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('53542497-c80a-4dd5-93a0-736840ada896', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('538a2db7-8065-42ca-9399-a1b4c1c91844', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('566d5ae7-84eb-478a-8524-cf9e877de43f', '600.00', '200.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('5756dc65-6c38-4131-aaff-65959d1f2049', '1000.00', '0.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', '28787316-48cb-4130-9731-a08acb46d434'),
('576d663a-a9f3-4db4-aa86-c73567569d34', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('57712e6d-ccc2-48c1-8c37-ddf1bef3f817', '600.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('59730ea9-850c-4a73-8a4f-6e6dc729febf', '600.00', '0.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('59b680dd-ce7f-41c6-9018-7b5b81c5434c', '300.00', '80.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:03', '2018-07-01 16:18:03', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('5a86705b-d44f-47b6-be6c-ee51a495f98c', '500.00', '0.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('5aad47c7-c4f5-4fad-90fd-cfbb7dd16d88', '300.00', '80.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:10', '2018-06-28 16:29:10', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('5b93d88b-e93e-4a1b-9627-309bf09733d0', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('5ba5f88e-973c-456f-bc4c-c6634775093a', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('5c5291b3-4ec7-411c-8374-236d4454de27', '500.00', '250.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('5ce96f51-dff2-497b-9e2b-cd225ae5ea4f', '500.00', '0.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:04', '2018-06-28 15:48:04', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('5cfc7103-1920-49d5-8bef-6b19ed60a0e4', '1500.00', '800.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('5efa5bba-1154-4f42-9b1c-ed0094210b85', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('61907255-8ce9-4401-b888-c82688adeddb', '300.00', '80.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('636b9368-8665-4027-9abb-8187f5379bfc', '1100.00', '1500.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('6436b173-6777-4902-bd2d-16e73f491ab9', '500.00', '0.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('67692f25-6ad7-49b3-b35b-cf11355f479c', '1100.00', '1500.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('67bda845-d11d-4de3-913e-58c6145f80e8', '1500.00', '2025.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('696e3000-97ba-4151-8d9e-7a1b7f03bf90', '600.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('69e3f969-8e49-47b5-bf5e-e8b0c2fada82', '0.00', '0.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('6a506d25-41a5-4edf-b5b8-91f32e71f084', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('6b9a4d2f-d9d8-400f-b2cc-d615bd205620', '1500.00', '800.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('6c1c76a9-4119-4d90-904b-45d44f2548ac', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('6e0d6285-b09b-4dd2-b142-0423f43ed020', '600.00', '0.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('717dbfd0-b413-4dbd-9321-050604b095dd', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('7226705a-89b4-448b-aed0-0bac0ae2ed2f', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('7368502b-0deb-41ef-aaf9-f9923d83e062', '1500.00', '2025.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('7428458d-de8c-4c44-8430-a3f39f553444', '400.00', '0.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('7446e040-ec88-4535-b179-3872b7ac2c41', '400.00', '100.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('745e1bee-6098-4c91-a9ce-e804084d62f2', '900.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('758e8563-6d7a-49fa-8d3d-7e221cfc7467', '1500.00', '800.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('75c36a97-b209-4f08-8d6d-69bfb9cf9ba9', '900.00', '0.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('760c73b6-032a-4055-abfb-4bd95b1a9318', '1100.00', '1350.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:46:59', '2018-06-22 12:46:59', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('76844321-a929-4ec7-a448-98b2185159dc', '400.00', '0.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('77447e9d-7d3d-4b4b-879e-327399d3689e', '300.00', '0.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('7830c1ad-093c-4840-81e8-f0f65ae4c625', '900.00', '300.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('785e654e-4e0b-4678-b118-e51ae5c4cb9e', '500.00', '150.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:03', '2018-07-01 16:18:03', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('795bf621-b13b-48ef-a6b4-877e05462847', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('79d20bf9-d5ba-4d34-84da-7ede5fbe5a30', '900.00', '300.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:10', '2018-06-28 16:29:10', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('7c25a4bd-6605-4489-8084-a3af78360f46', '600.00', '200.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('7c8c7620-38e5-4711-a4ef-c2fc438a98db', '600.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('7e3c2e75-065c-404c-8994-2fdc26bb0224', '900.00', '300.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('7fa9b8d5-06fe-40fe-8808-0c08dfbbca27', '1000.00', '450.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', '28787316-48cb-4130-9731-a08acb46d434'),
('80db340f-4bdb-489f-9237-3963429c801a', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('829ce514-4159-4530-9676-b088e3879320', '1500.00', '800.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:08', '2018-06-28 16:29:08', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('82b28f9f-8c65-4b20-8290-8bbd4bf2cb39', '1100.00', '1350.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('84b23263-3fc1-43ae-9c4c-bca1af4e9b6a', '1000.00', '450.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '28787316-48cb-4130-9731-a08acb46d434'),
('851337f4-252b-4172-ab1b-88f4b5701ac7', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('865515b8-c45f-4950-88c8-75fbc17d765d', '400.00', '0.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('87dca04a-f511-49a4-80ee-6d2a8d8ac377', '1100.00', '1500.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:03', '2018-06-28 15:48:03', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('88d2cd1f-f1c6-457e-9a35-52ef172e7a53', '1000.00', '450.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', '28787316-48cb-4130-9731-a08acb46d434'),
('89edabc2-a484-4659-bcec-a07d3c224dc9', '400.00', '100.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('8af65f7a-bf4c-45c3-b18a-6c5cdd00297c', '600.00', '0.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('9128cbce-18e2-4f82-9116-899b32d50b44', '600.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('91f78434-ade3-4510-9371-65bb3f52c2db', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('92244f33-47fe-408e-a76c-52257cb06660', '900.00', '300.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('92d16a0c-6615-4210-9788-47bfd7b1e379', '900.00', '300.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('94d83437-538a-41aa-90ff-31a3aa95e4a0', '1100.00', '1350.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('953b0a34-1862-4645-a1e5-921a63d75626', '1500.00', '2025.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('95903bf0-fb98-45d5-93e8-8de86cdf987f', '300.00', '80.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('9618dc5a-7ea9-4ecb-89a9-f96a7f54cc2d', '500.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('97d46fee-88b2-4ec3-a3c6-b6df1c467a65', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('97d8746b-e296-4efe-ba54-64e1aa3d489f', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('9889c6c9-2931-417b-86c8-c02ec619db1a', '400.00', '0.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:03', '2018-06-28 15:48:03', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('990ec94c-54eb-4914-910f-b3d3c7e72c9e', '900.00', '1500.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('9a9d968c-a75d-47be-a825-9ebd63d03c6f', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('9db3a04e-e158-48e0-b4bb-9843c5024dc2', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('9f7cd0a2-0138-410f-b8e6-49df3c522bb9', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('9fd686ee-6b62-40ab-81e2-40e3b312bb4b', '900.00', '700.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('a062ff8b-1b6e-49c1-a5a2-ee8b2c30ef71', '1100.00', '500.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('a125ea35-a3ba-4c40-b1d6-3799033d7188', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('a3fd4edd-7004-44e0-8113-da1174a6c44a', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('a4fcc628-f5d1-45dc-a2f9-ffcdb95710d7', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('a63d2540-5c40-4422-aded-19e334925415', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('acc26919-a62d-43ad-85dd-fa67947c6716', '2200.00', '1000.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('acd79e77-2d04-44bb-937c-c4b27585e962', '500.00', '150.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:10', '2018-06-28 16:29:10', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('ad0d7ec3-fd05-4232-8a9e-43189a138b3a', '1000.00', '0.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', '28787316-48cb-4130-9731-a08acb46d434'),
('b00df4b4-fdaf-4a36-9c3a-83058014f51e', '1100.00', '500.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('b0384bd0-4b38-4edb-90a7-8c3317548776', '500.00', '150.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('b1365512-457d-4452-9f53-8f4fbbfbd4bc', '500.00', '150.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('b16a5574-847f-4ac6-a4e8-43b6412002dd', '600.00', '200.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:03', '2018-07-01 16:18:03', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('b18fdc76-7e5a-40a1-b79c-da84366f7f73', '1500.00', '2000.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('b1bfd7bc-1c29-4d16-8e97-c85b898abcf4', '300.00', '80.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('b2396300-5b94-4e69-9a16-0b80961bb1f2', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('b259a877-479f-49cc-aacf-6de416b6ef7f', '1100.00', '1500.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('b4746b3f-570b-4e84-86c8-37a27591e9d2', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('b498956b-d7ba-43b4-89cf-be5199b329db', '1000.00', '450.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', '28787316-48cb-4130-9731-a08acb46d434'),
('b526051e-dc98-42a8-967b-366996bc3180', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('b62bdf22-4fa6-4711-b298-ee6ccf329f88', '1500.00', '800.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('b679366c-14c5-4d3c-9008-4321faec0a1a', '1500.00', '800.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('b6b17126-7637-4322-8cb7-0fd320cdfbc6', '300.00', '0.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('b6f84d20-c7c3-46c3-abef-54f095e2e676', '900.00', '700.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('b7ef84c4-6ed7-43c9-8f95-1f64dbd0b82d', '500.00', '150.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('ba2bd822-c82b-4dac-a563-dfb3f0ec6aea', '1000.00', '450.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '28787316-48cb-4130-9731-a08acb46d434'),
('bd0d45ff-5d01-4822-80cd-2f9ea3ba2cc6', '1000.00', '0.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', '28787316-48cb-4130-9731-a08acb46d434'),
('bdac599b-dcc1-4800-b25a-ba6c1a6f82ba', '900.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('bef1bd6c-4a33-4f49-9ba0-4fac941b5762', '400.00', '100.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('bfafce45-aafb-403d-a027-3da2784249ef', '300.00', '0.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:04', '2018-06-28 15:48:04', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('bfb84f10-19a3-47c2-89e4-810a6785bbe5', '900.00', '0.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('c01d7367-6c33-4eb0-85d2-a33b6c23441b', '1500.00', '500.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('c0587f6b-a01e-4ff7-8629-05575eacc1ab', '1500.00', '2025.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c0e1ff7a-2f1a-42da-b13d-e2eebc15ef8e', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:46:59', '2018-06-22 12:46:59', '28787316-48cb-4130-9731-a08acb46d434'),
('c0ecde5f-f1be-407d-b1b7-517fb88b4358', '400.00', '100.00', 'de1a71c8-d327-412b-afde-78ddb746090f', '2018-06-28 16:30:58', '2018-06-28 16:30:58', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('c136c111-1962-4813-8bc2-63c15f78c76b', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('c19f9b06-44a7-4e7b-951b-ee90f56b00ef', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c2d8e708-930e-4549-85d0-5ab322f9222a', '1100.00', '1350.00', '2557dfc9-568d-4f74-879c-07ba64d5a2e7', '2018-06-28 16:34:51', '2018-06-28 16:34:51', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('c604b9be-427c-43cf-92a5-038ed81fcd9a', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('c8859616-0849-4469-8bc5-c42b5d171208', '1500.00', '2025.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c8eb098a-ce01-42dc-9b30-c90238ab0950', '900.00', '300.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('ca9b291f-64ea-4554-ae2c-f77da1ab9188', '900.00', '300.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('caf974c6-c1b1-4edf-a2c4-aacbf65c1288', '500.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('cb7cd14f-8dcd-4238-ac35-f273793351c3', '900.00', '300.00', '710e2222-fb7f-4938-a1d0-f8034e38c5d9', '2018-06-28 16:12:11', '2018-06-28 16:12:11', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('cc3ce90c-b96b-47cf-a2cd-4f19ae9aaf9c', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('cc6fca36-ccb5-434b-91c4-e6db98db59db', '400.00', '100.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('ceb4cc65-ad1c-4dfa-8a35-87b04f946424', '600.00', '200.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('cf92801d-125f-43b1-a3c5-3e40bb0558fc', '0.00', '0.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('cf94daae-e86b-44aa-9138-3da737038b93', '600.00', '0.00', 'fd5bc82e-2092-4eac-bc35-56736598b4ae', '2018-06-28 16:03:45', '2018-06-28 16:03:45', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('cfea366c-bad0-46d3-8f04-ed4ce479ec1b', '900.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('d1245939-de7b-41fb-8528-80223ec7496d', '1000.00', '450.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '28787316-48cb-4130-9731-a08acb46d434'),
('d1d6c5a2-9b58-41c1-8188-a402dfc4bea1', '1500.00', '1500.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('d2c3fff9-4175-4c8b-b083-f7ae951dd149', '600.00', '200.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('d2df75b0-7b3c-47a6-a20b-532f17a7eccd', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('d3a1e2a1-c186-4409-9517-2fc3d063ad39', '600.00', '0.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:03', '2018-06-28 15:48:03', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('d50cd63a-6b95-4c8b-ac91-df8d5948825e', '0.00', '0.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('d6dc767c-fc3a-4b5a-8da8-58e49aab6295', '600.00', '0.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('d737dcf1-56e8-4a49-8cf4-f6e9081c7ba0', '500.00', '0.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('d80a05f2-b257-454c-b102-4ca9a464bdc6', '1000.00', '0.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:04', '2018-06-28 15:48:04', '28787316-48cb-4130-9731-a08acb46d434'),
('d82ed9c0-fc7b-43e9-aa75-cbcc47d4af1c', '500.00', '150.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('d85bd157-4638-43fc-9bed-9681af4b3927', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('d94ae8cc-50d5-4ef5-b61c-2a55c7598832', '500.00', '0.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('dae4b28c-0b62-41a3-9bfd-afe3d6a1b7a0', '1000.00', '450.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', '28787316-48cb-4130-9731-a08acb46d434'),
('db2e2478-d713-4d0f-b2b4-60f6307e9c14', '1100.00', '1350.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('dd7386bf-bff7-43e3-aebc-7809ad36b220', '1500.00', '2025.00', 'c6019dc8-5cf7-4cf7-8d1e-4c983439578e', '2018-06-27 16:49:49', '2018-06-27 16:49:49', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('ddd1b6f6-4d7e-40a7-853b-f598ad5bbfbb', '0.00', '0.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('dee517a7-ca92-4c15-8a60-365a41a40eb2', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('df0bfdb4-ffb1-4166-bb5a-21c4524230cc', '900.00', '300.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:03', '2018-07-01 16:18:03', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('df4c53ea-8c84-4d31-b20d-748865254d93', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('df88aa3f-3086-41f9-8207-bd3e43d2ca61', '1000.00', '450.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '28787316-48cb-4130-9731-a08acb46d434'),
('e02398d6-75b3-4c4d-8910-11ab638874e2', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('e09ee673-72a0-4ea5-829b-402fbd35db6c', '400.00', '100.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('e17f6a02-5c0f-4b0a-8e39-08397b93d34b', '600.00', '200.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('e2d84225-1a39-4099-beb9-5b95a4a85acd', '300.00', '0.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('e4bd5403-f917-44e3-8cee-f1c2236b26e3', '1000.00', '450.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:09', '2018-06-28 16:29:09', '28787316-48cb-4130-9731-a08acb46d434'),
('e4f8e63b-8e51-460c-b24f-443879e11e6d', '600.00', '200.00', 'f49a0b97-16b8-4c01-a4c3-6cd3a49b6488', '2018-07-01 16:19:11', '2018-07-01 16:19:11', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('e557e8f8-0309-4ce6-90d6-dc8c192a1dc8', '0.00', '0.00', '71e44a73-3f06-456c-849e-b42e63f1c0ff', '2018-06-27 16:51:01', '2018-06-27 16:51:01', '28787316-48cb-4130-9731-a08acb46d434'),
('e7258171-b3ed-43e2-b377-17b9d9eebd8e', '400.00', '0.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('e867b68f-bc60-4f42-8e3d-499c5b4dc51e', '1100.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('e868ce2b-bc71-4c52-99b9-b829187fbcdc', '0.00', '0.00', '33b11294-521e-487f-88ba-83ff2391bdd8', '2018-07-01 16:18:04', '2018-07-01 16:18:04', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('e9e78b75-d50b-4335-9bfd-ddfcc0cb10fb', '1500.00', '2025.00', 'c17d4923-ee8f-4986-89c2-1482ee059d8a', '2018-06-28 15:48:04', '2018-06-28 15:48:04', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('ec8fcaad-0081-4c2e-a45b-808074cd4939', '400.00', '0.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('ecb74b11-c37c-44f3-af9e-96f4d4031ad4', '300.00', '80.00', '388cb015-12fb-4141-a3f8-d6c7887864da', '2018-06-28 16:35:29', '2018-06-28 16:35:29', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('eceb818d-070b-49de-a51a-086385e1c8ba', '400.00', '100.00', '7d530fa7-cc6a-4824-95bd-6a2dce46616e', '2018-06-28 16:32:31', '2018-06-28 16:32:31', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('ed24c077-83f2-48c1-88f5-daac7d03a53f', '0.00', '0.00', '1aa17f03-0fba-4fb8-8f3a-cf5f0cfd2633', '2018-07-01 16:37:49', '2018-07-01 16:37:49', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('edd12ddc-c2cd-412c-8f52-95330962d087', '1100.00', '500.00', '7f166500-889e-45dd-a491-952101a7f8ba', '2018-07-01 16:40:11', '2018-07-01 16:40:11', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('ef41cbb9-23b1-4707-a6f4-22df6ba5a854', '0.00', '0.00', '89dba3f3-5f7f-4db0-9723-3d8f38b6eaa3', '2018-07-01 16:19:52', '2018-07-01 16:19:52', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('f09c72ea-d44d-4222-975e-58be224e122c', '0.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('f2450068-d8ed-4e3f-8318-333afaa2dad3', '300.00', '80.00', '7b165764-64ef-4777-ace3-4162dc9c7871', '2018-06-28 16:30:06', '2018-06-28 16:30:06', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('f2ec3637-78f3-47d9-922b-8965cda56faf', '500.00', '0.00', '0ad4da64-7282-4704-9ced-b409121b64ef', '2018-06-28 16:02:18', '2018-06-28 16:02:18', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('f32c713b-e396-4efa-ac33-069ec9a37641', '1500.00', '800.00', 'dd58aa99-4f35-4a49-bbb1-4e67e0c9c0e9', '2018-06-28 16:29:10', '2018-06-28 16:29:10', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('f39edc93-2740-4b27-a3c6-c2a698fceeaf', '500.00', '150.00', 'e677f806-86d1-4997-90f1-4e4b185a3a2a', '2018-06-28 16:34:03', '2018-06-28 16:34:03', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('f65ba8e9-6242-4852-a9b6-6b94b6e72aed', '1100.00', '1350.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('f6c17d29-e063-43e0-b45c-1557ecb30c1f', '0.00', '0.00', '5cdd5103-0f48-4a4f-8a88-44569e8f6fdd', '2018-07-01 16:18:55', '2018-07-01 16:18:55', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('f6f1357a-f30b-4005-9c46-1ee7a25864cc', '500.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('fa0fd213-089c-4fa4-9ebf-0d409d6736a0', '300.00', '80.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('fa591f4a-0806-4edd-83e0-efc83618451e', '400.00', '0.00', 'b923644b-f587-4500-b437-9c32dd5f7bd8', '2018-06-28 16:02:35', '2018-06-28 16:02:35', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('fbe2439b-4c7b-4a1e-8564-eef582c13c96', '0.00', '0.00', '651eaef2-a566-4ee8-9ba4-fed69b624955', '2018-06-27 16:44:51', '2018-06-27 16:44:51', '28787316-48cb-4130-9731-a08acb46d434'),
('fce81791-e4b7-4931-8c1e-ccb9391a8c94', '500.00', '150.00', '774fb17a-1294-4822-93b0-72e08e1f5cf8', '2018-06-28 16:33:25', '2018-06-28 16:33:25', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('fd3fc8e9-557b-4fac-8984-f8d39d22793d', '1500.00', '2025.00', '538ce9b2-8cea-4497-8c67-2a8864673b82', '2018-06-28 16:05:26', '2018-06-28 16:05:26', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('fedae60f-07d8-4501-8474-ac334818b1eb', '1100.00', '2000.00', 'bfabbc43-be8c-41a8-b829-cd0c24a0fde3', '2018-06-28 16:04:57', '2018-06-28 16:04:57', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` char(36) NOT NULL,
  `name` varchar(45) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` char(36) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `product_category_id` char(36) NOT NULL,
  `image_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `name`, `isactive`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `product_category_id`, `image_id`) VALUES
('0006d631-af62-4586-9f53-d6c3147e0ebb', 'ซีตองตันคั่นต่างๆ', 'Y', '', '2018-05-22 16:58:49', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:49', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('00144c4e-4757-4658-90b8-108d830de764', 'ผ่าหวายคั่นมะรุม', 'Y', '', '2018-03-24 07:35:25', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:35:25', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('036eee5c-1460-4b38-8de0-9fa79bc02fec', 'หัวใจ', 'Y', '', '2018-05-22 17:38:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:38:23', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('03b9e82f-9a43-4e69-a4c5-4925adf24a92', 'แบบห่วงต่างๆ', 'Y', '', '2018-05-22 16:36:04', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:36:04', NULL, 'e3deaaa6-bff6-492a-aa07-08022aff5803', ''),
('06fbfcef-e9e7-4209-b97b-a66e6b807b73', 'มาเลย์', 'Y', 'ห่วงตัดลวดลาย', '2018-05-22 16:21:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:23:35', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('07291999-e61e-4d98-96a4-55e4e92c42e2', 'แฟชั่นต่างๆ', 'Y', '', '2018-05-22 17:40:01', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:40:01', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('07520561-c3cd-44b9-8eb5-c83c55db06f1', 'ฉลุ', 'Y', '', '2018-03-24 07:15:21', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:15:21', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('0780a129-4b37-459d-858b-4fa14dcf7544', 'ซีตอง ', 'Y', '', '2018-04-21 11:19:06', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:06', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('089641c7-7923-4bf4-951c-a663c697c387', 'เกลี้ยงโปร่ง', 'Y', '', '2018-05-22 14:47:26', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:47:26', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('08a300b7-37fa-42f4-8a13-8fc13afde84c', 'ทาโร่คู่', 'Y', '', '2018-05-22 16:54:32', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:54:32', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('0d4eb9b3-ac9c-460d-bf1e-f0c1fa2b7d4b', 'พิกุลต่างๆ', 'Y', '', '2018-04-21 11:19:24', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:24', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('0ec5932a-d856-4170-b674-fe6b2b96619f', 'แฟชั่นต่างๆ', 'Y', '', '2018-05-22 15:37:11', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:37:11', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498', ''),
('0ffd60b3-4b98-4ff2-aabd-cde75576acfa', 'ห่วงมีเกลียว', 'Y', '', '2018-05-22 15:36:55', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:36:55', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498', ''),
('1066dff9-9418-4636-a9a9-356f095bbbcd', 'ผ่าหวายสลับโอ่งทั้งเส้น', 'Y', '', '2018-05-22 16:53:56', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:53:56', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('10714ae4-065c-476f-a157-4e54c5488f88', 'ผ่าหวายคั่นมะรุม ', 'Y', '', '2018-04-21 11:18:29', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:29', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('10eceb92-b963-4c1f-9ba8-1d137e92fc0c', 'ซีโอตัน', 'Y', '', '2018-05-23 04:44:25', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:44:25', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('121cebb2-b54f-4844-9ade-96b6e2c7dac0', 'ลายปั๊มต่างๆ', 'Y', '', '2018-03-24 07:33:51', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:51', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('1234977e-3a2a-43bc-9d16-911918d91f86', 'สี่เสาตัน', 'Y', '', '2018-05-22 16:57:48', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:57:48', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('14777883-897e-460b-abad-a846098c044d', 'สี่แผ่นดิน ', 'Y', '', '2018-04-21 11:18:08', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:08', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('15843a41-a424-46e2-a7d0-86ae6f252539', 'เอสเคิร์ป', 'Y', '', '2018-05-23 04:45:26', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:45:26', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('170a8f79-35be-4178-8261-cd556f83d1d6', 'โซ่ตัน', 'Y', '', '2018-05-22 14:54:39', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:54:39', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('195314a6-0afc-40f0-9728-522701ac2d4c', 'ห่วงท้องปลิง', 'Y', 'ห่วงกลมท้องปลิง', '2018-05-22 16:23:09', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:23:09', NULL, '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('1c10a7b0-1b5d-4cce-b3e2-3dba356a7e21', 'ปล้องต่างๆ ', 'Y', '', '2018-04-21 11:19:02', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:02', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('1d6c4779-04b0-4e7b-a19d-4664e45ab5ca', 'หลวงปู่ทวด', 'Y', '', '2018-05-22 17:41:35', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:41:35', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('1f0ee223-2ea1-4968-a909-a80735570aa3', ' ซีตองคั่นต่างๆ ', 'Y', '', '2018-04-21 11:19:12', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:12', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('203eb98e-2214-48b3-bfb1-bd0a7d259c71', 'โซ่ตัน', 'Y', '', '2018-05-23 04:41:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:41:44', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('2513c47d-8b43-45f2-85bf-8603f2f32ebb', 'สี่เสาลงยาต่างๆ', 'Y', '', '2018-05-22 17:05:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:05:44', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('25d22cc4-f340-49ee-9c35-58da708af378', 'บิดนูนตัน', 'Y', '', '2018-05-22 16:48:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:48:23', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('288ce0ef-3e68-4422-b667-5f39409a381a', 'ดอกไม้', 'Y', '', '2018-05-22 15:33:22', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:33:22', NULL, '304f6acd-69b7-45df-8028-f5b212ef9560', ''),
('28b36f93-b0b5-4a98-b18f-97aae94250a4', 'ผ่าหวายคั่นมะรุม', 'Y', '', '2018-05-22 16:54:10', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:54:10', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('2a44ec44-44b9-44ab-b26a-ce5eb5e4b2bf', 'ฝักแค', 'Y', '', '2018-03-24 07:34:40', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:34:40', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('2a53e068-a3d1-4efc-985e-0516ed70a86a', 'ไพลินมูน ', 'Y', '', '2018-04-21 11:20:17', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:20:17', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('2ae748ac-5501-48ee-8c83-39a2b72183d2', 'ผ่าหวายคั่นโอ่ง ', 'Y', '', '2018-04-21 11:18:17', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:17', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('2d42fb98-548b-4c1e-adcf-688a46d45b5f', 'เลทมังกร', 'Y', '', '2018-04-21 09:18:52', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:18:52', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('2eca1697-d936-4169-a1c1-59a4f71ff74a', 'ร.9 สามมิติ', 'Y', '', '2018-05-22 17:38:17', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:38:17', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('2f71ab01-01b6-484d-a17f-c0767779b93e', 'หลวงพ่อคูณ', 'Y', '', '2018-05-22 17:41:01', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:41:01', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('2fb6abb6-fee3-4be5-9c0f-d04cd28cbd77', 'โซ่เรือ', 'Y', '', '2018-05-22 16:52:55', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:52:55', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('349aa4ad-0e3a-4419-bb18-bc12ecc42f23', 'สะเก็ดดาวต่างๆ', 'Y', '', '2018-03-24 07:33:59', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:59', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('35575eda-33d0-4a2d-abd2-45eeb5223614', 'ผ่าหวายโปร่ง ', 'Y', '', '2018-04-21 11:18:34', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:34', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('357016f0-4c62-452b-b49c-41bb5fdbcea5', 'หลวงปู่ผาด', 'Y', '', '2018-05-22 17:41:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:41:23', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('3607ab36-fac2-4f9e-8126-cb9fc3bfc583', 'มูนทวิน สีต่างๆ', 'Y', '', '2018-05-22 17:00:40', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:00:40', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('36e70db2-fd07-4199-ac80-35b907ca69fc', 'ห่วงขาสปริงห้อยต่างๆ', 'Y', '', '2018-05-22 16:28:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:31:07', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('3856778a-1a66-4ffb-a3a1-913f8a03803f', 'พระพิฆเนศ', 'Y', '', '2018-05-22 17:41:15', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:41:15', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('38e143bb-076c-481a-a455-93374e99a1f4', 'หยาดมูนสีต่างๆ', 'Y', '', '2018-05-22 17:00:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:00:31', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('39ce5e2a-16d5-4831-9e6d-87fa3553ba54', 'เบ๊นคั่นโอ่งต่างๆ', 'Y', '', '2018-05-22 16:44:48', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:44:48', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('3be4ba35-6229-4c44-828a-fee7c464d1ce', 'โปร่งแต้', 'Y', '', '2018-03-24 07:14:49', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:14:49', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('3d7f2a00-235d-46a6-82e6-0524e5cbec4d', 'โซ่โปร่งตัดลาย', 'Y', '', '2018-05-22 16:52:02', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:52:02', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('3dd3a82d-076f-4287-83e3-bd432804e313', 'กางเขน', 'Y', '', '2018-05-22 17:39:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:39:05', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('3decc406-7f30-4a17-bcba-805813abb9d6', 'ทาโร่', 'Y', '', '2018-05-22 16:54:22', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:54:22', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('3e5dd4e5-60c8-4587-a771-1e3dd728329b', 'ผ่าหวายทรงเครื่อง ', 'Y', '', '2018-04-21 11:18:25', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:25', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('4077d44e-14d5-4fdc-9fac-e62aaa7b0bb5', ' มูนทวิน', 'Y', '', '2018-04-21 11:20:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:20:23', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('42527587-5a2f-4a3a-b471-9ad5efea77e0', 'ทาโร่ยกขอบ', 'Y', '', '2018-04-21 09:17:48', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:17:48', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('447991d0-813f-4f0a-9ffa-bc12db339521', 'ฝักแค ', 'Y', '', '2018-04-21 11:18:00', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:00', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('476300c5-24f2-42ee-8c50-b1704610fb0e', 'พระสมเด็จ', 'Y', '', '2018-05-22 15:29:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:29:38', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('48be0e9e-1242-41a1-9fa2-af076dd3548f', 'เบ๊น', 'Y', '', '2018-05-22 16:44:39', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:44:39', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('4930bfdd-a532-4b41-b801-d434964dc030', 'ดอกเก๊กฮวยขางอ', 'Y', '', '2018-05-22 15:55:57', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:55:57', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498', ''),
('49622656-4962-47dd-988f-2238795dfb87', 'กระดูกงู', 'Y', '', '2018-03-24 07:35:39', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:35:39', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('4a7ec3bb-55a3-428e-bc4c-d85df02f895d', 'บิดตาม้า', 'Y', '', '2018-05-22 16:55:04', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:04', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('4b8ea046-9081-4b3f-be34-d7780af85967', 'โซ่โปร่งเงา', 'Y', '', '2018-05-22 16:52:09', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:52:09', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('4cc2823a-a6ee-4415-bc7a-5d8272d4f523', 'ลูกแพร ', 'Y', '', '2018-04-21 11:20:31', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:20:31', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('4fc9a739-afaf-4094-bb1f-4c59f030cf3a', 'ผ่าหวายรี', 'Y', '', '2018-05-22 16:46:22', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:46:22', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('51025c78-7861-4470-b7ee-da5e4296c07f', ' บิดนูนตัน ', 'Y', '', '2018-04-21 11:20:09', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:20:09', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('5281f375-181a-4db7-b27d-b13483e2b733', 'ปล้องเหลี่ยมตัดลาย', 'Y', '', '2018-05-22 16:56:47', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:56:47', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('54340fdb-aa88-42ac-8c84-a70d331a9778', 'ทาโร่ยกขอบ', 'Y', '', '2018-03-24 07:33:22', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:22', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('552dc4ca-8968-42d5-b4a0-8fea03edfbd6', 'ทาโร่สลับต่างๆ', 'Y', '', '2018-03-24 07:33:32', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:32', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('56a3ceef-5f58-47fb-a166-b079f5d30a86', 'ปล้องกลมเกลี้ยง', 'Y', '', '2018-05-22 16:56:33', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:56:33', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('56f99951-2370-4ca6-aa12-19e51aebe8da', 'บิดนูนโปร่ง', 'Y', '', '2018-05-22 16:55:21', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:21', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('57258256-f60c-49cc-a59d-e89a4fc9702b', 'หกเสาโปร่ง สรวิศ', 'Y', '', '2018-05-22 16:58:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:23', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('593cad6d-ed45-4509-8fc8-c3bc05275fe5', 'ผ่าหวายสลับปล้องต่างๆ', 'Y', '', '2018-05-22 16:54:17', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:54:17', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('59b08bd4-39a5-4fb2-bde6-d8cc21c55327', 'ห่วงไม่มีเกลียว', 'Y', '', '2018-05-22 15:36:37', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:36:37', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498', ''),
('5d6a92cb-cbbb-41af-9ae8-bdb3fd6351fb', 'โซ่เครื่อง', 'Y', '', '2018-05-22 16:51:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:51:52', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('5dc7d22f-84ce-4914-a1ca-eef3e8a49899', 'หยาดมูน ', 'Y', '', '2018-04-21 11:20:27', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:20:27', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('5e60f648-87d8-479c-b3fd-38b5054806ba', 'ร.5', 'Y', '', '2018-05-22 17:37:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:37:46', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('5e8435de-e776-49f8-908e-2f018143cbb4', 'ผ่าหวายโปร่ง', 'Y', '', '2018-03-24 07:35:32', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:35:32', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('5eba6ab4-d7e9-4a29-9f8d-1d6937b05edd', 'หลวงปู่ทวด', 'Y', '', '2018-05-22 15:28:11', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:11', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('5f306074-5de7-4a5f-94df-e275a4d64255', 'โซ่เรือ ', 'Y', '', '2018-04-21 11:18:21', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:21', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('5f6f941a-37e3-4c95-a7c2-4889c8478355', 'มีนาต่างๆ', 'Y', '', '2018-05-22 16:45:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:45:38', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('5feee68b-f30a-4fa7-949a-7323580dc323', 'ซีตองโปร่ง', 'Y', '', '2018-05-22 16:58:39', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:39', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('612fcfd7-609f-47fc-b1fb-3d002372c70e', 'ประทับใจ', 'Y', '', '2018-04-21 11:17:45', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:17:45', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('614532fd-55a6-4af6-acf3-be16f9c2b29a', 'สี่เสาต่างๆ', 'Y', '', '2018-04-21 09:21:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:21:23', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('622f0265-21a8-4b81-a66c-6e84c18d2479', 'ดอกเก๊กฮวยขาตรง', 'Y', '', '2018-05-22 15:36:24', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:55:42', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '27b3beef-e513-4aa7-93fb-c6caba080498', ''),
('63402b4e-3b8d-4d99-950f-940ea1f40a89', 'ฟ็อกเทล', 'Y', '', '2018-05-23 04:43:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:43:44', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('65bbf468-2322-47cb-91ba-51e9bc4fda66', 'เบ๊นตัน', 'Y', '', '2018-05-22 16:57:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:57:23', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('672a06d4-c50e-4c37-96fd-df359464ac88', 'ดิสโก้', 'Y', '', '2018-05-23 04:43:35', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:43:35', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('67550db1-8a26-4780-bea9-41d8b237263c', 'ไพลินสองสี', 'Y', '', '2018-05-23 04:42:40', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:42:40', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('677edc39-45b6-4e23-9788-8add55492523', 'เบ๊น', 'Y', '', '2018-05-23 04:42:00', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:42:00', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('6883c818-f665-4fc6-8ab7-faa0da8e6e44', 'ผ่าหวายตัน', 'Y', '', '2018-05-22 16:53:06', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:53:06', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('6b37194b-5ec3-458b-b5d3-a3e74a8dfd2d', 'ร.5', 'Y', '', '2018-05-22 15:30:13', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:30:13', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('6b6ee271-0a19-489c-87c7-46f60ef67545', 'บิดนูนตัน', 'Y', '', '2018-05-22 16:55:13', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:13', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('6d888c81-1b6e-4b85-8a62-2cfc0d399304', 'สี่เสาโปร่ง', 'Y', '', '2018-05-22 16:57:59', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:57:59', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('6fd9433b-3572-497e-8ff1-88c0734958ab', 'ผ่าหวายโปร่ง', 'Y', '', '2018-05-22 16:53:17', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:53:17', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('718200d7-1d11-4fee-be6b-2d0cf2d28b41', ' ไดอาน่า ', 'Y', '', '2018-04-21 11:19:20', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:20', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('76abe0b4-51e3-484e-990b-75757de6a446', 'ปล้องกลมตัดลาย', 'Y', '', '2018-05-22 16:56:41', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:56:41', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('76b55690-d364-4fd7-963b-800eab62914b', 'กึ่งกำไล', 'Y', '', '2018-04-21 09:20:39', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:20:39', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('78cf003f-e6c4-4940-9cc7-66ed906c44bf', 'ปล้องกลม', 'Y', '', '2018-05-22 16:46:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:46:54', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('798500b2-dd48-4525-9ac0-9df9a343bce5', 'เบ๊นโปร่งคั่นต่างๆ', 'Y', '', '2018-05-22 16:57:41', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:57:41', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('7af76b6d-e708-44aa-87f5-203dacfedb83', 'กึ่งกำไล', 'Y', '', '2018-03-24 07:34:10', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:34:10', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('7c663cd8-e8aa-423f-8230-50938c2fc6a0', 'ห่วงคู่', 'Y', '', '2018-05-23 04:41:49', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:41:49', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('7f11611e-5832-486e-8fc9-e60c3bc525d3', 'เบ๊นโปร่ง', 'Y', '', '2018-05-22 16:57:29', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:57:29', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('80c7045a-9929-42f9-8cd1-e9876679ec98', 'หกเสาตัน', 'Y', '', '2018-05-22 16:58:13', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:13', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('80fab1da-4b40-4eb4-ad8e-4363aa4b33ff', 'ร.9', 'Y', '', '2018-05-22 17:38:07', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:38:07', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('83ef739b-429c-411b-9309-68afb3492ef3', 'เต๋าไป๋', 'Y', '', '2018-03-24 07:14:42', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:14:42', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('871d625e-eb5a-4d47-9a85-0a04896f4397', 'คตกิตทรงเครื่อง', 'Y', '', '2018-05-22 16:52:18', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:52:18', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('87f8515e-c167-478f-8e36-e542ec9c9f1e', 'ห่วงกลมห้อยต่างๆ', 'Y', 'ห่วงห้อยชาแนล กุชชี่ฯลฯ', '2018-05-22 16:26:30', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:26:30', NULL, '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('8992a9bd-710f-4017-88a8-4ab07fa4de92', 'แบบเสียบแฟชั่น', 'Y', 'เม็ดกลม หัวใจ ดาว โลมา ฯลฯ', '2018-05-22 16:33:03', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:34:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('8e2312f7-6c46-4908-9f9c-ee9edec6ccd0', 'ห่วงคู่โปร่งกลาง', 'Y', '', '2018-05-22 16:55:50', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:50', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('94934114-3d1a-46ec-8506-221ef6ff0141', 'กระดูกงูคั่นต่างๆ', 'Y', '', '2018-05-22 16:45:02', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:45:02', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('951037bf-c0a0-4bba-b67e-59c6bb1fa57e', 'ปล้องดราก้อนต่างๆ', 'Y', '', '2018-05-22 16:47:12', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:47:12', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('95816366-e5a4-42a5-a12c-70c603770a54', 'ตัดเหลี่ยมเงา', 'Y', '', '2018-05-22 15:33:29', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:33:29', NULL, '304f6acd-69b7-45df-8028-f5b212ef9560', ''),
('95cf4874-6af5-4e0f-9a6d-5285f5de76a4', 'มูนทวิน', 'Y', '', '2018-05-22 17:00:18', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:00:18', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('96063892-ac6e-4306-97e7-0edb210f476b', 'คตกิตทรงเครื่อง', 'Y', '', '2018-03-24 07:33:01', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:01', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('9680c78b-f3de-4af0-94d8-4b0f0cf39205', 'ไพลินหยาดมูน', 'Y', '', '2018-05-22 17:00:12', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:00:12', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('9699da11-fcb2-4194-a2dc-b08d847c2a90', 'ห่วงคู่โปร่ง', 'Y', '', '2018-05-22 16:55:42', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:42', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('975735f8-687b-4bc8-bb02-5cd84196c348', 'ทาโร่คู่', 'Y', '', '2018-03-24 07:33:13', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:13', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('982f291f-672a-4401-a4ed-2f2200ba5e1b', 'ทาโร่', 'Y', '', '2018-04-21 09:17:26', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:17:26', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('990dac14-09e2-4226-95be-846be118a4ac', 'ปล้องดราก้อน', 'Y', '', '2018-05-22 16:56:59', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:56:59', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('9975b94c-a116-43c0-a1b7-751995b60026', 'ซีโอโปร่ง', 'Y', '', '2018-05-23 04:44:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:44:31', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('99dc6806-7b1f-4135-8699-a2245ee17ffa', 'พระพุทธชินราช', 'Y', '', '2018-05-22 15:28:28', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:28', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('9a958c40-c01a-4509-9951-5faff09c4801', 'ลายปั๊มต่างๆ', 'Y', '', '2018-04-21 09:19:00', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:19:00', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('9afe42bb-8eb2-4738-b329-cb0c058de39b', 'ถุงทอง', 'Y', '', '2018-05-22 17:38:29', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:38:29', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('9b8ba65f-ff11-41ea-bd55-17e20e6ab9f6', 'พระประจำวันเกิด', 'Y', '', '2018-05-22 15:28:43', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:43', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('9c0a91ae-1c46-48bc-ac84-4b7b06470d98', 'แหวนตรา', 'Y', '', '2018-05-22 14:48:01', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:48:01', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('9f41b07f-96f7-4c13-a14c-2f866e6d8733', 'พระแก้วมรกต', 'Y', '', '2018-05-22 15:28:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:54', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('a072080a-53d6-41b0-b02b-42984147202c', 'ห่วงคู่ตัน', 'Y', '', '2018-05-22 16:55:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:31', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('a1d2cc78-4d17-4d4b-9ea4-cf77cef95972', ' เบ๊น ', 'Y', '', '2018-04-21 11:18:46', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:46', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('a371fd11-cc7a-4c05-ac8e-658846f50aeb', 'พระประจำวันเกิด', 'Y', '', '2018-05-22 17:40:36', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:40:36', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('a3a8608a-c3f9-478d-95b3-1dd65fe2bfbf', 'กิ๊ฟ', 'Y', '', '2018-03-24 07:15:12', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:15:12', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('a3dec987-ad65-4def-9273-134739044785', 'ท้าวเวศสุวรรณ', 'Y', '', '2018-05-22 15:31:58', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:31:58', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('a417acee-d794-404a-a058-14046eb962ce', 'คตกิตทรงเครื่อง', 'Y', '', '2018-04-21 09:17:06', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:17:06', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('a4fdc1b5-7f3c-4a6d-88b0-bd9048a15064', 'หกเสาต่างๆ ', 'Y', '', '2018-04-21 11:18:55', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:55', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('a746da73-ff05-4d27-ad50-cc17fede1880', 'แบบเสียบต่างๆ', 'Y', '', '2018-05-22 16:35:57', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:35:57', NULL, 'e3deaaa6-bff6-492a-aa07-08022aff5803', ''),
('ac76bb64-d2e0-4720-b004-5a2a38b22296', 'สี่แผ่นดิน', 'Y', '', '2018-03-24 07:34:47', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:34:47', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('ad3bf604-4684-4832-901c-8535c74cc659', 'ดาวเดือน', 'Y', '', '2018-05-22 17:38:41', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:38:41', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('b022afbb-3827-48e1-a840-a596a8cc0b72', 'ไพลินมูนตัดลาย ตัดเหลี่ยม', 'Y', '', '2018-05-22 17:00:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:01:17', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('b0522643-92cd-4eb9-a90b-c91e663d1234', 'ซีตองตัน', 'Y', '', '2018-05-22 16:58:34', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:34', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('b063b490-c217-4d1e-9e58-7b759d298c5b', 'สะเก็ดดาวคั่นต่างๆ', 'Y', '', '2018-05-22 16:59:12', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:59:12', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('b8a572ca-6a2d-44ed-b636-59b69ae8c48a', 'ผ่าหวายคั่นโอ่งต่างๆ', 'Y', '', '2018-05-22 16:53:32', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:53:32', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('b92a1956-d6d9-458c-b293-090268cfdb98', 'บิดนูนโปร่ง', 'Y', '', '2018-05-22 16:48:29', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:48:29', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('b9953288-d145-46b0-a61f-d1fb035c5e80', 'ทูโร่ ทรีโร่', 'Y', '', '2018-05-22 16:56:08', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:56:08', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('bb2089f6-fd1e-4cc2-ae85-b14e2ba8c794', 'ซีตองโปร่งคั่นต่างๆ', 'Y', '', '2018-05-22 16:58:59', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:59', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('bd8533c1-c73f-4b3a-8264-81cd06bff615', 'สะเก็ดดาวต่างๆ ', 'Y', '', '2018-04-21 09:19:17', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:19:17', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('c02b5ad1-eadc-40db-8310-4d306aefd3f2', 'สะเก็ดดาว', 'Y', '', '2018-05-22 16:59:03', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:59:03', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('c0766917-c874-4965-82e4-6afd3c4662f3', 'นักกษัตริย์ต่างๆ', 'Y', '', '2018-05-22 17:37:34', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:37:34', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('c2a1e7b2-2c35-46b6-aa80-b4e1e2a823eb', 'แปดเหลี่ยม ', 'Y', '', '2018-04-21 11:19:16', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:16', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('c33015c7-eb5d-401e-ad5c-1e56178421c1', 'ปอกมีดโปร่งตัดลาย', 'Y', '', '2018-05-22 14:47:56', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:47:56', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('c34b3a24-424b-4f65-bec5-cbc8e2de0e94', 'บิดนูน', 'Y', '', '2018-05-23 04:41:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:41:54', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('c40c9e25-dbe4-4030-8c0b-8ea457b5b803', 'สามห่วงโปร่ง', 'Y', '', '2018-05-22 16:55:58', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:55:58', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('c6f7145d-6389-4fb7-8352-d5dd016e9957', 'สามห่วงต่างๆ', 'Y', '', '2018-04-21 11:20:35', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:20:35', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('c8bb045a-3f76-4c50-8f49-b746631f6261', 'ทาโร่แม็ค', 'Y', '', '2018-05-22 16:54:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:54:38', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('ca07ab5f-2a4c-4186-a806-e4636aa27ab1', 'โซ่เรือ', 'Y', '', '2018-03-24 07:35:08', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:35:08', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('cbfd3c01-c99b-41a6-9b79-b79f203f9448', 'ไพลินมูน', 'Y', '', '2018-05-23 04:42:20', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:42:20', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('cc034f89-79d0-471e-818d-368ffe62d451', 'ร.9', 'Y', '', '2018-05-22 15:30:17', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:30:17', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('d2229d5a-ec5d-413c-b8c6-2475bd90e1e8', 'ต่างๆ', 'Y', '', '2018-05-22 15:58:16', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:58:16', NULL, 'def96758-cf36-4b10-ac3a-b9b76810606b', ''),
('d23a2d61-3d93-4597-8d2e-7e35349f7ebb', 'พระพิฆเนศ', 'Y', '', '2018-05-22 15:31:50', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:31:50', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('d3be46c9-ede8-4b63-81cd-d58b69c1b42b', 'โปร่งโบราณ', 'Y', '', '2018-05-22 14:46:20', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:46:20', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('d4c4f105-d25b-4eec-8315-2439ae4e7cc1', 'นางกวัก', 'Y', '', '2018-05-22 17:41:59', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:41:59', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('d6135031-e5fd-4f9a-8e5a-f55be6f15106', 'โซ่โปร่งคั่นปล้อง', 'Y', '', '2018-05-23 04:46:51', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:46:51', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('d6363263-dbc6-4938-a31e-f3bb66941bb6', 'กระดูกงู ', 'Y', '', '2018-04-21 11:18:38', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:38', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('d7ba703c-dc75-4d77-93f7-cf6569d2c052', 'มาเลย์ผสมโอ่ง', 'Y', 'หูห่วงตัดลายมีเม็ดกลม', '2018-05-22 16:24:47', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:25:07', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('d7c840fe-524f-478d-95ea-1d735362e68d', 'ทาโร่สลับต่างๆ', 'Y', '', '2018-04-21 09:18:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:18:44', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('d9e2cc4e-6e47-4630-8cc3-bdb40533e373', 'ทาโร่แม็ค', 'Y', '', '2018-05-22 16:48:51', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:48:51', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('dabd0741-5975-49b8-a743-f02a69e4ad81', 'บิดนูนโป่ง ', 'Y', '', '2018-04-21 11:19:29', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:19:29', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('db41c6fa-23ab-4145-8d7c-d365b763cda3', 'หลวงพ่อโสธร', 'Y', '', '2018-05-22 15:28:22', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:22', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('db62ac4c-fd03-4c97-b44a-75ac08607fb5', 'ห่วงขาสปริง', 'Y', 'หูห่วงขาสปริง', '2018-05-22 16:28:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:31:50', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('db8bc2cc-b104-4954-9f6e-57e431b73d32', 'ทาโร่คู่', 'Y', '', '2018-04-21 09:17:36', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 09:17:36', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('dcb7c281-9297-4d5f-80e3-b810b86a6cf1', 'ร.5 สามมิติ', 'Y', '', '2018-05-22 17:37:59', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:37:59', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('dec2cc87-2ab8-45e7-b665-b47cf49e66a7', ' กระดูกงูคั่นต่างๆ ', 'Y', '', '2018-04-21 11:18:41', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:41', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('e2e606cc-4343-4796-8a87-bedc7a90e3d4', 'ประทับใจ', 'Y', '', '2018-03-24 07:34:26', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:34:26', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('e44ef24c-8c1e-46ec-aff1-25fc61c40722', 'หลวงพ่อเงิน', 'Y', '', '2018-05-22 15:28:16', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:16', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('e494d6ca-94d8-449f-b3cb-1e6d61d8fdf1', 'ผ่าหวาย', 'Y', '', '2018-03-24 07:34:54', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:34:54', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('e51bd04c-475a-4f50-9f3c-bb7d2312f59d', 'หลวงพ่อคูณ', 'Y', '', '2018-05-22 15:30:08', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:30:08', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('e55fd311-c672-4660-a6e4-ee8cb7339a4c', 'เกลี้ยงตัน', 'Y', '', '2018-05-22 14:47:19', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:47:19', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f', ''),
('e5cea891-0573-4307-b636-1076bc305f01', 'ทาโร่คั่นต่างๆ', 'Y', '', '2018-05-22 16:54:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:54:46', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('e640752e-11f6-4eca-84b7-a54e7e6cdde3', 'เบ๊นตันคั่นต่างๆ', 'Y', '', '2018-05-22 17:03:21', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:03:21', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('e6c10538-cd1d-44a1-9630-569571b54b51', 'สี่เสาตันคั่นต่างๆ', 'Y', '', '2018-05-22 16:57:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:57:54', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('e733b561-0981-426a-94e0-2ca504fff872', 'เกลียวฝรั่งเศส', 'Y', '', '2018-05-23 04:43:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:43:52', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('e772619c-951e-4d5d-b164-f6f725ff737f', 'ทาโร่', 'Y', '', '2018-03-24 07:33:07', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:07', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('e7c54203-69ce-45e4-ab8d-39ce74c71859', 'สี่เสาคั่นต่างๆ', 'Y', '', '2018-05-22 16:44:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:44:54', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('e8509b68-eae9-4b55-8865-ef6665b10b28', 'เลทมังกร', 'Y', '', '2018-03-24 07:33:39', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:33:39', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('e8703abb-97f0-4449-acb2-8b0ad9b38729', 'หลวงพ่อโสธร', 'Y', '', '2018-05-22 17:40:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:40:46', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('e98e39a1-bfb7-41d6-90e4-e6b48101bade', 'ผ่าหวาย', 'Y', '', '2018-05-23 04:42:50', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:42:50', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('ea0830f8-aaea-42cb-bad9-7fc4d4ef4540', 'สี่เสา', 'Y', '', '2018-03-24 07:34:17', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:34:17', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('eb7de3de-d42f-4892-8eb8-a1c0168eb412', 'ผ่าหวายทรงเครื่อง', 'Y', '', '2018-03-24 07:35:16', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:35:16', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('ec1151db-4256-416e-baa3-18e97b7cae41', 'ไพลินมูน สีต่างๆ', 'Y', '', '2018-05-22 17:00:25', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:00:25', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('ed24c77a-be5b-43e0-b36a-9874d5304030', 'บิดตาม้า', 'Y', '', '2018-05-22 16:51:29', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:51:29', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('ed4b0eec-d470-4df4-bb09-0c086b14401e', 'พระพุทธชินราช', 'Y', '', '2018-05-22 17:40:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:40:54', NULL, '5bfc17be-bbf0-4992-b124-5775b8802331', ''),
('ed5b9cb2-8be4-4040-958a-0527dadb1cb0', 'ผ่าหวายคั่นโอ่ง ', 'Y', '', '2018-03-24 07:35:01', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-03-24 07:35:01', NULL, '2b444e94-f325-46bc-8bc4-f9fa11b8056c', ''),
('edfbf012-14d5-4add-8ec1-a88ecf27c2e1', 'สี่เสาโปร่งคั่นต่างๆ', 'Y', '', '2018-05-22 16:58:09', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:58:09', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('ef0c26be-123f-4fcc-b69c-258c4f7b5396', 'คตกิตทรงเครื่องคั่นโอ่งต่างๆ', 'Y', '', '2018-05-22 16:52:41', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:52:41', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('f19d2dab-f359-4e41-a7de-7493da22f0ce', 'พลอยเม็ดเดียว', 'Y', '', '2018-05-22 16:28:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:30:27', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('f2ab5175-3b0d-4038-80d1-12c8f0c7f457', 'โลมา', 'Y', '', '2018-05-22 17:39:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:39:54', NULL, '980135d0-f9f2-4945-82fc-187472eca7db', ''),
('f59f40a2-68b5-4206-bd29-9c6f041e50da', 'สี่เสา', 'Y', '', '2018-05-23 04:42:04', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:42:04', NULL, 'a2c2d7aa-8b58-4a14-832a-812755c66c10', ''),
('f8dcd3f3-f0a1-4854-8f2e-2ece193e1aee', 'แปดเหลี่ยม', 'Y', '', '2018-05-23 04:47:53', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-23 04:47:53', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2', ''),
('f93ad5f7-7371-49e3-827e-53bdd9caac8b', 'มาเลย์ห้อยต่างๆ', 'Y', 'ห่วงตัดลายมีห้อยจี้', '2018-05-22 16:24:14', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 16:25:24', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '5377776d-7e8c-40b7-91e9-9260832ed5ec', ''),
('fc67927b-48ae-4162-b126-1b96243da884', 'นางกวัก', 'Y', '', '2018-05-22 15:28:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:28:05', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c', ''),
('ff74ab5a-a6d3-4337-b9c8-1c95b193239e', 'เบ๊นคั่นต่างๆ ', 'Y', '', '2018-04-21 11:18:49', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:49', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', ''),
('ffd0e44e-68d9-4893-b6d5-75f541a4ac9b', 'ผ่าหวาย ', 'Y', '', '2018-04-21 11:18:12', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 11:18:12', NULL, '048131b8-9cdf-4c1e-bece-6e891da9d7e4', '');

-- --------------------------------------------------------

--
-- Table structure for table `glitems`
--

CREATE TABLE `glitems` (
  `id` char(36) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gold_prices`
--

CREATE TABLE `gold_prices` (
  `id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `pricedate` date NOT NULL,
  `created` varchar(45) DEFAULT NULL,
  `createdby` char(36) DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gold_prices`
--

INSERT INTO `gold_prices` (`id`, `branch_id`, `pricedate`, `created`, `createdby`, `modified`) VALUES
('06be6f17-3b2c-46b6-9201-79a56c5892cd', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:30 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:30:13'),
('10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:31 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:31:02'),
('1505b097-70cf-4ab6-b397-7bad25ddee67', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01', '7/1/18, 4:38 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:38:04'),
('194292a0-ed22-45c8-a838-b05de573c92c', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01', '7/1/18, 4:21 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:21:04'),
('24bd27c1-3e5e-42b0-be69-03eef7834b01', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-26', '6/26/18, 12:40 PM', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-26 12:40:37'),
('488ae586-9ef9-4f5c-8c31-aa3811394325', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-27', '6/27/18, 4:44 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-27 16:44:00'),
('5aa58d0d-3661-4702-82bc-5abe86686618', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:05 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:05:28'),
('5c2707f5-a1ff-40dc-a766-f7293fd78aab', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 3:54 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 15:54:41'),
('6072de24-bf4a-4b54-ad79-21ad349bdc40', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:04 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:04:27'),
('75940501-e192-4ea2-992d-79ddd277e649', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:06 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:06:38'),
('79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:04 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:04:10'),
('9b8d08c7-584a-46bc-a878-2e2628648fa1', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01', '7/1/18, 4:18 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:18:23'),
('c5e40384-710d-4513-a77b-ce2cd2a44557', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:35 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:35:47'),
('d9308be8-5965-44ab-89f2-0e3ba9180089', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01', '7/1/18, 4:44 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-07-01 16:44:19'),
('e11939b9-db38-41f4-a9f5-f49605b3772e', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:29 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:29:24'),
('e1580d20-94d9-4075-af9a-dadacaa4b4ed', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:32 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:32:42'),
('e20271ed-c4da-4a2d-890c-f709f275e49f', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:04 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:04:46'),
('fa746390-dd42-441a-9b99-42f74dbefcaf', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28', '6/28/18, 4:05 PM', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `gold_price_lines`
--

CREATE TABLE `gold_price_lines` (
  `id` char(36) NOT NULL,
  `sales_price` decimal(10,2) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `gold_price_id` char(36) NOT NULL,
  `sd_weight_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gold_price_lines`
--

INSERT INTO `gold_price_lines` (`id`, `sales_price`, `purchase_price`, `created`, `modified`, `gold_price_id`, `sd_weight_id`) VALUES
('01ac852e-d12d-408e-a872-952985a8e7b7', '5500.00', '4476.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('01b7612d-c6df-466f-ba9c-06b921c6a460', '196500.00', '187500.00', '2018-07-01 16:21:25', '2018-07-01 16:21:25', '194292a0-ed22-45c8-a838-b05de573c92c', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('086d28b3-46c5-4dad-b026-ae7e57b50623', '98250.00', '93750.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('0cad3c31-2aaa-4dc9-a19e-478dd0289e0b', '1100.00', '624.00', '2018-07-01 16:18:23', '2018-07-01 16:18:23', '9b8d08c7-584a-46bc-a878-2e2628648fa1', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('0d19cec2-4c4c-410b-8813-5ab8290f1eec', '2950.00', '2250.00', '2018-06-28 16:05:28', '2018-06-28 16:05:28', '5aa58d0d-3661-4702-82bc-5abe86686618', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('0ee96b67-41ba-49ee-b3ad-bbcc5125ade4', '31000.00', '28500.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('10797534-9c97-4798-a4a3-c856a748c10d', '1100.00', '688.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('10eee5b5-e44e-4247-a9a3-df17e6f7ebb3', '5500.00', '4500.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('110816b0-d192-4b3a-80d1-578d197def37', '1700.00', '1150.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('1132ab9c-8e26-4281-a3a6-acef536787cd', '14750.00', '13500.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', '28787316-48cb-4130-9731-a08acb46d434'),
('12c0ac1c-523b-4ef2-b651-1050cbae2e1e', '41500.00', '36500.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('13dd367e-8086-4fb5-89ee-b60a948b72ed', '5550.00', '4450.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('14c64f8b-ca83-4903-81e7-8add78b5655b', '800.00', '752.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('16095a09-1b0e-4650-a103-5b57acf0526b', '800.00', '752.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('16e49981-d70e-4704-b9f5-07d58c6553ca', '58950.00', '56250.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('1982e5f7-505c-4c97-b5ab-006a4472398d', '15750.00', '13576.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '28787316-48cb-4130-9731-a08acb46d434'),
('1c094689-6ada-4f72-93a4-fcbd46d47126', '20750.00', '18250.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('1da0e87d-da39-4688-94b2-174f41e15c48', '1700.00', '1150.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('1dd17fca-fbd1-4c41-a4b9-f0b4cf184645', '196500.00', '187500.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('239c623f-ff98-44da-ae5c-e70795c04dd0', '5500.00', '4676.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('23d47963-3c81-465c-957b-05bbb80751bf', '21150.00', '18050.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('25ef9120-aef4-42dd-b53d-5626e1c0dc9f', '1100.00', '688.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('26fc2b2c-16bb-466a-99b0-8b8768186446', '20750.00', '18200.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('27db80d1-9cbe-4779-838e-6a8c7cfc3383', '10750.00', '9100.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('2878800b-7f48-4e52-8a15-9df7fdad22aa', '176850.00', '168750.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('28c686ae-9add-45fe-8c07-d73d45bae37b', '2950.00', '2188.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('29c6af01-54c0-4744-913c-90c3c33e8609', '1700.00', '1180.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('2a8c5f3b-8333-4580-bf4d-2de1a322cb99', '1700.00', '1124.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('2dafb62d-a67c-4e2b-821a-d1a9729249dd', '14750.00', '13500.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', '28787316-48cb-4130-9731-a08acb46d434'),
('2ee1c692-c95d-44c0-950d-afa9edf7fcc9', '1100.00', '688.00', '2018-06-28 16:29:24', '2018-06-28 16:29:24', 'e11939b9-db38-41f4-a9f5-f49605b3772e', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('2ef10acf-2f1c-42de-8764-1be5e9cb63d5', '2950.00', '2188.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('30a60cd5-8ce2-4ebd-8a45-f370399d2f61', '15750.00', '14176.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '28787316-48cb-4130-9731-a08acb46d434'),
('30c55eef-3ea7-45df-b64e-7c6f84411eeb', '10750.00', '9100.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('31be7e27-aa36-465d-9241-68d54b294968', '5500.00', '4276.00', '2018-07-01 16:18:23', '2018-07-01 16:18:23', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('345fcc3c-5501-4cdb-9ece-69814fe84754', '78600.00', '75000.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('348f1946-dfa0-4b34-832d-8b2c80feb672', '31000.00', '27300.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('3592dc9c-d6e9-4b70-a5e1-ed222e0a3d63', '31000.00', '27200.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('368e3a7d-413f-40cc-9091-293ad8cbe344', '1100.00', '650.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('3bc6edb8-651d-4f58-b485-4829a6d82095', '1700.00', '1150.00', '2018-06-28 16:05:28', '2018-06-28 16:05:28', '5aa58d0d-3661-4702-82bc-5abe86686618', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('3cd71a2c-4fed-42a2-8d72-1591cacb0158', '5500.00', '4500.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('413e6056-4298-4e76-9c82-f7836815eb78', '10750.00', '9800.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('4168e665-08f4-4772-b329-f9ddc867a998', '31000.00', '27200.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('422c5d64-aae4-44a6-9405-6836d6f25718', '31000.00', '27200.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('49e6f270-5fff-4130-ad20-cb81a9992889', '10750.00', '9050.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('50dbdb23-0796-4edb-ada3-d64b949bc5ff', '1700.00', '1124.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('51924ba2-d6ab-4e62-8bb5-f08ee041c083', '21150.00', '18750.00', '2018-06-28 16:29:25', '2018-06-28 16:29:25', 'e11939b9-db38-41f4-a9f5-f49605b3772e', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('51cc33e1-4782-42ca-9f90-18f82398e6f7', '5500.00', '4500.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('52607ec6-2cff-4d04-8cc7-8d8a9c6215db', '31000.00', '28500.00', '2018-06-28 16:29:25', '2018-06-28 16:29:25', 'e11939b9-db38-41f4-a9f5-f49605b3772e', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('538b6c34-08b0-400e-941a-f16374dc83b3', '15750.00', '13576.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '28787316-48cb-4130-9731-a08acb46d434'),
('5585981d-7ec9-4cc0-92cc-6a5effa98a92', '5500.00', '4676.00', '2018-06-28 16:29:25', '2018-06-28 16:29:25', 'e11939b9-db38-41f4-a9f5-f49605b3772e', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('56168b8b-a4f4-4d39-bfdb-9c0437425e70', '1700.00', '1124.00', '2018-07-01 16:21:12', '2018-07-01 16:21:12', '194292a0-ed22-45c8-a838-b05de573c92c', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('572148a6-a1c7-4dac-b77b-04ef8da620f8', '2950.00', '2288.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('57875649-7ca3-455f-8fe2-d61340e07fec', '2950.00', '2250.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('57c52644-1d47-4a4a-96f9-7de07e546d2c', '10750.00', '9450.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('5800a84d-d9ba-4e84-b9be-b7f731cce287', '5500.00', '4500.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('588cb4a3-9874-4179-9ac2-0ea11e5f4fd7', '10750.00', '9450.00', '2018-06-28 16:29:25', '2018-06-28 16:29:25', 'e11939b9-db38-41f4-a9f5-f49605b3772e', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('58bfb4f5-c404-4082-aa84-a66777fe0c48', '157200.00', '150000.00', '2018-07-01 16:21:25', '2018-07-01 16:21:25', '194292a0-ed22-45c8-a838-b05de573c92c', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('5a433262-8a27-4733-a74c-f37034d242f3', '5500.00', '4676.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('5c221a36-fbcc-49e6-aec2-0744b742bd80', '58950.00', '56250.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('5c51fce9-7550-41b0-8e90-dbf9e400f356', '31000.00', '28500.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('5c73c791-f8d6-4e7a-b9b7-323fe8ecf849', '31000.00', '28500.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('5d7b275a-0ed1-48b7-a3de-2dcb64f998a0', '2950.00', '2250.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('5da7aa37-86b5-4fb2-8b88-dd1f1bd2b11d', '2950.00', '2088.00', '2018-07-01 16:18:23', '2018-07-01 16:18:23', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('5dd52ff8-52a0-4cf1-a43c-c97a0cbdbb73', '14750.00', '13500.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '28787316-48cb-4130-9731-a08acb46d434'),
('5fdd5b24-88a2-4adf-ad9c-e6bca8059aef', '39300.00', '37500.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('60ccba4f-e8f2-4251-adfb-f4d1a6fbca06', '5500.00', '4500.00', '2018-06-28 16:05:29', '2018-06-28 16:05:29', '5aa58d0d-3661-4702-82bc-5abe86686618', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('61b9cf5a-78e0-4a57-ae99-ee75186d65d0', '137550.00', '131250.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('62bc4987-1d16-4878-84b8-a2b566678c56', '15750.00', '14176.00', '2018-06-28 16:29:25', '2018-06-28 16:29:25', 'e11939b9-db38-41f4-a9f5-f49605b3772e', '28787316-48cb-4130-9731-a08acb46d434'),
('6389a00a-4c4b-4d88-90b2-92d4ffe245c4', '14750.00', '13500.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', '28787316-48cb-4130-9731-a08acb46d434'),
('63e3aabe-2228-4d25-835a-ad1e253050c8', '78600.00', '75000.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('64da729d-5a43-44be-a7f1-7aa90a6a3b17', '20750.00', '18200.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('651f5f6c-a31b-437e-a16b-3d60ed545461', '1700.00', '1180.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('67c9fbd5-e2f3-4617-9626-31c934e3db5a', '2950.00', '2250.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('67f399ff-e38c-4ae3-a02f-15a83d67dc44', '2450.00', '2338.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('68930038-4221-4722-a89f-f5bd1a43c5fe', '14800.00', '14700.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', '28787316-48cb-4130-9731-a08acb46d434'),
('6932f7c1-890b-4656-bacc-88b400802e8a', '10750.00', '9450.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('6af9b845-7703-4451-b0e4-dfc4764bb24b', '20750.00', '17400.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('6b4db8a8-9e13-412a-93f4-c2e44ebdc95a', '1100.00', '688.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('6b70c469-b6c7-44b4-9432-7a98c0acb5b5', '10750.00', '9100.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('707e3d63-ace1-4559-90e2-b44348f09657', '1700.00', '1150.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('712a868b-7b72-4331-ae02-52c2c703d1ae', '98250.00', '93750.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('73d6e7a5-1be9-4d96-872b-3df5529bba84', '14750.00', '13500.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', '28787316-48cb-4130-9731-a08acb46d434'),
('75d9ab62-65a7-4486-bd88-9f5fbb95c4dc', '15750.00', '14176.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', '28787316-48cb-4130-9731-a08acb46d434'),
('7b950513-a0d4-4310-9c2e-69b5ef227b97', '15750.00', '14176.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', '28787316-48cb-4130-9731-a08acb46d434'),
('7ba2441a-eaf1-4a9b-9cff-a8d2d0129194', '176850.00', '168750.00', '2018-07-01 16:21:25', '2018-07-01 16:21:25', '194292a0-ed22-45c8-a838-b05de573c92c', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('7cda5892-0501-4c76-85ec-9127bab9254d', '1700.00', '1150.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('7d94e823-6588-452b-959a-d14b88dda717', '157200.00', '150000.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('7db233ba-0357-4c43-9e7d-e5b0e568753c', '39300.00', '37500.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('7dc0565e-5245-460d-8b3f-142f3a5a2ded', '1300.00', '1286.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('80d9b38c-6d58-4ae0-b86c-8b295631812c', '10750.00', '9100.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('8174f200-e57e-4991-963e-f8aaad62aabf', '1100.00', '650.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('81e12494-70be-43d6-96f0-b48871e89249', '1100.00', '650.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('860ed3e9-bf7d-40af-84b7-186463aa1755', '5500.00', '4500.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('879e7c6c-28c4-403e-ab71-51bac13cbcec', '15750.00', '14176.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', '28787316-48cb-4130-9731-a08acb46d434'),
('8908f18e-3de9-43f4-abf7-a40e90d9d00b', '157200.00', '150000.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('8b6a09dc-9ce4-4fbb-b068-7befdae267ff', '1700.00', '1180.00', '2018-06-28 16:29:24', '2018-06-28 16:29:24', 'e11939b9-db38-41f4-a9f5-f49605b3772e', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('8d2c9c8e-200b-46f7-b251-00ad280620eb', '1100.00', '650.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('8eceb102-424c-41e3-9ebc-94ac16ec0aca', '137550.00', '131250.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('907dd8f6-3a04-4064-816c-875b2ebeb833', '10750.00', '9050.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('96ef3ebc-b11b-4512-9bb4-1966db99eb2c', '20750.00', '18200.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('975dec23-4406-4848-8897-0593af261025', '10750.00', '9100.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('9994d3ec-7e9a-4827-b245-705c6c350d3c', '196500.00', '187500.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('9a9066f1-3ecc-42ae-b597-8d61fc7c44cc', '1100.00', '650.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('a025558c-11c2-4040-8c8f-14af6f11e956', '2950.00', '2450.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('a5a18de4-dd2f-4396-9939-b12945758adb', '58950.00', '56250.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('a8440005-c67b-407d-ab0c-4844e5ebc38c', '2950.00', '2288.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('aa210ac0-6ee7-4fe2-b864-f6668b8921f8', '20750.00', '18250.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('aa763b6a-3aeb-4b23-9106-dc3cd97329dd', '5500.00', '4500.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('adf3b63b-6dae-48fe-afae-b2d985dd8825', '20750.00', '18200.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('af53f38f-602c-4157-b7c2-b82b1c00cf16', '15750.00', '13576.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '28787316-48cb-4130-9731-a08acb46d434'),
('b076434f-8c2f-4c64-af00-914d2df9d686', '2950.00', '2250.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('b0c9bf22-d082-4c00-a537-fd6ca86412c7', '10750.00', '9100.00', '2018-06-28 16:05:29', '2018-06-28 16:05:29', '5aa58d0d-3661-4702-82bc-5abe86686618', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('b3322c26-2f65-469d-bd12-95762ac2505e', '10750.00', '8650.00', '2018-07-01 16:18:23', '2018-07-01 16:18:23', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('b61d424e-a7c0-4d58-8bec-89c13e3f4e11', '137550.00', '131250.00', '2018-07-01 16:44:20', '2018-07-01 16:44:20', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('b784d2a7-f0d1-41ed-a5cd-77b1c6f521e3', '20750.00', '18250.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('b8eea634-7514-4240-9173-7c9d31847727', '41500.00', '36500.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('b92f7c3b-25bf-411b-81fd-215e5ec63482', '20750.00', '18200.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('b948b8cd-3a4b-4b15-b5e8-7198a2334f8b', '1100.00', '650.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('b9a93272-ff66-43ad-96f5-b8f3962d0570', '31000.00', '27300.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('bcadc45c-d851-4767-a4f6-43270d7f3051', '1700.00', '1150.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('be355626-c733-412d-9cdb-47b00b30fa6e', '20800.00', '18250.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('c3072a29-2531-48a1-aaea-c7c23119819d', '20750.00', '18200.00', '2018-06-28 16:05:00', '2018-06-28 16:05:00', 'fa746390-dd42-441a-9b99-42f74dbefcaf', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('c40d8ba4-5802-4708-9cd1-0613b9d97ac2', '31000.00', '27300.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c4d2963f-7643-4081-a863-c89d6ba20735', '31000.00', '27200.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c5666ba3-be09-49e1-8a45-75f2257cb558', '5500.00', '4676.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('c5844d0c-b345-45bd-a283-c04d702a8131', '2950.00', '2250.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('c5932b61-0463-40ef-b914-8ad7adefd9f8', '31000.00', '27200.00', '2018-06-28 16:04:10', '2018-06-28 16:04:10', '79320720-2f53-4a1c-b7c5-8bb55df9c2bd', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c68c79b9-4d3e-4205-91fe-9a10d9dcf5a9', '78600.00', '75000.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('c6ed010a-d613-46fb-bff7-96ba80b411ab', '14750.00', '13500.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', '28787316-48cb-4130-9731-a08acb46d434'),
('c89f4c55-fb79-458d-9123-369dfdd28040', '5500.00', '4476.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('cac4769c-cc32-4f6e-814c-b60183ff9a7c', '20750.00', '18050.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('cb1c357e-991b-48c6-9b56-018e7c8ca289', '2950.00', '2288.00', '2018-06-28 16:29:24', '2018-06-28 16:29:24', 'e11939b9-db38-41f4-a9f5-f49605b3772e', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('cc77a61f-8b28-44a5-899c-c371aaa3e23a', '1700.00', '1180.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('ccce4f52-aa7d-454d-9130-0e57cc1f9c34', '10750.00', '9450.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('cd65927a-9dfe-4fc1-b960-5367921eca14', '98250.00', '93750.00', '2018-07-01 16:21:19', '2018-07-01 16:21:19', '194292a0-ed22-45c8-a838-b05de573c92c', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('d06da02c-e85d-4c55-aa67-e1553d35b955', '58950.00', '56250.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('d0f061bc-f026-4050-992e-74e26cadd137', '20800.00', '18200.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('d0fdd3a7-f6d9-477b-9f19-c3fcfb434f87', '10750.00', '9100.00', '2018-06-28 16:04:27', '2018-06-28 16:04:27', '6072de24-bf4a-4b54-ad79-21ad349bdc40', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('d18df3f4-d4ad-48c3-b231-6549206821a1', '117900.00', '112500.00', '2018-07-01 16:44:20', '2018-07-01 16:44:20', 'd9308be8-5965-44ab-89f2-0e3ba9180089', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('d1ca35ca-21f6-4055-ae45-86bdb47f6785', '800.00', '734.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('d3fb37b9-d606-450a-8003-77a026375017', '15750.00', '13576.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '28787316-48cb-4130-9731-a08acb46d434'),
('d408762a-e3b7-4d0c-ad47-e8ac16bfdfa5', '20750.00', '0.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('d43f4b94-c6bc-46cb-829c-b72ed38e0d48', '5550.00', '4900.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('d4d9dc4a-d346-4e6b-94af-e8396b27aa0b', '117900.00', '112500.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('d7214841-8fa0-4bca-8817-a831ace604cf', '10750.00', '9050.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('d7729ff0-ada6-4d4b-a2d1-bf654169bf9b', '20750.00', '18200.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('d94b5fb4-483d-40cd-aba2-effb1407ad6c', '20750.00', '18200.00', '2018-06-28 16:05:29', '2018-06-28 16:05:29', '5aa58d0d-3661-4702-82bc-5abe86686618', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('dad74324-27c0-4bfe-9ab0-86e1c080854b', '2950.00', '2200.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('dad7f86b-9552-46f8-ba5d-d756186b5901', '14800.00', '14700.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', '28787316-48cb-4130-9731-a08acb46d434'),
('db32c7ca-0053-4f31-934e-a7d3ae16bed0', '98250.00', '93750.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('dbf1c47d-b582-4e8b-a9f2-e093d1e3dd95', '5500.00', '4500.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('dcc362a0-bdc3-4f2e-babd-b46b6ffe522c', '196500.00', '187500.00', '2018-07-01 16:44:20', '2018-07-01 16:44:20', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('de22c319-9161-4eca-982e-93078bc9a863', '1100.00', '650.00', '2018-06-28 16:05:28', '2018-06-28 16:05:28', '5aa58d0d-3661-4702-82bc-5abe86686618', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('e02ec443-6a35-4250-860a-b8ae2353e9c9', '1700.00', '1124.00', '2018-07-01 16:18:23', '2018-07-01 16:18:23', '9b8d08c7-584a-46bc-a878-2e2628648fa1', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('e080a6c8-db86-4477-82b0-8f1195b8eaaf', '137550.00', '131250.00', '2018-07-01 16:21:25', '2018-07-01 16:21:25', '194292a0-ed22-45c8-a838-b05de573c92c', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('e11d556b-bded-4336-a461-11c93187240a', '78600.00', '75000.00', '2018-07-01 16:38:04', '2018-07-01 16:38:04', '1505b097-70cf-4ab6-b397-7bad25ddee67', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('e13fa248-46de-4aab-ad59-651b7bd1857e', '31000.00', '27200.00', '2018-06-28 16:05:29', '2018-06-28 16:05:29', '5aa58d0d-3661-4702-82bc-5abe86686618', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('e2b8c013-b1cc-48e6-9d31-4e043b24e117', '5500.00', '4476.00', '2018-07-01 16:21:18', '2018-07-01 16:21:18', '194292a0-ed22-45c8-a838-b05de573c92c', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('e2c144c0-5362-4d8d-a0b4-4d107e53a4b6', '1700.00', '1150.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('e33654b0-1b01-4dbc-8bf5-03b18b3fec4c', '2950.00', '2250.00', '2018-06-28 16:04:46', '2018-06-28 16:04:46', 'e20271ed-c4da-4a2d-890c-f709f275e49f', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('e37ec3a2-7bf4-4894-b4a2-96be46c0216f', '2950.00', '2288.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('e478670e-7809-4d5c-831e-5acf7433cdeb', '10750.00', '9100.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('e671b6c9-1ec7-4ad8-9bf8-a75aad4c723f', '1100.00', '624.00', '2018-07-01 16:21:11', '2018-07-01 16:21:11', '194292a0-ed22-45c8-a838-b05de573c92c', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('e6bc6838-b13d-4f39-bd7e-55f997363411', '117900.00', '112500.00', '2018-07-01 16:21:25', '2018-07-01 16:21:25', '194292a0-ed22-45c8-a838-b05de573c92c', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('e9d224c1-5d5e-4afc-89f3-9a7192a03b68', '29550.00', '29400.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('ebac634c-a553-4f14-8853-3a8c02d00508', '31000.00', '27300.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('ec7d2bab-1e47-4052-af3e-dadaed6ee5e9', '1100.00', '624.00', '2018-07-01 16:44:19', '2018-07-01 16:44:19', 'd9308be8-5965-44ab-89f2-0e3ba9180089', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('ef97dc68-4d37-4879-9e7d-d076fcb6007a', '2950.00', '2250.00', '2018-06-28 16:06:39', '2018-06-28 16:06:39', '75940501-e192-4ea2-992d-79ddd277e649', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('f00cc15e-cbf3-4313-83d2-bf7a4e0b00b4', '31000.00', '28500.00', '2018-06-28 16:32:45', '2018-06-28 16:32:45', 'e1580d20-94d9-4075-af9a-dadacaa4b4ed', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('f016aad8-0c53-4372-b968-8339cb389c06', '176850.00', '168750.00', '2018-07-01 16:44:20', '2018-07-01 16:44:20', 'd9308be8-5965-44ab-89f2-0e3ba9180089', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('f02c0207-1473-481c-85f6-b2b240f35d66', '1100.00', '688.00', '2018-06-28 16:31:03', '2018-06-28 16:31:03', '10fa9ee2-7d2d-4e0b-bae4-5f810a8274ec', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('f0a50135-a39c-4c62-86f3-d0c5d25ef292', '10750.00', '9050.00', '2018-06-28 16:35:48', '2018-06-28 16:35:48', 'c5e40384-710d-4513-a77b-ce2cd2a44557', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('f1e0fd22-7048-40ab-b02f-efe4363e4c15', '1300.00', '1286.00', '2018-06-27 16:44:00', '2018-06-27 16:44:00', '488ae586-9ef9-4f5c-8c31-aa3811394325', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('f2a0651e-8959-4f6a-9aee-a12c40ab8f68', '176850.00', '168750.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('f5a8d3f0-4be7-4394-9abf-eff833199689', '29550.00', '29400.00', '2018-06-26 12:40:37', '2018-06-26 12:40:37', '24bd27c1-3e5e-42b0-be69-03eef7834b01', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('f87595a5-5169-4b63-959a-8c888535a171', '117900.00', '112500.00', '2018-07-01 16:18:24', '2018-07-01 16:18:24', '9b8d08c7-584a-46bc-a878-2e2628648fa1', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('fc9bb56a-d8cc-477b-9300-ce05d0a330b7', '31000.00', '27200.00', '2018-06-28 15:54:42', '2018-06-28 15:54:42', '5c2707f5-a1ff-40dc-a766-f7293fd78aab', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('fcf4d545-9704-47ce-b34b-60ed017e8466', '157200.00', '150000.00', '2018-07-01 16:44:20', '2018-07-01 16:44:20', 'd9308be8-5965-44ab-89f2-0e3ba9180089', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('feb2eb94-503a-430e-934d-211f39bae4a8', '14750.00', '13500.00', '2018-06-28 16:05:29', '2018-06-28 16:05:29', '5aa58d0d-3661-4702-82bc-5abe86686618', '28787316-48cb-4130-9731-a08acb46d434'),
('feff404b-5b09-4b19-830a-7c261a59c760', '1700.00', '1180.00', '2018-06-28 16:30:13', '2018-06-28 16:30:13', '06be6f17-3b2c-46b6-9201-79a56c5892cd', 'e5c56205-ed96-499b-ab20-139df9ab4b46');

-- --------------------------------------------------------

--
-- Table structure for table `goods_lines`
--

CREATE TABLE `goods_lines` (
  `id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT 1,
  `product_id` char(36) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `goods_transaction_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `goods_transactions`
--

CREATE TABLE `goods_transactions` (
  `id` char(36) NOT NULL,
  `docno` varchar(50) NOT NULL,
  `docdate` date NOT NULL,
  `type` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'DR',
  `branch_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `from_warehouse` char(36) DEFAULT NULL,
  `to_warehouse` char(36) NOT NULL,
  `seller` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods_transactions`
--

INSERT INTO `goods_transactions` (`id`, `docno`, `docdate`, `type`, `description`, `status`, `branch_id`, `created`, `createdby`, `modified`, `modifiedby`, `from_warehouse`, `to_warehouse`, `seller`) VALUES
('5941f477-379d-443b-9065-61759a6f5cbb', 'GR00001', '2018-06-28', 'GR', '', 'CO', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-28 16:21:02', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:21:22', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, 'a8206bd4-3c5c-470c-a982-642ae740d76d', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` text DEFAULT NULL,
  `short_desc` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `org_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isexpend` enum('Y','N') DEFAULT 'N',
  `isrevenue` enum('Y','N') DEFAULT 'N',
  `isactive` enum('Y','N') DEFAULT 'Y',
  `created` datetime DEFAULT NULL,
  `createdby` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income_types`
--

INSERT INTO `income_types` (`id`, `name`, `isexpend`, `isrevenue`, `isactive`, `created`, `createdby`) VALUES
('386f0ccd-642b-4ff8-aef2-e32638060467', 'กินเลี้ยงพนักงาน ', 'N', 'N', 'Y', '2018-05-07 14:12:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('3c16e9b8-3268-4f3a-a3b8-2da624903883', 'ค่าธรรมเนียมเงินออม', 'N', 'Y', 'Y', '2018-05-26 07:39:00', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('40aef0ea-238b-4a26-84a6-cc57ebd3f3a5', 'ค่านายหน้า', 'N', 'N', 'Y', '2018-05-07 14:12:59', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('6aed7579-6d42-4229-8752-94c2856ad66a', 'ค่าไฟฟ้า', 'Y', 'N', 'Y', '2018-03-25 07:32:40', NULL),
('86cf4313-2c44-47d9-b39b-76738b0c8cd4', 'ค่าไฟ', 'Y', 'N', 'Y', '2018-05-07 14:14:54', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('9626a9dd-28e3-40a4-955b-75bbdd8c0493', 'ค่าฝากวางขายเครื่องรางของคลัง', 'N', 'N', 'Y', '2018-05-07 14:14:15', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('caa994c0-bfd3-48a4-8e12-1cc971ea1ad7', 'ค่าน้ำ', 'Y', 'N', 'Y', '2018-03-25 15:13:43', 'ebe998cb-1ae0-4827-920f-cb3c999913a6'),
('dff9c1e3-b817-412b-bd4b-74a84c614ddc', '', 'Y', 'N', 'Y', '2018-04-17 14:21:39', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('e8d1af7f-1272-4277-bbd0-6147fc832967', 'ค่าเช่าออฟฟิต', 'Y', 'N', 'Y', '2018-05-07 14:15:57', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('ea3f0e9a-dafa-45bd-87dc-7c1ee8fcf6f9', '', 'Y', 'N', 'Y', '2018-04-17 14:21:43', 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('fe0b540f-a87b-4183-acb8-8336356e1ade', 'ค่าอินเทอร์เน็ต ', 'Y', 'N', 'Y', '2018-05-07 14:15:11', 'b0ad3559-96df-4ecf-a65f-8932da1073ef');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `docdate` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `docno` varchar(45) NOT NULL,
  `docstatus` varchar(45) NOT NULL DEFAULT 'DR',
  `bpartner_id` char(36) DEFAULT NULL,
  `netamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vatamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totalamt` decimal(10,2) DEFAULT 0.00,
  `totalpaid` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ispaid` enum('Y','N') DEFAULT 'N',
  `issale` enum('Y','N') NOT NULL DEFAULT 'Y',
  `order_id` char(36) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `paymentmethod` varchar(45) NOT NULL,
  `seller` char(36) DEFAULT NULL,
  `isexchange` enum('Y','N') DEFAULT 'N',
  `discount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `org_id`, `branch_id`, `isactive`, `docdate`, `duedate`, `docno`, `docstatus`, `bpartner_id`, `netamt`, `vatamt`, `totalamt`, `totalpaid`, `ispaid`, `issale`, `order_id`, `created`, `createdby`, `modified`, `modifiedby`, `paymentmethod`, `seller`, `isexchange`, `discount`) VALUES
('32497e7e-7c5c-47d5-8e5e-1cf754abf596', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '2018-06-28', NULL, 'IV00001', 'CO', '0', '45000.00', '0.00', '45000.00', '0.00', 'Y', 'N', NULL, '2018-06-28 16:18:56', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:18:57', NULL, 'CASH', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', 'N', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_lines`
--

CREATE TABLE `invoice_lines` (
  `id` char(36) NOT NULL,
  `invoice_id` char(36) NOT NULL,
  `product_id` char(36) DEFAULT NULL,
  `seq` int(3) NOT NULL DEFAULT 1,
  `netamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vatamt` decimal(10,2) DEFAULT 0.00,
  `totalamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `warehouse_id` char(36) DEFAULT NULL,
  `invoice_exchange` char(36) DEFAULT NULL,
  `glitem_id` char(36) DEFAULT NULL,
  `isexchange` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_lines`
--

INSERT INTO `invoice_lines` (`id`, `invoice_id`, `product_id`, `seq`, `netamt`, `vatamt`, `totalamt`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `qty`, `price`, `warehouse_id`, `invoice_exchange`, `glitem_id`, `isexchange`) VALUES
('62b72009-5c73-46cb-ba40-ffefffc54da4', '32497e7e-7c5c-47d5-8e5e-1cf754abf596', 'a080632e-5b96-498c-9e30-28024cb18179', 1, '45000.00', '0.00', '45000.00', '', '2018-06-28 16:18:57', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:18:57', NULL, 1, '45000.00', 'cdaf1f4b-bca3-4b59-a7a8-5f83549e6e2a', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `docdate` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `docno` varchar(45) NOT NULL,
  `docstatus` varchar(45) NOT NULL DEFAULT 'DR',
  `bpartner_id` char(36) DEFAULT NULL,
  `netamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vatamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totalamt` decimal(10,2) DEFAULT 0.00,
  `totalpaid` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ispaid` enum('Y','N') DEFAULT 'N',
  `issale` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isprocessed` enum('Y','N') NOT NULL DEFAULT 'N',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `seller` char(36) DEFAULT NULL,
  `iscompletepaid` enum('Y','N') NOT NULL DEFAULT 'N',
  `isreceived` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `id` char(36) NOT NULL,
  `order_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `seq` int(3) NOT NULL DEFAULT 1,
  `netamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vatamt` decimal(10,2) DEFAULT 0.00,
  `totalamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `qty` int(3) DEFAULT 0,
  `image_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orgs`
--

CREATE TABLE `orgs` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `taxid` char(13) DEFAULT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orgs`
--

INSERT INTO `orgs` (`id`, `name`, `code`, `taxid`, `isactive`, `created`, `createdby`, `modified`, `modifiedby`, `description`) VALUES
('0', '*', '0', '-', 'Y', '2018-02-18 15:49:10', '0', NULL, NULL, 'system org'),
('371a39b9-f692-49dd-9d78-41f388e319cc', 'ห้างทองเยาวราชตรามังกร', '-', '-', 'Y', '2018-03-10 06:02:21', 'auth', '2018-03-24 05:32:10', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '');

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
  `totalmoney` decimal(10,2) NOT NULL,
  `rate` decimal(4,2) NOT NULL,
  `type` varchar(5) NOT NULL,
  `interrestrate` decimal(10,2) NOT NULL,
  `log_history` text DEFAULT NULL,
  `seller` char(36) NOT NULL,
  `warehouse_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pawns`
--

INSERT INTO `pawns` (`id`, `org_id`, `branch_id`, `bpartner_id`, `bank_account_id`, `docdate`, `docno`, `expiredate`, `returndate`, `status`, `description`, `created`, `cratedby`, `modified`, `modifiedby`, `totalmoney`, `rate`, `type`, `interrestrate`, `log_history`, `seller`, `warehouse_id`) VALUES
('2bf73199-b9f6-40b0-92a7-e6a72ab2f43e', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '0', '4fc9c7a4-ea71-49ec-a663-15ec406174c1', '2018-06-27', '1/1', '2018-10-27', '2018-06-29', 'RF', '', '2018-06-27 16:54:44', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-06-28 18:01:41', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '4000.00', '12.50', '3%', '20.00', '<br>วันที่ 29/06/2561 : ไถ่ถอน <br> เงินต้น  4000 ดอกเบี้ย 3%<br> ค่าดอกเบี้ย 20 บาท  ส่วนลดค่าดอกเบี้ย 0 บาท <br> ค่าดอกเบี้ยสุทธิ 20 บาท <br><hr>วันที่ 27/06/2561 : ทำรายการใหม่ <br>วันที่ 27/10/2561 : สิ้นอายุ <br> เงินต้น  4000<br><hr>', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', 'ddaf1c97-1813-4016-9c14-77cb716e1bde');

-- --------------------------------------------------------

--
-- Table structure for table `pawn_lines`
--

CREATE TABLE `pawn_lines` (
  `id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT 1,
  `product_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created` datetime NOT NULL,
  `creatbyed` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `pawn_id` char(36) NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `image_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` char(36) NOT NULL,
  `paymentdate` date NOT NULL,
  `docno` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `bank_account_id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `bpartner_id` char(36) DEFAULT NULL,
  `isactive` enum('Y','N') DEFAULT NULL,
  `isreceipt` enum('Y','N') NOT NULL DEFAULT 'Y',
  `ispartial` enum('Y','N') NOT NULL DEFAULT 'N',
  `isprocessed` enum('Y','N') DEFAULT 'N',
  `netamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vatamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totalamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `seller` char(36) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `docstatus` varchar(45) NOT NULL DEFAULT 'DR',
  `outstandingamt` decimal(10,2) DEFAULT 0.00,
  `discount` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `paymentdate`, `docno`, `payment_method`, `bank_account_id`, `org_id`, `branch_id`, `bpartner_id`, `isactive`, `isreceipt`, `ispartial`, `isprocessed`, `netamt`, `vatamt`, `totalamt`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `seller`, `type`, `amount`, `docstatus`, `outstandingamt`, `discount`) VALUES
('3b223572-c56f-45b4-a7f3-e871063f0130', '2018-06-28', 'AR00002', 'CASH', '43bbf410-6198-4205-aa96-4b462ebea7b4', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '0', 'Y', 'N', 'N', 'Y', '45000.00', '0.00', '45000.00', NULL, '2018-06-28 16:18:58', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:18:58', NULL, 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', 'PURCHASE', '45000.00', 'CO', '0.00', '0.00'),
('6c1dd4ee-08d9-4258-a97f-da09de90a8ea', '2018-06-29', 'AR00003', 'CASH', '43bbf410-6198-4205-aa96-4b462ebea7b4', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '0', 'Y', 'Y', 'N', 'Y', '20.00', '0.00', '20.00', NULL, '2018-06-28 18:01:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 18:01:48', NULL, NULL, NULL, '20.00', 'CO', '0.00', '0.00'),
('df9f2d22-6119-450a-89c2-fd9f825716ef', '2018-06-27', 'AR00001', 'CASH', '43bbf410-6198-4205-aa96-4b462ebea7b4', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '0', 'Y', 'N', 'N', 'Y', '4000.00', '0.00', '4000.00', NULL, '2018-06-27 16:54:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-27 16:54:44', NULL, NULL, NULL, '4000.00', 'CO', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_lines`
--

CREATE TABLE `payment_lines` (
  `id` char(36) NOT NULL,
  `seq` int(5) NOT NULL DEFAULT 1,
  `payment_id` char(36) NOT NULL,
  `invoice_id` char(36) DEFAULT NULL,
  `income_type_id` char(36) DEFAULT NULL,
  `order_id` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `pawn_id` char(36) DEFAULT NULL,
  `saving_account_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_lines`
--

INSERT INTO `payment_lines` (`id`, `seq`, `payment_id`, `invoice_id`, `income_type_id`, `order_id`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `pawn_id`, `saving_account_id`) VALUES
('0c8636ff-7703-463d-8ccb-e6debd463304', 1, '3b223572-c56f-45b4-a7f3-e871063f0130', '32497e7e-7c5c-47d5-8e5e-1cf754abf596', NULL, NULL, NULL, '2018-06-28 16:18:58', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:18:58', NULL, NULL, NULL),
('76e62423-5e8e-4064-9143-9832c5f67178', 1, 'df9f2d22-6119-450a-89c2-fd9f825716ef', NULL, NULL, NULL, NULL, '2018-06-27 16:54:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-27 16:54:44', NULL, '2bf73199-b9f6-40b0-92a7-e6a72ab2f43e', NULL),
('809cf0da-0de6-431f-89f6-5ddfbbdf68bc', 1, '6c1dd4ee-08d9-4258-a97f-da09de90a8ea', NULL, NULL, NULL, NULL, '2018-06-28 18:01:48', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 18:01:48', NULL, '2bf73199-b9f6-40b0-92a7-e6a72ab2f43e', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `unittype` varchar(50) DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `actual_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `product_category_id` char(36) DEFAULT NULL,
  `product_sub_category_id` char(36) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `midified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  `size_id` char(36) DEFAULT NULL,
  `weight_id` char(36) DEFAULT NULL,
  `design_id` char(36) DEFAULT NULL,
  `percent` decimal(10,4) DEFAULT NULL,
  `image_id` char(36) DEFAULT NULL,
  `manual_weight` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `unittype`, `cost`, `actual_price`, `description`, `isactive`, `product_category_id`, `product_sub_category_id`, `created`, `createdby`, `midified`, `modifiedby`, `org_id`, `size_id`, `weight_id`, `design_id`, `percent`, `image_id`, `manual_weight`) VALUES
('2fd4b593-730c-4e89-9260-09c213cd4c3b', 'สร้อยคอ 96.5% ลาย บิดนูนตัน  3.8g', '_temp', NULL, '0.00', '0.00', NULL, 'Y', '9d8cca7e-7880-4195-9357-bebe6f37cfa2', NULL, '2018-06-27 16:54:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', NULL, NULL, '51025c78-7861-4470-b7ee-da5e4296c07f', '96.5000', NULL, NULL),
('a080632e-5b96-498c-9e30-28024cb18179', 'สร้อยคอ 96.5% ลายซีตองโปร่ง 3.8g', '_temp', NULL, '0.00', '45000.00', NULL, 'N', '9d8cca7e-7880-4195-9357-bebe6f37cfa2', NULL, '2018-06-28 16:18:57', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', NULL, NULL, '5feee68b-f30a-4fa7-949a-7323580dc323', '96.5000', NULL, '3.800');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `org_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `code` char(5) NOT NULL,
  `isdefault` enum('Y','N') DEFAULT 'N',
  `type` varchar(100) DEFAULT NULL,
  `isstock` enum('Y','N') DEFAULT 'Y',
  `unittype` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `isactive`, `org_id`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `code`, `isdefault`, `type`, `isstock`, `unittype`) VALUES
('048131b8-9cdf-4c1e-bece-6e891da9d7e4', 'กําไลข้อมือ', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'bracelet', '2018-03-24 05:34:02', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-06-05 06:24:58', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'BB', 'N', 'GOLD', 'Y', NULL),
('22797ccc-60cc-49b8-8194-f6bd87b31f0c', 'จี้ทองหุ้ม', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Fake Gold Pendant', '2018-05-22 15:17:30', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-05 06:25:56', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'Fg', 'N', 'GOLD', 'Y', NULL),
('26c3ff5b-b00b-4d7a-a458-32082fd5907f', 'แหวน', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Ring', '2018-03-24 05:32:39', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-05-22 15:10:41', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', 'R', 'N', NULL, 'Y', NULL),
('27b3beef-e513-4aa7-93fb-c6caba080498', 'ต่างหู 96.5%', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'earring', '2018-05-22 15:09:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-05 06:25:03', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'Er', 'N', 'GOLD', 'Y', NULL),
('2b444e94-f325-46bc-8bc4-f9fa11b8056c', 'สร้อยข้อมือ', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Hand bracelet', '2018-03-24 05:33:19', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-06-05 06:26:03', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'H', 'N', 'GOLD', 'Y', NULL),
('304f6acd-69b7-45df-8028-f5b212ef9560', 'กำไลข้อเท้าเงิน', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Silver Anklet', '2018-04-21 08:43:21', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-05 06:24:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'An', 'N', 'SILVER', 'Y', NULL),
('5377776d-7e8c-40b7-91e9-9260832ed5ec', 'ต่างหู 90%', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', '', '2018-04-21 08:44:16', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-10 14:46:26', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'Er90', 'N', 'GOLD', 'Y', 'เส้น'),
('5bfc17be-bbf0-4992-b124-5775b8802331', 'พระกรอบ 90%', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', '', '2018-03-24 05:34:28', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-06-10 14:47:14', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'Pd90', 'N', 'GOLD', 'Y', 'เส้น'),
('980135d0-f9f2-4945-82fc-187472eca7db', 'จี้', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Pendent', '2018-04-21 08:43:46', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-05 06:26:16', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'Pd', 'N', 'GOLD', 'Y', NULL),
('9d8cca7e-7880-4195-9357-bebe6f37cfa2', 'สร้อยคอ', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Necklace', '2018-03-24 05:33:00', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-06-10 14:46:42', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'N', 'Y', 'GOLD', 'Y', 'เส้น'),
('a2c2d7aa-8b58-4a14-832a-812755c66c10', 'สร้อยคอเงิน', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Silver necklace', '2018-05-22 15:23:53', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:23:53', NULL, 'Sn', 'N', NULL, 'Y', NULL),
('aaf0b96d-a24c-4223-9c65-bf524250f678', 'บริการ', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', '', '2018-06-26 14:59:25', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-26 14:59:25', NULL, 'SERV', 'N', 'S', 'N', 'ครั้ง'),
('def96758-cf36-4b10-ac3a-b9b76810606b', 'ทองแท่ง', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Gold Bar', '2018-03-24 05:34:17', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-06-05 06:24:51', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'B', 'N', 'GOLD', 'Y', NULL),
('e3deaaa6-bff6-492a-aa07-08022aff5803', 'ต่างหูทองหุ้ม', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Fake gold earring', '2018-05-22 15:19:01', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-05 06:25:49', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'Fe', 'N', 'GOLD', 'Y', NULL),
('ec56b9d0-60aa-4873-80a0-887f6698fc57', 'แหวนนาค', 'Y', '371a39b9-f692-49dd-9d78-41f388e319cc', 'Bronze Ring', '2018-05-22 15:27:15', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:27:15', NULL, 'Rb', 'N', NULL, 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `image_id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `product_category_id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `code` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` char(36) NOT NULL,
  `code` varchar(15) CHARACTER SET utf32 NOT NULL,
  `value` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `code`, `value`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `name`, `isactive`) VALUES
('00daeb8c-578b-4ac4-b08d-14d5aa00949a', 'Pro1', 'รับฟรีหม้อหุงข้าว', 'รวมน้ำหนักทอง 5บาท', '2018-05-04 10:08:26', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-04 10:11:53', NULL, 'ทอง 5 เส้น ', 'Y'),
('ee642eb3-225c-4397-a409-7744fd78960c', 'Pro2', 'รับฟรีรถจักรยานยนต์', 'รวมน้ำหนัก 10 บาท', '2018-05-04 10:11:05', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-04 10:16:41', NULL, 'ทอง 10เส้น', 'Y'),
('c6f645da-f13b-4c52-860a-6b4a69e38683', 'Pro3', 'รับฟรีทอง 1บาท', 'รวม 20 บาท', '2018-05-04 10:12:52', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-04 10:12:52', NULL, 'ทอง 20 เส้น', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(36) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `geoid` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `code`, `name`, `geoid`) VALUES
('1', '10', 'กรุงเทพมหานคร   ', 2),
('10', '19', 'สระบุรี', 2),
('11', '20', 'ชลบุรี   ', 5),
('12', '21', 'ระยอง   ', 5),
('13', '22', 'จันทบุรี   ', 5),
('14', '23', 'ตราด   ', 5),
('15', '24', 'ฉะเชิงเทรา   ', 5),
('16', '25', 'ปราจีนบุรี   ', 5),
('17', '26', 'นครนายก   ', 2),
('18', '27', 'สระแก้ว   ', 5),
('19', '30', 'นครราชสีมา   ', 3),
('2', '11', 'สมุทรปราการ   ', 2),
('20', '31', 'บุรีรัมย์   ', 3),
('21', '32', 'สุรินทร์   ', 3),
('22', '33', 'ศรีสะเกษ   ', 3),
('23', '34', 'อุบลราชธานี   ', 3),
('24', '35', 'ยโสธร   ', 3),
('25', '36', 'ชัยภูมิ   ', 3),
('26', '37', 'อำนาจเจริญ   ', 3),
('27', '39', 'หนองบัวลำภู   ', 3),
('28', '40', 'ขอนแก่น   ', 3),
('29', '41', 'อุดรธานี   ', 3),
('3', '12', 'นนทบุรี   ', 2),
('30', '42', 'เลย   ', 3),
('31', '43', 'หนองคาย   ', 3),
('32', '44', 'มหาสารคาม   ', 3),
('33', '45', 'ร้อยเอ็ด   ', 3),
('34', '46', 'กาฬสินธุ์   ', 3),
('35', '47', 'สกลนคร   ', 3),
('36', '48', 'นครพนม   ', 3),
('37', '49', 'มุกดาหาร   ', 3),
('38', '50', 'เชียงใหม่   ', 1),
('39', '51', 'ลำพูน   ', 1),
('4', '13', 'ปทุมธานี   ', 2),
('40', '52', 'ลำปาง   ', 1),
('41', '53', 'อุตรดิตถ์   ', 1),
('42', '54', 'แพร่   ', 1),
('43', '55', 'น่าน   ', 1),
('44', '56', 'พะเยา   ', 1),
('45', '57', 'เชียงราย   ', 1),
('46', '58', 'แม่ฮ่องสอน   ', 1),
('47', '60', 'นครสวรรค์   ', 2),
('48', '61', 'อุทัยธานี   ', 2),
('49', '62', 'กำแพงเพชร   ', 2),
('5', '14', 'พระนครศรีอยุธยา   ', 2),
('50', '63', 'ตาก   ', 4),
('51', '64', 'สุโขทัย   ', 2),
('52', '65', 'พิษณุโลก   ', 2),
('53', '66', 'พิจิตร   ', 2),
('54', '67', 'เพชรบูรณ์   ', 2),
('55', '70', 'ราชบุรี   ', 4),
('56', '71', 'กาญจนบุรี   ', 4),
('57', '72', 'สุพรรณบุรี   ', 2),
('58', '73', 'นครปฐม   ', 2),
('59', '74', 'สมุทรสาคร   ', 2),
('6', '15', 'อ่างทอง   ', 2),
('60', '75', 'สมุทรสงคราม   ', 2),
('61', '76', 'เพชรบุรี   ', 4),
('62', '77', 'ประจวบคีรีขันธ์   ', 4),
('63', '80', 'นครศรีธรรมราช   ', 6),
('64', '81', 'กระบี่   ', 6),
('65', '82', 'พังงา   ', 6),
('66', '83', 'ภูเก็ต   ', 6),
('67', '84', 'สุราษฎร์ธานี   ', 6),
('68', '85', 'ระนอง   ', 6),
('69', '86', 'ชุมพร   ', 6),
('7', '16', 'ลพบุรี   ', 2),
('70', '90', 'สงขลา   ', 6),
('71', '91', 'สตูล   ', 6),
('72', '92', 'ตรัง   ', 6),
('73', '93', 'พัทลุง   ', 6),
('74', '94', 'ปัตตานี   ', 6),
('75', '95', 'ยะลา   ', 6),
('76', '96', 'นราธิวาส   ', 6),
('77', '97', 'บึงกาฬ', 3),
('8', '17', 'สิงห์บุรี   ', 2),
('9', '18', 'ชัยนาท   ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `midified` datetime DEFAULT NULL,
  `midifiedby` varchar(100) DEFAULT NULL,
  `isposwindow` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `isactive`, `description`, `created`, `createdby`, `midified`, `midifiedby`, `isposwindow`) VALUES
('3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'พนักงานขาย', 'Y', '', '2018-03-24 10:56:08', 'admin admin', NULL, NULL, 'N'),
('ccce1b2c-5926-4612-8792-775ed8c11033', 'ผู้จัดการสาขา', 'Y', '', '2018-05-22 08:39:02', 'กานต์ ทองยิ้ม', NULL, NULL, 'N'),
('e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'admin', 'Y', '', '2018-03-10 06:42:26', 'กานต์ ทองยิ้ม', NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `role_accesses`
--

CREATE TABLE `role_accesses` (
  `id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `action_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_accesses`
--

INSERT INTO `role_accesses` (`id`, `role_id`, `action_id`, `created`, `createdby`) VALUES
('02ec8b0c-8642-4a51-adbc-9d09a50d41bf', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cae07239-bdcf-4e60-ab95-941d483c3028', '2018-05-22 08:45:37', 'uan'),
('035b3d34-2461-4932-bb45-13c3b44c14aa', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '49fcaede-e452-450d-8781-cdbe2eb13836', '2018-05-22 08:45:37', 'uan'),
('03881a99-e654-4609-9ff3-1fc04bdec197', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ddb9e810-dadf-4541-a569-845c1ff4a3ac', '2018-05-22 08:45:36', 'uan'),
('03c74702-75ee-48aa-a35c-ae87f14c6a11', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '383622c8-d6ac-4934-8b9b-d0a012be179c', '2018-06-30 10:52:33', 'uan'),
('0431a90d-1b4e-4b8b-870d-7ab2e5305b6b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b347f3c3-20c3-4f18-90c1-7cc34e1f4ade', '2018-06-30 10:52:34', 'uan'),
('046f8a60-e093-4259-afe3-1266d1c77843', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0e0e06da-117e-40aa-8332-504f988200a5', '2018-06-30 10:52:39', 'uan'),
('04b845d1-52e7-42c8-92e4-ab6213514b3d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c582501b-6069-4462-a188-be9ecf07342c', '2018-06-30 10:52:33', 'uan'),
('04c54171-3328-4f62-87f9-3d6a8f951d72', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a6298301-d66f-42d1-8a6f-ca355f5740a7', '2018-06-30 10:52:37', 'uan'),
('05bce40b-a0ab-4b47-af9a-99455ff37269', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e904f3bb-ae98-4d1e-82b9-740c33988b3b', '2018-05-22 08:45:36', 'uan'),
('05c33b1b-af4b-422e-8c10-c82969be6de3', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f50f9b7d-b688-477f-952a-5119e72c6455', '2018-06-30 10:54:41', 'uan'),
('05e7fb31-e601-4c11-ab7f-86323344b09a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '29d45c81-49da-4a56-b337-6f3ced342652', '2018-06-30 10:54:40', 'uan'),
('05fd8d4d-3953-4f07-ab5a-69df52556639', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '268e8b71-d97e-49b8-a762-39b06368a14e', '2018-05-22 08:45:36', 'uan'),
('060c2359-e3e8-4d25-941f-711c1a33c4b2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8ea840e7-9452-4688-af4a-60e7540460a4', '2018-05-22 08:45:37', 'uan'),
('061887ab-7c31-4fbc-9ff9-cae161c76c3f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '72d5a13e-12a2-4642-96b0-d5742ab2fef1', '2018-06-30 10:52:35', 'uan'),
('06318d7f-1f64-4130-9074-bf2bcb710155', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e9d46832-82b5-4ead-867b-36d6f7ff0cee', '2018-06-30 10:52:39', 'uan'),
('06343c9d-dd0c-4988-aabb-f50e1db566fc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a8b6468d-3b79-47bd-8f2b-4ec63a0489d7', '2018-06-30 10:52:34', 'uan'),
('06ac9f5f-16f8-46ec-bc94-9b81c21d280c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd73d0cc7-13a9-4187-90ad-ba377fee0bdb', '2018-06-30 10:52:36', 'uan'),
('06e86fae-0131-4fca-99b8-87211dd88090', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '576a63e6-4f9c-46d7-abc7-97f0dfb1634d', '2018-05-22 08:45:37', 'uan'),
('078320bd-f83b-459d-aeff-28abdfcbe0b5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6a8fcfb2-4665-4e61-92de-3f9de6e40ca2', '2018-06-30 10:54:42', 'uan'),
('07c52462-a8f9-4315-8ddc-548516bfd071', 'ccce1b2c-5926-4612-8792-775ed8c11033', '13b92d9f-27d7-4023-8d9a-b8e176e8585a', '2018-06-30 10:54:39', 'uan'),
('083063dd-4c63-4066-8c01-9405e3d09de8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '42b1123a-f0c0-4351-a35b-cdd0fd9764b8', '2018-06-30 10:52:37', 'uan'),
('0933c5bf-3417-4f98-881a-28e05663fb7b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f78a01df-dc87-4943-9c3b-f059ff78f1e7', '2018-06-30 10:52:38', 'uan'),
('0990a4c0-4b87-42ca-85fc-b3311ec69369', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', '2018-06-30 10:54:43', 'uan'),
('09cafd1a-16c4-478b-9077-6c1387ae46c7', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '65edd09e-c611-4f6e-8750-3ad23eaf688a', '2018-05-22 08:45:36', 'uan'),
('0bfbe37d-4a4f-4bf4-a349-9f4f388f459a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', '2018-06-30 10:52:39', 'uan'),
('0c152a28-7e7b-41f0-858f-4291a3e54f7a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-06-30 10:52:34', 'uan'),
('0ca349e9-63f1-4c5a-8316-cd8c8520fad5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0060f68a-8aaf-4ac4-8851-1f29ad0834d3', '2018-06-30 10:54:40', 'uan'),
('0cb09daa-89ba-4e8d-8a79-71045898e4eb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '592b10fe-2110-4cb8-bca7-d0e1f1bf0149', '2018-06-30 10:54:41', 'uan'),
('0d836190-933b-402b-9f6c-6db99ee41b0e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd7801bfc-a77c-43f3-aa5f-f4fe685f1da2', '2018-05-22 08:45:36', 'uan'),
('0ea0116c-4d5a-4024-a52e-a54c78bf815e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '48e57212-9886-4cc0-998b-84fd1a6a0e22', '2018-06-30 10:54:41', 'uan'),
('0f014ade-3bea-4da6-bdd7-14292a81723e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '310c6dbb-6c62-4531-bb1a-41e639f60448', '2018-06-30 10:54:43', 'uan'),
('0fa2a4c1-5feb-4f97-89f8-5b749d8fe864', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '310c6dbb-6c62-4531-bb1a-41e639f60448', '2018-06-30 10:52:39', 'uan'),
('101507a1-1e2e-4293-9f61-7c12a5b48b93', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2c10fa21-c1fd-430b-bd5a-38f0881b4614', '2018-06-30 10:54:39', 'uan'),
('1029dca6-15e1-4fe3-ad0f-fc97bf6f85ce', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7d9ead39-5c5c-4633-93b3-544172f751f9', '2018-06-30 10:52:33', 'uan'),
('10cd486a-8d0c-46be-8226-cc21c825d5fd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f50f9b7d-b688-477f-952a-5119e72c6455', '2018-05-22 08:45:37', 'uan'),
('11078cd2-2cdc-4ede-998c-e2d297720800', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '18959738-8b40-44ed-9fc7-289ba2b406c9', '2018-05-22 08:45:36', 'uan'),
('110d38ff-3af6-4533-a622-8012a484688e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd1184ebf-bce8-48bb-b685-5e17fe447915', '2018-06-30 10:52:35', 'uan'),
('111975e2-20c1-41dd-894d-8d04fecaadac', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', '2018-05-22 08:45:37', 'uan'),
('11390ba3-d0c9-4bed-b538-ddb242f8f1ba', 'ccce1b2c-5926-4612-8792-775ed8c11033', '20f4bebf-5c04-44b5-9e27-f15a7e344311', '2018-06-30 10:54:41', 'uan'),
('113e224c-fd48-4c9e-9e4b-3c1dc6d2c8d6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3b822935-6262-4569-ae18-363a6d75b96f', '2018-06-30 10:52:35', 'uan'),
('124169e1-1417-470e-96c5-ad9a197848da', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3dd2dcbe-8c5f-476e-a1cd-7cdba1ec4ead', '2018-06-30 10:52:39', 'uan'),
('1274dcbe-da42-40f0-b1a3-7536ae009b2a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ce0fc131-de71-4b8d-8dd7-cc42111c84d8', '2018-06-30 10:54:40', 'uan'),
('13457233-6499-4dd5-90ae-b40dbeca09b8', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6f82d8d1-5046-4bfb-8bae-853fb8487bbc', '2018-06-30 10:54:39', 'uan'),
('13ce2eb9-cc4e-4b60-a4eb-9e7dbf066b64', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cd1b4962-c3ae-4033-babc-a7b750d8dd63', '2018-05-22 08:45:37', 'uan'),
('13f4880b-b30e-45ed-9af2-5e784b2b0eda', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '132d83ae-7476-49e3-a086-6c7def73f62c', '2018-06-30 10:52:35', 'uan'),
('14481307-1ca3-409d-85f2-f594d5f8bc3f', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ac28025f-2c56-480c-816d-3c31004dd016', '2018-06-30 10:54:43', 'uan'),
('145f222f-9f26-4d88-85c4-e3d73986ff26', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4d7f7ee4-3311-4e3e-8653-243d278151cd', '2018-05-22 08:45:37', 'uan'),
('1538d460-4bd6-4b39-9011-64025a7299fa', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ddb9e810-dadf-4541-a569-845c1ff4a3ac', '2018-06-30 10:54:41', 'uan'),
('15c2f143-f1b2-4b49-8e8f-4019965f5de6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '164a80a0-4a8e-4ecf-a04c-24433e60ca7b', '2018-06-30 10:52:34', 'uan'),
('15d234e8-8b08-4021-be59-6b95e92c7175', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', '2018-06-30 10:52:35', 'uan'),
('15d56a06-8878-4d48-bc90-6e0e05c18d06', 'ccce1b2c-5926-4612-8792-775ed8c11033', '50ddf455-ed13-4efc-a740-96bb25cff7c4', '2018-06-30 10:54:42', 'uan'),
('15ff8524-c4a3-4758-9383-fd82b73a33e7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '19147938-1594-4207-aef5-29b0d0d63b66', '2018-06-30 10:52:39', 'uan'),
('1703adc0-eec1-499e-a176-a4240dde79b7', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5a950057-6c85-4b99-a6b4-3ed76d48f2b4', '2018-06-30 10:54:42', 'uan'),
('171b49b1-584b-4f79-92a6-386b828f46fc', 'ccce1b2c-5926-4612-8792-775ed8c11033', '605442d9-2134-4ff9-b901-28b9ae581053', '2018-06-30 10:54:39', 'uan'),
('17311a8b-bb22-4d90-bc49-e25a2cd44cf1', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-03-12 10:46:38', 'uan'),
('176932c1-3db8-4278-a07d-a383baf20540', 'ccce1b2c-5926-4612-8792-775ed8c11033', '31199fea-51ff-4093-9034-e1b491ee36f8', '2018-06-30 10:54:43', 'uan'),
('1816b8c2-eb75-4f9b-85e2-389dc52485c8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', '2018-05-22 08:45:36', 'uan'),
('182e7113-e7c6-467a-87f6-d54da7d8d8ae', 'ccce1b2c-5926-4612-8792-775ed8c11033', '59e8ff71-6b0d-4b5d-b257-d8fbd88a0d54', '2018-06-30 10:54:39', 'uan'),
('1877b709-1587-477d-805b-a9b31da9b451', 'ccce1b2c-5926-4612-8792-775ed8c11033', '28cd6cd8-06c6-47de-894e-c47dfeb23b48', '2018-06-30 10:54:42', 'uan'),
('18d058ef-cebb-4dc1-bbd8-0e50d839a1ab', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a522eb09-4bf4-471e-8532-2b9276491749', '2018-06-30 10:54:40', 'uan'),
('18fdea9e-1f4d-473a-a737-d343248b3d79', 'ccce1b2c-5926-4612-8792-775ed8c11033', '132d83ae-7476-49e3-a086-6c7def73f62c', '2018-06-30 10:54:40', 'uan'),
('198eba8f-3d33-41d9-8339-69c0d5da21e9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '34450fd0-c16f-497f-8826-a30e30d47665', '2018-06-30 10:54:41', 'uan'),
('19a049ff-00a1-4e8f-a57f-d102d17d6f18', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '365dab62-1d78-44e9-8386-25625f28cd61', '2018-06-30 10:52:39', 'uan'),
('1a1c4685-2f7e-4ce1-beda-a44121dd3850', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '960a0402-07f4-4c43-811d-e7af9284ddfa', '2018-06-30 10:52:38', 'uan'),
('1a229e8a-5d09-49bd-97d6-7100a4b0a6d4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '59e8ff71-6b0d-4b5d-b257-d8fbd88a0d54', '2018-06-30 10:52:33', 'uan'),
('1a3ab0d9-fae0-4131-ab0f-812529776138', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1ee38ccf-44ac-42cc-ae45-3beef54268a7', '2018-06-30 10:52:39', 'uan'),
('1ad2d895-4770-4dad-92aa-ed73f26c1ecc', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e65cefee-c655-42b4-8429-16f9c8d91c2f', '2018-06-30 10:54:43', 'uan'),
('1b4469c5-03fe-4333-9dc1-6d69e451b078', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0f7601f8-df50-4503-bf1d-cdbc512e14dd', '2018-05-22 08:45:37', 'uan'),
('1b5eb7e8-26fb-43e4-913f-ff32decca1eb', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cd725882-004c-4dd2-b780-a501bb6463bf', '2018-06-30 10:54:42', 'uan'),
('1b976b37-e105-42c4-a585-11496a6855ea', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f7b28d1a-6056-4077-873b-afa244b643d7', '2018-06-30 10:54:42', 'uan'),
('1c451c5e-4b78-45b3-b8db-e5687d9a39db', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', '2018-06-30 10:54:43', 'uan'),
('1e305dcb-2719-492a-bf56-73a1cb839a7a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '960a0402-07f4-4c43-811d-e7af9284ddfa', '2018-06-30 10:54:42', 'uan'),
('1ec2021b-c47e-4706-8196-bae2524ece16', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1e99211d-265e-4822-8006-b034c36ec02e', '2018-06-30 10:52:38', 'uan'),
('1fb64421-da60-43f0-af5b-c53b3b60ee1d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd13c37bd-e808-408f-b3fa-27e75474c348', '2018-05-22 08:45:37', 'uan'),
('20157642-2009-4c09-a03e-f9a93172e606', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3c6bf439-cddf-42bd-9bac-39d76bf3afc0', '2018-05-22 08:45:37', 'uan'),
('20468fa2-4921-4727-9096-c9a1384b1d5d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '689ca1da-ebea-494b-98a1-1a819903fde9', '2018-06-30 10:54:41', 'uan'),
('20480875-37ef-4f38-8cb7-8192a0908432', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2fa30fee-61ea-4ae1-bd06-b603730a6885', '2018-06-30 10:52:39', 'uan'),
('2111b5c2-6e36-4c84-a3d8-5fbb42d24c0f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1eaf84c2-2d82-428c-ab0c-cd118cdc9579', '2018-06-30 10:52:36', 'uan'),
('2160cf50-eda7-46ff-b29a-29554b2dae45', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-05-22 08:45:36', 'uan'),
('2251a349-c307-4ab6-96b7-4edb59ebb526', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1acd38be-8dcb-45f8-ad82-0903631900f1', '2018-06-30 10:52:33', 'uan'),
('225d034a-1dc1-41dc-9ccb-6c676bd0f9f5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', '2018-06-30 10:52:37', 'uan'),
('225e8fdb-5556-4f7f-9b3d-8731358503c8', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ae142032-4b2b-4c3b-9d07-cc5891262dee', '2018-06-30 10:54:41', 'uan'),
('227ca5d7-c3a3-4181-a67c-f1c48933a211', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7cecc67d-6458-4415-9668-bb11bbba94e8', '2018-05-22 08:45:37', 'uan'),
('22a5f801-c9fe-4c04-b84b-d15c13abb6f6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', '2018-05-22 08:45:37', 'uan'),
('22fa4d2f-9ced-46d3-bc38-e20184431c39', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9742de93-52c5-4af6-8d8f-f82b43d89ba6', '2018-06-30 10:52:36', 'uan'),
('23313077-6f62-40ab-8451-544a5ed96757', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '592b10fe-2110-4cb8-bca7-d0e1f1bf0149', '2018-05-22 08:45:37', 'uan'),
('24a1cc1a-718b-4e8b-9cc2-8dba34cb6c89', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e67e3bee-325d-40e4-944b-e3adbaad7276', '2018-06-30 10:54:41', 'uan'),
('252fd160-2c09-4ec7-8a94-b7d3553b6c37', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8ea2488f-1a22-448f-8edc-fe7ebd763db7', '2018-06-30 10:52:34', 'uan'),
('255fb990-bdca-4ac7-b8e7-cc31dfc06ea6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '48e57212-9886-4cc0-998b-84fd1a6a0e22', '2018-05-22 08:45:37', 'uan'),
('25dc2e75-5f51-42e9-a168-da824fcce474', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cae07239-bdcf-4e60-ab95-941d483c3028', '2018-06-30 10:52:36', 'uan'),
('25e328a9-29a6-4156-99c8-b1420e43c574', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0060f68a-8aaf-4ac4-8851-1f29ad0834d3', '2018-06-30 10:52:34', 'uan'),
('26e900d8-9f3e-4a3a-9121-3da84ac0a234', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '83b1b151-7f24-4b3a-b683-7b8cc72c5b1f', '2018-06-30 10:52:35', 'uan'),
('26e9d1ce-f514-44e6-a3f8-339d5b38f648', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '22253677-dbf0-4db4-a4e8-9f01ee49cb25', '2018-05-22 08:45:37', 'uan'),
('26eb1986-d13d-4bb3-9522-92d270d99b2c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7663bc12-ff3b-4cb3-bc21-90edae293940', '2018-05-22 08:45:37', 'uan'),
('271086d0-56f6-4334-9cf9-761aab6b3384', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e65cefee-c655-42b4-8429-16f9c8d91c2f', '2018-06-30 10:52:39', 'uan'),
('2824a59e-a324-4d7f-bd09-36ce88654f31', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '50ddf455-ed13-4efc-a740-96bb25cff7c4', '2018-05-22 08:45:37', 'uan'),
('2875721e-b4ec-4087-b04f-de86e5940a02', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a362e708-187f-4b7e-b0e6-ba09cf557164', '2018-06-30 10:54:42', 'uan'),
('28a0b9a4-8ef2-44c4-96d8-24d6d986b006', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '395db1e2-2a6b-47fe-9888-79d052f2f78f', '2018-06-30 10:52:34', 'uan'),
('28a72245-8c6c-462f-90b5-c9a681cb1f64', '0052375d-f717-4f28-b0ef-297d6c2a873b', '5e4ae09f-beca-4229-bd56-f053e2a9bc70', '2018-02-26 09:44:12', 'uan'),
('28bbb9de-aef4-46e6-a886-1e71c617a730', '0052375d-f717-4f28-b0ef-297d6c2a873b', '1ee38ccf-44ac-42cc-ae45-3beef54268a7', '2018-02-26 09:44:12', 'uan'),
('28f8efea-b44f-4cb3-8a4d-80c9565d28de', 'ccce1b2c-5926-4612-8792-775ed8c11033', '55712a15-826f-4d08-af31-94de946a0451', '2018-06-30 10:54:42', 'uan'),
('2902882f-3a7e-4207-bf48-d247a65edeec', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b8e4cfc7-6629-492a-944b-949c3b947831', '2018-06-30 10:52:37', 'uan'),
('29a1efdc-5453-4d9f-8e8e-53dd1810cfd6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a46bf3be-a18e-4e6c-bb27-cba4cabc81f2', '2018-06-30 10:52:33', 'uan'),
('29b1a91b-00ac-4d45-a93a-54c831a9d427', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd7801bfc-a77c-43f3-aa5f-f4fe685f1da2', '2018-06-30 10:52:36', 'uan'),
('29cf7df7-9193-4715-b7c3-220d104c5f80', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4cdb0517-c109-4634-acc7-39f4c33d6fec', '2018-06-30 10:52:37', 'uan'),
('2a1993f9-0738-49cf-b224-6e08ff473f6b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b72a22bc-e177-4b07-afca-0c84644d81ba', '2018-06-30 10:52:39', 'uan'),
('2a346f4e-b6b2-4a5b-a3ed-4f5e8b63e1b3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f6523a74-f023-46fa-8f82-0f0008012a65', '2018-06-30 10:52:34', 'uan'),
('2adeb674-2ceb-4831-91c9-cdd9ae5b2b3d', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd73d0cc7-13a9-4187-90ad-ba377fee0bdb', '2018-06-30 10:54:41', 'uan'),
('2b8c1718-0ac8-4626-9a27-691b19a0dba2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '263250e3-e046-4580-9299-9ac9b3e69aaf', '2018-05-22 08:45:37', 'uan'),
('2bc9e063-5788-48cc-9082-5ec2fb1aa801', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3f118aba-5a1d-4020-b461-6d580e263513', '2018-06-30 10:52:37', 'uan'),
('2bd7f541-77e7-4861-8d4e-fcd8567ade34', 'ccce1b2c-5926-4612-8792-775ed8c11033', '210c813b-c607-4242-83a0-b2be186ebd7f', '2018-06-30 10:54:42', 'uan'),
('2c1031d3-e8aa-47ca-a89f-cdb0add4ca73', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-05-22 08:45:36', 'uan'),
('2d1aab2e-6fd0-40a8-aaf7-d44c81a24a0f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-06-30 10:54:40', 'uan'),
('2d281253-6c15-41ff-ba98-3dfa1d562f29', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0f7601f8-df50-4503-bf1d-cdbc512e14dd', '2018-06-30 10:52:38', 'uan'),
('2d830054-32ec-4003-b147-34d069837fa9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c4cd3b72-94fd-4b72-9f21-6eff49bbc384', '2018-06-30 10:52:34', 'uan'),
('2dcd474b-4a4b-48a9-8fd0-1c06a4a33600', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ddb9e810-dadf-4541-a569-845c1ff4a3ac', '2018-06-30 10:52:36', 'uan'),
('2e8f1bc4-3d7e-49be-996e-8ceed175b00a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a6298301-d66f-42d1-8a6f-ca355f5740a7', '2018-06-30 10:54:42', 'uan'),
('2f36bb19-3173-4aca-bfcc-b9e5dc844d91', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd3e22c6f-15b7-4e29-8512-c6775b6343e8', '2018-06-30 10:54:39', 'uan'),
('3013cd7b-b767-4742-96d3-8063a8b963ca', '0052375d-f717-4f28-b0ef-297d6c2a873b', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-02-26 09:44:12', 'uan'),
('304ce89a-cc5d-4780-8fa7-c45639054b6e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0bae60f9-f3a5-4203-ad7e-e77632327f9f', '2018-06-30 10:52:35', 'uan'),
('3054ef29-702f-4f57-ba1d-f22b37fc3b04', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e30ef40e-200c-4564-bf0a-182e77f5f381', '2018-06-30 10:52:36', 'uan'),
('31a5a05c-ba31-4fdd-a9bf-af0bee99cc17', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'edc23445-d3be-4e6b-a5ff-7689dd603ea6', '2018-06-30 10:52:37', 'uan'),
('326269c9-80e9-4acc-bbc1-f099ac528682', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '28cd6cd8-06c6-47de-894e-c47dfeb23b48', '2018-06-30 10:52:39', 'uan'),
('33b857d2-91f7-4728-ae59-16e6f490d0ea', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1e3a1292-9d95-474a-9ca7-8deb08a89390', '2018-06-30 10:52:37', 'uan'),
('347fd7aa-4a2a-48c4-ad41-f5a4bbc9556d', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'fc701433-0289-4ec0-9d14-c75b383d8b25', '2018-02-26 09:44:12', 'uan'),
('3499c353-9fbc-4a03-a8c3-34b4f9fbfad3', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '571432a8-0fbb-4bcf-b8ba-7f4d4998c864', '2018-05-22 08:45:37', 'uan'),
('34e2596a-f647-43c3-bab0-d8c1397cc7ba', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0a623bf2-9517-47ba-a3f1-536665e1c334', '2018-05-22 08:45:37', 'uan'),
('3501aa93-2187-449f-a287-b656bd24c7cd', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', '2018-06-30 10:54:40', 'uan'),
('35ab3703-d036-48ca-9599-7dd91be5e5bf', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '34450fd0-c16f-497f-8826-a30e30d47665', '2018-05-22 08:45:37', 'uan'),
('35c9c5bd-6173-4866-8fb6-7eb16db15b3c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f1a8f89f-6332-4a1c-a5dc-a37605359cdd', '2018-06-30 10:54:41', 'uan'),
('36564880-59ca-4c59-89ed-057ace1479a2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3324bc8d-a99f-4fb6-b73e-151473198595', '2018-06-30 10:52:38', 'uan'),
('369f3cd1-3812-4589-a196-73bdd23c05a2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '576a63e6-4f9c-46d7-abc7-97f0dfb1634d', '2018-06-30 10:52:36', 'uan'),
('36f3d4f5-d6ff-41b6-ba2b-f6fa7ee6c2e7', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd7bc572c-4ec5-4450-af5b-39ecfe1d726f', '2018-06-30 10:54:41', 'uan'),
('37240d61-37c8-414e-97e4-dc9e16f57ae5', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9352fa28-88c6-40fb-905a-58939086e257', '2018-05-22 08:45:36', 'uan'),
('384bf100-1315-4bef-a341-238e0b3f9d42', '0052375d-f717-4f28-b0ef-297d6c2a873b', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-02-26 09:44:12', 'uan'),
('39a06a5d-43b7-458e-98e5-761dae230b6b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd7801bfc-a77c-43f3-aa5f-f4fe685f1da2', '2018-06-30 10:54:41', 'uan'),
('3a20da54-d714-48f0-b94c-e64dc54cd3f9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', '2018-06-30 10:52:36', 'uan'),
('3b50ea12-8820-4842-b731-d656fa755d06', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd3e22c6f-15b7-4e29-8512-c6775b6343e8', '2018-06-30 10:52:33', 'uan'),
('3c1a8990-3731-4876-8489-63ea7c4b245b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a6f6307e-7019-4e29-b693-42aa7778f4e0', '2018-05-22 08:45:36', 'uan'),
('3c3f3517-79cf-4548-bff4-f72a7861d89a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '85348380-adda-4288-ab05-899daaae908b', '2018-06-30 10:52:35', 'uan'),
('3c56b11f-5733-4707-9ff1-0bfa7f9be475', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-06-30 10:52:35', 'uan'),
('3d1ad790-6517-43c4-a971-2a61e6b9afa9', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e65cefee-c655-42b4-8429-16f9c8d91c2f', '2018-05-22 08:45:37', 'uan'),
('3d536232-876d-4376-a64c-e6fbf6cb7c5e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3827a831-5488-4597-8536-e75104c2396d', '2018-05-22 08:45:37', 'uan'),
('3dfcb145-a296-4f28-8b5b-d21094195d84', '0052375d-f717-4f28-b0ef-297d6c2a873b', '365791c1-6313-4028-84d5-f6c7bbf55bbc', '2018-02-26 09:44:12', 'uan'),
('3e015a49-6615-4f2d-8201-92642bc148e0', '0052375d-f717-4f28-b0ef-297d6c2a873b', '4eb4e924-a85c-4ecc-a639-304d1b26e65d', '2018-02-26 09:44:12', 'uan'),
('3e339591-858f-4480-bd96-08b4ee3ad58f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ea463ce5-b72a-4710-9d08-b1d27e73093f', '2018-05-22 08:45:37', 'uan'),
('3e918510-0df1-4863-8604-f8828f770c60', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '74c9da25-d26a-4bdc-a4ad-f529428946cb', '2018-05-22 08:45:36', 'uan'),
('3ea14b26-c800-401d-8eea-8805c9f04ebb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '74b0584d-4276-45d8-829c-70776ab33a4f', '2018-06-30 10:54:42', 'uan'),
('3ec7a31b-87df-4140-a8bc-86bc9d820045', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', '2018-06-30 10:54:41', 'uan'),
('3ef80057-8800-42e3-ab7d-6d216cb90686', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', '2018-06-30 10:54:41', 'uan'),
('3f178c6a-b965-488d-b259-d05e1bdc1cf4', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8ea840e7-9452-4688-af4a-60e7540460a4', '2018-06-30 10:54:41', 'uan'),
('3f9c60bf-7ee1-4461-a3b4-3b030a458607', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd7bc572c-4ec5-4450-af5b-39ecfe1d726f', '2018-06-30 10:52:36', 'uan'),
('4082d043-5012-4d76-898b-a166862c2fcb', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', '2018-05-22 08:45:36', 'uan'),
('40b0c2db-6fc2-4524-a8b3-bbcebdc4c36a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '263250e3-e046-4580-9299-9ac9b3e69aaf', '2018-06-30 10:52:39', 'uan'),
('40f1d98d-4cc2-4ede-bca9-48bea68dc94c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1c26d965-42f7-4c9d-af5b-307c4d3a00bd', '2018-05-22 08:45:37', 'uan'),
('41391067-247d-4e39-a44d-517c992cf70f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3f118aba-5a1d-4020-b461-6d580e263513', '2018-05-22 08:45:37', 'uan'),
('4196b33a-e097-41e7-afd8-831f88e81482', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd51a994d-7649-4ef1-9bdb-1980a4eb4b60', '2018-05-22 08:45:36', 'uan'),
('43633082-9d01-4d04-b19c-46fde9fdf796', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '268e8b71-d97e-49b8-a762-39b06368a14e', '2018-06-30 10:52:35', 'uan'),
('43664b7c-c20f-492a-87c7-546bf3e7202e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0e0e06da-117e-40aa-8332-504f988200a5', '2018-05-22 08:45:37', 'uan'),
('441e0224-7cf3-435f-b1ad-668651e31788', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3f118aba-5a1d-4020-b461-6d580e263513', '2018-06-30 10:54:41', 'uan'),
('44daab05-5bf2-4665-861f-fce07e5078bb', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a6f6307e-7019-4e29-b693-42aa7778f4e0', '2018-06-30 10:52:33', 'uan'),
('44ddd4a0-39fb-46be-a9d4-4abed5520f4d', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd91333c0-3dd0-415f-bb18-06482c0c1094', '2018-06-30 10:54:40', 'uan'),
('44de575b-fb59-4dc3-8551-6466e68d3644', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', '2018-05-22 08:45:36', 'uan'),
('450a301c-376f-4667-8aef-0312db42407e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'eedf5420-ecb7-42b0-966f-76916b24af6d', '2018-05-22 08:45:36', 'uan'),
('450e95c2-b75c-4371-865b-8c74e8b20fb5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd13c37bd-e808-408f-b3fa-27e75474c348', '2018-06-30 10:52:36', 'uan'),
('45c9d02f-fa91-4b26-8266-70e057a95e04', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7acdd8f8-3587-4060-8c11-159e271162bd', '2018-06-30 10:54:41', 'uan'),
('45cf833a-f407-4e54-a6a1-44a63d9eaa74', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3bfc749a-0b34-4a92-acec-b8331f0e210a', '2018-06-30 10:54:42', 'uan'),
('45d35903-49fa-4d72-8a53-ab297ad8f884', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '22253677-dbf0-4db4-a4e8-9f01ee49cb25', '2018-06-30 10:52:37', 'uan'),
('45dc9492-0b8d-433f-8625-e17624a12e8f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', '2018-06-30 10:52:34', 'uan'),
('45f2869f-af76-4cd5-b057-548466c5217c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ce0fc131-de71-4b8d-8dd7-cc42111c84d8', '2018-05-22 08:45:36', 'uan'),
('463b6fc3-c278-4845-8889-20c066f42abc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b65a1d21-89a7-411e-97b0-484ea81a749a', '2018-06-30 10:52:36', 'uan'),
('46a62d65-2209-40b6-a49c-f6d4132f76c7', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c8197eab-d634-4caf-a289-19e770dd7975', '2018-06-30 10:54:42', 'uan'),
('46d0c6ac-44a0-46ba-ab71-93e7e1ba0765', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', '2018-06-30 10:54:40', 'uan'),
('4707cf35-65d4-48af-9ca9-e0665642e08b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '318017c3-f873-42ab-80da-8c788a4ec931', '2018-06-30 10:52:38', 'uan'),
('47db2eb4-e7b3-4b35-a707-14a9bb6d8989', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '31199fea-51ff-4093-9034-e1b491ee36f8', '2018-05-22 08:45:37', 'uan'),
('48a46778-484d-4932-a4c5-606cd4227f71', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '41b9bd12-d501-48d5-a17d-12ed249ffe16', '2018-06-30 10:52:37', 'uan'),
('49a36390-6014-4a77-baac-6eb6dac90454', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'de366403-b454-4b0b-b96b-ff0aaa351251', '2018-06-30 10:54:39', 'uan'),
('49a59570-24aa-4bcf-b5dd-11fd8358a339', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0e6c4588-a43b-40c1-beca-87a2675fffac', '2018-06-30 10:54:43', 'uan'),
('49bb0b95-0c66-49a2-8ab8-cb4e0e886d3f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', '2018-06-30 10:54:42', 'uan'),
('49dcd2a9-e3d8-42b5-b3bc-3fcdfa813152', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2a4f379f-1471-43af-be2b-f9ef6dd9f713', '2018-06-30 10:52:36', 'uan'),
('4a2e35d6-1a19-4be9-b26c-4aaba0798573', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '124e1dc1-412e-43e0-877f-e506193406aa', '2018-05-22 08:45:36', 'uan'),
('4a35b3cd-1514-45af-89c3-3d5d24b51887', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7eaff946-7b78-4faf-864b-4f50efde10c0', '2018-05-22 08:45:37', 'uan'),
('4a8991df-1bff-441f-a52a-061328c44ad8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', '2018-06-30 10:52:35', 'uan'),
('4b0d2f87-d3ca-4638-aee3-a92917712da8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '89d52853-e508-4c1e-a8fc-d6fef9f2ef37', '2018-06-30 10:52:36', 'uan'),
('4b2d2ff7-00a7-4886-af2c-7c54b2c795b5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', '2018-06-30 10:54:41', 'uan'),
('4b546609-0350-4215-af7c-4a72612d1d7f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4229bec5-f7ab-4f33-9b07-3cfce62a46cb', '2018-06-30 10:54:40', 'uan'),
('4d498126-47b4-4784-8711-bac43aaa1598', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '50ddf455-ed13-4efc-a740-96bb25cff7c4', '2018-06-30 10:52:39', 'uan'),
('4de2809d-6338-44d0-adaa-0c1788382957', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ea409acc-3b37-4ec6-84c4-63f90f460d93', '2018-05-22 08:45:37', 'uan'),
('4ecef9b8-af1f-4253-afe4-f8d84c5e1ac0', '0052375d-f717-4f28-b0ef-297d6c2a873b', '210c813b-c607-4242-83a0-b2be186ebd7f', '2018-02-26 09:44:12', 'uan'),
('4ee5a33f-c63e-423d-842f-7bca5440e9e1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9742de93-52c5-4af6-8d8f-f82b43d89ba6', '2018-06-30 10:54:41', 'uan'),
('4eede13e-72a0-4cf0-8f22-b666d73d589d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e1903505-1a36-402a-8560-463a86f0f0d0', '2018-06-30 10:52:37', 'uan'),
('4f82e436-bdf3-4361-bd00-47f4ca445b1e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f1a8f89f-6332-4a1c-a5dc-a37605359cdd', '2018-06-30 10:52:36', 'uan'),
('4f945ed3-3b89-497b-9ba1-52f05c3a07b5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4d7f7ee4-3311-4e3e-8653-243d278151cd', '2018-06-30 10:54:42', 'uan'),
('503053ee-61be-415f-836d-61a8f7c273a4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cd725882-004c-4dd2-b780-a501bb6463bf', '2018-06-30 10:52:39', 'uan'),
('51159591-3353-4668-9d28-244f8beebe75', '0052375d-f717-4f28-b0ef-297d6c2a873b', '310c6dbb-6c62-4531-bb1a-41e639f60448', '2018-02-26 09:44:12', 'uan'),
('516e70b7-4640-44b1-8ce5-66128a1b6c02', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '571432a8-0fbb-4bcf-b8ba-7f4d4998c864', '2018-06-30 10:52:37', 'uan'),
('518e3bec-f37d-413d-a685-8baae39dc702', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7d9ead39-5c5c-4633-93b3-544172f751f9', '2018-06-30 10:54:39', 'uan'),
('54e2027f-35e8-4b82-aa09-5afe0d6a3d40', 'ccce1b2c-5926-4612-8792-775ed8c11033', '571432a8-0fbb-4bcf-b8ba-7f4d4998c864', '2018-06-30 10:54:41', 'uan'),
('5573660a-46da-4764-8dd7-708d93732dd8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0c31bda6-a544-499b-989f-a8ef1e17e381', '2018-05-22 08:45:37', 'uan'),
('561295b4-d813-46a3-a894-7412cf0f1ebc', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3b822935-6262-4569-ae18-363a6d75b96f', '2018-06-30 10:54:40', 'uan'),
('56c9a891-eb4c-42ef-9242-5c757e826181', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0bae60f9-f3a5-4203-ad7e-e77632327f9f', '2018-05-22 08:45:36', 'uan'),
('57f408f1-2e3d-4b35-bc72-225222c4f1c6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '74b0584d-4276-45d8-829c-70776ab33a4f', '2018-05-22 08:45:37', 'uan'),
('5806caec-f171-4410-9b29-4a49f3e1bbae', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4f590627-b763-4696-a6ea-adfd236585fa', '2018-06-30 10:54:41', 'uan'),
('592a2f30-a6f9-4e5e-bb90-5128668725fc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', '2018-05-22 08:45:37', 'uan'),
('59ecf520-739c-4b52-bf46-095694e14fb4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '592b10fe-2110-4cb8-bca7-d0e1f1bf0149', '2018-06-30 10:52:37', 'uan'),
('5a1e3ebb-e466-4f55-ab90-a80d8f8515ff', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', '2018-06-30 10:52:36', 'uan'),
('5b52e111-b614-441a-af9d-e91691341f1b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '74f94222-3537-4320-a347-857c1feb24d4', '2018-06-30 10:54:41', 'uan'),
('5c24b063-c442-48e8-84b5-1ad9d633c3cb', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '41b9bd12-d501-48d5-a17d-12ed249ffe16', '2018-05-22 08:45:37', 'uan'),
('5d49c87a-0726-4a5f-a651-09565172c175', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '89d52853-e508-4c1e-a8fc-d6fef9f2ef37', '2018-05-22 08:45:37', 'uan'),
('5d789b05-2e80-40f1-9887-80b3cc6bb476', 'ccce1b2c-5926-4612-8792-775ed8c11033', '124e1dc1-412e-43e0-877f-e506193406aa', '2018-06-30 10:54:40', 'uan'),
('5d7e9351-4c58-4300-85a0-bb07807150a7', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1aaeecda-7082-4554-9ac8-f590f93f8b95', '2018-06-30 10:54:40', 'uan'),
('5f334731-46c1-4d95-bbd7-ac469104e732', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ee13301d-c0dd-404a-b625-061838662d30', '2018-06-30 10:54:42', 'uan'),
('5f5bd583-bef3-4183-9390-e36fcd6335d9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f7b28d1a-6056-4077-873b-afa244b643d7', '2018-06-30 10:52:38', 'uan'),
('5f68cc5e-e52e-48af-a1bf-2767e141f649', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', '2018-05-22 08:45:37', 'uan'),
('601d440d-b07d-43f9-924b-d327f5d7ddbf', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3d727751-1498-4a99-bd59-5c0973238f3c', '2018-06-30 10:54:40', 'uan'),
('60b924d7-6093-4a61-8012-b36ef03ad644', 'ccce1b2c-5926-4612-8792-775ed8c11033', '19147938-1594-4207-aef5-29b0d0d63b66', '2018-06-30 10:54:42', 'uan'),
('6179e9ee-3dc6-4933-9154-2bb215fd3bda', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a5b942d2-7ec3-46db-b75c-e18ffd9a515d', '2018-06-30 10:52:35', 'uan'),
('61a8d1d4-2a6d-4b5f-9924-7f2d846716e7', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2b079a79-c09b-4880-b746-cb1eec444645', '2018-06-30 10:54:42', 'uan'),
('61daa8ad-ecc7-49dd-a6f2-c3f4b4003564', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fc31c746-75a3-4eaf-9999-f8b44fb4217e', '2018-06-30 10:54:42', 'uan'),
('6287e686-6819-4e4e-bafd-1d14f0471ff8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '99314cf1-2019-477b-b6fb-40b5d69c54db', '2018-05-22 08:45:36', 'uan'),
('62df965e-3915-41b7-898e-54110aded419', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7537a7af-57ab-46ae-8439-04018015127b', '2018-06-30 10:54:40', 'uan'),
('62e5a7b8-b950-4b60-9190-31abccb413f2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f6523a74-f023-46fa-8f82-0f0008012a65', '2018-05-22 08:45:36', 'uan'),
('632cf2f7-2e01-4222-8366-a9762789c034', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'bc7321ca-57d4-4188-81ef-25ec61161257', '2018-06-30 10:54:40', 'uan'),
('63411838-3982-473e-96e3-236faad4d523', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e020bfea-4460-445b-979d-676d60a1460a', '2018-06-30 10:52:35', 'uan'),
('6396cee7-d77a-4f0d-af18-b5d3d6f295c5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c31061c0-daf6-473d-b061-029e829396f6', '2018-06-30 10:54:39', 'uan'),
('63e3d6ff-647f-4bc8-917e-df8284144445', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-05-22 08:45:36', 'uan'),
('64acb7a8-c665-4ff8-ae5f-94ee03887355', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ef766a2f-def7-4b4b-b73b-38ce3a300cdf', '2018-05-22 08:45:36', 'uan'),
('64b48296-3cf6-45d7-857b-460a8289de32', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0a623bf2-9517-47ba-a3f1-536665e1c334', '2018-06-30 10:52:38', 'uan'),
('64f03f05-69cd-49c5-abca-d2bd10a18e50', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '689ca1da-ebea-494b-98a1-1a819903fde9', '2018-06-30 10:52:37', 'uan'),
('65d5aebf-21d8-4d8f-be77-3caee96a2295', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e806ad6d-b5cf-474c-a657-74a5f848bdcf', '2018-06-30 10:52:39', 'uan'),
('66f634ed-5720-45d0-98c2-41979a6aab71', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3dd2dcbe-8c5f-476e-a1cd-7cdba1ec4ead', '2018-05-22 08:45:37', 'uan'),
('670e1a21-9b79-48be-8b9c-8ef53e6d8635', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1acd38be-8dcb-45f8-ad82-0903631900f1', '2018-06-30 10:54:39', 'uan'),
('67ab9697-c35d-4234-ab57-f5372d2d235b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1a9ea34b-da8e-44c5-ad15-70b0daa244ac', '2018-06-30 10:54:39', 'uan'),
('6818c0fd-aa5c-4838-b652-c93983bca61b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd73d0cc7-13a9-4187-90ad-ba377fee0bdb', '2018-05-22 08:45:37', 'uan'),
('693366e1-9802-4057-ac62-0569602f1a26', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-05-22 08:45:36', 'uan'),
('69743bbe-093b-4375-ad79-354fbd8485f7', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '5a950057-6c85-4b99-a6b4-3ed76d48f2b4', '2018-05-22 08:45:37', 'uan'),
('6a8c9d00-2a48-4237-b2d0-23e4c130bd9b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9d334504-0ff0-4191-a552-feaace318f28', '2018-06-30 10:54:42', 'uan'),
('6acbdbca-221b-4187-9171-89aed807c083', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1e69121c-47b2-4567-97f9-b2c1b31e9e70', '2018-06-30 10:54:41', 'uan'),
('6ad5d64c-881f-4b92-a6ba-ebb110d8dce7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1b6d8024-5712-4078-97cb-b86c7e523a59', '2018-06-30 10:52:36', 'uan'),
('6af0f70f-f3e4-4e27-9909-1bbb2f3e04ce', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0c5aa7f3-0395-4ef4-935f-7fe7957fa451', '2018-05-22 08:45:36', 'uan'),
('6b14a5b0-8e57-4484-97d9-e6e7cae1ff76', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', '2018-06-30 10:52:39', 'uan'),
('6b560d6b-c4df-4862-979c-8aff4c600908', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ef766a2f-def7-4b4b-b73b-38ce3a300cdf', '2018-06-30 10:52:34', 'uan'),
('6b65158d-1e27-42c7-808c-04744ed6a75f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9d334504-0ff0-4191-a552-feaace318f28', '2018-05-22 08:45:37', 'uan'),
('6c79c103-1b15-4480-84cc-f9c56be16a5c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0e6c4588-a43b-40c1-beca-87a2675fffac', '2018-06-30 10:52:39', 'uan'),
('6d052e5b-37ac-4743-b63e-5856700a2e46', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0f7601f8-df50-4503-bf1d-cdbc512e14dd', '2018-06-30 10:54:42', 'uan'),
('6d2971dd-fe9b-4870-abd7-a89142a0582d', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-06-30 10:54:40', 'uan'),
('6d454805-42f7-46db-8322-fbec2aed3c0f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', '2018-06-30 10:52:38', 'uan'),
('6df1fca1-767c-45aa-8245-e17e929dc734', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4229bec5-f7ab-4f33-9b07-3cfce62a46cb', '2018-06-30 10:52:34', 'uan'),
('6e281200-82ad-4455-83a9-565b9a85df05', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9352fa28-88c6-40fb-905a-58939086e257', '2018-06-30 10:54:41', 'uan'),
('6e698c87-7b89-44c1-8a16-54cdae68d0f9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4f590627-b763-4696-a6ea-adfd236585fa', '2018-06-30 10:52:37', 'uan'),
('6e6e0c57-001d-454a-8b41-1b3ce12a003a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8c53b550-e6e4-4cda-a935-b7ea63f9651f', '2018-06-30 10:54:42', 'uan'),
('6f36804c-c989-4141-a951-069a7d1d51ee', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'bc7321ca-57d4-4188-81ef-25ec61161257', '2018-06-30 10:52:34', 'uan'),
('70b51327-485b-406a-b9b7-1fac92704bfb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '74c9da25-d26a-4bdc-a4ad-f529428946cb', '2018-06-30 10:54:40', 'uan'),
('70bb944c-db91-4657-9e60-59e01525f3a4', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '5a49a41b-be0d-4084-a097-58b8b4c74f3c', '2018-05-22 08:45:37', 'uan'),
('70f3f726-3be9-4ba4-84b4-25b3eba015c2', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a0aba001-f604-4ff7-9147-70812752b77a', '2018-06-30 10:54:42', 'uan'),
('711b2a8e-f43a-45c3-8445-c015a7d87fcc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'eedf5420-ecb7-42b0-966f-76916b24af6d', '2018-06-30 10:52:35', 'uan'),
('71b87cd0-aa7f-4249-afeb-1102940ea56c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b568a18f-8385-430b-b532-8315e8e7bb4f', '2018-06-30 10:52:36', 'uan'),
('7219b51e-fe66-4f11-abb5-bbe02e124683', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8437e1f4-63dc-440c-b856-4d1e9f3c2435', '2018-06-30 10:52:38', 'uan'),
('724b7df9-104e-420c-8f70-4cac8830ad34', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8c53b550-e6e4-4cda-a935-b7ea63f9651f', '2018-06-30 10:52:39', 'uan'),
('726ab8e0-15ea-49a4-a76c-23d6128ac690', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', '2018-06-30 10:54:42', 'uan'),
('72c59056-1b1d-4155-9f1e-7455883b84d6', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cd1b4962-c3ae-4033-babc-a7b750d8dd63', '2018-06-30 10:54:42', 'uan'),
('72c8cd41-fd81-42a8-9301-60a5cfc0971a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '499117f1-388a-4986-977e-240e84ddfa3f', '2018-06-30 10:52:35', 'uan'),
('7479e0e7-9607-4935-a3d9-6c483b2484ca', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e30ef40e-200c-4564-bf0a-182e77f5f381', '2018-05-22 08:45:37', 'uan'),
('74813ab3-ebab-40af-892b-c106398386fc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6817f3b3-aecb-4b46-8bc4-ae6f4b185608', '2018-06-30 10:52:37', 'uan'),
('74daa80c-a01e-46b3-a994-02382aeef60b', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', '2018-02-26 09:44:12', 'uan'),
('74fa7306-85af-438c-b1f2-26ef6885b9d5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '18959738-8b40-44ed-9fc7-289ba2b406c9', '2018-06-30 10:52:35', 'uan'),
('7524aa6e-1069-46f3-89b1-cf4213719ff5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd0ddc7d8-8c74-4667-b496-2f0ad3c19e53', '2018-06-30 10:52:38', 'uan'),
('757e5da7-09ff-44d3-b014-5cb0373092e8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', '2018-05-22 08:45:37', 'uan'),
('7599371a-16cd-4deb-9004-bbba67c98aca', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a362e708-187f-4b7e-b0e6-ba09cf557164', '2018-05-22 08:45:37', 'uan'),
('75a12366-f40c-436c-a0be-763b49c4342f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8ea840e7-9452-4688-af4a-60e7540460a4', '2018-06-30 10:52:36', 'uan'),
('75eb0e92-b70e-499b-bbcd-414f836fe841', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2c10fa21-c1fd-430b-bd5a-38f0881b4614', '2018-06-30 10:52:34', 'uan'),
('76d2237a-af03-45f5-9071-993093b6ce23', 'ccce1b2c-5926-4612-8792-775ed8c11033', '268e8b71-d97e-49b8-a762-39b06368a14e', '2018-06-30 10:54:40', 'uan'),
('76e26857-b967-4316-8911-81cd71183837', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0bae60f9-f3a5-4203-ad7e-e77632327f9f', '2018-06-30 10:54:40', 'uan'),
('776666d3-ef90-4880-92ff-543b608cf58e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0a978e43-4c15-47de-b1b2-380ede4a3a49', '2018-06-30 10:52:38', 'uan'),
('777057fc-be44-455f-9ecc-01c5d9b9b7fa', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-05-22 08:45:36', 'uan'),
('77fd21ce-0d04-407b-ad6e-c1f665bbc498', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6086a957-3ee3-4720-a0c9-38287c6075c5', '2018-06-30 10:52:34', 'uan'),
('7899433b-e437-4367-bf06-c99ccfd3ed80', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1dad9db2-1a9e-4520-b874-79c78ea58308', '2018-06-30 10:54:42', 'uan'),
('78c61ca0-301f-42ee-9a7c-64c63221ae88', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5e4ae09f-beca-4229-bd56-f053e2a9bc70', '2018-06-30 10:54:43', 'uan'),
('78fe407d-5331-4eeb-a92d-f83f5b8cbf01', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '34450fd0-c16f-497f-8826-a30e30d47665', '2018-06-30 10:52:36', 'uan'),
('79113259-79ee-42ff-92f9-26ed40c4ed9e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7663bc12-ff3b-4cb3-bc21-90edae293940', '2018-06-30 10:52:38', 'uan'),
('795e51ae-c421-47a1-bb7f-8e948328bd9f', '0052375d-f717-4f28-b0ef-297d6c2a873b', '42285ff7-9922-48d6-bec1-ce4467416ea6', '2018-02-26 09:44:12', 'uan'),
('7a6149f2-b3cc-4d63-bdcd-c9c6bebda844', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ead6c4a6-5e03-4710-9000-c3b2dcc93bee', '2018-06-30 10:52:37', 'uan'),
('7a6ad9fe-f43b-4d3b-9684-e738c8911fca', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '42b1123a-f0c0-4351-a35b-cdd0fd9764b8', '2018-05-22 08:45:37', 'uan'),
('7a7d6c5d-72f1-45d5-99f6-4b067a69a870', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e36765e2-1642-4793-ba7e-83fd96d0d1c7', '2018-05-22 08:45:36', 'uan'),
('7b0fee1c-3cb4-4ea8-83c1-dc7305609968', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', '2018-06-30 10:54:40', 'uan'),
('7b9e9b7c-fff5-47eb-b0fa-6cad0e5ac415', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5e4ae09f-beca-4229-bd56-f053e2a9bc70', '2018-06-30 10:52:39', 'uan'),
('7cc772f6-b376-4df8-af17-846d7206ec22', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0eb176f0-7571-49a8-adcc-83d4a51bd9df', '2018-06-30 10:52:37', 'uan'),
('7d58eb9a-7fd3-449b-b97a-e93437e2b86f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '165fd8d9-3e5c-4301-9608-40a4c3e5da0b', '2018-06-30 10:52:36', 'uan'),
('7d7ef52a-d867-4b63-bd71-7def3e11e970', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7594a6af-b67a-4b39-b102-4edbc3031ab9', '2018-06-30 10:52:37', 'uan'),
('7d7f73fd-4edb-46f2-a75e-0daf1de69bad', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '960a0402-07f4-4c43-811d-e7af9284ddfa', '2018-05-22 08:45:37', 'uan'),
('7d8aa2b3-99ce-42a3-ba01-ce92e0872036', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'a988a6fd-2786-4c25-b721-8b84380314bc', '2018-02-26 09:44:12', 'uan'),
('7db736be-6e12-4301-8a3e-bfb01ae169c8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '55712a15-826f-4d08-af31-94de946a0451', '2018-06-30 10:52:38', 'uan'),
('7e7a6573-212f-4858-b624-81c8a49c1f9d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a362e708-187f-4b7e-b0e6-ba09cf557164', '2018-06-30 10:52:37', 'uan'),
('7ed96353-c592-4951-a6a9-3543f41820c5', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1e69121c-47b2-4567-97f9-b2c1b31e9e70', '2018-05-22 08:45:37', 'uan'),
('7f1eb2d8-97b6-40e1-b6d3-3664abc955d4', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '19147938-1594-4207-aef5-29b0d0d63b66', '2018-05-22 08:45:37', 'uan'),
('7f393407-b490-4605-93f5-6742c5f41771', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', '2018-05-22 08:45:36', 'uan'),
('7ff33e01-95c7-444e-b506-b422e1b7a03f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9d334504-0ff0-4191-a552-feaace318f28', '2018-06-30 10:52:38', 'uan'),
('80d63839-c87a-4512-824e-b75499fb30e0', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-06-30 10:54:41', 'uan'),
('80fa9205-77ce-4b60-96ac-1063ef8cc1e0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1aaeecda-7082-4554-9ac8-f590f93f8b95', '2018-06-30 10:52:35', 'uan'),
('8253ff3f-0533-4128-8e18-c8386128a0df', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7d9ead39-5c5c-4633-93b3-544172f751f9', '2018-05-22 08:45:36', 'uan'),
('82684d22-2fd4-467a-a5cb-bb28b1484f2e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '56369e22-c9e7-46b7-baa7-a23338dc6551', '2018-06-30 10:52:34', 'uan'),
('8281e597-0060-43aa-9f5e-4e45ce2f43c3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '210c813b-c607-4242-83a0-b2be186ebd7f', '2018-06-30 10:52:38', 'uan'),
('832f83ca-fc4d-4627-abd1-42faffc01732', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-03-12 10:46:38', 'uan'),
('8337dd1f-25a6-4069-9689-98378a7a7e54', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd13c37bd-e808-408f-b3fa-27e75474c348', '2018-06-30 10:54:41', 'uan'),
('83adf477-efab-465d-ae23-9acb15b53edb', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', '2018-06-30 10:52:39', 'uan'),
('83b445af-0cfc-4d39-8cfe-4e0df6c88d6b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '22253677-dbf0-4db4-a4e8-9f01ee49cb25', '2018-06-30 10:54:41', 'uan'),
('83b631f3-b5b7-4cc8-90a7-0cf2979b52ea', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c31061c0-daf6-473d-b061-029e829396f6', '2018-06-30 10:52:33', 'uan'),
('83e28526-0895-4d8f-8256-07dc2ad1095b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c6e3a90b-4052-4d13-8055-a4f18e866638', '2018-06-30 10:52:34', 'uan'),
('840c349b-920a-4fb8-8e6b-29ebe7eba23e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '48e57212-9886-4cc0-998b-84fd1a6a0e22', '2018-06-30 10:52:36', 'uan'),
('8450e7fd-ba27-4e9d-a34e-ce971b48c937', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '691d2bcd-378d-46fc-9cce-649e44b37acf', '2018-05-22 08:45:37', 'uan'),
('8551192d-7a7b-4bbc-91d5-f88fdbd9358a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a5b942d2-7ec3-46db-b75c-e18ffd9a515d', '2018-05-22 08:45:36', 'uan'),
('85626afd-75a2-4910-9c68-e571e6c95f88', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a1a9f201-e19d-42f3-91c3-36772c24bc68', '2018-06-30 10:52:39', 'uan'),
('859d0d3f-2d45-4777-8729-6925d13088e9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'eb308a9b-f509-40de-89a7-37da2bbf6c6c', '2018-06-30 10:52:36', 'uan'),
('85dca88d-dc1f-4971-ab67-53f99e8076f2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3d727751-1498-4a99-bd59-5c0973238f3c', '2018-06-30 10:52:35', 'uan'),
('86435ebd-0a33-4b1c-acaa-0186d817727b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b568a18f-8385-430b-b532-8315e8e7bb4f', '2018-06-30 10:54:41', 'uan'),
('866ceee2-59a7-40fe-98f1-f49e7010f426', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4d7f7ee4-3311-4e3e-8653-243d278151cd', '2018-06-30 10:52:38', 'uan'),
('86edee74-33f2-48eb-a466-2aad7488a2d0', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-06-30 10:54:40', 'uan'),
('87d56e64-ce9c-47a5-9109-9e8c15717fd2', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', '2018-06-30 10:54:41', 'uan'),
('884347e7-dcd0-4128-a5ac-15de365772ac', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', '2018-05-22 08:45:37', 'uan'),
('8a228ca3-36f4-4eab-bfd3-c60ee29c4d6c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', '2018-06-30 10:52:38', 'uan'),
('8ab7a6b0-4f1e-42c1-9c6d-12e6196f2c47', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3827a831-5488-4597-8536-e75104c2396d', '2018-06-30 10:54:42', 'uan'),
('8b9b7a3f-de76-42e3-b2b1-7dd853061c54', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a1a9f201-e19d-42f3-91c3-36772c24bc68', '2018-05-22 08:45:37', 'uan'),
('8bbb7c4a-17ca-4ce3-83b9-25583c600f05', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1eaf84c2-2d82-428c-ab0c-cd118cdc9579', '2018-05-22 08:45:37', 'uan'),
('8c06ff26-f9bd-47d2-8cc8-6db02b801df1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c2643c7c-cd16-4355-b122-441181f5851b', '2018-05-22 08:45:36', 'uan'),
('8c49455c-fe1d-43e8-9a35-ecd0c494c7b7', 'ccce1b2c-5926-4612-8792-775ed8c11033', '499117f1-388a-4986-977e-240e84ddfa3f', '2018-06-30 10:54:40', 'uan'),
('8d5a7da7-4b3b-4608-96b2-043eafa7bdb7', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd3e22c6f-15b7-4e29-8512-c6775b6343e8', '2018-05-22 08:45:36', 'uan'),
('8ecbc7cf-b4b2-44ed-83df-4c90211752a9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ee116499-c03f-43cb-a125-b625d1eca065', '2018-06-30 10:52:36', 'uan'),
('8edf7f41-e376-41b7-9c30-b395ccf48f0c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3c6bf439-cddf-42bd-9bac-39d76bf3afc0', '2018-06-30 10:54:41', 'uan'),
('8ee6a694-cc32-4274-9dc1-9e6b75ff19c0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '85348380-adda-4288-ab05-899daaae908b', '2018-05-22 08:45:36', 'uan'),
('8f6712db-e104-42b1-a666-4fb87353472e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', '2018-06-30 10:52:37', 'uan'),
('8fa15bf6-a449-43c7-80df-ff60b2703e90', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '691d2bcd-378d-46fc-9cce-649e44b37acf', '2018-06-30 10:52:38', 'uan'),
('8fc138f0-077c-49e2-88aa-5d82110b9446', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', '2018-05-22 08:45:36', 'uan');
INSERT INTO `role_accesses` (`id`, `role_id`, `action_id`, `created`, `createdby`) VALUES
('8fe963a3-81cb-4c3d-8173-582d73c8c9bd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1e3a1292-9d95-474a-9ca7-8deb08a89390', '2018-05-22 08:45:37', 'uan'),
('9063432a-b725-4b7a-82de-c558fa9a1c3f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1dad9db2-1a9e-4520-b874-79c78ea58308', '2018-05-22 08:45:37', 'uan'),
('909ed0fa-e170-47b0-8ac3-7f9a2441a3db', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c582501b-6069-4462-a188-be9ecf07342c', '2018-06-30 10:54:39', 'uan'),
('90d6aba1-643a-4445-aa61-8269c66bd005', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a522eb09-4bf4-471e-8532-2b9276491749', '2018-05-22 08:45:36', 'uan'),
('914e3ac0-b5cd-4f78-80bc-04efed2570f7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '605442d9-2134-4ff9-b901-28b9ae581053', '2018-06-30 10:52:33', 'uan'),
('9170d823-cb8f-4e9d-af12-6fc0016c202d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4f590627-b763-4696-a6ea-adfd236585fa', '2018-05-22 08:45:37', 'uan'),
('9198c1e2-76a9-4733-8e52-bc4114ce297d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-06-30 10:52:36', 'uan'),
('91ca5010-cde6-433b-8dbd-cd0505e9c326', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0c5aa7f3-0395-4ef4-935f-7fe7957fa451', '2018-06-30 10:52:35', 'uan'),
('9225f788-3acd-46ec-a144-2d6cf6cabfe8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f1a8f89f-6332-4a1c-a5dc-a37605359cdd', '2018-05-22 08:45:37', 'uan'),
('9271a2f8-4ee1-4d92-bb8c-fe8f25f2fb56', 'ccce1b2c-5926-4612-8792-775ed8c11033', '263250e3-e046-4580-9299-9ac9b3e69aaf', '2018-06-30 10:54:43', 'uan'),
('92fb4705-8f5a-487b-be7c-405304638b07', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', '2018-06-30 10:54:43', 'uan'),
('93294758-76ed-4315-b672-5898c282f76b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1c26d965-42f7-4c9d-af5b-307c4d3a00bd', '2018-06-30 10:52:36', 'uan'),
('935b039a-722a-4d07-b5c2-f12257cc3c4c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0e6c4588-a43b-40c1-beca-87a2675fffac', '2018-05-22 08:45:37', 'uan'),
('9409015c-edd6-4ce2-ab97-4af869608c82', 'ccce1b2c-5926-4612-8792-775ed8c11033', '395db1e2-2a6b-47fe-9888-79d052f2f78f', '2018-06-30 10:54:40', 'uan'),
('94dd5b16-232f-4a52-b277-effab76c492e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ce0fc131-de71-4b8d-8dd7-cc42111c84d8', '2018-06-30 10:52:35', 'uan'),
('95044039-bf46-408f-8b8f-5979e8468e80', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd42bcf5d-348e-4c97-85c2-467a913e343c', '2018-06-30 10:52:35', 'uan'),
('9523972f-dd4d-423b-bd20-ab5a0620fa03', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5a49a41b-be0d-4084-a097-58b8b4c74f3c', '2018-06-30 10:52:37', 'uan'),
('9567c92a-0114-453f-b327-b6dad207d3a7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '74f94222-3537-4320-a347-857c1feb24d4', '2018-06-30 10:52:37', 'uan'),
('9664acaa-5b09-4dce-8594-ba995ee5030b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2ee0428c-85ed-4908-9411-2fbe89d9884c', '2018-06-30 10:52:37', 'uan'),
('96de8b2d-1c55-4ff1-99c3-c01e53625a93', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'dc629d6f-4399-4cd5-93ac-85e9d72660ec', '2018-06-30 10:54:40', 'uan'),
('970e6db8-9589-40ce-8dab-2b08d121418b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'edc23445-d3be-4e6b-a5ff-7689dd603ea6', '2018-05-22 08:45:37', 'uan'),
('9767c5b2-b989-4c9e-bda3-4a4bfe3a8573', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a988a6fd-2786-4c25-b721-8b84380314bc', '2018-06-30 10:54:42', 'uan'),
('9846a286-256d-4003-a4c3-8c64ecc4eb26', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f78a01df-dc87-4943-9c3b-f059ff78f1e7', '2018-05-22 08:45:37', 'uan'),
('9961dd64-49b1-4da2-9c90-60451f6639df', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'bf1fa564-9527-499e-880d-7b5fa14ccdf0', '2018-06-30 10:52:38', 'uan'),
('99bce723-816d-4a50-83ea-6978e3b22b42', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd0ddc7d8-8c74-4667-b496-2f0ad3c19e53', '2018-06-30 10:54:42', 'uan'),
('99e12074-0091-4a9e-b215-a1cf4c30ce1c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '40ff26ff-4eba-4448-b7eb-73bebbde2aba', '2018-06-30 10:52:39', 'uan'),
('9a689514-dc47-45b9-896d-3d1f8d0a5ab3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a522eb09-4bf4-471e-8532-2b9276491749', '2018-06-30 10:52:35', 'uan'),
('9b4cf172-3bbd-416c-aa3c-bd8e4569603d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '65edd09e-c611-4f6e-8750-3ad23eaf688a', '2018-06-30 10:52:34', 'uan'),
('9bb37fb0-061c-49fb-a426-4213ef18f17c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c4cd3b72-94fd-4b72-9f21-6eff49bbc384', '2018-06-30 10:54:40', 'uan'),
('9bc171ad-66cf-4731-9dcf-699dce75bbb2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cecea47a-ce7f-4025-8bbb-3f651a9b3fbc', '2018-06-30 10:52:37', 'uan'),
('9be2902f-b5fa-4d00-b2f5-51144306e88e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ea463ce5-b72a-4710-9d08-b1d27e73093f', '2018-06-30 10:52:37', 'uan'),
('9bfdd317-5781-4411-9314-2b4a3b222dca', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'ce0ffb95-1e39-4bd4-9268-3f5dea1990db', '2018-02-26 09:44:12', 'uan'),
('9c1069cc-7e53-4a9d-b3ad-aaa4dc99a485', '0052375d-f717-4f28-b0ef-297d6c2a873b', '55712a15-826f-4d08-af31-94de946a0451', '2018-02-26 09:44:12', 'uan'),
('9c18e32a-e27a-4547-b0a4-dd5dbabc7a03', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', '2018-06-30 10:52:36', 'uan'),
('9c429698-be58-430f-add2-10a777bf5541', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '13b92d9f-27d7-4023-8d9a-b8e176e8585a', '2018-06-30 10:52:33', 'uan'),
('9cf1729c-0c8f-4919-8639-ceeb3e10404e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd91333c0-3dd0-415f-bb18-06482c0c1094', '2018-06-30 10:52:34', 'uan'),
('9d3ba107-2e05-4e71-84aa-136763c483cd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3e59c022-cad5-498b-b3d6-1441d4ec44a1', '2018-06-30 10:52:35', 'uan'),
('9d6085fd-caa4-4ad6-aab0-64c3478c08c5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a7b873d6-2e93-47f7-b084-5b245972a61f', '2018-06-30 10:52:34', 'uan'),
('9e15181c-cfc1-49a4-a4eb-c3bc5a5ba18a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', '2018-05-22 08:45:36', 'uan'),
('9f03c548-e765-44fb-934b-aa7c416aa1c1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', '2018-06-30 10:52:33', 'uan'),
('9f31b5f9-cdcf-47dc-b9ce-d56a9923d20e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'fa02c8c8-1782-4379-a573-0e1dd3fde6b4', '2018-05-22 08:45:36', 'uan'),
('9f540cb5-aaf9-4358-8cfc-1ff31583c695', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ee13301d-c0dd-404a-b625-061838662d30', '2018-06-30 10:52:37', 'uan'),
('9f7a34d3-05b3-46c6-be8d-0c36fc247c27', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '73aca571-f8d7-4502-a945-fa53ff13676b', '2018-05-22 08:45:36', 'uan'),
('9fc5c8a0-49b3-4937-bc80-9909603c5f83', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a23a4600-3508-48bf-ac65-29cc502cb07a', '2018-06-30 10:54:42', 'uan'),
('a04addd7-9ae6-472d-842a-09d40bab3008', '0052375d-f717-4f28-b0ef-297d6c2a873b', '47a6efb9-00dc-46ef-a293-ea209998cebf', '2018-02-26 09:44:12', 'uan'),
('a0eb3e97-bce4-46cf-a573-1a4f03a3c03e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2b079a79-c09b-4880-b746-cb1eec444645', '2018-06-30 10:52:38', 'uan'),
('a1bf4cdf-b7e9-4ea6-9787-debc44df5b11', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4df45f80-5951-4308-88a6-ba64fb6b16c9', '2018-06-30 10:52:36', 'uan'),
('a203d00e-59d3-4639-9a8e-995c4aa42e78', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '72d5a13e-12a2-4642-96b0-d5742ab2fef1', '2018-05-22 08:45:36', 'uan'),
('a2132bfc-9c2e-4dbc-9656-73867153bcaa', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'f7b28d1a-6056-4077-873b-afa244b643d7', '2018-02-26 09:44:12', 'uan'),
('a29fba8a-9f25-41fe-aee9-6c26b5661fd9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4df45f80-5951-4308-88a6-ba64fb6b16c9', '2018-06-30 10:54:41', 'uan'),
('a2a0f1f5-aea1-4e18-842d-9dddfd3e0f0a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ef766a2f-def7-4b4b-b73b-38ce3a300cdf', '2018-06-30 10:54:40', 'uan'),
('a2c2eaf5-2057-421f-a981-a7b62848d9e4', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6817f3b3-aecb-4b46-8bc4-ae6f4b185608', '2018-06-30 10:54:41', 'uan'),
('a3151281-fd5a-4590-b75a-283dd9d652e6', 'ccce1b2c-5926-4612-8792-775ed8c11033', '165fd8d9-3e5c-4301-9608-40a4c3e5da0b', '2018-06-30 10:54:41', 'uan'),
('a34e2303-591e-48d2-8fff-02276112a871', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8c53b550-e6e4-4cda-a935-b7ea63f9651f', '2018-05-22 08:45:37', 'uan'),
('a3606a1d-15d4-4ed7-9eab-74170c19d323', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', '2018-06-30 10:54:41', 'uan'),
('a383a7c2-fe44-4138-8f36-fdd01c5c606f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '518e91db-35da-4118-bd27-4670f886bf46', '2018-05-22 08:45:37', 'uan'),
('a429994d-a60c-416e-91c0-9f903245b560', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3e59c022-cad5-498b-b3d6-1441d4ec44a1', '2018-06-30 10:54:40', 'uan'),
('a42a899b-0c11-45af-aed5-a1f9def9e3df', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3d0624ae-6912-4381-b761-004987aed866', '2018-05-22 08:45:37', 'uan'),
('a43bc9a8-cea4-4f7f-8d09-24d53fb6c982', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '29d45c81-49da-4a56-b337-6f3ced342652', '2018-06-30 10:52:35', 'uan'),
('a4982521-645f-4642-b2d5-279c22755a29', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-06-30 10:52:34', 'uan'),
('a4c3698e-bfb8-4d81-b4ed-23918abccb64', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '188f5f96-3668-4694-bcf8-0922a2727e27', '2018-06-30 10:52:38', 'uan'),
('a4d951fe-aa06-47e4-889a-307345ee2b12', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'fc31c746-75a3-4eaf-9999-f8b44fb4217e', '2018-05-22 08:45:37', 'uan'),
('a515ec71-43df-4821-b65e-1969f63a7401', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fc701433-0289-4ec0-9d14-c75b383d8b25', '2018-06-30 10:52:38', 'uan'),
('a5547bff-f638-40e5-9d8a-ffa153e8e059', 'ccce1b2c-5926-4612-8792-775ed8c11033', '56369e22-c9e7-46b7-baa7-a23338dc6551', '2018-06-30 10:54:40', 'uan'),
('a5656d73-5d63-42b8-8b7c-239331eea851', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2ecaf777-6418-4268-9a85-58a863b61a53', '2018-06-30 10:54:40', 'uan'),
('a629b98a-c86e-4b37-a83c-b37d14e351e9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '74c9da25-d26a-4bdc-a4ad-f529428946cb', '2018-06-30 10:52:34', 'uan'),
('a644defa-6691-49e6-b588-521426c8b2ae', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '124e1dc1-412e-43e0-877f-e506193406aa', '2018-06-30 10:52:34', 'uan'),
('a6cceb98-f576-439c-a3ae-482defe8afe5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f6523a74-f023-46fa-8f82-0f0008012a65', '2018-06-30 10:54:40', 'uan'),
('a7ec7995-2935-4e39-9bbd-f5d75cafd6f7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '59ecf800-2be5-4294-93f8-4e82c623fcf8', '2018-06-30 10:52:37', 'uan'),
('a80083a4-e550-40b2-b33d-aac7c10c30b3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', '2018-06-30 10:52:38', 'uan'),
('a881e13c-06ec-4049-8171-9455de33f990', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9cfa5966-b544-4d91-bff3-4d4f8d63cb30', '2018-06-30 10:52:36', 'uan'),
('a8b0fe4c-a96a-42b0-926d-a452af3cbff1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a22ceea6-88b3-41f3-ba6c-2b514d20e217', '2018-05-22 08:45:37', 'uan'),
('a8bf8b86-d8f2-4572-ba6b-7e7bc086e84c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cd1b4962-c3ae-4033-babc-a7b750d8dd63', '2018-06-30 10:52:38', 'uan'),
('a8c8b127-a859-4cd1-b0fb-8e088e00a27c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', '2018-05-22 08:45:36', 'uan'),
('a9213167-9581-4c11-afde-6f573d2e6fb2', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a7b873d6-2e93-47f7-b084-5b245972a61f', '2018-06-30 10:54:40', 'uan'),
('a9b57218-194c-4c06-8a08-5a9fbbceb617', 'ccce1b2c-5926-4612-8792-775ed8c11033', '40ff26ff-4eba-4448-b7eb-73bebbde2aba', '2018-06-30 10:54:42', 'uan'),
('a9d80de4-5494-4db7-bab9-69b795b46c5a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '804e5330-b692-4f13-b132-1881bdc3ba64', '2018-06-30 10:52:37', 'uan'),
('ab22a6d9-7f54-447f-b28d-b79043c56a7a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '73aca571-f8d7-4502-a945-fa53ff13676b', '2018-06-30 10:52:35', 'uan'),
('aba49c43-607f-4536-a374-b4e3a89010fd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'beeefa8c-44a9-4238-97b4-ee5750422fb0', '2018-05-22 08:45:37', 'uan'),
('abd66adf-11eb-445b-8161-7b3057db959b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '318017c3-f873-42ab-80da-8c788a4ec931', '2018-05-22 08:45:37', 'uan'),
('abdc4f53-f775-4a9d-bdbd-fc56439930cb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1e3a1292-9d95-474a-9ca7-8deb08a89390', '2018-06-30 10:54:41', 'uan'),
('ac53b97f-b769-4b3b-8ba2-5bcc2363b011', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ab1bc3b7-1848-4367-be76-da14860955c9', '2018-06-30 10:52:38', 'uan'),
('ac7cf1df-1e7a-4487-9c1d-0810198f5d12', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1a9ea34b-da8e-44c5-ad15-70b0daa244ac', '2018-06-30 10:52:33', 'uan'),
('ac9c6d44-e336-47c2-851b-9fd4819db1d6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', '2018-06-30 10:52:36', 'uan'),
('aca4c399-9abd-4b93-a5fb-5e5ac6ce0069', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7ce1e438-d14f-4934-9738-4e44e894cf15', '2018-06-30 10:52:39', 'uan'),
('acf3933c-a4ef-4d27-980a-dfddd076d52b', '0052375d-f717-4f28-b0ef-297d6c2a873b', '948e2bf3-ff49-4d06-bb23-92bcea3cb5da', '2018-02-26 09:44:12', 'uan'),
('ad9b5b9b-dec6-4e63-9966-088953051e25', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1b6d8024-5712-4078-97cb-b86c7e523a59', '2018-06-30 10:54:41', 'uan'),
('adc45358-21ff-4699-b330-2d02566e98a0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8a643eb0-e44e-4000-b78f-d7f47bc3255c', '2018-05-22 08:45:37', 'uan'),
('adea3e52-c568-453b-8f93-9b3a8b583c66', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2ecaf777-6418-4268-9a85-58a863b61a53', '2018-06-30 10:52:35', 'uan'),
('ae487d8e-0c37-4be1-81de-87be54e3c5d4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3c6bf439-cddf-42bd-9bac-39d76bf3afc0', '2018-06-30 10:52:36', 'uan'),
('ae8c578d-796a-4681-84c6-b157c620b929', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fc31c746-75a3-4eaf-9999-f8b44fb4217e', '2018-06-30 10:52:38', 'uan'),
('ae946f10-b0de-45bc-9989-657f851f5ca1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7eaff946-7b78-4faf-864b-4f50efde10c0', '2018-06-30 10:52:36', 'uan'),
('aec0e59b-195a-4b03-9202-5d3a049a63b9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ae142032-4b2b-4c3b-9d07-cc5891262dee', '2018-06-30 10:52:37', 'uan'),
('aed30fcf-059a-435e-bdfd-bc2ad6e90d94', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', '2018-06-30 10:52:37', 'uan'),
('af0ffd7a-ecf2-4f4b-ba6b-2be3d21f6ca7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a23a4600-3508-48bf-ac65-29cc502cb07a', '2018-06-30 10:52:38', 'uan'),
('af22dbf9-d33a-4281-a6e8-9f0d01be9ac5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ac28025f-2c56-480c-816d-3c31004dd016', '2018-06-30 10:52:39', 'uan'),
('af8c48d5-a521-4acf-8f52-ca5e6bbdcfc3', 'ccce1b2c-5926-4612-8792-775ed8c11033', '57904998-e34a-4f8e-8bc8-fab31cc0ea88', '2018-06-30 10:54:40', 'uan'),
('afd34c4c-7613-4e51-8dad-fe772149efce', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '42285ff7-9922-48d6-bec1-ce4467416ea6', '2018-06-30 10:52:38', 'uan'),
('b005e898-6dc0-4f45-ad5f-563f4ea1e40e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e904f3bb-ae98-4d1e-82b9-740c33988b3b', '2018-06-30 10:52:35', 'uan'),
('b0c2235b-1fbf-430f-b142-892fb9b7835f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '85348380-adda-4288-ab05-899daaae908b', '2018-06-30 10:54:40', 'uan'),
('b0d3080f-db51-46da-a31e-e567f43b6a62', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e36765e2-1642-4793-ba7e-83fd96d0d1c7', '2018-06-30 10:54:41', 'uan'),
('b102965c-a3df-448b-ab39-9f754e6b1260', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0eb176f0-7571-49a8-adcc-83d4a51bd9df', '2018-06-30 10:54:41', 'uan'),
('b1254a12-44da-4267-9b20-9688845269ee', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a131d7d1-daf1-48e1-a7f8-fe977c87a862', '2018-06-30 10:52:39', 'uan'),
('b12b4621-d2a7-4aae-ba2b-8fa1e0eee330', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4cdb0517-c109-4634-acc7-39f4c33d6fec', '2018-06-30 10:54:41', 'uan'),
('b21eb395-97c9-4336-a2c3-6d1880415985', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ae142032-4b2b-4c3b-9d07-cc5891262dee', '2018-05-22 08:45:37', 'uan'),
('b22471d9-92a2-4eed-9435-2167aac10999', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4eb4e924-a85c-4ecc-a639-304d1b26e65d', '2018-06-30 10:54:43', 'uan'),
('b2750f27-b9ef-4918-a308-d059b805171a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f5013152-aa4e-40f2-9d22-8872b7818bae', '2018-06-30 10:52:36', 'uan'),
('b303e252-848c-47a6-b488-e9d73ae8eb9c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '368e0db2-66a5-4f14-959d-9537504ca79d', '2018-06-30 10:52:37', 'uan'),
('b333c09c-8618-40bd-a733-2c5821e6cb57', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9742de93-52c5-4af6-8d8f-f82b43d89ba6', '2018-05-22 08:45:37', 'uan'),
('b41ee109-0805-4449-aa65-280eeeb3874c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '948e2bf3-ff49-4d06-bb23-92bcea3cb5da', '2018-06-30 10:52:38', 'uan'),
('b511b0e0-9d5c-4d7e-b6d8-17303d3e5643', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7537a7af-57ab-46ae-8439-04018015127b', '2018-06-30 10:52:35', 'uan'),
('b5298bae-6f67-4b02-9c37-858ad2ca0f92', 'ccce1b2c-5926-4612-8792-775ed8c11033', '89d52853-e508-4c1e-a8fc-d6fef9f2ef37', '2018-06-30 10:54:41', 'uan'),
('b5bc4656-904b-425a-84da-fa109a314965', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ac28025f-2c56-480c-816d-3c31004dd016', '2018-05-22 08:45:37', 'uan'),
('b5f9bfa0-60a5-43ec-8c3f-82d4d9fe60cc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1dad9db2-1a9e-4520-b874-79c78ea58308', '2018-06-30 10:52:38', 'uan'),
('b5fdb409-2b6f-4b0b-ba69-14d9268d0e79', 'ccce1b2c-5926-4612-8792-775ed8c11033', '388f1093-a144-4618-acb2-74d66e320b82', '2018-06-30 10:54:42', 'uan'),
('b61655eb-72fb-41c7-9d1b-cca112199d86', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1b6d8024-5712-4078-97cb-b86c7e523a59', '2018-05-22 08:45:36', 'uan'),
('b6968fa7-efe4-4f25-99c4-079a41c3d533', 'ccce1b2c-5926-4612-8792-775ed8c11033', '318017c3-f873-42ab-80da-8c788a4ec931', '2018-06-30 10:54:42', 'uan'),
('b7b19a9b-6099-4990-9dbe-a8d54c25e4ff', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '436cb1b1-ad4d-4c94-855c-20c43b9f4f81', '2018-06-30 10:52:38', 'uan'),
('b7d96882-6d5d-4571-8deb-6cb263e74824', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '31a66b5a-69cb-4d98-8b8b-c005826dc299', '2018-05-22 08:45:37', 'uan'),
('b88558be-fbff-419c-b858-9a95419bf7ca', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1e69121c-47b2-4567-97f9-b2c1b31e9e70', '2018-06-30 10:52:36', 'uan'),
('b9af2a7c-b261-46ac-ac9a-e9b875084863', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', '2018-05-22 08:45:37', 'uan'),
('b9b0cbfc-cd14-48c3-a337-57b4a723fb10', 'ccce1b2c-5926-4612-8792-775ed8c11033', '65edd09e-c611-4f6e-8750-3ad23eaf688a', '2018-06-30 10:54:40', 'uan'),
('b9bf87e6-c8a8-4c8e-b860-4b34132c43e1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e2ac4453-58e7-452a-a53f-a314a6431222', '2018-05-22 08:45:37', 'uan'),
('b9da63f9-5b0c-4194-a3ec-a3688b8f884e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e36765e2-1642-4793-ba7e-83fd96d0d1c7', '2018-06-30 10:52:36', 'uan'),
('bb219b9d-3169-473e-9737-fa0bdeeff447', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c2643c7c-cd16-4355-b122-441181f5851b', '2018-06-30 10:52:34', 'uan'),
('bbed0909-245d-4553-90c6-8ed80ee2e64b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '188f5f96-3668-4694-bcf8-0922a2727e27', '2018-05-22 08:45:37', 'uan'),
('bc1f197d-d0dd-404f-8015-d952d558a15e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7cecc67d-6458-4415-9668-bb11bbba94e8', '2018-06-30 10:54:42', 'uan'),
('bc43c021-2e5d-4e4d-83c6-cd2f61b7b18f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '47a6efb9-00dc-46ef-a293-ea209998cebf', '2018-06-30 10:52:38', 'uan'),
('bd12b66c-725f-4ddb-af9b-65464ee18834', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'de366403-b454-4b0b-b96b-ff0aaa351251', '2018-06-30 10:52:33', 'uan'),
('bd355e04-7d58-4367-a948-277c7476f5ca', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fa02c8c8-1782-4379-a573-0e1dd3fde6b4', '2018-06-30 10:54:40', 'uan'),
('bdc20084-8c8d-4ec0-9527-14c029635341', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-03-12 10:46:38', 'uan'),
('bea8fc86-3e4b-4f6e-9fbc-07e5fd228211', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8ea2488f-1a22-448f-8edc-fe7ebd763db7', '2018-06-30 10:54:40', 'uan'),
('beab2c95-e2bd-4507-b45a-21038221ac9b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '089bfd10-3706-40fd-95a9-f94d6986babd', '2018-06-30 10:52:39', 'uan'),
('beb7f3cd-84f2-4225-b670-48b60d2e2171', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3bfc749a-0b34-4a92-acec-b8331f0e210a', '2018-05-22 08:45:37', 'uan'),
('bebefed0-ac1b-4760-8032-3c7944b567dd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a22ceea6-88b3-41f3-ba6c-2b514d20e217', '2018-06-30 10:52:37', 'uan'),
('bf074553-8b60-4501-9f4b-a170fc427307', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', '2018-06-30 10:52:35', 'uan'),
('bf28c36b-98af-4b99-9b06-7fb4b8c1ef1d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'dc629d6f-4399-4cd5-93ac-85e9d72660ec', '2018-05-22 08:45:36', 'uan'),
('bf32d025-d05f-4a4a-a9dc-e9c4b6dd833c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd51a994d-7649-4ef1-9bdb-1980a4eb4b60', '2018-06-30 10:52:35', 'uan'),
('bfd07666-4d74-4b23-9ca2-eafc694bdc9d', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd42bcf5d-348e-4c97-85c2-467a913e343c', '2018-06-30 10:54:40', 'uan'),
('bfd09a96-2fbc-41b4-a3fe-383fd8c16681', 'ccce1b2c-5926-4612-8792-775ed8c11033', '436cb1b1-ad4d-4c94-855c-20c43b9f4f81', '2018-06-30 10:54:42', 'uan'),
('c01dd9da-833f-4043-b7dd-38eaab5fa08e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0c31bda6-a544-499b-989f-a8ef1e17e381', '2018-06-30 10:52:39', 'uan'),
('c0689fdd-ad08-4eac-a7e1-cc91b5eb249e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e2ac4453-58e7-452a-a53f-a314a6431222', '2018-06-30 10:52:39', 'uan'),
('c06946ad-504a-4a2d-853e-eb1111c1c2e3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f9ec2a1d-92ee-4c8c-9e0c-f27eb2e301d2', '2018-06-30 10:52:36', 'uan'),
('c20aab6e-aa65-4326-9df2-fbc8989b1672', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a46bf3be-a18e-4e6c-bb27-cba4cabc81f2', '2018-06-30 10:54:39', 'uan'),
('c229807d-82b6-404c-826c-268167c29240', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3d0624ae-6912-4381-b761-004987aed866', '2018-06-30 10:54:42', 'uan'),
('c2891617-483c-40ae-a6b9-c908ca4786bc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', '2018-05-22 08:45:37', 'uan'),
('c2af9a21-7d89-4324-8f39-021e9c4fd992', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', '2018-06-30 10:54:40', 'uan'),
('c322d220-3180-4f02-b7de-a2570c02a4a3', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd1184ebf-bce8-48bb-b685-5e17fe447915', '2018-06-30 10:54:40', 'uan'),
('c339acc5-763e-4785-867f-f811337a35c5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '948e2bf3-ff49-4d06-bb23-92bcea3cb5da', '2018-06-30 10:54:42', 'uan'),
('c3476b46-0b42-44f1-a2e6-c9fb1eb668e5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '235e6639-683c-47d7-8dd8-48fd3463a67b', '2018-06-30 10:52:36', 'uan'),
('c357f0d1-8b3a-4007-8f94-33e7c9ad470f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '945605ca-19f9-45d1-a0c8-735243a44d38', '2018-06-30 10:52:37', 'uan'),
('c36fd159-0b0c-47b0-ad11-66b632bb9a7d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8ea2488f-1a22-448f-8edc-fe7ebd763db7', '2018-05-22 08:45:36', 'uan'),
('c3799758-7ce0-4f5e-873e-5c05e4423633', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7cecc67d-6458-4415-9668-bb11bbba94e8', '2018-06-30 10:52:39', 'uan'),
('c3cbef22-37c6-4add-8344-15a92fec4c12', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '368e0db2-66a5-4f14-959d-9537504ca79d', '2018-05-22 08:45:37', 'uan'),
('c4c6ad75-7b12-4171-ade8-ac27837b91cb', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', '2018-06-30 10:54:42', 'uan'),
('c4d7e7fc-7bc3-4338-bd33-059df4549c2c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '518e91db-35da-4118-bd27-4670f886bf46', '2018-06-30 10:52:39', 'uan'),
('c55bf910-c57b-47f6-8c35-462a3813e79d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '190606b3-84af-4dd8-89af-ac28668255ba', '2018-06-30 10:52:34', 'uan'),
('c580229f-bcb3-4d24-a3cf-47af89628ee0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c8197eab-d634-4caf-a289-19e770dd7975', '2018-06-30 10:52:37', 'uan'),
('c59b5dae-0904-4ca7-b080-6e48283f0d3f', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fc701433-0289-4ec0-9d14-c75b383d8b25', '2018-06-30 10:54:42', 'uan'),
('c5b8fb32-1b73-4815-bfcd-31450e70f893', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9352fa28-88c6-40fb-905a-58939086e257', '2018-06-30 10:52:35', 'uan'),
('c621ece4-45cb-40ed-8781-212ea026d01b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ab1bc3b7-1848-4367-be76-da14860955c9', '2018-06-30 10:54:42', 'uan'),
('c62637b4-0301-426d-a067-2617757dcfe1', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a131d7d1-daf1-48e1-a7f8-fe977c87a862', '2018-06-30 10:54:43', 'uan'),
('c6ccccd6-ac40-429e-a01f-c1a6285efc9f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '41da6bba-8076-4b03-957f-588832c2d8c6', '2018-06-30 10:54:42', 'uan'),
('c6f08da9-bdf5-41ac-a982-2c539162c96e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', '2018-06-30 10:52:37', 'uan'),
('c6f4474f-9ece-407f-b768-4671040db907', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a0aba001-f604-4ff7-9147-70812752b77a', '2018-06-30 10:52:38', 'uan'),
('c6f4d37e-d66d-45c4-8f94-36db19d34fc4', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd0ddc7d8-8c74-4667-b496-2f0ad3c19e53', '2018-05-22 08:45:37', 'uan'),
('c8e7c3af-d99f-443a-bd98-4e958c85dd57', 'ccce1b2c-5926-4612-8792-775ed8c11033', '945605ca-19f9-45d1-a0c8-735243a44d38', '2018-06-30 10:54:41', 'uan'),
('c8ecbcef-5e12-4202-a472-34d7d3b5a0de', 'ccce1b2c-5926-4612-8792-775ed8c11033', '72d5a13e-12a2-4642-96b0-d5742ab2fef1', '2018-06-30 10:54:40', 'uan'),
('c9508b94-53d6-495b-b89c-0d835b572ad6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '436cb1b1-ad4d-4c94-855c-20c43b9f4f81', '2018-05-22 08:45:37', 'uan'),
('ca0bb6ee-cba7-457d-8536-587b17154dcd', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e2ac4453-58e7-452a-a53f-a314a6431222', '2018-06-30 10:54:42', 'uan'),
('ca32bfd6-d11c-4af1-a77e-707b48e4cc1d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '99314cf1-2019-477b-b6fb-40b5d69c54db', '2018-06-30 10:52:35', 'uan'),
('cb3f8a47-93ab-4a49-9c25-3cf2a1731f3e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c4cd3b72-94fd-4b72-9f21-6eff49bbc384', '2018-05-22 08:45:36', 'uan'),
('cb90cbcc-13f0-4525-9cb4-4639dd8df99d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd91333c0-3dd0-415f-bb18-06482c0c1094', '2018-05-22 08:45:36', 'uan'),
('cbb25107-ea7f-47c6-8726-3b26b0f0e78c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c245f3fe-1a27-4b9f-aca0-733f169901ab', '2018-06-30 10:52:37', 'uan'),
('cbd1ff77-01bd-4f47-a04f-efa81465ed7f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3d0624ae-6912-4381-b761-004987aed866', '2018-06-30 10:52:37', 'uan'),
('cc33f5d6-8b97-4e11-97ac-f0033931b5e0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'dc629d6f-4399-4cd5-93ac-85e9d72660ec', '2018-06-30 10:52:35', 'uan'),
('cc81088a-deba-4257-a135-4fa39dbd3ac5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c96e99fb-4f55-40d8-bed8-4ce250a180a5', '2018-06-30 10:54:42', 'uan'),
('cc94c0e7-214d-4017-98a5-4f6878ab79fe', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '20dd5d9b-767f-4451-a857-88f142608223', '2018-06-30 10:52:34', 'uan'),
('cd1aee18-01a9-4e1f-beff-d69d70a34a4a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0a978e43-4c15-47de-b1b2-380ede4a3a49', '2018-05-22 08:45:37', 'uan'),
('cd5cd23d-643f-48da-b9ec-0646005e03c2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b65a1d21-89a7-411e-97b0-484ea81a749a', '2018-05-22 08:45:37', 'uan'),
('ce6e2082-6f0a-47a4-a31b-7045f569f9e9', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b568a18f-8385-430b-b532-8315e8e7bb4f', '2018-05-22 08:45:37', 'uan'),
('ce7eba5f-e7c3-4c29-83e8-1dfacb05753b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cae07239-bdcf-4e60-ab95-941d483c3028', '2018-06-30 10:54:41', 'uan'),
('ce85d84a-48a4-4bc5-b8e1-b04b5391f429', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', '2018-06-30 10:52:36', 'uan'),
('ceee055c-54ef-48e1-83de-65e10ff6d7db', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ead6c4a6-5e03-4710-9000-c3b2dcc93bee', '2018-06-30 10:54:42', 'uan'),
('cfd86f49-a11c-4537-9fcf-4345dc90b1ba', 'ccce1b2c-5926-4612-8792-775ed8c11033', '42b1123a-f0c0-4351-a35b-cdd0fd9764b8', '2018-06-30 10:54:41', 'uan'),
('d09e4189-66d2-4b88-bd4a-234d626fde55', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '40ff26ff-4eba-4448-b7eb-73bebbde2aba', '2018-05-22 08:45:37', 'uan'),
('d0e65655-0ef2-40b4-b15a-0613d817593c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '18959738-8b40-44ed-9fc7-289ba2b406c9', '2018-06-30 10:54:40', 'uan'),
('d1c6774a-84dc-4921-92c2-f8c89efd6276', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ea409acc-3b37-4ec6-84c4-63f90f460d93', '2018-06-30 10:52:38', 'uan'),
('d273df04-c7eb-406a-bf56-b6c600625cc8', 'ccce1b2c-5926-4612-8792-775ed8c11033', '94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', '2018-06-30 10:54:41', 'uan'),
('d2aecafd-0866-43fe-a537-f87c8193d946', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7eaff946-7b78-4faf-864b-4f50efde10c0', '2018-06-30 10:54:41', 'uan'),
('d320a0a0-a6c3-4174-8e4c-059233487f4d', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ea409acc-3b37-4ec6-84c4-63f90f460d93', '2018-06-30 10:54:42', 'uan'),
('d38e4591-16d9-49ae-8036-b5ade2545a9f', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f78a01df-dc87-4943-9c3b-f059ff78f1e7', '2018-06-30 10:54:42', 'uan'),
('d3cbe8f7-6a3f-4371-9265-8a2739274584', 'ccce1b2c-5926-4612-8792-775ed8c11033', '691d2bcd-378d-46fc-9cce-649e44b37acf', '2018-06-30 10:54:42', 'uan'),
('d406cf65-e78f-49a3-a553-ab58370226ba', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3827a831-5488-4597-8536-e75104c2396d', '2018-06-30 10:52:38', 'uan'),
('d43bbdca-0d5c-42aa-9553-68f1f875fbb6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '689ca1da-ebea-494b-98a1-1a819903fde9', '2018-05-22 08:45:37', 'uan'),
('d4ab44ba-9d00-46af-9006-8f5c75447fd5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd51a994d-7649-4ef1-9bdb-1980a4eb4b60', '2018-06-30 10:54:40', 'uan'),
('d4b0085f-8027-40e3-baf5-48726edb37fc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', '2018-05-22 08:45:36', 'uan'),
('d4c40e35-1c5f-4676-9947-44a925f71c97', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ab1bc3b7-1848-4367-be76-da14860955c9', '2018-05-22 08:45:37', 'uan'),
('d56c3e3b-4f08-4a38-aad7-b3eff057019f', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd7fd1441-a721-4efe-b2fd-8724b9501400', '2018-06-30 10:54:41', 'uan'),
('d57914ae-31fd-45ca-b3fc-c81687b30e81', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'bee64d11-a34c-44e2-a542-d3eee78f6db7', '2018-06-30 10:52:35', 'uan'),
('d6519db0-2841-449a-a66c-742ae502c950', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '49fcaede-e452-450d-8781-cdbe2eb13836', '2018-06-30 10:52:39', 'uan'),
('d65d9477-6b36-488a-b348-c1954f2d96c7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cb30e0b4-6a76-4f20-b435-4a0bb5dc0345', '2018-06-30 10:52:37', 'uan'),
('d6d00e23-2ffa-4851-a3e0-5917e4ccfa2b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-06-30 10:54:40', 'uan'),
('d710ab77-d590-48fd-8c8f-796a50756108', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1eaf84c2-2d82-428c-ab0c-cd118cdc9579', '2018-06-30 10:54:41', 'uan'),
('d78d327b-2672-4b22-ac51-9ee91cc23ccb', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-05-22 08:45:36', 'uan'),
('d8253470-a0bd-41f5-b38b-9417a59d1a3a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1c26d965-42f7-4c9d-af5b-307c4d3a00bd', '2018-06-30 10:54:41', 'uan'),
('d8640c6a-1b9b-4b5d-9e5b-373bd20fcdc9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0c5aa7f3-0395-4ef4-935f-7fe7957fa451', '2018-06-30 10:54:40', 'uan'),
('d8d10e24-ca78-4092-9e5c-5f1d17485a4a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0a978e43-4c15-47de-b1b2-380ede4a3a49', '2018-06-30 10:54:42', 'uan'),
('d8ea0996-9f17-48aa-be92-122514a7c42a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '99314cf1-2019-477b-b6fb-40b5d69c54db', '2018-06-30 10:54:40', 'uan'),
('d9575c7f-875e-43c4-9ad6-647a01ab230e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ce0ffb95-1e39-4bd4-9268-3f5dea1990db', '2018-06-30 10:52:38', 'uan'),
('d9743c3f-278f-4bbc-9454-76d3ec043afc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c582501b-6069-4462-a188-be9ecf07342c', '2018-05-22 08:45:36', 'uan'),
('d9d417f1-61ae-4f2d-adbf-a38c918713fd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8a643eb0-e44e-4000-b78f-d7f47bc3255c', '2018-06-30 10:52:39', 'uan'),
('d9d549be-3556-49ac-85ed-22cdc1d634c5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b65a1d21-89a7-411e-97b0-484ea81a749a', '2018-06-30 10:54:41', 'uan'),
('da5f6db2-e3ac-4fb0-ab8a-9bbb403c7604', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cd725882-004c-4dd2-b780-a501bb6463bf', '2018-05-22 08:45:37', 'uan'),
('da91036b-45a8-4f0e-8fa3-eecd01daf2d0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c96e99fb-4f55-40d8-bed8-4ce250a180a5', '2018-06-30 10:52:37', 'uan'),
('dabe7f4d-eda6-4552-a5da-3a54bf2899ed', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2a4f379f-1471-43af-be2b-f9ef6dd9f713', '2018-06-30 10:54:41', 'uan'),
('db0369f3-01f0-48a4-8b3b-ab3ef04e65db', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '499117f1-388a-4986-977e-240e84ddfa3f', '2018-05-22 08:45:36', 'uan'),
('db6ca07f-37fa-4492-bcf2-8262a921aae4', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c2643c7c-cd16-4355-b122-441181f5851b', '2018-06-30 10:54:40', 'uan'),
('dba5d7c7-1d54-45a3-a36a-a0c59f822f9d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4cdb0517-c109-4634-acc7-39f4c33d6fec', '2018-05-22 08:45:37', 'uan'),
('dc256a8a-2983-4112-a0e5-267d4bf82ad9', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e020bfea-4460-445b-979d-676d60a1460a', '2018-06-30 10:54:40', 'uan'),
('dcd1dc11-9b71-4fcc-aaff-5263da51b3b2', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a5b942d2-7ec3-46db-b75c-e18ffd9a515d', '2018-06-30 10:54:40', 'uan'),
('dcf30d76-586f-4b77-abf3-c56041cae233', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '74f94222-3537-4320-a347-857c1feb24d4', '2018-05-22 08:45:37', 'uan'),
('dd427a7e-fa64-45f6-8631-660cc8ededb7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '665c0580-3f54-42fa-ad55-7da779b0107a', '2018-06-30 10:52:36', 'uan'),
('ddaa1077-326a-4a13-bc1b-7bbde4770f90', 'ccce1b2c-5926-4612-8792-775ed8c11033', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-06-30 10:54:40', 'uan'),
('deb3ed28-d6da-4b8d-8955-987d94a7eb94', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '72db9bfa-fb12-4340-84ba-0d83d6df131b', '2018-06-30 10:52:37', 'uan'),
('df067474-bdce-49da-ae79-c8ad39d3876d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2fa30fee-61ea-4ae1-bd06-b603730a6885', '2018-05-22 08:45:37', 'uan'),
('df9fb199-c673-4eb9-9f83-053594b4f4fc', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'eb308a9b-f509-40de-89a7-37da2bbf6c6c', '2018-06-30 10:54:41', 'uan'),
('e0290f8d-3a57-4969-968a-06a7fd38e2bd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-06-30 10:52:34', 'uan'),
('e101e48e-8753-4751-8f73-f3bc1b5c4bd2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2a4f379f-1471-43af-be2b-f9ef6dd9f713', '2018-05-22 08:45:37', 'uan'),
('e1134d64-416e-45b9-9401-6119bf8d12a0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '41da6bba-8076-4b03-957f-588832c2d8c6', '2018-05-22 08:45:37', 'uan'),
('e130abc1-099a-4c31-871e-a7463c7f1a35', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e67e3bee-325d-40e4-944b-e3adbaad7276', '2018-05-22 08:45:37', 'uan'),
('e1581ede-4d83-4c7e-aca1-c5fbaee44817', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e020bfea-4460-445b-979d-676d60a1460a', '2018-05-22 08:45:36', 'uan'),
('e16277de-bec9-41b0-a587-c241c4d62bb6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3bfc749a-0b34-4a92-acec-b8331f0e210a', '2018-06-30 10:52:38', 'uan'),
('e18f6231-5920-48c8-b736-d00ee79bc882', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '41da6bba-8076-4b03-957f-588832c2d8c6', '2018-06-30 10:52:37', 'uan'),
('e21d7cb3-e6dd-4408-a470-2ee030ed1f30', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e67e3bee-325d-40e4-944b-e3adbaad7276', '2018-06-30 10:52:37', 'uan'),
('e2683580-e2cb-4609-905b-1c9cfe6c8631', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ad0de284-9c1f-4afb-af14-f9c5a8e866c7', '2018-06-30 10:52:34', 'uan'),
('e269c697-7f23-4987-90da-a2c64003e6d3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7acdd8f8-3587-4060-8c11-159e271162bd', '2018-06-30 10:52:36', 'uan'),
('e2d2f2cb-f10c-49a6-a6f3-b873d5f65db9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '31199fea-51ff-4093-9034-e1b491ee36f8', '2018-06-30 10:52:39', 'uan'),
('e2e04324-e0c9-4e29-bce0-903c60d69cc3', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7537a7af-57ab-46ae-8439-04018015127b', '2018-05-22 08:45:36', 'uan'),
('e384baa1-0a05-4305-8b9e-6811277aa03a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', '2018-05-22 08:45:37', 'uan'),
('e3d9cee0-464d-4de4-8d2d-430ce8cc3587', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6f82d8d1-5046-4bfb-8bae-853fb8487bbc', '2018-06-30 10:52:33', 'uan'),
('e3ed6de1-d522-4779-9b87-8a9a5ca0db9c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'beeefa8c-44a9-4238-97b4-ee5750422fb0', '2018-06-30 10:54:42', 'uan'),
('e451a66b-56ee-4db1-a0a4-3684c8921697', 'ccce1b2c-5926-4612-8792-775ed8c11033', '20dd5d9b-767f-4451-a857-88f142608223', '2018-06-30 10:54:40', 'uan'),
('e47fe7dc-55e0-4179-b564-9344e19da355', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5a950057-6c85-4b99-a6b4-3ed76d48f2b4', '2018-06-30 10:52:38', 'uan'),
('e4afa822-08cf-41f1-ba19-ee742aad3b33', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5f099f25-69b6-41a9-ad14-0812860a47f7', '2018-06-30 10:52:33', 'uan'),
('e53c8cda-0974-479c-b44e-38ccfef10d36', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ea463ce5-b72a-4710-9d08-b1d27e73093f', '2018-06-30 10:54:41', 'uan'),
('e5657e86-202d-43db-8d21-74ace0e228aa', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd1184ebf-bce8-48bb-b685-5e17fe447915', '2018-05-22 08:45:36', 'uan'),
('e5810187-0ddc-414a-8c70-faf4533ba445', 'ccce1b2c-5926-4612-8792-775ed8c11033', '665c0580-3f54-42fa-ad55-7da779b0107a', '2018-06-30 10:54:41', 'uan'),
('e5b85bc2-afcf-4272-af21-e15cd553d5df', 'ccce1b2c-5926-4612-8792-775ed8c11033', '49fcaede-e452-450d-8781-cdbe2eb13836', '2018-06-30 10:54:43', 'uan'),
('e5dffef2-ce7e-4053-b23a-391237a6c4c5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ad0de284-9c1f-4afb-af14-f9c5a8e866c7', '2018-06-30 10:54:40', 'uan'),
('e6a84fb9-2c8e-41af-9cfa-a2d359bcc61e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '74b0584d-4276-45d8-829c-70776ab33a4f', '2018-06-30 10:52:38', 'uan'),
('e6f1f4ed-9cf6-4dd3-8fbf-ef9ed0d9a231', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', '2018-06-30 10:52:35', 'uan'),
('e764c936-df86-4bf8-819e-4823efca13ac', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '6086a957-3ee3-4720-a0c9-38287c6075c5', '2018-03-12 10:46:38', 'uan'),
('e7d72844-a5f4-4f30-b9b7-39554c4d21a7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '20f4bebf-5c04-44b5-9e27-f15a7e344311', '2018-06-30 10:52:37', 'uan'),
('e8892d2e-51c3-4c1d-a304-1fc793bf5a38', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '165fd8d9-3e5c-4301-9608-40a4c3e5da0b', '2018-05-22 08:45:37', 'uan'),
('e92b4155-59dc-4958-afe7-9c6a8eb1764b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0e0e06da-117e-40aa-8332-504f988200a5', '2018-06-30 10:54:42', 'uan'),
('e9d7c04f-f289-4417-9f60-bf2910421c18', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '20f4bebf-5c04-44b5-9e27-f15a7e344311', '2018-05-22 08:45:37', 'uan'),
('e9fa5dd7-f27b-4dee-8858-3a195d6758ec', 'ccce1b2c-5926-4612-8792-775ed8c11033', '518e91db-35da-4118-bd27-4670f886bf46', '2018-06-30 10:54:43', 'uan'),
('ea008abc-f6aa-41a6-aa5b-7b7808d60f83', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0a623bf2-9517-47ba-a3f1-536665e1c334', '2018-06-30 10:54:42', 'uan'),
('ea697ba9-3c7e-4ccc-ae97-e59f405cd673', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b8e4cfc7-6629-492a-944b-949c3b947831', '2018-06-30 10:54:42', 'uan'),
('ea7fa84e-b76c-4204-84a1-91636c9cb9cc', 'ccce1b2c-5926-4612-8792-775ed8c11033', '31a66b5a-69cb-4d98-8b8b-c005826dc299', '2018-06-30 10:54:41', 'uan'),
('eb04dc55-f371-41ba-8141-359668c07dac', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'eb308a9b-f509-40de-89a7-37da2bbf6c6c', '2018-05-22 08:45:37', 'uan'),
('eb37238b-de7c-435a-995f-19df90e34765', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0060f68a-8aaf-4ac4-8851-1f29ad0834d3', '2018-05-22 08:45:36', 'uan'),
('eb3c00f4-2908-4265-86ac-abfe0ad49efd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a23a4600-3508-48bf-ac65-29cc502cb07a', '2018-05-22 08:45:37', 'uan'),
('eb5fb780-d5d5-4b9a-a246-ff6f8f04165d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f50f9b7d-b688-477f-952a-5119e72c6455', '2018-06-30 10:52:37', 'uan'),
('eb657cd3-feba-47de-922a-bbf80a06d7e9', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a0aba001-f604-4ff7-9147-70812752b77a', '2018-05-22 08:45:37', 'uan'),
('eb7522fe-8720-41a7-a90f-45abe5318bcb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '576a63e6-4f9c-46d7-abc7-97f0dfb1634d', '2018-06-30 10:54:41', 'uan'),
('ed2b5bf8-3a64-4550-afdd-cf222c2ea674', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '388f1093-a144-4618-acb2-74d66e320b82', '2018-06-30 10:52:37', 'uan'),
('ed658b9a-246e-4b94-9827-b955cea1f6a6', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1ee38ccf-44ac-42cc-ae45-3beef54268a7', '2018-06-30 10:54:43', 'uan'),
('ed98b82e-d3a9-42e1-acda-ae6041f245b0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9cfa5966-b544-4d91-bff3-4d4f8d63cb30', '2018-05-22 08:45:37', 'uan'),
('edb81c9c-b66d-4897-967c-dfc0e9753935', 'ccce1b2c-5926-4612-8792-775ed8c11033', '84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', '2018-06-30 10:54:42', 'uan'),
('edd34608-23bc-42c5-adf8-cc38f536c33d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2ecaf777-6418-4268-9a85-58a863b61a53', '2018-05-22 08:45:36', 'uan'),
('edf1d218-a943-4f32-842b-289775cb2db5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd9faff4b-65d2-44e8-9da2-8625927fb870', '2018-06-30 10:52:34', 'uan'),
('eec864a5-a0f5-4305-9619-2deff9b8efa4', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a1a9f201-e19d-42f3-91c3-36772c24bc68', '2018-06-30 10:54:42', 'uan'),
('eef7a5b7-300a-43b7-b7ac-3f8badee05dc', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e904f3bb-ae98-4d1e-82b9-740c33988b3b', '2018-06-30 10:54:40', 'uan'),
('eefd7872-3d84-4eb0-8449-d52ab81263a0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '945605ca-19f9-45d1-a0c8-735243a44d38', '2018-05-22 08:45:37', 'uan'),
('ef1bec56-b0bf-458f-bd87-56af2f4ce07c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6a8fcfb2-4665-4e61-92de-3f9de6e40ca2', '2018-06-30 10:52:37', 'uan'),
('f00907ef-3341-409a-805e-cb95585ae8a5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0c31bda6-a544-499b-989f-a8ef1e17e381', '2018-06-30 10:54:43', 'uan'),
('f019b410-454a-43ba-9f15-e4f0f04ee3fb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', '2018-06-30 10:54:41', 'uan'),
('f091d25f-238b-4001-87cf-9e76c214baf3', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', '2018-05-22 08:45:37', 'uan'),
('f12a126c-fb6f-440c-9921-ea1091797e8c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e30ef40e-200c-4564-bf0a-182e77f5f381', '2018-06-30 10:54:41', 'uan'),
('f12c5782-5e61-4f71-89cc-1374957f0245', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e26e5f95-19f2-411d-b4b6-b5d7cbcdf1c1', '2018-06-30 10:52:35', 'uan'),
('f16fb87f-815d-4793-bb15-fec15065a5d1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9cfa5966-b544-4d91-bff3-4d4f8d63cb30', '2018-06-30 10:54:41', 'uan'),
('f1898db6-c897-4eeb-a0b6-48a2477bc457', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b8e4cfc7-6629-492a-944b-949c3b947831', '2018-05-22 08:45:37', 'uan'),
('f1a1b6ef-9aa5-40fb-aa10-342136155476', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '29d45c81-49da-4a56-b337-6f3ced342652', '2018-05-22 08:45:36', 'uan'),
('f1aee817-487e-4f70-97c7-eb6b6c3f8018', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fa02c8c8-1782-4379-a573-0e1dd3fde6b4', '2018-06-30 10:52:35', 'uan'),
('f1da79de-1fd2-4dc8-8cab-5b351f6fd77c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '272f8adc-b092-46a1-8100-20fb74a97219', '2018-06-30 10:52:36', 'uan'),
('f2ee04a4-db24-4d0c-ad77-cddd7793bf9b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '132d83ae-7476-49e3-a086-6c7def73f62c', '2018-05-22 08:45:36', 'uan'),
('f3190ee8-4af4-4399-9a83-39b9dd90f606', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'eedf5420-ecb7-42b0-966f-76916b24af6d', '2018-06-30 10:54:40', 'uan'),
('f35e6e35-908f-49e5-a744-7f2e1c5ed324', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8a643eb0-e44e-4000-b78f-d7f47bc3255c', '2018-06-30 10:54:43', 'uan'),
('f3fa19c9-6fff-4825-b89b-76de3e6f5cc1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3d727751-1498-4a99-bd59-5c0973238f3c', '2018-05-22 08:45:36', 'uan'),
('f485f5b4-ea79-4668-8c38-288b84bc4c24', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '28cd6cd8-06c6-47de-894e-c47dfeb23b48', '2018-05-22 08:45:37', 'uan'),
('f5194fd1-fbad-4454-af70-79569ec535a9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '188f5f96-3668-4694-bcf8-0922a2727e27', '2018-06-30 10:54:42', 'uan'),
('f533a1ac-aa97-4585-a63f-5484e0e5497b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', '2018-05-22 08:45:37', 'uan'),
('f5346957-295c-45ed-9d8b-8e6883ea0274', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4eb4e924-a85c-4ecc-a639-304d1b26e65d', '2018-06-30 10:52:39', 'uan'),
('f6220fb4-8211-43b5-a04c-ba2b3f679f6a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '31a66b5a-69cb-4d98-8b8b-c005826dc299', '2018-06-30 10:52:36', 'uan'),
('f65b2164-5ecd-425f-bd2a-f09b707bfa36', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '57904998-e34a-4f8e-8bc8-fab31cc0ea88', '2018-06-30 10:52:34', 'uan'),
('f705479f-2b45-48e6-aab7-93598d954d05', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-03-12 10:46:38', 'uan'),
('f71e7019-077e-4bd7-899a-adc54d44d9df', 'ccce1b2c-5926-4612-8792-775ed8c11033', '73aca571-f8d7-4502-a945-fa53ff13676b', '2018-06-30 10:54:40', 'uan'),
('f743baa2-2e21-47b0-ba56-f54a82affbbf', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5a49a41b-be0d-4084-a097-58b8b4c74f3c', '2018-06-30 10:54:42', 'uan'),
('f78c76f3-462a-4023-b90f-e25a9b898561', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0eb176f0-7571-49a8-adcc-83d4a51bd9df', '2018-05-22 08:45:37', 'uan'),
('f7a48941-00c8-4fd4-993c-eacd4800309b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', '2018-06-30 10:54:41', 'uan'),
('f7ffa742-bb26-44ed-930d-48c47091464a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', '2018-06-30 10:54:39', 'uan'),
('f8e5ef0b-83d8-428f-9f05-1c557c8d2f05', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1aaeecda-7082-4554-9ac8-f590f93f8b95', '2018-05-22 08:45:36', 'uan'),
('f8ecbd4a-98dc-4d70-836c-b4dccdfc0887', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', '2018-05-22 08:45:36', 'uan'),
('f922e773-5256-495d-b6e6-f472dcce502d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-06-30 10:52:34', 'uan'),
('f96f7ff1-001b-4f3a-af01-7c94e58095dd', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', '2018-06-30 10:54:40', 'uan'),
('fa4f33a4-8ba3-43b3-b77f-00517c9e053d', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a22ceea6-88b3-41f3-ba6c-2b514d20e217', '2018-06-30 10:54:41', 'uan'),
('faa9760c-e7e4-425a-b7e2-b9a2622316fa', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'beeefa8c-44a9-4238-97b4-ee5750422fb0', '2018-06-30 10:52:38', 'uan'),
('fad56f36-88c8-4887-9d71-943f4b82d637', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7acdd8f8-3587-4060-8c11-159e271162bd', '2018-05-22 08:45:37', 'uan'),
('fb5aa8b4-49a4-4fa4-98b3-26583d369887', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '665c0580-3f54-42fa-ad55-7da779b0107a', '2018-05-22 08:45:37', 'uan'),
('fd299d7e-73c1-4a44-879c-af05aff2f15a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '47a6efb9-00dc-46ef-a293-ea209998cebf', '2018-06-30 10:54:42', 'uan'),
('fdecd0bb-1630-4172-a6c1-9773f8fac025', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'edc23445-d3be-4e6b-a5ff-7689dd603ea6', '2018-06-30 10:54:41', 'uan'),
('fe10c37e-03c7-4d13-b5e4-6b836c0e814d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '41b9bd12-d501-48d5-a17d-12ed249ffe16', '2018-06-30 10:54:41', 'uan'),
('feefcd0e-e6c7-47b3-9b28-4ee920cb480f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c634c46f-2ca8-4616-99e9-dc09ca390491', '2018-06-30 10:52:36', 'uan'),
('fef7d20f-1746-4a69-ab5c-8c161f754cf5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7663bc12-ff3b-4cb3-bc21-90edae293940', '2018-06-30 10:54:42', 'uan'),
('ffc91f66-fec0-4748-9f93-33a940f68118', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a988a6fd-2786-4c25-b721-8b84380314bc', '2018-06-30 10:52:38', 'uan');

-- --------------------------------------------------------

--
-- Table structure for table `saving_accounts`
--

CREATE TABLE `saving_accounts` (
  `id` char(36) NOT NULL,
  `bpartner_id` char(36) NOT NULL,
  `registerdate` date NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `balanceamt` decimal(10,4) NOT NULL DEFAULT 0.0000,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `saving_transactions`
--

CREATE TABLE `saving_transactions` (
  `id` char(36) NOT NULL,
  `saving_accounts` char(36) NOT NULL,
  `docdate` date NOT NULL,
  `docno` varchar(50) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bank_account_id` char(36) NOT NULL,
  `isdeposit` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isactive` enum('Y','N') DEFAULT 'Y',
  `docstatus` varchar(50) NOT NULL DEFAULT 'DR',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `seller` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sd_weights`
--

CREATE TABLE `sd_weights` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(45) NOT NULL,
  `seq` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `formula` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sd_weights`
--

INSERT INTO `sd_weights` (`id`, `name`, `code`, `seq`, `created`, `modified`, `formula`) VALUES
('0fe701c1-0c69-4f6a-b8bd-e6b265aeff03', '1 บาท', '1B', 7, '2018-06-21 14:44:02', '2018-06-21 14:44:02', NULL),
('14fafbc2-dce4-41a2-ab1f-82442afcbfcf', '2 บาท', '2B', 9, '2018-06-28 16:50:03', '2018-06-28 16:51:02', 'bath*2'),
('1eee0394-f557-4d42-8c3e-033d3727542d', '1/2 สลึง', '0.5S', 3, '2018-06-21 14:42:57', '2018-06-21 15:49:45', '(bath/4)/2'),
('1f5788e5-c167-423c-a139-87ea972ba6bc', '6 สลึง', '6S', 8, '2018-06-21 14:44:13', '2018-06-21 15:49:00', 'bath+(bath/2)'),
('216e8ce0-5713-4ced-bc8f-e68e50cd4937', '5 บาท', '5B', 12, '2018-06-28 16:53:12', '2018-06-28 16:53:12', 'bath*5'),
('2261a587-8c7e-4497-a033-ed29bb9d2b03', '10 บาท', '10B', 17, '2018-06-28 17:04:08', '2018-06-28 17:04:08', 'bath*10'),
('28787316-48cb-4130-9731-a08acb46d434', '3 สลึง', '3S', 6, '2018-06-21 14:43:40', '2018-06-21 15:49:28', '(bath/4)*3'),
('67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2', '9 บาท', '9B', 16, '2018-06-28 17:03:11', '2018-06-28 17:03:11', 'bath*9'),
('6dff95f8-6436-4616-a7f2-f1dce527d9c0', '1 สลึง', '1S', 4, '2018-06-21 14:43:13', '2018-06-21 15:49:56', 'bath/4'),
('738b020f-338d-4fbb-bae2-b6b66a79bf58', '4 บาท', '4B', 11, '2018-06-28 16:51:49', '2018-06-28 16:51:49', 'bath*4'),
('915c0569-a2d8-41dd-99c6-cc58b32618d4', '2 สลึง', '2S', 5, '2018-06-21 14:43:27', '2018-06-21 15:50:05', 'bath/2'),
('9ee2b5fb-486f-4b3f-b8b9-861927a465fc', '7 บาท', '7B', 14, '2018-06-28 17:02:19', '2018-06-28 17:02:19', 'bath*7'),
('bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649', '8 บาท', '8B', 15, '2018-06-28 17:02:51', '2018-06-28 17:02:51', 'bath*8'),
('d92f88d2-83dc-4196-9f2e-b8e925dfaa62', '6 บาท', '6B', 13, '2018-06-28 16:54:02', '2018-06-28 16:54:02', 'bath*6'),
('e5c56205-ed96-499b-ab20-139df9ab4b46', '1 กรัม', '1G', 2, '2018-06-21 14:42:36', '2018-06-23 07:17:39', 'bath/15.16'),
('f0be53d1-4763-4613-b579-daff980f1e82', '0.6กรัม', '0.6G', 1, '2018-06-21 14:42:18', '2018-06-23 07:19:26', '(bath/15.16)*0.6'),
('fedea371-3a34-4ea3-a4e6-2e6d4f40966d', '3 บาท', '3B', 10, '2018-06-28 16:50:17', '2018-06-28 16:51:19', 'bath*3');

-- --------------------------------------------------------

--
-- Table structure for table `sequent_numbers`
--

CREATE TABLE `sequent_numbers` (
  `id` char(36) NOT NULL,
  `doccode` char(3) NOT NULL,
  `prefix` char(5) DEFAULT NULL,
  `suffix` char(5) DEFAULT NULL,
  `start_no` int(11) NOT NULL,
  `current_no` int(11) DEFAULT NULL,
  `running_length` int(1) NOT NULL,
  `current_sequent` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sequent_numbers`
--

INSERT INTO `sequent_numbers` (`id`, `doccode`, `prefix`, `suffix`, `start_no`, `current_no`, `running_length`, `current_sequent`, `description`, `org_id`, `branch_id`, `created`, `createdby`, `modified`, `modifiedby`, `isactive`) VALUES
('01f003ec-e1ae-49d0-8203-75bf1ea33954', 'IV', 'IV', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:20', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:20', NULL, 'Y'),
('22a0412c-018f-4f1c-a7c7-a43dd1956ec0', 'DP', 'DP', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('2a9702ee-8b3b-486f-b5e8-581278ee1162', 'MM', 'MM', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('4cd19fa3-ee1e-4357-8aef-7110ed419a3c', 'AP', 'AP', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('4e7830ad-42aa-4e12-b766-99b1023518d0', 'IV', 'IV', NULL, 1, 1, 5, 'IV00001', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-28 16:18:57', NULL, 'Y'),
('50133268-abe9-443e-88e7-3a121eb5e3e8', 'GR', 'GR', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('58cf687d-9a1d-4373-86af-e6835fb5a5b6', 'RF', 'RF', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('63d8a4ff-712e-4c16-948c-313250fe359d', 'WD', 'WD', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('6c45b69b-b09b-4508-aac7-6e9a727e53a1', 'PW', 'PW', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:19', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:19', NULL, 'Y'),
('7a1271ea-ef36-4d88-b3a2-6bcbf75afea5', 'DP', 'DP', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('7c36fb84-9b7a-4465-a8a7-ac709c780392', 'AR', 'AR', NULL, 1, 3, 5, 'AR00003', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-28 18:01:48', NULL, 'Y'),
('7c6e6873-d96e-4310-8e3e-4f535350f174', 'AR', 'AR', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:27', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:27', NULL, 'Y'),
('80bb28fa-e322-4abd-99e3-262fcc93e194', 'WD', 'WD', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('854199a3-9b1f-4361-9c90-678d9eb1e26e', 'BK', 'BK', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-07-01 09:35:05', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-07-01 09:35:05', NULL, 'Y'),
('982cfaf6-f2b0-44c0-b230-3af7ba1d5947', 'PW', 'PW', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('986825db-df9d-4188-b9c3-388bea4834fb', 'AP', 'AP', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:27', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:27', NULL, 'Y'),
('b9fca12c-68c4-4f9f-9c80-af857396c201', 'RF', 'RF', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('d01aab6f-f8bb-486a-99dc-9ffcc668befd', 'SO', 'SO', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:19', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:19', NULL, 'Y'),
('e57daebe-a614-4812-85b2-13fea1c0cfb2', 'GR', 'GR', NULL, 1, 1, 5, 'GR00001', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-28 16:21:02', NULL, 'Y'),
('f8dd1692-ca58-498d-b03c-2633b09b8eb2', 'MM', 'MM', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('fdd25d6d-b0ff-4162-a725-5d50ec09bac0', 'SO', 'SO', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `serial_numbers`
--

CREATE TABLE `serial_numbers` (
  `id` char(36) NOT NULL,
  `wh_product_id` char(36) NOT NULL,
  `code` varchar(50) NOT NULL,
  `isprinted` enum('Y','N') NOT NULL DEFAULT 'N',
  `printeddate` datetime DEFAULT NULL,
  `issales` enum('Y','N') NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` char(36) NOT NULL,
  `name` varchar(45) NOT NULL,
  `isactive` varchar(45) DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `product_category_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `isactive`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `product_category_id`) VALUES
('00fedd03-748a-42fa-9e99-918aee06cbee', '1 กรัม', 'Y', '', '2018-05-22 17:28:36', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:28:36', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498'),
('0b43db96-a8d5-4db8-8a05-7a4c40a93a4c', '71', 'Y', '', '2018-05-22 14:51:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:31', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('156fdbde-14ea-48ca-b050-1e66687e0255', '47', 'Y', '', '2018-05-22 14:49:03', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:49:03', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('191cc5a2-07ba-405b-96e0-89c0b57414af', '14', 'Y', 'นิ้ว', '2018-05-22 17:33:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:33:48', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('2a5e5dd2-231b-4997-b4fe-189ef95e09d4', '48', 'Y', '', '2018-05-22 14:49:36', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:49:36', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('2e493f3a-72d2-4062-9463-9ff5d17a41aa', '68', 'Y', '', '2018-05-22 14:51:18', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:18', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('2e6f62f6-c301-45d3-a8be-c1c74eaf31fa', '13', 'Y', 'นิ้ว', '2018-05-22 17:33:27', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:33:27', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('2fbfe979-d7f7-4256-90fc-0399d4225525', '53', 'Y', '', '2018-05-22 14:50:09', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:09', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('35959a4d-a4ce-4673-8a6e-f779b1517182', '62', 'Y', '', '2018-05-22 14:50:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:52', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('37575a2e-4030-4358-a0a3-c91f400da718', '50', 'Y', '', '2018-05-22 14:49:49', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:49:49', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('3d3cbfc5-2c13-4e00-8288-0ccfa6165473', '1/2 สลึง', 'Y', '', '2018-05-22 17:07:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:07:44', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498'),
('582163bb-ea24-4ff3-82a4-267f19515e70', '56', 'Y', '', '2018-05-22 14:50:26', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:26', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('65890f9e-c54c-4a3a-bec4-24e7dc8a94be', '59', 'Y', '', '2018-05-22 14:50:40', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:40', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('71fb6419-6e4d-4c2d-8b71-6657ee835dcb', 'เล็ก', 'Y', 'สำหรับ 1/2ส-1สลึง', '2018-05-22 15:32:07', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:32:53', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '22797ccc-60cc-49b8-8194-f6bd87b31f0c'),
('7a3b0dfc-5c10-4d88-a677-404f04c877b4', '11', 'Y', 'นิ้ว', '2018-05-22 17:32:33', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:33:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('7a866a2d-370c-4409-be61-7915d29a5202', '52', 'Y', '', '2018-05-22 14:50:00', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:00', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('7dc0972d-0c35-44c3-ac97-26ebe358b966', '10 ', 'Y', 'นิ้ว', '2018-05-22 14:54:27', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:32:57', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('955c9259-1f54-4490-a9e0-9769c9a056c1', '67', 'Y', '', '2018-05-22 14:51:14', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:14', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('9852b5c5-ab79-4f2f-aa66-65f285e88ff0', '51', 'Y', '', '2018-05-22 14:49:55', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:49:55', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('9a8cdbf9-e142-4c74-b022-b417b922517e', 'กลาง', 'Y', 'สำหรับ 1สลึง-2สลึง', '2018-05-22 15:32:24', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:33:04', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '22797ccc-60cc-49b8-8194-f6bd87b31f0c'),
('9ddb0b92-0755-4977-a04e-5ef8fc0620de', '55', 'Y', '', '2018-05-22 14:50:18', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:18', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('a270d1af-f879-46ba-b4b4-fdb35b3f9e28', '16', 'Y', 'นิ้ว', '2018-05-22 17:34:19', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:34:19', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('a3368ca1-a7f8-4690-91c4-2bba0da49e55', '1 สลึง', 'Y', '', '2018-05-22 17:07:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:07:54', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498'),
('a4aa8c61-00ef-4354-b76f-089cb84ac57e', '66', 'Y', '', '2018-05-22 14:51:11', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:11', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('aaba4440-11d7-47cb-a604-a74214440952', '18', 'Y', 'นิ้ว', '2018-05-22 17:34:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:34:46', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('aec01ab0-6c94-46d3-878d-b03af90a884c', '17', 'Y', 'นิ้ว', '2018-05-22 17:34:32', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:34:32', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('b197fada-f547-4fed-ab54-46bc42993fd0', '63', 'Y', '', '2018-05-22 14:51:00', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:00', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('b38fde49-09e2-43ca-be36-69fa4b6a1d78', '15', 'Y', 'นิ้ว', '2018-05-22 17:34:05', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:34:05', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('b453dca2-37e0-4538-83ed-4d1a2980297c', '61', 'Y', '', '2018-05-22 14:50:48', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:48', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('bf4619cf-ffec-4d63-9105-4542b2922f12', '9', 'Y', 'นิ้ว', '2018-05-22 14:54:09', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:33:13', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('c6b20bfa-4f45-42ae-a01e-e90f44f2b76e', '1.13 กรัม', 'Y', '', '2018-05-22 17:07:27', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:07:27', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498'),
('ca26255c-d4d6-4a8a-be13-9c4f2c757214', '46', 'Y', '', '2018-05-22 14:48:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:48:54', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('d43a2146-e978-44c8-9f9f-7862c06f44a1', '12', 'Y', 'นิ้ว', '2018-05-22 17:32:47', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:32:47', NULL, '9d8cca7e-7880-4195-9357-bebe6f37cfa2'),
('d4e3feca-5d2d-48c7-817d-53d5e48f2f3e', '70', 'Y', '', '2018-05-22 14:51:26', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:26', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('d5d24afd-6bbc-4ae6-b9ff-f8ba98027f3f', '49', 'Y', '', '2018-05-22 14:49:44', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:49:44', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('d89bdd0d-ffed-4db7-96ef-b563c1cc6a57', '2 สลึง', 'Y', '', '2018-05-22 17:08:03', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 17:08:03', NULL, '27b3beef-e513-4aa7-93fb-c6caba080498'),
('d948230f-200a-4752-88c5-43ca1a7bd432', '54', 'Y', '', '2018-05-22 14:50:13', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:13', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('dd9e24fe-2dc0-49e0-873d-0705a90aa5af', '65', 'Y', '', '2018-05-22 14:51:08', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:08', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('dda62203-d8ff-4503-b8ee-efd26f74a413', 'ใหญ่', 'Y', 'สำหรับ 2สลึง-1บาท', '2018-05-22 15:32:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 15:32:38', NULL, '22797ccc-60cc-49b8-8194-f6bd87b31f0c'),
('e0b627bc-96a4-44c8-841c-c7b88568226e', '69', 'Y', '', '2018-05-22 14:51:23', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:23', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('e73fb5a3-b8ff-4a36-ba84-8f88e580e4d7', '57', 'Y', '', '2018-05-22 14:50:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:31', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('e8e89ec6-772f-487b-99f0-8e04440591f1', '58', 'Y', '', '2018-05-22 14:50:36', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:36', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('eb28a4ec-f0c7-4248-b84e-e2cf716a2bad', '60', 'Y', '', '2018-05-22 14:50:45', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:50:45', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('f1b03ce5-9aca-4959-9e05-8913cf566d53', '73', 'Y', '', '2018-05-22 14:51:38', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:38', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('f2cfc3a7-3608-488e-8e69-ea821664e8c9', '64', 'Y', '', '2018-05-22 14:51:04', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:04', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f'),
('f7b7528a-45b3-4a6e-9f44-50fd7d6b324b', '72', 'Y', '', '2018-05-22 14:51:34', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-22 14:51:34', NULL, '26c3ff5b-b00b-4d7a-a458-32082fd5907f');

-- --------------------------------------------------------

--
-- Table structure for table `smartcards`
--

CREATE TABLE `smartcards` (
  `id` char(36) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `cardno` varchar(45) DEFAULT NULL,
  `full_address` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `houseno` varchar(45) DEFAULT NULL,
  `moo` varchar(45) DEFAULT NULL,
  `sub_district` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `address_line` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `storage_bins`
--

CREATE TABLE `storage_bins` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isdefault` enum('Y','N') NOT NULL DEFAULT 'N',
  `warehouse_id` char(36) NOT NULL,
  `seq` int(11) DEFAULT 1,
  `description` varchar(255) DEFAULT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storage_bins`
--

INSERT INTO `storage_bins` (`id`, `name`, `isdefault`, `warehouse_id`, `seq`, `description`, `isactive`, `created`, `createdby`, `modified`, `modifiedby`) VALUES
('71fc0404-e0a1-4c4c-a58f-5d804883745b', 'ลิ้นชัก', 'Y', '77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0', 1, '', 'Y', '2018-03-06 11:19:17', '935ab8e8-c2f7-4743-8950-96e1012a07a0', '2018-03-06 12:59:46', '935ab8e8-c2f7-4743-8950-96e1012a07a0'),
('f9b91e3c-7975-4276-9397-44d25b7c8897', 'ตู้ทอง', 'N', '77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0', 1, '', 'Y', '2018-03-06 13:00:02', '935ab8e8-c2f7-4743-8950-96e1012a07a0', '2018-03-06 13:00:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_usages`
--

CREATE TABLE `system_usages` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_usages`
--

INSERT INTO `system_usages` (`id`, `user_id`, `ipaddress`, `isactive`, `created`, `modified`, `description`) VALUES
('05aad7c0-4b6f-4013-bacc-a37092340033', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.216', 'Y', '2018-05-07 10:27:20', '2018-05-07 11:46:13', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('064f074d-ac83-45fe-9b64-459b8b94a75c', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '110.169.177.215', 'Y', '2018-05-11 07:20:53', '2018-05-11 09:46:26', 'Bangkok Thailand[ 13.7083,100.4562]'),
('0bb22599-866c-40f1-97a5-075dacf79daa', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '110.169.177.202', 'Y', '2018-05-15 10:52:41', '2018-05-15 11:17:00', 'Bangkok Thailand[ 13.7083,100.4562]'),
('14b54849-af91-4370-8ec0-9a72bf6aed00', '1a4764f6-3edc-4ca8-a7a4-7a266f97a9a2', '110.169.177.215', 'N', '2018-05-11 07:18:40', '2018-05-11 07:20:50', 'Bangkok Thailand[ 13.7083,100.4562]'),
('1a31b7ed-7334-4c86-90c3-016d00f7dd96', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '110.169.176.162', 'Y', '2018-05-22 14:29:06', '2018-05-22 15:58:52', 'Bangkok Thailand[ 13.7083,100.4562]'),
('1c742674-5e3f-4c56-9249-79559e9c60f0', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.188.237', 'Y', '2018-05-09 15:21:27', '2018-05-09 16:33:14', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('1e5b2d32-68f1-4f40-907e-30c07216655a', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.97.246.115', 'Y', '2018-06-28 17:48:27', '2018-06-28 17:48:27', 'Ban Prang Thailand[ 14.6833,102.0333]'),
('2f81b246-49a0-4a5f-b746-972c9226d152', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '110.169.176.162', 'Y', '2018-05-22 16:21:11', '2018-05-22 17:50:39', 'Bangkok Thailand[ 13.7083,100.4562]'),
('30110764-0743-405a-8f91-9112ac772289', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '115.87.200.132', 'Y', '2018-05-23 04:40:50', '2018-05-23 10:16:01', 'Bangkok Thailand[ 13.6,100.7167]'),
('32644635-7a26-4e7e-8a49-7b76d30a81e2', '34d512fa-3b93-4b09-b342-64696d9da155', '182.232.49.13', 'Y', '2018-05-06 07:33:31', '2018-05-06 07:33:31', 'Bangkok Thailand[ 13.7,100.4667]'),
('394f9170-4ff0-4b14-be65-0c02e739cac5', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '58.11.55.162', 'Y', '2018-05-29 17:40:04', '2018-05-29 17:41:23', 'Bangkok Thailand[ 13.8667,100.6]'),
('3ac9fd66-aee1-47d4-bb46-ff0182fb3c0c', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.216', 'Y', '2018-05-07 12:19:53', '2018-05-07 15:23:01', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('3f498b4c-5ece-4e16-8ca9-cc86c33d5545', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '110.169.177.215', 'N', '2018-05-11 07:16:06', '2018-05-11 07:18:27', 'Bangkok Thailand[ 13.7083,100.4562]'),
('43df684c-06e7-4558-94c1-e5ca8384851b', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.216', 'N', '2018-05-07 11:46:30', '2018-05-07 12:19:49', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('44ea4b39-db02-4136-aa75-09af6e7d66b1', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.144.186', 'Y', '2018-06-05 06:19:22', '2018-06-05 06:19:22', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('46553757-895e-4431-9d14-258221306d4c', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '183.89.185.216', 'Y', '2018-05-06 09:42:55', '2018-05-06 09:56:14', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('4b2c91d7-75ec-49b2-b0e8-af94be7a1670', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.188.237', 'Y', '2018-05-09 10:56:45', '2018-05-09 10:57:02', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('4b846fac-7ed3-42cb-be20-3d9f82ad600d', '34d512fa-3b93-4b09-b342-64696d9da155', '183.89.185.76', 'Y', '2018-06-01 07:50:12', '2018-06-01 07:51:18', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('4d03f6b4-3098-44cc-a41a-1773582ec244', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '110.169.177.215', 'Y', '2018-05-11 15:08:56', '2018-05-11 15:16:54', 'Bangkok Thailand[ 13.7083,100.4562]'),
('4de4c51f-05ce-4ed9-b8ea-de98e17a34bf', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '180.183.158.177', 'Y', '2018-06-28 15:59:05', '2018-06-28 15:59:05', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('566e8997-d8cb-4aca-aeb3-9ef53f5a736c', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '124.121.242.234', 'Y', '2018-06-30 17:19:07', '2018-06-30 17:19:07', 'Mukdahan Thailand[ 16.4792,104.6583]'),
('5cc7ef9c-b36a-4227-b3ab-c41d2e929e9f', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '58.11.210.128', 'Y', '2018-06-27 16:42:47', '2018-06-27 16:42:47', 'Ban Nokkhao Plao Thailand[ 15.0198,100.7923]'),
('5ee15060-3076-45c1-bdcd-eefdd0446aa0', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.216', 'Y', '2018-05-06 08:51:09', '2018-05-06 08:53:51', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('601f1c46-3817-4238-b0e7-2c16dea5da08', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '124.122.121.136', 'Y', '2018-06-15 16:30:31', '2018-06-15 16:30:31', 'Bangkok Thailand[ 13.7333,100.5333]'),
('6b1219f8-8c05-4ea9-a89e-f7ae47e8a24a', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '183.89.185.216', 'N', '2018-05-07 08:02:23', '2018-05-07 08:20:51', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('6d6e498d-59b2-4026-9000-1ef8e320a308', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '183.89.185.216', 'Y', '2018-05-06 09:25:55', '2018-05-06 09:39:42', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('71232183-2313-432d-a139-75b074ef701f', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.184.158', 'Y', '2018-06-23 07:53:53', '2018-06-23 07:53:53', ' Thailand[ 13.75,100.4667]'),
('796f884e-ac4c-4de0-bc64-3e302cf11029', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.144.186', 'Y', '2018-06-07 08:41:31', '2018-06-07 08:41:31', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('7dad6c04-1919-4b5b-acd9-5c6e2f80e35c', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '180.183.200.189', 'Y', '2018-06-30 08:39:27', '2018-06-30 08:39:27', ' Thailand[ 13.75,100.4667]'),
('81aa34a1-b8a3-4185-8a30-4b16928d0969', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.200.189', 'Y', '2018-06-30 07:37:04', '2018-06-30 07:37:04', ' Thailand[ 13.75,100.4667]'),
('844eeca0-f4b9-4157-9361-4d0ab3a5a5b5', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '58.8.96.221', 'Y', '2018-05-14 08:47:56', '2018-05-14 08:49:08', 'Chaiyaphum Thailand[ 15.8105,102.0288]'),
('8495cee7-7551-4b0d-b0de-55136cee9ce3', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.203.2', 'Y', '2018-05-26 07:37:53', '2018-05-27 09:46:11', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('8890bb4f-9e3a-4e56-a8b5-aa3850475c83', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.203.123', 'Y', '2018-06-10 15:02:53', '2018-06-10 15:02:53', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('8ae913ce-2db2-4ea7-829c-135b4d591de2', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '182.52.30.240', 'Y', '2018-05-13 11:31:43', '2018-05-13 13:25:52', 'Ban Chan Thailand[ 17.3562,102.8026]'),
('8c6c9deb-dc11-406e-9f4b-2b87695b6d50', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.184.158', 'N', '2018-06-23 07:05:48', '2018-06-23 07:53:50', ' Thailand[ 13.75,100.4667]'),
('90d5b829-2ea5-435f-a84e-95f918a5ea92', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.200.98', 'Y', '2018-05-22 08:31:02', '2018-05-22 08:38:38', ' Thailand[ 13.75,100.4667]'),
('94f28f82-6a55-46a9-9b8c-46182d959638', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.97.246.207', 'Y', '2018-06-11 12:37:09', '2018-06-11 12:37:09', 'Ban Prang Thailand[ 14.6833,102.0333]'),
('a03afc40-be4d-45a0-93a3-5ddd15679047', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.96.67.233', 'Y', '2018-05-25 18:00:23', '2018-05-25 18:02:21', 'Nonthaburi Thailand[ 13.8622,100.5134]'),
('a1f513e3-d4ca-4888-92e5-2e2aa4730c03', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '182.52.30.84', 'Y', '2018-05-11 04:23:49', '2018-05-13 04:26:38', 'Ban Chan Thailand[ 17.3562,102.8026]'),
('a48dc4ac-9ab0-4a3b-9f1b-8e774ca3f8a7', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.188.237', 'Y', '2018-05-09 09:41:51', '2018-05-09 16:00:23', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('a97549f6-173a-4a83-88e4-55bd4ea1aba1', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '101.109.82.200', 'Y', '2018-05-26 10:52:58', '2018-05-26 10:57:56', 'Bangkok Thailand[ 13.754,100.5014]'),
('b0439370-9c6a-4e2d-8ccf-a566664463d9', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '58.8.96.221', 'N', '2018-05-14 05:08:19', '2018-05-14 05:09:37', 'Chaiyaphum Thailand[ 15.8105,102.0288]'),
('b3de86f6-23f1-4104-9cf1-eab039b24cc7', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.96.197.189', 'Y', '2018-05-09 16:18:17', '2018-05-09 16:46:43', 'Bangkok Thailand[ 13.7083,100.4562]'),
('bc9b4351-91fd-487d-9314-b08db85eefe2', '34d512fa-3b93-4b09-b342-64696d9da155', '183.89.185.216', 'N', '2018-05-07 10:32:03', '2018-05-07 12:19:55', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('c140d6ab-6cd2-423e-9b73-2eb62ccb44fe', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '27.55.169.216', 'Y', '2018-05-23 16:50:10', '2018-05-23 16:50:10', 'Bangkok Thailand[ 13.7,100.4667]'),
('c2a6c0de-6f4c-46b8-9815-d9415fc8c49e', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '58.8.96.221', 'Y', '2018-05-14 05:09:47', '2018-05-14 05:50:37', 'Chaiyaphum Thailand[ 15.8105,102.0288]'),
('cd711374-695a-4fa4-8153-faed11ca60ff', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.203.123', 'N', '2018-06-09 09:25:42', '2018-06-10 15:02:25', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('de7d635e-e21e-4c23-90d8-b5195cf2de8e', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.97.246.115', 'Y', '2018-06-28 15:47:24', '2018-06-28 15:47:24', 'Ban Prang Thailand[ 14.6833,102.0333]'),
('e1ad2708-1263-40eb-a7d6-f6ab9226e086', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.144.186', 'N', '2018-06-05 06:16:21', '2018-06-05 06:19:19', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('e380a181-23f0-40a7-b670-26c3e834259e', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.96.196.21', 'Y', '2018-07-01 16:16:08', '2018-07-01 16:16:08', 'Bangkok Thailand[ 13.7083,100.4562]'),
('e4f2c453-3947-4b43-a2df-8016a6883d74', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.76', 'Y', '2018-05-31 06:17:25', '2018-06-01 15:29:02', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('e5312c20-e2ba-4148-b001-75b02320644a', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.97.246.207', 'Y', '2018-06-11 15:57:54', '2018-06-11 15:57:54', 'Ban Prang Thailand[ 14.6833,102.0333]'),
('e6fb63e8-692b-4a2e-8e2c-4112d7604c82', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '110.169.177.215', 'N', '2018-05-11 06:25:40', '2018-05-11 07:15:17', 'Bangkok Thailand[ 13.7083,100.4562]'),
('e8d12324-b800-4ba2-9a13-c35d3cb1b79f', '34d512fa-3b93-4b09-b342-64696d9da155', '183.89.185.216', 'N', '2018-05-07 08:07:07', '2018-05-07 10:27:48', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('e998aae4-e34c-4437-945f-977a37903f55', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '180.183.158.131', 'Y', '2018-06-20 07:45:55', '2018-06-20 07:45:55', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('eb6ce528-e322-4ce4-b5a0-2d6125a1f143', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.201.180', 'N', '2018-06-26 12:39:43', '2018-06-30 07:37:00', 'Chiang Mai Thailand[ 18.6872,98.9167]'),
('ec65e4e9-9cac-4640-a195-aa7147a0f268', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '183.89.185.216', 'N', '2018-05-07 08:21:03', '2018-05-07 10:26:38', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('ec6dba07-e7ad-4309-8702-cbe64cd9c977', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '180.183.200.98', 'Y', '2018-05-22 06:27:26', '2018-05-22 14:19:37', ' Thailand[ 13.75,100.4667]'),
('f2d6d6e3-0ec9-40d8-9218-7096e94ea795', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '103.86.48.105', 'N', '2018-05-06 06:32:43', '2018-05-06 06:48:52', 'Thailand, Changwat Samut Songkhram[ 13.4244,99.9569]'),
('f9b0a1e2-8476-4b9d-950d-a20603486644', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.96.197.189', 'Y', '2018-05-08 16:10:52', '2018-05-08 16:19:18', 'Bangkok Thailand[ 13.7083,100.4562]'),
('fad6a93f-b15b-4a7a-be52-32e4e752c3ea', '34d512fa-3b93-4b09-b342-64696d9da155', '183.89.185.216', 'N', '2018-05-07 10:27:54', '2018-05-07 10:31:57', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('fc4bbc35-61b2-45fd-9766-d51c600838b2', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.216', 'Y', '2018-05-06 06:49:46', '2018-05-06 06:51:29', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('fe502d30-1d56-4ef4-baf9-990ca7b62b0c', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '58.8.96.221', 'N', '2018-05-14 04:04:59', '2018-05-14 05:07:57', 'Chaiyaphum Thailand[ 15.8105,102.0288]');

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
('0', '-', 'System', 'FDTech', '0911489090', '-', 'contact@fdtech.co.th', '2018-02-18', '2018-02-18', '$2y$10$DhXGoJJSFAGKFe22o8LX1OK4mm8xIH6xU8ZxK5v4dR/wFANhHc2Te', 'FDTech', 'Y', NULL, 'System', '2018-02-18 15:52:10', '0', '2018-02-18 15:52:17', '0', NULL, '0', '0'),
('6d2bed90-f9c1-4cc1-9317-63ef62282a73', 'นาย', 'admin', 'admin', '-', '-', 'admin@admin.com', '2018-03-19', '2018-03-18', '$2y$10$5TYcqRFG9EIuCFdJkNL/ceYUImWTb0Tmk2qGq1EVhnkhLTHZCJIte', 'admin', 'Y', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '-', '2018-03-14 09:03:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-03-14 09:03:28', NULL, '', '371a39b9-f692-49dd-9d78-41f388e319cc', '6f19d6f9-bfe9-4e57-b626-420d139bb376'),
('a14f2b7c-d7c6-41a2-9766-43c78b36f681', 'นาย', 'ธานินทร์', 'ทัศไนยเธียรกุล', '0813096001', '3101800161330', '', '1980-10-23', '1475-04-22', '$2y$10$H5H.bD5/ZMSFn2URQnoRdeuMcDGhpMP0qk.oqrxxyROgU7SVFHhxO', 'Thanin', 'Y', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'เจ้าของ', '2018-04-21 08:08:03', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-22 14:39:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '', '371a39b9-f692-49dd-9d78-41f388e319cc', '0'),
('b0ad3559-96df-4ecf-a65f-8932da1073ef', 'นาย', 'สาคร', 'แสงแก้ว', '0992685988', '1570800042933', 'sakorn.s@outlook.com', '2018-03-13', '2018-03-14', '$2y$10$DhXGoJJSFAGKFe22o8LX1OK4mm8xIH6xU8ZxK5v4dR/wFANhHc2Te', 'sakorn.s', 'N', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '', '2018-03-10 06:36:34', '935ab8e8-c2f7-4743-8950-96e1012a07a0', '2018-05-07 08:20:11', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '', '371a39b9-f692-49dd-9d78-41f388e319cc', '0'),
('c6b62d33-c7f6-45ed-bfd2-b6805d392117', 'นางสาว', 'จินดา', 'ฟองจันทร์ตา', '0834776988', '1500900145432', 'fdtechevolution@gmail.com', '1448-10-27', '1475-04-01', '$2y$10$BxxHyiqAlT.3KXOE3Li/u.PCQ1RwgSpOn/FGjm7E9vxmgdxOXCBAi', 'Jinda', 'Y', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'testtest', '2018-04-23 07:08:39', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-04-23 07:08:39', NULL, '', '371a39b9-f692-49dd-9d78-41f388e319cc', '0');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` char(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `ismain` enum('Y','N') DEFAULT 'N',
  `issales` enum('Y','N') DEFAULT 'N',
  `ispurchase` enum('Y','N') DEFAULT 'N',
  `ispawn` enum('Y','N') DEFAULT 'N',
  `islock` enum('Y','N') DEFAULT 'N',
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `org_id`, `branch_id`, `isactive`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `ismain`, `issales`, `ispurchase`, `ispawn`, `islock`, `type`) VALUES
('06bf3232-481a-466a-9f27-ab75c397a87a', 'ชำรุด', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '', '2018-07-01 06:59:16', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-07-01 06:59:16', NULL, 'N', 'N', 'N', 'N', 'Y', 'BK'),
('4d82be9b-563d-4e55-8bca-3828c81776df', 'ประโคนชัย', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', 'Y', '', '2018-04-21 08:21:47', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-26 15:08:05', NULL, 'Y', 'Y', 'N', 'N', 'N', NULL),
('a8206bd4-3c5c-470c-a982-642ae740d76d', 'กระสัง', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '', '2018-04-21 08:22:08', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-26 15:07:07', NULL, 'Y', 'Y', 'N', 'N', 'N', NULL),
('cdaf1f4b-bca3-4b59-a7a8-5f83549e6e2a', 'คลังทองเก่ากระสัง', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '', '2018-06-26 15:07:52', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-26 15:07:52', NULL, 'N', 'N', 'Y', 'N', 'N', NULL),
('ddaf1c97-1813-4016-9c14-77cb716e1bde', 'คลังจำนำกระสัง', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '', '2018-05-07 11:51:01', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-26 15:06:36', NULL, 'N', 'N', 'N', 'Y', 'N', NULL);

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
  `value` decimal(10,2) DEFAULT 0.00,
  `sd_weight_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `isactive`, `description`, `createdby`, `created`, `modified`, `modifiedby`, `product_category_id`, `value`, `sd_weight_id`) VALUES
('0b9ed4cb-5c27-44ff-8d82-358c310fe887', '60.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:31', '2018-06-28 17:00:54', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '60.78', '738b020f-338d-4fbb-bae2-b6b66a79bf58'),
('25cdb73f-a59e-4ecc-a6f5-6a60324689e0', '151.98', 'Y', '', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 17:03:01', '2018-06-28 17:20:51', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '151.98', '2261a587-8c7e-4497-a033-ed29bb9d2b03'),
('2792c4ad-471a-41ea-8cff-60b102e07203', '45.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:22', '2018-06-28 17:00:31', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '45.58', 'fedea371-3a34-4ea3-a4e6-2e6d4f40966d'),
('3c4a59cc-7870-4ad5-9c77-5ad3306793bc', '121.58', 'Y', '', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 17:02:29', '2018-06-28 17:20:39', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '121.58', 'bda2fd1c-4aa1-4ae7-8cee-5bfa1a86d649'),
('45d6f56c-e25f-4d57-bf10-9cc840d036f2', '0.60g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:40:39', '2018-06-23 07:12:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '0.60', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('4d761f82-9857-47a6-a1cc-6ecb7803dd6e', '75.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:40', '2018-06-28 17:01:07', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '75.58', '216e8ce0-5713-4ced-bc8f-e68e50cd4937'),
('5010c746-e7f7-4cb4-83f7-c3ed283e75a4', '11.38g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:25', '2018-06-28 16:47:17', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '11.38', '28787316-48cb-4130-9731-a08acb46d434'),
('54cbee90-9420-4deb-b05c-181afdc5d37a', '136.78', 'Y', '', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 17:02:47', '2018-06-28 17:20:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '136.78', '67e3ed9f-468a-4cfe-9e36-d6d0a50cd1f2'),
('5ebcba82-8ca7-4e04-be33-9713b10720bb', '91.18', 'Y', '', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 17:01:45', '2018-06-28 17:01:45', NULL, NULL, '91.18', 'd92f88d2-83dc-4196-9f2e-b8e925dfaa62'),
('7d9b9e3f-0e58-47d9-8fd5-1c8a467cba78', '30.38g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:14', '2018-06-28 17:00:25', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '30.38', '14fafbc2-dce4-41a2-ab1f-82442afcbfcf'),
('871ce44e-1f55-4330-920f-037d0a9ed8d3', '1.00g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:40:53', '2018-06-23 07:12:35', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '1.00', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('ae3db0f9-7df5-4e16-9315-e3fa8713cc6e', '106.38', 'Y', '', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 17:02:07', '2018-06-28 17:20:32', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '106.38', '9ee2b5fb-486f-4b3f-b8b9-861927a465fc'),
('cc181398-690f-49ed-9834-6824ba2300ae', '7.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:12', '2018-06-23 07:13:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '7.58', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('d1aaaa90-e6e1-41e2-985b-2a5147f36d82', '15.18g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:50', '2018-06-28 16:47:30', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '15.18', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('dbe1bb51-179c-43b8-b0a5-36e9d56f6e8f', '3.79g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:51', '2018-06-28 16:47:04', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, '3.79', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('eb9634e3-bb93-4044-9407-30a53b1c6a9f', '1.13g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:04', '2018-05-27 09:41:04', NULL, NULL, '1.13', NULL),
('f82ceb79-534a-4837-96b3-32953d8484c8', '1.89g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:15', '2018-06-23 07:12:55', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '1.89', '1eee0394-f557-4d42-8c3e-033d3727542d');

-- --------------------------------------------------------

--
-- Table structure for table `wh_products`
--

CREATE TABLE `wh_products` (
  `id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `balance_amt` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `storage_bin_id` char(36) DEFAULT NULL,
  `warehouse_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wh_products`
--

INSERT INTO `wh_products` (`id`, `product_id`, `balance_amt`, `created`, `createdby`, `modified`, `modifiedby`, `description`, `storage_bin_id`, `warehouse_id`) VALUES
('a09e73f8-d0b5-419f-9ead-6c8b7b4900db', 'a080632e-5b96-498c-9e30-28024cb18179', 1, '2018-06-28 16:18:58', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-06-28 16:18:58', NULL, NULL, NULL, 'cdaf1f4b-bca3-4b59-a7a8-5f83549e6e2a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_settings`
--
ALTER TABLE `account_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bpartners`
--
ALTER TABLE `bpartners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `controllers`
--
ALTER TABLE `controllers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_lines`
--
ALTER TABLE `cost_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glitems`
--
ALTER TABLE `glitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gold_prices`
--
ALTER TABLE `gold_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gold_price_lines`
--
ALTER TABLE `gold_price_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_lines`
--
ALTER TABLE `goods_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_transactions`
--
ALTER TABLE `goods_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_lines`
--
ALTER TABLE `invoice_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orgs`
--
ALTER TABLE `orgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pawns`
--
ALTER TABLE `pawns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pawn_lines`
--
ALTER TABLE `pawn_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_lines`
--
ALTER TABLE `payment_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_accesses`
--
ALTER TABLE `role_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_accounts`
--
ALTER TABLE `saving_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_transactions`
--
ALTER TABLE `saving_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sd_weights`
--
ALTER TABLE `sd_weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequent_numbers`
--
ALTER TABLE `sequent_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial_numbers`
--
ALTER TABLE `serial_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartcards`
--
ALTER TABLE `smartcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_bins`
--
ALTER TABLE `storage_bins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_usages`
--
ALTER TABLE `system_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wh_products`
--
ALTER TABLE `wh_products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
