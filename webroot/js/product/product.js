$(document).ready(function () {

    if ($('#_weight_id').length > 0) {
        $('#weight_id').val($('#_weight_id').val());
    }

    $('#bt_delete').on('click', function () {
        var product_id = $(this).attr('data-id');


        Swal.fire({
            title: "ต้องการลบรายการสินค้านี้?",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ลบ"
        }).then(function (t) {
            //console.log(t);
            if (t.value) {
                $('#frm_delete').submit();
            } else {
                return false;
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
        console.log('type changed');
        generatename();
    });
    $('#size_id').change(function () {
        console.log('size_id changed');
        generatename();
    });
    $('#manual_weight').on('keyup', function () {
        console.log('manual_weight changed');
        generatename();
    });
    $('#weight_id').change(function () {
        console.log('weight_id changed' + $('#weight_id').val());
        $('#_weight_id').val($('#weight_id').val());
        if ($(this).val() === '0') {
            $('#box_manual_weight').show();
        } else {
            $('#box_manual_weight').hide();
            $('#manual_weight').val('');
        }
        generatename();

    });
    

    $('#design_id').change(function () {
        console.log('design_id changed');
        generatename();
    });
    $('#percent').change(function () {
        console.log('percent changed');
        generatename();
    });
    $('#manual_weight').on('keyup', function () {
        console.log('manual_weight changed');
        generatename();
    });
    //generatename();
    //});

    function generatename() {
        console.log('generatename');
        /*
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
         if (weight_text !== '' && weight_text !== 'อื่น ๆ') {
         product_name = product_name + ' ' + weight_text;
         }
         if (weight_text === 'อื่น ๆ') {
         var manual_weight = $('#manual_weight').val();
         if (manual_weight == '0' || manual_weight == '') {
         
         } else {
         product_name = product_name + ' ' + manual_weight + 'g';
         }
         
         }
         * 
         */


        var product_name_url = SITE_URL + 'service-product/generate-name';
        var data = {
            "product_category_id": $("#product_category_id").val(),
            "size_id": $("#size_id").val(),
            "weight_id": $("#weight_id").val(),
             
            "design_id": $("#design_id").val(),
            "percent": $("#percent").val(),
            "manual_weight": $("#manual_weight").val()
        };
        console.log(data);
        $.get(product_name_url, data)
                .done(function (data) {
                    var resJson = JSON.parse(data);
                    //console.log(resJson);
                    $('#name').val(resJson.product_name);

                });



    }

    function refreshOption(jsonData) {
        console.log('refreshOption');
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

        if ($('#_size_id').length > 0) {
            $('#size_id').val($('#_size_id').val());
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

        if ($('#_design_id').length > 0) {
            console.log('found design: ' + $('#_design_id').val());
            var design_id = $('#_design_id').val();
            var count = 0;
            var founed = false;
            do {
                $("#design_id > option").each(function () {
                    if (this.value === design_id) {
                        $("#design_id").val(design_id).change();
                        founed = true;
                    }
                    //alert(this.text + ' ' + this.value);
                });
                count++;
            } while (count < 3 && founed === false);

            //$('#design_id').val($('#_design_id').val());
        }
        generatename();
    }
});