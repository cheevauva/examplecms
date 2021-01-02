<?php if (!empty($this->assets['css'])) : ?>
    <?php foreach ($this->assets['css'] as $path): ?>
        <link rel="stylesheet" href="<?= $path; ?>">
    <?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($this->assets['js'])) : ?>
    <?php foreach ($this->assets['js'] as $path): ?>
        <script type="text/javascript" src="<?= $path; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>