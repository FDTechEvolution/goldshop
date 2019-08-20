<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BpUsePromotion[]|\Cake\Collection\CollectionInterface $bpUsePromotions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bp Use Promotion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotions'), ['controller' => 'Promotions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotion'), ['controller' => 'Promotions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bpUsePromotions index large-9 medium-8 columns content">
    <h3><?= __('Bp Use Promotions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bpartner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seller') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promotion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usedate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('createdby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bpUsePromotions as $bpUsePromotion): ?>
            <tr>
                <td><?= h($bpUsePromotion->id) ?></td>
                <td><?= $bpUsePromotion->has('bpartner') ? $this->Html->link($bpUsePromotion->bpartner->name, ['controller' => 'Bpartners', 'action' => 'view', $bpUsePromotion->bpartner->id]) : '' ?></td>
                <td><?= $bpUsePromotion->has('branch') ? $this->Html->link($bpUsePromotion->branch->name, ['controller' => 'Branches', 'action' => 'view', $bpUsePromotion->branch->id]) : '' ?></td>
                <td><?= h($bpUsePromotion->seller) ?></td>
                <td><?= $bpUsePromotion->has('promotion') ? $this->Html->link($bpUsePromotion->promotion->name, ['controller' => 'Promotions', 'action' => 'view', $bpUsePromotion->promotion->id]) : '' ?></td>
                <td><?= $this->Number->format($bpUsePromotion->value) ?></td>
                <td><?= h($bpUsePromotion->usedate) ?></td>
                <td><?= h($bpUsePromotion->created) ?></td>
                <td><?= h($bpUsePromotion->modified) ?></td>
                <td><?= h($bpUsePromotion->createdby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bpUsePromotion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bpUsePromotion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bpUsePromotion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bpUsePromotion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
