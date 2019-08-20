select *,DATE_FORMAT(DATE_ADD(created, INTERVAL 543 YEAR),'%d/%m/%Y %H:%i') as docdate_th  
from 
	(select 
		p.type,p.paymentdate as docdate,p.created,pd.name as product_name,pl.qty,p.id,p.warehouse_id    
	from 
		payments p 
		join payment_lines pl on p.id = pl.payment_id 
		join products pd on pl.product_id = pd.id 
	union 
        select 
		'PAWN' as type,p.docdate as docdate,p.created,pd.name as product_name,1 as qty,p.id,p.warehouse_id    
	from 
		pawns p 
		join pawn_lines pl on p.id = pl.pawn_id 
		join products pd on pl.product_id = pd.id 
	union 
	select 
		gt.type,gt.docdate,gt.created,pd.name as product_name,gl.qty,gt.id,gt.to_warehouse as warehouse_id 
	from 
		goods_transactions gt 
		join goods_lines gl on gt.id = gl.goods_transaction_id 
		join products pd on gl.product_id = pd.id 
	union 
        select 
		gt.type,gt.docdate,gt.created,pd.name as product_name,gl.qty,gt.id,gt.from_warehouse as warehouse_id 
	from 
		goods_transactions gt 
		join goods_lines gl on gt.id = gl.goods_transaction_id 
		join products pd on gl.product_id = pd.id 
	union 
        select 
		gt.type,gt.docdate,gt.created,gl.description as product_name,gl.qty,gt.id,gt.from_warehouse as warehouse_id 
	from 
		goods_transactions gt 
		join goods_lines gl on gt.id = gl.goods_transaction_id 
	where gt.type = 'TO' 
) as main 
where warehouse_id = :warehouse_id order by created DESC