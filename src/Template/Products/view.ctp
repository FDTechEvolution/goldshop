
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($product->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unittype') ?></th>
            <td><?= h($product->unittype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($product->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isstock') ?></th>
            <td><?= h($product->isstock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($product->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($product->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($product->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Org') ?></th>
            <td><?= $product->has('org') ? $this->Html->link($product->org->name, ['controller' => 'Orgs', 'action' => 'view', $product->org->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Standard Price') ?></th>
            <td><?= $this->Number->format($product->standard_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actual Price') ?></th>
            <td><?= $this->Number->format($product->actual_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Midified') ?></th>
            <td><?= h($product->midified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Images') ?></h4>
        <?php if (!empty($product->product_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Seq') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_images as $productImages): ?>
            <tr>
                <td><?= h($productImages->id) ?></td>
                <td><?= h($productImages->product_id) ?></td>
                <td><?= h($productImages->image_id) ?></td>
                <td><?= h($productImages->seq) ?></td>
                <td><?= h($productImages->created) ?></td>
                <td><?= h($productImages->createdby) ?></td>
                <td><?= h($productImages->description) ?></td>
                <td><?= h($productImages->modified) ?></td>
                <td><?= h($productImages->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductImages', 'action' => 'view', $productImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductImages', 'action' => 'edit', $productImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductImages', 'action' => 'delete', $productImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Wh Products') ?></h4>
        <?php if (!empty($product->wh_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Warehouse Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Balance Amt') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->wh_products as $whProducts): ?>
            <tr>
                <td><?= h($whProducts->id) ?></td>
                <td><?= h($whProducts->warehouse_id) ?></td>
                <td><?= h($whProducts->product_id) ?></td>
                <td><?= h($whProducts->balance_amt) ?></td>
                <td><?= h($whProducts->created) ?></td>
                <td><?= h($whProducts->createdby) ?></td>
                <td><?= h($whProducts->modified) ?></td>
                <td><?= h($whProducts->modifiedby) ?></td>
                <td><?= h($whProducts->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WhProducts', 'action' => 'view', $whProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WhProducts', 'action' => 'edit', $whProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WhProducts', 'action' => 'delete', $whProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $whProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
