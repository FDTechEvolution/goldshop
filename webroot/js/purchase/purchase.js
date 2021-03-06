$(function () {
    setDefaultToDayDate('docdate');
    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    };

    $.fn.purchase = function () {
        var data = {
            dataId: '',
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

        //var type_id = $('#type option:selected').val();
        var product_category_id = $('#product_category_id option:selected').val();
        var percent_id = $('#percent option:selected').val();
        var design_id = $('#design_id option:selected').val();
        var weight = $('#weight').val();
        var description = $('#description').val();

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

        price = $('#price').val();
        var price_sd = parseFloat($('#price_sd').val());

        var description = $('#description').val();

        if (product_category_id !== '') {
            product = product + $('#product_category_id option:selected').text();
            product_cat_element = '<input type="hidden" name="product[' + totalLine + '][product_category_id]" value="' + product_category_id + '"/>';
        } else {
            var audio = document.getElementById("error_sound");
            audio.play();
            //$.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุหมวดหมู่', '');
            notisErr('จำเป็นต้องระบุหมวดหมู่');
            return false;
        }


        if (percent_id !== '') {
            product = product + ' ' + $('#percent option:selected').text();
            percent_element = '<input type="hidden" name="product[' + totalLine + '][percent]" value="' + percent_id + '"/>';
        }
        if (design_id !== '') {
            //product = product + ' ลาย' + $('#design_id option:selected').text();
            design_element = '<input type="hidden" name="product[' + totalLine + '][design_id]" value="' + design_id + '"/>';
        }
        if (weight !== '') {
            product = product + ' ' + $('#weight').val() + 'g';
            weight_element = '<input type="hidden" name="product[' + totalLine + '][weight]" value="' + weight + '"/>';
        } else {
            $('#weight').focus();
            //var audio = document.getElementById("error_sound");
            //audio.play();
            //$.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุน้ำหนัก', '');
            notisErr('จำเป็นต้องระบุน้ำหนัก');
            return false;
        }

        if (price === '') {
            notisErr('กรุณาระบุจำนวนเงิน หรือ ราคา');
            return false;
        }

        product_element = '<input type="hidden" name="product[' + totalLine + '][product_name]" value="' + product + '"/>';
        price_element = '<input type="hidden" name="product[' + totalLine + '][price]" value="' + price + '" id="' + data.idPrice + '"/>';
        var expect_price_element = '<input type="hidden" name="product[' + totalLine + '][expect_price]" value="' + price_sd + '" />';
        description_element = '<input type="hidden" name="product[' + totalLine + '][description]" value="' + description + '"/>';

        $("#list_product > tbody").append(
                '<tr id="' + data.idLineIndex + '" class="product_line" data-id="' + data.dataId + '">' +
                '<td class="align-middle"><button class="btn btn-icon waves-effect waves-light btn-primary" type="button" onclick="removeLine(' + "'" + totalLine + "'" + ');"> <i class="fas fa-times"></i> </button></td>' +
                '<td class="align-middle"><span id="' + data.idLineNo + '">' + totalLine + '</span></td>' +
                '<td class="align-middle">' + product + '<br/>' + description + product_element + description_element + '</td>' +
                '<td class="align-middle text-right">'+weight+'</td>'+
                '<td class="align-middle text-right">' +
                '<span id="' + data.idPriceLabel + '">' + price + '</span> ' +
                price_element + expect_price_element +
                '</td>' + product_cat_element + percent_element + design_element + weight_element +
                '</tr>'
                );
        $("#" + data.idPriceLabel).html(Number(price).toLocaleString('en'));

        reCalculateAllLine(totalLine);

        function getTotalLine() {
            //var rowCount = $('#list_product > tbody tr').length;
           // rowCount = parseInt(rowCount) + 1;
           var dt = new Date();
           var time = dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();
            return time;
        }



        function reCalculateAllLine(line) {

            $('#weight').val('');
            $('#price').val('');

            console.log('reCalculateAllLine');
            //setDefaultDataId(line);
            var totalAmt = 0;
            var count = 1;

            $('#list_product > tbody tr').each(function () {
                setDefaultDataId($(this).attr("data-id"));
                var price = parseInt($('#' + data.idPrice).val());
                totalAmt = totalAmt + price;
                $("#" + data.idLineNo).html(count);
                count++;
            });

            //Update total box

            $("#paidamt").val(totalAmt);
            $("#paidamt_label").html(Number(totalAmt).toLocaleString('en'));
        }

        window.removeLine = function (_totalLine) {
            
            
            Swal.fire({
                title:"ต้องการลบรายการสินค้านี้?",
                text:"",
                type:"warning",
                showCancelButton:!0,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"ลบ"
            }).then(function(t){
                //console.log(t);
                if (t.value) {
                    console.log('remove line:' + _totalLine);
                    setDefaultDataId(_totalLine);

                    $('#' + data.idLineIndex).remove();
                    reCalculateAllLine();
                } else {
                    return false;
                }
            });


        };

        function setDefaultDataId(code) {
            data = {
                dataId: code,
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
    //Get purchase price
    var bath_price = 0;
    $.get(SITE_URL + "api-gold-prices/price", function (data) {
        var jsonData = JSON.parse(data);
        bath_price = jsonData.gold_bar_purchase_price;
        bath_price = parseFloat(bath_price);
        console.log(bath_price);
        $('#weight').on('keyup', function () {
            if (bath_price > 0) {
                var price = Math.round((bath_price* 0.0656) * $(this).val());
                $('#price_sd').val(price);
                $('#price').val(price);
                console.log('Purchase standard price: ' + price);
            }
        });
    });

    //Product zone

    //on click search
    $('#add_bt').on('click', function () {
        var weight = parseFloat($('#weight').val());
        var diff_percent = 3;
        if (weight < 7.5) {
            diff_percent = 5;
        }

        var price_sd = parseFloat($('#price_sd').val());
        var price = parseFloat($('#price').val());
        var diff = price_sd * (diff_percent / 100);
        console.log(price);
        console.log('diff:' + diff);
        console.log('Price+diff: ' + parseFloat(price_sd + diff));
        console.log('Price-diff: ' + parseFloat(price_sd - diff));
        
        let minprice = price_sd-diff;
        let maxprice = price_sd;
        
        if (price > maxprice || price < minprice) {


            Swal.fire({
                title: 'ราคามีส่วนต่างมากเกินไป',
                text: "กรุณาตรวจสอบความถูกต้อง [คำนวนที่ " + minprice + " - " + maxprice + "]",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                onfirmButtonText: "ยืนยันราคา"}
            ).then(
                    function (t) {
                        if (t.value) {

                            $(document).purchase();
                        }else{
                            return false;
                        }

                    });
        } else {
            $(document).purchase();
        }


    });

    //on press enter key
    $(document).keypress(function (e) {
        if (e.which === 13) {
            $(document).purchase();
        }
    });

});
