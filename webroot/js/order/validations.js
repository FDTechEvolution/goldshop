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
                            docno:{
                                required: true
                            }

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
                                    },
                                    docno:
                                    {
                                        required: 'กรุณาระบุหมายเลขสั่งทำ'
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
            
            Swal.fire({title: "ยังไม่ได้ระบุรายการสินค้า", confirmButtonClass: "btn btn-primary mt-2"});
        }

        if ($('#customer_type').val() === 'save' && $('#bpartner_id').val() === '') {
            isCorrect = false;
            
            Swal.fire({title: "กรุณาระบุข้อมูลลูกค้า", confirmButtonClass: "btn btn-primary mt-2"});
            
        }
        if (isCorrect === true) {
            $('#frm').submit();
        }

    });
});