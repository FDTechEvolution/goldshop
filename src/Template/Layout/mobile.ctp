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
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= SITE_URL ?>fav/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <?= $this->Html->css('assets/libs/custombox/custombox.min.css') ?>
        <?= $this->Html->css('assets/css/bootstrap.min.css') ?>
        <?= $this->Html->css('assets/css/icons.min.css') ?>
        <?= $this->Html->css('assets/css/app.min.css') ?>
        <?= $this->Html->css('thai-fonts.css') ?>
        <?= $this->Html->css('loading.css') ?>

        <?= $this->Html->css('/thaifont/prompt-master/css/fonts.css') ?>
        <?= $this->Html->css('gold-style.css') ?>
        <?= $this->Html->css('assets/libs/sweetalert2/sweetalert2.min.css') ?>
        <?= $this->Html->css('assets/libs/jquery-toast/jquery.toast.min.css') ?>
        <?= $this->Html->script('me.notis.js') ?>

        <?= $this->Html->script('/css/assets/js/vendor.min.js') ?>


        <!-- validate js -->
        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('gold.js'); ?>
        <?= $this->Html->script('utils.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js'); ?>
        <?= $this->Html->script('/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js'); ?>

        <?= $this->Html->script('/css/assets/libs/sweetalert2/sweetalert2.min.js') ?>
        <?= $this->Html->script('/css/assets/libs/jquery-toast/jquery.toast.min.js') ?>


        <?php $actionName = $this->request->getParam('action'); ?>
        <script>
            var branch_id = '<?= $this->request->session()->read('Global.branch_id') ?>';
            var org_id = '<?= $this->request->session()->read('Global.org_id') ?>';
            var seller = '<?= $this->request->session()->read('Auth.User.id') ?>';
            var SITE_URL = '<?= SITE_URL ?>';
            var action_name = '<?= $actionName ?>';
        </script>


    </head>
    <body class="fixed-left" id="body" style="min-height: 0px;">
        <div class="loading" id="box-loading" style="display: none;">Loading&#8230;</div>
        <?= $this->element('pos') ?>
        <?= $this->element('menu') ?>
        <audio id="play" src="<?= SITE_URL ?>sound/error.mp3"></audio>
        <audio id="play_ding" src="<?= SITE_URL ?>sound/ding.mp3"></audio>
        <div id="preloader">
            <div id="status">
                <div class="bouncingLoader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>



        <div id="wrapper">


            <div class="content" style="margin-top: 5px;margin-bottom: 40px;">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <?= ''// $this->element('Layout/footer') ?>


        </div>
        <div class="top-menu-mobile d-print-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">

                    </div>
                    <div class="col-6 text-right">

                        <?php $branch = 'สาขา' . $this->request->session()->read('Global.branchName') ?>
                        <button class="btn btn-outline-secondary">กำลังใช้งาน<?= h($branch) ?></button>
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light" id="bt-menu">MENU</button>

                        <button type="button" class="btn btn-primary waves-effect waves-light pl-5 pr-5" id="bt-pos">POS</button>

                    </div>
                </div>
            </div>
        </div>

        <?= $this->Html->script('/css/jquery.fullscreen-0.6.0/release/jquery.fullscreen.min.js') ?>
        <?= $this->Html->script('/css/assets/libs/custombox/custombox.min.js') ?>
        <?= $this->Html->script('/css/assets/js/app.min.js') ?>

        <?= ''// $this->Html->script('keypad-v.01/fdtech-keypad-v.0.1.js') ?>
        <script>


            $(document).ready(function () {

                $('#bt-pos').on('click', function () {
                    if ($('#box-pos').is(':visible')) {
                        $('#box-pos').hide();
                    } else {
                        $('#box-pos').show();
                    }

                    $('#box-menu').hide();
                });
                $('#bt-menu').on('click', function () {
                    if ($('#box-menu').is(':visible')) {
                        $('#box-menu').hide();
                    } else {
                        $('#box-menu').show();
                    }

                    $('#box-pos').hide();
                });

                if ($("#branch_id").val() === '' || action_name === 'add') {
                    $("#branch_id").val(branch_id);
                }

                if ($("#org_id").val() === '' || action_name === 'add') {
                    $("#org_id").val(org_id);
                }

                $('#body').on('click', function () {
                    //$('body').fullscreen();
                    //document.getElementById('body').requestFullscreen();
                });
                //document.getElementById('body').webkitRequestFullScreen();

                $("#fullscreen_button").on("click", function ()
                {
                });

            });

            $(document).ready(function () {
                // document.fullScreenElement && null !== document.fullScreenElement || !document.mozFullScreen && !document.webkitIsFullScreen ? document.documentElement.requestFullScreen ? document.documentElement.requestFullScreen() : document.documentElement.mozRequestFullScreen ? document.documentElement.mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document.cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitCancelFullScreen && document.webkitCancelFullScreen()

            });
        </script>
    </body>
</html>