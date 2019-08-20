function makePriceTable(box_id, type) {
    $.post(SITE_URL + "service-gold-prices/daily-price/", {})
            .done(function (_data) {
                var dataJson = JSON.parse(_data.replace(/&quot;/g,'"'));
                console.log(dataJson);
                if (type === 'purchase') {
                    $(box_id).append('<h4 class="prompt-400 text-center text-primary">ราคารับซื้อทองประจำวันที่ '+dataJson['pricedate']+'</h4>');

                    var str = '<table class="table table-sm"><thead><tr><th>น้ำหนัก</th><th class="text-right">ราคารับซื้อ</th></tr></thead><tbody>';
                    var lines = dataJson['price'];
                    $.each( lines, function( key, value ) {
                        str = str+'<tr><td>'+value['weight']+'</td><td class="text-right">'+Number(value['purchase']).toLocaleString('en')+'</td></tr>';
                    });
                    str = str+'</tbody></table>';
                     $(box_id).append(str);
                }

                if (type === 'all') {
                    $(box_id).append('<h4 class="prompt-400 text-center text-primary">ราคาซื้อ-ขายทองประจำวันที่ '+dataJson['pricedate']+'</h4>');
                    var str = '<table class="table table-sm"><thead><tr><th>น้ำหนัก</th><th class="text-right">ราคาซื้อ</th><th class="text-right">ราคาขาย</th></tr></thead><tbody>';
                    var lines = dataJson['price'];
                    $.each( lines, function( key, value ) {
                        str = str+'<tr><td>'+value['weight']+'</td><td class="text-right">'+Number(value['purchase']).toLocaleString('en')+'</td><td class="text-right">'+Number(value['sales']).toLocaleString('en')+'</td></tr>';
                    });
                    str = str+'</tbody></table>';
                     $(box_id).append(str);
                }
            })
            .fail(function (xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
            });
}

$(document).ready(function () {
    //box_gold_price
    var box_purchase_id = '#box_gold_purchase_price';
    if ($(box_purchase_id).length > 0) {
        console.log('get gold price');
        makePriceTable(box_purchase_id, 'purchase');
    }
    
    var box_sales_id = '#box_gold_all_price';
    if ($(box_sales_id).length > 0) {
        console.log('get gold price');
        makePriceTable(box_sales_id, 'all');
    }


});
