
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 text-center">
                <h5><?= h('ราคาทองตามประกาศของสมาคมค้าทองคำ ' . $masterPrice->title) ?></h5>
            </div>
            <div class="col-md-6">
                <div class="widget-simple text-center card-box">
                    <h3 class="text-primary counter font-bold mt-0"><?= number_format($masterPrice->gold_bar_purchase_price) ?></h3>
                    <p class="text-muted mb-0">ราคารับซื้อทองคำแท่ง</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="widget-simple text-center card-box">
                    <h3 class="text-success counter font-bold mt-0"><?= number_format($masterPrice->gold_bar_sales_price) ?></h3>
                    <p class="text-muted mb-0">ราคาขายทองคำแท่ง</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="widget-simple text-center card-box">
                    <h3 class="text-primary font-bold mt-0"><?= number_format($masterPrice->gold_purchase_price) ?></h3>
                    <p class="text-muted mb-0">ราคารับซื้อทองรูปพรรณ</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="widget-simple text-center card-box">
                    <h3 class="text-success counter font-bold mt-0"><?= number_format($masterPrice->gold_sales_price) ?></h3>
                    <p class="text-muted mb-0">ราคาขายทองคำรูปพรรณ</p>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box" id="box_gold_all_price"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="text-primary header-title m-t-0"><i class="fa fa-diamond"></i>แจ้งเตือน จำนำครบกำหนด</h4>

            <table class="table table table-hover" id="tb_pawn_due">
                <thead>
                    <tr>
                        <th>วันครบกำหนด</th>
                        <th>ลูกค้า</th>

                        <th>จำนวนเงิน</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pawnDues as $item): ?>
                        <tr data-url="<?= h(SITE_URL . 'pawns/view/' . $item->id) ?>" class="hand-cursor">
                            <td><?= !is_null($item->expiredate) ? h($item->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) : '' ?></td>
                            <td><?= $item->bpartner->name ?></td>

                            <td><?= $this->Number->format($item->totalmoney) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title m-t-0 text-primary"><i class="mdi mdi-cart"></i>แจ้งเตือน การสั่งซื้อครบกำหนด</h4>

            <table class="table table table-hover" id="">
                <thead>
                    <tr>
                        <th>วันครบกำหนด</th>
                        <th>ลูกค้า</th>
                        <th>รายการสั่ง</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDues as $item): ?>
                        <?php
                        $des = '';
                        foreach ($item->order_lines as $key => $line) {
                            $des = $key == 0 ? '-' . $line->product->name : $des . '<br/>-' . $line->product->name;
                        }
                        ?>
                        <tr data-url="<?= h(SITE_URL . 'purchase-orders/view/' . $item->id) ?>" class="hand-cursor">
                            <td><?= $item['duedate'] != null ? h($item['duedate']->i18nFormat(DATE_FORMATE, null, TH_DATE)) : '' ?></td>
                            <td><?= $item->bpartner->name ?></td>
                            <td><small><?= $des ?></small></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?=$this->Html->script('update-store-price.js')?>
<?=$this->Html->script('gold-price.js')?>
<script>
    $(document).ready(function () {
        $("table").delegate('tr', 'click', function () {
            var url = $(this).attr("data-url");
            if (url !== 'undefined' && url !== undefined) {
                document.location = url;
            }
        });
    });


</script>
