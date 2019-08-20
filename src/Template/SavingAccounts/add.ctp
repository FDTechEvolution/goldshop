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
                    <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly']) ?>
                </div>
                <div class="col-md-2">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>

            </div>
            <div class="form-group row">
                <div class='col-md-6'>
                    <label for="code">ผู้ขาย</label>
                    <?= $this->Form->select('seller', $sellerList, ['empty' => 'กรุณาเลือกผู้ขาย', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                </div>
                <div class='col-md-6'>
                    <label for="code">คลังสินค้า</label>
                    <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control form-control-lg', 'id' => 'warehouse_id', 'label' => false,]) ?>
                </div>
            </div>
            <h4 class="title-header prompt-500 text-primary">ลูกค้า</h4>
            <div class="form-group row">
                <?= $this->element('Customers/form_modal') ?>
            </div>

            <h4 class="title-header prompt-500 text-primary">รายการสินค้า</h4>
            <div class="form-group row">
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <?= $this->Form->control('product_code', ['class' => 'form-control form-control-lg', 'id' => 'product_code', 'label' => false, 'placeholder' => 'รหัสสินค้า', 'autofocus' => 'autofocus']) ?>
                </div>
                <div class="col-md-1">
                    <button type="button" id="search_product" class="btn btn-lg btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i> </button>
                </div>
                <div class="col-md-3">
                    <button type="button" id="search_product" class="btn btn-lg btn-block waves-effect waves-light btn-outline-secondary m-b-5" data-toggle="modal" data-target="#exchange_product_form" data-name=""> <i class="ti-reload"></i> แลกเปลี่ยน </button>
                </div>
                <div class="col-md-3">
                    <button type="button" id="search_product" class="btn btn-lg btn-block waves-effect waves-light btn-outline-secondary m-b-5" data-toggle="modal" data-target="#order" data-name=""> <i class="mdi mdi-clipboard"></i> ใบสั่งซื้อ </button>
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
                                <th width="100px">ราคา</th>
                                <th width="100px">จำนวน</th>
                                <th width="120px">ราคารวม</th>
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
            
            <div class="col-12 border-top">
                <div class="table-responsive">
                    <table class="table" id="list_exchange" style="display:none;">
                        <thead>
                            <tr class="">
                                <th colspan="3">รายการแลกเปลี่ยน</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-12 text-center border-top m-t-20">
                <?php if (!is_null($goldPrices)) { ?>
                    <?php
                    $gb = $goldPrices['gold_price']['gb'];
                    $g = $goldPrices['gold_price']['g'];
                    ?>
                    <p class="m-t-15"><?= h($goldPrices['title'] . ' : ' . $goldPrices['date']) ?></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="50%">ราคาขาย<?= $gb['title'] ?></th>
                                <th>ราคาขาย<?= $g['title'] ?></th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="fa-2x"><?= number_format($gb['sales']) ?></td>
                                <td class="fa-2x"><?= number_format($g['sales']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>

            <div class="col-md-12">
                <div id="exchange_product_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title text-primary prompt-500">รายการขอแลกเปลี่ยน</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <table id="list_exchange_modal" class="table table-hover no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">

                                        <thead>
                                            <tr role="row">
                                                
                                                <th>ลูกค้า</th>
                                                <th>วันที่</th>
                                                <th>รายการ</th>
                                                <th>จำนวนเงิน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($invoiceExchanges as $invoice): ?>
                                                <tr role="row" class="hand-cursor" id="<?=h($invoice->id)?>">

                                                   
                                                    <td><?= $invoice->bpartner->name ?></td>
                                                    <td class="column-date"><?= h($invoice->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                                    <?php
                                                    $lines = $invoice->invoice_lines;
                                                    $des = '';
                                                    if (sizeof($lines) > 0) {
                                                        $des = $lines[0]['product']['name'];
                                                    }
                                                    ?>
                                                    <td><?= h($des) ?></td>
                                                    <td><strong><?= $this->Number->format($invoice->totalamt) ?></strong></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?= $this->Form->hidden('invoice_exchange_id',['id'=>'invoice_exchange_id'])?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="list_exchange_modal_save">เลือก</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <table id="list_exchange_modal" class="table table-hover no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">

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
                                                <tr role="row" class="hand-cursor" id="<?=h($order->id)?>">

                                                   
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
                                    <?= $this->Form->hidden('order_id',['id'=>'order_id'])?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="list_exchange_modal_save">เลือก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    <div class="col-sm-4 col-xs-12">
        <div class="card m-b-20 card-body">
            <?= $this->element('NumericKeybord/sales'); ?>
        </div>


    </div>
</div>
<?= $this->Form->end() ?>
<audio>
    <audio src="<?= SITE_URL ?>sound/error.mp3" id="error_sound" type="audio/mpeg"></audio>
    Your browser isn't invited for super fun audio time.
</audio>
<?= $this->Html->script('sales/validations.js') ?>
<?=
$this->Html->script('sales/sales.js')?>