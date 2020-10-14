<?= $this->Html->script('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') ?>
<!-- CSS file -->
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.css') ?>

<?= $this->Form->create($order, ['id' => 'frm', 'autocomplete' => 'off', 'type' => 'file']) ?>
<?= $this->Form->hidden('receiptamt', ['value' => '0', 'id' => 'receiptamt']) ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20 card-body">
            <div class="row pt-2">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x f-kanit-700"><i class="mdi mdi-store"></i>สั่งซื้อ/สั่งทำ</h1>
                </div>

            </div>
            <hr/>

            <div class="row">
                <div class="col-md-6 border-right">
                    <div class="row">
                        <div class='col-md-6 form-group'>
                            <label for="code">ผู้ขาย</label>
                            <?= $this->Form->select('seller', [], ['empty' => 'กรุณาเลือกผู้ขาย', 'class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="code">หมายเลขเอกสาร <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('docno', ['class' => 'form-control input-sm', 'id' => 'docno', 'value' => '', 'label' => false]) ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="code">วันที่ทำรายการ <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('docdate', ['class' => 'form-control input-sm', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off']) ?>
                        </div>
                        <div class="col-md-6">
                            <label for="code">เวลาทำรายการ<span class="text-danger">*</span></label>
                            <?= $this->Form->control('time', ['type' => 'tel', 'class' => 'form-control', 'id' => 'time', 'value' => $time, 'label' => false, 'data-toggle' => 'input-mask', 'data-mask-format' => '00:00', 'maxlength' => '8']) ?>
                        </div> 
                        <div class='col-md-6 form-group'>
                            <label for="code">วันครบกำหนด <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('duedate', ['type' => 'text', 'class' => 'form-control', 'id' => 'duedate', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'autocomplete' => 'off', 'readonly' => 'readonly']) ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 border-left">
                    <h4 class="prompt-500 text-primary">ข้อมูลลูกค้า</h4>
                    <?= $this->element('Customers/form_modal') ?>
                </div>

            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12 border-right">
                    <h4 class="title-header prompt-500 text-primary">เพิ่มรายการสั่งซื้อ/สั่งทำ</h4>
                    <div class="row" style="display: none;">
                        <div class="col-lg-9 col-md-9">
                            <?= $this->Form->control('product_name', ['class' => 'form-control form-control-lg', 'id' => '_product_name', 'label' => false, 'placeholder' => 'ระบุชื่อสินค้า']) ?>
                            <?= $this->Form->hidden('product_id', ['id' => 'product_id']) ?>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <button type="button" id="search_product" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-outline-primary"> <i class="ti-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-md-10 form-group">
                            <?= $this->Form->control('product_name', ['type' => 'texxt', 'class' => 'form-control form-control-lg', 'id' => 'product_name', 'label' => false, 'placeholder' => 'ชื่อสินค้า/บริการ/สั่งซื้อ/สั่งทำ']) ?>
                        </div>
                        <div class="col-md-2 text-center form-group">
                            <button type="button" id="add_bt" class="btn btn-lg btn-icon btn-block waves-effect waves-light btn-primary m-b-5" data-dismiss="modal" aria-hidden="true"> <i class="ti-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table" id="list_product">
                            <thead>
                                <tr class="thead-light">
                                    <th width="40px"></th>
                                    <th width="30px">#</th>
                                    <th>สินค้า</th>

                                    <th colspan="2" width="200px">ภาพ</th>

                                    <th width="100px">ราคาสินค้า</th>
                                    <th width="80px">จำนวน</th>
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
                <div class="col-md-5">
                    <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 10px 0px;" id="bt_submit"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                </div>
            </div>

        </div>
    </div>

</div>


<?= $this->Form->end() ?>

<?= $this->Html->script('order/validations.js') ?>
<?= $this->Html->script('order/order.js') ?>
<?= $this->Html->script('gold-selector.js') ?>
<?= $this->Html->script('/css/assets/libs/jquery-mask-plugin/jquery.mask.min.js') ?>
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

        //$("#product_name").easyAutocomplete(options);

    });

</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="input-mask"]').each(function (t, e) {
            var n = $(e).data("maskFormat"), a = $(e).data("reverse");
            null != a ? $(e).mask(n, {reverse: a}) : $(e).mask(n)
        });

        $('#add_bt').on('click', function () {
            $('#box-loading').show();
            let product_name = $('#product_name').val();
            console.log(product_name);
            $('#product_name').val('');

            $.post(SITE_URL + "service-product/create-temp-product/", {'product_name': product_name}, function (_data) {
                dataJson = JSON.parse(_data);
                console.log(dataJson);
                if (dataJson['status'] === 200) {
                    productProcess(dataJson['id']);
                    successSound();

                } else {
                    errorSound();
                    Swal.fire({title: "ผิดพลาด", confirmButtonClass: "btn btn-primary mt-2"});

                }

                $('#box-loading').hide();
            });
        });


    });
</script>