<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
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
    </head>

    <body>

        <div class="account-pages mt-2 mb-2">
            <div class="container">
                
                <?= $this->fetch('content') ?>

            </div>
        </div>


        <footer class="footer footer-alt">
            2020 &copy; Developed by <a href="https://www.fdtech.co.th/" target="_blank" class="text-muted">FDTECH</a> 
        </footer>


    </body>
</html>