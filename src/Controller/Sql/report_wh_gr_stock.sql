select g.docdate,sum(gl.qty) as totalqty,pc.label,p.percent,sdw.code,pc.id as product_category_id   
from 
	goods_transactions g 
    join goods_lines gl on g.id = gl.goods_transaction_id 
    join products p on gl.product_id = p.id 
    left join product_categories pc on p.product_category_id = pc.id 
    left join weights w on p.weight_id = w.id 
    left join sd_weights sdw on w.sd_weight_id = sdw.id 
where g.type = 'GR' and g.status ='CO' and g.to_warehouse = :warehouse_id and (g.docdate >= :startdate and g.docdate <=:enddate)
group by g.docdate,pc.label,p.percent,sdw.code 
order by g.docdate asc,pc.label asc   