
    $(document).ready(function () {
        $('#divmoney').hide();
        $('#divnewtotalmoney').hide();
        $('#divnewinterrestrate').hide();
        $('#divnewrate').hide();
        $('#divdiscount').hide();

        $('button[name="payment_method_bt"]').on('click', function () {
            var Method = this.value;
            $('#func').val(Method);
            // $('#payment_method_label').html($(this).text());

            $('button[name="payment_method_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');

//            if (paymentMethod === 'TRAN') {
//                $('#bank_account_box').show();
//            } else {
//                $('#bank_account_box').hide();
//            }
        });
        $('button[name="editamount_bt"]').on('click', function () {
            var Method = this.value;
            $('#editamount').val(Method);
            // $('#payment_method_label').html($(this).text());

            $('button[name="editamount_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');
            $('#divmoney').show();

        });
        function editmoney() {

            var oldmoney = $('#newtotalmoney').val();
            if (oldmoney === null || oldmoney === '') {
                oldmoney = 0;
            }
            var moneytype = $('#editamount').val();
            var start;
            var end = $('#returndate').datepicker('getDate');
            if ($('#func').val() === 'return') {
                start = $('#docdate').datepicker('getDate');
            } else {
                start = $('#date').datepicker('getDate');
            }
            var diffDays = (end - start) / 1000 / 60 / 60 / 24;

            if (moneytype === 'addmoney') {
                var amt = parseInt(oldmoney) + parseInt($('#money').val());
                // $('#newtotalmoney').val();
                $('#newtotalmoney').val(amt);
                cal($('#type').val(), diffDays, amt);

            } else {
                var amt = parseInt(oldmoney) - parseInt($('#money').val());
                $('#newtotalmoney').val();
                $('#newtotalmoney').val(amt);
                cal($('#type').val(), diffDays, amt);

            }
        }
        $('#modalmoney').on('click', function () {
            $('#money').val($('#field-1').val());
            editmoney();
        });
        $('#money').on('click', function () {
            $('#con-close-modal').modal().show();
            editmoney();
        });
        $('#discount').on('click', function () {
            $('#modaldiscount').modal().show();

        });
        $('#modaldismoney').on('click', function () {

            if (parseInt($('#fielddis').val()) > parseInt($('#newinterrestrate').val())) {
                
                Swal.fire({title: "จำนวนเงินไม่ถูกต้อง",text:"กรอกส่วนลดเกินค่าดอกเบี้ย", confirmButtonClass: "btn btn-primary mt-2"});
                
                
            } else {
                $('#newinterrestrate').val($('#newinterrestrate').val() - $('#fielddis').val());
                $('#discount').val($('#fielddis').val());
            }
        });

        $('#returndate').change(function () {

            $('#divnewtotalmoney').show();
            $('#divnewinterrestrate').show();
            $('#divnewrate').show();
            $('#divdiscount').show();
            var method = $('#func').val();
            var amt = $('#totalmoney').val();
            if (method === 'return') {
                var start = $('#docdate').datepicker('getDate');
                var end = $('#returndate').datepicker('getDate');

                var diffDays = (end - start) / 1000 / 60 / 60 / 24;
                if (diffDays > 0) {


                    $('#totald').val(diffDays);
                    cal($('#type').val(), diffDays, amt);
                } else {
                    
                    Swal.fire({title: "วันที่ไม่ถูกต้อง",text:"กรุณากรอกวันที่มากกว่าวันเริ่มต้น", confirmButtonClass: "btn btn-primary mt-2"});
                
                    $('#returndate').val('');
                    
                    
                }
            } else {


                var start = $('#date').datepicker('getDate');
                var end = $('#returndate').datepicker('getDate');
                console.log(start);
                console.log(end);
                var diffDays = (end - start) / 1000 / 60 / 60 / 24;
                if (diffDays > 0) {
                    $('#totald').val(diffDays);
                    cal($('#type').val(), diffDays, amt);
                } else {
                     Swal.fire({title: "วันที่ไม่ถูกต้อง",text:"กรุณากรอกวันที่มากกว่าวันเริ่มต้น", confirmButtonClass: "btn btn-primary mt-2"});
                
                    $('#returndate').val('');
                }
            }

        });

        $('#type').change(function () {


            var type = $('#type').val();
            var amt = $('#totalmoney').val();
            cal(type, amt);


        });
        function cal(type, diffDays, amt) {

            //  var amt = $('#totalmoney').val();
//            var start = $('#docdate').datepicker('getDate');
//            var end = $('#returndate').datepicker('getDate');
//            var diffDays = (end - start) / 1000 / 60 / 60 / 24;

            // diffDays = diffDays + 1;
            // alert(diffDays);

            $.post('<?= SITE_URL ?>pawns/getinterrestrate', {"type": type, "diffDays": diffDays, "flag": true}, function (resp) {

                // alert(resp);
                $('#interrestrate').val(Math.ceil(resp * amt));
                $('#newinterrestrate').val(Math.ceil(resp * amt));
                alert(resp);
                
                var calrate = toFixed(resp * 100, 2);
                $('#rate').val(calrate);
                $('#newrate').val(calrate);
                //$('#interrestrateshow').val(Math.ceil(resp * amt));

            });

        }

    });
    

    function toFixed(num, pre) {
        num *= Math.pow(10, pre);
        num = (Math.round(num, pre) + (((num - Math.round(num, pre)) >= 0.5) ? 1 : 0)) / Math.pow(10, pre);
        return num.toFixed(pre);
    }

    $(function () {
        jQuery('#returndate').datepicker({
            //    language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#docdate').datepicker({
            //    language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#date').datepicker({
            //   language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $('#sa-params').click(function () {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ทำรายการ",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                $('#myform').submit();
            } 
        });
    });