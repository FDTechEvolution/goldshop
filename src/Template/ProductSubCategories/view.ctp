<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductSubCategory $productSubCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Sub Category'), ['action' => 'edit', $productSubCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Sub Category'), ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orgs'), ['controller' => 'Orgs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org'), ['controller' => 'Orgs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productSubCategories view large-9 medium-8 columns content">
    <h3><?= h($productSubCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($productSubCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productSubCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Isactive') ?></th>
            <td><?= h($productSubCategory->isactive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category') ?></th>
            <td><?= $productSubCategory->has('product_category') ? $this->Html->link($productSubCategory->product_category->name, ['controller' => 'ProductCategories', 'action' => 'view', $productSubCategory->product_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Org') ?></th>
            <td><?= $productSubCategory->has('org') ? $this->Html->link($productSubCategory->org->name, ['controller' => 'Orgs', 'action' => 'view', $productSubCategory->org->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($productSubCategory->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($productSubCategory->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($productSubCategory->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productSubCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productSubCategory->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($productSubCategory->products)): ?>
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
                <th scope="col"><?= __('Product Category Id') ?></th>
                <th scope="col"><?= __('Product Sub Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Midified') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Org Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productSubCategory->products as $products): ?>
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
                <td><?= h($products->product_category_id) ?></td>
                <td><?= h($products->product_sub_category_id) ?></td>
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
</div>
