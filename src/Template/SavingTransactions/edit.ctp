<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SavingTransaction $savingTransaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $savingTransaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $savingTransaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Saving Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="savingTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($savingTransaction) ?>
    <fieldset>
        <legend><?= __('Edit Saving Transaction') ?></legend>
        <?php
            echo $this->Form->control('saving_accounts');
            echo $this->Form->control('docdate');
            echo $this->Form->control('docno');
            echo $this->Form->control('org_id', ['options' => $orgs]);
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('amount');
            echo $this->Form->control('bank_account_id', ['options' => $bankAccounts]);
            echo $this->Form->control('isdeposit');
            echo $this->Form->control('isactive');
            echo $this->Form->control('docstatus');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
