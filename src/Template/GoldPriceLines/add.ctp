<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GoldPriceLine $goldPriceLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gold Price Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gold Prices'), ['controller' => 'GoldPrices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gold Price'), ['controller' => 'GoldPrices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goldPriceLines form large-9 medium-8 columns content">
    <?= $this->Form->create($goldPriceLine) ?>
    <fieldset>
        <legend><?= __('Add Gold Price Line') ?></legend>
        <?php
            echo $this->Form->control('unittype');
            echo $this->Form->control('sales_price');
            echo $this->Form->control('purchase_price');
            echo $this->Form->control('gold_price_id', ['options' => $goldPrices]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
