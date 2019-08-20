<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CloseDay $closeDay
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Close Day'), ['action' => 'edit', $closeDay->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Close Day'), ['action' => 'delete', $closeDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $closeDay->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Close Days'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Close Day'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="closeDays view large-9 medium-8 columns content">
    <h3><?= h($closeDay->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($closeDay->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($closeDay->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($closeDay->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($closeDay->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actual Amt') ?></th>
            <td><?= $this->Number->format($closeDay->actual_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expect Amt') ?></th>
            <td><?= $this->Number->format($closeDay->expect_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cash Amt') ?></th>
            <td><?= $this->Number->format($closeDay->cash_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transfer Amt') ?></th>
            <td><?= $this->Number->format($closeDay->transfer_amt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Close Date') ?></th>
            <td><?= h($closeDay->close_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($closeDay->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($closeDay->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($closeDay->description)); ?>
    </div>
</div>
