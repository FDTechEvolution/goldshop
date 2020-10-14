

$(document).ready(function () {
    function validationFields() {
        var username = $('#username').val();
        var password = $('#password').val();
        
        if (username.length === 0) {
            $('#bt-submit').prop('disabled', true);
            return false;
        }
        if (password.length === 0) {
            $('#bt-submit').prop('disabled', true);
            return false;
        }
      


        $('#bt-submit').prop('disabled', false);

    }
    Validation.loginForm();


    $('#username').on('keyup', function () {
        validationFields();
    });
    $('#password').on('keyup', function () {
        validationFields();
    });
    
});