select paymentdate,p.branch_id   
from 
	payments p 
    left join close_days c on (p.paymentdate = c.close_date and p.branch_id = c.branch_id)
where c.close_date is null 
group by paymentdate 
order by paymentdate asc 