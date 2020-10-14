<div style="width: 100%;height: 100%;background-color: rgba(255, 255, 255, 1);z-index: 200;display:block;position:fixed;top: 0;bottom:0;padding: 30px 20px;padding-bottom: 80px;display: none;direction: ltr;overflow: scroll;" id="box-menu">

    <div class="row" style="font-size: 20px;">
        <div class="col-4">
            <?php foreach ($menus['normal'] as $item) : ?>
                <p <?= $item['type'] == 'M' ? 'style="margin-bottom:2px;"' : '' ?>><?= $this->Html->link($item['text'], $item['url'], ['escape' => false, 'class' => 'waves-effect waves-primary']) ?></p>
                <?php if ($item['type'] == 'M') { ?>
                    <ul>
                        <?php foreach ($item['sub'] as $sub): ?>
                            <li style="padding: 8px 0px;"><?= $this->Html->link($sub['text'], $sub['url'], ['escape' => false]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php } ?>
            <?php endforeach; ?>
            <p>
                <?= $this->Html->link('<i class="mdi mdi-logout"></i> <span>ออกจากระบบ</span>', ['controller' => 'logout'], ['class' => '', 'escape' => false]) ?>
            </p>
        </div>
        <div class="col-4">
            <?php foreach ($menus['admin1'] as $item) : ?>
                <p <?= $item['type'] == 'M' ? 'style="margin-bottom:2px;"' : '' ?>><?= $this->Html->link($item['text'], $item['url'], ['escape' => false, 'class' => 'waves-effect waves-primary']) ?></p>
                <?php if ($item['type'] == 'M') { ?>
                    <ul>
                        <?php foreach ($item['sub'] as $sub): ?>
                            <li style="padding: 8px 0px;"><?= $this->Html->link($sub['text'], $sub['url'], ['escape' => false]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <div class="col-4">
            <?php foreach ($menus['admin2'] as $item) : ?>
                <p <?= $item['type'] == 'M' ? 'style="margin-bottom:2px;"' : '' ?>><?= $this->Html->link($item['text'], $item['url'], ['escape' => false, 'class' => 'waves-effect waves-primary']) ?></p>
                <?php if ($item['type'] == 'M') { ?>
                    <ul>
                        <?php foreach ($item['sub'] as $sub): ?>
                            <li style="padding: 8px 0px;"><?= $this->Html->link($sub['text'], $sub['url'], ['escape' => false]) ?></li>
                            <?php endforeach; ?>
                    </ul>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>