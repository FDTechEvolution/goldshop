<div class="row">
    <div class="col-md-7 text-left">
        <h3 class="prompt-400" id="totalamt_title_label">รวม</h3>    
    </div>
    <div class="col-md-5 text-right">
        <h3 id="subtotalamt_label" class="">0</h3>
        <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6 text-left prompt-400"><h3 class="text-danger">ส่วนลด</h3></div>
    <div class="col-md-6 text-right text-danger"><h3 id="discount_label">0</h3></div>
    <?= $this->Form->hidden('discount', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'discount', 'value' => '0']) ?>
</div>
<div class="row">
    <div class="col-md-7 text-left">
        <h2 class="text-success prompt-400" id="totalamt_title_label">รวมทั้งสิ้น</h2>    
    </div>
    <div class="col-md-5 text-right">
        <h2 id="totalamt_label" class="text-success">0</h2>
        <?= $this->Form->hidden('totalamt', ['label' => false, 'id' => 'totalamt', 'value' => '0']) ?>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-6 text-left prompt-400"><h3 class="color-green">รับเงินทั้งหมด</h3></div>
    <div class="col-md-6 text-right color-green"><h2 id="amount_label">0</h2></div>
    <?= $this->Form->hidden('amount', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'amount', 'value' => '0']) ?>
    <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
</div>

<div class="row m-b-10">
    <div class="col-md-6 text-left prompt-400"><h3 id="changeamt_title_label">เงินทอน</h3></div>
    <div class="col-md-6 text-right"><h3 id="changeamt_label">0</h3></div>
</div>

<?=$this->element('NumericKeybord/numeric_keybord')?>

