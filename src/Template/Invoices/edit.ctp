<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoices form large-9 medium-8 columns content">
    <?= $this->Form->create($invoice) ?>
    <fieldset>
        <legend><?= __('Edit Invoice') ?></legend>
        <?php
            echo $this->Form->control('org_id', ['options' => $orgs]);
            echo $this->Form->control('branch_id');
            echo $this->Form->control('isactive');
            echo $this->Form->control('docdate');
            echo $this->Form->control('duedate', ['empty' => true]);
            echo $this->Form->control('docno');
            echo $this->Form->control('docstatus');
            echo $this->Form->control('bpartner_id', ['options' => $bpartners, 'empty' => true]);
            echo $this->Form->control('netamt');
            echo $this->Form->control('vatamt');
            echo $this->Form->control('totalamt');
            echo $this->Form->control('totalpaid');
            echo $this->Form->control('paymentrule');
            echo $this->Form->control('paymentterm');
            echo $this->Form->control('ispaid');
            echo $this->Form->control('issale');
            echo $this->Form->control('isprocessed');
            echo $this->Form->control('order_id');
            echo $this->Form->control('createdby');
            echo $this->Form->control('modifiedby');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
