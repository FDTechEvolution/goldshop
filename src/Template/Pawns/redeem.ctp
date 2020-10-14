<?= $this->Form->create($pawn, ['id' => 'pawn']) ?>
<?= $this->Form->control('totalmoney', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'totalmoney']) ?>
<?= $this->Form->control('current_startdate', ['type' => 'hidden', 'id' => 'current_startdate', 'value' => $pawn->startdate->i18nFormat(DATE_FORMATE, null, TH_DATE), 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
<?= $this->Form->control('current_expiredate', ['type' => 'hidden', 'id' => 'current_expiredate', 'value' => $pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE), 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
<?= $this->Form->control('receiptamt', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'receiptamt', 'value' => '0']) ?>
<?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
<?= $this->Form->hidden('interestamt', ['label' => false, 'id' => 'interestamt', 'value' => '0']) ?>
<?= $this->Form->hidden('interestamt2', ['label' => false, 'id' => 'interestamt2', 'value' => '0']) ?>
<?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
<?= $this->Form->hidden('discountamt', ['id' => 'discountamt', 'value' => '0']) ?>
<?= $this->Form->hidden('savingamt', ['value' => '0', 'id' => 'savingamt']) ?>
<?= $this->Form->hidden('totalamt', ['label' => false, 'id' => 'totalamt', 'value' => '0']) ?>
<?= $this->Form->hidden('daydiff', ['label' => false, 'id' => 'daydiff', 'value' => '0']) ?>
<div class="row">
    <div class=" col-md-8  col-lg-8 col-xs-8">
        <div class="card-box ">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">

                        <h3 class="card-title text-primary prompt-500 fa-3x"><i class="fas fa-calendar-plus"></i> ไถ่ถอน No.<?= $pawn->docno ?></h3>
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
                    <h3 class="title-header prompt-500 text-primary">รายละเอียดการไถ่ถอน</h3>
                    <div class="row">
                       
                        <div class="col-4 form-group">
                            <label>วันที่ไถ่ถอน</label>
                            <?= $this->Form->control('returndate', ['type' => 'text', 'id' => 'returndate', 'readonly' => 'readonly', 'class' => 'form-control form-control-lg', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class="col-4 form-group">
                            <label >อัตราดอกเบี้ย </label>
                            <?= $this->Form->control('type', ['id' => 'type', 'class' => 'form-control form-control-lg', 'label' => false, 'options' => $rates]) ?>
                        </div>
                        <div class="col-4 form-group">
                            <label for="code">พนักงานขาย</label>
                            <?= $this->Form->select('seller', [], ['class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class="col-12 form-group">
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
            <dl class="row prompt-500 summary-detail">
                <dt class="col-6"><h4>เงินต้น</h4></dt>
                <dd class="col-6 text-right"><h4><?= number_format($pawn->totalmoney) ?></h4></dd>
                <dt class="col-7"><h4>ดอกเบี้ย <span id="t-rate"><?= $pawn['type'] ?></span></h4></dt>
                <dd class="col-5 text-right"><h4 id="t-interrestamt">0</h4></dd>
                <dt class="col-8"><h5>ดอกเบี้ยส่วนเกิน <span id="t-rate2"></span></h5></dt>
                <dd class="col-4 text-right"><h4 id="t-interrestamt2">0</h4></dd>
                <dt class="col-6"><h4>ส่วนลด</h4></dt>
                <dd class="col-6 text-right"><h4 id="l_discount_amt">0</h4></dd>
                <dt class="col-6"><h4>ใช้เงินออม</h4></dt>
                <dd class="col-6 text-right"><h4 id="l_saving_amt">0</h4></dd>
                <dt class="col-6"><h2>เงินสุทธิ</h2></dt>
                <dd class="col-6 text-right"><h2 id="t-totalamt" class="text-success">0</h2></dd>
            </dl>
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
                                    <th>วันที่</th>

                                    <th>หมายเหตุ/รายละเอียด</th>
                                    <th class="text-right">เงินต้น</th>
                                    <th class="text-right">ดอกเบี้ย</th>
                                    
                                </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pawn['pawn_transactions'] as $index => $transaction): ?>
                                <tr>
                                        <td><?= $pawnTransactionType[$transaction->type] ?></td>
                                        <td>
                                            <?php 
                                            $strStart = $transaction->start_date!=''?($transaction->start_date->i18nFormat(DATE_FORMATE, null, TH_DATE)):'';
                                            $strEnd = $transaction->end_date!=''?($transaction->end_date->i18nFormat(DATE_FORMATE, null, TH_DATE)):'';
                                            
                                            if($transaction->type == 'NEW'){
                                                echo $strStart;
                                            }else if($transaction->type == 'RF'){
                                                 echo ($pawn->returndate->i18nFormat(DATE_FORMATE, null, TH_DATE));
                                            }else{
                                                echo $strStart.' - '.$strEnd;
                                            }
                                                
                                                ?>
                                       
                                        </td>
                                        <td><?= h($transaction->description) ?></td>
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
<?= $this->Html->script('pawn/redeem.js') ?>
<script>

    
    
</script>