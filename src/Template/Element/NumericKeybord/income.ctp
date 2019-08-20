<div class="row m-b-10">
    <div class="col-md-6 text-left"><h2 class="color-green">จำนวนเงิน</h2></div>
    <div class="col-md-6 text-right color-green"><h2 id="receiptamt_label">0.00</h2></div>
    <?= $this->Form->hidden('receiptamt', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'receiptamt', 'value' => '0']) ?>
    <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
</div>
<script>
    var keyupdate_field = '#receiptamt';
    var keyupdate_field_label = '#receiptamt_label';
</script>
<?=$this->element('NumericKeybord/numeric_keybord')?>