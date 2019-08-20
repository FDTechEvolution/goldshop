<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Branch $branch
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Branch'), ['action' => 'edit', $branch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Branch'), ['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Branchs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="branchs view large-9 medium-8 columns content">
    <h3><?= h($branch->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($branch->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($branch->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($branch->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isheadquarters') ?></th>
            <td><?= h($branch->isheadquarters) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Org') ?></th>
            <td><?= $branch->has('org') ? $this->Html->link($branch->org->name, ['controller' => 'Orgs', 'action' => 'view', $branch->org->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($branch->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($branch->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($branch->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($branch->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($branch->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Accounts') ?></h4>
        <?php if (!empty($branch->bank_accounts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total Balance') ?></th>
                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col"><?= __('Bank Id') ?></th>
                <th scope="col"><?= __('Account Type') ?></th>
                <th scope="col"><?= __('Accountno') ?></th>
                <th scope="col"><?= __('Bank Office') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($branch->bank_accounts as $bankAccounts): ?>
            <tr>
                <td><?= h($bankAccounts->id) ?></td>
                <td><?= h($bankAccounts->total_balance) ?></td>
                <td><?= h($bankAccounts->account_name) ?></td>
                <td><?= h($bankAccounts->bank_id) ?></td>
                <td><?= h($bankAccounts->account_type) ?></td>
                <td><?= h($bankAccounts->accountno) ?></td>
                <td><?= h($bankAccounts->bank_office) ?></td>
                <td><?= h($bankAccounts->org_id) ?></td>
                <td><?= h($bankAccounts->branch_id) ?></td>
                <td><?= h($bankAccounts->description) ?></td>
                <td><?= h($bankAccounts->created) ?></td>
                <td><?= h($bankAccounts->createdby) ?></td>
                <td><?= h($bankAccounts->modified) ?></td>
                <td><?= h($bankAccounts->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankAccounts', 'action' => 'view', $bankAccounts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankAccounts', 'action' => 'edit', $bankAccounts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankAccounts', 'action' => 'delete', $bankAccounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccounts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Warehouses') ?></h4>
        <?php if (!empty($branch->warehouses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($branch->warehouses as $warehouses): ?>
            <tr>
                <td><?= h($warehouses->id) ?></td>
                <td><?= h($warehouses->name) ?></td>
                <td><?= h($warehouses->org_id) ?></td>
                <td><?= h($warehouses->branch_id) ?></td>
                <td><?= h($warehouses->isactive) ?></td>
                <td><?= h($warehouses->description) ?></td>
                <td><?= h($warehouses->created) ?></td>
                <td><?= h($warehouses->createdby) ?></td>
                <td><?= h($warehouses->modified) ?></td>
                <td><?= h($warehouses->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Warehouses', 'action' => 'view', $warehouses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Warehouses', 'action' => 'edit', $warehouses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Warehouses', 'action' => 'delete', $warehouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
