<!-- keyboard-->
<?= $this->Html->css('/jquery-mlkeyboard-master/jquery.ml-keyboard.css') ?>
<?= $this->Html->script('/jquery-mlkeyboard-master/jquery.ml-keyboard.js') ?>
<script>
    //console.log(action_name);
    $(document).ready(function () {
        $("input").each(function () {
            $(this).mlKeyboard({
                layout: 'th_TH',
                active_shift: false,
                is_hidden: true,
                open_speed: 100,
                close_speed: 50,
                show_on_focus: true,
                hide_on_blur: true,
                enabled: false
            });
        });
    });
</script>