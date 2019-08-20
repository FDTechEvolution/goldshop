
<h4 class="title-header">รายการสินค้า</h4>
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
                        <td><?= $goodsLine->has('product') ? $this->Html->link($goodsLine->product->name, ['controller' => 'Products', 'action' => 'view', $goodsLine->product->id]) : '' ?></td>
                        <td><?= h($goodsLine->description) ?></td>
                        <td><?= $this->Number->format($goodsLine->qty) ?></td>
                        <td><?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $goodsLine->id], ['confirm' => __('ต้องการลบรายการสินค้านี้?'), 'escape' => false]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


