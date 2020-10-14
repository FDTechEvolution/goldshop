<div class="row">
    <div class="col-12">

        <div class="card-box table-responsive">
            <div class="col-12 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'designs', 'action' => 'index', $productCatId], ['escape' => false]) ?> 
            </div>
            <h3 class="m-t-0 gold-title">เพิ่มลาย</h3>

            <?= $this->Form->create($design, ['class' => '', 'novalidate' => true, 'id' => 'frm','type' => 'file']) ?>
            <div class="row">

                <div class="form-group col-md-2">
                    <label class="col-form-label">ชื่อลาย <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="form-group col-md-2">
                    <label class="col-form-label">ชื่อย่อ(สำหรับ QRCode)</label>
                    <?= $this->Form->control('label', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="form-group col-md-2">
                    <label class="col-form-label">ภาพลาย <?= REQUIRE_FIELD ?></label>
                    <?= $this->Form->control('img', ['id'=>'imgInp','type' => 'file', 'class' => 'form-control', 'label' => false]) ?>
                </div>
                <div id="showimg" style="display: none " class="form-group col-md-2">
                   
                   <img id="blah" src="#" alt="your image" class="thumb-image" height="100" width="100" />
                </div>
                <div class="form-group col-md-2" style="display: none;">
                    <label class="col-form-label">เปิดให้ใช้งาน</label>
                    <div class="checkbox">
                        <?= $this->Form->checkbox('isactive', ['hiddenField' => 'N', 'id' => 'isactive', 'value' => 'Y']) ?>
                        <label for="isactive">

                        </label>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label">รายละเอียด</label>
                    <?= $this->Form->textarea('description', ['class' => 'form-control', 'label' => false]) ?>
                </div>

            </div>
            <div class="form-group row">

                <div class="col-md-12 text-center">
                    <?= BT_SAVE ?>
                </div>
            </div>
            <?= $this->Form->hidden('product_category_id', ['value' => $productCatId]) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        $('#showimg').show();
        readURL(this);
    });
</script>