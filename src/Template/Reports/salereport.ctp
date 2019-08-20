<?= $this->element('Lib/report_datatable') ?>
<div class="row">
    <div class="col-md-12">
        <table id="datatable-buttons" class="table table-striped" width="100%">
            <thead>
                <tr id="thpawn">
                    <th >ชื่อพนักงาน</th>
                    <th>สาขา</th>
                    <th>ยอดขาย</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoice as $data): ?>
                    <tr id="trpawn">

                        <td><?= h($data->user->title.$data->user->firstname.' '.$data->user->lastname) ?></td>
                        <td><?= ($data->branch->name) ?></td>
                        <td><?= $this->Number->Format($data->sum) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
