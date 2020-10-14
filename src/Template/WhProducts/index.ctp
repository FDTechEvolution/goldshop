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
           
            <tr>
                <td><?= h($item['name']) ?></td>
                <td><?= h($item['code'] == '_temp' ? '' : $item['code']) ?></td>
                <td><?= h($item['cat_name']) ?></td>
                <?php 
                   $weightAmt = 0;
                   if($item['weight_value']=='' || is_null($item['weight_value'])){
                       $weightAmt = $item['manual_weight'];
                   }else{
                       $weightAmt = $item['weight_value'];
                   }
                ?>
                <td class="text-right"><?=$this->Number->format($weightAmt) ?></td>
                <td class="text-right"><?= $this->Number->format($item['balance_amt']) . ' ' . $item['unittype'] ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
