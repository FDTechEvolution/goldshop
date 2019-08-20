
$(function () {
    setDefaultToDayDate('docdate');

    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    };

    $.fn.productProcess = function (productCode, warehouse_id, table_id, description) {
        if (description === 'undefined' || description === undefined) {
            description = '';
        } else {
            description = '<br/><small style="line-height: 1rem;">' + description + '</small>';
        }
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

        data = setDefaultDataId(table_id + productCode);
        var _qty = parseInt($('#' + data.idQty).val()) + 1;
        var dataJson = [];



        $.post(SITE_URL + "products/getdetailjson/", {code: productCode, warehouse_id: warehouse_id, qty: _qty}, function (_data) {
            //onsole.log(_data);
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
                console.log(dataJson);

                data = setDefaultDataId(table_id +  dataJson["code"]);
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

            var _table_id = '#' + table_id;
            console.log('insert table ' + _table_id);
            var totalLine = getTotalLine();
            $(_table_id + ' > tbody').append(
                    '<tr id="' + data.idLineIndex + '" class="product_line">' +
                    '<td width="40px"><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeLine(' + "'" + table_id + dataJson["code"] + "'" + ');"> <i class="fa fa-remove"></i> </button>' +
                    '<input type="hidden" name="product_code" value="' + dataJson["code"] + '"/></td>' +
                    '<td>' + dataJson["name"] + description + '<input type="hidden" name="product[' + totalLine + '][product_id]" value="' + dataJson["id"] + '" id="' + data.idProduct + '"/></td>' +
                    
                    '<td  width="100px" class="text-right">' +
                    '<span id="' + data.idQtyLabel + '">' + 1 + '</span>' +
                    '<input type="hidden" name="product[' + totalLine + '][qty]" value="' + 1 + '" id="' + data.idQty + '"/></td>' +
                  '<input type="hidden" value="' + warehouse_id + '" name="product[' + totalLine + '][warehouse_id]">' +
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
            var data = setDefaultDataId('list_product' + productCode);

            var price = parseInt($('#' + data.idPrice).val());
            var qty = parseInt($('#' + data.idQty).val());
            var amount = price * qty;
            totalAmt = totalAmt + amount;

            $("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
            $("#" + data.idLineNo).html(count);
            count++;
        }


    });
    
    
}
;

function removeLine(_code) {
    console.log('remove line:' + _code);
    var data = setDefaultDataId(_code);

    $('#' + data.idLineIndex).remove();
    reCalculateAllLine();
}
;

function setDefaultDataId(code) {
    var data = {
        idLineIndex: code + '_line',
        idLineNo: code + '_no',
        idProduct: code + '_product',
        idQty: code + '_qty',
        idQtyLabel: code + '_qty_label',
        idPrice: code + '_price',
        idPriceLabel: code + '_price_label',
        idAmtLabel: code + '_amt_label'
    };

    return data;
}




$(document).ready(function () {
    //Product zone
    //on click search
    $('#search_product').on('click', function () {
        var code = $('#product_code').val();
        $('#product_code').val('');
        $('#product_code').focus();
        var warehouse_id = $('#warehouse_id').val();
        $(document).productProcess(code, warehouse_id, 'list_product');
    });
     $(document).keypress(function (e) {
        if (e.which === 13) {
            $('#product_code').val('');
            $('#product_code').focus();
        }
    });


    $("#frm").on("submit", function () {
        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        count_row = count_row+$('#list_order_product > tbody tr').length;
        
        if (count_row < 1) {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'ยังไม่ได้ระบุรายการสินค้า', '');
            return false;
        }


    });

});
