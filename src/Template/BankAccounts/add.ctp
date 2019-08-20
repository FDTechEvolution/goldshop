<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'bank-accounts'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มบัญชี</h3>

            <?= $this->Form->create($bankAccount, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="type">ประเภทการใช้งาน</label>
                    <?= $this->Form->select('type', $types, ['class' => 'form-control', 'id' => 'type', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="account_name">ชื่อบัญชี</label>
                    <?= $this->Form->control('account_name', ['class' => 'form-control', 'id' => 'account_name', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group" id="accountno_box">
                    <label for="accountno">หมายเลข</label>
                    <?= $this->Form->control('accountno', ['class' => 'form-control', 'id' => 'accountno', 'label' => false]) ?>
                </div>
                

                <div class="col-md-3 form-group" id="bank_id_box">
                    <label for="bank_id">ธนาคาร</label>
                    <?= $this->Form->select('bank_id', $banks, ['class' => 'form-control', 'id' => 'bank_id', 'label' => false]) ?>
                </div>
                <div class="col-md-4 form-group">
                    <label for="branch_id">ใช้สำหรับร้าน/สาขา (* = ใช้ได้กับทุกร้าน/ทุกสาขา)</label>
                    <?= $this->Form->select('branch_id', $branches, ['class' => 'form-control', 'id' => 'branch_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="total_balance">จำนวนเงินคงเหลือ</label>
                    <?= $this->Form->control('total_balance', ['class' => 'form-control', 'id' => 'total_balance', 'label' => false]) ?>
                </div>
                <div class="col-md-6 form-group">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
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
<script>
    $(document).ready(function () {
        hideAndShow($('#type').val());
        $('#type').on('change',function(){
            hideAndShow(this.value);
        });
        
        function hideAndShow(value){
            if(value ==='CASH'){
                $('#accountno_box').hide();
                $('#account_type_box').hide();
                $('#bank_id_box').hide();
            }else{
                $('#accountno_box').show();
                $('#account_type_box').show();
                $('#bank_id_box').show();
            }
        }
    });
</script>