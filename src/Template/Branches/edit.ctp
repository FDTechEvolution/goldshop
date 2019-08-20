<?= $this->Html->script('/jquery.Thailand.js/dependencies/JQL.min.js') ?>
<?= $this->Html->script('/jquery.Thailand.js/dependencies/typeahead.bundle.js') ?>

<?= $this->Html->css('/jquery.Thailand.js/dist/jquery.Thailand.min.css') ?>
<?= $this->Html->script('/jquery.Thailand.js/src/jquery.Thailand.js') ?>

<?= $this->Form->create($branch, ['id' => 'branch']) ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 ">
        <div class="card m-b-20 card-body">

            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'branches'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">แก้ไขข้อมูลสาขา</h3>

            <h4 class="title-header">ข้อมูลสาขา</h4>
            <div class="form-group row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class=" col-form-label text-right">ชื่อ สาขา <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>

                        </div>
                        <div class="col-md-2 form-group">
                            <label class=" col-form-label text-right">รหัส สาขา <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('code', ['class' => 'form-control', 'label' => false]) ?> 

                        </div>
                        <div class="col-md-3 form-group">
                            <label class=" col-form-label text-right">บริษัท <?= REQUIRE_FIELD ?></label>

                            <?= $this->Form->control('org_id', ['class' => 'form-control', 'label' => false, 'options' => $orgs]) ?> 

                        </div>
                        <div class="col-md-3 form-group">

                            <label class=" col-form-label text-right">เป็นสำนักงานใหญ่ <?= REQUIRE_FIELD ?></label>
                            <div class="checkbox">
                                <?= $this->Form->checkbox('isheadquarters', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                                <label for="isactive"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">ที่อยู่ <i class="text-danger">*</i></label>
                            <?= $this->Form->control('address.address_line', ['class' => 'form-control', 'label' => false, 'id' => 'address_line']) ?>

                        </div>


                        <div class="col-md-3 form-group">
                            <label for="">ตำบล <i class="text-danger">*</i></label>
                            <?= $this->Form->control('address.subdistrict', ['class' => 'form-control', 'label' => false, 'id' => 'subdistrict', 'autocomplete' => 'off']) ?>

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">อำเภอ <i class="text-danger">*</i></label>
                            <?= $this->Form->control('address.district', ['class' => 'form-control', 'label' => false, 'id' => 'district']) ?>

                        </div>
                        <div class="col-md-3 form-group">
                            <label for="">จังหวัด <i class="text-danger">*</i></label>
                            <?= $this->Form->control('address.province', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'id' => 'province']) ?>

                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">รหัสไปรษณีย์ <i class="text-danger">*</i></label>
                            <?= $this->Form->control('address.postalcode', ['class' => 'form-control', 'label' => false, 'id' => 'zipcode']) ?>

                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-md-6 form-group">
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
    $.Thailand({
        $district: $('#subdistrict'), // input ของตำบล
        $amphoe: $('#district'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });

</script>

<script>

    $(function () {

        $("#branch").validate({
            rules: {
                name: {
                    required: true
                },
                code: {
                    required: true
                },

                "address[address_line]":
                        {
                            required: true
                        },

                "address[subdistrict]":
                        {
                            required: true
                        },
                "address[district]":
                        {
                            required: true
                        },
                "address[province]":
                        {
                            required: true
                        },
                "address[postalcode]":
                        {
                            required: true
                        }
            },
            messages: {
                name: {
                    required: "กรุณากรอก ชื่อสาขา"
                },
                code: {
                    required: "กรุณากรอก รหัสสาขา"
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
</script>