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


            <ul>
                <li class="menu-title">Main</li>
                <?php foreach ($menus['normal'] as $item) : ?>
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
                <?php foreach ($menus['admin1'] as $item) : ?>
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
                <?php foreach ($menus['admin2'] as $item) : ?>
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