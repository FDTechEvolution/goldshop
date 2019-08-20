<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="panel-body">
                <?=$this->element('printform/receipt')?>
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <?= $this->Html->link(BT_BACK, ['controller' => 'sales', 'action' => 'showall'], ['escape' => false]) ?>
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i> Print</a>
                        <?php if ($payment->docstatus == 'DR') { ?>
                            <?= $this->Html->link('<span class="ti-marker-alt"></span> แก้ไข', ['controller' => 'sales', 'action' => 'edit', $payment->id], ['escape' => false, 'class' => 'btn btn-secondary waves-effect waves-light']) ?>
                        <?php } ?>
                        <?php if ($payment->docstatus != 'VO') { ?>
                            <?= $this->Form->postLink('<span class="mdi mdi-alert-octagon"></span> ยกเลิกรายการ', ['controller' => 'sales', 'action' => 'void', $payment->id], ['escape' => false, 'class' => 'btn btn-primary waves-effect waves-light']) ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>