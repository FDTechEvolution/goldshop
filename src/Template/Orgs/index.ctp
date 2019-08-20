
<?= $this->element('Lib/data_table') ?>





<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายชื่อบริษัท</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col" class="actions" style="text-align: center"><?= __('แก้ไข') ?></th>
                        <th scope="col" class="actions"style="text-align: center"><?= __('ลบ') ?></th>
                        <th scope="col" style="text-align: center">ชื่อบริษัท</th>
                        <th scope="col" style="text-align: center">รหัส</th>
                        <th scope="col" style="text-align: center">เลขผู้เสียภาษี</th>
                        <th scope="col" style="text-align: center">สถานะ</th>
                        <th scope="col" style="text-align: center">รายละเอียด</th>
                    </tr>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orgs as $org): ?>
                        <tr>
                            <td class="actions" style="text-align: center">
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $org->id], ['escape' => false, 'label' => false]) ?>
                            </td>
                            <td style="text-align: center">      
                                <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $org->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false]) ?>
                            </td>

                            <td><?= h($org->name) ?></td>
                            <td><?= h($org->code) ?></td>
                            <td><?= h($org->taxid) ?></td>
                            <td style="text-align: center"><?= $org->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                            <td><?= h($org->description) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>