$(function () {


    setDefaultToDayDate('datepicker');

    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    };

    $.fn.sales = function (productCode, warehouse_id) {
        var data = {
            idLineIndex: '',
            idLineNo: '',
            idProduct: '',
            idQty: '',
            idQtyLabel: '',
            idPrice: '',
            idPriceLabel: '',
            idAmtLabel: ''
        };
        var dataJson = [];
        console.log('get product');
        setDefaultDataId(productCode);
        var _qty = parseInt($('#' + data.idQty).val()) + 1;
        $.post(SITE_URL + "products/getdetailjson/", {code: productCode, warehouse_id: warehouse_id, qty: _qty}, function (_data) {
            //console.log(_data);
            if (_data === 'notfound') {
                var audio = document.getElementById("error_sound");
                audio.play();
                $.Notification.autoHideNotify('error', 'top right', 'ไม่พบสินค้าหรือบริการ', '');

            } else if (_data === 'nostock') {
                var audio = document.getElementById("error_sound");
                audio.play();
                $.Notification.autoHideNotify('error', 'top right', 'ไม่พบสินค้าในคลัง', '');
            } else {
                dataJson = JSON.parse(_data);

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

            }
        });

        function insertRow() {
            $('#start_row').remove();
            var totalLine = getTotalLine();
            $("#list_product > tbody").append(
                    '<tr id="' + data.idLineIndex + '" class="product_line">' +
                    '<td><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeLine(' + "'" + dataJson["code"] + "'" + ');"> <i class="fa fa-remove"></i> </button></td>' +
                    '<td><span id="' + data.idLineNo + '">' + totalLine + '</span><input type="hidden" name="product_code" value="' + dataJson["code"] + '"/></td>' +
                    '<td>' + dataJson["name"] + '<input type="hidden" name="product[' + totalLine + '][product_id]" value="' + dataJson["id"] + '" id="' + data.idProduct + '"/></td>' +
                    '<td>' +
                    '<span id="' + data.idPriceLabel + '" style="display:none;">' + dataJson["actual_price"] + '</span> ' +
                    '<input type="text" value="' + dataJson["actual_price"] + '" name="product[' + totalLine + '][price]" id="' + data.idPrice + '" data-id="product_price" onkeyup="reCalculateAllLine();">' +
                    '<input type="hidden" value="' + warehouse_id + '" name="product[' + totalLine + '][warehouse_id]">' +
                    '</td>' +
                    '<td>' +
                    '<span id="' + data.idQtyLabel + '">' + 1 + '</span>' +
                    '<input type="hidden" name="product[' + totalLine + '][qty]" value="' + 1 + '" id="' + data.idQty + '"/></td>' +
                    '<td><span id="' + data.idAmtLabel + '">' + 0 + '</span></td>' +
                    '</tr>'
                    );
            $("#" + data.idPriceLabel).html(Number(dataJson["actual_price"]).toLocaleString('en'));
        }

        function getTotalLine() {
            var rowCount = $('#list_product > tbody tr').length;
            rowCount = parseInt(rowCount) + 1;
            return rowCount;
        }



        window.reCalculateAllLine = function (_code) {

            setDefaultDataId(_code);
            var totalAmt = 0;
            var count = 1;

            $('#list_product > tbody tr').each(function () {
                //$(this).addClass("foo");
                var inputProductCode = $(this).find('input[name="product_code"]');
                var productCode = (inputProductCode.val());
                setDefaultDataId(productCode);

                var price = parseInt($('#' + data.idPrice).val());
                var qty = parseInt($('#' + data.idQty).val());
                var amount = price * qty;
                totalAmt = totalAmt + amount;

                $("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
                $("#" + data.idLineNo).html(count);
                count++;

            });

            //Update total box

            $("#subtotalamt").val(totalAmt);
            $("#subtotal_label").html(Number(totalAmt).toLocaleString('en'));
            $("#totalamt_label").html(Number(totalAmt).toLocaleString('en'));
        };

        window.removeLine = function (_code) {
            console.log('remove line:' + _code);
            setDefaultDataId(_code);

            $('#' + data.idLineIndex).remove();
            reCalculateAllLine();
        };

        function setDefaultDataId(code) {
            data = {
                idLineIndex: code + '_line',
                idLineNo: code + '_no',
                idProduct: code + '_product',
                idQty: code + '_qty',
                idQtyLabel: code + '_qty_label',
                idPrice: code + '_price',
                idPriceLabel: code + '_price_label',
                idAmtLabel: code + '_amt_label'
            };
        }


    };

});




function productProcess() {
    var code = $('#product_code').val();
    //alert(code);
    $('#product_code').val('');
    $('#product_code').focus();
    //getProduct(code);
    var warehouse_id = $('#warehouse_id').val();
    $(document).sales(code, warehouse_id);
}


$(function () {
    $(document).pos();
    $(document).on('scan.pos.barcode', function (event) {
        //alert(event.code);
        //access `event.code` - barcode data
        //getProduct(event.code);
        var warehouse_id = $('#warehouse_id').val();
        $(document).sales(event.code, warehouse_id);
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
});


$(document).ready(function () {

    $('input:radio[name="customer_type"]').change(function () {
        var selected = $(this).val();//alert($(this).val());
        if (selected === 'save') {
            $('#customer_box').show();
        } else {
            $('#customer_box').hide();
        }

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
        productProcess();
    });

    //on press enter key
    $(document).keypress(function (e) {
        if (e.which === 13) {
            //productProcess();
            $('#product_code').val('');
            $('#product_code').focus();
        }
    });

    $('#receipt_bt_ok').on('click', function (e) {
        var receiptamt = parseInt($('#receiptamt').val());
        $("#receiptamt_label").html(Number(receiptamt).toLocaleString('en'));
    });


    Validation.initValidation();

    $("#frm").on("submit", function () {
        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        if (count_row < 1) {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'ยังไม่ได้ระบุรายการสินค้า', '');
            return false;
        }

        if ($('#customer_type').val() === 'save' && $('#bpartner_id').val() === '') {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'กรุณาระบุข้อมูลลูกค้า', '');
            return false;
        }

    });

    $('#list_exchange_modal_save').click(function () {
        var invoice_exchange_id = $('#invoice_exchange_id').val();

        if (invoice_exchange_id !== '') {
            $.post(SITE_URL + "invoices/getdetailjson/", {invoice_id: invoice_exchange_id}, function (_data) {
                if (_data === 'notfound') {
                    var audio = document.getElementById("error_sound");
                    audio.play();
                    $.Notification.autoHideNotify('error', 'top right', 'ไม่พบสินค้าหรือบริการ', '');

                } else {

                    dataJson = JSON.parse(_data);
                    console.log(dataJson);
                    $('#list_exchange').show();

                    $("#list_exchange > tbody").append(
                            '<tr id="' + dataJson['id'] + '" class="product_line">' +
                            '<td><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeLine(' + "'" + dataJson["id"] + "'" + ');"> <i class="fa fa-remove"></i> </button></td>' +
                            '<td>' + dataJson["invoice_lines"][0]['product']['name']+'</td>' +
                            '<td>' +
                            '<span id="' + dataJson['id'] + '_price"></span> ' +
                            '</td>' +
                            '</tr>'
                            );
                    
                    $("#" + dataJson['id']+'_price').html(Number(dataJson["totalamt"]).toLocaleString('en'));
                    //reCalculateAllLine();

                }
            });
        }
        $('#exchange_product_form').modal('hide');

    });



});
