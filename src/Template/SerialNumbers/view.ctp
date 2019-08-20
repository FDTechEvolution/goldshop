<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SerialNumber $serialNumber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Serial Number'), ['action' => 'edit', $serialNumber->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Serial Number'), ['action' => 'delete', $serialNumber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumber->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Serial Number'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Wh Products'), ['controller' => 'WhProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wh Product'), ['controller' => 'WhProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serialNumbers view large-9 medium-8 columns content">
    <h3><?= h($serialNumber->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($serialNumber->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wh Product') ?></th>
            <td><?= $serialNumber->has('wh_product') ? $this->Html->link($serialNumber->wh_product->id, ['controller' => 'WhProducts', 'action' => 'view', $serialNumber->wh_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($serialNumber->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isprinted') ?></th>
            <td><?= h($serialNumber->isprinted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Issales') ?></th>
            <td><?= h($serialNumber->issales) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($serialNumber->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($serialNumber->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($serialNumber->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($serialNumber->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Printeddate') ?></th>
            <td><?= h($serialNumber->printeddate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($serialNumber->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($serialNumber->modified) ?></td>
        </tr>
    </table>
</div>
