<div class="row">
    <div class="col-md-12">
        <div class="row d-print-none">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <?= $this->Form->create('', ['id' => 'frm']) ?>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <h3 class="prompt-500 text-primary">รายการสั่งทำ</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-10">
                            <div class="col-md-2 offset-md-3">
                                <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'class' => 'form-control', 'label' => 'สาขา', 'options' => $branches]) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('start_date', ['placeholder' => '', 'class' => 'form-control', 'id' => 'start_date', 'type' => 'text', 'label' => 'ตั้งแต่วันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('end_date', ['placeholder' => 'กรุณาเลือกวันที่', 'class' => 'form-control', 'id' => 'end_date', 'type' => 'text', 'label' => 'ถึงวันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
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
        <?php if (isset($orders) && !is_null($orders)) { ?>
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
                                    <h3 class="prompt-400 text-primary">รายการสั่งทำ</h3>
                                    <p>วันที่ <?= $startDate . ' - ' . $endDate ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <?php $date = ''; ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr style="background-color: #BDBDBD;">
                                                    <th class="text-center" width="80px">#</th>
                                                    <th class="text-center" width="150px">วัน/เวลาทำรายการ</th>
                                                    <th>หมายเลขเอกสาร</th>
                                                    <th>ผู้ขาย/ผู้ผลิต/ช่าง</th>
                                                    <th class="text-left">รายการ</th>
                                                    <th class="text-right" width="150px">จำนวนเงิน/ต้นทุน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orders as $key => $order): ?>
                                                    <?php foreach ($order->order_lines as $keyLine => $line): ?>
                                                        <tr>
                                                            <td class="text-center"><?=$keyLine==0?$this->Number->format($key+1):'' ?></td>
                                                            <td class="text-center"><?=$keyLine==0?h($order->modified->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)):'' ?></td>
                                                            <td><?=$keyLine==0?$order->docno:''?></td>
                                                            <td><?=$keyLine==0?$line->bpartner->name:''?></td>
                                                            <td class="text-left"><?=h($line->product->name)?></td>
                                                            <td class="text-right"><?= $this->Number->format($line->order_price)?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>

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
