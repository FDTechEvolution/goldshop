<div class="col-md-6">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#save_customer_modal" data-name="customer_type" value="save">เปิดบัญชีเงินออมใหม่</button>

    <?= $this->Form->hidden('bpartner_id', ['id' => 'bpartner_id']) ?>
</div>
<hr/>


<div class="col-md-12">
    <div id="save_customer_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title text-primary prompt-500">บันทึกข้อมูลลูกค้าเพื่อเปิดบัญชี</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-dark waves-effect waves-light" id="smartcard-alert">ดึงข้อมูลจากบัตรประชาชน</button>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="code">คำนำหน้า <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('customer.title', ['class' => 'form-control', 'id' => 'title', 'label' => false, 'options' => ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว', 'คุณ' => 'คุณ']]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">ชื่อจริง <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('customer.firstname', ['class' => 'form-control', 'id' => 'firstname', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="code">นามสกุล <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('customer.lastname', ['class' => 'form-control', 'id' => 'lastname', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code"  >เลขบัตรประชาชน <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('customer.cardno', ['class' => 'form-control', 'id' => 'cardno', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="code" >วัน เดือน ปีเกิด</label>
                            <?= $this->Form->control('customer.birthday', ['class' => 'form-control', 'id' => 'birthday', 'type' => 'text', 'label' => false,'data-provide'=>'datepicker','data-date-language'=>'th-th','autocomplete'=>'off']) ?>
                        </div>
                        <div class="form-group col-md-5 ">
                            <label >โทรศัพท์มือถือ <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('customer.mobile', ['class' => 'form-control', 'label' => false, 'id' => 'mobile']); ?>
                        </div>
                        <div class="col-md-12">
                            <h5 class="title-header text-primary prompt-500">ที่อยู่</h5>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="address_line">เลขที่/หมู่ที่/ตึก/ห้อง/ซอย/ถนน <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'id' => 'address_line', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="subdistrict">ตำบล/แขวง <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'id' => 'subdistrict', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="district">อำเภอ/เขต <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('address.district', ['class' => 'form-control', 'id' => 'district', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="province">จังหวัด <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('address.province', ['class' => 'form-control', 'id' => 'province', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="province">รหัสไปรษณีย์</label>
                            <?= $this->Form->control('address.postalcode', ['class' => 'form-control', 'id' => 'postalcode', 'label' => false]) ?>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="modal_save">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->Html->script('/jquery.Thailand.js/dependencies/JQL.min.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/typeahead.bundle.js') ?>

<?= $this->Html->css('/jquery.Thailand.js/dist/jquery.Thailand.min.css') ?>
<?= $this->Html->script('/jquery.Thailand.js/src/jquery.Thailand.js') ?>

<script type="text/javascript">

    $(function () {
        jQuery('#birthday').datepicker({
            //language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    var jsonData;
    function savecus() {
        var title, firstname, lastname, taxid, birthday, mobile, address_line, subdistrict, district, province, postalcode;
        title = $('#title').val();
        firstname = $('#firstname').val();
        lastname = $('#lastname').val();
        taxid = $('#cardno').val();
        birthday = $('#birthday').val();
        mobile = $('#mobile').val();
        address_line = $('#address_line').val();
        subdistrict = $('#subdistrict').val();
        district = $('#district').val();
        province = $('#province').val();
        postalcode = $('#postalcode').val();

        $.post(SITE_URL + "bpartners/ajaxsavecus/", {title: title, firstname: firstname, lastname: lastname,
            taxid: taxid, birthday: birthday, mobile: mobile, address_line: address_line, subdistrict: subdistrict,
            district: district, province: province, postalcode: postalcode}, function (_data) {
            //console.log(_data);

            var isJson = false;
            try {
                JSON.parse(_data);
                isJson = true;
            } catch (e) {
                isJson = false;
            }

            if (isJson) {
                jsonData = JSON.parse(_data);
                console.log(jsonData);
                var fullname = jsonData['name'];
                var addressData = jsonData['address'];
                var address = addressData['address_line'] + addressData['subdistrict'] + ' '
                        + addressData['district'] + ' ' + addressData['province']['name']
                        + ' ' + addressData['postalcode'] + ' โทร:' + jsonData['mobile'];


                $('#bpartner_id').val(jsonData['id']);
                $('#fullname_txt').text(fullname);
                $('#address_txt').text(address);
                $('#save_customer_modal').modal('hide');

                //Create Saving Account
                $.post(SITE_URL + "saving-accounts/getsaveaccount/", {bpartner_id: jsonData['id']}, function (_data) {
                    isJson = false;
                    try {
                        JSON.parse(_data);
                        isJson = true;
                    } catch (e) {
                        isJson = false;
                    }
                    if (isJson) {
                        location.reload();
                    } else {
                        $.Notification.autoHideNotify('error', 'top right', _data, '');
                    }

                });
            } else {
                $.Notification.autoHideNotify('error', 'top right', _data, '');

            }
        });
    }

    $('#modal_save').click(function () {
        savecus();

    });


    $.Thailand({
        $district: $('#subdistrict'), // input ของตำบล
        $amphoe: $('#district'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#postalcode') // input ของรหัสไปรษณีย์
    });


    $('button[data-name="customer_type"]').on('click', function () {
        //$('button[data-name="customer_type"]').addClass('btn-light').removeClass('btn-outline-success');
        //$(this).addClass('btn-outline-success');
        //console.log(this.value);
        $('#customer_type').val(this.value);
        if (this.value === 'save') {
            $('#customer_box').show();
        } else {

            $('#customer_box').hide();
        }


    });

    //Primary
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
                //console.log(url);
                $.getJSON(url, function (result) {
                    console.log(result);
                    var jsonData = result;
                    if (jsonData['status'] == 'ok') {
                        $('#title').val(jsonData['title']);
                        $('#firstname').val(jsonData['firstname']);
                        $('#lastname').val(jsonData['lastname']);
                        $('#cardno').val(jsonData['cardno']);
                        //address
                        //$('#houseno').val(jsonData['houseno']);
                        //$('#villageno').val(jsonData['moo']);
                        $('#address_line').val(jsonData['address_line']);
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
</script>