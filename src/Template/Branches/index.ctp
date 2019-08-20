
<?= $this->element('Lib/data_table') ?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายชื่อสาขา</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="column-tool-bt"></th>
                        <th scope="col"style="text-align: center">สาขา</th>

                        <th scope="col"style="text-align: center">รหัสสาขา</th>
                     
                        <th scope="col"style="text-align: center">บริษัท</th>
                        <th scope="col"style="text-align: center">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($branches as $branch): ?>
                        <tr>
                            <td class="actions" style="text-align: center">
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $branch->id], ['escape' => false, 'label' => false]) ?>
                                    <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $branch->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false]) ?>
                                </td>
                            
                            <td><?= h($branch->name) ?></td>
                            <td><?= h($branch->code) ?></td>
                            <td><?= h($branch->org->name) ?></td>
                            <td><?= h($branch->description) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>