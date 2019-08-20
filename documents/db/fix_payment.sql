ALTER TABLE `ywrshop_db`.`payment_lines` 
CHANGE COLUMN `pawn_id` `pawn_id` CHAR(36) NULL DEFAULT NULL AFTER `order_id`,
CHANGE COLUMN `saving_account_id` `saving_account_id` CHAR(36) NULL DEFAULT NULL AFTER `pawn_id`,
ADD COLUMN `product_id` CHAR(36) NULL AFTER `saving_account_id`,
ADD COLUMN `amount` DECIMAL(12,2) NULL DEFAULT 0 AFTER `modifiedby`,
ADD COLUMN `qty` DECIMAL(10) NULL DEFAULT 0 AFTER `amount`,
ADD COLUMN `totalamount` DECIMAL(12,2) NULL DEFAULT 0 AFTER `qty`,
ADD COLUMN `isexchange` ENUM('Y', 'N') NULL DEFAULT 'N' AFTER `totalamount`;


ALTER TABLE `ywrshop_db`.`payments` 
ADD COLUMN `warehouse_id` CHAR(36) NULL AFTER `usesavingamt`;