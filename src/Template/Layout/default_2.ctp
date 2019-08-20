<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= isset($pageTitle) ? $pageTitle . '-' : '' ?><?= PAGE_TITLE ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="FDTech" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?= SITE_URL ?>fav/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= SITE_URL ?>fav/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= SITE_URL ?>fav/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= SITE_URL ?>fav/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= SITE_URL ?>fav/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= SITE_URL ?>fav/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= SITE_URL ?>fav/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= SITE_URL ?>fav/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_URL ?>fav/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= SITE_URL ?>fav/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_URL ?>fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= SITE_URL ?>fav/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_URL ?>fav/favicon-16x16.png">
        <link rel="manifest" href="<?= SITE_URL ?>fav/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= SITE_URL ?>fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- Thai Font -->
        <!--$this->Html->css('/thaifont/style.css')-->
        <!-- App css -->
        <?= $this->Html->css('bootstrap-4.0.0/dist/css/bootstrap.custrom.min.css') ?>

        <?= $this->Html->css('/thaifont/prompt-master/css/fonts.css') ?>
        <?= $this->Html->css('gold-style.css') ?>
        <?= $this->Html->css('/assets/css/icons.min.css') ?>
        <?= $this->Html->css('/assets/css/style.css') ?>
        <?= $this->Html->css('/assets/plugins/switchery/switchery.min.css') ?>

        <?= $this->Html->css('/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>
        <?= $this->Html->css('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>
        <?= $this->Html->css('/assets/plugins/bootstrap-sweetalert/sweet-alert.css') ?>


        <?= $this->Html->script('/assets/js/modernizr.min.js'); ?>


        <!-- jQuery  -->
        <?= $this->Html->script('/assets/js/jquery.min.js'); ?>
        <?= $this->Html->script('/assets/js/popper.min.js'); ?>
        <?= $this->Html->script('/assets/js/bootstrap.min.js'); ?>

        <?= $this->Html->script('jquery.validate.min.js') ?>
        
        <?= $this->Html->script('/assets/plugins/moment/moment.min.js'); ?>

        <?= $this->Html->script('/assets/js/jquery.slimscroll.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.scrollTo.min.js'); ?>

        <?= $this->Html->script('gold.js'); ?>


        <?=''// $this->Html->script('/assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); ?>

        <?=''// $this->Html->script('/assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>

        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js'); ?>
        <!-- thai extension -->
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js'); ?>
        
        <!-- keyboard-->
        <?= $this->Html->css('/jquery-mlkeyboard-master/jquery.ml-keyboard.css') ?>
        <?= $this->Html->script('/jquery-mlkeyboard-master/jquery.ml-keyboard.js') ?>
        
        <?= $this->Html->script('/assets/plugins/switchery/switchery.min.js')?>


        <?php $actionName = $this->request->getParam('action'); ?>
        <script>
            var branch_id = '<?= $this->request->session()->read('Global.branch_id') ?>';
            var org_id = '<?= $this->request->session()->read('Global.org_id') ?>';
            var seller = '<?= $this->request->session()->read('Auth.User.id') ?>';
            var SITE_URL = '<?= SITE_URL ?>';
            var action_name = '<?= $actionName ?>';
        </script>
    </head>
    <body>
        <div id="page-load" class="processing">
            <?= $this->Html->image('ball_loading.gif', []) ?>
            <h2 class="prompt-400" id="page-load-label"></h2>
        </div>
        <?php if (!is_null($this->request->session()->read('Auth.User'))) { ?>
            <?= $this->element('Layout/header') ?>
        <?php } ?>
        <div class="wrapper" <?= $this->request->session()->read('Auth.User.role.isposwindow') == 'Y' ? 'style="padding-top:70px;"' : '' ?>>
            <div class="container-fluid m-t-10">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
        <?= $this->element('Layout/footer') ?>
        <!-- App js -->
        <?= $this->Html->script('/assets/js/jquery.core.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.app.js'); ?>

        

        <?= $this->Html->script('/assets/js/waves.js'); ?>
        

        <!-- Notification js -->
        <?= $this->Html->script('/assets/plugins/notifyjs/dist/notify.min.js'); ?>
        <?= $this->Html->script('/assets/plugins/notifications/notify-metro.js'); ?>
        <?= $this->Html->script('jquery.validate.min.js') ?>
        
        

        <?= $this->Html->script('/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') ?>
        <?= $this->Html->script('/assets/pages/jquery.sweet-alert.init.js') ?>
        <?= $this->Html->script('check.js') ?>

        <!-- Modal-Effect -->
        <?= $this->Html->script('/assets/plugins/custombox/dist/custombox.min.js'); ?>
        <?= $this->Html->script('/assets/plugins/custombox/dist/legacy.min.js'); ?>
        
        
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