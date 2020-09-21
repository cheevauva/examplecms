<?php return function ($metadata) { ?>
    <?php extract($metadata); ?>
    <?= $views['view']->getContent(); ?>
<?php } ?>
