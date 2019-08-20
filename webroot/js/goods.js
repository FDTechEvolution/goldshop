$(function () {
    jQuery('#docdate').datepicker({
        //language: 'th',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });

   

    //setDefaultToDayDate('docdate');

});


$(document).ready(function () {

    $('input:radio[name="customer_type"]').change(function () {
        var selected = $(this).val();//alert($(this).val());
        if(selected ==='save'){
            $('#customer_box').show();
        }else{
            $('#customer_box').hide();
        }
       
    });

});
