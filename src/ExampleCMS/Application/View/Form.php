<?php

namespace ExampleCMS\Application\View;

class Form extends Basic
{

    /**
     * @var \ExampleCMS\Contract\Router
     */
    public $router;

    protected function getDefaultData()
    {
        return [
            'grids' => [],
            'module' => $this->module,
            'forms' => [],
        ];
    }

    public function execute($request)
    {
        $data = parent::execute($request);

        if (empty($data['forms'])) {
            $data['forms'] = $request->getAttribute('forms');
        }

        $model = $request->getAttribute('model');

        $data['method'] = $this->getMethod($model);
        $data['action'] = $this->getAction($model, $request);

        foreach ($data['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($request);
        }

        return $data;
    }

    public function getMethod($model)
    {
        $metadata = $model->getMetadata();
        
        return $metadata['method'];
    }

    public function getAction($model, $request)
    {
        $metadata = $model->getMetadata();
        $params = $model->toArray();

        return $this->router->makeWithRequest($request, $metadata['route'], $params);
    }

}
