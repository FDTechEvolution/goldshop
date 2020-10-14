<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PawnLine $pawnLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pawnLine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pawnLine->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pawn Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pawns'), ['controller' => 'Pawns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pawn'), ['controller' => 'Pawns', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pawnLines form large-9 medium-8 columns content">
    <?= $this->Form->create($pawnLine) ?>
    <fieldset>
        <legend><?= __('Edit Pawn Line') ?></legend>
        <?php
            echo $this->Form->control('seq');
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('description');
            echo $this->Form->control('amount');
            echo $this->Form->control('pawn_id', ['options' => $pawns]);
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
