<div class="col-md-12 text-center">
    <button type="button" class="btn btn-dark waves-effect waves-light" id="smartcard-alert">ดึงข้อมูลจากบัตรประชาชน</button>
</div>
<div class="form-group col-md-3">
    <label for="code">คำนำหน้า</label>
    <?= $this->Form->control('customer.title', ['class' => 'form-control', 'id' => 'title', 'label' => false, 'options' => ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว']]) ?>
</div>
<div class="form-group col-md-4">
    <label for="code">ชื่อจริง<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('customer.firstname', ['class' => 'form-control', 'id' => 'firstname', 'label' => false]) ?>
</div>
<div class="form-group col-md-5">
    <label for="code">นามสกุล<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('customer.lastname', ['class' => 'form-control', 'id' => 'lastname', 'label' => false]) ?>
</div>
<div class="form-group col-md-4">
    <label for="code"  >เลขบัตรประชาชน<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('customer.cardno', ['class' => 'form-control', 'id' => 'cardno', 'label' => false]) ?>
</div>
<div class="form-group col-md-3">
    <label for="code" >วัน เดือน ปีเกิด<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('customer.birthday', ['class' => 'form-control', 'id' => 'birthday', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
</div>
<div class="form-group col-md-5 ">
    <label >โทรศัพท์มือถือ<?= REQUIRE_FIELD ?> </label>
    <?= $this->Form->control('customer.mobile', ['class' => 'form-control', 'label' => false]); ?>
</div>
<div class="col-md-12">
    <h5 class="title-header">ที่อยู่</h5>
</div>

<div class="form-group col-md-8">
    <label for="address_line">เลขที่/หมู่ที่/ตึก/ห้อง/ซอย/ถนน</label>
    <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'id' => 'address_line', 'label' => false]) ?>
</div>
<div class="form-group col-md-4">
    <label for="subdistrict">ตำบล/แขวง<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'id' => 'subdistrict', 'label' => false]) ?>
</div>
<div class="form-group col-md-4">
    <label for="district">อำเภอ/เขต<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('address.district', ['class' => 'form-control', 'id' => 'district', 'label' => false]) ?>
</div>
<div class="form-group col-md-4">
    <label for="province">จังหวัด<?= REQUIRE_FIELD ?></label>
    <?= $this->Form->control('address.province', ['class' => 'form-control', 'id' => 'province', 'label' => false]) ?>
</div>

<script type="text/javascript">
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

                $.getJSON(url, function (result) {
                    console.log(result);
                    var jsonData = result;
                    if (jsonData['status'] == 'ok') {
                        $('#title').val(jsonData['title']);
                        $('#firstname').val(jsonData['firstname']);
                        $('#lastname').val(jsonData['lastname']);
                        $('#cardno').val(jsonData['cardno']);

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