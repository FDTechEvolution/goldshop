<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
            <div class="panel-body">
                <?php
                $bp = $pawn->bpartner;
                $branch = $pawn->branch;
                $org = $pawn->org;
                $address = $bp->address;
                $orgAddress = $branch->address;
                $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                ?>
                <div class="clearfix">
                    <div class="pull-left">
                        <h3 class="text-left prompt-500 text-primary"><?= $org->name ?></h3>
                        <p><?= h($orgAddress->address_line . ' ตำบล' . $orgAddress->subdistrict . ' อำเภอ' . $orgAddress->district . ' จังหวัด' . $orgAddress->province . ' ' . $orgAddress->postalcode) ?></p>
                    </div>
                    <div class="pull-right prompt-300 text-right">
                        <h3>#ใบรับจำนำ</h3>
                        <p class="m-t-0 h4">เลขที่: <?= h($pawn->docno) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-12">
                        <div class="pull-left m-t-10">

                            <address>
                                <strong><?= h($bp->name) ?></strong><br>
                                <?php if (!is_null($address) && $address != '') { ?>
                                    <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
                                    <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>
                                <?php } ?>
                            </address>
                        </div>
                        <div class="pull-right m-t-10">
                            <p><strong>รับจำนำวันที่: </strong> <?= h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?> &nbsp;&nbsp;&nbsp;&nbsp;<strong>วันครบกำหนด: </strong> <?= h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                            <p><strong>อัตราดอกเบี้ย: </strong><?= h($pawn->type) ?></p>
                            <p class="m-t-10"><strong>สถานะ: </strong> <span class="badge badge-<?= $pawn->docstatus == 'CO' ? 'success' : 'warning' ?>"> <?= h($docStatusList[$pawn->status]['name']) ?></span></p>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 m-t-20">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr>
                                        <th width="70px">#</th>
                                        <th>รายการจำนำ</th>
                                        <th width="100px" class="text-right">ราคา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php $totalAmt = 0; ?>
                                    <?php foreach ($pawn->pawn_lines as $line): ?>
                                        <tr>
                                            <td><?= h($count) ?></td>
                                            <td><?= h($line->product->name) ?></td>
                                            <td width="100px" class="text-right"><?= $this->Number->format($line->amount) ?></td>

                                        </tr>
                                        <?php $totalAmt = $totalAmt + $line->amount; ?>
                                        <?php $count++; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="clearfix">
                            <h4 class="small text-inverse prompt-500">ประวัติการทำรายการ</h4>
                            <small>
                                <?= $pawn->log_history ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="text-right prompt-500">จำนวนเงินรวมทั้งสิ้น <?= $this->Number->format($totalAmt) ?> บาท</h4>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <?= $this->Html->link(BT_BACK, ['controller' => 'pawns', 'action' => 'listpawn'], ['escape' => false]) ?>
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        <?php if ($pawn->status == 'DR') { ?>
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'pawns', 'action' => 'edit', $pawn->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        <?php } ?>
                        <?php if (!in_array($pawn->status, ['VO','EXPIRE','RF','RN'])) { ?>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-id="<?= h($pawn->id) ?>" name="bt_void"><span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ</button>
                        <?php } ?>
                        <?php if ($pawn->status == 'CO') { ?>
                            <button type="button" class="btn btn-info waves-effect waves-light" data-id="<?= h($pawn->id) ?>" name="bt_extend"><span class="mdi mdi-alert-octagon"></span> ต่อดอก/ไถ่ถอน</button>
                            <button type="button" class="btn btn-warning waves-effect waves-light" data-id="<?= h($pawn->id) ?>" name="bt_expire"><span class="mdi mdi-alert-octagon"></span> หลุดจำนำ</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('button[name="bt_void"]').on('click', function (e) {
            var id = $(this).attr('data-id');
            swal({
                title: "ต้องการยกเลิกใบจำนำ ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'ยกเลิก',
                cancelButtonClass: 'btn-secondary',
                confirmButtonClass: 'btn-success',
                confirmButtonText: "ยืนยัน",
                closeOnConfirm: false
            }, function () {
                window.location = SITE_URL + 'pawns/void/' + id;
            });

        });

        $('button[name="bt_extend"]').on('click', function (e) {
            var id = $(this).attr('data-id');
            swal({
                title: "ต้องการต่อดอก/ไถ่ถอน ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'ยกเลิก',
                cancelButtonClass: 'btn-secondary',
                confirmButtonClass: 'btn-success',
                confirmButtonText: "ยืนยัน",
                closeOnConfirm: false
            }, function () {
                window.location = SITE_URL + 'pawns/returnpawn/' + id;
            });
        });

        $('button[name="bt_expire"]').on('click', function (e) {
            var id = $(this).attr('data-id');
            swal({
                title: "ยืนยันการหลุดจำนำ ?",
                text: "",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: 'ยกเลิก',
                cancelButtonClass: 'btn-secondary',
                confirmButtonClass: 'btn-success',
                confirmButtonText: "ยืนยัน",
                closeOnConfirm: false
            }, function () {
                window.location = SITE_URL + 'pawns/expire/' + id;
            });
        });

    });

</script>