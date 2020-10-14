<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
    ?>
    <script>
        $(document).ready(function () {
            Swal.fire({title: "<?= $message ?>", confirmButtonClass: "btn btn-primary mt-2"});
        });
    </script>
<?php } ?>