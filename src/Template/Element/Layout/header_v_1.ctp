<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu" style="top:3px;">
    <?= $this->Html->image('logo-v.png', ['class' => 'w-75']) ?>
    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <?php foreach ($menus['normal'] as $item) : ?>
                    <?php if ($item['type'] == 'S') { ?>
                        <li><?= $this->Html->link($item['text'], $item['url'], ['escape' => false, 'class' => 'waves-effect waves-primary']) ?></li>
                    <?php } else { ?>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect waves-primary"><?= $item['text'] ?><span class="menu-arrow"></span></a>
                            <ul class="nav-second-level">
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
                            <ul class="nav-second-level">
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
                            <ul class="nav-second-level">
                                <?php foreach ($item['sub'] as $sub): ?>
                                    <li><?= $this->Html->link($sub['text'], $sub['url'], ['escape' => false]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endforeach; ?>  
                <li>
                    <?= $this->Html->link('<i class="mdi mdi-logout"></i> <span>ออกจากระบบ</span>', ['controller' => 'logout'], ['class' => '', 'escape' => false]) ?>
                </li>
            </ul> 

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>