<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PawnLine $pawnLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pawn Line'), ['action' => 'edit', $pawnLine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pawn Line'), ['action' => 'delete', $pawnLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pawnLine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pawn Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pawn Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pawns'), ['controller' => 'Pawns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pawn'), ['controller' => 'Pawns', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pawnLines view large-9 medium-8 columns content">
    <h3><?= h($pawnLine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($pawnLine->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $pawnLine->has('product') ? $this->Html->link($pawnLine->product->name, ['controller' => 'Products', 'action' => 'view', $pawnLine->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($pawnLine->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pawn') ?></th>
            <td><?= $pawnLine->has('pawn') ? $this->Html->link($pawnLine->pawn->id, ['controller' => 'Pawns', 'action' => 'view', $pawnLine->pawn->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('createdby') ?></th>
            <td><?= h($pawnLine->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($pawnLine->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($pawnLine->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($pawnLine->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pawnLine->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pawnLine->modified) ?></td>
        </tr>
    </table>
</div>
