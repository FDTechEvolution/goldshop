
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'promotions'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มโปรโมชั่น</h3>

            <?= $this->Form->create($promotion, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="org_id">ชื่อโปรโมชั่น <span class="text-danger">*</span></label>
                    <?= $this->Form->control('name', ['class' => 'form-control', 'id' => 'name', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="org_id">ประเภท <span class="text-danger">*</span></label>
                    <?= $this->Form->select('type', $type,['class' => 'form-control', 'id' => 'type', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="doccode">จำนวน <span class="text-danger">*</span></label>
                    <?= $this->Form->control('value', ['type' => 'number', 'class' => 'form-control', 'id' => 'value', 'label' => false]) ?>
                </div>

                <div class="col-md-6 form-group">
                    <label for="description">คำอธิบาย</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>


                <div class="col-md-3 form-group">
                    <label for="isactive">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y', 'checked' => 'checked']) ?>
                        <label for="isactive"></label>
                    </div>
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