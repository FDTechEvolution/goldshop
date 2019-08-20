<?php
$class = 'm-b-5 btn btn-block btn--md waves-effect waves-light ';
$action = $this->request->getParam('action');
?>
<div class="row">
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='index'?'btn-primary':'btn-outline-primary').'">สถิติ</button>', ['action' => 'index'], ['escape' => false, 'label' => false]) ?>
  </div>
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='income'?'btn-primary':'btn-outline-primary').'">สรุปรายรับ-รายจ่ายประจำวัน</button>', ['action' => 'income'], ['escape' => false, 'label' => false]) ?>
  </div>
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='transaction'?'btn-primary':'btn-outline-primary').'">Transaction Reports</button>', ['action' => 'transaction'], ['escape' => false, 'label' => false]) ?>
  </div>
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='pawnreport'?'btn-primary':'btn-outline-primary').'">รายงานลูกค้าจำนำ</button>', ['action' => 'pawnreport'], ['escape' => false, 'label' => false]) ?>
  </div>
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='savingreport'?'btn-primary':'btn-outline-primary').'">รายงานออมเงิน</button>', ['action' => 'savingreport'], ['escape' => false, 'label' => false]) ?>
  </div>
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='seller'?'btn-primary':'btn-outline-primary').'">ยอดขายของพนักงาน</button>', ['action' => 'seller'], ['escape' => false, 'label' => false]) ?>
  </div>
  <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='warehouse'?'btn-primary':'btn-outline-primary').'">รายการสินค้าคงเหลือ</button>', ['action' => 'warehouse'], ['escape' => false, 'label' => false]) ?>
  </div>
    <div class="col-md-3">
    <?= $this->Html->link(' <button  type="button" class="'.$class.($action=='order'?'btn-primary':'btn-outline-primary').'">รายงานการสั่งทำ</button>', ['action' => 'order'], ['escape' => false, 'label' => false]) ?>
  </div>

</div>
