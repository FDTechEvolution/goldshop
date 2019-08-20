ALTER TABLE `gold`.`sequent_numbers` 
ADD COLUMN `isactive` ENUM('Y', 'N') NULL DEFAULT 'Y' AFTER `modifiedby`;

ALTER TABLE `gold`.`wh_products` 
DROP COLUMN `warehouse_id`,
ADD COLUMN `storage_bin_id` CHAR(36) NOT NULL AFTER `description`;

CREATE TABLE `gold`.`goods_transactions` (
  `id` CHAR(36) NOT NULL,
  `docno` VARCHAR(50) NOT NULL,
  `docdate` DATE NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  `status` VARCHAR(45) NOT NULL DEFAULT 'DR',
  `branch_id` CHAR(36) NOT NULL,
  `created` DATETIME NOT NULL,
  `createdby` CHAR(36) NOT NULL,
  `modified` DATETIME NULL,
  `modifiedby` CHAR(36) NULL,
  PRIMARY KEY (`id`));

  ALTER TABLE `gold`.`goods_transactions` 
ADD COLUMN `from_warehouse` CHAR(36) NULL AFTER `modifiedby`,
ADD COLUMN `to_warehouse` CHAR(36) NOT NULL AFTER `from_warehouse`;


CREATE TABLE `gold`.`goods_lines` (
  `id` CHAR(36) NOT NULL,
  `seq` INT NOT NULL DEFAULT 1,
  `product_id` CHAR(36) NOT NULL,
  `qty` INT NOT NULL,
  `description` VARCHAR(255) NULL,
  `created` DATETIME NOT NULL,
  `createdby` CHAR(36) NOT NULL,
  `modified` DATETIME NULL,
  `modifiedby` CHAR(36) NULL,
  PRIMARY KEY (`id`));