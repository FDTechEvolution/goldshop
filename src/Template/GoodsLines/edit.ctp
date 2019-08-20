<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoodsLine $goodsLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $goodsLine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $goodsLine->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Goods Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodsLines form large-9 medium-8 columns content">
    <?= $this->Form->create($goodsLine) ?>
    <fieldset>
        <legend><?= __('Edit Goods Line') ?></legend>
        <?php
            echo $this->Form->control('seq');
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('qty');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
