<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PawnLine[]|\Cake\Collection\CollectionInterface $pawnLines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pawn Line'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pawns'), ['controller' => 'Pawns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pawn'), ['controller' => 'Pawns', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pawnLines index large-9 medium-8 columns content">
    <h3><?= __('Pawn Lines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seq') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pawn_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pawnLines as $pawnLine): ?>
            <tr>
                <td><?= h($pawnLine->id) ?></td>
                <td><?= $this->Number->format($pawnLine->seq) ?></td>
                <td><?= $pawnLine->has('product') ? $this->Html->link($pawnLine->product->name, ['controller' => 'Products', 'action' => 'view', $pawnLine->product->id]) : '' ?></td>
                <td><?= h($pawnLine->description) ?></td>
                <td><?= $this->Number->format($pawnLine->amount) ?></td>
                <td><?= $pawnLine->has('pawn') ? $this->Html->link($pawnLine->pawn->id, ['controller' => 'Pawns', 'action' => 'view', $pawnLine->pawn->id]) : '' ?></td>
                <td><?= h($pawnLine->created) ?></td>
                <td><?= h($pawnLine->createdby) ?></td>
                <td><?= h($pawnLine->modified) ?></td>
                <td><?= h($pawnLine->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pawnLine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pawnLine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pawnLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pawnLine->id)]) ?>
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
