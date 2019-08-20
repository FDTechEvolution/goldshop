
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายชื่อบัญชี</h3>
           <?=$this->element('Customers/form_modal_saving');?>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col" class="actions" style="text-align: center"><?= __('ทำรายการ') ?></th>
                        <th scope="col" class="actions" style="text-align: center"><?= __('รายละเอียด') ?></th>
                        <th scope="col"style="text-align: center">ชื่อบัญชี</th>
                        <th scope="col"style="text-align: center">เลขบัตรประชาชน</th>
                        <th scope="col"style="text-align: center">เงินคงเหลือ</th>

                        <th scope="col"style="text-align: center">สาขา</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($savingAccounts as $savingAccount): ?>
                        <tr>
                            <td class="actions" style="text-align: center">
                                <?= $this->Html->link('<button type="button" class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm"><i class="mdi mdi-plus-box"></i></button>', ['action' => 'view', $savingAccount->id], ['escape' => false, 'label' => false]) ?></td>
                            <td class="actions" style="text-align: center">
                                <?= $this->Html->link('<button type="button" class="btn btn-icon waves-effect waves-light btn-success m-b-5 btn-sm"><i class="mdi mdi-magnify"></i></button>', ['controller'=>'saving-transactions','action' => 'view', $savingAccount->id], ['escape' => false, 'label' => false]) ?></td>

                            <td><?= h($savingAccount->bpartner->name) ?></td>
                            <td style="text-align: center"><?= h($savingAccount->bpartner->taxid) ?></td>
                            <td><?= number_format($savingAccount->balanceamt) ?></td>


                            <td style="text-align: center"><?= h($savingAccount->branch->name) ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>