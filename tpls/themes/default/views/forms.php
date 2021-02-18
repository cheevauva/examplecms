<form action="<?= $link($action); ?>" method="<?= $method; ?>">
    <?php foreach ($grids as $grid): ?>
        <?= $this($grid); ?>
    <?php endforeach; ?>

</form>
