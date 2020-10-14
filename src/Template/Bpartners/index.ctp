
<?= $this->element('Lib/data_table') ?>

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0 gold-title"><?=h($title)?></h3>
            <p class="text-muted font-13 m-b-30">
            </p>
            <div class="container-fluid col-12 bt-tool">
                <?= $this->Html->link(BT_ADD, ['action' => 'add', $iscustomer], ['escape' => false]) ?> 
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       
                        <th scope="col"style="text-align: center">ชื่อ - นามสกุล</th>
                        <th scope="col"style="text-align: center">สาขา</th>
                        <th scope="col"style="text-align: center">เบอร์โทร</th>
                        <th>ที่อยู่</th>
                       
                        <th width="100px">สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bpartners as $bpartner): ?>
                    <tr data-id="<?=h($bpartner->id)?>" data-iscustomer="<?=h($bpartner->iscustomer)?>" class="hand-cursor">
                            <td><?= h($bpartner->name) ?></td>
                            <td><?= h($bpartner->branch->name) ?></td>
                            <td style="text-align: center"><?= h($bpartner->mobile) ?></td>
                            <?php $address = $bpartner->has('address')?$bpartner->address:null;?>
                           
                            <td>
                                <?php if(!is_null($address)){?>
                                <small><?=h($address->address_line.' '.$address->subdistrict.' '.$address->district.' '.$address->province)?></small>
                                <?php } ?>
                            </td>
                            <td><?= $bpartner->isactive == 'Y' ? ACTIVE : INACTIVE ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var view_url = SITE_URL + 'bpartners/view/';
    

    $(document).ready(function () {

        $("#datatable-buttons").delegate('tr', 'click', function () {
            var id = $(this).attr("data-id");
            var iscustomer = $(this).attr("data-iscustomer");
            document.location = view_url+id+'/'+iscustomer;
        });
    });


</script>