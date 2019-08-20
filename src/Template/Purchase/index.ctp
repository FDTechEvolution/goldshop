<?= $this->Html->script('barcode/jquery.pos.js') ?>
<?= $this->Form->create('purchase', ['id' => 'frm', 'autocomplete' => 'off']) ?>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="card m-b-20 card-body">

            <div class="form-group row">
                <div class="col-md-8">
                    <h1 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-store"></i>ซื้อ</h1>
                </div>
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                </div>
                <div class="col-md-2">
                    <label for="code">หมายเลข</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-6 border-right">
                    <div class="row">
                        <div class='col-md-12 form-group'>
                            <label for="code">ผู้ทำรายการ</label>
                            <?= $this->Form->select('seller', [], ['empty' => 'กรุณาเลือกผู้ทำรายการ', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-12 form-group'>
                            <label for="code">คลังเก็บสินค้า</label>
                            <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control form-control-lg', 'id' => 'warehouse_id', 'label' => false,]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border-left">

                    <div class="row">
                        <div class='col-md-12 form-group'>
                            <h4 class="title-header prompt-500 text-primary">ลูกค้า</h4>
                            <?= $this->element('Customers/form_modal') ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12 border-right">
                    <h4 class="title-header prompt-500 text-primary">เพิ่มรายการรับซื้อ</h4>
                    <div class="row">

                        <div class="col-lg-5 form-group">
                            <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false]) ?>
                        </div>

                        <div class="col-lg-4 form-group">
                            <?= $this->Form->select('design_id', [], ['empty' => 'ลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => false]) ?>
                        </div>
                        <div class="col-lg-3 form-group">
                            <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false]) ?>
                        </div>
                        <div class="col-lg-3 form-group">
                            <?= $this->Form->control('weight', ['type' => 'text', 'class' => 'form-control form-control-lg', 'id' => 'weight', 'label' => false, 'placeholder' => 'น้ำหนัก/กรัม', 'data-type' => 'float']) ?>
                        </div>
                        <div class="col-lg-3">
                            <?= $this->Form->control('price', ['class' => 'form-control form-control-lg', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคา', 'data-type' => 'float']) ?>
                            <?= $this->Form->hidden('price_sd', ['id' => 'price_sd']) ?>
                        </div>
                        <div class="col-lg-9">
                            <?= $this->Form->control('description', ['class' => 'form-control form-control-lg', 'id' => 'description', 'label' => false, 'placeholder' => 'รายละเอียด/บันทึก/หมายเหตุ']) ?>
                        </div>
                        <div class="col-md-3">
                            <button type="button" id="add_bt" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-plus"></i> เพิ่ม</button>
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
            <?= ''//$this->element('NumericKeybord/purchase'); ?>
            <div class="row m-b-10">
                <div class="col-md-6 text-left prompt-500"><h2 class="color-green">จำนวนเงิน</h2></div>
                <div class="col-md-6 text-right color-green"><h2 id="paidamt_label">0.00</h2></div>
                <?= $this->Form->hidden('paidamt', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'paidamt', 'value' => '']) ?>
                <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
            </div>
            <?= $this->element('payment_method') ?>
            <div class="row m-b-10">
                <div class="col-md-12 m-b-10">
                    <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 15px 0px;" id="savebutton"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                </div>
            </div>
        </div>

        <div class="card m-b-20 card-body" id="box_gold_purchase_price">

        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<?= $this->Html->script('purchase/validations.js') ?>
<?= $this->Html->script('purchase/purchase.js') ?>
<?= $this->Html->script('gold-price.js') ?>
<?= $this->Html->script('gold-selector.js')?>
<script>
    $(document).ready(function () {
        $.get(SITE_URL + 'service-product-categories/get-category/').done(function (res) {
            var jsonData = JSON.parse(res);
            $.each(jsonData, function (key, value) {
                //console.log(value);
                $('#product_category_id')
                        .append($("<option></option>")
                                .attr("value", value.product_cat.value)
                                .attr("data-id", value.product_cat.value)
                                .text(value.product_cat.text));
            });
            var product_category_id = $('#product_category_id').val();
            $.each(jsonData[product_category_id]['designs'], function (key, value) {

                $('#design_id')
                        .append($("<option></option>")
                                .attr("value", value.value)
                                .attr("data-id", value.value)
                                .text(value.text));

            });
            $('#product_category_id').on('change', function () {
                $('#design_id').empty();
                $('#design_id').append($("<option></option>").text('ลาย'));
                var dataid = $("#product_category_id option:selected").attr('data-id');
                $.each(jsonData[dataid]['designs'], function (key, value) {

                    $('#design_id')
                            .append($("<option></option>")
                                    .attr("value", value.value)
                                    .attr("data-id", value.value)
                                    .text(value.text));

                });
            });
        });


    });
</script>