
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title"><i class="mdi mdi-gift"></i>  โปรโมชั่น</h3>
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
                        <th scope="col"style="text-align: center">โปรโมชั่น</th>
                        <th scope="col"style="text-align: center">ประเภท</th>
                        <th scope="col"style="text-align: center">จำนวน</th>
                        <th scope="col"style="text-align: center">หมายเหตุ</th>
                        <th scope="col"style="text-align: center">สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($promotions as $promotion): ?>
                        <tr>
                            <td class="actions" style="text-align: center">
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $promotion->id], ['escape' => false, 'label' => false]) ?></td>
                            <td class="actions" style="text-align: center">
                                <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $promotion->id], ['confirm' => __('ท่านต้องการลบข้อมูล ใช่ หรือ ไม่ '), 'escape' => false]) ?>
                            </td>
                            <td><?= h($promotion->name) ?></td>
                            <td><?= h($type[$promotion->type]) ?></td>
                            <td><?= h($promotion->value) ?></td>
                            <td><?= h($promotion->description) ?></td>
                            <td style="text-align: center"><?= $promotion->isactive=='Y'?ACTIVE:INACTIVE?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>