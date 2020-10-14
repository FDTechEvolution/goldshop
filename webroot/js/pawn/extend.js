/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function reCalculate() {
    var startdate = $("#current_startdate").val();
    var enddate = $("#_expiredate").val();
    var rate = $('#type').val();
    var amount = $('#totalmoney').val();

    $.get(SITE_URL + "service-pawn/get-calculate-interrest", {start_date: startdate, end_date: enddate, rate: rate, amount: amount}).done(function (data) {
        var json = JSON.parse(data);
        var interrestamt = json.interrestamt;
        $('#interestamt').val(interrestamt).trigger('change');

        $('#t-rate').text(rate + "%");
        $('#t-interrestamt').text(interrestamt);

        var discountamt = $('#discountamt').val();
        var savingamt = $('#savingamt').val();
        var totalamt = interrestamt - discountamt - savingamt;

        $('#subtotalamt').val(interrestamt);
        $('#totalamt').val(totalamt);
        $('#t-totalamt').text(totalamt);

    });
}



function plushMonth(month_amt) {
    var month_amt = $('#extend_month_amt').val();
    var current_startdate = $("#current_startdate").datepicker('getDate');
    //console.log(current_expiredate.getFullYear());
    var new_date = new Date(current_startdate.getFullYear(), current_startdate.getMonth() + parseInt(month_amt), current_startdate.getDate());
    $("#_expiredate").datepicker("setDate", new_date);

    reCalculate();
}

$(document).ready(function () {
    $(function () {
        jQuery('#current_expiredate').datepicker({

            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

        jQuery('#_expiredate').datepicker({

            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
        $('#expiredate').val($('#_expiredate').val());

    });

    plushMonth();
    $('#extend_month_amt').on('change', function () {
        plushMonth();

        $('#expiredate').val($('#_expiredate').val());
    });
    $('#type').on('change', function () {
        plushMonth();
    });
    $('#discountamt').on('change', function () {
        plushMonth();
    });


    $('#bt_submit').on('click', function () {
        var totalamt = parseFloat($('#totalamt').val());
        var receiptamt = parseFloat($('#receiptamt').val());
        if (receiptamt >= totalamt) {
            Swal.fire({
                title: 'ยืนยันการต่อดอก ?',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "ยกเลิก"
            }).then(function (t) {
                if (t.value) {
                    $('#pawn').submit();
                }
            });
        } else {
            Swal.fire({title: "กรุณารับเงินให้ถูกต้อง", confirmButtonClass: "btn btn-primary mt-2"});
            return false;
        }

    });
});