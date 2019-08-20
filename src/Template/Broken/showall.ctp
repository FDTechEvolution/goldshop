
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">รายการชำรุดประจำวันที่ <?= $todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE); ?></h3>

            <div class="col-12 bt-tool text-right">
                <?= $this->Html->link(BT_ADD, ['action' => 'index'], ['escape' => false]) ?> 
            </div>
            <div class="row">
               
                <div class="col-lg-4 col-md-6">
                    <div class="widget-bg-color-icon card-box fadeInDown animated">
                        <div class="bg-icon bg-icon-primary pull-left">
                            <i class="mdi mdi-scale text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($weightAmt) ?></b></h3>
                            <p class="text-muted mb-0">น้ำหนักชำรุดวันนี้ (กรัม)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-danger pull-left">
                            <i class="mdi mdi-format-list-numbers text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $qty ?></b></h3>
                            <p class="text-muted mb-0">จำนวนรายการวันนี้</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>วันที่ทำรายการ</th>
                        <th>หมายเลขเอกสาร</th>
                        <th>รายการ</th>
                        <th>จากคลังสินค้า</th>
                        <th>สถานะ</th>
                        <th>พนักงาน</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($goodsReceipts as $item): ?>
                        <tr class="hand-cursor" data-url="<?= SITE_URL ?>broken/view/<?= $item->id ?>">

                            <td class="column-date"><?= h($item->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td class=""><?= h($item->docno) ?></td>
                            <td></td>
                            <td class=""><?= $item->has('FromWarehouse') ? $item->FromWarehouse->name : '' ?></td>

                            <td class="">
                                <span class="badge badge-<?= $item->status == 'CO' ? 'success' : 'warning' ?>">
                                    <?= h($docStatusList[$item->status]['name']) ?>
                                </span>
                            </td>
                            <td class=""><?= $item->has('Seller') ? $item->Seller->firstname : '' ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var url = $(this).attr("data-url");
            console.log(url);
            location.href = url;

        });

    });
</script>