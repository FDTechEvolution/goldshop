<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">น้ำหนักทอง</h3>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
            </div>
            <table class="table table-hover" id="datatable-buttons">
                <thead>
                    <tr>
                        <th class="column-tool-bt"></th>
                        <th>น้ำหนัก/กรัม</th>
                        <th>ชื่อน้ำหนัก(ฉลาก)</th>
                        <th>มาตรฐานน้ำหนัก</th>
                        <th>เปิดใช้งาน</th>
                        <th>รายละเอียด</th>
                        <th class="column-date">วันที่เพิ่ม</th>
                        <th>เพิ่มโดย</th>
                        <th class="column-date">วันที่แก้ไข</th>
                        <th>แก้ไขโดย</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (sizeof($weights) == 0) { ?>
                        <tr>
                            <td colspan="8" class="text-center">ยังไม่มีข้อมูล</td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($weights as $weight): ?>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $weight->id], ['escape' => false]) ?>
                                <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $weight->id, $weight->product_category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $weight->id), 'escape' => false]) ?>
                            </td>
                            <td><?= h($weight->value) ?></td>
                            <td><?= h($weight->name) ?></td>
                            <td><?= h(is_null($weight->sd_weight_id)||$weight->sd_weight_id==''?'':$weight->sd_weight->name) ?></td>
                            <td><?= $weight->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                            <td><?= h($weight->description) ?></td>
                            <td><?= h($weight->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td><?= h($weight->UserCreated->firstname) ?></td>
                            <td><?= h($weight->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td><?= $weight->has('UserModified') ? h($weight->UserModified->firstname) : '-' ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>