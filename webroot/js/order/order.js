$(function () {


    setDefaultToDayDate('docdate');

    jQuery('#duedate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    };

    $.fn.sales = function (product_id) {
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

        //var _qty = parseInt($('#' + data.idQty).val()) + 1;
        $.post(SITE_URL + "products/getdetailjsonorder/", {product_id: product_id}, function (_data) {
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
                //console.log(_data);
                dataJson = JSON.parse(_data);
                data = setDefaultDataId(dataJson['code']);
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
                      '<td ><img id="showimg' + data.idLineIndex + '" class="thumb-image" height="40" width="40"/></td> <td><input style="width:100px;" type="file" onchange="showpic(this);"    id="img" name="product[' + totalLine + '][img]"    /></td>' +
                    '<td>' +
                 
                    '<input type="text" style="width:100px;" value="' + dataJson["actual_price"] + '" name="product[' + totalLine + '][price]" id="' + data.idPrice + '" data-id="product_price" onkeyup="reCalculateAllLine();">' +
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








    };

});
function  showpic(event) {

    var position = $(event).parent().parent().attr('id');

    



    if (event.files && event.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#showimg' + position + '').attr('src', e.target.result);
        }

        reader.readAsDataURL(event.files[0]);
    }
}
function reCalculateAllLine() {

    //setDefaultDataId(_code);
    var totalAmt = 0;
    var count = 1;

    $('#list_product > tbody tr').each(function () {
        //$(this).addClass("foo");
        if ($(this).attr('id') !== 'start_row') {
            var inputProductCode = $(this).find('input[name="product_code"]');
            var productCode = (inputProductCode.val());
            var data = setDefaultDataId(productCode);

            var price = parseInt($('#' + data.idPrice).val());
            var qty = parseInt($('#' + data.idQty).val());
            var amount = price * qty;
            totalAmt = totalAmt + amount;

            $("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
            $("#" + data.idLineNo).html(count);
            count++;
        }


    });


    //Update total box

    $("#subtotalamt").val(totalAmt);
    $("#subtotalamt_label").html(Number(totalAmt).toLocaleString('en'));
    $("#totalamt_label").html(Number(totalAmt).toLocaleString('en'));
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


function productProcess() {
    var product_id = $('#product_id').val();
    //alert(code);
    $('#product_name').val('');
    $('#product_id').val('');
    $('#product_id').focus();
    $(document).sales(product_id);
}


$(document).ready(function () {





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



    Validation.initValidation();

    


});
