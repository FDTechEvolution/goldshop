<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($goodsTransaction, ['id' => 'frm']) ?>

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title prompt-500 text-primary fa-2x"><i class="mdi mdi-store"></i>ย้ายสินค้าระหว่างคลัง</h1>
                </div>
                <div class="col-md-6 text-right">
                    <button name="command" type="submit" value="SAVE" class="btn btn-success waves-effect waves-light"><i class="fas fa-angle-double-right"></i> บันทึกและต่อไป</button>    
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?=
                    $this->Form->control('docdate', ['class' => 'form-control',
                        'id' => 'docdate', 'type' => 'text',
                        'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off', 'readonly' => 'readonly'])
                    ?>

                </div>
                <div class="col-md-2">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('docno', ['class' => 'form-control', 'id' => 'docno', 'value' => '<' . $docNo . '>', 'label' => false, 'readonly' => 'readonly']) ?>


                </div>
                <div class = "col-md-4">
                    <label for = "code">คลังสินค้าต้นทาง</label>
                    <?= $this->Form->select('from_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'from_warehouse', 'label' => false])
                    ?>
                </div>
                <div class = "col-md-4">
                    <label for = "code">คลังสินค้าปลายทาง</label>
                    <?= $this->Form->select('to_warehouse', $toWarehouses, ['empty'=>'-นอกระบบ-','class' => 'form-control', 'id' => 'to_warehouse', 'label' => false])
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
        $(function () {
            jQuery('#docdate').datepicker({
                //language: 'th',
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
            });


            $('#frm').on('submit', function () {
                //console.log('hi');
                //Check dup warehouse
                var from_warehouse_id = $('#from_warehouse').val();
                var to_warehouse_id = $('#to_warehouse').val();
                console.log(from_warehouse_id);
                console.log(to_warehouse_id);
                if(from_warehouse_id === to_warehouse_id){
                    Swal.fire({title: "ไม่สามารถย้ายในคลังสินค้าเดียวกันได้",text:"กรุณาเลือกต้นทางหรือปลายทางใหม่", confirmButtonClass: "btn btn-primary mt-2"});
                     return false;
                }
               
            });



        });
        setDefaultToDayDate('docdate');

    });
</script>