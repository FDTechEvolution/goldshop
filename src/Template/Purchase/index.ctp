<?= $this->Html->script('barcode/jquery.pos.js') ?>

<?= $this->Html->css('/js/bootstrap-select-1.13.14/dist/css/bootstrap-select.css')?>
<?= $this->Html->script('bootstrap-select-1.13.14/dist/js/bootstrap-select.js')?>
<?= $this->Form->create('purchase', ['id' => 'frm', 'autocomplete' => 'off']) ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20 card-body">

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="text-primary fa-3x f-kanit-700"><i class="mdi mdi-store"></i>ซื้อ</h1>
                </div>

                <div class="col-md-3">
                    <label for="code">หมายเลข</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>
                <div class='col-md-3'>
                    <label for="code">คลังเก็บสินค้า</label>
                    <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control input-sm', 'id' => 'warehouse_id', 'label' => false,]) ?>
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-6 border-right">
                    <div class="row">
                        <div class='col-md-12 form-group'>
                            <label for="code">พนักงานขาย</label>
                            <?= $this->Form->select('seller', [], ['empty' => 'กรุณาเลือกผู้ทำรายการ', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                            <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="code">เวลาทำรายการ</label>
                            <?= $this->Form->control('time', ['type' => 'tel', 'class' => 'form-control', 'id' => 'time', 'label' => false, 'data-toggle' => 'input-mask', 'data-mask-format' => '00:00', 'maxlength' => '8','placeholder'=>$time]) ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 border-left">

                    <div class="row">
                        <div class='col-md-12 form-group'>
                            <h4 class="title-header prompt-500 text-primary">ข้อมูลลูกค้า</h4>
                            <?= $this->element('Customers/form_modal') ?>
                        </div>

                    </div>
                </div>
            </div>
            <hr/>


            <div class="row m-b-10">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-primary font-bold" style="margin-bottom: 0.5rem;">ระบุรายละเอียดการรับซื้อ หลังจากนั้นกดปุ่ม "+เพิ่ม"</p>
                        </div>
                        <div class="col-md-4 form-group">
                            <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false,'data-live-search'=>'true']) ?>
                        </div>

                        <div class="col-md-6 form-group" style="display: none;">
                            <?= $this->Form->select('design_id', [], ['empty' => 'ลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => false]) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false]) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <?= $this->Form->control('weight', ['type' => 'tel', 'class' => 'form-control form-control-lg', 'id' => 'weight', 'label' => false, 'placeholder' => 'น้ำหนัก/กรัม', 'data-type' => 'float', 'data-action' => 'numpad']) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <?= $this->Form->control('price', ['class' => 'form-control form-control-lg', 'type' => 'tel', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคา', 'data-action' => 'numpad', 'data-type' => 'float',]) ?>
                            <?= $this->Form->hidden('price_sd', ['id' => 'price_sd']) ?>
                        </div>
                        <div class="col-md-12 form-group" style="display: none;">
                            <?= $this->Form->control('description', ['class' => 'form-control form-control-lg', 'id' => 'description', 'label' => false, 'placeholder' => 'รายละเอียด/บันทึก/หมายเหตุ']) ?>
                        </div>
                        <div class="col-md-2 text-center form-group">
                            <button type="button" id="add_bt" class="btn btn-lg btn-icon btn-block waves-effect waves-light btn-primary m-b-5" data-dismiss="modal" aria-hidden="true"> <i class="ti-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-b-10">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table" id="list_product">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40px"></th>
                                    <th width="30px">#</th>
                                    <th>สินค้า</th>
                                    <th class="text-right">น้ำหนัก</th>
                                    <th width="120px" class="text-right">ราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="start_row">
                                    <td colspan="5" class="text-center text-warning">
                                        ยังไม่มีรายการ กรุณาเพิ่มข้อมูลด้านบน
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">

                <div class="col-7">

                    <div class="row m-b-10">
                        <div class="col-md-6 text-left"><h3 class="text-primary f-kanit-700">รวมเป็นเงิน</h3></div>
                        <div class="col-md-6 text-right"><h2 id="paidamt_label" class="text-primary f-kanit-700">0.00</h2></div>
                        <?= $this->Form->hidden('paidamt', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'paidamt', 'value' => '']) ?>
                        <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
                    </div>
                    <?= $this->element('payment_method') ?>

                </div>
                <div class="col-5 border-left">

                    <div class="row">
                        <div class="col-md-12 button-list">

                            <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 10px 0px;" id="savebutton"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                        </div>
                    </div>
                </div>

                <div class="card m-b-20 card-body" id="box_gold_purchase_price" style="display: none;">

                </div>

            </div>
        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<hr/>
<div class="row">
    <div class="col-12">

        <div class="card card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="prompt-500">รายการรับซื้อล่าสุดวันนี้</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>หมายเลขเอกสาร</th>
                                <th>เวลาทำรายการ</th>


                                <th>รายการรับซื้อ</th>
                                <th>น้ำหนัก(g)</th>
                                <th class="text-right">จ่ายเงิน</th>
                                <th>พนักงาน</th>

                                <th>วิธีการชำระเงิน</th>

                                <th>ลูกค้า</th>
                            </tr>
                        </thead>
                        <tbody class="hand-cursor">
                            <?php
                            
                            ?>
                            <?php foreach ($toDayTransactions['items'] as $payment): ?>
                                <?php foreach ($payment['payment_lines'] as $line): ?>
                                    <?php
                                    $lineClass = '';
                                    //debug($invoice);
                                    $des = $payment->isexchange == 'Y' ? '<span class="badge badge-danger">แลกเปลี่ยน</span>' : '';
                                    $_product = $line->product->name;
                                    $des = ($des == '') ? $_product : $des . '<br/>' . $_product;

                                    $paymentDes = '';


                                    if ($payment->payment_method == 'CASH') {
                                        $paymentDes = '<span class="badge badge-success">เงินสด</span>';
                                    } elseif ($payment->payment_method == 'TRAN') {
                                        $paymentDes = '<span class="badge badge-success">โอนเงิน</span>';
                                    } elseif ($payment->payment_method == 'CRED') {
                                        $paymentDes = '<span class="badge badge-success">บัตรเครดิต</span>';
                                    } else {
                                        $paymentDes = ($paymentDes == '') ? $payment->bank_account->account_name : ', ' . $payment->bank_account->account_name;
                                    }

                                    if ($line->isoverprice == 'Y') {
                                        $lineClass = 'text-danger';
                                    }
                                    ?>
                                    <tr class="<?= $lineClass ?> <?= $payment->docstatus == 'VO' ? 'text-void' : '' ?>" data-url="<?= SITE_URL . 'purchase/view/' . h($payment->id) ?>">
                                        <td><small><?= h($payment->docno) ?></small></td>
                                        <td class=""><?= $payment->docstatus == 'VO' ? '<span class="badge badge-danger">ยกเลิก</span> ' : '' ?><small><?= h($payment->created->i18nFormat(TIME_FORMATE, null, TH_DATE)) ?></small></td>


                                        <td><small><?= $des ?></small></td>
                                        <td><?= number_format($line->product->manual_weight, 2) ?>g</td>
                                        <td class="text-right"><?= h($this->Number->format($line->amount)) ?></td>
                                        <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>

                                        <td><?= $paymentDes ?></td>

                                        <td><small><?= h($payment->has('bpartner') ? $payment->bpartner->name : '') ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->Html->script('/css/assets/libs/jquery-mask-plugin/jquery.mask.min.js') ?>

<?= $this->Html->script('purchase/validations.js') ?>
<?= $this->Html->script('purchase/purchase.js') ?>
<?= $this->Html->script('gold-price.js') ?>
<?= $this->Html->script('gold-selector.js') ?>
<script>
    $(document).ready(function () {

        $('[data-toggle="input-mask"]').each(function (t, e) {
            var n = $(e).data("maskFormat"), a = $(e).data("reverse");
            null != a ? $(e).mask(n, {reverse: a}) : $(e).mask(n)
        });


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
            
            $('#product_category_id').selectpicker({
                virtualScroll:true
            });
            
        });


    });
</script>
<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
        
        
    });

    $("#bt_search").click(function () {
        var txt = $("#txt").val();
        if (txt === '') {
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุเลขเอกสาร', '');
            return false;
        } else {
            $('#showall').submit();
        }

    });
</script>