
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <div class="row">
                <div class="col-6">
                    <h1 class="m-t-0 f-kanit-700 text-primary">ย้ายสินค้า</h1>
                </div>
                <div class="col-6 text-right">
                    <?= $this->Html->link(BT_CREATE, ['action' => 'add'], ['escape' => false]) ?> 
                </div>
            </div>
            <hr/>
            
          
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       
                        <th>วันที่ทำรายการ</th>
                        <th>หมายเลขเอกสาร</th>
                        <th>จากคลังสินค้า</th>
                        <th>ไปคลังสินค้า</th>
                        <th>สถานะ</th>
                
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($goodsReceipts as $item): ?>
                    <tr onclick="view('<?=$item->id?>');">
                           
                            <td class="column-date"><?= h($item->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                            <td class=""><?= h($item->docno) ?></td>
                            <td class=""><?= $item->has('FromWarehouse') ? $item->FromWarehouse->branch->name.'-'.$item->FromWarehouse->name : '' ?></td>
                            <td class=""><?= $item->has('ToWarehouse') ? $item->FromWarehouse->branch->name.'-'.$item->ToWarehouse->name : '<span class="text-primary">นอกระบบ</span>' ?></td>
                            <td class="">
                                <span class="badge badge-<?= $item->status == 'CO' ? 'success' : 'warning' ?>">
                                    <?= h($docStatusList[$item->status]['name']) ?>
                                </span>
                            </td>
                           
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function view(id){
        document.location = SITE_URL+'goods-movement/view/'+id;
    }
</script>