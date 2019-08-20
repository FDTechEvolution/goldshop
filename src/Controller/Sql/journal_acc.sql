select 
	main.*,concat(COALESCE(banks.code,'')) as bank_code 
from
(
	select 
		sum(pml.amount) as amount,p.type,p.isreceipt,p.paymentdate,
        '' as payment_method,'' as bank_account_id,
        'normal' as grouptype ,'' as title,1 as seq  
	from 
		payments p 
		join payment_method_lines pml on p.id = pml.payment_id 
	where 
		p.type !="REVENUE" 
		and p.docstatus="CO" 
		and p.type !="EXPEND" and p.branch_id = :branch_id and p.paymentdate = date(:paymentdate) 
	group by p.type  
    union
    select 
		sum(pml.amount) as amount,p.type,p.isreceipt,p.paymentdate,
        pml.payment_method,pml.bank_account_id,
        'transfer' as grouptype ,'' as title, 2 as seq  
	from 
		payments p 
		join payment_method_lines pml on p.id = pml.payment_id 
		join bank_accounts ba on pml.bank_account_id = ba.id 
	where 
		p.type !="REVENUE" 
		and p.docstatus="CO" 
		and p.type !="EXPEND" and pml.payment_method = 'TRAN' and p.branch_id = :branch_id and p.paymentdate = date(:paymentdate) 
	group by pml.payment_method,pml.bank_account_id,p.type  
    union
    select 
		sum(p.usesavingamt) as amount,'USESAVING' as type,'N' as isreceipt,p.paymentdate,
        pml.payment_method,pml.bank_account_id,
        'USESAVING' as grouptype ,bp.name as title , 3 as seq 
	from 
		payments p 
		join payment_method_lines pml on p.id = pml.payment_id 
		join bank_accounts ba on pml.bank_account_id = ba.id 
        join bpartners bp on p.bpartner_id = bp.id 
		left join banks on ba.bank_id = banks.id 
	where 
		p.type ="SALES" 
		and p.docstatus="CO" 
        and p.usesavingamt > 0  and p.branch_id = :branch_id and p.paymentdate = date(:paymentdate) 
	group by pml.payment_method,pml.bank_account_id,p.type
	union
    select 
		sum(pml.amount) as amount,p.type,p.isreceipt,p.paymentdate,
        pml.payment_method,pml.bank_account_id,
        'income' as grouptype,inc.name as title  , 4 as seq 
	from 
		payments p 
		join payment_method_lines pml on p.id = pml.payment_id 
        join payment_lines pl on p.id = pl.payment_id 
        join income_types inc on pl.income_type_id = inc.id 
		join bank_accounts ba on pml.bank_account_id = ba.id 
		left join banks on ba.bank_id = banks.id 
	where 
		(p.type ="REVENUE" OR p.type ="EXPEND")
		and p.docstatus="CO" and p.branch_id = :branch_id and p.paymentdate = date(:paymentdate) 
	group by pml.payment_method,pml.bank_account_id,p.type,inc.name   
    
) as main 
	left join bank_accounts ba on main.bank_account_id = ba.id 
	left join banks on ba.bank_id = banks.id 
order by main.seq asc, main.grouptype desc,main.type asc,main.payment_method asc
