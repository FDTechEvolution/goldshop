<?php
$org = $branch->org;
$orgAddress = $branch->address;
$ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
?>
<div class="row">
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-2">
        <?=$this->Html->image('logo.png',['class'=>'w-100'])?>
    </div>
    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-8 col-10">
        <h3 class="text-left prompt-500 text-primary"><?= $org->name ?></h3>
        <p class="" style="margin-bottom: 0px;"><strong><?= h('สาขา' . $branch->name) ?></strong></p>
        <p><?= h($orgAddress->address_line . ' ตำบล' . $orgAddress->subdistrict . ' อำเภอ' . $orgAddress->district . ' จังหวัด' . $orgAddress->province . ' ' . $orgAddress->postalcode) ?></p>

    </div>
</div>

