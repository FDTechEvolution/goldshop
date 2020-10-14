select 
	sum(whp.balance_amt)-sum(whp.inorderqty) as balance_amt,whp.product_id,p.code,whp.warehouse_id 
from 
	wh_products whp 
        join products p on whp.product_id = p.id 
where whp.product_id = :product_id and whp.warehouse_id = :warehouse_id  
group by whp.product_id,whp.warehouse_id