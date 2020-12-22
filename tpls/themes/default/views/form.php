<?php if ($state == 'broken') : ?>
    <div class="bg-warning">
        <?= $state_reason; ?>
    </div>
<?php endif; ?>
<form action="<?= $action; ?>" method="<?= $method; ?>">
    <?= $theme->make(reset($grids)); ?>
</form>
