<?php

namespace ExampleCMS\Module\Grid\Action;

class DesignerUpdate extends \ExampleCMS\Action\Action
{

    public function execute($request)
    {
        $model = $this->context->getModel();
        $grid = json_decode($request->getContent(), true);
        $path = 'grids.' . $model->get('id') . '.rows';
        $this->config->set($path, $grid['rows']);
        die;
    }
}
