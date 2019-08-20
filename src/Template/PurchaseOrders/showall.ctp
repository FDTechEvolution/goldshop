<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12 text-right">
        <div class="card-box table-responsive">
            <?=$this->Html->link('รายการสั่งซื้อ/สั่งทำวันนี้',['controller'=>'purchase-orders','action'=>'showall'],['class'=>'btn btn-secondary'])?>
            <?=$this->Html->link('รายการสั่งซื้อ/สั่งทำทั้งหมด',['controller'=>'purchase-orders','action'=>'showall','N'],['class'=>'btn btn-secondary'])?>
            
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            
            <h3 class="m-t-0 gold-title border-bottom pb-2"><i class="mdi mdi-format-list-bulleted"></i> <?=$wording?></h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-success pull-left">
                            <i class="ion-social-bitcoin text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark m-t-10"><b class="counter"><?=$this->Number->format($totalAmt)?></b></h3>
                            <p class="text-muted mb-0">เงินมัดจำ (บาท)</p>
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
                            <h3 class="text-dark m-t-10"><b class="counter"><?=$this->Number->format($weightAmt)?></b></h3>
                            <p class="text-muted mb-0">น้ำหนักสั่ง (กรัม)</p>
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
                            <h3 class="text-dark m-t-10"><b class="counter"><?=sizeof($orders)?></b></h3>
                            <p class="text-muted mb-0">จำนวนรายการ</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                
            </div>

            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        
                        <th>วันที่บันทึก</th>
                        <th>วันครบกำหนด</th>
                        <th>หมายเลขเอกสาร</th>
                        <th>รายการ</th>
                       
                        <th>ลูกค้า</th>
                        
                        <th>สถานะ</th>
                        <th class="text-right">มัดจำ</th>
                       
                    </tr>
                </thead>
                <tbody class="hand-cursor">

                    <?php foreach ($orders as $order): ?>
                        <?php
                        $lineClass = '';

                        $des = '';
                        if ($order->has('order_lines') && sizeof($order->order_lines) > 0) {
                            foreach ($order->order_lines as $line) {
                                $_product = $line->product->name;
                                $orderInfo = $line->has('bpartner')?' [สั่งทำที่'.$line->bpartner->name.']':'';
                                $des = ($des == '') ? ($_product.$orderInfo) : ($des . '<br/>' . $_product.$orderInfo);
                            }
                        }
                        ?>
                        <tr class="<?= $lineClass ?> <?=$order->docstatus=='VO'?'text-void':''?>" data-url="<?= SITE_URL . 'purchase-orders/view/' . h($order->id) ?>">
                            <td class="column-date"><?= h($order->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td class=""><?= h($order->duedate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                            <td><small><?= h($order->docno) ?></small></td>
                            <td><small><?= $des ?></small></td>
                           
                            <td><small><?= h($order->has('bpartner') ? $order->bpartner->name : '') ?></small></td>
                           
                            <td><?=$orderStatus[$order->docstatus] ?></td>
                            <td class="text-right"><?= h($this->Number->format($order->totalpaid)) ?></td>
                           
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
            if (selectedUrl !== 'undefined' && selectedUrl !== undefined) {
                console.log(selectedUrl);
                document.location = selectedUrl;
            }

        });
    });
</script>