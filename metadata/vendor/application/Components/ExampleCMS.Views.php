<?php

$components['view.header'] = ExampleCMS\Application\Responder\ViewHeader::class;
$components['view.footer'] = ExampleCMS\Application\Responder\ViewFooter::class;
$components['view.exception'] = ExampleCMS\Application\Responder\ViewException::class;
$components['view.basic'] = ExampleCMS\Application\Responder\View::class;
$components['view.asset'] = ExampleCMS\Application\Responder\View::class;
$components['view.grid'] = ExampleCMS\Application\Responder\ViewGrid::class;
$components['view.layout'] = ExampleCMS\Application\Responder\ViewLayout::class;
$components['view.form'] = ExampleCMS\Application\Responder\ViewForm::class;
$components['view.forms'] = ExampleCMS\Application\Responder\ViewForms::class;
$components['view.views'] = ExampleCMS\Application\Responder\ViewViews::class;