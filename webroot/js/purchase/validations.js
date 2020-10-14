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
            Swal.fire({title: "ยังไม่ได้ระบุรายการรับซื้อ", confirmButtonClass: "btn btn-primary mt-2"});

        }

        if ($('#customer_type').val() === 'save' && $('#bpartner_id').val() === '') {
            isCorrect = false;

            Swal.fire({title: "กรุณาระบุข้อมูลลูกค้า", confirmButtonClass: "btn btn-primary mt-2"});
        }

        if (isCorrect) {
            $('#frm').submit();
            /*Swal.fire({
                title: "ยืนยันการรับซื้อและจ่ายเงิน ?",
                text: "กรุณาตรวจสอบความถูกต้องของข้อมู",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                onfirmButtonText: "บันทึก"}
            ).then(
                    function (t) {
                        if (t.value) {

                            $('#frm').submit();
                        }

                    });
             * 
             */

        }

    });
});