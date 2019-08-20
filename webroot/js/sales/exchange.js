
$(document).ready(function () {

    $('#exchange_modal_save').click(function () {
        var product = '';
        var description = '';
        var price = 0;

        //var type_id = $('#type option:selected').val();
        var product_category_id = $('#product_category_id option:selected').val();
        var percent_id = $('#percent option:selected').val();
        var design_id = $('#design_id option:selected').val();
        var weight = $('#weight').val();
        // var description = $('#description').val();

        // var type_element = '';
        var product_cat_element = '';
        var percent_element = '';
        var design_element = '';
        var weight_element = '';
        var price_element = '';
        var isexchange_element = '';
        var product_element = '';

        // var totalLine = getTotalLine();
        var totalLine = $('#list_exchange > tbody tr').length;
        totalLine = parseInt(totalLine);
        var _name = 'list_exchange' + totalLine;
        var data = setDefaultDataId(_name);

        price = $('#price').val();
        //var description = $('#description').val();

        if (product_category_id !== '') {
            product = product + $('#product_category_id option:selected').text();
            product_cat_element = '<input type="hidden" name="exchange_product[' + totalLine + '][product_category_id]" value="' + product_category_id + '"/>';
        } else {
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุหมวดหมู่', '');
            return false;
        }


        if (percent_id !== '') {
            product = product + ' ' + $('#percent option:selected').text();
            percent_element = '<input type="hidden" name="exchange_product[' + totalLine + '][percent]" value="' + percent_id + '"/>';
        }
        if (design_id !== '') {
            product = product + ' ลาย' + $('#design_id option:selected').text();
            design_element = '<input type="hidden" name="exchange_product[' + totalLine + '][design_id]" value="' + design_id + '"/>';
        }
        if (weight !== '') {
            product = product + ' ' + $('#weight').val() + 'g';
            weight_element = '<input type="hidden" name="exchange_product[' + totalLine + '][weight]" value="' + weight + '"/>';
        } else {
            $('#weight').focus();
            var audio = document.getElementById("error_sound");
            audio.play();
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุน้ำหนัก', '');
            return false;
        }

        if (price === '') {
            price = 0;
        }

        isexchange_element = '<input type="hidden" name="exchange_product[' + totalLine + '][isexchange]" value="Y"/>';
        product_element = '<input type="hidden" name="exchange_product[' + totalLine + '][product_name]" value="' + product + '"/>';
        price_element = '<input type="text" style="width:100px;" value="' +price + '" name="exchange_product[' + totalLine + '][price]" id="' + data.idPrice + '" data-id="product_price" onkeyup="reCalculateAllLine();">';

        $('#start_row').remove();
        $("#list_exchange > tbody").append(
                '<tr id="' + data.idLineIndex + '" class="product_line">' +
                    '<td width="40px">'+
                    '   <button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeLine(' + "'" + _name + "'" + ');"> <i class="fa fa-remove"></i> </button>'+
                    '</td>' +
                    '<td>' +product+'<br/><span class="badge badge-danger">ใช้แลกเปลี่ยน</span></td>' +
                    '<td class="text-danger" width="120px">' +
                       price_element+
                    '</td>' +
                    '<td  width="100px">' +
                        '<span id="' + data.idQtyLabel + '">' + 1 + '</span>' +
                    '</td>'+
                     '<td width="120px"><span id="' + data.idAmtLabel + '">' + 0 + '</span></td>' +
                     product_element+percent_element+weight_element+design_element+product_cat_element+isexchange_element+
                '</tr>'
                );
        
        $('#list_exchange').show();
     

        reCalculateAllLine();
        $('#exchange_product_form').modal('hide');

    });
});