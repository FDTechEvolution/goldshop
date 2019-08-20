<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SavingAccount $savingAccount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $savingAccount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $savingAccount->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Saving Accounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="savingAccounts form large-9 medium-8 columns content">
    <?= $this->Form->create($savingAccount) ?>
    <fieldset>
        <legend><?= __('Edit Saving Account') ?></legend>
        <?php
            echo $this->Form->control('bpartner_id', ['options' => $bpartners]);
            echo $this->Form->control('registerdate');
            echo $this->Form->control('org_id', ['options' => $orgs]);
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('description');
            echo $this->Form->control('balanceamt');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
