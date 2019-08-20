<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoodsTransaction $goodsTransaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Goods Transaction'), ['action' => 'edit', $goodsTransaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Goods Transaction'), ['action' => 'delete', $goodsTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsTransaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Goods Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Goods Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goodsTransactions view large-9 medium-8 columns content">
    <h3><?= h($goodsTransaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($goodsTransaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Docno') ?></th>
            <td><?= h($goodsTransaction->docno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($goodsTransaction->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($goodsTransaction->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($goodsTransaction->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $goodsTransaction->has('branch') ? $this->Html->link($goodsTransaction->branch->name, ['controller' => 'Branches', 'action' => 'view', $goodsTransaction->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($goodsTransaction->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($goodsTransaction->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Docdate') ?></th>
            <td><?= h($goodsTransaction->docdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($goodsTransaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($goodsTransaction->modified) ?></td>
        </tr>
    </table>
</div>
