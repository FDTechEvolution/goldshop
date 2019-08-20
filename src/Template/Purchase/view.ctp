<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="panel-body">
                <?php
                $isHasOrder = is_null($payment->order_id) ? 'N' : 'Y';
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->element('printform/org') ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <h3 class="prompt-500">#ใบจ่ายเงิน</h3>
                        <strong>หมายเลขเอกสาร: </strong><?= h($payment->docno) ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <?= $this->element('printform/bpartner') ?>
                    </div>
                    <div class="col-4">
                        <h4 class="prompt-400">วิธีจ่ายเงิน</h4>
                        <p><?= h($bankTypes[$payment->payment_method]) ?></p>
                        <?php if ($payment->payment_method=='TRAN') { ?>
                            <p style="margin-bottom: 0px;"><strong><?= $payment->bank_account->bank->name ?></strong></p>
                            <p style="margin-bottom: 0px;">ชื่อบัญชี <?= h($payment->bank_account->account_name) ?></p>
                            <p style="margin-bottom: 0px;">เลขที่ <?= h($payment->bank_account->accountno) ?></p>
                        <?php } ?>
                    </div>
                    <div class="col-3">
                        <p><strong>วันที่รับเงิน: </strong> <?= h($payment->paymentdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                        <p><strong>วันที่บันทึก: </strong> <?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></p>
                        <strong>พนักงานขาย: </strong><?= h($payment->Seller->firstname . ' ' . $payment->Seller->lastname) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 m-t-20">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr>
                                        <th width="70px">#</th>
                                        <th>รายการรับซื้อ</th>
                                        <th>รายละเอียด</th>
                                        <th width="100px" class="text-right">จำนวน</th>
                                        <th width="100px" class="text-right">ราคารวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php $totalAmt = 0; ?>
                                    <?php foreach ($payment->payment_lines as $line): ?>
                                        <tr>
                                            <td><?= h($count) ?></td>
                                            <td><?= h($line->product->name) ?> <?= $line->isexchange == 'Y' ? '<span class="badge badge-danger">ใช้แลกเปลี่ยน</span>' : '' ?></td>
                                            <td><?= h($line->description) ?></td>
                                            <td width="100px" class="text-right"><?= $this->Number->format($line->qty) . ' ' . $line->product->unittype ?></td>
                                            <td width="100px" class="text-right"><?= $this->Number->format($line->totalamount) ?></td>
                                        </tr>
                                        <?php $totalAmt = $totalAmt + $line->totalamt; ?>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="clearfix">
                            <h4 class="small text-inverse prompt-500">หมายเหตุ</h4>
                            <small>
                                <?= h($payment->description) ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <p class=""><b>รวมเป็นเงิน:</b> <?= $this->Number->format($payment->amount) ?> บาท</p>

                        <hr> 
                        <h4 class="text-right prompt-500 text-primary <?=$payment->docstatus=='VO'?'text-void':''?>">จำนวนเงินรวมทั้งสิ้น <?= $this->Number->format($payment->totalamt) ?> บาท </h4>
                        <?=$payment->docstatus=='VO'?'<span class="badge badge-danger">ยกเลิกรายการแล้ว</span>':''?>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <?= $this->Html->link(BT_BACK, ['controller' => 'purchase', 'action' => 'showall'], ['escape' => false]) ?>
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        <?php if ($payment->docstatus == 'DR') { ?>
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'sales', 'action' => 'edit', $payment->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        <?php } ?>
                        <?php if ($payment->docstatus != 'VO') { ?>
                            <?= $this->Form->postLink('<span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ', ['controller' => 'purchase', 'action' => 'void', $payment->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>