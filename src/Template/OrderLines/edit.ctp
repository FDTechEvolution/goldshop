<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderLine $orderLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderLine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Order Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['controller' => 'SerialNumbers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Serial Number'), ['controller' => 'SerialNumbers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderLines form large-9 medium-8 columns content">
    <?= $this->Form->create($orderLine) ?>
    <fieldset>
        <legend><?= __('Edit Order Line') ?></legend>
        <?php
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('serial_number_id', ['options' => $serialNumbers]);
            echo $this->Form->control('seq');
            echo $this->Form->control('netamt');
            echo $this->Form->control('vatamt');
            echo $this->Form->control('totalamt');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
