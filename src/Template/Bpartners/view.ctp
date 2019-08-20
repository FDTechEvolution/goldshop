<div class="col-md-12  col-lg-12 col-xs-12 ">
    <div class="card-box ">
        <div class="panel-body">
            <?php
            $branch = $bpartner->branch;
            $address = $bpartner->address;
            ?>
            <div class="row ">
                <div class="form-group ">
                    <h3 class="text-left prompt-400 text-primary"><i class="mdi mdi-book-open"></i> ข้อมูลลูกค้าและประวัติการทำรายการ</h3>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 bt-tool">
                    <?= $this->Html->link(BT_BACK, ['controller' => 'bpartners'], ['escape' => false]) ?> 
                    <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไขข้อมูลลูกค้า', ['action' => 'edit', $bpartner->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                    <?= $this->Form->hidden('bpartner_id', ['value' => $bpartner->id, 'id' => 'bpartner_id']) ?>
                </div>

            </div>
            <div class="row ">
                <div class="col-lg-6">
                    <h4 class="prompt-400"> <?= $bpartner->title . $bpartner->firstname . ' ' . $bpartner->lastname ?></h4>
                    <p><strong>ที่อยู่: </strong><?= h($address->address_line . ' ตำบล' . $address->subdistrict . ' อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?></p>
                </div>
            </div>
            <div class="row" id="box_promotion_new" style="display: none;">
                <div class="col-12 py-3">
                    <table class="" id="tb_promotion_new">
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">

                        <li class="nav-item">
                            <a href="#saleinvoice" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                รายการขาย
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#buyinvoice" data-toggle="tab" aria-expanded="false" class="nav-link">
                                รายการรับซื้อ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#pawn" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                รายการจำนำ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#saving" data-toggle="tab" aria-expanded="false" class="nav-link">
                                รายการเงินออม
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#promotion" data-toggle="tab" aria-expanded="false" class="nav-link">
                                รายการแลกโปรโมชั่น
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="promotion" aria-expanded="false">

                            <table class="table table-striped" width="100%" id="">
                                <thead>
                                    <tr>
                                        <th>วันที่ใช้โปรโมชั่น</th>
                                        <th>โปรโมชั่น</th>
                                        
                                        <th>พนักงาน</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($usePromotions as $item): ?>
                                        <tr>
                                            <td><?= h($item->usedate->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                            <td><?= h($item->description) ?></td>
                                            
                                            <td><?= $item->UserCreated->firstname ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pawn" aria-expanded="false">
                            <table class="table table-striped" width="100%" id="datatable-dis1">
                                <thead>
                                    <tr>
                                        <th scope="col">เลขที่ใบจำนำ</th>
                                        <th>ชื่อลูกค้า</th>
                                        <th>ราคา</th>
                                        <th style="text-align: center">สถานะ</th>
                                        <th>วันที่ทำรายการ</th>
                                        <th scope="col">วันสิ้นอายุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pawn as $pawndata): ?>
                                        <tr>
                                            <td><?= h($pawndata->docno) ?></td>
                                            <td><?= h($pawndata->bpartner->name) ?></td>
                                            <td><?= $this->Number->Format($pawndata->totalmoney) ?></td>
                                            <td style="text-align: center" class="">
                                                <span class="badge badge-<?php
                                                if ($pawndata->status == 'CO') {
                                                    echo 'success';
                                                } else if ($pawndata->status == 'VO') {
                                                    echo 'warning';
                                                } else {
                                                    echo 'secondary';
                                                }
                                                ?>">
                                                          <?= h($docStatusList[$pawndata->status]['name']) ?>
                                                </span>
                                            </td>
                                            <td><?= h($pawndata->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                            <td><?= h($pawndata->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade active show" id="saleinvoice" aria-expanded="true">
                            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>วันที่บันทึก</th>
                                        <th>หมายเลขเอกสาร</th>
                                        <th>รายการ</th>
                                        <th>พนักงาน</th>
                                        <th>ใช้สิทธิโปรโมชั่น</th>
                                        <th>วิธีการชำระเงิน</th>
                                        <th class="text-right">มูลค่าสินค้า</th>
                                        <th class="text-right">ใช้เงินออม</th>
                                        <th class="text-right">ส่วนลด</th>
                                        <th class="text-right">รับเงินทั้งหมด</th>
                                    </tr>
                                </thead>
                                <tbody class="hand-cursor">

                                    <?php foreach ($sales as $payment): ?>
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
                                                    $paymentDes = $paymentDes . ',เงินสด';
                                                } elseif ($line->payment_method == 'TRAN') {
                                                    $paymentDes = $paymentDes . ',โอนเงิน';
                                                } elseif ($line->payment_method == 'CRED') {
                                                    $paymentDes = $paymentDes . ',บัตรเครดิต';
                                                } else {
                                                    $paymentDes = ($paymentDes == '') ? $line->bank_account->account_name : ', ' . $line->bank_account->account_name;
                                                }
                                            }
                                        }
                                        ?>
                                        <tr class="<?= $payment->docstatus == 'VO' ? 'text-void' : '' ?>" data-url="<?= SITE_URL . 'sales/view/' . h($payment->id) ?>">
                                            <td class=""><?= $payment->docstatus == 'VO' ? '<span class="badge badge-danger">ยกเลิก</span> ' : '' ?> <small><?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></small></td>
                                            <td><small><?= h($payment->docno) ?></small></td>

                                            <td><small><?= $des ?></small></td>
                                            <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>
                                            <td><?= h($payment->ispromotionused == 'Y' ? 'ใช้แล้ว' : '') ?></td>
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
                        <div class="tab-pane fade" id="buyinvoice" aria-expanded="false">
                            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>วันที่บันทึก</th>
                                        <th>หมายเลขเอกสาร</th>

                                        <th>รายการรับซื้อ</th>
                                        <th>พนักงาน</th>
                                        <th>วิธีการชำระเงิน</th>
                                        <th>จ่ายเงิน</th>
                                    </tr>
                                </thead>
                                <tbody class="hand-cursor">

                                    <?php foreach ($purchase as $payment): ?>
                                        <?php
                                        $lineClass = '';
                                        $des = $payment->isexchange == 'Y' ? '<span class="badge badge-danger">แลกเปลี่ยน</span>' : '';
                                        if ($payment->has('payment_lines') && sizeof($payment->payment_lines) > 0) {
                                            foreach ($payment->payment_lines as $line) {
                                                if ($line->has('product')) {
                                                    $_product = $line->product->name . ' มูลค่า ' . $line->totalamt;
                                                    $des = ($des == '') ? $_product : $des . '<br/>' . $_product;
                                                }
                                            }
                                        }

                                        $paymentDes = '';
                                        if ($payment->has('payment_lines') && sizeof($payment->payment_lines) > 0) {
                                            foreach ($payment->payment_lines as $line) {

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
                                                    $lineClass = 'text-danger';
                                                }
                                            }
                                        }
                                        ?>
                                        <tr class="<?= $lineClass ?> <?= $payment->docstatus == 'VO' ? 'text-void' : '' ?>" data-url="<?= SITE_URL . 'purchase/view/' . h($payment->id) ?>">
                                            <td class=""><?= $payment->docstatus == 'VO' ? '<span class="badge badge-danger">ยกเลิก</span> ' : '' ?><small><?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></small></td>
                                            <td><small><?= h($payment->docno) ?></small></td>

                                            <td><small><?= $des ?></small></td>
                                            <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>

                                            <td><?= $paymentDes ?></td>
                                            <td class="text-right"><?= h($this->Number->format($payment->totalamt)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="saving" aria-expanded="false">
                            <?php if (!is_null($savingAccount)) { ?>
                                <h4 > เงินคงเหลือ : <?= number_format($savingAccount->balanceamt) ?> บาท</h4>
                                <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th>ประเภท</th>
                                            <th>จำนวนเงิน</th>
                                            <th>วันที่</th>
                                            <th>ทำรายการโดย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($savingAccount->saving_transactions as $data): ?>
                                            <tr id="trpawn">
                                                <?php
                                                $_word = '';
                                                if ($data->isdeposit == "Y") {
                                                    $_word = 'ฝาก';
                                                } else {
                                                    $_word = 'ถอน';
                                                }
                                                ?>
                                                <td><?= h($_word) ?></td>
                                                <td><?= number_format($data->amount) ?></td>
                                                <td><?= h($data->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                                <td><?= h($data->Seller->firstname . ' ' . $data->Seller->lastname) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id="payment_promotion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary prompt-500">รายการที่ยังไม่ได้ใช้สิทธิโปรโมชั่น</h4>
                                </div>
                                <div class="modal-body">

                                    <?= $this->Form->create('', ['id' => 'frm_promotion', 'url' => ['controller' => 'promotions', 'action' => 'use-promotion', $bpartner->id]]) ?>
                                    <div class="row">
                                        <?= $this->Form->hidden('promotion_id', ['id' => 'promotion_id']) ?>
                                        <table id="tb_payment_promotion" class="table table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>วันที่บันทึก</th>
                                                    <th>หมายเลขเอกสาร</th>
                                                    <th>รายการ</th>
                                                    <th>พนักงาน</th>
                                                    <th class="text-right">มูลค่าสินค้า</th>

                                                </tr>
                                            </thead>
                                            <tbody class="hand-cursor">

                                                <?php foreach ($sales as $index => $payment): ?>
                                                    <?php if ($payment->ispromotionused == 'N') { ?>
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
                                                        ?>
                                                        <tr class="<?= $payment->docstatus == 'VO' ? 'text-void' : '' ?>" data-url="" data-id="payment_<?= $index ?>" data-payment-id="<?= $payment->id ?>">
                                                            <?= $this->Form->hidden('payment_id[]', ['value' => '', 'id' => 'payment_' . $index]) ?>
                                                            <td class=""><?= $payment->docstatus == 'VO' ? '<span class="badge badge-danger">ยกเลิก</span> ' : '' ?> <small><?= h($payment->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></small></td>
                                                            <td><small><?= h($payment->docno) ?></small></td>

                                                            <td><small><?= $des ?></small></td>
                                                            <td><small><?= h($payment->has('Seller') ? $payment->Seller->firstname : '') ?></small></td>

                                                            <td class="text-right"><?= h($this->Number->format($payment->amount)) ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="bt_promotion_modal_save">ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {

        $("#tb_payment_promotion > tbody tr").click(function () {
            var line_id = $(this).attr('data-id');

            var selected = $(this).hasClass("table-success");
            //$("#list_exchange_modal > tbody tr").removeClass("table-success");
            if (!selected) {
                $(this).addClass("table-success");
                var payment_id = $(this).attr('data-payment-id');
                $('#' + line_id).val(payment_id);
            } else {
                $(this).removeClass("table-success");
                $('#' + line_id).val('');
            }

        });

        $('#bt_promotion_modal_save').on('click', function () {
            $('#frm_promotion').submit();
        });

        $("table").delegate('tr', 'click', function () {
            var url = $(this).attr("data-url");
            if (url !== 'undefined' && url !== undefined && url !== '') {
                document.location = url;
            }
        });

        $('#page-load-label').text('กำลังตรวจสอบโปรโมชั่น...');
        $('#page-load').show();
        var bpartner_id = $('#bpartner_id').val();
        $.get(SITE_URL + 'service-promotions/get-match-promotion', {bpartner_id: bpartner_id}).done(function (res) {
            var json = JSON.parse(res);
            console.log(json);
            if (json.status === '200') {
                $('#promotion_id').val(json.promotion.id);
                var url = SITE_URL + 'promotions/use-promotion?promotion_id=' + json.promotion.id + '&bpartner_id=' + bpartner_id + '&value=' + json.qty;
                var str = '';
                str = str + '<tr>';
                str = str + '<td>';

                str = str + '<button class="btn btn-outline-primary" data-toggle="modal" data-target="#payment_promotion">รับโปรโมชั่น</button>';
                str = str + '</td>';
                str = str + '<td>';
                str = str + json.title;
                str = str + '</td>';
                str = str + '</tr>';

                $('#tb_promotion_new > tbody').empty();
                $('#tb_promotion_new > tbody').append(str);

                $('#box_promotion_new').show();
            }


            $('#page-load').hide();
            $('#page-load-label').text('');
        });

    });


</script>

