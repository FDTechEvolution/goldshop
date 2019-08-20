<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
    ?>
    <script>
        $(document).ready(function () {
           $.Notification.autoHideNotify('success', 'top right', 'เรียบร้อย','<?=$message?>');

        });
    </script>
<?php } ?>
