
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?> 
                </div>
            </div>
            <hr/>

            <?= $this->Form->create($goodsTransaction, ['id' => 'frm']) ?>
            <input type="hidden" id="isclearproduct" value="N" name="isclearproduct"/>
            <div class="form-group row">
                <div class="col-md-6">
                    <h2 class="card-title prompt-500 text-primary">
                        <i class="mdi mdi-store"></i>ย้ายสินค้าระหว่างคลัง 
                    </h2>
                    <h4>No.<?= h($goodsTransaction->docno) ?></h4>
                </div>
                <div class="col-md-6 text-right">
                    <?php if ($goodsTransaction->status != 'CO') { ?>
                        <button name="command" type="submit" value="SAVE" class="btn btn-outline-success waves-effect waves-light">บันทึก(ชั่วคราว)</button>
                        <button name="command" type="submit" value="COMPLETE"  class="btn btn-success waves-effect waves-light">ยืนยันการย้าย(เสร็จสมบูรณ์)</button>
                    <?php } ?>  
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?=
                    $this->Form->control('docdate', ['class' => 'form-control',
                        'id' => 'docdate', 'type' => 'text',
                        'label' => false, 'value' => $goodsTransaction->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)])
                    ?>

                </div>
                <div class = "col-md-5">
                    <label for = "code">คลังสินค้าต้นทาง</label>
                    <?= $this->Form->select('from_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'from_warehouse', 'label' => false, 'readonly' => 'readonly'])
                    ?>
                </div>
                <div class = "col-md-5">
                    <label for = "code">คลังสินค้าปลายทาง</label>
                    <?= $this->Form->select('to_warehouse', $warehouses, ['empty' => '-นอกระบบ-', 'class' => 'form-control', 'id' => 'to_warehouse', 'label' => false])
                    ?>
                </div>

                <div class="col-md-12">
                    <label for="description">รายละเอียด</label>
                    <?= $this->Form->control('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 align-middle">
                    <button id="bt_call_modal_select_product" type="button" class="btn btn-lg btn-outline-secondary waves-effect waves-light" data-toggle="modal" data-target="#modal_select_product">เพิ่มรายการสินค้า</button> 
                    <button id="bt-scan" type="button" class="btn btn-lg btn-outline-secondary" data-status="OFF">SCAN QR</button>
                </div>

            </div>

            <div id="modal_select_product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog m-t-50" style="width:80%;max-width: none;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">เลือกสินค้าที่ต้องการย้าย</h4>
                        </div>
                        <div class="modal-body">
                            <iframe id="iframe_select_product" src="<?= SITE_URL . 'goods-movement/wh-product/' . $goodsTransaction->from_warehouse . '/' . $goodsTransaction->id ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"> </iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" >
                <iframe id="goods_line_iframe" src="<?= SITE_URL . 'goods-lines/index/' . $goodsTransaction->id . '?warehouse_id=' . $goodsTransaction['from_warehouse'] ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"> </iframe>

            </div>


            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->script('goods.js') ?>
<?= $this->Html->script('scannerdetection/jquery.scannerdetection.js') ?>
<?= $this->Html->script('scannerdetection/init.js') ?>
<script>
    var from_warehouse = '';
    var to_warehouse = '';
    function changeWarehouse(_from_warehouse, _to_warehouse) {
        //Check same wh
        if (_from_warehouse === _to_warehouse) {
            Swal.fire({title: "ไม่สามารถย้ายในคลังสินค้าเดียวกันได้", text: "กรุณาเลือกต้นทางหรือปลายทางใหม่", confirmButtonClass: "btn btn-primary mt-2"});
            $('#from_warehouse').val(from_warehouse);
            $('#to_warehouse').val(to_warehouse);
            return false;
        }

        if (_from_warehouse !== from_warehouse) {
            Swal.fire({
                title: 'มีการเปลี่ยนคลังสินค้าต้นทาง',
                text: "รายการสินค้าที่เลือกไว้จะโดนลบออก เพื่อทำรายการใหม่อีกครั้ง",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                //cancelButtonText: "แก้ไข",
                confirmButtonText: "ยืนยันการเปลี่ยน"
            }).then(function (t) {
                //console.log(t);
                if (t.value) {
                    $('#isclearproduct').val('Y');
                    $('#frm').submit();
                } else {
                    $('#from_warehouse').val(from_warehouse);
                    return false;
                }
            });
        }
    }

    $(document).ready(function () {
        $('#modal_select_product').modal({
            backdrop: 'static',
            show: false
        });

        $('#bt_call_modal_select_product').on('click', function () {
            $('#iframe_select_product').attr('src', $('#iframe_select_product').attr('src'));
        });

        $("#iframe_select_product").on("load", function () {
            $('#goods_line_iframe').attr('src', $('#goods_line_iframe').attr('src'));
        });


        //Check warehouse
        from_warehouse = $('#from_warehouse').val();
        to_warehouse = $('#to_warehouse').val();

        $('#from_warehouse').on('change', function () {
            changeWarehouse($('#from_warehouse').val(), $('#to_warehouse').val());
        });
        $('#to_warehouse').on('change', function () {
            changeWarehouse($('#from_warehouse').val(), $('#to_warehouse').val());
        });


        $('#bt-scan').scannerDetection({

            //https://github.com/kabachello/jQuery-Scanner-Detection


            onComplete: function (barcode, qty) {

                //$('#scannerInput').val(barcode);
                console.log(barcode);
                

            } // main callback function	,
            ,
            onError: function (string, qty) {
                //let focused = $(':focus');
                //$(':focus').val($(':focus').val() + string).trigger('change').trigger('keyup');
                //console.log(barcode);

            },
            onKeyDetect: function (event) {
                //console.log(event);
                return false;
            }


        });
    });
</script>