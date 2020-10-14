
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ห้างทองเยาวราช</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="FDTech" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="manifest" href="<?= SITE_URL ?>fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= SITE_URL ?>fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <?= $this->Html->css('assets/libs/custombox/custombox.min.css') ?>
        <?= $this->Html->css('assets/css/bootstrap.min.css') ?>
        <?= $this->Html->css('assets/css/icons.min.css') ?>
        <?= $this->Html->css('assets/css/app.min.css') ?>
        <?= $this->Html->css('thai-fonts.css') ?>

        <?= $this->Html->css('/thaifont/prompt-master/css/fonts.css') ?>
        <?= $this->Html->css('gold-style.css') ?>
        <?= $this->Html->css('assets/libs/sweetalert2/sweetalert2.min.css') ?>

        <?= $this->Html->script('/css/assets/js/vendor.min.js') ?>
        <?= $this->Html->script('/css/assets/libs/custombox/custombox.min.js') ?>
        <?= $this->Html->script('/css/assets/js/app.min.js') ?>

        <!-- validate js -->
        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('gold.js'); ?>
        <?= $this->Html->script('utils.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js'); ?>

        <?= $this->Html->script('/css/assets/libs/sweetalert2/sweetalert2.min.js') ?>

        <?php $actionName = $this->request->getParam('action'); ?>
        <script>
            var branch_id = '<?= $this->request->session()->read('Global.branch_id') ?>';
            var org_id = '<?= $this->request->session()->read('Global.org_id') ?>';
            var seller = '<?= $this->request->session()->read('Auth.User.id') ?>';
            var SITE_URL = '<?= SITE_URL ?>';
            var action_name = '<?= $actionName ?>';
        </script>


    </head>
    <body style="background-color: #FFFFFF;padding-bottom: 0px;">
       

        <div class="">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>

        </div>

        <script>


            $(document).ready(function () {
                $(window).bind("beforeunload", function () {
                    $('#page-load').show();
                });

                $("a").click(function () {
                    //$('#page-load').show();
                });

                $('button[type="submit"]').click(function () {
                    //$(this).show();
                });
            });
        </script>
        
        <script>


            $(document).ready(function () {
                if ($("#branch_id").val() === '' || action_name === 'add') {
                    $("#branch_id").val(branch_id);
                }

                if ($("#org_id").val() === '' || action_name === 'add') {
                    $("#org_id").val(org_id);
                }

                
            });
        </script>
    </body>
</html>