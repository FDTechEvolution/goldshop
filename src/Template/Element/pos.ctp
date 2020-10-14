<div style="width: 100%;height: 100%;background-color: rgba(255, 255, 255, 1);z-index: 200;display:block;position:fixed;top: 0;bottom:0;padding: 20px 20px;display: none;" id="box-pos">
    <div class="row prompt-300 button-list">
        <div class="col-md-3 text-right">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary waves-effect waves-light w-lg">รับซื้อทั้งหมด</button>', ['controller' => 'purchase', 'action' => 'showall'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-primary w-lg py-3" style="font-size: 20px;">ซื้อ</button>', ['controller' => 'purchase'], ['escape' => false]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-success waves-effect waves-light w-lg">ขาย/แลกเปลี่ยนทั้งหมด</button>', ['controller' => 'sales', 'action' => 'showall'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-success w-lg py-3" style="font-size: 20px;">ขาย/แลกเปลี่ยน</button>', ['controller' => 'sales'], ['escape' => false]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-info waves-effect waves-light w-lg">สั่งซื้อ/สั่งทำทั้งหมด</button>', ['controller' => 'purchase-orders', 'action' => 'showall'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-info w-lg py-3" style="font-size: 20px;">สั่งซื้อ/สั่งทำ</button>', ['controller' => 'purchase-orders', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-warning waves-effect waves-light w-lg">ชำรุดทั้งหมด</button>', ['controller' => 'broken', 'action' => 'showall'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-warning w-lg py-3" style="font-size: 20px;">ชำรุด</button>', ['controller' => 'broken', 'action' => 'index'], ['escape' => false]) ?>
        </div>
    </div>
    <hr style="border-top: 1px solid #5a6268;"/>
    <div class="row prompt-300 button-list">
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-danger waves-effect waves-light w-lg">เงินออมทั้งหมด</button>', ['controller' => 'saving-transactions', 'action' => 'listsavingtransaction'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-danger w-lg py-3" style="font-size: 20px;">เงินออม</button>', ['controller' => 'saving-accounts'], ['escape' => false]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-dark waves-effect waves-light w-lg">รายรับ/รายจ่ายทั้งหมด</button>', ['controller' => 'pawns', 'action' => 'listreturnpawn'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-dark w-lg py-3" style="font-size: 20px;">รายรับ/รายจ่าย</button>', ['controller' => 'income'], ['escape' => false]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-purple waves-effect waves-light w-lg">จำนำทั้งหมด</button>', ['controller' => 'pawns', 'action' => 'listpawn'], ['escape' => false]) ?>
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-purple w-lg py-3" style="font-size: 20px;">จำนำ</button>', ['controller' => 'pawns', 'action' => 'index'], ['escape' => false]) ?>
        </div>
        <div class="col-md-3">
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-pink waves-effect waves-light w-lg">ไถ่ถอน/ต่อดอกทั้งหมด</button>', ['controller' => 'pawns', 'action' => 'listreturnpawn'], ['escape' => false]) ?>
            
            <?= $this->Html->link('<button type="button" class="btn btn-block btn-pink w-lg py-3" style="font-size: 20px;">ไถ่ถอน/ต่อดอก</button>', ['controller' => 'pawns', 'action' => 'find'], ['escape' => false]) ?>
        </div>
    </div>
</div>