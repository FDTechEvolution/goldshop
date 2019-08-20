
$(function () {
    jQuery('#docdate').datepicker({
        //    language: 'th',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true

    });
    setDefaultToDayDate('docdate');

});

$(document).ready(function () {

    $('button[name="payment_method_bt"]').on('click', function () {
        var Method = this.value;

        if (Method === 'withdraw') {
            $('#fee').show();

        } else {
            $('#fee').hide();
        }
        $('#func').val(Method);


        $('button[name="payment_method_bt"]').addClass('btn-light').removeClass('btn-success');
        $(this).addClass('btn-success');


    });


    $('#subm').click(function () {
        var bpartner_id = $('#bpartner_id').val();
        var balance = parseInt($('#balance').val());
        var amt = parseInt($('#amount').val());
        //  var type = $('input[name=type]:checked').val()
        var type = $('#func').val();
        if (amt === 0) {
            swal({
                title: "ล้มเหลว",
                text: "กรุณากรอกจำนวนเงินก่อนบันทึกรายการ",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: 'แก้ไข !'

            });
            $('#amount').focus();
            return false;
        }

        if (type === 'withdraw' && amt > balance) {

            swal({
                title: "ล้มเหลว",
                text: "เงินในบัญชีของท่านมีไม่เพียงพอ",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: 'แก้ไข !'

            });
            $('#amount').focus();
            return false;
        } else {
            console.log(type);
            if (type === 'withdraw') {
                var texttype = 'ถอนเงินออม ' + Number(amt).toLocaleString('en') + ' บาท?';
            } else {
                $('#myform').submit();
            }

            swal({
                title: texttype,
                text: '',
                type: "info",
                showCancelButton: true,
                confirmButtonClass: 'btn-success waves-effect waves-light',
                cancelButtonClass: 'btn-warning waves-effect waves-light',
                confirmButtonText: 'ตกลง ',
                cancelButtonText: 'ยกเลิก',
                closeOnCancel: true,
                closeOnConfirm: false
            }, function (isConfirm) {
                if (isConfirm) {
                    //$('#myform').submit();
                    swal({
                        title: "เพื่อความแน่ใจ",
                        text: "กรุณาตรวจสอบให้แน่ใจว่าได้เสียบบัตรประชาชนแล้ว",
                        type: "info",
                        showCancelButton: true,
                        cancelButtonClass: 'btn-secondary waves-effect waves-light',
                        confirmButtonClass: 'btn-primary waves-effect waves-light',
                        confirmButtonText: 'เสียบแล้ว',
                        cancelButtonText: 'ยกเลิก',
                        loseOnCancel: true,
                        closeOnConfirm: false
                    }, function (isConfirm) {
                        if (isConfirm) {
                            $('#page-load').show();
                            $('#page-load-label').text('ตรวจสอบเงินออมของลูกค้า');
                            $('#page-load-label').text('ตรวจสอบบัตรประชาชน');
                            var url = SITE_URL + "saving-accounts/ajax-validation-saving-with-card/";
                            console.log('Checking get card info');
                            var response = '';
                            $.ajax({
                                type: "POST",
                                url: url,
                                async: false,
                                data: {bpartner_id: bpartner_id, usesavingamt: amt},
                                success: function (_response) {
                                    response = _response;
                                }
                            });

                            var jsonData = JSON.parse(response);

                            console.log(jsonData);
                            if (jsonData.status === '200') {
                                $('#myform').submit();
                            } else {
                                $('#page-load-label').text('');
                                $('#page-load').hide();
                                swal({
                                    title: jsonData.msg,
                                    text: '',
                                    type: "warning",
                                    showCancelButton: false,
                                    confirmButtonClass: 'btn-warning',
                                    confirmButtonText: "OK",
                                    closeOnConfirm: true
                                });
                                return false;
                            }
                        } else {
                            return false;
                        }
                    });
                }
            });
        }
    });
});