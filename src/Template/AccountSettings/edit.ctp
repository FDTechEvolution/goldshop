<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountSetting $accountSetting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountSetting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountSetting->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Account Settings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountSettings form large-9 medium-8 columns content">
    <?= $this->Form->create($accountSetting) ?>
    <fieldset>
        <legend><?= __('Edit Account Setting') ?></legend>
        <?php
            echo $this->Form->control('org_id', ['options' => $orgs]);
            echo $this->Form->control('fee_saving_account');
            echo $this->Form->control('modifiedby');
            echo $this->Form->control('createdby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
