<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title border-bottom pb-2"><i class="mdi mdi-format-list-bulleted"></i>รายการปิดบัญชีประจำวัน ประจำสาขา <?= $branchName ?></h3>

            <div class="row">
                <div class="col-12">
                    <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>บัญชีวันที่</th>
                                <th>สถานะ</th>
                                <th>เวลลาปิด</th>
                                <th>ผู้ปิด</th>
                                <th class="text-right">เงินสด</th>
                                <th class="text-right">เงินสดนับจริง</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($closeDays as $item): ?>
                            <?php $allowToClose = $allowToCloseDay->id == $item->id?'YES':'NO';?>
                                <tr class="hand-cursor" data-status="<?= $item->status ?>" data-allow="<?=$allowToClose?>" data-id="<?= $item->id ?>" gold-branch="<?= $item->branch_id ?>" gold-start-date="<?= $item->close_date->i18nFormat('yyyy-MM-dd', null, null) ?>" gold-end-date="<?= $item->close_date->i18nFormat('yyyy-MM-dd', null, null) ?>">
                                    <td><?= $item->close_date->i18nFormat(DATE_FORMATE, null, TH_DATE) ?></td>

                                    <?php if ($item->status == 'CO') { ?>
                                        <td><span class="badge badge-success">ปิดแล้ว</span></td>
                                        <td><?= $item->modified->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE) ?></td>
                                        <td><?= h($item->has('UserModified') ? $item->UserModified->firstname : '') ?></td>
                                        <td class="text-right"><?= $this->Number->format($item->actual_amt) ?></td>
                                        <td class="text-right"><?= $this->Number->format($item->actual_manual_amt) ?></td>
                                        <td class="text-right">

                                        </td>
                                    <?php } else { ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">
                                            <?php if($allowToClose =='YES'){?>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">ปิดบัญชี</button>
                                            <?php } ?>
                                        </td>

                                    <?php } ?>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="close_day_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary prompt-500">ปิดบัญชีประจำวันที่ <span id="txt_date"></span></h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create('', ['id' => 'frm']) ?>
                <div class="row">
                    <div class="col-12 col-md-6">

                        <table class="table table-hover table-sm" id="tb_debit">
                            <tbody>

                            </tbody>
                        </table>

                    </div>

                    <div class="col-12 col-md-6">
                        <table class="table table-hover table-sm" id="tb_credit">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-12">
                        <table class="table table-hover table-sm" id="tb_sumary">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="bt_save">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<script>
    function makeData(jsonData, closeDayId) {
        var rowsL = jsonData.L;
        var rowsR = jsonData.R;
        var rowsLT = jsonData.LT;
        var rowsRT = jsonData.RT;

        var debitTable = $("#tb_debit > tbody");
        var creditTable = $("#tb_credit > tbody");
        var sumaryTable = $("#tb_sumary > tbody");

        debitTable.empty();
        creditTable.empty();
        sumaryTable.empty();
        var str = '';

        $('#txt_date').text(jsonData.date);
        $.each(rowsL, function (index, row) {
            str = '<tr>';
            str = str + '<td class="text-left" width="70%">' + row.title + '</td>';
            str = str + '<td class="text-right"><strong>'+ Number(row.amount).toLocaleString('en') + '<strong></td>';
            str = str + '</tr>';
            debitTable.append(str);
        });
        
        str = '<tr>';
        str = str + '<td class="text-left" width="70%"><strong>รวมรายรับทั้งหมด</strong></td>';
        str = str + '<td class="text-right"><strong class="text-success">' + Number(jsonData.total_receipt_amt).toLocaleString('en') + '<strong></td>';
        str = str + '</tr>';
        str = str+'<tr><td>-</td><td></td></tr>';
        debitTable.append(str);
        
        $.each(rowsLT, function (index, row) {
            str = '<tr>';
            str = str + '<td class="text-left" width="70%">' + row.title + '</td>';
            str = str + '<td class="text-right"><strong>' + Number(row.amount).toLocaleString('en') + '<strong></td>';
            str = str + '</tr>';
            debitTable.append(str);
        });
        str = '<tr>';
        str = str + '<td class="text-left" width="70%"><strong>รายรับเงินโอน</strong></td>';
        str = str + '<td class="text-right"><strong class="text-success">' + Number(jsonData.total_receipt_tran_amt).toLocaleString('en') + '<strong></td>';
        str = str + '</tr>';
        debitTable.append(str);

        $.each(rowsR, function (index, row) {
            str = '<tr>';
            str = str + '<td class="text-left" width="70%">' + row.title + '</td>';
            str = str + '<td class="text-right"><strong>' + Number(row.amount).toLocaleString('en') + '<strong></td>';
            str = str + '</tr>';
            creditTable.append(str);
        });
        str = '<tr>';
        str = str + '<td class="text-left" width="70%"><strong>รวมรายจ่ายทั้งหมด</strong></td>';
        str = str + '<td class="text-right"><strong class="text-danger">' + Number(jsonData.total_paid_amt).toLocaleString('en') + '<strong></td>';
        str = str + '</tr>';
        str = str+'<tr><td>-</td><td></td></tr>';
        creditTable.append(str);
        
        $.each(rowsRT, function (index, row) {
            str = '<tr>';
            str = str + '<td class="text-left" width="70%">' + row.title + '</td>';
            str = str + '<td class="text-right"><strong>' + Number(row.amount).toLocaleString('en') + '<strong></td>';
            str = str + '</tr>';
            creditTable.append(str);
        });
        str = '<tr>';
        str = str + '<td class="text-left" width="70%"><strong>รายจ่ายเงินโอน</strong></td>';
        str = str + '<td class="text-right"><strong class="text-danger">' + Number(jsonData.total_paid_tran_amt).toLocaleString('en') + '<strong></td>';
        str = str + '</tr>';
        creditTable.append(str);



        sumaryTable.append('<tr class="table-warning">' +
                '<td class="text-right"><h4>รวมรายรับทั้งหมด</h4></td>' +
                '<td class="text-right">' +
                '<h4 class="text-success">' + Number(jsonData.total_receipt_amt).toLocaleString('en') + '</h4>' +
                '<input type="hidden" name="total_receipt_amt" value="' + jsonData.total_receipt_amt + '" />' +
                '</td>' +
                '</tr>');
        sumaryTable.append('<tr class="table-warning">' +
                '<td class="text-right"><h4>รวมรายจ่ายทั้งหมด</h4></td>' +
                '<td class="text-right"><h4 class="text-danger">' + Number(jsonData.total_paid_amt).toLocaleString('en') + '</h4>' +
                '</td>' +
                '<input type="hidden" name="total_paid_amt" value="' + jsonData.total_paid_amt + '" />' +
                '</tr>');
        sumaryTable.append('<tr class="table-warning">' +
                '<td class="text-right"><h3>รายรับเงินสด (รายรับทั้งหมด-รายรับเงินโอน)</h3></td>' +
                '<td class="text-right">' +
                '<h3 class="text-success">' + Number(jsonData.total_cash_receipt).toLocaleString('en') + '</h3>' +
                '<input type="hidden" name="total_cash_receipt_amt" value="' + jsonData.total_cash_receipt + '" />' +
                '</td>' +
                '</tr>');
        sumaryTable.append('<tr class="table-warning">' +
                '<td class="text-right"><h3>รายจ่ายเงินสด (รายจ่ายทั้งหมด-รายจ่ายเงินโอน)</h3></td>' +
                '<td class="text-right"><h3 class="text-danger">' + Number(jsonData.total_cash_paid).toLocaleString('en') + '</h3>' +
                '</td>' +
                '<input type="hidden" name="total_cash_paid_amt" value="' + jsonData.total_cash_paid + '" />' +
                '</tr>');
        
        sumaryTable.append('<tr class="table-warning"><td class="text-right"><h3>Grand Total</h3></td><td class="text-right"><h3>' + Number(jsonData.grand_total).toLocaleString('en') + '</h3></td></tr>');
        sumaryTable.append('<tr class="table-warning"><td class="text-right"><h3>ยอดเงินนับจริง</h3></td><td class="text-right"><input type="text" class="form-control" name="actual_manual_amt" value="' + jsonData.grand_total + '" style="text-align: right" data-type="float"></td></tr>');
        sumaryTable.append('<input type="hidden" name="close_date" value="' + jsonData.date + '" />');
        sumaryTable.append('<input type="hidden" name="close_day_id" value="' + closeDayId + '" />');
        validateTextbox();
    }
    $(document).ready(function () {
        $('#datatable-buttons > tbody > tr').each(function() {
            
        });
        
        $('#close_day_modal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        $("#datatable-buttons > tbody tr").click(function () {

            var startDate = $(this).attr('gold-start-date');
            var endDate = $(this).attr('gold-end-date');
            var branchId = $(this).attr('gold-branch');
            var closeDayId = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var allow_to_close = $(this).attr('data-allow');
            if (allow_to_close === 'YES') {
                $('#page-load').show();
                $('#close_day_modal').modal('show');
                $.post(
                        SITE_URL + "service-payments/income",
                        {
                            branch_id: branchId,
                            start_date: startDate,
                            end_date: endDate
                        }
                )
                        .done(function (data) {
                            var jsonData = JSON.parse(data);
                            //console.log(jsonData);
                            makeData(jsonData[0], closeDayId);
                            $('#page-load').hide();
                        });
            }


        });

        $("#datatable-buttons > tbody tr").click(function () {
            var selected = $(this).hasClass("table-success");
            $("#datatable-buttons > tbody tr").removeClass("table-success");
            if (!selected) {
                //console.log($(this).attr('id'));
                $(this).addClass("table-success");

            }

        });

        $('#bt_save').on('click', function () {
            $('#frm').submit();
        });
    });

</script>