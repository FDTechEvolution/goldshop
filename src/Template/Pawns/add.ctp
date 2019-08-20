





<div class="page-header col-md-8  col-lg-8 col-xs-8 ">

    <h4>ทำรายการรับจำนวน</h4> 
    <hr>

</div>

<div class="row">
    <div class="col-md-8  col-lg-8 col-xs-8">
        <div class="card-box ">
            <div class="p-20">

                <?= $this->Form->create($pawn) ?>
                <div class="row">
                    <div class="form-group col-4 ">
                        <label >เลขที่ </label>
                        <div >
                            <?= $this->Form->control('docno', ['class' => 'form-control', 'label' => false]) ?> 
                        </div>

                    </div>
                    <div class="form-group col-4">
                        <label >ชื่อ </label>
                        <div >
                            <?= $this->Form->control('bpartner_id', ['class' => 'form-control', 'label' => false, 'options' => $bpartners]) ?>
                        </div>
                    </div> 
                    <div class="form-group col-4">
                        <label >สาขา </label> 
                        <div >
                            <?= $this->Form->control('branch_id', ['class' => 'form-control', 'label' => false, 'options' => $branches]) ?> 
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <label class="col-2 col-form-label" for="">บัญชี :</label>
                    <div class="col-10">
                        <?= $this->Form->control('bank_account_id', ['class' => 'form-control', 'label' => false, 'options' => $bankAccounts]) ?> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">docdate</label>
                    <div class="col-10">

                        <input class="form-control" type="date" name="docdate" dateformat="d/M/y">

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">วันสิ้นอายุ</label>
                    <div class="col-10">

                        <input class="form-control" type="date" name="expiredate" dateformat="d/M/y">

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">วันไถ่ถอน</label>
                    <div class="col-10">

                        <input class="form-control" type="date" name="returndate" dateformat="d/M/y">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label">สถานะ :</label>
                    <div class="col-10">
                        <?= $this->Form->control('status', ['class' => 'form-control', 'label' => false, 'options' => ['DR' => 'DR']]) ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">หมายเหตุ :</label>
                    <div class="col-10">
                        <?= $this->Form->control('description', ['class' => 'form-control', 'label' => false]) ?>
                    </div>
                </div>



                <div class="form-group row">

                    <div class="col-md-6"style="text-align: right">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">บันทึกข้อมูล</button>
                        </div>
                    </div>
                    <div class="col-md-6"style="text-align: left">
                        <div class="form-group">
                            <?= $this->Html->link(BT_BACK, ['action' => 'index'], ['escape' => false]) ?>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


