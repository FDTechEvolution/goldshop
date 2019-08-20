<?= $this->element('Lib/report_datatable') ?>
<?= $this->Form->create('', ['id' => 'frm']) ?>
<div class="row m-b-10 m-t-10">
    <div class="col-md-3"></div>
    <div class="col-md-2">

        <?= $this->Form->control('branch_id', ['id' => 'branch_id', 'empty' => 'กรุณาเลือกสาขา', 'class' => 'form-control', 'label' => false, 'options' => $branches]) ?> 

    </div>
    <div class="col-md-2 ">


        <?= $this->Form->control('searchdate', ['placeholder' => 'กรุณาเลือกวันที่', 'class' => 'form-control', 'id' => 'searchdate', 'type' => 'text', 'label' => false, 'data-provide' => 'datepicker', 'data-date-language' => 'th-th']) ?>

    </div>
    <div class="col-md-2 ">
        <button type="button" id="subm" class="btn btn-primary waves-effect">ค้นหา</button>
    </div>
</div>
<?= $this->Form->end() ?>

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <h3 class="text-right"><i class="mdi mdi-radar"></i>Minton</h3>
                    </div>
                    <div class="pull-right">
                        <h6>Invoice # <br>
                            <strong>2015-04-23654789</strong>
                        </h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="pull-left m-t-30">
                            <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                        <div class="pull-right m-t-30">
                            <p><strong>Order Date: </strong> Jun 15, 2015</p>
                            <p class="m-t-10"><strong>Order Status: </strong> <span class="badge badge-danger">Pending</span></p>
                            <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
                        </div>
                    </div>
                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr><th>#</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Total</th>
                                    </tr></thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>LCD</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>1</td>
                                        <td>$380</td>
                                        <td>$380</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mobile</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>5</td>
                                        <td>$50</td>
                                        <td>$250</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>LED</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>2</td>
                                        <td>$500</td>
                                        <td>$1000</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>LCD</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>3</td>
                                        <td>$300</td>
                                        <td>$900</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Mobile</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>5</td>
                                        <td>$80</td>
                                        <td>$400</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="clearfix m-t-40">
                            <h5 class="small text-inverse">PAYMENT TERMS AND POLICIES</h5>

                            <small>
                                All accounts are to be paid within 7 days from receipt of
                                invoice. To be paid by cheque or credit card or direct payment
                                online. If account is not paid within 7 days the credits details
                                supplied as confirmation of work undertaken will be charged the
                                agreed quoted fee noted above.
                            </small>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="text-right"><b>Sub-total:</b> 2930.00</p>
                        <p class="text-right">Discout: 12.9%</p>
                        <p class="text-right">VAT: 12.9%</p>
                        <hr>
                        <h4 class="text-right">USD 2930.00</h4>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="text-right">
                        <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="datatable-buttons" class="table table-striped" width="100%">
            <thead>
                <tr id="thpawn">
                    <th scope="col">เลขที่</th>
                    <th>ชื่อลูกค้า</th>
                    <th>สินค้า</th>
                    <th>วันที่ทำรายการ</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $_type = '';
                $_count = 1;
                $countWeight = 0;
                $countWeightTotal = 0;
                ?>
                <?php foreach ($datas as $data): ?>
                    <?php
                    $typeword = '';
                    if ($_type == 'GOLD') {
                        $typeword = 'ทอง';
                    } elseif ($_type == 'SILVER') {
                        $typeword = 'เงิน';
                    } elseif ($_type == 'DIMOND') {
                        $typeword = 'เพชร';
                    }

//                    echo '-';
//                    echo $data->product->product_category->type;
                    if (($data->product->product_category->type != $_type && $_type != '')) {
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>รวมน้ำหนัก <?= $typeword . ' ' . $countWeight ?> กรัม</b></td>
                        </tr>
                        <?php $countWeight = 0; ?>
                    <?php } ?>
                    <tr id="trpawn">
                        <td><?= h($data->pawn->docno) ?></td>
                        <td><?= h($data->pawn->bpartner->name) ?></td>
                        <td><?= h($data->product->name) ?></td>
                        <td><?= h($data->created->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>


                    </tr>
                    <?php
                    $_type = $data->product->product_category->type;
                    $_count++;
                    $countWeight = $countWeight + $data->weight;
                    $countWeightTotal = $countWeightTotal + $data->weight;
                    $type = '';
                    if ($data->product->product_category->type == 'GOLD') {
                        $type = 'ทอง';
                    } elseif ($data->product->product_category->type == 'SILVER') {
                        $type = 'เงิน';
                    } elseif ($data->product->product_category->type == 'DIMOND') {
                        $type = 'เพชร';
                    } elseif ($data->product->product_category->type == 'NULL') {
                        $type = 'ไม่ระบุ';
                    }
                    ?>
                    <?php if ($_count > sizeof($datas)) { ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>รวมน้ำหนัก <?= $type . ' ' . $countWeight ?> กรัม</b></td>

                        </tr>
                    <?php } ?>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h4>รวมน้ำหนักทั้งหมด <?= $countWeightTotal ?> กรัม</h4></td>

                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function () {
        jQuery('#searchdate').datepicker({

            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true
        });

    });
    $('#subm').on('click', function () {

        if ($('#searchdate').val() == '' || $('#branch_id').val() == '') {
            swal({
                title: "กรูณากรอกข้อมูลในการค้นหาให้ครบถ้วน",
                text: "",
                type: "warning",
                showCancelButton: true,
                showConfirmButton: false,
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        } else {
            $('#frm').submit();
        }
    });
</script>