<?php
$secondary = 'btn btn-secondary waves-effect btn-block btn-lg m-b-10';
?>
<div class="row m-b-10">
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="7">7</button></div>
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="8">8</button></div>
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="9">9</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-primary waves-effect btn-block btn-lg m-b-10" id="del_bt">DEL</button></div>

    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="4">4</button></div>
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="5">5</button></div>
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="6">6</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-warning waves-effect btn-block btn-lg m-b-10" id="discount_bt" data-toggle="modal" data-target="#discount_modal" style="padding-left: 4px;padding-right: 4px;">ส่วนลด</button></div>



    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="1">1</button></div>
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="2">2</button></div>
    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value="3">3</button></div>


    <div class="col-md-6"><button type="button" class="<?= $secondary ?>" data-name="key" value="0">0</button></div>

    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="key" value=".">.</button></div>
    <div class="col-md-3"></div>

    <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="100" style="font-size:14px;">+100</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="500" style="font-size:14px;">+500</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="1000" style="font-size:14px;;padding-left: 3px;padding-right: 3px;">+1,000</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-info waves-effect btn-block btn-lg m-b-10" data-name="plus" value="10000" style="font-size:14px;;padding-left: 3px;padding-right: 3px;">+10,000</button></div>
</div>

<div class="col-md-12">
    <div id="discount_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title text-primary prompt-500">ส่วนลด</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4 offset-md-4">
                            <label for="code">ส่วนลด/บาท </label>
                            <?= $this->Form->control('_discount', ['class' => 'form-control', 'id' => '_discount', 'label' => false, 'value' => '0']) ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-info waves-effect waves-light" id="discount_save">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function enterKey(value) {
        //console.log(value);
        var current_value = ($(keyupdate_field).val());
        var current_value_str = Number(current_value).toLocaleString('en');

        if (current_value === '0' && value !== '0' && value !== '.') {
            current_value = value;
        } else {
            if (this.value === '.') {
                console.log(current_value.indexOf('.'));
                if (current_value.indexOf('.') === -1 && current_value.length !== 0) {
                    current_value = current_value + value;
                }
            } else {
                current_value = current_value + value;
            }

        }

        var new_number = 0;
        if (this.value === '.') {
            $(keyupdate_field).val(current_value);
            $(keyupdate_field_label).html(current_value_str + '.');
        } else {
            new_number = new Intl.NumberFormat('en-IN', {maximumFractionDigits: 4}).format(current_value);
            $(keyupdate_field).val(current_value);
            $(keyupdate_field_label).html(new_number);
        }
    }

    $(document).ready(function () {

    });
</script>