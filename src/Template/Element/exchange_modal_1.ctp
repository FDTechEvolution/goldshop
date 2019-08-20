<div id="exchange_product_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-primary prompt-500">รายการขอแลกเปลี่ยน</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table id="list_exchange_modal" class="table table-hover no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">

                        <thead>
                            <tr role="row">

                                <th>ลูกค้า</th>
                                <th>วันที่</th>
                                <th>รายการ</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoiceExchanges as $invoice): ?>
                                <tr role="row" class="hand-cursor" id="<?= h($invoice->id) ?>">


                                    <td><?= $invoice->bpartner->name ?></td>
                                    <td class="column-date"><?= h($invoice->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                    <?php
                                    $lines = $invoice->invoice_lines;
                                    $des = '';
                                    if (sizeof($lines) > 0) {
                                        $des = $lines[0]['product']['name'];
                                    }
                                    ?>
                                    <td><?= h($des) ?></td>
                                    <td><strong><?= $this->Number->format($invoice->totalamt) ?></strong></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $this->Form->hidden('invoice_exchange_id', ['id' => 'invoice_exchange_id']) ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="list_exchange_modal_save">เลือก</button>
            </div>
        </div>
    </div>
</div>
