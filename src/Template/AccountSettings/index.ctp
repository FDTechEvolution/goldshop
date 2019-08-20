<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">

            <h3 class="m-t-0 gold-title">ตั้งค่าทางบัญชี</h3>

            <?= $this->Form->create($accountSetting, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="type">รายรับค่าธรรมเนียมถอนเงินออม</label>
                    <?= $this->Form->select('fee_saving_account', $revenueList, ['class' => 'form-control', 'id' => 'fee_saving_account', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="type">บัญชีเงินสดหน้าร้าน</label>
                    <?= $this->Form->select('cash_account', [], ['class' => 'form-control', 'id' => 'cash_account', 'label' => false]) ?>
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