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
                            duedate: {
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
                            duedate:
                                    {
                                        required: 'กรุณาระบุวันครบกำหนด'
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
    $("#bt_submit").on("click", function () {
        var isCorrect = true;

        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        if (count_row < 1) {
            isCorrect = false;
            swal({
                title: "ยังไม่ได้ระบุรายการสินค้า",
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
        if (isCorrect === true) {
            $('#frm').submit();
        }

    });
});