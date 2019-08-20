-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2018 at 08:55 AM
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
('c2643c7c-cd16-4355-b122-441181f5851b', 'branches-view', 'view', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c31061c0-daf6-473d-b061-029e829396f6', 'actions-view', 'view', '650da8b7-46c1-4a0b-add5-6b1675c43b11', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', 'incometype-view', 'view', '0ca1f981-92c3-4115-9c36-00c56bb47a5f', '', '2018-05-22 07:49:14', '', '2018-05-22 07:49:14', ''),
('c4cd3b72-94fd-4b72-9f21-6eff49bbc384', 'branches-add', 'add', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('c582501b-6069-4462-a188-be9ecf07342c', 'addresses-add', 'add', 'dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447', NULL, '2018-02-20 07:28:15', 'system', '2018-02-20 07:28:15', NULL),
('c634c46f-2ca8-4616-99e9-dc09ca390491', 'orders-delete', 'delete', '4ca290b4-dec5-4a21-8c1d-9341e4a71670', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('c6e3a90b-4052-4d13-8055-a4f18e866638', 'changeLocalBranch', 'changelocalbranch', 'c6f7aa87-e575-4afe-9d67-ad2e50246247', '', '2018-06-23 07:51:29', '', '2018-06-23 07:51:29', ''),
('c8197eab-d634-4caf-a289-19e770dd7975', 'report-index', 'index', 'c5ca2880-3c03-4103-bf75-19ab049f456b', '', '2018-05-22 08:08:37', '', '2018-05-22 08:08:37', ''),
('c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', 'scmanagement-savecard', 'savecard', '9af0b68e-2368-4b7d-92fd-55902ac8c922', '', '2018-05-22 08:13:23', '', '2018-05-22 08:13:23', ''),
('cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', 'system_usages-index', 'index', 'b6785b8c-078c-4e4e-a15c-bd0d3bd18f82', NULL, '2018-02-19 07:52:18', 'system', '2018-02-19 07:52:18', NULL),
('cae07239-bdcf-4e60-ab95-941d483c3028', 'pawn-getinterrestrate', 'getinterrestrate', '5dd6a369-b5f8-4a79-88a8-b2ee0c69604d', '', '2018-05-22 07:57:04', '', '2018-05-22 07:57:04', ''),
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
  `total_balance` decimal(10,4) NOT NULL DEFAULT 0.0000,
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
('0554e683-a6e0-47c8-87e6-9b4db01bfd01', '0.0000', 'ห้างทองเยาวราชกรุงเทพ โดยนายธานินทร์', '16424b78-288b-4d71-a62a-43505734b961', 'เงินฝากออมทรัพย์', '3842386062', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-18 13:13:13', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 14:15:57', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', 'BACC'),
('09952747-b3cb-4a35-8e56-559d75b24a28', '0.0000', 'เงินสดหน้าร้าน', NULL, NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', 'auto generate by system', '2018-04-24 13:44:10', '0', '2018-04-24 13:45:04', NULL, 'CASH'),
('43bbf410-6198-4205-aa96-4b462ebea7b4', '700.0000', 'เงินสดหน้าร้านกระสัง', NULL, NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '', '2018-05-07 12:56:31', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-14 08:48:43', NULL, 'CASH'),
('4fc9c7a4-ea71-49ec-a663-15ec406174c1', '0.0000', 'นายธานินทร์ ทัศไนยเธียรกุล', '3e2b623e-3ac5-4c3d-8dc6-8867f9d47968', 'เงินฝากออมทรัพย์', '3160595730', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-21 08:19:50', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 14:14:15', NULL, 'BACC'),
('55961f1c-3f74-4bd5-a572-5a49cbe71622', '0.0000', 'เงินสด', NULL, NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a2af2592-0447-4138-bfcd-83ad3fb317b1', '', '2018-04-18 13:12:38', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-18 13:12:38', NULL, 'CASH'),
('55de3512-22e9-4695-95d9-99a38b983c02', '0.0000', 'โสมสอางค์ บางวิเศษ', '944f4a5e-2d93-4859-95be-afd52119cb3d', 'เงินฝากออมทรัพย์', '4070073095', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-21 08:20:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 10:46:08', NULL, 'BACC'),
('ad373317-d139-472e-b8e2-72ca4d8a3322', '0.0000', 'นายธานินทร์ ทัศไนยเธียรกุล', 'c95ad284-cd06-4abb-bb18-9541a6804065', 'เงินฝากออมทรัพย์', '6403001727', NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '0', '', '2018-04-21 08:19:25', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 14:12:59', NULL, 'BACC'),
('b63e01dd-a3d0-4071-8dc6-d33e97236a91', '0.0000', 'เงินสดหน้าร้าน', NULL, NULL, NULL, NULL, '0', '0', 'auto generate by system', '2018-04-24 13:45:47', '0', '2018-05-01 08:01:23', NULL, 'CASH');

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
('0', '0', 'ลูกค้าหน้าร้าน', '-', '', '', 'Y', 'Y', NULL, NULL, NULL, '2018-04-24 13:44:10', '0', NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL),
('039b1dc7-d5e5-4626-ab1b-cf8fc00ac096', NULL, 'นางสาวสาคร ครคร', 'นางสาว', 'สาคร', 'ครคร', 'Y', 'Y', NULL, '1467-06-08', NULL, '2018-04-24 14:23:34', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0856447966', NULL, 'edbab1de-b751-482c-bda6-3b0c4f4c8ae6'),
('10da21ce-1350-4151-a4e5-61f145c3ce13', NULL, 'นางครคร ครครคร', 'นาง', 'ครคร', 'ครครคร', 'Y', 'Y', '1522366547896', '1991-10-27', NULL, '2018-05-07 11:01:53', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '0254778966', NULL, '8574efa7-972f-4917-aecb-6175cc2863ea'),
('1ecb4b04-fa59-4631-8c89-4884d81ab724', NULL, 'นางสาวครสา แก้วแสง', 'นางสาว', 'ครสา', 'แก้วแสง', 'Y', 'Y', '1523658974569', '2018-02-08', NULL, '2018-04-30 11:09:23', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0258441233', NULL, NULL),
('2e00e9c6-b013-47b7-8aa6-fdea09e566a5', NULL, 'นางสาวก ก', 'นางสาว', 'ก', 'ก', 'Y', 'Y', NULL, '1475-04-02', NULL, '2018-04-25 11:27:06', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834776988', NULL, '27f43266-78b5-4487-aee1-8cdcfa77a5aa'),
('30fba74e-25d8-4309-b105-91c548cd148a', NULL, 'นายfaii Fongjanta', 'นาย', 'faii', 'Fongjanta', 'Y', 'Y', NULL, '1475-04-04', NULL, '2018-04-24 14:25:32', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834776988', NULL, '38af9e5f-e8bc-4f50-a23c-161315bc23fa'),
('31143800-1375-4d4a-af0b-2f122e0fe4b4', NULL, 'นางสาวสาคร แสงแก้ว', 'นางสาว', 'สาคร', 'แสงแก้ว', 'Y', 'Y', NULL, '1446-03-15', NULL, '2018-04-25 11:47:02', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0992685988', NULL, '3b44a169-0ef4-48c1-83e2-76a26462347b'),
('3ac41b3c-b989-41be-ab4e-3f74c3b7a62a', NULL, 'นางสาวJinda Fongjanta', 'นางสาว', 'Jinda', 'Fongjanta', 'Y', 'Y', '1500900145432', '2018-02-07', NULL, '2018-05-03 10:33:03', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834776988', NULL, '0599e40d-6a17-4e3e-ac2b-aa93d9f6ba44'),
('47019c99-030d-4137-af7f-1adda6c54d11', NULL, 'นายffff ffff', 'นาย', 'ffff', 'ffff', 'Y', 'Y', '1112221112221', '2018-05-06', NULL, '2018-05-06 06:34:14', '34d512fa-3b93-4b09-b342-64696d9da155', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', NULL, '1212121212', NULL, '9af84195-7122-4a6e-a46f-ad7a5605c667'),
('514cacd3-332e-4fea-8ff9-a29511d14a2c', NULL, 'นายสาคร แสงแก้ว', 'นาย', 'สาคร', 'แสงแก้ว', 'Y', 'Y', '1570800042933', '1989-03-15', NULL, '2018-05-06 06:51:06', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '0992685988', NULL, 'bb57324c-55eb-4bd5-8427-a4b50aad1ac5'),
('5df84cb7-7866-4ebf-b3ca-a4086338c7ed', NULL, 'นายครครคร Fongjanta', 'นาย', 'ครครคร', 'Fongjanta', 'Y', 'Y', NULL, '1475-04-02', NULL, '2018-04-24 14:27:50', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834776988', NULL, NULL),
('6144f921-709b-4424-bc33-8ff7a7f746e6', NULL, 'นางสาวJinda Fongjanta', 'นางสาว', 'Jinda', 'Fongjanta', 'Y', 'Y', NULL, '1475-04-01', NULL, '2018-04-25 11:25:38', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834776988', NULL, NULL),
('807caa95-d3b7-40b3-8fdb-7b88ef04f48b', NULL, 'นางสาวกขค คขก', 'นางสาว', 'กขค', 'คขก', 'Y', 'Y', NULL, '1475-03-27', NULL, '2018-04-23 08:46:25', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0842556988', NULL, '0d37587d-d378-4334-aded-c087a8afadfc'),
('841d6978-26e8-4e37-9d1d-d8e3aebf45eb', NULL, 'นางสาวจินดา ฟองจันทร์ตา', 'นางสาว', 'จินดา', 'ฟองจันทร์ตา', 'Y', 'Y', '1522366547895', '1448-10-18', NULL, '2018-05-01 07:47:36', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '', '0834776988', '', '389ea2b7-06c6-4b86-b381-d163412934e6'),
('84cca89a-78e5-479c-9397-dd6ac98baa26', NULL, 'นายบรรยงค์ จิตดี', 'นาย', 'บรรยงค์', 'จิตดี', 'Y', 'Y', NULL, '1446-01-02', NULL, '2018-04-25 17:17:20', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', NULL, NULL, NULL, '0', '0', NULL, '0801234567', NULL, 'eac48ea8-39c1-45a9-a501-745c1676babb'),
('87af7c0c-b99a-4c67-bf70-7186bffec7ef', NULL, 'นายxx xxx', 'นาย', 'xx', 'xxx', 'Y', 'Y', '11111111111', NULL, NULL, '2018-06-01 09:24:01', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '', NULL, '24113bf2-0ffb-4c5d-942a-4f904fa50161'),
('97b87d75-4ee3-443f-a20e-9cba11e276e4', NULL, 'นางสาวฝ้ายฝ้าย ฝ้ายยยย', 'นางสาว', 'ฝ้ายฝ้าย', 'ฝ้ายยยย', 'Y', 'Y', '1522955874658', '2000-03-16', NULL, '2018-05-07 10:20:15', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '0258774988', NULL, 'c1e663fd-9536-4c1c-bd26-7fa7f56b0d25'),
('a540d723-e87e-44cd-88af-e2dfce368e8c', NULL, 'นางสาวจินดาจินดา ฟองจันทร์ตา', 'นางสาว', 'จินดาจินดา', 'ฟองจันทร์ตา', 'Y', 'Y', '1500900145433', '1991-10-27', NULL, '2018-05-07 12:02:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '0257889632', NULL, '0d092bb9-e8a5-4b31-886a-313d31352e61'),
('d8c58bb1-5c71-46ad-9a96-bfff963c0e31', NULL, 'นางสาวจินดา กขต', 'นางสาว', 'จินดา', 'กขต', 'Y', 'Y', NULL, '1475-01-03', NULL, '2018-04-23 08:52:39', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834556988', NULL, 'f7903332-9391-4354-9ec7-9d2a30b97af0'),
('de147606-d831-4f65-b07b-3521f6587155', NULL, 'นางสาวฝ้าย ฝ้าย', 'นางสาว', 'ฝ้าย', 'ฝ้าย', 'Y', 'Y', '1500255478963', '2010-03-01', NULL, '2018-05-07 08:31:58', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', NULL, '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '', '0834556989', 'faii@gmail.com', '1c4a2487-e257-4d4e-be43-412bada64af7'),
('edac6186-5b38-467b-a3ca-fe9023f45cdc', NULL, 'นางสาวdd dddd', 'นางสาว', 'dd', 'dddd', 'Y', 'Y', '1522366589745', '2010-02-18', NULL, '2018-04-30 10:37:11', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0852669855', NULL, NULL),
('f87da0c3-5476-455f-9690-319161064eaa', NULL, 'นายeeee eeee', 'นาย', 'eeee', 'eeee', 'Y', 'Y', '1212121212120', '2018-04-29', NULL, '2018-05-05 10:49:22', '34d512fa-3b93-4b09-b342-64696d9da155', NULL, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', NULL, '1231231234', NULL, 'd31e9079-04f3-4e3c-bc9c-c4ef46b20e18'),
('fd38af12-4dbd-4b7d-8541-1e3018fb1b97', NULL, 'นางสาวJinda Fongjanta', 'นางสาว', 'Jinda', 'Fongjanta', 'Y', 'Y', NULL, '1475-04-23', NULL, '2018-04-23 08:51:11', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, NULL, '0', '0', NULL, '0834776988', NULL, NULL),
('fdfb3e45-8306-4688-a8a7-6beab76a3fa8', NULL, 'นายJinda Fongjanta', 'นาย', 'Jinda', 'Fongjanta', 'Y', 'Y', '1522033658974', '2018-04-05', NULL, '2018-04-23 07:33:36', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', NULL, NULL, '', '0', '0', '834776988', '0834776988', 'jindafaii@gmail.com', 'dc3ead45-e647-4f3a-8389-124a8ef0e29e');

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
('5e833c95-25e9-4986-80f4-fa2d69aa9fae', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-22 12:46:59', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-22 12:46:59', NULL, '2018-06-22', NULL),
('a8b09477-fbec-49e9-9599-58a6200eac4c', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-21 21:25:18', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-22 12:46:59', NULL, '2018-06-21', '2018-06-22');

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
('0ba4401b-01a6-47fa-ae49-5c6d2e328617', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('15ab4f66-5054-4f52-b7cf-a59c14332792', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('22bb75a6-bcff-43fa-8698-32d5dc15eeee', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('35200ff7-ee43-4462-b5ae-2f5781580275', '1100.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('379d8f52-f23b-4888-99a1-fe4d8fde0413', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '28787316-48cb-4130-9731-a08acb46d434'),
('435fb21c-eba2-48b9-ad90-3df68ff0d279', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('44f82269-8670-47b7-a51b-295816c3fde6', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('5ba5f88e-973c-456f-bc4c-c6634775093a', '0.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('5efa5bba-1154-4f42-9b1c-ed0094210b85', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('696e3000-97ba-4151-8d9e-7a1b7f03bf90', '600.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('745e1bee-6098-4c91-a9ce-e804084d62f2', '900.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('760c73b6-032a-4055-abfb-4bd95b1a9318', '1100.00', '1350.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:46:59', '2018-06-22 12:46:59', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('7c8c7620-38e5-4711-a4ef-c2fc438a98db', '600.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('9128cbce-18e2-4f82-9116-899b32d50b44', '600.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
('9618dc5a-7ea9-4ecb-89a9-f96a7f54cc2d', '500.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('97d46fee-88b2-4ec3-a3c6-b6df1c467a65', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('c0e1ff7a-2f1a-42da-b13d-e2eebc15ef8e', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:46:59', '2018-06-22 12:46:59', '28787316-48cb-4130-9731-a08acb46d434'),
('c19f9b06-44a7-4e7b-951b-ee90f56b00ef', '0.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '1f5788e5-c167-423c-a139-87ea972ba6bc'),
('caf974c6-c1b1-4edf-a2c4-aacbf65c1288', '500.00', '0.00', '5e833c95-25e9-4986-80f4-fa2d69aa9fae', '2018-06-22 12:47:00', '2018-06-22 12:47:00', '1eee0394-f557-4d42-8c3e-033d3727542d'),
('cc3ce90c-b96b-47cf-a2cd-4f19ae9aaf9c', '0.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('cfea366c-bad0-46d3-8f04-ed4ce479ec1b', '900.00', '0.00', 'a8b09477-fbec-49e9-9599-58a6200eac4c', '2018-06-21 21:25:18', '2018-06-21 21:25:18', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('f65ba8e9-6242-4852-a9b6-6b94b6e72aed', '1100.00', '1350.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL),
('f6f1357a-f30b-4005-9c46-1ee7a25864cc', '500.00', '0.00', 'c0570d83-5e76-4dc8-a157-f95312861d6a', '2018-06-22 12:44:19', '2018-06-22 12:44:19', NULL);

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
  `image_id` char(36) NOT NULL
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
  `to_warehouse` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `glitem_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `image_id` char(36) NOT NULL
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
  `image_id` char(36) NOT NULL
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
  `image_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('001c6898-4d7d-4922-9f33-95c098a434c6', 'ccce1b2c-5926-4612-8792-775ed8c11033', '94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', '2018-05-22 08:39:03', 'uan'),
('00309eab-e31b-4584-b8f9-aa72f24607b0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0f7601f8-df50-4503-bf1d-cdbc512e14dd', '2018-06-23 07:52:36', 'uan'),
('01608fd4-e1fd-4ea0-b242-39e4133eba89', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ad0de284-9c1f-4afb-af14-f9c5a8e866c7', '2018-06-23 07:52:32', 'uan'),
('0191b087-6e7e-46a2-bdf3-dbf5a6e0fed9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '188f5f96-3668-4694-bcf8-0922a2727e27', '2018-05-22 08:39:02', 'uan'),
('01a180a7-212c-41e0-8e80-fe71d99ef34d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e65cefee-c655-42b4-8429-16f9c8d91c2f', '2018-06-23 07:52:36', 'uan'),
('01dc162a-a313-4c1a-a6f8-301775925c48', 'ccce1b2c-5926-4612-8792-775ed8c11033', '56369e22-c9e7-46b7-baa7-a23338dc6551', '2018-05-22 08:39:03', 'uan'),
('02ec8b0c-8642-4a51-adbc-9d09a50d41bf', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cae07239-bdcf-4e60-ab95-941d483c3028', '2018-05-22 08:45:37', 'uan'),
('035b3d34-2461-4932-bb45-13c3b44c14aa', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '49fcaede-e452-450d-8781-cdbe2eb13836', '2018-05-22 08:45:37', 'uan'),
('03881a99-e654-4609-9ff3-1fc04bdec197', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ddb9e810-dadf-4541-a569-845c1ff4a3ac', '2018-05-22 08:45:36', 'uan'),
('04633625-18b7-4435-8e41-f0266fd69726', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-06-23 07:52:34', 'uan'),
('04b60b2f-54cf-48d1-aece-35e501a1cd6b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a22ceea6-88b3-41f3-ba6c-2b514d20e217', '2018-06-23 07:52:34', 'uan'),
('05bce40b-a0ab-4b47-af9a-99455ff37269', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e904f3bb-ae98-4d1e-82b9-740c33988b3b', '2018-05-22 08:45:36', 'uan'),
('05fd8d4d-3953-4f07-ab5a-69df52556639', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '268e8b71-d97e-49b8-a762-39b06368a14e', '2018-05-22 08:45:36', 'uan'),
('060c2359-e3e8-4d25-941f-711c1a33c4b2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8ea840e7-9452-4688-af4a-60e7540460a4', '2018-05-22 08:45:37', 'uan'),
('06e86fae-0131-4fca-99b8-87211dd88090', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '576a63e6-4f9c-46d7-abc7-97f0dfb1634d', '2018-05-22 08:45:37', 'uan'),
('07673326-13fa-4918-971f-2b533c773411', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c582501b-6069-4462-a188-be9ecf07342c', '2018-05-22 08:39:03', 'uan'),
('09cafd1a-16c4-478b-9077-6c1387ae46c7', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '65edd09e-c611-4f6e-8750-3ad23eaf688a', '2018-05-22 08:45:36', 'uan'),
('0a27f194-800f-444e-ab0e-8ac6e5fa0232', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3827a831-5488-4597-8536-e75104c2396d', '2018-06-23 07:52:36', 'uan'),
('0ae3208d-c361-4434-a372-b73523d91e62', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-05-22 08:39:02', 'uan'),
('0b8cc054-ce99-4cd0-8b9f-051c3acdb2e1', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e36765e2-1642-4793-ba7e-83fd96d0d1c7', '2018-05-22 08:39:03', 'uan'),
('0cdc9fe4-fb2a-4557-8ab3-b96c2fd1f72a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-06-23 07:52:32', 'uan'),
('0d0407cb-fdd7-455e-b931-263a8c4b12cf', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ab1bc3b7-1848-4367-be76-da14860955c9', '2018-06-23 07:52:35', 'uan'),
('0d836190-933b-402b-9f6c-6db99ee41b0e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd7801bfc-a77c-43f3-aa5f-f4fe685f1da2', '2018-05-22 08:45:36', 'uan'),
('0eb2dc78-46a6-4faf-82b8-7e7551bd69bd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', '2018-06-23 07:52:35', 'uan'),
('0ecacd33-9147-49b6-a8a4-754ab82d8488', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2fa30fee-61ea-4ae1-bd06-b603730a6885', '2018-06-23 07:52:36', 'uan'),
('0ecae348-d9fe-4ce9-b3dd-d84438e06539', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1eaf84c2-2d82-428c-ab0c-cd118cdc9579', '2018-06-23 07:52:34', 'uan'),
('0f08f26a-13e3-458e-9069-139c6adf47af', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ddb9e810-dadf-4541-a569-845c1ff4a3ac', '2018-05-22 08:39:02', 'uan'),
('0fc573c2-19d3-4047-b999-7a6b029a4708', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ea409acc-3b37-4ec6-84c4-63f90f460d93', '2018-05-22 08:39:03', 'uan'),
('0ff9d76d-42ae-4759-97f7-e56a040f3cd7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', '2018-06-23 07:52:36', 'uan'),
('10a37a49-42b2-42e6-a887-ad2e2c0445e8', 'ccce1b2c-5926-4612-8792-775ed8c11033', '20f4bebf-5c04-44b5-9e27-f15a7e344311', '2018-05-22 08:39:03', 'uan'),
('10cd486a-8d0c-46be-8226-cc21c825d5fd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f50f9b7d-b688-477f-952a-5119e72c6455', '2018-05-22 08:45:37', 'uan'),
('11078cd2-2cdc-4ede-998c-e2d297720800', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '18959738-8b40-44ed-9fc7-289ba2b406c9', '2018-05-22 08:45:36', 'uan'),
('111975e2-20c1-41dd-894d-8d04fecaadac', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', '2018-05-22 08:45:37', 'uan'),
('11555c4f-6e8f-4dce-88c4-6b7414778c71', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3b822935-6262-4569-ae18-363a6d75b96f', '2018-06-23 07:52:33', 'uan'),
('11754d30-8756-452c-be5d-7bbdc9fc2cf1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '19147938-1594-4207-aef5-29b0d0d63b66', '2018-05-22 08:39:03', 'uan'),
('119afa72-4b9d-49c8-86f8-e4446fcd9e0c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9352fa28-88c6-40fb-905a-58939086e257', '2018-05-22 08:39:03', 'uan'),
('11ba3295-fa94-476e-b460-4acbbbe8d117', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0a623bf2-9517-47ba-a3f1-536665e1c334', '2018-05-22 08:39:02', 'uan'),
('12704471-dc02-453b-b942-c2fc20b7182c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4cdb0517-c109-4634-acc7-39f4c33d6fec', '2018-05-22 08:39:02', 'uan'),
('1332316d-88b1-4bc1-a4ba-9bba90be0b73', 'ccce1b2c-5926-4612-8792-775ed8c11033', '31a66b5a-69cb-4d98-8b8b-c005826dc299', '2018-05-22 08:39:02', 'uan'),
('135062ab-3e38-4624-ba5a-e1d18f49a0d2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e020bfea-4460-445b-979d-676d60a1460a', '2018-06-23 07:52:33', 'uan'),
('13ce2eb9-cc4e-4b60-a4eb-9e7dbf066b64', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cd1b4962-c3ae-4033-babc-a7b750d8dd63', '2018-05-22 08:45:37', 'uan'),
('145f222f-9f26-4d88-85c4-e3d73986ff26', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4d7f7ee4-3311-4e3e-8653-243d278151cd', '2018-05-22 08:45:37', 'uan'),
('15624477-44d3-474d-b0f2-c70456595086', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e30ef40e-200c-4564-bf0a-182e77f5f381', '2018-05-22 08:39:02', 'uan'),
('156d0908-712b-4cd9-b569-ce8c6d3702f6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7acdd8f8-3587-4060-8c11-159e271162bd', '2018-06-23 07:52:34', 'uan'),
('15d70d78-db69-4b2a-9cde-95686476e15a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', '2018-05-22 08:39:03', 'uan'),
('15fa6471-7b10-47cb-9823-2ff5fa7e8865', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'de366403-b454-4b0b-b96b-ff0aaa351251', '2018-05-22 08:39:02', 'uan'),
('16270509-587f-4028-a665-6e36c946299a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '74f94222-3537-4320-a347-857c1feb24d4', '2018-06-23 07:52:34', 'uan'),
('16b3fa98-804b-43a6-a157-b92a4c762238', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '85348380-adda-4288-ab05-899daaae908b', '2018-06-23 07:52:33', 'uan'),
('16fe444e-f8a9-43d4-8276-c60f4a67d4a0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e2ac4453-58e7-452a-a53f-a314a6431222', '2018-06-23 07:52:36', 'uan'),
('17311a8b-bb22-4d90-bc49-e25a2cd44cf1', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-03-12 10:46:38', 'uan'),
('176bdf73-4ea3-41b4-a24c-57839a22444d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '18959738-8b40-44ed-9fc7-289ba2b406c9', '2018-05-22 08:39:03', 'uan'),
('1799a745-d281-433b-98fb-36811220df08', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a6f6307e-7019-4e29-b693-42aa7778f4e0', '2018-06-23 07:52:32', 'uan'),
('18048063-1257-4d03-91cd-5a135668be47', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', '2018-05-22 08:39:03', 'uan'),
('1816b8c2-eb75-4f9b-85e2-389dc52485c8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', '2018-05-22 08:45:36', 'uan'),
('1856f453-0244-4653-b690-200c262d978e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', '2018-06-23 07:52:34', 'uan'),
('18e59286-04e9-44a9-ada5-25d40817205d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', '2018-06-23 07:52:34', 'uan'),
('18f94bf3-3b4a-408c-9299-10c04dbecdd7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '55712a15-826f-4d08-af31-94de946a0451', '2018-06-23 07:52:35', 'uan'),
('19091fd7-fcdd-4afe-93eb-6a24a9f5c461', 'ccce1b2c-5926-4612-8792-775ed8c11033', '576a63e6-4f9c-46d7-abc7-97f0dfb1634d', '2018-05-22 08:39:02', 'uan'),
('1938ba35-8100-41af-86dd-e239a58ae9d1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '689ca1da-ebea-494b-98a1-1a819903fde9', '2018-05-22 08:39:02', 'uan'),
('19cf6df7-b1ee-431d-b061-3c268acd8219', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'dc629d6f-4399-4cd5-93ac-85e9d72660ec', '2018-06-23 07:52:33', 'uan'),
('19e972b8-2f94-4b4a-9907-a99d4ca5c19f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '124e1dc1-412e-43e0-877f-e506193406aa', '2018-06-23 07:52:32', 'uan'),
('1a1d86bd-9d4f-41d1-8b5f-2efd8e3ee035', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '395db1e2-2a6b-47fe-9888-79d052f2f78f', '2018-06-23 07:52:32', 'uan'),
('1b174aba-093c-4e84-a720-7413399684aa', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a988a6fd-2786-4c25-b721-8b84380314bc', '2018-05-22 08:39:02', 'uan'),
('1b4469c5-03fe-4333-9dc1-6d69e451b078', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0f7601f8-df50-4503-bf1d-cdbc512e14dd', '2018-05-22 08:45:37', 'uan'),
('1c176861-cfe8-41f8-a3f4-e3b3b82a03ca', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0a623bf2-9517-47ba-a3f1-536665e1c334', '2018-06-23 07:52:35', 'uan'),
('1cad60ef-2eba-42f4-9c77-26b0b452a0e8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '235e6639-683c-47d7-8dd8-48fd3463a67b', '2018-06-23 07:52:34', 'uan'),
('1d183ebe-5df7-402f-99b1-e3bba8f6404f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6086a957-3ee3-4720-a0c9-38287c6075c5', '2018-06-23 07:52:32', 'uan'),
('1e3984eb-4295-4aa2-b4fe-7945064c78df', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ef766a2f-def7-4b4b-b73b-38ce3a300cdf', '2018-06-23 07:52:32', 'uan'),
('1e3a3bfe-12f4-4435-8025-63bbbd13a81f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '41b9bd12-d501-48d5-a17d-12ed249ffe16', '2018-05-22 08:39:02', 'uan'),
('1e59dc77-e7e0-41c0-aefb-3132c16a6d98', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1dad9db2-1a9e-4520-b874-79c78ea58308', '2018-05-22 08:39:02', 'uan'),
('1ee92bf5-5844-45b7-8849-d5435ce35222', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1ee38ccf-44ac-42cc-ae45-3beef54268a7', '2018-06-23 07:52:36', 'uan'),
('1f09b314-f2fd-44e1-92d0-0f2e5f53e017', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '83b1b151-7f24-4b3a-b683-7b8cc72c5b1f', '2018-06-23 07:52:33', 'uan'),
('1f8d16a1-d889-417b-8486-75a5bc104a52', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'dc629d6f-4399-4cd5-93ac-85e9d72660ec', '2018-05-22 08:39:02', 'uan'),
('1fb64421-da60-43f0-af5b-c53b3b60ee1d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd13c37bd-e808-408f-b3fa-27e75474c348', '2018-05-22 08:45:37', 'uan'),
('1fc9c448-9bc1-4dac-beb5-a3d3e6b72040', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f1a8f89f-6332-4a1c-a5dc-a37605359cdd', '2018-05-22 08:39:02', 'uan'),
('20157642-2009-4c09-a03e-f9a93172e606', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3c6bf439-cddf-42bd-9bac-39d76bf3afc0', '2018-05-22 08:45:37', 'uan'),
('2016b7f4-6a41-46cd-b734-864e83eb7fcc', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7eaff946-7b78-4faf-864b-4f50efde10c0', '2018-05-22 08:39:02', 'uan'),
('2160cf50-eda7-46ff-b29a-29554b2dae45', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-05-22 08:45:36', 'uan'),
('21bd418f-c306-4fb9-abf7-f91a288836b5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5a49a41b-be0d-4084-a097-58b8b4c74f3c', '2018-06-23 07:52:35', 'uan'),
('224828d9-b8ad-4a45-9aad-8c761886193f', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', '2018-05-22 08:39:03', 'uan'),
('227ca5d7-c3a3-4181-a67c-f1c48933a211', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7cecc67d-6458-4415-9668-bb11bbba94e8', '2018-05-22 08:45:37', 'uan'),
('22a192fe-f5ee-4d12-ad6c-763be9169581', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '310c6dbb-6c62-4531-bb1a-41e639f60448', '2018-06-23 07:52:36', 'uan'),
('22a5f801-c9fe-4c04-b84b-d15c13abb6f6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', '2018-05-22 08:45:37', 'uan'),
('22adc83d-12d6-4685-92c5-8afc401ae33a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd91333c0-3dd0-415f-bb18-06482c0c1094', '2018-06-23 07:52:32', 'uan'),
('231d874a-9f11-4174-a059-f6d05841c76c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '74c9da25-d26a-4bdc-a4ad-f529428946cb', '2018-06-23 07:52:33', 'uan'),
('23313077-6f62-40ab-8451-544a5ed96757', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '592b10fe-2110-4cb8-bca7-d0e1f1bf0149', '2018-05-22 08:45:37', 'uan'),
('23aafd25-780d-40a1-9ff8-da54a3958d6a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0eb176f0-7571-49a8-adcc-83d4a51bd9df', '2018-05-22 08:39:03', 'uan'),
('23b7ec5b-14c6-49a8-bad3-9295edaf1edb', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', '2018-05-22 08:39:03', 'uan'),
('248e60a8-82ca-453e-9a73-234b00c78f1b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '89d52853-e508-4c1e-a8fc-d6fef9f2ef37', '2018-05-22 08:39:02', 'uan'),
('24cb9ece-a21c-4cd9-a653-e7d1db63130a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '99314cf1-2019-477b-b6fb-40b5d69c54db', '2018-05-22 08:39:02', 'uan'),
('24d1746e-8adf-4bef-badc-31bb4f31bc29', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3c6bf439-cddf-42bd-9bac-39d76bf3afc0', '2018-06-23 07:52:34', 'uan'),
('2556cb89-92d6-4b77-a8a2-a3a86ba185fb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1eaf84c2-2d82-428c-ab0c-cd118cdc9579', '2018-05-22 08:39:02', 'uan'),
('255fb990-bdca-4ac7-b8e7-cc31dfc06ea6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '48e57212-9886-4cc0-998b-84fd1a6a0e22', '2018-05-22 08:45:37', 'uan'),
('2568dd3d-413c-4eca-98f1-4dad8f679a33', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '28cd6cd8-06c6-47de-894e-c47dfeb23b48', '2018-06-23 07:52:36', 'uan'),
('25a3bc98-7e90-4664-9171-5ff4790520b2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', '2018-06-23 07:52:33', 'uan'),
('25bd9a9b-8d54-45e8-920b-b44027106340', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd7801bfc-a77c-43f3-aa5f-f4fe685f1da2', '2018-06-23 07:52:33', 'uan'),
('261d792d-7785-40a7-9780-bb162667b33a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', '2018-05-22 08:39:02', 'uan'),
('26e9d1ce-f514-44e6-a3f8-339d5b38f648', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '22253677-dbf0-4db4-a4e8-9f01ee49cb25', '2018-05-22 08:45:37', 'uan'),
('26eb1986-d13d-4bb3-9522-92d270d99b2c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7663bc12-ff3b-4cb3-bc21-90edae293940', '2018-05-22 08:45:37', 'uan'),
('26fb1fcd-77d5-4ccb-90b0-b8eb627c3726', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '132d83ae-7476-49e3-a086-6c7def73f62c', '2018-06-23 07:52:33', 'uan'),
('275faff1-7e72-4705-8b3d-40b9fc059c8f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '31199fea-51ff-4093-9034-e1b491ee36f8', '2018-05-22 08:39:02', 'uan'),
('27cad294-66a5-41da-bb47-98ef39a478c0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '318017c3-f873-42ab-80da-8c788a4ec931', '2018-06-23 07:52:36', 'uan'),
('2824a59e-a324-4d7f-bd09-36ce88654f31', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '50ddf455-ed13-4efc-a740-96bb25cff7c4', '2018-05-22 08:45:37', 'uan'),
('287c3587-e951-4997-ba20-b8d663d380d1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '960a0402-07f4-4c43-811d-e7af9284ddfa', '2018-06-23 07:52:35', 'uan'),
('28a72245-8c6c-462f-90b5-c9a681cb1f64', '0052375d-f717-4f28-b0ef-297d6c2a873b', '5e4ae09f-beca-4229-bd56-f053e2a9bc70', '2018-02-26 09:44:12', 'uan'),
('28bbb9de-aef4-46e6-a886-1e71c617a730', '0052375d-f717-4f28-b0ef-297d6c2a873b', '1ee38ccf-44ac-42cc-ae45-3beef54268a7', '2018-02-26 09:44:12', 'uan'),
('28f3a191-1eef-4179-a574-ca680b16595e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4d7f7ee4-3311-4e3e-8653-243d278151cd', '2018-06-23 07:52:36', 'uan'),
('297cc60d-65d4-409a-a340-b91ecc0dfe93', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', '2018-06-23 07:52:34', 'uan'),
('29b4a8a1-38b0-4bad-9b1e-80903c635496', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8ea2488f-1a22-448f-8edc-fe7ebd763db7', '2018-06-23 07:52:33', 'uan'),
('2ab23ba1-7068-4d8a-8bd2-4a27aaf12ed1', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e904f3bb-ae98-4d1e-82b9-740c33988b3b', '2018-05-22 08:39:02', 'uan'),
('2ad2f956-87bc-4301-a825-ac506f1fca45', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e2ac4453-58e7-452a-a53f-a314a6431222', '2018-05-22 08:39:03', 'uan'),
('2b8c1718-0ac8-4626-9a27-691b19a0dba2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '263250e3-e046-4580-9299-9ac9b3e69aaf', '2018-05-22 08:45:37', 'uan'),
('2ba084ff-b368-4a79-8fbb-a14f398d87a1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-05-22 08:39:02', 'uan'),
('2c1031d3-e8aa-47ca-a89f-cdb0add4ca73', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-05-22 08:45:36', 'uan'),
('2dea0b04-2d98-4089-9aa4-fd82e220a376', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '22253677-dbf0-4db4-a4e8-9f01ee49cb25', '2018-06-23 07:52:35', 'uan'),
('2e2e0d5a-7a18-4d45-acb7-bf1e047b87f5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'beeefa8c-44a9-4238-97b4-ee5750422fb0', '2018-06-23 07:52:35', 'uan'),
('2ec69961-5396-47c7-8320-81e3fa968361', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6a8fcfb2-4665-4e61-92de-3f9de6e40ca2', '2018-06-23 07:52:35', 'uan'),
('2ed92fc3-f096-4d51-a06e-3df3a7c76bc0', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cae07239-bdcf-4e60-ab95-941d483c3028', '2018-05-22 08:39:02', 'uan'),
('2ffba018-b578-495f-895f-91b117dfb9ee', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3bfc749a-0b34-4a92-acec-b8331f0e210a', '2018-05-22 08:39:02', 'uan'),
('2ffbae45-25d3-4f9d-90da-f7e53a97eab9', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a7b873d6-2e93-47f7-b084-5b245972a61f', '2018-05-22 08:39:03', 'uan'),
('3013cd7b-b767-4742-96d3-8063a8b963ca', '0052375d-f717-4f28-b0ef-297d6c2a873b', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-02-26 09:44:12', 'uan'),
('317059ec-ea25-4ddc-a3a6-99559078da85', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', '2018-05-22 08:39:03', 'uan'),
('317fe5f9-d671-4439-86d5-7743140e7f40', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '31a66b5a-69cb-4d98-8b8b-c005826dc299', '2018-06-23 07:52:34', 'uan'),
('31894e64-598b-4723-9d30-c8c61f4a9489', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7663bc12-ff3b-4cb3-bc21-90edae293940', '2018-06-23 07:52:35', 'uan'),
('319bf630-9158-468c-aa2e-7f3082aec387', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1e69121c-47b2-4567-97f9-b2c1b31e9e70', '2018-06-23 07:52:34', 'uan'),
('31a9ed40-b53a-48e4-8f65-00ab82d01591', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd13c37bd-e808-408f-b3fa-27e75474c348', '2018-06-23 07:52:34', 'uan'),
('31b0dc9e-f488-4660-a986-456aefe9ae19', 'ccce1b2c-5926-4612-8792-775ed8c11033', '73aca571-f8d7-4502-a945-fa53ff13676b', '2018-05-22 08:39:03', 'uan'),
('31b6b132-3468-4deb-9532-c61ef977c88f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '132d83ae-7476-49e3-a086-6c7def73f62c', '2018-05-22 08:39:03', 'uan'),
('31c42fc6-35f8-4ce7-b224-23faaad703ed', 'ccce1b2c-5926-4612-8792-775ed8c11033', '48e57212-9886-4cc0-998b-84fd1a6a0e22', '2018-05-22 08:39:02', 'uan'),
('32a9d227-ad32-42e2-83d0-671ad20f24ac', 'ccce1b2c-5926-4612-8792-775ed8c11033', '318017c3-f873-42ab-80da-8c788a4ec931', '2018-05-22 08:39:03', 'uan'),
('33b5eb9e-7547-4345-9e91-a0df98123b3e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1acd38be-8dcb-45f8-ad82-0903631900f1', '2018-05-22 08:39:02', 'uan'),
('33c9f92f-4fda-4150-899d-a6a03cdd4fad', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'edc23445-d3be-4e6b-a5ff-7689dd603ea6', '2018-05-22 08:39:03', 'uan'),
('33d45f0e-5a7a-48de-9cc6-bff6b8794af0', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a362e708-187f-4b7e-b0e6-ba09cf557164', '2018-05-22 08:39:02', 'uan'),
('33d88ffe-8037-46df-b7ba-55b6e08fe1b8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '210c813b-c607-4242-83a0-b2be186ebd7f', '2018-06-23 07:52:35', 'uan'),
('33f13027-e291-41dc-a5bf-345dde8aa5b4', 'ccce1b2c-5926-4612-8792-775ed8c11033', '29d45c81-49da-4a56-b337-6f3ced342652', '2018-05-22 08:39:02', 'uan'),
('347fd7aa-4a2a-48c4-ad41-f5a4bbc9556d', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'fc701433-0289-4ec0-9d14-c75b383d8b25', '2018-02-26 09:44:12', 'uan'),
('3497b792-8507-4108-9288-89a81d3de258', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4eb4e924-a85c-4ecc-a639-304d1b26e65d', '2018-05-22 08:39:02', 'uan'),
('3499c353-9fbc-4a03-a8c3-34b4f9fbfad3', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '571432a8-0fbb-4bcf-b8ba-7f4d4998c864', '2018-05-22 08:45:37', 'uan'),
('34e2596a-f647-43c3-bab0-d8c1397cc7ba', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0a623bf2-9517-47ba-a3f1-536665e1c334', '2018-05-22 08:45:37', 'uan'),
('35ab3703-d036-48ca-9599-7dd91be5e5bf', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '34450fd0-c16f-497f-8826-a30e30d47665', '2018-05-22 08:45:37', 'uan'),
('36742dee-e276-4e88-adec-c9db4ea15c43', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', '2018-06-23 07:52:36', 'uan'),
('37240d61-37c8-414e-97e4-dc9e16f57ae5', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9352fa28-88c6-40fb-905a-58939086e257', '2018-05-22 08:45:36', 'uan'),
('378caffa-fdd1-4493-8a18-6577d3256369', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1a9ea34b-da8e-44c5-ad15-70b0daa244ac', '2018-06-23 07:52:32', 'uan'),
('384bf100-1315-4bef-a341-238e0b3f9d42', '0052375d-f717-4f28-b0ef-297d6c2a873b', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-02-26 09:44:12', 'uan'),
('3926f1bd-3ab9-4089-a4c5-d651e32aa14d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0e0e06da-117e-40aa-8332-504f988200a5', '2018-06-23 07:52:36', 'uan'),
('39ead97e-863d-443f-acb1-25241c4d65dd', 'ccce1b2c-5926-4612-8792-775ed8c11033', '665c0580-3f54-42fa-ad55-7da779b0107a', '2018-05-22 08:39:02', 'uan'),
('3a69079f-6124-4161-a155-ec9c5b155ec7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '383622c8-d6ac-4934-8b9b-d0a012be179c', '2018-06-23 07:52:32', 'uan'),
('3bad92ce-2f36-4471-a012-00b8a900d59b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ce0fc131-de71-4b8d-8dd7-cc42111c84d8', '2018-05-22 08:39:02', 'uan'),
('3bded8d4-ef10-48a2-8494-4de4106e339b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1b6d8024-5712-4078-97cb-b86c7e523a59', '2018-05-22 08:39:02', 'uan'),
('3c1a8990-3731-4876-8489-63ea7c4b245b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a6f6307e-7019-4e29-b693-42aa7778f4e0', '2018-05-22 08:45:36', 'uan'),
('3ccab78e-922f-40e8-9e18-296929918e64', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c8197eab-d634-4caf-a289-19e770dd7975', '2018-05-22 08:39:03', 'uan'),
('3cea839f-37e3-450c-b295-bd7ddd00574a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'eb308a9b-f509-40de-89a7-37da2bbf6c6c', '2018-05-22 08:39:03', 'uan'),
('3d1ad790-6517-43c4-a971-2a61e6b9afa9', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e65cefee-c655-42b4-8429-16f9c8d91c2f', '2018-05-22 08:45:37', 'uan'),
('3d536232-876d-4376-a64c-e6fbf6cb7c5e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3827a831-5488-4597-8536-e75104c2396d', '2018-05-22 08:45:37', 'uan'),
('3da1cf98-b3e8-409c-8432-03ee14e2072f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4f590627-b763-4696-a6ea-adfd236585fa', '2018-06-23 07:52:34', 'uan'),
('3dfcb145-a296-4f28-8b5b-d21094195d84', '0052375d-f717-4f28-b0ef-297d6c2a873b', '365791c1-6313-4028-84d5-f6c7bbf55bbc', '2018-02-26 09:44:12', 'uan'),
('3e015a49-6615-4f2d-8201-92642bc148e0', '0052375d-f717-4f28-b0ef-297d6c2a873b', '4eb4e924-a85c-4ecc-a639-304d1b26e65d', '2018-02-26 09:44:12', 'uan'),
('3e339591-858f-4480-bd96-08b4ee3ad58f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ea463ce5-b72a-4710-9d08-b1d27e73093f', '2018-05-22 08:45:37', 'uan'),
('3e78127f-98c3-4a2f-899f-31f41b6050dc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f1a8f89f-6332-4a1c-a5dc-a37605359cdd', '2018-06-23 07:52:34', 'uan'),
('3e918510-0df1-4863-8604-f8828f770c60', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '74c9da25-d26a-4bdc-a4ad-f529428946cb', '2018-05-22 08:45:36', 'uan'),
('3f12f720-a9b5-4843-a516-04c9636514d6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0060f68a-8aaf-4ac4-8851-1f29ad0834d3', '2018-06-23 07:52:32', 'uan'),
('3fcc22c4-fb6f-4cdd-ae37-4e664a553ab4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5a950057-6c85-4b99-a6b4-3ed76d48f2b4', '2018-06-23 07:52:35', 'uan'),
('403e444a-88f7-43ca-863d-f3d361019c94', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd3e22c6f-15b7-4e29-8512-c6775b6343e8', '2018-06-23 07:52:32', 'uan'),
('4082d043-5012-4d76-898b-a166862c2fcb', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', '2018-05-22 08:45:36', 'uan'),
('40f1d98d-4cc2-4ede-bca9-48bea68dc94c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1c26d965-42f7-4c9d-af5b-307c4d3a00bd', '2018-05-22 08:45:37', 'uan'),
('41391067-247d-4e39-a44d-517c992cf70f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3f118aba-5a1d-4020-b461-6d580e263513', '2018-05-22 08:45:37', 'uan'),
('417ecfa1-9886-48cd-87f1-3c92a17c238a', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', '2018-05-22 08:39:02', 'uan'),
('4196b33a-e097-41e7-afd8-831f88e81482', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd51a994d-7649-4ef1-9bdb-1980a4eb4b60', '2018-05-22 08:45:36', 'uan'),
('420b05cf-8fb2-4459-88d2-8875c2127e7f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cd725882-004c-4dd2-b780-a501bb6463bf', '2018-06-23 07:52:36', 'uan'),
('4277fbe8-05ee-43ce-b72c-eb0a533b34cb', 'ccce1b2c-5926-4612-8792-775ed8c11033', '84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', '2018-05-22 08:39:03', 'uan'),
('430d4dc9-835d-487d-831e-b39cf2094cfc', 'ccce1b2c-5926-4612-8792-775ed8c11033', '74b0584d-4276-45d8-829c-70776ab33a4f', '2018-05-22 08:39:03', 'uan'),
('435babe8-f818-45c6-abde-c0eccdbd4fb4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4df45f80-5951-4308-88a6-ba64fb6b16c9', '2018-06-23 07:52:34', 'uan'),
('43664b7c-c20f-492a-87c7-546bf3e7202e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0e0e06da-117e-40aa-8332-504f988200a5', '2018-05-22 08:45:37', 'uan'),
('4370f3c9-1d03-4596-9e0f-7e89bfa3cdda', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5a950057-6c85-4b99-a6b4-3ed76d48f2b4', '2018-05-22 08:39:02', 'uan'),
('44748896-ec2c-44bd-a5d0-347f8aca3ae3', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0c5aa7f3-0395-4ef4-935f-7fe7957fa451', '2018-05-22 08:39:03', 'uan'),
('44de575b-fb59-4dc3-8551-6466e68d3644', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0', '2018-05-22 08:45:36', 'uan'),
('450a301c-376f-4667-8aef-0312db42407e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'eedf5420-ecb7-42b0-966f-76916b24af6d', '2018-05-22 08:45:36', 'uan'),
('459270d5-fdd1-4989-b45f-e7de4dcd7212', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-05-22 08:39:02', 'uan'),
('45f2869f-af76-4cd5-b057-548466c5217c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ce0fc131-de71-4b8d-8dd7-cc42111c84d8', '2018-05-22 08:45:36', 'uan'),
('463618c5-876f-428e-b2f1-a3148a708076', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ce0ffb95-1e39-4bd4-9268-3f5dea1990db', '2018-06-23 07:52:35', 'uan'),
('46f7ca52-2e60-4353-9ca7-015d93a321f1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '59e8ff71-6b0d-4b5d-b257-d8fbd88a0d54', '2018-05-22 08:39:02', 'uan'),
('471c1033-ea3d-4516-be42-5fa6f63753c5', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fc31c746-75a3-4eaf-9999-f8b44fb4217e', '2018-05-22 08:39:03', 'uan'),
('47281f06-c6d4-40ef-9529-e1e825ddcd5c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '605442d9-2134-4ff9-b901-28b9ae581053', '2018-06-23 07:52:32', 'uan'),
('473e9f25-f916-416f-86f9-e43f11f8e615', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cecea47a-ce7f-4025-8bbb-3f651a9b3fbc', '2018-06-23 07:52:34', 'uan'),
('47db2eb4-e7b3-4b35-a707-14a9bb6d8989', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '31199fea-51ff-4093-9034-e1b491ee36f8', '2018-05-22 08:45:37', 'uan'),
('494e1cff-031b-43af-b794-a26c355194b5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ae142032-4b2b-4c3b-9d07-cc5891262dee', '2018-06-23 07:52:35', 'uan'),
('4a209306-59cc-4a05-9ef1-74909028d1ce', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0bae60f9-f3a5-4203-ad7e-e77632327f9f', '2018-06-23 07:52:33', 'uan'),
('4a2e35d6-1a19-4be9-b26c-4aaba0798573', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '124e1dc1-412e-43e0-877f-e506193406aa', '2018-05-22 08:45:36', 'uan'),
('4a35b3cd-1514-45af-89c3-3d5d24b51887', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7eaff946-7b78-4faf-864b-4f50efde10c0', '2018-05-22 08:45:37', 'uan'),
('4ae54d62-7125-4f39-92bc-7a977b3eaa11', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5f099f25-69b6-41a9-ad14-0812860a47f7', '2018-06-23 07:52:32', 'uan'),
('4afdc3a4-dfa6-42ca-ab2e-161f9ca85332', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3d0624ae-6912-4381-b761-004987aed866', '2018-06-23 07:52:35', 'uan'),
('4b39387d-31b4-4673-97b2-fce8a83f039b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '74c9da25-d26a-4bdc-a4ad-f529428946cb', '2018-05-22 08:39:02', 'uan'),
('4b9e1047-7c21-4839-b0c4-beb83610c622', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd0ddc7d8-8c74-4667-b496-2f0ad3c19e53', '2018-05-22 08:39:03', 'uan'),
('4bc8c5c4-2cbf-4602-8610-dfe98a615445', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', '2018-06-23 07:52:33', 'uan'),
('4de2809d-6338-44d0-adaa-0c1788382957', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ea409acc-3b37-4ec6-84c4-63f90f460d93', '2018-05-22 08:45:37', 'uan'),
('4eb406ae-c8b2-4f64-9fe0-f3901119c746', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8a643eb0-e44e-4000-b78f-d7f47bc3255c', '2018-05-22 08:39:02', 'uan'),
('4ecef9b8-af1f-4253-afe4-f8d84c5e1ac0', '0052375d-f717-4f28-b0ef-297d6c2a873b', '210c813b-c607-4242-83a0-b2be186ebd7f', '2018-02-26 09:44:12', 'uan'),
('500f7c67-2399-45d4-ab07-bc600f98bb13', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', '2018-05-22 08:39:02', 'uan'),
('50c4c48e-dab5-4575-83da-3adbc6389628', 'ccce1b2c-5926-4612-8792-775ed8c11033', '518e91db-35da-4118-bd27-4670f886bf46', '2018-05-22 08:39:03', 'uan'),
('51159591-3353-4668-9d28-244f8beebe75', '0052375d-f717-4f28-b0ef-297d6c2a873b', '310c6dbb-6c62-4531-bb1a-41e639f60448', '2018-02-26 09:44:12', 'uan'),
('516aa3a7-d0cc-484b-b2bc-874b8a241f13', 'ccce1b2c-5926-4612-8792-775ed8c11033', '28cd6cd8-06c6-47de-894e-c47dfeb23b48', '2018-05-22 08:39:03', 'uan'),
('52577dd3-eef5-4526-92c9-6613f011b393', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ee116499-c03f-43cb-a125-b625d1eca065', '2018-06-23 07:52:34', 'uan'),
('5351950e-e3db-4fce-a0e5-eef3e53a42c9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '29d45c81-49da-4a56-b337-6f3ced342652', '2018-06-23 07:52:33', 'uan'),
('5389342f-3de4-43d5-a4a3-43ee6db37e44', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a46bf3be-a18e-4e6c-bb27-cba4cabc81f2', '2018-06-23 07:52:32', 'uan'),
('550a5ad6-468e-455f-b6e6-974f4737d88e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e30ef40e-200c-4564-bf0a-182e77f5f381', '2018-06-23 07:52:34', 'uan'),
('5573660a-46da-4764-8dd7-708d93732dd8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0c31bda6-a544-499b-989f-a8ef1e17e381', '2018-05-22 08:45:37', 'uan'),
('56c9a891-eb4c-42ef-9242-5c757e826181', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0bae60f9-f3a5-4203-ad7e-e77632327f9f', '2018-05-22 08:45:36', 'uan'),
('575a2d58-30e7-46a2-b601-2adb266d0e59', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8a643eb0-e44e-4000-b78f-d7f47bc3255c', '2018-06-23 07:52:36', 'uan'),
('57a2614b-21be-4d6c-aa32-070a80c31c4b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4cdb0517-c109-4634-acc7-39f4c33d6fec', '2018-06-23 07:52:35', 'uan'),
('57f408f1-2e3d-4b35-bc72-225222c4f1c6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '74b0584d-4276-45d8-829c-70776ab33a4f', '2018-05-22 08:45:37', 'uan'),
('58a185ec-ee38-424f-8f31-a10a961c1450', 'ccce1b2c-5926-4612-8792-775ed8c11033', '34450fd0-c16f-497f-8826-a30e30d47665', '2018-05-22 08:39:03', 'uan'),
('58dfc8a9-a66c-4c2d-b806-f163cd4e70f3', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', '2018-05-22 08:39:02', 'uan'),
('592a2f30-a6f9-4e5e-bb90-5128668725fc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9bbbdecd-628b-4a3d-96bc-56b2d5f6995c', '2018-05-22 08:45:37', 'uan'),
('59b02dad-23e1-4576-a79e-c79f2ee62011', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c634c46f-2ca8-4616-99e9-dc09ca390491', '2018-06-23 07:52:34', 'uan'),
('5a96a1aa-1231-4aff-9282-49f16bcd4dc0', 'ccce1b2c-5926-4612-8792-775ed8c11033', '945605ca-19f9-45d1-a0c8-735243a44d38', '2018-05-22 08:39:03', 'uan'),
('5abb9c1d-3c09-4da6-ac25-2d88241f659b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a522eb09-4bf4-471e-8532-2b9276491749', '2018-06-23 07:52:33', 'uan'),
('5b19503d-630f-4919-8dbd-a6720db6dcf9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7acdd8f8-3587-4060-8c11-159e271162bd', '2018-05-22 08:39:02', 'uan'),
('5bada301-0c85-4711-b401-b4d7e367ea2e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c31061c0-daf6-473d-b061-029e829396f6', '2018-06-23 07:52:32', 'uan'),
('5c24b063-c442-48e8-84b5-1ad9d633c3cb', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '41b9bd12-d501-48d5-a17d-12ed249ffe16', '2018-05-22 08:45:37', 'uan'),
('5c6a184d-dff4-475b-9a5e-6959de6fcb9c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '190606b3-84af-4dd8-89af-ac28668255ba', '2018-06-23 07:52:33', 'uan'),
('5cca5680-9453-4933-a7bf-7eef25a9dbdf', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a23a4600-3508-48bf-ac65-29cc502cb07a', '2018-05-22 08:39:03', 'uan'),
('5ccba318-3453-41f1-ab3d-cfae73e16054', 'ccce1b2c-5926-4612-8792-775ed8c11033', '436cb1b1-ad4d-4c94-855c-20c43b9f4f81', '2018-05-22 08:39:02', 'uan'),
('5d49c87a-0726-4a5f-a651-09565172c175', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '89d52853-e508-4c1e-a8fc-d6fef9f2ef37', '2018-05-22 08:45:37', 'uan'),
('5dd9eac0-f3fe-4a79-8d54-511649ccb858', 'ccce1b2c-5926-4612-8792-775ed8c11033', '42b1123a-f0c0-4351-a35b-cdd0fd9764b8', '2018-05-22 08:39:02', 'uan'),
('5dec88ff-b1b1-4073-85ee-f1f7b187b2c7', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b568a18f-8385-430b-b532-8315e8e7bb4f', '2018-05-22 08:39:02', 'uan'),
('5e6f975b-3a4d-42d3-8741-d0c56a1decfa', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-06-23 07:52:33', 'uan'),
('5f0a61eb-2f30-4912-bdbb-4f1ac06a9f2d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd1184ebf-bce8-48bb-b685-5e17fe447915', '2018-06-23 07:52:33', 'uan'),
('5f68cc5e-e52e-48af-a1bf-2767e141f649', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', '2018-05-22 08:45:37', 'uan'),
('6014cf72-74c2-4632-afb1-767bc26ccac5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e67e3bee-325d-40e4-944b-e3adbaad7276', '2018-06-23 07:52:35', 'uan'),
('60a5124d-6017-4a83-b590-a815ae3bec12', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c4cd3b72-94fd-4b72-9f21-6eff49bbc384', '2018-06-23 07:52:32', 'uan'),
('6156f4bd-5417-472b-9e28-7bf621b51379', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b72a22bc-e177-4b07-afca-0c84644d81ba', '2018-06-23 07:52:36', 'uan'),
('61a9f95c-269a-47bc-a120-4fd7fd86eed1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1e3a1292-9d95-474a-9ca7-8deb08a89390', '2018-05-22 08:39:02', 'uan'),
('6246ab0e-645b-4cf7-9e7a-640b80185df8', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0e0e06da-117e-40aa-8332-504f988200a5', '2018-05-22 08:39:03', 'uan'),
('6287e686-6819-4e4e-bafd-1d14f0471ff8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '99314cf1-2019-477b-b6fb-40b5d69c54db', '2018-05-22 08:45:36', 'uan'),
('62957e28-d911-47bf-b711-4720eeb96cdb', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a6298301-d66f-42d1-8a6f-ca355f5740a7', '2018-05-22 08:39:03', 'uan'),
('62ab55b1-f8c0-4845-a43c-c1714ac945c7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a23a4600-3508-48bf-ac65-29cc502cb07a', '2018-06-23 07:52:36', 'uan'),
('62ab8c6f-18a8-4b20-ade8-81d2a30ebe9c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '20dd5d9b-767f-4451-a857-88f142608223', '2018-06-23 07:52:33', 'uan'),
('62e5a7b8-b950-4b60-9190-31abccb413f2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f6523a74-f023-46fa-8f82-0f0008012a65', '2018-05-22 08:45:36', 'uan'),
('63b93eb9-a55a-4c0f-afc7-a63ee7453666', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0e6c4588-a43b-40c1-beca-87a2675fffac', '2018-06-23 07:52:36', 'uan'),
('63e3d6ff-647f-4bc8-917e-df8284144445', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-05-22 08:45:36', 'uan'),
('63faf694-7a9f-49e4-9d4c-057cb55f1eef', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4229bec5-f7ab-4f33-9b07-3cfce62a46cb', '2018-06-23 07:52:32', 'uan'),
('64599ea8-bd93-408a-b778-9db46857466f', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e65cefee-c655-42b4-8429-16f9c8d91c2f', '2018-05-22 08:39:03', 'uan'),
('64acb7a8-c665-4ff8-ae5f-94ee03887355', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ef766a2f-def7-4b4b-b73b-38ce3a300cdf', '2018-05-22 08:45:36', 'uan'),
('652d4199-061e-41fe-837f-c00a7e0daec6', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', '2018-05-22 08:39:02', 'uan'),
('657ca142-bef1-45a0-9708-2d138a87024e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b8e4cfc7-6629-492a-944b-949c3b947831', '2018-06-23 07:52:35', 'uan'),
('65d4e120-ddba-4da5-889e-2b30cf6e7cf6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '20f4bebf-5c04-44b5-9e27-f15a7e344311', '2018-06-23 07:52:35', 'uan'),
('667289f6-0b2e-4b6d-964a-b128aaadbb3a', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b65a1d21-89a7-411e-97b0-484ea81a749a', '2018-06-23 07:52:34', 'uan'),
('66f634ed-5720-45d0-98c2-41979a6aab71', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3dd2dcbe-8c5f-476e-a1cd-7cdba1ec4ead', '2018-05-22 08:45:37', 'uan'),
('676e4c99-69e0-4ea1-b388-406305830690', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '089bfd10-3706-40fd-95a9-f94d6986babd', '2018-06-23 07:52:36', 'uan'),
('67c3e8cc-4ca2-4ed6-93c4-c77f4c1eceb5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '99314cf1-2019-477b-b6fb-40b5d69c54db', '2018-06-23 07:52:33', 'uan'),
('6805e953-822a-4a52-a503-4d50cfeb5367', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2ee0428c-85ed-4908-9411-2fbe89d9884c', '2018-06-23 07:52:35', 'uan'),
('6818c0fd-aa5c-4838-b652-c93983bca61b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd73d0cc7-13a9-4187-90ad-ba377fee0bdb', '2018-05-22 08:45:37', 'uan'),
('6833d40c-bdf6-47bf-8285-0c612a377fef', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '188f5f96-3668-4694-bcf8-0922a2727e27', '2018-06-23 07:52:35', 'uan'),
('683b635e-b60d-4e13-8427-ed5376fe1d50', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1e99211d-265e-4822-8006-b034c36ec02e', '2018-06-23 07:52:35', 'uan'),
('687c8bf4-656b-4abd-bdb7-0a84c46d4897', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2a4f379f-1471-43af-be2b-f9ef6dd9f713', '2018-06-23 07:52:34', 'uan'),
('688cb683-1e30-433c-961d-3811c66549ef', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', '2018-06-23 07:52:34', 'uan'),
('68b98b8f-3622-4c72-91fa-ff85d97fcecc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e26e5f95-19f2-411d-b4b6-b5d7cbcdf1c1', '2018-06-23 07:52:33', 'uan'),
('69010dfc-992c-4a49-ae5d-c221ba0f8ead', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7d9ead39-5c5c-4633-93b3-544172f751f9', '2018-05-22 08:39:03', 'uan'),
('693366e1-9802-4057-ac62-0569602f1a26', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-05-22 08:45:36', 'uan'),
('69743bbe-093b-4375-ad79-354fbd8485f7', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '5a950057-6c85-4b99-a6b4-3ed76d48f2b4', '2018-05-22 08:45:37', 'uan'),
('699a088a-48a6-4767-bfdb-6ca2f49d0753', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b8e4cfc7-6629-492a-944b-949c3b947831', '2018-05-22 08:39:02', 'uan'),
('69a55cba-43a3-4b87-a516-ff00a14e5b84', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ef766a2f-def7-4b4b-b73b-38ce3a300cdf', '2018-05-22 08:39:02', 'uan'),
('69b377ea-5cff-42ce-9a71-93a13aff69c3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '57904998-e34a-4f8e-8bc8-fab31cc0ea88', '2018-06-23 07:52:33', 'uan'),
('6a01cb94-8f4b-4c18-8c3b-cb4f4ad02a56', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ae142032-4b2b-4c3b-9d07-cc5891262dee', '2018-05-22 08:39:03', 'uan'),
('6af0f70f-f3e4-4e27-9909-1bbb2f3e04ce', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0c5aa7f3-0395-4ef4-935f-7fe7957fa451', '2018-05-22 08:45:36', 'uan'),
('6b65158d-1e27-42c7-808c-04744ed6a75f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9d334504-0ff0-4191-a552-feaace318f28', '2018-05-22 08:45:37', 'uan'),
('6c5f750e-c0db-4664-9997-eed3840fbd0f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ea463ce5-b72a-4710-9d08-b1d27e73093f', '2018-06-23 07:52:35', 'uan'),
('6c850ca5-0c00-468b-b250-bc1f984e7f7e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1dad9db2-1a9e-4520-b874-79c78ea58308', '2018-06-23 07:52:35', 'uan'),
('6d2da619-d235-4ac9-8b7e-d094df9c114e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8c53b550-e6e4-4cda-a935-b7ea63f9651f', '2018-06-23 07:52:36', 'uan'),
('6dbcf260-f5a9-4f60-bfdd-8a15d3d499e3', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2c10fa21-c1fd-430b-bd5a-38f0881b4614', '2018-05-22 08:39:03', 'uan'),
('6dd42c99-86b4-4826-80a5-ba42f9de7c46', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8437e1f4-63dc-440c-b856-4d1e9f3c2435', '2018-06-23 07:52:35', 'uan'),
('6eff1723-69c7-43bb-8f06-d930e8a57a17', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0e6c4588-a43b-40c1-beca-87a2675fffac', '2018-05-22 08:39:02', 'uan'),
('6f90aa59-7b42-4b44-8553-3b14cf2adabc', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c31061c0-daf6-473d-b061-029e829396f6', '2018-05-22 08:39:02', 'uan'),
('6fa01348-2143-433d-ba33-1bb61cdeb744', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f6523a74-f023-46fa-8f82-0f0008012a65', '2018-06-23 07:52:33', 'uan'),
('7016acbb-86fb-428c-8a55-ca88b534388e', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e67e3bee-325d-40e4-944b-e3adbaad7276', '2018-05-22 08:39:03', 'uan'),
('70bb944c-db91-4657-9e60-59e01525f3a4', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '5a49a41b-be0d-4084-a097-58b8b4c74f3c', '2018-05-22 08:45:37', 'uan'),
('70e63a0e-d676-4746-86f1-3e7e8749bcc9', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f6523a74-f023-46fa-8f82-0f0008012a65', '2018-05-22 08:39:02', 'uan'),
('70fc670b-3bbd-4327-9bd0-ee5fc362fcad', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fc701433-0289-4ec0-9d14-c75b383d8b25', '2018-06-23 07:52:35', 'uan'),
('72296f98-1110-492d-8b40-86d21c878bb6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '436cb1b1-ad4d-4c94-855c-20c43b9f4f81', '2018-06-23 07:52:35', 'uan'),
('733ed7cb-a7ca-4243-bb21-b00084434511', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3f118aba-5a1d-4020-b461-6d580e263513', '2018-06-23 07:52:35', 'uan'),
('7472dd1e-d41f-4ad8-9cff-f191397ff640', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a7b873d6-2e93-47f7-b084-5b245972a61f', '2018-06-23 07:52:33', 'uan'),
('7479e0e7-9607-4935-a3d9-6c483b2484ca', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e30ef40e-200c-4564-bf0a-182e77f5f381', '2018-05-22 08:45:37', 'uan'),
('74daa80c-a01e-46b3-a994-02382aeef60b', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'e09c8bc5-3ca8-4a10-a2fb-8f0a96137222', '2018-02-26 09:44:12', 'uan'),
('74e2e05a-0695-4596-9b5c-b5fd79ecab44', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0eb176f0-7571-49a8-adcc-83d4a51bd9df', '2018-06-23 07:52:34', 'uan'),
('74e807bb-b978-45fd-bffd-8140a5bdbbcb', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a0aba001-f604-4ff7-9147-70812752b77a', '2018-05-22 08:39:02', 'uan'),
('75036329-2541-4d4b-9463-0aa607a53b4c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6f82d8d1-5046-4bfb-8bae-853fb8487bbc', '2018-06-23 07:52:32', 'uan'),
('757af14f-14d6-4d68-8f79-7a2588b5dce9', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd13c37bd-e808-408f-b3fa-27e75474c348', '2018-05-22 08:39:02', 'uan'),
('757e5da7-09ff-44d3-b014-5cb0373092e8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', '2018-05-22 08:45:37', 'uan'),
('7589b4c0-6ae6-4393-a8c8-9d79207faaed', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'bc7321ca-57d4-4188-81ef-25ec61161257', '2018-06-23 07:52:32', 'uan'),
('7599371a-16cd-4deb-9004-bbba67c98aca', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a362e708-187f-4b7e-b0e6-ba09cf557164', '2018-05-22 08:45:37', 'uan'),
('76490d30-e306-4377-97fb-17b1c2960af1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8ea2488f-1a22-448f-8edc-fe7ebd763db7', '2018-05-22 08:39:03', 'uan'),
('76e17741-ee76-4839-8e2a-b91e00594f43', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '165fd8d9-3e5c-4301-9608-40a4c3e5da0b', '2018-06-23 07:52:34', 'uan'),
('776de160-9706-43df-9f16-651e387322bd', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4f590627-b763-4696-a6ea-adfd236585fa', '2018-05-22 08:39:02', 'uan'),
('777057fc-be44-455f-9ecc-01c5d9b9b7fa', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-05-22 08:45:36', 'uan'),
('7796eb4f-1bda-43e1-8145-89977fe8798c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2a4f379f-1471-43af-be2b-f9ef6dd9f713', '2018-05-22 08:39:02', 'uan'),
('791c0b23-cb85-4e04-bfb5-edb3281866ae', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', '2018-05-22 08:39:02', 'uan'),
('795e51ae-c421-47a1-bb7f-8e948328bd9f', '0052375d-f717-4f28-b0ef-297d6c2a873b', '42285ff7-9922-48d6-bec1-ce4467416ea6', '2018-02-26 09:44:12', 'uan'),
('7962f4b4-530b-4612-8904-afa0e03c7265', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '945605ca-19f9-45d1-a0c8-735243a44d38', '2018-06-23 07:52:35', 'uan'),
('7a3effe4-9c08-4b4d-a2f3-4ed70d9b2667', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c83a2d94-84e1-479a-b9c9-6e7e60b75ddc', '2018-06-23 07:52:35', 'uan'),
('7a6ad9fe-f43b-4d3b-9684-e738c8911fca', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '42b1123a-f0c0-4351-a35b-cdd0fd9764b8', '2018-05-22 08:45:37', 'uan'),
('7a7d6c5d-72f1-45d5-99f6-4b067a69a870', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e36765e2-1642-4793-ba7e-83fd96d0d1c7', '2018-05-22 08:45:36', 'uan'),
('7a8a4300-45e0-4d94-bc25-7847a008044e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1aaeecda-7082-4554-9ac8-f590f93f8b95', '2018-06-23 07:52:33', 'uan'),
('7ce9d215-82f6-4209-859d-af6f86ea3423', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd0ddc7d8-8c74-4667-b496-2f0ad3c19e53', '2018-06-23 07:52:35', 'uan'),
('7cf012ef-8a74-40b7-b3e3-1eaafc0ef7f0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7ce1e438-d14f-4934-9738-4e44e894cf15', '2018-06-23 07:52:36', 'uan'),
('7d7f73fd-4edb-46f2-a75e-0daf1de69bad', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '960a0402-07f4-4c43-811d-e7af9284ddfa', '2018-05-22 08:45:37', 'uan'),
('7d8aa2b3-99ce-42a3-ba01-ce92e0872036', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'a988a6fd-2786-4c25-b721-8b84380314bc', '2018-02-26 09:44:12', 'uan'),
('7d94332d-6077-497b-b5da-f2f2469e587d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0cd213df-3d00-4c0a-b746-bf5a62e771c0', '2018-05-22 08:39:02', 'uan'),
('7e792a07-372b-4186-9d50-4199892b82fe', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '18959738-8b40-44ed-9fc7-289ba2b406c9', '2018-06-23 07:52:33', 'uan'),
('7ebd88a5-fe73-4d45-a7a6-4f08118832aa', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9cfa5966-b544-4d91-bff3-4d4f8d63cb30', '2018-05-22 08:39:03', 'uan'),
('7ed2dde1-4797-4a16-941a-d51e18489d6d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', '2018-05-22 08:39:02', 'uan'),
('7ed96353-c592-4951-a6a9-3543f41820c5', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1e69121c-47b2-4567-97f9-b2c1b31e9e70', '2018-05-22 08:45:37', 'uan'),
('7ede953e-ac34-40d6-9a05-3013204cab91', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a46bf3be-a18e-4e6c-bb27-cba4cabc81f2', '2018-05-22 08:39:02', 'uan'),
('7f1eb2d8-97b6-40e1-b6d3-3664abc955d4', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '19147938-1594-4207-aef5-29b0d0d63b66', '2018-05-22 08:45:37', 'uan'),
('7f393407-b490-4605-93f5-6742c5f41771', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', '2018-05-22 08:45:36', 'uan'),
('7f7120cc-cde6-4c40-b26f-2db1c2509c7d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e36765e2-1642-4793-ba7e-83fd96d0d1c7', '2018-06-23 07:52:33', 'uan'),
('81bd2717-7c29-4045-a93e-09184527910d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a5b942d2-7ec3-46db-b75c-e18ffd9a515d', '2018-06-23 07:52:33', 'uan'),
('8253ff3f-0533-4128-8e18-c8386128a0df', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7d9ead39-5c5c-4633-93b3-544172f751f9', '2018-05-22 08:45:36', 'uan'),
('832f83ca-fc4d-4627-abd1-42faffc01732', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-03-12 10:46:38', 'uan'),
('8367257b-5506-434c-ba11-c343b2ba3d2f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fa02c8c8-1782-4379-a573-0e1dd3fde6b4', '2018-06-23 07:52:33', 'uan'),
('836a63b2-a9ec-4256-a59f-f3c10d891403', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1e69121c-47b2-4567-97f9-b2c1b31e9e70', '2018-05-22 08:39:03', 'uan'),
('83e78ab8-cf90-475d-ac21-d1ae885994ea', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8c53b550-e6e4-4cda-a935-b7ea63f9651f', '2018-05-22 08:39:03', 'uan'),
('84063f16-b7fc-4f9e-a1b0-576ba6d2e4fa', 'ccce1b2c-5926-4612-8792-775ed8c11033', '41da6bba-8076-4b03-957f-588832c2d8c6', '2018-05-22 08:39:02', 'uan'),
('84361307-3170-4cbe-b51d-8135e168c084', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-06-23 07:52:32', 'uan'),
('8450e7fd-ba27-4e9d-a34e-ce971b48c937', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '691d2bcd-378d-46fc-9cce-649e44b37acf', '2018-05-22 08:45:37', 'uan'),
('84a9b56c-0379-4f00-acb7-9a75e4b98215', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f7b28d1a-6056-4077-873b-afa244b643d7', '2018-06-23 07:52:35', 'uan'),
('854148e5-3e58-4c80-926c-8d3bf8f9da4f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3c6bf439-cddf-42bd-9bac-39d76bf3afc0', '2018-05-22 08:39:02', 'uan'),
('8551192d-7a7b-4bbc-91d5-f88fdbd9358a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a5b942d2-7ec3-46db-b75c-e18ffd9a515d', '2018-05-22 08:45:36', 'uan'),
('873bd9de-1af3-4af1-94bb-13fbf3cf5be9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7cecc67d-6458-4415-9668-bb11bbba94e8', '2018-05-22 08:39:03', 'uan'),
('884347e7-dcd0-4128-a5ac-15de365772ac', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8', '2018-05-22 08:45:37', 'uan'),
('88dec742-b1b3-4168-938d-bb5210819ce2', 'ccce1b2c-5926-4612-8792-775ed8c11033', '395db1e2-2a6b-47fe-9888-79d052f2f78f', '2018-05-22 08:39:03', 'uan'),
('8a36d9a8-3802-4517-bd54-2f9b1b257e20', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '48e57212-9886-4cc0-998b-84fd1a6a0e22', '2018-06-23 07:52:34', 'uan'),
('8a79ee2e-2900-4eca-bbc3-956a9d82e562', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '272f8adc-b092-46a1-8100-20fb74a97219', '2018-06-23 07:52:34', 'uan');
INSERT INTO `role_accesses` (`id`, `role_id`, `action_id`, `created`, `createdby`) VALUES
('8b9b7a3f-de76-42e3-b2b1-7dd853061c54', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a1a9f201-e19d-42f3-91c3-36772c24bc68', '2018-05-22 08:45:37', 'uan'),
('8bbb7c4a-17ca-4ce3-83b9-25583c600f05', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1eaf84c2-2d82-428c-ab0c-cd118cdc9579', '2018-05-22 08:45:37', 'uan'),
('8c06ff26-f9bd-47d2-8cc8-6db02b801df1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c2643c7c-cd16-4355-b122-441181f5851b', '2018-05-22 08:45:36', 'uan'),
('8c683081-347a-4aec-b0a7-e409b3c32227', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'b65a1d21-89a7-411e-97b0-484ea81a749a', '2018-05-22 08:39:02', 'uan'),
('8c87cae9-7b67-4131-bc11-229ad737c7e9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ddb9e810-dadf-4541-a569-845c1ff4a3ac', '2018-06-23 07:52:34', 'uan'),
('8cd5762c-0657-4bc1-8ac7-b6789eda3583', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '19147938-1594-4207-aef5-29b0d0d63b66', '2018-06-23 07:52:36', 'uan'),
('8d0b4bbc-dc22-47f5-804b-65d78ce105e2', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9d334504-0ff0-4191-a552-feaace318f28', '2018-05-22 08:39:03', 'uan'),
('8d1490c9-0455-45fc-acf4-f840c9e3e55c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '56369e22-c9e7-46b7-baa7-a23338dc6551', '2018-06-23 07:52:32', 'uan'),
('8d5a7da7-4b3b-4608-96b2-043eafa7bdb7', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd3e22c6f-15b7-4e29-8512-c6775b6343e8', '2018-05-22 08:45:36', 'uan'),
('8db82135-cf25-4c0e-b317-5a1ea0cb40d8', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5a49a41b-be0d-4084-a097-58b8b4c74f3c', '2018-05-22 08:39:02', 'uan'),
('8ee6a694-cc32-4274-9dc1-9e6b75ff19c0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '85348380-adda-4288-ab05-899daaae908b', '2018-05-22 08:45:36', 'uan'),
('8fc138f0-077c-49e2-88aa-5d82110b9446', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', '2018-05-22 08:45:36', 'uan'),
('8fc861d6-efc3-4451-8efd-96ba0c856d04', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', '2018-05-22 08:39:03', 'uan'),
('8fe963a3-81cb-4c3d-8173-582d73c8c9bd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1e3a1292-9d95-474a-9ca7-8deb08a89390', '2018-05-22 08:45:37', 'uan'),
('9063432a-b725-4b7a-82de-c558fa9a1c3f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1dad9db2-1a9e-4520-b874-79c78ea58308', '2018-05-22 08:45:37', 'uan'),
('90d6aba1-643a-4445-aa61-8269c66bd005', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a522eb09-4bf4-471e-8532-2b9276491749', '2018-05-22 08:45:36', 'uan'),
('90de2295-e616-441e-a5cd-9e2e679b4ca3', 'ccce1b2c-5926-4612-8792-775ed8c11033', '8ea840e7-9452-4688-af4a-60e7540460a4', '2018-05-22 08:39:02', 'uan'),
('9130c1e4-087c-4413-9958-53d32b220575', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6f82d8d1-5046-4bfb-8bae-853fb8487bbc', '2018-05-22 08:39:02', 'uan'),
('9170d823-cb8f-4e9d-af12-6fc0016c202d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4f590627-b763-4696-a6ea-adfd236585fa', '2018-05-22 08:45:37', 'uan'),
('9225f788-3acd-46ec-a144-2d6cf6cabfe8', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f1a8f89f-6332-4a1c-a5dc-a37605359cdd', '2018-05-22 08:45:37', 'uan'),
('9246e203-1a1c-4811-b43f-cee23539313c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', '2018-05-22 08:39:03', 'uan'),
('9249d7e1-81f7-4f06-b66a-42ffd0390bcf', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1ee38ccf-44ac-42cc-ae45-3beef54268a7', '2018-05-22 08:39:02', 'uan'),
('928557ce-e39d-477d-8fe7-35d29694fa2e', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ad0de284-9c1f-4afb-af14-f9c5a8e866c7', '2018-05-22 08:39:03', 'uan'),
('935b039a-722a-4d07-b5c2-f12257cc3c4c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0e6c4588-a43b-40c1-beca-87a2675fffac', '2018-05-22 08:45:37', 'uan'),
('938cbde9-aa4a-45c9-b418-0fb996fc5b15', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ea409acc-3b37-4ec6-84c4-63f90f460d93', '2018-06-23 07:52:36', 'uan'),
('944a9c5f-b6c5-4244-a417-5180295ae0a2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '72db9bfa-fb12-4340-84ba-0d83d6df131b', '2018-06-23 07:52:35', 'uan'),
('9467e80b-c530-4034-9554-88460bebfba2', 'ccce1b2c-5926-4612-8792-775ed8c11033', '165fd8d9-3e5c-4301-9608-40a4c3e5da0b', '2018-05-22 08:39:02', 'uan'),
('94a62c82-0726-409b-abde-a308f7911878', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '804e5330-b692-4f13-b132-1881bdc3ba64', '2018-06-23 07:52:34', 'uan'),
('94f4932e-0eed-43c0-b868-8f6fd89c2578', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4229bec5-f7ab-4f33-9b07-3cfce62a46cb', '2018-05-22 08:39:03', 'uan'),
('95225f61-2ea6-4234-b5f4-4828cb4f2782', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', '2018-06-23 07:52:33', 'uan'),
('9532d13d-5a4f-422c-acc7-eadc6d94b996', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0bae60f9-f3a5-4203-ad7e-e77632327f9f', '2018-05-22 08:39:03', 'uan'),
('954b0f77-4d2e-4028-95b1-bee3a391a0ba', 'ccce1b2c-5926-4612-8792-775ed8c11033', '55712a15-826f-4d08-af31-94de946a0451', '2018-05-22 08:39:03', 'uan'),
('95af6d19-ea80-4b26-9a76-736e7a0d2257', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '4eb4e924-a85c-4ecc-a639-304d1b26e65d', '2018-06-23 07:52:36', 'uan'),
('96488d7a-ff26-4177-930b-9d38892e23d6', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1c26d965-42f7-4c9d-af5b-307c4d3a00bd', '2018-05-22 08:39:02', 'uan'),
('9667f225-de8b-4f09-b43a-dcac445b8286', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3d727751-1498-4a99-bd59-5c0973238f3c', '2018-05-22 08:39:03', 'uan'),
('9680d2d6-71c2-441f-8fd1-28a59fe3c377', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '41b9bd12-d501-48d5-a17d-12ed249ffe16', '2018-06-23 07:52:35', 'uan'),
('96976cbd-af4f-47a8-8c66-08dd5de9c4e3', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4d7f7ee4-3311-4e3e-8653-243d278151cd', '2018-05-22 08:39:03', 'uan'),
('96bea6d7-9800-4376-989a-df03ef0e0953', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a1a9f201-e19d-42f3-91c3-36772c24bc68', '2018-05-22 08:39:03', 'uan'),
('96e0e633-fa24-4026-af97-0d958db9f0a6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-06-23 07:52:32', 'uan'),
('96f8dd7b-8f38-4dc0-88cf-ce00f9379c90', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '65edd09e-c611-4f6e-8750-3ad23eaf688a', '2018-06-23 07:52:32', 'uan'),
('970e6db8-9589-40ce-8dab-2b08d121418b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'edc23445-d3be-4e6b-a5ff-7689dd603ea6', '2018-05-22 08:45:37', 'uan'),
('972336c7-34d2-427e-aefa-36a6ec5618ab', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'bee64d11-a34c-44e2-a542-d3eee78f6db7', '2018-06-23 07:52:33', 'uan'),
('9846a286-256d-4003-a4c3-8c64ecc4eb26', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'f78a01df-dc87-4943-9c3b-f059ff78f1e7', '2018-05-22 08:45:37', 'uan'),
('99e7f4ad-f8f8-4351-b47f-7121af67f694', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd51a994d-7649-4ef1-9bdb-1980a4eb4b60', '2018-05-22 08:39:03', 'uan'),
('9bd3ba0b-2205-4b0a-b874-5b3ed8bf04df', 'ccce1b2c-5926-4612-8792-775ed8c11033', '960a0402-07f4-4c43-811d-e7af9284ddfa', '2018-05-22 08:39:02', 'uan'),
('9bfdd317-5781-4411-9314-2b4a3b222dca', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'ce0ffb95-1e39-4bd4-9268-3f5dea1990db', '2018-02-26 09:44:12', 'uan'),
('9c1069cc-7e53-4a9d-b3ad-aaa4dc99a485', '0052375d-f717-4f28-b0ef-297d6c2a873b', '55712a15-826f-4d08-af31-94de946a0451', '2018-02-26 09:44:12', 'uan'),
('9c208297-7564-4697-a8b4-5306049c0f1c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8aaf8ec9-0ca5-4eb7-aa99-779c7865db00', '2018-06-23 07:52:34', 'uan'),
('9c24a226-43e6-4d84-ba50-c526bbf867f2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd7bc572c-4ec5-4450-af5b-39ecfe1d726f', '2018-06-23 07:52:34', 'uan'),
('9cf49c67-8eae-43ed-bb11-ca647add0b2b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '89d52853-e508-4c1e-a8fc-d6fef9f2ef37', '2018-06-23 07:52:34', 'uan'),
('9e15181c-cfc1-49a4-a4eb-c3bc5a5ba18a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'fffdb800-5b25-48d9-bcc2-f60c5a7fafd2', '2018-05-22 08:45:36', 'uan'),
('9e22100b-7ff9-4c2e-b514-bba824a9ec14', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f78a01df-dc87-4943-9c3b-f059ff78f1e7', '2018-05-22 08:39:03', 'uan'),
('9e2fe490-11c5-41ea-9d2e-b951b0179277', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'bc7321ca-57d4-4188-81ef-25ec61161257', '2018-05-22 08:39:03', 'uan'),
('9f31b5f9-cdcf-47dc-b9ce-d56a9923d20e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'fa02c8c8-1782-4379-a573-0e1dd3fde6b4', '2018-05-22 08:45:36', 'uan'),
('9f7a34d3-05b3-46c6-be8d-0c36fc247c27', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '73aca571-f8d7-4502-a945-fa53ff13676b', '2018-05-22 08:45:36', 'uan'),
('9fe978d7-b7f4-4705-a770-b47d1f24dc0d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0c5aa7f3-0395-4ef4-935f-7fe7957fa451', '2018-06-23 07:52:33', 'uan'),
('9ff62886-3a9e-426c-a032-b099bd7bbb5d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '42285ff7-9922-48d6-bec1-ce4467416ea6', '2018-06-23 07:52:35', 'uan'),
('a04addd7-9ae6-472d-842a-09d40bab3008', '0052375d-f717-4f28-b0ef-297d6c2a873b', '47a6efb9-00dc-46ef-a293-ea209998cebf', '2018-02-26 09:44:12', 'uan'),
('a0651556-6e2e-4d85-aa00-85d2c98f67e0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f50f9b7d-b688-477f-952a-5119e72c6455', '2018-06-23 07:52:35', 'uan'),
('a09a634a-5598-41ae-accf-272bffa1bf83', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', '2018-06-23 07:52:35', 'uan'),
('a09fe527-5ca2-40df-b37b-fadbb13536f1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '571432a8-0fbb-4bcf-b8ba-7f4d4998c864', '2018-06-23 07:52:34', 'uan'),
('a0ff6380-13ab-4cc3-8e10-1b64595eded4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '34450fd0-c16f-497f-8826-a30e30d47665', '2018-06-23 07:52:34', 'uan'),
('a16761cf-f855-430e-8d80-365099fa38fb', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', '2018-06-23 07:52:33', 'uan'),
('a203d00e-59d3-4639-9a8e-995c4aa42e78', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '72d5a13e-12a2-4642-96b0-d5742ab2fef1', '2018-05-22 08:45:36', 'uan'),
('a2132bfc-9c2e-4dbc-9656-73867153bcaa', '0052375d-f717-4f28-b0ef-297d6c2a873b', 'f7b28d1a-6056-4077-873b-afa244b643d7', '2018-02-26 09:44:12', 'uan'),
('a27f975d-756f-4c94-92e2-dac531886fd4', 'ccce1b2c-5926-4612-8792-775ed8c11033', '124e1dc1-412e-43e0-877f-e506193406aa', '2018-05-22 08:39:02', 'uan'),
('a302e574-8f0a-415f-a11d-2665b971fd7e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', '2018-06-23 07:52:34', 'uan'),
('a34e2303-591e-48d2-8fff-02276112a871', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8c53b550-e6e4-4cda-a935-b7ea63f9651f', '2018-05-22 08:45:37', 'uan'),
('a383a7c2-fe44-4138-8f36-fdd01c5c606f', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '518e91db-35da-4118-bd27-4670f886bf46', '2018-05-22 08:45:37', 'uan'),
('a42a899b-0c11-45af-aed5-a1f9def9e3df', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3d0624ae-6912-4381-b761-004987aed866', '2018-05-22 08:45:37', 'uan'),
('a4cff308-0809-49f9-a26f-7330467d01b1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-06-23 07:52:32', 'uan'),
('a4d951fe-aa06-47e4-889a-307345ee2b12', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'fc31c746-75a3-4eaf-9999-f8b44fb4217e', '2018-05-22 08:45:37', 'uan'),
('a588b7ef-7eaf-4833-9b08-fc56082ed221', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd3e22c6f-15b7-4e29-8512-c6775b6343e8', '2018-05-22 08:39:03', 'uan'),
('a5906ee3-efcf-4d40-8eac-1bac0a10aa90', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a131d7d1-daf1-48e1-a7f8-fe977c87a862', '2018-05-22 08:39:02', 'uan'),
('a650fe69-d968-41ea-811e-5f9c089ba212', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'edc23445-d3be-4e6b-a5ff-7689dd603ea6', '2018-06-23 07:52:35', 'uan'),
('a6a7da11-47d8-4294-8445-140c1289ca90', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3e59c022-cad5-498b-b3d6-1441d4ec44a1', '2018-06-23 07:52:33', 'uan'),
('a7bea5bd-d442-43b3-8420-846fdeb5894c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '74b0584d-4276-45d8-829c-70776ab33a4f', '2018-06-23 07:52:35', 'uan'),
('a7ed73b9-4067-435c-944f-58873786f7a6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '268e8b71-d97e-49b8-a762-39b06368a14e', '2018-06-23 07:52:33', 'uan'),
('a8b0fe4c-a96a-42b0-926d-a452af3cbff1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a22ceea6-88b3-41f3-ba6c-2b514d20e217', '2018-05-22 08:45:37', 'uan'),
('a8c8b127-a859-4cd1-b0fb-8e088e00a27c', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c', '2018-05-22 08:45:36', 'uan'),
('a9145f27-d566-4adc-a771-30a4b6bafd3b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f78a01df-dc87-4943-9c3b-f059ff78f1e7', '2018-06-23 07:52:36', 'uan'),
('aa2d8ebf-38ef-4956-916b-45c973ddc8d8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6817f3b3-aecb-4b46-8bc4-ae6f4b185608', '2018-06-23 07:52:35', 'uan'),
('aa4202df-fa5c-4de6-ad3d-7d69e643cef2', 'ccce1b2c-5926-4612-8792-775ed8c11033', '47a6efb9-00dc-46ef-a293-ea209998cebf', '2018-05-22 08:39:02', 'uan'),
('aba49c43-607f-4536-a374-b4e3a89010fd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'beeefa8c-44a9-4238-97b4-ee5750422fb0', '2018-05-22 08:45:37', 'uan'),
('abd66adf-11eb-445b-8161-7b3057db959b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '318017c3-f873-42ab-80da-8c788a4ec931', '2018-05-22 08:45:37', 'uan'),
('ac123112-3508-45e4-8640-07580994f089', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fa02c8c8-1782-4379-a573-0e1dd3fde6b4', '2018-05-22 08:39:03', 'uan'),
('ac282190-55c1-4679-b29d-1a414ddebc88', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ac28025f-2c56-480c-816d-3c31004dd016', '2018-06-23 07:52:36', 'uan'),
('ac786d18-7c61-4bf8-8d80-bbbe575f6fce', 'ccce1b2c-5926-4612-8792-775ed8c11033', '13b92d9f-27d7-4023-8d9a-b8e176e8585a', '2018-05-22 08:39:03', 'uan'),
('acdbf7d4-c456-41a0-bb9a-78dfe89060ca', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f3a6ea56-0690-449f-b72a-b4bf54bdd6d5', '2018-06-23 07:52:32', 'uan'),
('acf3933c-a4ef-4d27-980a-dfddd076d52b', '0052375d-f717-4f28-b0ef-297d6c2a873b', '948e2bf3-ff49-4d06-bb23-92bcea3cb5da', '2018-02-26 09:44:12', 'uan'),
('adc45358-21ff-4699-b330-2d02566e98a0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8a643eb0-e44e-4000-b78f-d7f47bc3255c', '2018-05-22 08:45:37', 'uan'),
('adfa1c3f-662a-4f2b-b099-b7ecba96873d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '74f94222-3537-4320-a347-857c1feb24d4', '2018-05-22 08:39:02', 'uan'),
('ae61b8e4-6ab8-4129-83f0-5f975edf6ca1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0a978e43-4c15-47de-b1b2-380ede4a3a49', '2018-06-23 07:52:35', 'uan'),
('ae81f210-4811-4b19-ab7f-801034533114', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a6298301-d66f-42d1-8a6f-ca355f5740a7', '2018-06-23 07:52:35', 'uan'),
('aecb6868-609f-4a17-bd5d-72033f44dcb0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ead6c4a6-5e03-4710-9000-c3b2dcc93bee', '2018-06-23 07:52:35', 'uan'),
('aede671c-e38b-4d77-af5f-3d1bd34cf741', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3dd2dcbe-8c5f-476e-a1cd-7cdba1ec4ead', '2018-06-23 07:52:36', 'uan'),
('af59d43e-1de9-4bbc-8ef3-09ad4ee77bf4', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1acd38be-8dcb-45f8-ad82-0903631900f1', '2018-06-23 07:52:32', 'uan'),
('b08fa763-cc58-47d2-86e6-c4750c670426', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9742de93-52c5-4af6-8d8f-f82b43d89ba6', '2018-05-22 08:39:02', 'uan'),
('b1159c89-46d7-44da-8e37-eaa417331a5e', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '948e2bf3-ff49-4d06-bb23-92bcea3cb5da', '2018-06-23 07:52:35', 'uan'),
('b1cc430a-6c19-41c1-9eb9-817faaef384d', 'ccce1b2c-5926-4612-8792-775ed8c11033', '592b10fe-2110-4cb8-bca7-d0e1f1bf0149', '2018-05-22 08:39:02', 'uan'),
('b1ce40c0-3523-4f57-8c29-33aa46432d8f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c6e3a90b-4052-4d13-8055-a4f18e866638', '2018-06-23 07:52:32', 'uan'),
('b21eb395-97c9-4336-a2c3-6d1880415985', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ae142032-4b2b-4c3b-9d07-cc5891262dee', '2018-05-22 08:45:37', 'uan'),
('b246b0d7-f57a-41d6-8a89-7aeef3c4e5b0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ee13301d-c0dd-404a-b625-061838662d30', '2018-06-23 07:52:35', 'uan'),
('b2ac47c2-988e-4761-a115-ccd02fe8223c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '268e8b71-d97e-49b8-a762-39b06368a14e', '2018-05-22 08:39:03', 'uan'),
('b2bf8705-ec5d-4032-bba6-1bbdf3d677bb', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3d727751-1498-4a99-bd59-5c0973238f3c', '2018-06-23 07:52:33', 'uan'),
('b333c09c-8618-40bd-a733-2c5821e6cb57', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9742de93-52c5-4af6-8d8f-f82b43d89ba6', '2018-05-22 08:45:37', 'uan'),
('b33c156c-8488-4ed5-8f5e-55078ccdcd21', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a988a6fd-2786-4c25-b721-8b84380314bc', '2018-06-23 07:52:35', 'uan'),
('b34504f4-d628-401b-8e42-9a1de623edcc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '13b92d9f-27d7-4023-8d9a-b8e176e8585a', '2018-06-23 07:52:32', 'uan'),
('b3b66ebf-d3db-4a74-97d7-63a24ca00ea2', 'ccce1b2c-5926-4612-8792-775ed8c11033', '85348380-adda-4288-ab05-899daaae908b', '2018-05-22 08:39:03', 'uan'),
('b4fc6452-7931-4569-93dd-14dd9ba6156a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '499117f1-388a-4986-977e-240e84ddfa3f', '2018-05-22 08:39:03', 'uan'),
('b53f78de-2edc-4659-b228-11ce8503abe3', 'ccce1b2c-5926-4612-8792-775ed8c11033', '49fcaede-e452-450d-8781-cdbe2eb13836', '2018-05-22 08:39:02', 'uan'),
('b55b2f8e-8c80-4239-a9d7-1fb1eb4e5b07', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '499117f1-388a-4986-977e-240e84ddfa3f', '2018-06-23 07:52:33', 'uan'),
('b564592c-f706-46a4-9b31-ed93974408b1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '72d5a13e-12a2-4642-96b0-d5742ab2fef1', '2018-05-22 08:39:03', 'uan'),
('b5bc4656-904b-425a-84da-fa109a314965', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ac28025f-2c56-480c-816d-3c31004dd016', '2018-05-22 08:45:37', 'uan'),
('b61655eb-72fb-41c7-9d1b-cca112199d86', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1b6d8024-5712-4078-97cb-b86c7e523a59', '2018-05-22 08:45:36', 'uan'),
('b67799b8-8a33-4803-8b51-7d237b6ac5fb', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a522eb09-4bf4-471e-8532-2b9276491749', '2018-05-22 08:39:02', 'uan'),
('b73094da-ac2a-409e-8c4c-2e41cd1f381b', 'ccce1b2c-5926-4612-8792-775ed8c11033', '210c813b-c607-4242-83a0-b2be186ebd7f', '2018-05-22 08:39:03', 'uan'),
('b7d96882-6d5d-4571-8deb-6cb263e74824', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '31a66b5a-69cb-4d98-8b8b-c005826dc299', '2018-05-22 08:45:37', 'uan'),
('b86a995a-f02e-44bf-82ba-4ab815c4c27b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'de366403-b454-4b0b-b96b-ff0aaa351251', '2018-06-23 07:52:32', 'uan'),
('b8bfb8fc-e00d-4041-8b14-e4c033a75f5c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '4f3c2af0-53ce-45ad-936b-1c0c47fd01a1', '2018-05-22 08:39:03', 'uan'),
('b8ecddf5-5ea0-404d-9ffd-ff05672b25b7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f5013152-aa4e-40f2-9d22-8872b7818bae', '2018-06-23 07:52:34', 'uan'),
('b8f6465f-122a-451e-9d15-de768670c3e7', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd73d0cc7-13a9-4187-90ad-ba377fee0bdb', '2018-05-22 08:39:02', 'uan'),
('b9af2a7c-b261-46ac-ac9a-e9b875084863', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2', '2018-05-22 08:45:37', 'uan'),
('b9bf87e6-c8a8-4c8e-b860-4b34132c43e1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e2ac4453-58e7-452a-a53f-a314a6431222', '2018-05-22 08:45:37', 'uan'),
('ba320c84-a9e7-47ab-b64b-02aed0365601', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3b822935-6262-4569-ae18-363a6d75b96f', '2018-05-22 08:39:03', 'uan'),
('ba4735aa-125a-41bb-80d2-00aa83c51bed', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '50ddf455-ed13-4efc-a740-96bb25cff7c4', '2018-06-23 07:52:36', 'uan'),
('bb783de3-4528-427b-80bb-11861d4d85db', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9352fa28-88c6-40fb-905a-58939086e257', '2018-06-23 07:52:33', 'uan'),
('bbed0909-245d-4553-90c6-8ed80ee2e64b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '188f5f96-3668-4694-bcf8-0922a2727e27', '2018-05-22 08:45:37', 'uan'),
('bdc20084-8c8d-4ec0-9527-14c029635341', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '37cb30a3-b57e-43b6-8a3b-e88502b9c840', '2018-03-12 10:46:38', 'uan'),
('be6ec6d6-5b26-4972-88b0-0c3441b98920', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7663bc12-ff3b-4cb3-bc21-90edae293940', '2018-05-22 08:39:02', 'uan'),
('beb7f3cd-84f2-4225-b670-48b60d2e2171', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3bfc749a-0b34-4a92-acec-b8331f0e210a', '2018-05-22 08:45:37', 'uan'),
('befac1f1-7a18-4bb5-a403-db59d53d2548', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a5f307e4-1996-4e6e-b474-86b379e54a13', '2018-05-22 08:39:02', 'uan'),
('bf28c36b-98af-4b99-9b06-7fb4b8c1ef1d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'dc629d6f-4399-4cd5-93ac-85e9d72660ec', '2018-05-22 08:45:36', 'uan'),
('c00f679e-4131-42b9-add9-9fc8e34f18e2', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c2643c7c-cd16-4355-b122-441181f5851b', '2018-05-22 08:39:03', 'uan'),
('c06481ab-e746-4b86-b4bf-ed3bfe3048d9', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0a978e43-4c15-47de-b1b2-380ede4a3a49', '2018-05-22 08:39:02', 'uan'),
('c07e19fa-a9c5-4930-9a8f-7e90d66d4609', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cd725882-004c-4dd2-b780-a501bb6463bf', '2018-05-22 08:39:03', 'uan'),
('c087c844-5967-4019-a98a-09d7cbd10acc', 'ccce1b2c-5926-4612-8792-775ed8c11033', '5e4ae09f-beca-4229-bd56-f053e2a9bc70', '2018-05-22 08:39:02', 'uan'),
('c0dc8d85-7e86-4430-9a56-22552f2f822f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', '2018-06-23 07:52:34', 'uan'),
('c13aa43f-640c-4027-96a4-05e62938d935', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9cfa5966-b544-4d91-bff3-4d4f8d63cb30', '2018-06-23 07:52:34', 'uan'),
('c25644ae-b1e9-4575-b95f-738ec89fd376', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e806ad6d-b5cf-474c-a657-74a5f848bdcf', '2018-06-23 07:52:36', 'uan'),
('c2891617-483c-40ae-a6b9-c908ca4786bc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', '2018-05-22 08:45:37', 'uan'),
('c3398ccf-ab27-401c-9a49-72529bd3cce2', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a1a9f201-e19d-42f3-91c3-36772c24bc68', '2018-06-23 07:52:36', 'uan'),
('c36fd159-0b0c-47b0-ad11-66b632bb9a7d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '8ea2488f-1a22-448f-8edc-fe7ebd763db7', '2018-05-22 08:45:36', 'uan'),
('c370bad0-b3c9-428d-9b53-3a7339dac138', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ee13301d-c0dd-404a-b625-061838662d30', '2018-05-22 08:39:03', 'uan'),
('c3cbef22-37c6-4add-8344-15a92fec4c12', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '368e0db2-66a5-4f14-959d-9537504ca79d', '2018-05-22 08:45:37', 'uan'),
('c4687d6c-41c7-4a74-8618-ceef88c9b528', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f7b28d1a-6056-4077-873b-afa244b643d7', '2018-05-22 08:39:03', 'uan'),
('c4a46223-2d22-4568-8e5d-749c1fd32f72', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a5b942d2-7ec3-46db-b75c-e18ffd9a515d', '2018-05-22 08:39:02', 'uan'),
('c6f4d37e-d66d-45c4-8f94-36db19d34fc4', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd0ddc7d8-8c74-4667-b496-2f0ad3c19e53', '2018-05-22 08:45:37', 'uan'),
('c7bc66b8-e4de-455f-a83f-bd5c2489bf55', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'eedf5420-ecb7-42b0-966f-76916b24af6d', '2018-06-23 07:52:33', 'uan'),
('c94c793b-bf11-485f-bc03-bcfaae983ed5', 'ccce1b2c-5926-4612-8792-775ed8c11033', '40ff26ff-4eba-4448-b7eb-73bebbde2aba', '2018-05-22 08:39:03', 'uan'),
('c9508b94-53d6-495b-b89c-0d835b572ad6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '436cb1b1-ad4d-4c94-855c-20c43b9f4f81', '2018-05-22 08:45:37', 'uan'),
('c950f321-5d23-46b4-9daf-e930f660fb48', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b', '2018-06-23 07:52:35', 'uan'),
('c99e3077-db86-4eb3-9cd6-b402848066fe', 'ccce1b2c-5926-4612-8792-775ed8c11033', '65edd09e-c611-4f6e-8750-3ad23eaf688a', '2018-05-22 08:39:03', 'uan'),
('ca158375-1b00-4908-961b-c029467f8424', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1aaeecda-7082-4554-9ac8-f590f93f8b95', '2018-05-22 08:39:03', 'uan'),
('ca54d6da-72f5-4e8e-8126-3a99985e7804', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '0c31bda6-a544-499b-989f-a8ef1e17e381', '2018-06-23 07:52:36', 'uan'),
('cb1352fe-9da2-485b-a836-96c04f555c97', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '592b10fe-2110-4cb8-bca7-d0e1f1bf0149', '2018-06-23 07:52:34', 'uan'),
('cb3f8a47-93ab-4a49-9c25-3cf2a1731f3e', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c4cd3b72-94fd-4b72-9f21-6eff49bbc384', '2018-05-22 08:45:36', 'uan'),
('cb48c556-2148-4e48-b7d7-a6ee0ad584ef', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6668ebb8-fbdb-4c4e-baa4-81b8e04dd17f', '2018-05-22 08:39:02', 'uan'),
('cb90cbcc-13f0-4525-9cb4-4639dd8df99d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd91333c0-3dd0-415f-bb18-06482c0c1094', '2018-05-22 08:45:36', 'uan'),
('cc1decf4-a06e-4660-ac3e-77329b1163aa', 'ccce1b2c-5926-4612-8792-775ed8c11033', '310c6dbb-6c62-4531-bb1a-41e639f60448', '2018-05-22 08:39:02', 'uan'),
('cc2f84f3-1e00-4af3-98d7-5991c47600d8', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cae07239-bdcf-4e60-ab95-941d483c3028', '2018-06-23 07:52:34', 'uan'),
('cc546b7c-4401-4456-bca3-49f6fb8911ce', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '689ca1da-ebea-494b-98a1-1a819903fde9', '2018-06-23 07:52:34', 'uan'),
('ccb176e2-bc3c-44ca-bd2c-a1ce7d80df88', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a8b6468d-3b79-47bd-8f2b-4ec63a0489d7', '2018-06-23 07:52:32', 'uan'),
('cd031c40-c4f0-4f56-8991-0a5c2df6980b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'cd1b4962-c3ae-4033-babc-a7b750d8dd63', '2018-05-22 08:39:02', 'uan'),
('cd1aee18-01a9-4e1f-beff-d69d70a34a4a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0a978e43-4c15-47de-b1b2-380ede4a3a49', '2018-05-22 08:45:37', 'uan'),
('cd5cd23d-643f-48da-b9ec-0646005e03c2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b65a1d21-89a7-411e-97b0-484ea81a749a', '2018-05-22 08:45:37', 'uan'),
('cd856fb2-c85e-4246-9027-e5b23905462e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '50ddf455-ed13-4efc-a740-96bb25cff7c4', '2018-05-22 08:39:03', 'uan'),
('cd8f33d1-1f49-47d9-ad06-ba69f9a1c337', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'a22ceea6-88b3-41f3-ba6c-2b514d20e217', '2018-05-22 08:39:02', 'uan'),
('ce4e992b-d1f1-4ba1-a60d-de68fb925b68', 'ccce1b2c-5926-4612-8792-775ed8c11033', '263250e3-e046-4580-9299-9ac9b3e69aaf', '2018-05-22 08:39:02', 'uan'),
('ce4f755f-0f7f-4da9-b585-fcf33b049347', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '518e91db-35da-4118-bd27-4670f886bf46', '2018-06-23 07:52:36', 'uan'),
('ce6e2082-6f0a-47a4-a31b-7045f569f9e9', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b568a18f-8385-430b-b532-8315e8e7bb4f', '2018-05-22 08:45:37', 'uan'),
('ce6f41e8-1a2b-467a-84a5-b14753d8345d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3324bc8d-a99f-4fb6-b73e-151473198595', '2018-06-23 07:52:36', 'uan'),
('cee88d5c-8d1c-46b8-b7ab-d8b1820a55b9', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd73d0cc7-13a9-4187-90ad-ba377fee0bdb', '2018-06-23 07:52:34', 'uan'),
('cefdd81e-88b3-4e55-a272-d289b2438832', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1c26d965-42f7-4c9d-af5b-307c4d3a00bd', '2018-06-23 07:52:34', 'uan'),
('cffca449-eed9-4e26-84ec-795e596c9326', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '3bfc749a-0b34-4a92-acec-b8331f0e210a', '2018-06-23 07:52:36', 'uan'),
('d0261d5b-571d-47c4-9541-a784cfbb28fe', 'ccce1b2c-5926-4612-8792-775ed8c11033', '605442d9-2134-4ff9-b901-28b9ae581053', '2018-05-22 08:39:02', 'uan'),
('d02a281c-a295-454f-8e9e-f02929b129c4', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd91333c0-3dd0-415f-bb18-06482c0c1094', '2018-05-22 08:39:03', 'uan'),
('d09e4189-66d2-4b88-bd4a-234d626fde55', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '40ff26ff-4eba-4448-b7eb-73bebbde2aba', '2018-05-22 08:45:37', 'uan'),
('d1306fa5-a142-4aa6-8bd5-9670030f2d5b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7cecc67d-6458-4415-9668-bb11bbba94e8', '2018-06-23 07:52:36', 'uan'),
('d1687132-61a2-4c26-be25-59a31e4c4aac', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', '2018-06-23 07:52:33', 'uan'),
('d2658f20-de49-426e-bd1d-e2c31591ded0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '263250e3-e046-4580-9299-9ac9b3e69aaf', '2018-06-23 07:52:36', 'uan'),
('d2d1ac33-8932-4ecf-b0e5-46077d89f8f5', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a131d7d1-daf1-48e1-a7f8-fe977c87a862', '2018-06-23 07:52:36', 'uan'),
('d310ca71-3ac6-44a1-8380-2c572fdb4e91', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b347f3c3-20c3-4f18-90c1-7cc34e1f4ade', '2018-06-23 07:52:32', 'uan'),
('d3765c32-ca60-431a-9f2d-d1b9c371ee3c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2c10fa21-c1fd-430b-bd5a-38f0881b4614', '2018-06-23 07:52:32', 'uan'),
('d3870960-21a8-4ebb-8e1e-ead8c851acfd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'f9ec2a1d-92ee-4c8c-9e0c-f27eb2e301d2', '2018-06-23 07:52:34', 'uan'),
('d3e12bac-5d40-410a-b31a-d77dda27fbdc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7d9ead39-5c5c-4633-93b3-544172f751f9', '2018-06-23 07:52:32', 'uan'),
('d43bbdca-0d5c-42aa-9553-68f1f875fbb6', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '689ca1da-ebea-494b-98a1-1a819903fde9', '2018-05-22 08:45:37', 'uan'),
('d4739017-7283-49a1-b602-e24402124ace', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'bf1fa564-9527-499e-880d-7b5fa14ccdf0', '2018-06-23 07:52:36', 'uan'),
('d4b0085f-8027-40e3-baf5-48726edb37fc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c42a65d8-1d9e-4e6c-ab58-05ddef70afaa', '2018-05-22 08:45:36', 'uan'),
('d4c40e35-1c5f-4676-9947-44a925f71c97', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'ab1bc3b7-1848-4367-be76-da14860955c9', '2018-05-22 08:45:37', 'uan'),
('d56c4a17-2da5-482d-9f52-b456309f82ee', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '59e8ff71-6b0d-4b5d-b257-d8fbd88a0d54', '2018-06-23 07:52:32', 'uan'),
('d5ae143d-6b63-4154-8e83-fe725317bcce', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e1903505-1a36-402a-8560-463a86f0f0d0', '2018-06-23 07:52:34', 'uan'),
('d61df96f-7433-4a87-bfe2-7212e742e4d6', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '2ecaf777-6418-4268-9a85-58a863b61a53', '2018-06-23 07:52:33', 'uan'),
('d674eefe-370f-4583-8306-b51c4519b694', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1e3a1292-9d95-474a-9ca7-8deb08a89390', '2018-06-23 07:52:34', 'uan'),
('d705e500-b9ec-42d4-8d94-6cb8037e7831', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'ce0fc131-de71-4b8d-8dd7-cc42111c84d8', '2018-06-23 07:52:33', 'uan'),
('d7598894-0f96-489e-84e6-00a4aaaf3874', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'fc701433-0289-4ec0-9d14-c75b383d8b25', '2018-05-22 08:39:03', 'uan'),
('d78d327b-2672-4b22-ac51-9ee91cc23ccb', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2b3a1b88-97f0-49ac-a050-f121876869c8', '2018-05-22 08:45:36', 'uan'),
('d9743c3f-278f-4bbc-9454-76d3ec043afc', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'c582501b-6069-4462-a188-be9ecf07342c', '2018-05-22 08:45:36', 'uan'),
('d98801d9-b825-4946-b77b-596e6ba0f506', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd51a994d-7649-4ef1-9bdb-1980a4eb4b60', '2018-06-23 07:52:33', 'uan'),
('d9c6dce0-40aa-4a3f-9297-c0796458e95e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '22253677-dbf0-4db4-a4e8-9f01ee49cb25', '2018-05-22 08:39:03', 'uan'),
('da5f6db2-e3ac-4fb0-ab8a-9bbb403c7604', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'cd725882-004c-4dd2-b780-a501bb6463bf', '2018-05-22 08:45:37', 'uan'),
('dad45d4e-1edd-481b-8f54-b137e289d8c7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e9d46832-82b5-4ead-867b-36d6f7ff0cee', '2018-06-23 07:52:36', 'uan'),
('db0369f3-01f0-48a4-8b3b-ab3ef04e65db', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '499117f1-388a-4986-977e-240e84ddfa3f', '2018-05-22 08:45:36', 'uan'),
('dba5d7c7-1d54-45a3-a36a-a0c59f822f9d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '4cdb0517-c109-4634-acc7-39f4c33d6fec', '2018-05-22 08:45:37', 'uan'),
('dc87892c-e351-4db6-98a5-51a2757db70c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd1184ebf-bce8-48bb-b685-5e17fe447915', '2018-05-22 08:39:02', 'uan'),
('dcf30d76-586f-4b77-abf3-c56041cae233', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '74f94222-3537-4320-a347-857c1feb24d4', '2018-05-22 08:45:37', 'uan'),
('dda07f76-f577-4bd6-93cd-d5358e80b8ee', 'ccce1b2c-5926-4612-8792-775ed8c11033', '1a9ea34b-da8e-44c5-ad15-70b0daa244ac', '2018-05-22 08:39:02', 'uan'),
('def6286e-251a-4e59-a769-03a5b14a89dd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9742de93-52c5-4af6-8d8f-f82b43d89ba6', '2018-06-23 07:52:34', 'uan'),
('df067474-bdce-49da-ae79-c8ad39d3876d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2fa30fee-61ea-4ae1-bd06-b603730a6885', '2018-05-22 08:45:37', 'uan'),
('df7ac774-212f-45cb-a9a8-8c60aa067e6c', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3d0624ae-6912-4381-b761-004987aed866', '2018-05-22 08:39:02', 'uan'),
('dfd5cfcf-a81a-484e-a21b-11f8c20e23ef', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0060f68a-8aaf-4ac4-8851-1f29ad0834d3', '2018-05-22 08:39:03', 'uan'),
('e09408bd-837f-4efc-bed3-b2dda5f9350b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5fd748ef-a7c7-467e-84f8-220fd3e5bb5d', '2018-06-23 07:52:33', 'uan'),
('e101e48e-8753-4751-8f73-f3bc1b5c4bd2', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2a4f379f-1471-43af-be2b-f9ef6dd9f713', '2018-05-22 08:45:37', 'uan'),
('e1134d64-416e-45b9-9401-6119bf8d12a0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '41da6bba-8076-4b03-957f-588832c2d8c6', '2018-05-22 08:45:37', 'uan'),
('e130abc1-099a-4c31-871e-a7463c7f1a35', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e67e3bee-325d-40e4-944b-e3adbaad7276', '2018-05-22 08:45:37', 'uan'),
('e130b7db-d197-40a1-9ec8-6c977598cba6', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'e020bfea-4460-445b-979d-676d60a1460a', '2018-05-22 08:39:03', 'uan'),
('e15329d2-0864-497a-bcdd-5ef44eb89ce3', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'eedf5420-ecb7-42b0-966f-76916b24af6d', '2018-05-22 08:39:02', 'uan'),
('e1581ede-4d83-4c7e-aca1-c5fbaee44817', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'e020bfea-4460-445b-979d-676d60a1460a', '2018-05-22 08:45:36', 'uan'),
('e15de834-3638-4d07-8bdc-1bc96a157f44', 'ccce1b2c-5926-4612-8792-775ed8c11033', '28014084-f200-4b24-86a2-de6f1a87f38b', '2018-05-22 08:39:02', 'uan'),
('e1677b3a-a50a-44e2-b4e3-ee98deb5c9a1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'eb308a9b-f509-40de-89a7-37da2bbf6c6c', '2018-06-23 07:52:34', 'uan'),
('e266005a-167f-44e7-86ce-aacd4111f6b1', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7537a7af-57ab-46ae-8439-04018015127b', '2018-05-22 08:39:03', 'uan'),
('e2c2f900-1cfb-461a-a3dd-0b7f2db366c0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '368e0db2-66a5-4f14-959d-9537504ca79d', '2018-06-23 07:52:35', 'uan'),
('e2e04324-e0c9-4e29-bce0-903c60d69cc3', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7537a7af-57ab-46ae-8439-04018015127b', '2018-05-22 08:45:36', 'uan'),
('e372bcde-7ef1-495f-a506-7edbc10bd716', 'ccce1b2c-5926-4612-8792-775ed8c11033', '2ecaf777-6418-4268-9a85-58a863b61a53', '2018-05-22 08:39:02', 'uan'),
('e384baa1-0a05-4305-8b9e-6811277aa03a', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', '2018-05-22 08:45:37', 'uan'),
('e3ccbf50-ea72-4d09-a6d0-61c87b8890dd', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a362e708-187f-4b7e-b0e6-ba09cf557164', '2018-06-23 07:52:35', 'uan'),
('e437e3b8-5d0f-46ec-aed7-eeea31289a09', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '40ff26ff-4eba-4448-b7eb-73bebbde2aba', '2018-06-23 07:52:36', 'uan'),
('e48f27f3-8f51-4399-b827-d9ce654bd2e3', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7eaff946-7b78-4faf-864b-4f50efde10c0', '2018-06-23 07:52:34', 'uan'),
('e5657e86-202d-43db-8d21-74ace0e228aa', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'd1184ebf-bce8-48bb-b685-5e17fe447915', '2018-05-22 08:45:36', 'uan'),
('e5c419ce-3e61-4baf-90b5-47bde38f9250', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6b2c6a9f-58a2-473e-b431-8d3f2efb32cb', '2018-05-22 08:39:03', 'uan'),
('e67520dc-04d0-424a-8f30-2728e4523cf0', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '9d334504-0ff0-4191-a552-feaace318f28', '2018-06-23 07:52:35', 'uan'),
('e6b08a27-c084-41ba-be95-b5a26b20d5d6', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ea463ce5-b72a-4710-9d08-b1d27e73093f', '2018-05-22 08:39:02', 'uan'),
('e6c294f0-0a39-4e8d-be6b-5ea01e4f9a54', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ab1bc3b7-1848-4367-be76-da14860955c9', '2018-05-22 08:39:02', 'uan'),
('e72b39fa-13a5-4099-a8b2-93d50581bc1b', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cd1b4962-c3ae-4033-babc-a7b750d8dd63', '2018-06-23 07:52:35', 'uan'),
('e74dda23-ebd6-41a8-8198-799dfeb75b33', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd7bc572c-4ec5-4450-af5b-39ecfe1d726f', '2018-05-22 08:39:03', 'uan'),
('e764c936-df86-4bf8-819e-4823efca13ac', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '6086a957-3ee3-4720-a0c9-38287c6075c5', '2018-03-12 10:46:38', 'uan'),
('e7aadd0b-1451-4541-8119-43e31e701d75', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '73aca571-f8d7-4502-a945-fa53ff13676b', '2018-06-23 07:52:33', 'uan'),
('e7bb3b62-96ce-434e-8728-d5f5f168c21f', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd42bcf5d-348e-4c97-85c2-467a913e343c', '2018-06-23 07:52:33', 'uan'),
('e8892d2e-51c3-4c1d-a304-1fc793bf5a38', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '165fd8d9-3e5c-4301-9608-40a4c3e5da0b', '2018-05-22 08:45:37', 'uan'),
('e89ee23a-6ef2-42d5-b75b-7379208dc33d', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c2643c7c-cd16-4355-b122-441181f5851b', '2018-06-23 07:52:32', 'uan'),
('e9190cbf-789d-488e-a1b8-42763de60432', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ac28025f-2c56-480c-816d-3c31004dd016', '2018-05-22 08:39:02', 'uan'),
('e9d7c04f-f289-4417-9f60-bf2910421c18', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '20f4bebf-5c04-44b5-9e27-f15a7e344311', '2018-05-22 08:45:37', 'uan'),
('ea43c5d0-2b67-4c53-a586-27ae1882ac1c', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '49fcaede-e452-450d-8781-cdbe2eb13836', '2018-06-23 07:52:36', 'uan'),
('eb04dc55-f371-41ba-8141-359668c07dac', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'eb308a9b-f509-40de-89a7-37da2bbf6c6c', '2018-05-22 08:45:37', 'uan'),
('eb37238b-de7c-435a-995f-19df90e34765', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0060f68a-8aaf-4ac4-8851-1f29ad0834d3', '2018-05-22 08:45:36', 'uan'),
('eb3c00f4-2908-4265-86ac-abfe0ad49efd', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a23a4600-3508-48bf-ac65-29cc502cb07a', '2018-05-22 08:45:37', 'uan'),
('eb657cd3-feba-47de-922a-bbf80a06d7e9', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'a0aba001-f604-4ff7-9147-70812752b77a', '2018-05-22 08:45:37', 'uan'),
('ebd3713e-c8dc-44f2-b34b-d6c94a7b4bcf', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '164a80a0-4a8e-4ecf-a04c-24433e60ca7b', '2018-06-23 07:52:33', 'uan'),
('ebd6c59e-711e-466a-86b8-973c3fa2dbfe', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'c4cd3b72-94fd-4b72-9f21-6eff49bbc384', '2018-05-22 08:39:03', 'uan'),
('ebfe345f-e7b8-4c62-9c2a-21673488d4ae', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'ead6c4a6-5e03-4710-9000-c3b2dcc93bee', '2018-05-22 08:39:03', 'uan'),
('ec1f25a6-c2b9-4372-9f4f-f7da864fe0ec', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'cac0f0b7-80e5-4e0e-9d40-67b04c09ac52', '2018-06-23 07:52:36', 'uan'),
('ec29a673-375c-4f20-a63d-a4a5cc6d3c5e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3f118aba-5a1d-4020-b461-6d580e263513', '2018-05-22 08:39:03', 'uan'),
('ec600473-128d-40cc-837c-053885cb8066', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '691d2bcd-378d-46fc-9cce-649e44b37acf', '2018-06-23 07:52:35', 'uan'),
('ed0cb914-4367-404e-b4c7-0fa636490451', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'd9faff4b-65d2-44e8-9da2-8625927fb870', '2018-06-23 07:52:32', 'uan'),
('ed259d73-93b6-4043-bdf6-d15fc3499a98', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'b568a18f-8385-430b-b532-8315e8e7bb4f', '2018-06-23 07:52:34', 'uan'),
('ed961148-b7c4-4cc9-a5d7-efd00925d221', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '5e4ae09f-beca-4229-bd56-f053e2a9bc70', '2018-06-23 07:52:36', 'uan'),
('ed98b82e-d3a9-42e1-acda-ae6041f245b0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '9cfa5966-b544-4d91-bff3-4d4f8d63cb30', '2018-05-22 08:45:37', 'uan'),
('edd34608-23bc-42c5-adf8-cc38f536c33d', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '2ecaf777-6418-4268-9a85-58a863b61a53', '2018-05-22 08:45:36', 'uan'),
('edd9f84e-7d5f-4b15-8df8-c826c7a140fc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '665c0580-3f54-42fa-ad55-7da779b0107a', '2018-06-23 07:52:34', 'uan'),
('ee1239e7-1cf0-493d-973f-4d0e7900a909', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '42b1123a-f0c0-4351-a35b-cdd0fd9764b8', '2018-06-23 07:52:34', 'uan'),
('ee26df03-bf52-4976-b0d5-a9f67b21a447', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7594a6af-b67a-4b39-b102-4edbc3031ab9', '2018-06-23 07:52:35', 'uan'),
('ee38975d-2a21-4ce8-b202-ebfcf1195ebb', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '41da6bba-8076-4b03-957f-588832c2d8c6', '2018-06-23 07:52:35', 'uan'),
('eed68f69-6583-473f-937d-13edca3e1968', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'e904f3bb-ae98-4d1e-82b9-740c33988b3b', '2018-06-23 07:52:33', 'uan'),
('eefd7872-3d84-4eb0-8449-d52ab81263a0', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '945605ca-19f9-45d1-a0c8-735243a44d38', '2018-05-22 08:45:37', 'uan'),
('ef7d9849-8a1a-4de2-94a6-19914de316dc', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '7537a7af-57ab-46ae-8439-04018015127b', '2018-06-23 07:52:33', 'uan'),
('f00b950a-c17d-49de-8357-bb2babb582b3', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'beeefa8c-44a9-4238-97b4-ee5750422fb0', '2018-05-22 08:39:03', 'uan'),
('f079af7d-3112-4e40-b2f2-7cfdd6a8a2e2', 'ccce1b2c-5926-4612-8792-775ed8c11033', '948e2bf3-ff49-4d06-bb23-92bcea3cb5da', '2018-05-22 08:39:02', 'uan'),
('f091d25f-238b-4001-87cf-9e76c214baf3', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b6db71f2-87bc-4550-acd2-f1ac92d7c5d9', '2018-05-22 08:45:37', 'uan'),
('f0ce7061-4c61-44e6-b8ee-48afc1eda52c', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'f50f9b7d-b688-477f-952a-5119e72c6455', '2018-05-22 08:39:02', 'uan'),
('f15142bb-1c24-4e14-840b-0242b3b75c9a', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0c31bda6-a544-499b-989f-a8ef1e17e381', '2018-05-22 08:39:03', 'uan'),
('f182ced7-a381-4643-9a8c-d9d2f4bfd530', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '8ea840e7-9452-4688-af4a-60e7540460a4', '2018-06-23 07:52:34', 'uan'),
('f1898db6-c897-4eeb-a0b6-48a2477bc457', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'b8e4cfc7-6629-492a-944b-949c3b947831', '2018-05-22 08:45:37', 'uan'),
('f1a1b6ef-9aa5-40fb-aa10-342136155476', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '29d45c81-49da-4a56-b337-6f3ced342652', '2018-05-22 08:45:36', 'uan'),
('f1cd8570-d8c5-4c2d-87f4-aa16a9cb63d1', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'fc31c746-75a3-4eaf-9999-f8b44fb4217e', '2018-06-23 07:52:35', 'uan'),
('f2ee04a4-db24-4d0c-ad77-cddd7793bf9b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '132d83ae-7476-49e3-a086-6c7def73f62c', '2018-05-22 08:45:36', 'uan'),
('f31a8696-6c76-4c89-a48e-4b94c0b24867', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'a0aba001-f604-4ff7-9147-70812752b77a', '2018-06-23 07:52:36', 'uan'),
('f3c02d19-9840-4d15-999f-49947d869149', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '365dab62-1d78-44e9-8386-25625f28cd61', '2018-06-23 07:52:36', 'uan'),
('f3fa19c9-6fff-4825-b89b-76de3e6f5cc1', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '3d727751-1498-4a99-bd59-5c0973238f3c', '2018-05-22 08:45:36', 'uan'),
('f4061e8d-8346-4905-8456-9bc4ef7b8846', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '31199fea-51ff-4093-9034-e1b491ee36f8', '2018-06-23 07:52:36', 'uan'),
('f47d6d8c-6f5a-4647-9a67-2dadca0693c0', 'ccce1b2c-5926-4612-8792-775ed8c11033', '3827a831-5488-4597-8536-e75104c2396d', '2018-05-22 08:39:03', 'uan'),
('f485f5b4-ea79-4668-8c38-288b84bc4c24', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '28cd6cd8-06c6-47de-894e-c47dfeb23b48', '2018-05-22 08:45:37', 'uan'),
('f533a1ac-aa97-4585-a63f-5484e0e5497b', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'af7832a7-2fde-40ec-b4d1-b4b46c9dad2e', '2018-05-22 08:45:37', 'uan'),
('f5c19c2b-8b5d-419c-a410-492bf93be126', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '72d5a13e-12a2-4642-96b0-d5742ab2fef1', '2018-06-23 07:52:33', 'uan'),
('f6080d15-c915-4f4c-974f-e5f38d9941a7', 'ccce1b2c-5926-4612-8792-775ed8c11033', '7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', '2018-05-22 08:39:02', 'uan'),
('f6084db5-98cc-4cbd-a627-93a4ddf6ddba', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '1b6d8024-5712-4078-97cb-b86c7e523a59', '2018-06-23 07:52:33', 'uan'),
('f67c3419-4b66-433b-8c93-90ade51c6f45', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c8197eab-d634-4caf-a289-19e770dd7975', '2018-06-23 07:52:35', 'uan'),
('f6f76a63-2cc0-4564-8c90-1ec54e3f3ca7', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '47a6efb9-00dc-46ef-a293-ea209998cebf', '2018-06-23 07:52:35', 'uan'),
('f705479f-2b45-48e6-aab7-93598d954d05', '70de0ce8-fed6-49a6-b9fe-3f07fca99778', '9c21cd60-a4fc-4907-b2f1-3ef0997e6b77', '2018-03-12 10:46:38', 'uan'),
('f78c76f3-462a-4023-b90f-e25a9b898561', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '0eb176f0-7571-49a8-adcc-83d4a51bd9df', '2018-05-22 08:45:37', 'uan'),
('f7ffba12-44b9-4c74-8845-83beedcb7e4e', 'ccce1b2c-5926-4612-8792-775ed8c11033', '691d2bcd-378d-46fc-9cce-649e44b37acf', '2018-05-22 08:39:03', 'uan'),
('f84c3b84-c7bf-4823-8bf3-f29c1050522b', 'ccce1b2c-5926-4612-8792-775ed8c11033', 'd7801bfc-a77c-43f3-aa5f-f4fe685f1da2', '2018-05-22 08:39:02', 'uan'),
('f8e5ef0b-83d8-428f-9f05-1c557c8d2f05', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '1aaeecda-7082-4554-9ac8-f590f93f8b95', '2018-05-22 08:45:36', 'uan'),
('f8ecbd4a-98dc-4d70-836c-b4dccdfc0887', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7a0ac5dd-5e6f-4bae-8f9f-668d62c2e9c5', '2018-05-22 08:45:36', 'uan'),
('fad56f36-88c8-4887-9d71-943f4b82d637', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '7acdd8f8-3587-4060-8c11-159e271162bd', '2018-05-22 08:45:37', 'uan'),
('fb5aa8b4-49a4-4fa4-98b3-26583d369887', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '665c0580-3f54-42fa-ad55-7da779b0107a', '2018-05-22 08:45:37', 'uan'),
('fb8b87ec-fabb-4403-8e58-b2674390eab7', 'ccce1b2c-5926-4612-8792-775ed8c11033', '6a8fcfb2-4665-4e61-92de-3f9de6e40ca2', '2018-05-22 08:39:02', 'uan'),
('fbeffae5-2831-4ce9-8b84-374460dc6c5f', 'ccce1b2c-5926-4612-8792-775ed8c11033', '571432a8-0fbb-4bcf-b8ba-7f4d4998c864', '2018-05-22 08:39:02', 'uan'),
('fe633c50-a283-431c-8898-102d0c6b0d54', 'ccce1b2c-5926-4612-8792-775ed8c11033', '0f7601f8-df50-4503-bf1d-cdbc512e14dd', '2018-05-22 08:39:03', 'uan'),
('fe818771-bd0e-43a4-a0fa-47a2d902ccc4', 'ccce1b2c-5926-4612-8792-775ed8c11033', '9caa53e2-f3ff-48e6-b44e-ed9ef5644b72', '2018-05-22 08:39:02', 'uan'),
('ff59bf82-d3b8-4214-b983-67e79b33c9fa', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '576a63e6-4f9c-46d7-abc7-97f0dfb1634d', '2018-06-23 07:52:34', 'uan'),
('ff635072-8c8c-459b-a526-265c2aed8b16', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'c582501b-6069-4462-a188-be9ecf07342c', '2018-06-23 07:52:32', 'uan');

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

--
-- Dumping data for table `saving_accounts`
--

INSERT INTO `saving_accounts` (`id`, `bpartner_id`, `registerdate`, `org_id`, `branch_id`, `description`, `balanceamt`, `created`, `createdby`, `modified`, `modifiedby`) VALUES
('29cab1fc-04af-4252-afa2-9cbc6e97d854', '97b87d75-4ee3-443f-a20e-9cba11e276e4', '2018-05-07', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '230000.0000', '2018-05-07 10:20:15', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-11 09:24:59', NULL),
('3656ad5c-01e0-417f-a6b8-52c48f6a2351', '841d6978-26e8-4e37-9d1d-d8e3aebf45eb', '2018-05-01', '0', '0', NULL, '0.0000', '2018-05-01 07:47:40', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-01 07:47:40', NULL),
('c33daf5d-2ed7-441c-a425-563faf203ae9', '3ac41b3c-b989-41be-ab4e-3f74c3b7a62a', '2018-05-04', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', NULL, '10000.0000', '2018-05-04 10:49:55', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-06 06:15:37', NULL),
('da7c6f73-4b70-44d9-8ca5-8b2dd6a6f7de', '514cacd3-332e-4fea-8ff9-a29511d14a2c', '2018-05-07', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', NULL, '0.0000', '2018-05-07 10:19:16', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-09 16:21:46', NULL),
('dd2655eb-4f4d-4485-a212-b1b88f3571e0', 'a99ed851-1f70-4401-a4d4-67985d8ad17c', '0000-00-00', '371a39b9-f692-49dd-9d78-41f388e319cc', '6f19d6f9-bfe9-4e57-b626-420d139bb376', NULL, '0.0000', '2018-04-17 08:13:34', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-17 08:13:34', NULL);

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

--
-- Dumping data for table `saving_transactions`
--

INSERT INTO `saving_transactions` (`id`, `saving_accounts`, `docdate`, `docno`, `org_id`, `branch_id`, `amount`, `bank_account_id`, `isdeposit`, `isactive`, `docstatus`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `seller`) VALUES
('17814e7a-9bee-4d0b-9ab0-1531966048be', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-11', 'WD00005', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '20000.00', '43bbf410-6198-4205-aa96-4b462ebea7b4', 'N', 'Y', 'DR', 'เงินสด', '2018-05-11 09:24:59', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-11 09:24:59', NULL, 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('31f9cff0-4a72-4625-9298-0f96b533f833', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-07', '256100005', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '500000.00', '4fc9c7a4-ea71-49ec-a663-15ec406174c1', 'Y', 'Y', 'DR', 'เช็ค', '2018-05-07 10:23:02', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-07 10:23:02', NULL, '7dadadf5-f932-4b2d-b30e-f42d3fd30e64'),
('531a0da8-db8c-4965-8fd9-d508628f2d7c', 'da7c6f73-4b70-44d9-8ca5-8b2dd6a6f7de', '2018-05-09', 'WD00002', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '15000.00', '43bbf410-6198-4205-aa96-4b462ebea7b4', 'N', 'Y', 'DR', 'เงินสด', '2018-05-09 16:21:46', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '2018-05-09 16:21:46', NULL, 'a14f2b7c-d7c6-41a2-9766-43c78b36f681'),
('7289f280-31b7-489b-a497-c3c72f60351a', 'c33daf5d-2ed7-441c-a425-563faf203ae9', '2018-05-06', '256100001', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '5000.00', '09952747-b3cb-4a35-8e56-559d75b24a28', 'Y', 'Y', 'DR', 'เงินสด', '2018-05-06 06:14:23', '34d512fa-3b93-4b09-b342-64696d9da155', '2018-05-06 06:14:23', NULL, '34d512fa-3b93-4b09-b342-64696d9da155'),
('8efa6481-d19f-48a8-91f2-bd8eba4f1bd2', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-07', '256100004', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '1500.00', 'b042e3f7-9715-4df7-869d-9a15d9d78ff7', 'Y', 'Y', 'DR', 'เงินสด', '2018-05-07 10:22:00', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-07 10:22:00', NULL, '7dadadf5-f932-4b2d-b30e-f42d3fd30e64'),
('ad0c881a-772f-47c8-b30e-ae7b2cca9111', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-11', 'WD00003', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2500.00', '43bbf410-6198-4205-aa96-4b462ebea7b4', 'N', 'Y', 'DR', 'ทอง', '2018-05-11 09:16:31', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-11 09:16:31', NULL, 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('b14cd910-503f-48eb-9cef-4071259caa54', 'c33daf5d-2ed7-441c-a425-563faf203ae9', '2018-05-06', '256100002', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '5000.00', '09952747-b3cb-4a35-8e56-559d75b24a28', 'Y', 'Y', 'DR', 'เงินสด', '2018-05-06 06:15:37', '34d512fa-3b93-4b09-b342-64696d9da155', '2018-05-06 06:15:37', NULL, '34d512fa-3b93-4b09-b342-64696d9da155'),
('cd03f86a-3dd5-438e-a059-090789e9667f', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-07', 'WD00001', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '200000.00', 'b042e3f7-9715-4df7-869d-9a15d9d78ff7', 'N', 'Y', 'DR', 'ทอง', '2018-05-07 10:50:12', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 10:50:12', NULL, 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('db09c07c-7a54-43b4-94ab-ce7502a0377b', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-07', '256100003', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '1000.00', 'ad373317-d139-472e-b8e2-72ca4d8a3322', 'Y', 'Y', 'DR', 'เงินโอน', '2018-05-07 10:21:37', '7dadadf5-f932-4b2d-b30e-f42d3fd30e64', '2018-05-07 10:21:37', NULL, '7dadadf5-f932-4b2d-b30e-f42d3fd30e64'),
('e2dd4abc-f010-443b-a629-cc3e05c107a1', '29cab1fc-04af-4252-afa2-9cbc6e97d854', '2018-05-11', 'WD00004', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '50000.00', '43bbf410-6198-4205-aa96-4b462ebea7b4', 'N', 'Y', 'DR', 'ทอง', '2018-05-11 09:17:56', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-11 09:17:56', NULL, 'b0ad3559-96df-4ecf-a65f-8932da1073ef'),
('ed033ced-f979-4473-b201-facde727d4e4', 'da7c6f73-4b70-44d9-8ca5-8b2dd6a6f7de', '2018-05-07', '256100006', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '15000.00', 'b042e3f7-9715-4df7-869d-9a15d9d78ff7', 'Y', 'Y', 'DR', 'ทอง', '2018-05-07 10:51:25', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 10:51:25', NULL, 'b0ad3559-96df-4ecf-a65f-8932da1073ef');

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
('1eee0394-f557-4d42-8c3e-033d3727542d', '1/2 สลึง', '0.5S', 3, '2018-06-21 14:42:57', '2018-06-21 15:49:45', '(bath/4)/2'),
('1f5788e5-c167-423c-a139-87ea972ba6bc', '6 สลึง', '6S', 8, '2018-06-21 14:44:13', '2018-06-21 15:49:00', 'bath+(bath/2)'),
('28787316-48cb-4130-9731-a08acb46d434', '3 สลึง', '3S', 6, '2018-06-21 14:43:40', '2018-06-21 15:49:28', '(bath/4)*3'),
('6dff95f8-6436-4616-a7f2-f1dce527d9c0', '1 สลึง', '1S', 4, '2018-06-21 14:43:13', '2018-06-21 15:49:56', 'bath/4'),
('915c0569-a2d8-41dd-99c6-cc58b32618d4', '2 สลึง', '2S', 5, '2018-06-21 14:43:27', '2018-06-21 15:50:05', 'bath/2'),
('e5c56205-ed96-499b-ab20-139df9ab4b46', '1 กรัม', '1G', 2, '2018-06-21 14:42:36', '2018-06-23 07:17:39', 'bath/15.16'),
('f0be53d1-4763-4613-b579-daff980f1e82', '0.6กรัม', '0.6G', 1, '2018-06-21 14:42:18', '2018-06-23 07:19:26', '(bath/15.16)*0.6');

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
('4e7830ad-42aa-4e12-b766-99b1023518d0', 'IV', 'IV', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('50133268-abe9-443e-88e7-3a121eb5e3e8', 'GR', 'GR', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('58cf687d-9a1d-4373-86af-e6835fb5a5b6', 'RF', 'RF', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('63d8a4ff-712e-4c16-948c-313250fe359d', 'WD', 'WD', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('6c45b69b-b09b-4508-aac7-6e9a727e53a1', 'PW', 'PW', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:19', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:19', NULL, 'Y'),
('7a1271ea-ef36-4d88-b3a2-6bcbf75afea5', 'DP', 'DP', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('7c36fb84-9b7a-4465-a8a7-ac709c780392', 'AR', 'AR', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('7c6e6873-d96e-4310-8e3e-4f535350f174', 'AR', 'AR', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:27', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:27', NULL, 'Y'),
('80bb28fa-e322-4abd-99e3-262fcc93e194', 'WD', 'WD', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('982cfaf6-f2b0-44c0-b230-3af7ba1d5947', 'PW', 'PW', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
('986825db-df9d-4188-b9c3-388bea4834fb', 'AP', 'AP', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:27', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:27', NULL, 'Y'),
('b9fca12c-68c4-4f9f-9c80-af857396c201', 'RF', 'RF', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:28', NULL, 'Y'),
('d01aab6f-f8bb-486a-99dc-9ffcc668befd', 'SO', 'SO', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', '2018-06-23 07:54:19', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:54:19', NULL, 'Y'),
('e57daebe-a614-4812-85b2-13fea1c0cfb2', 'GR', 'GR', NULL, 1, 0, 5, NULL, NULL, '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', '2018-06-23 07:20:44', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-23 07:20:44', NULL, 'Y'),
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

--
-- Dumping data for table `smartcards`
--

INSERT INTO `smartcards` (`id`, `ip`, `title`, `firstname`, `lastname`, `gender`, `cardno`, `full_address`, `created`, `description`, `houseno`, `moo`, `sub_district`, `district`, `province`, `birthday`, `address_line`) VALUES
('632eccdc-8ec6-4792-97d9-106567bbe4a8', '58.8.96.221', 'นาย', 'สาคร', 'แสงแก้ว', 'M', '1570800042933', '63/1_หมู่ที่4____ตำบลหนองหาร_อำเภอสันทราย_จังหวัดเชียงใหม่', '2018-05-14 04:43:56', NULL, NULL, NULL, 'หนองหาร', 'สันทราย', 'เชียงใหม่', '15/03/2532', ' 63/1 หมู่ที่4'),
('995c11a5-ffe1-43d2-98f7-653c33ca58ab', '183.89.185.216', 'นาย', 'สาคร', 'แสงแก้ว', 'M', '1570800042933', '63/1_หมู่ที่4____ตำบลหนองหาร_อำเภอสันทราย_จังหวัดเชียงใหม่', '2018-05-07 12:20:42', NULL, NULL, NULL, 'หนองหาร', 'สันทราย', 'เชียงใหม่', '15/03/2532', ' 63/1 หมู่ที่4');

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
('5ee15060-3076-45c1-bdcd-eefdd0446aa0', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.216', 'Y', '2018-05-06 08:51:09', '2018-05-06 08:53:51', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('601f1c46-3817-4238-b0e7-2c16dea5da08', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '124.122.121.136', 'Y', '2018-06-15 16:30:31', '2018-06-15 16:30:31', 'Bangkok Thailand[ 13.7333,100.5333]'),
('6b1219f8-8c05-4ea9-a89e-f7ae47e8a24a', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '183.89.185.216', 'N', '2018-05-07 08:02:23', '2018-05-07 08:20:51', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('6d6e498d-59b2-4026-9000-1ef8e320a308', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '183.89.185.216', 'Y', '2018-05-06 09:25:55', '2018-05-06 09:39:42', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('71232183-2313-432d-a139-75b074ef701f', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.184.158', 'Y', '2018-06-23 07:53:53', '2018-06-23 07:53:53', ' Thailand[ 13.75,100.4667]'),
('796f884e-ac4c-4de0-bc64-3e302cf11029', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.144.186', 'Y', '2018-06-07 08:41:31', '2018-06-07 08:41:31', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
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
('e1ad2708-1263-40eb-a7d6-f6ab9226e086', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '180.183.144.186', 'N', '2018-06-05 06:16:21', '2018-06-05 06:19:19', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('e4f2c453-3947-4b43-a2df-8016a6883d74', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '183.89.185.76', 'Y', '2018-05-31 06:17:25', '2018-06-01 15:29:02', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('e5312c20-e2ba-4148-b001-75b02320644a', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '171.97.246.207', 'Y', '2018-06-11 15:57:54', '2018-06-11 15:57:54', 'Ban Prang Thailand[ 14.6833,102.0333]'),
('e6fb63e8-692b-4a2e-8e2c-4112d7604c82', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '110.169.177.215', 'N', '2018-05-11 06:25:40', '2018-05-11 07:15:17', 'Bangkok Thailand[ 13.7083,100.4562]'),
('e8d12324-b800-4ba2-9a13-c35d3cb1b79f', '34d512fa-3b93-4b09-b342-64696d9da155', '183.89.185.216', 'N', '2018-05-07 08:07:07', '2018-05-07 10:27:48', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
('e998aae4-e34c-4437-945f-977a37903f55', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '180.183.158.131', 'Y', '2018-06-20 07:45:55', '2018-06-20 07:45:55', 'Chiang Mai Thailand[ 18.7904,98.9847]'),
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
('1a4764f6-3edc-4ca8-a7a4-7a266f97a9a2', 'นางสาว', 'พพ', 'รร', '0845221478', '1522365478922', 'faii@gmail.com', '2018-05-01', '2018-05-01', '$2y$10$PJhT1QkldQnisjOSIR8T0evRUQZf17MNDEeQty2bQTif/Db4coEmq', 'faii', 'N', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '', '2018-05-11 07:18:19', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-06-07 08:42:01', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '', '0', '0'),
('34d512fa-3b93-4b09-b342-64696d9da155', 'นาย', 'กานต์', 'ทองยิ้ม', '0861307500', '1179900169031', 'zzz@zz.zzz', '1446-12-04', '1475-04-13', '$2y$10$7Nh8Xtg5rTKAEfqO71bnQ.hKOQpZFQYVwUBHUMzw7q7U5HdUNMh/i', 'zeropro', 'Y', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '', '2018-05-01 05:54:31', '6d2bed90-f9c1-4cc1-9317-63ef62282a73', '2018-05-07 10:31:45', '34d512fa-3b93-4b09-b342-64696d9da155', '', '0', '0'),
('6d2bed90-f9c1-4cc1-9317-63ef62282a73', 'นาย', 'admin', 'admin', '-', '-', 'admin@admin.com', '2018-03-19', '2018-03-18', '$2y$10$5TYcqRFG9EIuCFdJkNL/ceYUImWTb0Tmk2qGq1EVhnkhLTHZCJIte', 'admin', 'Y', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', '-', '2018-03-14 09:03:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-03-14 09:03:28', NULL, '', '371a39b9-f692-49dd-9d78-41f388e319cc', '6f19d6f9-bfe9-4e57-b626-420d139bb376'),
('7dadadf5-f932-4b2d-b30e-f42d3fd30e64', 'นาย', 'สาคร', 'แสงแก้ว', '0834776988', '1570800042933', 'info@fdtech.co.th', '1989-03-15', '2018-05-01', '$2y$10$zZT5hNtLduxW.7GAlpNb6OK6crfaRBcoHV8ZJ84cW0WDnnQ7pUv8K', 'สาคร', 'Y', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', 'พนักงานขายกระสัง ', '2018-05-07 08:19:58', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-07 08:19:58', NULL, '', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf'),
('8d6caebd-5c92-4e4b-892a-7a10185fa7e2', 'นางสาว', 'กขค', 'คขกก', '0825663699', '1500922531456', 'finnovationsoft@gmail.com', '2010-02-17', '2018-05-01', '$2y$10$CZvE2owVl.DW4sJ9le4KhuOrsghoUr/YJr7D8SJ/mZ5XBK3gJxHGi', 'กขค', 'Y', '3205784d-e1a2-4fdc-b3aa-0344f7bc5336', '', '2018-05-04 11:15:46', 'c6b62d33-c7f6-45ed-bfd2-b6805d392117', '2018-05-04 11:22:58', '8d6caebd-5c92-4e4b-892a-7a10185fa7e2', '', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874'),
('a14f2b7c-d7c6-41a2-9766-43c78b36f681', 'นาย', 'ธานินทร์', 'ทัศไนยเธียรกุล', '0813096001', '3101800161330', '', '1980-10-23', '1475-04-22', '$2y$10$H5H.bD5/ZMSFn2URQnoRdeuMcDGhpMP0qk.oqrxxyROgU7SVFHhxO', 'Thanin', 'Y', 'e09401cd-76c4-4742-90b5-e2ad7d8dbfc3', 'เจ้าของ', '2018-04-21 08:08:03', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-22 14:39:52', 'a14f2b7c-d7c6-41a2-9766-43c78b36f681', '', '0', '0'),
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
  `ispawn` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `org_id`, `branch_id`, `isactive`, `description`, `created`, `createdby`, `modified`, `modifiedby`, `ismain`, `issales`, `ispurchase`, `ispawn`) VALUES
('4d82be9b-563d-4e55-8bca-3828c81776df', 'ประโคนชัย', '371a39b9-f692-49dd-9d78-41f388e319cc', 'a83e80d3-a1aa-435b-b786-afde2a246874', 'Y', '', '2018-04-21 08:21:47', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-04-21 08:21:47', NULL, 'Y', 'Y', 'Y', 'N'),
('a8206bd4-3c5c-470c-a982-642ae740d76d', 'กระสัง', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '', '2018-04-21 08:22:08', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 10:40:40', NULL, 'N', 'Y', 'Y', 'N'),
('ddaf1c97-1813-4016-9c14-77cb716e1bde', 'คลังจำนำ', '371a39b9-f692-49dd-9d78-41f388e319cc', '9e55ef50-def4-4775-8583-ec2218c66baf', 'Y', '', '2018-05-07 11:51:01', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-07 11:51:01', NULL, 'N', 'N', 'N', 'N');

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
('0b9ed4cb-5c27-44ff-8d82-358c310fe887', '60.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:31', '2018-05-27 09:43:31', NULL, NULL, '60.78', NULL),
('0fec1065-6198-4a62-81c5-e7a70b13f71f', '2.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:05', '2018-05-27 09:43:05', NULL, NULL, '2.78', NULL),
('2792c4ad-471a-41ea-8cff-60b102e07203', '45.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:22', '2018-05-27 09:43:22', NULL, NULL, '45.58', NULL),
('45d6f56c-e25f-4d57-bf10-9cc840d036f2', '0.60g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:40:39', '2018-06-23 07:12:28', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '0.60', 'f0be53d1-4763-4613-b579-daff980f1e82'),
('4d761f82-9857-47a6-a1cc-6ecb7803dd6e', '75.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:40', '2018-05-27 09:43:40', NULL, NULL, '75.58', NULL),
('5010c746-e7f7-4cb4-83f7-c3ed283e75a4', '11.38g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:25', '2018-05-27 09:42:25', NULL, NULL, '11.38', NULL),
('7d9b9e3f-0e58-47d9-8fd5-1c8a467cba78', '30.38g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:43:14', '2018-05-27 09:43:14', NULL, NULL, '30.38', NULL),
('871ce44e-1f55-4330-920f-037d0a9ed8d3', '1.00g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:40:53', '2018-06-23 07:12:35', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '1.00', 'e5c56205-ed96-499b-ab20-139df9ab4b46'),
('8748888c-b43e-4f2a-8553-29107d29767b', '11.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:37', '2018-05-27 09:42:37', NULL, NULL, '11.58', NULL),
('8c3f7caf-9e81-46dd-a025-0c7e563bc875', '3.78g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:40', '2018-06-09 09:26:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '3.78', NULL),
('aedd6d9f-87e5-422f-9eaf-29899811740b', '1.90g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:27', '2018-05-27 09:41:27', NULL, NULL, '1.90', NULL),
('cc181398-690f-49ed-9834-6824ba2300ae', '7.58g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:12', '2018-06-23 07:13:23', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '7.58', '915c0569-a2d8-41dd-99c6-cc58b32618d4'),
('d1aaaa90-e6e1-41e2-985b-2a5147f36d82', '15.16g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:42:50', '2018-06-23 07:13:41', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '15.16', '0fe701c1-0c69-4f6a-b8bd-e6b265aeff03'),
('dbe1bb51-179c-43b8-b0a5-36e9d56f6e8f', '3.79g', 'Y', '', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', '2018-05-27 09:41:51', '2018-06-23 07:13:09', 'b0ad3559-96df-4ecf-a65f-8932da1073ef', NULL, '3.79', '6dff95f8-6436-4616-a7f2-f1dce527d9c0'),
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
