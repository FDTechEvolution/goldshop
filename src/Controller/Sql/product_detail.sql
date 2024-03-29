select 
	p.*,
	w.name as weight_name,w.value as weight_value,sdw.code as sdw_code,sdw.name as sdw_name,
    pc.name as product_cat_name,
    s.name as size,
    d.name as design 
from 
	products p 
    left join weights w on p.weight_id = w.id 
    left join sd_weights sdw on w.sd_weight_id = sdw.id 
    left join product_categories pc on p.product_category_id = pc.id 
    left join sizes s on p.size_id = s.id 
    left join designs d on p.design_id = d.id 
where p.id = :product_id 