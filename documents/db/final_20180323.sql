-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: gold
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `controller_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES ('0060f68a-8aaf-4ac4-8851-1f29ad0834d3','branches-index','index','c6f7aa87-e575-4afe-9d67-ad2e50246247',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('089bfd10-3706-40fd-95a9-f94d6986babd','users-delete','delete','44b087ef-8aa5-43b2-86a6-b41765da45ea',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('0a623bf2-9517-47ba-a3f1-536665e1c334','sequent_nmbers-view','view','771b13a6-fdb1-4837-9092-d624352a2875',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('0a978e43-4c15-47de-b1b2-380ede4a3a49','sequent_nmbers-edit','edit','771b13a6-fdb1-4837-9092-d624352a2875',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('0c31bda6-a544-499b-989f-a8ef1e17e381','wh_products-view','view','ed5dae88-44aa-42bd-bb4e-b10ad8b94b46',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('0cd213df-3d00-4c0a-b746-bf5a62e771c0','home-index','index','0a9f76f1-27b5-4b8d-a61f-df0f15e59646','','2018-02-20 06:51:35','','2018-02-20 06:51:35',''),('13b92d9f-27d7-4023-8d9a-b8e176e8585a','bank_accounts-edit','edit','f4370d1a-1b27-4599-ae9a-713d368db073',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('165fd8d9-3e5c-4301-9608-40a4c3e5da0b','order_line-add','add','3d2b1142-082b-49d5-976d-f66f1263c3c7',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('18959738-8b40-44ed-9fc7-289ba2b406c9','invoices-view','view','ddc2cdb3-5d62-45dd-b7fb-c6133b901303',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('19147938-1594-4207-aef5-29b0d0d63b66','system_usages-add','add','b6785b8c-078c-4e4e-a15c-bd0d3bd18f82',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('1a9ea34b-da8e-44c5-ad15-70b0daa244ac','actions-index','index','650da8b7-46c1-4a0b-add5-6b1675c43b11',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1aaeecda-7082-4554-9ac8-f590f93f8b95','images-index','index','b603aa0f-60ec-4187-b6d0-08bb78a41b22',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1acd38be-8dcb-45f8-ad82-0903631900f1','actions-add','add','650da8b7-46c1-4a0b-add5-6b1675c43b11',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('1b6d8024-5712-4078-97cb-b86c7e523a59','invoice_lines-index','index','278455b7-5bf0-4238-b4c1-a856693585ac',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1dad9db2-1a9e-4520-b874-79c78ea58308','saving_transactions-index','index','41bb028d-95a8-48d6-a993-d41982a044d9',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1e69121c-47b2-4567-97f9-b2c1b31e9e70','orgs-index','index','ece34c07-5ae4-4b74-b27d-1bfc67404a7a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1e99211d-265e-4822-8006-b034c36ec02e','saving_accounts-delete','delete','8e8dc480-0d1c-4f41-8426-6882c26c228e',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1eaf84c2-2d82-428c-ab0c-cd118cdc9579','payments-edit','edit','3e2c9013-941d-4848-ba1f-074bf279c18f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('1ee38ccf-44ac-42cc-ae45-3beef54268a7','users-view','view','44b087ef-8aa5-43b2-86a6-b41765da45ea',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('20f4bebf-5c04-44b5-9e27-f15a7e344311','product_images-add','add','e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('210c813b-c607-4242-83a0-b2be186ebd7f','roles-view','view','b81c7fff-9c61-4760-a64a-c57bd96a7882',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('22253677-dbf0-4db4-a4e8-9f01ee49cb25','product_images-view','view','e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('263250e3-e046-4580-9299-9ac9b3e69aaf','warehouses-edit','edit','3ac6c63c-855f-4d35-ade2-20c646fd095b',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('268e8b71-d97e-49b8-a762-39b06368a14e','images-edit','edit','b603aa0f-60ec-4187-b6d0-08bb78a41b22',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('272f8adc-b092-46a1-8100-20fb74a97219','orgs-delete','delete','ece34c07-5ae4-4b74-b27d-1bfc67404a7a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('28014084-f200-4b24-86a2-de6f1a87f38b','bpartners-view','view','02ccdd7a-019c-4e70-a352-1ed28e66637d',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('28cd6cd8-06c6-47de-894e-c47dfeb23b48','system_usages-edit','edit','b6785b8c-078c-4e4e-a15c-bd0d3bd18f82',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('2b3a1b88-97f0-49ac-a050-f121876869c8','login-index','index','4d986218-aea3-49b2-a744-3cec4691c43d','','2018-02-20 06:49:12','','2018-02-20 06:49:12',''),('2c10fa21-c1fd-430b-bd5a-38f0881b4614','bank_accounts-add','add','f4370d1a-1b27-4599-ae9a-713d368db073',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('2fa30fee-61ea-4ae1-bd06-b603730a6885','system_usages-delete','delete','b6785b8c-078c-4e4e-a15c-bd0d3bd18f82',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('310c6dbb-6c62-4531-bb1a-41e639f60448','users-edit','edit','44b087ef-8aa5-43b2-86a6-b41765da45ea',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('31199fea-51ff-4093-9034-e1b491ee36f8','warehouses-view','view','3ac6c63c-855f-4d35-ade2-20c646fd095b',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('3324bc8d-a99f-4fb6-b73e-151473198595','serial_numbers-delete','delete','9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('365791c1-6313-4028-84d5-f6c7bbf55bbc','login-logout','logout','4d986218-aea3-49b2-a744-3cec4691c43d','','2018-02-20 06:49:35','','2018-02-20 06:49:35',''),('368e0db2-66a5-4f14-959d-9537504ca79d','product_images-delete','delete','e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('37cb30a3-b57e-43b6-8a3b-e88502b9c840','bpartners-edit','edit','02ccdd7a-019c-4e70-a352-1ed28e66637d',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('3827a831-5488-4597-8536-e75104c2396d','serial_numbers-view','view','9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('383622c8-d6ac-4934-8b9b-d0a012be179c','banks-delete','delete','24f90708-e61c-4184-b8aa-6a230907ba41',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('395db1e2-2a6b-47fe-9888-79d052f2f78f','bank_accounts-view','view','f4370d1a-1b27-4599-ae9a-713d368db073',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('3bfc749a-0b34-4a92-acec-b8331f0e210a','sequent_nmbers-index','index','771b13a6-fdb1-4837-9092-d624352a2875',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('3dd2dcbe-8c5f-476e-a1cd-7cdba1ec4ead','wh_products-delete','delete','ed5dae88-44aa-42bd-bb4e-b10ad8b94b46',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('42285ff7-9922-48d6-bec1-ce4467416ea6','roles-delete','delete','b81c7fff-9c61-4760-a64a-c57bd96a7882',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('4229bec5-f7ab-4f33-9b07-3cfce62a46cb','controllers-view','view','8cffcbc7-3aa4-44ac-a089-504827411992',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('42b1123a-f0c0-4351-a35b-cdd0fd9764b8','products-edit','edit','79197447-c3c2-4162-a4e1-f81e9386a749',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('47a6efb9-00dc-46ef-a293-ea209998cebf','role_accesses-edit','edit','76045876-2061-43ee-b47c-94e1c789e19a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('48e57212-9886-4cc0-998b-84fd1a6a0e22','orders-add','add','4ca290b4-dec5-4a21-8c1d-9341e4a71670',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('499117f1-388a-4986-977e-240e84ddfa3f','images-view','view','b603aa0f-60ec-4187-b6d0-08bb78a41b22',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('49fcaede-e452-450d-8781-cdbe2eb13836','warehouses-add','add','3ac6c63c-855f-4d35-ade2-20c646fd095b',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('4bcbc11d-0ff7-4b71-910a-9ea8fe85e67c','invoices-add','add','ddc2cdb3-5d62-45dd-b7fb-c6133b901303',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('4d7f7ee4-3311-4e3e-8653-243d278151cd','serial_numbers-edit','edit','9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('4eb4e924-a85c-4ecc-a639-304d1b26e65d','users-add','add','44b087ef-8aa5-43b2-86a6-b41765da45ea',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('4f590627-b763-4696-a6ea-adfd236585fa','payment_lines-view','view','19bf4266-69af-4c75-a542-cf05b9b311ed',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('518e91db-35da-4118-bd27-4670f886bf46','wh_products-index','index','ed5dae88-44aa-42bd-bb4e-b10ad8b94b46',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('55712a15-826f-4d08-af31-94de946a0451','roles-index','index','b81c7fff-9c61-4760-a64a-c57bd96a7882',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('56369e22-c9e7-46b7-baa7-a23338dc6551','controllers-edit','edit','8cffcbc7-3aa4-44ac-a089-504827411992',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('571432a8-0fbb-4bcf-b8ba-7f4d4998c864','payment_lines-edit','edit','19bf4266-69af-4c75-a542-cf05b9b311ed',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('576a63e6-4f9c-46d7-abc7-97f0dfb1634d','payments-add','add','3e2c9013-941d-4848-ba1f-074bf279c18f',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('592b10fe-2110-4cb8-bca7-d0e1f1bf0149','products-add','add','79197447-c3c2-4162-a4e1-f81e9386a749',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('59e8ff71-6b0d-4b5d-b257-d8fbd88a0d54','banks-index','index','24f90708-e61c-4184-b8aa-6a230907ba41',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('5a950057-6c85-4b99-a6b4-3ed76d48f2b4','saving_transactions-edit','edit','41bb028d-95a8-48d6-a993-d41982a044d9',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('5e4ae09f-beca-4229-bd56-f053e2a9bc70','users-index','index','44b087ef-8aa5-43b2-86a6-b41765da45ea',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('5f099f25-69b6-41a9-ad14-0812860a47f7','actions-delete','delete','650da8b7-46c1-4a0b-add5-6b1675c43b11',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('605442d9-2134-4ff9-b901-28b9ae581053','banks-edit','edit','24f90708-e61c-4184-b8aa-6a230907ba41',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('6086a957-3ee3-4720-a0c9-38287c6075c5','bpartners-delete','delete','02ccdd7a-019c-4e70-a352-1ed28e66637d',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('65edd09e-c611-4f6e-8750-3ad23eaf688a','bank_accounts-index','index','f4370d1a-1b27-4599-ae9a-713d368db073',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('665c0580-3f54-42fa-ad55-7da779b0107a','order_line-index','index','3d2b1142-082b-49d5-976d-f66f1263c3c7',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('689ca1da-ebea-494b-98a1-1a819903fde9','products-view','view','79197447-c3c2-4162-a4e1-f81e9386a749',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('691d2bcd-378d-46fc-9cce-649e44b37acf','saving_accounts-view','view','8e8dc480-0d1c-4f41-8426-6882c26c228e',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('6b2c6a9f-58a2-473e-b431-8d3f2efb32cb','products-index','index','79197447-c3c2-4162-a4e1-f81e9386a749',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('6f82d8d1-5046-4bfb-8bae-853fb8487bbc','actions-edit','edit','650da8b7-46c1-4a0b-add5-6b1675c43b11',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('74b0584d-4276-45d8-829c-70776ab33a4f','saving_accounts-add','add','8e8dc480-0d1c-4f41-8426-6882c26c228e',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('74f94222-3537-4320-a347-857c1feb24d4','payments-index','index','3e2c9013-941d-4848-ba1f-074bf279c18f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('7d9ead39-5c5c-4633-93b3-544172f751f9','addresses-edit','edit','dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('7eaff946-7b78-4faf-864b-4f50efde10c0','order_line-view','view','3d2b1142-082b-49d5-976d-f66f1263c3c7',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('804e5330-b692-4f13-b132-1881bdc3ba64','products-delete','delete','79197447-c3c2-4162-a4e1-f81e9386a749',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('8437e1f4-63dc-440c-b856-4d1e9f3c2435','saving_transactions-delete','delete','41bb028d-95a8-48d6-a993-d41982a044d9',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('84c5bc86-8d6f-4a6f-9bd4-3bf98c618a4b','saving_accounts-index','index','8e8dc480-0d1c-4f41-8426-6882c26c228e',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('85348380-adda-4288-ab05-899daaae908b','images-add','add','b603aa0f-60ec-4187-b6d0-08bb78a41b22',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('8aaf8ec9-0ca5-4eb7-aa99-779c7865db00','payment_lines-index','index','19bf4266-69af-4c75-a542-cf05b9b311ed',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('9352fa28-88c6-40fb-905a-58939086e257','invoices-index','index','ddc2cdb3-5d62-45dd-b7fb-c6133b901303',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('945605ca-19f9-45d1-a0c8-735243a44d38','product_images-edit','edit','e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('948e2bf3-ff49-4d06-bb23-92bcea3cb5da','role_accesses-index','index','76045876-2061-43ee-b47c-94e1c789e19a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('94e6a985-d9b4-4b60-b3bb-1a8a1760aaa2','orgs-view','view','ece34c07-5ae4-4b74-b27d-1bfc67404a7a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('960a0402-07f4-4c43-811d-e7af9284ddfa','saving_transactions-add','add','41bb028d-95a8-48d6-a993-d41982a044d9',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('9742de93-52c5-4af6-8d8f-f82b43d89ba6','orders-edit','edit','4ca290b4-dec5-4a21-8c1d-9341e4a71670',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('9bbbdecd-628b-4a3d-96bc-56b2d5f6995c','wh_products-edit','edit','ed5dae88-44aa-42bd-bb4e-b10ad8b94b46',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('9c21cd60-a4fc-4907-b2f1-3ef0997e6b77','bpartners-add','add','02ccdd7a-019c-4e70-a352-1ed28e66637d',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('9caa53e2-f3ff-48e6-b44e-ed9ef5644b72','invoice_lines-edit','edit','278455b7-5bf0-4238-b4c1-a856693585ac',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('9cfa5966-b544-4d91-bff3-4d4f8d63cb30','orgs-edit','edit','ece34c07-5ae4-4b74-b27d-1bfc67404a7a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('9d334504-0ff0-4191-a552-feaace318f28','saving_accounts-edit','edit','8e8dc480-0d1c-4f41-8426-6882c26c228e',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('a0aba001-f604-4ff7-9147-70812752b77a','sequent_nmbers-add','add','771b13a6-fdb1-4837-9092-d624352a2875',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('a22ceea6-88b3-41f3-ba6c-2b514d20e217','payment_lines-add','add','19bf4266-69af-4c75-a542-cf05b9b311ed',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('a46bf3be-a18e-4e6c-bb27-cba4cabc81f2','banks-view','view','24f90708-e61c-4184-b8aa-6a230907ba41',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('a522eb09-4bf4-471e-8532-2b9276491749','home-add','add','0a9f76f1-27b5-4b8d-a61f-df0f15e59646',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('a5f307e4-1996-4e6e-b474-86b379e54a13','bpartners-index','index','02ccdd7a-019c-4e70-a352-1ed28e66637d',NULL,'2018-02-19 07:52:17','system','2018-02-19 07:52:17',NULL),('a6f6307e-7019-4e29-b693-42aa7778f4e0','addresses-delete','delete','dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('a8b6468d-3b79-47bd-8f2b-4ec63a0489d7','bank_accounts-delete','delete','f4370d1a-1b27-4599-ae9a-713d368db073',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('a988a6fd-2786-4c25-b721-8b84380314bc','role_accesses-add','add','76045876-2061-43ee-b47c-94e1c789e19a',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('ac28025f-2c56-480c-816d-3c31004dd016','warehouses-index','index','3ac6c63c-855f-4d35-ade2-20c646fd095b',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('ad0de284-9c1f-4afb-af14-f9c5a8e866c7','controllers-add','add','8cffcbc7-3aa4-44ac-a089-504827411992',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('ae142032-4b2b-4c3b-9d07-cc5891262dee','product_images-index','index','e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('b347f3c3-20c3-4f18-90c1-7cc34e1f4ade','branches-delete','delete','c6f7aa87-e575-4afe-9d67-ad2e50246247',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('b568a18f-8385-430b-b532-8315e8e7bb4f','order_line-edit','edit','3d2b1142-082b-49d5-976d-f66f1263c3c7',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('b56e06ef-b2b5-4589-b6c1-d2cd3baeccc8','payments-view','view','3e2c9013-941d-4848-ba1f-074bf279c18f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('b65a1d21-89a7-411e-97b0-484ea81a749a','orders-view','view','4ca290b4-dec5-4a21-8c1d-9341e4a71670',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('b6db71f2-87bc-4550-acd2-f1ac92d7c5d9','system_usages-view','view','b6785b8c-078c-4e4e-a15c-bd0d3bd18f82',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('b72a22bc-e177-4b07-afca-0c84644d81ba','warehouses-delete','delete','3ac6c63c-855f-4d35-ade2-20c646fd095b',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('bc7321ca-57d4-4188-81ef-25ec61161257','controllers-index','index','8cffcbc7-3aa4-44ac-a089-504827411992',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('bee64d11-a34c-44e2-a542-d3eee78f6db7','images-delete','delete','b603aa0f-60ec-4187-b6d0-08bb78a41b22',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('bf1fa564-9527-499e-880d-7b5fa14ccdf0','sequent_nmbers-delete','delete','771b13a6-fdb1-4837-9092-d624352a2875',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('c2643c7c-cd16-4355-b122-441181f5851b','branches-view','view','c6f7aa87-e575-4afe-9d67-ad2e50246247',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('c31061c0-daf6-473d-b061-029e829396f6','actions-view','view','650da8b7-46c1-4a0b-add5-6b1675c43b11',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('c4cd3b72-94fd-4b72-9f21-6eff49bbc384','branches-add','add','c6f7aa87-e575-4afe-9d67-ad2e50246247',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('c582501b-6069-4462-a188-be9ecf07342c','addresses-add','add','dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('c634c46f-2ca8-4616-99e9-dc09ca390491','orders-delete','delete','4ca290b4-dec5-4a21-8c1d-9341e4a71670',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('cac0f0b7-80e5-4e0e-9d40-67b04c09ac52','system_usages-index','index','b6785b8c-078c-4e4e-a15c-bd0d3bd18f82',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('cd1b4962-c3ae-4033-babc-a7b750d8dd63','saving_transactions-view','view','41bb028d-95a8-48d6-a993-d41982a044d9',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('ce0ffb95-1e39-4bd4-9268-3f5dea1990db','role_accesses-delete','delete','76045876-2061-43ee-b47c-94e1c789e19a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('cecea47a-ce7f-4025-8bbb-3f651a9b3fbc','payments-delete','delete','3e2c9013-941d-4848-ba1f-074bf279c18f',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('d3e22c6f-15b7-4e29-8512-c6775b6343e8','addresses-view','view','dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('d73d0cc7-13a9-4187-90ad-ba377fee0bdb','orders-index','index','4ca290b4-dec5-4a21-8c1d-9341e4a71670',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('d7801bfc-a77c-43f3-aa5f-f4fe685f1da2','invoice_lines-add','add','278455b7-5bf0-4238-b4c1-a856693585ac',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('d7bc572c-4ec5-4450-af5b-39ecfe1d726f','orgs-add','add','ece34c07-5ae4-4b74-b27d-1bfc67404a7a',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('d91333c0-3dd0-415f-bb18-06482c0c1094','branches-edit','edit','c6f7aa87-e575-4afe-9d67-ad2e50246247',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('d9faff4b-65d2-44e8-9da2-8625927fb870','controllers-delete','delete','8cffcbc7-3aa4-44ac-a089-504827411992',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('ddb9e810-dadf-4541-a569-845c1ff4a3ac','invoice_lines-view','view','278455b7-5bf0-4238-b4c1-a856693585ac',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('de366403-b454-4b0b-b96b-ff0aaa351251','banks-add','add','24f90708-e61c-4184-b8aa-6a230907ba41',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('e09c8bc5-3ca8-4a10-a2fb-8f0a96137222','role_accesses-view','view','76045876-2061-43ee-b47c-94e1c789e19a',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('e1903505-1a36-402a-8560-463a86f0f0d0','payment_lines-delete','delete','19bf4266-69af-4c75-a542-cf05b9b311ed',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('e26e5f95-19f2-411d-b4b6-b5d7cbcdf1c1','invoices-delete','delete','ddc2cdb3-5d62-45dd-b7fb-c6133b901303',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('e36765e2-1642-4793-ba7e-83fd96d0d1c7','invoices-edit','edit','ddc2cdb3-5d62-45dd-b7fb-c6133b901303',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('e65cefee-c655-42b4-8429-16f9c8d91c2f','wh_products-add','add','ed5dae88-44aa-42bd-bb4e-b10ad8b94b46',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('ea409acc-3b37-4ec6-84c4-63f90f460d93','serial_numbers-index','index','9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('ec5bade5-ebdf-4962-b4f5-2cd1f3eeedf0','login-add','add','4d986218-aea3-49b2-a744-3cec4691c43d',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('f3a6ea56-0690-449f-b72a-b4bf54bdd6d5','addresses-index','index','dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('f5013152-aa4e-40f2-9d22-8872b7818bae','invoice_lines-delete','delete','278455b7-5bf0-4238-b4c1-a856693585ac',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('f78a01df-dc87-4943-9c3b-f059ff78f1e7','serial_numbers-add','add','9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('f7b28d1a-6056-4077-873b-afa244b643d7','roles-add','add','b81c7fff-9c61-4760-a64a-c57bd96a7882',NULL,'2018-02-20 07:28:15','system','2018-02-20 07:28:15',NULL),('f9ec2a1d-92ee-4c8c-9e0c-f27eb2e301d2','order_line-delete','delete','3d2b1142-082b-49d5-976d-f66f1263c3c7',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL),('fc701433-0289-4ec0-9d14-c75b383d8b25','roles-edit','edit','b81c7fff-9c61-4760-a64a-c57bd96a7882',NULL,'2018-02-19 07:52:18','system','2018-02-19 07:52:18',NULL);
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` char(36) NOT NULL,
  `address_line` varchar(255) DEFAULT NULL,
  `houseno` varchar(10) NOT NULL,
  `villageno` varchar(10) NOT NULL,
  `villagename` varchar(255) DEFAULT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province_id` char(36) NOT NULL,
  `postalcode` char(5) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES ('32f9adf3-db51-4cf4-bb9b-46e0c8c47473','62 M.10','123','1','-','ป่าไผ่','ลี้','39','51110',NULL,'2018-03-10 06:00:35','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-10 06:00:35',NULL),('586b27ad-15ba-494c-aa8d-a44804c69e21','x','x','x','x','ป่าไผ่','ลี้','ลำพูน','51110',NULL,'2018-03-13 13:41:15',NULL,'2018-03-13 13:41:15',NULL),('ad856a99-280b-4a3a-8a10-84490560527e','62 M.10','123','1','-','ป่าไผ่','ลี้','ลำพูน','51110',NULL,'2018-03-10 06:00:35',NULL,'2018-03-10 06:00:35',NULL),('ee04b010-d205-4ea0-81d0-2f4887cfcf40','123','123','1','-','ป่าไผ่','ลี้','ลำพูน','51110',NULL,'2018-03-10 06:02:51',NULL,'2018-03-10 06:02:51',NULL);
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_accounts`
--

DROP TABLE IF EXISTS `bank_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_accounts` (
  `id` char(36) NOT NULL,
  `total_balance` decimal(10,4) NOT NULL DEFAULT '0.0000',
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
  `type` varchar(50) DEFAULT 'BACC',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_accounts`
--

LOCK TABLES `bank_accounts` WRITE;
/*!40000 ALTER TABLE `bank_accounts` DISABLE KEYS */;
INSERT INTO `bank_accounts` VALUES ('978d4840-c160-430a-9f5f-8f75d1b4a507',21500.0000,'เงินสดหน้าร้าน',NULL,NULL,NULL,NULL,'371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376','','2018-03-23 04:08:48','6d2bed90-f9c1-4cc1-9317-63ef62282a73','2018-03-23 08:08:55',NULL,'CASH');
/*!40000 ALTER TABLE `bank_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `iscash` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` VALUES ('16424b78-288b-4d71-a62a-43505734b961','KBANK','ธนาคารกสิกรไทย',NULL,NULL,'2018-02-19 11:48:27','0','2018-03-22 13:32:05','6d2bed90-f9c1-4cc1-9317-63ef62282a73','Y');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bpartners`
--

DROP TABLE IF EXISTS `bpartners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `address_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bpartners`
--

LOCK TABLES `bpartners` WRITE;
/*!40000 ALTER TABLE `bpartners` DISABLE KEYS */;
INSERT INTO `bpartners` VALUES ('0','0','ลูกค้าหน้าร้าน','','','','Y','Y',NULL,NULL,NULL,'2018-03-21 10:56:22','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL),('350b8cd2-a22f-434d-8449-e5230e4274e3',NULL,'นายกานต์ ทองยิ้ม','นาย','กานต์','ทองยิ้ม','Y','Y','1212121212121','2018-03-01','พุทธ','2018-03-06 08:13:54','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','0','0','053123456','0123456789','aaaa@aa.ccc','771cd5c1-2eed-4108-95d2-6777b5be3907'),('38e0089f-3272-4a74-aebd-685d51531118',NULL,'นายkorn xxxx','นาย','korn','xxxx','Y','Y','1231231398532','2018-03-11','พุทธ','2018-03-10 10:15:29','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','0','0','035512199','0898998888','admin@amctak.com','ff90222a-8540-4e95-9c23-be8de00561fd'),('38ff2c29-3f2e-4a56-a518-0b0b6a064135',NULL,'นายwer wer','นาย','wer','wer','Y','Y','9874563210123','2018-03-03',NULL,'2018-03-10 07:50:46','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'8c9c9b49-d488-4412-9920-b48bfca572a1'),('423e57d0-932b-4858-8d4f-b03c96dd46a0',NULL,'นายwer wer','นาย','wer','wer','Y','Y','9874563210123','3104-03-03',NULL,'2018-03-10 07:47:56','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'840829b4-a169-4c85-bc73-c072cc7445cf'),('79638622-a237-4b19-af30-ea108d164a3b',NULL,'นายaaa ssss','นาย','aaa','ssss','Y','Y','1234567890147','2018-03-01',NULL,'2018-03-09 07:24:14','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'62cdacd6-20ae-4eb0-80a1-a993a167a0a3'),('882f576f-7330-4e92-82d2-72ca31b928df',NULL,'นายs s','นาย','s','s','Y','Y','s',NULL,'s','2018-02-27 11:30:45','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,'935ab8e8-c2f7-4743-8950-96e1012a07a0','','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9','ss','ss','ss@dd.hj',''),('b91b9d79-121f-42f3-9a46-d90aaa6791b8',NULL,'นางสาวสมใจ ดีดี','นางสาว','สมใจ','ดีดี','Y','Y','0123456789000','2018-03-09',NULL,'2018-03-09 07:09:00','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'5a9e823a-9908-43e3-91f3-c9dbf4d8dc89'),('e8823870-45e0-463c-9c96-1d0e9ef2bb32',NULL,'นายaaa ssss','นาย','aaa','ssss','Y','Y','1234567890147','2018-03-01',NULL,'2018-03-09 07:23:25','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'dd1ea00f-56ef-4b98-b8f1-b70d0f6c05f0'),('eef34365-25f9-448d-81aa-b85b9edb0ce2',NULL,'นางสาวสมใจ ดีดี','นางสาว','สมใจ','ดีดี','Y','Y','0123456789000','2018-03-09',NULL,'2018-03-09 07:10:37','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'e0d78e79-bb0d-4d6b-af35-fe63b62e666a'),('fa91acf6-e0af-4445-a3d6-e08707418419',NULL,'นายสาคร แสงแก้ว','นาย','สาคร','แสงแก้ว','Y','Y','1234567890123',NULL,'พุทธ','2018-02-27 11:18:52','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','0','0','035123456','0321654789','sa@sa.sa',''),('fe9ca432-fa57-4d9b-9394-538faaa56744',NULL,'นายaaa ssss','นาย','aaa','ssss','Y','Y','1234567890147','2018-03-01',NULL,'2018-03-09 07:19:38','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'','458b4d94-42d5-4895-9069-0cb6c7895d75','8905de0c-8652-4b7c-9cf9-decf9055e9f9',NULL,NULL,NULL,'30635bc6-6dee-4893-9ff9-9d831a0f5492');
/*!40000 ALTER TABLE `bpartners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `address_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES ('0','*','-','Y','0',NULL,'2018-02-18 15:53:39','0',NULL,NULL,NULL),('6f19d6f9-bfe9-4e57-b626-420d139bb376','แม่โจ้','0001','Y','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-03-10 06:00:35','auth','2018-03-13 13:41:15',NULL,'586b27ad-15ba-494c-aa8d-a44804c69e21');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controllers`
--

DROP TABLE IF EXISTS `controllers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `controllers` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controllers`
--

LOCK TABLES `controllers` WRITE;
/*!40000 ALTER TABLE `controllers` DISABLE KEYS */;
INSERT INTO `controllers` VALUES ('02ccdd7a-019c-4e70-a352-1ed28e66637d','Controller-bpartners','bpartners',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('0a9f76f1-27b5-4b8d-a61f-df0f15e59646','Controller-home','home','','2018-02-20 06:51:17','uan','2018-02-20 06:51:17',''),('19bf4266-69af-4c75-a542-cf05b9b311ed','Controller-payment_lines','payment_lines',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('24f90708-e61c-4184-b8aa-6a230907ba41','Controller-banks','banks',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('278455b7-5bf0-4238-b4c1-a856693585ac','Controller-invoice_lines','invoice_lines',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('3ac6c63c-855f-4d35-ade2-20c646fd095b','Controller-warehouses','warehouses',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('3d2b1142-082b-49d5-976d-f66f1263c3c7','Controller-order_line','order_line',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('3e2c9013-941d-4848-ba1f-074bf279c18f','Controller-payments','payments',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('41bb028d-95a8-48d6-a993-d41982a044d9','Controller-saving_transactions','saving_transactions',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('44b087ef-8aa5-43b2-86a6-b41765da45ea','Controller-users','users',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('4ca290b4-dec5-4a21-8c1d-9341e4a71670','Controller-orders','orders',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('4d986218-aea3-49b2-a744-3cec4691c43d','Controller-login','login','','2018-02-20 06:48:15','uan','2018-02-20 06:48:15',''),('650da8b7-46c1-4a0b-add5-6b1675c43b11','Controller-actions','actions',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('76045876-2061-43ee-b47c-94e1c789e19a','Controller-role_accesses','role_accesses',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('771b13a6-fdb1-4837-9092-d624352a2875','Controller-sequent_nmbers','sequent_nmbers',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('79197447-c3c2-4162-a4e1-f81e9386a749','Controller-products','products',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('8cffcbc7-3aa4-44ac-a089-504827411992','Controller-controllers','controllers',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('8e8dc480-0d1c-4f41-8426-6882c26c228e','Controller-saving_accounts','saving_accounts',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('9044d0b7-7cb6-41d6-8ee7-7a2543cf98d1','Controller-serial_numbers','serial_numbers',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('b603aa0f-60ec-4187-b6d0-08bb78a41b22','Controller-images','images',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('b6785b8c-078c-4e4e-a15c-bd0d3bd18f82','Controller-system_usages','system_usages',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('b81c7fff-9c61-4760-a64a-c57bd96a7882','Controller-roles','roles',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('c6f7aa87-e575-4afe-9d67-ad2e50246247','Controller-branches','branches',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('dd7854e1-d06e-4e01-8bd6-8a2c4bcb2447','Controller-addresses','addresses',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('ddc2cdb3-5d62-45dd-b7fb-c6133b901303','Controller-invoices','invoices',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('e6cc3e61-b68b-49cb-b7f4-9f24b7146c3f','Controller-product_images','product_images',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('ece34c07-5ae4-4b74-b27d-1bfc67404a7a','Controller-orgs','orgs',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('ed5dae88-44aa-42bd-bb4e-b10ad8b94b46','Controller-wh_products','wh_products',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL),('f4370d1a-1b27-4599-ae9a-713d368db073','Controller-bank_accounts','bank_accounts',NULL,'2018-02-19 07:42:38','System','2018-02-19 07:42:38',NULL);
/*!40000 ALTER TABLE `controllers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_lines`
--

DROP TABLE IF EXISTS `goods_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods_lines` (
  `id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT '1',
  `product_id` char(36) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `goods_transaction_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_lines`
--

LOCK TABLES `goods_lines` WRITE;
/*!40000 ALTER TABLE `goods_lines` DISABLE KEYS */;
INSERT INTO `goods_lines` VALUES ('16a9c1a4-ad3b-42c7-81ca-0029c315d594',1,'0f78b11d-0da7-443a-9ac0-97d93ee8cfe9',10,'','2018-03-14 13:31:02','b0ad3559-96df-4ecf-a65f-8932da1073ef','2018-03-14 13:31:02',NULL,'5c71dbd6-10fe-4f1a-bf07-6b44e9ca8326');
/*!40000 ALTER TABLE `goods_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_transactions`
--

DROP TABLE IF EXISTS `goods_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_transactions`
--

LOCK TABLES `goods_transactions` WRITE;
/*!40000 ALTER TABLE `goods_transactions` DISABLE KEYS */;
INSERT INTO `goods_transactions` VALUES ('5c71dbd6-10fe-4f1a-bf07-6b44e9ca8326','GR0015','2018-03-14','GR','','CO','0','2018-03-14 13:30:52','b0ad3559-96df-4ecf-a65f-8932da1073ef','2018-03-14 13:31:09','b0ad3559-96df-4ecf-a65f-8932da1073ef',NULL,'77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0');
/*!40000 ALTER TABLE `goods_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `path` text,
  `short_desc` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_lines`
--

DROP TABLE IF EXISTS `invoice_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_lines` (
  `id` char(36) NOT NULL,
  `invoice_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `seq` int(3) NOT NULL DEFAULT '1',
  `netamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vatamt` decimal(10,2) DEFAULT '0.00',
  `totalamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `warehouse_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_lines`
--

LOCK TABLES `invoice_lines` WRITE;
/*!40000 ALTER TABLE `invoice_lines` DISABLE KEYS */;
INSERT INTO `invoice_lines` VALUES ('2d941daa-ee64-460d-9d1f-9f017d9b1aaf','66794748-be24-4931-bc33-1952252f63c4','0f78b11d-0da7-443a-9ac0-97d93ee8cfe9',1,21500.00,0.00,21500.00,NULL,'2018-03-23 08:08:55','6d2bed90-f9c1-4cc1-9317-63ef62282a73','2018-03-23 08:08:55',NULL,1,21500.00,'77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0');
/*!40000 ALTER TABLE `invoice_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `netamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vatamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalamt` decimal(10,2) DEFAULT '0.00',
  `totalpaid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ispaid` enum('Y','N') DEFAULT 'N',
  `issale` enum('Y','N') NOT NULL DEFAULT 'Y',
  `order_id` char(36) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `paymentmethod` varchar(45) NOT NULL,
  `seller` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES ('66794748-be24-4931-bc33-1952252f63c4','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376','Y','2018-03-23',NULL,'256100025','CO','0',21500.00,0.00,21500.00,30000.00,'Y','Y',NULL,'2018-03-23 08:08:55','6d2bed90-f9c1-4cc1-9317-63ef62282a73','2018-03-23 08:08:55',NULL,'CASH','6d2bed90-f9c1-4cc1-9317-63ef62282a73');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_lines`
--

DROP TABLE IF EXISTS `order_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_lines` (
  `id` char(36) NOT NULL,
  `order_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `serial_number_id` char(36) NOT NULL,
  `seq` int(3) NOT NULL DEFAULT '1',
  `netamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vatamt` decimal(10,2) DEFAULT '0.00',
  `totalamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_lines`
--

LOCK TABLES `order_lines` WRITE;
/*!40000 ALTER TABLE `order_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `netamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vatamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalamt` decimal(10,2) DEFAULT '0.00',
  `totalpaid` decimal(10,2) NOT NULL DEFAULT '0.00',
  `paymentrule` varchar(50) NOT NULL,
  `paymentterm` varchar(50) DEFAULT NULL,
  `ispaid` enum('Y','N') DEFAULT 'N',
  `issale` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isprocessed` enum('Y','N') NOT NULL DEFAULT 'N',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orgs`
--

DROP TABLE IF EXISTS `orgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orgs`
--

LOCK TABLES `orgs` WRITE;
/*!40000 ALTER TABLE `orgs` DISABLE KEYS */;
INSERT INTO `orgs` VALUES ('0','*','0','-','Y','2018-02-18 15:49:10','0',NULL,NULL,'system org'),('371a39b9-f692-49dd-9d78-41f388e319cc','ห้างทองเยาวราช','-','-','Y','2018-03-10 06:02:21','auth','2018-03-10 06:02:21',NULL,'');
/*!40000 ALTER TABLE `orgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pawn_lines`
--

DROP TABLE IF EXISTS `pawn_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pawn_lines` (
  `id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT '1',
  `product_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created` datetime NOT NULL,
  `creatbyed` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `pawn_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pawn_lines`
--

LOCK TABLES `pawn_lines` WRITE;
/*!40000 ALTER TABLE `pawn_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `pawn_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pawns`
--

DROP TABLE IF EXISTS `pawns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `log_history` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pawns`
--

LOCK TABLES `pawns` WRITE;
/*!40000 ALTER TABLE `pawns` DISABLE KEYS */;
/*!40000 ALTER TABLE `pawns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_lines`
--

DROP TABLE IF EXISTS `payment_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_lines` (
  `id` char(36) NOT NULL,
  `seq` int(5) NOT NULL DEFAULT '1',
  `payment_id` char(36) NOT NULL,
  `invoice_id` char(36) DEFAULT NULL,
  `order_id` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_lines`
--

LOCK TABLES `payment_lines` WRITE;
/*!40000 ALTER TABLE `payment_lines` DISABLE KEYS */;
INSERT INTO `payment_lines` VALUES ('21434109-a22f-4171-9bcd-a67ae4247b7b',1,'acb8b207-af66-4b83-9432-9c8174ca233e','66794748-be24-4931-bc33-1952252f63c4',NULL,NULL,'0000-00-00 00:00:00','6d2bed90-f9c1-4cc1-9317-63ef62282a73',NULL,NULL);
/*!40000 ALTER TABLE `payment_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` char(36) NOT NULL,
  `paymentdate` date NOT NULL,
  `docno` varchar(50) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `bank_account_id` char(36) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `bpartner_id` char(36) NOT NULL,
  `isactive` enum('Y','N') DEFAULT NULL,
  `isreceipt` enum('Y','N') NOT NULL DEFAULT 'Y',
  `ispartial` enum('Y','N') NOT NULL DEFAULT 'N',
  `isprocessed` enum('Y','N') DEFAULT 'N',
  `netamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vatamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalamt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `seller` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES ('acb8b207-af66-4b83-9432-9c8174ca233e','2018-03-23','AR00009','CASH','978d4840-c160-430a-9f5f-8f75d1b4a507','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376','0','Y','Y','N','Y',21500.00,0.00,21500.00,NULL,'0000-00-00 00:00:00','6d2bed90-f9c1-4cc1-9317-63ef62282a73',NULL,NULL,NULL);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES ('af0274ff-985b-41f4-812d-186e00804630','เงิน','Y','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-03-13 05:09:08','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 07:35:58','b0ad3559-96df-4ecf-a65f-8932da1073ef','02'),('cab286a6-55df-41c8-a0f5-e37ebef4862e','เพชร','Y','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-02-27 10:57:43','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 07:36:08','b0ad3559-96df-4ecf-a65f-8932da1073ef','03'),('f801b226-5402-4fed-9edb-7abaa5df03fc','ทอง','Y','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-02-27 10:57:36','0','2018-03-14 07:35:35','b0ad3559-96df-4ecf-a65f-8932da1073ef','01');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `image_id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sub_categories`
--

DROP TABLE IF EXISTS `product_sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `code` char(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sub_categories`
--

LOCK TABLES `product_sub_categories` WRITE;
/*!40000 ALTER TABLE `product_sub_categories` DISABLE KEYS */;
INSERT INTO `product_sub_categories` VALUES ('03d4b6a0-ebfb-4e3c-941b-350b5542efa6','แหวน','Y','cab286a6-55df-41c8-a0f5-e37ebef4862e','0','','2018-03-01 08:06:58','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 08:11:57','b0ad3559-96df-4ecf-a65f-8932da1073ef','01'),('12c0432e-94fe-4950-800b-5a89520673b6','แหวน','Y','af0274ff-985b-41f4-812d-186e00804630','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-03-13 05:09:57','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 08:11:47','b0ad3559-96df-4ecf-a65f-8932da1073ef','01'),('2746f4f8-d5d4-4604-82e9-dfb2b0d4df7c','แหวน','Y','f801b226-5402-4fed-9edb-7abaa5df03fc','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-03-13 05:09:38','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 08:10:16','b0ad3559-96df-4ecf-a65f-8932da1073ef','01'),('52e14645-547f-4a1d-82d2-f0c70e78c2c0','กำไล','Y','f801b226-5402-4fed-9edb-7abaa5df03fc','371a39b9-f692-49dd-9d78-41f388e319cc','','2018-03-13 05:09:47','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 08:10:27','b0ad3559-96df-4ecf-a65f-8932da1073ef','02'),('65d24ac1-1e07-4a3d-bbf8-625790610afa','สร้อยคอ','Y','f801b226-5402-4fed-9edb-7abaa5df03fc','0','','2018-02-27 14:34:14','0','2018-03-14 08:10:34','b0ad3559-96df-4ecf-a65f-8932da1073ef','03');
/*!40000 ALTER TABLE `product_sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `unittype` varchar(50) NOT NULL,
  `standard_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `actual_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isstock` enum('Y','N') NOT NULL DEFAULT 'Y',
  `type` enum('I','S') NOT NULL DEFAULT 'I' COMMENT 'I is Item, S is service',
  `product_category_id` char(36) NOT NULL,
  `product_sub_category_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `midified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `org_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('0f78b11d-0da7-443a-9ac0-97d93ee8cfe9','สร้อยคอทองคำ นน 1 บาท','01030001','เส้น',0.00,21500.00,'','Y','Y','I','f801b226-5402-4fed-9edb-7abaa5df03fc','2746f4f8-d5d4-4604-82e9-dfb2b0d4df7c','2018-03-14 12:34:38','b0ad3559-96df-4ecf-a65f-8932da1073ef',NULL,'6d2bed90-f9c1-4cc1-9317-63ef62282a73','371a39b9-f692-49dd-9d78-41f388e319cc'),('b03ecdc9-bab0-4ed0-bdc4-463a781e4a0e','xx','01030002','เส้น',0.00,3400.00,'','Y','Y','I','f801b226-5402-4fed-9edb-7abaa5df03fc','2746f4f8-d5d4-4604-82e9-dfb2b0d4df7c','2018-03-14 13:23:18','b0ad3559-96df-4ecf-a65f-8932da1073ef',NULL,'6d2bed90-f9c1-4cc1-9317-63ef62282a73','371a39b9-f692-49dd-9d78-41f388e319cc'),('f15c3a8a-0ad0-4319-9f82-03b28230be8e','แหวนเงิน','02010001','เส้น',0.00,2500.00,'','Y','Y','I','af0274ff-985b-41f4-812d-186e00804630','12c0432e-94fe-4950-800b-5a89520673b6','2018-03-14 13:24:46','b0ad3559-96df-4ecf-a65f-8932da1073ef',NULL,'6d2bed90-f9c1-4cc1-9317-63ef62282a73','371a39b9-f692-49dd-9d78-41f388e319cc');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` VALUES ('5645f603-ed04-40ba-aabd-ed570a363819','A1','ลด10%','ซื้อทอง 100000 บาทขึ้นไป','2018-03-13 18:46:45','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-13 18:55:22',NULL,'ทดสอบ1','Y');
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` char(36) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `geoid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES ('1','10','กรุงเทพมหานคร   ',2),('10','19','สระบุรี',2),('11','20','ชลบุรี   ',5),('12','21','ระยอง   ',5),('13','22','จันทบุรี   ',5),('14','23','ตราด   ',5),('15','24','ฉะเชิงเทรา   ',5),('16','25','ปราจีนบุรี   ',5),('17','26','นครนายก   ',2),('18','27','สระแก้ว   ',5),('19','30','นครราชสีมา   ',3),('2','11','สมุทรปราการ   ',2),('20','31','บุรีรัมย์   ',3),('21','32','สุรินทร์   ',3),('22','33','ศรีสะเกษ   ',3),('23','34','อุบลราชธานี   ',3),('24','35','ยโสธร   ',3),('25','36','ชัยภูมิ   ',3),('26','37','อำนาจเจริญ   ',3),('27','39','หนองบัวลำภู   ',3),('28','40','ขอนแก่น   ',3),('29','41','อุดรธานี   ',3),('3','12','นนทบุรี   ',2),('30','42','เลย   ',3),('31','43','หนองคาย   ',3),('32','44','มหาสารคาม   ',3),('33','45','ร้อยเอ็ด   ',3),('34','46','กาฬสินธุ์   ',3),('35','47','สกลนคร   ',3),('36','48','นครพนม   ',3),('37','49','มุกดาหาร   ',3),('38','50','เชียงใหม่   ',1),('39','51','ลำพูน   ',1),('4','13','ปทุมธานี   ',2),('40','52','ลำปาง   ',1),('41','53','อุตรดิตถ์   ',1),('42','54','แพร่   ',1),('43','55','น่าน   ',1),('44','56','พะเยา   ',1),('45','57','เชียงราย   ',1),('46','58','แม่ฮ่องสอน   ',1),('47','60','นครสวรรค์   ',2),('48','61','อุทัยธานี   ',2),('49','62','กำแพงเพชร   ',2),('5','14','พระนครศรีอยุธยา   ',2),('50','63','ตาก   ',4),('51','64','สุโขทัย   ',2),('52','65','พิษณุโลก   ',2),('53','66','พิจิตร   ',2),('54','67','เพชรบูรณ์   ',2),('55','70','ราชบุรี   ',4),('56','71','กาญจนบุรี   ',4),('57','72','สุพรรณบุรี   ',2),('58','73','นครปฐม   ',2),('59','74','สมุทรสาคร   ',2),('6','15','อ่างทอง   ',2),('60','75','สมุทรสงคราม   ',2),('61','76','เพชรบุรี   ',4),('62','77','ประจวบคีรีขันธ์   ',4),('63','80','นครศรีธรรมราช   ',6),('64','81','กระบี่   ',6),('65','82','พังงา   ',6),('66','83','ภูเก็ต   ',6),('67','84','สุราษฎร์ธานี   ',6),('68','85','ระนอง   ',6),('69','86','ชุมพร   ',6),('7','16','ลพบุรี   ',2),('70','90','สงขลา   ',6),('71','91','สตูล   ',6),('72','92','ตรัง   ',6),('73','93','พัทลุง   ',6),('74','94','ปัตตานี   ',6),('75','95','ยะลา   ',6),('76','96','นราธิวาส   ',6),('77','97','บึงกาฬ',3),('8','17','สิงห์บุรี   ',2),('9','18','ชัยนาท   ',2);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_accesses`
--

DROP TABLE IF EXISTS `role_accesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_accesses` (
  `id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `action_id` char(36) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_accesses`
--

LOCK TABLES `role_accesses` WRITE;
/*!40000 ALTER TABLE `role_accesses` DISABLE KEYS */;
INSERT INTO `role_accesses` VALUES ('17311a8b-bb22-4d90-bc49-e25a2cd44cf1','70de0ce8-fed6-49a6-b9fe-3f07fca99778','28014084-f200-4b24-86a2-de6f1a87f38b','2018-03-12 10:46:38','uan'),('28a72245-8c6c-462f-90b5-c9a681cb1f64','0052375d-f717-4f28-b0ef-297d6c2a873b','5e4ae09f-beca-4229-bd56-f053e2a9bc70','2018-02-26 09:44:12','uan'),('28bbb9de-aef4-46e6-a886-1e71c617a730','0052375d-f717-4f28-b0ef-297d6c2a873b','1ee38ccf-44ac-42cc-ae45-3beef54268a7','2018-02-26 09:44:12','uan'),('3013cd7b-b767-4742-96d3-8063a8b963ca','0052375d-f717-4f28-b0ef-297d6c2a873b','0cd213df-3d00-4c0a-b746-bf5a62e771c0','2018-02-26 09:44:12','uan'),('347fd7aa-4a2a-48c4-ad41-f5a4bbc9556d','0052375d-f717-4f28-b0ef-297d6c2a873b','fc701433-0289-4ec0-9d14-c75b383d8b25','2018-02-26 09:44:12','uan'),('384bf100-1315-4bef-a341-238e0b3f9d42','0052375d-f717-4f28-b0ef-297d6c2a873b','2b3a1b88-97f0-49ac-a050-f121876869c8','2018-02-26 09:44:12','uan'),('3dfcb145-a296-4f28-8b5b-d21094195d84','0052375d-f717-4f28-b0ef-297d6c2a873b','365791c1-6313-4028-84d5-f6c7bbf55bbc','2018-02-26 09:44:12','uan'),('3e015a49-6615-4f2d-8201-92642bc148e0','0052375d-f717-4f28-b0ef-297d6c2a873b','4eb4e924-a85c-4ecc-a639-304d1b26e65d','2018-02-26 09:44:12','uan'),('4ecef9b8-af1f-4253-afe4-f8d84c5e1ac0','0052375d-f717-4f28-b0ef-297d6c2a873b','210c813b-c607-4242-83a0-b2be186ebd7f','2018-02-26 09:44:12','uan'),('51159591-3353-4668-9d28-244f8beebe75','0052375d-f717-4f28-b0ef-297d6c2a873b','310c6dbb-6c62-4531-bb1a-41e639f60448','2018-02-26 09:44:12','uan'),('74daa80c-a01e-46b3-a994-02382aeef60b','0052375d-f717-4f28-b0ef-297d6c2a873b','e09c8bc5-3ca8-4a10-a2fb-8f0a96137222','2018-02-26 09:44:12','uan'),('795e51ae-c421-47a1-bb7f-8e948328bd9f','0052375d-f717-4f28-b0ef-297d6c2a873b','42285ff7-9922-48d6-bec1-ce4467416ea6','2018-02-26 09:44:12','uan'),('7d8aa2b3-99ce-42a3-ba01-ce92e0872036','0052375d-f717-4f28-b0ef-297d6c2a873b','a988a6fd-2786-4c25-b721-8b84380314bc','2018-02-26 09:44:12','uan'),('832f83ca-fc4d-4627-abd1-42faffc01732','70de0ce8-fed6-49a6-b9fe-3f07fca99778','a5f307e4-1996-4e6e-b474-86b379e54a13','2018-03-12 10:46:38','uan'),('9bfdd317-5781-4411-9314-2b4a3b222dca','0052375d-f717-4f28-b0ef-297d6c2a873b','ce0ffb95-1e39-4bd4-9268-3f5dea1990db','2018-02-26 09:44:12','uan'),('9c1069cc-7e53-4a9d-b3ad-aaa4dc99a485','0052375d-f717-4f28-b0ef-297d6c2a873b','55712a15-826f-4d08-af31-94de946a0451','2018-02-26 09:44:12','uan'),('a04addd7-9ae6-472d-842a-09d40bab3008','0052375d-f717-4f28-b0ef-297d6c2a873b','47a6efb9-00dc-46ef-a293-ea209998cebf','2018-02-26 09:44:12','uan'),('a2132bfc-9c2e-4dbc-9656-73867153bcaa','0052375d-f717-4f28-b0ef-297d6c2a873b','f7b28d1a-6056-4077-873b-afa244b643d7','2018-02-26 09:44:12','uan'),('acf3933c-a4ef-4d27-980a-dfddd076d52b','0052375d-f717-4f28-b0ef-297d6c2a873b','948e2bf3-ff49-4d06-bb23-92bcea3cb5da','2018-02-26 09:44:12','uan'),('bdc20084-8c8d-4ec0-9527-14c029635341','70de0ce8-fed6-49a6-b9fe-3f07fca99778','37cb30a3-b57e-43b6-8a3b-e88502b9c840','2018-03-12 10:46:38','uan'),('e764c936-df86-4bf8-819e-4823efca13ac','70de0ce8-fed6-49a6-b9fe-3f07fca99778','6086a957-3ee3-4720-a0c9-38287c6075c5','2018-03-12 10:46:38','uan'),('f705479f-2b45-48e6-aab7-93598d954d05','70de0ce8-fed6-49a6-b9fe-3f07fca99778','9c21cd60-a4fc-4907-b2f1-3ef0997e6b77','2018-03-12 10:46:38','uan');
/*!40000 ALTER TABLE `role_accesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `midified` datetime DEFAULT NULL,
  `midifiedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES ('e09401cd-76c4-4742-90b5-e2ad7d8dbfc3','admin สาขา','Y','','2018-03-10 06:42:26','กานต์ ทองยิ้ม',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saving_accounts`
--

DROP TABLE IF EXISTS `saving_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saving_accounts` (
  `id` char(36) NOT NULL,
  `bpartner_id` char(36) NOT NULL,
  `registerdate` date NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `balanceamt` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saving_accounts`
--

LOCK TABLES `saving_accounts` WRITE;
/*!40000 ALTER TABLE `saving_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `saving_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saving_transactions`
--

DROP TABLE IF EXISTS `saving_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saving_transactions` (
  `id` char(36) NOT NULL,
  `saving_accounts` char(36) NOT NULL,
  `docdate` date NOT NULL,
  `docno` varchar(50) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bank_account_id` char(36) NOT NULL,
  `isdeposit` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isactive` enum('Y','N') DEFAULT 'Y',
  `docstatus` varchar(50) NOT NULL DEFAULT 'DR',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saving_transactions`
--

LOCK TABLES `saving_transactions` WRITE;
/*!40000 ALTER TABLE `saving_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `saving_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sequent_numbers`
--

DROP TABLE IF EXISTS `sequent_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `isactive` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sequent_numbers`
--

LOCK TABLES `sequent_numbers` WRITE;
/*!40000 ALTER TABLE `sequent_numbers` DISABLE KEYS */;
INSERT INTO `sequent_numbers` VALUES ('0531ca79-d107-4209-bd4e-a59cb282c12d','IV','2561','',1,25,5,'256100025','','0','6f19d6f9-bfe9-4e57-b626-420d139bb376','2018-03-10 04:23:55','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-23 08:08:55','935ab8e8-c2f7-4743-8950-96e1012a07a0','Y'),('2dafe280-1332-4ae7-94eb-8d6ac4f83fea','AR','AR','',1,9,5,'AR00009','','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376','2018-03-23 06:07:44','6d2bed90-f9c1-4cc1-9317-63ef62282a73','2018-03-23 08:08:55',NULL,'Y'),('63f6ee60-ad59-4943-ae32-e7670eb6e744','GR','GR','',1,15,4,'GR0015','','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376','2018-03-11 10:42:26','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-14 13:30:52',NULL,'Y'),('6bfc2bca-ecc1-4437-b0b8-f8ac31c8a251','DP','2561','',1,0,5,NULL,'','0','6f19d6f9-bfe9-4e57-b626-420d139bb376','2018-03-11 07:11:28','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-11 07:11:28',NULL,'Y'),('8a7e5122-b6cf-4e52-a190-d85cd6ff8eae','PW','2561','',1,NULL,5,NULL,'xx','0','6f19d6f9-bfe9-4e57-b626-420d139bb376','2018-03-06 13:03:05','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-10 10:44:19','935ab8e8-c2f7-4743-8950-96e1012a07a0','Y');
/*!40000 ALTER TABLE `sequent_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serial_numbers`
--

DROP TABLE IF EXISTS `serial_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serial_numbers`
--

LOCK TABLES `serial_numbers` WRITE;
/*!40000 ALTER TABLE `serial_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `serial_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smartcards`
--

DROP TABLE IF EXISTS `smartcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smartcards`
--

LOCK TABLES `smartcards` WRITE;
/*!40000 ALTER TABLE `smartcards` DISABLE KEYS */;
/*!40000 ALTER TABLE `smartcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage_bins`
--

DROP TABLE IF EXISTS `storage_bins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `storage_bins` (
  `id` char(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isdefault` enum('Y','N') NOT NULL DEFAULT 'N',
  `warehouse_id` char(36) NOT NULL,
  `seq` int(11) DEFAULT '1',
  `description` varchar(255) DEFAULT NULL,
  `isactive` enum('Y','N') DEFAULT 'Y',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage_bins`
--

LOCK TABLES `storage_bins` WRITE;
/*!40000 ALTER TABLE `storage_bins` DISABLE KEYS */;
INSERT INTO `storage_bins` VALUES ('71fc0404-e0a1-4c4c-a58f-5d804883745b','ลิ้นชัก','Y','77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0',1,'','Y','2018-03-06 11:19:17','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-06 12:59:46','935ab8e8-c2f7-4743-8950-96e1012a07a0'),('f9b91e3c-7975-4276-9397-44d25b7c8897','ตู้ทอง','N','77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0',1,'','Y','2018-03-06 13:00:02','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-06 13:00:02',NULL);
/*!40000 ALTER TABLE `storage_bins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_usages`
--

DROP TABLE IF EXISTS `system_usages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_usages` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_usages`
--

LOCK TABLES `system_usages` WRITE;
/*!40000 ALTER TABLE `system_usages` DISABLE KEYS */;
INSERT INTO `system_usages` VALUES ('16d53a93-21ee-41cf-997e-faf907598c08','6d2bed90-f9c1-4cc1-9317-63ef62282a73','183.89.186.143','Y','2018-03-17 12:28:20','2018-03-17 12:28:20','Chiang Mai/Chiang Mai 50000 TH, loc:18.7903,98.9817, AS45758 Triple T Internet/Triple T Broadband'),('1bc75fe8-b9c9-46bd-9bcc-7ff24d0f43ac','6d2bed90-f9c1-4cc1-9317-63ef62282a73','180.183.205.101','Y','2018-03-22 16:25:48','2018-03-22 16:25:48','Chiang Mai/Chiang Mai 50000 TH, loc:18.7903,98.9817, AS45758 Triple T Internet/Triple T Broadband'),('2724962a-1dbd-44db-a1aa-1dd762360d6f','6d2bed90-f9c1-4cc1-9317-63ef62282a73','180.183.158.173','Y','2018-03-20 11:30:51','2018-03-20 11:30:51','Chiang Mai/Chiang Mai 50210 TH, loc:18.8522,99.0453, AS45758 Triple T Internet/Triple T Broadband'),('4a3b1cf0-cd9d-44f5-9208-082a38ed04c2','6d2bed90-f9c1-4cc1-9317-63ef62282a73','183.89.186.143','N','2018-03-17 11:33:42','2018-03-17 11:36:32','Chiang Mai/Chiang Mai 50000 TH, loc:18.7903,98.9817, AS45758 Triple T Internet/Triple T Broadband'),('8b30b8ce-596c-438b-99ba-7e0d24eceb4e','6d2bed90-f9c1-4cc1-9317-63ef62282a73','180.183.205.101','Y','2018-03-22 14:02:20','2018-03-22 14:02:20','Chiang Mai/Chiang Mai 50000 TH, loc:18.7903,98.9817, AS45758 Triple T Internet/Triple T Broadband'),('8f945208-b663-4ba6-9fb6-d755b37d6d95','6d2bed90-f9c1-4cc1-9317-63ef62282a73','180.183.158.173','N','2018-03-20 08:10:48','2018-03-20 10:27:03','Chiang Mai/Chiang Mai 50210 TH, loc:18.8522,99.0453, AS45758 Triple T Internet/Triple T Broadband'),('abbe734e-226a-476e-940c-05a6aa8e8d67','6d2bed90-f9c1-4cc1-9317-63ef62282a73','180.183.158.173','N','2018-03-20 11:22:17','2018-03-20 11:25:37','Chiang Mai/Chiang Mai 50210 TH, loc:18.8522,99.0453, AS45758 Triple T Internet/Triple T Broadband'),('e3f5c8ca-f960-47c6-ad11-8829c780389a','b0ad3559-96df-4ecf-a65f-8932da1073ef','180.183.205.101','Y','2018-03-22 06:53:17','2018-03-22 06:53:17','Chiang Mai/Chiang Mai 50000 TH, loc:18.7903,98.9817, AS45758 Triple T Internet/Triple T Broadband'),('e87fbe85-4d31-4779-b069-96a4ce684250','b0ad3559-96df-4ecf-a65f-8932da1073ef','180.183.158.47','Y','2018-03-19 13:10:51','2018-03-19 13:10:51','Chiang Mai/Chiang Mai 50210 TH, loc:18.8522,99.0453, AS45758 Triple T Internet/Triple T Broadband'),('f3163c07-0f30-42dd-a8d8-f8f1512c4aae','b0ad3559-96df-4ecf-a65f-8932da1073ef','180.183.158.173','Y','2018-03-21 15:10:36','2018-03-21 15:10:36','Chiang Mai/Chiang Mai 50210 TH, loc:18.8522,99.0453, AS45758 Triple T Internet/Triple T Broadband'),('fe969af7-3090-468a-bc1b-175a884e01bf','6d2bed90-f9c1-4cc1-9317-63ef62282a73','180.183.158.173','Y','2018-03-22 03:38:06','2018-03-22 03:38:06','Chiang Mai/Chiang Mai 50210 TH, loc:18.8522,99.0453, AS45758 Triple T Internet/Triple T Broadband');
/*!40000 ALTER TABLE `system_usages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `branch_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('0','-','System','FDTech','0911489090','-','contact@fdtech.co.th','2018-02-18','2018-02-18','$2y$10$iR2XKzWIjtDFMh/k4yRYu.jrpHQ9VsEkj/eD.gMWcF45rMSM2CFJC','FDTech','Y',NULL,'System','2018-02-18 15:52:10','0','2018-02-18 15:52:17','0',NULL,'0','0'),('6d2bed90-f9c1-4cc1-9317-63ef62282a73','นาย','admin','admin','-','-','admin@admin.com','2018-03-19','2018-03-18','$2y$10$5TYcqRFG9EIuCFdJkNL/ceYUImWTb0Tmk2qGq1EVhnkhLTHZCJIte','admin','Y','e09401cd-76c4-4742-90b5-e2ad7d8dbfc3','-','2018-03-14 09:03:28','b0ad3559-96df-4ecf-a65f-8932da1073ef','2018-03-14 09:03:28',NULL,'','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376'),('b0ad3559-96df-4ecf-a65f-8932da1073ef','นาย','สาคร','แสงแก้ว','992685988','11111','sakorn.s@outlook.com','2018-03-13','2018-03-14','$2y$10$DhXGoJJSFAGKFe22o8LX1OK4mm8xIH6xU8ZxK5v4dR/wFANhHc2Te','sakorn.s','Y','e09401cd-76c4-4742-90b5-e2ad7d8dbfc3','','2018-03-10 06:36:34','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-13 11:39:20',NULL,'','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES ('77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0','คลังสินค้าหลัก','371a39b9-f692-49dd-9d78-41f388e319cc','6f19d6f9-bfe9-4e57-b626-420d139bb376','Y','','2018-03-05 12:29:42','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-10 10:26:22',NULL);
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wh_products`
--

DROP TABLE IF EXISTS `wh_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wh_products` (
  `id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `balance_amt` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `storage_bin_id` char(36) DEFAULT NULL,
  `warehouse_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wh_products`
--

LOCK TABLES `wh_products` WRITE;
/*!40000 ALTER TABLE `wh_products` DISABLE KEYS */;
INSERT INTO `wh_products` VALUES ('2c810266-2cfb-4419-ac4f-acf1b445df5a','e90bd1ec-70a1-441e-8c2b-175beb9a3d6b',410,'2018-03-12 13:57:05','935ab8e8-c2f7-4743-8950-96e1012a07a0','2018-03-12 16:17:47','935ab8e8-c2f7-4743-8950-96e1012a07a0',NULL,NULL,'77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0'),('40555629-f324-4c7b-b7f5-59f547ae2e94','0f78b11d-0da7-443a-9ac0-97d93ee8cfe9',10,'2018-03-14 13:31:09','b0ad3559-96df-4ecf-a65f-8932da1073ef','2018-03-14 13:31:09',NULL,NULL,NULL,'77d7e8ad-b9ea-4ce4-8ca4-9ef0d95dddc0');
/*!40000 ALTER TABLE `wh_products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-23 15:17:44
