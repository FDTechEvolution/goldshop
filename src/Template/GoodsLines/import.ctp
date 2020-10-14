<?= $this->Html->script('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') ?>
<!-- CSS file -->
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.css') ?>


<?= $this->Form->create($goodsLine) ?>
<div class="form-group row">
    <div class="col-12">
        <p class="text-primary">หรือสามารถพิมชื่อตาม Label บนสินค้า เพื่อเพิ่มรายการ</p>
    </div>

    <div class="col-md-8">
        <?= $this->Form->control('product_name', ['class' => 'form-control form-control-lg', 'id' => 'product_name', 'label' => false, 'placeholder' => 'ระบุชื่อสินค้า']) ?>
        <?= $this->Form->hidden('product_id', ['id' => 'product_id']) ?>
    </div>
    <div class="col-md-2">
        <?= $this->Form->control('qty', ['class' => 'form-control form-control-lg', 'id' => 'qty', 'label' => false, 'placeholder' => 'จำนวน']) ?>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block btn-lg waves-effect waves-light">เพิ่ม</button>
    </div>

</div>
<?= $this->Form->end() ?>
<div class="col-12">
    <h4 class="f-kanit-400">รายการสินค้า</h4>
    <div class="table-responsive" style="height: 400px;">
        <table class="table">
            <thead>
                <tr><th>#</th>
                    <th>สินค้า</th>
                    <th>ใบสั่งซื้อ/สั่งทำ</th>

                    <th class="text-right">จำนวน</th>
                    <th class="text-right">น้ำหนัก</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php $totalQty = 0; ?>
                <?php $weightAmt = 0; ?>
                <?php foreach ($goodsLines as $goodsLine): ?>
                    <?php $weight = $goodsLine->product->weight == null ? 0 : $goodsLine->product->weight->value * $goodsLine->qty; ?>
                    <tr>
                        <td><?= h($goodsLine->seq) ?></td>
                        <td><?= $goodsLine->has('product') ? $goodsLine->product->name : '' ?></td>
                        <td>
                            <div class="form-group">
                                <?= $this->Form->select('order_id', $orders, ['empty' => '--', 'class' => 'form-control', 'id' => 'order_id', 'label' => false, 'data-id' => $goodsLine->id, 'data-action' => 'update-order','value'=>$goodsLine->order_id])
                                ?>
                            </div>
                        </td>
                        <td class="text-right"><?= $this->Number->format($goodsLine->qty) ?></td>
                        <td class="text-right"><?= $goodsLine->product->weight == null ? '-' : number_format($weight, 2) ?></td>
                        <td class="text-right"><?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $goodsLine->id,], ['confirm' => __('ต้องการลบรายการสินค้านี้?'), 'escape' => false]) ?></td>
                    </tr>
                    <?php $totalQty = $totalQty + $goodsLine->qty; ?>
                    <?php $weightAmt = $weightAmt + $weight; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><h4>รวม</h4></td>
                    <td class="text-right"><h4><?= number_format($totalQty) ?></h4></td>
                    <td class="text-right"><h4><?= number_format($weightAmt, 2) ?></h4></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        $('[data-action="update-order"]').on('change', function () {
            $('#page-load').show();
            let goods_line_id = $(this).attr('data-id');
            let order_id = $(this).val();
            $.get(SITE_URL+'goods-lines/saveGoodsLine', {'goods_line_id':goods_line_id,'order_id':order_id})
                    .done(function (data) {
                        $('#page-load').hide();
                    });
        });
        var options = {
            data: <?= $productJsonList ?>,
            getValue: "label",
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
                    //console.log(value);
                },
                maxNumberOfElements: 40

            }
            //theme: "square"
        };

        $("#product_name").easyAutocomplete(options);

    });

</script>