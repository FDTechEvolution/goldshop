var Validation = function () {
    return {
        //Validation
        loginForm: function () {
            $("#frm-login").validate({
                rules:
                        {
                            username:
                                    {
                                        required: true
                                    },
                            password: {
                                required: true
                            }

                        },

                // Messages for form validation
                messages:
                        {
                            username:
                                    {
                                        required: 'กรูณาระบุเลือกผู้ทำรายการ'
                                    },
                            password:
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