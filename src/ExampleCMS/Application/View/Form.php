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
            'module' => $this->module->getName(),
            'forms' => [],
        ];
    }

    public function execute($context)
    {
        $data = parent::execute($context);

        $request = $context['request'];

        if (empty($this->metadata['model'])) {
            throw new \RuntimeException('"model" is not defined in metadata');
        }

        if (empty($context['model'][$this->metadata['model']])) {
            throw new \RuntimeException(sprintf('model "%s" is not defined in context', $this->metadata['model']));
        }

        /* @var $model \ExampleCMS\Application\Model\ModelBase */
        $model = $context['model'][$this->metadata['model']];

        if (empty($this->metadata['method'])) {
            throw new \RuntimeException('"method" is not defined in metadata');
        }

        if (empty($this->metadata['route'])) {
            throw new \RuntimeException('"route" is not defined in metadata');
        }

        $data['method'] = $this->metadata['method'];
        $data['action'] = $request->getAttribute('router')->make($this->metadata['route'], $model->toArray());
        
        $context['formData'] = new \ArrayObject();
        $context['formName'] = $model->getModelName();
        
        $model->doMappingFromModelToData($context['formData']);

        foreach ($this->metadata['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->module->grid($meta)->execute($context);
        }

        return $data;
    }

}
