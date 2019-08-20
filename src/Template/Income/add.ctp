<!-- JS file --> 
<?= $this->Html->script('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js') ?>
<!-- CSS file -->
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.min.css') ?>
<?= $this->Html->css('/js/EasyAutocomplete-1.3.5/easy-autocomplete.themes.min.css') ?>
<?= $this->Form->create($income) ?>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="card m-b-20 card-body">

            <div class="form-group row">
                <div class="col-md-6">
                    <h1 class="card-title text-primary fa-3x"><i class="mdi mdi-store"></i> <?= $title ?></h1>
                </div>
                <div class="col-md-6 text-right">
                    <h1 id="subtotal_label" class="text-danger">จำนวนเงิน  <span>0</span></h1>
                    <?= $this->Form->hidden('subtotalamt', ['label' => false, 'id' => 'subtotalamt', 'value' => '0']) ?>
                </div>

            </div>
            <div class="form-group row">
                <div class='col-md-4'>
                    <label for="code">ผู้ทำรายการ</label>
                    <?= $this->Form->select('seller', $sellerList, ['class' => 'form-control form-control-lg', 'id' => 'seller', 'label' => false]) ?>
                </div>
                <div class="col-md-2">
                    <label for="code">วันที่ทำรายการ<span class="text-danger">*</span></label>
                    <?= $this->Form->control('docdate', ['class' => 'form-control form-control-lg', 'id' => 'datepicker', 'type' => 'text', 'label' => false, 'readonly' => 'readonly']) ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 form-group">

                    <?= $this->Form->control('income_type_id', ['type' => 'text', 'class' => 'form-control form-control-lg', 'id' => 'income_type_id', 'label' => false]) ?>

                </div>
            </div>


            <div class="col-12">
                <div class="table-responsive">
                    <table class="table" id="list_product">
                        <thead>
                            <tr>
                                <th width="40px"></th>
                                <th width="30px">#</th>
                                <th>รายการ</th>
                                <th width="120px">ราคา</th>
                                <th width="120px">จำนวน</th>
                                <th width="120px">ราคารวม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="start_row">
                                <td colspan="5" class="text-center text-warning">
                                    ยังไม่ได้ระบุ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<audio>
    <audio src="<?= SITE_URL ?>sound/error.mp3" id="error_sound" type="audio/mpeg"></audio>
    Your browser isn't invited for super fun audio time.
</audio>


<script>
    jQuery(document).ready(function () {

        jQuery('#datepicker').datepicker({
            language: 'th',
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });
        setDefaultToDayDate('datepicker');

        var options = {
            data: <?= $incomeTypeList ?>,
            getValue: "name",
            placeholder: "กรอกรายการที่ต้องการ",
            highlightPhrase: true,
            list: {
                match: {
                    enabled: true
                },
                sort: {
                    enabled: true
                },
                onChooseEvent: function () {
                    var value = $("#income_type_id").getSelectedItemData().id;
                    process(value);
                    $("#income_type_id").val('');
                }

            },
            //theme: "square"
        };
        console.log(options.data);
        $("#income_type_id").easyAutocomplete(options);

    });

    function process(value) {
        console.log(value);
    }

    function insertRow() {
        $('#start_row').remove();
        var totalLine = getTotalLine();
        $("#list_product > tbody").append(
                '<tr id="' + data.idLineIndex + '" class="product_line">' +
                '<td><button class="btn btn-icon waves-effect waves-light btn-danger m-b-5" type="button" onclick="removeLine(' + "'" + dataJson["code"] + "'" + ');"> <i class="fa fa-remove"></i> </button></td>' +
                '<td><span id="' + data.idLineNo + '">' + totalLine + '</span><input type="hidden" name="product_code" value="' + dataJson["code"] + '"/></td>' +
                '<td>' + dataJson["name"] + '<input type="hidden" name="product[' + totalLine + '][product_id]" value="' + dataJson["id"] + '" id="' + data.idProduct + '"/></td>' +
                '<td>' +
                '<span id="' + data.idPriceLabel + '">' + dataJson["actual_price"] + '</span> ' +
                '<i class="mdi mdi-lead-pencil"></i>' +
                '<input type="hidden" value="' + dataJson["actual_price"] + '" name="product[' + totalLine + '][price]" id="' + data.idPrice + '">' +
                '<input type="hidden" value="' + warehouse_id + '" name="product[' + totalLine + '][warehouse_id]">' +
                '</td>' +
                '<td>' +
                '<span id="' + data.idQtyLabel + '">' + 1 + '</span>' +
                '<input type="hidden" name="product[' + totalLine + '][qty]" value="' + 1 + '" id="' + data.idQty + '"/></td>' +
                '<td><span id="' + data.idAmtLabel + '">' + 0 + '</span></td>' +
                '</tr>'
                );
        $("#" + data.idPriceLabel).html(Number(dataJson["actual_price"]).toLocaleString('en'));
    }
    function getTotalLine() {
            var rowCount = $('#list_product > tbody tr').length;
            rowCount = parseInt(rowCount) + 1;
            return rowCount;
        }




</script>