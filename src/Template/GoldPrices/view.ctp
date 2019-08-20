<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">ราคาทองประจำวันที่ <?= h($price->pricedate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></h3>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link('<button type="button" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-plus-circle-multiple-outline"></i> แก้ไข</button>', ['action' => 'add'], ['escape' => false]) ?> 
            </div>
            <table class="table table-hover" id="">
                <thead>
                    <tr>
                        <th>น้ำหนัก</th>
                        <th>ขายออก (บาท)</th>
                        <th>ซื้อเข้า (บาท)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $priceLines = $price->gold_price_lines; ?>
                    <?php foreach ($priceLines as $line): ?>
                        <tr>
                            <td><?= $line->sd_weight->name ?></td>
                            <td><?= $this->Number->format($line->sales_price) ?></td>
                            <td><?= $this->Number->format($line->purchase_price) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>