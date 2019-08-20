<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderLine[]|\Cake\Collection\CollectionInterface $orderLines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Line'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['controller' => 'SerialNumbers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Serial Number'), ['controller' => 'SerialNumbers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderLines index large-9 medium-8 columns content">
    <h3><?= __('Order Lines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serial_number_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('netamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vatamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderLines as $orderLine): ?>
            <tr>
                <td><?= h($orderLine->id) ?></td>
                <td><?= $orderLine->has('order') ? $this->Html->link($orderLine->order->id, ['controller' => 'Orders', 'action' => 'view', $orderLine->order->id]) : '' ?></td>
                <td><?= $orderLine->has('product') ? $this->Html->link($orderLine->product->name, ['controller' => 'Products', 'action' => 'view', $orderLine->product->id]) : '' ?></td>
                <td><?= $orderLine->has('serial_number') ? $this->Html->link($orderLine->serial_number->id, ['controller' => 'SerialNumbers', 'action' => 'view', $orderLine->serial_number->id]) : '' ?></td>
                <td><?= $this->Number->format($orderLine->seq) ?></td>
                <td><?= $this->Number->format($orderLine->netamt) ?></td>
                <td><?= $this->Number->format($orderLine->vatamt) ?></td>
                <td><?= $this->Number->format($orderLine->totalamt) ?></td>
                <td><?= h($orderLine->created) ?></td>
                <td><?= h($orderLine->createdby) ?></td>
                <td><?= h($orderLine->modified) ?></td>
                <td><?= h($orderLine->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderLine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderLine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->id)]) ?>
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
