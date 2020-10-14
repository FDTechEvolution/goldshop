<div id="exchange_product_form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary prompt-500">รายการขอแลกเปลี่ยน</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false]) ?>
                    </div>
                    <div class="col-md-2 form-group">
                        <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false]) ?>
                    </div>
                    <div class="col-lg-4 form-group" style="display: none;">
                        <?= $this->Form->select('design_id', [], ['empty' => 'ลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => false]) ?>
                    </div>
                    <div class="col-md-3 form-group">
                        <?= $this->Form->control('weight', ['type' => 'tel', 'class' => 'form-control form-control-lg', 'id' => 'weight', 'label' => false, 'placeholder' => 'น้ำหนัก/กรัม','data-action'=>'numpad']) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $this->Form->control('price', ['type'=>'tel','class' => 'form-control form-control-lg', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคาแลกเปลี่ยน','data-action'=>'numpad']) ?>
                    </div>
                    <div class="col-12">
                        <p class="font-bold text-primary">*** ราคาแลกเปลี่ยน คือจำนวนเงินที่ต้องรับเงินหรือจ่ายเงินเพิ่มให้ลูกค้า กรณีจ่ายคืนลูกค้า ให้ใส่เลขติดลบ</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="exchange_modal_save">ตกลง</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.get(SITE_URL + 'service-product-categories/get-category/').done(function (res) {
            var jsonData = JSON.parse(res);
            $.each(jsonData, function (key, value) {
                //console.log(value);
                $('#product_category_id')
                        .append($("<option></option>")
                                .attr("value", value.product_cat.value)
                                .attr("data-id", value.product_cat.value)
                                .text(value.product_cat.text));
            });
            var product_category_id = $('#product_category_id').val();
            $.each(jsonData[product_category_id]['designs'], function (key, value) {

                $('#design_id')
                        .append($("<option></option>")
                                .attr("value", value.value)
                                .attr("data-id", value.value)
                                .text(value.text));

            });
            $('#product_category_id').on('change', function () {
                $('#design_id').empty();
                $('#design_id').append($("<option></option>").text('ลาย'));
                var dataid = $("#product_category_id option:selected").attr('data-id');
                $.each(jsonData[dataid]['designs'], function (key, value) {

                    $('#design_id')
                            .append($("<option></option>")
                                    .attr("value", value.value)
                                    .attr("data-id", value.value)
                                    .text(value.text));

                });
            });
        });


    });
</script> 