<?= $this->element('Lib/data_table') ?>
<!-- JS file -->
<?= $this->Html->script('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') ?>
<!-- CSS file -->
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.css') ?>
<?= ''//$this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css') ?>
<?= $this->Form->create($income, ['id' => 'frrm']) ?>
<div class="row">

    <div class="col-sm-12 col-xs-12">
        <div class="card m-b-20 card-body">
            <h3 class="m-t-0 gold-title">รายรับ รายจ่าย</h3>
            <div class="col-12 bt-tool">
                <button type="button" class="btn btn-lg btn-light waves-effect waves-light" data-name="incomeType" value="REVENUE"><i class="mdi mdi-plus-circle-multiple-outline"></i> บันทึกรายรับ</button>
                <button type="button" class="btn btn-lg btn-light waves-effect waves-light" data-name="incomeType" value="EXPEND"><i class="mdi mdi-plus-circle-multiple-outline"></i> บันทึกรายจ่าย</button>
            </div>
            <div class="row" id="form_box">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label for="docdate">วันที่ทำรายการ </label>
                            <?= $this->Form->control('docdate', ['class' => 'form-control form-control-lg', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'readonly' => 'readonly', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label for="code">ผู้ทำรายการ</label>
                            <?= $this->Form->select('seller', $sellerList, ['class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="code">รายการ </label>
                            <?= $this->Form->control('income_type', ['type' => 'text', 'class' => 'form-control form-control-lg', 'id' => 'income_type', 'label' => false]) ?>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="code">จำนวนเงิน </label>
                            <?= $this->Form->control('amount', ['type' => 'text', 'class' => 'form-control form-control-lg', 'id' => 'amount', 'label' => false, 'data-type' => 'float']) ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <button type="button" name="payment_method_bt" class="btn btn-outline-success waves-effect btn-block btn-lg m-b-10" value="CASH">เงินสด</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="TRAN">โอนเงิน</button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="CRED">เครดิต</button>
                                </div>
                                <div class="col-md-9 form-group" id="bank_account_box" style="display: none;">
                                    <?= $this->Form->select('bank_account_id', $bankAccountList, ['class' => 'form-control form-control-lg', 'id' => 'bank_account_id']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="code">รายละเอียด</label>
                            <?= $this->Form->textarea('description', ['class' => 'form-control', 'label' => false]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">บันทึก</button>
                        </div>
                    </div>
                </div>

            </div>
            <?= $this->Form->hidden('isexpend', ['label' => false, 'id' => 'isexpend', 'value' => 'Y']) ?>
            <?= $this->Form->hidden('income_type_id', ['label' => false, 'id' => 'income_type_id']) ?>
            <?= $this->Form->hidden('payment_method', ['label' => false, 'id' => 'payment_method', 'value' => 'CASH']) ?>

        </div>
    </div>



</div>
<?= $this->Form->end() ?>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="m-t-0 gold-title border-bottom pb-2"><i class="mdi mdi-format-list-bulleted"></i> <?= $wording ?> </h3>
            <table id="datatable-buttons" class="table table-hover no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th>วันที่บันทึก</th>
                        <th>รายการ</th>
                        <th>บัญชี</th>
                        <th>สาขา</th>
                        <th class="text-right">จำนวนเงิน</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($incomes as $income): ?>
                        <?php
                        $rowClass = 'text-void';
                        if ($income->isreceipt == 'Y' && $income->docstatus != 'VO') {
                            $rowClass = 'text-success';
                        } elseif ($income->isreceipt == 'N' && $income->docstatus != 'VO') {
                            $rowClass = 'text-danger';
                        }
                        ?>
                        <tr role="row" class="<?= $rowClass ?>">
                            <?php
                            $_icon = $income->isreceipt == 'Y' ? '<i class=" mdi mdi-plus-circle"></i>' : '<i class=" mdi mdi-minus-circle"></i>';
                            $des = '';
                            if ($income->has('payment_lines') && sizeof($income->payment_lines) > 0) {
                                $line = $income->payment_lines[0];
                                if ($line['income_type'] != null) {
                                    $des = $line['income_type']['name'];
                                }
                            }
                            ?>
                            <td class="column-date"><?= h($income->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>
                            <td><?= $_icon . h($des) ?></td>

                            <td><?= $income->has('bank_account') ? $income->bank_account->account_name : '' ?></td>
                            <td><?= $income->has('branch') ? $income->branch->name : '' ?></td>
                            <td class="text-right"><strong><?= $income->isreceipt == 'Y' ? '' : '-' ?><?= $this->Number->format($income->totalamt) ?></strong></td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-settings"></i> <span class="caret"></span></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-action="void" data-id="<?= h($income->id) ?>" href="javascript:void(0);">ยกเลิก</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->Html->script('income/validation.js') ?>

<script>
    jQuery(document).ready(function () {

        $('a[data-action="void"]').on('click', function () {
            var id = $(this).attr("data-id");
            Swal.fire({
                title: "คุณต้องการยกเลิกรายการนี้",
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
            }
            ).then(
                    function (t) {
                        if (t.value) {
                            window.location.href = SITE_URL + 'income/void?id=' + id;
                        }

                    });


        });

        $('button[data-name="incomeType"]').on('click', function () {
            $('button[data-name="incomeType"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');

            if (this.value === 'EXPEND') {
                $('#isexpend').val('Y');
            } else {
                $('#isexpend').val('N');
            }

            $('#form_box').show();
        });

        jQuery('#docdate').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
        setDefaultToDayDate('docdate');

        var options = {
            data: <?= $incomeTypeExpendList ?>,
            getValue: "name",
            placeholder: "กรอกรายการที่ต้องการ",
            highlightPhrase: true,
            list: {
                match: {
                    enabled: true
                },
                sort: {
                    enabled: true
                },
                onChooseEvent: function () {
                    var value = $("#income_type").getSelectedItemData().id;
                    $("#income_type_id").val(value);
                    console.log(value);
                }

            }
            //theme: "square"
        };

        $("#income_type").easyAutocomplete(options);
        $('#form_box').hide();
        $("#amount").ForceNumericOnly();

        $('button[name="payment_method_bt"]').on('click', function () {
            var paymentMethod = this.value;
            $('#payment_method').val(paymentMethod);
            $('#payment_method_label').html($(this).text());
            console.log(paymentMethod);
            $('button[name="payment_method_bt"]').addClass('btn-light').removeClass('btn-outline-success');
            $(this).addClass('btn-outline-success');

            if (paymentMethod === 'TRAN') {
                $('#bank_account_box').show();
            } else {
                $('#bank_account_box').hide();
            }
        });


    });

</script>
