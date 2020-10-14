/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//For resize iframe
function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
}

function setDefaultToDayDate(inpId) {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();
    var strMonth = (month < 10 ? '0' : '') + month;
    var strDay = (day < 10 ? '0' : '') + day;
    var strYear = d.getFullYear() + 543;

    var output = strDay + '/' + strMonth + '/' + strYear;
    //$('#datePicker').datepicker('setDate', realDate);
    //$('#' + inpId).val(output);
    //$('#' + inpId).datepicker('setDate', output);
    //console.log(output);

    //var queryDate = '2009-11-01';

    //var parsedDate = $.datepicker.parseDate('dd/mm/yyyy', d);
    //$("#mydate").datepicker().datepicker("setDate", new Date());
    $('#' + inpId).datepicker().datepicker("setDate", new Date());
}

function setDefaultDate(inpId, date) {
    var d = date;

    var month = d.getMonth() + 1;
    var day = d.getDate();
    var strMonth = (month < 10 ? '0' : '') + month;
    var strDay = (day < 10 ? '0' : '') + day;
    var strYear = d.getFullYear() + 543;

    var output = strDay + '/' + strMonth + '/' + strYear;
    $('#' + inpId).val(output);
    console.log(output);
}

$(window).bind("beforeunload", function () {
    $('#preloader').show();
});

//Page loading
$(document).ready(function () {
    $('#preloader').hide();

    validateTextbox();




});

function validateTextbox() {
    $("[data-type=float]").on("keypress keyup blur", function (event) {
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    $("[data-type=number]").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
}

jQuery.fn.ForceNumericOnly =
        function ()
        {
            return this.each(function ()
            {
                $(this).keydown(function (e)
                {
                    var key = e.charCode || e.keyCode || 0;
                    // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                    // home, end, period, and numpad decimal
                    return (
                            key == 8 ||
                            key == 9 ||
                            key == 13 ||
                            key == 46 ||
                            key == 110 ||
                            key == 190 ||
                            (key >= 35 && key <= 40) ||
                            (key >= 48 && key <= 57) ||
                            (key >= 96 && key <= 105));
                });
            });
        };
        