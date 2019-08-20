<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'sizes', 'action' => 'index', $size->product_category_id], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มขนาด</h3>

            <?= $this->Form->create($size, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
               
                <div class="form-group col-md-4">
                    <label class="col-form-label">ชื่อขนาด <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="form-group col-md-2">
                    <label class="col-form-label">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive">
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'label' => false]) ?>
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