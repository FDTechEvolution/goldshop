<div id="form_text_edit" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-primary prompt-500">แก้ไขข้อมูล</h4>
            </div> 
            <div class="modal-body">
                <div class="row">
                    <input type="text" class="form-control" value="" id="_text_edit_modal">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="form_text_edit_save">ตกลง</button>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('form_textbox_modal.js')?>