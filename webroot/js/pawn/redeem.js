/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function reCalculate() {
    var startdate = $("#current_startdate").val();
    var enddate = $("#_expiredate").val();
    var rate = $('#type').val();
    var amount = parseFloat($('#totalmoney').val());

    var current_startdate = $('#current_startdate').datepicker('getDate');
    var current_expiredate = $('#current_expiredate').datepicker('getDate');
    var returndate = $('#returndate').datepicker('getDate');

    var dayOverAmt = 0;
    var start_day = current_startdate.getDate();
    var start_month = current_startdate.getMonth();
    var start_year = current_startdate.getYear();

    var return_day = returndate.getDate();
    var return_month = returndate.getMonth();
    var return_year = returndate.getYear();

    var monthAmt = monthDiff(current_startdate, returndate);

    if (start_day > return_day) {
        var _current_startdate = current_startdate;
        _current_startdate.setMonth(_current_startdate.getMonth() + monthAmt);
        dayOverAmt = dayDiff(_current_startdate, returndate);
    } else {
        dayOverAmt = return_day - start_day;
    }


    $.get(SITE_URL + "service-pawn/get-calculate-interrest", {start_date: startdate, end_date:  $('#returndate').val(), rate: rate, amount: amount, daydiff: dayOverAmt}).done(function (data) {
        var json = JSON.parse(data);
        console.log(json);
        var interrestamt = parseFloat(json.interrestamt);
        var daydiff_interrestamt = parseFloat(json.day_diff.interrestamt);
        $('#daydiff').val(dayOverAmt).trigger('change');
        $('#interestamt').val(interrestamt).trigger('change');
        $('#interestamt2').val(daydiff_interrestamt).trigger('change');

        $('#t-rate').text("(" + monthAmt + "ด.) " + rate + "%");
        $('#t-interrestamt').text(Number(interrestamt).toLocaleString('en'));

        //console.log(daydiff_interrestamt);
        if (daydiff_interrestamt > 0) {
            $('#t-rate2').text("(" + json.day_diff.day_diff + "วัน) " + json.day_diff.rate + "%");
            $('#t-interrestamt2').text(Number(json.day_diff.interrestamt).toLocaleString('en'));
        } else {
            $('#t-rate2').text("");
            $('#t-interrestamt2').text(Number(0).toLocaleString('en'));
        }


        var discountamt = parseFloat($('#discountamt').val());
        var savingamt = parseFloat($('#savingamt').val());
        var totalamt = amount + ((interrestamt + daydiff_interrestamt) - discountamt - savingamt);

        $('#subtotalamt').val(amount + interrestamt + daydiff_interrestamt);
        $('#totalamt').val(totalamt);
        $('#t-totalamt').text(Number(totalamt).toLocaleString('en'));

    });
}

function dayDiff(d1, d2) {
    return  (d2 - d1) / 1000 / 60 / 60 / 24;
}

function monthDiff(d1, d2) {
    var months;
    /*
     months = (d2.getFullYear() - d1.getFullYear()) * 12;
     months -= d1.getMonth() + 1;
     months += d2.getMonth();
     return months <= 0 ? 0 : months;
     * 
     */

    // Months between years.
    var months = (d2.getFullYear() - d1.getFullYear()) * 12;

// Months between... months.
    months += d2.getMonth() - d1.getMonth();

// Subtract one month if b's date is less that a's.
    if (d2.getDate() < d1.getDate())
    {
        months--;
    }
    return months <= 0 ? 0 : months;
}

function toFixed(num, pre) {
    num *= Math.pow(10, pre);
    num = (Math.round(num, pre) + (((num - Math.round(num, pre)) >= 0.5) ? 1 : 0)) / Math.pow(10, pre);
    return num.toFixed(pre);
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

    $(function () {
        jQuery('#returndate').datepicker({

            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
    });

    setDefaultToDayDate('returndate');

    //plushMonth();
    $('#returndate').on('change', function () {
        reCalculate();
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
                title: 'ยืนยันการไถ่ถอน ?',
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

    reCalculate();
});



