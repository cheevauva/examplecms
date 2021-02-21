<?php

$components['queries.save'] = ExampleCMS\Module\Installer\Query\Save::class;
$components['queries.save-relation'] = ExampleCMS\Module\Installer\Query\SaveRelation::class;

$components['field.text-from-fs'] = ExampleCMS\Module\Installer\Responder\FieldTextFromFilesystem::class;
$components['view.list'] = ExampleCMS\Application\Responder\ViewList::class;
$components['entity.license'] = ExampleCMS\Module\Installer\Entity\EntityLicense::class;
$components['entity.database'] = ExampleCMS\Module\Installer\Entity\EntityDatabase::class;


$components['queries.find-by-id'] = ExampleCMS\Module\Installer\Query\FindById::class;
$components['queries.find'] = ExampleCMS\Application\Query\Find::class;
$components['queries.find-databases'] = ExampleCMS\Module\Installer\Query\FindDatabases::class;
