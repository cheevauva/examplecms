<?php

/**
 * ExampleCMS
 *
 * @license LICENCE
 */

namespace ExampleCMS\Application\Responder;

use ExampleCMS\Contract\Context;

class ViewForm extends View
{

    public function execute(Context $context)
    {
        $data = parent::execute($context);
        $data['grids'] = [];

        if (empty($this->metadata['model'])) {
            throw new \RuntimeException('"model" is not defined in metadata');
        }

        if (!$context->hasEntity($this->metadata['model'])) {
            throw new \RuntimeException(sprintf('model "%s" is not defined in context', $this->metadata['model']));
        }

        /* @var $model \ExampleCMS\Application\Model\ModelBase */
        $model = $context->getEntity($this->metadata['model']);

        if (empty($this->metadata['method'])) {
            throw new \RuntimeException('"method" is not defined in metadata');
        }

        if (empty($this->metadata['route'])) {
            throw new \RuntimeException('"route" is not defined in metadata');
        }

        $data['method'] = $this->metadata['method'];
        $data['action'] = $context->getAttribute('router')->make($this->metadata['route'], $model->toArray());

        $formData = new \ArrayObject();

        $model->doMappingFromModelToData($formData);

        $context = $context->withAttribute('formName', $model->getModelName());
        $context = $context->withAttribute('formData', $formData);

        foreach ($this->metadata['grids'] as $index => $meta) {
            $data['grids'][$index] = $this->responder('grid', $meta)->execute($context);
        }

        return $data;
    }

}
