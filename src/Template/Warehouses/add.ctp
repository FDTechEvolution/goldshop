<div  col-md-12  col-lg-12 col-xs-12 >
    <div class="card-box ">
        <div class="row">
            <div class="col-6 bt-tool">
                <?= $this->Html->link(BT_BACK, ['controller' => 'warehouses'], ['escape' => false]) ?> 
            </div>
            <div class="col-md-6 bt-tool">
            </div>
        </div>
        <div class="row">
            <div  col-md-8  col-lg-8 col-xs-8 offset-2>

                <h2 class="card-title text-primary "><i class="mdi mdi-account-card-details"></i> เพิ่มคลังสินค้า</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8  col-lg-8 col-xs-8 offset-2">

                <div class="card m-b-20 card-box ">
                    <div class="p-20">

                        <?= $this->Form->create($warehouse) ?>


                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="">ชื่อ คลังสินค้า:</label>
                            <div class="col-10">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false]) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="">สาขา :</label>
                            <div class="col-10">
                                <?= $this->Form->control('branch_id', ['class' => 'form-control', 'label' => false, 'options' => $branches]) ?> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">หมายเหตุ :</label>
                            <div class="col-10">
                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => false]) ?> 
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-2 col-form-label"></label>
                            <div class="col-2">
                                <div class="checkbox">
                                    <?= $this->Form->checkbox('ismain', ['hiddenField' => 'N', 'id' => 'ismain', 'value' => 'Y']) ?>
                                    <label for="ismain">เป็นคลังสินค้าหลัก</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="checkbox">
                                    <?= $this->Form->checkbox('issales', ['hiddenField' => 'N', 'id' => 'issales', 'value' => 'Y']) ?>
                                    <label for="issales">เป็นคลังสำหรับขาย</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="checkbox">
                                    <?= $this->Form->checkbox('ispurchase', ['hiddenField' => 'N', 'id' => 'ispurchase', 'value' => 'Y']) ?>
                                    <label for="ispurchase">เป็นคลังสำหรับซื้อ</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="checkbox">
                                    <?= $this->Form->checkbox('ispawn', ['hiddenField' => 'N', 'id' => 'ispawn', 'value' => 'Y']) ?>
                                    <label for="ispawn">คลังสำหรับจำนำ</label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group row">

                            <div class="col-md-12"style="text-align: center">
                                <?= BT_SAVE ?>
                                <?= BT_RESET ?>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>