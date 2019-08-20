<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row prompt-300">
                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">ซื้อ</button>', ['controller' => 'purchase'], ['escape' => false]) ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">ขาย/แลกเปลี่ยน</button>', ['controller' => 'sales'], ['escape' => false]) ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">สั่งซื้อ/สั่งทำ</button>', ['controller' => 'purchase-orders', 'action' => 'index'], ['escape' => false]) ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">ชำรุด</button>', ['controller' => 'broken', 'action' => 'index'], ['escape' => false]) ?>
                </div>

                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">เงินออม</button>', ['controller' => 'saving-accounts'], ['escape' => false]) ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">รายรับ/รายจ่าย</button>', ['controller' => 'income'], ['escape' => false]) ?>
                </div>
                <div class="col-md-4">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">จำนำ</button>', ['controller' => 'pawns', 'action' => 'index'], ['escape' => false]) ?>
                </div>
                <div class="col-md-4">
                    <button type="button" id="search" class="btn btn-block btn-outline-primary w-lg m-b-5 p-md-5" style="font-size: 30px;">ไถ่ถอน/ต่อดอก</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row prompt-300">
                <div class="col-md-9">
                    <div class="row">
                        <?php $btClass = 'btn btn-block btn-secondary waves-effect waves-light w-lg m-b-5 p-t-10 p-b-10'; ?>
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการรับซื้อ</button>', ['controller' => 'purchase', 'action' => 'showall'], ['escape' => false]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการขาย/แลกเปลี่ยน</button>', ['controller' => 'sales', 'action' => 'showall'], ['escape' => false]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการสั่งซื้อ/สั่งทำ</button>', ['controller' => 'purchase-orders', 'action' => 'showall'], ['escape' => false]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการชำรุดทั้งหมด</button>', ['controller' => 'broken', 'action' => 'showall'], ['escape' => false]) ?>
                        </div>

                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการเงินออม</button>', ['controller' => 'saving-transactions', 'action' => 'listsavingtransaction'], ['escape' => false]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการรับจำนำ</button>', ['controller' => 'pawns', 'action' => 'listpawn'], ['escape' => false]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="' . $btClass . '">รายการไถ่ถอน/ต่อดอก</button>', ['controller' => 'pawns', 'action' => 'listreturnpawn'], ['escape' => false]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Html->link('<button type="button" class="btn btn-block btn-success waves-effect waves-light w-lg m-b-5 p-t-10 p-b-10">ปิดบัญชีประจำวัน</button>', ['controller' => 'close-days', 'action' => 'index'], ['escape' => false]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div id="search_pawn_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-primary prompt-500">ค้นหาข้อใบจำนำ</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-7 offset-md-2">

                            <?= $this->Form->control('search_text', ['class' => 'form-control form-control-lg', 'label' => false, 'id' => 'search_text', 'placeholder' => 'เลขใบจำนำ/ชื่อ/เลขบัตรประชาชน']); ?>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="button" id="search_bp_bt" class="btn btn-lg btn-icon waves-effect waves-light btn-primary m-b-5"> <i class="ti-search"></i> </button>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover" id="list_bp">
                            <thead>
                                <tr>
                                    <th>เลขใบจำนำ</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>จำนวนเงินต้น</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->Html->script('update-store-price.js')?>
<script type="text/javascript">

    $('#search').click(function () {
        $('#search_pawn_modal').modal('show');

    });

    $('#search_bp_bt').click(function () {
        var search_text = $('#search_text').val();

        $.post(SITE_URL + "pawns/ajaxsearch/", {search_text: search_text}, function (_data) {
            var dataJson = JSON.parse(_data);
            $('#list_bp > tbody').empty();
            console.log(dataJson);
            $.each(dataJson, function (i, item) {

                $('#list_bp > tbody').append(
                        '<tr class="hand-cursor" data-url="' + SITE_URL + 'pawns/returnpawn/' + item.id + '" class="hand-cursor">' +
                        '<td>' + item.docno + '</td>' +
                        '<td>' + item.bpartner.name + '</td>' +
                        '<td>' + item.totalmoney + '</td>' +
                        '</tr>'
                        );
            });
            $('#search_text').val('');
        });
    });

    $(document).ready(function () {
        $("#list_bp").delegate('tr', 'click', function () {
            var url = $(this).attr("data-url");
            if (url !== 'undefined' && url !== undefined) {
                document.location = url;
            }
        });
    });
</script>