<?php return function ($template, $metedata) { ?>
    <p>
        <br/><br/>
        &copy; by chee.<br/>
        Execute time: <?= microtime(true) - EXAMPLECMS_TIMESTART; ?>
        <br/>
        Memory usage: <?= ((memory_get_usage() - EXAMPLECMS_MERMORYSTART) / (1024 * 1024)); ?>
        <br/>
        Include files: <?= count(get_included_files()); ?>
    </p>
<?php }; ?>