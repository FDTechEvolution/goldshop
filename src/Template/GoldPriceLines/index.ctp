<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoldPriceLine[]|\Cake\Collection\CollectionInterface $goldPriceLines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gold Price Line'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gold Prices'), ['controller' => 'GoldPrices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gold Price'), ['controller' => 'GoldPrices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goldPriceLines index large-9 medium-8 columns content">
    <h3><?= __('Gold Price Lines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unittype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sales_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchase_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gold_price_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goldPriceLines as $goldPriceLine): ?>
            <tr>
                <td><?= h($goldPriceLine->id) ?></td>
                <td><?= h($goldPriceLine->unittype) ?></td>
                <td><?= $this->Number->format($goldPriceLine->sales_price) ?></td>
                <td><?= $this->Number->format($goldPriceLine->purchase_price) ?></td>
                <td><?= h($goldPriceLine->created) ?></td>
                <td><?= h($goldPriceLine->modified) ?></td>
                <td><?= $goldPriceLine->has('gold_price') ? $this->Html->link($goldPriceLine->gold_price->id, ['controller' => 'GoldPrices', 'action' => 'view', $goldPriceLine->gold_price->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $goldPriceLine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $goldPriceLine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $goldPriceLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goldPriceLine->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
