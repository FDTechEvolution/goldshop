<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายการสินค้า</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['controller' => 'products', 'action' => 'add'], ['escape' => false]) ?> 
            </div>
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>ชื่อสินค้า</th>
                        <th>รหัส</th>
                        <th>น้ำหนัก</th>
                         <th>%</th>
                         <th>ค่ากำเหน็จเพิ่มเติม</th>
                        <th>เพิ่มโดย</th>
                        <th>เพิ่มวันที่</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <?php 
                    $image = 'noimage.png';
                    if($product->has('image')){
                        $image = $product->image->path;
                    }
                    ?>
                        <tr data-url="<?= SITE_URL.'products/edit/'.h($product->id) ?>" class="hand-cursor">
                            <td><?= $this->Html->image($image,['width'=>'50px'])?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= h($product->code) ?></td>
                            <td><?= h($product->has('weight')?$product->weight->name:'-') ?></td>
                            <td><?= h($product->percent) ?></td>
                            <td><?= $this->Number->format($product->cost) ?></td>
                            <td><?= h($product->has('UserCreated') ? $product->UserCreated->firstname : '') ?></td>
                            <td class="column-date"><?= h($product->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>

    $("#datatable-buttons > tbody tr").click(function () {
        var selectedUrl = $(this).attr('data-url');
        if (selectedUrl !== 'undefined' && selectedUrl !== undefined) {
            console.log(selectedUrl);
            document.location = selectedUrl;
        }
    });
</script>