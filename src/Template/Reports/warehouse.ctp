<div class="row">
    <div class="col-md-12">
        <div class="row d-print-none">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <?= $this->Form->create('', ['id' => 'frm']) ?>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <h3 class="prompt-500 text-primary">รายงานสินค้าคงคลัง</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-10">
                            <div class="col-md-3 offset-md-3">
                                <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'class' => 'form-control', 'label' => 'สาขา', 'options' => $branches]) ?>
                            </div>
                            <div class="col-md-3">
                                <?= $this->Form->control('warehouse_id', ['empty' => 'ทั้งหมด', 'id' => 'warehouse_id', 'class' => 'form-control', 'label' => 'คลังสินค้า', 'options' => $warehouses]) ?>
                            </div>
                        </div>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-2 offset-md-5">
                                <button class="btn btn-block btn-primary waves-effect">ค้นหา</button>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($warehouseArr) && !is_null($warehouseArr)) { ?>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <div class="d-print-none">
                            <div class="text-left">
                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                            </div>
                        </div>

                        <div class="clearfix m-t-30">
                            <div class="pull-left">
                                <h3 class="text-right prompt-500 text-primary"><?= PAGE_TITLE ?></h3>
                            </div>
                            <div class="pull-right">
                                <h3 class="prompt-400 text-primary">รายงานสินค้าคงคลัง</h3>
                                <p>สาขา<?=$branch->name?> ข้อมูลวันที่ <?= h($date->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th class="text-left">คลังสินค้า</th>
                                                <th class="text-left">รหัสสินค้า</th>
                                                <th class="text-left">สินค้า</th>
                                                <th class="text-right">จำนวนคงคลัง</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($warehouseArr as $warehouse): ?>
                                            <tr>
                                                <td colspan="4" class="bg-light">
                                                    <?=h('คลังสินค้า: '.$warehouse->name)?>
                                                </td>
                                            </tr>
                                                <?php foreach ($warehouse->wh_products as $whProduct): ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $whProduct->product->code=='_temp'?'':$whProduct->product->code ?></td>
                                                        <td><?= $whProduct->product->name ?></td>
                                                        <td class="text-right"><?= $this->Number->format($whProduct->balance_amt) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
