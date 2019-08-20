ALTER TABLE `gold`.`pawn_lines` 
ADD COLUMN `pawn_id` CHAR(36) NOT NULL AFTER `modifiedby`;

CREATE TABLE `gold`.`smartcards` (
  `id` CHAR(36) NOT NULL,
  `ip` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NULL,
  `firstname` VARCHAR(100) NULL,
  `lastname` VARCHAR(100) NULL,
  `gender` VARCHAR(45) NULL,
  `cardno` VARCHAR(45) NULL,
  `address` VARCHAR(100) NULL,
  `created` DATETIME NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`));


ALTER TABLE `gold`.`smartcards` 
CHANGE COLUMN `address` `full_address` VARCHAR(100) NULL DEFAULT NULL ,
ADD COLUMN `houseno` VARCHAR(45) NULL AFTER `description`,
ADD COLUMN `moo` VARCHAR(45) NULL AFTER `houseno`,
ADD COLUMN `sub_district` VARCHAR(100) NULL AFTER `moo`,
ADD COLUMN `district` VARCHAR(100) NULL AFTER `sub_district`,
ADD COLUMN `province` VARCHAR(100) NULL AFTER `district`;


ALTER TABLE `gold`.`pawns` 
ADD COLUMN `log_history` VARCHAR(255) NULL AFTER `interrestrate`;
