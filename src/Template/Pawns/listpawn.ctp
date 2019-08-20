<?= $this->element('Lib/data_table') ?> 
<div class="row">
    <div class="col-12 text-right">
        <div class="card-box table-responsive">
            <?= $this->Html->link('รายการจำนำวันนี้', ['controller' => 'pawns', 'action' => 'listpawn'], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link('รายการจำนำทั้งหมด', ['controller' => 'pawns', 'action' => 'listpawn', 'type'=>'all'], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link('รายการหลุดจำนำ', ['controller' => 'pawns', 'action' => 'listpawn', 'type'=>'expire'], ['class' => 'btn btn-secondary']) ?>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-box ">
            <?= $this->Form->create('pawn', ['horizontal' => true, 'method' => 'post']); ?>
            <div class="row bt-tool">
                <div class=" col-md-12 ">
                    <h3 class="m-t-0 gold-title"><i class="mdi mdi-account-multiple"></i> <?= h($title) ?></h3>
                    <?php if(is_null($type)){?>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-bg-color-icon card-box">
                                <div class="bg-icon bg-icon-success pull-left">
                                    <i class="ion-social-bitcoin text-success"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($totalAmt) ?></b></h3>
                                    <p class="text-muted mb-0">มูลค่าจำนำวันนี้ (บาท)</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widget-bg-color-icon card-box fadeInDown animated">
                                <div class="bg-icon bg-icon-primary pull-left">
                                    <i class="mdi mdi-scale text-info"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= $this->Number->format($weightAmt) ?></b></h3>
                                    <p class="text-muted mb-0">น้ำหนักจำนำวันนี้ (กรัม)</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="widget-bg-color-icon card-box">
                                <div class="bg-icon bg-icon-danger pull-left">
                                    <i class="mdi mdi-format-list-numbers text-pink"></i>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-dark m-t-10"><b class="counter"><?= sizeof($pawns) ?></b></h3>
                                    <p class="text-muted mb-0">จำนวนรายการวันนี้</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>

            </div>
            <?= $this->Form->end() ?>


            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center">เลขที่ใบจำนำ</th>
                        <th>ชื่อลูกค้า</th>
                        <th style="text-align: center">สถานะ</th>
                        <th style="text-align: center">รับจำนำวันที่</th>
                        <th style="text-align: center">วันครบกำหนด</th>
                        <th style="text-align: center">ดอกเบี้ยต่อเดือน</th>
                        <th class="text-right">มูลค่า</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pawns as $pawn): ?>
                        <?php
                        $lineClass = '';
                        $icon = '';
                        if ($pawn->isoverprice == 'Y') {
                            $lineClass = 'text-danger';
                            $icon = '<i class="mdi mdi-alert-circle-outline"></i>';
                        }
                        ?>
                        <tr  class="hand-cursor"  data-url="<?= SITE_URL . 'pawns/view/' . h($pawn->id) ?>">

                            <td style="text-align: center"><?= h($pawn->docno) ?></td>
                            <td><?= h($pawn->bpartner->name) ?></td>
                            <td style="text-align: center" class="">
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
                            <td style="text-align: center"><?= h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                            <td style="text-align: center"><?= h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                            <td style="text-align: center"><?= h($pawn->type) ?></td>
                            <td class="text-right <?= $lineClass ?>"><?=$icon?><?= $this->Number->format($pawn->totalmoney) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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