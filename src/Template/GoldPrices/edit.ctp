<div class="row">
    <div class="col-12">

        
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'gold-prices'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">แก้ไขราคาประจำวันที่ <?= h($todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></h3>

            <?= $this->Form->create('goldPrice', ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
            <div class="row">
                <div class="form-group col-md-3 col-sm-4">
                    <label class="col-form-label">น้ำหนัก</label>

                </div>
                <div class="form-group col-md-3 col-sm-4">
                    <label class="col-form-label">ขายออก <?= REQUIRE_FIELD ?></label>

                </div>
                <div class="form-group col-md-3 col-sm-4">
                    <label class="col-form-label">ซื้อเข้า <?= REQUIRE_FIELD ?></label>

                </div>
            </div>
            <?php $count = 0; ?>
            <?php foreach ($goldPrice->gold_price_lines as $item) : ?>
                <div class="row">
                    <div class="form-group col-md-3 col-sm-4">
                        <?= $this->Form->hidden('price[' . $count . '].sd_weight_id', ['value' => $item['sd_weight']['id']]) ?>
                        <?= $this->Form->control('_unittype', ['value' => $item['sd_weight']['name'], 'class' => 'form-control', 'label' => false, 'readonly' => 'readonly']) ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-4">
                        <?= $this->Form->control('price[' . $count . '].sales_price', ['value' => $item['sales_price'], 'class' => 'form-control', 'label' => false]) ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-4">
                        <?= $this->Form->control('price[' . $count . '].purchase_price', ['value' => $item['purchase_price'], 'class' => 'form-control', 'label' => false]) ?>
                    </div>
                </div>
                <?php $count++; ?>
            <?php endforeach; ?>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
     
    </div>
    
</div>