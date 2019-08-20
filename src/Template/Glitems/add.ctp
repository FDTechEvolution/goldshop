<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Glitem $glitem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Glitems'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Lines'), ['controller' => 'InvoiceLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Line'), ['controller' => 'InvoiceLines', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="glitems form large-9 medium-8 columns content">
    <?= $this->Form->create($glitem) ?>
    <fieldset>
        <legend><?= __('Add Glitem') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
