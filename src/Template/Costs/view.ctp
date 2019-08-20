<h3 class="m-t-0 gold-title">กำเหน็จ ประจำสาขา <?=h($cost->branch->name)?></h3>
<div class="container-fluid col-12 bt-tool">
    <?= $this->Html->link('<button type="button" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-plus-circle-multiple-outline"></i> แก้ไข</button>', ['action' => 'edit',$cost->id], ['escape' => false]) ?> 
</div>
<p class="text-dark">เพิ่ม/อัพเดทล่าสุดวันที่: <?= h($cost->modified->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>น้ำหนัก</th>
            <th>ค่ากำเหน็จขาย</th>
            <th>ค่ากำเหน็จซื้อ</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cost->cost_lines as $line): ?>
            <tr>

                <td><?= $line->sd_weight->name ?></td>
                <td><?= $this->Number->format($line->amount) ?></td>
                <td><?= $this->Number->format($line->amount2) ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>