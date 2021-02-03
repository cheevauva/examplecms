<?php

namespace ExampleCMS\Module\Installer\Action;

class Read extends \ExampleCMS\Application\Action\Action
{

    public function execute(\ExampleCMS\Contract\Context $context)
    {
        /* @var $query \ExampleCMS\Contract\Module\Installer\Query\FindFormModel */
        $query = $this->query('findFormModel');

        $formModel = $query->fetch([
            $query::FORMS => $context->getAttribute('forms'),
            $query::FORM => $this->metadata['form'],
        ]);

        $model = $this->query('find')->fetch();

        $formModel->bindFrom($model);

        return $context->withEntity($this->metadata['model'], $formModel);
    }

}
