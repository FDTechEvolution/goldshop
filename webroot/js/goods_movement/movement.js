/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function append_row_movement(data) {
    let td = '';
    let weight_value = data.weight_value === null ? '0' : data.weight_value;
    let row_id = data.id;
    let count_row = $('#tb-show-product > tbody > tr').length;
    count_row = count_row+1;

    if ($('[data-row-id="' + row_id + '"]').length > 0) {
        console.log('has product');
        let current_qty = $('[data-qty-id="'+row_id+'"]').val();
        let new_qty = parseInt(current_qty)+1;
        let weightamt = parseFloat(weight_value)*new_qty;
        //update qty
        $('[data-text-qty-id="'+row_id+'"]').text(new_qty);
        $('[data-qty-id="'+row_id+'"]').val(new_qty);
        
        //update weight amt
        $('[data-text-weightamt-id="'+row_id+'"]').text(weightamt.toFixed(2));
        
    } else {
        td += '<td>'+count_row+'</td>';
        td += '<td>' + data.name + '</td>';
        td += '<td class="text-right">' + weight_value + '</td>';
        td += '<td class="text-right" data-text-qty-id="' + row_id + '">' + 1 + '</td>';
        td += '<td class="text-right" data-text-weightamt-id="' + row_id + '">' + weight_value + '</td>';
        td += '<td class="text-right"><button class="btn btn-outline-primary btn-sm" type="button" onclick="remove_line(\''+row_id+'\');"> <i class="fas fa-trash"></i></button> </td>';

        let input_qty = '<input type="hidden" name="qty[]" data-qty-id="'+row_id+'" class="form-control" value="1"/>';
        let input_product = '<input type="hidden" data-product-id="'+row_id+'" name="product_id[]" class="form-control" value="' + data.id + '"/>';
        let tr = '<tr data-row-id="' + row_id + '">' + td + input_qty + input_product + '</tr>';

        $('#tb-show-product > tbody').append(tr);
    }



}
