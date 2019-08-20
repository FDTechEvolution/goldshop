
<!-- Required datatable js -->
<?= $this->Html->script('/assets/plugins/datatables/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>
<!-- Buttons examples -->
<?= $this->Html->script('/assets/plugins/datatables/dataTables.buttons.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/buttons.bootstrap4.min.js'); ?> 
<?= $this->Html->script('/assets/plugins/datatables/jszip.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/pdfmake.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/vfs_fonts.js'); ?> 
<?= $this->Html->script('/assets/plugins/datatables/owner/vfs_fonts.js'); ?> 
<?= $this->Html->script('/assets/plugins/datatables/buttons.html5.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/buttons.print.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/buttons.colVis.min.js'); ?> 


<!-- Responsive examples -->
<?= $this->Html->script('/assets/plugins/datatables/dataTables.responsive.min.js'); ?>
<?= $this->Html->script('/assets/plugins/datatables/responsive.bootstrap4.min.js'); ?>

<script type="text/javascript">
    $(document).ready(function () {
//        function getBase64FromImageUrl(url) {
//            var img = new Image();
//            img.crossOrigin = "anonymous";
//            img.onload = function () {
//                var canvas = document.createElement("canvas");
//                canvas.width = this.width;
//                canvas.height = this.height;
//                var ctx = canvas.getContext("2d");
//                ctx.drawImage(this, 0, 0);
//                var dataURL = canvas.toDataURL("image/png");
//                return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
//            };
//            img.src = url;
//        }

        //////////////////////////////
        $('#datatable').DataTable({
            "lengthChange": false,
            "lengthMenu": [[50, -1], [50, "All"]],
            "ordering": false
        });

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf'],
            "ordering": false,
            "searching": false
        });

        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>
