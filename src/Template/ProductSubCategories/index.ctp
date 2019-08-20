<div class="row">
    <?php if (is_null($productCatId) || $productCatId =='') { ?>

    <?php } else { ?>
        <div class="col-12 bt-tool">
            <?= $this->Html->link(BT_ADD, ['controller' => 'product-sub-categories', 'action' => 'add',$productCatId], ['escape' => false]) ?> 
        </div>
    <?php } ?>
    <div class="col-12">
        <table class="table table-hover" cellspacing="0" width="100%">
            <tbody>
                <?php foreach ($productSubCategories as $productSubCategory): ?>
                    <tr>
                        <td class="actions column-tool-bt">
                           
                            <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $productSubCategory->id], ['escape' => false]) ?>
                            <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->name), 'escape' => false]) ?>
                        </td>
                        <td><?= h($productSubCategory->name) ?></td>
                        <td><?= h($productSubCategory->code) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>