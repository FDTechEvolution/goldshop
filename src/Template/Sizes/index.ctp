
<!-- Required datatable js -->
<?= $this->Html->script('/css/plugins/datatables/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/dataTables.bootstrap4.min.js'); ?>
<!-- Buttons examples -->
<?= $this->Html->script('/css/plugins/datatables/dataTables.buttons.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.bootstrap4.min.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/jszip.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/pdfmake.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/vfs_fonts.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/buttons.html5.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.print.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.colVis.min.js'); ?> 


<!-- Responsive examples -->
<?= $this->Html->script('/css/plugins/datatables/dataTables.responsive.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/responsive.bootstrap4.min.js'); ?>

<script type="text/javascript">
    $(document).ready(function () {

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf'],
            "lengthMenu": [[6, -1], [50, "All"]]
        });

        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>
<div class="row">
    <?php if (is_null($productCatId) || $productCatId == '') { ?>

    <?php } else { ?>
        <div class="col-12 bt-tool">
            <?= $this->Html->link(BT_ADD, ['controller' => 'sizes', 'action' => 'add', $productCatId], ['escape' => false]) ?> 
        </div>
    <?php } ?>
    <div class="col-md-12">
        <table class="table table-hover" id="datatable-buttons">
            <thead>
                <tr>
                    <th class="column-tool-bt"></th>
                    <th>ชื่อขนาด</th>
                    <th>เปิดใช้งาน</th>
                    <th>รายละเอียด</th>
                    <th class="column-date">วันที่เพิ่ม</th>
                    <th>เพิ่มโดย</th>
                    <th class="column-date">วันที่แก้ไข</th>
                    <th>แก้ไขโดย</th>
                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($sizes) == 0) { ?>
                    <tr>
                        <td colspan="8" class="text-center">ยังไม่มีข้อมูล</td>
                    </tr>
                <?php } ?>
                <?php foreach ($sizes as $size): ?>
                    <tr>
                        <td class="actions">
                            <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $size->id],['escape'=>false]) ?>
                            <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $size->id], ['confirm' => __('Are you sure you want to delete # {0}?', $size->id),'escape'=>false]) ?>
                        </td>
                        <td><?= h($size->name) ?></td>
                        <td><?= $size->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                        <td><?= h($size->description) ?></td>
                        <td><?= h($size->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        <td><?= h($size->UserCreated->firstname) ?></td>
                        <td><?= h($size->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        <td><?= $size->has('UserModified')?h($size->UserModified->firstname):'-' ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>