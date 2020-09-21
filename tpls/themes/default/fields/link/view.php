<?php return function ($template, $field) { ?>
    <a href="<?= $field['url']; ?>">
        <?= htmlspecialchars($field['label']); ?>
    </a>
<?php }; ?>