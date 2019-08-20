
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'goods-receipts'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($goodsTransaction) ?>

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title prompt-500 text-primary fa-3x"><i class="mdi mdi-store"></i>ย้ายสินค้าระหว่างคลัง</h1>
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
                    <?=
                    $this->Form->control('docdate', ['class' => 'form-control',
                        'id' => 'docdate', 'type' => 'text',
                        'label' => false, 'value' => $goodsTransaction->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)])
                    ?>

                </div>
                <div class="col-md-3">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('docno', ['class' => 'form-control', 'id' => 'docno', 'label' => false, 'readonly' => 'readonly']) ?>


                </div>
                <div class = "col-md-3">
                    <label for = "code">คลังสินค้าต้นทาง</label>
                    <?= $this->Form->select('from_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'to_warehouse', 'label' => false, 'readonly' => 'readonly'])
                    ?>
                </div>
                <div class = "col-md-3">
                    <label for = "code">คลังสินค้าปลายทาง</label>
                    <?= $this->Form->select('to_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'to_warehouse', 'label' => false])
                    ?>
                </div>

                <div class="col-md-6">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 offset-md-10">
                    <button id="bt_call_modal_select_product" type="button" class="btn btn-lg btn-primary btn-block waves-effect waves-light" data-toggle="modal" data-target="#modal_select_product">เพิ่ม</button>
                </div>

            </div>

            <div id="modal_select_product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog m-t-50" style="width:80%;max-width: none;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">เลือกสินค้าที่ต้องการย้าย</h4>
                        </div>
                        <div class="modal-body">
                            <iframe id="iframe_select_product" src="<?= SITE_URL . 'goods-movement/wh-product/' . $goodsTransaction->from_warehouse.'/'.$goodsTransaction->id ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"> </iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <iframe id="goods_line_iframe" src="<?= SITE_URL . 'goods-lines/index/' . $goodsTransaction->id . '?warehouse_id=' . $goodsTransaction['from_warehouse'] ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"> </iframe>

            </div>


            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->script('goods.js') ?>
<script>
    $(document).ready(function () {
        $('#modal_select_product').modal({
            backdrop: 'static',
            show: false
        });

        $('#bt_call_modal_select_product').on('click', function () {
            $('#iframe_select_product').attr('src', $('#iframe_select_product').attr('src'));
        });
        
        $("#iframe_select_product").on("load", function () {
            $('#goods_line_iframe').attr('src', $('#goods_line_iframe').attr('src'));
        });
    });
</script>