<?= $this->Html->script('jquery.scannerdetection.js') ?>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <div class="col-12 bt-tool text-right">
                <?= $this->Html->link(BT_BACK, ['controller' => 'goods-receipts'], ['escape' => false]) ?> 
            </div>
            <?= $this->Form->create($goodsTransaction,['id'=>'frm']) ?>

            <div class="form-group row">
                <div class="col-md-7">
                    <h2 class="card-title text-primary f-kanit-700"><i class="mdi mdi-store"></i>นำเข้าสินค้า No.<?= $goodsTransaction->docno ?></h2>
                </div>
                <div class="col-md-5 form-group">
                    <label>ช่าง/โรงงาน/vendor</label>
                    <?= $this->Form->select('bpartner_id', $bpartners, ['empty' => '-', 'class' => 'form-control form-control-lg', 'id' => 'bpartner_id', 'label' => false])
                    ?>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-md-7 border-right">
                    <div class="row">


                        <div class="col-md-12 form-group">
                            <label for="description">รายละเอียด</label>
                            <?= $this->Form->textarea('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">

                    <p><strong>วัน/เวลา: </strong><?= $goodsTransaction->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE) ?></p>
                    <p><strong>รับเข้าคลังสินค้า: </strong><?= $goodsTransaction->ToWarehouse->name ?></p>
                    <button class="btn btn-primary btn-lg btn-block py-3" type="button" id="bt-scan" data-toggle="modal" data-target="#modal-scan-import"><i class="remixicon-qr-scan-fill"></i> สแกนสินค้าเข้าระบบ</button>
                </div>

            </div>
            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <iframe id="goods_line_iframe" src="<?= SITE_URL . 'goods-lines/import/' . $goodsTransaction->id ?>" frameborder="0" scrolling="no" onload="resizeIframe(this)" width="100%"> </iframe>

                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php if ($goodsTransaction->status != 'CO') { ?>

                        <button name="command" type="submit" value="COMPLETE"  class="btn btn-lg py-3 px-3 btn-success waves-effect waves-light">ยืนยันนำสินค้าเข้าระบบ</button>
                        <p class="text-primary">เมื่อกดปุ่ม "ยืนยัน" รายการทั้งหมดด้านบน จะถูกนำเข้าคลังสินค้า "<?= $goodsTransaction->ToWarehouse->name ?>"</p>
                    <?php } ?>  
                </div>
            </div>



            <?= $this->Form->end() ?>
        </div>
    </div>

    <div id="modal-scan-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="display: none;">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <?= $this->Form->create('good_receive_scan', ['url' => ['controller' => 'goods-receipts', 'action' => 'save-scan-import', $goodsTransaction->id]]) ?>
                    <?= $this->Form->control('warehouse_id', ['id' => 'warehouse_id', 'value' => $goodsTransaction->ToWarehouse->id, 'type' => 'hidden']) ?>
                    <div class="row">
                        <div class="col-12 text-danger text-center align-middle">
                            <div class="spinner-grow text-success m-2" role="status"></div>
                            <h3 id="l-msg-title" class="f-kanit-700 text-success">

                                ระบบพร้อมสแกน
                            </h3>

                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="f-kanit-400">ผลลัพท์การสแกนล่าสุด: <span id="l-msg-result" class="text-primary">-</span></h3>
                            <input type="hidden" id="code-scan" />
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12">
                            <h3>รายการสินค้า</h3>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-12" id="box-scan-result">

                        </div>
                        <div class="col-12 text-center" id="box-bt-confirm" style="display: none;">
                            <button type="submit" class="btn btn-primary btn-lg">ยืนยันข้อมุล</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>



</div>

<?= $this->Html->script('goods.js') ?>
<script>
    $(document).ready(function () {
        $('#bpartner_id').on('change', function () {
            $('#frm').submit();

        });
        
        $(document).scannerDetection({

            //https://github.com/kabachello/jQuery-Scanner-Detection

            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
            avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
            preventDefault: true,
            ignoreIfFocusOn: true,
            endChar: [13],
            minLength:5,
            onComplete: function (barcode, qty) {
                validScan = true;


                //$('#scannerInput').val(barcode);
                console.log(barcode);
                //var warehouse_id = $('#warehouse_id').val();
                getProductDetail(barcode);
                //$(document).productProcess(barcode.trim(), warehouse_id, 'list_product');

            } // main callback function	,
            ,
            onError: function (string, qty) {
                //let focused = $(':focus');
                $(':focus').val($(':focus').val() + string).trigger('change').trigger('keyup');
                //console.log(string);

            }


        });
    });
</script>
