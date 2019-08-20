<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CloseDay $closeDay
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Close Days'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="closeDays form large-9 medium-8 columns content">
    <?= $this->Form->create($closeDay) ?>
    <fieldset>
        <legend><?= __('Add Close Day') ?></legend>
        <?php
            echo $this->Form->control('close_date', ['empty' => true]);
            echo $this->Form->control('actual_amt');
            echo $this->Form->control('expect_amt');
            echo $this->Form->control('cash_amt');
            echo $this->Form->control('transfer_amt');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
            echo $this->Form->control('status');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
