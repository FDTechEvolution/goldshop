<?= $this->element('Lib/data_table') ?> 
<div class="row">
    <div class="col-md-12">
        <div class="card-box ">
            <div class="row bt-tool">
                <div class="col-12 text-center">
                    <?= $this->Form->create('search_frm') ?>
                    <div class="form-row">
                        <div class="form-group col-3">
                            <?= $this->Form->select('type', ['all' => 'ทั้งหมด', 'today' => 'วันนี้', 'select_date' => 'เลือกวันที่เอง'], ['class' => 'form-control form-control-lg', 'id' => 'type']) ?>
                        </div>
                        <div class="form-group col-2" style="display: none;" id="box-select-start-date">
                            <?= $this->Form->control('start_date', ['id' => 'start_date', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'placeholder' => 'วันที่เริ่มต้น', 'class' => 'form-control form-control-lg', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-2" style="display: none;" id="box-select-end-date">
                            <?= $this->Form->control('end_date', ['id' => 'end_date', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'placeholder' => 'วันที่สิ้นสุด', 'class' => 'form-control form-control-lg', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-4">
                            <?= $this->Form->select('docstatus', ['all' => 'ทั้งหมด', 'CO' => 'เสร็จสมบูรณ์', 'RF' => 'ไถ่ถอน', 'VO' => 'ยกเลิกแล้ว', 'EXPIRE' => 'หมดอายุ/หลุดจำนำ'], ['class' => 'form-control form-control-lg']) ?>
                        </div>
                        <div class="form-group col-1">
                            <button class="btn btn-secondary btn-lg btn-block" type="submit">OK</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>

            <div class="row">
                <div class=" col-12 order-2">
                    <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>เลขที่ใบจำนำ</th>
                                <th>ชื่อลูกค้า</th>
                                <th>สถานะ</th>
                                <th>วันเริ่ม</th>
                                <th>สิ้นสุด</th>

                                <th class="text-right">จำนวนเงิน</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pawns as $pawn):
                                $word = '';
                            if($pawn->type=='VO'){
                                continue;;
                            }
                                ?>
                                <tr data-url="<?=SITE_URL?>pawns/view/<?=$pawn->pawn_id?>">

                                    <td><?= h($pawn->pawn->docno) ?></td>
                                    <td><?= h($pawn->pawn->bpartner->name) ?></td>
                                    <td>
                                        <span class="badge badge-<?php
                                        if ($pawn->type == 'RF') {
                                            echo 'success';
                                            $word = 'ไถ่ถอน';
                                        } else if ($pawn->type == 'RN') {
                                            echo 'warning';
                                            $word = 'ต่อดอก';
                                        } else {
                                            $word = $pawn->type;
                                            echo 'secondary';
                                        }
                                        ?>">
                                                  <?= $word ?>
                                        </span>
                                    </td>
                                    <td><?= is_null($pawn->start_date)?'': h($pawn->start_date->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                    <td><?= is_null($pawn->end_date)?'': h($pawn->end_date->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                    <td class="text-right"><?= $this->Number->format($pawn->interestamt) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class=" col-12 order-1">
                    <h3 class="m-t-0 gold-title"><i class="mdi mdi-account-multiple"></i> รายการไถ่ถอน/ต่อดอก</h3>
                    <div class="row">
                        <div class="col-3">
                            <div class="widget-bg-color-icon card-box">
                                
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($sumRF) ?></b></h3>
                                    <p class="text-muted mb-0">มูลค่าไถ่ถอน (บาท)</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="widget-bg-color-icon card-box">
                               
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($countRF) ?></b></h3>
                                    <p class="text-muted mb-0">รายการ ไถ่ถอน</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="widget-bg-color-icon card-box">
                                
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($sumRN) ?></b></h3>
                                    <p class="text-muted mb-0">มูลค่าต่อดอก (บาท)</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="widget-bg-color-icon card-box">
                               
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($countRN) ?></b></h3>
                                    <p class="text-muted mb-0">รายการ ต่อดอก</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#datatable-buttons > tbody tr").click(function () {
            var selectedUrl = $(this).attr('data-url');
            document.location = selectedUrl;
        });
    });
</script>
