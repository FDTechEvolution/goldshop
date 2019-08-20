
<!-- Required datatable js -->
<?= $this->Html->script('/assets/plugins/datatables/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>
<!-- Buttons examples -->
<?= $this->Html->script('/assets/plugins/datatables/dataTables.buttons.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/buttons.bootstrap4.min.js'); ?> 
<?= $this->Html->script('/assets/plugins/datatables/jszip.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/pdfmake.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/vfs_fonts.js'); ?> 
<?= $this->Html->script('/assets/plugins/datatables/buttons.html5.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/buttons.print.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/buttons.colVis.min.js'); ?> 


<!-- Responsive examples -->
<?= $this->Html->script('/assets/plugins/datatables/dataTables.responsive.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/responsive.bootstrap4.min.js'); ?>

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
            <?= $this->Html->link(BT_ADD, ['controller' => 'designs', 'action' => 'add', $productCatId], ['escape' => false]) ?> 
        </div>
    <?php } ?>
    <div class="col-md-12">
        <table class="table table-hover" id="datatable-buttons" >
            <thead>
                <tr>
                    <th class="column-tool-bt"></th>
                    <th>ชื่อลาย</th>
                    <th>ภาพ</th>
                    <th>เปิดใช้งาน</th>
                    <th>รายละเอียด</th>
                    <th class="column-date">วันที่เพิ่ม</th>
                    <th>เพิ่มโดย</th>
                    <th class="column-date">วันที่แก้ไข</th>
                    <th>แก้ไขโดย</th>
                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($designs) == 0) { ?>
                    <tr>
                        <td colspan="8" class="text-center">ยังไม่มีข้อมูล</td>
                    </tr>
                <?php } ?>
                <?php foreach ($designs as $design): ?>
                    <tr>
                        <td class="actions">
                            <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $design->id],['escape'=>false]) ?>
                            <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $design->id], ['confirm' => __('Are you sure you want to delete # {0}?', $design->id),'escape'=>false]) ?>
                        </td>
                        <td><?= h($design->name) ?></td>
                        <td> 
                            <?php 
                            $image = 'noimage.png';
                            if(!is_null($design->image)){
                                $image = $design->image->path;
                            }
                            ?>
                            <?=$this->Html->image($image,['class'=>'thumb-image','width'=>'40px','height'=>'40px'])?>
                        </td>
                        <td><?= $design->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                        <td><?= h($design->description) ?></td>
                        <td><?= h($design->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        <td><?= h($design->UserCreated->firstname) ?></td>
                        <td><?= h($design->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        <td><?= $design->has('UserModified')?h($design->UserModified->firstname):'-' ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
