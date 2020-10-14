
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
            buttons: ['copy', 'excel', 'pdf', 'csv'],
            "lengthMenu": [[6, -1], [50, "All"]]
        });

        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>
<div class="row">
    <?php if (is_null($productCategory) || $productCategory == '') { ?>

    <?php } else { ?>

    <?php } ?>


  

    <div class="col-md-12">

        <table class="table table-hover" id="datatable-buttons">
            <thead>
                <tr>

                    <th>Code</th>
                    <th>ชื่อ</th>
                    <th>%</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($productCategory['products']) == 0) { ?>
                    <tr>
                        <td colspan="8" class="text-center">ยังไม่มีข้อมูล</td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($productCategory['products'] as $product): ?>
                        <tr>
                            <td><?= $product->code ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->percent ?>%</td>
                            <td><?= str_replace(' ', '', sprintf('%s/%s', $product['size']['name'], $product['weight']['sd_weight']['name'])) ?></td>     

                        </tr>

                    <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>