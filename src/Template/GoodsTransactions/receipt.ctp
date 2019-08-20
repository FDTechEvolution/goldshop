<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'goods-receipts','action'=>'index'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($goodsTransaction) ?>

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x"><i class="mdi mdi-store"></i>นำเข้าสินค้า</h1>
                </div>
                <div class="col-md-6 text-right">
                    <?php if ($goodsTransaction->status != 'CO') { ?>
                        <button name="command" type="submit" value="SAVE" class="btn btn-primary waves-effect waves-light">บันทึก</button>
                        <button name="command" type="submit" value="COMPLETE"  class="btn btn-primary waves-effect waves-light">เสร็จสมบูรณ์</button>
                    <?php } ?>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-md-3">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?php
                    if ($requestType == 'NEW') {
                        echo $this->Form->control('docdate', ['class' => 'form-control',
                            'id' => 'docdate', 'type' => 'text',
                            'label' => false]);
                    } else {
                        echo $this->Form->control('docdate', [
                            'class' => 'form-control',
                            'id' => 'docdate', 'type' => 'text',
                            'label' => false,
                            'value' => $goodsTransaction->docdate->i18nFormat(DATE_FORMATE_FORM, null, TH_DATE)]);
                    }
                    ?>

                </div>
                <div class="col-md-3">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?php
                    if ($requestType == 'NEW') {
                        echo $this->Form->control('docno', ['class' => 'form-control', 'id' => 'docno', 'value' => '<' . $docNo . '>', 'label' => false]);
                    } else {
                        echo $this->Form->control('docno', ['class' => 'form-control', 'id' => 'docno', 'label' => false, 'readonly' => 'readonly']);
                    }
                    ?>


                </div>
                <div class = "col-md-3">
                    <label for = "code">คลังสินค้า</label>
                    <?= $this->Form->select('to_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'to_warehouse', 'label' => false])
                    ?>
                </div>

                <div class="col-md-6">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>

            <h4 class="title-header">รายการสินค้า</h4>
            <div class="form-group row">
                <div class="col-lg-6 col-md-12 col-sm-12">

                    <?= $this->Form->control('code', ['class' => 'form-control', 'id' => 'code', 'label' => false, 'placeholder' => 'กรอกรหัสสินค้า']) ?>
                </div>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr><th>#</th>
                                <th>สินค้า</th>
                                <th>รายละเอียด</th>
                                <th>จำนวน</th>
                                <th>ชิ้นละ</th>
                                <th>รวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>LCD</td>
                                <td>Lorem ipsum dolor sit amet.</td>
                                <td>1</td>
                                <td>$380</td>
                                <td>$380</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>



</div>

<?= $this->Html->script('goods.js') ?>
<?php if ($requestType == 'NEW') { ?>
    <script>
        $(document).ready(function () {

            setDefaultToDayDate('docdate');

        });
    </script>
<?php } ?>