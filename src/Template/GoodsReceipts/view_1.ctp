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
                        <h3>#ใบรับสินค้า</h3>
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
                    <div class="col-12">
                        <div class="pull-left m-t-30">
                            <address>
                                <strong>คลังสินค้า<?= h($goodsReceipt->ToWarehouse->name) ?></strong><br>
                                <?= h($org->name . ' สาขา' . $branch->name . ' ' . $ishead) ?><br>
                                <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
                                <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>

                            </address>
                        </div>
                        <div class="pull-right m-t-30">
                            <p><strong>วันที่: </strong> <?= h($goodsReceipt->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                            <p class="m-t-10"><strong>สถานะ: </strong> <span class="badge badge-danger">Pending</span></p>
                            <p class="m-t-10"><strong>หมายเลขเอกสาร: </strong><?= h($goodsReceipt->docno) ?></p>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr><th>#</th>
                                        <th>รายการ</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวน</th>

                                    </tr></thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach ($goodsReceipt->goods_lines as $line): ?>
                                        <tr>
                                            <td><?= h($count) ?></td>
                                            <td><?=h($line->product->name)?></td>
                                            <td><?=h($line->description)?></td>
                                            <td><?=$this->Number->format($line->qty)?></td>

                                        </tr>
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
                        <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                        <p class="text-right">Discout: 12.9%</p>
                        <p class="text-right">VAT: 12.9%</p>
                        <hr>
                        <h4 class="text-right">USD 2930.00</h4>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>