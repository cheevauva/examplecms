<?php

foreach (array(
    'actions.form' => 'ExampleCMS\Action\Form',
    'actions.index' => 'ExampleCMS\Action\Index2',
    'actions.save' => 'ExampleCMS\Action\Save',
    'actions.delete' => 'ExampleCMS\Action\Delete',
    'rows.header' => 'ExampleCMS\Application\Row\Basic',
    'rows.default' => 'ExampleCMS\Application\Row\Basic',
    'tables.config' => 'ExampleCMS\Table\Config',
    'tables.database' => 'ExampleCMS\Table\Database',
    'modules.base' => 'ExampleCMS\Module',
    'themes.default' => 'ExampleCMS\Application\Theme\Basic',
    'mappers.userScopeToModelForm' => 'ExampleCMS\Application\Mapper\UserScopeToModelForm',
    'mappers.userScopeFromModelForm' => 'ExampleCMS\Application\Mapper\UserScopeFromModelForm',
    'mappers.baseToStorage' => 'ExampleCMS\Application\Mapper\ModelBaseToStorage',
    'mappers.baseFromStorage' => 'ExampleCMS\Application\Mapper\ModelBaseFromStorage',
) as $name => $value) {
    $components[$name] = $value;
}
