<?= $this->element('Lib/data_table') ?>
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title">กำเหน็จ</h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Form->create($cost, ['class' => 'form-inline', 'novalidate' => true, 'id' => 'frm']) ?>
                <div class="form-group m-r-10">
                    <label for="" class="mr-sm-2">ค่ากำเหน็จ</label>
                    <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light btn-md">บันทึก</button>
                <?= $this->Form->end() ?>
            </div>
            <table id="datatable-buttons" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th>ค่ากำเหน็จ(บาท)</th>
                        <th>เริ่มวันที่</th>

                        <th>ถึงวันที่</th>
                        <th>เพิ่มโดย</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($costs as $cost): ?>
                        <tr class="hand-cursor">

                            <td><?= $this->Number->format($cost->amount) ?></td>
                            <td><?= h($cost->created->i18nFormat(DATE_TIME_FORMATE, null, TH_DATE)) ?></td>

                            <td></td>
                            <td><?= h($cost->has('UserCreated') ? $cost->UserCreated->firstname : '') ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    $("#datatable-buttons > tbody tr").click(function () {
        var selectedUrl = $(this).attr('data-url');
        if (selectedUrl !== 'undefined' && selectedUrl !== undefined) {
            console.log(selectedUrl);
            document.location = selectedUrl;
        }

    });
</script>

