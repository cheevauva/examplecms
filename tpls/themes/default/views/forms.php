<form action="<?= $action; ?>" method="<?= $method; ?>">
    <?php foreach ($grids as $grid): ?>
        <?= $this->render($grid); ?>
    <?php endforeach; ?>

</form>
