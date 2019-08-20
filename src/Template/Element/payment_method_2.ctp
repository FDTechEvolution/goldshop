<div class="row">
    <div class="col-md-12">
        <p><strong>วิธีการชำระเงิน: </strong><span id="payment_method_label">เงินสด</span></p>
    </div>
</div>
<div class="row" id="bank_account_box" style="display: none;">
    <div class="col-md-12 form-group">
        <?= $this->Form->select('bank_account_id', $bankAccountList, ['class' => 'form-control form-control-lg', 'id' => 'bank_account_id']) ?>
    </div>
</div>

<div class="row" id="credit_account_box" style="display: none;">
    <div class="col-md-12 form-group">
        <?= $this->Form->select('credit_account_id', $creditAccountList, ['class' => 'form-control form-control-lg', 'id' => 'credit_account_id']) ?>
    </div>
</div>
<?= $this->Form->hidden('transaction_type', ['id' => 'transaction_type']) ?>
<div class="row m-b-10">
    <div class="col-md-3">
        <button type="button" name="payment_method_bt" class="btn btn-success waves-effect btn-block btn-lg m-b-10" value="CASH" style="font-size:14px;">เงินสด</button>
    </div>
    <div class="col-md-3">
        <button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="TRAN" style="font-size:14px;">โอนเงิน</button>
    </div>
    <div class="col-md-3">
        <button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="CRED" style="font-size:14px;">เครดิต</button>
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