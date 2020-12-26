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

        if (!$model) {
            foreach ($data['forms'] as $meta) {
                $model = $this->formManager->getFormModel($data['module'], $meta);
                $formMetadata = $model->getMetadata();

                if ($request->getAttribute('route') === $formMetadata['route']) {
                    $model = $this->formManager->getFormModelsByRequest($request);
                } else {
                    $model = $this->formManager->createForm($request, $data['module'], $meta);
                }
            }

            $request = $request->withAttribute('model', $model);
        }

        $data['method'] = $model->getMethod();
        $data['action'] = $this->getAction($model, $request);
        $data['state'] = $model->getState();
        $data['state_reason'] = $model->getStateReason();

        foreach ($data['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($request);
        }

        return $data;
    }

    public function getAction($model, $request)
    {
        $metadata = $model->getMetadata();
        $params = $model->toArray();

        return $this->router->makeWithRequest($request, $metadata['route'], $params);
    }

}
