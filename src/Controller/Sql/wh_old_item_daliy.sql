select 
    DATE_FORMAT(DATE_ADD(docdate, INTERVAL 543 YEAR),'%d/%m/%Y') as docdate_th,
    docdate,type,(sum(manual_weight)+sum(value)) as weight 
from 
( 
	select 
		payment.*,
		(case when pd.manual_weight is null then 0 else pd.manual_weight end) as manual_weight,
		(case when w.value is null then 0 else w.value end) as value, pdc.type 
	from 
	( 
		select p.paymentdate as docdate,p.warehouse_id,pl. product_id  
		from 
			payment_lines pl 
			join payments p on pl.payment_id = p.id 
		where 
			p.warehouse_id = :warehouse_id and pl.isdispose = "N" 
		union 
		select gt.docdate,gt.to_warehouse as warehouse_id,gl.product_id  
		from 
			goods_lines gl 
			join goods_transactions gt on gl.goods_transaction_id = gt.id 
		where 
			gt.to_warehouse = :warehouse_id 
			and gt.isdispose = "N" 
	) as payment 
	join products pd on payment.product_id = pd.id 
	join product_categories pdc on pd.product_category_id = pdc.id 
	left join weights w on pd.weight_id = w.id 
) as main 
group by docdate,type