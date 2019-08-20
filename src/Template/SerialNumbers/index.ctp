<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SerialNumber[]|\Cake\Collection\CollectionInterface $serialNumbers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Serial Number'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Wh Products'), ['controller' => 'WhProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wh Product'), ['controller' => 'WhProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serialNumbers index large-9 medium-8 columns content">
    <h3><?= __('Serial Numbers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wh_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isprinted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('printeddate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('issales') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isactive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serialNumbers as $serialNumber): ?>
            <tr>
                <td><?= h($serialNumber->id) ?></td>
                <td><?= $serialNumber->has('wh_product') ? $this->Html->link($serialNumber->wh_product->id, ['controller' => 'WhProducts', 'action' => 'view', $serialNumber->wh_product->id]) : '' ?></td>
                <td><?= h($serialNumber->code) ?></td>
                <td><?= h($serialNumber->isprinted) ?></td>
                <td><?= h($serialNumber->printeddate) ?></td>
                <td><?= h($serialNumber->issales) ?></td>
                <td><?= h($serialNumber->isactive) ?></td>
                <td><?= h($serialNumber->created) ?></td>
                <td><?= h($serialNumber->createdby) ?></td>
                <td><?= h($serialNumber->modified) ?></td>
                <td><?= h($serialNumber->modifiedby) ?></td>
                <td><?= h($serialNumber->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $serialNumber->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serialNumber->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serialNumber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumber->id)]) ?>
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
