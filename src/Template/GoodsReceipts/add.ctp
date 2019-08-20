<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'goods-receipts', 'action' => 'index'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($goodsTransaction) ?>

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title text-primary prompt-500 fa-3x"><i class="mdi mdi-store"></i>นำเข้าสินค้า</h1>
                </div>
                <div class="col-md-6 text-right">
                    <button name="command" type="submit" value="SAVE" class="btn btn-primary waves-effect waves-light">บันทึกและต่อไป</button>    
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?=
                    $this->Form->control('docdate', ['class' => 'form-control',
                        'id' => 'docdate', 'type' => 'text','data-provide'=>'datepicker','data-date-language'=>'th-th','autocomplete'=>'off',
                        'label' => false,'readonly'=>'readonly'])
                    ?>

                </div>
                <div class="col-md-3">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('docno', ['class' => 'form-control', 'id' => 'docno', 'value' => '<' . $docNo . '>', 'label' => false]) ?>


                </div>
                <div class = "col-md-3">
                    <label for = "code">คลังสินค้าหลัก</label>
                    <?= $this->Form->select('to_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'to_warehouse', 'label' => false])
                    ?>
                </div>

                <div class="col-md-6">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>

            
            <?= $this->Form->end() ?>
        </div>
    </div>



</div>

<?= $this->Html->script('goods.js') ?>
<script>
    $(document).ready(function () {

        setDefaultToDayDate('docdate');

    });
</script>