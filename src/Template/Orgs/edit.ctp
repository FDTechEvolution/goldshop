
<?= $this->Form->create($org, ['id' => 'orgs']) ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 ">
        <div class="card m-b-20 card-body">
             <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'orgs'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">แก้ไขข้อมูลบริษัท</h3>


            <h4 class="title-header">ข้อมูลบริษัท</h4>
            <div class="form-group row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-3 ">
                            <label class=" col-form-label text-right">ชื่อ บริษัท <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>

                        </div>
                        <div class="col-md-3 ">
                            <label class=" col-form-label text-right">รหัส บริษัท <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('code', ['class' => 'form-control', 'label' => false]) ?> 

                        </div>
                        <div class="col-md-3 ">
                            <label class=" col-form-label text-right">เลขผู้เสียภาษี <?= REQUIRE_FIELD ?></label>

                            <?= $this->Form->control('taxid', ['class' => 'form-control', 'label' => false]) ?> 
                        </div>
                         <div class="col-md-3 ">

                            <label class=" col-form-label text-right">เปิดใช้งาน <?= REQUIRE_FIELD ?></label>
                            <div class="checkbox">
                                <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y', 'checked' => 'checked']) ?>
                                <label for="isactive"></label>
                            </div>
                        </div>
                    </div>
                  
                    

                    <div class=" row">
                        <div class="col-md-6 ">
                            <label class=" col-form-label text-right">รายละเอียด</label>

                             <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => false, 'id' => 'description']) ?>


                        </div>
                    </div>
                    <div class=" row p-20">
                        <div class="col-md-12 " style="text-align: center">


                            <?= BT_SAVE ?>
                            <?=BT_RESET?>
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
        $district: $('#district'), // input ของตำบล
        $amphoe: $('#amphoe'), // input ของอำเภอ
        $province: $('#province'), // input ของจังหวัด
        $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
    });

    $(function () {
        jQuery('#datepicker').datepicker({
            language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    setDefaultToDayDate('datepicker');

    $(function () {
        jQuery('#birthday').datepicker({
            language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });


</script>

<script>

    $(function () {

        $("#orgs").validate({
            rules: {
                name: {
                    required: true
                },
                code: {
                    required: true
                },
                taxid: {
                    required: true
                }
            },
            messages: {
               name: {
                    required: "กรุณากรอก ชื่อบริษัท"
                },
                code: {
                    required: "กรุณากรอก รหัสบริษัท"
                },
               
                taxid: {
                    required: "กรุณากรอก หมายเลขเสียภาษี"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>