<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายการสินค้า</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'products', 'action' => 'add'], ['escape' => false]) ?>
                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#modal-product-create">สร้างสินค้าอัตโนมัติ</button>
            </div>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Form->create('product',['type'=>'GET']) ?>
                <div class="form-row">
                    <div class="col-md-3 form-group">
                       
                        <?= $this->Form->select('product_category_id', $productCats, ['class' => 'form-control', 'id' => '_product_category_id', 'label' => false]) ?>
                    </div>
                    <div class="col-md-5 form-group" id="box_design">
                        
                        <?= $this->Form->select('design_id', [], ['class' => 'form-control', 'id' => '_design_id', 'label' => false]) ?>
                    </div>
                    <div class="col-md-2 form-group" id="box_weight">
                       
                        <?= $this->Form->select('weight_id', $weights, ['empty'=>'ทุกน้ำหนัก','class' => 'form-control', 'id' => '_weight_id', 'label' => false]) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <button class="btn btn-primary" type="submit">GO</button>
                    </div>
                </div>


                <?= $this->Form->end() ?>
            </div>

            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>ชื่อสินค้า</th>
                        <th>รหัส</th>
                        <th>น้ำหนัก</th>
                        <th>%</th>
                        <th>ค่ากำเหน็จเพิ่มเติม</th>

                        <th>เพิ่มวันที่</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($products as $product): ?>
                        <?php
                        $image = 'noimage.png';
                        if ($product['image'] != null) {
                            $image = $product['image']['path'];
                        }
                        ?>
                        <tr data-url="<?= SITE_URL . 'products/edit/' . h($product['id']) ?>" class="hand-cursor">
                            <td><?= $this->Html->image($image, ['width' => '50px']) ?></td>
                            <td><?= h($product['name']) ?></td>
                            <td><?= h($product['code']) ?></td>
                            <td><?= h(isset($product['weight']['name']) ? $product['weight']['name'] : '-') ?></td>
                            <td><?= h($product['percent']) ?></td>
                            <td class="text-right"><?= $this->Number->format($product['cost']) ?></td>

                            <td class="column-date"><?= h($product->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modal-product-create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <?= $this->Form->create('create_product', ['url' => ['controller' => 'products', 'action' => 'auto-generate']]) ?>
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label>ประเภท</label>
                        <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => 'ประเภท']) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>ลาย</label>
                        <?= $this->Form->select('design_id', [], ['empty' => 'ทุกลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => 'ลาย']) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>%</label>
                        <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => '%']) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>น้ำหนัก</label>
                        <?= $this->Form->select('weight_id', $weights, ['class' => 'form-control form-control-lg', 'id' => 'weight_id', 'label' => 'น้ำหนัก']) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>ขนาด</label>
                        <?= $this->Form->select('size_id', [], ['class' => 'form-control form-control-lg', 'id' => 'size_id', 'label' => 'ขนาด']) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <?= $this->Form->control('cost', ['type' => 'number', 'class' => 'form-control form-control-lg', 'id' => 'cost', 'label' => 'ค่ากำน็จพิเศษ', 'value' => 0]) ?>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-success" type="submit">สร้างสินค้า</button>

                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<script>

    $("#datatable-buttons > tbody tr").click(function () {
        var selectedUrl = $(this).attr('data-url');
        if (selectedUrl !== 'undefined' && selectedUrl !== undefined) {
            console.log(selectedUrl);
            document.location = selectedUrl;
        }
    });
</script>
<script>
    $(document).ready(function () {
        $.get(SITE_URL + 'service-product-categories/get-category/').done(function (res) {
            var jsonData = JSON.parse(res);
            console.log(jsonData);
            $.each(jsonData, function (key, value) {
                //console.log(value);
                $('#product_category_id')
                        .append($("<option></option>")
                                .attr("value", value.product_cat.value)
                                .attr("data-id", value.product_cat.value)
                                .text(value.product_cat.text));
            });
            var product_category_id = $('#product_category_id').val();

            $.each(jsonData[product_category_id]['designs'], function (key, value) {

                $('#design_id')
                        .append($("<option value='all'>ทุกลาย</option>")
                                .attr("value", value.value)
                                .attr("data-id", value.value)
                                .text(value.text));

            });
            $.each(jsonData[product_category_id]['sizes'], function (key, value) {

                $('#size_id')
                        .append($("<option value='all'>ทุกขนาด</option>")
                                .attr("value", value.value)
                                .attr("data-id", value.value)
                                .text(value.text));

            });

            $('#product_category_id').on('change', function () {
                $('#design_id').empty();
                $('#size_id').empty();
                $('#design_id').append($("<option value='all'></option>").text('ทุกลาย'));
                $('#size_id').append($("<option value='all'></option>").text('ทุกขนาด'));
                var dataid = $("#product_category_id option:selected").attr('data-id');
                $.each(jsonData[dataid]['designs'], function (key, value) {

                    $('#design_id')
                            .append($("<option></option>")
                                    .attr("value", value.value)
                                    .attr("data-id", value.value)
                                    .text(value.text));

                });
                $.each(jsonData[dataid]['sizes'], function (key, value) {

                    $('#size_id')
                            .append($("<option></option>")
                                    .attr("value", value.value)
                                    .attr("data-id", value.value)
                                    .text(value.text));

                });
            });
        });


        $.get(SITE_URL + 'service-product-categories/get-category/').done(function (res) {
            var jsonData = JSON.parse(res);
            console.log(jsonData);
            $.each(jsonData, function (key, value) {
                //console.log(value);
                $('#_product_category_id')
                        .append($("<option></option>")
                                .attr("value", value.product_cat.value)
                                .attr("data-id", value.product_cat.value)
                                .text(value.product_cat.text));
            });
            var product_category_id = $('#_product_category_id').val();

            $.each(jsonData[product_category_id]['designs'], function (key, value) {

                $('#_design_id')
                        .append($("<option value='all'>ทุกลาย</option>")
                                .attr("value", value.value)
                                .attr("data-id", value.value)
                                .text(value.text));

            });
            $.each(jsonData[product_category_id]['sizes'], function (key, value) {

                $('#_size_id')
                        .append($("<option value='all'>ทุกขนาด</option>")
                                .attr("value", value.value)
                                .attr("data-id", value.value)
                                .text(value.text));

            });

            $('#_product_category_id').on('change', function () {
                $('#_design_id').empty();
                $('#_size_id').empty();
                $('#_design_id').append($("<option value='all'></option>").text('ทุกลาย'));
                $('#_size_id').append($("<option value='all'></option>").text('ทุกขนาด'));
                var dataid = $("#_product_category_id option:selected").attr('data-id');
                $.each(jsonData[dataid]['designs'], function (key, value) {

                    $('#_design_id')
                            .append($("<option></option>")
                                    .attr("value", value.value)
                                    .attr("data-id", value.value)
                                    .text(value.text));

                });
                $.each(jsonData[dataid]['sizes'], function (key, value) {

                    $('#_size_id')
                            .append($("<option></option>")
                                    .attr("value", value.value)
                                    .attr("data-id", value.value)
                                    .text(value.text));

                });
            });
        });

    });
</script>