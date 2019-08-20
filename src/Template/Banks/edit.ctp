<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'banks'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">แก้ไขธนาคาร</h3>

            <?= $this->Form->create($bank, ['class' => 'form-horizontal', 'novalidate' => true, 'id' => 'bankfrm']) ?>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">ชื่อธนาคาร <?= REQUIRE_FIELD ?></label>
                <div class="col-md-5">
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">ตัวย่อ <?= REQUIRE_FIELD ?></label>
                <div class="col-md-5">
                    <?= $this->Form->control('code', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">รายละเอียด</label>
                <div class="col-md-5">
                    <textarea class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right" for="iscash">ใช้สำหรับเงินสด</label>
                <div class="col-md-5">
                    <div class="checkbox">
                        <?= $this->Form->checkbox('iscash', ['hiddenField' => 'N', 'id' => 'iscash', 'value' => 'Y']) ?>
                        <label for="iscash"></label>
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