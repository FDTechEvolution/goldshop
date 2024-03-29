
<?= $this->Form->create($pawn, ['id' => 'pawn']) ?>
<div class="row">
    <div class=" col-md-8  col-lg-8 col-xs-8">
        <div class="card-box ">
            <div class="row">
                <div class="col-md-8  col-lg-8 col-xs-8" style="text-align: left">
                    <div class="form-group">

                        <h3 class="card-title text-primary prompt-500 fa-3x"><i class="mdi mdi-account-card-details"></i> ต่อดอก/ไถ่ถอน</h3>
                    </div>
                </div>
                <div class="col-md-4  col-lg-4 col-xs-4 text-right">
                    <div class="form-group">
                        <strong>ใบจำนำเลขที่</strong>
                        <h3 class="prompt-400"><?= $pawn->docno ?></h3>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php
                    $bp = $pawn->bpartner;
                    $address = $bp->address;
                    ?>
                    <h3 class="title-header prompt-500 text-primary">ลูกค้า</h3>
                    <address style="margin-bottom: 0px;">
                        <h4><?= h($bp->name) ?></h4>
                        <?php if (!is_null($address) && $address != '') { ?>
                            <?= h($address->address_line) ?>
                        <?php } ?>
                    </address>
                    <?= $this->Form->control('totalmoney', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'totalmoney']) ?> 
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-12">

                    <div class="row pb-md-1">
                        <div class="col-md-6 button-list">
                            <button type="button" name="pawn_method_bt" class="btn btn-outline-success waves-effect btn-block btn-lg m-b-10 prompt-400" value="return">ไถ่ถอน</button>
                        </div>
                        <div class="col-md-6 button-list">
                            <button type="button" name="pawn_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10 prompt-400" value="renew">ต่อดอก</button>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label >วันที่ ไถ่ถอน/ต่อดอก </label>
                            <?= $this->Form->control('returndate', ['autocomplete' => 'off', 'type' => 'text', 'class' => 'form-control', 'label' => false, 'id' => 'returndate', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'value' => '']) ?>
                        </div>
                        <?= $this->Form->hidden('func', ['label' => false, 'id' => 'func', 'value' => 'return']) ?>
                    </div>
                    <div class="row">
                        <div class=" col-md-3 form-group">
                            <label >วันทำรายการเดิม</label>
                            <?= $this->Form->text('_docdate', ['readonly' => 'readonly', 'class' => 'form-control', 'label' => false, 'value' => h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE))]) ?>

                            <?= $this->Form->text('docdate', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'docdate', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'value' => h($pawn->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE))]) ?>
                        </div>
                        <div class=" col-md-3 form-group">
                            <label>วันครบกำหนดเดิม</label>
                            <?= $this->Form->text('_date', ['readonly' => 'readonly', 'class' => 'form-control', 'label' => false, 'value' => h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE))]) ?>

                            <?= $this->Form->control('date', ['type' => 'hidden', 'class' => 'form-control', 'label' => false, 'id' => 'date', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'value' => h($pawn->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE))]) ?>
                            <?= $this->Form->control('thisdate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'thisdate', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?> 
                            <?= $this->Form->control('newexpdate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'newexpdate', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?> 
                        </div>
                        <div class=" col-md-3 form-group">
                            <label >จำนวนวัน </label>
                            <?= $this->Form->control('totald', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'totald']) ?> 

                        </div>
                        <div id='divtype'  class=" col-md-3 form-group">
                            <label >อัตราดอกเบี้ย </label>
                            <?= $this->Form->control('type', ['id' => 'type', 'empty' => '---', 'class' => 'form-control', 'label' => false, 'options' => ['3%' => '3%', '2.5%' => '2.5%', '2%' => '2%', '1.75%' => '1.75%', '1.5%' => '1.5%',]]) ?>

                        </div>
                        <div class="col-md-3" style="display: none">
                            <label for="code">ส่วนลดดอกเบี้ย</label>
                            <?= $this->Form->control('discount', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'discount', 'value' => 0]) ?> 
                        </div>
                        <div class='col-md-3 form-group'>
                            <label for="code">พนักงานขาย</label>
                            <?= $this->Form->select('seller', [], ['class' => 'form-control ', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-3 form-group'>
                            <label for="code">คลัง</label>
                            <?= $this->Form->control('warehouse', ['class' => 'form-control', 'label' => false, 'id' => 'docno', 'readonly' => 'readonly', 'value' => $pawn->warehouse->name]) ?>

                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="col-4">
        <div class="card m-b-20 card-body">
            <div class="row m-b-10">
                <div id='smoney1' class="col-md-6 text-left prompt-500" >
                    <h4 class="">เงินต้น</h4>
                </div>
                <div id='smoney2' class="col-md-6 text-right color-green " ><h4 class="font-weight-bolder"><?= number_format($pawn->totalmoney) ?></h4></div>
                <div class="col-md-6 text-left prompt-500" >
                    <h4 class="" style="margin-bottom: 0px;">ดอกเบี้ย <span id="typeshow"><?= $pawn['type'] ?></span></h4>
                </div>
                <div class="col-md-6 text-right color-green" >
                    <h4 class="font-weight-bold" style="margin-bottom: 0px;"><span id="interrestrateshow">0.00</span></h4>
                </div>
                <div class="col-md-12" id="box_date"  style="display: none;">
                    <h5 class="prompt-500" style="margin-top: 0px;">วันที่ <strong id="l_date">0</strong></h5>

                </div>
                <?= $this->Form->control('rate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'rate']) ?> 
                <?= $this->Form->control('newinterrestrate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'newinterrestrate']) ?> 

                <?= $this->Form->control('interrestrate', ['type' => 'hidden', 'readonly', 'class' => 'form-control', 'label' => false, 'id' => 'interrestrate']) ?>
            </div>

            <div class="row" style="display: none;">
                <div class="col-md-7 text-left">
                    <h3 class="prompt-400" id="totalamt_title_label">จำนวนเงิน</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h3 id="subtotalamt_label" class="">0</h3>
                    <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
                </div>
            </div>
            <div class="row" id="box_discount"  style="display: none;">
                <div class="col-md-6 text-left"><h4 class="text-warning prompt-300">ส่วนลด</h4></div>
                <div class="col-md-6 text-right text-warning"><h4 id="l_discount_amt" class="prompt-500">0</h4></div>
                <?= $this->Form->hidden('discountamt', ['id' => 'discountamt', 'value' => '0']) ?>
            </div>
            <div class="row" id="box_saving" style="display: none;">
                <div class="col-md-6 text-left">
                    <h3 class="text-success prompt-400" id="">ใช้เงินออม</h3>
                </div>
                <div class="col-md-6 text-right color-green">
                    <h3 id="l_saving_amt" class="prompt-400">0</h3>
                    <?= $this->Form->hidden('savingamt', ['value' => '0', 'id' => 'savingamt']) ?>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-7 text-left">
                    <h3 class="text-success prompt-400" id="totalamt_title_label">เงินสุทธิ</h3>    
                </div>
                <div class="col-md-5 text-right">
                    <h2 id="l_total_amt" class="text-success">0</h2>
                    <?= $this->Form->hidden('totalamt', ['label' => false, 'id' => 'totalamt', 'value' => '0']) ?>
                </div>
            </div>
            <?= $this->element('NumericKeybord/pawnreturn'); ?>
        </div>
    </div>

    <div class="col-12">
        <div class="card-box ">
            <div class="row">
                <div class="col-md-12">
                    <label><strong>ประวัติการทำรายการ</strong></label>
                    <?= '  <br> ' . $pawn->log_history ?>
                </div>
            </div>
            <hr/>
            <div class="row ">
                <div class="col-md-12">
                    <h3 class="prompt-400"><i class="mdi mdi-book-open"></i> รายการรับจำนำ</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <table id="listdata" class="table table-striped">
                        <tr>

                            <th class="text-left">สินค้า</th>
                            <th class="text-center">ภาพ</th>
                            <th class="text-center">หมายเหตุ </th>
                            <th class="text-right">ราคา</th>
                        </tr>
                        <?php foreach ($pawn->pawn_lines as $pawnLines): ?>
                            <tr>
                                <?php
                                if (is_null($pawnLines->image) || $pawnLines->image == '') {
                                    $picture = 'img/noimage.png';
                                } else {
                                    $picture = $pawnLines->image->path;
                                }
                                ?>
                                <td class="text-left"><?= h($pawnLines->product->name) ?></td>
                                <td style="text-align: center">    <img id="blah" src="<?= SITE_URL . $picture ?>" alt="your image" class="thumb-image" height="40" width="40" />    </td>
                                <td><?= h($pawnLines->description) ?></td>
                                <td class="text-right"><?= number_format($pawnLines->amount) ?></td>


                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->Form->end() ?>

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
<?= $this->Html->script('gold-selector.js') ?>
<script>

    $(document).ready(function () {


        calinterrestrate();
        setDefaultToDayDate('thisdate');
        $('button[name="pawn_method_bt"]').on('click', function () {
            var Method = this.value;
            $('#func').val(Method);
            // $('#payment_method_label').html($(this).text());

            $('button[name="pawn_method_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');
            if (this.value === 'return') {
                $('#smoney1').show();
                $('#smoney2').show();
                setDefaultToDayDate('returndate');
                calinterrestrate();
            } else {
                $('#smoney1').hide();
                $('#smoney2').hide();

                setDefaultToDayDate('returndate');
                calinterrestrate();
                // $('#returndate').val($('#date').val());
                //  $('#monthbt').show();

            }

        });
        $('button[name="editamount_bt"]').on('click', function () {
            var Method = this.value;
            $('#editamount').val(Method);
            // $('#payment_method_label').html($(this).text());

            $('button[name="editamount_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');
            $('#divmoney').show();

        });

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

            if (parseInt($('#fielddis').val()) > parseInt($('#interrestrate').val())) {
                Swal.fire({title: "จำนวนเงินไม่ถูกต้อง", text: "กรอกส่วนลดเกินค่าดอกเบี้ย", confirmButtonClass: "btn btn-primary mt-2"});

            } else {
                $('#newinterrestrate').val($('#interrestrate').val() - $('#fielddis').val());
                $('#discount').val($('#fielddis').val());
                $("#discountshow").html(Number($('#fielddis').val()).toLocaleString('en'));
                $("#newinterrestrateshow").html(Number($('#interrestrate').val() - $('#fielddis').val()).toLocaleString('en'));
            }
        });
        $('#returndate').change(function () {

            calinterrestrate();


        });

        function calinterrestrate() {
            var date = $("#returndate").datepicker('getDate');
            var new_date = new Date(date.getFullYear(), date.getMonth() + 4, date.getDate());


            if (new_date.getDate() < date.getDate()) {
                var renewdate = new Date(new_date.getFullYear(), new_date.getMonth(), 0);

            } else {
                var renewdate = new_date;
            }

            $("#newexpdate").datepicker("setDate", renewdate);

            var method = $('#func').val();
            var amt = $('#totalmoney').val();
            $("#l_date").html($('#docdate').val() + ' - ' + $('#returndate').val());
            if (method === 'return') {
                var start = $('#docdate').datepicker('getDate');
                var end = $('#returndate').datepicker('getDate');

                $("#box_date").show();
                var diffDays = Math.ceil((end - start) / 1000 / 60 / 60 / 24);

                if (diffDays > 0) {


                    $('#totald').val(diffDays);
                    cal($('#type').val(), diffDays, amt);
                } else {
                    Swal.fire({title: "วันที่ ไม่ถูกต้อง", text: "กรุณากรอกวันที่มากกว่าวันทำรายการเดิม", confirmButtonClass: "btn btn-primary mt-2"});



                    $('#returndate').val('');
                }
            } else {


                var start = $('#docdate').datepicker('getDate');
                var end = $('#returndate').datepicker('getDate');
                // $("#l_date").html($('#docdate').val() + ' - ' + $('#date').val());
                $("#box_date").show();
                var diffDays = Math.ceil((end - start) / 1000 / 60 / 60 / 24);
                if (diffDays > 0) {
                    $('#totald').val(diffDays);
                    cal($('#type').val(), diffDays, amt);
                } else {
                    Swal.fire({title: "วันที่ ไม่ถูกต้อง", text: "กรุณากรอกวันที่มากกว่าครบกำหนดเดิม", confirmButtonClass: "btn btn-primary mt-2"});

                    $('#returndate').val('');
                }
            }

        }

        $('#type').change(function () {

            calinterrestrate();

        });
        function cal(type, diffDays, amt) {
            $('#page-load').show();

            $.post('<?= SITE_URL ?>pawns/getinterrestrate', {"type": type, "diffDays": diffDays, "flag": true}, function (resp) {


                if (Math.ceil(resp * amt) < 20) {
                    $("#interrestrateshow").html(Number(20).toLocaleString('en'));
                    $('#interrestrate').val(20);
                } else {
                    $("#interrestrateshow").html(Number(Math.ceil(resp * amt)).toLocaleString('en'));
                    $('#interrestrate').val(Math.ceil(resp * amt));
                }
                $("#typeshow").html(type);
                var calrate = toFixed(resp * 100, 2);
                $('#rate').val(calrate);
                $('#newrate').val(calrate);
                $("#newinterrestrateshow").html(Number($('#interrestrate').val() - $('#fielddis').val()).toLocaleString('en'));
                $('#newinterrestrate').val(Number($('#interrestrate').val() - $('#fielddis').val()));
                var method = $('#func').val();
                if (method === 'return') {
                    var sum = parseFloat($('#interrestrate').val()) + parseFloat(amt);
                    $("#subtotalamt").val(sum);
                    recalculateAll();

                } else {
                    $("#subtotalamt").val(Number(($('#interrestrate').val() - $('#fielddis').val())));
                    recalculateAll();
                }
                $('#page-load').hide();
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

            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });

    setDefaultToDayDate('returndate');
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
    $(function () {
        jQuery('#thisdate').datepicker({
            //   language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $('#conf').click(function () {

        Swal.fire({
            title: "คุณต้องการทำรายการใช่ หรือไม่",
            text: "",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }
        ).then(
                function (t) {
                    if (t.value) {
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