<?php

namespace ExampleCMS\Application\View;

class Form extends View
{

    /**
     * @var \ExampleCMS\Contract\Router
     */
    public $router;

    protected function getDefaultData()
    {
        return [
            'grids' => [],
            'module' => $this->module->getModule(),
            'forms' => [],
        ];
    }

    public function execute($context)
    {
        $data = parent::execute($context);

        if (empty($this->metadata['form']) && !empty($context['form'])) {
            $this->metadata['form'] = $context['form'];
        }

        $model = $context['modelForms'][$this->metadata['form']];

        $data['method'] = $this->getMethod($model);
        $data['action'] = $this->getAction($model, $context['request']);

        foreach ($this->metadata['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($context);
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

        return $request->getAttribute('router')->make($metadata['route'], $params);
    }

}
