<?php

namespace ExampleCMS\Module\Installer\Action;

use Psr\Http\Message\ServerRequestInterface;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute(ServerRequestInterface $request)
    {
        /* @var $query \ExampleCMS\Module\Installer\Query\FindFormModel */
        $query = $this->module->query('findFormModel');

        $formModel = $query->fetch([
            $query::REQUEST => $request,
            $query::FORM => $this->metadata['form'],
        ]);

        $model = $this->module->query('find')->fetch();

        $formModel->bindFrom($model);

        $models = $request->getAttribute('model');
        $models[$this->metadata['form']] = $formModel;

        return $request;
    }

}
