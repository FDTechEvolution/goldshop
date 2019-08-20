<div class="row">
    <div class="col-md-12 text-center">
        <h5><?= h('ราคาทองตามประกาศของสมาคมค้าทองคำ '.$masterPrice->title) ?></h5>
    </div>
    <div class="col-md-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary counter font-bold mt-0"><?= number_format($masterPrice->gold_bar_purchase_price) ?></h3>
            <p class="text-muted mb-0">ราคารับซื้อทองคำแท่ง></p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-success counter font-bold mt-0"><?= number_format($masterPrice->gold_bar_sales_price) ?></h3>
            <p class="text-muted mb-0">ราคาขายทองคำแท่ง</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-primary font-bold mt-0"><?= number_format($masterPrice->gold_purchase_price) ?></h3>
            <p class="text-muted mb-0">ราคารับซื้อทองรูปพรรณ></p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="widget-simple text-center card-box">
            <h3 class="text-success counter font-bold mt-0"><?= number_format($masterPrice->gold_sales_price) ?></h3>
            <p class="text-muted mb-0">ราคาขายทองคำรูปพรรณ</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card-box table-responsive">
            <iframe id="size_iframe" src="<?= SITE_URL . 'gold-prices' ?>" frameborder="0" scrolling="yes" width="100%" height="700px"> </iframe>
        </div>
    </div>

    <div class="col-6">
        <div class="card-box table-responsive">

            <iframe id="size_iframe" src="<?= SITE_URL . 'costs/view' ?>" frameborder="0" scrolling="yes" width="100%" height="700px"> </iframe>

        </div>
    </div>
</div>