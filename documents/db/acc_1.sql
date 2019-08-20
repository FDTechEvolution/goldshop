select 
	case when p.isreceipt ="Y" and pml.payment_method ="CASH" then sum(pml.amount) else 0 end as debitamt,
	case when p.isreceipt ="N" or pml.payment_method !="CASH" then sum(pml.amount) else 0 end as creditamt,
	CONCAT(COALESCE(banks.name, "")," ",ba.account_name) as title,
    p.type,p.isreceipt,p.paymentdate,pml.payment_method 
from 
	payments p 
	join payment_method_lines pml on p.id = pml.payment_id 
	join bank_accounts ba on pml.bank_account_id = ba.id 
	left join banks on ba.bank_id = banks.id 
where 
	p.paymentdate >= DATE("2018-07-13") 
    and p.paymentdate <= DATE("2018-07-15") 
    and p.type !="REVENUE" and p.type !="EXPEND" 
group by 
	ba.account_name,p.type,p.isreceipt,p.paymentdate,pml.payment_method 
order by p.paymentdate ASC,p.type ASC
