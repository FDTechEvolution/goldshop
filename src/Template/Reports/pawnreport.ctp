<?= $this->Html->css('/assets/plugins/switchery/switchery.min.css') ?>
<div class="row">

    <div class="col-md-12">

        <div class="row d-print-none">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <?= $this->Form->create('', ['id' => 'frm']) ?>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <h3 class="prompt-500 text-primary">รายงานรับจำนำ</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <p class="text-info"><small>***ไม่ต้องระบุวันที่ หากต้องการรายงานจำนำคงค้างทั้งหมดในระบบของแต่ละสาขา</small></p>
                            </div>
                            <div class="col-md-2 offset-md-2">
                                <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'class' => 'form-control', 'label' => false, 'options' => $branches]) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('start_date', ['placeholder' => 'ตั้งแต่วันที่', 'class' => 'form-control', 'id' => 'start_date', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>
                            <div class="col-md-2">
                                <?= $this->Form->control('end_date', ['placeholder' => 'ถึงวันที่', 'class' => 'form-control', 'id' => 'end_date', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-block btn-primary waves-effect">ค้นหา</button>
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-block btn-secondary waves-effect" type="reset">Reset</button>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($pawnArr) && !is_null($pawnArr)) { ?>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="d-print-none">
                                <div class="text-left">
                                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h3 class="text-right prompt-500"><?= PAGE_TITLE ?></h3>
                                </div>
                                <div class="pull-right">
                                    <h4 class="prompt-400"><?= h($reportSubTitle) ?></h4>
                                    <p>ประจำวันที่ </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>เลขที่ใบจำนำ</th>
                                                    <th>วันที่ทำรายการ</th>
                                                    <th>ลูกค้า</th>
                                                    <tH>ผู้ทำรายการ</tH>
                                                    <th>สินค้า</th>
                                                    <th class="text-right">น้ำหนัก/กรัม</th>
                                                    <th class="text-right">จำนวนเงิน</th>

                                                </tr></thead>
                                            <tbody>
                                                <?php foreach ($pawnArr as $pawn): ?>
                                                    <?php
                                                    if (!isset($pawn['pawns']) || sizeof($pawn['pawns']) == 0) {
                                                        continue;
                                                    }
                                                    $count = 0 ;
                                                    ?>
                                                    <?php foreach ($pawn['pawns'] as $item): ?>

                                                        <tr>
                                                            <td><?= h($item['docno']) ?></td>

                                                            <td><?= h($item['created']->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                                                            <td><?= h($item['bpname']) ?></td>
                                                            <td><?= h($item['firstname']) ?></td>
                                                            <td><?= h($item['product_name']) ?></td>
                                                            <td class="text-right"><?= h($item['weight']) ?></td>
                                                            <td class="text-right"><?= $this->Number->format($item['totalmoney']) ?></td>
                                                        </tr>
                                                        <?=$count++;?>
                                                    <?php endforeach; ?>

                                                    <tr style="background-color: #E0E0E0;" class="font-weight-bold">
                                                        <td colspan="5" class="text-right" >รวม</td>
                                                        <td colspan="" class="text-right" ><?= $pawn['title'] ?> <?= $pawn['weightamt'] ?> กรัม</td>
                                                        <td colspan="" class="text-right"> <?= $this->Number->format($pawn['totalAmt']) ?></td>
                                                    </tr>

                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="clearfix m-t-40">

                                    </div>
                                </div>
                                <div class="col-6">
                                    <hr>
                                    <h4 class="text-right prompt-500">รวมน้ำหนักทั้งหมด <?= $this->Number->format($pawnArr['weightTotalAmt']) ?> กรัม</h4>
                                    <h4 class="text-right prompt-500">รวมมูลค่าทั้งหมด <?= $this->Number->format($pawnArr['totalAmt']) ?> บาท</h4>
                                    <h4 class="text-right prompt-500">จำนวนลูกค้าจำนำทั้งหมด <?= $this->Number->format($count) ?> ราย</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


</div>
<?= $this->Html->script('/assets/plugins/switchery/switchery.min.js') ?>

<script>
    $(document).ready(function () {
        $('button[type="reset"]').on('click', function () {
            window.location.href = window.location.href;
        });
    });
</script>