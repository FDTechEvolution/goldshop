<div class="row p-lg-5">
    <div class="col-12">
        <?= $this->Form->hidden('bpartner_id', ['value' => $bpartner_id, 'id' => 'bpartner_id']) ?>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#page-load-label').text('กำลังตรวจสอบโปรโมชั่น...');
        $('#page-load').show();
        var bpartner_id = $('#bpartner_id').val();
        $.get(SITE_URL + 'service-promotions/get-match-promotion', {bpartner_id: bpartner_id}).done(function (res) {
            var json = JSON.parse(res);
            console.log(json);
            if (json.status === '200') {
                var url = SITE_URL + 'bpartners/view/'+ bpartner_id + '/Y';
                swal({
                    title: "ใช้โปรโมชั่นหรือไม่ ?",
                    text: json.title,
                    type: "warning",
                    showCancelButton: true,

                    confirmButtonText: "ไปหน้าโปรโมชั่น",
                    cancelButtonText: "ยังก่อน",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = url;
                    } else {
                        window.location.href = SITE_URL + 'pos';
                    }
                });
            } else {
                window.location.href = SITE_URL + 'pos';
            }


            $('#page-load').hide();
        });
    });
</script>