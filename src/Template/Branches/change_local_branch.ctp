<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <div class="card-box">
            <?= $this->Form->create('branch', ['id' => 'frn']) ?>
            <div class="row">
                
                <div class="col-lg-12 text-center">
                    <h1 class="fa-3x prompt-400 text-primary"><i class="mdi mdi-store"></i>เปลี่ยนสาขา</h1>
                </div>
                <div class="col-lg-8 offset-lg-2 text-center form-group">

                     <?= $this->Form->select('branch_id',$branches, ['class' => 'form-control', 'label' => false]) ?> 
                </div>
                <div class="col-lg-8 offset-lg-2 text-center">
                    <?= BT_SAVE ?>
                </div>   
                
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
