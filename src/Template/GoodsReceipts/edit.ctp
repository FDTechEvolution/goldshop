
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'goods-receipts'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($goodsTransaction) ?>

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-store"></i>นำเข้าสินค้า</h1>
                </div>
                <div class="col-md-6 text-right">
                    <?php if ($goodsTransaction->status != 'CO') { ?>

                        <button name="command" type="submit" value="COMPLETE"  class="btn btn-lg btn-success waves-effect waves-light">เสร็จสมบูรณ์</button>
                    <?php } ?>  
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 border-right">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                            <?=
                            $this->Form->control('docdate', ['class' => 'form-control',
                                'id' => 'docdate', 'type' => 'text', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off',
                                'label' => false, 'readonly' => 'readonly', 'value' => $goodsTransaction->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)])
                            ?>

                        </div>
                        <div class="col-md-4 form-group">
                            <label for="code">หมายเลขเอกสาร</label>
                            <?= $this->Form->control('docno', ['class' => 'form-control', 'id' => 'docno', 'label' => false, 'readonly' => 'readonly']) ?>


                        </div>
                        <div class = "col-md-5 form-group">
                            <label for = "code">รับเข้าคลังสินค้า</label>
                            <?= $this->Form->control('_to_warehouse', ['class' => 'form-control', 'id' => 'to_warehouse', 'label' => false, 'value' => $goodsTransaction->ToWarehouse->name, 'readonly' => 'readonly'])
                            ?>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="description">รายละเอียด</label>
                            <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <p><strong>ผู้ทำรายการ: </strong><?=h($goodsTransaction->UserCreated->firstname.' '.$goodsTransaction->UserCreated->lastname)?></p>
                    <p><strong>วัน/เวลา: </strong><?=$goodsTransaction->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)?></p>
                </div>

            </div>
            <div class="col-md-12">
                <iframe id="goods_line_iframe" src="<?= SITE_URL . 'goods-lines/import/' . $goodsTransaction->id ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"> </iframe>

            </div>


            <?= $this->Form->end() ?>
        </div>
    </div>



</div>

<?= $this->Html->script('goods.js') ?>
