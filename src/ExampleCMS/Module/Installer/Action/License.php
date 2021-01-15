<?php

namespace ExampleCMS\Module\Installer\Action;

class License extends Read
{

    /**
     * @var \ExampleCMS\Contract\Filesystem 
     */
    public $filesystem;

    public function execute($request)
    {
        $query = $this->module->query('findFormModel');

        $formModel = $query->fetch([
            $query::REQUEST => $request
        ]);

        $model = $this->module->query('find')->fetch();

        $formModel->bindFrom($model);
        $formModel->set('license', file_get_contents($this->filesystem->preparePath('LICENSE')));

        return $request;
    }

}
