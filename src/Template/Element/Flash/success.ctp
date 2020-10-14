<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
    ?>
    <script>
        $(document).ready(function () {
            Swal.fire({
                
                type: "success",
                title: "เรียบร้อย",
                text:"<?= $message?>",
                showConfirmButton: !1,
                timer: 3000
            });

           

        });
    </script>
<?php } ?>
