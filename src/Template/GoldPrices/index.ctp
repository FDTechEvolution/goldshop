<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">ราคาทองประจำวัน</h3>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['action' => 'add'], ['escape' => false]) ?> 
            </div>
            <table class="table table-hover" id="datatable-buttons">
                <thead>
                    <tr>
                        <th class="column-tool-bt"></th>
                        <th>วันที่</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (sizeof($goldPrices) == 0) { ?>
                        <tr>
                            <td colspan="2" class="text-center">ยังไม่มีข้อมูล</td>
                        </tr>
                    <?php } ?>
                    <?php foreach ($goldPrices as $goldPrice): ?>
                        <tr>
                           <td class="actions">
                                <?= $this->Html->link(BT_VIEW, ['action' => 'view','d'=> $goldPrice->pricedate->i18nFormat(DATE_FORMATE, null, TH_DATE)], ['escape' => false]) ?>
                                
                            </td>
                            <td><?= h($goldPrice->pricedate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>