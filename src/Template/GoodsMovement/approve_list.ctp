
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รับสินค้า</h3>
            <p class="text-muted font-13 m-b-30">
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>วันที่ทำรายการ</th>
                        <th>หมายเลขเอกสาร</th>
                        <th>คลังสินค้า</th>
                        <th>สถานะ</th>
                        <th>เพิ่มโดย</th>
                        <th>เพิ่มวันที่</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($goodsReceipts as $item): ?>
                        <tr>
                            <td class="" width="100px">
                                <?= $this->Html->link('<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="mdi mdi-checkbox-marked-circle"></i>ตรวจรับ</button>', ['action' => 'view', $item->id,'approve'=>'Y'],['escape'=>false]) ?>
                            </td>

                            <td class="column-date"><?= h($item->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                            <td class=""><?= h($item->docno) ?></td>
                            <td class=""><?= $item->has('ToWarehouse') ? $item->ToWarehouse->name : '' ?></td>
                            <td class="">
                                <span class="badge badge-<?= $item->status == 'CO' ? 'success' : 'warning' ?>">
                                    <?= h($docStatusList[$item->status]['name']) ?>
                                </span>
                            </td>
                            <td class=""><?= $item->UserCreated->username ?></td>
                            <td class="column-date"><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>