<div class="row">
    <div class="col-md-12">
        <div class="row d-print-none">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <?= $this->Form->create('', ['id' => 'frm']) ?>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <h3 class="prompt-500 text-primary">รายงานออมเงิน</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-10">
                            <div class="col-md-12 text-center">
                                <p class="text-info"><small>***ไม่ต้องระบุวันที่ หากต้องการรายงานเงินออมคงค้างทั้งหมดในระบบของแต่ละสาขา</small></p>
                            </div>
                            <div class="col-md-2 offset-md-3">
                                <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'class' => 'form-control', 'label' => 'สาขา', 'options' => $branches]) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('start_date', ['placeholder' => '', 'class' => 'form-control', 'id' => 'start_date', 'type' => 'text', 'label' => 'ตั้งแต่วันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('end_date', ['placeholder' => '', 'class' => 'form-control', 'id' => 'end_date', 'type' => 'text', 'label' => 'ถึงวันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>

                        </div>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-2 offset-md-4">
                                <button class="btn btn-block btn-primary waves-effect">ค้นหา</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-block btn-secondary waves-effect" type="reset">Reset</button>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($dataArr) && !is_null($dataArr) && $isAllAccount == 'N') { ?>
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
                                    <h3 class="prompt-400 text-primary">รายงานออมเงิน</h3>
                                    <p>วันที่ <?= $startDate . ' - ' . $endDate ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>ชื่อบัญชี</th>
                                                    <th>ประเภท</th>
                                                    <th>จำนวนเงิน</th>
                                                    <th>วันที่</th>
                                                    <th>ทำรายการโดย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataArr as $data): ?>
                                                    <tr id="trpawn">

                                                        <td><?= h($data->saving_account->bpartner->name) ?></td>

                                                        <?php
                                                        $_word = '';
                                                        if ($data->isdeposit == "Y") {
                                                            $_word = 'ฝาก';
                                                        } else {
                                                            $_word = 'ถอน';
                                                        }
                                                        ?>
                                                        <td><?= h($_word) ?></td>
                                                        <td><?= h($data->amount) ?></td>
                                                        <td><?= h($data->created->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                                        <td><?= h($data->Seller->firstname . ' ' . $data->Seller->lastname) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if (isset($dataArr) && !is_null($dataArr) && $isAllAccount == 'Y') { ?>
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
                                        <h3 class="prompt-400 text-primary">รายงานเงินออมในระบบทั้งหมด</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ชื่อลูกค้า</th>
                                                        <th>วันที่สมัคร</th>

                                                        <th class="text-right">จำนวนเงินคงเหลือ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $totalAmt = 0;?>
                                                    <?php foreach ($dataArr as $index => $data): ?>
                                                        <tr id="trpawn">
                                                            <td><?= ($index+1) ?></td>
                                                            <td><?= h($data->bpartner->name) ?></td>
                                                            <td><?= h($data->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                                            <td class="text-right"><?= $this->Number->format($data->balanceamt) ?></td>
                                                        </tr>
                                                        <?=$totalAmt+=$data->balanceamt;?>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td colspan="3" class="text-right"><strong>รวมเงินออมที่มีทั้งหมด</strong></td>
                                                        <td class="text-right"><strong><?= $this->Number->format($totalAmt) ?></strong> บาท</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-right"><strong>รวมจำนวนคนออมทั้งหมด</strong></td>
                                                        <td class="text-right"><strong><?= $this->Number->format(sizeof($dataArr)) ?></strong> คน</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
            //setDefaultToDayDate('start_date');
            //setDefaultToDayDate('end_date');

            $('button[type="reset"]').on('click', function () {
                window.location.href = window.location.href;
            });
        });
    </script>