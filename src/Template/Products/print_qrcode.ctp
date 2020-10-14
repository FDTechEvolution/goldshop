<?= $this->Html->css('assets/libs/multiselect/multi-select.css') ?>
<?= $this->Html->css('assets/libs/select2/select2.min.css') ?>
<?= $this->Html->css('assets/libs/bootstrap-select/bootstrap-select.min.css') ?>

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

<?php if (isset($products)) { ?>
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="col-12">
                    <table class="table table-hover" id="datatable-buttons">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>ชื่อ</th>
                                <th>%</th>

                                <th></th>
                                <th>ต้นทุน</th>
                                <th>ราคาขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <?php for ($i = 0; $i < $product['qty']; $i++) { ?>
                                    <tr>
                                        <td><?= $product->code ?></td>
                                        <td><?= sprintf('%s/%s', $product['product_category']['label'], $product['design']['label']) ?></td>
                                        <td><?= $product->percent ?>%</td>

                                        <?php
                                        $weight_text = '';
                                        if ($product['manual_weight'] != 0) {
                                            $weight_text = $product['manual_weight'] . 'g';
                                        } else {
                                            if (isset($product['weight']['sd_weight']['name'])) {
                                                $weight_text = $product['weight']['sd_weight']['name'];
                                            } else {
                                                $weight_text = $product['weight']['name'];
                                            }
                                        }
                                        ?>
                                        <td><?= str_replace(' ', '', sprintf('%s/%s', $product['size']['name'], $weight_text)) ?></td>  
                                        <td><?= $product['cost2'] ?></td>
                                        <td><?= number_format($product['actual_price']) ?></td>
                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['csv'],
                "lengthMenu": [[6, -1], [50, "All"]]
            });

            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

    </script>
<?php } else { ?>
    <div class="row">
        <div class="col-12">
            <?= $this->Form->create() ?>
            <div class="card-box table-responsive">

                <div class="col-12">
                    <h3 class="text-primary prompt-500">เลือกสินค้าที่ต้องการปริ้น</h3>
                    <table class="table table-hover" id="datatable-product">
                        <thead>
                            <tr>

                                <th>ประเภท</th>
                                <th>%</th>
                                <th>ลาย </th>
                                <th>ขนาด</th>
                                <th>น้ำหนัก</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>ต้นทุน</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php foreach ($productCategories as $productCat): ?>

                                <?php foreach ($productCat['products'] as $product): ?>
                                    <tr>

                                        <td><?= h($productCat['name']) ?></td>
                                        <td><?= number_format((float) $product['percent'], 2, '.', '') ?></td>
                                        <td><?= h($product['designname']) ?></td>
                                        <td><?= h($product['sizename']) ?></td>
                                        <td><?= h($product['weightname']) ?>/<?= $product['sdweightname'] ?></td>
                                        <td><?= h($product['name']) ?></td>
                                        <td><?= number_format($product['actual_price']) ?></td>
                                        <td><?= ($product['cost2']) ?></td>
                                        <td>
                                            <input type="hidden" id="<?=$product['id']?>" value="<?= preg_replace("/\"/","'",$product['name']) ?>" />
                                            <button class="btn btn-secondary" type="button" onclick="selectProduct('<?= $product['id'] ?>');">เลือก</button>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <hr/>
                <div class="col-12">
                    <h3 class="text-primary prompt-500">รายการที่เลือกปริ้น</h3>
                    <div class="row" id="box-product">

                    </div>
                </div>
                <div class="col-12 button-list text-right">
                    <button class="btn btn-success btn-lg" type="submit" disabled="disabled" id="bt-next"><i class="fas fa-angle-double-right"></i> ต่อไป</button>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
<?php } ?>
<?= $this->Html->script('/css/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') ?>
<?= $this->Html->script('/css/assets/libs/switchery/switchery.min.js') ?>
<?= $this->Html->script('/css/assets/libs/multiselect/jquery.multi-select.js') ?>
<?= $this->Html->script('/css/assets/libs/jquery-quicksearch/jquery.quicksearch.min.js') ?>
<?= $this->Html->script('/css/assets/libs/select2/select2.min.js') ?>
<?= $this->Html->script('/css/assets/libs/bootstrap-select/bootstrap-select.min.js') ?>
<?= $this->Html->script('/css/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') ?>


<?= $this->Html->script('/css/assets/js/pages/form-advanced.init.js') ?>
<script>
    function selectProduct(id) {
        var name = $('#'+id).val();
        name = name.replace('"','');
        var html = '<div class="col-10 mb-md-2"><p>' + name + '</p><input type="hidden" class="form-control" name="product_id[]" value="' + id + '" id=""/></div>';
        html += '<div class="col-2 mb-md-2"><input type="number" class="form-control" name="qty[]" value="1" id=""/>' + '</div>';

        $('#box-product').append(html);
        
        $('#bt-next').removeAttr("disabled");
    }
    $(document).ready(function () {
        var table = $('#datatable-product').DataTable({
            lengthChange: false,
            buttons: ['csv'],
            "lengthMenu": [[5, -1], [50, "All"]]
        });
        table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        table.columns().flatten().each(function (colIdx) {
            // Create the select list and search operation
            console.log(table.column(colIdx));
            var select = $('<select class="form-control" />')
                    .appendTo(table.column(colIdx).header())
                    .on('change', function () {
                        table
                                .column(colIdx)
                                .search($(this).val())
                                .draw();
                    });

            // Get the search data for the first column and add to the select list
            table
                    .column(colIdx)
                    .cache('search')
                    .sort()
                    .unique()
                    .each(function (d) {
                        select.append($('<option value="' + d + '">' + d + '</option>'));
                    });
        });



    });
</script>