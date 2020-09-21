<?php $assets = $theme->getAssets(); ?>
<?php if (!empty($assets['css'])) : ?>
    <?php foreach ($assets['css'] as $path): ?>
        <link rel="stylesheet" href="<?= $path; ?>">
    <?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($assets['js'])) : ?>
    <?php foreach ($assets['js'] as $path): ?>
        <script type="text/javascript" src="<?= $path; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
