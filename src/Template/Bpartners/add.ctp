<?= $this->Html->script('/jquery.Thailand.js/dependencies/JQL.min.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/typeahead.bundle.js') ?>

<?= $this->Html->css('/jquery.Thailand.js/dist/jquery.Thailand.min.css') ?>
<?= $this->Html->script('/jquery.Thailand.js/src/jquery.Thailand.js') ?>
<?= $this->Form->create($bpartner, ['id' => 'bpartner']) ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 ">
        <div class="card m-b-20 card-body">
            <div class="row">
                <div class="col-6 bt-tool">
                    <?= $this->Html->link(BT_BACK, ['controller' => 'bpartners',$iscustomer], ['escape' => false]) ?> 
                </div>
                <div class="col-md-6 bt-tool">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <h2 class="gold-title "><i class="mdi mdi-account-box"></i> เพิ่ม<?= $title ?></h2>
                </div>
                <div class="col-md-6 text-left">
                    <button type="button" class="btn btn-dark waves-effect waves-light" id="smartcard-alert">ดึงข้อมูลจากบัตรประชาชน</button>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="checkbox checkbox-success">
                        <input id="iscompany" type="checkbox" name="iscompany" value="Y">
                        <label for="iscompany">
                            เป็นนิติบุคคล/กลุ่ม/ร้านค้า
                        </label>
                    </div>
                    <div class="row" id="box_normal">
                        <div class="col-md-1 form-group">
                            <label class=" col-form-label text-right">คำนำหน้า <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('title', ['id' => 'title', 'class' => 'form-control', 'label' => false, 'options' => ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว']]) ?>


                        </div>
                        <div class="col-md-3 form-group">
                            <label class=" col-form-label text-right">ชื่อ <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('firstname', ['class' => 'form-control', 'label' => false, 'id' => 'firstname', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class=" col-form-label text-right">นามสกุล <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('lastname', ['class' => 'form-control', 'label' => false, 'id' => 'lastname', 'autocomplete' => 'off']); ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class=" col-form-label text-right">วันเกิด</label>
                            <?= $this->Form->control('birthday', ['class' => 'form-control', 'id' => 'birthday', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class=" col-form-label text-right">เลขบัตรประชาชน</label>
                            <?= $this->Form->control('taxid', ['class' => 'form-control', 'label' => false, 'id' => 'taxid', 'requireddata-parsley-max' => '13', 'requireddata-parsley-min' => '13', 'autocomplete' => 'off']); ?>
                        </div>
                    </div>
                    <div class="row" id="box_company" style="display: none;">
                        <div class="col-md-5 form-group">
                            <label class=" col-form-label text-right">ชื่อ <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'id' => 'name', 'autocomplete' => 'off']) ?>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-3 form-group">
                            <label class="">อีเมล์</label>
                            <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'id' => '', 'autocomplete' => 'off']); ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="">โทรศัพท์บ้าน </label>
                            <?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'id' => 'phone', 'autocomplete' => 'off']); ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="">โทรศัพท์มือถือ</label>
                            <?= $this->Form->control('mobile', ['class' => 'form-control', 'label' => false, 'id' => 'mobile', 'autocomplete' => 'off']); ?>
                        </div>
                         <div class="col-md-5 form-group">
                            <label for="">ที่อยู่</label>
                            <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'label' => false, 'id' => 'address_line', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">ตำบล</label>
                            <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'label' => false, 'id' => 'subdistrict', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">อำเภอ</label>
                            <?= $this->Form->control('address.district', ['class' => 'form-control', 'label' => false, 'id' => 'district', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">จังหวัด</label>
                            <?= $this->Form->control('address.province', ['readonly', 'type' => 'text', 'class' => 'form-control', 'label' => false, 'id' => 'province']) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">รหัสไปรษณีย์</label>
                            <?= $this->Form->control('address.postalcode', ['class' => 'form-control', 'label' => false, 'id' => 'zipcode', 'autocomplete' => 'off']) ?>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-md-6 ">
                            <label class=" col-form-label text-right">รายละเอียด</label>
                            <textarea class="form-control" rows="4" name="description"></textarea>
                        </div>
                    </div>
                    <div class=" row p-20">
                        <div class="col-md-12 " style="text-align: center">
                            <?= BT_SAVE ?>
                            <?= BT_RESET ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function () {
        $("#iscompany").change(function () {
            if (this.checked) {
                $('#box_normal').hide();
                $('#box_company').show();
            }else{
                $('#box_normal').show();
                $('#box_company').hide();
            }
        });
        
        $.Thailand({
            $district: $('#subdistrict'), // input ของตำบล
            $amphoe: $('#district'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zipcode') // input ของรหัสไปรษณีย์
        });


        $(function () {
            jQuery('#birthday').datepicker({
                //language: 'th',
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
            });

        });

        $("#taxid").ForceNumericOnly();
        $("#zipcode").ForceNumericOnly();

        $('#smartcard-alert').click(function () {
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
                closeOnConfirm: true,
            }, function (isConfirm) {
                if (isConfirm) {
                    $('#page-load').show();
                    var url = SITE_URL + "scmanagements/getcard";
                    $.getJSON(url, function (result) {
                        console.log(result);
                        var jsonData = result;
                        if (jsonData['status'] == 'ok') {
                            $('#title').val(jsonData['title']);
                            $('#firstname').val(jsonData['firstname']);
                            $('#lastname').val(jsonData['lastname']);
                            $('#taxid').val(jsonData['cardno']);
                            $('#houseno').val(jsonData['houseno']);
                            $('#villageno').val(jsonData['moo']);
                            $('#subdistrict').val(jsonData['sub_district']);
                            $('#district').val(jsonData['district']);
                            $('#province').val(jsonData['province']);
                            $('#birthday').val(jsonData['birthday']);
                            swal({
                                title: "เรียบร้อย",
                                text: ".",
                                imageUrl: SITE_URL + "assets/plugins/bootstrap-sweetalert/thumbs-up.jpg"
                            });
                        } else {
                            swal({
                                title: "ไม่สำเร็จ",
                                text: "ไม่สามารถดึงข้อมูลได้กรุณาลองใหม่อีกครั้ง",
                                type: "error",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-danger waves-effect waves-light',
                                confirmButtonText: 'OK'
                            });
                        }


                    });
                    $('#page-load').hide();

                }
            });
        });

        $(function () {
            $("#bpartner").validate({
                rules: {
                    firstname: {
                        required: true
                    },
                    lastname: {
                        required: true
                    },
                    birthday: {
                        required: false
                    },
                    name:{
                         required: true
                    },
                    taxid: {
                        required: false,
                        number: true,
                        maxlength: 13,
                        minlength: 13
                    },

                    mobile: {
                        required: false,
                        maxlength: 10,
                        minlength: 10
                    },
                    "address[address_line]":
                            {
                                required: false
                            },

                    "address[subdistrict]":
                            {
                                required: false
                            },
                    "address[district]":
                            {
                                required: false
                            },
                    "address[province]":
                            {
                                required: false
                            },
                    "address[postalcode]":
                            {
                                required: false
                            }
                },
                messages: {
                    firstname: {
                        required: "กรุณากรอก ชื่อ"
                    },
                    lastname: {
                        required: "กรุณากรอก นามสกุล"
                    },
                    birthday: {
                        required: "กรุณากรอก วันเดือนปีเกิด"
                    },
                    taxid: {
                        required: "กรุณากรอก หมายเลขบัตรประชาชน"
                    },
                    religion: {
                        required: "กรุณากรอก ศาสนา"
                    },

                    mobile: {
                        required: "กรุณากรอก หมายเลขโทรศัพท์"
                    },
                    "address[address_line]":
                            {
                                required: "กรุณาระบุที่อยู่ บ้านเลขที่ หมู่บ้าน"
                            },

                    "address[subdistrict]":
                            {
                                required: "กรุณาระบุตำบล"
                            },
                    "address[district]":
                            {
                                required: "กรูณาระบุอำเภอ"
                            },
                    "address[province]":
                            {
                                required: "กรุณาระบุจังหวัด"
                            },
                    "address[postalcode]":
                            {
                                required: "กรูณาระบุรหัสไปรษณีย์"
                            }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    });



</script>