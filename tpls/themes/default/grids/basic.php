<table class="table table-bordered" id="grid_<?= $name; ?>">
    <?php foreach ($rows as $row) : ?>
        <?= $this->render($row); ?>
    <?php endforeach; ?>
</table>
