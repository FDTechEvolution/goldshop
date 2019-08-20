<?= $this->element('Lib/data_table') ?>
<div class="col-md-12  col-lg-12 col-xs-12 ">
    <div class="card-box ">
        <div class="panel-body">

            <?php
            $branch = $user->branch;
            $org = $user->org;

            $orgAddress = $branch->address;
            $ishead = $branch->isheadquarters == 'Y' ? '(สำนักงานใหญ่)' : '';
            ?>
            <div class="clearfix">
                <div class="pull-left prompt-400">
                    <h3 class="text-left prompt-500 text-primary"><?= PAGE_TITLE ?></h3>
                    <p><?= h($orgAddress->address_line . ' ตำบล' . $orgAddress->subdistrict . ' อำเภอ' . $orgAddress->district . ' จังหวัด' . $orgAddress->province . ' ' . $orgAddress->postalcode) ?></p>
                </div>
                <div class="pull-right prompt-300">
                    <h4> <?= $user->title . $user->firstname . ' ' . $user->lastname ?></h4>
                    <h4> ตำแหน่ง : <?= $user->role->name ?></h4>

                </div>
            </div>
            <hr>

            <div class="row ">

                <div class="form-group ">

                    <h3 class="text-left prompt-400 text-primary"><i class="mdi mdi-book-open"></i> รายละเอียดการทำรายการ</h3>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#pawn" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                รายการจำนำ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#invoice" data-toggle="tab" aria-expanded="false" class="nav-link">
                                รายการขาย
                            </a>
                        </li>


                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="pawn" aria-expanded="true">
                            <table class="table table-striped" width="100%" id="datatable-dis1">
                                <thead>
                                    <tr>


                                        <th scope="col">เลขที่ใบจำนำ</th>
                                        <th>ชื่อลูกค้า</th>
                                        <th>ราคา</th>
                                        <th style="text-align: center">สถานะ</th>
                                        <th>วันที่ทำรายการ</th>
                                        <th scope="col">วันสิ้นอายุ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pawn as $pawndata): ?>
                                        <tr>

                                            <td><?= h($pawndata->docno) ?></td>
                                            <td><?= h($pawndata->bpartner->name) ?></td>
                                            <td><?= $this->Number->Format($pawndata->totalmoney) ?></td>
                                            <td style="text-align: center" class="">
                                                <span class="badge badge-<?php
                                                if ($pawndata->status == 'CO') {
                                                    echo 'success';
                                                } else if ($pawndata->status == 'VO') {
                                                    echo 'warning';
                                                } else {
                                                    echo 'secondary';
                                                }
                                                ?>">
                                                          <?= h($docStatusList[$pawndata->status]['name']) ?>
                                                </span>
                                            </td>
                                            <td><?= h($pawndata->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                            <td><?= h($pawndata->expiredate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>



                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="invoice" aria-expanded="false">
                            <table class="table table-striped" width="100%" id="datatable-dis">
                                <thead>
                                    <tr>


                                        <th scope="col">เลขที่เอกสาร</th>
                                       
                                        <th>ราคา</th>
                                        <th style="text-align: center">สถานะ</th>
                                        <th>วันที่ทำรายการ</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($invoice as $invoicedata): ?>
                                        <tr>

                                            <td><?= h($invoicedata->docno) ?></td>
                                            
                                            <td><?= $this->Number->Format($invoicedata->netamt) ?></td>
                                            <td style="text-align: center" class="">
                                                <span class="badge badge-<?php
                                                      if ($invoicedata->docstatus == 'CO') {
                                                          echo 'success';
                                                      } else if ($invoicedata->docstatus == 'VO') {
                                                          echo 'warning';
                                                      } else {
                                                          echo 'secondary';
                                                      }
                                                      ?>">
                                                          <?= h($docStatusList[$invoicedata->docstatus]['name']) ?>
                                                </span>
                                            </td>
                                            <td><?= h($invoicedata->docdate->i18nFormat(DATE_FORMATE, null, TH_DATE)) ?></td>
                                          


                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
