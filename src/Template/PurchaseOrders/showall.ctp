<?= $this->element('Lib/data_table') ?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

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
                    <tr class="<?= $lineClass ?> <?=$order->docstatus=='VO'?'text-void':''?>" data-url="<?= SITE_URL . 'purchase-orders/view/' . h($order->id) ?>" onclick="gourl(this);">
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
    function gourl(e){
         var selectedUrl = $(e).attr('data-url');
            if (selectedUrl !== 'undefined' && selectedUrl !== undefined) {
                console.log(selectedUrl);
                document.location = selectedUrl;
            }
    }
    
</script>