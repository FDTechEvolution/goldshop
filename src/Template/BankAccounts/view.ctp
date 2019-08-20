<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">ความเคลื่อนไหวของบัญชี <?= h($bankAccount->account_name) ?></h3>
            <hr/>
            <div class="row">
                <div class="col-md-4 text-left prompt-500 text-success">
                    <h2>คงเหลือ <?= $this->Number->format($bankAccount->total_balance) ?></h2>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>ชื่อบัญชี: </strong><?= h($bankAccount->account_name) ?></p>
                            <p><strong>ธนาคาร: </strong><?= h($bankAccount->has('bank') ? $bankAccount->bank->name : '-') ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>หมายเลข: </strong><?= h($bankAccount->accountno) ?></p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>หมายเลข: </strong><?= h($bankAccount->accountno) ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'bank-accounts', 'action' => 'edit', $bankAccount->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              
                                <th>ประเภท</th>
                                <th>วันที่</th>
                                <th>ผู้ทำรายการ</th>
                                <th>จำนวนเงิน</th>
                               
                            </tr>
                        </thead>
                        <tbody class="hand-cursor">

                            <?php foreach ($payments as $payment): ?>
                               
                                <tr>
                                    <td><?=$payment->type == null?'':$paymentTypes[$payment->type]?></td>
                                    <td class="column-date"><?= h($payment->paymentdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?=$payment->has('Seller')?($payment->Seller->firstname.' '.$payment->Seller->lastname):''?></td>
                                    <td><?=$payment->isreceipt=='Y'?'+':'-'?><?=$this->Number->Format($payment->totalamt)?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
