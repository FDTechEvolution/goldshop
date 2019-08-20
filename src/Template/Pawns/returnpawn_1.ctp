<?= $this->Form->create($pawn, ['id' => 'myform']) ?>

<div class="col-md-12  col-lg-12 col-xs-12 ">
    <div class="card-box ">
        <div class="panel-body">

            <?php
            $bp = $pawn->bpartner;
            $branch = $pawn->branch;
            $org = $pawn->org;
            $address = $bp->address;
            $orgAddress = $branch->address;
            $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
            ?>
            <div class="clearfix">
                <div class="pull-left prompt-400">
                    <h3 class="text-left prompt-500 text-primary"><?= PAGE_TITLE ?></h3>
                    <p><?= h($orgAddress->address_line . ' ตำบล' . $orgAddress->subdistrict . ' อำเภอ' . $orgAddress->district . ' จังหวัด' . $orgAddress->province . ' ' . $orgAddress->postalcode) ?></p>
                </div>
                <div class="pull-right prompt-300">
                    <h3>#ใบจำนำ</h3>
                </div>
            </div>
            <hr>
            <div class="row">

                <div class="col-12 prompt-400">
                    <div class="pull-left m-t-10">

                        <address>
                            <strong><?= h($bp->name) ?></strong><br>
                            <?php if (!is_null($address) && $address != '') { ?>
                                <?= h(' ' . $address->houseno . ' ' . $address->address_line . ' ' . $address->subdistrict) ?><br>
                                <?= h(' ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>
                            <?php } ?>
                        </address>
                    </div>
                    <div class="pull-right m-t-10">
                        <p><strong>วันที่: </strong> <?= h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></p>
                        <?= $this->Form->control('thisdate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'value' => '<?= ($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?>']) ?> 

                        <p class="m-t-10"><strong>หมายเลขเอกสาร: </strong><?= h($pawn->docno) ?></p>
                    </div>
                </div>
            </div>
            <div class="row ">

                <div class="form-group ">

                    <h3 class="text-left prompt-500 text-primary"><i class="mdi mdi-book-open"></i> รายละเอียดการรับจำนำ</h3>
                </div>

            </div>
            <div class="row ">
                <div class="col-md-8  col-lg-8 col-xs-8 ">
                    <div class="card m-b-20 card-body">
                        <div class="row ">
                            <table id="listdata" class="table table-striped">
                                <tr>
                                    <th style="text-align: center">สินค้า</th>
                                    <th style="text-align: center" >ราคา</th>
                                    <th >รายละเอียด</th>

                                </tr>
                                <?php foreach ($pawn->pawn_lines as $pawnLines): ?>
                                    <tr>

                                        <td style="text-align: center"><?= h($pawnLines->product->name) ?></td>

                                        <td style="text-align: center"><?= h($pawnLines->amount) ?></td>
                                        <td><?= h($pawnLines->description) ?></td>

                                    </tr>
                                <?php endforeach; ?>

                            </table>


                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 ">
                                <b>หมายเหตุ </b>
                                <?= '  <br> ' . $pawn->log_history ?>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4  col-lg-4 col-xs-4 ">
                    <div class="card m-b-20 card-body">

                        <div class="row">
                            <div class="col-md-7 text-left">
                                <label ><h2 class="text-danger prompt-400" id="totalamt_title_label">จำนวนเงินต้น</h2> </label>

                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('totalmoney', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'totalmoney']) ?> 

                                <h2 class="text-danger prompt-400" id="totalamt_title_label"> <?= $pawn->totalmoney ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 text-left">
                                <label ><h3 class="color-green prompt-400">อัตราดอกเบี้ยแบบ</h3> </label>

                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('type', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'type']) ?> 

                                <h3 class="color-green prompt-400"><?= $pawn->type ?></h3> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 text-left">

                                <label ><h3 class="color-green prompt-400">ค่าดอกเบี้ย (บาท)</h3>  </label>

                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('interrestrate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'interrestrate']) ?> 

                                <h3 class="color-green prompt-400"><?= $pawn->interrestrate ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 text-left">

                                <label ><h3 class="color-green prompt-400">ดอกเบี้ย(%)</h3> </label>
                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('rate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'rate']) ?> 

                                <h3 class="color-green prompt-400"><?= $pawn->rate ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 text-left">
                                <label ><h4 class="color-black prompt-400">วันที่ทำรายการ</h4> </label>

                            </div>
                            <div class="col-md-5 text-right">
                                <h4 class="color-black prompt-400"><?= h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></h4>
                            </div>
                            <?= $this->Form->control('docdate', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'id' => 'docdate', 'value' => h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE))]) ?>

                        </div>
                        <div class="row">
                            <div class="col-md-7 text-left">
                                <label ><h4 class="color-black prompt-400">วันหมดอายุ</h4> </label>
                            </div>
                            <div class="col-md-5 text-right">
                                <h4 class="color-black prompt-400"> <?= h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></h4>


                                <?= $this->Form->control('date', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'id' => 'date', 'value' => h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE))]) ?>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" name="payment_method_bt" class="btn btn-outline-success waves-effect btn-block btn-lg m-b-10 prompt-400" value="renew">ต่อดอก</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10 prompt-400" value="return">ไถ่ถอน</button>
                            </div>
                            <?= $this->Form->hidden('func', ['label' => false, 'id' => 'func', 'value' => 'renew']) ?>
                        </div>
                        <div class="row m-b-5">
                            <div class="col-md-7 text-left">
                                <label class="prompt-400">ระบุวันที่ </label>
                            </div>
                            <div class="col-md-5 text-right ">
                                <?= $this->Form->control('returndate', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'id' => 'returndate', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'value' => '']) ?>

                            </div>
                        </div>
                        <div class="row m-b-5">
                            <div class="col-md-7 text-left">
                                <label class="prompt-400">จำนวนวัน </label>
                            </div>
                            <div class="col-md-5 text-right ">
                                <?= $this->Form->control('totald', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'totald']) ?> 

                            </div>
                        </div>
                        <div class="row m-b-5">
                            <div class="col-md-7 text-left">
                                <label class="prompt-400">บัญชี </label>
                            </div>
                            <div class="col-md-5 text-right ">
                                <?= $this->Form->control('bank_account_id', ['id' => 'bank_account_id', 'class' => 'form-control', 'options' => $bankAccounts, 'label' => false]) ?>

                            </div>
                        </div>
                        <div class="row m-b-5" id='divnewtotalmoney'>
                            <div class="col-md-7 text-left">
                                <label class="prompt-400">จำนวนเงินต้นปัจจุบัน </label>

                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('newtotalmoney', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'newtotalmoney', 'value' => $pawn->totalmoney]) ?> 

                            </div>
                        </div>
                        <div class="row m-b-5" id='divnewrate'>
                            <div class="col-md-7 text-left">

                                <label class="prompt-400">ดอกเบี้ย(%) </label>
                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('newrate', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'newrate']) ?> 

                            </div>
                        </div>

                        <div class="row m-b-5" id='divnewinterrestrate'>
                            <div class="col-md-7 text-left">

                                <label class="prompt-400">ค่าดอกเบี้ย (บาท) </label>

                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('newinterrestrate', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'newinterrestrate']) ?> 

                            </div>
                        </div>
                        <div class="row m-b-5" id='divdiscount'>
                            <div class="col-md-7 text-left">

                                <label class="prompt-400">ส่วนลดดอกเบี้ย</label>
                            </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('discount', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'discount', 'value' => 0]) ?> 

                            </div>
                        </div>

                        <div class="row m-b-5">
                            <div class="col-md-6">
                                <button type="button" name="editamount_bt" class="btn btn-light waves-effect btn-block btn-sm m-b-10 prompt-400" value="addmoney" data-toggle="modal" data-target="#con-close-modal">เพิ่มเงินต้น</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" name="editamount_bt" class="btn btn-light waves-effect btn-block btn-sm m-b-10 prompt-400" value="dismoney" data-toggle="modal" data-target="#con-close-modal">ลดเงินต้น</button>
                            </div>
                            <?= $this->Form->hidden('editamount', ['label' => false, 'id' => 'editamount', 'value' => '']) ?>
                        </div>
                        <div class="row" id='divmoney'>
                            <div class="col-md-7 text-left">
                                <label class="prompt-400">ระบุจำนวนเงิน </label> </div>
                            <div class="col-md-5 text-right">
                                <?= $this->Form->control('money', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'money']) ?> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-lg m-b-10 m-t-10 prompt-400" id="conf">ทำรายการ</button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



</form>



<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">กรุณาใส่จำนวนเงิน</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" style="text-align: center" class="control-label">จำนวนเงิน</label>
                            <input type="number" class="form-control" id="field-1" >
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer" style="text-align: center">

                <button type="button" id='modalmoney' style="text-align: center" class="btn btn-info waves-effect waves-light" data-dismiss="modal">ตกลง</button>
            </div>
        </div>
    </div>
</div>
<div id="modaldiscount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">กรุณาใส่จำนวนเงินส่วนลด</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" style="text-align: center" class="control-label">จำนวนเงิน</label>
                            <input type="number" class="form-control" id="fielddis" >
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer" style="text-align: center">

                <button type="button" id='modaldismoney' style="text-align: center" class="btn btn-info waves-effect waves-light" data-dismiss="modal">ตกลง</button>
            </div>
        </div>
    </div>
</div>



<script>

    $(document).ready(function () {
        $('#divmoney').hide();
        $('#divnewtotalmoney').hide();
        $('#divnewinterrestrate').hide();
        $('#divnewrate').hide();
        $('#divdiscount').hide();

        $('button[name="payment_method_bt"]').on('click', function () {
            var Method = this.value;
            $('#func').val(Method);
            // $('#payment_method_label').html($(this).text());

            $('button[name="payment_method_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');

//            if (paymentMethod === 'TRAN') {
//                $('#bank_account_box').show();
//            } else {
//                $('#bank_account_box').hide();
//            }
        });
        $('button[name="editamount_bt"]').on('click', function () {
            var Method = this.value;
            $('#editamount').val(Method);
            // $('#payment_method_label').html($(this).text());

            $('button[name="editamount_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');
            $('#divmoney').show();

        });
        function editmoney() {

            var oldmoney = $('#newtotalmoney').val();
            if (oldmoney === null || oldmoney === '') {
                oldmoney = 0;
            }
            var moneytype = $('#editamount').val();
            var start;
            var end = $('#returndate').datepicker('getDate');
            if ($('#func').val() === 'return') {
                start = $('#docdate').datepicker('getDate');
            } else {
                start = $('#date').datepicker('getDate');
            }
            var diffDays = (end - start) / 1000 / 60 / 60 / 24;

            if (moneytype === 'addmoney') {
                var amt = parseInt(oldmoney) + parseInt($('#money').val());
                // $('#newtotalmoney').val();
                $('#newtotalmoney').val(amt);
                cal($('#type').val(), diffDays, amt);

            } else {
                var amt = parseInt(oldmoney) - parseInt($('#money').val());
                $('#newtotalmoney').val();
                $('#newtotalmoney').val(amt);
                cal($('#type').val(), diffDays, amt);

            }
        }
        $('#modalmoney').on('click', function () {
            $('#money').val($('#field-1').val());
            editmoney();
        });
        $('#money').on('click', function () {
            $('#con-close-modal').modal().show();
            editmoney();
        });
        $('#discount').on('click', function () {
            $('#modaldiscount').modal().show();

        });
        $('#modaldismoney').on('click', function () {

            if (parseInt($('#fielddis').val()) > parseInt($('#newinterrestrate').val())) {
                swal({
                    title: "จำนวนเงินไม่ถูกต้อง",
                    text: "กรอกส่วนลดเกินค่าดอกเบี้ย",
                    type: "warning",
                    showCancelButton: true,
                    showConfirmButton: false,
                    confirmButtonClass: 'btn-warning',
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function () {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                });
            } else {
                $('#newinterrestrate').val($('#newinterrestrate').val() - $('#fielddis').val());
                $('#discount').val($('#fielddis').val());
            }
        });

        $('#returndate').change(function () {

            $('#divnewtotalmoney').show();
            $('#divnewinterrestrate').show();
            $('#divnewrate').show();
            $('#divdiscount').show();
            var method = $('#func').val();
            var amt = $('#totalmoney').val();
            if (method === 'return') {
                var start = $('#docdate').datepicker('getDate');
                var end = $('#returndate').datepicker('getDate');

                var diffDays = (end - start) / 1000 / 60 / 60 / 24;
                if (diffDays > 0) {


                    $('#totald').val(diffDays);
                    cal($('#type').val(), diffDays, amt);
                } else {

                    swal({
                        title: "วันที่ ไม่ถูกต้อง",
                        text: "กรุณากรอกวันที่มากกว่าวันเริ่มต้น",
                        type: "warning",
                        showCancelButton: true,
                        showConfirmButton: false,
                        confirmButtonClass: 'btn-warning',
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    });
                    $('#returndate').val('');
                }
            } else {


                var start = $('#date').datepicker('getDate');
                var end = $('#returndate').datepicker('getDate');
                console.log(start);
                console.log(end);
                var diffDays = (end - start) / 1000 / 60 / 60 / 24;
                if (diffDays > 0) {
                    $('#totald').val(diffDays);
                    cal($('#type').val(), diffDays, amt);
                } else {

                    swal({
                        title: "วันที่ ไม่ถูกต้อง",
                        text: "กรุณากรอกวันที่มากกว่าวันเริ่มต้น",
                        type: "warning",
                        showCancelButton: true,
                        showConfirmButton: false,
                        confirmButtonClass: 'btn-warning',
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    });
                    $('#returndate').val('');
                }
            }

        });

        $('#type').change(function () {


            var type = $('#type').val();
            var amt = $('#totalmoney').val();
            cal(type, amt);


        });
        function cal(type, diffDays, amt) {


            $.post('<?= SITE_URL ?>pawns/getinterrestrate', {"type": type, "diffDays": diffDays, "flag": true}, function (resp) {

                // alert(resp);
                $('#interrestrate').val(Math.ceil(resp * amt));
                $('#newinterrestrate').val(Math.ceil(resp * amt));


                var calrate = toFixed(resp * 100, 2);
                $('#rate').val(calrate);
                $('#newrate').val(calrate);
                //$('#interrestrateshow').val(Math.ceil(resp * amt));

            });

        }

    });


    function toFixed(num, pre) {
        num *= Math.pow(10, pre);
        num = (Math.round(num, pre) + (((num - Math.round(num, pre)) >= 0.5) ? 1 : 0)) / Math.pow(10, pre);
        return num.toFixed(pre);
    }

    $(function () {
        jQuery('#returndate').datepicker({
            //    language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#docdate').datepicker({
            //    language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $(function () {
        jQuery('#date').datepicker({
            //   language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $('#conf').click(function () {
        swal({
            title: "คุณต้องการทำรายการใช่ หรือไม่",
            text: "",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ทำรายการ",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                $('#myform').submit();
            }
        });
    });
</script>
<script>

    $(function () {

        $("#myform").validate({
            rules: {
                returndate: {
                    required: true
                }
            },
            messages: {
                returndate: {
                    required: "กรุณาระบุวันที่"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>