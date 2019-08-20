<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smartcard $smartcard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Smartcard'), ['action' => 'edit', $smartcard->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Smartcard'), ['action' => 'delete', $smartcard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $smartcard->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Smartcards'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Smartcard'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="smartcards view large-9 medium-8 columns content">
    <h3><?= h($smartcard->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($smartcard->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($smartcard->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($smartcard->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($smartcard->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lastname') ?></th>
            <td><?= h($smartcard->lastname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($smartcard->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cardno') ?></th>
            <td><?= h($smartcard->cardno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full Address') ?></th>
            <td><?= h($smartcard->full_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($smartcard->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Houseno') ?></th>
            <td><?= h($smartcard->houseno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moo') ?></th>
            <td><?= h($smartcard->moo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub District') ?></th>
            <td><?= h($smartcard->sub_district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($smartcard->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($smartcard->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($smartcard->created) ?></td>
        </tr>
    </table>
</div>
