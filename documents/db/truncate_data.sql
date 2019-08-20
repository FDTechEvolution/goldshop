TRUNCATE `ywrshop_demo`.`close_day_lines`;
TRUNCATE `ywrshop_demo`.`close_days`;
TRUNCATE `ywrshop_demo`.`goods_lines`;
TRUNCATE `ywrshop_demo`.`goods_transactions`;
TRUNCATE `ywrshop_demo`.`invoice_lines`;
TRUNCATE `ywrshop_demo`.`invoices`;
TRUNCATE `ywrshop_demo`.`order_lines`;
TRUNCATE `ywrshop_demo`.`orders`;
TRUNCATE `ywrshop_demo`.`pawn_lines`;
TRUNCATE `ywrshop_demo`.`pawns`;
TRUNCATE `ywrshop_demo`.`pawn_transactions`;
TRUNCATE `ywrshop_demo`.`payment_lines`;
TRUNCATE `ywrshop_demo`.`payment_method_lines`;
TRUNCATE `ywrshop_demo`.`payments`;
TRUNCATE `ywrshop_demo`.`saving_accounts`;
TRUNCATE `ywrshop_demo`.`saving_transactions`;
TRUNCATE `ywrshop_demo`.`wh_products`;

update bank_accounts set total_balance = 0;