$(function () {


    setDefaultToDayDate('docdate');

    jQuery('#duedate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

    //setDefaultToDayDate('duedate');

    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    };

    $.fn.purchase = function () {
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




        $('#start_row').remove();
        var product = '';
        var description = '';
        var price = 0;

        var type_id = $('#type option:selected').val();
        var product_category_id = $('#product_category_id option:selected').val();
        var percent_id = $('#percent option:selected').val();
        var design_id = $('#design_id option:selected').val();
        var weight_id = $('#weight_id option:selected').val();

        var type_element = '';
        var product_cat_element = '';
        var percent_element = '';
        var design_element = '';
        var weight_element = '';
        var price_element = '';
        var description_element = '';
        var product_element = '';
        var totalLine = getTotalLine();
        setDefaultDataId(totalLine);

        var price = $('#price').val();
        var description = $('#description').val();

        if (product_category_id !== '') {
            product = product + $('#product_category_id option:selected').text();
            product_cat_element = '<input type="hidden" name="product[' + totalLine + '][product_category_id]" value="' + product_category_id + '"/>';
        } else {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุหมวดหมู่', '');
            return false;
        }
        if (type_id !== '') {
            product = product + ' ' + $('#type option:selected').text();
            type_element = '<input type="hidden" name="product[' + totalLine + '][type]" value="' + type_id + '"/>';
        } else {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุประเภท', '');
            return false;
        }

        if (percent_id !== '') {
            product = product + ' ' + $('#percent option:selected').text();
            percent_element = '<input type="hidden" name="product[' + totalLine + '][percent]" value="' + percent_id + '"/>';
        }
        if (design_id !== '') {
            product = product + ' ลาย' + $('#design_id option:selected').text();
            design_element = '<input type="hidden" name="product[' + totalLine + '][design_id]" value="' + design_id + '"/>';
        }
        if (weight_id !== '') {
            product = product + ' ' + $('#weight_id option:selected').text();
            weight_element = '<input type="hidden" name="product[' + totalLine + '][weight_id]" value="' + weight_id + '"/>';
        } else {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุน้ำหนัก', '');
            return false;
        }

        product_element = '<input type="hidden" name="product[' + totalLine + '][product_name]" value="' + product + '"/>';
        price_element = '<input type="hidden" name="product[' + totalLine + '][price]" value="' + price + '" id="' + data.idPrice + '"/>';
        description_element = '<input type="hidden" name="product[' + totalLine + '][description]" value="' + description + '"/>';

        //console.log(product);




        $("#list_product > tbody").append(
                '<tr id="' + data.idLineIndex + '" class="product_line">' +
                '<td><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeLine(' + "'" + totalLine + "'" + ');"> <i class="fa fa-remove"></i> </button></td>' +
                '<td><span id="' + data.idLineNo + '">' + totalLine + '</span></td>' +
                '<td>' + product + '<br/>' + description + product_element + description_element + '</td>' +
                '<td>' +
                '<span id="' + data.idPriceLabel + '">' + price + '</span> ' +
                price_element +
                '</td>' + product_cat_element + type_element + percent_element + design_element + weight_element +
                '</tr>'
                );
        $("#" + data.idPriceLabel).html(Number(price).toLocaleString('en'));

        reCalculateAllLine(totalLine);

        function getTotalLine() {
            var rowCount = $('#list_product > tbody tr').length;
            rowCount = parseInt(rowCount) + 1;
            return rowCount;
        }



        function reCalculateAllLine(line) {
            console.log('reCalculateAllLine');
            //setDefaultDataId(line);
            var totalAmt = 0;
            var count = 1;

            $('#list_product > tbody tr').each(function () {
                //$(this).addClass("foo");
                //var inputProductCode = $(this).find('input[name="product_code"]');
                //var productCode = (inputProductCode.val());
                setDefaultDataId(count);

                var price = parseInt($('#' + data.idPrice).val());
                //var qty = parseInt($('#' + data.idQty).val());
                //var amount = price * qty;
                totalAmt = totalAmt + price;

                //$("#" + data.idAmtLabel).html(Number(amount).toLocaleString('en'));
                $("#" + data.idLineNo).html(count);
                count++;

            });

            //Update total box

            $("#subtotalamt").val(totalAmt);
            $("#subtotalamt_label").html(Number(totalAmt).toLocaleString('en'));
            //$("#totalamt_label").html(Number(totalAmt).toLocaleString('en'));
        }

        window.removeLine = function (_totalLine) {
            console.log('remove line:' + _totalLine);
            setDefaultDataId(_totalLine);

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



$(document).ready(function () {
    Validation.initValidation();

    $("#frm").on("submit", function () {
        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        if (count_row < 1) {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'ยังไม่ได้ระบุรายการรับซื้อ', '');
            return false;
        }

        if ($('#customer_type').val() === 'save' && $('#bpartner_id').val() === '') {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'กรุณาระบุข้อมูลลูกค้า', '');
            return false;
        }

    });




    //Product zone

    //on click search
    $('#add_bt').on('click', function () {
        $(document).purchase();
    });

    //on press enter key
    $(document).keypress(function (e) {
        if (e.which === 13) {
            $(document).purchase();
        }
    });







});
