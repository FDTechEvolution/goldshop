<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>วันที่ทำรายการ</th>
                    <th>ประเภท</th>
                    
                    <th>รายการ</th>
                    <th class="text-right">จำนวน</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $line):?>
                
                <tr>
                    <td><?=$line['docdate_th']?></td>
                    <td><?=h($paymentTypes[$line['type']])?></td>
                    
                    
                    <td><?=h($line['product_name'])?></td>
                    <td class="text-right"><?=$this->Number->format($line['qty'])?></td>
                </tr>
              
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>