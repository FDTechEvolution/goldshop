$(document).ready(function () {

    $('#bt_delete').on('click', function () {
        var product_id = $(this).attr('data-id');
        swal({
            title: 'ต้องการลบสินค้านี้?',
            text: "กรุณาตรวจสอบความถูกต้องของข้อมูล",
            type: "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-secondary waves-effect waves-light',
            confirmButtonClass: 'btn-success waves-effect waves-light',
            confirmButtonText: 'ลบ',
            cancelButtonText: 'ยกเลิก',
            loseOnCancel: true,
            closeOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                
                $('#frm_delete').submit();
            }
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        $('#showimg').show();
        readURL(this);
    });

    var product_category_id = $('#product_category_id').val();
   // console.log(product_category_id);
    $.getJSON(SITE_URL + "products/getproductoptionjson/" + product_category_id, function (data) {
        //console.log(data);
        if (data === 'notfound') {

        } else {
            refreshOption(data);
            if (data.isservice === 'Y') {
                $('#box_size').hide();
                $('#box_weight').hide();
                $('#box_design').hide();
                $('#box_percent').hide();
                $('#box_cost').hide();
                $('#box_img').hide();
                $('#isservice').val('Y');
            } else {
                $('#box_size').show();
                $('#box_weight').show();
                $('#box_design').show();
                $('#box_percent').show();
                $('#box_cost').show();
                $('#box_img').show();
                $('#isservice').val('N');
            }
        }
    });

    //$(function () {
        $('#product_category_id').change(function () {
            console.log(this.value);
            $.getJSON(SITE_URL + "products/getproductoptionjson/" + this.value, function (data) {
                //console.log(data);
                if (data === 'notfound') {
                    
                } else {
                    //console.log(data);
                    refreshOption(data);

                    if (data.isservice === 'Y') {
                        $('#box_size').hide();
                        $('#box_weight').hide();
                        $('#box_design').hide();
                        $('#box_percent').hide();
                        $('#box_cost').hide();
                        $('#box_img').hide();
                        $('#isservice').val('Y');
                    } else {
                        $('#box_size').show();
                        $('#box_weight').show();
                        $('#box_design').show();
                        $('#box_percent').show();
                        $('#box_cost').show();
                        $('#box_img').show();
                        $('#isservice').val('N');
                    }
                }
            });

        });

        $('#type').change(function () {
            generatename();
        });
        $('#size_id').change(function () {
            generatename();
        });
        $('#weight_id').change(function () {
            generatename();
        });
        $('#design_id').change(function () {
            generatename();
        });
        //generatename();
    //});

    function generatename() {
        var product_category_text = $("#product_category_id option:selected").text();
        //var type_text = $("#type option:selected").text();
        var size_text = $("#size_id option:selected").text();
        var weight_text = $("#weight_id option:selected").text();
        var design_text = $("#design_id option:selected").text();

        var product_name = product_category_text;
        if (design_text !== '') {
            product_name = product_name + ' ' + design_text;
        }
        if (size_text !== '') {
            product_name = product_name + ' ' + size_text;
        }
        if (weight_text !== '') {
            product_name = product_name + ' ' + weight_text;
        }
        $('#name').val(product_name);
    }

    function refreshOption(jsonData) {
        var $size = $('select[name=size_id]');
        $size.empty();
        var sizes = jsonData.sizes;
        for (var i = 0; i < sizes.length; i++) {
            $size.append($('<option>',
                    {
                        value: sizes[i]['id'],
                        text: sizes[i]['name']
                    }));
        }

        var $design = $('select[name=design_id]');
        $design.empty();
        var designs = jsonData.designs;
        for (var i = 0; i < designs.length; i++) {
            $design.append($('<option>',
                    {
                        value: designs[i]['id'],
                        text: designs[i]['name']
                    }));
        }
        if (jsonData.unittype !== 'null') {
            $('#unittype').val(jsonData.unittype);
        }
        generatename();
    }
});