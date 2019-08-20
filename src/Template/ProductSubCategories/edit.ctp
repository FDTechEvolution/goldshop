<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'product-sub-categories', 'action' => 'index', $productSubCategory->product_category_id], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มประเภทสินค้าย่อย</h3>

            <?= $this->Form->create($productSubCategory, ['class' => 'form-horizontal', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="col-form-label">บริษัท <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->select('org_id', $orgs, ['class' => 'form-control']); ?>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="col-form-label">ชื่อประเภท <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-6">
                    <label class="col-form-label">รหัส <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('code', ['class' => 'form-control', 'label' => false, 'placeholder' => 'เช่น 01,02 หรือ AA']) ?>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-6">
                    <label class="col-form-label">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive">

                        </label>
                    </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="col-form-label">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'label' => false]) ?>
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right"></label>
                <div class="col-sm-9">
                    <?= BT_SAVE ?>
                </div>
            </div>
           
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>