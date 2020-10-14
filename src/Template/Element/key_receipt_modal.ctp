<div class="col-md-6 text-left">
    <h3 class="text-success prompt-400" style="margin-bottom: 0px;" id="">รับเงิน</h3>
</div>
<div class="col-md-6 text-right color-green">
    <h3 id="l_receipt_amt" class="prompt-400" style="margin-bottom: 0px;">0</h3>

</div>

<div class="col-md-6 text-left"><h4 id="changeamt_title_label" class=" prompt-400">เงินทอน</h4></div>
<div class="col-md-6 text-right"><h4 id="changeamt_label" class=" prompt-400">0</h4></div>

<div class="col-md-12">
    <p style="margin-bottom: 0px;"><strong>วิธีการชำระเงิน: </strong><span id="payment_method_label">เงินสด</span></p>
    <p id="bank_f_box" style="display:none;"><strong>ธนาคาร/เครดิต: </strong><span id="bank_f_label"></span></p>
</div>
<div class="col-md-6 text-left button-list">
    <button type="button" class="btn btn-block btn-lg btn-outline-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_receipt_modal" id="bt_receipt"> 
        <i class="ion-cash m-r-5"></i> <span>รับเงิน</span> 
    </button>
</div>
<div class="col-md-6 text-left button-list" style="display: none;" id="box_saving_bt">
    <button type="button" class="btn btn-block btn-lg btn-outline-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_saving_modal"> 
        <i class=" mdi mdi-coin m-r-5"></i> <span>เงินออม</span> 
    </button>
</div>
<div class="col-md-6 text-left button-list">
    <button type="button" class="btn btn-block btn-lg btn-outline-warning waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_discount_modal"> 
        <i class="ion-arrow-graph-down-right m-r-5"></i> <span>ส่วนลด</span> 
    </button>
</div>

<div id="key_receipt_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary prompt-500">รับเงิน</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row ">
                            <div class="col-md-5 form-group align-middle">
                                <h2>เงินสด</h2>
                            </div>
                            <div class="col-md-7 text-right form-group">
                                <input type="tel" name="cash_amt" id="cash_amt" class="form-control form-control-lg" value="0" />
                            </div>
                        </div>
                        <hr/>

                        <div class="row">
                            <div class="col-md-5 form-group align-middle">
                                <h2>โอนเงิน</h2>
                            </div>
                            <div class="col-md-7 text-right form-group align-middle">
                                <input type="tel" name="tran_amt" id="tran_amt" class="form-control form-control-lg" value="0"/>
                            </div>
                            <div class="col-md-12 form-group" id="bank_account_box">
                                <?= $this->Form->select('bank_account_id', [], ['class' => 'form-control form-control-lg', 'id' => 'bank_account_id']) ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?= $this->Form->hidden('_receiptamt', ['id' => '_receiptamt', 'value' => '0']) ?>
                            
                                <?= $this->Form->hidden('cred_amt', ['id' => 'cred_amt', 'value' => '0']) ?>
                       
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success waves-effect waves-light" id="receipt_save">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>

<div id="key_discount_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-primary prompt-500">ส่วนลด</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center form-group">

                        <input type="tel" class="form-control form-control-lg" name="_discountamt" id="_discountamt" value="0"/>
                    </div>
                </div>

            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success waves-effect waves-light" id="discount_save">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>

<div id="key_saving_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-primary prompt-500">ใช้เงินออม คงเหลือ <strong id="l_saving_balance"></strong></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 id="_l_saving_amt" class="prompt-400 color-green">0</h1>
                        <input type="hidden" name="_savingamt" id="_savingamt" value="0"/>

                    </div>
                </div>
                <?php
                $secondary = 'btn btn-secondary waves-effect btn-block btn-lg m-b-10';
                $data_name_saving = 'saving_key';
                ?>
                <div class="row m-b-10">
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="7">7</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="8">8</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="9">9</button></div>
                    <div class="col-md-3"><button type="button" class="btn btn-primary waves-effect btn-block btn-lg m-b-10" id="saving_del_bt">DEL</button></div>

                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="4">4</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="5">5</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="6">6</button></div>
                    <div class="col-md-3"></div>


                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="1">1</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="2">2</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="3">3</button></div>


                    <div class="col-md-6"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value="0">0</button></div>

                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name_saving ?>" value=".">.</button></div>
                    <div class="col-md-3"></div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success waves-effect waves-light" id="saving_save">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>


<script>
    function enterKey(value, filed, label, type) {
        if (type === 'receipt') {
            var activePaymentMethod = $('#payment_method').val();

            filed = activePaymentMethod.toLowerCase() + '_amt';
            label = '_l_' + activePaymentMethod.toLowerCase() + '_amt';
        }


        var current_value = ($('#' + filed).val());
        if (current_value.length > 8) {
            return false;
        }
        var current_value_str = Number(current_value).toLocaleString('en');
        //console.log(current_value);
        //console.log(current_value_str);
        var spl = current_value.split(".");
        if (spl.length === 2 && spl[1].length === 2) {
            return false;
        }

        if (current_value === '0' && value !== '0' && value !== '.') {
            current_value = value;
        } else {
            if (value === '.') {
                if (current_value.indexOf('.') === -1 && current_value.length !== 0) {
                    current_value = current_value + value;
                }
            } else {
                current_value = current_value + value;
            }

        }

        //var new_number = 0;
        if (this.value === '.') {
            $('#' + filed).val(current_value).trigger('change');
            $('#' + label).html(current_value_str + '.');
        } else {
            //new_number = new Intl.NumberFormat('en-IN', {maximumFractionDigits: 4}).format(current_value);
            $('#' + filed).val(current_value).trigger('change');

            $('#' + label).html(Number(current_value).toLocaleString('en'));
        }
    }

    function recalculateAll() {
        console.log('recalculateAll');
        //var subtotalamt = $(this).val();
        var receiptamt = $('#receiptamt').length === 0 ? 0 : $('#receiptamt').val();

        var subtotalamt = $('#subtotalamt').length === 0 ? 0 : $('#subtotalamt').val();
        var discount = $('#discountamt').length === 0 ? 0 : $('#discountamt').val();
        var savingamt = $('#savingamt').length === 0 ? 0 : $('#savingamt').val();

        savingamt = parseFloat(savingamt);
        discount = parseFloat(discount);
        subtotalamt = parseFloat(subtotalamt);

        var receiptTotalAmt = parseFloat(receiptamt);
        var totalamount = subtotalamt - discount - savingamt;

        var change = 0;

        //Set Label
        $("#l_receipt_amt").html(Number(receiptamt).toLocaleString('en'));
        $("#l_discount_amt").html(Number(discount).toLocaleString('en'));
        $("#l_saving_amt").html(Number(savingamt).toLocaleString('en'));
        $("#l_receipt_total_amt").html(Number(receiptTotalAmt).toLocaleString('en'));
        $("#subtotalamt_label").html(Number(subtotalamt).toLocaleString('en'));
        $("#l_total_amt").html(Number(totalamount).toLocaleString('en'));

        if (savingamt > 0) {
            $('#box_saving').show();
        } else {
            $('#box_saving').hide();
        }

        if (discount > 0) {
            $('#box_discount').show();
        } else {
            $('#box_discount').hide();
        }



        if (discount === 0) {
            $("#discount_label").html(Number(discount).toLocaleString('en'));
        } else {
            $("#discount_label").html('-' + Number(discount).toLocaleString('en'));
        }

        //$("#totalamt_label").html(Number(totalamount).toLocaleString('en'));
        //$('#receipt_f_label').html(Number(receiptamt).toLocaleString('en'));

        if (receiptTotalAmt > totalamount) {
            change = receiptTotalAmt - totalamount;
            $('#changeamt_title_label').html('เงินทอน');
        } else {
            $('#changeamt_title_label').html('ค้างชำระ');
            change = totalamount - receiptTotalAmt;
        }
        $("#changeamt_label").html(Number(change).toLocaleString('en'));
    }

    $(document).ready(function () {
        $('#key_receipt_modal').modal({
            backdrop: 'static',
            show: false,
            keyboard: false  // to prevent closing with Esc button (if you want this too)
        });
    });


    $(document).ready(function () {

        $("input[type='tel']").click(function () {
            $(this).select();
        });

        $('#bt_receipt').on('click', function () {
            var sub_total_amt = $('#subtotalamt').val();
            var cash_amt = parseFloat($('#cash_amt').val());
            if (cash_amt < 1) {
                $('#_l_cash_amt').html(Number(sub_total_amt).toLocaleString('en'));
                $('#cash_amt').val(sub_total_amt).trigger('change');
            }
        });



        $('#del_bt').on('click', function () {
            var activePaymentMethod = $('#payment_method').val();

            filed = '#' + activePaymentMethod.toLowerCase() + '_amt';
            label = '#_l_' + activePaymentMethod.toLowerCase() + '_amt';

            var currect_value = ($(filed).val());
            //console.log(currect_value);
            currect_value = currect_value.slice(0, -1);
            if (currect_value === '') {
                currect_value = 0;
            }
            $(filed).val(currect_value).trigger('change');
            $(label).html(Number(currect_value).toLocaleString('en'));
        });

        $('#discount_del_bt').on('click', function () {
            var currect_value = ($('#_discountamt').val());
            currect_value = currect_value.slice(0, -1);
            if (currect_value === '') {
                currect_value = 0;
            }

            $('#_discountamt').val(currect_value).trigger('change');
            $('#_l_discount_amt').html(Number(currect_value).toLocaleString('en'));
        });

        $('#saving_del_bt').on('click', function () {
            var currect_value = ($('#_savingamt').val());
            currect_value = currect_value.slice(0, -1);
            if (currect_value === '') {
                currect_value = 0;
            }

            $('#_savingamt').val(currect_value).trigger('change');
            $('#_l_saving_amt').html(Number(currect_value).toLocaleString('en'));
        });

        $('button[name="payment_method_bt"]').on('click', function () {
            var paymentMethod = this.value;
            $('#payment_method').val(paymentMethod).trigger('change');
            //$('#payment_method_label').html($(this).text());
            //console.log(paymentMethod);
            $('button[name="payment_method_bt"]').addClass('btn-light').removeClass('btn-success');
            $(this).addClass('btn-success');

            if (paymentMethod === 'TRAN') {
                $('#bank_account_box').show();
                $('#bank_f_box').show();
                //$('#credit_account_box').hide();
                //var bank_text = $("#bank_account_id option:selected").text();
                //$('#bank_f_label').html(bank_text);

            } else if (paymentMethod === 'CRED') {
                //$('#bank_account_box').hide();
                $('#credit_account_box').show();
                $('#bank_f_box').show();
                //var bank_text = $("#credit_account_id option:selected").text();
                //$('#bank_f_label').html(bank_text);
            } else {
                //$('#bank_account_box').hide();
                //$('#credit_account_box').hide();
                $('#bank_f_box').hide();
            }
        });

        $('button[data-name="plus"]').on('click', function () {
            var activePaymentMethod = $('#payment_method').val();

            filed = '#' + activePaymentMethod.toLowerCase() + '_amt';
            label = '#_l_' + activePaymentMethod.toLowerCase() + '_amt';

            var currect_value = ($(filed).val());
            if (currect_value === '' || currect_value === null) {
                currect_value = this.value;
            } else {
                currect_value = parseFloat(currect_value) + parseFloat(this.value);
            }

            $(filed).val(currect_value).trigger('change');
            $(label).html(Number(currect_value).toLocaleString('en'));
        });



        $("#subtotalamt").bind("change", function () {
            //console.log('hello');
            recalculateAll();
        });
        $("#discountamt").bind("change", function () {
            recalculateAll();
        });
        $("#savingamt").bind("change", function () {
            recalculateAll();
        });

        $("#receiptamt").bind("change", function () {
            //console.log('hello');
            $('#receipt_box').show();
            $(":submit").removeAttr("disabled");
            recalculateAll();
        });

        $("#bank_account_id").bind("change", function () {
            var bank_text = $("#bank_account_id option:selected").text();
            $('#bank_f_label').html(bank_text);
        });

        $("#credit_account_id").bind("change", function () {
            var bank_text = $("#credit_account_id option:selected").text();
            $('#bank_f_label').html(bank_text);
        });


        $('#receipt_save').click(function () {
            //var receipt_amt = $('#_receiptamt').val();
            var cash_amt = parseFloat($('#cash_amt').val());
            var tran_amt = parseFloat($('#tran_amt').val());
            var cred_amt = parseFloat($('#cred_amt').val());
            var receipt_amt = cash_amt + tran_amt + cred_amt;
            $('#receiptamt').val(receipt_amt).trigger('change');


            var payment_method_text = '';
            var payment_detail_text = '';
            if (cash_amt > 0) {
                payment_method_text = 'เงินสด ' + Number(cash_amt).toLocaleString('en');
            }
            if (tran_amt > 0) {
                payment_method_text = payment_method_text + ' โอนเงิน ' + Number(tran_amt).toLocaleString('en');
                payment_detail_text = $("#bank_account_id option:selected").text();
            }
            if (cred_amt > 0) {
                payment_method_text = payment_method_text + ' บัตรเครดิต';
                //payment_detail_text = $("#credit_account_id option:selected").text();
            }

            $('#payment_method_label').html(payment_method_text);
            $('#bank_f_label').html(payment_detail_text);
            $('#key_receipt_modal').modal('hide');
        });

        $('#discount_save').click(function () {
            var discount_amt = $('#_discountamt').val();
            $('#discountamt').val(discount_amt).trigger('change');

            $('#key_discount_modal').modal('hide');
        });

        $('#saving_save').click(function () {
            var use_saving_amt = $('#_savingamt').val();
            //$('#saving_box').show();
            // $('#saving_f_label').html(Number(use_saving_amt).toLocaleString('en'));
            $('#key_saving_modal').modal('hide');

            $('#savingamt').val(use_saving_amt).trigger('change');
        });

    });
</script>
