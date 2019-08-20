<?= $this->element('Lib/data_table') ?>
<table class="table" id="datatable-buttons">
    <thead>
        <tr>
            <th>สินค้า</th>
            <th>รหัสสินค้า</th>
            <th>ประเภทสินค้า</th>
            <th width="160px" class="text-right">รวมน้ำหนัก(กรัม)</th>
            <th width="100px" class="text-right">จำนวนคงเหลือ</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($whProducts as $item): ?>
            <?php $product = $item->product; ?>
            <tr>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->code == '_temp' ? '' : $product->code) ?></td>
                <td><?= h($product->product_category->name) ?></td>
                <?php 
                   $weightAmt = 0;
                   if($product->has('weight')){
                       $weightAmt = $item->balance_amt*$product->weight->value;
                   }else{
                       $weightAmt = $item->balance_amt*$product->manual_weight;
                   }
                ?>
                <td class="text-right"><?=$this->Number->format($weightAmt) ?></td>
                <td class="text-right"><?= $this->Number->format($item->balance_amt) . ' ' . $product->unittype ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
