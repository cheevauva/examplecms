<?php

namespace ExampleCMS\Module\Installer\Action;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute($request)
    {
        $query = $this->module->query('findFormModel');

        $formModel = $query->fetch([
            $query::REQUEST => $request
        ]);

        $model = $this->module->query('find')->execute();

        $formModel->bindFrom($model);

        return $request;
    }

}
