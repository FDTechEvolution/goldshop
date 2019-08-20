CREATE TABLE `gold`.`storage_bins` (
  `id` CHAR(36) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `isdefault` ENUM('Y', 'N') NOT NULL DEFAULT 'N',
  `warehouse_id` CHAR(36) NOT NULL,
  `seq` INT NULL DEFAULT 1,
  `description` VARCHAR(255) NULL,
  `isactive` ENUM('Y', 'N') NULL DEFAULT 'Y',
  `created` DATETIME NOT NULL,
  `createdby` CHAR(36) NOT NULL,
  `modified` DATETIME NULL,
  `modifiedby` CHAR(36) NULL,
  PRIMARY KEY (`id`));
