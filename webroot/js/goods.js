var productJson = [];
var countResultRow = 1;

$(function () {
    jQuery('#docdate').datepicker({
        //language: 'th',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

    $.get(SITE_URL + "service-product/get-all-product/", {}, function (_data) {
        productJson = JSON.parse(_data);

        console.log(productJson);

    });



    //setDefaultToDayDate('docdate');

});

function selectAll() {
    $(this).select();
}

function getProductDetail(productCode) {
    console.log(productCode);

    //%20
    //productCode = productCode.replace(' ', "@@XX@@");
    productCode = encodeURI(productCode);
    productCode = productCode.replace('%10', " ");
    console.log(productCode);


    $.get(SITE_URL + "service-product/get-product-by-code/" + productCode, {}, function (_data) {
        var product = JSON.parse(_data);
        console.log(product);
        let products = [product];
        
        if(product == null){
            products = [];
        }
        insertLine(products);
    });



    /*
     var result = $.grep(productJson, function (element, index) {
     return (element.code === productCode);
     });
     console.log(result);
     insertLine(result);
     * 
     */


}

function insertLine(products) {
    if (products.length === 0) {
        notisErr('ไม่พบข้อมูล กรุณาตรวจสอบอีกครั้ง');
        $('#l-msg-title').text('ไม่พบข้อมูล กรุณาตรวจสอบอีกครั้ง,พร้อมสแกน...');
        $('#l-msg-result').text('');
        errorSound();
        return false;
    }
    var product = products[0];


    $('#l-msg-result').text(product['name']);
    var product_code = product['code'];
    product_code = product_code.replace(' ', "_");
    var product_ele_id = 'product_id_' + product_code;
    var qty_ele_id = 'qty_' + product_code;
    //console.log($('#'+product_ele_id).length);
    if ($('#' + product_ele_id).length > 0) {
        var qty = $('#' + qty_ele_id).val();
        $('#' + qty_ele_id).val(parseInt(qty) + 1);
    } else {
        var html = '';
        html += '<div class="row align-middle">';
        html += '    <div class="col-10 align-middle">';
        html += '        <h4>#' + (countResultRow++) + ' - ' + product['name'] + '</h4>';
        html += '        <input type="hidden" name="product_id[]" value="' + product['id'] + '" id="' + product_ele_id + '"/>';
        html += '    </div>';
        html += '    <div class="col-2 align-middle">';
        html += '        <input type="tel" name="qty[]" value="1" class="form-control" id="' + qty_ele_id + '" onclick="$(this).select();"/>';
        html += '    </div>';
        html += '</div>';
        html += '<hr/>';

        $('#box-scan-result').append(html);
    }
    successSound();
    $('#l-msg-title').text('ระบบพร้อมสแกน');
    $('#box-bt-confirm').show();
}



$(document).ready(function () {

    $('input:radio[name="customer_type"]').change(function () {
        var selected = $(this).val();//alert($(this).val());
        if (selected === 'save') {
            $('#customer_box').show();
        } else {
            $('#customer_box').hide();
        }

    });

/*
    var barcode = '';
    $(document).keydown(function (e)
    {
        $('#l-msg-title').text('กำลังดึงข้อมูล...');
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13)// Enter key hit
        {
            //console.log(barcode);
            var warehouse_id = $('#warehouse_id').val();

            barcode = barcode.substring(1);
            //$(document).productProcess(barcode.trim(), warehouse_id, 'list_product');
            getProductDetail(barcode);
            barcode = '';
        } else if (code == 9)// Tab key hit
        {
            //console.log(barcode);
            barcode = barcode.substring(1);
            var warehouse_id = $('#warehouse_id').val();
            //$(document).productProcess(barcode.trim(), warehouse_id, 'list_product');
            getProductDetail(barcode);
            barcode = '';
        } else
        {


            barcode = barcode + String(String.fromCharCode(code).trim());
            // console.log(barcode);
        }
    });
     * 
 */

});
