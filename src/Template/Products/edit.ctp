<div class="row">

    <div class="col-12">
        <?php
        $isReadOnly = ($product->isprinted == 'XX') ? 'disabled' : 'A';
        ?>
        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'products'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">แก้ไข "<?= h($product->name . ', รหัส:' . $product->code) ?>"</h3>
            <hr/>
            <?= $this->Form->create($product, ['class' => '', 'novalidate' => true, 'id' => 'bankfrm', 'enctype' => 'multipart/form-data']) ?>
            <?php if ($product->isprinted == 'XX') { ?>
                <div class="row">
                    <div class="col-6 border-right">
                        <dl class="row">
                            <dt class="col-6">หมวดหมู่สินค้า</dt>
                            <dd class="col-6"><?= h($product->product_category->name) ?></dd>
                            <dt class="col-6">ขนาด</dt>
                            <dd class="col-6"><?= h($product->size->name) ?></dd>

                        </dl>
                    </div>
                    <div class="col-6">
                        <dl class="row">
                            <dt class="col-6">ลวดลาย</dt>
                            <dd class="col-6"><?= h($product->design->name) ?></dd>
                            <dt class="col-6">น้ำหนัก</dt>
                            <?php 
                            $weight = '';
                            if($product->weight_id != null && $product->weight_id !='0'){
                                $weight = $product->weight->name;
                            }else{
                                $weight = $product->manual_weight;
                            }
                            ?>
                            <dd class="col-6"><?= h($weight . ', ' . $product->percent . '%') ?></dd>
                        </dl>
                    </div>
                </div>
            <hr/>
                <div class="row">
                    <div class="col-md-2 form-group" id="box_cost">
                        <label for="standard_price">ค่ากำเหน็จ(บาท)</label>
                        <?= $this->Form->control('cost', ['type' => 'number', 'class' => 'form-control', 'id' => 'standard_price', ' parsley-trigger' => 'change', 'label' => false]) ?>
                    </div>
                    <div class="col-md-2 form-group" id="box_cost">
                        <label for="standard_price">ต้นทุน</label>
                        <?= $this->Form->control('cost2', ['class' => 'form-control', 'id' => 'cost2', ' parsley-trigger' => 'change', 'type' => 'text', 'label' => false,'value'=>$product['cost2']]) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="actual_price">ราคาขาย</label>
                        <?= $this->Form->control('actual_price', ['class' => 'form-control', 'id' => 'actual_price', ' parsley-trigger' => 'change', 'label' => false]) ?>
                    </div> 


                    <div class="col-md-2 form-group">
                        <label for="unittype">หน่วยนับ<span class="text-danger">*</span></label>
                        <?= $this->Form->select('unittype', $unitTypeList, ['class' => 'form-control', 'id' => 'unittype', 'label' => false]) ?>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="isactive">เปิดให้ใช้งาน</label>
                        <div class="checkbox">
                            <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                            <label for="isactive"></label>
                        </div>
                    </div> 
                    <div class="form-group col-md-2" id="box_img">
                        <label >ภาพ</label>
                        <?= $this->Form->control('img', ['id' => 'imgInp', 'type' => 'file', 'class' => 'form-control', 'label' => false]) ?>
                    </div>
                    <div id="showimg" style="display: none " class="form-group col-md-2">

                        <img id="blah" src="#" alt="your image" class="thumb-image" height="100" width="100" />
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="description">รายละเอียด</label>
                        <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                    </div>

                </div>
            <?php } else { ?>

                <div class="row">

                    <div class="col-md-3 form-group">
                        <label for="product_category_id">หมวดหมู่สินค้า</label>
                        <?= $this->Form->select('product_category_id', $productCats, ['class' => 'form-control', 'id' => 'product_category_id', 'label' => false, 'disabled' => $isReadOnly]) ?>
                    </div>

                    <div class="col-md-2 form-group" id="box_size">
                        <label for="size_id">ขนาด</label>
                        <input type="hidden" id="_size_id" value="<?= $product->size_id ?>"/>
                        <?= $this->Form->select('size_id', [], ['class' => 'form-control', 'id' => 'size_id', 'label' => false, 'disabled' => $isReadOnly]) ?>
                    </div>

                    <div class="col-md-5 form-group" id="box_design">
                        <label for="design_id">ลวดลาย</label>
                        <input type="hidden" name="_design_id" id="_design_id" value="<?= $product['design_id'] ?>" />
                        <?= $this->Form->select('design_id', [], ['class' => 'form-control', 'id' => 'design_id', 'label' => false, 'disabled' => $isReadOnly]) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="unittype">หน่วยนับ<span class="text-danger">*</span></label>
                        <?= $this->Form->select('unittype', $unitTypeList, ['class' => 'form-control', 'id' => 'unittype', 'label' => false]) ?>
                    </div>
                    <div class="col-md-2 form-group" id="box_weight">
                        <label for="weight_id">น้ำหนัก</label>
                        <input type="hidden" name="_weight_id" id="_weight_id" value="<?= $product->weight_id ?>"/>
                        <?= $this->Form->select('weight_id', $weights, ['class' => 'form-control', 'id' => 'weight_id', 'label' => false, 'disabled' => $isReadOnly]) ?>
                    </div>
                    <div class="col-md-2 form-group" id="box_manual_weight" style="display: none;">
                        <label for="manual_weight">น้ำหนักพิเศษ/g</label>
                        <?= $this->Form->control('manual_weight', ['class' => 'form-control', 'id' => 'manual_weight', 'type' => 'number', 'label' => false, 'value' => '0']) ?>
                    </div>
                    <div class="col-md-2 form-group" id="box_percent">
                        <label for="percent">%<span class="text-danger">*</span></label>
                        <?= $this->Form->select('percent', $percents, ['class' => 'form-control', 'id' => 'percent', 'label' => false, 'disabled' => $isReadOnly]) ?>
                    </div>

                    <div class="col-md-2 form-group" id="box_cost">
                        <label for="standard_price">ค่ากำเหน็จ(บาท)</label>
                        <?= $this->Form->control('cost', ['type' => 'number', 'class' => 'form-control', 'id' => 'standard_price', ' parsley-trigger' => 'change', 'label' => false]) ?>
                    </div>
                    <div class="col-md-2 form-group" id="box_cost">
                        <label for="standard_price">ต้นทุน</label>
                        <?= $this->Form->control('cost2', ['class' => 'form-control', 'id' => 'cost2', ' parsley-trigger' => 'change', 'type' => 'text', 'label' => false, 'value'=>$product['cost2']]) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="actual_price">ราคาขาย</label>
                        <?= $this->Form->control('actual_price', ['class' => 'form-control', 'id' => 'actual_price', ' parsley-trigger' => 'change', 'label' => false]) ?>
                    </div> 

                    <div class="col-md-3 form-group">
                        <label for="isactive">เปิดให้ใช้งาน</label>
                        <div class="checkbox">
                            <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                            <label for="isactive"></label>
                        </div>
                    </div> 
                    <div class="form-group col-md-2" id="box_img">
                        <label >ภาพ</label>
                        <?= $this->Form->control('img', ['id' => 'imgInp', 'type' => 'file', 'class' => 'form-control', 'label' => false]) ?>
                    </div>
                    <div id="showimg" style="display: none " class="form-group col-md-2">

                        <img id="blah" src="#" alt="your image" class="thumb-image" height="100" width="100" />
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">ชื่อสินค้า<span class="text-danger">*</span></label>
                        <?= $this->Form->control('name', ['class' => 'form-control form-control-lg', 'id' => 'name', ' parsley-trigger' => 'change', 'label' => false, 'disabled' => $isReadOnly]) ?>
                        <label for="code">รหัส</label>
                        <?= $this->Form->control('code', ['class' => 'form-control form-control-lg', 'id' => 'code', 'readonly' => 'readonly', 'label' => false, 'placeholder' => 'สร้างอัตโนมัติหลังจากบันทึก']) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="description">รายละเอียด</label>
                        <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                    </div>
                </div>
            <?php } ?>

            <div class="form-group row">

                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                    <button type="button" id="bt_delete" class="btn btn-warning waves-effect" data-id="<?= $product->id ?>"><i class="mdi mdi-delete-variant"></i> ลบสินค้านี้!</button>
                </div>
            </div>
            <?= $this->Form->hidden('isservice', ['id' => 'isservice']) ?>
            <?= $this->Form->end() ?>

            <?= $this->Form->create('delete', ['url' => ['controller' => 'products', 'action' => 'delete', $product->id], 'id' => 'frm_delete']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?=
$this->Html->script('product/product.js')?>