<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoices view large-9 medium-8 columns content">
    <h3><?= h($invoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($invoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Org') ?></th>
            <td><?= $invoice->has('org') ? $this->Html->link($invoice->org->name, ['controller' => 'Orgs', 'action' => 'view', $invoice->org->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch Id') ?></th>
            <td><?= h($invoice->branch_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($invoice->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Docno') ?></th>
            <td><?= h($invoice->docno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Docstatus') ?></th>
            <td><?= h($invoice->docstatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bpartner') ?></th>
            <td><?= $invoice->has('bpartner') ? $this->Html->link($invoice->bpartner->name, ['controller' => 'Bpartners', 'action' => 'view', $invoice->bpartner->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paymentrule') ?></th>
            <td><?= h($invoice->paymentrule) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Paymentterm') ?></th>
            <td><?= h($invoice->paymentterm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ispaid') ?></th>
            <td><?= h($invoice->ispaid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Issale') ?></th>
            <td><?= h($invoice->issale) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isprocessed') ?></th>
            <td><?= h($invoice->isprocessed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Id') ?></th>
            <td><?= h($invoice->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($invoice->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($invoice->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Netamt') ?></th>
            <td><?= $this->Number->format($invoice->netamt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vatamt') ?></th>
            <td><?= $this->Number->format($invoice->vatamt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Totalamt') ?></th>
            <td><?= $this->Number->format($invoice->totalamt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Totalpaid') ?></th>
            <td><?= $this->Number->format($invoice->totalpaid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Docdate') ?></th>
            <td><?= h($invoice->docdate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duedate') ?></th>
            <td><?= h($invoice->duedate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($invoice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($invoice->modified) ?></td>
        </tr>
    </table>
</div>
