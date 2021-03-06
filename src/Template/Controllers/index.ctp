<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controller[]|\Cake\Collection\CollectionInterface $controllers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Controller'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="controllers index large-9 medium-8 columns content">
    <h3><?= __('Controllers') ?></h3>
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
               
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
               
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($controllers as $controller): ?>
            <tr>
               
                <td><?= h($controller->name) ?></td>
                <td><?= h($controller->value) ?></td>
                <td><?= h($controller->description) ?></td>
                <td><?= h($controller->created) ?></td>
               
                <td><?= h($controller->modified) ?></td>
                
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $controller->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $controller->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $controller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controller->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
