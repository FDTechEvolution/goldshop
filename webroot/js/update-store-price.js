/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    var url = SITE_URL + 'api-gold-prices/update-store-price';
    $.ajax({
        type: "GET",
        url: url,
        async: false,
        data: {},
        success: function (_response) {
            response = _response;
            var json = JSON.parse(_response);
            if (json.update_status === 'yes') {
                console.log('update-store-price');
            }

        }
    });
});