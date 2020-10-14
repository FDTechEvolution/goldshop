<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'products'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มสินค้าและบริการ</h3>

            <?= $this->Form->create($product, ['class' => '', 'novalidate' => true, 'id' => 'bankfrm','enctype'=>'multipart/form-data']) ?>
            <div class="row">
               
                <div class="col-md-3 form-group">
                    <label for="product_category_id">หมวดหมู่สินค้า</label>
                    <?= $this->Form->select('product_category_id', $productCats, ['class' => 'form-control', 'id' => 'product_category_id', 'label' => false]) ?>
                </div>
              
                <div class="col-md-2 form-group" id="box_size">
                    <label for="size_id">ขนาด</label>
                    <?= $this->Form->select('size_id', [], ['class' => 'form-control', 'id' => 'size_id', 'label' => false]) ?>
                </div>
                
                <div class="col-md-5 form-group" id="box_design">
                    <label for="design_id">ลวดลาย</label>
                    <?= $this->Form->select('design_id', [], ['class' => 'form-control', 'id' => 'design_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="unittype">หน่วยนับ<span class="text-danger">*</span></label>
                    <?= $this->Form->select('unittype', $unitTypeList, ['class' => 'form-control', 'id' => 'unittype', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group" id="box_weight">
                    <label for="weight_id">น้ำหนัก</label>
                    <?= $this->Form->select('weight_id', $weights, ['class' => 'form-control', 'id' => 'weight_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group" id="box_manual_weight" style="display: none;">
                    <label for="weight_id">น้ำหนักพิเศษ/g</label>
                    <?= $this->Form->control('manual_weight', ['class' => 'form-control', 'id' => 'manual_weight','type'=>'tel', 'label' => false,'value'=>'0']) ?>
                </div>
                <div class="col-md-2 form-group"  id="box_percent">
                    <label for="percent">%<span class="text-danger">*</span></label>
                    <?= $this->Form->select('percent', $percents, ['class' => 'form-control', 'id' => 'percent', 'label' => false]) ?>
                </div>

                <div class="col-md-2 form-group" id="box_cost">
                    <label for="standard_price">ค่ากำเหน็จเพิ่มเติม (บาท)</label>
                    <?= $this->Form->control('cost', ['class' => 'form-control', 'id' => 'standard_price', ' parsley-trigger' => 'change','type'=>'tel', 'label' => false,'value'=>'0']) ?>
                </div>
                <div class="col-md-2 form-group" id="box_cost">
                    <label for="standard_price">ต้นทุน</label>
                    <?= $this->Form->control('cost2', ['class' => 'form-control', 'id' => 'cost2', ' parsley-trigger' => 'change','type'=>'text', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="actual_price">ราคาขาย (บาท)</label>
                    <?= $this->Form->control('actual_price', ['class' => 'form-control','type'=>'tel', 'id' => 'actual_price', ' parsley-trigger' => 'change', 'label' => false,'value'=>'0']) ?>
                </div> 
                <div class="form-group col-md-4" id="box_img">
                    <label >ภาพ</label>
                    <?= $this->Form->control('img', ['id'=>'imgInp','type' => 'file', 'class' => 'form-control', 'label' => false]) ?>
                </div>
                <div id="showimg" style="display: none " class="form-group col-md-2">
                   
                   <img id="blah" src="#" alt="your image" class="thumb-image" height="100" width="100" />
                </div>
               <?=$this->Form->hidden('isservice',['value'=>'N','id'=>'isservice'])?>
                

            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name">ชื่อสินค้า<span class="text-danger">*</span></label>
                    <?= $this->Form->control('name', ['class' => 'form-control form-control-lg', 'id' => 'name', ' parsley-trigger' => 'change', 'label' => false]) ?>
                    <label for="code">รหัส</label>
                    <?= $this->Form->control('code', ['class' => 'form-control form-control-lg', 'id' => 'code', 'readonly' => 'readonly', 'label' => false, 'placeholder' => 'สร้างอัตโนมัติหลังจากบันทึก']) ?>
                </div>
                <div class="col-md-6 form-group">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                    <?= BT_RESET ?>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('product/product.js')?>
