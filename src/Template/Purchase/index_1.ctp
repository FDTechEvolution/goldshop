<?= $this->Html->script('barcode/jquery.pos.js') ?>
<?= $this->Form->create($invoice, ['id' => 'frm', 'autocomplete' => 'off']) ?>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="card m-b-20 card-body">

            <div class="form-group row">
                <div class="col-md-8">
                    <h1 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-store"></i>ซื้อ/แลกเปลี่ยน</h1>
                </div>
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'datepicker', 'type' => 'text', 'label' => false, 'readonly' => 'readonly']) ?>
                </div>
                <div class="col-md-2">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>

            </div>
            <div class="form-group row">
                <div class='col-md-6 form-group'>
                    <label for="code">ผู้ทำรายการ</label>
                    <?= $this->Form->select('seller', $sellerList, ['empty' => 'กรุณาเลือกผู้ทำรายการ', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                </div>
                <div class='col-md-6 form-group'>
                    <label for="code">คลังสินค้า</label>
                    <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control form-control-lg', 'id' => 'warehouse_id', 'label' => false,]) ?>
                </div>

            </div>
            <h4 class="title-header prompt-500 text-primary">ลูกค้า</h4>
            <div class="form-group row">

                <?= $this->element('Customers/form_modal') ?>

            </div>
            
            <div class="form-group row">
                <div class="col-md-8 border-right">
                    <h4 class="title-header prompt-500 text-primary">เพิ่มรายการรับซื้อ/แลก</h4>
                    <div class="row">
                        <div class="col-lg-4 form-group">
                            <?= $this->Form->select('type', $productType, ['empty' => 'ประเภท', 'class' => 'form-control form-control-lg', 'id' => 'type', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus']) ?>
                        </div>
                        <div class="col-lg-5 form-group">
                            <?= $this->Form->select('product_category_id', $productCats, ['empty' => 'หมวดหมู่', 'class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus']) ?>
                        </div>
                        <div class="col-lg-3 form-group">
                            <?= $this->Form->select('percent', $percents, ['empty' => '%', 'class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus']) ?>
                        </div>
                        <div class="col-lg-5 form-group">
                            <?= $this->Form->select('design_id', $designs, ['empty' => 'ลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => false]) ?>
                        </div>
                        <div class="col-lg-3 form-group">
                            <?= $this->Form->select('weight_id', $weights, ['empty' => 'น้ำหนัก', 'class' => 'form-control form-control-lg', 'id' => 'weight_id', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus']) ?>
                        </div>

                        <div class="col-lg-4">
                            <?= $this->Form->control('price', ['class' => 'form-control form-control-lg', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคา']) ?>
                        </div>
                        <div class="col-lg-9">
                            <?= $this->Form->control('description', ['class' => 'form-control form-control-lg', 'id' => 'description', 'label' => false, 'placeholder' => 'รายละเอียด/บันทึก/หมายเหตุ']) ?>
                        </div>
                        <div class="col-md-3">
                            <button type="button" id="add_bt" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-plus"></i> เพิ่ม</button>
                        </div>
                    </div>

                </div>
                
                <div class="col-md-4 border-left">
                    <h4 class="title-header prompt-500 text-primary">เพิ่มรายการขาย</h4>
                    <div class="row">
                        
                        <div class="col-lg-12 form-group">
                            <?= $this->Form->control('product_code', ['class' => 'form-control form-control-lg', 'id' => 'product_code', 'label' => false, 'placeholder' => 'รหัสสินค้า']) ?>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="search_product" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" id="list_product">
                        <thead>
                            <tr>
                                <th width="40px"></th>
                                <th width="30px">#</th>
                                <th>สินค้า</th>
                                <th width="120px">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="start_row">
                                <td colspan="5" class="text-center text-warning">
                                    ยังไม่รายการ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="card m-b-20 card-body">
            <?= $this->element('NumericKeybord/purchase'); ?>
        </div>

        <?php if (!is_null($goldPrices)) { ?>
            <?php
            $gb = $goldPrices['gold_price']['gb'];
            $g = $goldPrices['gold_price']['g'];
            ?>
            <div class="card m-b-20 card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><?= h($goldPrices['title'] . ' : ' . $goldPrices['date']) ?></p>

                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th width="50%">ราคาซื้อ<?= $gb['title'] ?></th>
                                    <th>ราคาซื้อ<?= $g['title'] ?></th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td class="fa-2x"><?= number_format($gb['purchase']) ?></td>

                                    <td class="fa-2x"><?= number_format($g['purchase']) ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->Form->end() ?>
<audio>
    <audio src="<?= SITE_URL ?>sound/error.mp3" id="error_sound" type="audio/mpeg"></audio>
    Your browser isn't invited for super fun audio time.
</audio>
<?= $this->Html->script('purchase/validations.js') ?>
<?=
$this->Html->script('purchase/purchase.js')?>