<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WhProduct $whProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Wh Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['controller' => 'SerialNumbers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Serial Number'), ['controller' => 'SerialNumbers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="whProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($whProduct) ?>
    <fieldset>
        <legend><?= __('Add Wh Product') ?></legend>
        <?php
            echo $this->Form->control('warehouse_id', ['options' => $warehouses]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('balance_amt');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
