<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Glitem $glitem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Glitem'), ['action' => 'edit', $glitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Glitem'), ['action' => 'delete', $glitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $glitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Glitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Glitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Lines'), ['controller' => 'InvoiceLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Line'), ['controller' => 'InvoiceLines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="glitems view large-9 medium-8 columns content">
    <h3><?= h($glitem->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($glitem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($glitem->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($glitem->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($glitem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($glitem->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Invoice Lines') ?></h4>
        <?php if (!empty($glitem->invoice_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Seq') ?></th>
                <th scope="col"><?= __('Netamt') ?></th>
                <th scope="col"><?= __('Vatamt') ?></th>
                <th scope="col"><?= __('Totalamt') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Qty') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Warehouse Id') ?></th>
                <th scope="col"><?= __('Invoice Exchange') ?></th>
                <th scope="col"><?= __('Glitem Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($glitem->invoice_lines as $invoiceLines): ?>
            <tr>
                <td><?= h($invoiceLines->id) ?></td>
                <td><?= h($invoiceLines->invoice_id) ?></td>
                <td><?= h($invoiceLines->product_id) ?></td>
                <td><?= h($invoiceLines->seq) ?></td>
                <td><?= h($invoiceLines->netamt) ?></td>
                <td><?= h($invoiceLines->vatamt) ?></td>
                <td><?= h($invoiceLines->totalamt) ?></td>
                <td><?= h($invoiceLines->description) ?></td>
                <td><?= h($invoiceLines->created) ?></td>
                <td><?= h($invoiceLines->createdby) ?></td>
                <td><?= h($invoiceLines->modified) ?></td>
                <td><?= h($invoiceLines->modifiedby) ?></td>
                <td><?= h($invoiceLines->qty) ?></td>
                <td><?= h($invoiceLines->price) ?></td>
                <td><?= h($invoiceLines->warehouse_id) ?></td>
                <td><?= h($invoiceLines->invoice_exchange) ?></td>
                <td><?= h($invoiceLines->glitem_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceLines', 'action' => 'view', $invoiceLines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceLines', 'action' => 'edit', $invoiceLines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceLines', 'action' => 'delete', $invoiceLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceLines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
