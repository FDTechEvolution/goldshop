<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'weights', 'action' => 'index', $productCatId], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มน้ำหนัก</h3>

            <?= $this->Form->create($weight, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
               
                <div class="form-group col-md-2">
                    <label class="col-form-label">น้ำหนัก(เฉพาะตัวเลข/กรัม) <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('value', ['class' => 'form-control', 'label' => false,'autofocus'=>'autofocus']) ?>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-form-label">ชื่อน้ำหนัก(ฉลาก) <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false,'autofocus'=>'autofocus']) ?>
                </div>
                <div class="form-group col-md-2">
                    <label class="col-form-label">มาตรฐานน้ำหนัก</label>
                    <?= $this->Form->select('sd_weight_id',$sdWeights, ['empty'=>true,'class' => 'form-control', 'label' => false]) ?> 
                </div>
                <div class="form-group col-md-5">
                    <label class="col-form-label">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'label' => false]) ?>
                </div>

            </div>
            <div class="form-group row">
               
                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                </div>
            </div>
            <?= $this->Form->hidden('product_category_id', ['value' => $productCatId]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>