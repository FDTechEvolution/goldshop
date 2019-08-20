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

function getIP(json) {
    return json.ip;
}

$.fn.purchaseVerify = function () {

    if (!isHasProductLine()) {
        return;
    }
    if (!isValidCustomerInfo()) {
        return;
    }
    if (!isCorrectReceipt()) {
        return;
    }
    if(!isCorrectPrice()){
        return;
    }


    function isCorrectReceipt() {
        console.log('Checking amount and receipt is match.');
        var amount = $('#subtotalamt').val();
        var discount = $('#discountamt').val();
        var savingamt = parseFloat($('#savingamt').val());
        var receiptamt = $('#receiptamt').val();
        var totalamt = amount - discount - savingamt;

        if (receiptamt < totalamt) {
            swal({
                title: "รับเงินไม่ครบ",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "OK",
                closeOnConfirm: true
            });
            return false;
        }
        return true;
    }

    function isValidCustomerInfo() {
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
        return true;
    }

    function isHasProductLine() {
        console.log('Checking product row.');
        $('#start_row').remove();
        var count_row = $('#list_product > tbody tr').length;
        count_row = count_row + $('#list_order_product > tbody tr').length;

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
        return true;
    }

    function isCorrectPrice() {
        //Check price
        var price_total = 0;
        var max_discount_total = 0;
        var actual_price_total = 0;
        var discount = $('#discountamt').val();
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

        if ((price_total) < (actual_price_total - max_discount_total) || (actual_price_total+(actual_price_total*0.015) <price_total)) {
            swal({
                title: "ราคามีส่วนต่างมากเกินไป",
                text: "กรุณาตรวจสอบความถูกต้องของข้อมูล",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-warning',
                confirmButtonClass: 'btn-success',
                cancelButtonText: "แก้ไข",
                confirmButtonText: "ยืนยันราคา",
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    isValidSavingAccount();
                } else {
                    return false;
                }
            });
        }else{
            isValidSavingAccount();
        }
        
    }
    
    
    function isValidSavingAccount() {
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
                        data: {bpartner_id: bpartner_id, usesavingamt: savingamt},
                        success: function (_response) {
                            response = _response;
                        }
                    });

                    var jsonData = JSON.parse(response);

                    console.log(jsonData);
                    if (jsonData.status === '200') {
                        return true;
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
        } else {
            submit();
        }
    }

    function submit() {
        $('#frm').submit();
    }

};

//bt_doc_save
$(document).ready(function () {

    $("#bt_submit").on("click", function () {
         $(document).purchaseVerify();
    });
});