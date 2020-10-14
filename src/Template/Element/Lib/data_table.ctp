<?= $this->Html->css('plugins/datatables/dataTables.bootstrap4.min.css') ?>
<!-- Required datatable js -->
<?= $this->Html->script('/css/plugins/datatables/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/dataTables.bootstrap4.min.js'); ?>
<!-- Buttons examples -->
<?= $this->Html->script('/css/plugins/datatables/dataTables.buttons.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.bootstrap4.min.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/jszip.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/pdfmake.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/vfs_fonts.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/owner/vfs_fonts.js'); ?> 
<?= $this->Html->script('/css/plugins/datatables/buttons.html5.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.print.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/buttons.colVis.min.js'); ?> 


<!-- Responsive examples -->
<?= $this->Html->script('/css/plugins/datatables/dataTables.responsive.min.js'); ?>
<?= $this->Html->script('/css/plugins/datatables/responsive.bootstrap4.min.js'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable({
            "lengthChange": false,
            "lengthMenu": [[50, -1], [50, "All"]],
            "ordering": false
        });
        $('#datatable-dis').DataTable({
            "lengthChange": false,
            "lengthMenu": [[50, -1], [50, "All"]],
            "ordering": true,
            "searching": false
        });
        $('#datatable-dis1').DataTable({
            "lengthChange": false,
            "lengthMenu": [[50, -1], [50, "All"]],
            "ordering": true,
            "searching": false
        });


        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf'],
            "ordering": false
        });

        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>