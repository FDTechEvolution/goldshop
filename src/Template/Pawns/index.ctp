<?= $this->Form->create($pawn, ['id' => 'pawn', 'type' => 'file']) ?>
<div class="row">
    <div class=" col-md-8  col-lg-8 col-xs-8">
        <div class="card-box ">
            <div class="row">
                <div class="col-md-8  col-lg-8 col-xs-8" style="text-align: left">
                    <div class="form-group">

                        <h3 class="card-title text-primary prompt-500 fa-3x"><i class="mdi mdi-account-card-details"></i> รับจำนำ</h3>
                    </div>
                </div>
                <div class="col-md-4  col-lg-4 col-xs-4">
                    <div class="form-group">
                        <label >เลขที่ <?= REQUIRE_FIELD ?></label>
                        <?= $this->Form->control('docno', ['class' => 'form-control', 'label' => false, 'id' => 'docno','autocomplete' => 'off']) ?> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 border-right">
                    <div class="row">
                        <div class=" col-md-3 form-group">
                            <label >เริ่มวันที่ <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('date', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'date', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class=" col-md-3 form-group">
                            <label>ครบกำหนด <?= REQUIRE_FIELD ?></label>

                            <?= $this->Form->control('expiredate', ['readonly', 'class' => 'form-control', 'id' => 'expiredate', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class=" col-md-3 form-group">
                            <label >รวมจำนวนวัน </label>
                            <?= $this->Form->control('totald', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'totald']) ?> 
                        </div>
                        <div id='divtype' class="col-md-3 form-group">
                            <label >อัตราดอกเบี้ย </label>
                            <?= $this->Form->control('type', ['id' => 'type', 'empty' => '---', 'class' => 'form-control', 'label' => false, 'options' => ['3%' => '3%', '2.5%' => '2.5%', '2%' => '2%', '1.75%' => '1.75%', '1.5%' => '1.5%',]]) ?>
                        </div>
                        <div class='col-md-6 form-group'>
                            <label for="code">พนักงานขาย</label>
                            <?= $this->Form->select('seller', [], ['class' => 'form-control ', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-6 form-group'>
                            <label for="code">คลัง</label>
                            <?= $this->Form->select('warehouse', $warehouseList, ['class' => 'form-control ', 'id' => 'warehouse', 'label' => false]) ?>
                        </div>
                        <div class="col-md-12">
                            <label>หมายเหตุ </label>
                            <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => false, 'rows' => '2']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 border-left">
                    <h4 class="title-header prompt-500 text-primary">ลูกค้า</h4>
                    <?= $this->element('Customers/form_modal_pawn') ?>
                </div>
            </div>
            <hr>
            <div class="row ">
                <div class="col-md-12">
                    <h3 ><i class="mdi mdi-book-open"></i> รายละเอียดการรับจำนำ</h3>
                </div>
            </div>
            <div class="row">
                <?= $this->Form->control('index', ['id' => 'index', 'class' => 'form-control', 'label' => false, 'type' => 'hidden', 'value' => 1]) ?>

                <div class="col-lg-5 form-group">
                    <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false, 'placeholder' => 'รหัสสินค้า']) ?>
                </div>

                <div class="col-lg-5 form-group">
                    <?= $this->Form->select('design_id', [], ['empty' => 'ลาย', 'class' => 'form-control form-control-lg', 'id' => 'design_id', 'label' => false]) ?>
                </div>
                <div class="col-lg-2 form-group">
                    <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false, 'placeholder' => 'รหัสสินค้า']) ?>
                </div>
                <div class="col-lg-3 form-group">
                    <?= $this->Form->control('weighttext', ['class' => 'form-control form-control-lg', 'id' => 'weight', 'label' => false, 'placeholder' => 'น้ำหนัก/กรัม', 'type' => 'text', 'data-type' => 'float','autocomplete' => 'off']) ?>
                </div>
                <div class="col-lg-4">
                    <?= $this->Form->control('price', ['type' => 'number', 'class' => 'form-control form-control-lg', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคา *', 'data-type' => 'float','autocomplete' => 'off']) ?>
                    <?= $this->Form->hidden('expect_price', ['id' => 'expect_price','value'=>'0']) ?>
                </div>

                <div class="col-md-3">
                    <button type="button" id="adddata" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-plus"></i> เพิ่ม</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <table id="listdata" class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>ภาพสินค้า</th>
                                <th></th>
                                <th>สินค้า</th>
                                <th class="text-right">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-xs-12">
        <div class="card m-b-20 card-body">
            <?= $this->element('NumericKeybord/pawn'); ?>
        </div>
        
    </div>
</div>

<?= $this->Form->end() ?>



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

        //Get pawn price
        $.get(SITE_URL + "service-gold-prices/pawn-price", function (data) {

            var dataJson = JSON.parse(data.replace(/&quot;/g, '"'));
            //console.log(dataJson);

            //console.log(bath_price);
            $('#weight').on('keyup', function () {
                //var price = Math.round(((bath_price - 800) * 0.0656) * $(this).val());
                var price = 0;
                var current = parseFloat($(this).val());
                $.each(dataJson, function (key, value) {
                    console.log(current+'  '+ value.value);
                    if(current === parseFloat(value.value)){
                        price = parseFloat(value.price);
                        //console.log('correct '+price);
                    }
                });
                
                $('#price').val(price);
                $('#expect_price').val(price);
            });
        });

        var currentDate = new Date();
        currentDate.setMonth(currentDate.getMonth() + 4);
        //setDefaultDate('expiredate', currentDate);
        $('#expiredate').datepicker().datepicker("setDate", currentDate);
        var start = $('#date').datepicker('getDate');
        var end = $('#expiredate').datepicker('getDate');
        var diffDays = (end - start) / 1000 / 60 / 60 / 24;
        $('#totald').val(Math.ceil(diffDays));
    });


    function cal(type) {

        var amt = parseFloat($('#totalmoney').val());
        var start = $('#date').datepicker('getDate');
        var end = $('#expiredate').datepicker('getDate');
        var diffDays = (end - start) / 1000 / 60 / 60 / 24;
        // diffDays = diffDays + 1;
        // alert(diffDays);

        $.post(<?= 'SITE_URL' ?> + 'pawns/getinterrestrate', {"type": type, "diffDays": diffDays, "flag": true}, function (resp) {

            // alert(resp);
            $('#interrestrate').val(Math.ceil(parseFloat(resp) * amt));
            var calrate = toFixed(resp * 100, 2);
            $('#rate').val(calrate);
            //$('#interrestrateshow').html(Math.ceil(resp * amt));
            $("#interrestrateshow").html(Number(Math.ceil(resp * amt)).toLocaleString('en'));
            $('#rateshow').html(calrate);
            $('#amount').val(0);
        });
    }
</script>
<?= $this->Html->script('pawn/pawn.js') ?>
<?= $this->Html->script('pawn/validation.js') ?>
<?= $this->Html->script('gold-selector.js')?>