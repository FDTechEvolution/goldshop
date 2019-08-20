$(document).ready(function () {
    
    $("[data-type=modal_edit]").on('click', function () {
        console.log('clicked ' + $(this).attr('id'));
    });

    $('#form_text_edit').modal({
        backdrop: 'static',
        show:false,
        keyboard: false  // to prevent closing with Esc button (if you want this too)
    });


});

function formEditOnModal() {
    $(":focus").each(function () {
        //alert("Focused Elem_id = " + this.id);
        var currentValue = $('#'+this.id).val();
        $('#_text_edit_modal').val(currentValue);
        $('#form_text_edit').modal('show');
    });
    
    $('#form_text_edit_save').on('click',function(){
        var editedValue = $('#_text_edit_modal').val();
        $('#'+this.id).val(editedValue);
        
        $('#form_text_edit').modal('hide');
    });  
}
