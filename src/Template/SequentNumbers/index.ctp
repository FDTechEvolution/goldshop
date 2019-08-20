<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">เลขที่เอกสารอัตโนมัติ</h3>
            <p class="text-muted font-13 m-b-30">

            </p>
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'sequent-numbers', 'action' => 'add'], ['escape' => false]) ?> 
                <?= $this->Html->link('<button type="button" class="btn btn-secondary waves-effect waves-light"><i class="mdi mdi-auto-fix"></i> สร้างเลขที่เอกสารทั้งหมดด้วยระบบ</button>', ['controller' => 'sequent-numbers', 'action' => 'auto-create-all'], ['escape' => false]) ?> 
            </div>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="column-tool-bt"></th>
                        <th>สาขา</th>
                        <th>ประเภทเอกสาร</th>
                        <th>คำขึ้นต้น</th>
                        <th>เลขปัจจุบัน</th>
                        <th>เปิดใช้งาน</th>
                        <th>เพิ่มวันที่</th>
                        <th>เพิ่มโดย</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($sequentNumbers as $sequentNumber): ?>
                        <tr>
                            <td>
                                
                                <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $sequentNumber->id], ['escape' => false]) ?>
                                <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $sequentNumber->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false]) ?>
                            </td>
                            <td><?= h($sequentNumber->has('branch') ? $sequentNumber->branch->name : '') ?></td>
                            <td><?= $docTypeCodes[$sequentNumber->doccode]['name'] ?></td>
                            <td><?= h($sequentNumber->prefix) ?></td>
                            <td><?= h($sequentNumber->current_sequent) ?></td>
                            <td><?= $sequentNumber->isactive=='Y'?ACTIVE:INACTIVE?></td>
                            <td><?= h($sequentNumber->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td><?= h($sequentNumber->has('UserCreated') ? $sequentNumber->UserCreated->username : '') ?></td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- end row -->
