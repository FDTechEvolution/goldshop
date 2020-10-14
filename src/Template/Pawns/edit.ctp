<?= $this->Form->create($pawn, ['id' => 'pawn', 'type' => 'file']) ?>
<?= $this->Form->control('pawn_id',['type'=>'hidden','value'=>$pawn->id,'id'=>'pawn_id'])?>
<?= $this->Form->control('bpartner_id',['type'=>'hidden','value'=>$pawn->bpartner_id,'id'=>'bpartner_id'])?>
<div class="row">
    <div class="col-md-9  col-lg-8">
        <div class="card-box" style="margin-bottom: 15px;">
            <div class="row">
                <div class="col-md-8  col-lg-8 col-xs-8" style="text-align: left">
                    <div class="form-group">

                        <h3 class="card-title text-primary prompt-500 fa-3x"><i class="mdi mdi-account-card-details"></i> รับจำนำ</h3>
                    </div>
                </div>
                <div class="col-md-4  col-lg-4 col-xs-4">
                    <div class="form-group">
                        <label >เลขที่ <?= REQUIRE_FIELD ?></label>
                        <?= $this->Form->control('docno', ['class' => 'form-control', 'label' => false, 'id' => 'docno', 'autocomplete' => 'off', 'value' => $pawn->docno]) ?> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 border-right">
                    <div class="row">
                        <div class=" col-md-4 form-group">
                            <label >เริ่มวันที่ <?= REQUIRE_FIELD ?></label>
                            <?= $this->Form->control('date', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'date', 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class=" col-md-4 form-group">
                            <label>ครบกำหนด <?= REQUIRE_FIELD ?></label>

                            <?= $this->Form->control('expiredate', ['readonly', 'class' => 'form-control', 'id' => 'expiredate', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>
                        </div>
                        <div class=" col-md-4 form-group" style="display: none;">
                            <label >รวมจำนวนวัน </label>
                            <?= $this->Form->control('totald', ['readonly', 'class' => 'form-control', 'label' => false, 'id' => 'totald']) ?> 
                        </div>
                        <div id='divtype' class="col-md-4 form-group">
                            <label >อัตราดอกเบี้ย </label>
                            <?= $this->Form->control('type', ['id' => 'type', 'empty' => '---', 'class' => 'form-control', 'label' => false, 'options' => ['3%' => '3%', '2.5%' => '2.5%', '2%' => '2%', '1.75%' => '1.75%', '1.5%' => '1.5%',]]) ?>
                        </div>
                        <div class='col-md-4 form-group'>
                            <label for="code">พนักงานขาย</label>
                            <?= $this->Form->select('seller', [], ['class' => 'form-control ', 'id' => 'seller', 'label' => false]) ?>
                        </div>
                        <div class='col-md-8 form-group'>
                            <label for="code">คลังเก็บทอง</label>
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
                    <strong><?= $pawn->bpartner->name ?></strong>
                    <?php
                    $address = '-';
                    if (isset($pawn->bpartner->address->address_line)) {
                        $address = $pawn->bpartner->address->address_line;
                    }
                    $address .= ' โทร.' . $pawn->bpartner->mobile;
                    ?>
                    <address>
                        <?= $address ?>
                    </address>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3  col-lg-4">
        <div class="card m-b-20 card-body">
            <?= $this->element('NumericKeybord/pawn'); ?>
        </div>

    </div>
    <div class="col-12">
        <div class="card-box">
            <div class="row ">

                <div class="col-12">
                    <p class="font-bold text-primary">ระบุรายละเอียดของรายการที่รับจำนำ หลังจากนั้นกดปุ่ม "เพิ่ม"</p>
                    <div class="row">
                        <?= $this->Form->control('index', ['id' => 'index', 'class' => 'form-control', 'label' => false, 'type' => 'hidden', 'value' => 1]) ?>

                        <div class="col-md-3 form-group">
                            <?= $this->Form->select('product_category_id', [], ['class' => 'form-control form-control-lg', 'id' => 'product_category_id', 'label' => false, 'placeholder' => 'รหัสสินค้า']) ?>
                        </div>


                        <div class="col-md-2 form-group">
                            <?= $this->Form->select('percent', $percents, ['class' => 'form-control form-control-lg', 'id' => 'percent', 'label' => false, 'placeholder' => 'รหัสสินค้า']) ?>
                        </div>
                        <div class="col-md-2 form-group">
                            <?= $this->Form->control('weighttext', ['class' => 'form-control form-control-lg', 'id' => 'weight', 'label' => false, 'placeholder' => 'น้ำหนัก/กรัม', 'type' => 'text', 'data-type' => 'float', 'autocomplete' => 'off', 'data-action' => 'numpad']) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('price', ['type' => 'number', 'class' => 'form-control form-control-lg', 'id' => 'price', 'label' => false, 'placeholder' => 'ราคา *', 'data-type' => 'float', 'autocomplete' => 'off', 'data-action' => 'numpad']) ?>
                            <?= $this->Form->hidden('expect_price', ['id' => 'expect_price', 'value' => '0']) ?>
                        </div>

                        <div class="col-md-2">
                            <button type="button" id="adddata" class="btn btn-lg btn-block btn-icon waves-effect waves-light btn-outline-primary"> <i class="ti-plus"></i> เพิ่ม</button>
                        </div>
                    </div>
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
                    console.log(current + '  ' + value.value);
                    if (current === parseFloat(value.value)) {
                        price = parseFloat(value.price);
                        //console.log('correct '+price);
                    }
                });

                $('#price').val(price);
                $('#expect_price').val(price);
            });
        });

        var currentDate = new Date();
        setExpireDate(currentDate);


        $('#date').on('change', function () {
            var parts = $(this).val().split("/");
            console.log(parts);
            currentDate = new Date(parseInt(parts[2]) - 543, parts[1] - 1, parseInt(parts[0]));
            setExpireDate(currentDate);
        });
    });

    function setExpireDate(startDate) {
        var exrireDate = startDate;
        exrireDate.setMonth(startDate.getMonth() + 4);
        //setDefaultDate('expiredate', currentDate);
        $('#expiredate').datepicker().datepicker("setDate", exrireDate);

        var start = $('#date').datepicker('getDate');
        var end = $('#expiredate').datepicker('getDate');
        var diffDays = (end - start) / 1000 / 60 / 60 / 24;
        $('#totald').val(Math.ceil(diffDays));
    }


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
<?= $this->Html->script('gold-selector.js') ?>
<?php
$json_pawn = json_encode($pawn);
?>
<script>
    var pawn_data = '<?= $json_pawn ?>';
    pawn_data = JSON.parse(pawn_data);

    var lines = pawn_data.pawn_lines;

    function addLine(index, line) {
        var product_cat_element = '<input type="hidden" name="product_category_id[]" value="' + line.product.product_category_id + '"/>';
        var percent_element = '<input type="hidden" name="percent[]" value="' + line.product.percent + '"/>';
        var weight_element = '<input type="hidden" name="weight[]" value="' + line.weight + '"/>';
        var product_element = '<input type="hidden" name="product_id[]" value="' + line.product.id + '"/>';
        $("#listdata").append(
                '<tr poid="' + index + '">' +
                '<td><button type="button" class="btn btn-icon waves-effect waves-light btn-primary remCF" data-action="line-remove"><i class="fas fa-times"></i></button></td>' +
                '<td ><img id="showimg' + index + '" class="thumb-image" height="40" width="40"/></td> <td><input type="file" onchange="showpic(this);"    id="img" name="img[]"    /></td>' +
                '<td>' + line.product.name + '<input type="hidden"  id="detail" name="detail[]" value="' + line.product.name + '"  /></td>' +
                '<td class="text-right">' + Number(line.amount).toLocaleString('en') + '<input type="hidden"  id="price' + index + '" name="price[]" value="' + line.amount + '"  /><input type="hidden"  id="expect_price' + index + '" name="expect_price[]" value="0"  /></td>' +
                '</td>' + product_cat_element + percent_element + weight_element +product_element+
                '</tr>');
        $(".remCF").click(function () {
            var thisele = $(this);
            Swal.fire({
                title: 'ยืนยันการลบข้อมูลนี้?',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "ยกเลิก",
                confirmButtonText: "ลบ"
            }).then(function (t) {

                if (t.value) {
                    var position = thisele.parent().parent().attr('poid');
                    console.log(parseInt($('#price' + position + '').val()));

                    if (!isNaN(parseInt($('#price' + position + '').val()))) {
                        var ptm = parseInt($('#totalmoney').val()) - parseInt($('#price' + position + '').val());
                        $('#totalmoney').val(ptm);
                        $('#totalmoneyshow').html(ptm);
                        var type = $('#type').val();
                        cal(type);
                        thisele.parent().parent().remove();
                    }
                }
            });


        });
    }
    $(document).ready(function () {
        console.log(pawn_data);
        var __index = 0;
        var _amt = 0;
        $.each(lines, function (_index, line) {
            addLine(_index, line);
            __index = _index;
            _amt += line.amount;
        });

        $('#index').val(__index + 1);
        $('#totalmoney').val(_amt);
        //$('#totalmoneyshow').html(ttm);
        $("#totalmoneyshow").html(Number(_amt).toLocaleString('en'));
        amt();

        var addressData = pawn_data.bpartner.address;
        var address = addressData['address_line'] + addressData['subdistrict'] + ' '
                + addressData['district'] + ' ' + addressData['province']
                + ' ' + addressData['postalcode'] + ' โทร:' + pawn_data.bpartner.mobile;

        //setBpText(pawn_data.bpartner.id, pawn_data.bpartner.fullname, address, 0);
    });
</script>