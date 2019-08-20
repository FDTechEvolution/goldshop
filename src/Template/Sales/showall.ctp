<?= $this->Form->create('', ['id' => 'showall']) ?>
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title border-bottom pb-2"><i class="mdi mdi-format-list-bulleted"></i> <?= $wording ?> 
                <?php
                if ($todayDate != '') {
                    echo $todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE);
                } else {
                    echo $todayDate;
                }
                ?></h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="ion-social-bitcoin text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($totalAmt) ?></b></h3>
                            <p class="text-muted mb-0">มูลค่าขายวันนี้ (บาท)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-primary pull-left">
                            <i class="mdi mdi-scale text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($weightAmt) ?></b></h3>
                            <p class="text-muted mb-0">น้ำหนักขายวันนี้ (กรัม)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="mdi mdi-format-list-numbers text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= sizeof($payments) ?></b></h3>
                            <p class="text-muted mb-0">จำนวนรายการวันนี้</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
            <div class="row m-b-10">
                <div class="col-lg-9 col-mb-9"></div>

                <div class="input-group col-mb-3 col-lg-3">
                    <input type="text" class="form-control" name="txt" id="txt" placeholder="กรุณากรอกหมายเลขเอกสาร" aria-label="กรุณากรอกหมายเลขเอกสาร" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="bt_search" type="button">ค้นหา</button>
                    </div>
                </div>
            </div>
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>วันที่บันทึก</th>
                        <th>หมายเลขเอกสาร</th>
                        <th>ลูกค้า</th>
                        <th>รายการ</th>
                        <th>พนักงาน</th>

                        <th>วิธีการชำระเงิน</th>
                        <th class="text-right">มูลค่าสินค้า</th>
                        <th class="text-right">ใช้เงินออม</th>
                        <th class="text-right">ส่วนลด</th>
                        <th class="text-right">รับเงินทั้งหมด</th>
                    </tr>
                </thead>
                <tbody class="hand-cursor">

                    <?php foreach ($payments as $payment): ?>
                        <?php
                        $lineClass = '';
                        $icon = '';
                        $des = $payment->isexchange == 'Y' ? '<span class="badge badge-danger">แลกเปลี่ยน</span>' : '';
                        if ($payment->has('payment_lines') && sizeof($payment->payment_lines) > 0) {
                            foreach ($payment->payment_lines as $line) {
                                if ($line->has('product')) {
                                    $_product = $line->product->name . ' มูลค่า ' . $this->Number->format($line->totalamount);
                                    $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                }
                                if ($line->isoverprice == 'Y') {
                                    $lineClass = 'text-danger';
                                    $icon = '<i class="mdi mdi-alert-circle-outline"></i>';
                                }
                            }
                        }

                        $paymentDes = '';
                        
                        if ($payment->has('payment_method_lines') && sizeof($payment->payment_method_lines) > 0) {
                            foreach ($payment->payment_method_lines as $line) {

                                if ($line->payment_method == 'CASH') {
                                    $paymentDes = $paymentDes.',เงินสด';
                                } elseif ($line->payment_method == 'TRAN') {
                                    $paymentDes = $paymentDes.',โอนเงิน';
                                } elseif ($line->payment_method == 'CRED') {
                                    $paymentDes = $paymentDes.',บัตรเครดิต';
                                } else {
                                    $paymentDes = ($paymentDes == '') ? $line->bank_account->account_name : ', ' . $line->bank_account->account_name;
                                }
                                
                            }
                        }
                        ?>
                        <tr class="<?=$payment->docstatus=='VO'?'text-void':''?>" data-url="<?= SITE_URL . 'sales/view/' . h($payment->id) ?>">
                            <td class=""><?=$payment->docstatus=='VO'?'<span class="badge badge-danger">ยกเลิก</span> ':''?> <small><?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></small></td>
                            <td><small><?= h($payment->docno) ?></small></td>
                            <td><small><?= h($payment->has('bpartner') ? $payment->bpartner->name : '') ?></small></td>
                            <td><small><?= $des ?></small></td>
                            <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>

                            <td><?= $paymentDes ?></td>
                            <td class="text-right"><?= h($this->Number->format($payment->amount)) ?></td>
                            <td class="text-right"><?= h($this->Number->format($payment->usesavingamt)) ?></td>
                            <td class="text-right"><?= h($this->Number->format($payment->discount)) ?></td>
                            <td class="text-right <?= $lineClass ?>"><?= $icon ?> <?= h($this->Number->format($payment->totalamt)) ?></td>
                        </tr>
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