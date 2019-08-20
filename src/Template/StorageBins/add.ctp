<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'storage-bins','action'=>'index',$warehouse_id], ['escape' => false]) ?> 
            </div>


            <?= $this->Form->create($storageBin, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <?=$this->Form->hidden('isactive',['value'=>'Y'])?>
            <?=$this->Form->hidden('warehouse_id',['value'=>$warehouse_id])?>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="name">ชื่อคลังสินค้าย่อย<span class="text-danger">*</span></label>
                    <?= $this->Form->control('name', ['class' => 'form-control', 'id' => 'name', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>

                <div class="col-md-2">
                    <label for="isactive">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive"></label>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="isdefault">เป็นค่าเริ่มต้น</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isdefault', ['hiddenField' => 'N', 'id' => 'isdefault', 'value' => 'Y']) ?>
                        <label for="isdefault"></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->control('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>

            </div>
            <div class="form-group row">

                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                    <?= BT_RESET ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>