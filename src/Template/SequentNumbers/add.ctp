<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'sequent-numbers'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มเลขที่เอกสารอัตโนมัติ</h3>

            <?= $this->Form->create($sequentNumber, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                
                <div class="col-md-4 form-group">
                    <label for="branch_id">สาขา <span class="text-danger">*</span></label>
                    <?= $this->Form->select('branch_id', $branches, ['class' => 'form-control', 'id' => 'branch_id', 'label' => false]) ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="doccode">ประเภทเอกสาร <span class="text-danger">*</span></label>
                    <?= $this->Form->select('doccode', $docTypeCodes, ['class' => 'form-control', 'id' => 'doccode', 'label' => false]) ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="isbookformat">หมายเลขแบบเล่ม ( __/__ )</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isbookformat', ['hiddenField' => 'N', 'id' => 'isbookformat', 'value' => 'Y']) ?>
                        <label for="isbookformat"></label>
                    </div>
                </div> 
                <div class="col-md-2 form-group" id="box_prefix">
                    <label for="prefix">คำขึ้นต้น</label>
                    <?= $this->Form->control('prefix', ['class' => 'form-control', 'id' => 'prefix', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group" id="box_suffix">
                    <label for="suffix">คำลงท้าย</label>
                    <?= $this->Form->control('suffix', ['class' => 'form-control', 'id' => 'suffix', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group" id="box_start_no">
                    <label for="start_no">หมายเลขเริ่มต้น <span class="text-danger">*</span></label>
                    <?= $this->Form->control('start_no', ['class' => 'form-control', 'id' => 'start_no', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group" id="box_running_length">
                    <label for="running_length">ความยาวของหมายเลข <span class="text-danger">*</span></label>
                    <?= $this->Form->control('running_length', ['class' => 'form-control', 'id' => 'running_length', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group" id="box_running_second_length">
                    <label for="running_second_length">ความยาวหลักที่สอง <span class="text-danger">*</span></label>
                    <?= $this->Form->control('running_second_length', ['class' => 'form-control', 'id' => 'running_second_length', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                
               
                <div class="col-md-6 form-group">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div> 
            </div>
            <div class="form-group row">
               
                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                    <?=BT_RESET?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#isbookformat').on('click',function(){
            if ($(this).is(':checked')) {
                $('#box_running_second_length').show();
                $('#box_prefix').hide();
                $('#box_suffix').hide();
            }else{
                $('#box_running_second_length').hide();
                $('#box_prefix').show();
                $('#box_suffix').show();
            }
        });
    });
</script>