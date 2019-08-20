
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>ห้างทองเยาวราช</title>
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
        <?= $this->Html->css('bootstrap-4.0.0/dist/css/bootstrap.css') ?>

        <?= $this->Html->css('/thaifont/prompt-master/css/fonts.css') ?>
        <?= $this->Html->css('gold-style.css') ?>
        <?= $this->Html->css('/assets/css/icons.css') ?>
        <?= $this->Html->css('/assets/css/style.css') ?>

        <?= $this->Html->script('/assets/js/modernizr.min.js'); ?>

        <!-- jQuery  -->
        <?= $this->Html->script('/assets/js/jquery.min.js'); ?>
        <?= $this->Html->script('/assets/js/popper.min.js'); ?>
        <?= $this->Html->script('/assets/js/bootstrap.min.js'); ?>
        <?= $this->Html->script('/assets/js/waves.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.slimscroll.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.scrollTo.min.js'); ?>
        <?= $this->Html->script('jquery.validate.min.js') ?>



        <!-- App js -->
        <?= $this->Html->script('/assets/js/jquery.core.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.app.js'); ?>
        <script>
            var branch_id = '<?= $this->request->session()->read('Global.branch_id') ?>';
            var org_id = '<?= $this->request->session()->read('Global.org_id') ?>';
            var SITE_URL = '<?=SITE_URL?>';
        </script>


    </head>
    <body style="background-color: #FFFFFF;padding-bottom: 0px;">
        <div id="page-load" class="page_loader">
            <?= $this->Html->image('page_load_small.gif', ['style' => 'opacity:1.0;']) ?>
        </div>

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
        
        <?= $this->Html->script('gold.js'); ?>
        <!-- Notification js -->
        <?= $this->Html->script('/assets/plugins/notifyjs/dist/notify.min.js'); ?>
        <?= $this->Html->script('/assets/plugins/notifications/notify-metro.js'); ?>
        <?= $this->Html->script('jquery.validate.min.js') ?>
        
        <script>
            $(document).ready(function () {
                $("#branch_id").val(branch_id);
                $("#branch-id").val(branch_id);

                $("#org_id").val(org_id);
                $("#org-id-id").val(org_id);
            });
        </script>
    </body>
</html>