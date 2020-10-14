<div class="row">
    <div class="col-12">
        <div class="card-box">

            <div class="row d-print-none">
                <div class="col-12 text-right">

                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                    <?php if ($goodsReceipt->status == 'DR') { ?>
                        <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'goods-movement', 'action' => 'edit', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                    <?php } ?>
                    <?php if ($goodsReceipt->status != 'VO' && $isApproveProcess == 'N') { ?>
                        <?= $this->Form->postLink('<span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ', ['controller' => 'goods-movement', 'action' => 'void', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                    <?php } ?>

                    <?php if ($goodsReceipt->status == 'WT' && $isApproveProcess == 'Y') { ?>
                        <?= $this->Html->link('<span class="mdi mdi-checkbox-marked-circle"></span> บันทึกและอนุมัติรับสินค้า', ['controller' => 'goods-movement', 'action' => 'approve', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-success waves-effect waves-light']) ?>
                    <?php } ?>
                    <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-6">
                    <h3 class="f-kanit-700 text-primary"><?= PAGE_TITLE ?></h3>
                </div>
                <div class="col-6 text-right">
                    <h3 class="f-kanit-700">#ใบส่งสินค้า No.<?= h($goodsReceipt->docno) ?></h3>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-6">

                    <p class="border-bottom">คลังต้นทาง</p>

                    <?php
                    $fromWarehouse = $goodsReceipt->FromWarehouse;
                    $branch = $fromWarehouse->branch;
                    $org = $branch->org;
                    $address = $branch->address;
                    $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                    ?>
                    <address>
                        <strong class="font-weight-bold">คลังสินค้า<?= h($fromWarehouse->name) ?></strong><br>
                        <?= h(' สาขา' . $branch->name . ' ' . $ishead) ?><br>
                        <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
                        <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>
                    </address>
                </div>
                <div class="col-6">
                    <p class="border-bottom">คลังปลายทาง</p>
                    <?php
                    if(is_null($toWarehouse)){ ?>
                    <p class="font-weight-bold">นอกระบบ</p>
                    <?php }else{ ?>
                    <?php
                    $branch = $toWarehouse->branch;
                    $org = $branch->org;
                    $address = $branch->address;
                    $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                    ?>
                    <address>
                        <strong class="font-weight-bold">คลังสินค้า<?= h($toWarehouse->name) ?></strong><br>
                        <?= h(' สาขา' . $branch->name . ' ' . $ishead) ?><br>
                        <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
                        <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>
                    </address>
                    <?php }?>
                </div>

            </div>
            <hr>
            <div class="row">

                <div class="col-12">

                    <div class="pull-right m-t-10">
                        <p><strong>วันที่: </strong> <?= h($goodsReceipt->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                        <p class="m-t-10"><strong>สถานะ: </strong> <span class="badge badge-<?= $goodsReceipt->status == 'CO' ? 'success' : 'warning' ?>"> <?= h($docStatusList[$goodsReceipt->status]['name']) ?></span></p>

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
                                    <th>รายการ</th>
                                    <th>รายละเอียด</th>
                                    <th width="100px" class="text-right">จำนวน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php $totalQty = 0; ?>
                                <?php foreach ($goodsReceipt->goods_lines as $line): ?>
                                    <tr>
                                        <td><?= h($count) ?></td>
                                        <td><?= h($line->product->name) ?></td>
                                        <td><?= h($line->description) ?></td>
                                        <td width="100px" class="text-right"><?= $this->Number->format($line->qty) ?></td>

                                    </tr>
                                    <?php $totalQty = $totalQty + $line->qty; ?>
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
                    <h4 class="text-right prompt-500">รวมทั้งหมด <?= $this->Number->format($totalQty) ?> ชิ้น</h4>
                </div>
            </div>

        </div>
    </div>
</div>