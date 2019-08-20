
<?= $this->element('Lib/data_table') ?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title"><i class="mdi mdi-account-multiple"></i> รายชื่อผู้ใช้งาน</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?php if($user_branch == '0'){ ?>
                
                <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
                <?php } ?>
            </div>
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="column-tool-bt"></th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th>สาขา</th>
                        <th>โทร</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">ประเภทสมาชิก</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col"style="text-align: center">สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(BT_VIEW, ['action' => 'view', $user->id], ['escape' => false, 'label' => false]) ?>
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $user->id], ['escape' => false, 'label' => false]) ?>
                                <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $user->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false]) ?>
                            </td>
                            <td><?= h($user->firstname . "    " . $user->lastname) ?></td>
                            <td><?= h($user->has('branch') ? $user->branch->name : '-') ?></td>
                            <td><?= h($user->mobileno) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= $user->has('role') ? $user->role->name : '-' ?></td>
                            <td><?= h($user->position) ?></td>
                            <td><?= $user->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>