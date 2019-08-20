<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smartcard $smartcard
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Smartcards'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="smartcards form large-9 medium-8 columns content">
    <?= $this->Form->create($smartcard) ?>
    <fieldset>
        <legend><?= __('Add Smartcard') ?></legend>
        <?php
            echo $this->Form->control('ip');
            echo $this->Form->control('title');
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('gender');
            echo $this->Form->control('cardno');
            echo $this->Form->control('full_address');
            echo $this->Form->control('description');
            echo $this->Form->control('houseno');
            echo $this->Form->control('moo');
            echo $this->Form->control('sub_district');
            echo $this->Form->control('district');
            echo $this->Form->control('province');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
