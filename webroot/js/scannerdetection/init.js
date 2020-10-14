/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('#bt-scan').on('click', function () {
        let status = $(this).attr('data-status');

        $(this).attr('data-status', 'ON');
        $(this).text('SCAN QR is ON');
        $(this).removeClass('btn-outline-secondary');
        $(this).addClass('btn-success');

    });

    $(document).on('click', function () {
        //console.log($('#bt-scan'));
        if ($('#bt-scan').is(":focus")) {
            console.log('Focus');
        } else {
            console.log('No focus');
            $('#bt-scan').text('SCAN QR');
            $('#bt-scan').attr('data-status', 'OFF');
            $('#bt-scan').removeClass('btn-success');
            $('#bt-scan').addClass('btn-outline-secondary');
        }
    });
});