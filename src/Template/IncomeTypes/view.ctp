<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\IncomeType $incomeType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Income Type'), ['action' => 'edit', $incomeType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Income Type'), ['action' => 'delete', $incomeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $incomeType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Income Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Income Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payment Lines'), ['controller' => 'PaymentLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment Line'), ['controller' => 'PaymentLines', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="incomeTypes view large-9 medium-8 columns content">
    <h3><?= h($incomeType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($incomeType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($incomeType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isexpend') ?></th>
            <td><?= h($incomeType->isexpend) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($incomeType->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($incomeType->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Payment Lines') ?></h4>
        <?php if (!empty($incomeType->payment_lines)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Seq') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Income Type Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($incomeType->payment_lines as $paymentLines): ?>
            <tr>
                <td><?= h($paymentLines->id) ?></td>
                <td><?= h($paymentLines->seq) ?></td>
                <td><?= h($paymentLines->payment_id) ?></td>
                <td><?= h($paymentLines->invoice_id) ?></td>
                <td><?= h($paymentLines->income_type_id) ?></td>
                <td><?= h($paymentLines->order_id) ?></td>
                <td><?= h($paymentLines->description) ?></td>
                <td><?= h($paymentLines->created) ?></td>
                <td><?= h($paymentLines->createdby) ?></td>
                <td><?= h($paymentLines->modified) ?></td>
                <td><?= h($paymentLines->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PaymentLines', 'action' => 'view', $paymentLines->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PaymentLines', 'action' => 'edit', $paymentLines->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PaymentLines', 'action' => 'delete', $paymentLines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentLines->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
