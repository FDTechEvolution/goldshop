<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
    ?>
    <audio>
        <audio src="<?= SITE_URL ?>sound/error.mp3" id="default_error_sound" type="audio/mpeg"></audio>
        Your browser isn't invited for super fun audio time.
    </audio>
    <script>
        $(document).ready(function () {
            $.Notification.autoHideNotify('error', 'top right', 'มีบางอย่างผิดพลาด', '<?= $message ?>');
            var audio = document.getElementById("default_error_sound");
            audio.play();
        });
    </script>
<?php } ?>

    ("#sa-basic").on("click",function(){Swal.fire({title:"Any fool can use a computer!",confirmButtonClass:"btn btn-confirm mt-2"})})