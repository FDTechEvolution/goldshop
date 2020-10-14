<?= $this->element('Lib/data_table') ?> 
<div class="row">
    <div class="col-md-12">
        <div class="card-box ">
            <div class="row bt-tool">
                <div class="col-12 text-right" style="display: none;">
                    <?= $this->Html->link('รายการจำนำวันนี้', ['controller' => 'pawns', 'action' => 'listpawn'], ['class' => 'btn btn-secondary']) ?>
                    <?= $this->Html->link('รายการจำนำทั้งหมด', ['controller' => 'pawns', 'action' => 'listpawn', 'type' => 'all'], ['class' => 'btn btn-secondary']) ?>
                    <?= $this->Html->link('รายการหลุดจำนำ', ['controller' => 'pawns', 'action' => 'listpawn', 'type' => 'expire'], ['class' => 'btn btn-secondary']) ?>
                </div>
                <div class="col-12 text-center order-1">
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
                <div class=" col-md-12 order-3">
                    <div class="responsive-table-plugin">
                        <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>เลขที่</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>สถานะ</th>
                                    <th>รับจำนำวันที่</th>
                                    <th>วันครบกำหนด</th>

                                    <th>รายละเอียด</th>
                                    <th class="text-right">มูลค่า</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalAmt = 0;
                                $totalLine = 0;
                                $weightAmt = 0;
                                ?>
                                <?php foreach ($pawns as $pawn): ?>
                                    
                                        <?php
                                        $lineClass = '';
                                        $icon = '';
                                        if ($pawn->isoverprice == 'Y') {
                                            $lineClass = 'text-primary';
                                            $icon = '<i class="mdi mdi-alert-circle-outline"></i>';
                                        }
                                        ?>
                                        <tr  class="hand-cursor"  data-url="<?= SITE_URL . 'pawns/view/' . h($pawn->id) ?>" onclick="viewPawn('<?= $pawn->id ?>');">

                                            <td><?= h($pawn->docno) ?></td>
                                            <td><?= h($pawn->bpartner->name) ?></td>
                                            <td>
                                                <span class="badge badge-<?php
                                                if ($pawn->status == 'CO') {
                                                    echo 'success';
                                                } else if ($pawn->status == 'VO') {
                                                    echo 'warning';
                                                } else {
                                                    echo 'secondary';
                                                }
                                                ?>">
                                                          <?= h($docStatusList[$pawn->status]['name']) ?>
                                                </span>
                                            </td>
                                            <td><?= h($pawn->docdate!=null&&$pawn->docdate!=''?$pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE):'') ?></td>
                                            <td><?= h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>

                                            <td>
                                                <?php foreach ($pawn['pawn_lines'] as $line): ?>
                                                <p>- <?= $line['product']['name'] ?></p>
                                                <?php $weightAmt += $line['weight'];?>
                                                 <?php endforeach; ?>
                                            </td>
                                            <td class="text-right <?= $lineClass ?>"><?= $icon ?><?= $this->Number->format($pawn['totalmoney']) ?></td>
                                        </tr>
                                        <?php
                                        if ($pawn['status'] == 'CO') {
                                            $totalAmt += $pawn['totalmoney'];
                                            $totalLine += 1;
                                            
                                        }
                                        ?>
                                   
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class=" col-md-12 order-2">
                    <h3 class="m-t-0 gold-title"><i class="mdi mdi-account-multiple"></i> <?= h($title) ?></h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="widget-bg-color-icon card-box">
                                <div class="avatar-lg float-left">
                                    <i class="fas fa-money-bill-wave text-primary avatar-title display-4 m-0"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span class="counter"><?= $this->Number->format($totalAmt) ?></span></h3>
                                    <p class="text-muted mb-0">มูลค่าจำนำ(บาท)</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="widget-bg-color-icon card-box">
                                <div class="avatar-lg float-left">
                                    <i class="fas fa-balance-scale text-primary avatar-title display-4 m-0"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span class="counter"><?= $this->Number->format($weightAmt) ?></span></h3>
                                    <p class="text-muted mb-0">น้ำหนักจำนำ(กรัม)</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="widget-bg-color-icon card-box">
                                <div class="avatar-lg float-left">
                                    <i class="fas fa-cart-plus text-primary avatar-title display-4 m-0"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark mt-1"><span class="counter"><?= number_format($totalLine) ?></span></h3>
                                    <p class="text-muted mb-0">จำนวนรายการ</p>
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
    function viewPawn(id) {
        window.location.href = SITE_URL + 'pawns/view/' + id;
    }
    $(document).ready(function () {
        /*
         $("#datatable-buttons > tbody tr").click(function () {
         console.log('click line.');
         var selectedUrl = $(this).attr('data-url');
         
         document.location = selectedUrl;
         });
         * 
         */


        if ($('#type').val() === 'select_date') {
            $('#box-select-start-date').show();
            $('#box-select-end-date').show();
        } else {
            $('#box-select-start-date').hide();
            $('#box-select-end-date').hide();
        }

        $('#type').on('change', function () {
            if ($(this).val() === 'select_date') {
                $('#box-select-start-date').show();
                $('#box-select-end-date').show();
            } else {
                $('#box-select-start-date').hide();
                $('#box-select-end-date').hide();
            }
        });
    });
</script>