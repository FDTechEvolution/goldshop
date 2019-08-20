
<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="card m-b-20 card-body">
            <?= $this->Form->create('Post', ['id' => 'myform', 'method' => 'post', 'horizontal' => true, 'url' => '/saving-transactions/add']) ?>
            <div class="form-group row">
                <div class="col-md-6">
                    <h3 class="card-title text-primary fa-3x prompt-500"><i class="mdi mdi-bank"></i> ออมเงิน</h3>
                </div>
                <div class="col-md-6" style="text-align: right">
                    <h1 class="text-danger prompt-500">เงินคงเหลือ <?= number_format($savingAccount->balanceamt) ?> บาท</h1>
                </div>

            </div>


            <div class="row title-header m-b-10">
                <div class="col-md-6">
                    <h4 class="prompt-500">บัญชี <?= $savingAccount->bpartner->name ?> </h4> 
                    <?php
                    $address = '';
                    if ($savingAccount->bpartner->has('address')) {
                        $add = $savingAccount->bpartner->address;
                        $address = $add->address_line . ' ตำบล' . $add->subdistrict . ' อำเภอ' . $add->district . ' จังหวัด' . $add->province . ' ' . $add->postalcode;
                    }
                    ?>
                    <p><strong>ที่อยู่</strong> <?= h($address) ?></p>
                    <p><strong>โทร</strong> <?= h($savingAccount->bpartner->mobile) ?></p>
                </div>
                <div class="col-md-6">

                    <?= $this->Form->control('balance', ['id' => 'balance', 'type' => 'hidden', 'class' => 'form-control', 'value' => $savingAccount->balanceamt, 'label' => false]) ?>
                    <?= $this->Form->hidden('bpartner_id', ['value' => $savingAccount->bpartner->id, 'id' => 'bpartner_id']) ?>
                </div>
            </div>
            <div class="form-group row" id="customer_box" >
                <div class="col-md-6">
                    <label> ธุรกรรม</label>
                    <div class="row">
                        <div class="col-md-5">
                            <button type="button" name="payment_method_bt" class="btn btn-success waves-effect btn-block btn m-b-10 prompt-400" value="deposit">ฝาก</button>
                        </div>
                        <div class="col-md-5">
                            <button type="button" name="payment_method_bt" class="btn btn-light waves-effect btn-block btn m-b-10 prompt-400" value="withdraw">ถอน</button>
                        </div>
                        <?= $this->Form->hidden('func', ['label' => false, 'id' => 'func', 'value' => 'deposit']) ?>
                    </div>
                </div>

                <div style="<?= $display ?>" class="col-md-6 border-left">
                    <label> ประเภท</label>
                    <div class="row m-b-10">
                        <div class="col-md-6">
                            <button type="button" name="bank_method_bt" class="btn btn-success waves-effect btn-block btn-lg m-b-10" value="CASH" style="font-size:14px;">เงินสด</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" name="bank_method_bt" class="btn btn-light waves-effect btn-block btn-lg m-b-10" value="TRAN" style="font-size:14px;">โอนเงิน</button>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger"></span></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control', 'id' => 'docdate', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                </div>
                <div class="col-md-3">
                    <label for="code">ผู้ทำรายการ</label>
                    <?= $this->Form->select('seller', $sellerList, ['class' => 'form-control ', 'id' => 'seller', 'label' => false]) ?>
                </div>


                <div class="col-md-3" id="box_account" style="display: none;">
                    <label> บัญชี</label>
                    <?= $this->Form->hidden('btype', ['label' => false, 'id' => 'btype', 'value' => 'CASH']) ?>
                    <?= $this->Form->control('bank_account_id', ['id' => 'bank_account_id', 'class' => 'form-control', 'option' => [], 'label' => false]) ?>

                    <?= $this->Form->control('saving_account_id', ['type' => 'hidden', 'class' => 'form-control', 'value' => $savingAccount->id, 'label' => false]) ?>
                </div>


                <div class="col-md-2">
                    <label> จำนวนเงิน</label>
                    <?= $this->Form->control('amount', ['id' => 'amount', 'type' => 'number', 'class' => 'form-control', 'label' => false, 'data-type' => 'float', 'autocomplete' => 'off']) ?>

                </div>
                <div class="col-md-2" id='fee'>
                    <label> ค่าธรรมเนียม</label>
                    <?= $this->Form->control('fee', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'value' => 0, 'data-type' => 'float', 'autocomplete' => 'off']) ?>
                </div>

            </div>
            <div class="form-group row">

                <div class="col-md-12 text-center">
                    <button type="button" id="subm" class="btn btn-primary waves-effect">บันทึก</button>
                    <?= $this->Html->link(BT_BACK, ['controller' => 'saving-accounts', 'action' => 'index'], ['escape' => false]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-xs-12 col-md-12">
        <div class="card m-b-20 card-body">
            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" >
                <thead>
                    <tr>
                        <th style="text-align: center">วันที่บันทึก</th>

                        <th style="text-align: center">เลขที่</th>

                        <th style="text-align: center">ประเภท</th>

                        <th style="text-align: center">บัญชี</th>
                        <th style="text-align: center">สถานะ</th>
                        <th class="text-right">จำนวนเงิน</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $savingTransaction = $savingAccount->saving_transactions; ?>
                    <?php foreach ($savingTransaction as $savingTransactions): ?>

                        <tr class="hand-cursor">

                            <?php
                            $word = '';
                            $bankname = '';
                            if ($savingTransactions->isdeposit == 'Y') {
                                $word = 'ฝาก';
                            } else {
                                $word = 'ถอน';
                            }
                            if ($savingTransactions->has('bank_account')) {
                                if ($savingTransactions->bank_account->bank_id != '') {
                                    $bankname = $savingTransactions->bank_account->bank->name . ' ' . $savingTransactions->bank_account->accountno;
                                } else {
                                    $bankname = $savingTransactions->bank_account->account_name;
                                }
                            }
                            ?> 
                            <td><?= h($savingTransactions->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>

                            <td style="text-align: center"><?= h($savingTransactions->docno) ?></td>

                            <td style="text-align: center"><?= h($word) ?></td>

                            <td style="text-align: center"><?= $bankname ?></td>
                            <td class="">
                                <span class="badge badge-<?= $savingTransactions->docstatus == 'CO' ? 'success' : 'warning' ?>">
                                    <?= h($docStatusList[$savingTransactions->docstatus]['name']) ?>
                                </span>
                            </td>
                            <td class="text-right"><?= number_format($savingTransactions->amount) ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->Html->script('saving/saving.js') ?>
<script>
    $('#fee').hide();

    $('button[name="bank_method_bt"]').on('click', function () {
        var reqValue = this.value;
        var type;
        if (reqValue === 'TRAN') {
            type = 'BACC';
            $.post(SITE_URL + 'saving-accounts/getbank/', {"type": type, "flag": true}, function (resp) {

                var jsonResp = JSON.parse(resp);


                $('#bank_account_id option').remove();

                $.each(jsonResp, function (key, value) {
                    $('#bank_account_id').append($("<option></option>")
                            .attr("value", key)
                            .text(value));
                });

            });
            $('#box_account').show();
        } else {
            type = 'CASH';
            $('#box_account').hide();
        }


        $('button[name="bank_method_bt"]').addClass('btn-light').removeClass('btn-success');
        $(this).addClass('btn-success');
        $('#btype').val(reqValue);

    });

</script>
