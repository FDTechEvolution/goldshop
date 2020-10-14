<?= $this->Form->create('', ['id' => 'showall']) ?>
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row">
                <div class="col-6">
                    <h3 class="f-kanit-700 text-primary"><i class="mdi mdi-format-list-bulleted"></i> <?= $wording ?> 
                        <?php
                        if ($todayDate != '') {
                            echo $todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE);
                        } else {
                            echo $todayDate;
                        }
                        ?></h3>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="txt" id="txt" placeholder="กรุณากรอกหมายเลขเอกสาร" aria-label="กรุณากรอกหมายเลขเอกสาร" aria-describedby="basic-addon2">
                    
                </div>
                <div class="col-2">
                    <button class="btn btn-block btn-secondary" id="bt_search" type="button">ค้นหา</button>
                </div>
            </div>
            <hr/>

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="widget-bg-color-icon card-box">

                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter f-kanit-700"><?= $this->Number->format($totalAmt) ?></b></h3>
                            <p class="text-muted mb-0">มูลค่ารับซื้อวันนี้ (บาท)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">

                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter f-kanit-700"><?= $this->Number->format($weightAmt) ?></b></h3>
                            <p class="text-muted mb-0">น้ำหนักรับซื้อวันนี้ (กรัม)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="widget-bg-color-icon card-box">

                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter f-kanit-700"><?= $countItem ?></b></h3>
                            <p class="text-muted mb-0">จำนวนรายการวันนี้</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>

            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>หมายเลขเอกสาร</th>
                        <th>เวลาทำรายการ</th>


                        <th>รายการรับซื้อ</th>
                        <th>น้ำหนัก(g)</th>
                        <th class="text-right">จ่ายเงิน</th>
                        <th>พนักงาน</th>

                        <th>วิธีการชำระเงิน</th>

                        <th>ลูกค้า</th>
                    </tr>
                </thead>
                <tbody class="hand-cursor">

                    <?php foreach ($payments as $payment): ?>
                        <?php foreach ($payment['payment_lines'] as $line): ?>
                            <?php
                            $lineClass = '';
                            //debug($invoice);
                            $des = $payment->isexchange == 'Y' ? '<span class="badge badge-danger">แลกเปลี่ยน</span>' : '';
                            $_product = $line->product->name;
                            $des = ($des == '') ? $_product : $des . '<br/>' . $_product;

                            $paymentDes = '';


                            if ($payment->payment_method == 'CASH') {
                                $paymentDes = '<span class="badge badge-success">เงินสด</span>';
                            } elseif ($payment->payment_method == 'TRAN') {
                                $paymentDes = '<span class="badge badge-success">โอนเงิน</span>';
                            } elseif ($payment->payment_method == 'CRED') {
                                $paymentDes = '<span class="badge badge-success">บัตรเครดิต</span>';
                            } else {
                                $paymentDes = ($paymentDes == '') ? $payment->bank_account->account_name : ', ' . $payment->bank_account->account_name;
                            }

                            if ($line->isoverprice == 'Y') {
                                $lineClass = 'text-primary';
                            }
                            ?>
                            <tr class="<?= $lineClass ?> <?= $payment->docstatus == 'VO' ? 'text-void' : '' ?>" data-url="<?= SITE_URL . 'purchase/view/' . h($payment->id) ?>">
                                <td><small><?= h($payment->docno) ?></small></td>
                                <td class=""><?= $payment->docstatus == 'VO' ? '<span class="badge badge-danger">ยกเลิก</span> ' : '' ?><small><?= h($payment->created->i18nFormat(TIME_FORMATE, null, TH_DATE)) ?></small></td>


                                <td><small><?= $des ?></small></td>
                                <td><?= number_format($line->product->manual_weight, 2) ?>g</td>
                                <td class="text-right"><?= h($this->Number->format($line->amount)) ?></td>
                                <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>

                                <td><?= $paymentDes ?></td>

                                <td><small><?= h($payment->has('bpartner') ? $payment->bpartner->name : '') ?></small></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
    });

    $("#bt_search").click(function () {
        var txt = $("#txt").val();
        if (txt === '') {
            $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุเลขเอกสาร', '');
            return false;
        } else {
            $('#showall').submit();
        }

    });
</script>