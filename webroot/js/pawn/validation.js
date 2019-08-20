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
        if(!isHasProductLine()){
            return false;
        }
        
        //Check customer
        console.log('Checking customer info.');
        var bpartner_id = $('#bpartner_id').val();
        if (bpartner_id === '') {
            swal({
                title: 'ข้อมูลลูกค้าไม่สมบูรณ์',
                text: "",
                type: "error",
                showCancelButton: false,
                cancelButtonClass: 'btn-secondary waves-effect waves-light',
                confirmButtonClass: 'btn-success waves-effect waves-light',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                loseOnCancel: true,
                closeOnConfirm: true
            });
            return false;
        }
        
        swal({
            title: 'บันทึกข้อมูลสำหรับ "จำนำ" ?',
            text: "",
            type: "info",
            showCancelButton: true,
            cancelButtonClass: 'btn-secondary waves-effect waves-light',
            confirmButtonClass: 'btn-success waves-effect waves-light',
            confirmButtonText: 'บันทึก',
            cancelButtonText: 'ยกเลิก',
            loseOnCancel: true,
            closeOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                //$('#page-load').show();
                //$('#transaction_type').val('normal');
                $('#pawn').submit();
            }
        });
    });
    
    function isHasProductLine() {
        console.log('Checking product row.');
        $('#start_row').remove();
        var count_row = $('#listdata > tbody tr').length;
        
        if (count_row < 1) {
            swal({
                title: "ไม่พบรายการรับจำนำ",
                text: "",
                type: "error",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "ตกลง",
                closeOnConfirm: true
            });
            return false;
        }
        return true;
    }
});
