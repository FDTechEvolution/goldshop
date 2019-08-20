<?= $this->Html->script('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') ?>
<!-- CSS file -->
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.css') ?>

<h4 class="title-header">รายการสินค้า</h4>
<?= $this->Form->create($goodsLine) ?>
<div class="form-group row">

    <div class="col-md-8">
        <?= $this->Form->control('product_name', ['class' => 'form-control form-control-lg', 'id' => 'product_name', 'label' => false, 'placeholder' => 'ระบุชื่อสินค้า']) ?>
        <?= $this->Form->hidden('product_id', ['id' => 'product_id']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Form->control('qty', ['class' => 'form-control form-control-lg', 'id' => 'qty', 'label' => false, 'placeholder' => 'จำนวน']) ?>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">เพิ่ม</button>
    </div>

</div>
<?= $this->Form->end() ?>
<div class="col-12">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr><th>#</th>
                    <th>สินค้า</th>
                    <th>รายละเอียด</th>
                    <th>จำนวน</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($goodsLines as $goodsLine): ?>
                    <tr>
                        <td><?= h($goodsLine->seq) ?></td>
                        <td><?= $goodsLine->has('product') ? $goodsLine->product->name : '' ?></td>
                        <td><?= h($goodsLine->description) ?></td>
                        <td><?= $this->Number->format($goodsLine->qty) ?></td>
                        <td><?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $goodsLine->id], ['confirm' => __('ต้องการลบรายการสินค้านี้?'), 'escape' => false])?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        var options = {
            data: <?= $productJsonList ?>,
            getValue: "name",
            placeholder: "กรอกรายการที่ต้องการ",
            highlightPhrase: true,
            list: {
                match: {
                    enabled: true
                },
                sort: {
                    enabled: true
                },
                onChooseEvent: function () {
                    var value = $("#product_name").getSelectedItemData().id;
                    $("#product_id").val(value);
                    console.log(value);
                }

            }
            //theme: "square"
        };

        $("#product_name").easyAutocomplete(options);

    });

</script>