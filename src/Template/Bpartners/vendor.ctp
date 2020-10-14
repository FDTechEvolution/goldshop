<?= $this->element('Lib/data_table') ?>
<div class="col-md-12  col-lg-12 col-xs-12 ">
    <div class="card-box ">
        <div class="panel-body">
            <div class="row ">
                <div class="col-12 bt-tool text-right">
                    <?= $this->Html->link(BT_BACK, ['controller' => 'bpartners', 'action' => 'index', 'N'], ['escape' => false]) ?> 
                    <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไขข้อมูลคู่ขาย', ['action' => 'edit', $bpartner->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                </div>
            </div>
            <?php
            $address = $bpartner->address;
            ?>
            <div class="row ">
                <div class="form-group ">
                    <h3 class="text-left prompt-400 text-primary"><i class="mdi mdi-book-open"></i> ข้อมูลคู่ค้าและประวัติการทำรายการ</h3>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-6">
                    <h4 class="prompt-400"> <?= $bpartner->name ?></h4>
                    <p><strong>ที่อยู่: </strong><?= h($address->address_line . ' ตำบล' . $address->subdistrict . ' อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?></p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#last" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                รายการสั่งทำคงค้าง
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#all" data-toggle="tab" aria-expanded="false" class="nav-link">
                                รายการสั่งทำทั้งหมด
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="last" aria-expanded="true">
                            <div class="row">
                                <div class="col-md-12 text-right form-group">
                                    <button class="btn btn-secondary waves-effect m-b-5" id="bt_order_paid"> <i class="ion-card m-r-5"></i> <span>จ่ายเงินช่าง</span> <span id="l_paid_selected"></span></button>
                                </div>
                            </div>
                            <?= $this->Form->create('', ['id' => 'frm_order']) ?>
                            <table class="table" id="tb_list_order">
                                <thead class="thead-default">
                                    <tr>
                                        <th>วันที่สั่งทำ</th>
                                        <th>สถานะ</th>
                                        <th>รายการ</th>
                                        <th class="text-center">สถานะการชำระค่าสั่งทำ</th>
                                        <th class="text-right">ต้นทุน/ราคา</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $totalAmt = 0; ?>
                                    <?php foreach ($orderLines as $index => $line): ?>
                                        <tr class="hand-cursor" data-id="<?= $line->id ?>" data-index="order_line_<?= $index ?>" data-amount="<?=$line->order_price?>">
                                            <td><?= $line->orderdate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></td>
                                            <td><?= $docStatus[$line->order_status] ?></td>
                                            <td><?= $line->product->name ?></td>
                                            <td class="text-center"><?= $line->order_ispaid == 'Y' ? 'ชำระแล้ว' : 'ยังไม่ได้ชำระ' ?></td>
                                            <td class="text-right"><?= $this->Number->format($line->order_price) ?></td>
                                            <td class="text-right" width="100px">
                                                <?= $this->Form->hidden('order_lines_id[]', ['value' => '', 'id' => 'order_line_' . $index]) ?>
                                                <?= $this->Html->link(TB_BT_EDIT, ['controller' => 'purchase-orders', 'action' => 'view', $line->order->id], ['escape' => false]) ?>
                                            </td>
                                        </tr>
                                        <?php $totalAmt += $line->order_ispaid == 'N' ? $line->order_price : 0 ?>
                                    <?php endforeach; ?>
                                    <tr class="bg-warning" data-amount="0">
                                        <td class="text-right" colspan="4"><strong>รวมค้างชำระ</strong></td>

                                        <td class="text-right"><strong><?= $this->Number->format($totalAmt) ?></strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?= $this->Form->hidden('status', ['value' => '', 'id' => 'order_status']) ?>
                            <?= $this->Form->hidden('paidamt', ['value' => '0', 'id' => 'paidamt']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                        <div class="tab-pane fade" id="all" aria-expanded="false">
                            <table id="datatable-buttons" class="table table-striped">
                                <thead class="thead-default">
                                    <tr>
                                        <th>วันที่สั่งทำ</th>
                                        <th>สถานะ</th>
                                        <th>วันที่ชำระค่าสั่งทำ</th>
                                        <th>รายการ</th>
                                        <th class="text-right">ต้นทุน/ราคา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allOrderLines as $line): ?>
                                        <tr>
                                            <td><?= $line->orderdate->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></td>
                                            <td><?= $docStatus[$line->order_status] ?></td>
                                            <td><?= is_null($line->order_paiddate)?'':$line->order_paiddate->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE) ?></td>
                                            <td><?= $line->product->name ?></td>
                                            <td class="text-right"><?= $this->Number->format($line->order_price) ?></td>
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
</div>
<script>

    $(document).ready(function () {
        $("#tb_list_order > tbody tr").click(function () {
            var order_line_index_id = $(this).attr('data-index');
            var amount = parseFloat($(this).attr('data-amount'));
            var selected = $(this).hasClass("table-success");
            $('#l_paid_selected').text('');
            var paidamt = parseFloat($('#paidamt').val());
            if (!selected) {
                $(this).addClass("table-success");
                
                var line_id = $(this).attr('data-id');
                $('#' + order_line_index_id).val(line_id);
                paidamt+=amount;
            } else {
                $(this).removeClass("table-success");
                $('#' + order_line_index_id).val('');
                paidamt-=amount;
            }
            $('#paidamt').val(paidamt);
            if(paidamt ===0){
                $('#l_paid_selected').text('');
            }else{
                $('#l_paid_selected').text(paidamt +' บาท');
            }
            
        });

        $('#bt_order_goods_receipt').on('click', function () {
            $('#order_status').val('RC');

            var form_data = serializeForm('frm_order');
            $('#page-load').show();
            $.post(SITE_URL + "service-orders/update-line-status/", form_data).done(function (data) {

                location.reload(true);
            });
        });

        $('#bt_order_paid').on('click', function () {
            $('#order_status').val('PD');

            var form_data = serializeForm('frm_order');
            $('#page-load').show();
            $.post(SITE_URL + "service-orders/update-line-status/", form_data).done(function (data) {
                location.reload(true);
            });
        });


    });


</script>

