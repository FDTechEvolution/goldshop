<div class="row d-print-none">
    <div class="col-12 text-right">
        <div class="card-box table-responsive">
            <?=$this->Html->link('รายการชำรุดทั้งหมด',['controller'=>'broken','action'=>'showall'],['class'=>'btn btn-secondary'])?>
           
        </div>
        
    </div>
</div>

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
                        <h3>#ใบสินค้าชำรุด</h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
                    $branch = $goodsReceipt->ToWarehouse->branch;
                    $org = $branch->org;
                    $address = $branch->address;
                    $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                    ?>
                    <div class="col-md-4">
                        <div class="pull-left m-t-10">
                            <address>
                                <strong>จากคลังสินค้า<?= h($goodsReceipt->FromWarehouse->name) ?></strong><br>
                                 <strong>ไปยังคลังสินค้า<?= h($goodsReceipt->ToWarehouse->name) ?></strong><br>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="pull-right m-t-10">
                            <p style="margin-bottom: 0px;"><strong>วันที่: </strong> <?= h($goodsReceipt->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                            <p style="margin-bottom: 0px;"><strong>สถานะ: </strong> <span class="badge badge-<?= $goodsReceipt->status == 'CO' ? 'success' : 'warning' ?>"> <?= h($docStatusList[$goodsReceipt->status]['name']) ?></span></p>
                            <p style="margin-bottom: 0px;"><strong>หมายเลขเอกสาร: </strong><?= h($goodsReceipt->docno) ?></p>
                            <p style="margin-bottom: 0px;"><strong>พนักงาน: </strong><?= h($goodsReceipt->has('Seller')?$goodsReceipt->Seller->firstname:'-') ?></p>
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
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        <?php if ($goodsReceipt->status == 'DR') { ?>
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'goods-movement', 'action' => 'edit', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        <?php } ?>
                        <?php if ($goodsReceipt->status != 'VO') { ?>
                            <?= $this->Form->postLink('<span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ', ['controller' => 'goods-movement', 'action' => 'void', $goodsReceipt->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                        <?php } ?>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>