<?= $this->element('Lib/data_table') ?>
<?= $this->Form->create('select_product', ['id' => 'frm']) ?>
<table id="datatable-buttons" class="table table-hover" >
    <thead>
        <tr>
            <th>#</th>
            <th>ประเภทสินค้า</th>
            <th>สินค้า</th>
            <th>จำนวนคงคลัง</th>
            <th>จำนวนย้าย</th>
            <th>เลือก</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($whProducts as $item): ?>
            <?php $product = $item->product; ?>
            <tr class="hand-cursor" data-id="<?= $item->product_id ?>">
                <td>1</td>
                <td><?= h($product->product_category->name) ?></td>
                <td><?= h($product->name) ?></td>
                <td style="text-align: center"><?= $this->Number->format($item->balance_amt) . ' ' . $product->unittype ?></td>
                <td><input type="number" class="form-control" name="qty" id="<?= $item->product_id ?>"/></td>
                <td><button type="submit" class="btn btn-primary">เลือก</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->Form->hidden('product_id', ['id' => 'product_id']) ?>
<?= $this->Form->hidden('qty', ['id' => 'qty']) ?>
<?= $this->Form->end() ?>
<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selected = $(this).hasClass("table-danger");
            $("#datatable-buttons > tbody tr").removeClass("table-danger");
            if (!selected) {
                var product_id = $(this).attr('data-id');
                $('#product_id').val(product_id);
                var qty = $('#' + product_id).val();
                $('#qty').val(qty);
                $(this).addClass("table-danger");

            }

        });

        $('#frm').on('submit', function () {
            var product_id = $('#product_id').val();
            var qty = $('#' + product_id).val();
            $('#qty').val(qty);
           
            if (qty === '' || qty === 0) {
                return false;
            }

            return true;
        });


    });
</script>