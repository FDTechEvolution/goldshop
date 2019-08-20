<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdWeight $sdWeight
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sd Weight'), ['action' => 'edit', $sdWeight->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sd Weight'), ['action' => 'delete', $sdWeight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdWeight->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sd Weights'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sd Weight'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cost Lines'), ['controller' => 'CostLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Line'), ['controller' => 'CostLines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gold Price Lines'), ['controller' => 'GoldPriceLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gold Price Line'), ['controller' => 'GoldPriceLines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Weights'), ['controller' => 'Weights', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Weight'), ['controller' => 'Weights', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdWeights view large-9 medium-8 columns content">
    <h3><?= h($sdWeight->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($sdWeight->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($sdWeight->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($sdWeight->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Formula') ?></th>
            <td><?= h($sdWeight->formula) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isdisplay') ?></th>
            <td><?= h($sdWeight->isdisplay) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seq') ?></th>
            <td><?= $this->Number->format($sdWeight->seq) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sdWeight->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sdWeight->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cost Lines') ?></h4>
        <?php if (!empty($sdWeight->cost_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Amount2') ?></th>
                <th scope="col"><?= __('Cost Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Sd Weight Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWeight->cost_lines as $costLines): ?>
            <tr>
                <td><?= h($costLines->id) ?></td>
                <td><?= h($costLines->amount) ?></td>
                <td><?= h($costLines->amount2) ?></td>
                <td><?= h($costLines->cost_id) ?></td>
                <td><?= h($costLines->created) ?></td>
                <td><?= h($costLines->modified) ?></td>
                <td><?= h($costLines->sd_weight_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CostLines', 'action' => 'view', $costLines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CostLines', 'action' => 'edit', $costLines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CostLines', 'action' => 'delete', $costLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costLines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Gold Price Lines') ?></h4>
        <?php if (!empty($sdWeight->gold_price_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sales Price') ?></th>
                <th scope="col"><?= __('Purchase Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Gold Price Id') ?></th>
                <th scope="col"><?= __('Sd Weight Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWeight->gold_price_lines as $goldPriceLines): ?>
            <tr>
                <td><?= h($goldPriceLines->id) ?></td>
                <td><?= h($goldPriceLines->sales_price) ?></td>
                <td><?= h($goldPriceLines->purchase_price) ?></td>
                <td><?= h($goldPriceLines->created) ?></td>
                <td><?= h($goldPriceLines->modified) ?></td>
                <td><?= h($goldPriceLines->gold_price_id) ?></td>
                <td><?= h($goldPriceLines->sd_weight_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GoldPriceLines', 'action' => 'view', $goldPriceLines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GoldPriceLines', 'action' => 'edit', $goldPriceLines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GoldPriceLines', 'action' => 'delete', $goldPriceLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goldPriceLines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Weights') ?></h4>
        <?php if (!empty($sdWeight->weights)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Product Category Id') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col"><?= __('Sd Weight Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sdWeight->weights as $weights): ?>
            <tr>
                <td><?= h($weights->id) ?></td>
                <td><?= h($weights->name) ?></td>
                <td><?= h($weights->isactive) ?></td>
                <td><?= h($weights->description) ?></td>
                <td><?= h($weights->createdby) ?></td>
                <td><?= h($weights->created) ?></td>
                <td><?= h($weights->modified) ?></td>
                <td><?= h($weights->modifiedby) ?></td>
                <td><?= h($weights->product_category_id) ?></td>
                <td><?= h($weights->value) ?></td>
                <td><?= h($weights->sd_weight_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Weights', 'action' => 'view', $weights->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Weights', 'action' => 'edit', $weights->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Weights', 'action' => 'delete', $weights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weights->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
