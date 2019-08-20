<div class="row">

    <div class="col-md-12">
        <div class="row d-print-none">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <?= $this->Form->create('', ['id' => 'frm']) ?>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <h3 class="prompt-500 text-primary">รายงานรายรับ-รายจ่าย</h3>
                                <p>***แสดงเฉพาะรายการที่ปิดบัญชีแล้วเท่านั้น</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-10">
                            <div class="col-md-2 offset-md-3">
                                <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'empty' => 'กรุณาเลือกสาขา', 'class' => 'form-control', 'label' => 'สาขา', 'options' => $branches]) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('start_date', ['placeholder' => '', 'class' => 'form-control', 'id' => 'start_date', 'type' => 'text', 'label' => 'ตั้งแต่วันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('end_date', ['placeholder' => 'กรุณาเลือกวันที่', 'class' => 'form-control', 'id' => 'end_date', 'type' => 'text', 'label' => 'ถึงวันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
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
        <?php if (isset($incomes) && !is_null($incomes)) { ?>
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
                                    <h3 class="prompt-400 text-primary">รายงานรายรับ-รายจ่าย</h3>
                                    <p>วันที่ <?= $startDate . ' - ' . $endDate ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <?php
                                    $creditAmt = 0;
                                    $debitAmt = 0;
                                    ?>

                                    <div class="table-responsive">
                                        <?php foreach ($incomes as $income) : ?>
                                            <h4 class="h4 text-left prompt-400 text-primary">ประจำวันที่ <?=$income->close_date->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></h4>
                                            <table class="table table-bordered table-sm m-b-30">
                                                <thead>
                                                    <tr style="background-color: #BDBDBD;">
                                                        <th class="text-left">รายการ</th>
                                                        <th class="text-right" width="150px">จำนวนเงิน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($income->close_day_lines as $item): ?>

                                                    <tr class="<?=$item->credit_amt !=0?'table-active':''?>">
                                                            <td class="text-left"><?= h($item->description) ?></td>
                                                            <td class="text-right"><?= $this->Number->format($item->debit_amt + $item->credit_amt) ?></td>

                                                        </tr>

                                                    <?php endforeach; ?>
                                                    <tr class="bg-white">
                                                        <td class="text-right font-weight-bold">รวมเงินเข้า</td>
                                                        <td class="text-right"><strong><?= $this->Number->format($income->receipt_amt) ?></strong></td>
                                                    </tr>
                                                    <tr class="bg-white">
                                                        <td class="text-right font-weight-bold">รวมเงินออก</td>
                                                        <td class="text-right"><strong><?= $this->Number->format($income->paid_amt) ?></strong></td>
                                                    </tr>
                                                    <tr class="bg-white">
                                                        <td class="text-right font-weight-bold">Grand Total</td>
                                                        <td class="text-right"><strong><?= $this->Number->format($income->actual_amt) ?></strong></td>
                                                    </tr>
                                                    <tr class="bg-white">
                                                        <td class="text-right font-weight-bold">ยอดเงินนับจริง</td>
                                                        <td class="text-right"><strong><?= $this->Number->format($income->actual_manual_amt) ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        setDefaultToDayDate('start_date');
        setDefaultToDayDate('end_date');
    });
</script>
