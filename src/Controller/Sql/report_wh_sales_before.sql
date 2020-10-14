select sum(pl.qty) as totalqty,pc.label,p.percent,sdw.code,pc.id as product_category_id 
from 
	payments pay 
    join payment_lines pl on pay.id = pl.payment_id 
    join products p on pl.product_id = p.id 
    left join product_categories pc on p.product_category_id = pc.id 
    left join weights w on p.weight_id = w.id 
    left join sd_weights sdw on w.sd_weight_id = sdw.id 
where pay.isreceipt = 'Y' and pay.warehouse_id = :warehouse_id and (pay.paymentdate < :startdate)
group by pc.label,p.percent,sdw.code 