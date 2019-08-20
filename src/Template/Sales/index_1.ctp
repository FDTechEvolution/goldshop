<?= $this->Html->script('barcode/jquery.pos.js') ?>
<?= $this->Form->create($invoice, ['id' => 'frm']) ?>
<div class="row">
    <div class="col-sm-8 col-xs-12">
        <div class="card m-b-20 card-body">

            <div class="form-group row">
                <div class="col-md-8">
                    <h1 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-store"></i> ขาย</h1>
                </div>
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
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
                            <?= $this->Form->select('seller', $sellerList, ['empty' => 'กรุณาเลือกผู้ขาย', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-12 form-group '>
                            <label for="code">คลังสินค้า</label>
                            <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control form-control-lg', 'id' => 'warehouse_id', 'label' => false,]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 border-left">
                    <h4 class="prompt-500 text-primary">ข้อมูลลูกค้า</h4>
                    <?= $this->element('Customers/form_modal') ?>
                </div>

            </div>
            <hr/>

            <div class="form-group row">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <?= $this->Form->control('product_code', ['class' => 'form-control form-control-lg', 'id' => 'product_code', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus','data-type'=>'modal_edit']) ?>
                </div>
                <div class="col-md-1">
                    <button type="button" id="search_product" class="btn btn-lg btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i> </button>
                </div>
                <div class="col-md-3">
                    <button type="button" id="" class="btn btn-lg btn-block waves-effect waves-light btn-outline-secondary m-b-5" data-toggle="modal" data-target="#exchange_product_form" data-name=""> <i class="ti-reload"></i> แลกเปลี่ยน </button>
                </div>
                <div class="col-md-3">
                    <button type="button" id="" class="btn btn-lg btn-block waves-effect waves-light btn-outline-secondary m-b-5" data-toggle="modal" data-target="#order" data-name=""> <i class="mdi mdi-clipboard"></i> ใบสั่งซื้อ </button>
                </div>
            </div>

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" id="list_product">
                        <thead>
                            <tr>
                                <th width="40px"></th>

                                <th>สินค้า</th>
                                <th width="100px">ราคา</th>
                                <th width="100px">จำนวน</th>
                                <th width="120px">ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="start_row">
                                <td colspan="5" class="text-center text-warning">
                                    ยังไม่มีรายการ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table" id="list_order_product">

                        <tbody>

                        </tbody>
                    </table>

                    <table class="table" id="list_exchange" style="display:none;">
                        <tbody> 
                        </tbody>
                    </table>
                    <table class="table" id="list_glitem" style="display:none;">
                        <tbody>  
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

            <div class="col-md-12">
                <?= $this->element('exchange_modal') ?>
            </div>

            <div class="col-md-12">
                <div id="order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title text-primary prompt-500">รายการสั่งซื้อ</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <table id="list_order_table" class="table table-hover no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">

                                        <thead>
                                            <tr role="row">
                                                <th>ลูกค้า</th>
                                                <th>วันที่</th>
                                                <th>รายการ</th>
                                                <th>จำนวนเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $order): ?>
                                                <tr role="row" class="hand-cursor" id="<?= h($order->id) ?>">


                                                    <td><?= $order->bpartner->name ?></td>
                                                    <td class="column-date"><?= h($order->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                                    <?php
                                                    $lines = $order->order_lines;
                                                    $des = '';
                                                    if (sizeof($lines) > 0) {
                                                        $des = $lines[0]['product']['name'];
                                                    }
                                                    ?>
                                                    <td><?= h($des) ?></td>
                                                    <td><strong><?= $this->Number->format($order->totalamt) ?></strong></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?= $this->Form->hidden('order_id', ['id' => 'order_id']) ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="list_order_modal_save">เลือก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="card m-b-20 card-body">
            <?= ''// $this->element('NumericKeybord/sales'); ?>
            <div class="row">
                <div class="col-md-7 text-left">
                    <h3 class="prompt-400" id="totalamt_title_label">รวมราคา</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h3 id="subtotalamt_label" class="">0</h3>
                    <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
                </div>
            </div>
            <div class="row" id="box_discount"  style="display: none;">
                <div class="col-md-6 text-left"><h4 class="text-danger prompt-300">ส่วนลด</h4></div>
                <div class="col-md-6 text-right text-danger"><h4 id="l_discount_amt" class="prompt-300">0</h4></div>
                <?= $this->Form->hidden('discountamt', ['id' => 'discountamt', 'value' => '0']) ?>
            </div>
            <div class="row" id="box_saving" style="display: none;">
                <div class="col-md-6 text-left">
                    <h3 class="text-success prompt-400" id="">ใช้เงินออม</h3>
                </div>
                <div class="col-md-6 text-right color-green">
                    <h3 id="l_saving_amt" class="prompt-400">0</h3>
                    <?= $this->Form->hidden('savingamt', ['value' => '0', 'id' => 'savingamt']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 text-left">
                    <h3 class="text-success prompt-400" id="totalamt_title_label">รวมราคาทั้งหมด</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h2 id="l_total_amt" class="text-success">0</h2>
                    <?= $this->Form->hidden('totalamt', ['label' => false, 'id' => 'totalamt', 'value' => '0']) ?>
                </div>
            </div>
            <hr/>
            
            <div class="row" id="receipt_box">
                <div class="col-md-6 text-left">
                    <h3 class="text-success prompt-400" id="">รับเงิน</h3>
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

            </div>
            <div class="row">
                <div class="col-md-6 text-left">
                    <button type="button" class="btn btn-block btn-lg btn-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_receipt_modal" id="bt_receipt"> 
                        <i class="ion-cash m-r-5"></i> <span>รับเงิน</span> 
                    </button>
                </div>
                <div class="col-md-6 text-left" style="display: none;" id="box_saving_bt">
                    <button type="button" class="btn btn-block btn-lg btn-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_saving_modal"> 
                        <i class=" mdi mdi-coin m-r-5"></i> <span>เงินออม</span> 
                    </button>
                </div>
                <div class="col-md-6 text-left">
                    <button type="button" class="btn btn-block btn-lg btn-warning waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_discount_modal"> 
                        <i class="ion-arrow-graph-down-right m-r-5"></i> <span>ส่วนลด</span> 
                    </button>
                </div>


            </div>
            <?= $this->element('key_receipt_modal') ?>
            <?= ''// $this->element('key_discount_modal') ?>
            <div class="row">
                <div class="col-md-12 m-b-10">
                    <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 15px 0px;" id="bt_submit"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                </div>
            </div>
        </div>
        
        <div class="card m-b-20 card-body" id="box_gold_all_price">
            
        </div>
    </div>
    
</div>

<div id="form_text_edit" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary prompt-500">แก้ไขข้อมูล</h4>
            </div> 
            <div class="modal-body">
                <div class="row">
                    <input type="text" class="form-control" value="" id="_text_edit_modal">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="form_text_edit_save">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>
<?= $this->Html->script('sales/validations.js') ?>
<?= $this->Html->script('sales/sales.js') ?>
<?= $this->Html->script('scanner.js') ?>
<?= $this->Html->script('sales/exchange.js')?>
<?= $this->Html->script('gold-price.js')?>
