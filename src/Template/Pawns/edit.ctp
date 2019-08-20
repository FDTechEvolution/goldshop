<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pawn $pawn
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pawn->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pawn->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pawns'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pawn Lines'), ['controller' => 'PawnLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pawn Line'), ['controller' => 'PawnLines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pawns form large-9 medium-8 columns content">
    <?= $this->Form->create($pawn) ?>
    <fieldset>
        <legend><?= __('Edit Pawn') ?></legend>
        <?php
            echo $this->Form->control('org_id', ['options' => $orgs]);
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('bpartner_id', ['options' => $bpartners]);
            echo $this->Form->control('bank_account_id', ['options' => $bankAccounts]);
            echo $this->Form->control('docdate');
            echo $this->Form->control('docno');
            echo $this->Form->control('expiredate');
            echo $this->Form->control('returndate', ['empty' => true]);
            echo $this->Form->control('status');
            echo $this->Form->control('description');
            echo $this->Form->control('cratedby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
