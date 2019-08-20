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

//bt_doc_save
$(document).ready(function () {

    $("#bt_submit").on("click", function () {
        var isCorrect = false;

        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        count_row = count_row + $('#list_order_product > tbody tr').length;

        console.log('Checking product row.');
        if (count_row < 1) {
            swal({
                title: "ยังไม่ได้ระบุรายการสินค้า",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "OK",
                closeOnConfirm: true
            });
            return false;
        }

        console.log('Checking customer info.');
        if ($('#customer_type').val() === 'save' && $('#bpartner_id').val() === '') {
            swal({
                title: "กรุณาระบุข้อมูลลูกค้า",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "OK",
                closeOnConfirm: true
            });
            return false;
        }

        //Check receipt
        console.log('Checking amount and receipt is match.');
        var amount = $('#subtotalamt').val();
        var discount = $('#discountamt').val();
        var savingamt = parseFloat($('#savingamt').val());
        var receiptamt = $('#receiptamt').val();
        var totalamt = amount - discount - savingamt;

        if (receiptamt < totalamt) {
            swal({
                title: "ยอดเงินไม่ถูกต้อง",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "OK",
                closeOnConfirm: true
            });
            return false;
        }

        //Check price
        var price_total = 0;
        var max_discount_total = 0;
        var actual_price_total = 0;
        console.log('Checking product line prices.');
        $('#list_product > tbody tr').each(function () {

            if ($(this).attr('id') !== 'start_row') {
                var inputProductCode = $(this).find('input[name="product_code"]');
                var productCode = (inputProductCode.val());
                var data = setDefaultDataId('list_product' + productCode);

                var price = parseInt($('#' + data.idPrice).val());
                var max_discount = parseInt($('#' + data.idMaxDiscount).val());
                var actual_price = parseInt($('#' + data.idActualPrice).val());
                console.log('price: ' + price);
                console.log('actual_price: ' + actual_price);
                console.log('max_discount: ' + max_discount);
                price_total = price_total + price;
                max_discount_total = max_discount_total + max_discount;
                actual_price_total = actual_price_total + actual_price;
            }
        });

        if ((price_total - discount) < (actual_price_total - max_discount_total)) {
            swal({
                title: "แน่ใจหรือไม่ที่จะใช้ราคานี้?",
                text: "ราคามีส่วนต่างหรือลดมากเกินไป",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-warning',
                confirmButtonClass: 'btn-success',
                cancelButtonText: "แก้ไข",
                confirmButtonText: "ยืนยัน",
                closeOnConfirm: true
            }, function (isConfirm) {
                if (!isConfirm) {
                    return false;
                }
            });
        }


        //Check saving account
        console.log('Checking saving account,use ' + savingamt);
        if (savingamt > 0) {
            var bpartner_id = $('#bpartner_id').val();
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
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    $('#page-load').show();
                    $('#page-load-label').text('ตรวจสอบเงินออมของลูกค้า');
                    $('#page-load-label').text('ตรวจสอบบัตรประชาชน');
                    var url = SITE_URL + "scmanagements/getcard";
                    console.log('Checking get card info');
                    $.ajax({
                        type: "POST",
                        url: url,
                        async: false,
                        data: {},
                        success: function (response) {
                            
                            var jsonData = JSON.parse(response);
                            //console.log(jsonData.status);
                            if (jsonData['status'] === 'ok') {
                                var card_no = jsonData['cardno'];
                                $('#page-load-label').text('ตรวจสอบเงินออมของลูกค้า');
                                console.log('Checking saving account info');
                                $.ajax({
                                    type: "POST",
                                    url: SITE_URL + 'saving-accounts/ajax-get-saving-account/',
                                    async: false,
                                    data: {bpartner_id: bpartner_id, taxid: card_no},
                                    success: function (response) {
                                        //console.log(response);
                                        $('#page-load-label').text('');
                                        $('#page-load').hide();
                                        if (response === 'notfound') {
                                            swal({
                                                title: "ไม่พบข้อมูลเงินออมของลูกค้า",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: false,
                                                confirmButtonClass: 'btn-warning',
                                                confirmButtonText: "OK",
                                                closeOnConfirm: true
                                            });
                                            return false;
                                        } else {
                                            var dataJson = JSON.parse(response);
                                            console.log(dataJson);
                                            var balanceamt = dataJson['balanceamt'];
                                            if (savingamt > balanceamt) {
                                                isCorrect = false;
                                                swal({
                                                    title: "เงินออมของลูกค้าไม่เพียงพอ",
                                                    text: "ลูกค้ามีเงินออมคงเหลือ " + balanceamt,
                                                    type: "warning",
                                                    showCancelButton: false,
                                                    confirmButtonClass: 'btn-warning',
                                                    confirmButtonText: "OK",
                                                    closeOnConfirm: true
                                                }, function (isConfirm) {
                                                    
                                                });
                                            }
                                        }
                                    }
                                });

                            } else {
                                $('#page-load-label').text('');
                                $('#page-load').hide();
                                swal({
                                    title: "ไม่สำเร็จ",
                                    text: "ไม่สามารถดึงข้อมูลได้กรุณาลองใหม่อีกครั้ง",
                                    type: "error",
                                    showCancelButton: false,
                                    confirmButtonClass: 'btn-danger waves-effect waves-light',
                                    confirmButtonText: 'OK'
                                });
                                return false;
                            }
                        }
                    });
                }
            });

        }

        console.log('isCorrect:' + isCorrect);
        if (isCorrect === true) {
            $('#frm').submit();
        }
    });
});