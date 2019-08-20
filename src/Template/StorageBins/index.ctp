<?php if (!is_null($warehouse_id)) { ?>
    <div class="col-12 bt-tool">
        <?= $this->Html->link(BT_ADD, ['action' => 'add',$warehouse_id], ['escape' => false]) ?> 
    </div>
<?php } ?>
<div class="col-md-12">
    <table class="table table-hover" width="100%">
        <thead>
            <tr>
                <th scope="col" class="actions"  width="150px">เครื่องมือ</th>
                <th scope="col">ชื่อคลังสินค้าย่อย</th>

                <th scope="col">ใช้เป็นค่าเริ่มต้น</th>
                <th scope="col">รายละเอียด</th>
                <th scope="col">เปิดใช้งาน</th>
                <th scope="col">วันที่เพิ่ม</th>
                <th scope="col">เพิ่มโดย</th>
                <th scope="col">วันที่แก้ไข</th>
                <th scope="col">แก้ไขโดย</th>

            </tr>
        </thead>
        <tbody>
            <?php if (is_null($warehouse_id)) { ?>
                <tr>
                    <td colspan="9" class="text-center text-warning">กรุณาเลือกคลังสินค้าด้านบนเพื่อดูรายการคลังสินค้าย่อย</td>
                </tr>

            <?php } else { ?>
                <?php if (sizeof($storageBins) == 0) { ?>
                    <tr>
                        <td colspan="9" class="text-center text-warning">ยังไม่มีข้อมูล</td>
                    </tr>
                <?php } ?>
                <?php foreach ($storageBins as $storageBin): ?>
                    <tr>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $storageBin->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $storageBin->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $storageBin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageBin->id)]) ?>
                        </td>
                        <td><?= h($storageBin->name) ?></td>
                        <td><?= $storageBin->isdefault=='Y'?YES:NO ?></td>

                        <td><?= h($storageBin->description) ?></td>
                        <td><?= $storageBin->isactive=='Y'?ACTIVE:INACTIVE ?></td>
                        <td><?= h($storageBin->created) ?></td>
                        <td><?= h($storageBin->has('UserCreated')?$storageBin->UserCreated->username:'-') ?></td>
                        <td><?= h($storageBin->modified) ?></td>
                        <td><?= h($storageBin->has('UserModified')?$storageBin->UserModified->username:'-') ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php } ?>
        </tbody>
    </table>
</div>