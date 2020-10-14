<?= $this->Form->create($pawn, ['id' => 'pawn']) ?>
<?= $this->Form->control('totalmoney', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'totalmoney']) ?>
<?= $this->Form->control('current_startdate', ['type' => 'hidden', 'id' => 'current_startdate', 'value' => $pawn->startdate->i18nFormat(DATE_FORMATE, null, TH_DATE), 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
<?= $this->Form->control('current_expiredate', ['type' => 'hidden', 'id' => 'current_expiredate', 'value' => $pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE), 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
<?= $this->Form->control('receiptamt', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'receiptamt', 'value' => '0']) ?>
<?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
<?= $this->Form->hidden('interestamt', ['label' => false, 'id' => 'interestamt', 'value' => '0']) ?>
<div class="row">
    <div class=" col-md-8  col-lg-8 col-xs-8">
        <div class="card-box ">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">

                        <h3 class="card-title text-primary prompt-500 fa-3x"><i class="fas fa-calendar-plus"></i> ต่อดอก No.<?= $pawn->docno ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <?php
                    $bp = $pawn->bpartner;
                    $address = $bp->address;
                    ?>
                    <h3 class="title-header prompt-500 text-primary">ลูกค้า</h3>
                    <address style="margin-bottom: 0px;">
                        <h4><?= h($bp->name) ?></h4>
                        <?php if (!is_null($address) && $address != '') { ?>
                            <?= 'ที่อยู่ ' . ($address->address_line == '' ? '-' : $address->address_line) ?>
                        <?php } ?>
                    </address>

                </div>
                <div class="col-6">
                    <h3 class="title-header prompt-500 text-primary">รายละเอียด</h3>
                    <dl class="row">
                        <dt class="col-5">เงินต้น</dt>
                        <dd class="col-7"><?= number_format($pawn->totalmoney) ?></dd>
                        <dt class="col-5">วันรับจำนำ</dt>
                        <dd class="col-7"><?= $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></dd>
                        <dt class="col-5">วันเริ่มต้น</dt>
                        <dd class="col-7"><?= $pawn->startdate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></dd>
                        <dt class="col-5">วันครบกำหนด</dt>
                        <dd class="col-7"><?= $pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></dd>
                        <dt class="col-5">คลังเก็บ</dt>
                        <dd class="col-7"><?= sprintf('สาขา%s-%s', $pawn->warehouse->branch->name, $pawn->warehouse->name) ?></dd>
                    </dl>
                </div>
                <div class="col-12">
                    <h3 class="title-header prompt-500 text-primary">รายละเอียดการต่อดอก</h3>
                    <div class="row">
                        <div class="col-4 form-group">
                            <label>จำนวนเดือนที่ต้องการต่อดอก</label>
                            <select name="extend_month_amt" id="extend_month_amt" class="form-control form-control-lg">
                                <option value="1">1 เดือน</option>
                                <option value="2">2 เดือน</option>
                                <option value="3" selected>3 เดือน</option>
                                <option value="4">4 เดือน</option>
                                <option value="5">5 เดือน</option>
                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <label>ต่อดอกถึงวันที่</label>
                            <?= $this->Form->control('expiredate', ['type' => 'text', 'id' => 'expiredate', 'readonly' => 'readonly', 'class' => 'form-control form-control-lg', 'label' => false]) ?>
                            <?= $this->Form->control('_expiredate', ['type' => 'hidden', 'id' => '_expiredate', 'readonly' => 'readonly', 'class' => 'form-control form-control-lg', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class="col-4 form-group">
                            <label >อัตราดอกเบี้ย </label>
                            <?= $this->Form->control('type', ['id' => 'type', 'class' => 'form-control form-control-lg', 'label' => false, 'options' => $rates]) ?>
                        </div>
                        <div class="col-4 form-group">
                            <label for="code">พนักงานขาย</label>
                            <?= $this->Form->select('seller', [], ['class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class="col-8 form-group">
                            <label for="code">รายละเอียด/หมายเหตุ</label>
                            <?= $this->Form->control('description', ['id' => 'description', 'class' => 'form-control form-control-lg', 'label' => false]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>

        </div>
    </div>
    <div class="col-4">
        <div class="card m-b-20 card-body">
            <div class="row m-b-10">

                <div class="col-md-6 text-left prompt-500" >
                    <h4 class="" style="margin-bottom: 0px;">ดอกเบี้ย <span id="t-rate"><?= $pawn['type'] ?></span></h4>
                </div>
                <div class="col-md-6 text-right color-green" >
                    <?php
                    $interestAmt = $pawn['pawn_transactions'][0]['interestamt'];
                    ?>
                    <h4 class="font-weight-bold" style="margin-bottom: 0px;"><span id="t-interrestamt"><?= number_format($interestAmt) ?></span></h4>
                </div>
                <div class="col-md-12" id="box_date"  style="display: none;">
                    <h5 class="prompt-500" style="margin-top: 0px;">วันที่ <strong id="l_date">0</strong></h5>

                </div>
            </div>

            <div class="row" style="display: none;">
                <div class="col-md-7 text-left">
                    <h3 class="prompt-400" id="totalamt_title_label">จำนวนเงิน</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h3 id="subtotalamt_label" class="">0</h3>
                    <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => $interestAmt]) ?>
                </div>
            </div>
            <div class="row" id="box_discount">
                <div class="col-md-7 text-left">
                    <h4 class="text-warning prompt-300" style="margin-bottom: 0px;">ส่วนลด</h4>
                </div>
                <div class="col-md-5 text-right text-warning">
                    <h4 id="l_discount_amt" class="prompt-500" style="margin-bottom: 0px;">0</h4>
                </div>
                <?= $this->Form->hidden('discountamt', ['id' => 'discountamt', 'value' => '0']) ?>
            </div>
            <div class="row" id="-box_saving">
                <div class="col-md-7 text-left">
                    <h4 class="text-warning prompt-300" style="margin-bottom: 0px;">ใช้เงินออม</h4>
                </div>

                <div class="col-md-5 text-right color-green">
                    <h4 id="l_saving_amt" class="prompt-400" style="margin-bottom: 0px;">0</h4>
                    <?= $this->Form->hidden('savingamt', ['value' => '0', 'id' => 'savingamt']) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 text-left">
                    <h3 class="text-success prompt-400" id="totalamt_title_label">เงินสุทธิ</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h2 id="t-totalamt" class="text-success"><?= number_format($interestAmt) ?></h2>
                    <?= $this->Form->hidden('totalamt', ['label' => false, 'id' => 'totalamt', 'value' => $interestAmt]) ?>
                </div>
            </div>
            <hr/>
            <div class="row">

                <div class="col-md-6 text-left button-list" style="display: none;" id="box_saving_bt">
                    <button type="button" class="btn btn-block btn-lg btn-outline-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_saving_modal"> 
                        <i class=" mdi mdi-coin m-r-5"></i> <span>เงินออม</span> 
                    </button>
                </div>
                <?= ''// $this->element('NumericKeybord/pawnreturn'); ?>
                <?= $this->element('key_receipt_modal') ?>

            </div>
            <div class="row">
                <div class="col-md-12 m-b-10 button-list">
                    <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 5px 0px;" id="bt_submit"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12">
        <div class="card-box ">
            <div class="row">
                <div class="col-12">
                    <h3 class="prompt-500">ประวัติการทำรายการล่าสุด</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>การทำรายการ</th>
                                <th>ช่วงเวลา</th>
                        
                                <th>หมายเหตุ/รายละเอียด</th>
                                <th class="text-right">เงินต้น</th>
                                <th class="text-right">ดอกเบี้ย</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pawn['pawn_transactions'] as $index => $transaction): ?>
                                <tr>
                                    <td><?= $pawnTransactionType[$transaction->type] ?></td>
                                    <td><?= h($transaction->start_date->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?> - <?= h($transaction->end_date->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?=h($transaction->description)?></td>
                                    <td class="text-right"><?= $this->Number->format($transaction->amount) ?></td>
                                    <td class="text-right"><?= $this->Number->format($transaction->type == 'NEW' ? 0 : $transaction->interestamt) ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
            <hr/>
            <div class="row ">
                <div class="col-md-12">
                    <h3 class="prompt-400"><i class="mdi mdi-book-open"></i> รายการรับจำนำ</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <table id="listdata" class="table table-striped">
                        <tr>

                            <th class="text-left">สินค้า</th>
                            <th class="text-center">ภาพ</th>
                            <th class="text-center">หมายเหตุ </th>
                            <th class="text-right">ราคา</th>
                        </tr>
                        <?php foreach ($pawn->pawn_lines as $pawnLines): ?>
                            <tr>
                                <?php
                                if (is_null($pawnLines->image) || $pawnLines->image == '') {
                                    $picture = 'img/noimage.png';
                                } else {
                                    $picture = $pawnLines->image->path;
                                }
                                ?>
                                <td class="text-left"><?= h($pawnLines->product->name) ?></td>
                                <td style="text-align: center">    <img id="blah" src="<?= SITE_URL . $picture ?>" alt="your image" class="thumb-image" height="40" width="40" />    </td>
                                <td><?= h($pawnLines->description) ?></td>
                                <td class="text-right"><?= number_format($pawnLines->amount) ?></td>


                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<?= $this->Html->script('gold-selector.js') ?>
<?= $this->Html->script('pawn/extend.js') ?>
<script>

    $(document).ready(function () {

        setDefaultToDayDate('thisdate');

    });

    function toFixed(num, pre) {
        num *= Math.pow(10, pre);
        num = (Math.round(num, pre) + (((num - Math.round(num, pre)) >= 0.5) ? 1 : 0)) / Math.pow(10, pre);
        return num.toFixed(pre);
    }

    $(function () {
        jQuery('#returndate').datepicker({

            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
    });

    setDefaultToDayDate('returndate');
    $(function () {
        jQuery('#docdate').datepicker({
            //    language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#date').datepicker({
            //   language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#thisdate').datepicker({
            //   language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
</script>