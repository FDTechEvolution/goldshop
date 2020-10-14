/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

    var barcode = "";
    $(document).keydown(function (e)
    {
        var code = (e.keyCode ? e.keyCode : e.which);

        if (code == 13)// Enter key hit
        {
            var warehouse_id = $('#warehouse_id').val();
            console.log(barcode);
            $(document).productProcess(barcode.trim(), warehouse_id, 'list_product');
            barcode = '';

        } else if (code == 9)// Tab key hit
        {
            //console.log(barcode);
            /*
             barcode = barcode.substring(1);
             var warehouse_id = $('#warehouse_id').val();
             $(document).productProcess(barcode.trim(), warehouse_id, 'list_product');
             barcode = '';
             * 
             */
        } else if (code == 16) {
            //Shift key

        } else if(code == 32){
            barcode = barcode + ' ';
        }else
        {
            barcode = barcode + String(String.fromCharCode(code).trim());
            console.log(barcode);
            //console.log(code);
        }
    });



});