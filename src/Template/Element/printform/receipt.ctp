<?php
$isHasOrder = is_null($payment->order_id) ? 'N' : 'Y';
?>
<div class="row">
    <div class="col-md-6">
        <?= $this->element('printform/org') ?>
    </div>
    <div class="col-md-6 text-right">
        <h3 class="prompt-500">#ใบเสร็จรับเงิน</h3>
        <strong>หมายเลขเอกสาร: </strong><?= h($payment->docno) ?>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-5">
        <?= $this->element('printform/bpartner') ?>
    </div>
    <div class="col-4">
        <h4 class="prompt-400">การชําระเงิน</h4>
        <?php foreach ($payment->payment_method_lines as $line): ?>
            <?php
            $paymentLinedes = sprintf('%s %s', $paymentMethod[$line->payment_method]['name'], $this->Number->format($line->amount));
            $accName = '';
            if ($line->payment_method == 'TRAN' && $line->has('bank_account') && $line->bank_account->has('bank')) {
                $accName = sprintf('<br/>%s เลขที่ %s <br/>%s',$line->bank_account->bank->name,$line->bank_account->accountno,$line->bank_account->account_name); 
            }
            ?>
            <p><i class="mdi mdi-check"></i> <?= h($paymentLinedes) ?> <?= $accName ?></p>
        <?php endforeach; ?>
    </div>
    <div class="col-3">
        <p><strong>วันที่รับเงิน: </strong> <?= h($payment->paymentdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
        <p><strong>วันที่บันทึก: </strong> <?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></p>
        <p class="m-t-10"><strong>สถานะ: </strong> <span class="badge badge-<?= $payment->docstatus == 'CO' ? 'success' : 'warning' ?>"> <?= h($docStatusList[$payment->docstatus]['name']) ?></span></p>
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
                        <th>รายการ</th>
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
                            <td width="100px" class="text-right"><?= $line->isexchange == 'Y' ? '-' : '' ?><?= $this->Number->format($line->totalamount) ?></td>
                        </tr>
                        <?php $totalAmt = $totalAmt + $line->totalamt; ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                    <?php foreach ($refPayments as $payment_ref): ?>
                        <?php foreach ($payment_ref->payment_lines as $line): ?>
                            <tr>
                                <td><?= h($count) ?></td>
                                <td><?= h($line->product->name) ?> <?= $line->isexchange == 'Y' ? '<span class="badge badge-danger">ใช้แลกเปลี่ยน</span>' : '' ?></td>
                                <td><?= h($line->description) ?></td>
                                <td width="100px" class="text-right"><?= $this->Number->format($line->qty) . ' ' . $line->product->unittype ?></td>
                                <td width="100px" class="text-right"><?= $this->Number->format($line->totalamount) ?></td>
                            </tr>
                            <?php $count++; ?>
                        <?php endforeach; ?>
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
    <div class="col-6">
        <p class="text-right"><b>รวมเป็นเงิน:</b> <?= $this->Number->format($payment->amount) ?> บาท</p>
        <p class="text-right"><b>ส่วนลดพิเศษ:</b> <?= $this->Number->format($payment->discount) ?> บาท</p>
        <?php if ($payment->usesavingamt > 0) { ?>
            <p class="text-right"><b>ใช้เงินออม:</b> <?= $this->Number->format($payment->usesavingamt) ?> บาท</p>
        <?php } ?>
        <?php if ($isHasOrder == 'Y') { ?>
            <p class="text-right"><b>มัดจำ:</b> -<?= $this->Number->format($payment->order->totalpaid) ?> บาท</p>
        <?php } ?>

        <hr>
        <h4 class="text-right prompt-500 text-primary">จำนวนเงินรวมทั้งสิ้น <?= $this->Number->format($payment->totalamt) ?> บาท</h4>
    </div>
</div>