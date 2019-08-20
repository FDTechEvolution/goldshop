<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWeight[]|\Cake\Collection\CollectionInterface $sdWeights
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sd Weight'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cost Lines'), ['controller' => 'CostLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cost Line'), ['controller' => 'CostLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gold Price Lines'), ['controller' => 'GoldPriceLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gold Price Line'), ['controller' => 'GoldPriceLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weights'), ['controller' => 'Weights', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weight'), ['controller' => 'Weights', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdWeights index large-9 medium-8 columns content">
    <h3><?= __('Sd Weights') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isdisplay') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sdWeights as $sdWeight): ?>
            <tr>
                <td><?= h($sdWeight->id) ?></td>
                <td><?= h($sdWeight->name) ?></td>
                <td><?= h($sdWeight->code) ?></td>
                <td><?= $this->Number->format($sdWeight->seq) ?></td>
                <td><?= h($sdWeight->created) ?></td>
                <td><?= h($sdWeight->modified) ?></td>
                <td><?= h($sdWeight->formula) ?></td>
                <td><?= h($sdWeight->isdisplay) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sdWeight->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sdWeight->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sdWeight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdWeight->id)]) ?>
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
