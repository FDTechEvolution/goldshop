<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoodsTransaction $goodsTransaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $goodsTransaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $goodsTransaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Goods Transactions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodsTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($goodsTransaction) ?>
    <fieldset>
        <legend><?= __('Edit Goods Transaction') ?></legend>
        <?php
            echo $this->Form->control('docno');
            echo $this->Form->control('docdate');
            echo $this->Form->control('type');
            echo $this->Form->control('description');
            echo $this->Form->control('status');
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
