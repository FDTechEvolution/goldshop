<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WhProduct $whProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wh Product'), ['action' => 'edit', $whProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wh Product'), ['action' => 'delete', $whProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $whProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Wh Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wh Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['controller' => 'SerialNumbers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Serial Number'), ['controller' => 'SerialNumbers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="whProducts view large-9 medium-8 columns content">
    <h3><?= h($whProduct->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($whProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Warehouse') ?></th>
            <td><?= $whProduct->has('warehouse') ? $this->Html->link($whProduct->warehouse->name, ['controller' => 'Warehouses', 'action' => 'view', $whProduct->warehouse->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $whProduct->has('product') ? $this->Html->link($whProduct->product->name, ['controller' => 'Products', 'action' => 'view', $whProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($whProduct->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($whProduct->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($whProduct->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance Amt') ?></th>
            <td><?= $this->Number->format($whProduct->balance_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($whProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($whProduct->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Serial Numbers') ?></h4>
        <?php if (!empty($whProduct->serial_numbers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Wh Product Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Isprinted') ?></th>
                <th scope="col"><?= __('Printeddate') ?></th>
                <th scope="col"><?= __('Issales') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($whProduct->serial_numbers as $serialNumbers): ?>
            <tr>
                <td><?= h($serialNumbers->id) ?></td>
                <td><?= h($serialNumbers->wh_product_id) ?></td>
                <td><?= h($serialNumbers->code) ?></td>
                <td><?= h($serialNumbers->isprinted) ?></td>
                <td><?= h($serialNumbers->printeddate) ?></td>
                <td><?= h($serialNumbers->issales) ?></td>
                <td><?= h($serialNumbers->isactive) ?></td>
                <td><?= h($serialNumbers->created) ?></td>
                <td><?= h($serialNumbers->createdby) ?></td>
                <td><?= h($serialNumbers->modified) ?></td>
                <td><?= h($serialNumbers->modifiedby) ?></td>
                <td><?= h($serialNumbers->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SerialNumbers', 'action' => 'view', $serialNumbers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SerialNumbers', 'action' => 'edit', $serialNumbers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SerialNumbers', 'action' => 'delete', $serialNumbers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumbers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
