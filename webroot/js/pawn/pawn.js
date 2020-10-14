function  showpic(event) {

    var position = $(event).parent().parent().attr('poid');

    var name = $('#showimg' + position);



    if (event.files && event.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#showimg' + position + '').attr('src', e.target.result);
        };

        reader.readAsDataURL(event.files[0]);
    }
}

function amt() {
    //Clear input
    $('#weight').val('');
    $('#price').val('');

    var amt = $('#totalmoney').val();
    var type = $('#type option:selected').val();
    if (amt <= 24999) {
        $("#type").val("3%");
        cal("3%");
    } else if (amt >= 25000 && amt <= 29999) {
        $("#type").val("2.5%");
        cal("2.5%");
    } else if (amt >= 30000 && amt <= 79999) {
        $("#type").val("2%");
        cal("2%");
    } else if (amt >= 80000 && amt <= 99999) {
        $("#type").val("1.75%");
        cal("1.75%");
    } else {
        $("#type").val("1.5%");
        cal("1.5%");
    }

}


$(document).ready(function () {

    //Check duplicate documentno
    $('#docno').on('keyup', function () {
        var pawn_id = '';
        if($('#pawn_id').length>0 && $('#pawn_id').val() !==''){
            pawn_id = $('#pawn_id').val();
        }
        var _docno = $(this).val();
        $.get(SITE_URL + 'service-pawn/check-documentno?branch_id=' + branch_id + '&docno=' + _docno+'&pawn_id='+pawn_id).done(function (res) {
            var jsonData = JSON.parse(res);
            console.log(jsonData);
            if (jsonData.isduplicate) {
                notisErr('"' + jsonData.docno + '" ไม่สามาระใช้งานได้ มีการใช้งานไปแล้ว');
                $('#docno').val(_docno.slice(0,-1));
                $('#docno').focus();
            }
        });
    });

    $('#adddata').click(function () {
        var type_id = $('#typep option:selected').val();
        var product_category_id = $('#product_category_id option:selected').val();
        var percent_id = $('#percent option:selected').val();
        var design_id = $('#design_id option:selected').val();
        var weight = $('#weight').val();
        // var product = $('#product_category_id option:selected').text() + ' ' + $('#typep option:selected').text() + ' ' + $('#percent option:selected').text() + ' ' + ' ลาย' + $('#design_id option:selected').text() + ' ' + $('#weight_id option:selected').text();
        var product = '';
        var imgPath = $('#uploadpichidden').val();
        var uppath = $('#uploadpic').val();

        var price = $('#price').val();

        var expect_price = parseFloat($('#expect_price').val());
        //var des = $('#description2').val();

        var index = $('#index').val();
        //$('#divtype').show();
        var detail = $('#product_id option:selected').text();
        var id = $('#product_id').val();

        var type_element = '';
        var product_cat_element = '';
        var percent_element = '';
        var design_element = '';
        var weight_element = '';
        var product_element = '<input type="hidden" name="product_id[]" value=""/>';


        if (product_category_id !== '') {
            product = $('#product_category_id option:selected').text();
            product_cat_element = '<input type="hidden" name="product_category_id[]" value="' + product_category_id + '"/>';
        } else {
            //$.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุหมวดหมู่', '');
            notisErr('จำเป็นต้องระบุหมวดหมู่');
            return false;
        }

        if (percent_id !== '') {
            product = product + ' ' + $('#percent option:selected').text();
            percent_element = '<input type="hidden" name="percent[]" value="' + percent_id + '"/>';
        }

        /*
         if (design_id !== '') {
         product = product + ' ลาย' + $('#design_id option:selected').text();
         design_element = '<input type="hidden" name="design_id[]" value="' + design_id + '"/>';
         }
         * 
         */

        if (weight !== '') {
            product = product + ' ' + weight + 'g';
            weight_element = '<input type="hidden" name="weight[]" value="' + weight + '"/>';
        } else {
            //$.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุน้ำหนัก', '');
            //$.NotificationApp.send("Heads up!","Check below fields please.","top-center","#da8609","warning");
            notisErr('จำเป็นต้องระบุน้ำหนัก');

            return false;
        }
        console.log(price);
        if (price === '') {

            //$.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุราคา', '');
            notisErr('จำเป็นต้องระบุราคา');
            return false;
        }

        price = parseFloat(price);

        //Check valid over price
        if (price > (expect_price + (expect_price * 0.15))) {
            Swal.fire({
                title: 'ราคามีส่วนต่างมากเกินไป',
                text: "กรุณาตรวจสอบความถูกต้องของข้อมูล",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "แก้ไข",
                confirmButtonText: "ยืนยันราคา"
            }).then(function (t) {
                //console.log(t);
                if (t.value) {
                    $("#listdata").append(
                            '<tr poid="' + index + '">' +
                            '<td><button type="button" class="btn btn-icon waves-effect waves-light btn-primary remCF" data-action="line-remove"><i class="fas fa-times"></i></button></td>' +
                            '<td ><img id="showimg' + index + '" class="thumb-image" height="40" width="40"/></td> <td><input type="file" onchange="showpic(this);"    id="img" name="img[]"    /></td>' +
                            '<td>' + product + '<input type="hidden"  id="detail" name="detail[]" value="' + product + '"  /></td>' +
                            '<td class="text-right">' + Number(price).toLocaleString('en') + '<input type="hidden"  id="' + index + '" name="price[]" value="' + price + '"  /><input type="hidden"  id="' + index + '" name="expect_price[]" value="' + expect_price + '"  /></td>' +
                            '</td>' +
                            product_cat_element + percent_element + design_element + weight_element + product_element +
                            '</tr>');


                    $(".remCF").click(function () {
                        var thisele = $(this);
                        Swal.fire({
                            title: 'ยืนยันการลบข้อมูลนี้?',
                            text: "",
                            type: "warning",
                            showCancelButton: !0,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            cancelButtonText: "ยกเลิก",
                            confirmButtonText: "ลบ"
                        }).then(function (t) {

                            if (t.value) {
                                var position = thisele.parent().parent().attr('poid');
                                console.log(parseInt($('#' + position + '').val()));

                                if (!isNaN(parseInt($('#' + position + '').val()))) {
                                    var ptm = parseInt($('#totalmoney').val()) - parseInt($('#' + position + '').val());
                                    $('#totalmoney').val(ptm);
                                    $('#totalmoneyshow').html(ptm);
                                    var type = $('#type').val();
                                    cal(type);
                                    thisele.parent().parent().remove();
                                }
                            }
                        });


                    });





                    var ttm = parseInt($('#totalmoney').val()) + parseInt(price);
                    var newindex = (parseInt(index) + 1);
                    $('#index').val(newindex);
                    $('#totalmoney').val(ttm);
                    //$('#totalmoneyshow').html(ttm);
                    $("#totalmoneyshow").html(Number(ttm).toLocaleString('en'));
                    amt();
                    index++;

                    $('#modal-pawn-detail').modal('hide');

                } else {
                    return false;
                }
            });
        } else {
            $("#listdata").append(
                    '<tr poid="' + index + '">' +
                    '<td><button type="button" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 remCF " data-action="line-remove"><i class="fas fa-times"></i></button></td>' +
                    '<td ><img id="showimg' + index + '" class="thumb-image" height="40" width="40"/></td> <td><input type="file" onchange="showpic(this);"    id="img" name="img[]"    /></td>' +
                    '<td>' + product + '<input type="hidden"  id="detail" name="detail[]" value="' + product + '"  /></td>' +
                    '<td class="text-right">' + Number(price).toLocaleString('en') + '<input type="hidden"  id="' + index + '" name="price[]" value="' + price + '"  /><input type="hidden"  id="' + index + '" name="expect_price[]" value="' + expect_price + '"  /></td>' +
                    '</td>' +
                    product_cat_element + percent_element + design_element + weight_element + product_element +
                    '</tr>');


            $(".remCF").click(function () {
                var thisele = $(this);
                Swal.fire({
                    title: 'ยืนยันการลบข้อมูลนี้?',
                    text: "",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "ยกเลิก",
                    confirmButtonText: "ลบ"
                }).then(function (t) {
                    if (t.value) {
                        var position = thisele.parent().parent().attr('poid');
                        console.log(parseInt($('#' + position + '').val()));

                        if (!isNaN(parseInt($('#' + position + '').val()))) {
                            var ptm = parseInt($('#totalmoney').val()) - parseInt($('#' + position + '').val());
                            $('#totalmoney').val(ptm);
                            $('#totalmoneyshow').html(ptm);
                            var type = $('#type').val();
                            cal(type);
                            thisele.parent().parent().remove();
                        }
                    }

                });


            });

            var ttm = parseInt($('#totalmoney').val()) + parseInt(price);
            var newindex = (parseInt(index) + 1);
            $('#index').val(newindex);
            $('#totalmoney').val(ttm);
            //$('#totalmoneyshow').html(ttm);
            $("#totalmoneyshow").html(Number(ttm).toLocaleString('en'));
            amt();
            index++;
            $('#modal-pawn-detail').modal('hide');
        }

    });


    $('#expiredate').change(function () {

        var start = $('#date').datepicker('getDate');
        var end = $('#expiredate').datepicker('getDate');
        var diffDays = (end - start) / 1000 / 60 / 60 / 24;
        $('#totald').val(diffDays);
    });


    $('#type').change(function () {


        var type = $('#type').val();
        cal(type);
    });


});

$(function () {
    jQuery('#expiredate').datepicker({
        //  language: 'th',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });
});

$(function () {
    jQuery('#date').datepicker({
        //  language: 'th',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
    });
});
setDefaultToDayDate('date');

function toFixed(num, pre) {
    num *= Math.pow(10, pre);
    num = (Math.round(num, pre) + (((num - Math.round(num, pre)) >= 0.5) ? 1 : 0)) / Math.pow(10, pre);
    return num.toFixed(pre);
}