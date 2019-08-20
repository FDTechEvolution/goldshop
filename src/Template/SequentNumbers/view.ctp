<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SequentNumber $sequentNumber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sequent Number'), ['action' => 'edit', $sequentNumber->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sequent Number'), ['action' => 'delete', $sequentNumber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sequentNumber->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sequent Numbers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sequent Number'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sequentNumbers view large-9 medium-8 columns content">
    <h3><?= h($sequentNumber->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($sequentNumber->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Doccode') ?></th>
            <td><?= h($sequentNumber->doccode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prefix') ?></th>
            <td><?= h($sequentNumber->prefix) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suffix') ?></th>
            <td><?= h($sequentNumber->suffix) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Sequent') ?></th>
            <td><?= h($sequentNumber->current_sequent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($sequentNumber->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Org') ?></th>
            <td><?= $sequentNumber->has('org') ? $this->Html->link($sequentNumber->org->name, ['controller' => 'Orgs', 'action' => 'view', $sequentNumber->org->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $sequentNumber->has('branch') ? $this->Html->link($sequentNumber->branch->name, ['controller' => 'Branches', 'action' => 'view', $sequentNumber->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($sequentNumber->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($sequentNumber->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start No') ?></th>
            <td><?= $this->Number->format($sequentNumber->start_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current No') ?></th>
            <td><?= $this->Number->format($sequentNumber->current_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Running Length') ?></th>
            <td><?= $this->Number->format($sequentNumber->running_length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sequentNumber->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sequentNumber->modified) ?></td>
        </tr>
    </table>
</div>
