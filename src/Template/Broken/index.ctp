
<?= $this->Html->script('barcode/jquery.pos.js') ?>
<?= $this->Form->create('broken', ['id' => 'frm']) ?>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="card m-b-20 card-body">

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-basket-fill"></i> ชำรุด</h1>
                </div>
                <div class="col-md-3">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                </div>
                <div class="col-md-3">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="row">
                        <div class='col-md-6 form-group '>
                            <label for="code">ผู้ทำรายการ</label>
                            <?= $this->Form->select('seller', $sellerList, ['empty' => 'กรุณาเลือกผู้ทำรายการ', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-6 form-group '>
                            <label for="code">คลังสินค้า</label>
                            <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control form-control-lg', 'id' => 'warehouse_id', 'label' => false,]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-lg-5 col-md-10 col-sm-12">
                    <?= $this->Form->control('product_code', ['class' => 'form-control form-control-lg', 'id' => 'product_code', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus']) ?>
                </div>
                <div class="col-md-2">
                    <button type="button" id="search_product" class="btn btn-lg btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i> </button>
                </div>
                
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" id="list_product">
                        <thead>
                            <tr>
                                <th width="40px"></th>
                                <th>สินค้าชำรุด</th>
                                <th width="100px" class="text-right">จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="start_row">
                                <td colspan="3" class="text-center text-warning">
                                    ยังไม่มีรายการ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                   
                </div>
            </div>

            <div class="form-group row m-t-15">
                <div class='col-md-12'>
                    <label>รายละเอียด/หมายเหตุ</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'rows' => '3', 'id' => 'description']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="row">
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 10px 0px;" id="save_document"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<audio>
    <audio src="<?= SITE_URL ?>sound/error.mp3" id="error_sound" type="audio/mpeg"></audio>
    Your browser isn't invited for super fun audio time.
</audio>

<?= $this->Html->script('broken/sales.js')?>
<?= $this->Html->script('scanner.js')?>