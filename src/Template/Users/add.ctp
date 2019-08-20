<div class="row">
    <div class="col-md-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'users'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($user, ['id' => 'users']) ?>
            <div class="form-group row">
                <div class="col-md-6">
                    <h2 class="gold-title "><i class="mdi mdi-account-card-details"></i> เพิ่มข้อมูลผู้ใช้งานระบบ</h2>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-dark waves-effect waves-light" id="smartcard-alert">ดึงข้อมูลจากบัตรประชาชน</button>

                </div>

            </div>
            <div class="row" id="customer_box" >
                <div class="col-md-1 form-group">
                    <label for="title">คำนำหน้า<?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('title', ['class' => 'form-control', 'label' => false, 'options' => ['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว']]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="firstname">ชื่อจริง<?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('firstname', ['class' => 'form-control', 'id' => 'keyboard', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="lastname">นามสกุล<?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('lastname', ['class' => 'form-control', 'id' => 'lastname', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="cardno">เลขบัตรประชาชน<?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('cardno', ['class' => 'form-control', 'id' => 'cardno', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="birthday">วัน เดือน ปีเกิด<?= REQUIRE_FIELD ?></label>
                    <?=
                    $this->Form->control('birthday', ['class' => 'form-control', 'id' => 'birthday', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th'
                    ])
                    ?>
                </div>
                <div class="col-md-2 form-group ">
                    <label for="mobileno">โทรศัพท์มือถือ <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('mobileno', ['class' => 'form-control', 'label' => false, 'id' => 'mobileno']); ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="email" >E-mail</label>
                    <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false]) ?> 
                </div>
                <div class="col-md-2 form-group">
                    <label for="startdate"  >วันที่เข้าทำงาน<?= REQUIRE_FIELD ?></label>
                    <?=
                    $this->Form->control('startdate', ['format' => "dd/mm/yyyy", 'class' => 'form-control', 'id' => 'startdate', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th'
                    ])
                    ?>
                </div>
                <div class="col-md-3">
                    <label for="role_id">ประเภทสมาชิก <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('role_id', ['class' => 'form-control', 'label' => false, 'options' => $roles]) ?> 

                </div>
                <div class="col-md-2">
                    <label for="position">ตำแหน่ง </label>
                    <?= $this->Form->control('position', ['class' => 'form-control', 'label' => false]) ?> 
                </div>
                <div class="col-md-3">
                    <label for="branch_id">ประจำสาขา </label>
                    <?= $this->Form->control('branch_id', ['class' => 'form-control', 'label' => false, 'options' => $branches]) ?> 

                </div>
                <div class="col-md-3 form-group">
                    <label for="username"  >Username<?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('username', ['id' => 'username', 'class' => 'form-control', 'label' => false]) ?> 
                </div>
                <div class="col-md-3 form-group">
                    <label for="password"  >Password<?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('password', ['id' => 'password', 'class' => 'form-control', 'label' => false]) ?> 
                </div>
                <div class="col-md-3 ">

                    <label class=" col-form-label text-right">เปิดใช้งาน </label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y', 'checked' => 'checked']) ?>
                        <label for="isactive"></label>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                    <?= BT_RESET ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>

    $(function () {
        jQuery('#birthday').datepicker({
            //  language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#startdate').datepicker({
            //  language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });

</script>
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
//console.log(url);
                $.getJSON(url, function (result) {
                    console.log(result);
                    var jsonData = result;
                    if (jsonData['status'] == 'ok') {
                        $('#title').val(jsonData['title']);
                        $('#firstname').val(jsonData['firstname']);
                        $('#lastname').val(jsonData['lastname']);
                        $('#cardno').val(jsonData['cardno']);
                        $('#birthday').val(jsonData['birthday']);
//address
                        $('#description').val(jsonData['address_line'] + ' ' + jsonData['sub_district'] + ' ' + jsonData['district'] + ' ' + jsonData['province']);


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
<script>

    $(function () {
        $("#username").keypress(function (event) {
            var ew = event.which;
            if (33 <= ew && ew <= 125)
                return true;

            return false;
        });
        $("#password").keypress(function (event) {
            var ew = event.which;
            if (33 <= ew && ew <= 125)
                return true;

            return false;
        });
        

        $("#users").validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                startdate: {
                    required: true
                },
                birthday: {
                    required: true
                },

                cardno: {
                    required: true,
                    number: true,
                    maxlength: 13,
                    minlength: 13
                },

                mobileno: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                }
            },
            messages: {
                firstname: {
                    required: "กรุณากรอก ชื่อ"
                },
                lastname: {
                    required: "กรุณากรอก นามสกุล"
                },

                cardno: {
                    required: "กรุณากรอก หมายเลขบัตรประชาชน"
                },
                startdate: {
                    required: "กรุณากรอก วันที่เริ่มทำงาน"
                },
                birthday: {
                    required: "กรุณากรอก วันเกิด"
                },
                username: {
                    required: "กรุณากรอก USERNAME",
                    languageTest: 'Invalid language'
                },
                password: {
                    required: "กรุณากรอก PASSWORD"
                },

                mobileno: {
                    required: "กรุณากรอก หมายเลขโทรศัพท์"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>