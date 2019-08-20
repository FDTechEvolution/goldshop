<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Org $org
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Org'), ['action' => 'edit', $org->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Org'), ['action' => 'delete', $org->id], ['confirm' => __('Are you sure you want to delete # {0}?', $org->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orgs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bpartners'), ['controller' => 'Bpartners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bpartner'), ['controller' => 'Bpartners', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branchs'), ['controller' => 'Branchs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branchs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Warehouses'), ['controller' => 'Warehouses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Warehouse'), ['controller' => 'Warehouses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orgs view large-9 medium-8 columns content">
    <h3><?= h($org->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($org->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($org->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($org->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taxid') ?></th>
            <td><?= h($org->taxid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($org->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($org->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($org->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($org->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($org->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($org->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bank Accounts') ?></h4>
        <?php if (!empty($org->bank_accounts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Total Balance') ?></th>
                <th scope="col"><?= __('Account Name') ?></th>
                <th scope="col"><?= __('Bank Id') ?></th>
                <th scope="col"><?= __('Account Type') ?></th>
                <th scope="col"><?= __('Accountno') ?></th>
                <th scope="col"><?= __('Bank Office') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->bank_accounts as $bankAccounts): ?>
            <tr>
                <td><?= h($bankAccounts->id) ?></td>
                <td><?= h($bankAccounts->total_balance) ?></td>
                <td><?= h($bankAccounts->account_name) ?></td>
                <td><?= h($bankAccounts->bank_id) ?></td>
                <td><?= h($bankAccounts->account_type) ?></td>
                <td><?= h($bankAccounts->accountno) ?></td>
                <td><?= h($bankAccounts->bank_office) ?></td>
                <td><?= h($bankAccounts->org_id) ?></td>
                <td><?= h($bankAccounts->branch_id) ?></td>
                <td><?= h($bankAccounts->description) ?></td>
                <td><?= h($bankAccounts->created) ?></td>
                <td><?= h($bankAccounts->createdby) ?></td>
                <td><?= h($bankAccounts->modified) ?></td>
                <td><?= h($bankAccounts->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BankAccounts', 'action' => 'view', $bankAccounts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BankAccounts', 'action' => 'edit', $bankAccounts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BankAccounts', 'action' => 'delete', $bankAccounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccounts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Bpartners') ?></h4>
        <?php if (!empty($org->bpartners)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Iscustomer') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Taxid') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Religion') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Midified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->bpartners as $bpartners): ?>
            <tr>
                <td><?= h($bpartners->id) ?></td>
                <td><?= h($bpartners->code) ?></td>
                <td><?= h($bpartners->name) ?></td>
                <td><?= h($bpartners->title) ?></td>
                <td><?= h($bpartners->firstname) ?></td>
                <td><?= h($bpartners->lastname) ?></td>
                <td><?= h($bpartners->iscustomer) ?></td>
                <td><?= h($bpartners->isactive) ?></td>
                <td><?= h($bpartners->taxid) ?></td>
                <td><?= h($bpartners->birthday) ?></td>
                <td><?= h($bpartners->religion) ?></td>
                <td><?= h($bpartners->created) ?></td>
                <td><?= h($bpartners->createdby) ?></td>
                <td><?= h($bpartners->midified) ?></td>
                <td><?= h($bpartners->modifiedby) ?></td>
                <td><?= h($bpartners->description) ?></td>
                <td><?= h($bpartners->org_id) ?></td>
                <td><?= h($bpartners->branch_id) ?></td>
                <td><?= h($bpartners->phone) ?></td>
                <td><?= h($bpartners->mobile) ?></td>
                <td><?= h($bpartners->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bpartners', 'action' => 'view', $bpartners->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bpartners', 'action' => 'edit', $bpartners->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bpartners', 'action' => 'delete', $bpartners->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bpartners->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Branchs') ?></h4>
        <?php if (!empty($org->branchs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Isheadquarters') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->branchs as $branchs): ?>
            <tr>
                <td><?= h($branchs->id) ?></td>
                <td><?= h($branchs->name) ?></td>
                <td><?= h($branchs->code) ?></td>
                <td><?= h($branchs->isheadquarters) ?></td>
                <td><?= h($branchs->org_id) ?></td>
                <td><?= h($branchs->description) ?></td>
                <td><?= h($branchs->created) ?></td>
                <td><?= h($branchs->createdby) ?></td>
                <td><?= h($branchs->modified) ?></td>
                <td><?= h($branchs->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Branchs', 'action' => 'view', $branchs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Branchs', 'action' => 'edit', $branchs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Branchs', 'action' => 'delete', $branchs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($org->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Short Desc') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->name) ?></td>
                <td><?= h($images->type) ?></td>
                <td><?= h($images->path) ?></td>
                <td><?= h($images->short_desc) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->createdby) ?></td>
                <td><?= h($images->org_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Invoices') ?></h4>
        <?php if (!empty($org->invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Docdate') ?></th>
                <th scope="col"><?= __('Duedate') ?></th>
                <th scope="col"><?= __('Docno') ?></th>
                <th scope="col"><?= __('Docstatus') ?></th>
                <th scope="col"><?= __('Bpartner Id') ?></th>
                <th scope="col"><?= __('Netamt') ?></th>
                <th scope="col"><?= __('Vatamt') ?></th>
                <th scope="col"><?= __('Totalamt') ?></th>
                <th scope="col"><?= __('Totalpaid') ?></th>
                <th scope="col"><?= __('Paymentrule') ?></th>
                <th scope="col"><?= __('Paymentterm') ?></th>
                <th scope="col"><?= __('Ispaid') ?></th>
                <th scope="col"><?= __('Issale') ?></th>
                <th scope="col"><?= __('Isprocessed') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->invoices as $invoices): ?>
            <tr>
                <td><?= h($invoices->id) ?></td>
                <td><?= h($invoices->org_id) ?></td>
                <td><?= h($invoices->branch_id) ?></td>
                <td><?= h($invoices->isactive) ?></td>
                <td><?= h($invoices->docdate) ?></td>
                <td><?= h($invoices->duedate) ?></td>
                <td><?= h($invoices->docno) ?></td>
                <td><?= h($invoices->docstatus) ?></td>
                <td><?= h($invoices->bpartner_id) ?></td>
                <td><?= h($invoices->netamt) ?></td>
                <td><?= h($invoices->vatamt) ?></td>
                <td><?= h($invoices->totalamt) ?></td>
                <td><?= h($invoices->totalpaid) ?></td>
                <td><?= h($invoices->paymentrule) ?></td>
                <td><?= h($invoices->paymentterm) ?></td>
                <td><?= h($invoices->ispaid) ?></td>
                <td><?= h($invoices->issale) ?></td>
                <td><?= h($invoices->isprocessed) ?></td>
                <td><?= h($invoices->order_id) ?></td>
                <td><?= h($invoices->created) ?></td>
                <td><?= h($invoices->createdby) ?></td>
                <td><?= h($invoices->modified) ?></td>
                <td><?= h($invoices->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($org->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Unittype') ?></th>
                <th scope="col"><?= __('Standard Price') ?></th>
                <th scope="col"><?= __('Actual Price') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Isstock') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Midified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->code) ?></td>
                <td><?= h($products->unittype) ?></td>
                <td><?= h($products->standard_price) ?></td>
                <td><?= h($products->actual_price) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->isactive) ?></td>
                <td><?= h($products->isstock) ?></td>
                <td><?= h($products->type) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->createdby) ?></td>
                <td><?= h($products->midified) ?></td>
                <td><?= h($products->modifiedby) ?></td>
                <td><?= h($products->org_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($org->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Mobileno') ?></th>
                <th scope="col"><?= __('Cardno') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Startdate') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->title) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->mobileno) ?></td>
                <td><?= h($users->cardno) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->startdate) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->isactive) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->position) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->createdby) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->modifiedby) ?></td>
                <td><?= h($users->description) ?></td>
                <td><?= h($users->org_id) ?></td>
                <td><?= h($users->branch_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Warehouses') ?></h4>
        <?php if (!empty($org->warehouses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col"><?= __('Branch Id') ?></th>
                <th scope="col"><?= __('Isactive') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($org->warehouses as $warehouses): ?>
            <tr>
                <td><?= h($warehouses->id) ?></td>
                <td><?= h($warehouses->name) ?></td>
                <td><?= h($warehouses->org_id) ?></td>
                <td><?= h($warehouses->branch_id) ?></td>
                <td><?= h($warehouses->isactive) ?></td>
                <td><?= h($warehouses->description) ?></td>
                <td><?= h($warehouses->created) ?></td>
                <td><?= h($warehouses->createdby) ?></td>
                <td><?= h($warehouses->modified) ?></td>
                <td><?= h($warehouses->modifiedby) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Warehouses', 'action' => 'view', $warehouses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Warehouses', 'action' => 'edit', $warehouses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Warehouses', 'action' => 'delete', $warehouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $warehouses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
