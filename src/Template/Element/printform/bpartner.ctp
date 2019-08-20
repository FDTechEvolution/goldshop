<?php 
$address = $bpartner->address;
?>
<h4 class="prompt-400">ลูกค้า</h4>
<address class="">
    <strong><?= h($bpartner->name) ?></strong><br>
    <?php if (!is_null($address) && $address != '') { ?>
        <?= h($address->address_line . ' ตำบล' . $address->subdistrict) ?><br>
        <?= h('อำเภอ' . $address->district . ' จังหวัด' . $address->province . ' ' . $address->postalcode) ?><br>
    <?php } ?>
</address>