<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                    <a href="#">
                        <span>
                            <?= $this->Html->image('logo-v.png', ['class' => 'w-100']) ?>
                        </span>
                    </a>
                    <p></p>
                </div>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create('login', ['id' => 'frm-login']) ?>
                <input type="hidden" name="screen_width" value="" id="screen_width"/>
                <input type="hidden" name="screen_height" value="" id="screen_height"/>
                <input type="hidden" name="is_mobile" value="" id="is_mobile"/>
                <div class="form-group mb-3">
                    <label for="emailaddress">ชื่อผู้ใช้งาน</label>
                    <input class="form-control" type="text" id="username" name="username" required="" placeholder="">
                </div>

                <div class="form-group mb-3">
                    <label for="password">รหัสผ่าน</label>
                    <input class="form-control" type="password" required="" id="password" name="password" placeholder="">
                </div>

                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit" id="bt-submit"> เริ่มต้นใช้งาน </button>
                </div>
                <p id="l-useragen"></p>
                <?= $this->Form->end() ?>
            </div> 
        </div>

    </div> <!-- end col -->
</div>
<?= ''//$this->Html->script('login/login.js') ?>
<script>
    function isMobile(){
        var useragen = navigator.userAgent.toLowerCase();
        var result ='N';
        if($.trim(useragen.match(/android/i)) ==='android' || $.trim(useragen.match(/iphone/i)) ==='iphone'){
            
            result = 'Y';
        }
        $('#l-useragen').text(useragen+',is Mobile "'+result+'", '+useragen.match(/android/i));
        
        return result;
    }
    
    $(document).ready(function () {
        var width = $(window).width();
        var height = $(window).height();
        console.log(width);
        console.log(height);
        $('#screen_width').val(width);
        $('#screen_height').val(height);

       
       $('#is_mobile').val(isMobile());
    });
</script>