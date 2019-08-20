<?= $this->Html->script('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') ?>
<!-- CSS file -->
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.css') ?>

<?= $this->Form->create($order, ['id' => 'frm', 'autocomplete' => 'off','type'=>'file']) ?>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="form-group row">
                <div class="col-md-8">
                    <h1 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-store"></i>สั่งซื้อ/สั่งทำ</h1>
                </div>
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly','data-provide'=>'datepicker','data-date-language'=>'th-th','autocomplete'=>'off']) ?>
                </div>
                <div class="col-md-2">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 border-right">
                    <div class="row">
                        <div class='col-md-12 form-group '>
                            <label for="code">ผู้ขาย</label>
                            <?= $this->Form->select('seller', [], ['empty' => 'กรุณาเลือกผู้ขาย', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-12 form-group'>
                            <label for="code">วันครบกำหนด <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('duedate', ['type' => 'text', 'class' => 'form-control form-control-lg', 'id' => 'duedate', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off', 'readonly' => 'readonly']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border-left">
                    <h4 class="prompt-500 text-primary">ข้อมูลลูกค้า</h4>
                    <?= $this->element('Customers/form_modal_order') ?>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-md-12 border-right">
                    <h4 class="title-header prompt-500 text-primary">เพิ่มรายการสั่งซื้อ</h4>
                    <div class="row">
                        <div class="col-lg-9">
                            <?= $this->Form->control('product_name', ['class' => 'form-control form-control-lg', 'id' => 'product_name', 'label' => false, 'placeholder' => 'ระบุชื่อสินค้า']) ?>
                            <?= $this->Form->hidden('product_id', ['id' => 'product_id']) ?>
                        </div>
                        <div class="col-md-3">
                            <button type="button" id="search_product" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-plus"></i> เพิ่ม</button>
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
                                
                                <th colspan="2" width="100px">ภาพ</th>
                               
                                <th width="50px">ราคา</th>
                                <th width="50px">จำนวน</th>
                                <th width="100px">ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="start_row">
                                <td colspan="5" class="text-center text-warning">
                                    ยังไม่ได้เลือกสินค้า
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
            <div class="row">
                <div class="col-md-7 text-left">
                    <h3 class="prompt-400" id="totalamt_title_label">รวมราคา</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h3 id="subtotalamt_label" class="">0</h3>
                    <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
                </div>
            </div>
            <div class="row" id="receipt_box">
                <div class="col-md-6 text-left">
                    <h3 class="text-success prompt-400" id="">รับเงินมัดจำ</h3>
                </div>
                <div class="col-md-6 text-right color-green">
                    <h3 id="l_receipt_amt" class="prompt-400">0</h3>
                    <?= $this->Form->hidden('receiptamt', ['value' => '0', 'id' => 'receiptamt']) ?>
                </div>
                <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
                <div class="col-md-6 text-left"><h3 id="changeamt_title_label" class=" prompt-400">เงินทอน</h3></div>
                <div class="col-md-6 text-right"><h3 id="changeamt_label" class=" prompt-400">0</h3></div>

                <div class="col-md-12">
                    <p style="margin-bottom: 0px;"><strong>วิธีการชำระเงิน: </strong><span id="payment_method_label">เงินสด</span></p>
                    <p id="bank_f_box" style="display:none;"><strong>ธนาคาร/เครดิต: </strong><span id="bank_f_label"></span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-left">
                    <button type="button" class="btn btn-block btn-lg btn-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_receipt_modal"> 
                        <i class="ion-cash m-r-5"></i> <span>รับเงินมัดจำ</span> 
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-b-10">
                    <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 15px 0px;" id="bt_submit"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                </div>
            </div>
            <?= $this->element('key_order_modal'); ?>
        </div>
        
    </div>
</div>
<?= $this->Form->end() ?>

<?= $this->Html->script('order/validations.js') ?>
<?= $this->Html->script('order/order.js') ?>
<?= $this->Html->script('gold-selector.js')?>
<script>
    jQuery(document).ready(function () {
        var options = {
            data: <?= $productJsonList ?>,
            getValue: "name",
            placeholder: "กรอกรายการที่ต้องการ",
            highlightPhrase: true,
            list: {
                match: {
                    enabled: true
                },
                sort: {
                    enabled: true
                },
                onChooseEvent: function () {
                    var value = $("#product_name").getSelectedItemData().id;
                    $("#product_id").val(value);
                    console.log(value);
                }

            }
            //theme: "square"
        };

        $("#product_name").easyAutocomplete(options);

    });

</script>