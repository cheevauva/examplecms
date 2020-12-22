<?php if ($state == 'broken') : ?>
    <div class="bg-warning">
        <?= $state_reason; ?>
    </div>
<?php endif; ?>
<form action="<?= $action; ?>" method="<?= $method; ?>">
    <?php foreach ($grids as $grid): ?>
        <?= $theme->make($grid); ?>
    <?php endforeach; ?>

</form>
