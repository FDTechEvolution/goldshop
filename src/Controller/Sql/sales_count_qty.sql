select coalesce(sum(pl.qty),0) as qty
from 
	payments p 
    join payment_lines pl on p.id = pl.payment_id 
where 
	p.type = 'SALES' 
    and p.ispromotionused = 'N' 
	and p.bpartner_id = :bpartner_id