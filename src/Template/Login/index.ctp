

<!DOCTYPE html>
<html>
    <head>


        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <body>

        <div class="wrapper-page">

            <div class="text-center py-5">
                <?=$this->Html->image('logo.png',['width'=>'200'])?>
            </div>


            <?= $this->Form->create('login', ['id' => 'login', 'novalidate' => true, 'class' => 'g-py-15']) ?>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                        <input class="form-control" type="text" required="" placeholder="Username" name="username">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="mdi mdi-radar"></i></span>
                        <input class="form-control" type="password" required="" placeholder="Password" name="password">
                    </div>
                </div>
            </div>

            

            <div class="form-group row text-right m-t-20">
                <div class="col-12">
                    <button class="btn btn-primary btn-block btn-custom w-md waves-effect waves-light" type="submit">เข้าสู่ระบบ
                    </button>
                </div>
            </div>

            <div class="form-group row m-t-30">
                <div class="col-sm-7">
                    <a href="javascript:void(0);" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your
                        password?</a>
                </div>
               
            </div>
        </form>
    </div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap --><!-- Tether for Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>
</html>