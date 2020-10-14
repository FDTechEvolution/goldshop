<?= $this->Form->create('pawn_find', ['id' => 'frm']) ?>
<div class="row">
    <div class=" col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-8 offset-2">
                    <h3 class="prompt-500">ค้นหารายการจำนำ</h3>
                </div>
                <div class="col-6 offset-2">
                    <input type="text" class="form-control form-control-lg" name="search_text" id="search-text" placeholder="เลขใบจำนำ/ชื่อ/เลขบัตรประชาชน" value="<?= isset($searchText)?$searchText:''?>"/>
                </div>
                <div class="col-2">
                    <button class="btn btn-icon waves-effect waves-light btn-primary btn-block btn-lg"> <i class="fas fa-search"></i> </button>
                </div>
            </div>
            <?php if(isset($result)){?>
            <div class="row mt-2">
                <div class="col-12">
                    <table class="table table-striped table-lg">
                        <thead>
                            <tr>
                                <th>หมายเลข</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>รายการ</th>
                                <th>สถานะ</th>
                                <th class="text-right">จำนวนเงิน</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $item):?>
                            <tr class="<?= $item['status']=='RF'?'text-primary':''?>">
                                <td><strong><?=h($item['docno'])?></strong></td>
                                <td><?=h($item['name'])?></td>
                                <td><?=$item['log_history']?></td>
                                <td><?= $docStatusList[$item['status']]['name']?></td>
                                <td class="text-right"><?= number_format($item['totalmoney'])?></td>
                                <td class="text-right button-list">
                                    <?php if($item['status'] !='RF' && $item['status'] !='VO'){?>
                                    <?= $this->Html->link('<button class="btn btn-outline-primary btn-lg" type="button"><i class=" fas fa-calendar-plus"></i> ต่อดอก</button>',
                                            ['controller'=>'pawns','action'=>'extend',$item['id']],['escape' => false])?>
                                    
                                    <?= $this->Html->link('<button class="btn btn-outline-success btn-lg" type="button"><i class="fas fa-hand-holding-usd"></i> ไถ่ถอน</button>',
                                            ['controller'=>'pawns','action'=>'redeem',$item['id']],['escape' => false])?>
                                    <?php }?>
                                </td>
                            </tr>
                            
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>
            
            <?php }?>
        </div>
    </div>
</div>