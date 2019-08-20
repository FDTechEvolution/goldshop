<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'products'], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มสินค้าและบริการ</h3>

            <?= $this->Form->create($product, ['class' => '', 'novalidate' => true, 'id' => 'bankfrm']) ?>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="org_id">บริษัท<span class="text-danger">*</span></label>
                    <?= $this->Form->select('org_id', $orgs, ['class' => 'form-control', 'id' => 'org_id', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="product_category_id">หมวดหมู่สินค้า</label>
                    <?= $this->Form->select('product_category_id', $productCats, ['class' => 'form-control', 'id' => 'product_category_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="type">ประเภท<span class="text-danger">*</span></label>
                    <?= $this->Form->select('type', $productType, ['class' => 'form-control', 'id' => 'type', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="product_sub_category_id">ขนาด<span class="text-danger">*</span></label>
                    <?= $this->Form->select('product_sub_category_id', [], ['class' => 'form-control', 'id' => 'product_sub_category_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="product_sub_category_id">น้ำหนัก<span class="text-danger">*</span></label>
                    <?= $this->Form->select('product_sub_category_id', [], ['class' => 'form-control', 'id' => 'product_sub_category_id', 'label' => false]) ?>
                </div>
                <div class="col-md-3 form-group">
                    <label for="product_sub_category_id">ลวดลาย<span class="text-danger">*</span></label>
                    <?= $this->Form->select('product_sub_category_id', [], ['class' => 'form-control', 'id' => 'product_sub_category_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="unittype">หน่วยนับ<span class="text-danger">*</span></label>
                    <?= $this->Form->select('unittype', $unitTypeList, ['class' => 'form-control', 'id' => 'unittype', 'label' => false]) ?>
                </div>

                <div class="col-md-2 form-group">
                    <label for="standard_price">ราคามาตรฐาน<span class="text-danger">*</span></label>
                    <?= $this->Form->control('standard_price', ['class' => 'form-control', 'id' => 'standard_price', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <label for="actual_price">ราคาขาย<span class="text-danger">*</span></label>
                    <?= $this->Form->control('actual_price', ['class' => 'form-control', 'id' => 'actual_price', ' parsley-trigger' => 'change', 'label' => false]) ?>
                </div> 
                <div class="col-md-1 form-group">
                    <label for="isstock">Stock</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isstock', ['hiddenField' => 'N', 'id' => 'isstock', 'value' => 'Y']) ?>
                        <label for="isstock"></label>
                    </div>
                </div>
                <div class="col-md-1 form-group">
                    <label for="isactive">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive"></label>
                    </div>
                </div> 
                <div class="col-md-6 form-group">
                    
                </div>
                <div class="col-md-6 form-group">
                    
                </div>
                
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
<?= ''//$this->Html->script('product/formvalidations.js')?>
<script>

    $(document).ready(function () {
        $(function () {
            //var productCatJson = <?= $productCatJson ?>;
            var productCatJson = [];
            var $proCat = $('select[name=product_category_id]');

            $.fn.changeProductCatOption(productCatJson, $proCat.find('option:selected').text());

            $proCat.change(function () {
                var selectedProductCat = $(this).find('option:selected').text();
                $.fn.changeProductCatOption(productCatJson, selectedProductCat);
            });
        });

        $.fn.changeProductCatOption = function (productCatJson, selectedProductCat) {

            var $proSubCat = $('select[name=product_sub_category_id]');
            var optData = productCatJson[selectedProductCat];
            $proSubCat.empty();
            for (var i = 0; i < optData.length; i++) {
                $proSubCat.append($('<option>',
                        {
                            value: optData[i]['id'],
                            text: optData[i]['name']
                        }));
            }
            return true;
        };
    });
</script>