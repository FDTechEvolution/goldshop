<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'product-categories'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มประเภทสินค้าหลัก</h3>

            <?= $this->Form->create($productCategory, ['class' => 'form-horizontal', 'novalidate' => true, 'id' => 'frm']) ?>
            
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">ชื่อประเภท <?= REQUIRE_FIELD ?></label>
                <div class="col-md-5">
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">รหัส <?= REQUIRE_FIELD ?></label>
                <div class="col-md-5">
                    <?= $this->Form->control('code', ['class' => 'form-control', 'label' => false,'value'=>$code]) ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">ชื่อย่อ(สำหรับ QRCode)</label>
                <div class="col-md-5">
                    <?= $this->Form->control('label', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">ประเภท <?= REQUIRE_FIELD ?></label>
                <div class="col-md-5">
                    <?= $this->Form->select('type',$productType, ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">หน่วยนับ</label>
                <div class="col-md-5">
                    <?= $this->Form->select('unittype',$unitTypeList, ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right"></label>
                <div class="col-md-2">
                    <div class="checkbox">
                        <?=$this->Form->checkbox('isstock', ['hiddenField' => 'N','id'=>'isstock','value'=>'Y'])?>
                        <label for="isstock">
                            สต๊อกสินค้า
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <?=$this->Form->checkbox('isactive', ['hiddenField' => 'N','id'=>'isactive','value'=>'Y'])?>
                        <label for="isactive">
                            เปิดให้ใช้งาน
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="checkbox">
                        <?=$this->Form->checkbox('isdefault', ['hiddenField' => 'N','id'=>'isdefault','value'=>'Y'])?>
                        <label for="isdefault">
                            ใช้เป็นค่าเริ่มต้น
                        </label>
                    </div>
                </div>
            </div>
            

            <div class="form-group row">
                <label class="col-md-3 col-form-label text-right">รายละเอียด</label>
                <div class="col-md-5">
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'label' => false]) ?>
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