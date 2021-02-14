<table class="table table-bordered" id="grid_<?= $name; ?>">
    <?php foreach ($rows as $row) : ?>
        <?= $this($row); ?>
    <?php endforeach; ?>
</table>
