<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bank $bank
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank'), ['action' => 'edit', $bank->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank'), ['action' => 'delete', $bank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bank->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Banks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="banks view large-9 medium-8 columns content">
    <h3><?= h($bank->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($bank->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($bank->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($bank->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= $bank->has('image') ? $this->Html->link($bank->image->name, ['controller' => 'Images', 'action' => 'view', $bank->image->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($bank->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($bank->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($bank->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($bank->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bank->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bank->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Accounts') ?></h4>
        <?php if (!empty($bank->bank_accounts)): ?>
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
            <?php foreach ($bank->bank_accounts as $bankAccounts): ?>
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
</div>
