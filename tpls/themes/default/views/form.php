<form action="<?= $action; ?>" method="<?= $method; ?>">
    <?php if (!empty($grids)) : ?>
        <?= $this(reset($grids)); ?>
    <?php else :?>
        Where my grid
    <?php endif; ?>
</form>
