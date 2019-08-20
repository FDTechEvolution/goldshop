<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'income-types'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มประเภทค่าใช้จ่าย</h3>

            <?= $this->Form->create($incomeType, ['class' => 'form-horizontal', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">ประเภท <?= REQUIRE_FIELD ?></label>
                <div class="col-md-5">
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right" for="isexpend">ใช้สำหรับรายจ่าย</label>
                <div class="col-md-5">
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isexpend', ['hiddenField' => 'N', 'id' => 'isexpend', 'value' => 'Y']) ?>
                        <label for="isexpend"></label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right" for="isrevenue">ใช้สำหรับรายรับ</label>
                <div class="col-md-5">
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isrevenue', ['hiddenField' => 'N', 'id' => 'isrevenue', 'value' => 'Y']) ?>
                        <label for="isrevenue"></label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right" for="isrevenue">เปิดใช้งาน</label>
                <div class="col-md-5">
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive"></label>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right"></label>
                <div class="col-md-5">
                    <?= BT_SAVE ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>