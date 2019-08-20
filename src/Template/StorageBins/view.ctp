<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageBin $storageBin
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Storage Bin'), ['action' => 'edit', $storageBin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Storage Bin'), ['action' => 'delete', $storageBin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageBin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Storage Bins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Storage Bin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storageBins view large-9 medium-8 columns content">
    <h3><?= h($storageBin->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($storageBin->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($storageBin->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isdefault') ?></th>
            <td><?= h($storageBin->isdefault) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Warehouse') ?></th>
            <td><?= $storageBin->has('warehouse') ? $this->Html->link($storageBin->warehouse->name, ['controller' => 'Warehouses', 'action' => 'view', $storageBin->warehouse->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($storageBin->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($storageBin->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($storageBin->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($storageBin->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($storageBin->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($storageBin->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($storageBin->modified) ?></td>
        </tr>
    </table>
</div>
