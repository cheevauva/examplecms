<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

class ViewForm extends View
{

    public function execute($context)
    {
        $data = parent::execute($context);
        $data['grids'] = [];

        $request = $context['request'];
        $models = $request->getAttribute('model', []);

        if (empty($this->metadata['model'])) {
            throw new \RuntimeException('"model" is not defined in metadata');
        }

        if (empty($models[$this->metadata['model']])) {
            throw new \RuntimeException(sprintf('model "%s" is not defined in context', $this->metadata['model']));
        }

        /* @var $model \ExampleCMS\Application\Model\ModelBase */
        $model = $models[$this->metadata['model']];

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
            $data['grids'][$index] = $this->responder('grid', $meta)->execute($context);
        }

        return $data;
    }

}
