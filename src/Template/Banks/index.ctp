<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
  
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายชื่อธนาคาร</h3>
            <p class="text-muted font-13 m-b-30">

            </p>
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'banks', 'action' => 'add'], ['escape' => false]) ?> 
            </div>

            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="column-tool-bt"></th>
                        <th>ชื่อธนาคาร</th>
                        <th>ตัวย่อ</th>
                        <th>ใช้สำหรับเงินสด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($banks as $bank): ?>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(BT_VIEW, ['action' => 'view', $bank->id],['escape'=>false]) ?>
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $bank->id],['escape'=>false]) ?>
                                <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $bank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id),'escape'=>false]) ?>
                            </td>
                            <td><?= h($bank->name) ?></td>
                            <td><?= h($bank->code) ?></td>
                            <td><?= ($bank->iscash=='Y'?YES:NO) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>