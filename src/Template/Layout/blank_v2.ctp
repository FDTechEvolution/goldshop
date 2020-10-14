<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Minton - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <?= $this->Html->css('assets/css/bootstrap.min.css') ?>
        <?= $this->Html->css('assets/css/icons.min.css') ?>
        <?= $this->Html->css('assets/css/app.min.css') ?>


        <!-- Vendor js -->
        <?= $this->Html->script('/css/assets/js/vendor.min.js') ?>


        <!-- validate js -->
        <?= $this->Html->script('jquery.validate.min.js') ?>
        <?= $this->Html->script('Validation.js') ?>
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
   
               <div class="account-pages mt-2 mb-2">
            <div class="container">
                
                <?= $this->fetch('content') ?>

            </div>
        </div>
  
    </body>
</html>