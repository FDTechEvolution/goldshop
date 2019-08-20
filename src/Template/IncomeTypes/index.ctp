<?= $this->element('Lib/data_table') ?>


<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">ประเภทรายรับรายจ่าย</h3>
            <p class="text-muted font-13 m-b-30">

            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'income-types', 'action' => 'add'], ['escape' => false]) ?> 
            </div>

            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ประเภท</th>
                        <th>สำหรับรายจ่าย</th>
                        <th>สำหรับรายรับ</th>
                        <th>เปิดใช้งาน</th>
                        <th>วันที่เพิ่ม</th>
                        <th>เพิ่มโดย</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($incomeTypes as $incomeType): ?>
                        <tr data-url="<?=SITE_URL?>income-types/edit/<?=$incomeType->id?>" class="hand-cursor">
                            <td><?= h($incomeType->name) ?></td>
                            <td><?= ($incomeType->isexpend=='Y'?YES:NO) ?></td>
                            <td><?= ($incomeType->isrevenue=='Y'?YES:NO) ?></td>
                            <td><?= ($incomeType->isactive=='Y'?ACTIVE:INACTIVE) ?></td>
                            <td><?= ($incomeType->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td><?= ($incomeType->UserCreated->firstname) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
    });
</script>
