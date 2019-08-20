<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoices index large-9 medium-8 columns content">
    <h3><?= __('Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('org_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isactive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duedate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docstatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bpartner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('netamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vatamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('totalpaid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paymentrule') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paymentterm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ispaid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('issale') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isprocessed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?= h($invoice->id) ?></td>
                <td><?= $invoice->has('org') ? $this->Html->link($invoice->org->name, ['controller' => 'Orgs', 'action' => 'view', $invoice->org->id]) : '' ?></td>
                <td><?= h($invoice->branch_id) ?></td>
                <td><?= h($invoice->isactive) ?></td>
                <td><?= h($invoice->docdate) ?></td>
                <td><?= h($invoice->duedate) ?></td>
                <td><?= h($invoice->docno) ?></td>
                <td><?= h($invoice->docstatus) ?></td>
                <td><?= $invoice->has('bpartner') ? $this->Html->link($invoice->bpartner->name, ['controller' => 'Bpartners', 'action' => 'view', $invoice->bpartner->id]) : '' ?></td>
                <td><?= $this->Number->format($invoice->netamt) ?></td>
                <td><?= $this->Number->format($invoice->vatamt) ?></td>
                <td><?= $this->Number->format($invoice->totalamt) ?></td>
                <td><?= $this->Number->format($invoice->totalpaid) ?></td>
                <td><?= h($invoice->paymentrule) ?></td>
                <td><?= h($invoice->paymentterm) ?></td>
                <td><?= h($invoice->ispaid) ?></td>
                <td><?= h($invoice->issale) ?></td>
                <td><?= h($invoice->isprocessed) ?></td>
                <td><?= h($invoice->order_id) ?></td>
                <td><?= h($invoice->created) ?></td>
                <td><?= h($invoice->createdby) ?></td>
                <td><?= h($invoice->modified) ?></td>
                <td><?= h($invoice->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?>
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
