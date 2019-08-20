<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderLine $orderLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Line'), ['action' => 'edit', $orderLine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Line'), ['action' => 'delete', $orderLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['controller' => 'SerialNumbers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Serial Number'), ['controller' => 'SerialNumbers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderLines view large-9 medium-8 columns content">
    <h3><?= h($orderLine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($orderLine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderLine->has('order') ? $this->Html->link($orderLine->order->id, ['controller' => 'Orders', 'action' => 'view', $orderLine->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $orderLine->has('product') ? $this->Html->link($orderLine->product->name, ['controller' => 'Products', 'action' => 'view', $orderLine->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serial Number') ?></th>
            <td><?= $orderLine->has('serial_number') ? $this->Html->link($orderLine->serial_number->id, ['controller' => 'SerialNumbers', 'action' => 'view', $orderLine->serial_number->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($orderLine->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($orderLine->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($orderLine->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Netamt') ?></th>
            <td><?= $this->Number->format($orderLine->netamt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vatamt') ?></th>
            <td><?= $this->Number->format($orderLine->vatamt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Totalamt') ?></th>
            <td><?= $this->Number->format($orderLine->totalamt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderLine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orderLine->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($orderLine->description)); ?>
    </div>
</div>
