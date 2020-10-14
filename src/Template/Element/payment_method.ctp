<div class="row">
    <div class="col-md-12">
        <p><strong>วิธีการชำระเงิน: </strong><span id="payment_method_label" class="text-primary">เงินสด</span></p>
    </div>
</div>



<div class="row form-group">
    <div class="col-md-6 button-list">
        <button type="button" name="payment_method_bt" class="btn btn-outline-success waves-effect waves-light btn-block btn-lg" value="CASH" style="font-size:14px;">เงินสด</button>
    </div>
    <div class="col-md-6 button-list">
        <button type="button" name="payment_method_bt" class="btn btn-outline-success waves-effect waves-light btn-block btn-lg" value="TRAN" style="font-size:14px;">โอนเงิน</button>
    </div>
</div>
<div class="row" id="credit_account_box" style="display: none;">
    <div class="col-md-12 form-group">
        <?= $this->Form->select('credit_account_id', [], ['class' => 'form-control form-control-lg', 'id' => 'credit_account_id']) ?>
    </div>
</div>
<?= $this->Form->hidden('transaction_type', ['id' => 'transaction_type']) ?>
<div class="row" id="bank_account_box" style="display: none;">
    <div class="col-md-12 form-group">
        <?= $this->Form->select('bank_account_id', [], ['class' => 'form-control form-control-lg', 'id' => 'bank_account_id']) ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('button[name="payment_method_bt"]').on('click', function () {
            var paymentMethod = this.value;
            $('#payment_method').val(paymentMethod);
            $('#payment_method_label').html($(this).text());
            console.log(paymentMethod);
            $('button[name="payment_method_bt"]').addClass('btn-light').removeClass('btn-success');
            $(this).addClass('btn-success');

            if (paymentMethod === 'TRAN') {
                $('#bank_account_box').show();
                $('#credit_account_box').hide();
            } else if (paymentMethod === 'CRED') {
                $('#bank_account_box').hide();
                $('#credit_account_box').show();
            } else {
                $('#bank_account_box').hide();
                $('#credit_account_box').hide();
            }
        });
    });
</script>