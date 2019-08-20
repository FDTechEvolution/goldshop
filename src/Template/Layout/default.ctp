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

        <?= $this->Html->css('/assets/plugins/switchery/switchery.min.css') ?>

        <?= $this->Html->css('/assets/css/bootstrap.min.css') ?>
        <?= $this->Html->css('/assets/css/icons.min.css') ?>
        <?= $this->Html->css('/assets/css/style.css') ?>

        <?= $this->Html->css('/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>
        <?= $this->Html->css('/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>
        <?= $this->Html->css('/assets/plugins/bootstrap-sweetalert/sweet-alert.css') ?>

        <?= $this->Html->css('/thaifont/prompt-master/css/fonts.css') ?>
        <?= $this->Html->css('gold-style.css') ?>

        <?= $this->Html->script('/assets/js/modernizr.min.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.min.js'); ?>

        <!-- validate js -->
        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('gold.js'); ?>
        <?= $this->Html->script('utils.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js'); ?>
        <?php $actionName = $this->request->getParam('action'); ?>
        <script>
            var branch_id = '<?= $this->request->session()->read('Global.branch_id') ?>';
            var org_id = '<?= $this->request->session()->read('Global.org_id') ?>';
            var seller = '<?= $this->request->session()->read('Auth.User.id') ?>';
            var SITE_URL = '<?= SITE_URL ?>';
            var action_name = '<?= $actionName ?>';
        </script>
    </head>
    <body class="fixed-left">
        <div id="page-load" class="processing">
            <?= $this->Html->image('ball_loading.gif', []) ?>
            <h2 class="prompt-400" id="page-load-label"></h2>
        </div>
        <div id="wrapper">
            <?= $this->element('Layout/header_v') ?>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
                <?= $this->element('Layout/footer') ?>

            </div>
        </div>
        <script>
            var resizefunc = [];
        </script>
        <?= $this->Html->script('/assets/js/popper.min.js'); ?>
        <?= $this->Html->script('/assets/js/bootstrap.min.js'); ?>
        <?= $this->Html->script('/assets/js/detect.js'); ?>
        <?= $this->Html->script('/assets/js/fastclick.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.slimscroll.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.blockUI.js'); ?>
        <?= $this->Html->script('/assets/js/waves.js'); ?>
        <?= $this->Html->script('/assets/js/wow.min.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.nicescroll.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.scrollTo.min.js'); ?>
        <?= $this->Html->script('/assets/plugins/switchery/switchery.min.js'); ?>


        <!-- Custom main Js -->
        <?= $this->Html->script('/assets/js/jquery.core.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.app.js'); ?>

        <!-- Notification js -->
        <?= $this->Html->script('/assets/plugins/notifyjs/dist/notify.min.js'); ?>
        <?= $this->Html->script('/assets/plugins/notifications/notify-metro.js'); ?>

        <?= $this->Html->script('/assets/plugins/bootstrap-sweetalert/sweet-alert.min.js') ?>
        <?= $this->Html->script('/assets/pages/jquery.sweet-alert.init.js') ?>
        <?= $this->Html->script('check.js') ?>

        <!-- Modal-Effect -->
        <?= $this->Html->script('/assets/plugins/custombox/dist/custombox.min.js'); ?>
        <?= $this->Html->script('/assets/plugins/custombox/dist/legacy.min.js'); ?>
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