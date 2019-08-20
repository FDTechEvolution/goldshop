<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccountSetting $accountSetting
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account Setting'), ['action' => 'edit', $accountSetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account Setting'), ['action' => 'delete', $accountSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountSetting->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Account Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account Setting'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accountSettings view large-9 medium-8 columns content">
    <h3><?= h($accountSetting->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($accountSetting->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Org') ?></th>
            <td><?= $accountSetting->has('org') ? $this->Html->link($accountSetting->org->name, ['controller' => 'Orgs', 'action' => 'view', $accountSetting->org->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee Saving Account') ?></th>
            <td><?= h($accountSetting->fee_saving_account) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($accountSetting->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($accountSetting->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($accountSetting->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($accountSetting->modified) ?></td>
        </tr>
    </table>
</div>
