<table class="table table-bordered" id="grid_<?= $name; ?>">
    <?php foreach ($rows as $row) : ?>
        <?= $theme->make($row); ?>
    <?php endforeach; ?>
</table>
