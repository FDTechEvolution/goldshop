<div class="row m-b-10">

    <div class="col-md-6 text-left prompt-500" ><h4 class="color-green">ค่าดอกเบี้ย</h4></div>
    <div class="col-md-6 text-right color-green " ><h4 id="interrestrateshow">0.00</h4></div>
    <div class="col-md-6 text-left prompt-500" ><h4 class="color-green">อัตราดอกเบี้ย</h4></div>
    <div class="col-md-6 text-right color-green " ><h4 id="typeshow">0</h4></div>
    <div class="col-md-6 text-left prompt-500" ><h4 class="color-green">ส่วนลดค่าดอกเบี้ย</h4></div>
    <div class="col-md-6 text-right color-green " ><h4 id="discountshow">0</h4></div>
    <div class="col-md-6 text-left prompt-500" ><h3 class="color-green">ค่าดอกเบี้ยสุทธิ</h3></div>
    <div class="col-md-6 text-right color-green" ><h3 id="newinterrestrateshow">0.00</h3></div>
    <?= $this->Form->control('rate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'rate']) ?> 
    <?= $this->Form->control('newinterrestrate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'newinterrestrate']) ?> 
    <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
    <?= $this->Form->control('interrestrate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'interrestrate']) ?>
</div>
<script>
    var keyupdate_field = '#amount';
    var keyupdate_field_label = '#x';
</script>
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
</div>
<div class="row m-b-10">
    <div class="col-md-12 m-b-10">
        <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 15px 0px;" id="savebutton"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(keyupdate_field_label).bind('DOMNodeInserted DOMNodeRemoved', function (e) {
            calChangeAmt();
        });

        $('#subtotal_label').bind('DOMNodeInserted DOMNodeRemoved', function (e) {
            calChangeAmt();
        });

        function calChangeAmt() {
            var receiptamt = ($(keyupdate_field).val());
            var subtotalamt = ($('#subtotalamt').val());

            if (!(receiptamt === null || receiptamt === '' || receiptamt === '0')) {

                receiptamt = parseFloat(receiptamt);
                subtotalamt = parseFloat(subtotalamt);

                var change = 0;
                if (receiptamt > subtotalamt) {
                    change = receiptamt - subtotalamt;
                    $('#changeamt_title_label').html('เงินทอน');
                } else {
                    $('#changeamt_title_label').html('ค้างชำระ');
                    change = subtotalamt - receiptamt;
                }

                if (receiptamt < subtotalamt) {
                    $("#changeamt_label").html(Number(0).toLocaleString('en'));
                } else {
                    $("#changeamt_label").html(Number(change).toLocaleString('en'));
                }


            } else {
                $("#changeamt_label").html(Number(0).toLocaleString('en'));
            }

        }

        function enterKey(value) {
            //console.log(value);
            var current_value = ($(keyupdate_field).val());
            var current_value_str = Number(current_value).toLocaleString('en');

            if (current_value === '0' && value !== '0' && value !== '.') {
                current_value = value;
            } else {
                if (this.value === '.') {
                    console.log(current_value.indexOf('.'));
                    if (current_value.indexOf('.') === -1 && current_value.length !== 0) {
                        current_value = current_value + value;
                    }
                } else {
                    current_value = current_value + value;
                }

            }

            var new_number = 0;

            if (this.value === '.') {
                $(keyupdate_field).val(current_value);
                $(keyupdate_field_label).html(current_value_str + '.');
            } else {
                new_number = new Intl.NumberFormat('en-IN', {maximumFractionDigits: 4}).format(current_value);
                $(keyupdate_field).val(current_value);
                $(keyupdate_field_label).html(new_number);
            }
        }

        $('button[data-name="key"]').on('click', function () {
            //console.log(this.value);
            enterKey(this.value);

        });





        //name="payment_method_bt"
        $('button[name="payment_method_bt"]').on('click', function () {
            var paymentMethod = this.value;
            $('#payment_method').val(paymentMethod);
            $('#payment_method_label').html($(this).text());

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


<script type="text/javascript">
    $('#savebutton').click(function () {
        swal({
            title: 'ทำรายการ ไถ่ถอน/ต่อดอก',
            text: "",
            type: "warning",
            showCancelButton: true,
            cancelButtonClass: 'btn-secondary waves-effect waves-light',
            confirmButtonClass: 'btn-success waves-effect waves-light',
            confirmButtonText: 'บันทึก',
            cancelButtonText: 'ยกเลิก',
            loseOnCancel: true,
            closeOnConfirm: true
        }, function (isConfirm) {
            if (isConfirm) {
                //$('#page-load').show();
                //$('#transaction_type').val('normal');
                if ($('#returndate').val() == '') {
                    $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุวันที่ ไถ่ถอน/ต่อดอก', '');
                    return false;
                } else {
                    $('#pawn').submit();
                }
            }
        });
    });


</script>