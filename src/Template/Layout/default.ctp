<!DOCTYPE html>
<html lang="en">
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
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= SITE_URL ?>fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- App css -->
        <?= $this->Html->css('assets/css/bootstrap.min.css') ?>
        <?= $this->Html->css('assets/css/icons.min.css') ?>
        <?= $this->Html->css('assets/css/app.min.css') ?>
        <?= $this->Html->css('assets/libs/sweetalert2/sweetalert2.min.css') ?>
        <?= $this->Html->css('gold-style.css') ?>
        <?= $this->Html->css('thai-fonts.css') ?>
        <?= $this->Html->css('loading.css') ?>

        <?= $this->Html->script('/css/assets/js/vendor.min.js') ?>
        <?= $this->Html->script('/css/assets/libs/custombox/custombox.min.js') ?>

        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('gold.js'); ?>
        <?= $this->Html->script('utils.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js'); ?>

        <?= $this->Html->script('/css/assets/libs/sweetalert2/sweetalert2.min.js') ?>
        <?= $this->Html->css('assets/libs/jquery-toast/jquery.toast.min.css') ?>
        <?= $this->Html->script('/css/assets/libs/jquery-toast/jquery.toast.min.js') ?>
        <?= $this->Html->script('me.notis.js') ?>

        <?php $actionName = $this->request->getParam('action'); ?>
        <script>
            var branch_id = '<?= $this->request->session()->read('Global.branch_id') ?>';
            var org_id = '<?= $this->request->session()->read('Global.org_id') ?>';
            var seller = '<?= $this->request->session()->read('Auth.User.id') ?>';
            var SITE_URL = '<?= SITE_URL ?>';
            var action_name = '<?= $actionName ?>';
            
            function show_loading(){
                $('#box-loading').show();
            }
            function hide_loading(){
                $('#box-loading').hide();
            }
        </script>


    </head>

    <body>
        <div class="loading" id="box-loading" style="display: none;">Loading&#8230;</div>
        <audio id="play" src="<?= SITE_URL ?>sound/error.mp3"></audio>
        <audio id="play_ding" src="<?= SITE_URL ?>sound/ding.mp3"></audio>
        <div id="preloader">
            <div id="status">
                <div class="bouncingLoader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>
        <!-- Begin page -->
        <div id="wrapper">
            <?= $this->element('Layout/header_v_1') ?>
            <div class="content-page" style="margin-top: 3px;">
                <div class="content">
                    <div class="container-fluid">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
                <?= ''// $this->element('Layout/footer') ?>

            </div>
        </div>    

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <?= $this->Html->script('/css/assets/js/app.min.js') ?>



        <script>

            $(document).ready(function () {
                if ($("#branch_id").val() === '' || action_name === 'add') {
                    $("#branch_id").val(branch_id).trigger('change');
                }

                if ($("#org_id").val() === '' || action_name === 'add') {
                    $("#org_id").val(org_id).trigger('change');
                }
                //$('body').fullscreen();

            });
        </script>

    </body>
</html>