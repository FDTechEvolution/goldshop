<div class="row">
    <div class="col-md-12" style="display: none;" id="customer_box">
        <div class="pull-left">
            <address>
                <strong id="fullname_txt"><i class="text-danger">***ข้อมูลลูกค้ายังไม่สมบูรณ์***</i></strong>
                <p id="address_txt"></p>
            </address>
        </div>
    </div>
</div>
<div class="col-md-12">
    <button type="button" class="btn btn-outline-success form-group" data-toggle="modal" data-target="#save_customer_modal" data-name="customer_type" value="save" id="add_bp_bt">เพิ่มข้อมูลลูกค้า</button>
    <button type="button" class="btn btn-light form-group" data-toggle="modal" data-target="#search_customer_modal" data-name="customer_type" value="save" id="search_bp_box_bt">ลูกค้าเก่า</button>
    <?= $this->Form->hidden('customer_type', ['value' => '', 'id' => 'customer_type']) ?>
    <?= $this->Form->hidden('bpartner_id', ['id' => 'bpartner_id']) ?>
</div>


<div class="col-md-12">
    <div id="save_customer_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title text-primary prompt-500">บันทึกข้อมูลลูกค้า</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-dark waves-effect waves-light" id="smartcard-alert" style="display: none;">ดึงข้อมูลจากบัตรประชาชน</button>
                            <button type="button" class="btn btn-dark waves-effect waves-light" id="bt-smartcard-detect">ถ่ายบัตรประชาชน</button>
                        </div>
                        <div class="col-12" id="box-detect-smartcard" style="display: none;">
                           <?=$this->element('Cam/cam_with_upload_v1')?>
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
                            <label for="code"  >เลขบัตรประชาชน</label>
                            <?= $this->Form->control('customer.cardno', ['class' => 'form-control', 'id' => 'cardno', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="code" >วัน เดือน ปีเกิด</label>
                            <?= $this->Form->control('customer.birthday', ['class' => 'form-control', 'id' => 'birthday', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="form-group col-md-5 ">
                            <label >โทรศัพท์มือถือ</label>
                            <?= $this->Form->control('customer.mobile', ['class' => 'form-control', 'label' => false, 'id' => 'mobile']); ?>
                        </div>
                        <div class="col-md-12">
                            <h5 class="title-header text-primary prompt-500">ที่อยู่</h5>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="address_line">เลขที่/หมู่ที่/ตึก/ห้อง/ซอย/ถนน</label>
                            <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'id' => 'address_line', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="subdistrict">ตำบล/แขวง</label>
                            <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'id' => 'subdistrict', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="district">อำเภอ/เขต</label>
                            <?= $this->Form->control('address.district', ['class' => 'form-control', 'id' => 'district', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="province">จังหวัด</label>
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


<div class="col-md-12">
    <div id="search_customer_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary prompt-500">ค้นหาข้อมูลลูกค้า</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-7 offset-md-2">

                            <?= $this->Form->control('search_text', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'search_text', 'placeholder' => 'ชื่อ/นามสกุล/เบอร์โทร/เลขบัตรประชาชน']); ?>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="button" id="search_bp_bt" class="btn btn-lg btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i> </button>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover" id="list_bp">
                            <thead>
                                <tr class="">
                                    <th>ชื่อ-สกุล</th>
                                    <th>เงินออม</th>
                                    <th>โทร</th>
                                    <th>ที่อยู่</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>

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
    $(document).ready(function(){
        $('#bt-smartcard-detect').on('click',function(){
            if($('#box-detect-smartcard').is(':visible')){
                $('#box-detect-smartcard').hide();
            }else{
                $('#box-detect-smartcard').show();
            }
            
        });
    });
    
    $(document).ready(function () {
        $('#save_customer_modal').modal({
            backdrop: 'static',
            show: false,
            keyboard: false  // to prevent closing with Esc button (if you want this too)
        });
    });


    $(function () {
        jQuery('#birthday').datepicker({
            //language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });


    function setBpText(id, fullname, address, saving_amount) {
        $('#bpartner_id').val(id);

        $('#fullname_txt').text(fullname);
        $('#address_txt').text(address);
        $('#search_customer_modal').modal('hide');
        if (saving_amount > 0) {
            $('#box_saving_bt').show();
            $("#l_saving_balance").html(Number(saving_amount).toLocaleString('en'));

        } else {
            $('#box_saving_bt').hide();
        }
    }


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

        $('#page-load').show();
        $('#page-load-label').text('กำลังบันทึก...');
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
                //console.log(jsonData);
                var fullname = jsonData['name'];
                var addressData = jsonData['address'];
                var address = addressData['address_line'] + addressData['subdistrict'] + ' '
                        + addressData['district'] + ' ' + addressData['province']
                        + ' ' + addressData['postalcode'] + ' โทร:' + jsonData['mobile'];

                setBpText(jsonData['id'], fullname, address);

                $('#save_customer_modal').modal('hide');

            } else {
                $.Notification.autoHideNotify('error', 'top right', _data, '');

            }
            $('#page-load-label').text('');
            $('#page-load').hide();
        });
    }


    $('#modal_save').click(function () {
        savecus();

    });

    $('#search_bp_bt').click(function () {
        var search_text = $('#search_text').val();

        $('#page-load').show();
        $('#page-load-label').text('กำลังค้นหา');
        $.post(SITE_URL + "bpartners/ajax-search/", {search_text: search_text}, function (_data) {
            $('#page-load-label').text('');
            $('#page-load').hide();

            var dataJson = JSON.parse(_data);
            $('#list_bp > tbody').empty();
            //console.log(dataJson);
            $.each(dataJson, function (i, item) {
                //console.log(item);
                var addressData = item['address'];
                var address = addressData['address_line'] + addressData['subdistrict'] + ' '
                        + addressData['district'] + ' ' + addressData['province']
                        + ' ' + addressData['postalcode'] + ' โทร:' + item['mobile'];
                var saving_amount = 0;
                if (item.saving_accounts.length > 0) {
                    saving_amount = item['saving_accounts'][0]['balanceamt'];
                }

                $('#list_bp > tbody').append(
                        '<tr class="hand-cursor" onclick="setBpText(\'' + item.id + '\',\'' + item.name + '\',\'' + address + '\',\'' + saving_amount + '\')">' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + Number(saving_amount).toLocaleString('en') + '</td>' +
                        '<td>' + item.mobile + '</td>' +
                        '<td>' + address + '</td>' +
                        '</tr>'
                        );
            });
            $('#search_text').val('');
        });
    });

    $.Thailand({
        $district: $('#subdistrict'), // input ของตำบล
        $amphoe: $('#district'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#postalcode') // input ของรหัสไปรษณีย์
    });


    $('button[data-name="customer_type"]').on('click', function () {
        $('button[data-name="customer_type"]').addClass('btn-light').removeClass('btn-outline-success');
        $(this).addClass('btn-outline-success');
        //console.log(this.value);
        $('#customer_type').val(this.value);
        if (this.value === 'save') {
            $('#customer_box').show();
        } else {
            setBpText('', '', '', 0);
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
                    //console.log(result);
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