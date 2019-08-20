<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWeight $sdWeight
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sdWeight->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sdWeight->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sd Weights'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cost Lines'), ['controller' => 'CostLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cost Line'), ['controller' => 'CostLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gold Price Lines'), ['controller' => 'GoldPriceLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gold Price Line'), ['controller' => 'GoldPriceLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Weights'), ['controller' => 'Weights', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Weight'), ['controller' => 'Weights', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sdWeights form large-9 medium-8 columns content">
    <?= $this->Form->create($sdWeight) ?>
    <fieldset>
        <legend><?= __('Edit Sd Weight') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
            echo $this->Form->control('seq');
            echo $this->Form->control('formula');
            echo $this->Form->control('isdisplay');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
