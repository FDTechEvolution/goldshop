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
<?php
$secondary = 'btn btn-secondary waves-effect btn-block btn-lg m-b-10';
?>

<?php if (!isset($issales) || $issales == 'N') { ?>
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
        <div class="col-md-12 m-b-10">
            <button type="button" class="btn btn-block btn-warning waves-effect waves-light fa-2x" style="padding: 15px 0px;" id="exchangebutton"><i class="ti-reload"></i> บันทึกเพื่อแลกเปลี่ยน</button>
        </div>
    </div>
<?php } else { ?>
    <div class="row m-b-10">
        <div class="col-md-3"><button type="button" name="payment_method_bt" class="btn btn-success waves-effect btn-block btn-lg m-b-10" value="CASH" style="font-size:14px;">เงินสด</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="7">7</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="8">8</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="9">9</button></div>

        <div class="col-md-3"><button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="TRAN" style="font-size:14px;">โอนเงิน</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="4">4</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="5">5</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="6">6</button></div>

        <div class="col-md-3"><button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="CRED" style="font-size:14px;">เครดิต</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="1">1</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="2">2</button></div>
        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="3">3</button></div>

        <div class="col-md-3"><button type="button" class="btn btn-primary waves-effect btn-block btn-lg m-b-10" id="del_bt">DEL</button></div>
        <div class="col-md-6"><button type="button" class="<?= $secondary ?>" data-name="key" value="0">0</button></div>

        <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value=".">.</button></div>

        <div class="col-md-3"><button type="button" class="btn btn-warning waves-effect btn-block btn-lg m-b-10" id="discount_bt" style="font-size:14px;" data-toggle="modal" data-target="#discount_modal">ส่วนลด</button></div>
        <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="100" style="font-size:14px;">+100</button></div>
        <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="500" style="font-size:14px;">+500</button></div>
        <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="1000" style="font-size:14px;;padding-left: 3px;padding-right: 3px;">+1,000</button></div>


        <div class="col-md-3"></div>
        <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="5000" style="font-size:14px;;padding-left: 3px;padding-right: 3px;">+5,000</button></div>
        <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="10000" style="font-size:14px;;padding-left: 3px;padding-right: 3px;">+10,000</button></div>
        <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="20000" style="font-size:14px;padding-left: 3px;padding-right: 3px;">+20,000</button></div>
    </div>
    <div class="row m-b-10">
        <div class="col-md-12 m-b-10">
            <button type="submit" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 15px 0px;"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
        </div>
    </div>

<?php } ?>

<div class="col-md-12">
    <div id="discount_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title text-primary prompt-500">ส่วนลด</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4 offset-md-4">
                            <label for="code">ส่วนลด/บาท </label>
                            <?= $this->Form->control('_discount', ['class' => 'form-control', 'id' => '_discount', 'label' => false, 'value' => '0']) ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-info waves-effect waves-light" id="discount_save">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


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

    function recalculateAll() {
        //console.log($(this).val());
        //var subtotalamt = $(this).val();
        var amount = $('#amount').length === 0 ? 0 : $('#amount').val();
        var subtotalamt = $('#subtotalamt').length === 0 ? 0 : $('#subtotalamt').val();
        var discount = $('#discount').length === 0 ? 0 : $('#discount').val();
        var totalamount = subtotalamt - discount;
        var change = 0;



        $("#subtotalamt_label").html(Number(subtotalamt).toLocaleString('en'));
        $("#discount_label").html('-'+Number(discount).toLocaleString('en'));
        $("#totalamt_label").html(Number(totalamount).toLocaleString('en'));

        if (amount > totalamount) {
            change = amount - totalamount;
            $('#changeamt_title_label').html('เงินทอน');
        } else {
            $('#changeamt_title_label').html('ค้างชำระ');
            change = totalamount - amount;
        }
        $("#changeamt_label").html(Number(change).toLocaleString('en'));
    }


    $(document).ready(function () {
        var keyupdate_field = '#amount';
        var keyupdate_field_label = '#amount_label';

        $("#subtotalamt").bind("change", function () {
            recalculateAll();
        });
        $("#discount").bind("change", function () {
            recalculateAll();
        });

        $("#amount").bind("change", function () {
            recalculateAll();
        });


        $('#discount_save').on('click', function () {
            var _discount = $('#_discount').val();
            if (_discount === '' || _discount === 0) {
                _discount = 0;
            }
            $('#discount').val(_discount).trigger('change');
            $("#discount_label").html('-'+Number(_discount).toLocaleString('en'));
            $('#discount_modal').modal('hide');
        });

        $(keyupdate_field_label).bind('DOMNodeInserted DOMNodeRemoved', function (e) {
            recalculateAll();
        });







        $('button[data-name="key"]').on('click', function () {
            //console.log(this.value);
            enterKey(this.value);

        });

        //name="payment_method_bt"
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

        $('#del_bt').on('click', function () {
            var currect_value = ($(keyupdate_field).val());
            currect_value = currect_value.slice(0, -1);
            $(keyupdate_field).val(currect_value);
            $(keyupdate_field_label).html(Number(currect_value).toLocaleString('en'));
        });

        $('button[data-name="plus"]').on('click', function () {
            var currect_value = ($(keyupdate_field).val());
            if (currect_value === '' || currect_value === null) {
                currect_value = this.value;
            } else {
                currect_value = parseFloat(currect_value) + parseFloat(this.value);
            }

            $(keyupdate_field).val(currect_value);
            $(keyupdate_field_label).html(Number(currect_value).toLocaleString('en'));
        });
    });
</script>


<script type="text/javascript">
    $('#savebutton').click(function () {
        swal({
            title: 'บันทึกข้อมูลสำหรับ "ขาย" ?',
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
                $('#transaction_type').val('normal');
                $('#frm').submit();
            }
        });
    });

    $('#exchangebutton').click(function () {
        swal({
            title: 'บันทึกสำหรับ "การแลกเปลี่ยน" ?',
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
                $('#transaction_type').val('exchange');
                $('#frm').submit();
            }
        });
    });
</script>

