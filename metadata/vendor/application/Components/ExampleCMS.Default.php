<?php

foreach (array(
    'columns.default' => 'ExampleCMS\\Application\\Column\\Basic',
    'columns.header' => 'ExampleCMS\\Application\\Column\\Basic',
    'fields.string' => 'ExampleCMS\\Application\\Field\\StringField',
    'fields.link' => 'ExampleCMS\\Application\\Field\\Link',
    'fields.enum' => 'ExampleCMS\\Application\\Field\\Enum',
    'fields.float' => 'ExampleCMS\\Application\\Field\\Float',
    'fields.int' => 'ExampleCMS\\Application\\Field\\Int',
    'fields.date' => 'ExampleCMS\\Application\\Field\\Date',
    'fields.datetime' => 'ExampleCMS\\Application\\Field\\DateTime',
    'fields.label' => 'ExampleCMS\\Application\\Field\\Label',
    'fields.button' => 'ExampleCMS\\Application\\Field\\Button',
    'fields.grid' => 'ExampleCMS\\Application\\View\\Grid',
    'grids.default' => 'ExampleCMS\\Application\\Grid\\Basic',
    'grids.table' => 'ExampleCMS\\Application\\Grid\\Basic',
    'grids.json' => 'ExampleCMS\\Application\\Grid\\Json',
    'grids.form' => 'ExampleCMS\\Application\\Grid\\Form',
    'grids.view' => 'ExampleCMS\\Application\\Grid\\View',
    'actions.form' => 'ExampleCMS\\Action\\Form',
    'actions.index' => 'ExampleCMS\\Action\\Index2',
    'actions.save' => 'ExampleCMS\\Action\\Save',
    'actions.delete' => 'ExampleCMS\\Action\\Delete',
    'queries.all' => 'ExampleCMS\\Query\\Database\\All',
    'queries.find' => 'ExampleCMS\\Query\\Database\\Find',
    'queries.createdatabase' => 'ExampleCMS\\Query\\Database\\CreateDatabase',
    'layouts.layouts.read' => 'ExampleCMS\\Application\\Layout\\Basic',
    'layouts.index' => 'ExampleCMS\\Application\\Layout\\Basic',
    'layouts.basic' => 'ExampleCMS\\Application\\Layout\\Basic',
    'layouts.exception' => 'ExampleCMS\\Application\\Layout\\Basic',
    'layouts.designer' => 'ExampleCMS\\Application\\Layout\\Basic',
    'layouts.single-view' => 'ExampleCMS\\Application\\Layout\\Basic',
    'layouts.rest' => 'ExampleCMS\\Application\\Layout\\Rest',
    'views.header' => 'ExampleCMS\\Application\\View\\Header',
    'views.footer' => 'ExampleCMS\\Application\\View\\Header',
    'views.exception' => 'ExampleCMS\\Application\\View\\Exception',
    'views.basic' => 'ExampleCMS\\Application\\View\\Basic',
    'views.asset' => 'ExampleCMS\\Application\\View\\Basic',
    'views.grid' => 'ExampleCMS\\Application\\View\\Grid',
    'views.layout' => 'ExampleCMS\\Application\\View\\Layout',
    'views.form' => 'ExampleCMS\\Application\\View\\Form',
    'models.base' => 'ExampleCMS\\Model\\Basic',
    'models.form' => 'ExampleCMS\\Model\\Form',
    'rows.header' => 'ExampleCMS\\Application\\Row\\Basic',
    'rows.default' => 'ExampleCMS\\Application\\Row\\Basic',
    'datasource.searchmodel' => 'ExampleCMS\\DataSource\\SearchModel',
    'datasource.collection' => 'ExampleCMS\\DataSource\\Collection',
    'datasource.context-model' => 'ExampleCMS\\DataSource\\ContextModel',
    'tables.config' => 'ExampleCMS\\Table\\Config',
    'tables.database' => 'ExampleCMS\\Table\\Database',
    'modules.base' => 'ExampleCMS\\Module',
    'themes.default' => 'ExampleCMS\\Application\\Theme\\Basic',
    'forms.base' => 'ExampleCMS\\Model\\Form',
) as $name => $value) {
    $components[$name] = $value;
}
