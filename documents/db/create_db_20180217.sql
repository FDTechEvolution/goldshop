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
  `bank_id` char(36) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `accountno` char(10) NOT NULL,
  `bank_office` varchar(100) NOT NULL,
  `org_id` char(36) NOT NULL,
  `branch_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_accounts`
--

LOCK TABLES `bank_accounts` WRITE;
/*!40000 ALTER TABLE `bank_accounts` DISABLE KEYS */;
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
  `image_id` char(36) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bpartners`
--

LOCK TABLES `bpartners` WRITE;
/*!40000 ALTER TABLE `bpartners` DISABLE KEYS */;
/*!40000 ALTER TABLE `bpartners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branchs`
--

DROP TABLE IF EXISTS `branchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branchs` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branchs`
--

LOCK TABLES `branchs` WRITE;
/*!40000 ALTER TABLE `branchs` DISABLE KEYS */;
/*!40000 ALTER TABLE `branchs` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `controllers` ENABLE KEYS */;
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
  `paymentrule` varchar(50) NOT NULL,
  `paymentterm` varchar(50) DEFAULT NULL,
  `ispaid` enum('Y','N') DEFAULT 'N',
  `issale` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isprocessed` enum('Y','N') NOT NULL DEFAULT 'N',
  `order_id` char(36) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `orgs` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
INSERT INTO `roles` VALUES ('e8ce280b-6c68-4628-bfd1-18e69f7de8b9','xx','Y','','2018-02-15 14:29:58','sakorn',NULL,'');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
  `warehouse_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `balance_amt` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `createdby` char(36) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `modifiedby` char(36) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wh_products`
--

LOCK TABLES `wh_products` WRITE;
/*!40000 ALTER TABLE `wh_products` DISABLE KEYS */;
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

-- Dump completed on 2018-02-17 21:45:56
