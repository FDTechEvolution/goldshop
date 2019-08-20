/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(function () {

    $("#frrm").validate({
        rules: {
            income_type: {
                required: true
            },
            amount: {
                required: true
            },
            docdate: {
                required: true
            }

        },
        messages: {
            income_type: {
                required: "กรุณาระบุรายการ"
            },
            amount: {
                required: "กรุณาระบุจำนวนเงิน"
            },
            docdate: {
                required: "กรุณาระบุวันทำรายการ"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});