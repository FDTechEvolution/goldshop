<?= $this->element('Lib/data_table') ?> 
<div class="col-md-12">
    <div class="card-box ">
        <?= $this->Form->create('pawn', ['horizontal' => true, 'method' => 'post']); ?>
        <div class="row bt-tool">
            <div class=" col-md-12 ">
                <h3 class="m-t-0 gold-title"><i class="mdi mdi-account-multiple"></i> รายการไถ่ถอน/ต่อดอกประจำวันที่ <?= h($todayDate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></h3>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-warning pull-left">
                                <i class="ion-social-bitcoin text-success"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($sumRF) ?></b></h3>
                                <p class="text-muted mb-0">มูลค่าไถ่ถอนวันนี้ (บาท)</p>
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
                                <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($countRF) ?></b></h3>
                                <p class="text-muted mb-0">รายการ ไถ่ถอน วันนี้</p>
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
                                <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($sumRN) ?></b></h3>
                                <p class="text-muted mb-0">มูลค่าต่อดอกวันนี้ (บาท)</p>
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
                                <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($countRN) ?></b></h3>
                                <p class="text-muted mb-0">รายการ ต่อดอก วันนี้</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <?= $this->Form->end() ?>


        <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="text-align: center">เลขที่ใบจำนำ</th>
                    <th>ชื่อลูกค้า</th>
                    <th style="text-align: center">สถานะ</th>
                   
                    <th style="text-align: center">มูลค่า</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pawns as $pawn): 
                    $word='';
                    ?>
                    <tr>

                        <td style="text-align: center"><?= h($pawn->pawn->docno) ?></td>
                        <td><?= h($pawn->pawn->bpartner->name) ?></td>
                        <td style="text-align: center" class="">
                            <span class="badge badge-<?php
                            if ($pawn->type == 'RF') {
                                echo 'success';
                                $word='ไถ่ถอน';
                            } else if ($pawn->type == 'RN') {
                                echo 'warning';
                                $word='ต่อดอก';
                            } else {
                                echo 'secondary';
                            }
                            ?>">
                                      <?= $word ?>
                            </span>
                        </td>
                      
                        <td style="text-align: center" ><?= $this->Number->format($pawn->amount) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#pawn-table > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
    });
</script>
