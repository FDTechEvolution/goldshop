<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BpUsePromotion $bpUsePromotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bpUsePromotion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bpUsePromotion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bp Use Promotions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bpUsePromotions form large-9 medium-8 columns content">
    <?= $this->Form->create($bpUsePromotion) ?>
    <fieldset>
        <legend><?= __('Edit Bp Use Promotion') ?></legend>
        <?php
            echo $this->Form->control('bpartner_id', ['options' => $bpartners]);
            echo $this->Form->control('branch_id', ['options' => $branches]);
            echo $this->Form->control('seller');
            echo $this->Form->control('promotion_id', ['options' => $promotions, 'empty' => true]);
            echo $this->Form->control('value');
            echo $this->Form->control('usedate', ['empty' => true]);
            echo $this->Form->control('description');
            echo $this->Form->control('createdby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
