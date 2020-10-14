select pc.id,pc.name as label,p.percent,sdw.code,w.value,w.sd_weight_id     
from 
	wh_products whp 
	join products p on whp.product_id = p.id 
	left join product_categories pc on p.product_category_id = pc.id 
    left join weights w on p.weight_id = w.id 
    left join sd_weights sdw on w.sd_weight_id = sdw.id 

where whp.warehouse_id = 'b8cd9c04-65ad-47a9-a18f-180ca13c6a03' 
group by pc.label,p.percent,sdw.code 
order by pc.label asc 

