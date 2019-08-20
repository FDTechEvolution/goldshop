<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoldPriceLine $goldPriceLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gold Price Line'), ['action' => 'edit', $goldPriceLine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gold Price Line'), ['action' => 'delete', $goldPriceLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goldPriceLine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gold Price Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gold Price Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gold Prices'), ['controller' => 'GoldPrices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gold Price'), ['controller' => 'GoldPrices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goldPriceLines view large-9 medium-8 columns content">
    <h3><?= h($goldPriceLine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($goldPriceLine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unittype') ?></th>
            <td><?= h($goldPriceLine->unittype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gold Price') ?></th>
            <td><?= $goldPriceLine->has('gold_price') ? $this->Html->link($goldPriceLine->gold_price->id, ['controller' => 'GoldPrices', 'action' => 'view', $goldPriceLine->gold_price->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sales Price') ?></th>
            <td><?= $this->Number->format($goldPriceLine->sales_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Price') ?></th>
            <td><?= $this->Number->format($goldPriceLine->purchase_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($goldPriceLine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($goldPriceLine->modified) ?></td>
        </tr>
    </table>
</div>
