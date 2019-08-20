/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('#bt_order').on('click', function () {
        console.log('get order');
        var bpartner_id = $('#bpartner_id').val();
        if (bpartner_id !== '') {
            $.get(SITE_URL + "service-orders/get-order?bpartner_id="+bpartner_id+'&type=sales', function () {

            }).done(function (data) {
                var json = JSON.parse(data);
                console.log(json);
                $('#list_order_table > tbody').empty();
                $.each(json, function (key, value) {
                    var str = '<tr role="row" class="hand-cursor" id="' + value.id + '">';
                    str = str + '<td>' + value.bpartner_name + '</td>';
                    str = str + '<td>' + value.docdate + '</td>';
                    str = str + '<td>' + value.description + '</td>';
                    str = str + '<td>' + value.totalpaid + '</td>';
                    str = str + '</tr>';
                    $('#list_order_table > tbody').append(str);
                });

                $("#list_order_table > tbody tr").click(function () {
                    var selected = $(this).hasClass("table-success");
                    $("#list_exchange_modal > tbody tr").removeClass("table-success");
                    if (!selected) {
                        //console.log($(this).attr('id'));
                        $(this).addClass("table-success");
                        $('#order_id').val($(this).attr('id'));
                    }

                });
            });
        } 

    });

    $('#list_order_modal_save').click(function () {
        var order_id = $('#order_id').val();
        console.log(order_id);
        if (order_id !== '') {
            $.get(SITE_URL + "service-orders/get-order?id=" + order_id, function (_data) {

                if (_data === 'notfound') {
                    var audio = document.getElementById("error_sound");
                    audio.play();
                    $.Notification.autoHideNotify('error', 'top right', 'ไม่พบรายการสั่งซื้อ', '');
                } else {
                    dataJson = JSON.parse(_data);
                    console.log(dataJson);
                    var lines = dataJson[0]['original']['order_lines'];

                    $.each(lines, function (i, item) {
                        var product_code = item['product']['code'];
                        if (product_code !== null) {
                            var warehouse_id = $('#warehouse_id').val();
                            $("#list_order_product > tbody").empty();
                            $(document).productProcess(product_code, warehouse_id, 'list_product', 'รายการสั่งซื้อเลขที่ ' + dataJson[0]['original']['docno'], item['totalamt'], order_id);
                        }
                    });

                    // GL type deposit
                    var deposit_amount = dataJson['totalpaid'];
                    if (deposit_amount > 0) {
                        $('#list_glitem').show();
                        $.post(SITE_URL + "glitems/getdetailjson/", {code: 'deposit'}, function (gldata) {
                            var gldataJson = JSON.parse(gldata);
                            console.log(gldataJson);
                            var data = setDefaultDataId('list_glitem' + gldataJson.code);
                            $("#list_glitem > tbody").empty();
                            $("#list_glitem > tbody").append(
                                    '<tr id="' + data.idLineIndex + '" class="product_line">' +
                                    '<td width="40px"></td>' +
                                    '<td>' + gldataJson["name"] + '</td>' +
                                    '<td class="text-danger" width="120px">' +
                                    '<input type="hidden" name="glitem_code" value="' + gldataJson["code"] + '"/>' +
                                    '<input type="hidden" name="glitems[0][glitem_id]" value="' + gldataJson["id"] + '"/>' +
                                    '<input type="hidden" name="glitems[0][glitem_amount]" value="' + (deposit_amount * -1) + '" id="' + data.idPrice + '"/>' +
                                    '<span id="' + data.idAmtLabel + '"></span> ' +
                                    '</td>' +
                                    '</tr>'
                                    );
                            $("#" + data.idAmtLabel).html(Number((deposit_amount * -1)).toLocaleString('en'));
                            reCalculateAllLine();

                            //Remove order tr
                            $('#' + order_id).remove();
                        });

                    }
                    //end deposit

                    //Update description
                    var des = $('#description').val();
                    //$('#description').val(des + '-ใบสั่งซื้อเลขที่ ' + dataJson['docno'] + '\n');

                }
            });
        }
        $('#order').modal('hide');
    });
});