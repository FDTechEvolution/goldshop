var Validation = function () {
    return {
        //Validation
        initValidation: function () {
            $("#pawn").validate({
                rules:
                        {
                            docdate:
                                    {
                                        required: true
                                    },
                            seller: {
                                required: true
                            },
                            docno: {
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
                                    },
                            docno:
                                    {
                                        required: 'กรุณาระบุหมายเลขรับจำนำ'
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

    $('#bt_save').click(function () {
        if (!isHasProductLine()) {
            return false;
        }

        //Check customer
        console.log('Checking customer info.');
        var bpartner_id = $('#bpartner_id').val();
        if (bpartner_id === '') {

            Swal.fire({title: "ข้อมูลลูกค้าไม่สมบูรณ์", confirmButtonClass: "btn btn-primary mt-2"});
            return false;
        }



        Swal.fire({
            title: "บันทึกข้อมูลสำหรับ จำนำ ?",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            onfirmButtonText: "บันทึก"}
        ).then(
                function (t) {
                    if (t.value) {

                        $('#pawn').submit();
                    }

                });
    });

    function isHasProductLine() {
        console.log('Checking product row.');
        $('#start_row').remove();
        var count_row = $('#listdata > tbody tr').length;

        if (count_row < 1) {

            Swal.fire({title: "ไม่พบรายการรับจำนำ", confirmButtonClass: "btn btn-primary mt-2"});
            return false;
        }
        return true;
    }
});
