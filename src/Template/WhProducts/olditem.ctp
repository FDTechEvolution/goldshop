<div class="row">
    <div class="col-12 form-group text-right">
        <button type="button" class="btn btn-primary waves-effect waves-light" id="bt_submit"  name="bt_submit"><span class="mdi mdi-alert-octagon"></span> นำจ่าย</button>
    </div>
</div>
<?= $this->Form->create('', ['id' => 'myform']) ?>
<div class="row">
    <div class="col-12">
        <table class="table" id="tb_daily_old_item">
            <thead>
                <tr>
                    <th>#</th>

                    <th>ประเภท</th>
                    <th class="text-right">น้ำหนัก(กรัม)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $key => $item): ?>
                    <tr class="hand-cursor" data-check-id="<?= 'line' . $key ?>">
                        <td> <?= $this->Form->checkbox('date[]', ['label' => false, 'id' => ('line' . $key), 'value' => $item['docdate']]) ?> <?= $item['docdate_th'] ?></td>

                        <td><?= $item['type'] ?></td>
                        <td class="text-right"><?= $this->Number->format($item['weight']) ?></td>

                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?= $this->Form->end() ?>
    </div>
</div>

<script>
    $(document).ready(function () {

        $("#tb_daily_old_item > tbody tr").click(function () {
            var selected = $(this).hasClass("table-danger");
            $("#tb_daily_old_item > tbody tr").removeClass("table-danger");
            if (!selected) {
                $(this).addClass("table-danger");
            }

            var id = $(this).attr("data-check-id");
            if ($('#' + id).length > 0) {
                if ($('#' + id).is(':checked')) {
                    $('#' + id).prop("checked", false);
                } else {
                    $('#' + id).prop("checked", true);
                }
            }

        });

        $('#bt_submit').click(function () {
            var chkArray = [];
            $('input[name="date[]"]:checked').each(function () {
                chkArray.push($(this).val());
            });

            if (chkArray.length === 0) {
                $.Notification.autoHideNotify('error', 'top right', 'จำเป็นต้องเลือกรายการ', '');
                return false;
            } else {
                $('#myform').submit();
            }

        });
    });


</script>