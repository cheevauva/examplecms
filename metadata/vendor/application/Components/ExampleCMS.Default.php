<?php

foreach (array(
    'actions.form' => 'ExampleCMS\Action\Form',
    'actions.index' => 'ExampleCMS\Action\Index2',
    'actions.save' => 'ExampleCMS\Action\Save',
    'actions.delete' => 'ExampleCMS\Action\Delete',
    'queries.all' => 'ExampleCMS\Query\Database\All',
    'queries.find' => 'ExampleCMS\Query\Database\Find',
    'queries.createdatabase' => 'ExampleCMS\Query\Database\CreateDatabase',
    'models.base' => 'ExampleCMS\Application\Model\ModelBase',
    'forms.base' => 'ExampleCMS\Application\Model\ModelForm',
    'rows.header' => 'ExampleCMS\Application\Row\Basic',
    'rows.default' => 'ExampleCMS\Application\Row\Basic',
    'tables.config' => 'ExampleCMS\Table\Config',
    'tables.database' => 'ExampleCMS\Table\Database',
    'modules.base' => 'ExampleCMS\Module',
    'themes.default' => 'ExampleCMS\Application\Theme\Basic',
    'mappers.userScopeToModelForm' => 'ExampleCMS\Application\Mapper\UserScopeToModelForm',
    'mappers.userScopeFromModelForm' => 'ExampleCMS\Application\Mapper\UserScopeFromModelForm',
) as $name => $value) {
    $components[$name] = $value;
}
