



<?= $this->element('Lib/data_table') ?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">ประเภทผู้ใช้งาน</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
                <?= $this->Html->link('<button type="button" class="btn btn-info "> ข้อมูลผู้ใช้งาน</button>', ['controller' => 'users', 'action' => 'index'], ['escape' => false]) ?>

            </div>

            <table id="datatable" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>ชื่อ</th>
                        <th>เปิดใช้งาน</th>
                        <th>หน้าจอแบบ POS</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role): ?>
                        <tr>
                            <td class="column-tool-bt">
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $role->id], ['escape' => false, 'label' => false]) ?>
                                <?= $this->Html->link(BT_DELETE, ['action' => 'delete', $role->id], ['confirm' => __('ท่านต้องการลบข้อมูลสมาชืก ใช่ หรือ ไม่ '), 'escape' => false, 'label' => false]) ?>
                            </td>
                            <td><?= h($role->name) ?></td>
                            <td ><?= $role->isactive=='Y'?ACTIVE:INACTIVE ?></td>
                            <td ><?= $role->isposwindow=='Y'?YES:NO ?></td>
                            <td><?= h($role->description) ?></td>




                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>