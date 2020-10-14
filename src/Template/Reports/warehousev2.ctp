
<?= $this->Html->css('assets/libs/rwd-table/rwd-table.min.css') ?>
<div class="row">
    <div class="col-md-12">
        <div class="row d-print-none">
            <div class="col-12">
                <div class="card-box">
                    <div class="panel-body">
                        <?= $this->Form->create('', ['id' => 'frm']) ?>
                        <div class="row m-b-10 m-t-10">
                            <div class="col-md-12 text-center">
                                <h3 class="prompt-500 text-primary">รายงานสินค้าคงคลัง</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row m-t-10">

                            <div class="col-md-4 offset-md-2 form-group">
                                <?= $this->Form->control('warehouse_id', ['id' => 'warehouse_id', 'class' => 'form-control', 'label' => 'คลังสินค้า', 'options' => $warehouses]) ?>
                            </div>
                            <div class="col-md-2 form-group">
                                <?= $this->Form->control('start_date', ['value' => isset($startDate) ? $startDate : '', 'class' => 'form-control', 'id' => 'start_date', 'type' => 'text', 'label' => 'ตั้งแต่วันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>
                            <div class="col-md-2 form-group">
                                <?= $this->Form->control('end_date', ['value' => isset($endDate) ? $endDate : '', 'class' => 'form-control', 'id' => 'end_date', 'type' => 'text', 'label' => 'ถึงวันที่', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th', 'readonly' => 'readonly']) ?>
                            </div>
                            <div class="col-md-2 offset-md-5 form-group">
                                <button class="btn btn-block btn-primary waves-effect">ค้นหา</button>
                            </div>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="responsive-table-plugin">
              
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <?php foreach ($datas as $index => $data): ?>
                            <table id="" class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="<?= $data['column_qty'] + 1 ?>"><h3 class="f-kanit-700 text-white"><?= $data['docdate'] ?></h3></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['rows'] as $index => $row): ?>
                                        <tr class="">
                                            <td><?= $row['name'] ?></td>
                                            <?php foreach ($row['codes'] as $code): ?>
                                                <td class="text-right">
                                                    <span class="text-dark f-kanit-400 border-bottom"><?= $code['name'] ?></span><br/>
                                                    <?php
                                                    if ($code['gr'] > 0) {
                                                        echo '<span class="text-success">รับเข้า +' . $code['gr'] . '</span><br/>';
                                                    }
                                                    if ($code['sales'] > 0) {
                                                        echo '<small class="text-primary">ขาย ' . $code['sales'] . ', </small>';
                                                    }
                                                    ?>
                                                    <span class="f-kanit-700">เหลือ <?= $code['final_stock'] ?></span>
                                                </td>
                                            <?php endforeach; ?>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        setDefaultToDayDate('start_date');
        setDefaultToDayDate('end_date');
    });
</script>