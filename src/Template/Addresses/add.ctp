<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addresses form large-9 medium-8 columns content">
    <?= $this->Form->create($address) ?>
    <fieldset>
        <legend><?= __('Add Address') ?></legend>
        <?php
            echo $this->Form->control('address_line');
            echo $this->Form->control('houseno');
            echo $this->Form->control('villageno');
            echo $this->Form->control('villagename');
            echo $this->Form->control('subdistrict');
            echo $this->Form->control('district');
            echo $this->Form->control('province_id', ['options' => $provinces]);
            echo $this->Form->control('postalcode');
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
