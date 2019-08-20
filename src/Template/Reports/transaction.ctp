
<div class="row d-print-none">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="panel-body">
                <?= $this->Form->create('', ['id' => 'frm']) ?>
                <div class="row m-b-10 m-t-10">
                    <div class="col-md-12 text-center">
                        <h3 class="prompt-500 text-primary">Transaction Report</h3>
                    </div>
                </div>
                <hr>
                <div class="row m-t-10">
                    <div class="col-md-2 offset-md-3">
                        <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'class' => 'form-control', 'label' => 'สาขา', 'options' => $branches]) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('start_date', ['value' => isset($startDate)?$startDate:'', 'class' => 'form-control', 'id' => 'start_date', 'type' => 'text', 'label' => 'ตั้งแต่วันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th','readonly'=>'readonly']) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->control('end_date', ['value' => isset($endDate)?$endDate:'', 'class' => 'form-control', 'id' => 'end_date', 'type' => 'text', 'label' => 'ถึงวันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th','readonly'=>'readonly']) ?>
                    </div>

                </div>
                <div class="row m-t-30 m-b-30">
                    <div class="col-md-12 text-center">
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="sales" value="sales" name="report[]">
                            <label for="sales">รายการขาย </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="purchase" value="purchase" name="report[]">
                            <label for="purchase">รายการซื้อ </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="pawn" value="pawn" name="report[]">
                            <label for="pawn">รายการจำนำ </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="pawn_interest" value="pawn_interest" name="report[]">
                            <label for="pawn_interest">ต่อดอก </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="pawn_return" value="pawn_return" name="report[]">
                            <label for="pawn_return">ไถ่ถอน </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="order" value="order" name="report[]">
                            <label for="order">รายการสั่งซื้อ </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="saving" value="saving" name="report[]">
                            <label for="saving">เงินออม </label>
                        </div>
                        <div class="checkbox checkbox-success form-check-inline">
                            <input type="checkbox" id="broken" value="broken" name="report[]">
                            <label for="broken">สินค้าชำรุด </label>
                        </div>

                    </div>
                </div>
                <div class="row m-b-10 m-t-10">
                    <div class="col-md-2 offset-md-5">
                        <button class="btn btn-block btn-primary waves-effect">ค้นหา</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="panel-body">
                <div class="d-print-none m-b-30">
                    <div class="text-left">
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                    </div>
                </div>
                <hr>
                <?php if (isset($sales)) { ?>
                    <?php $totalAmt = 0; ?>
                    <h4 class="prompt-500 text-primary">รายการขาย <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>

                                <th>รายการ</th>
                                <th>พนักงาน</th>
                                <th>วิธีการชำระเงิน</th>
                                <th class="text-right">มูลค่าสินค้า</th>
                                <th class="text-right">ใช้เงินออม</th>
                                <th class="text-right">ส่วนลด</th>
                                <th class="text-right">รับเงินทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $payment): ?>
                                <?php
                                $lineClass = '';
                                $des = '';
                                if ($payment->has('payment_lines') && sizeof($payment->payment_lines) > 0) {
                                    foreach ($payment->payment_lines as $line) {
                                        if ($line->has('product')) {
                                            $_product = $line->product->name . '  ' . ($line->isexchange == 'Y' ? ' <span class="badge badge-danger">ใช้แลกเปลี่ยน</span>' : '');
                                            $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                        }
                                    }
                                }

                                $paymentDes = '';
                                if ($payment->has('payment_method_lines') && sizeof($payment->payment_method_lines) > 0) {
                                    foreach ($payment->payment_method_lines as $key2 => $line) {
                                        if ($key2 > 0) {
                                            $paymentDes = $paymentDes . '<br/>' . $paymentMethods[$line->payment_method] . ' ' . $this->Number->format($line->amount);
                                        } else {
                                            $paymentDes = $paymentMethods[$line->payment_method] . ' ' . $this->Number->format($line->amount);
                                        }
                                    }
                                }
                                ?>
                                <tr class="<?= $lineClass ?>">
                                    <td class=""><?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($payment->docno) ?></td>

                                    <td><?= $des ?></td>
                                    <td><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></td>
                                    <td><small><?= $paymentDes ?></small></td>
                                    <td class="text-right"><?= h($this->Number->format($payment->amount)) ?></td>
                                    <td class="text-right"><?= h($this->Number->format($payment->usesavingamt)) ?></td>
                                    <td class="text-right"><?= h($this->Number->format($payment->discount)) ?></td>
                                    <td class="text-right"><?= h($this->Number->format($payment->totalamt)) ?></td>
                                </tr>
                                <?php $totalAmt = $totalAmt + $payment->totalamt; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="10" class="text-right"><strong>รวม <?= h($this->Number->format($totalAmt)) ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>


                <?php if (isset($purchase)) { ?>
                    <?php $totalAmt = 0; ?>
                    <h4 class="prompt-500 text-primary">รายการรับซื้อ <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>

                                <th>รายการ</th>
                                <th>พนักงาน</th>
                                <th>วิธีการชำระเงิน</th>
                                <th class="text-right">จ่ายทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchase as $payment): ?>
                                <?php
                                $lineClass = '';
                                $des = '';
                                if ($payment->has('payment_lines') && sizeof($payment->payment_lines) > 0) {
                                    foreach ($payment->payment_lines as $line) {
                                        if ($line->has('product')) {
                                            $_product = $line->product->name . ' มูลค่า ' . $line->totalamt . ($line->isexchange == 'Y' ? ' <span class="badge badge-danger">ใช้แลกเปลี่ยน</span>' : '');
                                            $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                        }
                                    }
                                }

                                $paymentDes = '';
                                if ($payment->has('payment_method_lines') && sizeof($payment->payment_method_lines) > 0) {
                                    foreach ($payment->payment_method_lines as $key2 => $line) {
                                        if ($key2 > 0) {
                                            $paymentDes = $paymentDes . '<br/>' . $paymentMethods[$line->payment_method] . ' ' . $this->Number->format($line->amount);
                                        } else {
                                            $paymentDes = $paymentMethods[$line->payment_method] . ' ' . $this->Number->format($line->amount);
                                        }
                                    }
                                }
                                ?>
                                <tr class="<?= $lineClass ?>">
                                    <td class=""><?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($payment->docno) ?></td>

                                    <td><?= $des ?></td>
                                    <td><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></td>
                                    <td><small><?= $paymentDes ?></small></td>
                                    <td class="text-right"><?= h($this->Number->format($payment->totalamt)) ?></td>
                                </tr>
                                <?php $totalAmt = $totalAmt + $payment->totalamt; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="10" class="text-right"><strong>รวม <?= h($this->Number->format($totalAmt)) ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>


                <?php if (isset($pawns)) { ?>
                    <?php $totalAmt = 0; ?>
                    <h4 class="prompt-500 text-primary">รายการจำนำ <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>

                                <th>รายการ</th>
                                <th>พนักงาน</th>
                                <th>วิธีการชำระเงิน</th>
                                <th class="text-right">จ่ายทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pawns as $item): ?>
                                <?php
                                $lineClass = '';
                                $des = '';
                                if ($item->pawn->has('pawn_lines') && sizeof($item->pawn->pawn_lines) > 0) {
                                    foreach ($item->pawn->pawn_lines as $line) {
                                        if ($line->has('product')) {
                                            $_product = $line->product->name . ' มูลค่า ' . $line->amount;
                                            $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                        }
                                    }
                                }

                                $paymentDes = '';
                                ?>
                                <tr class="<?= $lineClass ?>">
                                    <td class=""><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($item->pawn->docno) ?></td>

                                    <td><?= $des ?></td>
                                    <td><?= h($item->pawn->has('Seller') ? $item->pawn->Seller->firstname : '') ?></td>
                                    <td><?= $paymentDes ?></td>
                                    <td class="text-right"><?= h($this->Number->format($item->amount)) ?></td>
                                </tr>
                                <?php $totalAmt = $totalAmt + $item->amount; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="7" class="text-right"><strong>รวม <?= h($this->Number->format($totalAmt)) ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>


                <?php if (isset($pawnInterests)) { ?>
                    <h4 class="prompt-500 text-primary">รายการต่อดอก <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>

                                <th>รายการ</th>
                                <th>พนักงาน</th>
                                <th>วิธีการชำระเงิน</th>
                                <th class="text-right">จ่ายทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pawnInterests as $item): ?>
                                <?php
                                $lineClass = '';
                                $des = '';
                                if ($item->pawn->has('pawn_lines') && sizeof($item->pawn->pawn_lines) > 0) {
                                    foreach ($item->pawn->pawn_lines as $line) {
                                        if ($line->has('product')) {
                                            $_product = $line->product->name . ' มูลค่า ' . $line->amount;
                                            $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                        }
                                    }
                                }

                                $paymentDes = '';
                                ?>
                                <tr class="<?= $lineClass ?>">
                                    <td class=""><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($item->pawn->docno) ?></td>

                                    <td><?= $des ?></td>
                                    <td><?= h($item->pawn->has('Seller') ? $item->pawn->Seller->firstname : '') ?></td>
                                    <td><?= $paymentDes ?></td>
                                    <td class="text-right"><?= h($this->Number->format($item->amount)) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>


                <?php if (isset($pawnReturns)) { ?>
                    <h4 class="prompt-500 text-primary">รายการไถ่ถอน <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>

                                <th>รายการ</th>
                                <th>พนักงาน</th>
                                <th>วิธีการชำระเงิน</th>
                                <th class="text-right">จ่ายทั้งหมด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pawnReturns as $item): ?>
                                <?php
                                $lineClass = '';
                                $des = '';
                                if ($item->pawn->has('pawn_lines') && sizeof($item->pawn->pawn_lines) > 0) {
                                    foreach ($item->pawn->pawn_lines as $line) {
                                        if ($line->has('product')) {
                                            $_product = $line->product->name . ' มูลค่า ' . $line->amount;
                                            $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                        }
                                    }
                                }

                                $paymentDes = '';
                                ?>
                                <tr class="<?= $lineClass ?>">
                                    <td class=""><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($item->pawn->docno) ?></td>

                                    <td><?= $des ?></td>
                                    <td><?= h($item->pawn->has('Seller') ? $item->pawn->Seller->firstname : '') ?></td>
                                    <td><?= $paymentDes ?></td>
                                    <td class="text-right"><?= h($this->Number->format($item->amount)) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>

                <?php if (isset($orders)) { ?>
                    <h4 class="prompt-500 text-primary">รายการสั่งซื้อ <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="110px">วันครบกำหนด</th>
                                <th width="120px">หมายเลขเอกสาร</th>
                                <th>รายการ</th>
                                <th>พนักงาน</th>

                                <th>วิธีการชำระเงิน</th>
                                <th>สถานะ</th>
                                <th class="text-right">มัดจำ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                $lineClass = '';

                                $des = '';
                                if ($order->has('order_lines') && sizeof($order->order_lines) > 0) {
                                    foreach ($order->order_lines as $line) {
                                        $_product = $line->product->name . ' มูลค่า ' . $line->totalamt;

                                        $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                    }
                                }

                                $paymentDes = '';
                                if ($order->has('payment_lines') && sizeof($order->payment_lines) > 0) {
                                    foreach ($order->payment_lines as $line) {
                                        $payment = $line->payment;
                                        if ($payment->payment_method == 'CASH') {
                                            $paymentDes = '<span class="badge badge-success">เงินสด</span>';
                                        } else {
                                            $paymentDes = ($paymentDes == '') ? $payment->bank_account->account_name : ', ' . $payment->bank_account->account_name;
                                        }
                                    }
                                } else {
                                    $lineClass = 'text-danger';
                                    $paymentDes = '<span class="badge badge-danger">ยังไม่ได้ชำระเงิน</span>';
                                }
                                ?>
                                <tr>
                                    <td class="column-date"><?= h($order->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td class=""><?= h($order->duedate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>

                                    <td><?= h($order->docno) ?></td>
                                    <td><?= $des ?></td>
                                    <td><?= h($order->has('Seller') ? $order->Seller->firstname : '') ?></td>

                                    <td><?= $paymentDes ?></td>
                                    <td><?= $order->isreceived == 'Y' ? '<span class="text-success"><i class=" mdi mdi-checkbox-multiple-marked-circle"></i>รับสินค้าแล้ว</span>' : '' ?></td>
                                    <td class="text-right"><?= h($this->Number->format($order->totalpaid)) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>


                <?php if (isset($savingTransactions)) { ?>
                    <h4 class="prompt-500 text-primary">รายการเงินออม <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>

                                <th>พนักงาน</th>
                                <th>วิธีการชำระเงิน</th>
                                <th class="text-right">จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($savingTransactions as $item): ?>

                                <tr class="">
                                    <td class=""><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($item->docno) ?></td>
                                    <td><?= h($item->has('Seller') ? $item->Seller->firstname : '') ?></td>
                                    <td><?= '' ?></td>
                                    <td class="text-right"><?= h($this->Number->format($item->amount)) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>

                <?php if (isset($brokens)) { ?>
                    <h4 class="prompt-500 text-primary">รายการชำรุด <?=h($title)?></h4>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="140px">วันที่ทำรายการ</th>
                                <th width="120px">หมายเลขเอกสาร</th>
                                
                                <th>รายการ</th>
                                <th>พนักงาน</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($brokens as $item): ?>
                                <?php
                                $des = '';
                                foreach ($item->goods_lines as $key => $line) {
                                    $des = $key==0?$line->product->name:$des . '<br/>' . $line->product->name;
                                }
                                ?>
                                <tr class="">
                                    <td class=""><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= h($item->docno) ?></td>
                                    <td><?= $des ?></td>
                                    <td><?= h($item->has('Seller') ? $item->Seller->firstname : '') ?></td>
                                    
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <hr>
                <?php } ?>



            </div>
        </div>
    </div>
</div>



<script>
    <?php if(!isset($startDate)){?>
    $(document).ready(function () {
        setDefaultToDayDate('start_date');
        setDefaultToDayDate('end_date');
    });
    <?php } ?>
</script>
