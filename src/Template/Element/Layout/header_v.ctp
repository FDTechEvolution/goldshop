<div class="topbar">
    <div class="topbar-left">
        <div class="text-center">
            <a href="#" class="logo"><?= $this->Html->image('logo/logo.png', ['width' => '55px;']) ?> <span></span></a>
        </div>
    </div>

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">

            <li class="list-inline-item notification-list hide-phone">
                <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-crop-free noti-icon"></i>
                </a>
            </li>

            <li class="list-inline-item notification-list">
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

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">

            </li>
        </ul>
    </nav>

</div>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <?php
            $menu = [
                ['type' => 'S', 'text' => '<i class="ti-home"></i><span>หน้าหลัก</span>', 'url' => ['controller' => 'home']],
                ['type' => 'S', 'text' => '<i class="ion-ios7-keypad"></i><span>POS</span>', 'url' => ['controller' => 'pos']],
                
                ['type' => 'M', 'text' => '<i class="fa fa-users"></i> <span>พันธมิตรทางธุรกิจ</span>',
                    'sub' => [
                        ['text' => 'ลูกค้า', 'url' => ['controller' => 'bpartners','action'=>'index','Y']],
                        ['text' => 'ผู้ขาย', 'url' => ['controller' => 'bpartners','action'=>'index','N']],
     
                    ]],
                
            ];
            $menuAdmin = [
                ['type' => 'M', 'text' => '<i class="ti-package"></i> <span>คลังสินค้า</span>',
                    'sub' => [
                        ['text' => 'คลังสินค้า', 'url' => ['controller' => 'warehouses']],
                        ['text' => 'นำเข้าสินค้า', 'url' => ['controller' => 'goods-receipts']],
                        ['text' => 'ย้ายสินค้า', 'url' => ['controller' => 'goods-movement']],
                        ['text' => 'รับสินค้า', 'url' => ['controller' => 'goods-movement','action'=>'approve-list']]
                    ]],
                ['type' => 'M', 'text' => '<i class="mdi mdi-cart-outline"></i> <span>สินค้า</span>',
                    'sub' => [
                        ['text' => 'ประเภทสินค้า', 'url' => ['controller' => 'product-categories']],
                        ['text' => 'รายการสินค้า', 'url' => ['controller' => 'products']],
                        ['text' => 'น้ำหนักทอง', 'url' => ['controller' => 'weights']],
                      
                    ]],
                ['type' => 'M', 'text' => '<i class="ti-money"></i> <span>ราคา</span>',
                    'sub' => [
                        ['text' => 'ราคาทองประจำวัน', 'url' => ['controller' => 'gold-prices']],
                        ['text' => 'ตั้งค่ากำเหน็จ', 'url' => ['controller' => 'cost-settings','action'=>'view']],
                        ['text' => 'ตั้งค่าราคาจำนำ', 'url' => ['controller' => 'cost-settings','action'=>'view','pawn']],
                        ['text' => 'โปรโมชั่น', 'url' => ['controller' => 'promotions']],
                      
                    ]],
                ['type' => 'M', 'text' => '<i class="mdi mdi-settings"></i> <span>ตั้งค่าอื่นๆ</span>',
                    'sub' => [
                        ['text' => 'ผู้ใช้งานระบบ', 'url' => ['controller' => 'users']],
                        ['text' => 'หมายเลขเอกสาร', 'url' => ['controller' => 'sequent-numbers']],
                        ['text' => 'บริษัท', 'url' => ['controller' => 'orgs']],
                        ['text' => 'สาขา', 'url' => ['controller' => 'branches']],
                        ['text' => 'บัญชีธนาคาร', 'url' => ['controller' => 'bank-accounts']],
                        ['text' => 'การตั้งค่าทางบัญชี', 'url' => ['controller' => 'account-settings']],
                        ['text' => 'ประเภทรายรัย/รายจ่าย', 'url' => ['controller' => 'income-types']],
                      
                    ]],
                ['type' => 'M', 'text' => '<i class="ti-printer"></i> <span>รายงาน</span>',
                    'sub' => [
                        ['text' => 'สถิติ', 'url' => ['controller' => 'reports']],
                        ['text' => 'สรุปรายรับ-รายจ่ายประจำวัน', 'url' => ['controller' => 'reports','action'=>'income']],
                        ['text' => 'Transaction Reports', 'url' => ['controller' => 'reports','action'=>'transaction']],
                        ['text' => 'รายงานลูกค้าจำนำ', 'url' => ['controller' => 'reports','action'=>'pawnreport']],
                        ['text' => 'รายงานออมเงิน', 'url' => ['controller' => 'reports','action'=>'savingreport']],
                        ['text' => 'รายการสินค้าคงเหลือ', 'url' => ['controller' => 'reports','action'=>'warehouse']],
                        ['text' => 'รายงานการสั่งทำ', 'url' => ['controller' => 'reports','action'=>'order']],
                      
                      
                    ]],
                
            ];
            ?>
            <ul>
                <li class="menu-title">Main</li>
                <?php foreach ($menu as $item): ?>
                    <?php if ($item['type'] == 'S') { ?>
                        <li><?= $this->Html->link($item['text'], $item['url'], ['escape' => false, 'class' => 'waves-effect waves-primary']) ?></li>
                    <?php } else { ?>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect waves-primary"><?= $item['text'] ?><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <?php foreach ($item['sub'] as $sub): ?>
                                    <li><?= $this->Html->link($sub['text'], $sub['url'], ['escape' => false]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endforeach; ?>

                <li class="menu-title">Advance</li>
                <?php foreach ($menuAdmin as $item): ?>
                    <?php if ($item['type'] == 'S') { ?>
                        <li><?= $this->Html->link($item['text'], $item['url'], ['escape' => false, 'class' => 'waves-effect waves-primary']) ?></li>
                    <?php } else { ?>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect waves-primary"><?= $item['text'] ?><span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <?php foreach ($item['sub'] as $sub): ?>
                                    <li><?= $this->Html->link($sub['text'], $sub['url'], ['escape' => false]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endforeach; ?>
                
            </ul>

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>