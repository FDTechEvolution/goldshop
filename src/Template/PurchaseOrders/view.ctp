<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="panel-body">
                <?php
                $bp = $order->bpartner;
                $branch = $order->branch;
                $org = $order->branch->org;
                $address = $bp->address;
                $orgAddress = $branch->address;
                $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
                ?>
                <div class="clearfix">
                    <div class="pull-left">
                        <h3 class="text-left prompt-500 text-primary"><?= PAGE_TITLE ?></h3>
                        <p><?= h($orgAddress->address_line . ' ตำบล' . $orgAddress->subdistrict . ' อำเภอ' . $orgAddress->district . ' จังหวัด' . $orgAddress->province . ' ' . $orgAddress->postalcode) ?></p>
                    </div>
                    <div class="pull-right prompt-300">
                        <h3>#ใบสั่งซื้อ</h3>
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
                            <p><strong>วันที่: </strong> <?= h($order->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                            <p class="m-t-10"><strong>สถานะ: </strong> <span class=""> <?= h($docStatusList[$order->docstatus]) ?></span></p>
                            <p class="m-t-10"><strong>หมายเลขเอกสาร: </strong><?= h($order->docno) ?></p>
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

                                        <th>รายการ</th>
                                        <th>รายละเอียด</th>
                                        <th width="100px" class="text-right">จำนวน</th>
                                        <th width="100px" class="text-right">ราคารวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php $totalAmt = 0; ?>
                                    <?php foreach ($order->order_lines as $line): ?>

                                        <tr>
                                            <td><?= h($count) ?></td>

                                            <td><?= h($line->product->name) ?></td>
                                            <td>
                                                <?php
                                                echo h($line->description);
                                                if ($line->has('image')) {
                                                    echo $this->Html->image($line->image->path, ['width' => '120px']);
                                                }
                                                ?>
                                            </td>
                                            <td width="100px" class="text-right"><?= $this->Number->format($line->qty) ?></td>
                                            <td width="100px" class="text-right"><?= $this->Number->format($line->totalamt) ?></td>

                                        </tr>
                                        <?php $totalAmt = $totalAmt + $line->totalamt; ?>
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
                            <h4 class="small text-inverse prompt-500">หมายเหตุ</h4>
                            <small>
                                <?= h($order->description) ?>
                            </small>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="text-right"><b>มูลค่ารวม:</b> <?= $this->Number->format($totalAmt) ?> บาท</p>
                        <h4 class="text-right prompt-500">รับเงินมัดจำทั้งสิ้น <?= $this->Number->format($order->totalpaid) ?> บาท</h4>
                    </div>
                </div>
                <hr>
                <div class="row d-print-none">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <?= $this->Html->link(BT_BACK, ['controller' => 'purchase-orders', 'action' => 'showall'], ['escape' => false]) ?>
                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                            <?php if ($order->docstatus == 'DR') { ?>
                                <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'purchase-orders', 'action' => 'edit', $order->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                            <?php } ?>

                            <?php if ($order->docstatus != 'VO') { ?>
                                <?= $this->Form->postLink('<span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ', ['controller' => 'purchase-orders', 'action' => 'void', $order->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                            <?php } ?>

                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="panel-body">
                <div class="row d-print-none">

                    <div class="col-md-9">
                        <h3 class="prompt-500 text-primary">ข้อมูลการสั่งทำ</h3>
                        <?php if($order->isordered =='Y'){?>
                        <?php
                        $bpartnerName = '';
                        $status = '';
                        $date = null;
                        $lastModified = null;
                        $lastModifiedBy = null;
                        if (sizeof($order->order_lines) > 0) {
                            $bpartnerName = $order['order_lines'][0]['bpartner']['name'];
                            $status = $order['order_lines'][0]['order_status'];
                            $date =  $order['order_lines'][0]['orderdate'];
                            $lastModified  =  $order['order_lines'][0]['modified'];
                            $lastModifiedBy  =  $order['order_lines'][0]['UserModified']['firstname'];
                            
                        }
                        ?>
                        <p><strong><?= h($bpartnerName) ?></strong></p>
                        <div class="row">
                            <div class="col-md-3">
                                <strong>วันที่สั่งทำ: </strong><?= h($date->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?>
                            </div>
                            
                            <div class="col-md-3">
                                <strong>อัพเดทล่าสุด: </strong><?= h($lastModified->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?>
                            </div>
                            <div class="col-md-3">
                                <strong>อัพเดทล่าสุดโดย: </strong><?= h($lastModifiedBy) ?>
                            </div>
                        </div>
                        <table  class="table m-t-30">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รายการ</th>
                                    <th class="text-right">จำนวน</th>
                                    <th class="text-right" width="200px">ราคาสั่งทำ/ต้นทุน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order->order_lines as $key => $line): ?>
                                    <?php if (!is_null($line->bpartner_id)) { ?>
                                        <tr>
                                            <td><?= h($key + 1) ?></td>
                                            <td><?= h($line->product->name) ?></td>
                                            <td class="text-right"><?= $this->Number->format($line->qty) ?></td>
                                            <td class="text-right"><?= $this->Number->format($line->order_price) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php }?>
                    </div>
                    <div class="col-md-3 text-right">
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-toggle="modal" data-target="#order">บันทึก/แก้ไขการสั่งทำ</button>
                    </div>

                </div>

                <div class="row d-print-none">
                    <div class="col-md-12">
                        <div id="order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-primary prompt-500">บันทึกการสั่งทำ</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?= $this->Form->create('order', ['id' => 'frm']) ?>
                                        <?= $this->Form->hidden('order_id', ['value' => $order->id]) ?>

                                        <div class="row">
                                            <div class='col-md-12 form-group '>
                                                <?php
                                                $bpartner_id = null;
                                                if (sizeof($order->order_lines) > 0) {
                                                    $bpartner_id = $order['order_lines'][0]['bpartner_id'];
                                                }
                                                ?>
                                                <label for="code">ผู้ขาย/ผู้ผลิต/ช่าง</label>
                                                <?= $this->Form->select('bpartner_id', $bpartners, ['value' => $bpartner_id, 'class' => 'form-control form-control-lg', 'id' => 'bpartner_id', 'label' => false]) ?>
                                            </div>
                                        </div>
                                        <table  class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>รายการ</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-right" width="200px">ราคาสั่งทำ/ต้นทุน</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($order->order_lines as $key => $line): ?>
                                                    <tr>
                                                        <td><?= h($line->product->name) ?></td>
                                                        <td class="text-center"><?= $this->Number->format($line->qty) ?></td>
                                                        <td class="text-right">
                                                            <?= $this->Form->hidden('lines.' . $key . '.order_line_id', ['value' => $line->id]) ?>
                                                            <?= $this->Form->control('lines.' . $key . '.order_price', ['value' => $line->order_price, 'class' => 'form-control', 'label' => false,'data-type'=>'float']) ?>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <?= $this->Form->end() ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                                        <button type="button" class="btn btn-primary waves-effect waves-light" id="bt_save_order">บันทึก</button>
                                    </div>
                                </div>
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
        $('#bt_save_order').on('click', function () {
            var fields = $('#frm').serializeArray();
            var frm = $('#frm');
            console.log(fields);
            var url = SITE_URL + 'purchase-orders/ajax-save-order/';
            $.ajax({
                type: frm.attr('method'),
                url: url,
                async: false,
                data: frm.serialize(),
                success: function (_response) {
                    console.log('successed.');
                    location.reload();
                }
            });
        });
    });
</script>