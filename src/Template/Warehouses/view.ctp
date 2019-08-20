<?= $this->element('Lib/data_table') ?>
<div class="row">


    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'warehouses'], ['escape' => false]) ?> 
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x"><i class="mdi mdi-store"></i> <?= $warehouse->name ?></h1>
                </div>

                <div class="col-md-3">
                    <h4>บริษัท :<?= $warehouse->org->name ?></h4> 
                </div>
                <div class="col-md-3">
                    <h4>สาขา :<?= $warehouse->branch->name ?></h4>
                </div>
            </div>


            <div class="row m-t-15 m-b-15">
                <div class="col-md-6">
                    <h3 class="">สินค้าคงคลัง</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>สินค้า</th>
                           
                                    <th width="100px">จำนวน</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $whProducts = $warehouse->wh_products?>
                                <?php foreach ($whProducts as $item): ?>
                                    <tr>
                                        <td><?= $item->has('product') ? $this->Html->link($item->product->name, ['controller' => 'Products', 'action' => 'view', $item->product->id]) : '' ?></td>
                                  
                                        <td><?= $this->Number->format($item->balance_amt) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
