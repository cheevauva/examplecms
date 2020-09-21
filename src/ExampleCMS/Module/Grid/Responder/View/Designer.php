<?php

namespace ExampleCMS\Module\Grid\Responder\View;

class Designer extends \ExampleCMS\Responder\View\Basic
{

    public function getData()
    {
        $metadata = parent::getData();

        $model = $this->context->getModel();

        if (!$model) {
            $this->exceptionFactory->throw('not_found');
        }
        
        $metadata['model'] = $model->toArray();
        
        return $metadata;
    }
}
