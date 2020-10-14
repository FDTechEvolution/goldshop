
$(function () {
    setDefaultToDayDate('docdate');

    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    };

    $.fn.productProcess = function (productCode, warehouse_id, table_id, description, price, order_id) {
        console.log(productCode);
        productCode = encodeURI(productCode);
        productCode = productCode.replace('%10', " ");
        productCode = productCode.replace('%20', " ");
        console.log(productCode);
        
        var productCodeEle = productCode.replace(' ', '_');
        console.log(productCode);
        if (description === 'undefined' || description === undefined) {
            description = '';
        } else {
            description = '<br/><small style="line-height: 1rem;">' + description + '</small>';
        }
        var data = {
            idLineIndex: '',
            idLineNo: '',
            idProduct: '',
            idMaxDiscount: '',
            idActualPrice: '',
            idQty: '',
            idQtyLabel: '',
            idPrice: '',
            idPriceLabel: '',
            idAmtLabel: ''
        };

        data = setDefaultDataId(table_id + productCodeEle);
        var _qty = parseInt($('#' + data.idQty).val()) + 1;
        var dataJson = [];


        $('#box-loading').show();
        $.post(SITE_URL + "products/getdetailjson/", {code: productCode, warehouse_id: warehouse_id, qty: _qty}, function (_data) {
            if (_data === 'notfound') {
                //$.Notification.autoHideNotify('error', 'top right', 'ไม่พบสินค้าหรือบริการ', '');
                errorSound();
                Swal.fire({title: "ไม่พบสินค้าหรือบริการ", confirmButtonClass: "btn btn-primary mt-2"});
            } else if (_data === 'nostock') {
                //$.Notification.autoHideNotify('error', 'top right', 'ไม่พบสินค้าในคลัง', '');
                errorSound();
                Swal.fire({title: "ไม่พบสินค้าในคลัง", confirmButtonClass: "btn btn-primary mt-2"});
            } else {
                dataJson = JSON.parse(_data);
                console.log(dataJson);
                productCodeEle = dataJson['code'].replace(' ', '_');
                data = setDefaultDataId(table_id + productCodeEle);
                if ($('#' + data.idLineIndex).length > 0) {
                    //Update qty
                    var amtUnit = $('#' + data.idQty).val();
                    amtUnit = parseInt(amtUnit) + parseInt(1);
                    $('#' + data.idQty).val(amtUnit);
                    $('#' + data.idQtyLabel).text(amtUnit);
                } else {
                    insertRow();
                }
                reCalculateAllLine();
                successSound();
            }
            $('#box-loading').hide();
        });

        function insertRow() {

            var actual_price = dataJson["actual_price"];
            if (parseFloat(price) > 1 && price !== '') {
                actual_price = price;
            }
            $('#start_row').remove();

            var _table_id = '#' + table_id;
            //console.log('insert table ' + _table_id);
            var totalLine = getTotalLine();
            var order_ele = '';
            if (order_id !== '') {
                order_ele = '<input type="hidden" value="' + order_id + '" name="product[' + totalLine + '][order_id]" />';
            }

            $(_table_id + ' > tbody').append(
                    '<tr id="' + data.idLineIndex + '" class="product_line">' +
                    '<td width="40px" class="align-middle"><button class="btn btn-icon waves-effect waves-light btn-primary" type="button" onclick="removeLine(' + "'" + table_id + dataJson["code"] + "'" + ');"> <i class="fas fa-times"></i> </button>' +
                    '<input type="hidden" name="product_code" value="' + dataJson["code"] + '"/></td>' +
                    '<td class="align-middle">' + dataJson["name"] + description + '<input type="hidden" name="product[' + totalLine + '][product_id]" value="' + dataJson["id"] + '" id="' + data.idProduct + '"/></td>' +
                    '<td  width="100px" class="align-middle">' +
                    '<input type="tel" class="form-control" style="width:100px;" value="' + actual_price + '" name="product[' + totalLine + '][price]" id="' + data.idPrice + '" data-id="product_price" onclick="formEditOnModal()" onkeyup="reCalculateAllLine();" data-action="numpad">' +
                    '<input type="hidden" value="' + warehouse_id + '" name="product[' + totalLine + '][warehouse_id]">' +
                    '<input type="hidden" value="' + dataJson["max_discount"] + '" name="product[' + totalLine + '][max_discount]" id="' + data.idMaxDiscount + '">' +
                    '<input type="hidden" value="' + dataJson["actual_price"] + '" name="product[' + totalLine + '][actual_price]" id="' + data.idActualPrice + '">' +
                    order_ele +
                    '</td>' +
                    '<td  width="100px" class="align-middle text-right">' +
                    '<span id="' + data.idQtyLabel + '">' + 1 + '</span>' +
                    '<input type="hidden" name="product[' + totalLine + '][qty]" value="' + 1 + '" id="' + data.idQty + '"/></td>' +
                    '<td class="text-right align-middle">'+dataJson['weight']['value']+'</td>'+
                    '<td width="120px" class="align-middle text-right"><span id="' + data.idAmtLabel + '">' + 0 + '</span></td>' +
                    '</tr>'
                    );
            $("#" + data.idPriceLabel).html(Number(dataJson["actual_price"]).toLocaleString('en'));
        }

        function getTotalLine() {
            var _table_id = '#' + table_id;
            var rowCount = $(_table_id + ' > tbody tr').length;
            rowCount = parseInt(rowCount) + 1;
            return rowCount;
        }
    };

});

function reCalculateAllLine() {
    var totalAmt = 0;
    var count = 1;

    $('#list_product > tbody tr').each(function () {
        console.log('re-cal list_product');
        if ($(this).attr('id') !== 'start_row') {
            var inputProductCode = $(this).find('input[name="product_code"]');
            var productCode = (inputProductCode.val());
            var productCodeEle = productCode.replace(' ', '_');
            console.log(productCodeEle);
            var data = setDefaultDataId('list_product' + productCodeEle);

            var price = parseInt($('#' + data.idPrice).val());
            console.log('#' + data.idPrice);
            price = isNaN(price)?0:price;
            console.log(price);
            var qty = parseInt($('#' + data.idQty).val());
            //var max_discount = parseInt($('#' + data.idMaxDiscount).val());
            //var actual_price = parseInt($('#' + data.idActualPrice).val());
            var amount = price * qty;
            totalAmt = totalAmt + amount;

            $("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
            $("#" + data.idLineNo).html(count);
            count++;


        }


    });

    console.log('re-cal list_exchange ' + totalAmt);
    var exchange_count = 0;
    $('#list_exchange > tbody tr').each(function () {
        //$(this).addClass("foo");
        //var inputInvoiceDocNo = $(this).find('input[name="invoice_docno"]');
        // var invoiceDocno = (inputInvoiceDocNo.val());
        var data = setDefaultDataId('list_exchange' + exchange_count);

        var price = parseInt($('#' + data.idPrice).val());
        price = isNaN(price)?0:price;

        var qty = 1;
        var amount = totalAmt - price;
        if(exchange_count>0 && price === 0){
            amount = 0;
        }
        console.log(price);
        console.log(qty);

        totalAmt = totalAmt - amount;
        $("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
        exchange_count++;
    });


    $('#list_glitem > tbody tr').each(function () {
        console.log('re-cal list_glitem');
        var code = $(this).find('input[name="glitem_code"]');
        var code = (code.val());
        var data = setDefaultDataId('list_glitem' + code);

        var price = parseInt($('#' + data.idPrice).val());
        price = isNaN(price)?0:price;

        var qty = 1;
        var amount = price * qty;

        totalAmt = totalAmt + amount;

    });
    console.log('re-cal list_glitem ' + totalAmt);

    $('#list_order_product > tbody tr').each(function () {
        console.log('re-cal list_order_product');
        if ($(this).attr('id') !== 'start_row') {
            var inputProductCode = $(this).find('input[name="product_code"]');
            var productCode = (inputProductCode.val());
             var productCodeEle = productCode.replace(' ', '_');
            var data = setDefaultDataId('list_order_product' + productCodeEle);

            var price = parseInt($('#' + data.idPrice).val());
            price = isNaN(price)?0:price;
            var qty = parseInt($('#' + data.idQty).val());
            var amount = price * qty;
            totalAmt = totalAmt + amount;

            $("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
            $("#" + data.idLineNo).html(count);
            count++;
        }

    });
    if (totalAmt < 0) {
        $('#totalamt_title_label').html('จ่ายเงินคืนลูกค้า');
    } else {
        $('#totalamt_title_label').html('มูลค่าสินค้า');
    }


    //Update total box

    $("#subtotalamt").val(totalAmt).trigger('change');
    //$("#subtotalamt_label").html(Number(totalAmt).toLocaleString('en'));
    //$("#totalamt_label").html(Number(totalAmt).toLocaleString('en'));
}
;

function removeLine(_code) {

    var productCodeEle = _code.replace(' ', '_');
    Swal.fire({
        title: "ต้องการลบรายการสินค้านี้?",
        text: "",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ลบ"
    }).then(function (t) {
        //console.log(t);
        if (t.value) {
            console.log('remove line:' + productCodeEle);
            var data = setDefaultDataId(productCodeEle);

            $('#' + data.idLineIndex).remove();
            reCalculateAllLine();
        } else {
            return false;
        }
    });



}
;

function setDefaultDataId(code) {
    console.log(code);
    var data = {
        idLineIndex: code + '_line',
        idLineNo: code + '_no',
        idProduct: code + '_product',
        idQty: code + '_qty',
        idMaxDiscount: code + '_max_discount',
        idActualPrice: code + '_actual_price',
        idQtyLabel: code + '_qty_label',
        idPrice: code + '_price',
        idPriceLabel: code + '_price_label',
        idAmtLabel: code + '_amt_label'
    };

    return data;
}

function formEditOnModal() {
    $(":focus").each(function () {
        //alert("Focused Elem_id = " + this.id);
        var currentValue = $('#' + this.id).val();
        $('#_text_edit_modal').val(currentValue);
        //$('#form_text_edit').modal('show');
    });

    $('#form_text_edit_save').on('click', function () {
        var editedValue = $('#_text_edit_modal').val();
        $('#' + this.id).val(editedValue);

        $('#form_text_edit').modal('hide');
    });
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

    $("[data-type=modal_edit]").on('click', function () {
        console.log('clicked ' + $(this).attr('id'));
    });

    $('#form_text_edit').modal({
        backdrop: 'static',
        show: false,
        keyboard: false  // to prevent closing with Esc button (if you want this too)
    });


    $("#list_exchange_modal > tbody tr").click(function () {
        var selected = $(this).hasClass("table-success");
        $("#list_exchange_modal > tbody tr").removeClass("table-success");
        if (!selected) {
            //console.log($(this).attr('id'));
            $(this).addClass("table-success");
            $('#invoice_exchange_id').val($(this).attr('id'));
        }

    });

    //Product zone
    //on click search
    $('#search_product').on('click', function () {
        var code = $('#product_code').val();
        $('#product_code').val('');
        $('#product_code').focus();
        var warehouse_id = $('#warehouse_id').val();
        $(document).productProcess(code, warehouse_id, 'list_product', '', 0, '');
    });
    $(document).keypress(function (e) {
        if (e.which === 13) {
            $('#product_code').val('');
            $('#product_code').focus();
        }
    });


    $('#receipt_bt_ok').on('click', function (e) {
        var receiptamt = parseInt($('#receiptamt').val());
        $("#receiptamt_label").html(Number(receiptamt).toLocaleString('en'));
    });


    Validation.initValidation();


});
