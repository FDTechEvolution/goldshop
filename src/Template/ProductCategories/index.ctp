
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

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">ประเภทสินค้า</h3>

            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'product-categories', 'action' => 'add'], ['escape' => false]) ?> 
            </div>

            <div class="row ">
                <div class="col-md-12">
                    <table class="table table-hover" cellspacing="0" width="100%" id="datatable-buttons">
                        <thead>
                            <tr role="row">

                                <th></th>
                                <th>ประเภทสินค้า</th>
                                <th>ชื่อย่อ</th>
                                <th>รหัส</th>
                                <th>รูปแบบสินค้า</th>
                                <th>สต๊อกสินค้า</th>
                                <th>สถานะ</th>
                                <th>ใช้เป็นค่าเริ่มต้น</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productCategories as $productCategory): ?>
                                <tr class="hand-cursor" data-id="<?= $productCategory->id ?>">
                                    <td class="actions column-tool-bt">

                                        <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $productCategory->id], ['escape' => false]) ?>
                                        <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->name), 'escape' => false]) ?>
                                    </td>
                                    <td><?= h($productCategory->name) ?></td>
                                    <td><?= h($productCategory->label)?></td>
                                    <td><?= h($productCategory->code) ?></td>
                                    <td><?= is_null($productCategory->type)?'':$productType[$productCategory->type]['title'] ?></td>
                                    <td><?= $productCategory->isstock == 'Y' ? YES : NO ?></td>
                                    <td><?= $productCategory->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                                    <td><?= $productCategory->isdefault == 'Y' ? YES : NO ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#design" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                ลาย
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#size" data-toggle="tab" aria-expanded="false" class="nav-link">
                                ขนาด
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#product" data-toggle="tab" aria-expanded="false" class="nav-link">
                                รายการสินค้า
                            </a>
                        </li>
                      

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="design" aria-expanded="true">
                            <iframe id="design_iframe" src="<?= SITE_URL . 'designs' ?>" frameborder="0" scrolling="yes" width="100%" height="600px"> </iframe>
                        </div>
                        <div class="tab-pane fade" id="size" aria-expanded="false">
                            <iframe id="size_iframe" src="<?= SITE_URL . 'sizes' ?>" frameborder="0" scrolling="yes" width="100%" height="600px"> </iframe>
                        </div>
                        <div class="tab-pane fade" id="product" aria-expanded="false">
                            <iframe id="product_iframe" src="<?= SITE_URL . 'product-categories/product' ?>" frameborder="0" scrolling="yes" width="100%" height="600px"> </iframe>
                        </div>
                        

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    var design_url = SITE_URL + 'designs/index/';
    var size_url = SITE_URL + 'sizes/index/';
    var weight_url = SITE_URL + 'weights/index/';
    var product_url = SITE_URL + 'product-categories/product/';

    $(document).ready(function () {

        $("#datatable-buttons").delegate('tr', 'click', function () {
            var id = $(this).attr("data-id");
            //alert(id);
            $('#design_iframe').attr('src', design_url + id);
            $('#size_iframe').attr('src', size_url + id);
            $('#product_iframe').attr('src', product_url + id);
        });
    });

    $("#datatable-buttons > tbody tr").click(function () {
        var selected = $(this).hasClass("table-danger");
        $("#datatable-buttons > tbody tr").removeClass("table-danger");
        if (!selected) {
            //console.log($(this).attr('id'));
            $(this).addClass("table-danger");
           
        }

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            "lengthChange": false,
            "lengthMenu": [[5, -1], [5, "All"]],
            "ordering": false
        });

        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

</script>