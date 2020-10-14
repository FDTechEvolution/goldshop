<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
            <div class="panel-body">

                <div class="d-print-none">
                    <div class="text-right button-list">
                        <?= $this->Html->link('<button type="button" class="btn btn-lg btn-secondary waves-effect"><i class="ti-arrow-circle-left"></i> กลับ</button>', ['controller' => 'pawns', 'action' => 'listpawn'], ['escape' => false]) ?>
                        <a href="javascript:window.print()" class="btn btn-dark btn-lg waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        <?php if ($pawn->status == 'DR') { ?>
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'pawns', 'action' => 'edit', $pawn->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        <?php } ?>
                        <?php if (!in_array($pawn->status, ['VO', 'EXPIRE', 'RF', 'RN', 'DR'])) { ?>
                            <button type="button" class="btn btn-primary btn-lg waves-effect waves-light" data-id="<?= h($pawn->id) ?>" name="bt_void"><span class="mdi mdi-cancel"></span> ยกเลิก</button>
                        <?php } ?>
                        <?php if (in_array($pawn->status, ['CO', 'RN'])) { ?>
                            <?= $this->Html->link('<span class="fas fa-calendar-plus"></span> ต่อดอก', ['controller' => 'pawns', 'action' => 'extend', $pawn->id], ['escape' => false, 'class' => 'btn btn-outline-primary btn-lg waves-effect waves-light']) ?>
                            <?= $this->Html->link('<span class="fas fa-hand-holding-usd"></span> ไถ่ถอน', ['controller' => 'pawns', 'action' => 'redeem', $pawn->id], ['escape' => false, 'class' => 'btn btn-outline-success btn-lg waves-effect waves-light']) ?>
                            <button type="button" class="btn btn-warning btn-lg waves-effect waves-light" data-id="<?= h($pawn->id) ?>" name="bt_expire"><i class="mdi mdi-alert-decagram"></i> หลุดจำนำ</button>

                        <?php } ?>
                        <?php if ($pawn->status == 'CO') { ?>
                            <button type="button" class="btn btn-outline-secondary btn-lg waves-effect waves-light" data-id="<?= h($pawn->id) ?>" name="bt_need-edit"><span class="mdi mdi-alert-octagon"></span> แก้ไข</button>
                        <?php } ?>
                        <?php if ($pawn->status == 'VO') { ?>
                            <button class="btn btn-primary" type="button"  data-id="<?= h($pawn->id) ?>" id="bt_unvoid">คืนค่าสถานะเป็นปกติ</button>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <?php
                $bp = $pawn->bpartner;
                $branch = $pawn->branch;
                $org = $pawn->org;
                $address = $bp->address;
                $orgAddress = $branch->address;
                $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                ?>
                <div class="row">
                    <div class="col-6">
                        <div class="pull-left">
                            <h3 class="text-left prompt-500 text-primary"><?= $org->name ?></h3>
                            <p><?= h($orgAddress->address_line . ' ตำบล' . $orgAddress->subdistrict . ' อำเภอ' . $orgAddress->district . ' จังหวัด' . $orgAddress->province . ' ' . $orgAddress->postalcode) ?></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="pull-right prompt-300 text-right">
                            <?php 
                            $bgColor = 'info';
                            if($pawn->status == 'CO'){
                                $bgColor = 'purple';
                            }else if($pawn->status == 'RF'){
                                $bgColor = 'success';
                            }else{
                                
                            }
                            ?>
                            <h3 class="m-t-10"><span class="badge badge-<?= $bgColor?>">สถานะ: <?= h($docStatusList[$pawn->status]['name']) ?></span></h3>
                            <h3 class="prompt-500">#ใบรับจำนำ เลขที่: <?= h($pawn->docno) ?></h3>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-6">
                        <div class="pull-left m-t-10">

                            <address>
                                <strong><?= h($bp->name) ?></strong><br>
                                <?php if (!is_null($address) && $address != '') { ?>
                                    <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
                                    <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>
                                <?php } ?>
                            </address>
                        </div>

                    </div>
                    <div class="col-6">
                        <dl class="row">
                            <dt class="col-5 fa-2x">เงินต้น</dt>
                            <dd class="col-7 fa-2x"><?= number_format($pawn->totalmoney) ?></dd>
                            <dt class="col-5">วันรับจำนำ</dt>
                            <dd class="col-7"><?= $pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></dd>
                            <dt class="col-5">วันครบกำหนด</dt>
                            <dd class="col-7"><?= $pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></dd>
                            <?php if($pawn->status =='RF'){?>
                            <dt class="col-5">วันไถ่ถอน</dt>
                            <dd class="col-7"><?= $pawn->returndate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></dd>
                            <?php }?>
                            <dt class="col-5">คลังเก็บ</dt>
                            <dd class="col-7"><?= sprintf('สาขา%s-%s', $pawn->warehouse->branch->name, $pawn->warehouse->name) ?></dd>
                        </dl>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <h3 class="prompt-500">ประวัติการทำรายการล่าสุด</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>การทำรายการ</th>
                                    <th>วันที่</th>

                                    <th>หมายเหตุ/รายละเอียด</th>
                                    <th class="text-right">เงินต้น</th>
                                    <th class="text-right">ดอกเบี้ย</th>
                                    <th class="text-right">ส่วนลด</th>
                                    
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pawn['pawn_transactions'] as $index => $transaction): ?>
                                    <tr>
                                        <td><?= $pawnTransactionType[$transaction->type] ?></td>
                                        <td>
                                            <?php 
                                            $strStart = $transaction->start_date!=''?($transaction->start_date->i18nFormat(DATE_FORMATE, null, TH_DATE)):'';
                                            $strEnd = $transaction->end_date!=''?($transaction->end_date->i18nFormat(DATE_FORMATE, null, TH_DATE)):'';
                                            
                                            if($transaction->type == 'NEW'){
                                                echo $strStart;
                                            }else if($transaction->type == 'RF'){
                                                 echo ($pawn->returndate->i18nFormat(DATE_FORMATE, null, TH_DATE));
                                            }else{
                                                echo $strStart.' - '.$strEnd;
                                            }
                                                
                                                ?>
                                       
                                        </td>
                                        <td><?= h($transaction->description) ?></td>
                                        <td class="text-right"><?= $this->Number->format($transaction->amount) ?></td>
                                        <td class="text-right"><?= $this->Number->format($transaction->type == 'NEW' ? 0 : $transaction->interestamt) ?></td>
                                        <td class="text-right">
                                            <?= number_format($transaction->discount)?>
                                        </td>
                                        <td class="text-right">
                                            <?php if ($index == 0 && $transaction['type'] !='NEW') { ?>
                                                <button class="btn btn-primary" type="button" name="bt_transaction_cancel" data-id="<?= $transaction['id'] ?>">ยกเลิกรายการ</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="row">
                    <div class="col-12 m-t-20">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr>
                                        <th width="70px">#</th>
                                        <th></th>
                                        <th>รายการจำนำ</th>
                                        <th width="100px" class="text-right">มูลค่า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php $totalAmt = 0; ?>
                                    <?php foreach ($pawn->pawn_lines as $line): ?>
                                        <tr>
                                            <td><?= h($count) ?></td>
                                            <td>
                                                <image src="<?= $line->has('image') ? SITE_URL . $line->image->path : '' ?>" width="100" />
                                            </td>
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

            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        $('button[name="bt_void"]').on('click', function (e) {
            var id = $(this).attr('data-id');


            Swal.fire({
                title: "ต้องการยกเลิกใบจำนำ ?",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location = SITE_URL + 'pawns/void/' + id;
                        }

                    });

        });

        $('button[name="bt_transaction_cancel"]').on('click', function (e) {
            var id = $(this).attr('data-id');


            Swal.fire({
                title: "ต้องการยกเลิกการทำรายการนี้ ?",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location = SITE_URL + 'pawn-transactions/void/' + id;
                        }

                    });

        });

        $('button[name="bt_need-edit"]').on('click', function (e) {
            var id = $(this).attr('data-id');


            Swal.fire({
                title: "ต้องการแก้ไขใบจำนำ ?",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location = SITE_URL + 'pawns/need-edit/' + id;
                        }

                    });

        });

        $('#bt_unvoid').on('click', function (e) {
            var id = $(this).attr('data-id');


            Swal.fire({
                title: "ต้องการคืนค่าสถานะเป็นปกติ ?",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location = SITE_URL + 'pawns/unvoid/' + id;
                        }

                    });

        });

        $('button[name="bt_extend"]').on('click', function (e) {
            var id = $(this).attr('data-id');
            Swal.fire({
                title: "ต้องการต่อดอก/ไถ่ถอน ?",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location = SITE_URL + 'pawns/returnpawn/' + id;
                        }

                    });
        });

        $('button[name="bt_expire"]').on('click', function (e) {
            var id = $(this).attr('data-id');

            Swal.fire({
                title: "ยืนยันการหลุดจำนำ ?",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33"
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location = SITE_URL + 'pawns/expire/' + id;
                        }

                    });
        });

    });

</script>