<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <h3 class="m-t-0 gold-title card-header">คลังสินค้าหลัก</h3>
            <div class="card-body">
                <div class="col-12 bt-tool">
                    <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
                </div>
                <table class="table table-hover" width="100%" id="wh_tb">
                    <thead>
                        <tr>
                            <th width="150px" style="text-align: center"><?= __('เครื่องมือ') ?></th>
                            <th>คลังสินค้า</th>
                            <th style="text-align: center">บริษัท </th>
                            <th>สาขา</th>
                            <th width="100px">สถานะ</th>
                            <th style="text-align: center" width="100px">คลังหลัก</th>
                            <th style="text-align: center" width="100px">คลังขาย</th>
                            <th style="text-align: center" width="100px">คลังซื้อ</th>
                            <th style="text-align: center" width="100px">คลังจำนำ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($warehouses as $warehouse): ?>
                            <tr class="hand-cursor" data-id="<?= $warehouse->id ?>" show-gold-day="<?=$warehouse->ispurchase?>">
                                <td class="actions" style="text-align: center">
                                    <?php if ($warehouse->islock == 'N') { ?>
                                        <?= $this->Html->link(BT_EDIT, ['action' => 'edit', $warehouse->id], ['escape' => false, 'label' => false]) ?>
                                        <?= $this->Form->postLink(BT_DELETE, ['action' => 'delete', $warehouse->id], ['confirm' => __('ท่านต้องการลบข้อมูล ใช่ หรือ ไม่ '), 'escape' => false]) ?>
                                    <?php } ?>
                                </td>
                                <td><?= h($warehouse->name) ?></td>
                                <td><?= h($warehouse->org->name) ?></td>
                                <td><?= h($warehouse->branch->name) ?></td>

                                <td><?= $warehouse->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                                <td style="text-align: center"><?= $warehouse->ismain == 'Y' ? YES : NO ?></td>
                                <td style="text-align: center"><?= $warehouse->issales == 'Y' ? YES : NO ?></td>
                                <td style="text-align: center"><?= $warehouse->ispurchase == 'Y' ? YES : NO ?></td>
                                <td style="text-align: center"><?= $warehouse->ispawn == 'Y' ? YES : NO ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <ul class="nav nav-tabs">
                    <li class="nav-item" id='listock'>
                        <a href="#stock" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            สินค้าคงคลัง
                        </a>
                    </li>
                   
                    <li class="nav-item" id=''>
                        <a href="#transaction" data-toggle="tab" aria-expanded="false"  class="nav-link inactive">
                            Transaction
                        </a>
                    </li>
                     <li class="nav-item" id='liold'>
                        <a href="#old" data-toggle="tab" aria-expanded="false"  class="nav-link inactive">
                            ทองเก่ารายวัน
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="stock" aria-expanded="true">
                        <iframe id="stock_iframe" src="<?= SITE_URL . 'wh-products' ?>" frameborder="0" scrolling="yes" height="600px" width="100%"> </iframe>
                    </div>
                    
                    <div class="tab-pane fade" id="transaction" aria-expanded="false">
                        <iframe id="iframe_transaction" src="<?= SITE_URL . 'wh-products/transaction' ?>" frameborder="0" scrolling="yes" height="600px" width="100%"> </iframe>
                    </div>
                    <div class="tab-pane fade" id="old" aria-expanded="false">
                        <iframe id="old_iframe" src="<?= SITE_URL . 'wh-products/olditem' ?>" frameborder="0" scrolling="yes" height="600px" width="100%"> </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var site_url = SITE_URL+'storage-bins/index/';
    var wh_product_url = SITE_URL+'wh-products/index/';
    var old_wh_product_url = SITE_URL+'wh-products/olditem/';
    var old_wh_product_url = SITE_URL+'wh-products/olditem/';
    var transaction_url = SITE_URL+'wh-products/transaction/';
    
    $(document).ready(function () {

        $("#wh_tb").delegate('tr', 'click', function () {
            var id = $(this).attr("data-id");
            var show_gold_day = $(this).attr("show-gold-day");
            
            if (show_gold_day === 'Y') {
                $('#liold').show();
                 $('#old').show();
                $('#old_iframe').attr('src', old_wh_product_url + id);
            } else {
                $('#liold').hide();
                $('#old').hide();
            }
           
            //$('#storage_iframe').attr('src', site_url + id);
            $('#stock_iframe').attr('src', wh_product_url + id);
            $('#iframe_transaction').attr('src', transaction_url + id);
        });
    });

    $("#wh_tb > tbody tr").click(function () {
        var selected = $(this).hasClass("table-danger");
        $("#wh_tb > tbody tr").removeClass("table-danger");
        if (!selected) {
            //console.log($(this).attr('id'));
            $(this).addClass("table-danger");

        }

    });
</script>