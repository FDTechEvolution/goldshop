<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SavingTransaction[]|\Cake\Collection\CollectionInterface $savingTransactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Saving Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="savingTransactions index large-9 medium-8 columns content">
    <h3><?= __('Saving Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('saving_accounts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('org_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isdeposit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isactive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docstatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($savingTransactions as $savingTransaction): ?>
            <tr>
                <td><?= h($savingTransaction->id) ?></td>
                <td><?= h($savingTransaction->saving_accounts) ?></td>
                <td><?= h($savingTransaction->docdate) ?></td>
                <td><?= h($savingTransaction->docno) ?></td>
                <td><?= $savingTransaction->has('org') ? $this->Html->link($savingTransaction->org->name, ['controller' => 'Orgs', 'action' => 'view', $savingTransaction->org->id]) : '' ?></td>
                <td><?= $savingTransaction->has('branch') ? $this->Html->link($savingTransaction->branch->name, ['controller' => 'Branches', 'action' => 'view', $savingTransaction->branch->id]) : '' ?></td>
                <td><?= $this->Number->format($savingTransaction->amount) ?></td>
                <td><?= $savingTransaction->has('bank_account') ? $this->Html->link($savingTransaction->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $savingTransaction->bank_account->id]) : '' ?></td>
                <td><?= h($savingTransaction->isdeposit) ?></td>
                <td><?= h($savingTransaction->isactive) ?></td>
                <td><?= h($savingTransaction->docstatus) ?></td>
                <td><?= h($savingTransaction->description) ?></td>
                <td><?= h($savingTransaction->created) ?></td>
                <td><?= h($savingTransaction->createdby) ?></td>
                <td><?= h($savingTransaction->modified) ?></td>
                <td><?= h($savingTransaction->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $savingTransaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $savingTransaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $savingTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savingTransaction->id)]) ?>
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
