<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BpUsePromotion $bpUsePromotion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bp Use Promotion'), ['action' => 'edit', $bpUsePromotion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bp Use Promotion'), ['action' => 'delete', $bpUsePromotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bpUsePromotion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bp Use Promotions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bp Use Promotion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bpUsePromotions view large-9 medium-8 columns content">
    <h3><?= h($bpUsePromotion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($bpUsePromotion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bpartner') ?></th>
            <td><?= $bpUsePromotion->has('bpartner') ? $this->Html->link($bpUsePromotion->bpartner->name, ['controller' => 'Bpartners', 'action' => 'view', $bpUsePromotion->bpartner->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Branch') ?></th>
            <td><?= $bpUsePromotion->has('branch') ? $this->Html->link($bpUsePromotion->branch->name, ['controller' => 'Branches', 'action' => 'view', $bpUsePromotion->branch->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seller') ?></th>
            <td><?= h($bpUsePromotion->seller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotion') ?></th>
            <td><?= $bpUsePromotion->has('promotion') ? $this->Html->link($bpUsePromotion->promotion->name, ['controller' => 'Promotions', 'action' => 'view', $bpUsePromotion->promotion->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($bpUsePromotion->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($bpUsePromotion->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usedate') ?></th>
            <td><?= h($bpUsePromotion->usedate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bpUsePromotion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bpUsePromotion->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($bpUsePromotion->description)); ?>
    </div>
</div>
