


<?= $this->element('Lib/data_table') ?>

<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">


            <div class="form-group row bt-tool">
                <div class="col-md-6">
                    <h3 class="m-t-0 gold-title"><i class="mdi mdi-currency-usd"></i>รายละเอียดบัญชี</h3>
                    <?= $this->Html->link(BT_BACK, ['controller' => 'saving-accounts', 'action' => 'index'], ['escape' => false]) ?>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-4">
                    <h3> ชื่อบัญชี  : <?= $savingAccount['bpartner']['name'] ?></h3>
                    <h4> เงินคงเหลือ : <?= number_format($savingAccount['balanceamt']) ?> บาท</h4>
                </div>
            </div>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center">ยกเลิก</th>
                        <th style="text-align: center">เลขที่</th>
                        <th style="text-align: center">จำนวนเงิน</th>
                        <th style="text-align: center">ประเภท</th>
                        <th style="text-align: center">หมายเหตุ</th>
                        <th style="text-align: center">บัญชี</th>
                        <th style="text-align: center">สถานะ</th>
                        <th style="text-align: center">วันที่ทำรายการ</th>
                        <th style="text-align: center">วันที่บันทึก</th>




                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($savingTransaction as $savingTransactions): ?>
                        <tr>

                            <?php
                            $word = '';
                            $bankname = '';
                            if ($savingTransactions->isdeposit == 'Y') {
                                $word = 'ฝาก';
                            } else {
                                $word = 'ถอน';
                            }
                            if ($savingTransactions->bank_account !=null && $savingTransactions->bank_account->bank_id != '') {
                                $bankname = $savingTransactions->bank_account->bank->name . ' ' . $savingTransactions->bank_account->accountno;
                            } else {
                                $bankname = $savingTransactions->bank_account !=null?$savingTransactions->bank_account->account_name:'';
                            }
                            ?> 
                            <td style="text-align: center">  <?php if ($savingTransactions->docstatus != 'VO') { ?>
                                    <?= $this->Html->link(BT_DELETE, ['controller'=>'saving-transactions','action' => 'void',$savingTransactions->id], ['escape' => false]) ?> 
                                <?php } ?> </td>
                            <td style="text-align: center"><?= h($savingTransactions->docno) ?></td>
                            <td style="text-align: right"><?= number_format($savingTransactions->amount) ?></td>
                            <td style="text-align: center"><?= h($word) ?></td>
                            <td style="text-align: center"><?= h($savingTransactions->description) ?></td>
                            <td style="text-align: center"><?= $bankname ?></td>
                            <td class="">
                                <span class="badge badge-<?= $savingTransactions->docstatus == 'CO' ? 'success' : 'warning' ?>">
                                    <?= h($docStatusList[$savingTransactions->docstatus]['name']) ?>
                                </span>
                            </td>
                            <td style="text-align: center"><?= h($savingTransactions->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                            <td style="text-align: center"><?= h($savingTransactions->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>





                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>