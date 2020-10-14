<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row prompt-300 button-list">
                <div class="col-md-3 text-right">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-primary waves-effect waves-light w-lg">รับซื้อทั้งหมด</button>', ['controller' => 'purchase', 'action' => 'showall'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-primary w-lg py-3" style="font-size: 20px;">ซื้อ</button>', ['controller' => 'purchase'], ['escape' => false]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-success waves-effect waves-light w-lg">ขาย/แลกเปลี่ยนทั้งหมด</button>', ['controller' => 'sales', 'action' => 'showall'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-success w-lg py-3" style="font-size: 20px;">ขาย/แลกเปลี่ยน</button>', ['controller' => 'sales'], ['escape' => false]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-info waves-effect waves-light w-lg">สั่งซื้อ/สั่งทำทั้งหมด</button>', ['controller' => 'purchase-orders', 'action' => 'showall'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-info w-lg py-3" style="font-size: 20px;">สั่งซื้อ/สั่งทำ</button>', ['controller' => 'purchase-orders', 'action' => 'index'], ['escape' => false]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-warning waves-effect waves-light w-lg">ชำรุดทั้งหมด</button>', ['controller' => 'broken', 'action' => 'showall'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-warning w-lg py-3" style="font-size: 20px;">ชำรุด</button>', ['controller' => 'broken', 'action' => 'index'], ['escape' => false]) ?>
                </div>
            </div>
            <hr/>
            <div class="row prompt-300 button-list">
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-danger waves-effect waves-light w-lg">เงินออมทั้งหมด</button>', ['controller' => 'saving-transactions', 'action' => 'listsavingtransaction'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-danger w-lg py-3" style="font-size: 20px;">เงินออม</button>', ['controller' => 'saving-accounts'], ['escape' => false]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-dark waves-effect waves-light w-lg">รายรับ/รายจ่ายทั้งหมด</button>', ['controller' => 'pawns', 'action' => 'listreturnpawn'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-dark w-lg py-3" style="font-size: 20px;">รายรับ/รายจ่าย</button>', ['controller' => 'income'], ['escape' => false]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-purple waves-effect waves-light w-lg">จำนำทั้งหมด</button>', ['controller' => 'pawns', 'action' => 'listpawn'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-purple w-lg py-3" style="font-size: 20px;">จำนำ</button>', ['controller' => 'pawns', 'action' => 'index'], ['escape' => false]) ?>
                </div>
                <div class="col-md-3">
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-outline-pink waves-effect waves-light w-lg">ไถ่ถอน/ต่อดอกทั้งหมด</button>', ['controller' => 'pawns', 'action' => 'listreturnpawn'], ['escape' => false]) ?>
                    <?= $this->Html->link('<button type="button" class="btn btn-block btn-pink w-lg py-3" style="font-size: 20px;">ไถ่ถอน/ต่อดอก</button>', ['controller' => 'pawns', 'action' => 'find'], ['escape' => false]) ?>
 
                </div>
            </div>



        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="row prompt-300">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <?= $this->Html->link('<button type="button" class="btn btn-block btn-success waves-effect waves-light w-lg  p-t-10 p-b-10">ปิดบัญชีประจำวัน</button>', ['controller' => 'close-days', 'action' => 'index'], ['escape' => false]) ?>
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
                            <button type="button" id="search_bp_bt" class="btn btn-lg btn-icon waves-effect waves-light btn-primary "> <i class="ti-search"></i> </button>
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
<?= $this->Html->script('update-store-price.js') ?>
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