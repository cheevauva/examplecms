<?php

foreach (array(
    'actions.form' => 'ExampleCMS\Action\Form',
    'actions.index' => 'ExampleCMS\Action\Index2',
    'actions.save' => 'ExampleCMS\Action\Save',
    'actions.delete' => 'ExampleCMS\Action\Delete',
    'tables.config' => 'ExampleCMS\Table\Config',
    'tables.database' => 'ExampleCMS\Table\Database',
    'modules.base' => 'ExampleCMS\Module',
    'themes.default' => 'ExampleCMS\Application\Theme\Basic',
) as $name => $value) {
    $components[$name] = $value;
}
