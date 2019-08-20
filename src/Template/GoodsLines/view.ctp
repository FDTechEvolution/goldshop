<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoodsLine $goodsLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Goods Line'), ['action' => 'edit', $goodsLine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Goods Line'), ['action' => 'delete', $goodsLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsLine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Goods Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Goods Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goodsLines view large-9 medium-8 columns content">
    <h3><?= h($goodsLine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($goodsLine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $goodsLine->has('product') ? $this->Html->link($goodsLine->product->name, ['controller' => 'Products', 'action' => 'view', $goodsLine->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($goodsLine->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($goodsLine->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($goodsLine->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($goodsLine->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qty') ?></th>
            <td><?= $this->Number->format($goodsLine->qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($goodsLine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($goodsLine->modified) ?></td>
        </tr>
    </table>
</div>
