<div class="header">
    <?php if (!empty($items)) : ?>
        <ul class="nav nav-pills pull-right" role="tablist">
            <?php foreach ($items as $item) : ?>
                <li role="<?= $item['role']; ?>" class="<?= $item['class']; ?>">
                    <a href="<?= $item['targetLink']; ?>">
                        <?= $item['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h3 class="text-muted">ExampleCMS</h3>
</div>
<?php foreach ($subItems as $item) : ?>
    <a href="<?= $item['targetLink']; ?>">
        <?= $item['name']; ?>
    </a>
<?php endforeach; ?>
