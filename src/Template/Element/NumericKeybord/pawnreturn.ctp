

<script>
    var keyupdate_field = '#amount';
    var keyupdate_field_label = '#x';
</script>
<hr/>

<div class="row" id="receipt_box">
    <div class="col-md-6 text-left">
        <h3 class="text-success prompt-400" id="">รับเงิน</h3>
    </div>
    <div class="col-md-6 text-right color-green">
        <h3 id="l_receipt_amt" class="prompt-400">0</h3>
        <?= $this->Form->hidden('receiptamt', ['value' => '0', 'id' => 'receiptamt']) ?>
    </div>
    <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>
    <div class="col-md-6 text-left"><h3 id="changeamt_title_label" class=" prompt-400">เงินทอน</h3></div>
    <div class="col-md-6 text-right"><h3 id="changeamt_label" class=" prompt-400">0</h3></div>

    <div class="col-md-12">
        <p style="margin-bottom: 0px;"><strong>วิธีการชำระเงิน: </strong><span id="payment_method_label">เงินสด</span></p>
        <p id="bank_f_box" style="display:none;"><strong>ธนาคาร/เครดิต: </strong><span id="bank_f_label"></span></p>
    </div>

</div>

<div class="row">

</div>
<div class="row button-list">
    <div class="col-md-6 text-left">
        <button type="button" class="btn btn-block btn-lg btn-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_receipt_modal"> 
            <i class="ion-cash m-r-5"></i> <span>รับเงิน</span> 
        </button>
    </div>
    <div class="col-md-6 text-left" style="display: none;" id="box_saving_bt">
        <button type="button" class="btn btn-block btn-lg btn-secondary waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_saving_modal"> 
            <i class=" mdi mdi-coin m-r-5"></i> <span>เงินออม</span> 
        </button>
    </div>
    <div class="col-md-6 text-left">
        <button type="button" class="btn btn-block btn-lg btn-warning waves-effect waves-light m-b-5" data-toggle="modal" data-target="#key_discount_modal"> 
            <i class="ion-arrow-graph-down-right m-r-5"></i> <span>ส่วนลด</span> 
        </button>
    </div>



    <div class="col-md-12 m-b-10">
        <button type="button" class="btn btn-block btn-success waves-effect waves-light fa-2x" style="padding: 15px 0px;" id="savebutton"><i class="mdi mdi-content-save-settings"></i> บันทึก</button>
    </div>
    <?= $this->element('key_receipt_modal_returnpawn') ?>
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

    });


</script>


<script type="text/javascript">

    $('#savebutton').click(function () {
        var amount = $('#subtotalamt').val();
        var discount = $('#discountamt').val();

        var receiptamt = $('#receiptamt').val();
        var totalamt = amount - discount;
        // console.log(totalamt);

        Swal.fire({
            title: "ทำรายการ ไถ่ถอน/ต่อดอก",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "ยกเลิก",
            confirmButtonText: "บันทึก"
        }
        ).then(
                function (t) {
                    if (t.value) {

                        if ($('#returndate').val() == '') {
                            notisErr('จำเป็นต้องระบุวันที่ ไถ่ถอน/ต่อดอก');
                            // $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องระบุวันที่ ไถ่ถอน/ต่อดอก', '');
                            return false;
                        } else if (receiptamt < totalamt) {
                            notisErr('ยอดเงินไม่ถูกต้อง');
                            //$.Notification.autoHideNotify('error', 'top right', 'ยอดเงินไม่ถูกต้อง', '');
                            return false;

                        } else {
                            $('#pawn').submit();
                        }
                    }

                });


    });


</script>