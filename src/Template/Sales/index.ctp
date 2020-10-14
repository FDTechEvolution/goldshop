
<?= $this->Html->css('assets/libs/rwd-table/rwd-table.min.css') ?>
<?= $this->Html->css('/js/bootstrap-select-1.13.14/dist/css/bootstrap-select.css') ?>
<?= $this->Html->script('bootstrap-select-1.13.14/dist/js/bootstrap-select.js') ?>
<?= $this->Form->create('', ['id' => 'frm']) ?>
<?= $this->Form->hidden('receiptamt', ['value' => '0', 'id' => 'receiptamt']) ?>
<?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20 card-body">
            <div class="row form-group">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x f-kanit-700"><i class="mdi mdi-store"></i> ขาย</h1>
                </div>

                <div class="col-md-3">
                    <label for="code">หมายเลขเอกสาร</label>
                    <?= $this->Form->control('code', ['class' => 'form-control input-sm', 'id' => 'code', 'value' => $docNo, 'label' => false, 'readonly' => 'readonly']) ?>
                </div>
                <div class='col-md-3'>
                    <label for="code">คลังสินค้า</label>
                    <?= $this->Form->select('warehouse_id', $warehouseList, ['class' => 'form-control input-sm', 'id' => 'warehouse_id', 'label' => false,]) ?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 border-right">
                    <div class="row">
                        <div class='col-md-12 form-group '>
                            <label for="code">ผู้ขาย</label>
                            <?= $this->Form->select('seller', [], ['empty' => 'กรุณาเลือกผู้ขาย', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                            <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="code">เวลาทำรายการ<span class="text-danger">*</span></label>
                            <?= $this->Form->control('time', ['type' => 'tel', 'class' => 'form-control', 'id' => 'time', 'value' => $time, 'label' => false, 'data-toggle' => 'input-mask', 'data-mask-format' => '00:00', 'maxlength' => '8']) ?>
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

                <div class="col-md-4">
                    <button type="button" id="" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i> เลือกสินค้าด้วยตัวเอง </button>
                </div>
                <div class="col-md-4">
                    <button type="button" id="bt-exchange" class="btn btn-lg btn-block waves-effect waves-light btn-outline-secondary m-b-5"> <i class="ti-reload"></i> เพิ่มรายการแลกเปลี่ยน</button>
                </div>
                <div class="col-md-4">
                    <button type="button" id="bt_order" class="btn btn-lg btn-block waves-effect waves-light btn-outline-secondary m-b-5" data-toggle="modal" data-target="#order" data-name=""> <i class="mdi mdi-clipboard"></i> รายการจากใบสั่งซื้อ </button>
                </div>
            </div>
            <hr/>
            <div class="row form-group" id="box-exchange" style="display: none;">
                <div class="col-12">
                    <p class="font-bold text-primary">*** ราคาแลกเปลี่ยน คือจำนวนเงินที่ต้องรับเงินหรือจ่ายเงินเพิ่มให้ลูกค้า กรณีจ่ายคืนลูกค้า ให้ใส่เลขติดลบ</p>
                </div>
                <div class="col-md-4 form-group">
                    <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false, 'data-live-search' => 'true']) ?>
                </div>
                <div class="col-md-2 form-group">
                    <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false]) ?>
                </div>
                <div class="col-lg-4 form-group" style="display: none;">
                    <?= $this->Form->select('design_id', [], ['empty' => 'ลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => false]) ?>
                </div>
                <div class="col-md-2 form-group">
                    <?= $this->Form->control('weight', ['type' => 'tel', 'class' => 'form-control form-control-lg', 'id' => 'weight', 'label' => false, 'placeholder' => 'น้ำหนัก/กรัม', 'data-action' => 'numpad']) ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('price', ['type' => 'tel', 'class' => 'form-control form-control-lg', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคาแลกเปลี่ยน', 'data-action' => 'numpad']) ?>
                </div>
                <div class="col-md-2">
                    <button type="button" id="exchange_modal_save" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-outline-primary"> <i class="ti-plus"></i> เพิ่ม</button>
                </div>


            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table" id="list_product" style="margin-bottom: 0px;">
                            <thead class="thead-light">
                                <tr>
                                    <th width="40px"></th>

                                    <th>สินค้า</th>
                                    <th width="100px">ราคา</th>
                                    <th width="100px" class="text-right">จำนวน</th>
                                    <th width="200px" class="text-right">น้ำหนักรวม(g)</th>
                                    <th width="120px" class="text-right">ราคารวม</th>
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
                        <table class="table" id="list_order_product" style="margin-bottom: 0px;">

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
            </div>



            <div class="form-group row">
                <div class='col-md-12'>
                    <label>รายละเอียด/หมายเหตุ</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'rows' => '3', 'id' => 'description']) ?>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-7 border-right">
                    <div class="row">
                        <div class="col-md-7 text-left">
                            <h3 class="prompt-400" id="totalamt_title_label">ราคา</h3>    
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
                            <h3 class="text-success prompt-400" id="totalamt_title_label">รวมราคา</h3>    
                        </div>
                        <div class="col-md-5 text-right">
                            <h2 id="l_total_amt" class="text-success">0</h2>
                            <?= $this->Form->hidden('totalamt', ['label' => false, 'id' => 'totalamt', 'value' => '0']) ?>
                        </div>
                    </div>
                    <hr/>

                    <div class="row" id="receipt_box">




                    </div>

                    <div class="row">
                        <?= $this->element('key_receipt_modal') ?>
                        <?= ''// $this->element('key_discount_modal') ?>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-md-12 m-b-10 button-list">
                            <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 5px 0px;" id="bt_submit"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
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
                                    <table id="list_order_table" class="table table-hover no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">

                                        <thead>
                                            <tr role="row">
                                                <th>ลูกค้า</th>
                                                <th>วันที่</th>
                                                <th>รายการ</th>
                                                <th>จำนวนเงินมัดจำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4" class="text-danger">กรุณาเลือกข้อมูลลูกค้าก่อน</td>
                                            </tr>
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


</div>
<hr/>

<div class="row">
    <div class="col-12">
        <div class="card m-b-20 card-body">
            <div class="responsive-table-plugin">
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table">
                            <thead>
                                <tr>
                                    <th>วันที่บันทึก</th>
                                    <th>หมายเลขเอกสาร</th>

                                    <th>รายการ</th>
                                    <th>น้ำหนัก</th>
                                    <th class="text-right">มูลค่า</th>
                                    <th>รายการแลกเปลี่ยน</th>
                                    <th>น้ำหนัก</th>
                                    <th>ค่าแลก</th>
                                    <th class="text-right">รับเงินทั้งหมด</th>

                                    <th>วิธีการชำระเงิน</th>

                                    <th class="text-right">ใช้เงินออม</th>
                                    <th class="text-right">ส่วนลด</th>

                                    <th>พนักงาน</th>
                                    <th>ลูกค้า</th>
                                </tr>
                            </thead>
                            <tbody class="hand-cursor">

                                <?php foreach ($toDayTransactions['items'] as $payment): ?>
                                    <?php
                                    $lineClass = '';
                                    $icon = '';
                                    $des = $payment->isexchange == 'Y' ? '<span class="badge badge-danger">แลกเปลี่ยน</span>' : '';
                                    if ($payment->has('payment_lines') && sizeof($payment->payment_lines) > 0) {
                                        foreach ($payment->payment_lines as $line) {
                                            if ($line->has('product')) {
                                                $_product = $line->product->name . ' มูลค่า ' . $this->Number->format($line->totalamount);
                                                $des = ($des == '') ? $_product : $des . $_product;
                                            }
                                            if ($line->isoverprice == 'Y') {
                                                $lineClass = 'text-primary';
                                                $icon = '<i class="mdi mdi-alert-circle-outline"></i>';
                                            }
                                        }
                                    }

                                    $paymentDes = '';

                                    if ($payment->has('payment_method_lines') && sizeof($payment->payment_method_lines) > 0) {
                                        foreach ($payment->payment_method_lines as $line) {

                                            if ($line->payment_method == 'CASH') {
                                                $paymentDes = $paymentDes . ',เงินสด';
                                            } elseif ($line->payment_method == 'TRAN') {
                                                $paymentDes = $paymentDes . ',โอนเงิน';
                                            } elseif ($line->payment_method == 'CRED') {
                                                $paymentDes = $paymentDes . ',บัตรเครดิต';
                                            } else {
                                                $paymentDes = ($paymentDes == '') ? $line->bank_account->account_name : ', ' . $line->bank_account->account_name;
                                            }
                                        }
                                    }
                                    ?>
                                    <tr class="<?= $payment->docstatus == 'VO' ? 'text-void' : '' ?>" data-url="<?= SITE_URL . 'sales/view/' . h($payment->id) ?>">
                                        <td class=""><?= $payment->docstatus == 'VO' ? '<span class="badge badge-danger">ยกเลิก</span> ' : '' ?> <small><?= h($payment->created->i18nFormat(TIME_FORMATE, null, TH_DATE)) ?></small></td>
                                        <td><small><?= h($payment->docno) ?></small></td>

                                        <td>
                                            <?php
                                            foreach ($payment->payment_lines as $line) {
                                                echo '<p>' . $line->product->name . '</p>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <?php
                                            foreach ($payment->payment_lines as $line) {
                                                if (is_null($line->product->weight)) {
                                                    echo '<p>-</p>';
                                                } else {
                                                    echo '<p>' . $line->product->weight->value . '</p>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <?php
                                            foreach ($payment->payment_lines as $line) {
                                                echo '<p>' . number_format($line->totalamount) . '</p>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            foreach ($payment['refs'] as $p) {
                                                foreach ($p->payment_lines as $line) {
                                                    echo '<p><i class="ti-reload text-primary"></i> ' . $line->product->name . '</p>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <?php
                                            foreach ($payment['refs'] as $p) {
                                                foreach ($p->payment_lines as $line) {
                                                    echo '<p>' . $line->product->manual_weight . '</p>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            <?php
                                            foreach ($payment['refs'] as $p) {
                                                foreach ($p->payment_lines as $line) {
                                                    echo '<p>' . number_format($line->exchangamt) . '</p>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="text-right <?= $lineClass ?>"><?= $icon ?> <?= h($this->Number->format($payment->totalamt)) ?></td>


                                        <td><?= $paymentDes ?></td>

                                        <td class="text-right"><?= h($this->Number->format($payment->usesavingamt)) ?></td>
                                        <td class="text-right"><?= h($this->Number->format($payment->discount)) ?></td>

                                        <td><small><?= h($payment->has('bpartner') ? $payment->bpartner->name : '') ?></small></td>
                                        <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
<?= $this->Html->script('sales/order.js') ?>
<?= $this->Html->script('jquery.scannerdetection.js') ?>
<?= $this->Html->script('sales/exchange.js') ?>
<?= $this->Html->script('gold-price.js') ?>
<?= $this->Html->script('gold-selector.js') ?>
<?= $this->Html->script('/css/assets/libs/jquery-mask-plugin/jquery.mask.min.js') ?>
<script>

    function enableDetect() {
        $(document).scannerDetection({

            //https://github.com/kabachello/jQuery-Scanner-Detection

            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
            avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
            preventDefault: true,
            ignoreIfFocusOn: true,
            scanButtonKeyCode: true,
            endChar: [13],
            minLength: 5,
            onComplete: function (barcode, qty) {
                validScan = true;


                //$('#scannerInput').val(barcode);
                console.log(barcode);
                var warehouse_id = $('#warehouse_id').val();

                $(document).productProcess(barcode.trim(), warehouse_id, 'list_product');

            } // main callback function	,
            ,
            onError: function (string, qty) {
                //let focused = $(':focus');
                //$(':focus').val($(':focus').val() + string).trigger('change').trigger('keyup');
                //console.log(barcode);

            },
            onKeyDetect: function (event) {
                console.log(event);
                return false;
            }


        });
    }
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
        
        enableDetect();

        $('input[type="text"]').on('click', function () {
            $(document).scannerDetection(false);
        });
        $('input[type="number"]').on('click', function () {
            $(document).scannerDetection(false);
        });
        $('input[type="tel"]').on('click', function () {
            $(document).scannerDetection(false);
        });


        $('[data-toggle="input-mask"]').each(function (t, e) {
            var n = $(e).data("maskFormat"), a = $(e).data("reverse");
            null != a ? $(e).mask(n, {reverse: a}) : $(e).mask(n)
        });
    });
</script>
<script>
    $(document).ready(function () {

        $('#bt-exchange').on('click', function () {
            $('#box-loading').show();
            $('#box-exchange').show();

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
                    virtualScroll: true
                });

                $('#box-loading').hide();

            });
        });




    });
</script> 