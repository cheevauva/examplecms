<?php

foreach (array(
    'roles' => array(
        'hide' => true,
        'label' => 'Роли',
        'storage' => 'database',
        'table' => 'roles',
    ),
    'modules' => array(
        'table' => 'modules',
    ),
    'role_operations' => array(
        'label' => 'Действия',
        'storage' => 'database',
        'table' => 'role_operations',
    ),
    'menu' => array(
        'label' => 'Меню',
        'table' => 'menus',
    ),
    'menuitems' => array(
        'label' => 'Пункты меню',
        'table' => 'menuitems',
        'storage' => 'database',
    ),
    'config' => array(
        'label' => '',
    ),
    'i18n' => array(
        'label' => '',
    ),
    'modules' => array(
        'table' => 'modules',
        'label' => 'Модули'
    ),
    'fields' => array(
        'label' => 'fields',
        'table' => 'fields',
    ),
    'routes' => array(
        'label' => 'Маршруты',
        'table' => 'routes',
    ),
    'pages' => array(
        'label' => 'Страницы',
        'storage' => 'database',
        'table' => 'pages',
    ),
    'comments' => array(
        'table' => 'comments',
        'storage' => 'database',
        'label' => 'Комментарии',
    ),
    'categories' => array(
        'table' => 'categories',
        'storage' => 'database',
        'label' => 'Категории',
    ),
    'users' => array(
        'label' => 'moduleName',
        'storage' => 'database',
        'table' => 'users',
    ),
    'generator' => array(
        'label' => 'Генератор',
    ),
    'layouts' => array(
        'table' => 'layouts',
        'label' => 'Слои',
    ),
    'tables' => array(
        'table' => 'tables',
    ),
    'grids' => array(
        'name' => 'grids',
        'path' => 'grids',
        'depth' => 2,
    ),
    'connections' => array(
        'table' => 'connections',
    ),
    'installer' => array(
        'label' => 'Установщик',
        'table' => 'installer',
    ),
    'default' => array(
        'hide' => true,
    ),
) as $name => $value) {
    $modules1[$name] = $value;
}

$modules['Installer'] = array(
    'label' => 'Установщик',
    'table' => 'installer',
);
$modules['Grids'] = array(
    'label' => 'Сетки',
);
$modules['Modules'] = array(
    'label' => 'Модули',
);
$modules['Users'] = array(
    'label' => 'Пользователи',
);
$modules['MenuItems'] = array(
    'label' => 'Пункты меню',
);
$modules['Default'] = array(
    'label' => 'Модуль заглушка',
);
