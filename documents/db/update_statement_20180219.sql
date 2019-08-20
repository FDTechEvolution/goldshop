ALTER TABLE `gold`.`bank_accounts` 
ADD COLUMN `type` VARCHAR(45) NULL DEFAULT 'BACC' AFTER `modifiedby`;

ALTER TABLE `gold`.`banks` 
CHANGE COLUMN `image_id` `image_id` CHAR(36) NULL ;

CREATE TABLE `gold`.`product_categories` (
  `id` CHAR(36) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `isactive` ENUM('Y', 'N') NULL DEFAULT 'Y',
  `org_id` CHAR(36) NOT NULL,
  `description` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `createdby` CHAR(36) NOT NULL,
  `modified` DATETIME NULL,
  `modifiedby` CHAR(36) NULL,
  PRIMARY KEY (`id`));


CREATE TABLE `gold`.`product_sub_categories` (
  `id` CHAR(36) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `isactive` ENUM('Y', 'N') NULL DEFAULT 'Y',
  `product_category_id` CHAR(36) NOT NULL,
  `org_id` CHAR(36) NOT NULL,
  `description` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `createdby` CHAR(36) NOT NULL,
  `modified` DATETIME NULL,
  `modifiedby` CHAR(36) NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `gold`.`products` 
ADD COLUMN `product_category_id` CHAR(36) NOT NULL AFTER `type`,
ADD COLUMN `product_sub_category_id` CHAR(36) NOT NULL AFTER `product_category_id`;

ALTER TABLE `gold`.`product_categories` 
CHANGE COLUMN `id` `id` CHAR(36) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ;


ALTER TABLE `gold`.`product_sub_categories` 
CHANGE COLUMN `id` `id` CHAR(36) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ;
