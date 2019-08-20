<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SavingAccount[]|\Cake\Collection\CollectionInterface $savingAccounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Saving Account'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="savingAccounts index large-9 medium-8 columns content">
    <h3><?= __('Saving Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bpartner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('registerdate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('org_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balanceamt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($savingAccounts as $savingAccount): ?>
            <tr>
                <td><?= h($savingAccount->id) ?></td>
                <td><?= $savingAccount->has('bpartner') ? $this->Html->link($savingAccount->bpartner->name, ['controller' => 'Bpartners', 'action' => 'view', $savingAccount->bpartner->id]) : '' ?></td>
                <td><?= h($savingAccount->registerdate) ?></td>
                <td><?= $savingAccount->has('org') ? $this->Html->link($savingAccount->org->name, ['controller' => 'Orgs', 'action' => 'view', $savingAccount->org->id]) : '' ?></td>
                <td><?= $savingAccount->has('branch') ? $this->Html->link($savingAccount->branch->name, ['controller' => 'Branches', 'action' => 'view', $savingAccount->branch->id]) : '' ?></td>
                <td><?= h($savingAccount->description) ?></td>
                <td><?= $this->Number->format($savingAccount->balanceamt) ?></td>
                <td><?= h($savingAccount->created) ?></td>
                <td><?= h($savingAccount->createdby) ?></td>
                <td><?= h($savingAccount->modified) ?></td>
                <td><?= h($savingAccount->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $savingAccount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $savingAccount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $savingAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $savingAccount->id)]) ?>
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

