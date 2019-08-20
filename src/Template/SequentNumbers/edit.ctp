<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'sequent-numbers'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">แก้ไขเลขที่เอกสารอัตโนมัติ</h3>

            <?= $this->Form->create($sequentNumber, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                <div class="col-md-2 form-group">
                    <label for="isactive">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive"></label>
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <label for="isbookformat">รันแบบเล่ม [เล่มที 1/01]</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isbookformat', ['hiddenField' => 'N', 'id' => 'isbookformat', 'value' => 'Y']) ?>
                        <label for="isbookformat"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                 
                <div class="col-md-4 form-group">
                    <label for="branch_id">สาขา <span class="text-danger">*</span></label>
                    <?= $this->Form->select('branch_id', $branches, ['class' => 'form-control', 'id' => 'branch_id', 'label' => false]) ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="doccode">ประเภทเอกสาร <span class="text-danger">*</span></label>
                    <?= $this->Form->select('doccode', $docTypeCodes, ['class' => 'form-control', 'id' => 'doccode', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="prefix">คำขึ้นต้น</label>
                    <?= $this->Form->control('prefix', ['class' => 'form-control', 'id' => 'prefix', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="suffix">คำลงท้าย</label>
                    <?= $this->Form->control('suffix', ['class' => 'form-control', 'id' => 'suffix', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="start_no">หมายเลขเริ่มต้น <span class="text-danger">*</span></label>
                    <?= $this->Form->control('start_no', ['class' => 'form-control', 'id' => 'start_no', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="running_length">ความยาวของหมายเลข <span class="text-danger">*</span></label>
                    <?= $this->Form->control('running_length', ['class' => 'form-control', 'id' => 'running_length', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="running_length">หมายเลขปัจจุบัน</label>
                    <?= $this->Form->control('_temp', ['class' => 'form-control','label' => false,'value'=>$sequentNumber->current_sequent,'disabled'=>true]) ?>
                </div>
                
                
                
                <div class="col-md-4 form-group">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div> 
                
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#isbookformat').on('click',function(){
            if($(this).is(":checked")) {
                
            }else{
                
            }
        });
    });
</script>