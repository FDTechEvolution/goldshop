<?= $this->element('Lib/data_table') ?>


<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">บัญชีทางการเงิน</h3>
            <p class="text-muted font-13 m-b-30">

            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'bank-accounts', 'action' => 'add'], ['escape' => false]) ?> 
            </div>

            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ใช้สำหรับสาขา</th>
                        <th>ชื่อบัญชี</th>
                        <th>หมายเลขบัญชี</th>
                        <th>ธนาคาร</th>
                        <th>เงินคงเหลือ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bankAccounts as $bankAccount): ?>
                        <tr data-url="<?=SITE_URL?>bank-accounts/view/<?=$bankAccount->id?>" class="hand-cursor">
                            <td><?= h($bankAccount->has('branch') ? $bankAccount->branch->name : '') ?></td>
                            <td><?= h($bankAccount->account_name) ?></td>
                            <td><?= h($bankAccount->accountno) ?></td>
                            <td><?= h($bankAccount->has('bank')?$bankAccount->bank->name:'') ?></td>
                            <td><?= h($this->Number->format($bankAccount->total_balance)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
    });
</script>
