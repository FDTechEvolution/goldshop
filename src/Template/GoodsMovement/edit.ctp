
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
            <input type="hidden" name="goods_transaction_id" value="<?=$goodsTransaction->id?>" />
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
                <div class="col-md-2 form-group">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?=
                    $this->Form->control('docdate', ['class' => 'form-control',
                        'id' => 'docdate', 'type' => 'text',
                        'label' => false, 'value' => $goodsTransaction->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)])
                    ?>

                </div>
                <div class = "col-md-5 form-group">
                    <label for = "code">คลังสินค้าต้นทาง</label>
                    <?= $this->Form->select('from_warehouse', $warehouses, ['class' => 'form-control', 'id' => 'from_warehouse', 'label' => false, 'readonly' => 'readonly'])
                    ?>
                </div>
                <div class = "col-md-5 form-group">
                    <label for = "code">คลังสินค้าปลายทาง</label>
                    <?= $this->Form->select('to_warehouse', $warehouses, ['empty' => '-นอกระบบ-', 'class' => 'form-control', 'id' => 'to_warehouse', 'label' => false])
                    ?>
                </div>

                <div class="col-md-12 form-group">
                    <label for="description">รายละเอียด/หมายเหตุ</label>
                    <?= $this->Form->control('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                </div>
            </div>
            <hr/>
            <div class="form-group row">
                <div class="col-md-12 align-middle">
                    <blockquote class="blockquote text-info">สามารถเพิ่มรายการสินค้าโดยการกดปปุ่ม "เพิ่มรายการสินค้า" หรือ ใช้เครื่องสแกนที่สินค้าได้เลย</blockquote>
                    <button id="bt_call_modal_select_product" type="button" class="btn btn-lg btn-outline-secondary waves-effect waves-light" data-toggle="modal" data-target="#modal_select_product">เพิ่มรายการสินค้า</button> 
                    <button style="display:none;" id="bt-scan" type="button" class="btn btn-lg btn-outline-secondary" data-status="OFF">SCAN QR</button>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12" >
                    <table class="table table-sm" id="tb-show-product">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อสินค้า</th>
                                <th class="text-right">กรัม</th>
                                <th class="text-right">จำนวน</th>
                                <th class="text-right">รวมกรัม</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($goodsTransaction->goods_lines as $index=>$line): ?>
                            <?php
                            $weight = 0;
                            if(isset($line->product->weight->value)){
                                $weight = $line->product->weight->value;
                            }
                            $weightAmt = $weight*$line->qty;
                            ?>
                            <tr data-row-id="<?=$line->product->id?>">
                                <td><?=$index+1?></td>
                                <td><?=$line->product->name?></td>
                                <td class="text-right"><?= number_format($weight,2)?></td>
                                <td class="text-right" data-text-qty-id="<?=$line->product->id?>">
                                    
                                    <?=$line->qty?>
                                </td>
                                <td class="text-right" data-text-weightamt-id="<?=$line->product->id?>"><?= number_format($weightAmt,2)?></td>
                                <td class="text-right">
                                    <button class="btn btn-outline-primary btn-sm" type="button" onclick="remove_line('<?=$line->product->id?>');"> <i class="fas fa-trash"></i></button>
                                </td>
                                <input type="hidden" name="qty[]" data-qty-id="<?=$line->product->id?>" class="form-control" value="<?=$line->qty?>"/>
                                <input type="hidden" data-product-id="<?=$line->product->id?>" name="product_id[]" class="form-control" value="<?=$line->product->id?>"/>
                            </tr>
                            
                            <?php endforeach;?>
                        </tbody>
                    </table>
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



            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->script('goods.js') ?>
<?= $this->Html->script('goods_movement/movement.js') ?>
<?= $this->Html->script('scannerdetection/jquery.scannerdetection.js') ?>
<?= $this->Html->script('scannerdetection/init.js') ?>
<script>
    var from_warehouse = '';
    var to_warehouse = '';
    var warehouse_products = [];

    var interval;
    var timer = function () {
        interval = setInterval(function () {
            show_loading();
            console.log('saving...');

            let form_data = $('#frm').serialize();
            //console.log(form_data);

            clearInterval(interval);

            $.post(SITE_URL + "service-movement/save-movement-line", form_data)
                    .done(function (data) {
                        console.log(data);

                        hide_loading();
                    });

            
        }, 3000);
    };
    
    function remove_line(id){
        $('[data-row-id="'+id+'"]').remove();
        timer();
    }

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


        show_loading();
        $.get(SITE_URL + "service-warehouse-product/product-by-warehouse", {warehouse: from_warehouse})
                .done(function (data) {
                    warehouse_products = JSON.parse(data);
                    // console.log(json_data);

                    hide_loading();

                });

        $(document).scannerDetection({

            //https://github.com/kabachello/jQuery-Scanner-Detection


            onComplete: function (barcode, qty) {

                //$('#scannerInput').val(barcode);
                console.log(barcode);
                /*
                 $.get(SITE_URL + "service-warehouses/check-stock", {product_code: barcode, warehouse: from_warehouse})
                 .done(function (data) {
                 let json_data = JSON.parse(data);
                 console.log(json_data);
                 });
                 * 
                 */


                let result = warehouse_products.filter(warehouse_product => warehouse_product.code === barcode);
                console.log(result);
                if (result.length === 1) {
                    append_row_movement(result[0]);

                    clearInterval(interval);
                    timer();

                }


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