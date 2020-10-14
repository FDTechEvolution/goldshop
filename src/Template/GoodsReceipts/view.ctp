
<!-- Required datatable js -->
<?= $this->Html->script('/css/plugins/datatables/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/dataTables.bootstrap4.min.js'); ?>
<!-- Buttons examples -->
<?= $this->Html->script('/css/plugins/datatables/dataTables.buttons.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.bootstrap4.min.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/jszip.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/pdfmake.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/vfs_fonts.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/buttons.html5.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.print.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.colVis.min.js'); ?> 


<!-- Responsive examples -->
<?= $this->Html->script('/css/plugins/datatables/dataTables.responsive.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/responsive.bootstrap4.min.js'); ?>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <h3 class="text-right prompt-500 text-primary"><?= PAGE_TITLE ?></h3>
                    </div>
                    <div class="pull-right prompt-300">
                        <h3>#ใบนำเข้าสินค้า</h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
                    $branch = $goodsReceipt->branch;
                    $org = $goodsReceipt->branch->org;
                    $address = $branch->address;
                    $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                    ?>
                    <div class="col-6">
                        <div class="pull-left m-t-10">
                            <address>
                                <strong>คลังสินค้า<?= h($goodsReceipt->ToWarehouse->name) ?></strong><br>
                                <?= h($org->name . ' สาขา' . $branch->name . ' ' . $ishead) ?><br>
                                <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
                                <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>

                            </address>
                        </div>
                        
                    </div>
                    <div class="col-6 text-right">
                        <div class="pull-right m-t-10">
                            <p><strong>วันที่: </strong> <?= h($goodsReceipt->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                            <p class="m-t-10"><strong>สถานะ: </strong> <span class="badge badge-<?= $goodsReceipt->status == 'CO' ? 'success' : 'warning' ?>"> <?= h($docStatusList[$goodsReceipt->status]['name']) ?></span></p>
                            <p class="m-t-10"><strong>หมายเลขเอกสาร: </strong><?= h($goodsReceipt->docno) ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 m-t-20">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr>
                                        <th width="70px">#</th>
                                        <th>รายการสินค้า</th>
                                        <th class="text-right">น้ำหนักต่อชิ้น(กรัม)</th>
                                        <th width="100px" class="text-right">จำนวน(ชิ้น)</th>
                                        <th class="text-right">น้ำหนักรวม(กรัม)</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php $totalQty = 0; ?>
                                    <?php $weightAmt = 0;?>
                                    <?php foreach ($goodsReceipt->goods_lines as $line): ?>
                                    <?php $weight = $line->product->weight==null?0:$line->product->weight->value*$line->qty;?>
                                        <tr>
                                            <td><?= h($count) ?></td>
                                            <td><?= h($line->product->name) ?></td>
                                            <td class="text-right"><?= number_format($line->product->weight->value,2)?></td>
                                            <td width="100px" class="text-right"><?= $this->Number->format($line->qty) ?></td>
                                            <td class="text-right"><?= $line->product->weight==null?'-':number_format($weight,2) ?></td>
                                            

                                        </tr>
                                        <?php $totalQty = $totalQty + $line->qty; ?>
                                        <?php $weightAmt = $weightAmt + $weight; ?>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="clearfix m-t-40">
                            <h4 class="small text-inverse prompt-500">หมายเหตุ</h4>
                            <small>
                                <?= h($goodsReceipt->description) ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-6">
                        <hr>
                        <h3 class="text-right f-kanit-700">รวมทั้งหมด <?= $this->Number->format($totalQty) ?> ชิ้น</h3>
                        <h3 class="text-right f-kanit-700">รวมน้ำหนัก <?= $this->Number->format($weightAmt) ?> กรัม</h3>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#modal-qrcode-print" style="display: none;">ปริ้น QRCode</button>
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        <?php if ($goodsReceipt->status == 'DR') { ?>
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'goods-receipts', 'action' => 'edit', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        <?php } ?>
                        <?php if ($goodsReceipt->status != 'VO') { ?>
                            <?= $this->Form->postLink('<span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ', ['controller' => 'goods-receipts', 'action' => 'void', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-qrcode-print" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-hover" id="datatable-buttons">
                            <thead>
                                <tr>

                                    <th>Code</th>
                                    <th>ชื่อ</th>
                                    <th>%</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($goodsReceipt->goods_lines as $line): ?>
                                    <?php $product = $line->product; ?>
                                    <?php for ($i = 0; $i < $line->qty; $i++) { ?>
                                        <tr>
                                            <td><?= $product->code ?></td>
                                            <td><?= str_replace(' ', '', sprintf('%s/%s', $product['product_category']['name'], $product['design']['name'])) ?></td>
                                            <td><?= $product->percent ?>%</td>
                                            <td><?= str_replace(' ', '', sprintf('%s/%s', $product['size']['name'], $product['weight']['sd_weight']['name'])) ?></td>     

                                        </tr>
                                    <?php } ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf', 'csv'],
            "lengthMenu": [[6, -1], [50, "All"]]
        });

        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>