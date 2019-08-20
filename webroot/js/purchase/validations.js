var Validation = function () {
    return {
        //Validation
        initValidation: function () {
            $("#frm").validate({
                rules:
                        {
                            docdate:
                                    {
                                        required: true
                                    },
                            seller: {
                                required: true
                            },
                            warehouse_id: {
                                required: true
                            },

                        },

                // Messages for form validation
                messages:
                        {
                            seller:
                                    {
                                        required: 'กรูณาระบุเลือกผู้ทำรายการ'
                                    },
                            warehouse_id:
                                    {
                                        required: 'กรูณาระบุเลือกคลังสินค้าสำหรับเก็บสินค้ารับซื้อ'
                                    }

                        },

                // Do not change code below
                errorPlacement: function (error, element)
                {
                    error.insertAfter(element);
                }
            });
        }

    };
}();

$(document).ready(function () {
    Validation.initValidation();

    $("#savebutton").on("click", function () {
        var isCorrect = true;
        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        if (count_row < 1) {
            isCorrect = false;
            //$.Notification.autoHideNotify('error', 'top right', 'ยังไม่ได้ระบุรายการรับซื้อ', '');
            swal({
                title: "ยังไม่ได้ระบุรายการรับซื้อ",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "OK",
                closeOnConfirm: true
            });
        }

        if ($('#customer_type').val() === 'save' && $('#bpartner_id').val() === '') {
            isCorrect = false;
            swal({
                title: "กรุณาระบุข้อมูลลูกค้า",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "OK",
                closeOnConfirm: true
            });
        }

        if (isCorrect) {
            swal({
                title: 'ยืนยันการรับซื้อและจ่ายเงิน ?',
                text: "กรุณาตรวจสอบความถูกต้องของข้อมูล",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-secondary waves-effect waves-light',
                confirmButtonClass: 'btn-success waves-effect waves-light',
                confirmButtonText: 'บันทึก',
                cancelButtonText: 'ยกเลิก',
                loseOnCancel: true,
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    
                    $('#frm').submit();
                }
            });
        }

    });
});