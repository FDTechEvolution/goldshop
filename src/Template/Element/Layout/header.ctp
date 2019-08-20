<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo" style="">
                <!-- Text Logo -->
                <a href="<?= SITE_URL . 'home' ?>" class="logo">
                    <span class="logo-small" style="padding: 2px;">
                        <?= $this->Html->image('logo/logo.png',['width'=>'55px']) ?>
                    </span>
                    <span class="logo-large"><?= $this->Html->image('logo/logo.png', ['width' => '55px;']) ?> ห้างทองเยาวราช ตรามังกร</span>
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="list-inline float-right mb-0">

                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="list-inline-item dropdown notification-list text-white">
                        <?php $branch = 'สาขา' . $this->request->session()->read('Global.branchName') ?>
                        <a class="nav-link dropdown-toggle arrow-none waves-effect text-white" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-store noti-icon text-white" style="padding: 0 3px;"></i><?= h($branch) ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                            <?php if ($this->request->session()->read('Global.ismultiple_branch') == 'Y') { ?>
                                <?= $this->Html->link('<i class="mdi mdi-autorenew"></i> เปลี่ยนสาขา', ['controller' => 'branches', 'action' => 'change-local-branch'], ['class' => 'dropdown-item notify-item', 'escape' => false]) ?>
                            <?php } ?>
                        </div>
                    </li>


                    <li class="list-inline-item dropdown notification-list">
                        <?php $username = $this->request->session()->read('Auth.User.username') ?>
                        <a class="nav-link dropdown-toggle arrow-none waves-effect text-white" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-account noti-icon text-white" style="padding: 0 3px;"></i><?= h($username) ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow"><small class="text-white">สวัสดี <?= h($username) ?></small> </h5>
                            </div>
                            <?= $this->Html->link('<i class="mdi mdi-account-star-variant"></i> Profile', ['controller' => 'profile'], ['class' => 'dropdown-item notify-item', 'escape' => false]) ?>

                            <!-- item-->
                            <?= $this->Html->link('<i class="mdi mdi-logout"></i> <span>ออกจากระบบ</span>', ['controller' => 'logout'], ['class' => 'dropdown-item notify-item', 'escape' => false]) ?>

                        </div>
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->
    <?php if ($this->request->session()->read('Auth.User.role.isposwindow') == 'N') { ?>
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <?= $this->Html->link('<i class="ti-home"></i>หน้าหลัก', ['controller' => 'home'], ['escape' => false]) ?>
                        </li>
                        <li class="has-submenu">
                            <?= $this->Html->link('<i class="ion-ios7-keypad"></i>POS', ['controller' => 'pos'], ['escape' => false]) ?>
                        </li>

                        <li class="has-submenu" id="warehouseid">
                            <?= $this->Html->link('<i class="ti-package"></i>จัดการคลังสินค้า', '#', ['escape' => false]) ?>
                            <ul class="submenu">
                                <li><?= $this->Html->link('คลังสินค้า', ['controller' => 'warehouses'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('นำเข้าสินค้า', ['controller' => 'goods-receipts'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('ย้ายสินค้า', ['controller' => 'goods-movement'], ['escape' => false]); ?></li>
                                 <li><?= $this->Html->link('รับสินค้า', ['controller' => 'goods-movement','action'=>'approve-list'], ['escape' => false]); ?></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <?= $this->Html->link('<i class="mdi mdi-cart-outline"></i>ตั้งค่าสินค้า', '#', ['escape' => false]) ?>
                            <ul class="submenu">
                                <li><?= $this->Html->link('ประเภทสินค้า', ['controller' => 'product-categories'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('รายการสินค้า', ['controller' => 'products'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('น้ำหนักทอง', ['controller' => 'weights'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('ราคาทองประจำวัน', ['controller' => 'gold-prices'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('ตั้งค่ากำเหน็จ', ['controller' => 'cost-settings/view'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('ตั้งค่าราคาจำนำ', ['controller' => 'cost-settings/view/pawn'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('โปรโมชั่น', ['controller' => 'promotions'], ['escape' => false]); ?></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <?= $this->Html->link('<i class="fa fa-users"></i>พันธมิตรทางธุรกิจ', '#', ['escape' => false]) ?>
                            <ul class="submenu">
                                <li><?= $this->Html->link('ลูกค้า', ['controller' => 'bpartners', 'action' => 'index', 'Y'], ['escape' => false]); ?></li>
                                <li><?= $this->Html->link('ผู้ขาย', ['controller' => 'bpartners', 'action' => 'index', 'N'], ['escape' => false]); ?></li>
                            </ul>
                        </li>
                        <li class="has-submenu" id="manageid">
                            <?= $this->Html->link('<i class="mdi mdi-settings"></i>ตั้งค่าอื่นๆ', '#', ['escape' => false]) ?>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="#">การใช้งานระบบ</a>
                                    <ul class="submenu">
                                        <li><?= $this->Html->link('ผู้ใช้งานระบบ', ['controller' => 'users', 'action' => 'index'], ['escape' => false]); ?></li>
                                    </ul>
                                </li>


                                <li><?= $this->Html->link('หมายเลขเอกสาร', ['controller' => 'sequent-numbers', 'action' => 'index'], ['escape' => false]); ?></li>
                                <li class="has-submenu">
                                    <a href="#">องค์กร</a>
                                    <ul class="submenu">
                                        <li><?= $this->Html->link('บริษัท', ['controller' => 'orgs', 'action' => 'index'], ['escape' => false]); ?></li>
                                        <li><?= $this->Html->link('สาขา', ['controller' => 'branches', 'action' => 'index'], ['escape' => false]); ?></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">ระบบบัญชี</a>
                                    <ul class="submenu">

                                        <li><?= $this->Html->link('บัญชีธนาคาร', ['controller' => 'bank-accounts'], ['escape' => false]); ?></li>
                                        <li><?= $this->Html->link('การตั้งค่าทางบัญชี', ['controller' => 'account-settings'], ['escape' => false]); ?></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="#">รายรับ/รายจ่าย</a>
                                    <ul class="submenu">

                                        <li><?= $this->Html->link('ประเภทรายรัย/รายจ่าย', ['controller' => 'income-types'], ['escape' => false]); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-submenu" id="reportid">
                            <?= $this->Html->link('<i class="ti-printer"></i>รายงาน', ['controller' => 'reports'], ['escape' => false]) ?>
                        </li> 
                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> 
    <?php } ?>
</header>
    <script>
    var role='<?= isset($role)?$role:''?>';
    if(role==='พนักงานขาย'){
        $('#warehouseid').hide();
        $('#reportid').hide();
        $('#manageid').hide();
        console.log(role);
        
    }
    </script>