<div id="key_discount_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title text-primary prompt-500">ส่วนลด</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 id="discount_text" class="prompt-400 color-green">0</h1>
                        <input type="hidden" name="discountamt" id="discountamt" value="0"/>
                    </div>
                </div>
                <?php
                $secondary = 'btn btn-secondary waves-effect btn-block btn-lg m-b-10';
                $data_name = 'discount_key';
                ?>
                <div class="row m-b-10">
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="7">7</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="8">8</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="9">9</button></div>
                    <div class="col-md-3"><button type="button" class="btn btn-primary waves-effect btn-block btn-lg m-b-10" id="del_bt">DEL</button></div>

                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="4">4</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="5">5</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="6">6</button></div>
                    <div class="col-md-3"></div>


                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="1">1</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="2">2</button></div>
                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="3">3</button></div>


                    <div class="col-md-6"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value="0">0</button></div>

                    <div class="col-md-3"><button type="button" class="<?= $secondary ?>" data-name="<?= $data_name ?>" value=".">.</button></div>
                    <div class="col-md-3"></div>

                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success waves-effect waves-light" id="discount_save">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>



    <script>
        function enterKey(value,filed,label) {
            //console.log(value);
            var current_value = ($('#'+filed).val());
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
                $('#'+filed).val(current_value);
                $('#'+label).html(current_value_str + '.');
            } else {
                new_number = new Intl.NumberFormat('en-IN', {maximumFractionDigits: 4}).format(current_value);
                $('#'+filed).val(current_value);
                $('#'+label).html(new_number);
            }
        }

        $(document).ready(function () {
            $('button[data-name="<?=$data_name?>"]').on('click', function () {
                //console.log(this.value);
                enterKey(this.value,'discountamt','discount_text');

            });
        });
    </script>
</div>