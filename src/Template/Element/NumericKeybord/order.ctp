<div class="row">
    <div class="col-md-7 text-left">
        <h2 class="text-danger prompt-400" id="totalamt_title_label">มูลค่าสินค้า</h2>    
    </div>
    <div class="col-md-5 text-right">
        <h2 id="subtotalamt_label" class="text-danger">0</h2>
        <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
    </div>
</div>
<hr/>
<div class="row m-b-10">
    <div class="col-md-6 text-left prompt-400"><h3 class="color-green">เงินมัดจำ</h3></div>
    <div class="col-md-6 text-right color-green"><h2 id="receiptamt_label">0.00</h2></div>
    <?= $this->Form->hidden('receiptamt', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'receiptamt', 'value' => '0']) ?>
    <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
</div>
<div class="row m-b-10">
    <div class="col-md-6 text-left prompt-400"><h3 id="changeamt_title_label">ค้างชำระ</h3></div>
    <div class="col-md-6 text-right"><h3 id="changeamt_label">0.00</h3></div>
</div>
<script>
    var keyupdate_field = '#receiptamt';
    var keyupdate_field_label = '#receiptamt_label';
    
</script>
<?=$this->element('NumericKeybord/numeric_keybord')?>