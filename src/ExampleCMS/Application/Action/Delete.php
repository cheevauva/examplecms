<?php

namespace ExampleCMS\Application\Action;

class Delete extends Action
{

    public function execute()
    {
        $model = $this->context->getModel();
        $query = $this->context->getQuery('delete');
        $view = $this->context->getView();

        $query->execute($model);

        $view->go('index', $model);

        return $view;
    }
}
