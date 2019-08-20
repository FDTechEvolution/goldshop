<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smartcard[]|\Cake\Collection\CollectionInterface $smartcards
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Smartcard'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="smartcards index large-9 medium-8 columns content">
    <h3><?= __('Smartcards') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lastname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cardno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('houseno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('moo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('district') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($smartcards as $smartcard): ?>
            <tr>
                <td><?= h($smartcard->id) ?></td>
                <td><?= h($smartcard->ip) ?></td>
                <td><?= h($smartcard->title) ?></td>
                <td><?= h($smartcard->firstname) ?></td>
                <td><?= h($smartcard->lastname) ?></td>
                <td><?= h($smartcard->gender) ?></td>
                <td><?= h($smartcard->cardno) ?></td>
                <td><?= h($smartcard->full_address) ?></td>
                <td><?= h($smartcard->created) ?></td>
                <td><?= h($smartcard->description) ?></td>
                <td><?= h($smartcard->houseno) ?></td>
                <td><?= h($smartcard->moo) ?></td>
                <td><?= h($smartcard->sub_district) ?></td>
                <td><?= h($smartcard->district) ?></td>
                <td><?= h($smartcard->province) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $smartcard->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smartcard->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $smartcard->id], ['confirm' => __('Are you sure you want to delete # {0}?', $smartcard->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
