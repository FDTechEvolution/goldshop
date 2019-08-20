<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SerialNumber $serialNumber
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serialNumber->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serialNumber->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Serial Numbers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Wh Products'), ['controller' => 'WhProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wh Product'), ['controller' => 'WhProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serialNumbers form large-9 medium-8 columns content">
    <?= $this->Form->create($serialNumber) ?>
    <fieldset>
        <legend><?= __('Edit Serial Number') ?></legend>
        <?php
            echo $this->Form->control('wh_product_id', ['options' => $whProducts]);
            echo $this->Form->control('code');
            echo $this->Form->control('isprinted');
            echo $this->Form->control('printeddate', ['empty' => true]);
            echo $this->Form->control('issales');
            echo $this->Form->control('isactive');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
