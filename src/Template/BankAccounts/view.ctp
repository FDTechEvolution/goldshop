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
            <?php $transactions = $bankAccount['bank_account_transactions']; ?>
            <div class="row">
                <div class="col-md-12">
                    <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>

                                <th>ประเภท</th>
                                <th>วันที่</th>
                                <th>ผู้ทำรายการ</th>
                                <th class="text-right">จำนวนเงิน</th>

                            </tr>
                        </thead>
                        <tbody class="hand-cursor">

                            <?php foreach ($transactions as $item): ?>

                                <tr>
                                    <td><?= $item->type ?></td>
                                    <td class="column-date"><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                    <td></td>
                                    <td class="text-right"><?= number_format($item->debit - $item->credit) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
