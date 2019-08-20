<div class="row">
    <div class="col-12">
        <h3 class="m-t-0 gold-title">แก้ไขกำเหน็จ</h3>

        <?= $this->Form->create($cost, ['class' => '', 'novalidate' => true, 'id' => 'frm']) ?>
        <div class="row">
            <div class="form-group col-md-3 col-sm-4">น้ำหนัก</div>
            <div class="form-group col-md-3 col-sm-4">ค่ากำเหน็จขาย</div>
            <div class="form-group col-md-3 col-sm-4">ค่ากำเหน็จซื้อ</div>
        </div>
        <?php $count = 0; ?>
        <?php foreach ($sdWeights as $item) : ?>
            <div class="row">
                <div class="form-group col-md-3 col-sm-4">
                    <?= $this->Form->hidden('cost[' . $count . '].sd_weight_id', ['value' => $item['id']]) ?>
                    <?= $this->Form->control('_unittype', ['value' => $item['name'], 'class' => 'form-control', 'label' => false, 'readonly' => 'readonly']) ?>
                </div>
                <div class="form-group col-md-3 col-sm-4">
                    <?= $this->Form->control('cost[' . $count . '].amount', ['class' => 'form-control', 'label' => false, 'id' => $item['id'] . '_amount']) ?>
                </div>
                <div class="form-group col-md-3 col-sm-4">
                    <?= $this->Form->control('cost[' . $count . '].amount2', ['class' => 'form-control', 'label' => false, 'id' => $item['id'] . '_amount2']) ?>
                </div>

            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
        <div class="form-group row">
            <div class="col-md-9 text-center">
                <?= BT_SAVE ?>
            </div>
        </div>
        <?= $this->Form->end() ?>

    </div>

</div>

<script>
    $(document).ready(function () {
        var jsonData = '<?= $costJson ?>';
        jsonData = jQuery.parseJSON(jsonData);
        //console.log(jsonData);
        
        $.each(jsonData.cost_lines, function (key, line) {
            //alert(key + ": " + value);
            
            $('#'+line.sd_weight.id+'_amount').val(line.amount);
            $('#'+line.sd_weight.id+'_amount2').val(line.amount2);
        });

    });
</script>