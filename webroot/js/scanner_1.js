/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    $(document).pos();
    $(document).on('scan.pos.barcode', function (event) {
        //alert(event.code);
        //access `event.code` - barcode data
        //getProduct(event.code);
        //var warehouse_id = $('#warehouse_id').val();
        //$(document).productProcess(event.code, warehouse_id, 'list_product');
    });
    $(document).on('swipe.pos.card', function (event) {
        //access following:
        // `event.card_number` - card number only
        // `event.card_holder_first_name` - card holder first name only
        // `event.card_holder_last_name` - card holder last name only
        // `event.card_exp_date_month` - card expiration month - 2 digits
        // `event.card_exp_date_year_2` - card expiration year - 2 digits
        // `event.card_exp_date_year_4` - card expiration year - 4 digits
        // `event.swipe_data` - original swipe data from raw processing or sending to a 3rd party service
    });

    var barcode = "";
    $(document).keydown(function (e)
    {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13)// Enter key hit
        {
            console.log(barcode);
            var warehouse_id = $('#warehouse_id').val();
            $(document).productProcess(barcode, warehouse_id, 'list_product');
        } else if (code == 9)// Tab key hit
        {
            console.log(barcode);
            var warehouse_id = $('#warehouse_id').val();
            $(document).productProcess(barcode, warehouse_id, 'list_product');

        } else
        {
            barcode = barcode + String.fromCharCode(code);
        }
    });



});