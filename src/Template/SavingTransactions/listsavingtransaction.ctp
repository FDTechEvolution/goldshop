<?= $this->element('Lib/data_table') ?> 
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title border-bottom pb-2"><i class="mdi mdi-format-list-bulleted"></i> รายการเงินออมประจำวันที่ <?= h($todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></h3>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-warning pull-left">
                            <i class="ion-social-bitcoin text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($sumDep) ?></b></h3>
                            <p class="text-muted mb-0">มูลค่าเงินฝากวันนี้ (บาท)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-warning pull-left">
                            <i class="mdi mdi-format-list-numbers text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($countDep) ?></b></h3>
                            <p class="text-muted mb-0">จำนวนรายการ ฝาก วันนี้</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="ion-social-bitcoin text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($sumWit) ?></b></h3>
                            <p class="text-muted mb-0">มูลค่าถอนเงินวันนี้ (บาท)</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="mdi mdi-format-list-numbers text-pink"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($countWit) ?></b></h3>
                            <p class="text-muted mb-0">จำนวนรายการ ถอน วันนี้</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>


            </div>
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
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
                            <td><?= number_format($data->amount) ?></td>
                            <td><?= h($data->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td><?= h($data->Seller->firstname . ' ' . $data->Seller->lastname) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

